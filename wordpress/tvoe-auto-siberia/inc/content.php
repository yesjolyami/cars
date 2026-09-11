<?php
/**
 * Site-wide content controls for the classic theme.
 *
 * @package Tvoe_Auto_Siberia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function tvoe_auto_content_fields() {
    $fields = array(
        'logo'             => array( 'label' => 'Логотип', 'type' => 'image', 'default' => 'img/logo-figma.webp' ),
        'hero_home_image'  => array( 'label' => 'Изображение hero на главной', 'type' => 'image', 'default' => 'img/hero-car.webp' ),
        'phone'            => array( 'label' => 'Телефон', 'type' => 'text', 'default' => '+7 (913) 243-18-55' ),
        'coverage'         => array( 'label' => 'Регион работы', 'type' => 'text', 'default' => 'Работаем по Сибири' ),
        'header_cta'       => array( 'label' => 'Кнопка в шапке', 'type' => 'text', 'default' => 'Подобрать авто' ),
        'home_hero_badge'  => array( 'label' => 'Главная: подпись hero', 'type' => 'text', 'default' => 'Без банковского автокредита' ),
        'home_hero_title'  => array( 'label' => 'Главная: заголовок hero', 'type' => 'text', 'default' => 'Авто в рассрочку без банка в Сибири' ),
        'home_hero_lead'   => array( 'label' => 'Главная: текст hero', 'type' => 'textarea', 'default' => 'Помогаем подобрать автомобиль с пробегом, проверить состояние и оформить рассрочку на понятных условиях. Кредитная история, действующие задолженности и прошлое банкротство не являются автоматической причиной для отказа.' ),
        'catalog_title'    => array( 'label' => 'Каталог: заголовок', 'type' => 'text', 'default' => 'Автомобили в наличии' ),
        'installment_title'=> array( 'label' => 'Рассрочка: заголовок', 'type' => 'text', 'default' => 'Автомобиль в рассрочку напрямую через компанию' ),
        'rent_title'       => array( 'label' => 'Аренда с выкупом: заголовок', 'type' => 'text', 'default' => 'Автомобиль с выкупом по понятному договору' ),
        'trade_title'      => array( 'label' => 'Trade-in: заголовок', 'type' => 'text', 'default' => 'Обменяйте автомобиль на подходящий вариант' ),
        'selection_title'  => array( 'label' => 'Автоподбор: заголовок', 'type' => 'text', 'default' => 'Подберём автомобиль под вашу задачу' ),
        'application_title'=> array( 'label' => 'Заявка: заголовок', 'type' => 'text', 'default' => 'Расскажите, какой автомобиль вы ищете' ),
        'news_title'       => array( 'label' => 'Новости: заголовок', 'type' => 'text', 'default' => 'Новости и полезные материалы' ),
        'reviews_title'    => array( 'label' => 'Отзывы: заголовок', 'type' => 'text', 'default' => 'Отзывы клиентов' ),
        'contact_title'    => array( 'label' => 'Контакты: заголовок', 'type' => 'text', 'default' => 'Будем рады обсудить ваш автомобиль' ),
    );

    /* Every theme image gets an optional media-library override. */
    $image_root = get_template_directory() . '/img';
    if ( is_dir( $image_root ) ) {
        $iterator = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $image_root, FilesystemIterator::SKIP_DOTS ) );
        foreach ( $iterator as $file ) {
            if ( ! $file->isFile() || ! preg_match( '/\.(?:png|jpe?g|webp|gif|svg)$/i', $file->getFilename() ) ) {
                continue;
            }
            $relative = ltrim( str_replace( $image_root, '', $file->getPathname() ), '/' );
            $path     = 'img/' . $relative;
            $key      = 'asset_' . md5( $path );
            if ( ! isset( $fields[ $key ] ) ) {
                $fields[ $key ] = array( 'label' => 'Изображение: ' . $path, 'type' => 'image', 'default' => $path );
            }
        }
    }
    return $fields;
}

function tvoe_auto_content_value( $key ) {
    $fields = tvoe_auto_content_fields();
    if ( ! isset( $fields[ $key ] ) ) {
        return '';
    }
    $field = $fields[ $key ];
    $value = get_option( 'tvoe_auto_content_' . $key, '' );
    return '' !== $value ? $value : $field['default'];
}

function tvoe_auto_content_image( $key ) {
    $fields = tvoe_auto_content_fields();
    if ( ! isset( $fields[ $key ] ) ) {
        return '';
    }
    $value = get_option( 'tvoe_auto_content_' . $key, '' );
    if ( $value && is_numeric( $value ) ) {
        $url = wp_get_attachment_image_url( (int) $value, 'full' );
        if ( $url ) {
            return $url;
        }
    }
    return tvoe_auto_asset_url( $fields[ $key ]['default'] );
}

