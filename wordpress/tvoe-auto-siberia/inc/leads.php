<?php
/**
 * Private WordPress lead storage and public REST intake.
 *
 * @package Tvoe_Auto_Siberia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function tvoe_auto_register_leads() {
    register_post_type(
        'tvoe_lead',
        array(
            'labels' => array( 'name' => 'Заявки', 'singular_name' => 'Заявка', 'menu_name' => 'Заявки', 'view_item' => 'Открыть заявку', 'search_items' => 'Найти заявку', 'not_found' => 'Заявок нет' ),
            'public' => false, 'show_ui' => true, 'show_in_menu' => true, 'menu_icon' => 'dashicons-email-alt', 'menu_position' => 21,
            'supports' => array( 'title' ),
            'capability_type' => array( 'tvoe_lead', 'tvoe_leads' ),
            'capabilities' => array( 'create_posts' => 'do_not_allow' ),
            'map_meta_cap' => true,
        )
    );
}
add_action( 'init', 'tvoe_auto_register_leads' );

function tvoe_auto_register_lead_route() {
    register_rest_route( 'tvoe-auto/v1', '/leads', array( 'methods' => WP_REST_Server::CREATABLE, 'callback' => 'tvoe_auto_receive_lead', 'permission_callback' => '__return_true' ) );
}
add_action( 'rest_api_init', 'tvoe_auto_register_lead_route' );

function tvoe_auto_lead_rate_key() {
    $ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
    return 'tvoe_lead_rate_' . md5( wp_salt( 'nonce' ) . '|' . $ip );
}

function tvoe_auto_lead_request_key( $request_id ) {
    return 'tvoe_lead_request_' . md5( wp_salt( 'nonce' ) . '|' . $request_id );
}

function tvoe_auto_telegram_setting( $constant, $option ) {
    if ( defined( $constant ) ) {
        return trim( (string) constant( $constant ) );
    }

    return trim( (string) tvoe_auto_production_value( $option, '' ) );
}

function tvoe_auto_send_telegram_lead( $message ) {
    $options = tvoe_auto_production_options();
    if ( empty( $options['telegram_enabled'] ) ) {
        return array( 'status' => 'disabled', 'error' => '' );
    }

    $bot_token = tvoe_auto_telegram_setting( 'TVOE_AUTO_TELEGRAM_BOT_TOKEN', 'telegram_bot_token' );
    $chat_id   = tvoe_auto_telegram_setting( 'TVOE_AUTO_TELEGRAM_CHAT_ID', 'telegram_chat_id' );
    $thread_id = tvoe_auto_telegram_setting( 'TVOE_AUTO_TELEGRAM_THREAD_ID', 'telegram_thread_id' );
    if ( '' === $bot_token || '' === $chat_id ) {
        return array( 'status' => 'not_configured', 'error' => 'Укажите Bot Token и числовой Chat ID.' );
    }

    $body = array(
        'chat_id'                  => $chat_id,
        'text'                     => function_exists( 'mb_substr' ) ? mb_substr( $message, 0, 4000 ) : substr( $message, 0, 4000 ),
        'disable_web_page_preview' => 'true',
    );
    if ( '' !== $thread_id ) {
        $body['message_thread_id'] = $thread_id;
    }

    $response = wp_remote_post(
        'https://api.telegram.org/bot' . rawurlencode( $bot_token ) . '/sendMessage',
        array(
            'timeout' => 12,
            'body'    => $body,
        )
    );
    if ( is_wp_error( $response ) ) {
        return array( 'status' => 'failed', 'error' => sanitize_text_field( $response->get_error_message() ) );
    }

    $code = (int) wp_remote_retrieve_response_code( $response );
    $data = json_decode( wp_remote_retrieve_body( $response ), true );
    if ( 200 !== $code || empty( $data['ok'] ) ) {
        $description = is_array( $data ) && isset( $data['description'] ) ? sanitize_text_field( $data['description'] ) : 'Telegram API вернул HTTP ' . $code . '.';
        return array( 'status' => 'failed', 'error' => $description );
    }

    return array( 'status' => 'sent', 'error' => '' );
}

/**
 * Makes the email and Telegram notification readable without relying on
 * technical field names from the form.
 *
 * @param array  $payload   Sanitized form data.
 * @param string $lead_type Form identifier.
 * @param int    $post_id   Stored WordPress lead ID.
 * @param string $request_id Browser idempotency key.
 * @param string $source    Page where the form was sent.
 * @return string
 */
