<?php

	class EmailField extends Field{
		static $valid_email	=	'/^[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/';

		var $error_blank	=	'Please include an e-mail address';
		var $error_format	=	'Please include a correctly-formatted e-mail address.';


		function get_error($value = NULL){
			if(!preg_match(self::$valid_email, $value))
				return $this->error_format ?: TRUE;
			parent::get_error($value);
		}
	}
