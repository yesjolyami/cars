<?php
/**
 * Template Name: Вопросы и ответы
 * Template Post Type: page
 */
get_header( null, array(
    'body_class' => '',
    'page_key'   => 'faq',
) );
?>
<header class="site-header">
      <div class="header-wrap">
        <a
          class="brand"
          href="<?php echo esc_url( tvoe_auto_page_url( 'home' ) . '' ); ?>"
          aria-label="Твоё Авто Сибирь — на главную"
          ><img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/logo-figma.webp' ) ); ?>" alt="Твоё Авто Сибирь"
        /></a>
        <nav class="main-nav" aria-label="Основная навигация">
          <a href="<?php echo esc_url( tvoe_auto_page_url( 'catalog' ) . '' ); ?>">Автомобили</a
          ><a href="<?php echo esc_url( tvoe_auto_page_url( 'installment' ) . '' ); ?>">Рассрочка</a
          ><a href="<?php echo esc_url( tvoe_auto_page_url( 'rent-to-own' ) . '' ); ?>">Аренда с выкупом</a
          ><a href="<?php echo esc_url( tvoe_auto_page_url( 'trade-in' ) . '' ); ?>">Trade-in</a
          ><a href="<?php echo esc_url( tvoe_auto_page_url( 'selection' ) . '' ); ?>">Автоподбор</a>
        </nav>
        <div class="header-actions">
          <a class="header-phone" href="tel:+79132431855"
            ><img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/phone.svg' ) ); ?>" alt="" />+7 (913) 243-18-55</a
          ><a class="header-cta site-cta site-cta--header" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
            >Задать вопрос</a
          >
        </div>
        <button
          class="menu-toggle"
          type="button"
          aria-label="Открыть меню"
          aria-expanded="false"
        >
          <span></span><span></span><span></span>
        </button>
      </div>
    </header>
    <aside class="mobile-panel" aria-label="Мобильное меню">
      <nav>
        <a href="<?php echo esc_url( tvoe_auto_page_url( 'catalog' ) . '' ); ?>">Автомобили</a
        ><a href="<?php echo esc_url( tvoe_auto_page_url( 'installment' ) . '' ); ?>">Рассрочка</a
        ><a href="<?php echo esc_url( tvoe_auto_page_url( 'rent-to-own' ) . '' ); ?>">Аренда с выкупом</a
        ><a href="<?php echo esc_url( tvoe_auto_page_url( 'trade-in' ) . '' ); ?>">Trade-in</a
        ><a href="<?php echo esc_url( tvoe_auto_page_url( 'selection' ) . '' ); ?>">Автоподбор</a>
      </nav>
      <div class="mobile-panel__footer">
        <a href="tel:+79132431855">+7 (913) 243-18-55</a>
      </div>
    </aside>
    <main>
      <section class="page-hero">
        <div class="container">
          <div class="breadcrumbs">
            <a href="<?php echo esc_url( tvoe_auto_page_url( 'home' ) . '' ); ?>">Главная</a><span>/</span
            ><span>Вопросы и ответы</span>
          </div>
          <span class="eyebrow">Коротко о важном</span>
          <h1>Частые вопросы</h1>
          <p class="lead">
            Собрали ответы о подборе, рассрочке, аренде с выкупом и trade-in.
            Если не нашли свой вопрос — напишите нам.
          </p>
        </div>
      </section>
      <section class="section">
        <div class="container">
          <div class="faq-tabs" role="group" aria-label="Категории вопросов">
            <button class="is-active" type="button" data-faq-filter="all" aria-pressed="true">Все вопросы</button
            ><button type="button" data-faq-filter="installment" aria-pressed="false">Рассрочка</button
            ><button type="button" data-faq-filter="rent" aria-pressed="false">Аренда с выкупом</button
            ><button type="button" data-faq-filter="trade" aria-pressed="false">Trade-in</button
            ><button type="button" data-faq-filter="selection" aria-pressed="false">Автоподбор</button>
          </div>
          <div class="accordion faq-accordion">
            <article class="accordion-item" data-faq-categories="installment rent">
              <button class="accordion-trigger" aria-expanded="true">
                Это банковский автокредит?
              </button>
              <div class="accordion-panel is-open">
                Нет. Автомобиль оформляется напрямую через компанию. Конкретная
                схема зависит от выбранного продукта и определяется
                индивидуально.
              </div>
            </article>
            <article class="accordion-item" data-faq-categories="installment rent">
              <button class="accordion-trigger" aria-expanded="false">
                Можно обратиться с плохой кредитной историей?
              </button>
              <div class="accordion-panel">
                Да. Кредитная история и действующие задолженности не являются
                автоматической причиной для отказа — разберём вашу ситуацию.
              </div>
            </article>
            <article class="accordion-item" data-faq-categories="selection">
              <button class="accordion-trigger" aria-expanded="false">
                Подбор автомобиля действительно бесплатный?
              </button>
              <div class="accordion-panel">
                Да, мы не берём отдельную оплату за помощь в подборе и первичной
                проверке вариантов.
              </div>
            </article>
            <article class="accordion-item" data-faq-categories="trade">
              <button class="accordion-trigger" aria-expanded="false">
                Можно использовать мой автомобиль как первый взнос?
              </button>
              <div class="accordion-panel">
                Да, предварительно оценим его и объясним, как учесть стоимость
                при оформлении следующего автомобиля.
              </div>
            </article>
            <article class="accordion-item" data-faq-categories="installment rent trade selection">
              <button class="accordion-trigger" aria-expanded="false">
                В каких городах вы работаете?
              </button>
              <div class="accordion-panel">
                В Барнауле, Бийске, Новосибирске, Кемерово и других городах
                Сибири. Начать консультацию можно онлайн.
              </div>
            </article>
            <p class="faq-empty" data-faq-empty role="status" hidden>
              В этой категории пока нет вопросов.
            </p>
          </div>
        </div>
      </section>
      <section class="cta-band">
        <div class="container cta-band__inner">
          <h2>Не нашли нужный ответ?</h2>
          <a class="btn btn--primary site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
            >Задать вопрос</a
          >
        </div>
      </section>
    </main>

    <footer class="site-footer">
      <div class="frame">
        <div class="footer-grid">
          <div class="footer-brand">
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/logo-figma.webp' ) ); ?>" alt="Твоё Авто Сибирь" />
            <p>
              Рассрочка, аренда с выкупом, Trade-in и бесплатный автоподбор по
              Сибири.
            </p>
            <a href="tel:+79132431855">+7 (913) 243-18-55</a>
            <div class="footer-social">
              <a href="https://vk.ru/tvoeavtosibir" target="_blank" rel="noopener noreferrer" aria-label="ВКонтакте"
                ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/vk.svg' ) ); ?>" alt="" /></a
              ><a href="https://t.me/zaurguliev" target="_blank" rel="noopener noreferrer" aria-label="Telegram"
                ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/tg.svg' ) ); ?>" alt="" /></a
              ><a href="https://max.ru/u/f9LHodD0cOIUivXn20beSQhbKedn7hrTKBBsMGf1t2Tjr3zL1KJ-W_a5pi0" target="_blank" rel="noopener noreferrer" aria-label="MAX"
                ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/max.svg' ) ); ?>" alt="" /></a
              ><a href="https://wa.me/79132431855" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/wa.svg' ) ); ?>" alt=""
              /></a>
            </div>
          </div>
          <div>
            <h3>Услуги</h3>
            <a href="<?php echo esc_url( tvoe_auto_page_url( 'catalog' ) . '' ); ?>">Автомобили</a
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'installment' ) . '' ); ?>">Рассрочка</a
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'rent-to-own' ) . '' ); ?>">Аренда с выкупом</a
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'trade-in' ) . '' ); ?>">Trade-in</a>
          </div>
          <div>
            <h3>Информация</h3>
            <a href="<?php echo esc_url( tvoe_auto_page_url( 'news' ) . '' ); ?>">Новости и выдачи</a
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'selection' ) . '' ); ?>">Автоподбор</a
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'reviews' ) . '' ); ?>">Отзывы</a
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'faq' ) . '' ); ?>">Вопросы и ответы</a
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>">Контакты</a>
          </div>
          <div class="footer-coverage footer-legal">
            <h3>Документы</h3>
            <a href="<?php echo esc_url( tvoe_auto_page_url( 'privacy' ) . '' ); ?>">Политика обработки персональных данных</a
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'personal-data-consent' ) . '' ); ?>"
              >Согласие на обработку персональных данных</a
            ><a href="#privacy-settings" data-privacy-settings>Настройки cookie</a>
          </div>
        </div>
        <div class="footer-bottom">
          <p>© 2026 «Твоё Авто Сибирь»</p>
          <p>
            Все расчёты на сайте являются предварительными и не являются
            публичной офертой. Итоговые условия определяются после
            индивидуального рассмотрения заявки.
          </p>
          <div class="footer-credit">
            <span><a href="https://xo-webstudio.ru/" target="_blank" rel="noopener noreferrer">Разработано маркетинговым агентством XO-STUDIO</a></span>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/xo.svg' ) ); ?>" alt="" />
          </div>
        </div>
      </div>
    </footer>
    <a
      class="site-yandex-link"
      href="https://yandex.ru/navi/org/tvoyo_avto_sibir/96736411134"
      target="_blank"
      rel="noopener noreferrer"
    >
    </a>
<?php get_footer(); ?>
