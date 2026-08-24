document.addEventListener('DOMContentLoaded', () => {
  const menuButton = document.querySelector('.menu-toggle');
  const menuPanel = document.querySelector('.mobile-panel');

  if (menuButton && menuPanel) {
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
  const status = form.querySelector('.application-form__status');

  if (phone) {
    phone.addEventListener('input', () => {
      const digits = phone.value.replace(/\D/g, '').slice(0, 11);
      const normalized = digits.startsWith('8')
        ? `7${digits.slice(1)}`
        : digits.startsWith('7')
          ? digits
          : `7${digits}`;
      const parts = normalized.slice(1);
      let value = '+7';

      if (parts.length > 0) value += ` (${parts.slice(0, 3)}`;
      if (parts.length >= 3) value += ')';
      if (parts.length > 3) value += ` ${parts.slice(3, 6)}`;
      if (parts.length > 6) value += `-${parts.slice(6, 8)}`;
      if (parts.length > 8) value += `-${parts.slice(8, 10)}`;
      phone.value = value;
    });
  }

  form.addEventListener('submit', (event) => {
    event.preventDefault();

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    if (status) {
      status.textContent =
        'Форма заполнена корректно. Для реальной отправки нужно подключить обработчик заявок.';
      status.classList.add('is-visible');
    }
  });
});
