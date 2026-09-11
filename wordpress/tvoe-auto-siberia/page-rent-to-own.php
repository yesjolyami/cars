<?php
/**
 * Template Name: Аренда с выкупом
 * Template Post Type: page
 */
get_header( null, array(
    'body_class' => 'rent-page',
    'page_key'   => 'rent-to-own',
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
            >Рассчитать аренду</a
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

    <main class="rent-main">
      <section class="rent-hero" aria-labelledby="rent-title">
        <div class="rent-hero__image">
          <img fetchpriority="high" decoding="async"
            src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-rent/hero.webp' ) ); ?>"
            alt="Синий автомобиль Toyota у каменной арки"
          />
        </div>
        <div class="rent-hero__copy">
          <p class="rent-kicker">Аренда с правом выкупа</p>
          <h1 id="rent-title">
            Пользуйтесь сейчас —<br />
            выкупайте постепенно
          </h1>
          <p>
            Автомобиль передаётся вам по договору аренды. После выполнения
            согласованных условий он переходит в вашу собственность.
          </p>
          <div class="rent-hero__buttons">
            <a class="rent-button rent-button--red site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
              >Рассчитать аренду
              <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt="" /></a
            ><a
              class="rent-button rent-button--outline site-cta site-cta--secondary"
              href="<?php echo esc_url( tvoe_auto_page_url( 'catalog' ) . '' ); ?>"
              >Выбрать автомобиль</a
            >
          </div>
        </div>
      </section>

      <section class="rent-route" aria-labelledby="route-title">
        <div class="rent-route__intro">
          <p class="rent-kicker">Маршрут владения</p>
          <h2 id="route-title">
            Пользование авто<br />
            связано с последующим<br />
            выкупом
          </h2>
          <p>
            Порядок платежей, пользования и перехода автомобиля в собственность
            закрепляется в договоре.
          </p>
        </div>
        <ol class="rent-route__list">
          <li>
            <span>01</span><strong>Выбираете<br />автомобиль</strong>
          </li>
          <li>
            <span>02</span><strong>Согласовываете<br />график</strong>
          </li>
          <li>
            <span>03</span><strong>Пользуетесь<br />автомобилем</strong>
          </li>
          <li>
            <span>04</span><strong>Выполняете условия<br />выкупа</strong>
          </li>
        </ol>
      </section>

      <section class="rent-contract" aria-labelledby="contract-title">
        <div class="rent-contract__heading">
          <div>
            <p class="rent-kicker">До подписания</p>
            <h2 id="contract-title">Что должно быть понятно из договора</h2>
          </div>
          <p>
            Не прячем смысл продукта за финансовыми формулировками — объясняем
            каждый следующий шаг простым языком.
          </p>
        </div>
        <div class="rent-contract__cards">
          <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/metric-time.svg' ) ); ?>" alt="" />
            <div>
              <h3>Срок и график</h3>
              <p>Когда и в каком порядке вносятся согласованные платежи.</p>
            </div>
          </article>
          <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/service-rent.svg' ) ); ?>" alt="" />
            <div>
              <h3>Порядок пользования</h3>
              <p>На каких условиях клиент пользуется выбранным автомобилем.</p>
            </div>
          </article>
          <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/doc-ver.svg' ) ); ?>" alt="" />
            <div>
              <h3>Условия выкупа</h3>
              <p>Когда и как автомобиль переходит в собственность клиента.</p>
            </div>
          </article>
          <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/red-chat.svg' ) ); ?>" alt="" />
            <div>
              <h3>Сопровождение</h3>
              <p>К кому обратиться, если по ходу договора возникнут вопросы.</p>
            </div>
          </article>
        </div>
      </section>

      <section class="rent-cars" aria-labelledby="rent-cars-title">
        <div class="rent-cars__heading">
          <p class="rent-kicker">Выбор автомобиля</p>
          <h2 id="rent-cars-title">
            Автомобили, с которых можно начать<br />
            выбор
          </h2>
        </div>
        <div class="rent-cars__grid">
          <?php if ( tvoe_auto_render_rent_cars() ) : ?>
          <?php else : ?>
            <p class="rent-cars__empty">Актуальные автомобили для аренды с выкупом уточнит менеджер.</p>
          <?php endif; ?>
          <?php if ( false ) : ?>
          <article class="rent-car">
            <a class="rent-car__photo" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
              ><img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>"
                alt="Белый Graphite Cross"
            /></a>
            <div class="rent-car__body">
              <div class="rent-car__title">
                <h3>Graphite Cross</h3>
                <p>2021 · 2.0 · AT · 4WD</p>
              </div>
              <div class="rent-car__terms">
                <span>Первый взнос<b>от 438 000 ₽</b></span
                ><span>Платёж<b>от 42 900 ₽/мес.</b></span>
              </div>
              <a
                class="rent-car__button site-cta site-cta--secondary"
                href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                >Узнать условия
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt="" /></a
              ><small
                >Расчёт предварительный и не является публичной офертой.</small
              >
            </div>
          </article>
          <article class="rent-car">
            <a class="rent-car__photo" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
              ><img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>"
                alt="Белый Graphite Cross"
            /></a>
            <div class="rent-car__body">
              <div class="rent-car__title">
                <h3>Graphite Cross</h3>
                <p>2021 · 2.0 · AT · 4WD</p>
              </div>
              <div class="rent-car__terms">
                <span>Первый взнос<b>от 438 000 ₽</b></span
                ><span>Платёж<b>от 42 900 ₽/мес.</b></span>
              </div>
              <a
                class="rent-car__button site-cta site-cta--secondary"
                href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                >Узнать условия
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt="" /></a
              ><small
                >Расчёт предварительный и не является публичной офертой.</small
              >
            </div>
          </article>
          <article class="rent-car">
            <a class="rent-car__photo" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
              ><img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>"
                alt="Белый Graphite Cross"
            /></a>
            <div class="rent-car__body">
              <div class="rent-car__title">
                <h3>Graphite Cross</h3>
                <p>2021 · 2.0 · AT · 4WD</p>
              </div>
              <div class="rent-car__terms">
                <span>Первый взнос<b>от 438 000 ₽</b></span
                ><span>Платёж<b>от 42 900 ₽/мес.</b></span>
              </div>
              <a
                class="rent-car__button site-cta site-cta--secondary"
                href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                >Узнать условия
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt="" /></a
              ><small
                >Расчёт предварительный и не является публичной офертой.</small
              >
            </div>
          </article>
          <?php endif; ?>
        </div>
        <a class="rent-cars__all" href="<?php echo esc_url( tvoe_auto_page_url( 'catalog' ) . '' ); ?>"
          >Весь каталог <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt=""
        /></a>
      </section>

      <section class="rent-faq" aria-labelledby="rent-faq-title">
        <div class="rent-faq__intro">
          <p class="rent-kicker">Коротко о важном</p>
          <h2 id="rent-faq-title">Вопросы по <br />услуге</h2>
          <p>
            Если вашей ситуации нет в списке, начните с короткой консультации.
          </p>
          <a href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
            ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/black-chat.svg' ) ); ?>" alt="" />Задать свой вопрос</a
          >
        </div>
        <div class="rent-accordion">
          <article class="accordion-item">
            <button
              class="accordion-trigger"
              type="button"
              aria-expanded="true"
            >
              Когда автомобиль переходит в собственность?<span
                aria-hidden="true"
              ></span>
            </button>
            <div class="accordion-panel is-open">
              После выполнения условий выкупа, которые заранее фиксируются в
              договоре.
            </div>
          </article>
          <article class="accordion-item">
            <button
              class="accordion-trigger"
              type="button"
              aria-expanded="false"
            >
              Можно выбрать автомобиль самостоятельно?<span
                aria-hidden="true"
              ></span>
            </button>
            <div class="accordion-panel">
              Да. Можно выбрать автомобиль из каталога или обсудить подбор
              подходящего варианта.
            </div>
          </article>
          <article class="accordion-item">
            <button
              class="accordion-trigger"
              type="button"
              aria-expanded="false"
            >
              Одинаковы ли условия для всех?<span aria-hidden="true"></span>
            </button>
            <div class="accordion-panel">
              Нет. Условия зависят от выбранного автомобиля и ситуации клиента.
            </div>
          </article>
        </div>
      </section>
    </main>

    <section class="rent-final" aria-labelledby="rent-final-title">
      <div>
        <p>
          <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/red-chat.svg' ) ); ?>" alt="" />Консультация без
          обязательств
        </p>
        <h2 id="rent-final-title">Рассчитаем подходящий сценарий оформления</h2>
      </div>
      <a class="rent-button rent-button--red site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
        >Рассчитать аренду с выкупом</a
      >
    </section>

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
