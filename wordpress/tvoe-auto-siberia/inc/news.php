<?php
/**
 * News content model, editor fields and frontend render helpers.
 *
 * @package Tvoe_Auto_Siberia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function tvoe_auto_news_categories() {
    return array(
        'issue'   => 'Выдачи',
        'company' => 'Новости компании',
        'work'    => 'Рабочие будни',
        'arrival' => 'Новые поступления',
        'useful'  => 'Полезные материалы',
    );
}

function tvoe_auto_register_news() {
    register_post_type(
        'tvoe_news',
        array(
            'labels' => array(
                'name'               => 'Новости',
                'singular_name'      => 'Новость',
                'add_new'            => 'Добавить',
                'add_new_item'       => 'Добавить новость',
                'edit_item'          => 'Редактировать новость',
                'new_item'           => 'Новая новость',
                'view_item'          => 'Открыть на сайте',
                'search_items'       => 'Найти новость',
                'not_found'          => 'Новости не найдены',
                'not_found_in_trash' => 'В корзине новостей нет',
                'menu_name'          => 'Новости',
                'featured_image'     => 'Обложка новости',
                'set_featured_image' => 'Выбрать обложку',
                'remove_featured_image' => 'Удалить обложку',
            ),
            'public'             => true,
            'show_in_rest'       => true,
            'menu_icon'          => 'dashicons-welcome-write-blog',
            'menu_position'      => 22,
            'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
            'has_archive'        => false,
            'rewrite'            => array( 'slug' => 'news-item', 'with_front' => false ),
            'show_in_nav_menus'  => false,
        )
    );

    register_taxonomy(
        'tvoe_news_category',
        'tvoe_news',
        array(
            'labels' => array(
                'name'          => 'Рубрики',
                'singular_name' => 'Рубрика',
                'search_items'  => 'Найти рубрику',
                'all_items'     => 'Все рубрики',
                'edit_item'     => 'Изменить рубрику',
                'update_item'   => 'Обновить рубрику',
                'add_new_item'  => 'Добавить рубрику',
                'new_item_name' => 'Название рубрики',
                'menu_name'     => 'Рубрики',
            ),
            'public'            => false,
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'hierarchical'      => true,
            'rewrite'           => false,
        )
    );
}
add_action( 'init', 'tvoe_auto_register_news' );

function tvoe_auto_news_seed_categories() {
    static $seeded = false;
    if ( $seeded ) {
        return;
    }
    $seeded = true;

    foreach ( tvoe_auto_news_categories() as $slug => $name ) {
        if ( ! term_exists( $slug, 'tvoe_news_category' ) ) {
            wp_insert_term( $name, 'tvoe_news_category', array( 'slug' => $slug ) );
        }
    }
}
add_action( 'init', 'tvoe_auto_news_seed_categories', 20 );

/**
 * Create editable starter articles once for a fresh install.
 *
 * These are evergreen materials rather than fictional company news, so the
 * site starts with useful content while the owner prepares real stories and
 * new-arrival announcements in the WordPress admin.
 */
