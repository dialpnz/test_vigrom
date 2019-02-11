<?php

if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
}
else {
    if ( ! is_page_template() ) {
        get_header();

        get_template_part( 'template-parts/front-page/cover' );
        get_template_part( 'template-parts/front-page/services' );

        ?>

        <?php if ( get_theme_mod( 'show_main_content', 1 ) ) : ?>
        <section class="wp-bp-main-content">
            <div class="container">
                <div class="row justify-content-center">
                     <div class="col-md-12">
					 <h2>Последние добавленные объекты недвижимости</h2>
					 </div>
					
					 
					<?php
					
					
					
						$args = array(
							'posts_per_page' => 4,
							'orderby' => 'id',
							'order' => 'DESC',
							
						 );
						 query_posts($args);
						 while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога ?> 
						 <div class="col-md-6 ">


<article id="post-<?php the_ID(); ?>" <?php post_class( 'card mt-3r' ); ?>>
	<div class="card-body">

		<?php if ( is_sticky() ) : ?>
			<span class="oi oi-bookmark wp-bp-sticky text-muted" title="<?php echo esc_attr__( 'Sticky Post', 'wp-bootstrap-4' ); ?>"></span>
		<?php endif; ?>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title card-title h2">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title card-title h3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="text-dark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta text-muted">
				<?php wp_bootstrap_4_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<?php wp_bootstrap_4_post_thumbnail(); ?>

		
			<div class="entry-summary">
				<?php 
					//the_meta();
					$custom_fields = get_post_custom();
					echo "<b>Цена:</b> ". $custom_fields['post_price'][0];
					echo "<br><b>Общая площадь:</b> ". $custom_fields['post_area'][0];
					echo "<br><b>Жилая площадь:</b> ". $custom_fields['post_livingarea'][0];
					echo "<br><b>Адрес:</b> ". $custom_fields['post_address'][0];
					echo "<br><b>Этаж:</b> ". $custom_fields['post_floor'][0];
				?><br><br>
				<div class="">
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-info btn-sm"><?php esc_html_e( 'Подробнее', 'wp-bootstrap-4' ); ?> <small class="oi oi-chevron-right ml-1"></small></a>
				</div>
			</div><!-- .entry-summary -->
	
	</div>
	<!-- /.card-body -->

	<?php if ( 'post' === get_post_type() ) : ?>
		<footer class="entry-footer card-footer text-muted">
			<?php wp_bootstrap_4_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
</div>
						 <?php  
						 endwhile;  // завершаем цикл. endif; /* Сбрасываем настройки цикла. Если ниже по коду будет идти еще один цикл, чтобы не было сбоя. */ wp_reset_query();        
						?>
 <div class="col-md-12">
 <h2>Города</h2><h3>
 <?php 
 $args = array(
	'child_of'    		 => '9',
	'orderby'            => 'name',
	'order'              => 'desc',
	'style'              => 'none',
	'show_count'         => 1,
	'hide_empty'         => 0,
	'use_desc_for_title' => 1,
	'exclude_tree'       => 7,
	'hierarchical'       => 1,
	'echo'               => 1,
	'depth'              => 0
);
 
wp_list_categories($args);
 ?></h3>
 </div>
<div class="col-md-12">					
					<?php
// подготовим актуальные данные таксономий
$cats = get_terms('category', 'orderby=name&hide_empty=0&parent=9'); // получим все термины(элементы) таксономии с иерархией
foreach ($cats as $cat) { // пробежим по каждому полученному термину
    $parents.="<option value='$cat->term_id' />$cat->name</option>"; // суем id и название термина в строку для вывода внутри тэга select
    
}
// подготовим актуальные данные таксономий
$cats = get_terms('category', 'orderby=name&hide_empty=0&parent=2'); // получим все термины(элементы) таксономии с иерархией
foreach ($cats as $cat) { // пробежим по каждому полученному термину
    $childs.="<option value='$cat->term_id' />$cat->name</option>"; // суем id и название термина в строку для вывода внутри тэга select
    
}

?>
<?php // Выводим форму ?>
<form method="post" enctype="multipart/form-data" id="add_object">
	<label>Город*:
		<select id="parent_cats" name="parent_cats" required>
			<option value="">Не выбрано</option>
			<?php echo $parents; // выводим все города термины ?>
		</select>
	</label><br>

	<label>Тип недвимжимости*:
		<select id="child_cats" name="child_cats" required>
			<option value="">Не выбрано</option>
			<?php echo $childs; // выводим все типы недвижимости ?>
		</select>
	</label><br>

	
	<label>Заголовок*:<br> <input type="text" name="post_title" required/></label><br>
	<label>Описание*:<br> <textarea name="post_content" required/></textarea></label><br>
	<label>Стоимость:<br> <input type="text" name="post_price" required/></label><br>
	<label>Площадь:<br> <input type="text" name="post_area"/></label><br>
	<label>Жилая площадь:<br> <input type="text" name="post_livingarea"/></label><br>
	<label>Адрес:<br> <input type="text" name="post_address"/></label><br>
	<label>Этаж:<br> <input type="text" name="post_floor"/></label><br>
	<label>Миниатюра:<br> <input type="file" name="img"/></label><br>
	<label id="first_img" class='imgs'>Дополнительные фото:<br> <input type='file' name='imgs[]'/></label><br>
	<a href="#" id="add_img" class="btn btn-info btn-sm">Добавить еще фото</a><br><br>
	<input type="submit" name="button" value="Отправить" id="sub"/><br>
	<div id="output"></div> <?php // сюда будем выводить ответ ?>
	</form>			
					
                       
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
<script>
function ajax_go(data, jqForm, options) { //ф-я перед отправкой запроса
  	jQuery('#output').html('Отправляем...'); // в див для ответа напишем "отправляем.."
  	jQuery('#sub').attr("disabled", "disabled"); // кнопку выключим
}
function response_go(out)  { // ф-я обработки ответа от wp, в out будет элемент success(bool), который зависит от ф-и вывода которую мы использовали в обработке(wp_send_json_error() или wp_send_json_success()), и элемент data в котором будет все что мы передали аргументом к ф-и wp_send_json_success() или wp_send_json_error()
	console.log(out); // для дебага
	jQuery('#sub').prop("disabled", false); // кнопку включим
	jQuery('#output').html(out.data); // выведем результат
}
jQuery(document).ready(function(){ // после загрузки страницы
	
  	add_form = jQuery('#add_object'); // запишем форму в переменную
  	var options = { // опции для отправки формы с помощью jquery form
  		data: { // дополнительные параметры для отправки вместе с данными формы
  			action : 'add_object_ajax', // этот параметр будет указывать wp какой экшн запустить, у нас это wp_ajax_nopriv_add_object_ajax
        	nonce: ajaxdata.nonce // строка для проверки, что форма отправлена откуда надо
    	},
      	dataType:  'json', // ответ ждем в json формате
      	beforeSubmit: ajax_go, // перед отправкой вызовем функцию ajax_go()
      	success: response_go, // после получении ответа вызовем response_go()
      	error: function(request, status, error) { // в случае ошибки
        	console.log(arguments); // напишем все в консоль
      	},
      	url: ajaxdata.url // куда слать форму, переменную с url мы определили вывели в нулевом шаге     
  }; 
  add_form.ajaxForm(options); // подрубаем плагин jquery form с опциями на нашу форму 

  jQuery('#add_img').click(function(e){ // по клику на ссылку "Добавить еще фото"
    e.preventDefault(); // выключим стандартное поведение ссылки
    jQuery(this).before("<label class='imgs'>Дополнительные фото: <input type='file' name='imgs[]'/></label><br>"); // добавим перед ссылкой еще один инпут типа файл с таким же нэймом
  });  
});
</script>
        <?php
        get_footer();
    }
    else {
        include( get_page_template() );
    }
}
?>

