<?php

	require_once 'select-option.php';
	require_once 'select-optgroup.php';


	class SelectField extends Field{
		protected $tag_name		=	'select';
		protected $self_closing	=	FALSE;
		protected $options		=	array();


		function __construct($args = NULL){

			if($args['options'])
				$this->options	=	$this->parse_options($args['options'], TRUE);
			
			unset($args['options']);
			parent::__construct($args);
		}



		/** Renders the <select> element's HTML. */
		function render(){
			$attr	=	$this->_attr;
			$value	=	$attr['value'];
			unset($attr['value']);

			$options	=	'';
			foreach($this->options as $option)
				$options	.=	$option->render();
			
			$this->innerHTML	=	$options;
			return parent::render();
		}



		/**
		 * Generates a list of SelectFieldOption instances.
		 * 
		 * @param string|array $options - An array of values to parse into options. Strings will be split by newline, ignoring blank values.
		 * @return array
		 */
		function parse_options($options){
			$output	=	array();


			# Allow strings to be passed in as option lists, split by newline.
			if(is_string($options))
				$options	=	array_filter(split(PHP_EOL, $options));


			foreach($options as $key => $value){

				# Allow options/optgroups to be constructed externally.
				if(is_a($value, 'SelectFieldOption') || is_a($value, 'SelectFieldOptgroup'))
					$output[]	=	$value;


				# Interpret a nested array as an <optgroup>
				else if(is_array($value)){
					$output[]	=	new SelectFieldOptgroup(array(
						'label'		=>	$key,
						'options'	=>	$this->parse_options($value)
					));
				}


				# Otherwise, use the item as the value of a new SelectFieldOption instance. 
				else $output[]	=	new SelectFieldOption(array(
					'value'		=>	$value,
					'innerHTML'	=>	$value
				));
			}

			return $output;
		}
	}
