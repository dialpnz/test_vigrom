<?php
/**
 * WP Bootstrap 4 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_4
 */

if ( ! function_exists( 'wp_bootstrap_4_setup' ) ) :
	function wp_bootstrap_4_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'wp-bootstrap-4', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Enable Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'status', 'quote', 'link' ) );

		// Enable support for woocommerce.
		add_theme_support( 'woocommerce' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wp-bootstrap-4' ),
		) );

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wp_bootstrap_4_custom_background_args', array(
			'default-color' => 'f8f9fa',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wp_bootstrap_4_setup' );




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_4_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_bootstrap_4_content_width', 800 );
}
add_action( 'after_setup_theme', 'wp_bootstrap_4_content_width', 0 );




/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_4_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp-bootstrap-4' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-4' ),
		'before_widget' => '<section id="%1$s" class="widget border-bottom %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'wp-bootstrap-4' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-4' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'wp-bootstrap-4' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-4' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'wp-bootstrap-4' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-4' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'wp-bootstrap-4' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-4' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'wp_bootstrap_4_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_4_scripts() {
	wp_enqueue_style( 'open-iconic-bootstrap', get_template_directory_uri() . '/assets/css/open-iconic-bootstrap.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'bootstrap-4', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'wp-bootstrap-4-style', get_stylesheet_uri(), array(), '1.0.2', 'all' );

	wp_enqueue_script( 'bootstrap-4-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), 'v4.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_4_scripts' );


/**
 * Registers an editor stylesheet for the theme.
 */
function wp_bootstrap_4_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'wp_bootstrap_4_add_editor_styles' );


// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Implement the Custom Comment feature.
require get_template_directory() . '/inc/custom-comment.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Custom Navbar
require get_template_directory() . '/inc/custom-navbar.php';

// Customizer additions.
require get_template_directory() . '/inc/tgmpa/tgmpa-init.php';

// Use Kirki for customizer API
require get_template_directory() . '/inc/theme-options/add-settings.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load WooCommerce compatibility file.
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
add_action('wp_print_scripts','include_scripts'); // действие в котором прикрепим необходимые js скрипты и передадим данные 
function include_scripts(){
        wp_enqueue_script('jquery'); // добавим основную библиотеку jQuery
        wp_enqueue_script('jquery-form'); // добавим плагин jQuery forms, встроен в WP
        wp_enqueue_script('jquery-chained', '//www.appelsiini.net/projects/chained/jquery.chained.min.js'); // добавим плагин для связанных селект листов

        wp_localize_script( 'jquery', 'ajaxdata', // функция для передачи глобальных js переменных на страницу, первый аргумент означет перед каким скриптом вставить переменные, второй это название глобального js объекта в котором эти переменные будут храниться, последний аргумент это массив с самими переменными
			array( 
   				'url' => admin_url('admin-ajax.php'), // передадим путь до нативного обработчика аякс запросов в wp, в js можно будет обратиться к ней так: ajaxdata.url
   				'nonce' => wp_create_nonce('add_object') // передадим уникальную строку для механизма проверки аякс запроса, ajaxdata.nonce
			)
		);
}
add_action( 'wp_ajax_nopriv_add_object_ajax', 'add_object' ); // крепим на событие wp_ajax_nopriv_add_object_ajax, где add_object_ajax это параметр action, который мы добавили в перехвате отправки формы, add_object - ф-я которую надо запустить
add_action('wp_ajax_add_object_ajax', 'add_object'); // если нужно чтобы вся бадяга работала для админов
function add_object() {
	$errors = ''; // сначала ошибок нет

	$nonce = $_POST['nonce']; // берем переданную формой строку проверки
	if (!wp_verify_nonce($nonce, 'add_object')) { // проверяем nonce код, второй параметр это аргумент из wp_create_nonce
		$errors .= 'Данные отправлены с левой страницы '; // пишим ошибку
	}

	// запишем все поля
	$parent_cat = (int)$_POST['parent_cats']; // id города
	$child_cat = (int)$_POST['child_cats']; // id типа недвижки
//	$tag = (int)$_POST['tag']; // id обычной таксономии
	$title = strip_tags($_POST['post_title']); // запишем название поста
	$post_price = strip_tags($_POST['post_price']); // запишем цену
	$post_area = strip_tags($_POST['post_area']); // запишем площадь
	$post_livingarea = strip_tags($_POST['post_livingarea']); // запишем жилую площадь
	$post_address = strip_tags($_POST['post_address']); // запишем адрес
	$post_floor = strip_tags($_POST['post_floor']); // запишем адрес
	$content = wp_kses_post($_POST['post_content']); // контент
//	$string_field = strip_tags($_POST['string_field']); // произвольное поле типа строка
//	$text_field = wp_kses_post($_POST['text_field']); // произвольное поле типа текстарея

	// проверим заполненность, если пусто добавим в $errors строку
	if (!$parent_cat) $errors .= 'Не выбран город';
    if (!$child_cat) $errors .= 'Не выбран тип недвижимости';				    
    //if (!$tag) $errors .= 'Не выбрано "Кастом тэг"';
    if (!$title) $errors .= 'Не заполнено поле "Заголовок"';
    if (!$content) $errors .= 'Не заполнено поле "Описание"';

    // далее проверим все ли нормально с картинками которые нам отправили
    if ($_FILES['img']) { // если была передана миниатюра
   		if ($_FILES['img']['error']) $errors .= "Ошибка загрузки: " . $_FILES['img']['error'].". (".$_FILES['img']['name'].") "; // серверная ошибка загрузки
    	$type = $_FILES['img']['type']; 
		if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/png")) $errors .= "Формат файла может быть только jpg или png. (".$_FILES['img']['name'].")"; // неверный формат
	}

	if ($_FILES['imgs']) { // если были переданны дополнительные картинки, пробежимся по ним в цикле и проверим тоже самое
		foreach ($_FILES['imgs']['name'] as $key => $array) {
			if ($_FILES['imgs']['error'][$key]) $errors .= "Ошибка загрузки: " . $_FILES['imgs']['error'][$key].". (".$key.$_FILES['imgs']['name'][$key].") ";
    		$type = $_FILES['imgs']['type'][$key]; 
			if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/png")) $errors .= "Формат файла может быть только jpg или png. (".$_FILES['imgs']['name'][$key].")"; 
		}
	}  

	if (!$errors) { // если с полями все ок, значит можем добавлять пост
	
			if ($_FILES['imgs']) { // если дополнительные фото были загружены
			$imgs = array(); // из-за того, что дефолтный массив с загруженными файлами в пхп выглядит не так как нужно, а именно вся инфа о файлах лежит в разных массивах но с одинаковыми ключами, нам нужно создать свой массив с блэкджеком, где у каждого файла будет свой массив со всеми данными
			$testa = 0;
			foreach ($_FILES['imgs']['name'] as $key => $array) { // пробежим по массиву с именами загруженных файлов
				$file = array( // пишем новый массив
					'name' => $_FILES['imgs']['name'][$key],
					'type' => $_FILES['imgs']['type'][$key], 
					'tmp_name' => $_FILES['imgs']['tmp_name'][$key], 
					'error' => $_FILES['imgs']['error'][$key],
					'size' => $_FILES['imgs']['size'][$key]
				);
				$_FILES['imgs'.$key] = $file; // записываем новый массив с данными в глобальный массив с файлами
				$imgss = media_handle_upload( 'imgs'.$key, $post_id ); // добавляем текущий файл в медиабиблиотека, а id картинки суем в другой массив
				if($testa > 0){$imgsss.= ","; }
				$testa++;
				$imgsss.= $imgss;
				$imgs[] = $imgss; // добавляем текущий файл в медиабиблиотека, а id картинки суем в другой массив
			}
			update_post_meta($post_id,'multifile_field',$imgs); // привязываем все картинки к посту
			$fieldss = array( 
					'id'   => $post_id,
					'ids'   => "$imgsss",
				);
			//gallery_shortcode( $fieldss );
			$temp_ids = '
			<!-- wp:shortcode -->
			[gallery ids="'.$imgsss.'" link="file" size="medium" itemtag="div"]
			<!-- /wp:shortcode -->';
			//$temp_ids = do_shortcode($temp_ids);
			$temp_ids = $content." ".$temp_ids;
			
		} 
	
	
		$fields = array( // подготовим массив с полями поста, ключ это название поля, значение - его значение
		//	'post_type' => 'post', // нужно указать какой тип постов добавляем
			'post_status'   => 'publish',
			'post_category' => array( $parent_cat, $child_cat),
			'comment_status' => 'closed',  
	    	'post_title'   => $title, // заголовок поста
	        'post_content' => $temp_ids, // контент
	    );
	    $post_id = wp_insert_post($fields); // добавляем пост в базу и получаем его id

//	    update_post_meta($post_id, 'string_field', $string_field); // заполняем произвольное поле типа строка
//	    update_post_meta($post_id, 'text_field', $text_field); // заполняем произвольное поле типа текстарея
	    update_post_meta($post_id, 'post_price', $post_price); // заполняем произвольное поле типа строка
	    update_post_meta($post_id, 'post_area', $post_area); // заполняем произвольное поле типа строка
	    update_post_meta($post_id, 'post_livingarea', $post_livingarea); // заполняем произвольное поле типа строка
	    update_post_meta($post_id, 'post_address', $post_address); // заполняем произвольное поле типа строка
	    update_post_meta($post_id, 'post_floor', $post_floor); // заполняем произвольное поле типа строка

	    //wp_set_object_terms($post_id, $parent_cat, 'category', true); // привязываем к пост к таксономиям
	   // wp_set_object_terms($post_id, $child_cat, 'category', true);
	   // wp_set_object_terms($post_id, $tag, 'custom_tax_like_tag', true);

	    if ($_FILES['img']) { // если основное фото было загружено
   			$attach_id_img = media_handle_upload( 'img', $post_id ); // добавляем картинку в медиабиблиотеку и получаем её id
   			update_post_meta($post_id,'_thumbnail_id',$attach_id_img); // привязываем миниатюру к посту
		}

 
	}

	if ($errors) wp_send_json_error($errors); // если были ошибки, выводим ответ в формате json с success = false и умираем
	//else wp_send_json_success('Все прошло отлично! Добавлено ID:'.$post_id); // если все ок, выводим ответ в формате json с success = true и умираем
	else wp_send_json_success('Успешно добавлено!'); // если все ок, выводим ответ в формате json с success = true и умираем
	
	die(); // умрем еще раз на всяк случ
}