function tvoe_auto_format_lead_notification( $payload, $lead_type, $post_id, $request_id, $source ) {
    $forms = array(
        'home'        => 'Консультация на главной',
        'contact'     => 'Заявка',
        'trade-in'    => 'Trade-in',
        'application' => 'Подбор автомобиля',
    );
    $contact_methods = array(
        'phone'    => 'Сотовый',
        'telegram' => 'Telegram',
        'max'      => 'MAX',
        'Телефон'  => 'Сотовый',
    );
    $value = static function( $key, $fallback = 'Не указано' ) use ( $payload ) {
        if ( ! array_key_exists( $key, $payload ) || '' === $payload[ $key ] ) {
            return $fallback;
        }

        return is_array( $payload[ $key ] ) ? implode( ', ', $payload[ $key ] ) : $payload[ $key ];
    };
    $consent = static function( $key ) use ( $payload ) {
        // Earlier forms have one mandatory checkbox that covers both policy
        // acknowledgement and personal-data processing.
        if ( 'policy-consent' === $key && ! array_key_exists( $key, $payload ) ) {
            return ! empty( $payload['personal-data-consent'] ) ? 'yes' : 'no';
        }

        return ! empty( $payload[ $key ] ) ? 'yes' : 'no';
    };
    $contact_method = $value( 'contact-method' );
    if ( isset( $contact_methods[ $contact_method ] ) ) {
        $contact_method = $contact_methods[ $contact_method ];
    }

    $message = array(
        'Содержание заявки:',
        'Город: ' . $value( 'city' ),
        'Имя: ' . $value( 'name' ),
        'Телефон: ' . $value( 'phone' ),
        'Способ связи: ' . $contact_method,
        'Согласие с политикой: ' . $consent( 'policy-consent' ),
        'Согласие на обработку: ' . $consent( 'personal-data-consent' ),
        'Согласие на рекламу: ' . $consent( 'advertising-consent' ),
        '',
        'Дополнительная информация:',
        'Код заявки: ' . $post_id . ':' . substr( $request_id, 0, 12 ),
        'Форма: ' . ( isset( $forms[ $lead_type ] ) ? $forms[ $lead_type ] : 'Заявка' ),
    );
    if ( '' !== $source ) {
        $message[] = 'Страница: ' . $source;
    }

    $skip = array( 'lead_type', 'city', 'name', 'phone', 'contact-method', 'email', 'comment', 'policy-consent', 'personal-data-consent', 'advertising-consent' );
    $labels = array(
        'service' => 'Услуга', 'interest' => 'Интерес', 'car' => 'Автомобиль', 'year' => 'Год выпуска',
        'brand' => 'Марка', 'budget' => 'Бюджет', 'payment' => 'Способ оплаты',
    );
    foreach ( $payload as $key => $item ) {
        if ( in_array( $key, $skip, true ) || '' === $item ) {
            continue;
        }
        $message[] = ( isset( $labels[ $key ] ) ? $labels[ $key ] : $key ) . ': ' . ( is_array( $item ) ? implode( ', ', $item ) : $item );
    }

    return implode( "\n", $message );
}

