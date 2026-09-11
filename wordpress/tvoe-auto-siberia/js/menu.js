const initMenu = () => {
  const assetUrl=(path)=>{
    const base=window.tvoeAuto?.assetBase;
    return base?`${base.replace(/\/$/,'')}/${path}`:path;
  };
  const pageUrl=(slug,fallback)=>window.tvoeAuto?.urls?.[slug]||fallback;
  const button=document.querySelector('.menu-toggle');
  const panel=document.querySelector('.mobile-panel');
  if(button&&panel){
    const menuNav=panel.querySelector('nav');
    const menuFooter=panel.querySelector('.mobile-panel__footer');
    if(menuNav) menuNav.innerHTML=`
      <a href="${pageUrl('catalog','catalog.html')}">Автомобили</a>
      <a href="${pageUrl('installment','installment.html')}">Рассрочка</a>
      <a href="${pageUrl('selection','selection.html')}">Автоподбор</a>
      <a href="${pageUrl('trade-in','trade-in.html')}">Trade-in</a>
      <a href="${pageUrl('rent-to-own','rent-to-own.html')}">Аренда с выкупом</a>
      <a href="${pageUrl('contact','contact.html')}">Связаться</a>
      <a href="${pageUrl('faq','faq.html')}">Частые вопросы</a>
      <a href="${pageUrl('news','news.html')}">Блог</a>`;
    if(menuFooter) menuFooter.innerHTML=`
      <p class="mobile-panel__social-copy">АВТОМОБИЛИ, ОБЗОРЫ, УСЛОВИЯ В<br>НАШИХ СОЦ СЕТЯХ — ПОДПИСЫВАЙТЕСЬ</p>
      <div class="mobile-panel__socials" aria-label="Социальные сети">
        <a href="https://vk.ru/tvoeavtosibir" target="_blank" rel="noopener noreferrer" aria-label="ВКонтакте"><img src="${assetUrl('img/figma-catalog/vk.svg')}" alt=""></a>
        <a href="https://t.me/zaurguliev" target="_blank" rel="noopener noreferrer" aria-label="Telegram"><img src="${assetUrl('img/figma-catalog/tg.svg')}" alt=""></a>
        <a href="https://max.ru/u/f9LHodD0cOIUivXn20beSQhbKedn7hrTKBBsMGf1t2Tjr3zL1KJ-W_a5pi0" target="_blank" rel="noopener noreferrer" aria-label="MAX"><img src="${assetUrl('img/figma-catalog/max.svg')}" alt=""></a>
        <a href="https://wa.me/79132431855" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><img src="${assetUrl('img/figma-catalog/wa.svg')}" alt=""></a>
      </div>`;
    if(button.dataset.menuBound!=='true'){
      button.dataset.menuBound='true';
      const close=()=>{document.body.classList.remove('menu-open');panel.classList.remove('is-open');button.setAttribute('aria-expanded','false')};
      button.addEventListener('click',()=>{const open=!panel.classList.contains('is-open');document.body.classList.toggle('menu-open',open);panel.classList.toggle('is-open',open);button.setAttribute('aria-expanded',String(open))});
      panel.querySelectorAll('a').forEach(link=>link.addEventListener('click',close));
      document.addEventListener('keydown',event=>{if(event.key==='Escape')close()});
    }
  }

  document.querySelectorAll('.site-footer').forEach(footer=>{
    if(footer.querySelector('.footer-grid'))return;
    footer.insertAdjacentHTML('afterbegin','<div class="container"><div class="footer-grid"><div class="footer-brand"><a class="logo" href="index.html"><span class="logo__mark">Т</span>Твоё<br>Авто</a><p>Рассрочка, аренда с выкупом, Trade-in и бесплатный автоподбор по Сибири.</p><a class="footer-phone" href="tel:+79132431855">+7 (913) 243-18-55</a><div class="socials"><a href="https://vk.ru/tvoeavtosibir" target="_blank" rel="noopener noreferrer" aria-label="ВКонтакте">VK</a><a href="https://t.me/zaurguliev" target="_blank" rel="noopener noreferrer" aria-label="Telegram">TG</a><a href="https://wa.me/79132431855" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">WA</a></div></div><div class="footer-col"><h3>Услуги</h3><a href="catalog.html">Автомобили</a><a href="installment.html">Рассрочка</a><a href="rent-to-own.html">Аренда с выкупом</a><a href="trade-in.html">Trade-in</a></div><div class="footer-col"><h3>Компания</h3><a href="news.html">Новости</a><a href="reviews.html">Отзывы</a><a href="faq.html">Вопросы и ответы</a><a href="contact.html">Контакты</a><a href="privacy.html">Политика обработки персональных данных</a><a href="personal-data-consent.html">Согласие на обработку персональных данных</a><a href="#privacy-settings" data-privacy-settings>Настройки cookie</a></div><div class="footer-col"><h3>Города</h3><span>Барнаул</span><span>Новосибирск</span><span>Кемерово</span><span>Бийск</span></div></div></div>');
  });

  const page=window.tvoeAuto?.pageKey
    ? `${window.tvoeAuto.pageKey}.html`
    : location.pathname.split('/').pop()||'index.html';
  const figmaCopy={
    'catalog.html':{eyebrow:'Каталог',title:'Автомобили, доступные для оформления',lead:'Выберите вариант или оставьте заявку на подбор аналогичного автомобиля.'},
    'installment.html':{eyebrow:'Рассрочка без банка',title:'Автомобиль в рассрочку напрямую через компанию',lead:'Подберём автомобиль и предложим индивидуальный сценарий оформления без банковского автокредита.'},
    'rent-to-own.html':{eyebrow:'Аренда с правом выкупа',title:'Пользуйтесь сейчас — выкупайте постепенно',lead:'Автомобиль остаётся в пользовании, а условия последующего выкупа заранее фиксируются в договоре.'},
    'trade-in.html':{eyebrow:'Trade-in',title:'Ваш автомобиль может стать первоначальным взносом',lead:'Оценим текущий автомобиль, объясним расчёт и поможем подобрать следующий вариант.'},
    'news.html':{eyebrow:'Новости компании',title:'Новости, выдачи и полезные материалы',lead:'Рассказываем о новых поступления, выдачах автомобилей и деталях работы компании.'},
    'faq.html':{eyebrow:'Вопросы и ответы',title:'Вопросы и ответы',lead:'О рассрочке, выкупе, подборе, проверке и документах.'},
    'contact.html':{eyebrow:'Контакты',title:'Контакты',lead:'Свяжитесь с нами удобным способом или оставьте короткую заявку — ответим на вопросы и подскажем следующий шаг.'},
    'reviews.html':{eyebrow:'Отзывы клиентов',title:'Решение, которому доверяют после личного разговора',lead:'Собрали истории клиентов и отзывы из привычных сервисов.'}
  };
  const copy=figmaCopy[page];
  if(copy){
    document.body.dataset.figmaPage=page.replace('.html','');
    const scope=document.querySelector('.page-hero,.service-hero')||document.querySelector('main');
    const eyebrow=scope.querySelector('.eyebrow');
    const title=scope.querySelector('h1');
    const lead=scope.querySelector('.lead');
    if(eyebrow)eyebrow.textContent=copy.eyebrow;
    if(title)title.textContent=copy.title;
    if(lead)lead.textContent=copy.lead;
  }
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initMenu, { once: true });
} else {
  initMenu();
}
