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
				'id'		=>	'message-box',
				'required'	=>	TRUE,
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
			
		}
	}
?>
	<?= $form->open(); ?> 
		<?= $form->render_fields(); ?> 
	<?= $form->close(); ?>
	
</body>
</html>