document.addEventListener('DOMContentLoaded',()=>{
  const button=document.querySelector('.menu-toggle');
  const panel=document.querySelector('.mobile-panel');
  if(!button||!panel)return;

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

  const form = document.querySelector('form[data-personal-data-form]');
  const status = form?.querySelector('.contact-form__status');
  form?.addEventListener('submit', (event) => {
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
