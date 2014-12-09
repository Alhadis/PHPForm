<?php

	require_once 'html-element.php';
	require_once 'field.php';

	include_once 'field-types/textarea.php';
	include_once 'field-types/email.php';
	include_once 'field-types/submit.php';


	class Form extends HTMLElement{
		protected $tag_name	=	'form';

		protected $_attr	=	array(
			'method'	=>	'post',
			'enctype'	=>	'text/plain'
		);


		var $fields		=	array();


		/**
		 * Constructor method
		 */
		function __construct($args = NULL){
			if($args){
				
				#	First, check if an array of fields was supplied.
				if($fields = $args['fields']){

					foreach($fields as $key => $value){
						
						#	Create field from an array. Useful for config files, usually declared before libraries are included.
						if(is_array($value)){

							$class	=	ucfirst($value['type']) . 'Field';

							#	If a field class exists with the designated name, create a new instance of it.
							#	NOTE: 'TextField' is redundant; fields are of text type by default.
							if($class !== 'TextField' && class_exists($class) && is_subclass_of($class, 'Field'))
								$value	=	new $class($value);

							else $value	=	new Field($value);
						}


						$this->fields[$key]	=	$value;
					}

					#	Make sure we don't allow the Fields argument to overwrite what we just created.
					unset($args['fields']);
				}
				
				foreach($args as $key => $value)
					$this->{$key}	=	$value;
			}


			#	If we're left without an action attribute, default to the requested page
			if(!$this->action)
				$this->action	=	$_SERVER['REQUEST_URI'];
		}



		/**
		 * Checks if the form's being submitted.
		 */
		function submitted(){
			$request	=	'POST' === strtoupper($this->method) ? $_POST : $_GET;
			foreach($this->fields as $value)
				if(!isset($request[$value->name]) && !$value->no_data) return FALSE;
			return TRUE;
		}



		/**
		 * Performs all necessary validations.
		 * 
		 * Sets the 'error' property of all relevant fields to their first reported error message, and
		 * returns a boolean value determining if the submission was successful or not.
		 * 
		 * @return bool
		 */
		function validate(){
			$result	=	TRUE;

			foreach($this->fields as $field){
				if($field->no_data) continue;
				
				if(!$field->validate()){
					$result	=	FALSE;
				}	
			}
			
			return $result;
		}



		/** Displays a rendered field with the given name. */
		function field($name){
			if($field = $this->fields[$name])
				echo $field->render();
		}


		/**
		 * Allows fields to be displayed using concise shorthand.
		 * E.g., $this->first_name() is analoguous to $this->field('first_name').
		 */
		function __call($name, $args){

			#	Called method name matches a field instance registered with this form object.
			if($field = $this->fields[$name])
				echo $field->render();
		}



		/**
		 * If you'd rather not call each field's render() method individually, you can use this method to
		 * consecutively display each field in the order they were added to the Form's fields array.
		 */
		function render_fields(){
			foreach($this->fields as &$value)
				echo $value->render(), PHP_EOL;
		}



		/**
		 * ... for the absurdly lazy, there's a helper/sloth method for calling the form's open, display_fields, and close methods. In that order.
		 * 
		 * If your app doesn't need to inject any markup or arbitrary logic between fields, this method can be used to display the entirety of the
		 * form instead.
		 */
		function render(){
			echo	$this->open(),
					PHP_EOL,
					$this->render_fields(),
					$this->close(),
					PHP_EOL;
		}
	}