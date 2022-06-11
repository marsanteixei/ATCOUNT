<?php
require_once("models/Atividade.php");
require_once("models/Msg.php");

class AtividadeDAO implements atividadeDAOInterface {
	private $conn;
	private $url;
	private $msg;
	
	public function __construct (PDO $conn, $url){
		$this->conn = $conn;
		$this->url = $url;
		$this->msg = new Msg($url);
	}
	
	public function buildAtividade($data){
		$atividade = new Atividade();
		$atividade->setId($data["idAtiv"]);
		$atividade->setDescricao($data["descricao"]);
		$atividade->setHoras($data["horas"]);
		$atividade->setData($data["data"]);
		$atividade->setIdTipo($data["idTipo"]);
		return $atividade;
	}
	public function create(Atividade $atividade){
		$stmt = $this->conn->prepare("INSERT INTO atividade (idAtiv, descricao, horas, data, idPlanej ,idTipo) 
		VALUES(:idAtiv, :descricao, :horas, :data, :idPlanej, :idTipo)");
		
		$id = $atividade->getId();
		$descricao = $atividade->getDescricao();
		$horas = $atividade->getHoras();
		$data = $atividade->getData();
		$planejamento = $atividade->getPlanejamento();
		$idPlanej = $planejamento->getId();
		$tipo = $atividade->getTipo();
		$idTipo = $tipo->getId();
		
		$stmt->bindParam(":idAtiv",$id);
		$stmt->bindParam(":descricao",$descricao);
		$stmt->bindParam(":horas", $horas);
		$stmt->bindParam(":data",$data);
		$stmt->bindParam(":idPlanej",$idPlanej);
		$stmt->bindParam(":idTipo",$idTipo);
		$stmt->execute();
	}
	
	public function findById($id){
		if($id != ""){
			$stmt = $this->conn->prepare("SELECT * FROM atividade WHERE idAtiv = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$atividade = $this->buildAtividade($data);
				return $atividade;
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
			$atividades =[];
			$stmt = $this->conn->prepare("SELECT * FROM atividade WHERE idPlanej = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			$atividadeArray = $stmt->fetchAll();
			if(count($atividadeArray) > 0){
				foreach($atividadeArray as $ativ) {
					$atividades[] = $this->buildAtividade($ativ);
				}
				return $atividades;
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