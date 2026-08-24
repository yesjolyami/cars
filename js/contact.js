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
});
