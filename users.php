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


<h3>Usuários - <?php echo $user->getEmail() ?></h3><br><br>
<span>Número total de usuários: <b><?php echo $user->loadNumberUsers(); ?></b></span><br>
<ul>
<?php foreach ($user->loadAllUsers() as $key => $value) {
	?>
	<li><a href="users.php?mostra=<?php echo $value['id']; ?>"><?php echo $value['nome']; ?> - <?php echo $value['email'] ?></a></li>
	<?php
}?>
</ul>
<a href="home.php">Voltar</a><br><br>
<small style="color:#069">Você está logado no sistema. Parabéns!</small>


<?php  require_once("visual/rodape.php") ?>









<?php
}
?>