<?php
/**
 * Plugin name: My Snow Monkey
 * Description: このプラグインに、あなたの Snow Monkey 用カスタマイズコードを書いてください。
 * Version: 0.2.1
 *
 * @package my-snow-monkey
 * @author contiki9
 * @license GPL-2.0+
 */

/**
 * Snow Monkey 以外のテーマを利用している場合は有効化してもカスタマイズが反映されないようにする
 */
$theme = wp_get_theme( get_template() );
if ( 'snow-monkey' !== $theme->template && 'snow-monkey/resources' !== $theme->template ) {
	return;
}

/**
 * Directory url of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Directory path of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

/* CSSの読み込み
---------------------------------------------------------- */
function register_stylesheet() { //読み込むCSSを登録する

	// 既存のSnow MonkeyのCSSと重複しないように削除
	wp_dequeue_style('snow-monkey');
	wp_deregister_style('snow-monkey');

	// My Snow Monkeyで作成されるSCSS
	wp_enqueue_style('origin-style', plugins_url('/dist/css/style.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'register_stylesheet',100);
