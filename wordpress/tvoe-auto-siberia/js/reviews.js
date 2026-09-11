document.addEventListener('DOMContentLoaded',()=>{
  const button=document.querySelector('.menu-toggle');
  const panel=document.querySelector('.mobile-panel');
  if(!button||!panel)return;
  // WordPress loads the shared menu script before this page-specific script.
  // Do not bind a second toggle handler: two handlers open and close the menu
  // in the same click, making the burger appear unresponsive.
  if(button.dataset.menuBound==='true')return;
  button.dataset.menuBound='true';
  const close=()=>{document.body.classList.remove('menu-open');panel.classList.remove('is-open');button.setAttribute('aria-expanded','false')};
  button.addEventListener('click',()=>{const open=!panel.classList.contains('is-open');document.body.classList.toggle('menu-open',open);panel.classList.toggle('is-open',open);button.setAttribute('aria-expanded',String(open))});
  panel.querySelectorAll('a').forEach(link=>link.addEventListener('click',close));
  document.addEventListener('keydown',event=>{if(event.key==='Escape')close()});
});
