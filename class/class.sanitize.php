<?php

/**
 * Utils - utilities and useful functions
 */
class Sanitize {

	/**
	 * sanitizeString
	 * @value
	 */
	static function sanitizeString($value) {
		$value = urldecode($value);
		$value = filter_var($value, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		$value = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
		$value = addslashes($value);
		return $value;
	}
    
    function sanitizeOutput($value){
		$value = urldecode($value);
		$value = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
		$value = htmlentities($value, ENT_QUOTES, 'UTF-8');		
		return $value;
	}

}