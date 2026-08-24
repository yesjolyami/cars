document.addEventListener('DOMContentLoaded', () => {
  const cookieNotice = document.querySelector('.cookie-notice');
  const cookieButton = document.querySelector('[data-cookie-dismiss]');

  cookieButton?.addEventListener('click', () => {
    cookieNotice.hidden = true;
  });

  const form = document.querySelector('.contact-form');
  const status = form?.querySelector('.contact-form__status');

  form?.addEventListener('submit', (event) => {
    event.preventDefault();

    if (!form.checkValidity()) {
      form.reportValidity();
      if (status) status.textContent = 'Заполните обязательные поля.';
      return;
    }

    if (status) status.textContent = 'Данные заполнены. Отправка будет подключена отдельно.';
  });
});
