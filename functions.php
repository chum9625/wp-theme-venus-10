<?php
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
// add_theme_support( 'menus' );

add_filter( 'document_title_separator', 'my_document_title_separator' );
function my_document_title_separator( $separator ) {
	$separator = '|';
	return $separator;
}

add_filter( 'document_title_parts', 'my_document_title_parts' );
function my_document_title_parts( $title ) {
	if ( is_home() ) {
		unset( $title['tagline'] );
		$title['title'] = 'Noble Vinusはレッスンも受けられる女性限定のケアサロンです。';
	}
	return $title;
}

// プラグインインストールでFTP接続画面が表示される場合の対処
define( 'FS_METHOD', 'direct' );

add_action( 'wp', 'my_wpautop' );
function my_wpautop() {
	if ( is_page( 'contact' ) ) {
		remove_filter( 'the_content', 'wpautop' );
	}
}

add_action( 'after_setup_theme' , 'my_editor_suport' );
function my_editor_suport() {
    add_theme_support( 'editor-styles' );
    add_editor_style('assets/css/editor-style.css');
}

add_action('after_setup_theme' , 'register_my_menus');
function register_my_menus() {
    register_nav_menus( array(
        'main-menu' => 'Main Menu',
        'footer-menu' => 'Footer Menu',
        'spbtm-menu' => 'SP Bottom Menu',
    ));
}

//　ダッシュボードウィジットのカスタマイズ
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

// ダッシュボードサイドメニューのカスタマイズ
function remove_menus () {
	if (!current_user_can('administrator')) {
		remove_menu_page('wpcf7'); //									Contact Form 7
//		remove_menu_page( 'upload.php' ); //				メディア
		remove_menu_page( 'edit-comments.php' );//	コメント
		remove_menu_page( 'themes.php' ); //				外観
		remove_menu_page( 'users.php' ); //					ユーザー
		remove_menu_page( 'profile.php' ); //				プロフィール
		remove_menu_page( 'tools.php' ); //					ツール
		}
	}
	add_action('admin_menu', 'remove_menus');

	// WordPressダッシュボードのフッターテキストを変更する
function custom_admin_footer() {
	echo 'いつもありがとうございます。<a href="https://www.chum9625.com/" target="_blank" rel="noopener">ChumTech</a>　=・ω・=';
}
add_filter('admin_footer_text', 'custom_admin_footer');