function tvoe_auto_receive_lead( WP_REST_Request $request ) {
    $origin = $request->get_header( 'origin' );
    if ( $origin && wp_parse_url( $origin, PHP_URL_HOST ) !== wp_parse_url( home_url( '/' ), PHP_URL_HOST ) ) {
        return new WP_Error( 'invalid_origin', 'Запрос отклонён.', array( 'status' => 403 ) );
    }
    $params = $request->get_json_params();
    $params = is_array( $params ) ? $params : array();
    if ( ! empty( $params['website'] ) ) {
        return rest_ensure_response( array( 'success' => true, 'message' => 'Спасибо! Заявка принята.' ) );
    }
    $started = isset( $params['started_at'] ) ? absint( $params['started_at'] ) : 0;
    if ( $started && time() - $started < 2 ) {
        return new WP_Error( 'too_fast', 'Повторите отправку.', array( 'status' => 429 ) );
    }
    $rate_key = tvoe_auto_lead_rate_key();
    $rate     = (int) get_transient( $rate_key );
    if ( $rate >= 5 ) {
        return new WP_Error( 'rate_limit', 'Слишком много запросов. Попробуйте через 15 минут.', array( 'status' => 429 ) );
    }
    set_transient( $rate_key, $rate + 1, 15 * MINUTE_IN_SECONDS );

    $type    = isset( $params['lead_type'] ) ? sanitize_key( $params['lead_type'] ) : 'consultation';
    $allowed = array( 'home', 'contact', 'trade-in', 'application' );
    $type    = in_array( $type, $allowed, true ) ? $type : 'consultation';
    $phone         = isset( $params['phone'] ) ? sanitize_text_field( $params['phone'] ) : '';
    $consent       = isset( $params['personal-data-consent'] ) ? sanitize_text_field( $params['personal-data-consent'] ) : '';
    $policy_consent = isset( $params['policy-consent'] ) ? sanitize_text_field( $params['policy-consent'] ) : '';
    $foreign_phone = ! empty( $params['foreign-phone'] );
    $phone_digits  = preg_replace( '/\D+/', '', $phone );
    $valid_phone   = $foreign_phone
        ? (bool) preg_match( '/^\d{7,15}$/', $phone_digits )
        : (bool) preg_match( '/^7\d{10}$/', $phone_digits );
    if ( ! $valid_phone || '' === $consent ) {
        return new WP_Error( 'invalid_lead', 'Проверьте телефон и согласие на обработку данных.', array( 'status' => 400 ) );
    }
    if ( 'application' === $type && '' === $policy_consent ) {
        return new WP_Error( 'invalid_lead', 'Подтвердите ознакомление с Политикой.', array( 'status' => 400 ) );
    }

    $request_id = isset( $params['request_id'] ) ? sanitize_text_field( $params['request_id'] ) : '';
    if ( ! preg_match( '/^[a-zA-Z0-9-]{16,128}$/', $request_id ) ) {
        return new WP_Error( 'invalid_request', 'Повторите отправку формы.', array( 'status' => 400 ) );
    }
    $request_key = tvoe_auto_lead_request_key( $request_id );
    if ( get_transient( $request_key ) ) {
        return new WP_REST_Response( array( 'success' => true, 'message' => 'Заявка уже принята. Мы свяжемся с вами.' ), 200 );
    }
    set_transient( $request_key, '1', 15 * MINUTE_IN_SECONDS );

    $payload = array();
    foreach ( $params as $key => $value ) {
        $clean_key = sanitize_key( $key );
        if ( in_array( $clean_key, array( 'website', 'started_at', 'request_id', 'email', 'comment' ), true ) ) {
            continue;
        }
        if ( is_array( $value ) ) {
            $payload[ $clean_key ] = array_slice( array_map( 'sanitize_text_field', $value ), 0, 20 );
        } else {
            $clean_value = sanitize_textarea_field( (string) $value );
            $payload[ $clean_key ] = function_exists( 'mb_substr' ) ? mb_substr( $clean_value, 0, 3000 ) : substr( $clean_value, 0, 3000 );
        }
    }
    $labels = array( 'home' => 'Главная', 'contact' => 'Контакты', 'trade-in' => 'Trade-in', 'application' => 'Подбор автомобиля' );
    $post_id = wp_insert_post( array( 'post_type' => 'tvoe_lead', 'post_status' => 'private', 'post_title' => $labels[ $type ] . ' — ' . $phone . ' — ' . current_time( 'd.m.Y H:i' ) ), true );
    if ( is_wp_error( $post_id ) ) {
        delete_transient( $request_key );
        return new WP_Error( 'storage_failed', 'Заявку не удалось сохранить. Позвоните нам по телефону.', array( 'status' => 500 ) );
    }
    update_post_meta( $post_id, '_tvoe_lead_payload', $payload );
    update_post_meta( $post_id, '_tvoe_lead_type', $type );
    update_post_meta( $post_id, '_tvoe_lead_consent_version', $consent );
    update_post_meta( $post_id, '_tvoe_lead_consent_at', current_time( 'mysql', true ) );
    $source = esc_url_raw( $request->get_header( 'referer' ) );
    update_post_meta( $post_id, '_tvoe_lead_source', $source );
    update_post_meta( $post_id, '_tvoe_lead_request_id', $request_id );

    $email   = sanitize_email( tvoe_auto_production_value( 'lead_email', get_option( 'admin_email' ) ) );
    $message_text = tvoe_auto_format_lead_notification( $payload, $type, $post_id, $request_id, $source );
    $sent = $email ? wp_mail( $email, 'Новая заявка #' . $post_id . ' — Твоё Авто', $message_text ) : false;
    update_post_meta( $post_id, '_tvoe_lead_email_sent', $sent ? '1' : '0' );
    $telegram = tvoe_auto_send_telegram_lead( $message_text );
    update_post_meta( $post_id, '_tvoe_lead_telegram_status', $telegram['status'] );
    update_post_meta( $post_id, '_tvoe_lead_telegram_error', $telegram['error'] );

    return new WP_REST_Response( array( 'success' => true, 'message' => 'Спасибо! Заявка принята. Мы свяжемся с вами.' ), 201 );
}

