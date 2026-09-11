<?php
/** Standalone smoke test for inc/seo.php without loading WordPress. */

define( 'ABSPATH', __DIR__ );

$theme_dir   = dirname( __DIR__ ) . '/tvoe-auto-siberia';
$current_key = 'home';

function add_action() {}
function add_filter() {}
function remove_action() {}
function apply_filters( $hook, $value ) { return $value; }
function is_admin() { return false; }
function is_feed() { return false; }
function is_singular() { return false; }
function is_search() { return false; }
function is_archive() { return false; }
function is_home() { return false; }
function is_front_page() { global $current_key; return 'home' === $current_key; }
function get_theme_mod( $name, $default = '' ) { return 'tvoe_auto_yandex_verification' === $name ? 'abc123' : $default; }
function has_site_icon() { return false; }
function home_url( $path = '/' ) { return 'https://tvoe-auto.example' . $path; }
function get_template_directory() { global $theme_dir; return $theme_dir; }
function get_template_directory_uri() { return 'https://tvoe-auto.example/wp-content/themes/tvoe-auto-siberia'; }
function tvoe_auto_current_page_key() { global $current_key; return $current_key; }
function tvoe_auto_asset_url( $path ) { return get_template_directory_uri() . '/' . ltrim( $path, '/' ); }
function tvoe_auto_page_url( $key ) { return 'home' === $key ? home_url( '/' ) : home_url( '/' . $key . '/' ); }
function esc_attr( $value ) { return htmlspecialchars( (string) $value, ENT_QUOTES, 'UTF-8' ); }
function esc_url( $value ) { return esc_attr( $value ); }
function wp_json_encode( $value, $flags = 0 ) { return json_encode( $value, $flags | JSON_THROW_ON_ERROR ); }

require $theme_dir . '/inc/seo.php';

$pages        = tvoe_auto_seo_pages();
$titles       = array();
$descriptions = array();
$failures     = array();

foreach ( $pages as $key => $expected ) {
    $current_key = $key;
    $seo         = tvoe_auto_seo_current();
    $title_len   = mb_strlen( $seo['title'] );
    $desc_len    = mb_strlen( $seo['description'] );
    if ( $title_len < 25 || $title_len > 70 ) {
        $failures[] = "$key: title length $title_len";
    }
    if ( $desc_len < 80 || $desc_len > 180 ) {
        $failures[] = "$key: description length $desc_len";
    }
    if ( isset( $titles[ $seo['title'] ] ) ) {
        $failures[] = "$key: duplicate title with {$titles[$seo['title']]}";
    }
    if ( isset( $descriptions[ $seo['description'] ] ) ) {
        $failures[] = "$key: duplicate description with {$descriptions[$seo['description']]}";
    }
    $titles[ $seo['title'] ]             = $key;
    $descriptions[ $seo['description'] ] = $key;

    ob_start();
    tvoe_auto_seo_meta();
    $meta = ob_get_clean();
    if ( ! is_file( $theme_dir . '/' . $expected['image'] ) ) {
        $failures[] = "$key: og image {$expected['image']} missing in theme";
    }
    foreach ( array( 'name="description"', 'property="og:title"', 'name="twitter:card"', 'name="yandex-verification" content="abc123"', 'img/favicon.ico' ) as $needle ) {
        if ( false === strpos( $meta, $needle ) ) {
            $failures[] = "$key: missing $needle";
        }
    }
    if ( '404' !== $key && false === strpos( $meta, 'rel="canonical"' ) ) {
        $failures[] = "$key: missing canonical";
    }
    if ( '404' !== $key && 1 !== substr_count( $meta, 'rel="canonical"' ) ) {
        $failures[] = "$key: canonical must be printed exactly once";
    }
    if ( '404' === $key && false !== strpos( $meta, 'rel="canonical"' ) ) {
        $failures[] = '404: canonical must be absent';
    }

    ob_start();
    tvoe_auto_seo_schema();
    $schema_html = trim( ob_get_clean() );
    $schema_json = preg_replace( '#^<script type="application/ld\+json">|</script>$#', '', $schema_html );
    $schema      = json_decode( $schema_json, true, 512, JSON_THROW_ON_ERROR );
    if ( empty( $schema['@graph'] ) ) {
        $failures[] = "$key: empty schema graph";
    }
    $by_type = array_column( $schema['@graph'], null, '@type' );
    if ( empty( $by_type['AutoDealer']['geo'] ) || empty( $by_type['AutoDealer']['address'] ) ) {
        $failures[] = "$key: AutoDealer must carry address and geo";
    }
    if ( isset( $by_type['BreadcrumbList'] ) ) {
        $last = end( $by_type['BreadcrumbList']['itemListElement'] );
        if ( $last['name'] !== $expected['crumb'] ) {
            $failures[] = "$key: breadcrumb name '{$last['name']}' should be '{$expected['crumb']}'";
        }
    }
    if ( 'faq' === $key ) {
        $types = array_column( $schema['@graph'], '@type' );
        if ( ! in_array( 'FAQPage', $types, true ) ) {
            $failures[] = 'faq: FAQPage schema missing';
        }
    }

    $robots = tvoe_auto_seo_robots( array() );
    if ( ! empty( $expected['noindex'] ) && empty( $robots['noindex'] ) ) {
        $failures[] = "$key: noindex missing";
    }
    if ( empty( $expected['noindex'] ) && empty( $robots['index'] ) ) {
        $failures[] = "$key: index missing";
    }
}

if ( $failures ) {
    fwrite( STDERR, implode( "\n", $failures ) . "\n" );
    exit( 1 );
}

echo 'SEO smoke test passed for ' . count( $pages ) . " templates.\n";
