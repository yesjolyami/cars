<?php
/**
 * Template Name: Отзывы
 * Template Post Type: page
 */
get_header( null, array(
    'body_class' => 'reviews-page',
    'page_key'   => 'reviews',
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

    <main class="reviews-main">
      <section class="reviews-hero" aria-labelledby="reviews-title">
        <div class="reviews-hero__copy">
          <p>Отзывы клиентов</p>
          <h1 id="reviews-title">
            Решение, которому<br />доверяют после<br />личного опыта
          </h1>
          <span
            >Собрали истории клиентов и подготовили места для отзывов с<br />площадок,
            где появятся наши карточки.</span
          >
          <div class="reviews-hero__actions">
            <a class="site-cta" href="https://yandex.ru/maps/-/CTDnqE6V" target="_blank" rel="noopener noreferrer"
              >Смотреть отзывы
              <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt="" /></a
            ><a
              class="site-cta site-cta--secondary"
              href="https://www.avito.ru/brands/1d0065807efc4629ea24bed5d9eb4f52"
              target="_blank"
              rel="noopener noreferrer"
              >Открыть Avito <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/link.svg' ) ); ?>" alt=""
            /></a>
          </div>
        </div>
        <div class="reviews-hero__image">
          <img fetchpriority="high" decoding="async"
            src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-reviews/hero.webp' ) ); ?>"
            alt="Клиент с ключами рядом с автомобилем"
          />
        </div>
      </section>

      <section class="reviews-platforms" aria-labelledby="platforms-title">
        <div class="reviews-platforms__heading">
          <p>Внешние площадки</p>
          <h2 id="platforms-title">Отзывы из привычных сервисов</h2>
        </div>
        <div class="reviews-platforms__grid">
          <article>
            <div class="reviews-platforms__name">
              <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-reviews/avito.png' ) ); ?>" alt="Avito" />
              <h3>Отзывы на Avito</h3>
            </div>
            <div class="reviews-platforms__avito-review">
              <div class="reviews-platforms__avito-review-head">
                <strong>Стас</strong>
                <span aria-label="5 звёзд из 5">★★★★★</span>
              </div>
              <blockquote>
                «Быстро одобрили заявку, отдельное спасибо Зауру за
                консультации, всегда был на связи, машинкой довольны.»
              </blockquote>
              <small>Avito · 22 января 2025 · 5 из 5</small>
            </div>
            <a
              href="https://www.avito.ru/brands/1d0065807efc4629ea24bed5d9eb4f52"
              target="_blank"
              rel="noopener noreferrer"
              >Читать все отзывы <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/red-link.svg' ) ); ?>" alt=""
            /></a>
          </article>
          <article>
            <div class="reviews-platforms__name">
              <img loading="lazy" decoding="async"
                class="reviews-platforms__gis"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-reviews/gis.png' ) ); ?>"
                alt="2ГИС"
              />
              <h3>Отзывы в 2ГИС</h3>
            </div>
            <div class="reviews-platforms__gis-review">
              <div class="reviews-platforms__gis-review-head">
                <strong>Александр М.</strong>
                <span aria-label="5 звёзд из 5">★★★★★</span>
              </div>
              <blockquote>
                «Максим с Зауром подобрали машину быстро и качественно. Машиной
                доволен. Рекомендую.»
              </blockquote>
              <small>2ГИС · отзыв клиента</small>
            </div>
            <a
              href="https://2gis.ru/barnaul/firm/70000001117123270/tab/reviews"
              target="_blank"
              rel="noopener noreferrer"
              >Открыть 2ГИС <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/red-link.svg' ) ); ?>" alt=""
            /></a>
          </article>
          <article>
            <div class="reviews-platforms__name">
              <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-reviews/yandex.png' ) ); ?>" alt="Яндекс Карты" />
              <h3>Отзывы в Яндекс Картах</h3>
            </div>
            <div class="reviews-platforms__yandex-review">
              <div class="reviews-platforms__yandex-review-head">
                <strong>Александр С.</strong>
                <span aria-label="5 звёзд из 5">★★★★★</span>
              </div>
              <blockquote>
                «Спасибо большое данной компании! Отдельная благодарность Зауру
                и Максиму. Подобрали и приобрели хороший автомобиль.»
              </blockquote>
              <small>Яндекс Карты · 10 августа 2026</small>
            </div>
            <a
              href="https://yandex.ru/maps/org/96736411134/reviews"
              target="_blank"
              rel="noopener noreferrer"
              >Читать все отзывы <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/red-link.svg' ) ); ?>" alt=""
            /></a>
          </article>
        </div>
      </section>

      <section
        class="reviews-stories"
        id="stories"
        aria-label="Отзывы клиентов с сайта"
      >
        <h2 class="reviews-stories__title">Истории наших клиентов</h2>
        <article class="reviews-story">
          <img loading="lazy" decoding="async"
            class="reviews-story__photo"
            src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-reviews/story.webp' ) ); ?>"
            alt="Автомобиль клиента"
          />
          <div class="reviews-story__body">
            <p class="reviews-story__city">Барнаул</p>
            <h2>Автомобиль для работы</h2>
            <blockquote>
              «Старый автомобиль зачли в первый взнос, новый нашли за 18 дней.»
            </blockquote>
            <footer>
              <strong>Алексей К.</strong
              ><span
                ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/verified.svg' ) ); ?>" alt="" />Отзыв клиента с
                сайта</span
              >
            </footer>
          </div>
        </article>
        <article class="reviews-story">
          <img loading="lazy" decoding="async"
            class="reviews-story__photo"
            src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-reviews/story.webp' ) ); ?>"
            alt="Автомобиль клиента"
          />
          <div class="reviews-story__body">
            <p class="reviews-story__city">Бийск</p>
            <h2>Семейный автомобиль</h2>
            <blockquote>
              «Подобрали кроссовер в согласованном бюджете и организовали
              независимую диагностику.»
            </blockquote>
            <footer>
              <strong>Марина С.</strong
              ><span
                ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/verified.svg' ) ); ?>" alt="" />Отзыв
                клиента с сайта</span
              >
            </footer>
          </div>
        </article>
        <article class="reviews-story">
          <img loading="lazy" decoding="async"
            class="reviews-story__photo"
            src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-reviews/story.webp' ) ); ?>"
            alt="Автомобиль клиента"
          />
          <div class="reviews-story__body">
            <p class="reviews-story__city">Новосибирск</p>
            <h2>Аренда с выкупом</h2>
            <blockquote>
              «Согласовали понятный график и помогли подобрать машину для
              доставки.»
            </blockquote>
            <footer>
              <strong>Игорь П.</strong
              ><span
                ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/verified.svg' ) ); ?>" alt="" />Отзыв
                клиента с сайта</span
              >
            </footer>
          </div>
        </article>
      </section>

      <section class="reviews-cta" aria-labelledby="reviews-cta-title">
        <div>
          <p>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/red-chat.svg' ) ); ?>" alt="" />Консультация без
            обязательств
          </p>
          <h2 id="reviews-cta-title">Расскажите о вашей задаче</h2>
        </div>
        <a class="site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
          >Обсудить подбор автомобиля
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
    <a
      class="site-yandex-link"
      href="https://yandex.ru/navi/org/tvoyo_avto_sibir/96736411134"
      target="_blank"
      rel="noopener noreferrer"
    >
    </a>
<?php get_footer(); ?>
