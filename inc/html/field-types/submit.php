<?php
	
	class SubmitField extends Field{
		var $no_data	=	TRUE;

		function __construct($args = NULL){
			parent::__construct($args);
			
			$this->type	=	'submit';
		}
	}