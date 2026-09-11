<?php
/**
 * Native SEO layer for the calibrated page templates.
 *
 * @package Tvoe_Auto_Siberia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function tvoe_auto_seo_pages() {
    $pages = array(
        'home' => array(
            'title'       => 'Авто в рассрочку без банка в Сибири — Твоё Авто',
            'description' => 'Подбор автомобилей с пробегом, рассрочка без банковского автокредита, аренда с выкупом и trade-in в Барнауле и городах Сибири.',
            'image'       => 'img/og/default.jpg',
            'crumb'       => 'Главная',
        ),
        'catalog' => array(
            'title'       => 'Каталог автомобилей с пробегом в Сибири — Твоё Авто',
            'description' => 'Автомобили с пробегом для оформления в рассрочку или аренду с выкупом. Подбор вариантов в Барнауле и других городах Сибири.',
            'image'       => 'img/og/catalog.jpg',
            'crumb'       => 'Автомобили',
        ),
        'installment' => array(
            'title'       => 'Автомобиль в рассрочку без банка в Сибири — Твоё Авто',
            'description' => 'Подберём автомобиль и предложим индивидуальный сценарий рассрочки напрямую через компанию, без банковского автокредита.',
            'image'       => 'img/og/installment.jpg',
            'crumb'       => 'Рассрочка',
            'service'     => 'Автомобиль в рассрочку без банка',
        ),
        'rent-to-own' => array(
            'title'       => 'Аренда автомобиля с последующим выкупом — Твоё Авто',
            'description' => 'Аренда автомобиля с правом последующего выкупа. Условия пользования, платежей и перехода автомобиля фиксируются в договоре.',
            'image'       => 'img/og/rent-to-own.jpg',
            'crumb'       => 'Аренда с выкупом',
            'service'     => 'Аренда автомобиля с последующим выкупом',
        ),
        'trade-in' => array(
            'title'       => 'Trade-in автомобиля в Барнауле и Сибири — Твоё Авто',
            'description' => 'Предварительно оценим ваш автомобиль и объясним, как полностью или частично зачесть его стоимость при оформлении следующего.',
            'image'       => 'img/og/trade-in.jpg',
            'crumb'       => 'Trade-in',
            'service'     => 'Оценка автомобиля и Trade-in',
        ),
        'selection' => array(
            'title'       => 'Бесплатный подбор автомобиля с пробегом — Твоё Авто',
            'description' => 'Поможем бесплатно подобрать автомобиль с пробегом под вашу задачу, проверить документы, историю и техническое состояние.',
            'image'       => 'img/og/default.jpg',
            'crumb'       => 'Автоподбор',
            'service'     => 'Подбор и проверка автомобиля с пробегом',
        ),
        'application' => array(
            'title'       => 'Заявка на подбор автомобиля — Твоё Авто Сибирь',
            'description' => 'Форма заявки на подбор автомобиля с пробегом и консультацию специалиста компании «Твоё Авто Сибирь».',
            'image'       => 'img/og/default.jpg',
            'crumb'       => 'Заявка',
            'noindex'     => true,
        ),
        'car' => array(
            'title'       => 'Карточка автомобиля — Твоё Авто Сибирь',
            'description' => 'Характеристики, фотографии и условия оформления автомобиля с пробегом в компании «Твоё Авто Сибирь».',
            'image'       => 'img/og/default.jpg',
            'crumb'       => 'Автомобиль',
            'noindex'     => true,
        ),
        'news' => array(
            'title'       => 'Новости, выдачи и материалы об автомобилях — Твоё Авто',
            'description' => 'Новости компании, истории выдачи автомобилей, новые поступления и полезные материалы о подборе и проверке автомобилей.',
            'image'       => 'img/og/news.jpg',
            'crumb'       => 'Новости',
        ),
        'article' => array(
            'title'       => 'Полезные материалы об автомобилях — Твоё Авто',
            'description' => 'Материалы о подборе, проверке и оформлении автомобилей с пробегом в компании «Твоё Авто Сибирь».',
            'image'       => 'img/og/article.jpg',
            'crumb'       => 'Материал',
            'noindex'     => true,
        ),
        'reviews' => array(
            'title'       => 'Отзывы клиентов о компании «Твоё Авто Сибирь»',
            'description' => 'Отзывы и истории клиентов компании «Твоё Авто Сибирь», а также ссылки на карточки компании во внешних сервисах.',
            'image'       => 'img/og/reviews.jpg',
            'crumb'       => 'Отзывы',
        ),
        'faq' => array(
            'title'       => 'Вопросы о рассрочке, выкупе и подборе авто — Твоё Авто',
            'description' => 'Ответы на частые вопросы об автомобильной рассрочке без банка, аренде с выкупом, trade-in и бесплатном автоподборе.',
            'image'       => 'img/og/default.jpg',
            'crumb'       => 'Вопросы и ответы',
        ),
        'contact' => array(
            'title'       => 'Контакты компании «Твоё Авто Сибирь» в Барнауле',
            'description' => 'Телефон, режим работы, форма консультации и карта компании «Твоё Авто Сибирь». Работаем в Барнауле и городах Сибири.',
            'image'       => 'img/og/default.jpg',
            'crumb'       => 'Контакты',
        ),
        'privacy' => array(
            'title'       => 'Политика обработки персональных данных — Твоё Авто',
            'description' => 'Политика обработки и защиты персональных данных пользователей сайта компании «Твоё Авто Сибирь».',
            'image'       => 'img/og/default.jpg',
            'crumb'       => 'Политика обработки персональных данных',
            'noindex'     => true,
        ),
        'personal-data-consent' => array(
            'title'       => 'Согласие на обработку персональных данных — Твоё Авто',
            'description' => 'Условия согласия пользователя на обработку персональных данных при отправке форм на сайте «Твоё Авто Сибирь».',
            'image'       => 'img/og/default.jpg',
            'crumb'       => 'Согласие на обработку персональных данных',
            'noindex'     => true,
        ),
        '404' => array(
            'title'       => 'Страница не найдена — Твоё Авто Сибирь',
            'description' => 'Запрошенная страница не найдена. Перейдите на главную страницу или воспользуйтесь навигацией сайта.',
            'image'       => 'img/og/default.jpg',
            'crumb'       => 'Страница не найдена',
            'noindex'     => true,
            'nofollow'    => true,
        ),
    );

    return apply_filters( 'tvoe_auto_seo_pages', $pages );
}

function tvoe_auto_seo_plugin_active() {
    return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'AIOSEO_VERSION' );
}

function tvoe_auto_seo_current() {
    $pages = tvoe_auto_seo_pages();
    $key   = tvoe_auto_current_page_key();
    $data  = isset( $pages[ $key ] ) ? $pages[ $key ] : $pages['home'];

    // Taxonomy/date/author archives, search and the blog index have no dedicated templates:
    // keep them out of the index and never point their canonical at an unrelated page.
    if ( is_search() || is_archive() || ( is_home() && ! is_front_page() ) ) {
        $data              = $pages['home'];
        $data['title']     = '';
        $data['key']       = 'archive';
        $data['canonical'] = '';
        $data['noindex']   = true;
        $data['image_url'] = tvoe_auto_asset_url( $data['image'] );
        return $data;
    }

    if ( is_singular( 'auto_car' ) ) {
        $post_id             = get_queried_object_id();
        $title               = get_the_title( $post_id );
        $summary             = function_exists( 'tvoe_auto_car_summary' ) ? tvoe_auto_car_summary( $post_id ) : '';
        $data['title']       = $title . ' — Твоё Авто Сибирь';
        $data['description'] = trim( $title . '. ' . $summary . '. Фотографии, характеристики и условия оформления.' );
        $data['crumb']       = $title;
        $data['parent']      = 'catalog';
        $data['key']         = 'car';
        $data['canonical']   = get_permalink( $post_id );
        $data['image_url']   = function_exists( 'tvoe_auto_car_image' ) ? tvoe_auto_car_image( $post_id, 'full' ) : tvoe_auto_asset_url( $data['image'] );
        if ( function_exists( 'tvoe_auto_car_meta' ) ) {
            $data['car'] = array(
                'name'         => $title,
                'brand'        => tvoe_auto_car_term_value( $post_id, 'auto_brand' ),
                'body'         => tvoe_auto_car_term_value( $post_id, 'auto_body' ),
                'transmission' => tvoe_auto_car_term_value( $post_id, 'auto_transmission' ),
                'year'         => tvoe_auto_car_meta( $post_id, 'year' ),
                'drive'        => tvoe_auto_car_meta( $post_id, 'drive' ),
                'mileage'      => (int) preg_replace( '/\D+/', '', (string) tvoe_auto_car_meta( $post_id, 'mileage' ) ),
            );
        }
        unset( $data['noindex'] );
        return $data;
    }

    if ( is_singular( 'tvoe_news' ) ) {
        $post_id             = get_queried_object_id();
        $title               = get_the_title( $post_id );
        $data['title']       = $title . ' — Твоё Авто Сибирь';
        $data['description'] = function_exists( 'tvoe_auto_news_excerpt' ) ? tvoe_auto_news_excerpt( $post_id, 30 ) : $title;
        $data['crumb']       = $title;
        $data['headline']    = $title;
        $data['parent']      = 'news';
        $data['key']         = 'article';
        $data['canonical']   = get_permalink( $post_id );
        $data['image_url']   = function_exists( 'tvoe_auto_news_image' ) ? tvoe_auto_news_image( $post_id ) : tvoe_auto_asset_url( $data['image'] );
        $data['published']   = get_the_date( 'c', $post_id );
        $data['modified']    = get_the_modified_date( 'c', $post_id );
        unset( $data['noindex'] );
        return $data;
    }

    // Pages created by the owner later (page.php) get their own title instead of the homepage's.
    if ( ! isset( $pages[ $key ] ) && is_singular() ) {
        $post_id             = get_queried_object_id();
        $title               = get_the_title( $post_id );
        $excerpt             = wp_trim_words( wp_strip_all_tags( get_the_excerpt( $post_id ) ), 28, '…' );
        $data['title']       = $title . ' — Твоё Авто Сибирь';
        $data['description'] = $excerpt ? $excerpt : $pages['home']['description'];
        $data['crumb']       = $title;
        $data['key']         = 'page';
        $data['canonical']   = get_permalink( $post_id );
        $thumbnail           = get_the_post_thumbnail_url( $post_id, 'full' );
        $data['image_url']   = $thumbnail ? $thumbnail : tvoe_auto_asset_url( $data['image'] );
        return $data;
    }

    $data['key']       = $key;
    $data['canonical'] = '404' === $key ? '' : tvoe_auto_page_url( $key );
    $data['image_url'] = tvoe_auto_asset_url( $data['image'] );
    $image_file        = get_template_directory() . '/' . ltrim( $data['image'], '/' );
    $image_size        = is_file( $image_file ) ? getimagesize( $image_file ) : false;
    if ( $image_size ) {
        $data['image_width']  = (int) $image_size[0];
        $data['image_height'] = (int) $image_size[1];
    }

    return $data;
}

function tvoe_auto_seo_document_title( $title ) {
    if ( is_admin() || tvoe_auto_seo_plugin_active() ) {
        return $title;
    }
    $seo = tvoe_auto_seo_current();
    return '' !== $seo['title'] ? $seo['title'] : $title;
}
add_filter( 'pre_get_document_title', 'tvoe_auto_seo_document_title', 20 );

function tvoe_auto_seo_robots( $robots ) {
    if ( tvoe_auto_seo_plugin_active() ) {
        return $robots;
    }
    $seo = tvoe_auto_seo_current();
    if ( ! empty( $seo['noindex'] ) ) {
        unset( $robots['index'] );
        $robots['noindex'] = true;
    } else {
        unset( $robots['noindex'] );
        $robots['index'] = true;
    }
    if ( ! empty( $seo['nofollow'] ) ) {
        unset( $robots['follow'] );
        $robots['nofollow'] = true;
    } else {
        unset( $robots['nofollow'] );
        $robots['follow'] = true;
    }
    $robots['max-image-preview'] = 'large';
    $robots['max-snippet']       = -1;
    $robots['max-video-preview'] = -1;
    return $robots;
}
add_filter( 'wp_robots', 'tvoe_auto_seo_robots', 20 );

function tvoe_auto_seo_meta() {
    if ( is_admin() || is_feed() ) {
        return;
    }

    tvoe_auto_seo_verification_meta();
    tvoe_auto_seo_icons();
    if ( tvoe_auto_seo_plugin_active() ) {
        return;
    }

    $seo       = tvoe_auto_seo_current();
    $title     = '' !== $seo['title'] ? $seo['title'] : wp_get_document_title();
    $site_name = 'Твоё Авто Сибирь';
    $og_type   = 'article' === $seo['key'] ? 'article' : 'website';
    ?>
    <meta name="description" content="<?php echo esc_attr( $seo['description'] ); ?>">
    <?php if ( $seo['canonical'] ) : ?>
        <link rel="canonical" href="<?php echo esc_url( $seo['canonical'] ); ?>">
        <link rel="alternate" hreflang="ru-RU" href="<?php echo esc_url( $seo['canonical'] ); ?>">
        <link rel="alternate" hreflang="x-default" href="<?php echo esc_url( $seo['canonical'] ); ?>">
    <?php endif; ?>
    <meta property="og:locale" content="ru_RU">
    <meta property="og:type" content="<?php echo esc_attr( $og_type ); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $seo['description'] ); ?>">
    <?php if ( $seo['canonical'] ) : ?>
        <meta property="og:url" content="<?php echo esc_url( $seo['canonical'] ); ?>">
    <?php endif; ?>
    <meta property="og:image" content="<?php echo esc_url( $seo['image_url'] ); ?>">
    <meta property="og:image:secure_url" content="<?php echo esc_url( $seo['image_url'] ); ?>">
    <?php if ( isset( $seo['image_width'], $seo['image_height'] ) ) : ?>
        <meta property="og:image:width" content="<?php echo esc_attr( (string) $seo['image_width'] ); ?>">
        <meta property="og:image:height" content="<?php echo esc_attr( (string) $seo['image_height'] ); ?>">
    <?php endif; ?>
    <meta property="og:image:alt" content="<?php echo esc_attr( $title ); ?>">
    <?php if ( ! empty( $seo['published'] ) ) : ?>
        <meta property="article:published_time" content="<?php echo esc_attr( $seo['published'] ); ?>">
        <meta property="article:modified_time" content="<?php echo esc_attr( $seo['modified'] ); ?>">
    <?php endif; ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $seo['description'] ); ?>">
    <meta name="twitter:image" content="<?php echo esc_url( $seo['image_url'] ); ?>">
    <meta name="twitter:image:alt" content="<?php echo esc_attr( $title ); ?>">
    <meta name="theme-color" content="#0e1a2b">
    <?php
}
add_action( 'wp_head', 'tvoe_auto_seo_meta', 2 );

/** Search-console ownership codes entered in «Внешний вид → Настроить → Твоё Авто — интеграции». */
function tvoe_auto_seo_verification_meta() {
    $codes = array(
        'yandex-verification'      => get_theme_mod( 'tvoe_auto_yandex_verification', '' ),
        'google-site-verification' => get_theme_mod( 'tvoe_auto_google_verification', '' ),
    );
    foreach ( $codes as $name => $code ) {
        if ( '' !== (string) $code ) {
            printf( '<meta name="%1$s" content="%2$s">' . "\n", esc_attr( $name ), esc_attr( $code ) );
        }
    }
}

