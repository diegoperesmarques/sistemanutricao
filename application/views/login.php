<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset = "UTF-8" />
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content = "ie=edge" />
	<link rel = "stylesheet" href = "<?= base_url('assets/css/bootstrap.min.css'); ?>" />
	<link rel = "stylesheet" href = "<?= base_url('assets/css/formata.css'); ?>" />
	<link rel = "stylesheet" href = "<?= base_url('assets/css/all.css'); ?>" />
	<title>Página Administrativa</title>
</head>
<body>
<div id = "corpo">
	<div id = "loginSenha">
		<div id = "cabecalhoLoginSenha">
			<a href = "<?= base_url(); ?>">
			<img src = "<?= base_url('assets/img/logoSemTexto.png'); ?>" />
			</a>
			<?php
				echo validation_errors("<p class = 'alert alert-danger'>", "</p>");
			?>
		</div>
		<?= form_open('loginLogout/autenticar'); ?>
		<div class = "input-group">
		<div class = "input-group-prepend">
		<div class = "input-group-text"><i class = "fas fa-user"></i></div>
		</div>
		<?php
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'usuarioDigitado',
				'placeholder' => 'Usuário'
			));
		?>
	</div>
		<br />

		<div class = "input-group">
		<div class = "input-group-prepend">
		<div class = "input-group-text"><i class = "fas fa-key"></i></div>
		</div>
		<?php
			echo form_password(array(
				'class' => 'form-control',
				'name' => 'senhaDigitado',
				'placeholder' => 'Senha'
			));
		?>
		</div>
		<br />

		<div class = "form-group">
		<?php
			echo form_button(array(
				'class' => 'btn btn-primary btn-large btn-block',
				'type' => 'submit',
				'content' => 'Entrar'
			));
		?>
		</div>
		<?= form_close(); ?>
	</div>

</div>
<script src = "<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src = "<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src = "<?= base_url('assets/js/login.js'); ?>"></script>
</body>
</html>
