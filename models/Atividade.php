<?php
class Atividade{
	private $id;
	private $descricao;
	private $horas;
	private $data;
	private $idTipo;
	private $planejamento;
	private $tipo;
	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($descricao){
		$this->descricao=$descricao;
	}
	public function getHoras(){
		return $this->horas;
	}
	public function setHoras($horas){
		$this->horas=$horas;
	}
	public function getData(){
		return $this->data;
	}
	public function setData($data){
		$this->data=$data;
	}
	
	public function setIdTipo($idtipo){
		$this->idtipo = $idtipo;
	}
	public function getIdTipo(){
		return $this->idtipo;
	}
	
	public function setPlanejamento(Planejamento $planejamento){
		$this->planejamento = $planejamento;
	}
	public function getPlanejamento(){
		return $this->planejamento;
	}
	public function setTipo(Tipo $tipo){
		$this->tipo = $tipo;
	}
	public function getTipo(){
		return $this->tipo;
	}
}

interface atividadeDAOInterface{
	public function buildAtividade($data);
	public function create(Atividade $atividade);
	public function findById($id);
	public function findAllByPlanej($id);
}
	
?>