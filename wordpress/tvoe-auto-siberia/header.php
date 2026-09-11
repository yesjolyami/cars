<?php
/**
 * Document shell. Visual site header remains inside each calibrated template.
 *
 * @package Tvoe_Auto_Siberia
 */

$body_classes = array( 'tvoe-auto-site' );
if ( ! empty( $args['body_class'] ) ) {
    $body_classes = array_merge(
        $body_classes,
        preg_split( '/\s+/', (string) $args['body_class'] )
    );
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer">
    <?php wp_head(); ?>
</head>
<body <?php body_class( array_filter( $body_classes ) ); ?>>
<?php wp_body_open(); ?>
