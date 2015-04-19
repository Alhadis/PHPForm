<?php
	
	require_once 'html-element.php';


	class Field extends HTMLElement{
		static $auto_id		=	TRUE;

		protected $tag_name			=	'input';
		protected $self_closing		=	TRUE;
		protected $token_attr		=	array('label', 'error');

		
		/** Set to TRUE when subclassing input types that don't need validation and transmit no meaningful info (e.g., reset/submit, etc).  */
		var $no_data	=	FALSE;


		/** First error message picked up with the field after being validated. */
		var $error		=	NULL;



		/**
		 * Human-readable version of this field's name (e.g., "Your surname" for "last-name").
		 * If omitted, will use the capitalised form of the field's $name property with dashes/underscores replaced with spaces.
		 */
		var $label	=	NULL;


		/**
		 * User's left a required field empty.
		 * %1: $this->label
		 * %2: $this->value
		 */
		var $error_blank	=	'Please fill out your %1.';


		/**
		 * Submitting an incorrectly-formatted entry.
		 * %1: $this->label
		 * %2: $this->value
		 */
		var $error_format	=	'"%2" is not a valid value. Please enter a correctly-formatted value.';

		
		/**
		 * Value's longer than $this->maxlength allows
		 * %1: $this->label
		 * %2: $this->value
		 * %3: $this->maxlength
		 */
		var $error_maxlength	=	'The value you have entered is too long.';




		/**
		 * Constructor method.
		 * 
		 * @constructor
		 * @param array $args - Associative array of properties to pass to the field.
		 */		
		function __construct($args = NULL){

			if($args)
				foreach($args as $key => $value){

					#	Merge arrays instead of overwrite. Preserves default values.
					if(is_array($value) && is_array($this->{$key}))
						$this->{$key}	=	array_merge($this->{$key}, $value);

					else $this->{$key}	=	$value;
				}

			#	If no label was manually specified, wring one from the instance's 'name' attribute.
			if(!isset($this->label))
				$this->label	=	ucfirst(preg_replace('#[-_]+#', ' ', $this->name));


			#	If the class variable $auto_id is set, always fill in missing ID attributes using the field's name property.
			if(Field::$auto_id && !$this->id && $this->name)
				$this->_attr	=	array_merge(array('id' => $this->name), $this->_attr);


			#	A request variable matches this field's name, so... yoink.
			if(isset($_REQUEST[$this->name]))
				$this->value	=	$_REQUEST[$this->name];
		}




		/**
		 * Checks if the field's value satisfies its validation constraints.
		 * 
		 * If the value fails one or more validation checks, the first validation error is assigned
		 * to the field's $error property. To store all errors simultaneously, override this method
		 * with custom logic. 
		 * 
		 * @return bool TRUE if the field passed all validation tests; FALSE otherwise.
		 */
		function validate(){

			#	Required field left blank
			if($this->required && !$value){
				$this->error	=	sprintf($this->error_blank, $this->name, $value) ?: TRUE;
				return FALSE;
			}


			#	Doesn't match required format.
			if($this->pattern && preg_match('#(' . $this->pattern . ')#', $value)){
				$this->error	=	sprintf($this->error_format, $this->name, $value) ?: TRUE;
				return FALSE;
			}


			#	Too long.
			if(strlen($value) > $this->maxlength){
				$this->error	=	sprintf($this->error_maxlength, $this->name, $value) ?: TRUE;
				return FALSE;
			}
			
			$this->error	=	NULL;
			return TRUE;
		}

	}