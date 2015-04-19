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
	}
