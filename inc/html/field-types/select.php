<?php

require_once 'select-option.php';
require_once 'select-optgroup.php';


class SelectField extends Field{

	# Option parsing modes
	const OPTIONS_BY_KEY	=	1;
	const OPTIONS_BY_VALUE	=	2;


	protected $tag_name		=	'select';
	protected $self_closing	=	FALSE;
	protected $options		=	array();



	function __construct($args = NULL){
		$parse_mode	=	intval($args['parse_mode']);

		if($args['options'])
			$this->options	=	$this->parse_options($args['options'], $parse_mode);

		unset($args['options'], $args['parse_mode']);
		parent::__construct($args);
	}



	/** Renders the <select> element's HTML. */
	function render(){
		$attr	=	$this->_attr;
		$value	=	$attr['value'];
		unset($attr['value']);

		# Mark selected options
		$this->select_active($value);

		$options	=	'';
		foreach($this->options as $option)
			$options	.=	$option->render();

		$this->innerHTML	=	$options;
		return parent::render();
	}



	/**
	 * Marks any options with matching values as selected.
	 * 
	 * @param mixed $value - Value to compare with
	 * @param array $options - Array of option objects to parse. Defaults to instance's own options array.
	 */
	protected function select_active($value, $options = NULL){
		$options	=	$options ?: $this->options;

		$count	=	count($options);
		for($i = 0; $i < $count; ++$i){
			$opt	=	$options[$i];

			# This is an optgroup, so parse its options list separately.
			if(is_a($opt, 'SelectFieldOptgroup'))
				$this->select_active($value, $opt->options);


			# Option's value matches: mark as selected.
			else if($opt->value == $value && $value !== NULL)
				$opt->selected	=	'selected';


			# Doesn't match, don't mark as selected
			else unset($opt->selected);
		}
	}



	/**
	 * Generates a list of SelectFieldOption instances.
	 * 
	 * @param string|array $options - An array of values to parse into options. Strings will be split by newline, ignoring blank values.
	 * @param int $mode - An OPTIONS_BY_* constant controlling how option values are interpreted. Defaults to an "intelligent guess".
	 * @return array
	 */
	function parse_options($options, $mode = NULL){
		$output	=	array();

		# Allow strings to be passed in as option lists, split by newline.
		if(is_string($options))
			$options	=	array_filter(split(PHP_EOL, $options));



		# If no parsing mode was specified, try and guess based on the keys found in the $options array.
		if(!$mode){

			# Not an associative array, so just use each string as both an option value AND label.
			if(end(array_keys($options))+1 === count($options))
				$mode	=	self::OPTIONS_BY_VALUE;

			# Otherwise, assume it's an associative array of some description.
			else $mode	=	self::OPTIONS_BY_KEY;
		}



		foreach($options as $key => $value){

			# Allow options/optgroups to be constructed externally.
			if(is_a($value, 'SelectFieldOption') || is_a($value, 'SelectFieldOptgroup'))
				$output[]	=	$value;


			# Interpret a nested array as an <optgroup>
			else if(is_array($value)){
				$output[]	=	new SelectFieldOptgroup(array(
					'label'		=>	$key,
					'options'	=>	$this->parse_options($value, $mode)
				));
			}


			# Otherwise, use the item as the value of a new SelectFieldOption instance. 
			else $output[]	=	new SelectFieldOption(array(
				'value'		=>	$mode == self::OPTIONS_BY_VALUE ? $value : $key,
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
