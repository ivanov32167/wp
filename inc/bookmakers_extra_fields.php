<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function bookmakers_extra_fields($post)
	{
	//$select_option = wp_dropdown_categories( array(	'taxonomy' => 'valuti', 'orderby' => 'name', 'order' => 'DESC') );
	
	$my_extra_fields['limits']['css'] = '
										<style>
										.all_limits
											{
											display: flex;
											flex-direction: column;
											}

										.min_limits, .max_limits
											{
											display: flex;
											flex-direction: column;
											}

										.limits_list
											{
											display: flex;
											flex-direction: row;
											justify-content: space-between;
											}

										.one_limit
											{
											border: 1px solid #ccc;
											padding: 5px;
											flex: 1;

											display: flex;
											flex-direction: column;
											}

										.one_limit_name
											{
											font-weight: 700;
											}

										.one_limit_value
											{
											margin-top: 5px;
											display: flex;
											flex-direction: row;
											}
										</style>';
	
	$my_extra_fields['limits']['periods'] = array('day' => 'День', 'week' => 'Неделя', 'month' => 'Месяц');
	$my_extra_fields['limits']['info'] = array
		(
		array
			(
			'name' => 'min_limit',
			'header' => 'Минимальные лимиты:',
			'prefix' => 'min'
			),
		array
			(
			'name' => 'max_limit',
			'header' => 'Максимальные лимиты:',
			'prefix' => 'max'
			)
		);

	echo $my_extra_fields['limits']['css'];
	foreach($my_extra_fields['limits']['info'] as $limit)
		{
		echo '<div class="'.$limit['prefix'].'_limits">';
			echo '<div>';
				echo '<center>';
					echo '<h4>';
						echo $limit['header'];
					echo '</h4>';
				echo '</center>';
			echo '</div>';
			echo '<div class="limits_list">';
			foreach($my_extra_fields['limits']['periods'] as $period_name => $period_value)
				{
				$value_str = $limit['prefix'].'_'.$period_name;
				$value = get_post_meta($post->ID, $value_str.'_value', 1);
				
				$sel_v = get_post_meta($post->ID, $value_str.'_currency', 1);
				$terms = get_terms( 'valuti',  ['hide_empty' => 0, 'orderby' => 'name']);
				
				echo '<div class="one_limit '.$limit['prefix'].'_limit__'.$period_name.'">';
					echo '<div class="one_limit_name">';
						echo $period_value.':';
					echo '</div>';
					echo '<div class="one_limit_value">';
						echo '<input id="'.$limit['prefix'].'_limit_'.$period_name.'" '
									. 'type="text" '
									. 'name="extra['.$value_str.'_value]" '
									. 'value="'.$value.'">';
						
						echo '<select name="extra['.$value_str.'_currency]">';
						foreach($terms as $one_temr)
							{
							$selected = (int)$sel_v === (int)$one_temr->term_id ? ' selected' : '';
							echo '<option value="'.$one_temr->term_id.'"'.$selected.'>'.$one_temr->name.'</option>';
							}

						echo '</select>';
					echo '</div>';
				echo '</div>';
				}
			echo '</div>';
		echo '</div>';
		}
	global $truefile;
	$nonce = wp_create_nonce($truefile);
	echo '<input type="hidden" name="extra_fields_nonce" value="'.$nonce.'" />';
	}
?>