function tvoe_auto_news_seed_initial_posts() {
    if ( get_option( 'tvoe_auto_initial_news_created' ) ) {
        return;
    }

    // Theme activation can run before the regular init callbacks.
    tvoe_auto_register_news();
    tvoe_auto_news_seed_categories();

    $author_id = get_current_user_id();
    if ( ! $author_id ) {
        $authors = get_users( array( 'number' => 1, 'fields' => 'ids' ) );
        $author_id = ! empty( $authors ) ? (int) $authors[0] : 0;
    }

    $posts = array(
        array(
            'slug'     => 'kak-proverit-avtomobil-s-probegom',
            'title'    => 'Как проверить автомобиль с пробегом перед оформлением',
            'category' => 'useful',
            'date'     => '2026-09-08 10:00:00',
            'excerpt'  => 'Разбираем, какие документы, технические узлы и сведения об истории автомобиля стоит проверить до принятия решения.',
            'content'  => '<p>Проверку автомобиля лучше начинать не с тест-драйва, а с документов. Сверьте VIN в объявлении, на кузове и в регистрационных документах, посмотрите количество владельцев и отметки об ограничениях. Если сведения расходятся, от покупки разумно отказаться до получения понятного объяснения.</p><h2>Осмотр и диагностика</h2><p>На осмотре обращают внимание на зазоры кузовных деталей, состояние лакокрасочного покрытия, следы коррозии и работу светотехники. Диагностика помогает увидеть ошибки электронных систем, а проверка на подъёмнике — оценить подвеску, тормоза и возможные течи.</p><h2>Финальное решение</h2><p>Соберите результаты проверки в один список: что не требует вложений, что понадобится обслужить в ближайшее время и какие работы влияют на безопасность. Так проще сравнить несколько вариантов и обсудить условия оформления без спешки.</p>',
        ),
        array(
            'slug'     => 'kak-vybrat-avtomobil-dlya-zimy-v-sibiri',
            'title'    => 'Как выбрать автомобиль для зимы в Сибири',
            'category' => 'useful',
            'date'     => '2026-09-06 10:00:00',
            'excerpt'  => 'Полный привод — не единственный критерий: рассказываем, как оценить клиренс, запуск двигателя, шины и состояние отопителя.',
            'content'  => '<p>Зимой важны не только марка и тип привода. Начните с понятной задачи: ежедневные поездки по городу, трасса между городами или дороги с неочищенными участками. От этого зависит нужный клиренс, размер колёс и запас хода.</p><h2>На что посмотреть до покупки</h2><p>Проверьте запуск холодного двигателя, работу печки и обогревов, состояние аккумулятора и шин. У автомобиля с пробегом стоит отдельно оценить уплотнители дверей, стеклоочистители и отсутствие ошибок по системам стабилизации.</p><h2>Подготовка после покупки</h2><p>Даже исправному автомобилю полезно пройти сезонное обслуживание: проверить жидкости, тормоза и заряд аккумулятора. Комплект качественных зимних шин и базовый набор для дороги часто важнее дополнительной опции в комплектации.</p>',
        ),
        array(
            'slug'     => 'kak-rasschitat-komfortnyy-platezh',
            'title'    => 'Как рассчитать комфортный платёж за автомобиль',
            'category' => 'useful',
            'date'     => '2026-09-03 10:00:00',
            'excerpt'  => 'С чего начать расчёт: первоначальный взнос, срок, резерв на обслуживание и условия, которые нужно зафиксировать до договора.',
            'content'  => '<p>Перед выбором автомобиля определите ежемесячную сумму, которая не нарушит обычный бюджет. К ней стоит добавить расходы на топливо, страховку, сезонное обслуживание и непредвиденный ремонт.</p><h2>Первоначальный взнос и срок</h2><p>Больший первоначальный взнос обычно уменьшает регулярную нагрузку. Срок влияет не только на размер платежа, но и на общую сумму обязательств, поэтому сравнивайте несколько сценариев на одинаковых исходных данных.</p><h2>Что уточнить до оформления</h2><p>Попросите зафиксировать в расчёте первый взнос, размер и количество платежей, условия досрочного погашения и дополнительные расходы. Предварительный калькулятор даёт ориентир, а финальные условия определяются договором.</p>',
        ),
        array(
            'slug'     => 'kak-vybrat-krossover-s-probegom',
            'title'    => 'На что обратить внимание при выборе кроссовера с пробегом',
            'category' => 'useful',
            'date'     => '2026-08-30 10:00:00',
            'excerpt'  => 'Чек-лист по трансмиссии, подвеске, полному приводу и комплектации, который пригодится при сравнении нескольких машин.',
            'content'  => '<p>Кроссоверы часто выбирают за универсальность, но одинаковый тип кузова не делает автомобили равными. Сравните реальный объём багажника, высоту посадки, клиренс и доступность обслуживания в вашем городе.</p><h2>Техническая часть</h2><p>Проверьте, как работает коробка передач на холодную и после прогрева, нет ли рывков при переключениях. У полноприводных версий важно оценить состояние карданного вала, муфт и редукторов, а также историю регулярного обслуживания.</p><h2>Комплектация и безопасность</h2><p>Уточните наличие систем активной безопасности, работу камер и датчиков, состояние ремней безопасности. Эти пункты помогают выбрать не только удобный, но и понятный по дальнейшим расходам автомобиль.</p>',
        ),
        array(
            'slug'     => 'kak-rabotaet-trade-in',
            'title'    => 'Как устроен Trade-in: последовательность шагов',
            'category' => 'company',
            'date'     => '2026-08-27 10:00:00',
            'excerpt'  => 'Объясняем, какие данные нужны для предварительной оценки автомобиля и что важно обсудить при обмене.',
            'content'  => '<p>Trade-in помогает связать продажу текущего автомобиля с выбором следующего. Для предварительной оценки обычно нужны марка, модель, год выпуска, пробег, фотографии и информация о заметных особенностях состояния.</p><h2>Оценка автомобиля</h2><p>Первичный расчёт служит ориентиром. Окончательная стоимость зависит от осмотра кузова, диагностики, комплектации, документов и текущего спроса на конкретную модель.</p><h2>Выбор следующего варианта</h2><p>После оценки можно сопоставить сумму зачёта с первоначальным взносом и подобрать автомобиль под нужный ежемесячный платёж. Все условия обмена стоит закрепить в документах до передачи ключей.</p>',
        ),
        array(
            'slug'     => 'chto-podgotovit-k-pervomu-razgovoru',
            'title'    => 'Что подготовить к первому разговору о подборе автомобиля',
            'category' => 'work',
            'date'     => '2026-08-24 10:00:00',
            'excerpt'  => 'Несколько параметров, которые помогают быстрее сузить поиск и получить релевантные варианты.',
            'content'  => '<p>Чем точнее сформулирована задача, тем легче подобрать подходящие варианты. До первого разговора полезно определить бюджет, желаемый ежемесячный платёж, тип кузова и привычный маршрут.</p><h2>Обязательные и желательные параметры</h2><p>Разделите требования на две группы. Например, количество мест и автоматическая коробка могут быть обязательными, а цвет кузова или панорамная крыша — желательными. Такой список помогает не потерять важное при сравнении автомобилей.</p><h2>История текущего автомобиля</h2><p>Если рассматриваете обмен, подготовьте данные о модели, годе выпуска, пробеге и состоянии. Фотографии кузова и салона дадут более предметный ориентир ещё до осмотра.</p>',
        ),
    );

    foreach ( $posts as $post ) {
        $existing = get_page_by_path( $post['slug'], OBJECT, 'tvoe_news' );
        if ( $existing instanceof WP_Post ) {
            continue;
        }

        $post_args = array(
            'post_type'    => 'tvoe_news',
            'post_status'  => 'publish',
            'post_title'   => $post['title'],
            'post_name'    => $post['slug'],
            'post_excerpt' => $post['excerpt'],
            'post_content' => $post['content'],
            'post_date'    => $post['date'],
        );
        if ( $author_id ) {
            $post_args['post_author'] = $author_id;
        }

        $post_id = wp_insert_post( $post_args, true );
        if ( is_wp_error( $post_id ) ) {
            continue;
        }

        $term = term_exists( $post['category'], 'tvoe_news_category' );
        if ( is_array( $term ) ) {
            $term = $term['term_id'];
        }
        if ( $term ) {
            wp_set_object_terms( $post_id, (int) $term, 'tvoe_news_category' );
        }
        update_post_meta( $post_id, '_tvoe_auto_news_featured', '1' );
    }

    update_option( 'tvoe_auto_initial_news_created', '1', false );
}
add_action( 'after_switch_theme', 'tvoe_auto_news_seed_initial_posts', 30 );
add_action( 'admin_init', 'tvoe_auto_news_seed_initial_posts', 30 );

