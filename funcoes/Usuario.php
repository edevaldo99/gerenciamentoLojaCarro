<?php 

class Usuario{

	//Variaveis
	private $usuario;
	private $senha;
	private $email;
	private $id;
	private $nome;
	private $nivel;
	private $ativo;

	//Metodos set
	public function setUsuario($login){
		$this->usuario = $login;
	}
	public function setSenha($pass){
		$this->senha = $pass;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function setId($i){
		$this->id = $i;
	}
	public function setNome($name){
		$this->nome = $name;
	}
	public function setNivel($ni){
		$this->nivel = $ni;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	//Metodos get
	public function getUsuario(){
		return $this->usuario;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getId(){
		return $this->id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getNivel(){
		return $this->nivel;
	}
	public function getAtivo(){
		return $this->ativo;
	}

	//Funcoes
	public function login(){
		$sql = new SQL();
		$resultado = $sql->select("SELECT * FROM usuarios WHERE usuario = :USUARIO AND senha = :SENHA", array(
			":USUARIO"=>$this->getUsuario(),
			":SENHA"=>$this->getSenha()
		));

		if(count($resultado) > 0){
			$this->loadByID($resultado[0]['id']);
			$this->makeSession($resultado[0]);
			return true;
		}else{
			return false;
		}
	}

	private function makeSession($data){
		$_SESSION['em_tb_id'] = $data['id'];
		$_SESSION['em_tb_senha'] = $data['senha'];
		$_SESSION['em_tb_email'] = $data['email'];
	}

	public function loadByID($id){
		$sql = new Sql();
		$resultado = $sql->select("SELECT * FROM usuarios WHERE id = :ID", array(
			":ID"=>$id
		));
		$this->setData($resultado[0]);
	}

	public function loadAllUsers(){
		$sql = new Sql();
		$resultado = $sql->select("SELECT * FROM usuarios ORDER BY id DESC");
		return $resultado;
	}

	public function loadNumberUsers(){
		$sql = new Sql();
		$resultado = $sql->select("SELECT * FROM usuarios");
		return count($resultado);
	}

	public function setData($data){
		$this->setUsuario($data['usuario']);
		$this->setEmail($data['email']);
		$this->setId($data['id']);
		$this->setNome($data['nome']);
		$this->setSenha($data['senha']);
		$this->setNivel($data['classe']);
		$this->setAtivo($data['ativo']);
	}

	//Outros
	public function __toString(){
		return json_encode(
			array(
				"Id"=>$this->getId(),
				"Nome"=>$this->getNome(),
				"Usuario"=>$this->getUsuario(),
				"Senha"=>$this->getSenha(),
				'Email'=>$this->getEmail()
			)
		);
	}
}

 ?>