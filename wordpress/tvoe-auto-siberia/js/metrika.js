(() => {
  const assetUrl = (path) => {
    const base = window.tvoeAuto?.assetBase;
    return base ? `${base.replace(/\/$/, '')}/${path}` : path;
  };
  const pageUrl = (slug, fallback) =>
    window.tvoeAuto?.urls?.[slug] || fallback;

  // TODO(owner): вставьте только числовой ID после проверки настроек счётчика,
  // Политики и договора с Яндексом. Пока строка пустая, Метрика не загружается.
  const METRIKA_ID = String(window.tvoeAuto?.metrikaId || '');
  const CONSENT_KEY = 'tvoe-auto-privacy-consent-v1';
  const CONSENT_VERSION = '2026-09-08';
  const isValidMetrikaId = /^\d{5,12}$/.test(METRIKA_ID);
  const disableMetrikaKey = `disableYaCounter${METRIKA_ID}`;
  let metrikaStarted = false;
  let sessionConsent = null;

  // Выбор до появления категорий хранился одним флагом optional —
  // он распространяется на обе категории, чтобы не спрашивать повторно.
  const normalize = (value) =>
    value && {
      ...value,
      analytics: value.analytics ?? value.optional === true,
      maps: value.maps ?? value.optional === true,
    };

  const storage = {
    get() {
      try {
        const value = localStorage.getItem(CONSENT_KEY);
        if (!value) return normalize(sessionConsent);
        const parsed = JSON.parse(value);
        return parsed?.version === CONSENT_VERSION ? normalize(parsed) : null;
      } catch {
        return normalize(sessionConsent);
      }
    },
    set({ analytics, maps }) {
      const value = {
        version: CONSENT_VERSION,
        analytics: Boolean(analytics),
        maps: Boolean(maps),
        optional: Boolean(analytics || maps),
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

  const analyticsAllowed = () => storage.get()?.analytics === true;
  const mapsAllowed = () => storage.get()?.maps === true;

  const setMetrikaDisabled = (disabled) => {
    if (!isValidMetrikaId) return;
    window[disableMetrikaKey] = disabled;
  };

  setMetrikaDisabled(!analyticsAllowed());

  const loadMetrika = () => {
    if (!isValidMetrikaId || !analyticsAllowed() || metrikaStarted) return;

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
      'lead_sent',
    ]);
    if (!allowedGoals.has(goal) || !analyticsAllowed() || !isValidMetrikaId) {
      return;
    }

    loadMetrika();
    const resultCount = Number(params.result_count);
    const leadForms = new Set(['home', 'contact', 'trade-in', 'application']);
    const safeParams = Number.isFinite(resultCount)
      ? { result_count: Math.max(0, Math.round(resultCount)) }
      : goal === 'lead_sent' && leadForms.has(params.form)
        ? { form: params.form }
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
    if (!mapsAllowed()) return;
    document.querySelectorAll('[data-external-map]').forEach(createMapFrame);
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

  const saveConsent = (choice) => {
    storage.set(choice);
    removeConsentNotice();
    clearSettingsHash();
    if (choice.analytics) {
      loadMetrika();
    } else {
      disableMetrika();
    }
    if (choice.maps) {
      loadConsentedMaps();
    } else {
      document.querySelectorAll('[data-external-map]').forEach(resetMapFrame);
    }
  };

  const showSettings = (notice) => {
    notice.querySelector('[data-consent-settings]').hidden = false;
    notice.querySelector('[data-consent-settings-actions]').hidden = false;
    notice.querySelector('[data-consent-actions]').hidden = true;
    notice.querySelector('input[name="analytics"]')?.focus();
  };

  const renderConsentNotice = ({ force = false, settings = false } = {}) => {
    const existing = document.querySelector('[data-privacy-consent]');
    if (existing) {
      if (settings) showSettings(existing);
      return;
    }
    const current = storage.get();
    if (!force && current) return;

    const checked = (value) => (value ? ' checked' : '');
    const notice = document.createElement('aside');
    notice.className = 'analytics-consent';
    notice.dataset.privacyConsent = '';
    notice.setAttribute('role', 'dialog');
    notice.setAttribute('aria-labelledby', 'privacy-consent-title');
    notice.innerHTML = `
      <div class="analytics-consent__copy">
        <img class="analytics-consent__icon" src="${assetUrl('img/figma-home/cookie.svg')}" alt="">
        <div>
          <strong id="privacy-consent-title">Настройки cookie</strong>
          <p>Необходимое локальное хранилище сохраняет ваш выбор и работу форм. Аналитика и карты включаются только с вашего разрешения.</p>
          <a href="${pageUrl('privacy', 'privacy.html')}#cookies">Подробнее в Политике</a>
        </div>
      </div>
      <form class="analytics-consent__settings" data-consent-settings hidden>
        <label class="consent-option consent-option--locked">
          <input type="checkbox" checked disabled>
          <span><b>Необходимые</b><small>Запоминают выбор настроек и защищают формы от спама. Всегда включены.</small></span>
        </label>
        <label class="consent-option">
          <input type="checkbox" name="analytics"${checked(current?.analytics)}>
          <span><b>Аналитика</b><small>Яндекс Метрика: обезличенная статистика посещений, которая помогает улучшать сайт.</small></span>
        </label>
        <label class="consent-option">
          <input type="checkbox" name="maps"${checked(current?.maps)}>
          <span><b>Карты</b><small>Автоматическая загрузка Яндекс Карт. Яндекс получит IP-адрес и технические сведения о браузере.</small></span>
        </label>
      </form>
      <div class="analytics-consent__actions" data-consent-actions>
        <button type="button" data-consent-accept-all>Принять все</button>
        <button type="button" data-consent-reject>Только необходимые</button>
        <button type="button" class="analytics-consent__link" data-consent-customize>Настроить</button>
      </div>
      <div class="analytics-consent__actions" data-consent-settings-actions hidden>
        <button type="button" data-consent-save>Сохранить выбор</button>
        <button type="button" data-consent-accept-all>Принять все</button>
      </div>
      ${current ? '<button type="button" class="analytics-consent__close" data-consent-close aria-label="Закрыть без изменений">×</button>' : ''}`;
    document.body.append(notice);

    const form = notice.querySelector('[data-consent-settings]');
    notice
      .querySelectorAll('[data-consent-accept-all]')
      .forEach((button) =>
        button.addEventListener('click', () =>
          saveConsent({ analytics: true, maps: true }),
        ),
      );
    notice
      .querySelector('[data-consent-reject]')
      ?.addEventListener('click', () =>
        saveConsent({ analytics: false, maps: false }),
      );
    notice
      .querySelector('[data-consent-customize]')
      ?.addEventListener('click', () => showSettings(notice));
    notice
      .querySelector('[data-consent-save]')
      ?.addEventListener('click', () =>
        saveConsent({
          analytics: form.elements.analytics.checked,
          maps: form.elements.maps.checked,
        }),
      );

    // Закрыть без изменений можно, только если выбор уже был сделан раньше.
    if (current) {
      const close = () => {
        removeConsentNotice();
        clearSettingsHash();
      };
      notice.querySelector('[data-consent-close]')?.addEventListener('click', close);
      notice.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') close();
      });
    }

    if (settings) showSettings(notice);
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

  // Ссылка «Настройки cookie» в подвале и на странице Политики сразу открывает переключатели.
  document.addEventListener('click', (event) => {
    const settingsButton = event.target.closest?.('[data-privacy-settings]');
    if (!settingsButton) return;
    event.preventDefault();
    renderConsentNotice({ force: true, settings: true });
  });

  const openSettingsFromHash = () => {
    if (window.location.hash === '#privacy-settings') {
      renderConsentNotice({ force: true, settings: true });
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

    if (analyticsAllowed()) loadMetrika();
    if (mapsAllowed()) loadConsentedMaps();
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
