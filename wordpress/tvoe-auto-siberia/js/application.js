document.addEventListener('DOMContentLoaded', () => {
  const menuButton = document.querySelector('.menu-toggle');
  const menuPanel = document.querySelector('.mobile-panel');

  if (menuButton && menuPanel && menuButton.dataset.menuBound !== 'true') {
    menuButton.dataset.menuBound = 'true';
    const closeMenu = () => {
      document.body.classList.remove('menu-open');
      menuPanel.classList.remove('is-open');
      menuButton.setAttribute('aria-expanded', 'false');
      menuButton.setAttribute('aria-label', 'Открыть меню');
    };

    menuButton.addEventListener('click', () => {
      const willOpen = !menuPanel.classList.contains('is-open');
      document.body.classList.toggle('menu-open', willOpen);
      menuPanel.classList.toggle('is-open', willOpen);
      menuButton.setAttribute('aria-expanded', String(willOpen));
      menuButton.setAttribute(
        'aria-label',
        willOpen ? 'Закрыть меню' : 'Открыть меню',
      );
    });

    menuPanel.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', closeMenu);
    });
    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape') closeMenu();
    });
  }

  const form = document.querySelector('[data-client-application]');
  if (!form) return;

  const phone = form.querySelector('input[name="phone"]');
  const foreignPhone = form.querySelector('input[name="foreign-phone"]');
  const status = form.querySelector('.application-form__status');

  if (phone) {
    const russianPattern = '\\+7 \\([0-9]{3}\\) [0-9]{3}-[0-9]{2}-[0-9]{2}';

    const formatRussianPhone = () => {
      const digits = phone.value.replace(/\D/g, '');
      const parts = (digits.startsWith('7') || digits.startsWith('8')
        ? digits.slice(1)
        : digits
      ).slice(0, 10);
      let value = '+7';

      if (parts.length > 0) value += ` (${parts.slice(0, 3)}`;
      if (parts.length >= 3) value += ')';
      if (parts.length > 3) value += ` ${parts.slice(3, 6)}`;
      if (parts.length > 6) value += `-${parts.slice(6, 8)}`;
      if (parts.length > 8) value += `-${parts.slice(8, 10)}`;
      phone.value = value;
    };

    const updatePhoneMode = () => {
      const isForeign = Boolean(foreignPhone?.checked);

      phone.placeholder = isForeign
        ? 'Например, +1 202 555 01 25'
        : '+7 (___) ___-__-__';
      phone.pattern = isForeign ? '[+0-9 ()-]{7,24}' : russianPattern;
      phone.maxLength = isForeign ? 24 : 18;
      phone.title = isForeign
        ? 'Введите номер телефона вместе с кодом страны'
        : 'Введите российский номер полностью: +7 (999) 999-99-99';

      if (isForeign && phone.value === '+7') phone.value = '';
      if (!isForeign && phone.value) formatRussianPhone();
    };

    phone.addEventListener('focus', () => {
      if (!foreignPhone?.checked && !phone.value) phone.value = '+7';
    });
    phone.addEventListener('input', () => {
      if (!foreignPhone?.checked) formatRussianPhone();
    });
    foreignPhone?.addEventListener('change', updatePhoneMode);
    updatePhoneMode();
  }

  form.addEventListener('submit', async (event) => {
    event.preventDefault();

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    if (typeof window.tvoeAutoSubmitLead === 'function') {
      await window.tvoeAutoSubmitLead(form, status, 'application');
      status?.classList.add('is-visible');
      return;
    }

    if (status) {
      status.textContent = 'Форма заполнена корректно. В локальной статической версии отправка заявок не подключена.';
      status.classList.add('is-visible');
    }
  });
});