/** Theme favicons unless the owner has set a Site Icon in the Customizer. */
function tvoe_auto_seo_icons() {
    if ( has_site_icon() ) {
        return;
    }
    printf(
        '<link rel="icon" href="%1$s" sizes="32x32"><link rel="icon" type="image/png" href="%2$s" sizes="192x192"><link rel="apple-touch-icon" href="%3$s">' . "\n",
        esc_url( tvoe_auto_asset_url( 'img/favicon.ico' ) ),
        esc_url( tvoe_auto_asset_url( 'img/favicon-192.png' ) ),
        esc_url( tvoe_auto_asset_url( 'img/apple-touch-icon.png' ) )
    );
}

/** WordPress answers /favicon.ico with its own logo when no Site Icon is set; serve ours instead. */
function tvoe_auto_seo_favicon_ico() {
    if ( has_site_icon() ) {
        return;
    }
    wp_redirect( tvoe_auto_asset_url( 'img/favicon.ico' ), 301 );
    exit;
}
add_action( 'do_faviconico', 'tvoe_auto_seo_favicon_ico' );

function tvoe_auto_seo_sanitize_verification( $value ) {
    $value = (string) $value;
    // Accept either the bare code or the whole <meta ... content="..."> tag pasted from the console.
    if ( preg_match( '/content=["\']([^"\']+)/i', $value, $match ) ) {
        $value = $match[1];
    }
    return preg_replace( '/[^A-Za-z0-9_\-]/', '', $value );
}

