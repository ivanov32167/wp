/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function alternate_add(el)
	{
	//debugger;
	var main_elem = el.closest(".tagsdiv");
	var tax_value = main_elem.querySelector("#taxes_add").value;
	var hidden_input = main_elem.querySelector(".newtag");
	hidden_input.value = tax_value;tagBox.userAction = "add";
	tagBox.flushTags(el.closest( ".tagsdiv" ) );
	}