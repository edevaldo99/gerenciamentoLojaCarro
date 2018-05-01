<?php 
require_once("config.php");

session_start();

if(isset($_SESSION['em_tb_id'])){

	$id_session = $_SESSION['em_tb_id'];
	$senha_session = $_SESSION['em_tb_senha'];
	$email_session = $_SESSION['em_tb_email'];

	$user = new Usuario();
	$user->loadById($id_session);

	if($email_session != $user->getEmail()){
		header("Location: logout.php");
	}
	if($senha_session != $user->getSenha()){
		header("Location: logout.php");
	}

	$autorizado = true;
}else{
	header("Location: index.php");
}


if($autorizado == true){

 ?>


<?php require_once("visual/header.php") ?>

Ajuda

<?php  require_once("visual/rodape.php") ?>


<?php } ?>