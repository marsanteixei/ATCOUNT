<?php
class Comprovante{
	private $id;	
	private $doc;
	private  $planejamento;
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getDoc(){
		return $this->doc;
	}
	public function setDoc($doc){
		$this->doc=$doc;
	}
	public function getPlanejamento(){
		return $this->planejamento;
	}
	public function setPlanejamento(Planejamento $planejamento){
		$this->planejamento = $planejamento;
		
	}
}
interface comprovanteDAOInterface{
	public function buildComprovante($data);
	public function create(Comprovante $comprovante);
	public function findById($id);
	public function findAllByPlanej($id);
}
?>