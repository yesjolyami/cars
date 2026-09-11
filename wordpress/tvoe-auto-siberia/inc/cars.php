<?php
/**
 * Car catalog content model, editor fields and frontend render helpers.
 *
 * @package Tvoe_Auto_Siberia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function tvoe_auto_register_cars() {
    register_post_type(
        'auto_car',
        array(
            'labels' => array(
                'name'               => 'Автомобили',
                'singular_name'      => 'Автомобиль',
                'add_new'            => 'Добавить',
                'add_new_item'       => 'Добавить автомобиль',
                'edit_item'          => 'Редактировать автомобиль',
                'new_item'           => 'Новый автомобиль',
                'view_item'          => 'Открыть на сайте',
                'search_items'       => 'Найти автомобиль',
                'not_found'          => 'Автомобили не найдены',
                'not_found_in_trash' => 'В корзине автомобилей нет',
                'menu_name'          => 'Автомобили',
                'featured_image'     => 'Обложка для каталога',
                'set_featured_image' => 'Выбрать обложку',
                'remove_featured_image' => 'Удалить обложку',
            ),
            'public'             => true,
            'show_in_rest'       => true,
            'menu_icon'          => 'dashicons-car',
            'menu_position'      => 20,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
            'has_archive'        => false,
            'rewrite'            => array( 'slug' => 'cars', 'with_front' => false ),
            'show_in_nav_menus'  => true,
        )
    );

    $taxonomies = array(
        'auto_brand'        => array( 'Марки', 'Марка' ),
        'auto_body'         => array( 'Типы кузова', 'Тип кузова' ),
        'auto_transmission' => array( 'Коробки передач', 'Коробка передач' ),
        'auto_city'         => array( 'Города', 'Город' ),
    );

    foreach ( $taxonomies as $taxonomy => $names ) {
        register_taxonomy(
            $taxonomy,
            'auto_car',
            array(
                'labels' => array(
                    'name'          => $names[0],
                    'singular_name' => $names[1],
                    'search_items'  => 'Найти',
                    'all_items'     => 'Все',
                    'edit_item'     => 'Изменить',
                    'update_item'   => 'Обновить',
                    'add_new_item'  => 'Добавить',
                    'menu_name'     => $names[0],
                ),
                'public'            => true,
                'show_admin_column' => true,
                'show_in_rest'      => true,
                'hierarchical'      => true,
                'rewrite'           => false,
            )
        );
    }
}
add_action( 'init', 'tvoe_auto_register_cars' );

function tvoe_auto_car_fields() {
    return array(
        'year'            => array( 'Год выпуска', 'number', '2022' ),
        'engine_volume'   => array( 'Объём двигателя', 'text', '2.0 л' ),
        'engine_type'     => array( 'Тип двигателя', 'text', 'бензин' ),
        'mileage'         => array( 'Пробег', 'text', '76 400 км' ),
        'drive'           => array( 'Привод', 'text', 'Полный / 4WD' ),
        'first_payment'   => array( 'Первоначальный взнос', 'text', 'от 438 000 ₽' ),
        'monthly_payment' => array( 'Платёж в месяц', 'text', 'от 42 900 ₽/мес.' ),
        'legal_note'      => array( 'Примечание под карточкой', 'textarea', 'Расчёт предварительный и не является публичной офертой.' ),
    );
}

function tvoe_auto_add_car_meta_boxes() {
    add_meta_box( 'tvoe-auto-car-data', 'Характеристики и условия', 'tvoe_auto_car_data_box', 'auto_car', 'normal', 'high' );
    add_meta_box( 'tvoe-auto-car-gallery', 'Фотографии автомобиля', 'tvoe_auto_car_gallery_box', 'auto_car', 'normal', 'high' );
    add_meta_box( 'tvoe-auto-car-display', 'Показ на сайте', 'tvoe_auto_car_display_box', 'auto_car', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'tvoe_auto_add_car_meta_boxes' );

function tvoe_auto_car_data_box( $post ) {
    wp_nonce_field( 'tvoe_auto_save_car', 'tvoe_auto_car_nonce' );
    echo '<div class="tvoe-auto-fields">';
    foreach ( tvoe_auto_car_fields() as $key => $field ) {
        $value = get_post_meta( $post->ID, '_tvoe_auto_' . $key, true );
        printf( '<label><span>%s</span>', esc_html( $field[0] ) );
        if ( 'textarea' === $field[1] ) {
            printf( '<textarea name="tvoe_auto_%1$s" rows="3" placeholder="%2$s">%3$s</textarea>', esc_attr( $key ), esc_attr( $field[2] ), esc_textarea( $value ) );
        } else {
            printf( '<input type="%1$s" name="tvoe_auto_%2$s" value="%3$s" placeholder="%4$s"%5$s>', esc_attr( $field[1] ), esc_attr( $key ), esc_attr( $value ), esc_attr( $field[2] ), 'number' === $field[1] ? ' min="1900" max="2100"' : '' );
        }
        echo '</label>';
    }
    echo '</div><p class="description">Марку, тип кузова, коробку и город выберите в блоках справа. Обложка задаётся через «Изображение записи».</p>';
}

function tvoe_auto_car_gallery_box( $post ) {
    $ids = array_filter( array_map( 'absint', explode( ',', (string) get_post_meta( $post->ID, '_tvoe_auto_gallery_ids', true ) ) ) );
    echo '<div class="tvoe-auto-gallery" data-gallery><div class="tvoe-auto-gallery__items" data-gallery-items>';
    foreach ( $ids as $id ) {
        $thumb = wp_get_attachment_image_url( $id, 'thumbnail' );
        if ( $thumb ) {
            printf( '<button type="button" data-id="%1$d" aria-label="Удалить фото"><img src="%2$s" alt=""><span>×</span></button>', $id, esc_url( $thumb ) );
        }
    }
    echo '</div><input type="hidden" name="tvoe_auto_gallery_ids" data-gallery-input value="' . esc_attr( implode( ',', $ids ) ) . '"><button class="button button-primary" type="button" data-gallery-add>Добавить / изменить фото</button></div>';
    echo '<p class="description">Можно выбрать сразу несколько фото. Первое будет основным в галерее; обложка каталога задаётся отдельно.</p>';
}

function tvoe_auto_car_display_box( $post ) {
    $featured = '1' === get_post_meta( $post->ID, '_tvoe_auto_featured', true );
    $order    = (int) $post->menu_order;
    printf( '<p><label><input type="checkbox" name="tvoe_auto_featured" value="1" %s> Показывать на главной</label></p>', checked( $featured, true, false ) );
    printf( '<p><label for="tvoe-auto-order"><strong>Порядок в каталоге</strong></label><input id="tvoe-auto-order" class="widefat" type="number" name="tvoe_auto_order" value="%d" min="0" step="1"></p>', $order );
    echo '<p class="description">Меньшее число показывается раньше.</p>';
}

function tvoe_auto_save_car( $post_id ) {
    if ( ! isset( $_POST['tvoe_auto_car_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tvoe_auto_car_nonce'] ) ), 'tvoe_auto_save_car' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    foreach ( tvoe_auto_car_fields() as $key => $field ) {
        $raw   = isset( $_POST[ 'tvoe_auto_' . $key ] ) ? wp_unslash( $_POST[ 'tvoe_auto_' . $key ] ) : '';
        $value = 'textarea' === $field[1] ? sanitize_textarea_field( $raw ) : sanitize_text_field( $raw );
        update_post_meta( $post_id, '_tvoe_auto_' . $key, $value );
    }

    $gallery_ids = isset( $_POST['tvoe_auto_gallery_ids'] ) ? array_filter( array_map( 'absint', explode( ',', sanitize_text_field( wp_unslash( $_POST['tvoe_auto_gallery_ids'] ) ) ) ) ) : array();
    update_post_meta( $post_id, '_tvoe_auto_gallery_ids', implode( ',', $gallery_ids ) );
    update_post_meta( $post_id, '_tvoe_auto_featured', isset( $_POST['tvoe_auto_featured'] ) ? '1' : '0' );
    delete_post_meta( $post_id, '_tvoe_auto_demo' );
    $order = isset( $_POST['tvoe_auto_order'] ) ? absint( $_POST['tvoe_auto_order'] ) : 0;
    remove_action( 'save_post_auto_car', 'tvoe_auto_save_car' );
    wp_update_post( array( 'ID' => $post_id, 'menu_order' => $order ) );
    add_action( 'save_post_auto_car', 'tvoe_auto_save_car' );
}
add_action( 'save_post_auto_car', 'tvoe_auto_save_car' );

function tvoe_auto_car_admin_assets( $hook ) {
    $screen = get_current_screen();
    if ( ! $screen || 'auto_car' !== $screen->post_type || ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script( 'tvoe-auto-car-admin', tvoe_auto_asset_url( 'js/car-admin.js' ), array( 'jquery' ), tvoe_auto_asset_version( 'js/car-admin.js' ), true );
    wp_enqueue_style( 'tvoe-auto-car-admin', tvoe_auto_asset_url( 'css/car-admin.css' ), array(), tvoe_auto_asset_version( 'css/car-admin.css' ) );
}
add_action( 'admin_enqueue_scripts', 'tvoe_auto_car_admin_assets' );

function tvoe_auto_car_meta( $post_id, $key, $fallback = '' ) {
    $value = get_post_meta( $post_id, '_tvoe_auto_' . $key, true );
    return '' !== (string) $value ? (string) $value : $fallback;
}

function tvoe_auto_car_term( $post_id, $taxonomy ) {
    $terms = get_the_terms( $post_id, $taxonomy );
    return ! is_wp_error( $terms ) && $terms ? $terms[0] : null;
}

function tvoe_auto_car_term_value( $post_id, $taxonomy, $field = 'name' ) {
    $term = tvoe_auto_car_term( $post_id, $taxonomy );
    return $term ? (string) $term->{$field} : '';
}

function tvoe_auto_car_image( $post_id, $size = 'large' ) {
    $starter_image = ltrim( (string) get_post_meta( $post_id, '_tvoe_auto_catalog_image', true ), '/' );
    if ( $starter_image && file_exists( get_template_directory() . '/' . $starter_image ) ) {
        return tvoe_auto_asset_url( $starter_image );
    }
    $url = get_the_post_thumbnail_url( $post_id, $size );
    return $url ? $url : tvoe_auto_asset_url( 'img/figma-exact/catalog.webp' );
}

function tvoe_auto_car_query( $args = array() ) {
    return new WP_Query(
        wp_parse_args(
            $args,
            array(
                'post_type'      => 'auto_car',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
            )
        )
    );
}

function tvoe_auto_has_cars() {
    return (bool) wp_count_posts( 'auto_car' )->publish;
}

function tvoe_auto_car_summary( $post_id ) {
    $parts = array_filter(
        array(
            tvoe_auto_car_meta( $post_id, 'year' ),
            tvoe_auto_car_meta( $post_id, 'engine_volume' ),
            tvoe_auto_car_term_value( $post_id, 'auto_transmission' ),
            tvoe_auto_car_meta( $post_id, 'drive' ),
        )
    );
    return implode( ' · ', $parts );
}

function tvoe_auto_render_catalog_card( $post_id ) {
    $brand        = tvoe_auto_car_term_value( $post_id, 'auto_brand', 'slug' );
    $body         = tvoe_auto_car_term_value( $post_id, 'auto_body', 'slug' );
    $transmission = tvoe_auto_car_term_value( $post_id, 'auto_transmission', 'slug' );
    $city         = tvoe_auto_car_term_value( $post_id, 'auto_city', 'slug' );
    $year         = tvoe_auto_car_meta( $post_id, 'year' );
    $note         = tvoe_auto_car_meta( $post_id, 'legal_note', 'Расчёт предварительный и не является публичной офертой.' );
    ?>
    <article class="catalog-card" data-model="<?php echo esc_attr( $brand ); ?>" data-year="<?php echo esc_attr( $year ); ?>" data-body="<?php echo esc_attr( $body ); ?>" data-transmission="<?php echo esc_attr( $transmission ); ?>" data-city="<?php echo esc_attr( $city ); ?>">
        <a class="catalog-card__photo" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_car_image( $post_id, 'large' ) ); ?>" alt="<?php echo esc_attr( get_the_title( $post_id ) ); ?>"></a>
        <div class="catalog-card__body">
            <div class="catalog-card__title"><div><h3><?php echo esc_html( get_the_title( $post_id ) ); ?></h3><p><?php echo esc_html( tvoe_auto_car_summary( $post_id ) ); ?></p></div></div>
            <div class="catalog-card__terms"><span>Первый взнос<b><?php echo esc_html( tvoe_auto_car_meta( $post_id, 'first_payment', 'По запросу' ) ); ?></b></span><span>Платёж<b><?php echo esc_html( tvoe_auto_car_meta( $post_id, 'monthly_payment', 'По запросу' ) ); ?></b></span></div>
            <a class="catalog-card__button site-cta site-cta--secondary" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">Подробнее <img src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt=""></a>
            <small><?php echo esc_html( $note ); ?></small>
        </div>
    </article>
    <?php
}

function tvoe_auto_render_filter_group( $label, $name, $values ) {
    if ( ! $values ) {
        return;
    }
    ?>
    <div class="catalog-filter__group">
        <button class="catalog-filter__row" type="button" aria-expanded="false"><span><?php echo esc_html( $label ); ?></span><img src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-catalog/chevron.png' ) ); ?>" alt=""></button>
        <div class="catalog-filter__panel">
            <?php foreach ( $values as $value => $caption ) : ?>
                <label class="catalog-filter__option"><input type="checkbox" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>"><span><?php echo esc_html( $caption ); ?></span></label>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}

function tvoe_auto_catalog_values( $query ) {
    $values = array( 'model' => array(), 'year' => array(), 'body' => array(), 'transmission' => array(), 'city' => array() );
    foreach ( $query->posts as $post ) {
        $year = tvoe_auto_car_meta( $post->ID, 'year' );
        if ( $year ) {
            $values['year'][ $year ] = $year;
        }
        foreach ( array( 'model' => 'auto_brand', 'body' => 'auto_body', 'transmission' => 'auto_transmission', 'city' => 'auto_city' ) as $key => $taxonomy ) {
            $term = tvoe_auto_car_term( $post->ID, $taxonomy );
            if ( $term ) {
                $values[ $key ][ $term->slug ] = $term->name;
            }
        }
    }
    foreach ( $values as &$items ) {
        natcasesort( $items );
    }
    unset( $items );
    return $values;
}

function tvoe_auto_render_catalog_listing() {
    $query  = tvoe_auto_car_query();
    $values = tvoe_auto_catalog_values( $query );
    ?>
    <div class="catalog-layout">
        <aside class="catalog-filter" aria-label="Фильтры каталога">
            <div class="catalog-filter__heading"><img src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/filter.svg' ) ); ?>" alt=""><h2>Фильтры</h2></div>
            <?php
            tvoe_auto_render_filter_group( 'Марка', 'model', $values['model'] );
            tvoe_auto_render_filter_group( 'Год выпуска', 'year', $values['year'] );
            tvoe_auto_render_filter_group( 'Тип кузова', 'body', $values['body'] );
            tvoe_auto_render_filter_group( 'Коробка передач', 'transmission', $values['transmission'] );
            tvoe_auto_render_filter_group( 'Город', 'city', $values['city'] );
            ?>
            <button class="catalog-filter__reset" type="button">Сбросить фильтры</button>
        </aside>
        <div class="catalog-results">
            <div class="catalog-toolbar"><p class="catalog-results-count" aria-live="polite">Найдено: <?php echo esc_html( (string) $query->post_count ); ?></p><label><span class="sr-only">Сортировка</span><select aria-label="Сортировка автомобилей"><option value="newest">Сначала новые</option><option value="oldest">Сначала старые</option><option value="name">По названию</option></select></label></div>
            <div class="catalog-cards"><?php foreach ( $query->posts as $post ) { tvoe_auto_render_catalog_card( $post->ID ); } ?></div>
            <div class="catalog-empty" role="status" <?php echo $query->have_posts() ? 'hidden' : ''; ?>><strong>Автомобили не найдены</strong><span>Измените параметры или сбросьте фильтры.</span></div>
        </div>
    </div>
    <?php
    wp_reset_postdata();
}

function tvoe_auto_render_home_cars() {
    // The homepage is a direct preview of the first three published catalogue cars.
    $query = tvoe_auto_car_query( array( 'posts_per_page' => 3 ) );
    foreach ( $query->posts as $post ) {
        ?>
        <article class="car-card">
            <div class="car-photo"><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_car_image( $post->ID, 'large' ) ); ?>" alt="<?php echo esc_attr( get_the_title( $post->ID ) ); ?>"></div>
            <div class="car-info"><div class="car-title"><div><h3><?php echo esc_html( get_the_title( $post->ID ) ); ?></h3><p><?php echo esc_html( tvoe_auto_car_summary( $post->ID ) ); ?></p></div></div><div class="car-pay"><span>Первый взнос<b><?php echo esc_html( tvoe_auto_car_meta( $post->ID, 'first_payment', 'По запросу' ) ); ?></b></span><span>Платёж<b><?php echo esc_html( tvoe_auto_car_meta( $post->ID, 'monthly_payment', 'По запросу' ) ); ?></b></span></div><a class="site-cta site-cta--secondary" href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">Узнать условия <span>→</span></a><small><?php echo esc_html( tvoe_auto_car_meta( $post->ID, 'legal_note', 'Расчёт предварительный и не является публичной офертой.' ) ); ?></small></div>
        </article>
        <?php
    }
    wp_reset_postdata();
}

function tvoe_auto_render_rent_cars() {
    $query = tvoe_auto_car_query( array( 'posts_per_page' => 3 ) );
    if ( ! $query->have_posts() ) {
        return false;
    }

    foreach ( $query->posts as $post ) {
        $post_id = $post->ID;
        ?>
        <article class="rent-car">
            <a class="rent-car__photo" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><img loading="lazy" decoding="async" src="<?php echo esc_url( tvoe_auto_car_image( $post_id, 'large' ) ); ?>" alt="<?php echo esc_attr( get_the_title( $post_id ) ); ?>"></a>
            <div class="rent-car__body">
                <div class="rent-car__title"><h3><?php echo esc_html( get_the_title( $post_id ) ); ?></h3><p><?php echo esc_html( tvoe_auto_car_summary( $post_id ) ); ?></p></div>
                <div class="rent-car__terms"><span>Первый взнос<b><?php echo esc_html( tvoe_auto_car_meta( $post_id, 'first_payment', 'По запросу' ) ); ?></b></span><span>Платёж<b><?php echo esc_html( tvoe_auto_car_meta( $post_id, 'monthly_payment', 'По запросу' ) ); ?></b></span></div>
                <a class="rent-car__button site-cta site-cta--secondary" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">Узнать условия <img src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-dark.svg' ) ); ?>" alt=""></a><small><?php echo esc_html( tvoe_auto_car_meta( $post_id, 'legal_note', 'Расчёт предварительный и не является публичной офертой.' ) ); ?></small>
            </div>
        </article>
        <?php
    }
    wp_reset_postdata();
    return true;
}

function tvoe_auto_car_gallery_ids( $post_id ) {
    $ids      = array_filter( array_map( 'absint', explode( ',', (string) get_post_meta( $post_id, '_tvoe_auto_gallery_ids', true ) ) ) );
    $featured = get_post_thumbnail_id( $post_id );
    if ( $featured ) {
        array_unshift( $ids, $featured );
    }
    return array_values( array_unique( $ids ) );
}

function tvoe_auto_render_car_detail( $post_id ) {
    $gallery = tvoe_auto_car_gallery_ids( $post_id );
    $images  = array();
    foreach ( $gallery as $image_id ) {
        $url = wp_get_attachment_image_url( $image_id, 'full' );
        if ( $url ) {
            $images[] = $url;
        }
    }
    if ( ! $images ) {
        $images[] = tvoe_auto_car_image( $post_id, 'full' );
    }
    $title = get_the_title( $post_id );
    $city  = tvoe_auto_car_term_value( $post_id, 'auto_city' );
    $note  = tvoe_auto_car_meta( $post_id, 'legal_note', 'Расчёты носят предварительный характер. Автомобиль может быть зарезервирован до подтверждения заявки.' );
    ?>
    <main class="detail-main">
        <section class="detail-product">
            <div class="detail-product__grid">
                <div class="detail-gallery">
                    <div class="detail-gallery__main" tabindex="0" role="button" aria-haspopup="dialog" aria-label="Открыть фотографию 1 из <?php echo esc_attr( (string) count( $images ) ); ?>. Используйте стрелки для листания"><img src="<?php echo esc_url( $images[0] ); ?>" alt="<?php echo esc_attr( $title ); ?>, фото 1"></div>
                    <div class="detail-gallery__thumbs" aria-label="Фотографии автомобиля">
                        <?php foreach ( $images as $index => $image ) : ?>
                            <button class="gallery-thumb<?php echo 0 === $index ? ' is-active' : ''; ?>" type="button" data-image="<?php echo esc_url( $image ); ?>" data-alt="<?php echo esc_attr( $title . ', фото ' . ( $index + 1 ) ); ?>" aria-label="Показать фотографию <?php echo esc_attr( (string) ( $index + 1 ) ); ?>" aria-pressed="<?php echo 0 === $index ? 'true' : 'false'; ?>"><img src="<?php echo esc_url( $image ); ?>" alt=""></button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <article class="detail-info">
                    <a class="detail-back" href="<?php echo esc_url( tvoe_auto_page_url( 'catalog' ) ); ?>"><img src="<?php echo esc_url( tvoe_auto_asset_url( 'img/gray-back.svg' ) ); ?>" alt="">Назад в каталог</a>
                    <h1><?php echo esc_html( $title ); ?></h1>
                    <p class="detail-meta"><?php echo esc_html( tvoe_auto_car_summary( $post_id ) ); ?></p>
                    <div class="detail-payment"><div><span>Первоначальный взнос</span><strong><?php echo esc_html( tvoe_auto_car_meta( $post_id, 'first_payment', 'По запросу' ) ); ?></strong></div><div><span>Ориентировочный платёж</span><strong><?php echo esc_html( tvoe_auto_car_meta( $post_id, 'monthly_payment', 'По запросу' ) ); ?></strong></div></div>
                    <dl class="detail-specs">
                        <div><dt>Двигатель</dt><dd><?php echo esc_html( trim( tvoe_auto_car_meta( $post_id, 'engine_volume' ) . ' · ' . tvoe_auto_car_meta( $post_id, 'engine_type' ), ' ·' ) ); ?></dd></div>
                        <div><dt>Пробег</dt><dd><?php echo esc_html( tvoe_auto_car_meta( $post_id, 'mileage', 'Не указан' ) ); ?></dd></div>
                        <div><dt>Привод</dt><dd><?php echo esc_html( tvoe_auto_car_meta( $post_id, 'drive', 'Не указан' ) ); ?></dd></div>
                        <div><dt>Город</dt><dd><?php echo esc_html( $city ? $city : 'Не указан' ); ?></dd></div>
                    </dl>
                    <a class="detail-primary site-cta" href="<?php echo esc_url( add_query_arg( 'car', $post_id, tvoe_auto_page_url( 'contact' ) ) ); ?>">Узнать условия <img src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt=""></a>
                    <small><?php echo esc_html( $note ); ?></small>
                </article>
            </div>
        </section>
        <section class="detail-cta"><div><p><img src="<?php echo esc_url( tvoe_auto_asset_url( 'img/red-chat.svg' ) ); ?>" alt="">Консультация без обязательств</p><h2>Нужен такой или аналогичный автомобиль?</h2></div><a class="site-cta" href="<?php echo esc_url( add_query_arg( 'car', $post_id, tvoe_auto_page_url( 'contact' ) ) ); ?>">Узнать условия по автомобилю <img src="<?php echo esc_url( tvoe_auto_asset_url( 'img/figma-exact/arrow-white.svg' ) ); ?>" alt=""></a></section>
    </main>
    <?php
}

function tvoe_auto_car_admin_columns( $columns ) {
    return array(
        'cb'            => $columns['cb'],
        'tvoe_photo'    => 'Фото',
        'title'         => 'Автомобиль',
        'tvoe_specs'    => 'Год / характеристики',
        'taxonomy-auto_brand' => 'Марка',
        'taxonomy-auto_city'  => 'Город',
        'tvoe_featured' => 'Главная',
        'date'          => $columns['date'],
    );
}
add_filter( 'manage_auto_car_posts_columns', 'tvoe_auto_car_admin_columns' );

function tvoe_auto_car_admin_column( $column, $post_id ) {
    if ( 'tvoe_photo' === $column ) {
        echo get_the_post_thumbnail( $post_id, array( 72, 52 ) );
    } elseif ( 'tvoe_specs' === $column ) {
        echo esc_html( tvoe_auto_car_summary( $post_id ) );
    } elseif ( 'tvoe_featured' === $column ) {
        echo '1' === get_post_meta( $post_id, '_tvoe_auto_featured', true ) ? 'Да' : '—';
    }
}
add_action( 'manage_auto_car_posts_custom_column', 'tvoe_auto_car_admin_column', 10, 2 );

function tvoe_auto_car_flush_rewrites() {
    tvoe_auto_register_cars();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'tvoe_auto_car_flush_rewrites' );

function tvoe_auto_install_pages() {
    tvoe_auto_register_cars();
    $pages = array(
        'home'                  => array( 'Главная', '' ),
        'catalog'               => array( 'Автомобили', 'page-catalog.php' ),
        'installment'           => array( 'Рассрочка', 'page-installment.php' ),
        'rent-to-own'           => array( 'Аренда с выкупом', 'page-rent-to-own.php' ),
        'trade-in'              => array( 'Trade-in', 'page-trade-in.php' ),
        'selection'             => array( 'Автоподбор', 'page-selection.php' ),
        'application'           => array( 'Заявка', 'page-application.php' ),
        'news'                  => array( 'Новости', 'page-news.php' ),
        'article'               => array( 'Статья', 'page-article.php' ),
        'reviews'               => array( 'Отзывы', 'page-reviews.php' ),
        'faq'                   => array( 'Вопросы и ответы', 'page-faq.php' ),
        'contact'               => array( 'Контакты', 'page-contact.php' ),
        'privacy'               => array( 'Политика обработки персональных данных', 'page-privacy.php' ),
        'personal-data-consent' => array( 'Согласие на обработку персональных данных', 'page-personal-data-consent.php' ),
    );
    $home_id = 0;
    foreach ( $pages as $slug => $data ) {
        $page = get_page_by_path( $slug );
        if ( ! $page ) {
            $page_id = wp_insert_post(
                array(
                    'post_type'   => 'page',
                    'post_status' => 'publish',
                    'post_title'  => $data[0],
                    'post_name'   => $slug,
                )
            );
            if ( ! is_wp_error( $page_id ) && $data[1] ) {
                update_post_meta( $page_id, '_wp_page_template', $data[1] );
            }
        } else {
            $page_id = $page->ID;
        }
        if ( 'home' === $slug && ! is_wp_error( $page_id ) ) {
            $home_id = (int) $page_id;
        }
    }
    if ( $home_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $home_id );
    }
    update_option( 'tvoe_auto_pages_installed', '1' );
    tvoe_auto_retire_demo_cars();
}
add_action( 'after_switch_theme', 'tvoe_auto_install_pages', 20 );

/**
 * Removes legacy seeded data from the public catalogue without deleting it.
 *
 * Owners can still inspect the draft records in the admin, but fictional
 * vehicles, prices and specifications can no longer reach public pages.
 */
