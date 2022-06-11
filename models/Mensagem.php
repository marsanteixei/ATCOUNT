<?php
class Mensagem{
	private $idMensagem;
	private $texto;
	private $planejamento;
	private $coordenador;
	private $idPlanej;
	
	public function getIdMensagem(){
		return $this->idMensagem;
	}
	public function setIdMensagem($idMensagem){
		$this->idMensagem = $idMensagem;
	}
	public function getTexto(){
		return $this->texto;
	}
	public function setTexto($texto){
		$this->texto = $texto;
	}
	public function setPlanejamento(Planejamento $planejamento){
		$this->planejamento = $planejamento;
	}
	public function getPlanejamento(){
		return $this->planejamento;
	}
	public function setCoordenador( Coordenador $coordenador){
		$this->coordenador = $coordenador;
	}
	public function getCoordenador(){
		return $this->coordenador;
	}
	
	
	public function setIdPlanej($idPlanej){
		$this->idPlanej =  $idPlanej;
	}
	public function getIdPlanej(){
		return $this->idPlanej;
	}
}
interface mensagemDAOInterface{
	public function buildMensagem($data);
	public function create(Mensagem $mensagem);
	public function findByIdPlanej($id);
}
?>