function tvoe_auto_seo_customize_register( $customizer ) {
    $fields = array(
        'tvoe_auto_yandex_verification' => 'Код подтверждения Яндекс Вебмастера',
        'tvoe_auto_google_verification' => 'Код подтверждения Google Search Console',
    );
    foreach ( $fields as $id => $label ) {
        $customizer->add_setting(
            $id,
            array(
                'default'           => '',
                'sanitize_callback' => 'tvoe_auto_seo_sanitize_verification',
            )
        );
        $customizer->add_control(
            $id,
            array(
                'label'       => $label,
                'description' => 'Можно вставить код целиком или весь тег <meta>.',
                'section'     => 'tvoe_auto_integrations',
                'type'        => 'text',
            )
        );
    }
}
add_action( 'customize_register', 'tvoe_auto_seo_customize_register', 20 );

function tvoe_auto_seo_organization( $home ) {
    $hours = array(
        '@type'     => 'OpeningHoursSpecification',
        'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' ),
        'opens'     => '09:00',
        'closes'    => '20:00',
    );

    return array(
        '@type'         => 'AutoDealer',
        '@id'           => $home . '#organization',
        'name'          => 'Твоё Авто Сибирь',
        'alternateName' => 'Твоё Авто',
        'url'           => $home,
        'logo'          => array(
            '@type' => 'ImageObject',
            'url'   => tvoe_auto_asset_url( 'img/logo-figma.webp' ),
        ),
        'image'         => tvoe_auto_asset_url( 'img/og/default.jpg' ),
        'telephone'     => '+7-913-243-18-55',
        'address'       => array(
            '@type'           => 'PostalAddress',
            'addressLocality' => 'Барнаул',
            'addressRegion'   => 'Алтайский край',
            'addressCountry'  => 'RU',
        ),
        'geo'           => array(
            '@type'     => 'GeoCoordinates',
            'latitude'  => 53.338054,
            'longitude' => 83.680746,
        ),
        'hasMap'        => 'https://yandex.ru/maps/org/tvoyo_avto_sibir/96736411134/',
        'openingHoursSpecification' => $hours,
        'areaServed'    => array(
            array( '@type' => 'City', 'name' => 'Барнаул' ),
            array( '@type' => 'City', 'name' => 'Бийск' ),
            array( '@type' => 'City', 'name' => 'Новосибирск' ),
            array( '@type' => 'City', 'name' => 'Кемерово' ),
            array( '@type' => 'AdministrativeArea', 'name' => 'Сибирь' ),
        ),
        'contactPoint'  => array(
            '@type'             => 'ContactPoint',
            'telephone'         => '+7-913-243-18-55',
            'contactType'       => 'customer service',
            'availableLanguage' => 'Russian',
            'hoursAvailable'    => $hours,
        ),
        'sameAs'        => array(
            'https://vk.ru/tvoeavtosibir',
            'https://t.me/zaurguliev',
            'https://max.ru/u/f9LHodD0cOIUivXn20beSQhbKedn7hrTKBBsMGf1t2Tjr3zL1KJ-W_a5pi0',
            'https://yandex.ru/maps/org/tvoyo_avto_sibir/96736411134/',
        ),
    );
}

