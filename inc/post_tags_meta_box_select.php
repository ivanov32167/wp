<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function post_tags_meta_box_select( $post, $box ) 
	{
    $defaults = array( 'taxonomy' => 'post_tag' );
	
    if ( ! isset( $box['args'] ) || ! is_array( $box['args'] ) ) 
		{ $args = array(); }
	else
		{ $args = $box['args']; }
		
    $parsed_args           = wp_parse_args( $args, $defaults );
    $tax_name              = esc_attr( $parsed_args['taxonomy'] );
    $taxonomy              = get_taxonomy( $parsed_args['taxonomy'] );
    $user_can_assign_terms = current_user_can( $taxonomy->cap->assign_terms );
    $comma                 = _x( ',', 'tag delimiter' );
    $terms_to_edit         = get_terms_to_edit( $post->ID, $tax_name );
	
    if ( ! is_string( $terms_to_edit ) ) 
		{ $terms_to_edit = ''; }
	
	echo '<div class="tagsdiv" id="'.$tax_name.'">';
	echo	'<div class="jaxtag">';
	echo		'<div class="nojs-tags hide-if-js">';
	echo			'<label for="tax-input-'.$tax_name.'">'.$taxonomy->labels->add_or_remove_items.'</label>';
	echo				'<p>';
	echo					'<textarea name="tax_input['.$tax_name.']" '
								. 'rows="3" '
								. 'cols="20" '
								. 'class="the-tags" '
								. 'id="tax-input-'.$tax_name.'" '. disabled( ! $user_can_assign_terms ).' '
								. 'aria-describedby="new-tag-'.$tax_name.'-desc">'.str_replace( ',', $comma . ' ', $terms_to_edit ).''
							. '</textarea>';
	echo				'</p>';
	echo			'</div>';
				if ( $user_can_assign_terms )
					{
	echo			'<div class="ajaxtag hide-if-no-js">';
	echo				'<label class="screen-reader-text" for="new-tag-'.$tax_name.'">'.$taxonomy->labels->add_new_item.'</label>';
	echo				'<input data-wp-taxonomy="'.$tax_name.'" '
								. 'type="hidden" '
								. 'id="new-tag-'.$tax_name.'" '
								. 'name="newtag['.$tax_name.']" '
								. 'class="newtag form-input-tip" '
								. 'size="16" '
								. 'autocomplete="off" '
								. 'aria-describedby="new-tag-'.$tax_name.'-desc" '
								. 'value="">';
	
						$terms = get_terms( $tax_name,  ['hide_empty' => 0,
												'orderby' => 'name'
												]);
						echo '<select id="taxes_add" name="temp">';
						foreach($terms as $one_temr)
							{
							echo '<option value="'.$one_temr->name.'">'.$one_temr->name.'</option>';
							}

						echo '</select>';
						echo				'<button type="button" class="button" onclick="alternate_add(this)">Добавить</button>';


	
	echo			'</div>';

					}
				elseif ( empty( $terms_to_edit ) )
					{
	echo			'<p>'.$taxonomy->labels->no_terms.'</p>';
					}
	echo		'</div>';
	echo		'<ul class="tagchecklist" role="list"></ul>';
	echo	'</div>';
	}