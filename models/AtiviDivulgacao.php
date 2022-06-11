<?php
class AtiviDivulgacao{
	private $id;
	private $nome;
	private $descricao;
	private $data;
	private $horas;
	private $horario;
	private $logradouro;
	private $numero;
	private $bairro;
	private $cidade;
	private $uf;
	private $cep;
	private $instituicao;
	private $coordenador;
	
	
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
	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($descricao){
		$this->descricao=$descricao;
	}
	public function getData(){
		return $this->data;
	}
	public function setData($data){
		$this->data=$data;
	}
	public function setHoras($horas){
		$this->horas = $horas;
	}
	public function getHoras(){
		return $this->horas;
	}
	
	public function getHorario(){
		return $this->horario;
	}
	public function setHorario($horario){
		$this->horario=$horario;
	}
	public function getLogradouro(){
		return $this->logradouro;
	}
	public function setLogradouro($logradouro){
		$this->logradouro=$logradouro;
	}
	public function getNumero(){
		return $this->numero;
	}
	public function setNumero($numero){
		$this->numero=$numero;
	}
	public function getBairro(){
		return $this->bairro;
	}
	public function setBairro($bairro){
		$this->bairro=$bairro;
	}
	public function getCidade(){
		return $this->cidade;
	}
	public function setCidade($cidade){
		$this->cidade=$cidade;
	}
	public function getUf(){
		return $this->uf;
	}
	public function setUf($uf){
		$this->uf=$uf;
	}
	public function getCep(){
		return $this->cep;
	}
	public function setCep($cep){
		$this->cep=$cep;
	}
	public function getInstituicao(){
		return $this->instituicao;
	}
	public function setInstituicao($instituicao){
		$this->instituicao=$instituicao;
	}
	public function setCoordenador(Coordenador $coordenador){
		$this->coordenador = $coordenador;
	}
	public function getCoordenador(){
		return $this->coordenador;
	}
}  
interface atividadeDivulgDAOInterface{
	
	public function buildAtivDiv($data);
	public function create(AtiviDivulgacao $ativiDivulgacao);
	public function update(AtiviDivulgacao $ativiDivulgacao);
	public function findById($id);
	public function findAll();
	} 
?>