function tvoe_auto_retire_demo_cars() {
    $demo_ids = get_posts(
        array(
            'post_type'      => 'auto_car',
            'post_status'    => 'any',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'meta_key'       => '_tvoe_auto_demo',
            'meta_value'     => '1',
        )
    );

    foreach ( $demo_ids as $post_id ) {
        if ( 'draft' !== get_post_status( $post_id ) ) {
            wp_update_post( array( 'ID' => $post_id, 'post_status' => 'draft' ) );
        }
    }
}

function tvoe_auto_seed_cars() {
    if ( tvoe_auto_has_cars() ) {
        return;
    }

    $initial_ids = get_posts(
        array(
            'post_type'      => 'auto_car',
            'post_status'    => 'any',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'meta_key'       => '_tvoe_auto_initial',
            'meta_value'     => '1',
        )
    );
    if ( $initial_ids ) {
        foreach ( $initial_ids as $post_id ) {
            if ( 'publish' !== get_post_status( $post_id ) ) {
                wp_update_post( array( 'ID' => $post_id, 'post_status' => 'publish' ) );
            }
        }
        return;
    }

    $cars = array(
        array( 'Toyota RAV4', 'Toyota', '2021', 'Кроссовер', 'Автоматическая', 'Барнаул', '2.0 л', '76 400 км', 'Полный / 4WD', 'от 438 000 ₽', 'от 42 900 ₽/мес.', 'img/catalog-toyota-rav4.webp' ),
        array( 'Kia K5', 'Kia', '2020', 'Седан', 'Автоматическая', 'Новосибирск', '2.5 л', '84 000 км', 'Передний', 'от 328 000 ₽', 'от 32 300 ₽/мес.', 'img/figma-exact/catalog.webp' ),
        array( 'Hyundai Santa Fe', 'Hyundai', '2022', 'Внедорожник', 'Автоматическая', 'Барнаул', '2.5 л', '61 000 км', 'Полный / 4WD', 'от 556 000 ₽', 'от 54 600 ₽/мес.', 'img/figma-home/catalog-mobile.webp' ),
        array( 'Nissan Qashqai', 'Nissan', '2019', 'Кроссовер', 'Вариатор', 'Кемерово', '2.0 л', '96 000 км', 'Передний', 'от 296 000 ₽', 'от 29 100 ₽/мес.', 'img/figma-car/graphite-cross.webp' ),
        array( 'Volkswagen Polo', 'Volkswagen', '2021', 'Седан', 'Автоматическая', 'Бийск', '1.6 л', '72 000 км', 'Передний', 'от 364 000 ₽', 'от 35 800 ₽/мес.', 'img/figma-exact/catalog.webp' ),
        array( 'Renault Duster', 'Renault', '2020', 'Кроссовер', 'Механическая', 'Новосибирск', '2.0 л', '89 000 км', 'Полный / 4WD', 'от 470 000 ₽', 'от 46 200 ₽/мес.', 'img/figma-home/catalog-mobile.webp' ),
    );
    foreach ( $cars as $order => $car ) {
        $post_id = wp_insert_post( array( 'post_type' => 'auto_car', 'post_status' => 'publish', 'post_title' => $car[0], 'menu_order' => $order ) );
        if ( is_wp_error( $post_id ) ) {
            continue;
        }
        wp_set_object_terms( $post_id, $car[1], 'auto_brand' );
        wp_set_object_terms( $post_id, $car[3], 'auto_body' );
        wp_set_object_terms( $post_id, $car[4], 'auto_transmission' );
        wp_set_object_terms( $post_id, $car[5], 'auto_city' );
        update_post_meta( $post_id, '_tvoe_auto_year', $car[2] );
        update_post_meta( $post_id, '_tvoe_auto_engine_volume', $car[6] );
        update_post_meta( $post_id, '_tvoe_auto_engine_type', 'бензин' );
        update_post_meta( $post_id, '_tvoe_auto_mileage', $car[7] );
        update_post_meta( $post_id, '_tvoe_auto_drive', $car[8] );
        update_post_meta( $post_id, '_tvoe_auto_first_payment', $car[9] );
        update_post_meta( $post_id, '_tvoe_auto_monthly_payment', $car[10] );
        update_post_meta( $post_id, '_tvoe_auto_catalog_image', $car[11] );
        update_post_meta( $post_id, '_tvoe_auto_featured', $order < 3 ? '1' : '0' );
        update_post_meta( $post_id, '_tvoe_auto_initial', '1' );
        update_post_meta( $post_id, '_tvoe_auto_legal_note', 'Расчёт предварительный и не является публичной офертой.' );
    }
    update_option( 'tvoe_auto_initial_cars_created', '1', false );
}
add_action( 'after_switch_theme', 'tvoe_auto_seed_cars', 30 );
add_action( 'init', 'tvoe_auto_seed_cars', 30 );
add_action( 'admin_init', 'tvoe_auto_seed_cars', 25 );

