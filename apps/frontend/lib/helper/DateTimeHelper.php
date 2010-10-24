<?php

function day_num_to_text($num) {

	$days = array(0=>"Lunes",1=>"Martes",2=>"Miercoles",3=>"Jueves",4=>"Viernes",5=>"Sabado",6=>"Domingo");

	if (($num>=0) && ($num <=6)) {
		
		return $days[$num];
	}
	else return "";
}
 
/*
 * imprime un string de fecha en formato dd/mm/yyyy
 * Si el formato de date_str es incorrecto, devuelvo lo que me mandaron
 */
function print_date($date_str, $format) {
	try {
		$date = new DateTime($date_str);
	} catch (Exception $e) {
		return $date_str; 
	}
	
	return $date->format($format);
}