<?php 

require_once('config.php');

session_start();
if(isset($_SESSION['em_tb_email'])){
	header("Location: home.php");
}
$user = new Usuario();


	//Quando o botao de login for pressionado
	if(isset($_POST['btn'])){
		//Recupera os dados do login
		$senha = $_POST['pass'];
		$usuario = $_POST['user'];

		require_once("funcoes/Usuario.php");

		$user = new Usuario();
		$user->setUsuario($usuario);
		$user->setSenha($senha);

		$resultLogin = $user->Login();

		if($resultLogin){
			$eXimsg = 1;
		}else{
			$eXimsg = 0;
		}
	}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Login - Sistema Interno</title>

	<!-- Metas -->
	<meta charset="utf-8">
	<meta name="author" content="Edevaldo Mazzucco">
	<!-- Importacao Fontes Externas -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

	<!-- Importacao CSS -->
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<?php
	if(isset($eXimsg)){
		if($eXimsg == 1){
	?>
<!-- Regras Outras -->
	<meta http-equiv="refresh" content="3;URL=home.php">
	<?php 
		}}
	?>
</head>
<body>
<header>

</header>
<div class="corpo-formulario">
	<form method="post" autocomplete="off">
		<div class="bloco-icone">
			<i class="fas fa-user"></i>
			<input type="text" placeholder="Usuário" name="user">
		</div>
		<div class="bloco-icone">
			<i class="fas fa-key"></i>
			<input type="password" name="pass" placeholder="Senha">
		</div>
		<input type="submit" name="btn" value="Entrar">
	</form>

	<?php 

	if(isset($eXimsg)){
		if($eXimsg == 1){
			?>
			<div class="mensagem mensagem-sucesso">
		<span><i class="fas fa-check"></i> Autenticado com sucesso!, aguarde...</span>
	</div>
<meta http-equiv="refresh" content="2;URL=home.php">
			<?php
		}else if($eXimsg == 0){
			?>
			<div class="mensagem mensagem-erro">
		<span><i class="fas fa-exclamation-triangle"></i> Dados incorretos. Revise e tente novamente.</span>
	</div>
			<?php
		}
	}	
	 ?>
	


	
	
</div>
</body>
