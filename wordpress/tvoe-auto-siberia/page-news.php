<?php
/**
 * Template Name: Новости
 * Template Post Type: page
 */
get_header( null, array(
    'body_class' => 'news-page',
    'page_key'   => 'news',
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
            >Подобрать авто</a
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

    <main class="news-main">
      <section class="news-hero" aria-labelledby="news-title">
        <p class="news-kicker">Жизнь компании</p>
        <h1 id="news-title">Новости, выдачи и<br />полезные материалы</h1>
        <p class="news-hero__lead">
          Рассказываем о свежих автомобилях, работе специалистов и важных
          нюансах подбора и<br />оформления.
        </p>
      </section>

      <section class="news-listing" aria-label="Публикации">
        <?php
        $news_query      = tvoe_auto_news_query();
        $news_categories = tvoe_auto_news_categories();
        ?>
        <p class="news-empty news-empty--visible" role="status" <?php echo $news_query->have_posts() ? 'hidden' : ''; ?>>
          Раздел временно не публикуется: новые материалы появятся после редакционной проверки.
        </p>
        <?php if ( $news_query->have_posts() ) : ?>
          <div class="news-filters" role="group" aria-label="Категории публикаций">
            <button class="is-active" type="button" data-news-filter="all" aria-pressed="true">Все</button>
            <?php foreach ( $news_categories as $category_slug => $category_name ) : ?>
              <button type="button" data-news-filter="<?php echo esc_attr( $category_slug ); ?>" aria-pressed="false"><?php echo esc_html( $category_name ); ?></button>
            <?php endforeach; ?>
          </div>
          <div class="news-cards">
            <?php foreach ( $news_query->posts as $news_post ) : ?>
              <?php tvoe_auto_render_news_card( $news_post->ID ); ?>
            <?php endforeach; ?>
          </div>
          <p class="news-empty" data-news-empty role="status" hidden>В этой категории пока нет публикаций.</p>
        <?php endif; ?>
        <!-- Демо-публикации скрыты до публикации подтверждённых материалов.
        <div
          class="news-filters"
          role="group"
          aria-label="Категории публикаций"
        >
          <button
            class="is-active"
            type="button"
            data-news-filter="all"
            aria-pressed="true"
          >
            Все
          </button>
          <button type="button" data-news-filter="issue" aria-pressed="false">
            Выдачи
          </button>
          <button type="button" data-news-filter="company" aria-pressed="false">
            Новости компании
          </button>
          <button type="button" data-news-filter="work" aria-pressed="false">
            Рабочие будни
          </button>
          <button type="button" data-news-filter="arrival" aria-pressed="false">
            Новые поступления
          </button>
          <button type="button" data-news-filter="useful" aria-pressed="false">
            Полезные материалы
          </button>
        </div>

        <div class="news-cards">
          <article class="news-card" data-news-category="issue">
            <a
              class="news-card__photo"
              href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
              aria-label="Открыть публикацию: Как может выглядеть история выдачи автомобиля"
              ><img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-news/issue.webp' ) ); ?>"
                alt="Передача ключей от автомобиля клиенту"
            /></a>
            <div class="news-card__body">
              <div class="news-card__meta">
                <span>Выдачи</span
                ><time datetime="2026-07-24"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/calendar.svg' ) ); ?>" alt="" />24 июля 2026
                  г.</time
                >
              </div>
              <h2>
                <a href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                  >Как может выглядеть история выдачи автомобиля</a
                >
              </h2>
              <p>
                Пример подачи материала: задача клиента, этапы подбора, проверка
                и передача автомобиля без рекламных обещаний.
              </p>
              <a class="news-card__link" href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                >Читать материал
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt=""
              /></a>
            </div>
          </article>

          <article class="news-card" data-news-category="useful">
            <a
              class="news-card__photo"
              href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
              aria-label="Открыть публикацию: Что можно рассказать о проверке автомобиля"
              ><img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-news/inspection.webp' ) ); ?>"
                alt="Специалисты проверяют автомобиль перед оформлением"
            /></a>
            <div class="news-card__body">
              <div class="news-card__meta">
                <span>Полезные материалы</span
                ><time datetime="2026-07-20"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/calendar.svg' ) ); ?>" alt="" />20 июля 2026
                  г.</time
                >
              </div>
              <h2>
                <a href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                  >Что можно рассказать о проверке автомобиля</a
                >
              </h2>
              <p>
                Макет полезного материала о документах, истории и техническом
                состоянии автомобиля перед оформлением.
              </p>
              <a class="news-card__link" href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                >Читать материал
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt=""
              /></a>
            </div>
          </article>

          <article class="news-card" data-news-category="arrival">
            <a
              class="news-card__photo"
              href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
              aria-label="Открыть публикацию: Как показывать новые поступления в каталоге"
              ><img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-news/arrival.webp' ) ); ?>"
                alt="Белый автомобиль из нового поступления"
            /></a>
            <div class="news-card__body">
              <div class="news-card__meta">
                <span>Новые поступления</span
                ><time datetime="2026-07-16"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/calendar.svg' ) ); ?>" alt="" />16 июля 2026
                  г.</time
                >
              </div>
              <h2>
                <a href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                  >Как показывать новые поступления в каталоге</a
                >
              </h2>
              <p>
                Пример карточки свежего поступления с фотографией, основными
                характеристиками и переходом к автомобилю.
              </p>
              <a class="news-card__link" href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                >Читать материал
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt=""
              /></a>
            </div>
          </article>
        </div>

        <p class="news-empty" data-news-empty role="status" hidden>
          В этой категории пока нет публикаций.
        </p>
        -->
      </section>

      <section class="news-cta" aria-labelledby="news-cta-title">
        <div class="news-cta__copy">
          <p>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-news/cta-icon.png' ) ); ?>" alt="" />Нужен автомобиль?
          </p>
          <h2 id="news-cta-title">
            Подберём подходящий вариант под вашу задачу
          </h2>
        </div>
        <a class="site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
          >Подобрать автомобиль
          <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt=""
        /></a>
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
    <a class="news-contact" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
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
