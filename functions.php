<?php
/*   
Theme Name: matador
*/
$truefile = (__FILE__);

get_template_part('inc/bookmaker_custom_field');
get_template_part('inc/bookmakers_extra_fields');
get_template_part('inc/my_extra_fields_update');
get_template_part('inc/post_tags_meta_box_select');
get_template_part('inc/tax_dropdown');


add_action( 'init', 'create_posttype_bookmakerReview', 0 ); // создание произвольной записи

add_action( 'init', 'my_taxonomies', 0 );

add_action('add_meta_boxes', 'bookmakers_limit_fields', 1); // создание доп поля

add_action('wp_enqueue_scripts', 'style_theme');

function style_theme()
	{
	wp_enqueue_style('reset_css', get_template_directory_uri().'/css/reset.css');
	wp_enqueue_style('style', get_stylesheet_uri());
	}


function bookmakers_limit_fields()
	{
	add_meta_box('extra_fields', 
					'Лимиты', 
					'bookmakers_extra_fields', 
					'bookmakers', 
					'advanced');
	}

// включаем обновление полей при сохранении
add_action( 'save_post', 'my_extra_fields_update', 0 );


function my_enqueue($hook) 
	{
    // Only add to the post-new.php admin page.
    // See WP docs.
    if ($hook !== 'post-new.php' && $hook !== 'post.php')
		{
        return;
		}
    wp_enqueue_script('my_custom_script', get_template_directory_uri().'/js/matador_js.js');
	}

add_action('admin_enqueue_scripts', 'my_enqueue');