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



<h3>INFO - <?php echo $user->getEmail() ?></h3><br><br>
<ul>
	<li>Id: <b><?php echo $user->getId(); ?></b></li>
	<li>Nome: <b><?php echo $user->getNome(); ?></b></li>
	<li>Email: <b><?php echo $user->getEmail(); ?></b></li>
	<li>Usuário: <b><?php echo $user->getUsuario(); ?></b></li>
	<li>Nivel: <b><?php echo $user->getNivel(); ?></li></small></b>
	<li>Ativo: <b><?php echo $user->getAtivo(); ?></b></li>
	<li>Senha: <b style="color: red"><?php echo $user->getSenha(); ?></b></li>
</ul>
<a href="home.php">Voltar</a><br><br>
<small style="color:#069">Você está logado no sistema. Parabéns!</small>


<?php  require_once("visual/rodape.php") ?>








<?php
}
?>