function tvoe_auto_mark_legacy_demo_cars() {
    if ( get_option( 'tvoe_auto_demo_marker_migrated' ) || ! get_option( 'tvoe_auto_demo_cars_created' ) ) {
        return;
    }
    $demo_titles = array( 'Graphite Cross', 'White Sedan', 'Navy Family SUV', 'Graphite City', 'White Comfort', 'Navy Tour' );
    $posts       = get_posts( array( 'post_type' => 'auto_car', 'post_status' => array( 'publish', 'draft', 'private' ), 'posts_per_page' => 20 ) );
    foreach ( $posts as $post ) {
        $gallery = get_post_meta( $post->ID, '_tvoe_auto_gallery_ids', true );
        if ( in_array( $post->post_title, $demo_titles, true ) && ! get_post_thumbnail_id( $post->ID ) && ! $gallery ) {
            update_post_meta( $post->ID, '_tvoe_auto_demo', '1' );
        }
    }
    update_option( 'tvoe_auto_demo_marker_migrated', '1' );
}
add_action( 'admin_init', 'tvoe_auto_mark_legacy_demo_cars', 10 );

function tvoe_auto_admin_catalog_filters( $post_type ) {
    if ( 'auto_car' !== $post_type ) {
        return;
    }
    foreach ( array( 'auto_brand', 'auto_body', 'auto_transmission', 'auto_city' ) as $taxonomy ) {
        wp_dropdown_categories(
            array(
                'show_option_all' => get_taxonomy( $taxonomy )->labels->all_items,
                'taxonomy'        => $taxonomy,
                'name'            => $taxonomy,
                'orderby'         => 'name',
                'selected'        => isset( $_GET[ $taxonomy ] ) ? absint( $_GET[ $taxonomy ] ) : 0,
                'hierarchical'    => true,
                'show_count'      => true,
                'hide_empty'      => true,
                'value_field'     => 'term_id',
            )
        );
    }
}
add_action( 'restrict_manage_posts', 'tvoe_auto_admin_catalog_filters' );

