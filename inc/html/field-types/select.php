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
		
		

		/**
		 * Replaces each option's value with its index of appearance in the container's options list.
		 * 
		 * This is helpful for fields that've been constructed using strings as option-lists, when
		 * integer-based values are desired for each option.
		 * 
		 * For example:
		 * 
		 *		<option value="Apple">Apple</option>
		 * 		<option value="Banana">Banana</option>
		 * 
		 * Would be replaced with this:
		 * 
		 * 		<option value="0">Apple</option>
		 * 		<option value="1">Banana</option>
		 * 
		 * @param int $count_from - Integer to start counting from
		 * @return int - Next value to be assigned to an option
		 */		
		function autoindex($count_from = 0){
			$count	=	count($this->options);
			$value	=	$count_from;

			for($i = 0; $i < $count; ++$i){
				$opt	=&	$this->options[$i];

				# Make sure to autoindex any optgroups too.
				if(method_exists($opt, 'autoindex'))
					$value	=	$opt->autoindex($value);

				else{
					$opt->value = $value;
					++$value;
				}
			}

			return $value;
		}
	}
