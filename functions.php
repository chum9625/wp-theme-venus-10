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
		$title['title'] = 'Noble Vinusは女性のための会員制自律神経ケアサロンです。';
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