function tvoe_auto_admin_catalog_filter_query( $query ) {
    if ( ! is_admin() || ! $query->is_main_query() || 'auto_car' !== $query->get( 'post_type' ) ) {
        return;
    }
    $tax_query = array();
    foreach ( array( 'auto_brand', 'auto_body', 'auto_transmission', 'auto_city' ) as $taxonomy ) {
        $term_id = isset( $_GET[ $taxonomy ] ) ? absint( $_GET[ $taxonomy ] ) : 0;
        if ( $term_id ) {
            $tax_query[] = array( 'taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term_id );
        }
    }
    if ( $tax_query ) {
        $query->set( 'tax_query', $tax_query );
    }
}
add_action( 'pre_get_posts', 'tvoe_auto_admin_catalog_filter_query' );

function tvoe_auto_catalog_help_page() {
    add_submenu_page( 'edit.php?post_type=auto_car', 'Как вести каталог', 'Как вести каталог', 'edit_posts', 'tvoe-auto-help', 'tvoe_auto_render_catalog_help' );
}
add_action( 'admin_menu', 'tvoe_auto_catalog_help_page' );

function tvoe_auto_render_catalog_help() {
    ?>
    <div class="wrap"><h1>Как вести каталог</h1><div class="card" style="max-width:860px"><ol><li><strong>Автомобили → Добавить.</strong> Введите название модели.</li><li>Справа задайте <strong>обложку</strong>, марку, кузов, коробку и город. Из этих значений фильтры собираются автоматически.</li><li>Заполните характеристики, взнос и платёж.</li><li>В блоке <strong>«Фотографии»</strong> выберите всю галерею из медиатеки.</li><li>Отметьте <strong>«Показывать на главной»</strong>, если машина должна попасть в первую тройку.</li><li>Нажмите <strong>«Опубликовать»</strong>. Черновики на сайте не видны.</li></ol><p>Чтобы временно убрать машину, переведите её в черновик. Для полного удаления используйте корзину.</p></div></div>
    <?php
}
