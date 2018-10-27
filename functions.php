<?php
	// Include style
	function theme_style_load() {
		wp_enqueue_style( 'base', get_template_directory_uri() . '/css/base.css');	
		wp_enqueue_style( 'vendor', get_template_directory_uri() . '/css/vendor.css');
		wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');			
	}

	add_action( 'wp_enqueue_scripts', 'theme_style_load' );

	// Include script
	function theme_script_load() {
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', '', '', true);
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', '', '', true);
		wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', '', '', true);
		wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', '', '', true);
	}
	add_action( 'wp_enqueue_scripts', 'theme_script_load' );

	add_theme_support('post-thumbnails');
	show_admin_bar(false);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');

	add_action( 'after_setup_theme', function () {
		register_nav_menus( [
			'topMenu' => 'Верхнее меню',
			'bottomMenu' => 'Нижнее меню',
			'categoriesMenu' => 'Меню категорий',
		] );
	} );
	
	// Remove p tags from category description
	remove_filter('term_description','wpautop');
	
	

	class magomra_walker_nav_menu extends Walker_Nav_Menu {

		// add classes to ul sub-menus
		function start_lvl( &$output, $depth ) {
			// depth dependent classes
			$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
			$display_depth = ( $depth + 1); // because it counts the first submenu as 0
			$classes = 'submenu';
			

			// build html
			$output .= "\n" . $indent . '<ul class="' . $classes . '">' . "\n";
		}

		function start_el(&$output, $item, $depth, $args) {
			// назначаем классы li-элементу и выводим его
			$class_names = join( ' ', $item->classes );
			$class_names = ' class="' .esc_attr( $class_names ). '"';
			$output.= '<li id="menu-item-' . $item->ID . '"' .$class_names. '>';
		
			// назначаем атрибуты a-элементу
			$attributes.= !empty( $item->url ) ? ' href="' .esc_attr($item->url). '"' : '';
			$item_output = $args->before;
		
			// проверяем, на какой странице мы находимся
			$current_url = (is_ssl()?'https://':'http://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$item_url = esc_attr( $item->url );
			if ( $item_url != $current_url ) $item_output.= '<a'. $attributes .'>'.$item->title.'</a>';
			else $item_output.= '<a>'.$item->title.'</a>';
		
			// заканчиваем вывод элемента
			$item_output.= $args->after;
			$output.= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		  }

	}

	add_filter( 'nav_menu_css_class', 'filter_nav_menu_css_classes', 10, 4 );
	function filter_nav_menu_css_classes( $classes, $item, $args, $depth ) {
		if ( $args->theme_location === 'Верхнее меню' ) {
			$classes = [
				''
			];
			if ( $item->current ) {
				$classes[] = 'current';
			}
		}
		return $classes;
	}


	function customTitle($limit) {
		$title = get_the_title($post->ID);
		if(strlen($title) > $limit) {
			$title = mb_substr($title, 0, $limit) . '...';
		}
		
		echo $title;
	}

	function mytheme_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
	?>
		<li <?php comment_class(); ?> id=&amp;quot;li-comment-<?php comment_ID() ?>&amp;quot; >
			<div class="comment__avatar">
				<?php echo get_avatar( $comment->comment_author_email, $args['avatar_size']); ?>
			</div>
			<div class="comment__content">

				<div class="comment__info">
					<div class="comment__author"><?php comment_author(); ?></div>

					<div class="comment__meta">
						<div class="comment__time"><?php comment_time('F j, Y'); ?></div>
						<div class="comment__reply">
							<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</div>
					</div>
				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class=&amp;quot;comment-awaiting-verification&amp;quot;><?php _e('Your comment is awaiting moderation.') ?></div>
				<br />
				<?php endif; ?>
				<div class="comment__text">
				<?php comment_text() ?>
				</div>
			</div>
			
	<?php
			break;
			case 'pingback'  :
			case 'trackback' :
	?>
				<li class=&amp;quot;post pingback&amp;quot;>
					<?php comment_author_link(); ?>
					<?php edit_comment_link( __( 'Редактировать' ), ' ' ); ?>
	<?php
			break;
		endswitch;
	}

	add_filter('comment_form_fields', 'reorder_comment_fields' );
	function reorder_comment_fields( $fields ){

		$new_fields = array(); // сюда соберем поля в новом порядке
	
		$myorder = array('author','email','url','comment'); // нужный порядок
	
		foreach( $myorder as $key ){
			$new_fields[ $key ] = $fields[ $key ];
			unset( $fields[ $key ] );
		}
	
		// если остались еще какие-то поля добавим их в конец
		if( $fields )
			foreach( $fields as $key => $val )
				$new_fields[ $key ] = $val;
	
		return $new_fields;
	}

	add_filter('cancel_comment_reply_link', 'reply_link' );
	function reply_link( $formatted_link ){
		$formatted_link = '';

		return $formatted_link;
	}

	
	

	add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
	function my_navigation_template( $template, $class ){
	return '
	<nav class="%1$s" role="navigation">
	<ul class="post-pagination list-inline">%3$s</ul>
	</nav>    
	';
	}

	

	if( function_exists('acf_add_options_page') ) {	
		acf_add_options_page();
	}

	

?>