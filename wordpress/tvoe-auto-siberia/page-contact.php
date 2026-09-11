<?php
/**
 * Template Name: Контакты
 * Template Post Type: page
 */
get_header( null, array(
    'body_class' => 'contact-page',
    'page_key'   => 'contact',
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
          ><a class="header-cta site-cta site-cta--header" href="#contact-form"
            >Оставить заявку</a
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

    <main class="contact-main">
      <section class="contact-hero" aria-labelledby="contact-title">
        <div class="contact-copy">
          <p class="contact-kicker">Контакты</p>
          <h1 id="contact-title">Начнём с короткого<br />разговора</h1>
          <p class="contact-copy__lead">
            Подскажем, какой сценарий подходит вашей ситуации, и<br />договоримся
            о следующем шаге.
          </p>
          <a class="contact-copy__phone" href="tel:+79132431855"
            ><img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-contact/phone.png' ) ); ?>" alt="" />+7 (913)
            243-18-55</a
          >
          <p class="contact-hours">Ежедневно · 9:00–20:00</p>
          <div class="contact-socials">
            <a href="https://vk.ru/tvoeavtosibir" target="_blank" rel="noopener noreferrer" aria-label="ВКонтакте"
              ><img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/vk.svg' ) ); ?>" alt="" /></a
            ><a href="https://t.me/zaurguliev" target="_blank" rel="noopener noreferrer" aria-label="Telegram"
              ><img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/tg.svg' ) ); ?>" alt="" /></a
            ><a href="https://max.ru/u/f9LHodD0cOIUivXn20beSQhbKedn7hrTKBBsMGf1t2Tjr3zL1KJ-W_a5pi0" target="_blank" rel="noopener noreferrer" aria-label="MAX"
              ><img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/max.svg' ) ); ?>" alt="" /></a
            ><a href="https://wa.me/79132431855" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/wa.svg' ) ); ?>" alt=""
            /></a>
          </div>
        </div>

        <form
          id="contact-form"
          class="contact-form"
          action=""
          method="post"
          data-personal-data-form
        >
          <label class="contact-field contact-field--name"
            ><span>Ваше имя</span
            ><input
              type="text"
              name="name"
              placeholder="Как к вам обращаться?"
              minlength="2"
              required
          /></label>
          <label class="contact-field contact-field--phone"
            ><span>Телефон</span
            ><input
              type="tel"
              name="phone"
              placeholder="+7 (___) ___-__-__"
              inputmode="tel"
              autocomplete="tel"
              maxlength="18"
              pattern="\+7 \([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}"
              required
          /></label>
          <label class="contact-field contact-field--city"
            ><span>Город</span
            ><input type="text" name="city" placeholder="Введите город" autocomplete="address-level2" required /></label
          >
          <label class="contact-field contact-field--service"
            ><span>Услуга</span
            ><select name="service" required>
              <option value="" selected disabled>Выберите услугу</option>
              <option value="Автоподбор">Автоподбор</option>
              <option value="Рассрочка">Рассрочка</option>
              <option value="Аренда с выкупом">Аренда с выкупом</option>
              <option value="Trade-in">Trade-in</option>
            </select></label
          >
          <fieldset class="contact-methods">
            <legend>Как с вами связаться?</legend>
            <div class="contact-methods__options">
              <label
                ><input type="radio" name="contact-method" value="phone" required />
                Телефон</label
              >
              <label
                ><input
                  type="radio"
                  name="contact-method"
                  value="telegram"
                />
                Telegram</label
              >
              <label
                ><input type="radio" name="contact-method" value="max" />
                MAX</label
              >
            </div>
          </fieldset>
          <button
            class="contact-form__submit site-cta"
            type="submit"
            disabled
            aria-disabled="true"
          >
            Получить консультацию
            <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-contact/submit.png' ) ); ?>" alt="" />
          </button>
          <label class="contact-consent form-privacy-consent"
            ><input
              type="checkbox"
              name="personal-data-consent"
              value="2026-08-26"
              required
            /><span
              >Даю <a href="<?php echo esc_url( tvoe_auto_page_url( 'personal-data-consent' ) . '#consultation' ); ?>" target="_blank" rel="noopener noreferrer">согласие на обработку персональных данных</a> и ознакомлен с <a href="<?php echo esc_url( tvoe_auto_page_url( 'privacy' ) . '' ); ?>" target="_blank" rel="noopener noreferrer">Политикой обработки персональных данных</a>.</span
            ></label
          >
          <p class="contact-form__status" role="status" aria-live="polite"></p>
        </form>
      </section>

      <section class="contact-office" aria-labelledby="office-title">
        <div class="contact-office__copy">
          <p><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-contact/office.png' ) ); ?>" alt="" />Главный офис</p>
          <h2 id="office-title">Барнаул</h2>
          <span
            >Точный адрес и время визита специалист подтвердит после
            звонка.</span
          >
        </div>
        <div
          class="contact-map"
          aria-label="Твоё Авто Сибирь на Яндекс Картах"
          data-external-map
          data-map-src="https://yandex.ru/map-widget/v1/?ll=83.680746%2C53.338054&amp;mode=search&amp;oid=96736411134&amp;ol=biz&amp;z=16"
          data-map-title="Твоё Авто Сибирь на Яндекс Картах"
        >
          <div data-map-placeholder>
            <div class="external-map__content">
              <strong>Карта загружается только с разрешения</strong>
              <p>
                При загрузке виджета Яндекс получит IP-адрес, User-Agent и
                технические сведения о запросе.
              </p>
              <div class="external-map__actions">
                <button type="button" data-load-external-map>Показать карту</button>
                <a
                  href="https://yandex.ru/navi/org/tvoyo_avto_sibir/96736411134"
                  target="_blank"
                  rel="noopener noreferrer"
                  >Открыть в Яндексе</a
                >
              </div>
            </div>
          </div>
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
    <a class="contact-float" href="#contact-form"
      ><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/double-chat.svg' ) ); ?>" alt="" />Связаться</a
    >
    <a
      class="site-yandex-link"
      href="https://yandex.ru/navi/org/tvoyo_avto_sibir/96736411134"
      target="_blank"
      rel="noopener noreferrer"
    >
    </a>
    <script>
      window.tvoeAuto = window.tvoeAuto || {};
      window.tvoeAuto.leadEndpoint = window.tvoeAuto.leadEndpoint || '/wp-json/tvoe-auto/v1/leads';
    </script>
<?php get_footer(); ?>
