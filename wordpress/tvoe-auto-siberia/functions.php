<?php
/**
 * Theme bootstrap and page-specific asset loading.
 *
 * @package Tvoe_Auto_Siberia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'TVOE_AUTO_THEME_VERSION', '1.5.0' );

require_once get_template_directory() . '/inc/seo.php';
require_once get_template_directory() . '/inc/cars.php';
require_once get_template_directory() . '/inc/news.php';
require_once get_template_directory() . '/inc/production.php';
require_once get_template_directory() . '/inc/leads.php';
require_once get_template_directory() . '/inc/content.php';
require_once get_template_directory() . '/inc/calculator.php';

function tvoe_auto_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'tvoe_auto_setup' );

function tvoe_auto_asset_url( $path ) {
    return trailingslashit( get_template_directory_uri() ) . ltrim( (string) $path, '/' );
}

function tvoe_auto_page_url( $key ) {
    if ( 'home' === $key ) {
        return home_url( '/' );
    }

    $slugs = array(
        'catalog'               => 'catalog',
        'installment'           => 'installment',
        'rent-to-own'           => 'rent-to-own',
        'trade-in'              => 'trade-in',
        'selection'             => 'selection',
        'application'           => 'application',
        'car'                   => 'car',
        'news'                  => 'news',
        'article'               => 'article',
        'reviews'               => 'reviews',
        'faq'                   => 'faq',
        'contact'               => 'contact',
        'privacy'               => 'privacy',
        'personal-data-consent' => 'personal-data-consent',
    );
    // Templates call this dozens of times per request; resolve each slug once.
    static $cache = array();
    if ( isset( $cache[ $key ] ) ) {
        return $cache[ $key ];
    }

    $slug  = isset( $slugs[ $key ] ) ? $slugs[ $key ] : sanitize_title( $key );
    $page  = get_page_by_path( $slug );

    $cache[ $key ] = $page instanceof WP_Post ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
    return $cache[ $key ];
}

function tvoe_auto_current_page_key() {
    if ( is_404() ) {
        return '404';
    }
    if ( is_front_page() ) {
        return 'home';
    }
    if ( is_singular( 'auto_car' ) ) {
        return 'car';
    }
    if ( is_singular( 'tvoe_news' ) ) {
        return 'article';
    }

    $template = basename( (string) get_page_template_slug(), '.php' );
    $aliases  = array(
        'page-automobili' => 'catalog',
    );
    if ( isset( $aliases[ $template ] ) ) {
        return $aliases[ $template ];
    }
    if ( 0 === strpos( $template, 'page-' ) ) {
        return substr( $template, 5 );
    }

    $slug = get_post_field( 'post_name', get_queried_object_id() );
    return $slug ? sanitize_key( $slug ) : 'home';
}

function tvoe_auto_asset_version( $path ) {
    $file = get_template_directory() . '/' . ltrim( (string) $path, '/' );
    return is_file( $file ) ? (string) filemtime( $file ) : TVOE_AUTO_THEME_VERSION;
}

/**
 * Start downloading the above-the-fold visual while the homepage stylesheet is parsed.
 * The media query prevents preloading an unused desktop image on a phone and vice versa.
 */
function tvoe_auto_preload_home_hero() {
    if ( ! is_front_page() ) {
        return;
    }

    printf(
        '<link rel="preload" as="image" href="%1$s" fetchpriority="high" media="(min-width: 761px)"><link rel="preload" as="image" href="%2$s" fetchpriority="high" media="(max-width: 760px)">',
        esc_url( tvoe_auto_asset_url( 'img/hero-car.webp' ) ),
        esc_url( tvoe_auto_asset_url( 'img/figma-home/hero-mobile.webp' ) )
    );
}
add_action( 'wp_head', 'tvoe_auto_preload_home_hero', 1 );

