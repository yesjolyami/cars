(() => {
  // TODO(owner): вставьте только числовой ID после проверки настроек счётчика,
  // Политики и договора с Яндексом. Пока строка пустая, Метрика не загружается.
  const METRIKA_ID = '';
  const CONSENT_KEY = 'tvoe-auto-privacy-consent-v1';
  const CONSENT_VERSION = '2026-08-26';
  const isValidMetrikaId = /^\d{5,12}$/.test(METRIKA_ID);
  const disableMetrikaKey = `disableYaCounter${METRIKA_ID}`;
  let metrikaStarted = false;
  let sessionConsent = null;

  const storage = {
    get() {
      try {
        const value = localStorage.getItem(CONSENT_KEY);
        if (!value) return sessionConsent;
        const parsed = JSON.parse(value);
        return parsed?.version === CONSENT_VERSION ? parsed : null;
      } catch {
        return sessionConsent;
      }
    },
    set(optional) {
      const value = {
        version: CONSENT_VERSION,
        optional: Boolean(optional),
        updatedAt: new Date().toISOString(),
      };
      sessionConsent = value;
      try {
        localStorage.setItem(CONSENT_KEY, JSON.stringify(value));
        localStorage.removeItem('tvoe-auto-analytics-consent');
      } catch {
        // Настройка действует до закрытия вкладки, если localStorage недоступен.
      }
      return value;
    },
  };

  const optionalAllowed = () => storage.get()?.optional === true;

  const setMetrikaDisabled = (disabled) => {
    if (!isValidMetrikaId) return;
    window[disableMetrikaKey] = disabled;
  };

  setMetrikaDisabled(!optionalAllowed());

  const loadMetrika = () => {
    if (!isValidMetrikaId || !optionalAllowed() || metrikaStarted) return;

    metrikaStarted = true;
    setMetrikaDisabled(false);
    window.ym =
      window.ym ||
      function () {
        (window.ym.a = window.ym.a || []).push(arguments);
      };
    window.ym.l = Date.now();

    const script = document.createElement('script');
    script.async = true;
    script.dataset.yandexMetrika = '';
    script.referrerPolicy = 'no-referrer';
    script.src = 'https://mc.yandex.ru/metrika/tag.js';
    document.head.append(script);

    window.ym(METRIKA_ID, 'init', {
      accurateTrackBounce: true,
      clickmap: false,
      sendTitle: false,
      trackLinks: false,
      webvisor: false,
    });
  };

  const removeMetrikaCookies = () => {
    document.cookie.split(';').forEach((cookie) => {
      const name = cookie.split('=')[0]?.trim();
      if (!name || !/^_ym|^yandexuid$|^_yasc$/.test(name)) return;
      document.cookie = `${name}=; Max-Age=0; path=/; SameSite=Lax`;
    });
  };

  const disableMetrika = () => {
    setMetrikaDisabled(true);
    document.querySelector('script[data-yandex-metrika]')?.remove();
    removeMetrikaCookies();
  };

  // Цели принимают только технические счётчики. Строковые значения фильтров и
  // любые значения полей форм в Метрику не передаются.
  window.trackGoal = (goal, params = {}) => {
    const allowedGoals = new Set([
      'catalog_filter',
      'catalog_filter_reset',
      'catalog_sort',
      'faq_filter',
      'news_filter',
    ]);
    if (!allowedGoals.has(goal) || !optionalAllowed() || !isValidMetrikaId) {
      return;
    }

    loadMetrika();
    const resultCount = Number(params.result_count);
    const safeParams = Number.isFinite(resultCount)
      ? { result_count: Math.max(0, Math.round(resultCount)) }
      : undefined;
    window.ym?.(METRIKA_ID, 'reachGoal', goal, safeParams);
  };

  const createMapFrame = (container) => {
    if (container.querySelector('iframe')) return;
    const source = container.dataset.mapSrc;
    if (!source || !source.startsWith('https://yandex.ru/map-widget/')) return;

    const iframe = document.createElement('iframe');
    iframe.src = source;
    iframe.title = container.dataset.mapTitle || 'Карта';
    iframe.loading = 'lazy';
    iframe.referrerPolicy = 'no-referrer';
    iframe.setAttribute('allowfullscreen', '');
    iframe.dataset.consentLoaded = '';
    container.querySelector('[data-map-placeholder]')?.setAttribute('hidden', '');
    container.append(iframe);
    container.classList.add('is-loaded');
  };

  const resetMapFrame = (container) => {
    container.querySelector('iframe[data-consent-loaded]')?.remove();
    container
      .querySelector('[data-map-placeholder]')
      ?.removeAttribute('hidden');
    container.classList.remove('is-loaded');
  };

  const loadConsentedMaps = () => {
    if (!optionalAllowed()) return;
    document.querySelectorAll('[data-external-map]').forEach(createMapFrame);
  };

  const disableOptionalResources = () => {
    disableMetrika();
    document.querySelectorAll('[data-external-map]').forEach(resetMapFrame);
  };

  const removeConsentNotice = () => {
    document.querySelector('[data-privacy-consent]')?.remove();
  };

  const clearSettingsHash = () => {
    if (window.location.hash !== '#privacy-settings') return;
    window.history.replaceState(
      null,
      '',
      `${window.location.pathname}${window.location.search}`,
    );
  };

  const saveConsent = (allowOptional) => {
    storage.set(allowOptional);
    removeConsentNotice();
    clearSettingsHash();
    if (allowOptional) {
      loadMetrika();
      loadConsentedMaps();
    } else {
      disableOptionalResources();
    }
  };

  const renderConsentNotice = ({ force = false } = {}) => {
    if (document.querySelector('[data-privacy-consent]')) return;
    if (!force && storage.get()) return;

    const notice = document.createElement('aside');
    notice.className = 'analytics-consent';
    notice.dataset.privacyConsent = '';
    notice.setAttribute('aria-labelledby', 'privacy-consent-title');
    notice.innerHTML = `
      <div class="analytics-consent__copy">
        <img class="analytics-consent__icon" src="img/figma-home/cookie.svg" alt="">
        <div>
          <strong id="privacy-consent-title">Настройки приватности</strong>
          <p>Необходимое локальное хранилище используется для сохранения выбора. Яндекс Метрика и автоматическая загрузка карт включаются только с разрешения.</p>
          <a href="privacy.html#cookies">Подробнее в Политике</a>
        </div>
      </div>
      <div class="analytics-consent__actions">
        <button type="button" data-optional-accept>Разрешить необязательные</button>
        <button type="button" data-optional-reject>Только необходимые</button>
      </div>`;
    document.body.append(notice);

    notice
      .querySelector('[data-optional-accept]')
      ?.addEventListener('click', () => saveConsent(true));
    notice
      .querySelector('[data-optional-reject]')
      ?.addEventListener('click', () => saveConsent(false));
  };

  const setFormConsentState = (form) => {
    const checkbox = form.querySelector(
      'input[type="checkbox"][name="personal-data-consent"]',
    );
    const submit = form.querySelector('[type="submit"]');
    if (!checkbox || !submit) return;

    const sync = () => {
      submit.disabled = !checkbox.checked;
      submit.setAttribute('aria-disabled', String(!checkbox.checked));
    };
    checkbox.addEventListener('change', sync);
    sync();
  };

  document.addEventListener(
    'submit',
    (event) => {
      const form = event.target.closest?.('form[data-personal-data-form]');
      if (!form) return;
      const checkbox = form.querySelector(
        'input[type="checkbox"][name="personal-data-consent"]',
      );
      if (checkbox?.checked) return;

      event.preventDefault();
      event.stopImmediatePropagation();
      checkbox?.setCustomValidity(
        'Подтвердите согласие на обработку персональных данных.',
      );
      checkbox?.reportValidity();
      checkbox?.addEventListener(
        'change',
        () => checkbox.setCustomValidity(''),
        { once: true },
      );
    },
    true,
  );

  document.addEventListener(
    'submit',
    (event) => {
      const form = event.target.closest?.('form[data-personal-data-form]');
      if (!form) return;

      const action = new URL(form.action || window.location.href, window.location.href);
      const isLocalDevelopment = ['localhost', '127.0.0.1', '::1'].includes(
        window.location.hostname,
      );
      const isSafeDestination =
        action.origin === window.location.origin &&
        (action.protocol === 'https:' || isLocalDevelopment);
      if (isSafeDestination) return;

      event.preventDefault();
      event.stopImmediatePropagation();
      const status = form.querySelector('[role="status"]');
      if (status) {
        status.textContent =
          'Отправка заблокирована: обработчик формы должен работать по HTTPS на домене сайта.';
      }
    },
    true,
  );

  document.addEventListener('click', (event) => {
    const settingsButton = event.target.closest?.('[data-privacy-settings]');
    if (!settingsButton) return;
    renderConsentNotice({ force: true });
  });

  const openSettingsFromHash = () => {
    if (window.location.hash === '#privacy-settings') {
      renderConsentNotice({ force: true });
    }
  };

  window.addEventListener('hashchange', openSettingsFromHash);

  const initPrivacyControls = () => {
    document
      .querySelectorAll('form[data-personal-data-form]')
      .forEach(setFormConsentState);

    document.querySelectorAll('[data-load-external-map]').forEach((button) => {
      button.addEventListener('click', () => {
        const container = button.closest('[data-external-map]');
        if (container) createMapFrame(container);
      });
    });

    document.querySelectorAll('[data-privacy-settings]').forEach((button) => {
      button.onclick = () => renderConsentNotice({ force: true });
    });

    if (optionalAllowed()) {
      loadMetrika();
      loadConsentedMaps();
    }
    openSettingsFromHash();
    renderConsentNotice();
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initPrivacyControls, {
      once: true,
    });
  } else {
    initPrivacyControls();
  }
})();