function tvoe_auto_news_display_box( $post ) {
    wp_nonce_field( 'tvoe_auto_save_news', 'tvoe_auto_news_nonce' );
    $featured = '1' === get_post_meta( $post->ID, '_tvoe_auto_news_featured', true );
    ?>
    <p>
        <label>
            <input type="checkbox" name="tvoe_auto_news_featured" value="1" <?php checked( $featured, true ); ?>>
            Показывать на главной
        </label>
    </p>
    <p class="description">Если включено, новость попадёт в блок публикаций на главной странице. Если отмеченных новостей нет, выводятся последние опубликованные.</p>
    <?php
}

function tvoe_auto_add_news_meta_boxes() {
    add_meta_box( 'tvoe-auto-news-display', 'Показ на сайте', 'tvoe_auto_news_display_box', 'tvoe_news', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'tvoe_auto_add_news_meta_boxes' );

function tvoe_auto_save_news( $post_id ) {
    if ( ! isset( $_POST['tvoe_auto_news_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tvoe_auto_news_nonce'] ) ), 'tvoe_auto_save_news' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    update_post_meta( $post_id, '_tvoe_auto_news_featured', isset( $_POST['tvoe_auto_news_featured'] ) ? '1' : '0' );
}
add_action( 'save_post_tvoe_news', 'tvoe_auto_save_news' );

function tvoe_auto_news_admin_columns( $columns ) {
    return array(
        'cb'                         => $columns['cb'],
        'tvoe_photo'                 => 'Фото',
        'title'                      => 'Новость',
        'taxonomy-tvoe_news_category' => 'Рубрика',
        'tvoe_featured'              => 'Главная',
        'date'                       => $columns['date'],
    );
}
add_filter( 'manage_tvoe_news_posts_columns', 'tvoe_auto_news_admin_columns' );

function tvoe_auto_news_admin_column( $column, $post_id ) {
    if ( 'tvoe_photo' === $column ) {
        echo get_the_post_thumbnail( $post_id, array( 72, 52 ) );
    } elseif ( 'tvoe_featured' === $column ) {
        echo '1' === get_post_meta( $post_id, '_tvoe_auto_news_featured', true ) ? 'Да' : '—';
    }
}
add_action( 'manage_tvoe_news_posts_custom_column', 'tvoe_auto_news_admin_column', 10, 2 );

function tvoe_auto_news_query( $args = array() ) {
    return new WP_Query(
        wp_parse_args(
            $args,
            array(
                'post_type'      => 'tvoe_news',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            )
        )
    );
}

function tvoe_auto_news_term( $post_id ) {
    $terms = get_the_terms( $post_id, 'tvoe_news_category' );
    return ! is_wp_error( $terms ) && $terms ? $terms[0] : null;
}

function tvoe_auto_news_image( $post_id ) {
    $url = get_the_post_thumbnail_url( $post_id, 'large' );
    if ( $url ) {
        return $url;
    }

    $term       = tvoe_auto_news_term( $post_id );
    $fallbacks  = array(
        'issue'   => 'img/figma-news/issue.webp',
        'useful'  => 'img/figma-news/inspection.webp',
        'arrival' => 'img/figma-news/arrival.webp',
    );
    $fallback   = $term && isset( $fallbacks[ $term->slug ] ) ? $fallbacks[ $term->slug ] : 'img/figma-exact/news.webp';
    return tvoe_auto_asset_url( $fallback );
}

function tvoe_auto_news_excerpt( $post_id, $words = 28 ) {
    $excerpt = trim( wp_strip_all_tags( get_the_excerpt( $post_id ) ) );
    if ( '' === $excerpt ) {
        $post    = get_post( $post_id );
        $excerpt = $post ? wp_trim_words( wp_strip_all_tags( strip_shortcodes( $post->post_content ) ), $words, '…' ) : '';
    }
    return $excerpt;
}

function tvoe_auto_news_date( $post_id ) {
    return date_i18n( 'j F Y', get_post_time( 'U', false, $post_id ) ) . ' г.';
}

function tvoe_auto_render_news_card( $post_id, $variant = 'news' ) {
    $term       = tvoe_auto_news_term( $post_id );
    $category   = $term ? $term->name : 'Новости компании';
    $category_slug = $term ? $term->slug : 'company';
    $title      = get_the_title( $post_id );
    $url        = get_permalink( $post_id );
    $is_article = 'article' === $variant;
    $prefix     = $is_article ? 'article' : 'news';
    $title_tag  = $is_article ? 'h3' : 'h2';
    ?>
    <article class="<?php echo esc_attr( $prefix . '-card' ); ?>" data-news-category="<?php echo esc_attr( $category_slug ); ?>">
        <a class="<?php echo esc_attr( $prefix . '-card__photo' ); ?>" href="<?php echo esc_url( $url ); ?>" aria-label="Открыть публикацию: <?php echo esc_attr( $title ); ?>">
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_news_image( $post_id ) ); ?>" alt="<?php echo esc_attr( $title ); ?>">
        </a>
        <div class="<?php echo esc_attr( $prefix . '-card__body' ); ?>">
            <div class="<?php echo esc_attr( $prefix . '-card__meta' ); ?>">
                <span><?php echo esc_html( $category ); ?></span>
                <time datetime="<?php echo esc_attr( get_the_date( 'c', $post_id ) ); ?>">
                    <img src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/calendar.svg' ) ); ?>" alt="">
                    <?php echo esc_html( tvoe_auto_news_date( $post_id ) ); ?>
                </time>
            </div>
            <<?php echo esc_html( $title_tag ); ?>><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $title ); ?></a></<?php echo esc_html( $title_tag ); ?>>
            <p><?php echo esc_html( tvoe_auto_news_excerpt( $post_id ) ); ?></p>
            <a class="<?php echo esc_attr( $prefix . '-card__link' ); ?>" href="<?php echo esc_url( $url ); ?>">
                Читать материал
                <img src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt="">
            </a>
        </div>
    </article>
    <?php
}

