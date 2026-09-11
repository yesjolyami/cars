document.addEventListener('DOMContentLoaded',()=>{
  const button=document.querySelector('.menu-toggle');
  const panel=document.querySelector('.mobile-panel');
  if(button&&panel&&button.dataset.menuBound!=='true'){
    button.dataset.menuBound='true';
    const close=()=>{
      document.body.classList.remove('menu-open');
      panel.classList.remove('is-open');
      button.setAttribute('aria-expanded','false');
    };
    button.addEventListener('click',()=>{
      const open=!panel.classList.contains('is-open');
      document.body.classList.toggle('menu-open',open);
      panel.classList.toggle('is-open',open);
      button.setAttribute('aria-expanded',String(open));
    });
    panel.querySelectorAll('a').forEach(link=>link.addEventListener('click',close));
    document.addEventListener('keydown',event=>{if(event.key==='Escape')close()});
  }

  const form = document.querySelector('form[data-personal-data-form]');
  const phone = form?.querySelector('input[name="phone"]');
  const status = form?.querySelector('.contact-form__status');
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
  form?.addEventListener('submit', async (event) => {
    event.preventDefault();
    if (!form.checkValidity()) {
      form.reportValidity();
      if (status) status.textContent = 'Заполните обязательные поля.';
      return;
    }
    if (typeof window.tvoeAutoSubmitLead === 'function') {
      try {
        await window.tvoeAutoSubmitLead(form, status, 'contact');
      } catch (error) {
        if (status) status.textContent = error instanceof Error ? error.message : 'Ошибка отправки. Позвоните нам.';
      }
      return;
    }
  });
});
