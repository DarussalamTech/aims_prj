<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

// Calls the getField method of the library
function get_field($field = '') {
	$CI =& get_instance();
	return $CI->auth->get_field($field);
}



?>