function tvoe_auto_lead_meta_box( $post ) {
    $payload = get_post_meta( $post->ID, '_tvoe_lead_payload', true );
    echo '<table class="widefat striped"><tbody>';
    foreach ( is_array( $payload ) ? $payload : array() as $key => $value ) {
        echo '<tr><th style="width:220px">' . esc_html( $key ) . '</th><td>' . nl2br( esc_html( is_array( $value ) ? implode( ', ', $value ) : $value ) ) . '</td></tr>';
    }
    echo '<tr><th>Согласие</th><td>' . esc_html( get_post_meta( $post->ID, '_tvoe_lead_consent_version', true ) ) . ', UTC ' . esc_html( get_post_meta( $post->ID, '_tvoe_lead_consent_at', true ) ) . '</td></tr>';
    echo '<tr><th>Email-уведомление</th><td>' . ( '1' === get_post_meta( $post->ID, '_tvoe_lead_email_sent', true ) ? 'Отправлено' : 'Не подтверждено; заявка сохранена в WordPress' ) . '</td></tr>';
    $telegram_status = get_post_meta( $post->ID, '_tvoe_lead_telegram_status', true );
    $telegram_error  = get_post_meta( $post->ID, '_tvoe_lead_telegram_error', true );
    $telegram_labels = array( 'sent' => 'Отправлено', 'failed' => 'Ошибка', 'not_configured' => 'Не настроено', 'disabled' => 'Отключено' );
    $telegram_label  = isset( $telegram_labels[ $telegram_status ] ) ? $telegram_labels[ $telegram_status ] : 'Не запускалось';
    echo '<tr><th>Telegram</th><td>' . esc_html( $telegram_label );
    if ( $telegram_error ) {
        echo '<br><span style="color:#b32d2e">' . esc_html( $telegram_error ) . '</span>';
    }
    echo '</td></tr></tbody></table>';
}

