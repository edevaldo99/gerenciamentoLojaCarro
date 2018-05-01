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

<div class="centro">
	<div class="bloco-usuarios">

		<?php

		$admins = $user->loadAllUsers();

		foreach ($admins as $key => $value) {

		?>

		<div class="bloco">
			<div class="imagem">
				<img src="img/avatar-user.png">
			</div>
			<div class="informacoes-usuario">
				<h2><?php echo $value['nome'] ?></h2>
				<small><?php echo $value['cargo'] ?></small>
				<a href='informacoesUsuario.php?id=<?php echo $value['id'] ?>&&email=<?php echo $value['email'] ?>' class="btn-user-info"><i class="far fa-question-circle"></i> Informações</a>
				<a href='editarUsuario.php?id=<?php echo $value['id'] ?>&&email=<?php echo $value['email'] ?>' class="btn-user-edit"><i class="fas fa-pencil-alt"></i> Editar</a>
			</div>
		</div>
	</div>

	<?php
		}
	?>


</div>

<?php  require_once("visual/rodape.php") ?>


<?php } ?>