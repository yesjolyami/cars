document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('[data-lead-form]');
  if (!form) return;
  const status = form.querySelector('.trade-form__status');

  // The static page is not connected to a lead-delivery backend yet.
  form.addEventListener('submit', (event) => {
    event.preventDefault();
    if (!form.checkValidity()) {
      form.reportValidity();
      if (status) status.textContent = 'Заполните обязательные поля.';
      return;
    }
    if (status) {
      status.textContent =
        'Данные заполнены. Безопасный серверный обработчик заявок нужно подключить отдельно.';
    }
  });
});
