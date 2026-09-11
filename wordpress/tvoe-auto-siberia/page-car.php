<?php
/**
 * Template Name: Карточка автомобиля
 * Template Post Type: page
 */
get_header( null, array(
    'body_class' => 'detail-page',
    'page_key'   => 'car',
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
            >Узнать условия</a
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

    <?php if ( is_singular( 'auto_car' ) ) : ?>
      <?php tvoe_auto_render_car_detail( get_queried_object_id() ); ?>
    <?php else : ?>
    <main class="detail-main">
      <section class="detail-product">
        <div class="detail-product__grid">
          <div class="detail-gallery">
            <div
              class="detail-gallery__main"
              tabindex="0"
              role="button"
              aria-haspopup="dialog"
              aria-label="Открыть фотографию 1 из 3. Используйте стрелки для листания"
            >
              <img fetchpriority="high" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-car/graphite-cross.webp' ) ); ?>"
                alt="Автомобиль; доступность уточняется"
              />
            </div>
            <div
              class="detail-gallery__thumbs"
              aria-label="Фотографии автомобиля"
            >
              <button
                class="gallery-thumb is-active"
                type="button"
                data-image="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-car/graphite-cross.webp' ) ); ?>"
                data-alt="Автомобиль; доступность уточняется"
                aria-label="Показать фотографию 1"
                aria-pressed="true"
              >
                <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-car/graphite-cross.webp' ) ); ?>" alt="" />
              </button>
              <button
                class="gallery-thumb"
                type="button"
                data-image="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-car/graphite-cross.webp' ) ); ?>"
                data-alt="Автомобиль; доступность уточняется"
                aria-label="Показать фотографию 2"
                aria-pressed="false"
              >
                <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-car/graphite-cross.webp' ) ); ?>" alt="" />
              </button>
              <button
                class="gallery-thumb"
                type="button"
                data-image="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-car/graphite-cross.webp' ) ); ?>"
                data-alt="Автомобиль; доступность уточняется"
                aria-label="Показать фотографию 3"
                aria-pressed="false"
              >
                <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-car/graphite-cross.webp' ) ); ?>" alt="" />
              </button>
            </div>
          </div>
          <article class="detail-info">
            <a class="detail-back" href="<?php echo esc_url( tvoe_auto_page_url( 'catalog' ) . '' ); ?>"
              ><img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/gray-back.svg' ) ); ?>" alt="" />Назад в каталог</a
            >
            <h1>Автомобиль по запросу</h1>
            <p class="detail-meta">Актуальные характеристики уточнит менеджер</p>
            <div class="detail-payment">
              <div>
                <span>Первоначальный взнос</span><strong>По запросу</strong>
              </div>
              <div>
                <span>Ориентировочный платёж</span
                ><strong>По запросу</strong>
              </div>
            </div>
            <dl class="detail-specs">
              <div>
                <dt>Двигатель</dt>
                <dd>Уточняется</dd>
              </div>
              <div>
                <dt>Пробег</dt>
                <dd>Уточняется</dd>
              </div>
              <div>
                <dt>Привод</dt>
                <dd>Уточняется</dd>
              </div>
              <div>
                <dt>Город</dt>
                <dd>Уточняется</dd>
              </div>
            </dl>
            <a class="detail-primary site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
              >Узнать условия <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt=""
            /></a>
            <small
              >Точные данные, фотографии и условия подтверждаются перед оформлением.</small
            >
          </article>
        </div>
      </section>

      <section class="detail-cta">
        <div>
          <p>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/red-chat.svg' ) ); ?>" alt="" />Консультация без обязательств
          </p>
          <h2>Нужен такой или аналогичный автомобиль?</h2>
        </div>
        <a class="site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
          >Узнать условия по автомобилю
          <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt=""
        /></a>
      </section>
    </main>
    <?php endif; ?>

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
    <a class="detail-contact" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
      ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/double-chat.svg' ) ); ?>" alt="" />Связаться</a
    >
    <a
      class="site-yandex-link"
      href="https://yandex.ru/navi/org/tvoyo_avto_sibir/96736411134"
      target="_blank"
      rel="noopener noreferrer"
    >
    </a>
<?php get_footer(); ?>
