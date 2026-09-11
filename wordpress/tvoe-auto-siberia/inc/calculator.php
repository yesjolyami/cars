<?php
/**
 * Editable calculation rule shared by the public calculators.
 *
 * @package Tvoe_Auto_Siberia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function tvoe_auto_calculator_default_formula() {
    return '(price - down) / term';
}

function tvoe_auto_calculator_sanitize_formula( $value ) {
    $formula = strtolower( trim( str_replace( ',', '.', (string) $value ) ) );

    /* Only arithmetic, parentheses and the three documented variables are allowed. */
    $is_valid = $formula
        && preg_match( '/^[0-9a-z\s+\-*\/().]+$/', $formula )
        && ! preg_match( '/\b(?!price\b|down\b|term\b)[a-z]+\b/', $formula );

    $balance = 0;
    if ( $is_valid ) {
        for ( $index = 0, $length = strlen( $formula ); $index < $length; $index++ ) {
            if ( '(' === $formula[ $index ] ) {
                $balance++;
            } elseif ( ')' === $formula[ $index ] ) {
                $balance--;
                if ( $balance < 0 ) {
                    $is_valid = false;
                    break;
                }
            }
        }
        $is_valid = $is_valid && 0 === $balance;
    }

    if ( ! $is_valid ) {
        add_settings_error( 'tvoe_auto_calculator', 'invalid_formula', 'Формула не сохранена: используйте только price, down, term, числа, скобки и знаки + − × ÷.', 'error' );
        return tvoe_auto_calculator_default_formula();
    }

    return $formula;
}

function tvoe_auto_calculator_formula() {
    $formula = get_option( 'tvoe_auto_calculator_formula', '' );
    return '' !== $formula ? $formula : tvoe_auto_calculator_default_formula();
}

function tvoe_auto_calculator_register_settings() {
    register_setting(
        'tvoe_auto_calculator',
        'tvoe_auto_calculator_formula',
        array( 'sanitize_callback' => 'tvoe_auto_calculator_sanitize_formula' )
    );
}
add_action( 'admin_init', 'tvoe_auto_calculator_register_settings' );

function tvoe_auto_calculator_admin_menu() {
    add_theme_page( 'Калькуляторы', 'Калькуляторы', 'edit_theme_options', 'tvoe-auto-calculators', 'tvoe_auto_calculator_render_page' );
}
add_action( 'admin_menu', 'tvoe_auto_calculator_admin_menu' );

function tvoe_auto_calculator_render_page() {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1>Калькуляторы</h1>
        <p>Одна формула используется в калькуляторе на главной странице и на странице «Рассрочка».</p>
        <?php settings_errors( 'tvoe_auto_calculator' ); ?>
        <form method="post" action="options.php">
            <?php settings_fields( 'tvoe_auto_calculator' ); ?>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="tvoe_auto_calculator_formula">Формула ежемесячного платежа</label></th>
                    <td>
                        <input class="large-text code" type="text" id="tvoe_auto_calculator_formula" name="tvoe_auto_calculator_formula" value="<?php echo esc_attr( tvoe_auto_calculator_formula() ); ?>" spellcheck="false">
                        <p class="description">Переменные: <code>price</code> — стоимость автомобиля, <code>down</code> — первоначальный взнос, <code>term</code> — срок в месяцах.</p>
                        <p class="description">Допустимы числа, скобки и знаки <code>+ - * /</code>. Пример стандартной формулы: <code>(price - down) / term</code>. Результат ниже нуля показывается как 0 ₽.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button( 'Сохранить формулу' ); ?>
        </form>
    </div>
    <?php
}
