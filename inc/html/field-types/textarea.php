<?php

	
	class TextareaField extends Field{
		protected $tag_name		=	'textarea';
		protected $self_closing	=	FALSE;
		

		function render(){
			$attr	=	$this->_attr;
			$value	=	$attr['value'];
			unset($attr['value']);

			return '<textarea'. $this->html_attr($attr) . '>' . htmlspecialchars($value) . '</textarea>';
		}
	}