document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('[data-lead-form]');
  if (!form) return;
  const status = form.querySelector('.trade-form__status');
  const phone = form.querySelector('input[name="phone"]');

  const formatRussianPhone = (value) => {
    let digits = value.replace(/\D/g, '');
    if (digits.startsWith('8')) digits = `7${digits.slice(1)}`;
    if (!digits.startsWith('7')) digits = `7${digits}`;
    digits = digits.slice(0, 11);
    const number = digits.slice(1);
    if (!number) return '+7';
    let formatted = `+7 (${number.slice(0, 3)}`;
    if (number.length >= 3) formatted += ')';
    if (number.length > 3) formatted += ` ${number.slice(3, 6)}`;
    if (number.length > 6) formatted += `-${number.slice(6, 8)}`;
    if (number.length > 8) formatted += `-${number.slice(8, 10)}`;
    return formatted;
  };

  phone?.addEventListener('focus', () => {
    if (!phone.value) phone.value = '+7';
  });
  phone?.addEventListener('input', () => {
    phone.value = formatRussianPhone(phone.value);
  });

  form.addEventListener('submit', async (event) => {
    event.preventDefault();
    if (!form.checkValidity()) {
      form.reportValidity();
      if (status) status.textContent = 'Заполните обязательные поля.';
      return;
    }
    if (typeof window.tvoeAutoSubmitLead === 'function') {
      await window.tvoeAutoSubmitLead(form, status, 'trade-in');
      return;
    }

    if (status) {
      status.textContent = 'Данные заполнены. В локальной статической версии отправка заявок не подключена.';
    }
  });
});
