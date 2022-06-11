<?php
class Coordenador{
	private $id;
	private $nome;
	private $email;
	private $senha;
	private $token;
	private $atividadesDivulgacao;
	private $mensagens;
	
	public function __construct(){
	   $this->atividadesDivulgacao = array();
	   $this->mensagens = array();
	}
	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome=$nome;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email=$email;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha=$senha;
	}
	public function getToken(){
		return $this->token;
	}
	public function setToken($token){
		$this->token=$token;
	}
	public function addAtividadeDivulgacao(AtiviDivulgacao $atividadeDivulgacao){
		$this->atividadesDivulgacao[] = $atividadeDivulgacao;
	}
	public function getAtividadesDivulgacao(){
		return $this->atividadesDivulgacao;
	}
	public function addMensagem (Mensagem $mensagem){
		$this->mensagens[] = $mensagem;
	}
	public function getMensagens (){
		return $this->mensagens;
	}
	public function generateToken(){
		return bin2hex(random_bytes(50));
	}
	public function generatePassword($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}
}
interface coordenadorDAOInterface{
	
	public function buildCoordenador($data);
	public function create(Coordenador $coordenador);
	public function update(Coordenador $coordenador);
    public function verifyToken($protected = false);
	public function setTokenToSession($token, $redirect = true);
	public function authenticateCoordenador($email, $senha);
	public function findbyToken($token);
	public function findByEmail($email);
	public function findById($id);
	public function changPassword(Coordenador $coordenador);
	public function destroyToken();
}
?>