function tvoe_auto_seo_schema() {
    if ( is_admin() || is_feed() || tvoe_auto_seo_plugin_active() ) {
        return;
    }

    $seo   = tvoe_auto_seo_current();
    $pages = tvoe_auto_seo_pages();
    $home  = home_url( '/' );
    $graph = array(
        tvoe_auto_seo_organization( $home ),
        array(
            '@type'         => 'WebSite',
            '@id'           => $home . '#website',
            'url'           => $home,
            'name'          => 'Твоё Авто Сибирь',
            'alternateName' => 'Твоё Авто',
            'inLanguage'    => 'ru-RU',
            'publisher'     => array( '@id' => $home . '#organization' ),
        ),
    );

    if ( $seo['canonical'] ) {
        $graph[] = array(
            '@type'      => 'WebPage',
            '@id'        => $seo['canonical'] . '#webpage',
            'url'        => $seo['canonical'],
            'name'       => $seo['title'],
            'description'=> $seo['description'],
            'inLanguage' => 'ru-RU',
            'isPartOf'   => array( '@id' => $home . '#website' ),
            'about'      => array( '@id' => $home . '#organization' ),
            'primaryImageOfPage' => array(
                '@type' => 'ImageObject',
                'url'   => $seo['image_url'],
            ),
        );

        if ( 'home' !== $seo['key'] ) {
            $crumbs = array( array( 'Главная', $home ) );
            if ( ! empty( $seo['parent'] ) && isset( $pages[ $seo['parent'] ] ) ) {
                $crumbs[] = array( $pages[ $seo['parent'] ]['crumb'], tvoe_auto_page_url( $seo['parent'] ) );
            }
            $crumbs[] = array( isset( $seo['crumb'] ) ? $seo['crumb'] : $seo['title'], $seo['canonical'] );

            $items = array();
            foreach ( $crumbs as $index => $crumb ) {
                $items[] = array(
                    '@type'    => 'ListItem',
                    'position' => $index + 1,
                    'name'     => $crumb[0],
                    'item'     => $crumb[1],
                );
            }
            $graph[] = array(
                '@type'           => 'BreadcrumbList',
                '@id'             => $seo['canonical'] . '#breadcrumb',
                'itemListElement' => $items,
            );
        }
    }

    if ( ! empty( $seo['service'] ) ) {
        $graph[] = array(
            '@type'       => 'Service',
            '@id'         => $seo['canonical'] . '#service',
            'name'        => $seo['service'],
            'description' => $seo['description'],
            'url'         => $seo['canonical'],
            'provider'    => array( '@id' => $home . '#organization' ),
            'areaServed'  => array( '@type' => 'AdministrativeArea', 'name' => 'Сибирь' ),
        );
    }

    if ( ! empty( $seo['car'] ) ) {
        $car     = $seo['car'];
        $graph[] = array_filter(
            array(
                '@type'                   => 'Car',
                '@id'                     => $seo['canonical'] . '#car',
                'name'                    => $car['name'],
                'url'                     => $seo['canonical'],
                'image'                   => $seo['image_url'],
                'description'             => $seo['description'],
                'brand'                   => $car['brand'] ? array( '@type' => 'Brand', 'name' => $car['brand'] ) : null,
                'bodyType'                => $car['body'],
                'vehicleTransmission'     => $car['transmission'],
                'vehicleModelDate'        => $car['year'],
                'driveWheelConfiguration' => $car['drive'],
                'itemCondition'           => 'https://schema.org/UsedCondition',
                'mileageFromOdometer'     => $car['mileage'] ? array( '@type' => 'QuantitativeValue', 'value' => $car['mileage'], 'unitCode' => 'KMT' ) : null,
            )
        );
    }

    if ( ! empty( $seo['published'] ) ) {
        $graph[] = array(
            '@type'            => 'BlogPosting',
            '@id'              => $seo['canonical'] . '#article',
            'headline'         => $seo['headline'],
            'description'      => $seo['description'],
            'image'            => $seo['image_url'],
            'datePublished'    => $seo['published'],
            'dateModified'     => $seo['modified'],
            'inLanguage'       => 'ru-RU',
            'author'           => array( '@id' => $home . '#organization' ),
            'publisher'        => array( '@id' => $home . '#organization' ),
            'mainEntityOfPage' => array( '@id' => $seo['canonical'] . '#webpage' ),
        );
    }

    if ( 'faq' === $seo['key'] ) {
        $questions = array(
            'Это банковский автокредит?' => 'Нет. Автомобиль оформляется напрямую через компанию. Конкретная схема зависит от выбранного продукта и определяется индивидуально.',
            'Можно обратиться с плохой кредитной историей?' => 'Да. Кредитная история и действующие задолженности не являются автоматической причиной для отказа — разберём вашу ситуацию.',
            'Подбор автомобиля действительно бесплатный?' => 'Да, мы не берём отдельную оплату за помощь в подборе и первичной проверке вариантов.',
            'Можно использовать мой автомобиль как первый взнос?' => 'Да, предварительно оценим его и объясним, как учесть стоимость при оформлении следующего автомобиля.',
            'В каких городах вы работаете?' => 'В Барнауле, Бийске, Новосибирске, Кемерово и других городах Сибири. Начать консультацию можно онлайн.',
        );
        $entities = array();
        foreach ( $questions as $question => $answer ) {
            $entities[] = array(
                '@type'          => 'Question',
                'name'           => $question,
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text'  => $answer,
                ),
            );
        }
        $graph[] = array(
            '@type'      => 'FAQPage',
            '@id'        => $seo['canonical'] . '#faq',
            'url'        => $seo['canonical'],
            'inLanguage' => 'ru-RU',
            'mainEntity' => $entities,
        );
    }

    $schema = array(
        '@context' => 'https://schema.org',
        '@graph'   => $graph,
    );
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'tvoe_auto_seo_schema', 30 );

