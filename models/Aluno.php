<?php
class Aluno{
	private $id;
	private $nome;
	private $sobrenome;
	private $cpf;
	private $email;
	private $senha;
	private $token;
	private $matricula;
	private $telefone;
	private $historico;
	
	
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
	public function getSobrenome(){
		return $this->sobrenome;
	}
	public function setSobrenome($sobrenome){
		$this->sobrenome=$sobrenome;
	}
	public function getCpf(){
		return $this->cpf;
	}
	public function setCpf($cpf){
		$this->cpf=$cpf;
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
	public function getMatricula(){
		return $this->matricula;
	}
	public function setMatricula($matricula){
		$this->matricula=$matricula;
	}
	public function getTelefone(){
		return $this->telefone;
	}
	public function setTelefone($telefone){
		$this->telefone=$telefone;
	}
	public function setHistorico( Historico $historico){
		
		$this->historico = $historico;
	}
	public function getHistorico(){
		return $this->historico;
	}
	public function generateToken(){
		return bin2hex(random_bytes(50));
	}
	public function generatePassword($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}
}
interface alunoDAOInterface{
	public function buildAluno($data);
	public function create(Aluno $aluno);
	public function update(Aluno $aluno);
    public function verifyToken($protected = false);
	public function setTokenToSession($token, $redirect = true);
	public function authenticateAluno($email, $senha);
	public function findbyToken($token);
	public function findByEmail($email);
	public function findById($id);
	public function findByMatricula($matricula);
	public function changPassword(Aluno $aluno);
	public function destroyToken();
	public function getIdHistorico($id);
	public function findByIdHistorico($idHistorico);
}
?>