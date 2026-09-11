<?php
/**
 * Template Name: Согласие на обработку персональных данных
 * Template Post Type: page
 */
$production_options  = tvoe_auto_production_options();
$approved_at         = trim( (string) $production_options['legal_approved_at'] );
$approved_at_display = $approved_at ? wp_date( 'd.m.Y', strtotime( $approved_at ) ) : '';

get_header( null, array(
    'body_class' => '',
    'page_key'   => 'personal-data-consent',
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
          ><a class="header-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>">Подобрать авто</a>
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

    <main class="legal-page">
      <div class="legal-page__inner">
        <p class="legal-page__eyebrow">Отдельный документ</p>
        <h1>Согласие на обработку персональных данных</h1>
        <p class="legal-page__lead">
          Согласие относится только к данным, которые пользователь добровольно
          вводит в выбранную форму для получения ответа или предложения.
        </p>
        <div class="legal-page__notice" role="note">
          <strong>Как фиксируется согласие</strong>
          После отправки формы WordPress сохраняет версию согласия, дату и
          время его получения, тип формы и источник обращения. Заявка доступна
          только в закрытом разделе «Заявки».
        </div>

        <div class="legal-page__content">
          <section class="legal-page__section">
            <h2>1. Кому предоставляется согласие</h2>
            <p>
              Оператор: индивидуальный предприниматель Гулиев Заур
              Зульфигарович, ИНН 222208551746, ОГРНИП 319222500013820; адрес:
              656006, Россия, Алтайский край, г. Барнаул, ул. Взлётная, д. 13,
              кв. 77; email:
              <a href="mailto:Zaur.guliew@yandex.ru">Zaur.guliew@yandex.ru</a>.
            </p>
          </section>

          <section class="legal-page__section">
            <h2>2. Выражение согласия</h2>
            <p>
              Устанавливая обязательный чекбокс рядом со ссылкой на настоящий
              документ и отправляя форму, пользователь свободно, своей волей и
              в своём интересе даёт конкретное, предметное, информированное,
              сознательное и однозначное согласие на обработку указанных ниже
              персональных данных.
            </p>
            <p>
              Чекбокс изначально не отмечен. Без его отметки отправка формы
              блокируется. Согласие не включает рекламные рассылки и публикацию
              данных в открытом доступе.
            </p>
          </section>

          <section class="legal-page__section" id="consultation">
            <h2>3. Консультация и обратная связь</h2>
            <p>
              Для ответа на обращение и согласования консультации обрабатываются:
              имя, номер телефона, город, интересующая услуга и предпочтительный
              способ связи. Источник — форма на главной странице или странице
              контактов.
            </p>
          </section>

          <section class="legal-page__section" id="trade-in">
            <h2>4. Предварительная оценка Trade-in</h2>
            <p>
              Для связи по предварительной оценке обрабатываются: марка и модель
              автомобиля, год выпуска и номер телефона. Эти данные используются
              только для подготовки ответа по обращению.
            </p>
          </section>

          <section class="legal-page__section" id="application">
            <h2>5. Заявка на подбор автомобиля</h2>
            <p>
              Для уточнения задачи и подготовки персонального предложения
              обрабатываются: имя, номер телефона, город, предпочтительный способ
              связи, параметры искомого автомобиля, назначение автомобиля,
              планируемый способ покупки, бюджет, первоначальный и желаемый
              ежемесячный платёж, срок и дополнительные пожелания.
            </p>
            <p>
              Не указывайте в свободных полях паспортные данные, банковские
              реквизиты, сведения о здоровье, биометрические данные, пароли и
              другую чувствительную информацию.
            </p>
          </section>

          <section class="legal-page__section">
            <h2>6. Действия с данными и способ обработки</h2>
            <p>
              Согласие предоставляется на сбор, запись, систематизацию,
              накопление, хранение, уточнение, извлечение, использование,
              предоставление лицам, обрабатывающим данные по поручению оператора,
              блокирование, удаление и уничтожение данных с использованием
              средств автоматизации и без их использования.
            </p>
            <p>
              Заявка сохраняется в WordPress. Для оперативной обработки
              Оператор может направлять служебные уведомления на электронную
              почту и в Telegram через Telegram Bot API. В Telegram передаются
              только данные, необходимые для конкретной заявки.
            </p>
          </section>

          <section class="legal-page__section">
            <h2>7. Срок действия и отзыв</h2>
            <p>
              Согласие действует до достижения цели обращения или отзыва, но не
              более 180 календарных дней, и в любом случае не дольше, чем это
              необходимо для указанной
              цели, если иное не предусмотрено законом или договором.
            </p>
            <p>
              Согласие может быть отозвано обращением на
              <a href="mailto:Zaur.guliew@yandex.ru">Zaur.guliew@yandex.ru</a>
              или по адресу: 656006, Россия, Алтайский край, г. Барнаул, ул.
              Взлётная, д. 13, кв. 77, с
              указанием данных, позволяющих найти обращение. После получения
              отзыва оператор прекращает обработку и удаляет данные в сроки,
              установленные законом, если отсутствует иное законное основание.
            </p>
          </section>

          <section class="legal-page__section">
            <h2>8. Локализация и безопасность</h2>
            <p>
              Первичная запись и хранение данных граждан РФ должны выполняться в
              базе данных на территории Российской Федерации. Оператор
              обеспечивает разграничение доступа, журналирование, резервное
              копирование и порядок удаления данных.
            </p>
            <p>
              Содержимое форм сохраняется в закрытом разделе WordPress
              «Заявки». Передача уведомлений в Telegram может затрагивать
              обработку данных за пределами Российской Федерации и производится
              Оператором при соблюдении требований законодательства.
              <?php if ( $approved_at_display ) : ?>Дата утверждения согласия: <?php echo esc_html( $approved_at_display ); ?>.<?php else : ?>Согласие не утверждено: до указания фактической даты его нельзя использовать для приёма заявок.<?php endif; ?>
            </p>
          </section>
        </div>
        <a class="legal-back" href="<?php echo esc_url( tvoe_auto_page_url( 'privacy' ) . '' ); ?>"
          >← Политика обработки персональных данных</a
        >
      </div>
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
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'reviews' ) . '' ); ?>">Отзывы</a
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'faq' ) . '' ); ?>">Вопросы и ответы</a
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'contact' ) . '' ); ?>">Контакты</a>
          </div>
          <div class="footer-coverage footer-legal">
            <h3>Документы</h3>
            <a href="<?php echo esc_url( tvoe_auto_page_url( 'privacy' ) . '' ); ?>">Политика обработки персональных данных</a
            ><a href="<?php echo esc_url( tvoe_auto_page_url( 'personal-data-consent' ) . '' ); ?>" aria-current="page"
              >Согласие на обработку персональных данных</a
            ><a href="#privacy-settings" data-privacy-settings>Настройки cookie</a>
          </div>
        </div>
        <div class="footer-bottom">
          <p>© 2026 «Твоё Авто Сибирь»</p>
          <p>
            Все расчёты на сайте являются предварительными и не являются
            публичной офертой.
          </p>
          <div class="footer-credit">
            <span><a href="https://xo-webstudio.ru/" target="_blank" rel="noopener noreferrer">Разработано маркетинговым агентством XO-STUDIO</a></span>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/xo.svg' ) ); ?>" alt="" />
          </div>
        </div>
      </div>
    </footer>
<?php get_footer(); ?>
