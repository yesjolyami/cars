document.addEventListener('DOMContentLoaded',()=>{
  const menuButton=document.querySelector('.menu-toggle');
  const menuPanel=document.querySelector('.mobile-panel');
  if(menuButton&&menuPanel){
    const closeMenu=()=>{
      document.body.classList.remove('menu-open');
      menuPanel.classList.remove('is-open');
      menuButton.setAttribute('aria-expanded','false');
    };
    menuButton.addEventListener('click',()=>{
      const open=!menuPanel.classList.contains('is-open');
      document.body.classList.toggle('menu-open',open);
      menuPanel.classList.toggle('is-open',open);
      menuButton.setAttribute('aria-expanded',String(open));
    });
    menuPanel.querySelectorAll('a').forEach(link=>link.addEventListener('click',closeMenu));
    document.addEventListener('keydown',event=>{if(event.key==='Escape')closeMenu()});
  }

  const filters=[...document.querySelectorAll('[data-news-filter]')];
  const cards=[...document.querySelectorAll('[data-news-category]')];
  const emptyState=document.querySelector('[data-news-empty]');
  if(!filters.length||!cards.length)return;

  filters.forEach(button=>button.addEventListener('click',()=>{
    const category=button.dataset.newsFilter;
    filters.forEach(item=>{
      const active=item===button;
      item.classList.toggle('is-active',active);
      item.setAttribute('aria-pressed',String(active));
    });
    const visibleCards=cards.filter(card=>category==='all'||card.dataset.newsCategory===category);
    cards.forEach(card=>{card.hidden=!visibleCards.includes(card)});
    if(emptyState)emptyState.hidden=visibleCards.length!==0;
    const url=new URL(location.href);
    if(category==='all')url.searchParams.delete('category');
    else url.searchParams.set('category',category);
    history.replaceState(null,'',`${url.pathname}${url.search}${url.hash}`);
    window.trackGoal?.('news_filter',{category,result_count:visibleCards.length});
  }));

  const initialCategory=new URLSearchParams(location.search).get('category');
  filters.find(button=>button.dataset.newsFilter===initialCategory)?.click();
});
