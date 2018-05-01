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
		<div class="bloco">
			<div class="imagem">
				<img src="img/avatar-user.png">
			</div>
			<div class="informacoes-usuario">
				<h2>Edevaldo Mazzucco</h2>
				<small>Administrador Geral</small>
				<a href="" class="btn-user-info"><i class="far fa-question-circle"></i> Informações</a>
				<a href="" class="btn-user-edit"><i class="fas fa-pencil-alt"></i> Editar</a>
			</div>
		</div>
		<div class="bloco">
			<div class="imagem">
				<img src="img/avatar-user.png">
			</div>
			<div class="informacoes-usuario">
				<h2>Marcio Santos</h2>
				<small>Administrador Geral</small>
				<a href="" class="btn-user-info"><i class="far fa-question-circle"></i> Informações</a>
				<a href="" class="btn-user-edit"><i class="fas fa-pencil-alt"></i> Editar</a>
			</div>
		</div>
		<div class="bloco">
			<div class="imagem">
				<img src="img/avatar-user.png">
			</div>
			<div class="informacoes-usuario">
				<h2>Alessandra Fernandes</h2>
				<small>Operador I</small>
				<a href="" class="btn-user-info"><i class="far fa-question-circle"></i> Informações</a>
				<a href="" class="btn-user-edit"><i class="fas fa-pencil-alt"></i> Editar</a>
			</div>
		</div>
		<div class="bloco">
			<div class="imagem">
				<img src="img/avatar-user.png">
			</div>
			<div class="informacoes-usuario">
				<h2>Paulo Henrique Santos</h2>
				<small>Operador I</small>
				<a href="" class="btn-user-info"><i class="far fa-question-circle"></i> Informações</a>
				<a href="" class="btn-user-edit"><i class="fas fa-pencil-alt"></i> Editar</a>
			</div>
		</div>
		<div class="bloco">
			<div class="imagem">
				<img src="img/avatar-user.png">
			</div>
			<div class="informacoes-usuario">
				<h2>Alexandro Oliveira</h2>
				<small>Operador I</small>
				<a href="" class="btn-user-info"><i class="far fa-question-circle"></i> Informações</a>
				<a href="" class="btn-user-edit"><i class="fas fa-pencil-alt"></i> Editar</a>
			</div>
		</div>
		<div class="bloco">
			<div class="imagem">
				<img src="img/avatar-user.png">
			</div>
			<div class="informacoes-usuario">
				<h2>Ana Julia Herzen</h2>
				<small>Estágiario(a)</small>
				<a href="" class="btn-user-info"><i class="far fa-question-circle"></i> Informações</a>
				<a href="" class="btn-user-edit"><i class="fas fa-pencil-alt"></i> Editar</a>
			</div>
		</div>
	</div>
</div>

<?php  require_once("visual/rodape.php") ?>


<?php } ?>