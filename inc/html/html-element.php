<?php

class HTMLElement{
	protected $_attr		=	array();
	protected $tag_name		=	'';
	protected $innerHTML	=	'';
	protected $self_closing	=	FALSE;
	protected $token_attr	=	array();


	/**
	 * HTML block enclosing the element.
	 * Any property of the element's $_attr array can be passed in as though it were a local variable. E.g.,
	 * 		'<input type="$type" value="$value" />'
	 * Additional properties can be passed in by specifying their names in the instance's $token_attr array.
	 */
	var $template	=	'';

	
	function __construct($args = NULL){
		foreach($args as $key => $value){
			$this->{$key}	=	$value;
		}
	}
	
	

	/**
	 * If setting a property that isn't defined in the instance's class, the attribute is instead
	 * added as an HTML attribute of the instance's element.
	 * 
	 * @param string $name - Name of property attempting to be set.
	 * @param mixed $value - Value being assigned.
	 */
	function __set($name, $value){
		$this->_attr[$name]	=	$value;
	}


	/**
	 * When retrieving a property that isn't defined in the instance class, it's pulled from the HTML attr array instead.
	 * 
	 * @param string $name - Name of property attempting to be read.
	 * @return mixed
	 */
	function __get($name){
		return @$this->_attr[$name];
	}




	/**
	 * Returns the HTML code for the element's opening tag.
	 * 
	 * @return string
	 */
	function open(){

		$output	=	'<' . $this->tag_name;
		$output	.=	$this->html_attr($this->_attr);
		$output	.=	($this->self_closing ? ' /' : '') . '>';

		return $output;
	}



	/**
	 * Returns the HTML code for the element's closing tag.
	 * 
	 * @return string
	 */
	function close(){
		if($this->self_closing) return '';
		return '</' . $this->tag_name . '>';
	}





	/**
	 * Formats an array of key/value pairs as a string of HTML attributes.
	 * 
	 * @param array $attr - An associative array of HTML attributes.
	 * @return string
	 */
	function html_attr($attr){

		#	Assume any attributes with explicit TRUE/FALSE values are intended to be boolean HTML attributes.			
		foreach($attr as $key => $value)
			if(is_bool($value)){
				if($value)	$attr[$key]	=	$key;
				else		unset($attr[$key]);
			}


		#	Compile HTML attributes
		$output	=	'';
		if($attr) foreach($attr as $key => $value)
			$output	.=	' '.$key.'="'.htmlentities(html_entity_decode($value)).'"';
		return $output;
	}



	/**
	 * Generate the element's markup.
	 * 
	 * @return string The HTML code populated with data.
	 */
	function render(){
		$tag =	$this->open() . ($this->self_closing ? '' : $this->innerHTML) . $this->close();


		#	No template string defined; just return the generated tag.
		if(!$this->template) return $tag;


		#	We have a template, so configure some tokens to pass to it.
		$tokens			=	$this->_attr;
		$tokens['tag']	=	$tag;

		foreach($this->token_attr as $attr)
			$tokens[$attr]	=	$this->{$attr};

		return $this->tokenise($this->template, $tokens);
	}



	/**
	 * Replaces any variable declarations found in a string with the accompanying values found in the supplied key/value pair.
	 * This provides a safer and more controlled alternative to PHP's native eval function.
	 * 
	 * @example template('<input type="$type" id="$id" />', array(
	 * 	'type'	=>	'text',
	 *	'id'	=>	'first-name
	 * ));
	 * @param string $template - HTML template block
	 * @param array $tokens - Associative array of tokens
	 * @return string
	 */
	function tokenise($template, $tokens){
		$output	=	$template;

		/**
		 * Sort our tokens so that those with longer names are listed first.
		 * NOTE: The following approach proved to be ~73.30317103884319% faster than using uksort when benchtested. 
		 */
		$sorted	=	array_flip(array_keys($tokens));
		foreach($sorted as $key => $value)	$sorted[$key]	=	strlen($key);
		arsort($sorted);
		foreach($sorted as $key => $value)	$sorted[$key]	=	$tokens[$key];
		$tokens	=&	$sorted;

		foreach($tokens as $key => $value)
			$output	=	str_replace('$'.$key, $value, $output);

		return $output;
	}
}