function tvoe_auto_render_home_news() {
    $query = tvoe_auto_news_query(
        array(
            'posts_per_page' => 3,
            'meta_query'     => array(
                array( 'key' => '_tvoe_auto_news_featured', 'value' => '1' ),
            ),
        )
    );
    if ( ! $query->have_posts() ) {
        $query = tvoe_auto_news_query( array( 'posts_per_page' => 3 ) );
    }

    foreach ( $query->posts as $post ) {
        $term     = tvoe_auto_news_term( $post->ID );
        $category = $term ? $term->name : 'Новости компании';
        ?>
        <article>
            <img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_news_image( $post->ID ) ); ?>" alt="<?php echo esc_attr( get_the_title( $post->ID ) ); ?>">
            <div>
                <header><b><?php echo esc_html( $category ); ?></b><time datetime="<?php echo esc_attr( get_the_date( 'c', $post->ID ) ); ?>"><?php echo esc_html( tvoe_auto_news_date( $post->ID ) ); ?></time></header>
                <h3><a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"><?php echo esc_html( get_the_title( $post->ID ) ); ?></a></h3>
                <p><?php echo esc_html( tvoe_auto_news_excerpt( $post->ID, 24 ) ); ?></p>
                <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">Читать материал <span>→</span></a>
            </div>
        </article>
        <?php
    }
    wp_reset_postdata();
}

function tvoe_auto_news_help_page() {
    add_submenu_page( 'edit.php?post_type=tvoe_news', 'Как вести новости', 'Как вести новости', 'edit_posts', 'tvoe-auto-news-help', 'tvoe_auto_render_news_help' );
}
add_action( 'admin_menu', 'tvoe_auto_news_help_page' );

function tvoe_auto_render_news_help() {
    ?>
    <div class="wrap"><h1>Как вести новости</h1><div class="card" style="max-width:860px"><ol><li><strong>Новости → Добавить.</strong> Укажите заголовок материала.</li><li>В редакторе заполните полный текст статьи.</li><li>Справа выберите рубрику и задайте обложку через «Обложка новости».</li><li>При необходимости заполните поле «Выдержка» — она будет показана в карточке.</li><li>Отметьте «Показывать на главной», если материал должен попасть в блок публикаций на главной.</li><li>Нажмите «Опубликовать». Черновики на сайте не видны.</li></ol><p>Если обложка не выбрана, сайт использует штатное изображение для выбранной рубрики.</p></div></div>
    <?php
}

function tvoe_auto_news_flush_rewrites() {
    tvoe_auto_register_news();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'tvoe_auto_news_flush_rewrites' );
