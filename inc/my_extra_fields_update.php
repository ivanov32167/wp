<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function my_extra_fields_update( $post_id )
	{
	global $truefile;
	
	if (empty( $_POST['extra'] )
			|| ! wp_verify_nonce( $_POST['extra_fields_nonce'], $truefile)
			|| wp_is_post_autosave( $post_id )
			|| wp_is_post_revision( $post_id )
	)
		{return false;}

	$_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] );
	foreach( $_POST['extra'] as $key => $value )
		{
		if( empty($value) )
			{
			delete_post_meta( $post_id, $key );
			continue;
			}

		update_post_meta( $post_id, $key, $value );
		}

	return $post_id;
	}