/** Author and date archives duplicate nothing useful; attachment pages are thin. */
function tvoe_auto_seo_redirect_thin_pages() {
    if ( is_author() || is_date() ) {
        wp_safe_redirect( home_url( '/' ), 301 );
        exit;
    }
    if ( is_attachment() ) {
        $parent = wp_get_post_parent_id( get_queried_object_id() );
        wp_safe_redirect( $parent ? get_permalink( $parent ) : home_url( '/' ), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'tvoe_auto_seo_redirect_thin_pages', 1 );

function tvoe_auto_seo_robots_txt( $output, $public ) {
    if ( ! $public ) {
        return $output;
    }
    $contact_path = wp_parse_url( tvoe_auto_page_url( 'contact' ), PHP_URL_PATH );
    $rules        = array(
        'Disallow: /wp-admin/',
        'Allow: /wp-admin/admin-ajax.php',
        'Disallow: /?s=',
        'Disallow: /search/',
        'Disallow: /*?replytocom=',
        // Yandex: the same page with tracking/prefill parameters is not a separate document.
        'Clean-param: utm_source&utm_medium&utm_campaign&utm_content&utm_term&yclid&ysclid&gclid&fbclid /',
        'Clean-param: car ' . ( $contact_path ? $contact_path : '/contact/' ),
    );
    foreach ( $rules as $rule ) {
        if ( false === strpos( $output, $rule ) ) {
            $output .= $rule . "\n";
        }
    }
    if ( false === strpos( $output, 'Sitemap:' ) ) {
        $output .= 'Sitemap: ' . home_url( '/wp-sitemap.xml' ) . "\n";
    }
    return $output;
}
add_filter( 'robots_txt', 'tvoe_auto_seo_robots_txt', 20, 2 );

/** Car taxonomies have no templates (filters work on the catalogue page), so keep them out of the sitemap. */
function tvoe_auto_seo_sitemap_provider( $provider, $name ) {
    return in_array( $name, array( 'users', 'taxonomies' ), true ) ? false : $provider;
}
add_filter( 'wp_sitemaps_add_provider', 'tvoe_auto_seo_sitemap_provider', 10, 2 );

function tvoe_auto_seo_sitemap_query( $args, $post_type ) {
    if ( 'page' !== $post_type ) {
        return $args;
    }
    $excluded = array();
    foreach ( tvoe_auto_seo_pages() as $key => $seo ) {
        if ( empty( $seo['noindex'] ) || in_array( $key, array( 'home', '404' ), true ) ) {
            continue;
        }
        $page = get_page_by_path( $key );
        if ( $page instanceof WP_Post ) {
            $excluded[] = (int) $page->ID;
        }
    }
    if ( $excluded ) {
        $args['post__not_in'] = array_values( array_unique( array_merge( isset( $args['post__not_in'] ) ? $args['post__not_in'] : array(), $excluded ) ) );
    }
    return $args;
}
add_filter( 'wp_sitemaps_posts_query_args', 'tvoe_auto_seo_sitemap_query', 10, 2 );

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