function tvoe_auto_enqueue_assets() {
    $manifest = require get_template_directory() . '/inc/assets.php';
    $key      = tvoe_auto_current_page_key();
    $assets   = isset( $manifest[ $key ] ) ? $manifest[ $key ] : $manifest['home'];
    $previous = array();

    foreach ( $assets['styles'] as $index => $path ) {
        $handle = 'tvoe-auto-style-' . $index;
        wp_enqueue_style(
            $handle,
            tvoe_auto_asset_url( $path ),
            $previous,
            tvoe_auto_asset_version( $path )
        );
        $previous = array( $handle );
    }

    $previous    = array();
    $first_script = '';
    foreach ( $assets['scripts'] as $index => $path ) {
        $handle = 'tvoe-auto-script-' . $index;
        wp_enqueue_script(
            $handle,
            tvoe_auto_asset_url( $path ),
            $previous,
            tvoe_auto_asset_version( $path ),
            true
        );
        $previous = array( $handle );
        if ( ! $first_script ) {
            $first_script = $handle;
        }
    }

    if ( $first_script ) {
        $urls = array();
        foreach ( array( 'catalog', 'installment', 'rent-to-own', 'trade-in', 'selection', 'application', 'car', 'news', 'article', 'reviews', 'faq', 'contact', 'privacy', 'personal-data-consent' ) as $slug ) {
            $urls[ $slug ] = tvoe_auto_page_url( $slug );
        }

        $config = array(
            'assetBase'  => untrailingslashit( get_template_directory_uri() ),
            'pageKey'    => $key,
            'urls'       => $urls,
            'metrikaId'  => preg_replace( '/\D+/', '', (string) get_theme_mod( 'tvoe_auto_metrika_id', '' ) ),
            'leadEndpoint' => esc_url_raw( rest_url( 'tvoe-auto/v1/leads' ) ),
            'calculatorFormula' => tvoe_auto_calculator_formula(),
        );
        wp_add_inline_script(
            $first_script,
            'window.tvoeAuto = ' . wp_json_encode( $config, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . ';',
            'before'
        );
    }

    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'classic-theme-styles' );
    // Templates are hand-written HTML; block styles are only needed for editor-authored news text.
    if ( ! is_singular( 'tvoe_news' ) ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
    }
}
add_action( 'wp_enqueue_scripts', 'tvoe_auto_enqueue_assets', 100 );

/**
 * Montserrat Cyrillic renders almost all visible text; fetch it in parallel with CSS
 * so text does not repaint after the stylesheet chain resolves.
 */
function tvoe_auto_preload_fonts() {
    printf(
        '<link rel="preload" as="font" type="font/woff2" href="%s" crossorigin>',
        esc_url( tvoe_auto_asset_url( 'fonts/montserrat-cyrillic-400-800.woff2' ) )
    );
}
add_action( 'wp_head', 'tvoe_auto_preload_fonts', 1 );

/** Prefetch internal pages on hover/touch so navigation feels instant (WordPress 6.8+). */
function tvoe_auto_speculation_rules( $config ) {
    if ( ! is_array( $config ) ) {
        return $config;
    }
    $config['mode']      = 'prefetch';
    $config['eagerness'] = 'moderate';
    return $config;
}
add_filter( 'wp_speculation_rules_configuration', 'tvoe_auto_speculation_rules' );

function tvoe_auto_customize_register( $customizer ) {
    $customizer->add_section(
        'tvoe_auto_integrations',
        array(
            'title'    => 'Твоё Авто — интеграции',
            'priority' => 160,
        )
    );
    $customizer->add_setting(
        'tvoe_auto_metrika_id',
        array(
            'default'           => '',
            'sanitize_callback' => static function ( $value ) {
                $digits = preg_replace( '/\D+/', '', (string) $value );
                return preg_match( '/^\d{5,12}$/', $digits ) ? $digits : '';
            },
        )
    );
    $customizer->add_control(
        'tvoe_auto_metrika_id',
        array(
            'label'   => 'ID Яндекс Метрики',
            'section' => 'tvoe_auto_integrations',
            'type'    => 'text',
        )
    );
}
add_action( 'customize_register', 'tvoe_auto_customize_register' );
