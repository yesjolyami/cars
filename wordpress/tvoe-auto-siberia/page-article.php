<?php
/**
 * Template Name: Материал
 * Template Post Type: page
 */
get_header( null, array(
    'body_class' => 'article-page',
    'page_key'   => 'article',
) );
$is_news_single = is_singular( 'tvoe_news' );
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
            >Получить консультацию</a
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
        <p>Работаем по Сибири</p>
      </div>
    </aside>

<?php if ( $is_news_single ) : ?>
    <?php
    $news_post       = get_queried_object();
    $news_post_id    = $news_post instanceof WP_Post ? $news_post->ID : 0;
    $news_term       = tvoe_auto_news_term( $news_post_id );
    $news_category   = $news_term ? $news_term->name : 'Новости компании';
    $news_description = tvoe_auto_news_excerpt( $news_post_id, 34 );
    $related_news    = tvoe_auto_news_query(
        array(
            'posts_per_page' => 3,
            'post__not_in'   => array( $news_post_id ),
        )
    );
    ?>
    <main class="article-main article-main--dynamic">
      <article class="article-content article-content--dynamic">
        <header class="article-intro">
          <div class="article-intro__meta">
            <a class="article-back" href="<?php echo esc_url( tvoe_auto_page_url( 'news' ) ); ?>"><img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-article/back.png' ) ); ?>" alt="" />Все публикации</a>
            <span class="article-category"><?php echo esc_html( $news_category ); ?></span>
            <time datetime="<?php echo esc_attr( get_the_date( 'c', $news_post_id ) ); ?>"><img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/calendar.svg' ) ); ?>" alt="" /><?php echo esc_html( tvoe_auto_news_date( $news_post_id ) ); ?></time>
          </div>
          <h1><?php echo esc_html( get_the_title( $news_post_id ) ); ?></h1>
          <p><?php echo esc_html( $news_description ); ?></p>
        </header>

        <figure class="article-cover">
          <img decoding="async" src="<?php echo esc_url( tvoe_auto_news_image( $news_post_id ) ); ?>" alt="<?php echo esc_attr( get_the_title( $news_post_id ) ); ?>" />
        </figure>

        <div class="article-copy">
          <?php echo apply_filters( 'the_content', $news_post->post_content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>
      </article>

      <?php if ( $related_news->have_posts() ) : ?>
        <section class="article-related" aria-labelledby="related-title">
          <div class="article-related__heading">
            <div>
              <p>Продолжить чтение</p>
              <h2 id="related-title">Последние публикации</h2>
            </div>
            <a href="<?php echo esc_url( tvoe_auto_page_url( 'news' ) ); ?>">Смотреть все <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt="" /></a>
          </div>
          <div class="article-cards">
            <?php foreach ( $related_news->posts as $related_post ) : ?>
              <?php tvoe_auto_render_news_card( $related_post->ID, 'article' ); ?>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endif; ?>

      <section class="article-cta" aria-labelledby="article-cta-title">
        <div class="article-cta__copy">
          <p><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-article/cta-icon.png' ) ); ?>" alt="" />Первый шаг</p>
          <h2 id="article-cta-title">Обсудим подходящий автомобиль и вариант<br />оформления</h2>
        </div>
        <a class="site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) ); ?>">Получить консультацию</a>
      </section>
    </main>
<?php else : ?>
    <main class="article-main article-main--empty">
      <section class="article-content article-content--empty">
        <header class="article-intro">
          <div class="article-intro__meta">
            <a class="article-back" href="<?php echo esc_url( tvoe_auto_page_url( 'news' ) . '' ); ?>"><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-article/back.png' ) ); ?>" alt="" />Все публикации</a>
          </div>
          <h1>Полезные материалы об автомобилях</h1>
          <p>Выберите опубликованный материал в разделе новостей, чтобы открыть статью полностью.</p>
        </header>
      </section>
      <!-- Демо-статья отключена до подготовки подтверждённого материала.
      <article class="article-content">
        <header class="article-intro">
          <div class="article-intro__meta">
            <a class="article-back" href="<?php echo esc_url( tvoe_auto_page_url( 'news' ) . '' ); ?>"
              ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-article/back.png' ) ); ?>" alt="" />Все публикации</a
            >
            <span class="article-category">Полезные материалы</span>
            <time datetime="2026-07-20"
              ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/calendar.svg' ) ); ?>" alt="" />20 июля 2026
              г.</time
            >
          </div>
          <h1>Что можно рассказать о<br />проверке автомобиля</h1>
          <p>
            Макет полезного материала о документах, истории и техническом
            состоянии<br />автомобиля перед оформлением.
          </p>
        </header>

        <figure class="article-cover">
          <img loading="lazy" decoding="async"
            src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-article/main.webp' ) ); ?>"
            alt="Специалисты проверяют техническое состояние автомобиля"
          />
        </figure>

        <div class="article-copy">
          <p class="article-drop">
            Полезные публикации могут отвечать на вопросы, которые возникают ещё
            до обращения в компанию. Например, из каких этапов состоит проверка
            автомобиля и почему одной фотографии или короткого объявления
            недостаточно для решения.
          </p>
          <p>
            В полноценном материале специалист сможет объяснить, какие сведения
            проверяются по документам, на что обращают внимание при осмотре и
            как результаты проверки обсуждаются с клиентом.
          </p>
          <p>
            Содержание этой демонстрационной страницы не является регламентом
            компании. Финальный текст необходимо подготовить на основании
            реального процесса работы.
          </p>
        </div>
      </article>

      <section class="article-related" aria-labelledby="related-title">
        <div class="article-related__heading">
          <div>
            <p>Продолжить чтение</p>
            <h2 id="related-title">Последние публикации</h2>
          </div>
          <a href="<?php echo esc_url( tvoe_auto_page_url( 'news' ) . '' ); ?>"
            >Смотреть все <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt=""
          /></a>
        </div>
        <div class="article-cards">
          <article class="article-card">
            <a
              class="article-card__photo"
              href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
              aria-label="Как может выглядеть история выдачи автомобиля"
              ><img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-article/related-issue.webp' ) ); ?>"
                alt="Выдача автомобиля клиенту"
            /></a>
            <div class="article-card__body">
              <div class="article-card__meta">
                <span>Выдачи</span
                ><time datetime="2026-07-24"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/calendar.svg' ) ); ?>" alt="" />24 июля 2026
                  г.</time
                >
              </div>
              <h3>
                <a href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                  >Как может выглядеть история выдачи автомобиля</a
                >
              </h3>
              <p>
                Пример подачи материала: задача клиента, этапы подбора, проверка
                и передача автомобиля без рекламных обещаний.
              </p>
              <a class="article-card__link" href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                >Читать материал
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt=""
              /></a>
            </div>
          </article>
          <article class="article-card">
            <a
              class="article-card__photo"
              href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
              aria-label="Как показывать новые поступления в каталоге"
              ><img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-article/related-arrival.webp' ) ); ?>"
                alt="Белый автомобиль из нового поступления"
            /></a>
            <div class="article-card__body">
              <div class="article-card__meta">
                <span>Новые поступления</span
                ><time datetime="2026-07-16"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/calendar.svg' ) ); ?>" alt="" />16 июля 2026
                  г.</time
                >
              </div>
              <h3>
                <a href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                  >Как показывать новые поступления в каталоге</a
                >
              </h3>
              <p>
                Пример карточки свежего поступления с фотографией, основными
                характеристиками и переходом к автомобилю.
              </p>
              <a class="article-card__link" href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                >Читать материал
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt=""
              /></a>
            </div>
          </article>
          <article class="article-card">
            <a
              class="article-card__photo"
              href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
              aria-label="Как показывать новые поступления в каталоге"
              ><img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-article/related-arrival.webp' ) ); ?>"
                alt="Белый автомобиль из нового поступления"
            /></a>
            <div class="article-card__body">
              <div class="article-card__meta">
                <span>Новые поступления</span
                ><time datetime="2026-07-16"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/calendar.svg' ) ); ?>" alt="" />16 июля 2026
                  г.</time
                >
              </div>
              <h3>
                <a href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                  >Как показывать новые поступления в каталоге</a
                >
              </h3>
              <p>
                Пример карточки свежего поступления с фотографией, основными
                характеристиками и переходом к автомобилю.
              </p>
              <a class="article-card__link" href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>"
                >Читать материал
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt=""
              /></a>
            </div>
          </article>
        </div>
      </section>

      -->
      <section class="article-cta" aria-labelledby="article-cta-title">
        <div class="article-cta__copy">
          <p><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-article/cta-icon.png' ) ); ?>" alt="" />Первый шаг</p>
          <h2 id="article-cta-title">
            Обсудим подходящий автомобиль и вариант<br />оформления
          </h2>
        </div>
        <a class="site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>">Получить консультацию</a>
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
    <a class="article-contact" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
      ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/double-chat.svg' ) ); ?>" alt="" />Связаться</a
    >
<?php get_footer(); ?>
