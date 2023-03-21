<?php

define("COMPANY_NAME", "");
define("MAIL_RESEND", "");

add_theme_support('post-thumbnails');
set_post_thumbnail_size(300, 300);
add_post_type_support('page', 'excerpt');

// Подключение стилей и nonce для Ajax и скриптов во фронтенд 
add_action('wp_enqueue_scripts', 'my_assets');
function my_assets()
{

	// Подключение стилей 

	$style_version = "1.0.1";
	$scrypt_version = "1.0.1";

	wp_enqueue_style("null-css", get_template_directory_uri() . "/css/null.css", array(), $style_version, 'all'); 
	wp_enqueue_style("fonts-css", get_template_directory_uri() . "/css/fonts.css", array(), $style_version, 'all'); 
	wp_enqueue_style("main-css", get_template_directory_uri() . "/css/main.css", array(), $style_version, 'all'); 
	wp_enqueue_style("main-style", get_stylesheet_uri(), array(), $style_version, 'all');

	// Подключение скриптов

	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), $scrypt_version, true);


	wp_localize_script('main', 'allAjax', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'nonce'   => wp_create_nonce('NEHERTUTLAZIT')
	));
}


//-----Блок описания вывода меню

add_action( 'after_setup_theme', function(){
	register_nav_menus( [
		'menu-1' => 'Меню Товары',
		'menu-2' => 'Меню Сотрудничество',
		'menu-3' => 'Меню Доставка',
	] );
} ); 

// Заготовка для вызова ajax
add_action('wp_ajax_aj_fnc', 'aj_fnc');
add_action('wp_ajax_nopriv_aj_fnc', 'aj_fnc');

function aj_fnc()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}