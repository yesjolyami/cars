<?php
get_header( null, array(
    'body_class' => '',
    'page_key'   => 'home',
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
        <p>Работаем по Сибири</p>
      </div>
    </aside>

    <main>
      <section class="hero">
        <div class="hero__inner">
          <span class="hero__badge">Без банковского автокредита</span>
          <h1>Авто в рассрочку без банка в Сибири</h1>
          <p class="hero__lead">
            <span class="desktop-copy"
              >Помогаем подобрать автомобиль с пробегом, проверить состояние и
              оформить рассрочку на понятных условиях. Кредитная история,
              действующие задолженности и прошлое банкротство не являются
              автоматической причиной для отказа.</span
            ><span class="mobile-copy"
              >Подберём автомобиль с пробегом, проверим его состояние и
              предложим понятный индивидуальный сценарий оформления.</span
            >
          </p>
          <div class="hero__actions">
            <a class="action action--red action--wide site-cta" href="<?php echo esc_url( tvoe_auto_page_url( 'catalog' ) . '' ); ?>"
              >Перейти в каталог <span>→</span></a
            ><a
              class="action action--white site-cta site-cta--secondary"
              href="#calculator"
              >Рассчитать условия</a
            ><a
              class="action action--outline site-cta site-cta--secondary"
              href="<?php echo esc_url( tvoe_auto_page_url( 'trade-in' ) . '' ); ?>"
              >Оценить в trade-in</a
            >
          </div>
          <div class="hero__reasons">
            <span>С плохой кредитной историей</span
            ><span>С действующими задолженностями</span
            ><span>При долгах у судебных приставов</span
            ><span>После банкротства</span>
          </div>
          <div class="hero__social">
            <b
              >Автомобили, обзоры, условия в наших соц сетях - подписывайтесь</b
            >
            <div>
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
          <div class="hero__stats">
            <article>
              <strong>От 20%</strong><span>первоначальный взнос*</span>
            </article>
            <article>
              <strong>Индивидуально</strong
              ><span>Срок и ежемесячный платёж</span>
            </article>
          </div>
        </div>
      </section>

      <section class="process">
        <div class="frame">
          <div class="section-head section-head--process">
            <div>
              <span class="eyebrow">Не просто финансирование</span>
              <h2>Начинаем с вашей задачи, а не с анкеты</h2>
            </div>
            <p>
              Специалист помогает выбрать подходящий сценарий и остаётся рядом
              от первого разговора до передачи ключей.
            </p>
            
          </div>

          <div class="metrics">
            
            <article>
              <i aria-hidden="true"></i><strong>0 ₽</strong
              ><span>за профессиональный подбор</span>
            </article>
            <article>
              <i aria-hidden="true"></i><strong>100%</strong
              ><span>проверка истории и документов</span>
            </article>
            <article>
              <i aria-hidden="true"></i><strong>1 день</strong
              ><span>на предварительный ответ</span>
            </article>
            <article>
              <i aria-hidden="true"></i><strong>10+</strong
              ><span>города присутствия</span>
            </article>
          </div>
          <div class="service-cards">
            <article>
              <span class="service-no">01</span
              ><span class="service-icon">▣</span>
              <h3>Рассрочка без банка</h3>
              <p>
                Оформление напрямую через компанию. Финальные условия определяем
                после короткой заявки.
              </p>
              <a href="<?php echo esc_url( tvoe_auto_page_url( 'installment' ) . '' ); ?>">Подробнее <span>→</span></a>
            </article>
            <article>
              <span class="service-no">02</span
              ><span class="service-icon">▱</span>
              <h3>Аренда с выкупом</h3>
              <p>
                Пользуетесь автомобилем и постепенно выплачиваете его стоимость
                по договору.
              </p>
              <a href="<?php echo esc_url( tvoe_auto_page_url( 'rent-to-own' ) . '' ); ?>">Подробнее <span>→</span></a>
            </article>
            <article>
              <span class="service-no">03</span
              ><span class="service-icon">⌕</span>
              <h3>Бесплатный автоподбор</h3>
              <p>
                Ищем вместе с вами, проверяем историю, документы и техническое
                состояние.
              </p>
              <a href="<?php echo esc_url( tvoe_auto_page_url( 'selection' ) . '' ); ?>">Подробнее <span>→</span></a>
            </article>
            <article>
              <span class="service-no">04</span
              ><span class="service-icon">⊕</span>
              <h3>Trade-in</h3>
              <p>
                Оценим ваш автомобиль и зачтём его стоимость полностью или
                частично в первый взнос.
              </p>
              <a href="<?php echo esc_url( tvoe_auto_page_url( 'trade-in' ) . '' ); ?>">Подробнее <span>→</span></a>
            </article>
          </div>
        </div>
      </section>

      <section class="steps">
        <div class="frame steps__grid">
          <div class="steps__intro">
            <span class="eyebrow">Понятный маршрут</span>
            <h2>От заявки до авто — четыре шага</h2>
            <p>
              Никакой длинной анкеты на старте. Сначала коротко знакомимся с
              задачей и только потом собираем необходимые данные.
            </p>
            <a class="action action--red site-cta" href="#contact"
              >Обсудить мою ситуацию <span>→</span></a
            >
          </div>
          <ol class="steps__list">
            <li>
              <span>01</span>
              <div>
                <h3>Знакомимся</h3>
                <p>
                  Вы оставляете имя и телефон. Уточняем бюджет, город и задачу.
                </p>
              </div>
            </li>
            <li>
              <span>02</span>
              <div>
                <h3>Подбираем</h3>
                <p>
                  Показываем подходящие варианты из каталога или ищем автомобиль
                  под вас.
                </p>
              </div>
            </li>
            <li>
              <span>03</span>
              <div>
                <h3>Проверяем</h3>
                <p>
                  Изучаем историю, документы и техническое состояние автомобиля.
                </p>
              </div>
            </li>
            <li>
              <span>04</span>
              <div>
                <h3>Оформляем</h3>
                <p>
                  Фиксируем индивидуальные условия договора и передаём ключи.
                </p>
              </div>
            </li>
          </ol>
        </div>
      </section>

      <section class="catalog-section">
        <div class="frame">
          <div class="section-head catalog-head">
            <div>
              <span class="eyebrow">Автомобили в наличии</span>
              <h2>Варианты, с которых можно начать</h2>
            </div>
          </div>
          <div class="car-grid">
            <?php tvoe_auto_render_home_cars(); ?>
            <?php if ( false ) : ?>
            <article class="car-card">
              <div class="car-photo">
                <img loading="lazy" decoding="async"
                  src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>"
                  alt="Graphite Cross"
                />
              </div>
              <div class="car-info">
                <div class="car-title">
                  <div>
                    <h3>
                      <span class="desktop-copy">Graphite Cross</span
                      ><span class="mobile-copy">Navy Family SUV</span>
                    </h3>
                    <p>2021 · 2.0 · AT · 4WD</p>
                  </div>
                </div>
                <div class="car-pay">
                  <span>Первый взнос<b>от 438 000 ₽</b></span
                  ><span>Платёж<b>от 42 900 ₽/мес.</b></span>
                </div>
                <a class="site-cta site-cta--secondary" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                  >Узнать условия <span>→</span></a
                ><small
                  >Расчёт предварительный и не является публичной
                  офертой.</small
                >
              </div>
            </article>
            <article class="car-card">
              <div class="car-photo">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>" alt="White Sedan" />
              </div>
              <div class="car-info">
                <div class="car-title">
                  <div>
                    <h3>
                      <span class="desktop-copy">White Sedan</span
                      ><span class="mobile-copy">Navy Family SUV</span>
                    </h3>
                    <p>2020 · 1.6 · AT · передний</p>
                  </div>
                </div>
                <div class="car-pay">
                  <span>Первый взнос<b>от 328 000 ₽</b></span
                  ><span>Платёж<b>от 32 300 ₽/мес.</b></span>
                </div>
                <a class="site-cta site-cta--secondary" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                  >Узнать условия <span>→</span></a
                ><small
                  >Расчёт предварительный и не является публичной
                  офертой.</small
                >
              </div>
            </article>
            <article class="car-card">
              <div class="car-photo">
                <img loading="lazy" decoding="async"
                  src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' ) ); ?>"
                  alt="Navy Family SUV"
                />
              </div>
              <div class="car-info">
                <div class="car-title">
                  <div>
                    <h3>Navy Family SUV</h3>
                    <p>2022 · 2.0 · AT · 4WD</p>
                  </div>
                </div>
                <div class="car-pay">
                  <span>Первый взнос<b>от 556 000 ₽</b></span
                  ><span>Платёж<b>от 54 600 ₽/мес.</b></span>
                </div>
                <a class="site-cta site-cta--secondary" href="<?php echo esc_url( tvoe_auto_page_url( 'car' ) . '' ); ?>"
                  >Узнать условия <span>→</span></a
                ><small
                  >Расчёт предварительный и не является публичной
                  офертой.</small
                >
              </div>
            </article>
            <?php endif; ?>
          </div>
          <a class="all-link" href="<?php echo esc_url( tvoe_auto_page_url( 'catalog' ) . '' ); ?>"
            >Смотреть все автомобили <span>→</span></a
          >
        </div>
      </section>

      <section class="calculator-section" id="calculator">
        <div class="frame calculator">
          <div class="calculator__intro">
            <span class="eyebrow">Предварительный расчёт</span>
            <h2>Проверьте комфортный ориентир</h2>
            <p>
              Меняйте параметры — расчёт обновится сразу. Точные условия
              предложим после короткого разговора.
            </p>
          </div>
          <div class="calculator__fields">
            <label
              >Стоимость автомобиля <strong data-calc-price-value></strong
              ><input
                type="range"
                data-calc-price
                min="500000"
                max="6000000"
                value="2000000"
                step="100000" /></label
            ><label
              >Первоначальный взнос <strong data-calc-down-value></strong
              ><input
                type="range"
                data-calc-down
                min="0"
                max="2000000"
                value="400000"
                step="50000" /></label
            ><label
              >Срок <strong data-calc-term-value></strong
              ><input
                type="range"
                data-calc-term
                min="12"
                max="84"
                value="48"
                step="6"
            /></label>
          </div>
          <div class="calculator__result">
            <span>Ориентировочный платёж</span><strong data-calc-result></strong
            ><a href="#contact">Получить точный расчёт</a
            ><small
              >Все расчёты являются предварительными и не являются публичной
              офертой.</small
            >
          </div>
        </div>
      </section>

      <section class="news-section">
        <div class="frame">
          <div class="section-head news-head">
            <div>
              <span class="eyebrow">Новости и выдачи</span>
              <h2>Показываем работу компании изнутри</h2>
            </div>
            <div>
              <p>
                Свежие выдачи, новые поступления, рабочие будни и полезные
                материалы об автомобилях и оформлении.
              </p>
              <a href="<?php echo esc_url( tvoe_auto_page_url( 'news' ) . '' ); ?>">Смотреть все <span>→</span></a>
            </div>
          </div>
          <div class="news-grid">
            <?php $has_news = (bool) wp_count_posts( 'tvoe_news' )->publish; ?>
            <p class="news-grid__empty" <?php echo $has_news ? 'hidden' : ''; ?>>Публикации готовятся. Пока можно задать вопрос менеджеру в Telegram.</p>
            <?php if ( $has_news ) : ?>
              <?php tvoe_auto_render_home_news(); ?>
            <?php endif; ?>
            <?php if ( false ) : ?>
            <article>
              <img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/news.webp' ) ); ?>"
                alt="Белый автомобиль на площадке"
              />
              <div>
                <header><b>Выдачи</b><time>24 июля 2026 г.</time></header>
                <h3>Как может выглядеть история выдачи автомобиля</h3>
                <p>
                  Пример подачи материала: задача клиента, этапы подбора,
                  проверка и передача автомобиля без рекламных обещаний.
                </p>
                <a href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>">Читать материал <span>→</span></a>
              </div>
            </article>
            <article>
              <img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/news.webp' ) ); ?>"
                alt="Белый автомобиль на проверке"
              />
              <div>
                <header>
                  <b>Полезные материалы</b><time>20 июля 2026 г.</time>
                </header>
                <h3>Что можно рассказать о проверке автомобиля</h3>
                <p>
                  Макет полезного материала о документах, истории и техническом
                  состоянии автомобиля перед оформлением.
                </p>
                <a href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>">Читать материал <span>→</span></a>
              </div>
            </article>
            <article>
              <img loading="lazy" decoding="async"
                src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/news.webp' ) ); ?>"
                alt="Новое поступление автомобиля"
              />
              <div>
                <header>
                  <b>Новые поступления</b><time>16 июля 2026 г.</time>
                </header>
                <h3>Как показывать новые поступления в каталоге</h3>
                <p>
                  Пример карточки свежего поступления с фотографией, основными
                  характеристиками и переходом к автомобилю.
                </p>
                <a href="<?php echo esc_url( tvoe_auto_page_url( 'article' ) . '' ); ?>">Читать материал <span>→</span></a>
              </div>
            </article>
            <?php endif; ?>
          </div>
        </div>
      </section>

      <section class="social-section" aria-labelledby="social-section-title">
        <div class="social-section__inner">
          <span class="eyebrow">Будем на связи</span>
          <h2 id="social-section-title">Автомобили, обзоры и условия — в наших соцсетях</h2>
          <p>Подписывайтесь, чтобы первыми узнавать о новых автомобилях в наличии.</p>
          <nav class="social-channels" aria-label="Социальные сети Твоё Авто Сибирь">
            <a href="https://vk.ru/tvoeavtosibir" target="_blank" rel="noopener noreferrer">
              <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/vk.svg' ) ); ?>" alt="" />
              <span><strong>ВКонтакте</strong><small>Новости и автомобили в наличии</small></span>
            </a>
            <a href="https://t.me/tvoeavtosibir" target="_blank" rel="noopener noreferrer">
              <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/tg.svg' ) ); ?>" alt="" />
              <span><strong>Telegram</strong><small>Обзоры и актуальные предложения</small></span>
            </a>
            <a href="https://max.ru/join/EWPVYaIlt0f9tMCa6J70Ku7pZ2C29zFgSnmHaHLv4g0" target="_blank" rel="noopener noreferrer">
              <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/max.svg' ) ); ?>" alt="" />
              <span><strong>MAX</strong><small>Задайте вопрос в удобном мессенджере</small></span>
            </a>
          </nav>
        </div>
      </section>

      <section class="selection" id="selection">
        <div class="selection__image">
          <img loading="lazy" decoding="async"
            src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/selection.webp' ) ); ?>"
            alt="Белый автомобиль для подбора"
          /><span>Проверяем до 40 параметров</span>
        </div>
        <div class="selection__content">
          <span class="eyebrow">Главное преимущество</span>
          <h2>Подбираем авто вместе с вами. <u>Бесплатно</u></h2>
          <p>
            Не навязываем то, что есть на площадке. Сначала фиксируем ваши
            пожелания, затем специалист ищет и проверяет подходящие варианты.
          </p>
          <ul>
            <li>История владения и ограничения</li>
            <li>Диагностика технического состояния</li>
            <li>Проверка документов и продавца</li>
            <li>Аргументированный торг и сопровождение</li>
          </ul>
          <a class="action action--dark site-cta" href="#contact"
            >Подобрать автомобиль бесплатно <span>→</span></a
          >
        </div>
      </section>

      <section class="team-section" aria-labelledby="team-section-title">
        <div class="frame">
          <div class="section-head team-section__head">
            <div>
              <span class="eyebrow">Наша команда</span>
              <h2 id="team-section-title">Помогаем пройти путь до автомобиля спокойно и по шагам</h2>
            </div>
            <p>
              На связи от первого вопроса до передачи ключей: помогаем с подбором,
              проверкой автомобиля и оформлением.
            </p>
          </div>
          <div class="team-grid">
            <article class="team-card team-card--owner">
              <div class="team-card__portrait">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/team/zaur-guliev.webp' ) ); ?>" alt="Заур Гулиев, директор компании «Твоё Авто Сибирь»" />
              </div>
              <div class="team-card__body">
                <span class="team-card__mark" aria-hidden="true">З</span>
                <small>Директор компании</small>
                <h3>Заур Гулиев</h3>
                <p>Отвечает за развитие компании, организацию работы команды и ключевые направления бизнеса.</p>
                <p>За годы работы в автомобильной сфере получил большой практический опыт и хорошо знает весь процесс сделки — от первого обращения клиента до подбора и выдачи автомобиля.</p>
                <p>Особое внимание уделяет качеству сервиса, прозрачности условий и тому, чтобы каждый этап работы с клиентом был понятным и комфортным. В сложных и нестандартных ситуациях подключается лично.</p>
                <div class="team-card__links">
                  <a href="https://t.me/zaurguliev" target="_blank" rel="noopener noreferrer">Написать в Telegram</a>
                  <a href="https://max.ru/u/f9LHodD0cOIUivXn20beSQhbKedn7hrTKBBsMGf1t2Tjr3zL1KJ-W_a5pi0" target="_blank" rel="noopener noreferrer">Написать в MAX</a>
                </div>
              </div>
            </article>
            <article class="team-card team-card--specialist">
              <div class="team-card__portrait">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/team/maxim-selection.webp' ) ); ?>" alt="Максим, специалист по подбору автомобилей" />
              </div>
              <div class="team-card__body">
                <span class="team-card__mark" aria-hidden="true">М</span>
                <small>Специалист по подбору автомобилей 🚘</small>
                <h3>Максим</h3>
                <p>Уже более 5 лет работает в нашей компании и за это время помог нашим клиентам найти множество действительно достойных автомобилей.</p>
                <p>За годы работы Максим получил огромный практический опыт: знает, на что обращать внимание при выборе автомобиля, как выявить скрытые недостатки и не купить проблемную машину.</p>
                <p>Его задача — подобрать для клиента лучший автомобиль в рамках бюджета, проверить его и помочь сделать правильный выбор. Всегда готов помочь с подбором вашего будущего автомобиля.</p>
                <div class="team-card__links">
                  <a href="#contact">Подобрать автомобиль <span aria-hidden="true">→</span></a>
                </div>
              </div>
            </article>
          </div>
        </div>
      </section>

      <section class="reviews-section" aria-labelledby="reviews-section-title">
        <div class="frame">
          <div class="home-reviews__head">
            <div>
              <span class="eyebrow">Отзывы клиентов</span>
              <h2 id="reviews-section-title">Отзывы из привычных сервисов</h2>
            </div>
            <a href="<?php echo esc_url( tvoe_auto_page_url( 'reviews' ) ); ?>">Все отзывы <span>→</span></a>
          </div>
          <div class="home-reviews__grid">
            <article class="home-review-card">
              <div class="home-review-card__platform"><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-reviews/avito.png' ) ); ?>" alt="Avito" /><h3>Отзывы на Avito</h3></div>
              <div class="home-review-card__content"><div><strong>Стас</strong><span aria-label="5 звёзд из 5">★★★★★</span></div><blockquote>«Быстро одобрили заявку, отдельное спасибо Зауру за консультации, всегда был на связи, машинкой довольны.»</blockquote><small>Avito · 22 января 2025 · 5 из 5</small></div>
              <a href="https://www.avito.ru/brands/1d0065807efc4629ea24bed5d9eb4f52" target="_blank" rel="noopener noreferrer">Читать все отзывы <span>→</span></a>
            </article>
            <article class="home-review-card">
              <div class="home-review-card__platform"><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-reviews/gis.png' ) ); ?>" alt="2ГИС" /><h3>Отзывы в 2ГИС</h3></div>
              <div class="home-review-card__content"><div><strong>Александр М.</strong><span aria-label="5 звёзд из 5">★★★★★</span></div><blockquote>«Максим с Зауром подобрали машину быстро и качественно. Машиной доволен. Рекомендую.»</blockquote><small>2ГИС · отзыв клиента</small></div>
              <a href="https://2gis.ru/barnaul/firm/70000001117123270/tab/reviews" target="_blank" rel="noopener noreferrer">Открыть 2ГИС <span>→</span></a>
            </article>
            <article class="home-review-card">
              <div class="home-review-card__platform"><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-reviews/yandex.png' ) ); ?>" alt="Яндекс Карты" /><h3>Отзывы в Яндекс Картах</h3></div>
              <div class="home-review-card__content"><div><strong>Александр С.</strong><span aria-label="5 звёзд из 5">★★★★★</span></div><blockquote>«Спасибо большое данной компании! Отдельная благодарность Зауру и Максиму. Подобрали и приобрели хороший автомобиль.»</blockquote><small>Яндекс Карты · 10 августа 2026</small></div>
              <a href="https://yandex.ru/maps/org/96736411134/reviews" target="_blank" rel="noopener noreferrer">Читать все отзывы <span>→</span></a>
            </article>
          </div>
        </div>
      </section>

      <section class="cities-section">
        <div class="frame cities">
          <div>
            <span class="eyebrow">Работаем по Сибири</span>
            <h2>Можно начать онлайн, где бы вы не находились</h2>
          </div>
          <div class="city-buttons">
            <button class="active">Барнаул</button><button>Бийск</button
            ><button>Новосибирск</button><button>Кемерово</button
            ><button>Новокузнецк</button><button>Рубцовск</button
            ><button>Заринск</button><button>Бердск</button
            ><button>Алейск</button><button>Горно-Алтайск</button>
          </div>
        </div>
      </section>

      <section class="faq-section">
        <div class="frame faq">
          <div>
            <span class="eyebrow">Коротко о важном</span>
            <h2>Частые вопросы</h2>
            <p>
              Не нашли ответ? Напишите нам — специалист разберёт вашу ситуацию
              без обязательств.
            </p>
            <a href="https://t.me/zaurguliev" target="_blank" rel="noopener noreferrer">Задать вопрос в Telegram</a>
          </div>
          <div class="accordion">
            <article class="accordion-item">
              <button class="accordion-trigger" aria-expanded="true">
                Это банковский автокредит?
              </button>
              <div class="accordion-panel is-open">
                Нет. Автомобиль оформляется напрямую через компанию. Конкретная
                схема и условия зависят от выбранного продукта и определяются
                индивидуально.
              </div>
            </article>
            <article class="accordion-item">
              <button class="accordion-trigger" aria-expanded="false">
                Можно обратиться с плохой кредитной историей?
              </button>
              <div class="accordion-panel">
                Да, кредитная история сама по себе не является автоматической
                причиной для отказа.
              </div>
            </article>
            <article class="accordion-item">
              <button class="accordion-trigger" aria-expanded="false">
                Подбор автомобиля действительно бесплатный?
              </button>
              <div class="accordion-panel">
                Да. Вы платите только за выбранный автомобиль.
              </div>
            </article>
            <article class="accordion-item">
              <button class="accordion-trigger" aria-expanded="false">
                Можно использовать свой автомобиль как первый взнос?
              </button>
              <div class="accordion-panel">
                Да, его стоимость можно учесть полностью или частично.
              </div>
            </article>
          </div>
        </div>
      </section>

      <section class="contact-section" id="contact">
        <div class="frame contact">
          <div>
            <span class="eyebrow">Первый шаг — 2 минуты</span>
            <h2>Расскажите, какой автомобиль вам нужен</h2>
            <p>
              Оставьте только основные данные. Специалист свяжется, уточнит
              детали и предложит следующий шаг.
            </p>
            <a href="tel:+79132431855">+7 (913) 243-18-55</a
            ><small>Ежедневно · 9:00–20:00</small>
          </div>
          <div
            class="contact__map"
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
          <form
            class="contact-form"
            action=""
            method="post"
            data-personal-data-form
          >
            <label
              >Ваше имя<input
                type="text"
                name="name"
                placeholder="Например, Алексей"
                required /></label
            ><label
              >Телефон<input
                type="tel"
                name="phone"
                placeholder="+7 (___) ___-__-__"
                inputmode="tel"
                autocomplete="tel"
                maxlength="18"
                pattern="\+7 \([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}"
                title="Введите номер полностью: +7 (999) 999-99-99"
                required /></label
            ><label
              >Город<select name="city" required>
                <option value="">Выберите город</option>
                <option>Барнаул</option>
                <option>Бийск</option>
                <option>Новосибирск</option>
                <option>Кемерово</option>
                <option>Новокузнецк</option>
              </select></label
            ><label
              >Что вас интересует?<select name="interest" required>
                <option value="">Выберите вариант</option>
                <option>Рассрочка</option>
                <option>Аренда с выкупом</option>
                <option>Автоподбор</option>
                <option>Trade-in</option>
              </select></label
            >
            <fieldset>
              <legend>Как удобнее связаться?</legend>
              <label
                ><input
                  type="radio"
                  name="contact-method"
                  value="phone"
                  checked
                />Телефон</label
              ><label
                ><input
                  type="radio"
                  name="contact-method"
                  value="telegram"
                />Telegram</label
              ><label
                ><input
                  type="radio"
                  name="contact-method"
                  value="max"
                />MAX</label
              >
            </fieldset>
            <label class="contact-form__consent form-privacy-consent"
              ><input
                type="checkbox"
                name="personal-data-consent"
                value="2026-09-08"
                required
              /><span
                >Даю <a href="<?php echo esc_url( tvoe_auto_page_url( 'personal-data-consent' ) . '#consultation' ); ?>" target="_blank" rel="noopener noreferrer">согласие на обработку персональных данных</a> и ознакомлен с <a href="<?php echo esc_url( tvoe_auto_page_url( 'privacy' ) . '' ); ?>" target="_blank" rel="noopener noreferrer">Политикой обработки персональных данных</a>.</span
              ></label
            ><button class="site-cta" type="submit" disabled aria-disabled="true"
              >Получить консультацию <span>→</span></button
            >
            <p
              class="contact-form__status"
              role="status"
              aria-live="polite"
            ></p>
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
              ><a href="https://wa.me/79132431855" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/wa.svg' ) ); ?>" alt="" /></a
              >
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
