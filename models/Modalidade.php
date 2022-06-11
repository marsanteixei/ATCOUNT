<?php
class Modalidade{
	private $idMod;
	private $codigoMod;
	private $nomeMod;
	private $horaMaxMod;
	private $tipos;
	
	public function __construct(){
		
		 $this->tipos = array();	
	}
	public function getIdMod(){
		return $this->idMod;
	}
	public function setIdMod($idMod){
		$this->idMod=$idMod;
	}
	public function getCodigoMod(){
		return $this->codigoMod;
	}
	public function setCodigoMod($codigoMod){
		$this->codigoMod=$codigoMod;
	}
	public function getNomeMod(){
		return $this->nomeMod;
	}
	public function setNomeMod($nomeMod){
		$this->nomeMod=$nomeMod;
	}
	public function getHoraMaxMod(){
		return $this->horaMaxMod;
	}
	public function setHoraMaxMod($horaMaxMod){
		$this->horaMaxMod=$horaMaxMod;
	}
	public function addTipo(Tipo $tipo){
		$this->tipos[] = $tipo;
	}
	public function getTipos(){
		return $this->tipos;
	}
}
?>