function tvoe_auto_content_register_settings() {
    foreach ( tvoe_auto_content_fields() as $key => $field ) {
        register_setting(
            'tvoe_auto_content',
            'tvoe_auto_content_' . $key,
            array(
                'sanitize_callback' => 'image' === $field['type'] ? 'absint' : ( 'textarea' === $field['type'] ? 'sanitize_textarea_field' : 'sanitize_text_field' ),
            )
        );
    }
}
add_action( 'admin_init', 'tvoe_auto_content_register_settings' );

function tvoe_auto_content_admin_menu() {
    add_theme_page( 'Контент сайта', 'Контент сайта', 'edit_theme_options', 'tvoe-auto-content', 'tvoe_auto_content_render_page' );
}
add_action( 'admin_menu', 'tvoe_auto_content_admin_menu' );

function tvoe_auto_content_admin_assets( $hook ) {
    if ( 'appearance_page_tvoe-auto-content' !== $hook ) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script( 'tvoe-auto-content-admin', tvoe_auto_asset_url( 'js/content-admin.js' ), array( 'jquery' ), TVOE_AUTO_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'tvoe_auto_content_admin_assets' );

function tvoe_auto_content_render_page() {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        return;
    }
    $fields = tvoe_auto_content_fields();
    ?>
    <div class="wrap">
        <h1>Контент сайта</h1>
        <p>Здесь меняются тексты и изображения, которые используются в шаблонах сайта. Каталог автомобилей редактируется отдельно в разделе «Автомобили».</p>
        <form method="post" action="options.php">
            <?php settings_fields( 'tvoe_auto_content' ); ?>
            <table class="form-table" role="presentation">
                <?php foreach ( $fields as $key => $field ) : ?>
                    <tr>
                        <th scope="row"><label for="tvoe_auto_content_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field['label'] ); ?></label></th>
                        <td>
                            <?php if ( 'image' === $field['type'] ) : ?>
                                <?php $image_id = (int) get_option( 'tvoe_auto_content_' . $key, 0 ); ?>
                                <input type="hidden" id="tvoe_auto_content_<?php echo esc_attr( $key ); ?>" name="tvoe_auto_content_<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $image_id ); ?>">
                                <button type="button" class="button tvoe-auto-select-image" data-target="tvoe_auto_content_<?php echo esc_attr( $key ); ?>">Выбрать изображение</button>
                                <span class="tvoe-auto-image-name"><?php echo $image_id ? esc_html( get_the_title( $image_id ) ) : 'Используется изображение темы'; ?></span>
                            <?php elseif ( 'textarea' === $field['type'] ) : ?>
                                <textarea class="large-text" rows="4" id="tvoe_auto_content_<?php echo esc_attr( $key ); ?>" name="tvoe_auto_content_<?php echo esc_attr( $key ); ?>"><?php echo esc_textarea( get_option( 'tvoe_auto_content_' . $key, '' ) ); ?></textarea>
                            <?php else : ?>
                                <input class="regular-text" type="text" id="tvoe_auto_content_<?php echo esc_attr( $key ); ?>" name="tvoe_auto_content_<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( get_option( 'tvoe_auto_content_' . $key, '' ) ); ?>">
                            <?php endif; ?>
                            <p class="description">По умолчанию: <?php echo esc_html( $field['default'] ); ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php submit_button( 'Сохранить изменения' ); ?>
        </form>
    </div>
    <?php
}

/** Replace the legacy hard-coded values while old page templates are migrated. */
function tvoe_auto_content_buffer( $html ) {
    if ( is_admin() || ! is_string( $html ) ) {
        return $html;
    }
    $fields = tvoe_auto_content_fields();
    foreach ( $fields as $key => $field ) {
        if ( 'image' === $field['type'] ) {
            $current = get_option( 'tvoe_auto_content_' . $key, '' );
            if ( $current ) {
                $html = str_replace( tvoe_auto_asset_url( $field['default'] ), tvoe_auto_content_image( $key ), $html );
            }
            continue;
        }
        $current = get_option( 'tvoe_auto_content_' . $key, '' );
        if ( '' !== $current && $current !== $field['default'] ) {
            $html = str_replace( $field['default'], $current, $html );
        }
    }
    return $html;
}

function tvoe_auto_content_start_buffer() {
    if ( ! is_admin() && ! wp_doing_ajax() ) {
        ob_start( 'tvoe_auto_content_buffer' );
    }
}
add_action( 'template_redirect', 'tvoe_auto_content_start_buffer', 0 );
