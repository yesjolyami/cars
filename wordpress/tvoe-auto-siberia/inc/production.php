<?php
/**
 * Production settings and safe publication guard.
 *
 * @package Tvoe_Auto_Siberia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function tvoe_auto_production_defaults() {
    return array(
        'lead_email'       => 'Zaur.guliew@yandex.ru',
        'telegram_enabled' => 1,
        'telegram_bot_token' => '',
        'telegram_chat_id' => '',
        'telegram_thread_id' => '',
        'telegram_invite_url' => 'https://t.me/+FRyhyk8Q39M5NzMy',
        'retention_days'   => 180,
        'hosting_name'     => '',
        'hosting_location' => '',
        'processors'       => 'Сайт и база заявок WordPress; уведомления на электронную почту и в Telegram.',
        'server_logs'      => 'Технические HTTP-журналы хостинга: IP-адрес, User-Agent, дата, URL и код ответа.',
        'legal_approved_at' => '',
        'legal_confirmed'  => 0,
    );
}

function tvoe_auto_production_options() {
    $stored = get_option( 'tvoe_auto_production', array() );
    return wp_parse_args( is_array( $stored ) ? $stored : array(), tvoe_auto_production_defaults() );
}

function tvoe_auto_production_value( $key, $fallback = '' ) {
    $options = tvoe_auto_production_options();
    return isset( $options[ $key ] ) && '' !== (string) $options[ $key ] ? $options[ $key ] : $fallback;
}

function tvoe_auto_sanitize_production_options( $input ) {
    $input    = is_array( $input ) ? $input : array();
    $defaults = tvoe_auto_production_defaults();
    $stored   = get_option( 'tvoe_auto_production', array() );
    $stored   = is_array( $stored ) ? $stored : array();
    $bot_token = isset( $input['telegram_bot_token'] ) ? sanitize_text_field( $input['telegram_bot_token'] ) : '';
    if ( empty( $input['telegram_clear_bot_token'] ) && '' === $bot_token ) {
        $bot_token = isset( $stored['telegram_bot_token'] ) ? sanitize_text_field( $stored['telegram_bot_token'] ) : '';
    }
    return array(
        'lead_email'       => sanitize_email( isset( $input['lead_email'] ) ? $input['lead_email'] : $defaults['lead_email'] ),
        'telegram_enabled' => empty( $input['telegram_enabled'] ) ? 0 : 1,
        'telegram_bot_token' => $bot_token,
        'telegram_chat_id' => preg_match( '/^-?\d+$/', isset( $input['telegram_chat_id'] ) ? trim( (string) $input['telegram_chat_id'] ) : '' ) ? trim( (string) $input['telegram_chat_id'] ) : '',
        'telegram_thread_id' => preg_match( '/^\d+$/', isset( $input['telegram_thread_id'] ) ? trim( (string) $input['telegram_thread_id'] ) : '' ) ? trim( (string) $input['telegram_thread_id'] ) : '',
        'telegram_invite_url' => esc_url_raw( isset( $input['telegram_invite_url'] ) ? $input['telegram_invite_url'] : $defaults['telegram_invite_url'] ),
        'retention_days'   => max( 1, min( 3650, absint( isset( $input['retention_days'] ) ? $input['retention_days'] : $defaults['retention_days'] ) ) ),
        'hosting_name'     => sanitize_text_field( isset( $input['hosting_name'] ) ? $input['hosting_name'] : '' ),
        'hosting_location' => sanitize_text_field( isset( $input['hosting_location'] ) ? $input['hosting_location'] : '' ),
        'processors'       => sanitize_textarea_field( isset( $input['processors'] ) ? $input['processors'] : $defaults['processors'] ),
        'server_logs'      => sanitize_textarea_field( isset( $input['server_logs'] ) ? $input['server_logs'] : $defaults['server_logs'] ),
        'legal_approved_at' => preg_match( '/^\d{4}-\d{2}-\d{2}$/', isset( $input['legal_approved_at'] ) ? (string) $input['legal_approved_at'] : '' ) ? $input['legal_approved_at'] : '',
        'legal_confirmed'  => empty( $input['legal_confirmed'] ) ? 0 : 1,
    );
}

function tvoe_auto_register_production_settings() {
    register_setting( 'tvoe_auto_production', 'tvoe_auto_production', array( 'sanitize_callback' => 'tvoe_auto_sanitize_production_options' ) );
}
add_action( 'admin_init', 'tvoe_auto_register_production_settings' );

function tvoe_auto_add_production_page() {
    add_options_page( 'Твоё Авто — продакшен', 'Твоё Авто — продакшен', 'manage_options', 'tvoe-auto-production', 'tvoe_auto_render_production_page' );
}
add_action( 'admin_menu', 'tvoe_auto_add_production_page' );

function tvoe_auto_production_checks() {
    $options = tvoe_auto_production_options();
    $telegram_token = defined( 'TVOE_AUTO_TELEGRAM_BOT_TOKEN' ) ? (string) TVOE_AUTO_TELEGRAM_BOT_TOKEN : (string) $options['telegram_bot_token'];
    $telegram_chat  = defined( 'TVOE_AUTO_TELEGRAM_CHAT_ID' ) ? (string) TVOE_AUTO_TELEGRAM_CHAT_ID : (string) $options['telegram_chat_id'];
    $demo_count = tvoe_auto_catalog_placeholder_count();
    $car_count  = (int) wp_count_posts( 'auto_car' )->publish;
    return array(
        array( is_ssl(), 'HTTPS активен', 'На локальном сайте HTTP допустим; на боевом домене обязателен HTTPS.' ),
        array( '1' === (string) get_option( 'blog_public', '1' ), 'Индексация WordPress разрешена', 'Проверьте «Настройки → Чтение».' ),
        array( (bool) get_option( 'site_icon' ), 'Загружена иконка сайта', 'Загрузите квадратную иконку в настройках WordPress.' ),
        array( false !== strpos( (string) get_option( 'permalink_structure', '' ), '%' ), 'Включены постоянные ссылки', 'Выберите не вариант «Простые».' ),
        array( is_email( $options['lead_email'] ), 'Указан email для заявок', 'На этот адрес WordPress отправляет уведомления.' ),
        array( empty( $options['telegram_enabled'] ) || ( '' !== $telegram_token && '' !== $telegram_chat ), 'Настроена доставка в Telegram', 'Ссылка-приглашение не заменяет Bot Token и числовой Chat ID.' ),
        array( '' !== $options['hosting_name'] && '' !== $options['hosting_location'], 'Указаны хостинг и размещение базы', 'Данные автоматически попадут в Политику.' ),
        array( '' !== $options['legal_approved_at'], 'Указана дата утверждения документов', 'Укажите дату, когда владелец утвердил Политику и согласие.' ),
        array( $car_count > 0 && 0 === $demo_count, 'Стартовые автомобили заменены', 'Откройте каждую стартовую карточку, замените данные, фото и условия на фактические или удалите её.' ),
        array( ! empty( $options['legal_confirmed'] ), 'Реквизиты и тексты проверены владельцем', 'До подтверждения тема безопасно добавляет noindex.' ),
    );
}

function tvoe_auto_is_legally_ready() {
    $options = tvoe_auto_production_options();
    $demo_count = tvoe_auto_catalog_placeholder_count();
    $car_count  = (int) wp_count_posts( 'auto_car' )->publish;
    return ! empty( $options['legal_confirmed'] ) && '' !== $options['legal_approved_at'] && '' !== $options['hosting_name'] && '' !== $options['hosting_location'] && $car_count > 0 && 0 === $demo_count;
}

function tvoe_auto_catalog_placeholder_count() {
    $query = new WP_Query(
        array(
            'post_type'      => 'auto_car',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            'meta_query'     => array(
                'relation' => 'OR',
                array( 'key' => '_tvoe_auto_demo', 'value' => '1' ),
                array( 'key' => '_tvoe_auto_initial', 'value' => '1' ),
            ),
        )
    );
    return (int) $query->found_posts;
}

function tvoe_auto_render_production_page() {
    $options = tvoe_auto_production_options();
    $telegram_test = isset( $_GET['telegram-test'] ) ? sanitize_key( wp_unslash( $_GET['telegram-test'] ) ) : '';
    $telegram_test_error = 'failed' === $telegram_test ? get_transient( 'tvoe_auto_telegram_test_' . get_current_user_id() ) : '';
    if ( $telegram_test_error ) {
        delete_transient( 'tvoe_auto_telegram_test_' . get_current_user_id() );
    }
    ?>
    <div class="wrap"><h1>Твоё Авто — подготовка к публикации</h1>
    <?php if ( 'sent' === $telegram_test ) : ?><div class="notice notice-success inline"><p>Тестовое сообщение отправлено в Telegram.</p></div><?php endif; ?>
    <?php if ( 'failed' === $telegram_test ) : ?><div class="notice notice-error inline"><p>Telegram не подтвердил доставку. Проверьте Bot Token, Chat ID и права бота.<?php echo $telegram_test_error ? ' Ошибка: ' . esc_html( $telegram_test_error ) : ''; ?></p></div><?php endif; ?>
    <h2>Проверка готовности</h2><table class="widefat striped" style="max-width:960px"><tbody>
    <?php foreach ( tvoe_auto_production_checks() as $check ) : ?><tr><td style="width:32px;font-size:20px"><?php echo $check[0] ? '✅' : '⚠️'; ?></td><td><strong><?php echo esc_html( $check[1] ); ?></strong><br><span><?php echo esc_html( $check[2] ); ?></span></td></tr><?php endforeach; ?>
    </tbody></table>
    <form method="post" action="options.php" style="max-width:960px;margin-top:28px"><?php settings_fields( 'tvoe_auto_production' ); ?>
    <table class="form-table"><tr><th><label for="lead-email">Email для заявок</label></th><td><input class="regular-text" id="lead-email" type="email" name="tvoe_auto_production[lead_email]" value="<?php echo esc_attr( $options['lead_email'] ); ?>" required><p class="description">Каждая новая заявка отправляется на этот адрес через wp_mail().</p></td></tr>
    <tr><th>Telegram</th><td><label><input type="checkbox" name="tvoe_auto_production[telegram_enabled]" value="1" <?php checked( $options['telegram_enabled'], 1 ); ?>> Отправлять новые заявки в Telegram</label></td></tr>
    <tr><th><label for="telegram-invite-url">Ссылка на группу</label></th><td><input class="regular-text" id="telegram-invite-url" type="url" name="tvoe_auto_production[telegram_invite_url]" value="<?php echo esc_attr( $options['telegram_invite_url'] ); ?>"><p class="description">Справочная ссылка для администратора. Telegram Bot API не принимает заявки по ссылке-приглашению.</p></td></tr>
    <tr><th><label for="telegram-bot-token">Bot Token</label></th><td><input class="regular-text" id="telegram-bot-token" type="password" name="tvoe_auto_production[telegram_bot_token]" value="" autocomplete="new-password" placeholder="Оставьте пустым, чтобы не менять"><p class="description"><?php echo defined( 'TVOE_AUTO_TELEGRAM_BOT_TOKEN' ) ? 'Используется константа TVOE_AUTO_TELEGRAM_BOT_TOKEN из wp-config.php.' : 'Создайте бота через @BotFather и добавьте его в группу. Безопаснее задать TVOE_AUTO_TELEGRAM_BOT_TOKEN в wp-config.php.'; ?></p><?php if ( ! defined( 'TVOE_AUTO_TELEGRAM_BOT_TOKEN' ) && ! empty( $options['telegram_bot_token'] ) ) : ?><label><input type="checkbox" name="tvoe_auto_production[telegram_clear_bot_token]" value="1"> Удалить сохранённый Bot Token</label><?php endif; ?></td></tr>
    <tr><th><label for="telegram-chat-id">Chat ID</label></th><td><input class="regular-text" id="telegram-chat-id" type="text" inputmode="numeric" name="tvoe_auto_production[telegram_chat_id]" value="<?php echo esc_attr( $options['telegram_chat_id'] ); ?>" placeholder="Например: -1001234567890"><p class="description"><?php echo defined( 'TVOE_AUTO_TELEGRAM_CHAT_ID' ) ? 'Используется константа TVOE_AUTO_TELEGRAM_CHAT_ID из wp-config.php.' : 'Нужен числовой ID группы, а не ссылка t.me.'; ?></p></td></tr>
    <tr><th><label for="telegram-thread-id">Message Thread ID</label></th><td><input id="telegram-thread-id" type="text" inputmode="numeric" name="tvoe_auto_production[telegram_thread_id]" value="<?php echo esc_attr( $options['telegram_thread_id'] ); ?>"><p class="description">Необязательно. Заполните, если заявки должны попадать в конкретную тему Telegram-группы.</p></td></tr>
    <tr><th><label for="retention-days">Срок хранения заявок</label></th><td><input id="retention-days" type="number" min="1" max="3650" name="tvoe_auto_production[retention_days]" value="<?php echo esc_attr( (string) $options['retention_days'] ); ?>"> дней</td></tr>
    <tr><th><label for="hosting-name">Хостинг</label></th><td><input class="regular-text" id="hosting-name" type="text" name="tvoe_auto_production[hosting_name]" value="<?php echo esc_attr( $options['hosting_name'] ); ?>" placeholder="Юридическое наименование провайдера"></td></tr>
    <tr><th><label for="hosting-location">Размещение сервера и базы</label></th><td><input class="regular-text" id="hosting-location" type="text" name="tvoe_auto_production[hosting_location]" value="<?php echo esc_attr( $options['hosting_location'] ); ?>" placeholder="Россия, город/регион"></td></tr>
    <tr><th><label for="processors">Обработчики и получатели</label></th><td><textarea class="large-text" rows="4" id="processors" name="tvoe_auto_production[processors]"><?php echo esc_textarea( $options['processors'] ); ?></textarea></td></tr>
    <tr><th><label for="server-logs">Состав технических журналов</label></th><td><textarea class="large-text" rows="4" id="server-logs" name="tvoe_auto_production[server_logs]"><?php echo esc_textarea( $options['server_logs'] ); ?></textarea></td></tr>
    <tr><th><label for="legal-approved-at">Дата утверждения документов</label></th><td><input id="legal-approved-at" type="date" name="tvoe_auto_production[legal_approved_at]" value="<?php echo esc_attr( $options['legal_approved_at'] ); ?>"><p class="description">Укажите фактическую дату, когда владелец утвердил Политику и согласие. Это не дата технической правки.</p></td></tr>
    <tr><th>Подтверждение</th><td><label><input type="checkbox" name="tvoe_auto_production[legal_confirmed]" value="1" <?php checked( $options['legal_confirmed'], 1 ); ?>> Я проверил(а) реквизиты, хостинг, срок хранения и перечень обработчиков.</label></td></tr></table><?php submit_button( 'Сохранить продакшен-настройки' ); ?></form>
    <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" style="margin-top:8px"><input type="hidden" name="action" value="tvoe_auto_test_telegram"><?php wp_nonce_field( 'tvoe_auto_test_telegram' ); ?><?php submit_button( 'Отправить тест в Telegram', 'secondary', 'submit', false ); ?></form></div>
    <?php
}

function tvoe_auto_test_telegram() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'Недостаточно прав.', 'tvoe-auto-siberia' ) );
    }
    check_admin_referer( 'tvoe_auto_test_telegram' );

    $result = tvoe_auto_send_telegram_lead( "Тестовое сообщение — Твоё Авто\nДата: " . current_time( 'd.m.Y H:i' ) );
    $status = 'sent' === $result['status'] ? 'sent' : 'failed';
    if ( 'failed' === $status ) {
        set_transient( 'tvoe_auto_telegram_test_' . get_current_user_id(), $result['error'], 2 * MINUTE_IN_SECONDS );
    }
    wp_safe_redirect( add_query_arg( 'telegram-test', $status, admin_url( 'options-general.php?page=tvoe-auto-production' ) ) );
    exit;
}
add_action( 'admin_post_tvoe_auto_test_telegram', 'tvoe_auto_test_telegram' );

function tvoe_auto_production_robots_guard( $robots ) {
    if ( ! tvoe_auto_is_legally_ready() ) {
        unset( $robots['index'] );
        $robots['noindex'] = true;
    }
    return $robots;
}
add_filter( 'wp_robots', 'tvoe_auto_production_robots_guard', 99 );

function tvoe_auto_production_admin_notice() {
    if ( ! current_user_can( 'manage_options' ) || tvoe_auto_is_legally_ready() ) {
        return;
    }
    $url = admin_url( 'options-general.php?page=tvoe-auto-production' );
    echo '<div class="notice notice-warning"><p><strong>Твоё Авто:</strong> публикация защищена noindex, пока не заполнены продакшен-данные, не подтверждены юридические тексты или не заменены демо-автомобили. <a href="' . esc_url( $url ) . '">Открыть экран готовности</a>.</p></div>';
}
add_action( 'admin_notices', 'tvoe_auto_production_admin_notice' );

function tvoe_auto_security_headers() {
    if ( headers_sent() ) {
        return;
    }
    header( 'X-Content-Type-Options: nosniff' );
    header( 'Referrer-Policy: strict-origin-when-cross-origin' );
    header( 'Permissions-Policy: camera=(), microphone=(), geolocation=()' );
}
add_action( 'send_headers', 'tvoe_auto_security_headers' );

add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function tvoe_auto_run_theme_upgrade() {
    $installed_version = (string) get_option( 'tvoe_auto_installed_version', '0' );
    if ( TVOE_AUTO_THEME_VERSION === $installed_version ) {
        return;
    }
    if ( version_compare( $installed_version, '1.4.0', '<' ) ) {
        $options               = tvoe_auto_production_options();
        $options['lead_email'] = 'Zaur.guliew@yandex.ru';
        $options['telegram_enabled'] = 1;
        $options['telegram_invite_url'] = 'https://t.me/+FRyhyk8Q39M5NzMy';
        update_option( 'tvoe_auto_production', $options );
    }
    if ( function_exists( 'tvoe_auto_install_pages' ) ) {
        tvoe_auto_install_pages();
    }
    if ( function_exists( 'tvoe_auto_schedule_cleanup' ) ) {
        tvoe_auto_schedule_cleanup();
    }
    flush_rewrite_rules( false );
    update_option( 'tvoe_auto_installed_version', TVOE_AUTO_THEME_VERSION );
}
add_action( 'admin_init', 'tvoe_auto_run_theme_upgrade', 20 );
