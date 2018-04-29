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



<h3>Bem Vindo <?php echo $user->getEmail() ?></h3>
<small>Para sair, clique <a href="logout.php">aqui</a></small><br>
<small>Para voltar a tela de login, clique <a href="index.php">aqui</a></small><br>
<small>Para ver os dados completo deste usuário, clique <a href="info.php">aqui</a></small><br>
<small>Para gerenciar usuarios, clique <a href="users.php">aqui</a></small><br><br>
<small style="color:#069">Você está logado no sistema. Parabéns!</small>

<?php  require_once("visual/rodape.php") ?>



<?php
}
?>