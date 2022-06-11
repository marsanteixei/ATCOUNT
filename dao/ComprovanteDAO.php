<?php

require_once("models/Comprovante.php");
require_once("models/Msg.php");

class ComprovanteDAO implements comprovanteDAOInterface {
	private $conn;
	private $url;
	private $msg;
	
	public function __construct (PDO $conn, $url){
		$this->conn = $conn;
		$this->url = $url;
		$this->msg = new Msg($url);
	}
	
	public function buildComprovante($data){
		$comprovante = new Comprovante();
		$comprovante->setId($data["idComprov"]);
		$comprovante->setDoc($data["Nomedoc"]);
		
		return $comprovante;
	}
	
	public function create(Comprovante $comprovante){
		$stmt = $this->conn->prepare("INSERT INTO comprovante (idComprov, Nomedoc, idPlanej) 
		VALUES(:idComprov, :doc, :idPlanej)");
		
		$id = $comprovante->getId();
		$doc = $comprovante->getDoc();
		$planejamento = $comprovante->getPlanejamento();
		$idPlanej = $planejamento->getId();
		$stmt->bindParam(":idComprov",$id);
		$stmt->bindParam(":doc",$doc);
		$stmt->bindParam(":idPlanej",$idPlanej);
		$stmt->execute();
	}
	
	public function findById($id){
		if($id != ""){
			$stmt = $this->conn->prepare("SELECT * FROM comprovante WHERE idComprov = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$comprovante = $this->buildComprovante($data);
				return $comprovante;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	public function findAllByPlanej($id){
		if($id != ""){
			$comprovantes =[];
			$stmt = $this->conn->prepare("SELECT * FROM comprovante WHERE idPlanej = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			$comprovanteArray = $stmt->fetchAll();
			if(count($comprovanteArray) > 0){
				foreach($comprovanteArray as $comp) {
					$comprovantes[] = $this->buildComprovante($comp);
				}
				return $comprovantes;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}	
	}
	
	
}

?>