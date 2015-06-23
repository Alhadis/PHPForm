<?php

class SelectFieldOption extends HTMLElement{
	protected $tag_name	=	'option';


	function __construct($args){

		foreach($args as $key => $value)
			$this->{$key}	=	$value;


		# Use the option's value if innerHTML wasn't specified.
		if(NULL !== $this->value && !$this->innerHTML)
			$this->innerHTML	=	$this->value;


		# If HTML was explicitly passed, but no value was, assume the author meant to set both.
		else if($this->innerHTML && NULL === $this->value)
			$this->value	=	$this->innerHTML;
	}
}
