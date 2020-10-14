<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// надо дописать таксономии
function create_posttype_bookmakerReview()
	{
    $labels = array(
        'name' =>					_x( 'Букмейкеры', 'Тип записей букмейкеры', 'root' ), // название типа записи
        'singular_name' =>			_x( 'Букмейкер', 'Тип записей букмейкеры', 'root' ), // название (ед число)
		'add_new' =>				__( 'Добавить букмейкера', 'root' ), // текст для добавления новой записи
		'add_new_item' =>			__( 'Добавить нового букмейкера', 'root' ), // текст заголовка у создаваемой записи
		'view_item' =>				__( 'Смотреть букмейкера', 'root' ), // текст для просмотра записи
		'search_items' =>			__( 'Искать букмейкера', 'root' ), // текст для поиска по этим типам записи
		'not_found' =>				__( 'Не найдено', 'root' ), // текст - в результате поиска ничего не было найдено.
        'not_found_in_trash' =>		__( 'Не найдено в корзине', 'root' ), // текст, если не было найдено в корзине.
		'all_items' =>				__( 'Все букмейкеры', 'root' ), // Все записи. По умолчанию равен menu_name
        'menu_name' =>				__( 'Букмейкеры', 'root' ), // Название меню. По умолчанию равен name.
        
        'edit_item' =>				__( 'Редактировать букмейкера', 'root' ),
        'update_item' =>			__( 'Обновить букмейкера', 'root' )
    );

    $args = array(
        'label' =>					__( 'bookmakers', 'root' ), // Имя типа записи
        'description' =>			__( 'Каталог букмейкеров', 'root' ), // Короткое описание типа записи
        'labels' =>					$labels, // названия ярлыков для типа записи.
		'supports' =>				array( 'title', // заголовок
										   'thumbnail', // тумбинашка
										   'editor', // может быть тут будут спец условия???
										   'revisions'
										   //'custom-fields'
										),
        'taxonomies' =>				array // Массив зарегистрированных таксономий
										( 
										    'site_language',
											'site_version',
											'billings',
											'max_cash_limit',
											'min_cash_limit'
										),
        'hierarchical' =>			false, // древовидная структура записей
        'public' =>					true, // публичная запись да/нет
        'show_ui' =>				true, // нужно ли создавать логику управления типом записи из админ-панели
        'show_in_menu' =>			true, //Показывать ли тип записи в администраторском меню 
		'show_in_nav_menus' =>		true, // Включить возможность выбирать этот тип записи в меню навигации.
        'show_in_admin_bar' =>		true, // Сделать этот тип доступным из админ бара.
        'menu_position' =>			5, // Позиция где должно расположится меню нового типа записи:
		'menu_icon' =>				'dashicons-money-alt', // Иконка записи в меню
        'can_export' =>				false,
        'has_archive' =>			false,
        'exclude_from_search' =>	false, // Исключить ли этот тип записей из поиска по сайту.
        'publicly_queryable' =>		true, // публичный просмотр записей
        'capability_type' =>		'page',
    );

    register_post_type( 'bookmakers', $args );
			// 'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box`
			// или `post_tags_meta_box`. false — метабокс отключен.
	}

function my_taxonomies()
	{
	$taxonomies = array
		(
		'site_language' => array
			(
			'name' => 'languages', // название таксономи
			'post_type' => 'bookmakers', // для какого посттайпа
			'data' => array
				(
				'label' => __('Языки'),
				'meta_box_cb' => 'post_tags_meta_box_select',
				)
			),
		'site_version' => array
			(
			'name' => 'versions', // название таксономи
			'post_type' => 'bookmakers', // для какого посттайпа
			'data' => array
				(
				'label' => __('Версии сайта'),
				'meta_box_cb' => 'post_tags_meta_box_select',
				)
			),
		'billings' => array
			(
			'name' => 'billings', // название таксономи
			'post_type' => 'bookmakers', // для какого посттайпа
			'data' => array
				(
				'label' => __('Платежные системы'),
				//'update_count_callback' => '_update_post_term_count',
				'meta_box_cb' => 'post_tags_meta_box_select',
				)
			),
		'valuti' => array
			(
			'name' => 'valuti', // название таксономи
			'post_type' => 'bookmakers', // для какого посттайпа
			'data' => array
				(
				'label' => __('Валюты'),
				'public' =>					true,
				'show_ui' =>				true, // нужно ли создавать логику управления типом записи из админ-панели
				'show_in_menu' =>			true, //Показывать ли тип записи в администраторском меню
				)
			)
		);
	
	register_taxonomy($taxonomies['site_language']['name'], 
					  $taxonomies['site_language']['post_type'], 
					  $taxonomies['site_language']['data']);
	foreach($taxonomies as $one_taxonomy)
		{
		register_taxonomy($one_taxonomy['name'], 
							$one_taxonomy['post_type'], 
							$one_taxonomy['data']);
		}
	}
?>