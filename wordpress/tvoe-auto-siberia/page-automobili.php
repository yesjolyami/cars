<?php
/**
 * Template Name: Автомобили
 * Template Post Type: page
 */
get_header( null, array(
    'body_class' => 'catalog-page',
    'page_key'   => 'catalog',
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

    <main class="catalog-main">
      <section class="catalog-hero">
        <div class="catalog-hero__inner">
          <span class="catalog-eyebrow">Каталог</span>
          <h1>Автомобили, доступные<br />для оформления</h1>
          <p>
            Выберите вариант или оставьте заявку на подбор аналогичного
            автомобиля.
          </p>
        </div>
      </section>
      <section class="catalog-listing" aria-label="Каталог автомобилей">
        <?php tvoe_auto_render_catalog_listing(); ?>
        <?php if ( false ) : ?>
        <div class="catalog-layout">
          <aside class="catalog-filter" aria-label="Фильтры каталога">
            <div class="catalog-filter__heading">
              <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/filter.svg' ) ); ?>" alt="" />
              <h2>Фильтры</h2>
            </div>
            <div class="catalog-filter__group">
              <button
                class="catalog-filter__row"
                type="button"
                aria-expanded="false"
              >
                <span>Марка и модель</span
                ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/chevron.png' ) ); ?>" alt="" />
              </button>
              <div class="catalog-filter__panel">
                <label class="catalog-filter__option"
                  ><input type="checkbox" name="model" value="graphite" /><span
                    >Graphite</span
                  ></label
                ><label class="catalog-filter__option"
                  ><input type="checkbox" name="model" value="white" /><span
                    >White</span
                  ></label
                ><label class="catalog-filter__option"
                  ><input type="checkbox" name="model" value="navy" /><span
                    >Navy</span
                  ></label
                >
              </div>
            </div>
            <div class="catalog-filter__group">
              <button
                class="catalog-filter__row"
                type="button"
                aria-expanded="false"
              >
                <span>Год выпуска</span
                ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/chevron.png' ) ); ?>" alt="" />
              </button>
              <div class="catalog-filter__panel">
                <label class="catalog-filter__option"
                  ><input type="checkbox" name="year" value="2019" /><span
                    >2019</span
                  ></label
                ><label class="catalog-filter__option"
                  ><input type="checkbox" name="year" value="2020" /><span
                    >2020</span
                  ></label
                ><label class="catalog-filter__option"
                  ><input type="checkbox" name="year" value="2021" /><span
                    >2021</span
                  ></label
                ><label class="catalog-filter__option"
                  ><input type="checkbox" name="year" value="2022" /><span
                    >2022</span
                  ></label
                >
              </div>
            </div>
            <div class="catalog-filter__group">
              <button
                class="catalog-filter__row"
                type="button"
                aria-expanded="false"
              >
                <span>Тип кузова</span
                ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/chevron.png' ) ); ?>" alt="" />
              </button>
              <div class="catalog-filter__panel">
                <label class="catalog-filter__option"
                  ><input type="checkbox" name="body" value="sedan" /><span
                    >Седан</span
                  ></label
                ><label class="catalog-filter__option"
                  ><input type="checkbox" name="body" value="crossover" /><span
                    >Кроссовер</span
                  ></label
                ><label class="catalog-filter__option"
                  ><input type="checkbox" name="body" value="suv" /><span
                    >Внедорожник</span
                  ></label
                >
              </div>
            </div>
            <div class="catalog-filter__group">
              <button
                class="catalog-filter__row"
                type="button"
                aria-expanded="false"
              >
                <span>Коробка передач</span
                ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/chevron.png' ) ); ?>" alt="" />
              </button>
              <div class="catalog-filter__panel">
                <label class="catalog-filter__option"
                  ><input type="checkbox" name="transmission" value="at" /><span
                    >Автоматическая</span
                  ></label
                ><label class="catalog-filter__option"
                  ><input
                    type="checkbox"
                    name="transmission"
                    value="cvt"
                  /><span>Вариатор</span></label
                ><label class="catalog-filter__option"
                  ><input type="checkbox" name="transmission" value="mt" /><span
                    >Механическая</span
                  ></label
                >
              </div>
            </div>
            <div class="catalog-filter__group">
              <button
                class="catalog-filter__row"
                type="button"
                aria-expanded="false"
              >
                <span>Город</span
                ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/chevron.png' ) ); ?>" alt="" />
              </button>
              <div class="catalog-filter__panel">
                <label class="catalog-filter__option"
                  ><input type="checkbox" name="city" value="barnaul" /><span
                    >Барнаул</span
                  ></label
                ><label class="catalog-filter__option"
                  ><input
                    type="checkbox"
                    name="city"
                    value="novosibirsk"
                  /><span>Новосибирск</span></label
                ><label class="catalog-filter__option"
                  ><input type="checkbox" name="city" value="kemerovo" /><span
                    >Кемерово</span
                  ></label
                ><label class="catalog-filter__option"
                  ><input type="checkbox" name="city" value="biysk" /><span
                    >Бийск</span
                  ></label
                >
              </div>
            </div>
            <button class="catalog-filter__reset" type="button">
              Сбросить фильтры
            </button>
          </aside>
          <div class="catalog-results">
            <div class="catalog-toolbar">
              <p class="catalog-results-count" aria-live="polite">Найдено: 6</p>
              <label
                ><span class="sr-only">Сортировка</span
                ><select aria-label="Сортировка автомобилей">
                  <option value="newest">Сначала новые</option>
                  <option value="oldest">Сначала старые</option>
                  <option value="name">По названию</option>
                </select></label
              >
            </div>
            <div class="catalog-cards">
              <article
                class="catalog-card"
                data-model="graphite"
                data-year="2021"
                data-body="crossover"
                data-transmission="at"
                data-city="barnaul"
              >
                <a class="catalog-card__photo" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>" alt="Graphite Cross"
                /></a>
                <div class="catalog-card__body">
                  <div class="catalog-card__title">
                    <div>
                      <h3>Graphite Cross</h3>
                      <p>2021 · 2.0 · AT · 4WD</p>
                    </div>
                  </div>
                  <div class="catalog-card__terms">
                    <span>Первый взнос<b>от 438 000 ₽</b></span
                    ><span>Платёж<b>от 42 900 ₽/мес.</b></span>
                  </div>
                  <a
                    class="catalog-card__button site-cta site-cta--secondary"
                    href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                    >Подробнее
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt="" /></a
                  ><small
                    >Расчёт предварительный и не является публичной
                    офертой.</small
                  >
                </div>
              </article>
              <article
                class="catalog-card"
                data-model="white"
                data-year="2020"
                data-body="sedan"
                data-transmission="at"
                data-city="novosibirsk"
              >
                <a class="catalog-card__photo" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>" alt="White Sedan"
                /></a>
                <div class="catalog-card__body">
                  <div class="catalog-card__title">
                    <div>
                      <h3>White Sedan</h3>
                      <p>2020 · 1.6 · AT · передний</p>
                    </div>
                  </div>
                  <div class="catalog-card__terms">
                    <span>Первый взнос<b>от 328 000 ₽</b></span
                    ><span>Платёж<b>от 32 300 ₽/мес.</b></span>
                  </div>
                  <a
                    class="catalog-card__button site-cta site-cta--secondary"
                    href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                    >Подробнее
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt="" /></a
                  ><small
                    >Расчёт предварительный и не является публичной
                    офертой.</small
                  >
                </div>
              </article>
              <article
                class="catalog-card"
                data-model="navy"
                data-year="2022"
                data-body="suv"
                data-transmission="at"
                data-city="barnaul"
              >
                <a class="catalog-card__photo" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>" alt="Navy Family SUV"
                /></a>
                <div class="catalog-card__body">
                  <div class="catalog-card__title">
                    <div>
                      <h3>Navy Family SUV</h3>
                      <p>2022 · 2.0 · AT · 4WD</p>
                    </div>
                  </div>
                  <div class="catalog-card__terms">
                    <span>Первый взнос<b>от 556 000 ₽</b></span
                    ><span>Платёж<b>от 54 600 ₽/мес.</b></span>
                  </div>
                  <a
                    class="catalog-card__button site-cta site-cta--secondary"
                    href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                    >Подробнее
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt="" /></a
                  ><small
                    >Расчёт предварительный и не является публичной
                    офертой.</small
                  >
                </div>
              </article>
              <article
                class="catalog-card"
                data-model="graphite"
                data-year="2019"
                data-body="sedan"
                data-transmission="cvt"
                data-city="kemerovo"
              >
                <a class="catalog-card__photo" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>" alt="Graphite City"
                /></a>
                <div class="catalog-card__body">
                  <div class="catalog-card__title">
                    <div>
                      <h3>Graphite City</h3>
                      <p>2019 · 1.8 · CVT · передний</p>
                    </div>
                  </div>
                  <div class="catalog-card__terms">
                    <span>Первый взнос<b>от 296 000 ₽</b></span
                    ><span>Платёж<b>от 29 100 ₽/мес.</b></span>
                  </div>
                  <a
                    class="catalog-card__button site-cta site-cta--secondary"
                    href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                    >Подробнее
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt="" /></a
                  ><small
                    >Расчёт предварительный и не является публичной
                    офертой.</small
                  >
                </div>
              </article>
              <article
                class="catalog-card"
                data-model="white"
                data-year="2021"
                data-body="sedan"
                data-transmission="at"
                data-city="biysk"
              >
                <a class="catalog-card__photo" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>" alt="White Comfort"
                /></a>
                <div class="catalog-card__body">
                  <div class="catalog-card__title">
                    <div>
                      <h3>White Comfort</h3>
                      <p>2021 · 1.6 · AT · передний</p>
                    </div>
                  </div>
                  <div class="catalog-card__terms">
                    <span>Первый взнос<b>от 364 000 ₽</b></span
                    ><span>Платёж<b>от 35 800 ₽/мес.</b></span>
                  </div>
                  <a
                    class="catalog-card__button site-cta site-cta--secondary"
                    href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                    >Подробнее
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt="" /></a
                  ><small
                    >Расчёт предварительный и не является публичной
                    офертой.</small
                  >
                </div>
              </article>
              <article
                class="catalog-card"
                data-model="navy"
                data-year="2020"
                data-body="crossover"
                data-transmission="at"
                data-city="novosibirsk"
              >
                <a class="catalog-card__photo" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                  ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>" alt="Navy Tour"
                /></a>
                <div class="catalog-card__body">
                  <div class="catalog-card__title">
                    <div>
                      <h3>Navy Tour</h3>
                      <p>2020 · 2.0 · AT · 4WD</p>
                    </div>
                  </div>
                  <div class="catalog-card__terms">
                    <span>Первый взнос<b>от 470 000 ₽</b></span
                    ><span>Платёж<b>от 46 200 ₽/мес.</b></span>
                  </div>
                  <a
                    class="catalog-card__button site-cta site-cta--secondary"
                    href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                    >Подробнее
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt="" /></a
                  ><small
                    >Расчёт предварительный и не является публичной
                    офертой.</small
                  >
                </div>
              </article>
            </div>
            <div class="catalog-empty" role="status" hidden>
              <strong>Автомобили не найдены</strong>
              <span>Измените параметры или нажмите «Сбросить фильтры» слева.</span>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </section>
      <div class="catalog-spacer" aria-hidden="true"></div>
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
    <a class="catalog-contact" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
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
