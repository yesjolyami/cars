<?php
/**
 * Template Name: Заявка на подбор
 * Template Post Type: page
 */
get_header( null, array(
    'body_class' => 'application-page',
    'page_key'   => 'application',
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
          ><a
            class="header-cta site-cta site-cta--header"
            href="#application-form"
            >Заполнить заявку</a
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
      <section class="application-hero" aria-labelledby="application-title">
        <div class="application-frame application-hero__grid">
          <div class="application-hero__copy">
            <a class="application-back" href="<?php echo esc_url( tvoe_auto_page_url( 'home' ) . '' ); ?>"
              ><span aria-hidden="true">←</span> На основной сайт</a
            >
            <p class="application-kicker">Персональный подбор</p>
            <h1 id="application-title">
              Расскажите, какой автомобиль вам нужен
            </h1>
            <p class="application-hero__lead">
              Заполните короткую анкету — менеджер заранее изучит запрос и
              свяжется с вами уже с предметными вариантами.
            </p>
            <ul class="application-benefits" aria-label="Преимущества заявки">
              <li><strong>3–5 минут</strong><span>на заполнение</span></li>
              <li><strong>Бесплатно</strong><span>без обязательств</span></li>
              <li><strong>По задаче</strong><span>а не по остаткам</span></li>
            </ul>
          </div>
          <div class="application-hero__visual" aria-hidden="true">
            <img fetchpriority="high" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/hero-car.webp' ) ); ?>" alt="Подбор автомобиля с пробегом — Твоё Авто Сибирь" width="1672" height="941" />
          </div>
        </div>
      </section>

      <section class="application-content" id="client-application">
        <div class="application-frame application-content__grid">
          <aside class="application-aside" aria-label="О заявке">
            <p class="application-kicker">Заявка на автомобиль</p>
            <h2>Коротко и по делу</h2>
            <p>
              Обязательные поля отмечены звёздочкой. Если по какому-то пункту
              ещё не определились, оставьте его пустым — обсудим при звонке.
            </p>
            <ol>
              <li><span>01</span>Контакты</li>
              <li><span>02</span>Автомобиль</li>
              <li><span>03</span>Условия покупки</li>
            </ol>
            <div class="application-aside__privacy">
              Данные используются только для обработки заявки. Условия и
              возможные обработчики указаны в Политике.
            </div>
          </aside>

          <form
            id="application-form"
            class="application-form"
            action=""
            method="post"
            data-client-application
            data-personal-data-form
          >
            <section
              class="application-form__section"
              aria-labelledby="application-contacts-title"
            >
              <div class="application-form__heading">
                <span>01</span>
                <span
                  ><h2 id="application-contacts-title">Контакты</h2>
                  <small>Как с вами связаться</small></span
                >
              </div>
              <div class="application-fields application-fields--two application-fields--contacts">
                <label class="application-field">
                  <span>Ваше имя *</span>
                  <input
                    type="text"
                    name="name"
                    autocomplete="name"
                    minlength="2"
                    placeholder="Как к вам обращаться?"
                    required
                  />
                </label>
                <div class="application-field application-phone-field">
                  <label for="application-phone">Телефон *</label>
                  <input
                    id="application-phone"
                    type="tel"
                    name="phone"
                    autocomplete="tel"
                    inputmode="tel"
                    placeholder="+7 (___) ___-__-__"
                    pattern="\+7 \([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}"
                    maxlength="18"
                    title="Введите российский номер полностью: +7 (999) 999-99-99"
                    required
                  />
                  <label class="application-phone-toggle">
                    <input
                      type="checkbox"
                      name="foreign-phone"
                      value="yes"
                      aria-controls="application-phone"
                    />
                    <span aria-hidden="true"></span>
                    Нет российского номера
                  </label>
                </div>
                <label class="application-field">
                  <span>Город *</span>
                  <input
                    type="text"
                    name="city"
                    autocomplete="address-level2"
                    placeholder="Например, Барнаул"
                    required
                  />
                </label>
              </div>
              <fieldset class="application-choice-group">
                <legend>Как удобнее связаться? *</legend>
                <div class="application-options">
                  <label
                    ><input
                      type="radio"
                      name="contact-method"
                      value="Телефон"
                      required
                    /><span>Телефон</span></label
                  >
                  <label
                    ><input
                      type="radio"
                      name="contact-method"
                      value="Telegram"
                    /><span>Telegram</span></label
                  >
                  <label
                    ><input
                      type="radio"
                      name="contact-method"
                      value="WhatsApp"
                    /><span>WhatsApp</span></label
                  >
                  <label
                    ><input
                      type="radio"
                      name="contact-method"
                      value="MAX"
                    /><span>MAX</span></label
                  >
                </div>
              </fieldset>
            </section>

            <section
              class="application-form__section"
              aria-labelledby="application-car-title"
            >
              <div class="application-form__heading">
                <span>02</span>
                <span
                  ><h2 id="application-car-title">Автомобиль</h2>
                  <small>Что будем искать</small></span
                >
              </div>
              <div class="application-fields application-fields--two">
                <label class="application-field">
                  <span>Марка и модель</span>
                  <input
                    type="text"
                    name="car"
                    placeholder="Например, Toyota Camry"
                  />
                </label>
                <label class="application-field">
                  <span>Год выпуска</span>
                  <select name="year">
                    <option value="">Пока не определился</option>
                    <option value="2022 и новее">2022 и новее</option>
                    <option value="2018–2021">2018–2021</option>
                    <option value="2014–2017">2014–2017</option>
                    <option value="До 2014">До 2014</option>
                  </select>
                </label>
                <label class="application-field">
                  <span>Тип кузова</span>
                  <select name="body-type">
                    <option value="">Любой подходящий</option>
                    <option value="Седан">Седан</option>
                    <option value="Хэтчбек">Хэтчбек</option>
                    <option value="Универсал">Универсал</option>
                    <option value="Кроссовер">Кроссовер</option>
                    <option value="Внедорожник">Внедорожник</option>
                    <option value="Минивэн">Минивэн</option>
                    <option value="Коммерческий">Коммерческий</option>
                  </select>
                </label>
                <label class="application-field">
                  <span>Коробка передач</span>
                  <select name="transmission">
                    <option value="">Не принципиально</option>
                    <option value="Автомат">Автомат</option>
                    <option value="Механика">Механика</option>
                  </select>
                </label>
              </div>
              <label class="application-field application-field--wide">
                <span>Для каких задач нужен автомобиль?</span>
                <input
                  type="text"
                  name="purpose"
                  placeholder="Город, семья, работа, дальние поездки…"
                />
              </label>
            </section>

            <section
              class="application-form__section"
              aria-labelledby="application-conditions-title"
            >
              <div class="application-form__heading">
                <span>03</span>
                <span
                  ><h2 id="application-conditions-title">Условия покупки</h2>
                  <small>Бюджет и сроки</small></span
                >
              </div>
              <fieldset class="application-choice-group">
                <legend>Как планируете оформить автомобиль? *</legend>
                <div class="application-options application-options--purchase">
                  <label
                    ><input
                      type="radio"
                      name="purchase-type"
                      value="Полная оплата"
                      required
                    /><span>Полная оплата</span></label
                  >
                  <label
                    ><input
                      type="radio"
                      name="purchase-type"
                      value="Рассрочка"
                    /><span>Рассрочка</span></label
                  >
                  <label
                    ><input
                      type="radio"
                      name="purchase-type"
                      value="Аренда с выкупом"
                    /><span>Аренда с выкупом</span></label
                  >
                  <label
                    ><input
                      type="radio"
                      name="purchase-type"
                      value="Trade-in"
                    /><span>Trade-in</span></label
                  >
                </div>
              </fieldset>
              <div class="application-fields application-fields--two">
                <label class="application-field">
                  <span>Бюджет на автомобиль *</span>
                  <input
                    type="text"
                    name="budget"
                    inputmode="numeric"
                    placeholder="Например, до 1 500 000 ₽"
                    required
                  />
                </label>
                <label class="application-field">
                  <span>Первоначальный взнос</span>
                  <input
                    type="text"
                    name="initial-payment"
                    inputmode="numeric"
                    placeholder="Если планируется"
                  />
                </label>
                <label class="application-field">
                  <span>Желаемый платёж в месяц</span>
                  <input
                    type="text"
                    name="monthly-payment"
                    inputmode="numeric"
                    placeholder="Если планируется"
                  />
                </label>
                <label class="application-field">
                  <span>Когда нужен автомобиль?</span>
                  <select name="timing">
                    <option value="">Срок пока не определён</option>
                    <option value="Как можно скорее">Как можно скорее</option>
                    <option value="В течение месяца">В течение месяца</option>
                    <option value="В течение 2–3 месяцев">
                      В течение 2–3 месяцев
                    </option>
                    <option value="Позже">Позже</option>
                  </select>
                </label>
              </div>
            </section>

            <div class="application-submit">
              <label class="application-consent form-privacy-consent">
                <input
                  type="checkbox"
                  name="policy-consent"
                  value="yes"
                  required
                />
                <span>Подтверждаю, что ознакомлен(а) с <a href="<?php echo esc_url( tvoe_auto_page_url( 'privacy' ) . '' ); ?>" target="_blank" rel="noopener noreferrer">Политикой обработки персональных данных</a>.</span>
              </label>
              <label class="application-consent form-privacy-consent">
                <input
                  type="checkbox"
                  name="personal-data-consent"
                  value="2026-08-26"
                  required
                />
                <span>Даю <a href="<?php echo esc_url( tvoe_auto_page_url( 'personal-data-consent' ) . '#application' ); ?>" target="_blank" rel="noopener noreferrer">согласие на обработку персональных данных</a>.</span>
              </label>
              <label class="application-consent form-privacy-consent">
                <input
                  type="checkbox"
                  name="advertising-consent"
                  value="yes"
                />
                <span>Согласен(на) получать информацию об акциях и специальных предложениях.</span>
              </label>
              <button class="site-cta" type="submit" disabled aria-disabled="true">
                Отправить заявку <span aria-hidden="true">→</span>
              </button>
              <p
                class="application-form__status"
                role="status"
                aria-live="polite"
              ></p>
            </div>
          </form>
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
<?php get_footer(); ?>
