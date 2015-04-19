<?php

	include_once 'inc/main.php';
	
	$row	=	'
<div class="row">
	<label for="$id">$label</label>
	$tag
</div>';

	
	$form	=	new Form(array(
		'enctype'		=>	'multipart/form-data',
		'method'		=>	'post',
		'novalidate'	=>	TRUE,
		'fields'	=>	array(

			'first_name'	=>	new Field(array(
				'name'		=>	'first-name',
				'required'	=>	TRUE,
				'type'		=>	'text',
				'error_blank'	=>	'Fill something out, you fuckin\' idiot.',
				'template'		=>	$row
			)),


			'last_name'		=>	new Field(array(
				'label'		=>	'Surname',
				'name'		=>	'last-name',
				'id'		=>	'last-name',
				'type'		=>	'text',
				'template'	=>	$row
			)),


			'email'			=>	array(
				'type'			=>	'email',
				'name'			=>	'email',
				'required'		=>	TRUE,
				'placeholder'	=>	'Include your e-mail "addy" so we get to spam you with pointless shit.',
				'template'		=>	$row
			),


			'message'		=>	new TextareaField(array(
				'name'		=>	'message',
				'value'		=>	'Type something',
				'id'		=>	'message-box',
				'required'	=>	TRUE,
				'template'	=>	$row
			)),


			'fruit'	=>	new SelectField(array(
				'name'		=>	'favourite-fruit',
				'options'	=>	array(
					'A-I'	=>	array(
						'Apple',
						'Banana',
						'Coconut',
						'Date',
						'Elderberry',
						'Fig',
						'Grape',
						'Honeydew',
						'Ilama'
					),
					
					'J-L'	=>	array(
						'Jujube',
						'Kumquat',
						'Lime'
					),
					
					
					'M-Z'	=>	array(
						'Mango',
						'Nutmeg',
						'Orange',
						'Pear',
						'Quince',
						'Raspberry',
						'Strawberry',
						'Tomato',
						'Ugni',
						'Vanilla',
						'Watermelon',
						'Xigua',
						'Yew'
					),

					'Zwetschge',
					new SelectFieldOption(array(
						'value'		=>	'faaaark',
						'label'		=>	'Fuuuuck',
						'data-attr'	=>	'Something'
					))
				),
				'template'	=>	$row
			)),


			'submit'		=>	new SubmitField(array(
				'label'	=>	'Submit',
				'template'	=>	'
<div class="row last">
	$tag
</div>'
			))
		)
	));
?>
<!DOCTYPE html>
<html>
<head>
<title>PHPForm</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
<meta name="viewport" content="initial-scale=1, minimum-scale=1" />
<style>
*{box-sizing: border-box;}
html{
	padding: 1em;
}
body{
	margin: 1em auto;
	max-width: 70em;
}
input, textarea{
	padding: 1em;
	margin: 0 0 1em;
	display: block;
	width: 100%;
	font-size: 1.1em;
}
</style>
</head>


<body>
	
	
	
<?php

	if($form->submitted()){
		
		if($form->validate()){
			?>
			<h1>Thanks for submitting, yaddah, yaddah fuckin'-yaddah.</h1>
			<?php
		}
		else{
			?>
			<h1>Dude, that submission was bullshit. Try again.</h1>
			<?php
		}
	}
?>
	<?= $form->open(); ?> 
		<?= $form->render_fields(); ?> 
	<?= $form->close(); ?>
	
</body>
</html>