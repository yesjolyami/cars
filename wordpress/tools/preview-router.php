<?php
/**
 * Local visual-parity router for the generated theme.
 * Run only from the project workspace; this file is not part of the theme ZIP.
 */

$theme_dir = dirname( __DIR__ ) . '/tvoe-auto-siberia';
$path      = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
$asset     = realpath( dirname( __DIR__ ) . $path );

if ( $asset && is_file( $asset ) && 0 === strpos( $asset, realpath( dirname( __DIR__ ) ) ) ) {
    return false;
}

$slug = trim( (string) $path, '/' );
$map  = array(
    ''                      => 'front-page.php',
    'catalog'               => 'page-catalog.php',
    'installment'           => 'page-installment.php',
    'rent-to-own'           => 'page-rent-to-own.php',
    'trade-in'              => 'page-trade-in.php',
    'selection'             => 'page-selection.php',
    'application'           => 'page-application.php',
    'car'                   => 'page-car.php',
    'news'                  => 'page-news.php',
    'article'               => 'page-article.php',
    'reviews'               => 'page-reviews.php',
    'faq'                   => 'page-faq.php',
    'contact'               => 'page-contact.php',
    'privacy'               => 'page-privacy.php',
    'personal-data-consent' => 'page-personal-data-consent.php',
);
$template = isset( $map[ $slug ] ) ? $map[ $slug ] : '404.php';
$page_key = isset( $map[ $slug ] ) ? ( $slug ?: 'home' ) : '404';
$manifest = require $theme_dir . '/inc/assets.php';

function esc_url( $value ) {
    return htmlspecialchars( (string) $value, ENT_QUOTES, 'UTF-8' );
}
function language_attributes() {
    echo 'lang="ru"';
}
function bloginfo( $key ) {
    if ( 'charset' === $key ) {
        echo 'UTF-8';
    }
}
function body_class( $classes = array() ) {
    echo 'class="' . htmlspecialchars( implode( ' ', (array) $classes ), ENT_QUOTES, 'UTF-8' ) . '"';
}
function wp_body_open() {}
function wp_head() {
    global $manifest, $page_key;
    foreach ( $manifest[ $page_key ]['styles'] as $path ) {
        echo '<link rel="stylesheet" href="/tvoe-auto-siberia/' . esc_url( $path ) . '">' . "\n";
    }
}
function wp_footer() {
    global $manifest, $page_key;
    $urls = array();
    foreach ( array_keys( $manifest ) as $key ) {
        if ( '404' !== $key && 'home' !== $key ) {
            $urls[ $key ] = '/' . $key . '/';
        }
    }
    echo '<script>window.tvoeAuto=' . json_encode(
        array(
            'assetBase' => '/tvoe-auto-siberia',
            'pageKey'   => $page_key,
            'urls'      => $urls,
            'metrikaId' => '',
        ),
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
    ) . ';</script>' . "\n";
    foreach ( $manifest[ $page_key ]['scripts'] as $path ) {
        echo '<script src="/tvoe-auto-siberia/' . esc_url( $path ) . '"></script>' . "\n";
    }
}
function get_header( $name = null, $args = array() ) {
    global $theme_dir;
    include $theme_dir . '/header.php';
}
function get_footer() {
    global $theme_dir;
    include $theme_dir . '/footer.php';
}
function tvoe_auto_asset_url( $path ) {
    return '/tvoe-auto-siberia/' . ltrim( (string) $path, '/' );
}
function tvoe_auto_page_url( $key ) {
    return 'home' === $key ? '/' : '/' . trim( (string) $key, '/' ) . '/';
}

include $theme_dir . '/' . $template;
