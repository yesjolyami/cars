<?php
/**
 * Template Name: Trade-in
 * Template Post Type: page
 */
get_header( null, array(
    'body_class' => 'trade-page',
    'page_key'   => 'trade-in',
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
            >Оценить авто</a
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

    <main class="trade-main">
      <section class="trade-hero" aria-labelledby="trade-title">
        <div class="trade-hero__copy">
          <p class="trade-kicker">Trade-in</p>
          <h1 id="trade-title">
            Ваш автомобиль может<br />стать первоначальным<br />взносом
          </h1>
          <p class="trade-hero__lead">
            Оценим текущий автомобиль и полностью или частично зачтём
            согласованную стоимость при оформлении следующего.
          </p>
          <ul>
            <li>
              <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/selection-check.svg' ) ); ?>" alt="" />Стоимость можно
              зачесть полностью или частично
            </li>
            <li>
              <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/selection-check.svg' ) ); ?>" alt="" />При необходимости
              клиент доплачивает разницу
            </li>
          </ul>
        </div>
        <form
          class="trade-form"
          action=""
          method="post"
          data-lead-form
          data-personal-data-form
        >
          <div class="trade-form__head">
            <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/service-trade.svg' ) ); ?>" alt="" />
            <div>
              <span>Первый шаг</span><strong>Предварительная оценка</strong>
            </div>
          </div>
          <div class="trade-form__fields">
            <label for="trade-car"
              >Марка и модель<input
                id="trade-car"
                type="text"
                name="car"
                placeholder="Например, Toyota Camry"
                autocomplete="off"
                required /></label
            ><label for="trade-year"
              >Год выпуска<input
                id="trade-year"
                type="number"
                name="year"
                min="1950"
                max="2026"
                inputmode="numeric"
                placeholder="Укажите год автомобиля"
                required /></label
            ><label for="trade-client-name"
              >Имя клиента<input
                id="trade-client-name"
                type="text"
                name="name"
                autocomplete="name"
                placeholder="Как к вам обращаться?"
                minlength="2"
                required /></label
            ><label for="trade-city"
              >Город<input
                id="trade-city"
                type="text"
                name="city"
                autocomplete="address-level2"
                placeholder="Например, Барнаул"
                required /></label
            ><label class="trade-form__phone" for="trade-phone"
              >Телефон<input
                id="trade-phone"
                type="tel"
                name="phone"
                placeholder="Для связи со специалистом"
                inputmode="tel"
                autocomplete="tel"
                maxlength="18"
                pattern="\+7 \([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}"
                title="Введите номер полностью: +7 (999) 999-99-99"
                required
            /></label>
          </div>
          <label class="trade-form__consent form-privacy-consent"
            ><input
              type="checkbox"
              name="personal-data-consent"
              value="2026-09-08"
              required
            /><span
              >Даю <a href="<?php echo esc_url( tvoe_auto_page_url( 'personal-data-consent' ) . '#trade-in' ); ?>" target="_blank" rel="noopener noreferrer">согласие на обработку персональных данных</a> и ознакомлен с <a href="<?php echo esc_url( tvoe_auto_page_url( 'privacy' ) . '' ); ?>" target="_blank" rel="noopener noreferrer">Политикой обработки персональных данных</a>.</span
            ></label
          >
          <button
            class="trade-form__submit"
            type="submit"
            disabled
            aria-disabled="true"
          >
            Оценить мой автомобиль
            <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt="" />
          </button>
          <small
            >Итоговая стоимость определяется после осмотра автомобиля и
            документов.</small
          >
          <p class="trade-form__status" role="status" aria-live="polite"></p>
        </form>
      </section>

      <section class="trade-bridge" aria-labelledby="trade-bridge-title">
        <h2 id="trade-bridge-title">Одна оценка связывает две сделки</h2>
        <div class="trade-bridge__images">
          <div class="trade-bridge__car">
            <img loading="lazy" decoding="async"
              src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-trade/current-car.webp' ) ); ?>"
              alt="Ваш текущий автомобиль"
            />
            <span class="trade-bridge__label">Ваш автомобиль</span>
          </div>
          <div class="trade-bridge__assessment">
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/service-trade.svg' ) ); ?>" alt="" /><b>Оценка</b
            ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt="" />
          </div>
          <div class="trade-bridge__car trade-bridge__car--next">
            <img loading="lazy" decoding="async"
              src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-trade/next-car.webp' ) ); ?>"
              alt="Следующий автомобиль"
            />
            <span class="trade-bridge__label">Следующий автомобиль</span>
          </div>
        </div>
        <p class="trade-kicker">Trade-in без лишнего маршрута</p>
        <p class="trade-bridge__text">
          Согласованная стоимость текущего автомобиля учитывается в
          первоначальном взносе за следующий.
        </p>
      </section>

      <section class="trade-criteria" aria-labelledby="criteria-title">
        <div class="trade-criteria__heading">
          <div>
            <p class="trade-kicker">Как формируется оценка</p>
            <h2 id="criteria-title">
              Смотрим автомобиль и документы, а не называем цену вслепую
            </h2>
          </div>
          <p>
            Предварительный ориентир можно обсудить дистанционно. Итоговая сумма
            появляется только после осмотра.
          </p>
        </div>
        <div class="trade-criteria__cards">
          <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/service-rent.svg' ) ); ?>" alt="" />
            <div>
              <h3>Автомобиль</h3>
              <p>Марка, модель, год и комплектация</p>
            </div>
          </article>
          <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/metric-time.svg' ) ); ?>" alt="" />
            <div>
              <h3>Состояние</h3>
              <p>Кузов, основные узлы и история эксплуатации</p>
            </div>
          </article>
          <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/doc-ver.svg' ) ); ?>" alt="" />
            <div>
              <h3>Документы</h3>
              <p>Собственник, ограничения и комплект документов</p>
            </div>
          </article>
        </div>
      </section>

      <section class="trade-steps" aria-labelledby="trade-steps-title">
        <div class="trade-steps__intro">
          <p class="trade-kicker">Как проходит Trade-in</p>
          <h2 id="trade-steps-title">
            От данных об<br />автомобиле до зачёта<br />стоимости
          </h2>
          <p>
            На каждом этапе понятно, что происходит сейчас и какой следующий
            шаг.
          </p>
          <a class="trade-button site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
            >Получить консультацию
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt=""
          /></a>
        </div>
        <ol class="trade-steps__list">
          <li>
            <span>01</span>
            <div>
              <h3>Получаем данные об автомобиле</h3>
              <p>Начинаем с основных данных и вашей задачи.</p>
            </div>
          </li>
          <li>
            <span>02</span>
            <div>
              <h3>Проводим осмотр и оценку</h3>
              <p>Проверяем информацию и обсуждаем возможный сценарий.</p>
            </div>
          </li>
          <li>
            <span>03</span>
            <div>
              <h3>Объясняем предложенную стоимость</h3>
              <p>Показываем результат и отвечаем на вопросы.</p>
            </div>
          </li>
          <li>
            <span>04</span>
            <div>
              <h3>Зачитываем её при оформлении</h3>
              <p>Фиксируем согласованные условия в документах.</p>
            </div>
          </li>
        </ol>
      </section>

      <section class="trade-faq" aria-labelledby="trade-faq-title">
        <div class="trade-faq__intro">
          <p class="trade-kicker">Коротко о важном</p>
          <h2 id="trade-faq-title">Вопросы по услуге</h2>
          <p>
            Если вашей ситуации нет в списке, начните с короткой консультации.
          </p>
          <a href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
            ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/black-chat.svg' ) ); ?>" alt="" />Задать свой вопрос</a
          >
        </div>
        <div class="trade-accordion">
          <article class="accordion-item">
            <button
              class="accordion-trigger"
              type="button"
              aria-expanded="true"
            >
              Как проходит предварительная оценка?<span
                aria-hidden="true"
              ></span>
            </button>
            <div class="accordion-panel is-open">
              Сначала специалист получает основные сведения и фотографии.
              Итоговая стоимость определяется после осмотра автомобиля и
              документов.
            </div>
          </article>
          <article class="accordion-item">
            <button
              class="accordion-trigger"
              type="button"
              aria-expanded="false"
            >
              Можно зачесть только часть стоимости?<span
                aria-hidden="true"
              ></span>
            </button>
            <div class="accordion-panel">
              Да, согласованную стоимость можно зачесть полностью или частично.
            </div>
          </article>
          <article class="accordion-item">
            <button
              class="accordion-trigger"
              type="button"
              aria-expanded="false"
            >
              Что делать, если новый автомобиль дороже?<span
                aria-hidden="true"
              ></span>
            </button>
            <div class="accordion-panel">
              Разницу можно доплатить на согласованных условиях оформления.
            </div>
          </article>
        </div>
      </section>

      <section class="trade-final" aria-labelledby="trade-final-title">
        <div>
          <p>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/red-chat.svg' ) ); ?>" alt="" />Консультация
            без обязательств
          </p>
          <h2 id="trade-final-title">Обсудим оценку вашего автомобиля</h2>
        </div>
        <a class="trade-button site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
          >Оценить автомобиль</a
        >
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
    <a class="trade-contact" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
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
