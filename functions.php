<?php
/**
 * NobleVenus functions and definitions
 *
 * @package WordPress
 * @subpackage NobleVenus
 * @since NobleVenus 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since NobleVenus 1.0
 */

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
// add_theme_support( 'menus' );--!

/**
 * タイトル区切り文字変更
 *
 * @param [string] $separator !値は文字列.
 */
function my_document_title_separator( $separator ) {
	$separator = '|';
	return $separator;
}
add_filter( 'document_title_separator', 'my_document_title_separator' );

/**
 * タイトルの絶対値
 *
 * @param [string] $title !値は文字列.
 */
function my_document_title_parts( $title ) {
	if ( is_home() ) {
		unset( $title['tagline'] );
		$title['title'] = 'Noble Venusはレッスンも受けられる女性限定のケアサロンです。';
	}
	return $title;
}
add_filter( 'document_title_parts', 'my_document_title_parts' );

// プラグインインストールでFTP接続画面が表示される場合の対処--!
define( 'FS_METHOD', 'direct' );

/**
 * Undocumented function
 *
 * @return void
 */
function my_wpautop() {
	if ( is_page( 'contact' ) ) {
		remove_filter( 'the_content', 'wpautop' );
	}
}
add_action( 'wp', 'my_wpautop' );

/**
 * Undocumented function
 *
 * @return void
 */
function my_editor_suport() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'my_editor_suport' );

/**
 * Undocumented function
 *
 * @return void
 */
function register_my_menus() {
	register_nav_menus(
		array(
			'main-menu'   => 'Main Menu',
			'footer-menu' => 'Footer Menu',
			'spbtm-menu'  => 'SP Bottom Menu',
		)
	);
}
add_action( 'after_setup_theme', 'register_my_menus' );

// ダッシュボードウィジットのカスタマイズ--!
/**
 * Undocumented function
 *
 * @return void
 */
function wpqw_remove_dashboard_widget() {
	if ( ! current_user_can( 'administrator' ) ) {
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	}
}
add_action( 'wp_dashboard_setup', 'wpqw_remove_dashboard_widget' );

// ダッシュボードサイドメニューのカスタマイズ--!
/**
 * Undocumented function
 *
 * @return void
 */
function remove_menus() {
	if ( ! current_user_can( 'administrator' ) ) {
		remove_menu_page( 'wpcf7' ); // Contact Form 7--!
		// remove_menu_page( 'upload.php' ); //                メディア--!
		remove_menu_page( 'edit-comments.php' );// コメント--!
		remove_menu_page( 'themes.php' ); // 外観--!
		remove_menu_page( 'users.php' ); // ユーザー--!
		remove_menu_page( 'profile.php' ); // プロフィール--!
		remove_menu_page( 'tools.php' ); // ツール--!
	}
}
add_action( 'admin_menu', 'remove_menus' );

// WordPressダッシュボードのフッターテキストを変更する--!
/**
 * Undocumented function
 *
 * @return void
 */
function custom_admin_footer() {
	echo 'いつもありがとうございます。<a href="https://www.chum9625.com/" target="_blank" rel="noopener">ChumTech</a>　=・ω・=';
}
add_filter( 'admin_footer_text', 'custom_admin_footer' );

/**
 * Undocumented function
 *
 * @return void
 */
function venus_10_scripts() {
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css', '', '1.0', false );
	wp_enqueue_style( 'venus-10-style-min', get_template_directory_uri() . './assets/css/styles.min.css', '', '1.0', false );
	wp_enqueue_style( 'venus-10-style', get_template_directory_uri() . './assets/css/styles.css', '', '1.0', false );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'venus-10-main', get_template_directory_uri() . './assets/js/main.js', '', '1.0', false );
}
add_action( 'wp_enqueue_scripts', 'venus_10_scripts' );
