<?php

class SelectFieldOptgroup extends HTMLElement{
	protected $tag_name	=	'optgroup';
	var $options		=	array();



	function render(){

		$options	=	'';
		foreach($this->options as $option)
			$options	.=	$option->render();
		
		$this->innerHTML	=	$options;
		return parent::render();
	}


	function autoindex($count_from = 0){
		$count	=	count($this->options);
		
		$value	=	$count_from;
		for($i = 0; $i < $count; ++$i){
			$this->options[$i]->value	=	$value;
			++$value;
		}

		return $value;
	}
}
