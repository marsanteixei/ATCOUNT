<?php
 class Tipo{
	 private $id;
	 private $codigo;
	 private $nome;
	 private $horaMax;
	 private $descricao;
	 private $atividades; 
	 private $modalidade;
	 
	 public function __construct(){
		 $this->atividades = array();
	 }
	 public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getCodigo(){
		return $this->codigo;
	}
	public function setCodigo($codigo){
		$this->codigo=$codigo;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome=$nome;
	}
	public function getHoraMax(){
		return $this->horaMax;
	}
	public function setHoraMax($horaMax){
		$this->horaMax=$horaMax;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($descricao){
		$this->descricao=$descricao;
	}
	public function addAtividade(Atividade $atividade){
		$this->atividades[] = $atividade;
	}
	public function getAtividades(){
		return $this->atividades;
	}
	public function setModalidade(Modalidade $modalidade){
		$this->modalidade = $modalidade;
	}
	public function getModalidade(){
		return $this->modalidade;
	}
 }
 interface tipoDAOInterface{
	
	public function buildTipo($data);
	public function findById($id);
	public function findByCodigo($codigo);
	public function findAll();
	}
?>