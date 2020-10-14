<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function tax_dropdown($my_tax, $name)
	{
	wp_dropdown_categories( array(	'taxonomy' => $my_tax, 
									'hide_empty' => 0,
									'name' => $name,
									'show_option_all' => '-', // пункт "не выбрано"
									'option_none_value' => -1, // "value" для пункта "не выбрано"
									'orderby' => 'name') );
	}