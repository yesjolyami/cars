<?php
/**
 * Template Name: Автоподбор
 * Template Post Type: page
 */
get_header( null, array(
    'body_class' => 'selection-page',
    'page_key'   => 'selection',
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
            >Начать подбор</a
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

    <main class="selection-main">
      <section class="selection-hero" aria-labelledby="selection-title">
        <div class="selection-hero__copy">
          <p class="selection-kicker">Бесплатный автоподбор</p>
          <h1 id="selection-title">Найдём автомобиль под вашу задачу</h1>
          <p class="selection-hero__lead">
            Сначала разбираемся, какой автомобиль нужен именно вам. Затем ищем
            варианты, проверяем их и показываем только то, что подходит по
            бюджету, состоянию и сценарию использования.
          </p>
          <div class="selection-hero__actions">
            <a
              class="selection-button selection-button--red site-cta"
              href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
              >Обсудить задачу
              <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt="" /></a
            ><a
              class="selection-button selection-button--outline site-cta site-cta--secondary"
              href="#selection-process"
              >Как проходит подбор</a
            >
          </div>
          <ul class="selection-hero__facts">
            <li>Подбор без оплаты</li>
            <li>Проверка до сделки</li>
            <li>Сопровождение в вашем городе</li>
          </ul>
        </div>
        <div class="selection-hero__visual">
          <img fetchpriority="high" decoding="async"
            src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/selection.webp' ) ); ?>"
            alt="Автомобиль, подобранный для клиента"
          />
          <div class="selection-hero__badge">
            <img decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/selection-badge.svg' ) ); ?>" alt="" />Проверяем до
            40 параметров
          </div>
        </div>
      </section>

      <section class="selection-metrics" aria-label="Что входит в автоподбор">
        <div class="selection-frame">
          <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/metric-shield.svg' ) ); ?>" alt="" />
            <div>
              <strong>История</strong><span>владения и ограничения</span>
            </div>
          </article>
          <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/metric-done-vector.svg' ) ); ?>" alt="" />
            <div>
              <strong>Диагностика</strong><span>основных узлов автомобиля</span>
            </div>
          </article>
          <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/metric-location.svg' ) ); ?>" alt="" />
            <div>
              <strong>Любой город</strong><span>начинаем подбор онлайн</span>
            </div>
          </article>
          <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/metric-time.svg' ) ); ?>" alt="" />
            <div>
              <strong>Экономим время</strong
              ><span>отсекаем неподходящие варианты</span>
            </div>
          </article>
        </div>
      </section>

      <section
        class="selection-process"
        id="selection-process"
        aria-labelledby="selection-process-title"
      >
        <div class="selection-frame">
          <div class="selection-section-heading">
            <div>
              <p class="selection-kicker">Понятный маршрут</p>
              <h2 id="selection-process-title">
                От первого разговора<br />до ключей в руках
              </h2>
            </div>
            <p>
              Не отправляем длинную анкету и не заставляем выбирать из случайных
              вариантов. Сначала фиксируем задачу, а дальше двигаемся по шагам.
            </p>
          </div>
          <ol class="selection-steps">
            <li>
              <span>01</span>
              <div>
                <h3>Знакомимся</h3>
                <p>
                  Уточняем бюджет, город, сроки и то, как автомобиль будет
                  использоваться.
                </p>
              </div>
            </li>
            <li>
              <span>02</span>
              <div>
                <h3>Формируем запрос</h3>
                <p>
                  Отделяем обязательные параметры от пожеланий и определяем
                  комфортный сценарий.
                </p>
              </div>
            </li>
            <li>
              <span>03</span>
              <div>
                <h3>Ищем и проверяем</h3>
                <p>
                  Изучаем историю, документы, продавца и техническое состояние
                  подходящих машин.
                </p>
              </div>
            </li>
            <li>
              <span>04</span>
              <div>
                <h3>Сопровождаем</h3>
                <p>
                  Помогаем сравнить варианты, аргументированно торговаться и
                  оформить сделку.
                </p>
              </div>
            </li>
          </ol>
        </div>
      </section>

      <section class="selection-audit" aria-labelledby="selection-audit-title">
        <div class="selection-audit__visual">
          <img loading="lazy" decoding="async"
            src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/selection.webp' ) ); ?>"
            alt="Автомобиль на этапе проверки"
          />
        </div>
        <div class="selection-audit__content">
          <p class="selection-kicker">Что проверяем</p>
          <h2 id="selection-audit-title">Важен не только внешний вид</h2>
          <p class="selection-audit__lead">
            Помогаем увидеть полную картину до принятия решения, чтобы красивое
            объявление не стало дорогой неожиданностью.
          </p>
          <ul>
            <li>
              <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/selection-check.svg' ) ); ?>" alt="" />Историю
              владения, залоги и ограничения
            </li>
            <li>
              <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/selection-check.svg' ) ); ?>" alt="" />Документы
              автомобиля и продавца
            </li>
            <li>
              <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/selection-check.svg' ) ); ?>" alt="" />Кузов,
              двигатель и основные узлы
            </li>
            <li>
              <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-home/selection-check.svg' ) ); ?>" alt="" />Реальную
              стоимость и пространство для торга
            </li>
          </ul>
          <a
            class="selection-button selection-button--dark site-cta"
            href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
            >Подобрать автомобиль
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt=""
          /></a>
        </div>
      </section>

      <section
        class="selection-principles"
        aria-labelledby="selection-principles-title"
      >
        <div class="selection-frame">
          <div class="selection-section-heading">
            <div>
              <p class="selection-kicker">Наш подход</p>
              <h2 id="selection-principles-title">
                Подбор под человека,<br />а не под остатки площадки
              </h2>
            </div>
            <p>
              Можно начать с конкретной модели, а можно — с задачи. В обоих
              случаях решение строится вокруг ваших условий.
            </p>
          </div>
          <div class="selection-principles__list">
            <article>
              <span>01</span>
              <h3>Сначала задача</h3>
              <p>
                Для работы, семьи, поездок по городу или дальних маршрутов — у
                каждого запроса свои приоритеты.
              </p>
            </article>
            <article>
              <span>02</span>
              <h3>Только подходящие варианты</h3>
              <p>
                Не перегружаем десятками ссылок. Показываем несколько
                автомобилей, которые действительно стоит сравнить.
              </p>
            </article>
            <article>
              <span>03</span>
              <h3>Решение остаётся за вами</h3>
              <p>
                Объясняем сильные и слабые стороны каждого варианта, чтобы вы
                принимали решение спокойно.
              </p>
            </article>
          </div>
        </div>
      </section>

      <section
        class="selection-scenarios"
        id="selection-scenarios"
        aria-labelledby="selection-scenarios-title"
      >
        <div class="selection-frame">
          <div class="selection-scenarios__intro">
            <p class="selection-kicker">Не только марка и модель</p>
            <h2 id="selection-scenarios-title">
              Начинаем с того,<br />как вы будете ездить
            </h2>
            <p>
              Один и тот же бюджет можно потратить по-разному. Поэтому сначала
              определяем реальный сценарий, а уже затем — класс, кузов и
              комплектацию автомобиля.
            </p>
          </div>
          <div class="selection-scenarios__list">
            <article>
              <span>01</span>
              <div>
                <h3>Каждый день по городу</h3>
                <p>Манёвренность, понятное обслуживание и удобство в пробках.</p>
              </div>
              <strong>Город</strong>
            </article>
            <article>
              <span>02</span>
              <div>
                <h3>Семья и повседневные дела</h3>
                <p>Пространство в салоне, багажник и комфорт для пассажиров.</p>
              </div>
              <strong>Семья</strong>
            </article>
            <article>
              <span>03</span>
              <div>
                <h3>Работа и частые поездки</h3>
                <p>Практичность, предсказуемые расходы и запас по ресурсу.</p>
              </div>
              <strong>Работа</strong>
            </article>
            <article>
              <span>04</span>
              <div>
                <h3>Трасса и дальние маршруты</h3>
                <p>Уверенное поведение на дороге, комфорт и подходящая динамика.</p>
              </div>
              <strong>Поездки</strong>
            </article>
          </div>
        </div>
      </section>

      <section
        class="selection-result"
        id="selection-result"
        aria-labelledby="selection-result-title"
      >
        <div class="selection-frame">
          <div class="selection-result__copy">
            <p class="selection-kicker">Итог подбора</p>
            <h2 id="selection-result-title">
              Не просто ссылка<br />на объявление
            </h2>
            <p>
              Для каждого финального варианта собираем главное в одной понятной
              карточке. Видно, почему автомобиль подходит и на что обратить
              внимание перед решением.
            </p>
            <a
              class="selection-button selection-button--red site-cta"
              href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
              >Начать подбор
              <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt=""
            /></a>
          </div>
          <article class="selection-dossier" aria-label="Пример карточки автомобиля">
            <div class="selection-dossier__head">
              <div>
                <span>Финальный вариант</span>
                <h3>Карточка автомобиля</h3>
              </div>
              <b>01</b>
            </div>
            <dl>
              <div>
                <dt>Задача</dt>
                <dd>Соответствует вашему сценарию</dd>
              </div>
              <div>
                <dt>История</dt>
                <dd>Факты собраны и объяснены</dd>
              </div>
              <div>
                <dt>Состояние</dt>
                <dd>Есть понятный план проверки</dd>
              </div>
              <div>
                <dt>Решение</dt>
                <dd>Плюсы и нюансы для сравнения</dd>
              </div>
            </dl>
            <div class="selection-dossier__footer">
              <span>Рекомендация специалиста</span>
              <strong>Можно рассматривать дальше</strong>
            </div>
          </article>
        </div>
      </section>

      <section class="selection-faq" aria-labelledby="selection-faq-title">
        <div class="selection-frame">
          <div class="selection-faq__intro">
            <p class="selection-kicker">Коротко о важном</p>
            <h2 id="selection-faq-title">Вопросы по подбору</h2>
            <p>
              Если вашей ситуации нет в списке, начните с короткой консультации.
            </p>
            <a href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>">Задать свой вопрос <span>→</span></a>
          </div>
          <div class="selection-accordion">
            <article class="selection-accordion__item">
              <button
                class="accordion-trigger"
                type="button"
                aria-expanded="true"
              >
                Подбор действительно бесплатный?<span aria-hidden="true"></span>
              </button>
              <div class="accordion-panel is-open">
                Да. Короткая консультация, формирование запроса и поиск
                подходящих вариантов не требуют оплаты.
              </div>
            </article>
            <article class="selection-accordion__item">
              <button
                class="accordion-trigger"
                type="button"
                aria-expanded="false"
              >
                Можно подобрать автомобиль в другом городе?<span
                  aria-hidden="true"
                ></span>
              </button>
              <div class="accordion-panel">
                Да. Начинаем онлайн, а варианты и способ проверки согласуем с
                учётом города и расстояния.
              </div>
            </article>
            <article class="selection-accordion__item">
              <button
                class="accordion-trigger"
                type="button"
                aria-expanded="false"
              >
                Вы проверяете автомобиль до моего выезда?<span
                  aria-hidden="true"
                ></span>
              </button>
              <div class="accordion-panel">
                Да. Сначала изучаем доступную информацию и документы, затем
                согласуем дальнейшую диагностику.
              </div>
            </article>
            <article class="selection-accordion__item">
              <button
                class="accordion-trigger"
                type="button"
                aria-expanded="false"
              >
                Нужно ли заранее знать марку и модель?<span
                  aria-hidden="true"
                ></span>
              </button>
              <div class="accordion-panel">
                Нет. Достаточно описать задачу, бюджет и условия использования —
                подходящие варианты определим вместе.
              </div>
            </article>
          </div>
        </div>
      </section>

      <section class="selection-final" aria-labelledby="selection-final-title">
        <div class="selection-frame">
          <div>
            <p class="selection-kicker">Первый шаг — 2 минуты</p>
            <h2 id="selection-final-title">
              Расскажите, какой автомобиль вам нужен
            </h2>
            <p>
              Специалист уточнит детали, зафиксирует задачу и подскажет, с чего
              лучше начать.
            </p>
          </div>
          <a
            class="selection-button selection-button--red site-cta"
            href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>"
            >Начать бесплатный подбор
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt=""
          /></a>
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