function tvoe_auto_add_lead_meta_box() {
    add_meta_box( 'tvoe-auto-lead-data', 'Данные заявки', 'tvoe_auto_lead_meta_box', 'tvoe_lead', 'normal', 'high' );
}
add_action( 'add_meta_boxes_tvoe_lead', 'tvoe_auto_add_lead_meta_box' );

function tvoe_auto_lead_columns( $columns ) {
    return array( 'cb' => $columns['cb'], 'title' => 'Заявка', 'lead_type' => 'Форма', 'lead_phone' => 'Телефон', 'email_status' => 'Email', 'telegram_status' => 'Telegram', 'date' => 'Дата' );
}
add_filter( 'manage_tvoe_lead_posts_columns', 'tvoe_auto_lead_columns' );

function tvoe_auto_lead_column( $column, $post_id ) {
    $payload = get_post_meta( $post_id, '_tvoe_lead_payload', true );
    if ( 'lead_type' === $column ) echo esc_html( get_post_meta( $post_id, '_tvoe_lead_type', true ) );
    if ( 'lead_phone' === $column ) echo esc_html( isset( $payload['phone'] ) ? $payload['phone'] : '' );
    if ( 'email_status' === $column ) echo '1' === get_post_meta( $post_id, '_tvoe_lead_email_sent', true ) ? 'Отправлено' : 'Нет';
    if ( 'telegram_status' === $column ) {
        $statuses = array( 'sent' => 'Отправлено', 'failed' => 'Ошибка', 'not_configured' => 'Не настроено', 'disabled' => 'Отключено' );
        $status   = get_post_meta( $post_id, '_tvoe_lead_telegram_status', true );
        echo esc_html( isset( $statuses[ $status ] ) ? $statuses[ $status ] : 'Нет' );
    }
}
add_action( 'manage_tvoe_lead_posts_custom_column', 'tvoe_auto_lead_column', 10, 2 );

function tvoe_auto_cleanup_old_leads() {
    $days = max( 1, absint( tvoe_auto_production_value( 'retention_days', 180 ) ) );
    $ids  = get_posts( array( 'post_type' => 'tvoe_lead', 'post_status' => 'private', 'fields' => 'ids', 'posts_per_page' => 100, 'date_query' => array( array( 'before' => $days . ' days ago' ) ) ) );
    foreach ( $ids as $post_id ) {
        wp_delete_post( $post_id, true );
    }
}
add_action( 'tvoe_auto_daily_cleanup', 'tvoe_auto_cleanup_old_leads' );

function tvoe_auto_schedule_cleanup() {
    $administrator = get_role( 'administrator' );
    if ( $administrator ) {
        foreach ( array( 'edit_tvoe_lead', 'read_tvoe_lead', 'delete_tvoe_lead', 'edit_tvoe_leads', 'edit_others_tvoe_leads', 'publish_tvoe_leads', 'read_private_tvoe_leads', 'delete_tvoe_leads', 'delete_private_tvoe_leads', 'delete_published_tvoe_leads', 'delete_others_tvoe_leads', 'edit_private_tvoe_leads', 'edit_published_tvoe_leads' ) as $capability ) {
            $administrator->add_cap( $capability );
        }
    }
    if ( ! wp_next_scheduled( 'tvoe_auto_daily_cleanup' ) ) {
        wp_schedule_event( time() + HOUR_IN_SECONDS, 'daily', 'tvoe_auto_daily_cleanup' );
    }
}
add_action( 'after_switch_theme', 'tvoe_auto_schedule_cleanup' );

function tvoe_auto_unschedule_cleanup() {
    wp_clear_scheduled_hook( 'tvoe_auto_daily_cleanup' );
}
add_action( 'switch_theme', 'tvoe_auto_unschedule_cleanup' );
