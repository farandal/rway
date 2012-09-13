<h1>Default Index</h1>
<p>Esta el la vista generica de inicio</p>
<p>para cambiar la vista generica de la aplicación, modifique el bootstrap.php</p>

<style>

.formee_form { padding:40px;width:600px }

.formee_form form:after, .formee_form  div:after, .formee_form  ol:after, .formee_form  ul:after, .formee_form  li:after, .formee_form  dl:after {
	content:".";
	display:block;
	clear:both;
	visibility:hidden;
	height:0;
	overflow:hidden;
}

</style>

<div class="formee_form" >
<form id="cadastrar" class="formee" action="" method="post">
    <fieldset>
        <legend>Form</legend>
		<?php

			if(isset($formulario)) echo $formulario;
			
		?>
	</fieldset>
</form>
</div>
