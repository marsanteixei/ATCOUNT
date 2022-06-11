<?php

require_once("models/Planejamento.php");
require_once("models/Msg.php");


class PlanejamentoDAO implements planejamentoDAOInterface {
	private $conn;
	private $url;
	private $msg;
	
	public function __construct (PDO $conn, $url){
		$this->conn = $conn;
		$this->url = $url;
		$this->msg = new Msg($url);
	}
public function buildPlanejamento($data){
		$planejamento = new Planejamento();
		$planejamento->setId($data["idPlanej"]);
		$planejamento->setCodigo($data["codigo"]);
		$planejamento->setDataAbertura($data["dataAbertura"]);
		$planejamento->setAguardandoValidar($data["aguardandoValidar"]);
		$planejamento->setFechado($data["fechado"]);
		$planejamento->setStatus($data["status"]);
		$planejamento->setDataFechamento($data["dataFechamento"]);
		$planejamento->setHorasTotAprov($data["horasTotaisAprovadas"]);
		$planejamento->setHorasTotPrev($data["horasTotaisPrevistas"]);
		$planejamento->setEnsinoTotAprov($data["ensinoTotAprov"]);
		$planejamento->setExtensaoTotAprov($data["extensaoTotAprov"]);
		$planejamento->setPesquisaTotAprov($data["pesquisaTotAprov"]);
		$planejamento->setEnsino1Aprov($data["ensino1Aprov"]);
		$planejamento->setEnsino2Aprov($data["ensino2Aprov"]);
		$planejamento->setEnsino3Aprov($data["ensino3Aprov"]);
		$planejamento->setEnsino4Aprov($data["ensino4Aprov"]);
		$planejamento->setExtensao1Aprov($data["extensao1Aprov"]);
		$planejamento->setExtensao2Aprov($data["extensao2Aprov"]);
		$planejamento->setExtensao3Aprov($data["extensao3Aprov"]);
		$planejamento->setPesquisa1Aprov($data["pesquisa1Aprov"]);
		$planejamento->setPesquisa2Aprov($data["pesquisa2Aprov"]);
		$planejamento->setPesquisa3Aprov($data["pesquisa3Aprov"]);
		$planejamento->setEnsino1Prev($data["ensino1Prev"]);
		$planejamento->setEnsino2Prev($data["ensino2Prev"]);
		$planejamento->setEnsino3Prev($data["ensino3Prev"]);
		$planejamento->setEnsino4Prev($data["ensino4Prev"]);
		$planejamento->setExtensao1Prev($data["extensao1Prev"]);
		$planejamento->setExtensao2Prev($data["extensao2Prev"]);
		$planejamento->setExtensao3Prev($data["extensao3Prev"]);
		$planejamento->setPesquisa1Prev($data["pesquisa1Prev"]);
		$planejamento->setPesquisa2Prev($data["pesquisa2Prev"]);
		$planejamento->setPesquisa3Prev($data["pesquisa3Prev"]);
		$planejamento->setIdHistorico($data["idHistorico"]);
		return $planejamento;
	}
	
	public function create(Planejamento $planejamento){
		$stmt = $this->conn->prepare("INSERT INTO planejamento (idPlanej, codigo , dataAbertura, aguardandoValidar , fechado , status, dataFechamento, horasTotaisAprovadas, horasTotaisPrevistas, ensinoTotAprov ,extensaoTotAprov, pesquisaTotAprov, ensino1Aprov, ensino2Aprov, ensino3Aprov, ensino4Aprov, extensao1Aprov, extensao2Aprov, extensao3Aprov, pesquisa1Aprov, pesquisa2Aprov, pesquisa3Aprov, ensino1Prev, ensino2Prev, ensino3Prev, ensino4Prev, extensao1Prev, extensao2Prev, extensao3Prev, pesquisa1Prev, pesquisa2Prev, pesquisa3Prev, idHistorico) 
		VALUES(:id, :codigo, :dataAbertura, :aguardandoValidar, :fechado, :status, :dataFechamento, :horasTotaisAprovadas, :horasTotaisPrevistas, :ensinoTotAprov, :extensaoTotAprov, :pesquisaTotAprov, :ensino1Aprov, :ensino2Aprov, :ensino3Aprov, :ensino4Aprov, :extensao1Aprov, :extensao2Aprov, :extensao3Aprov, :pesquisa1Aprov, :pesquisa2Aprov, :pesquisa3Aprov, :ensino1Prev, :ensino2Prev, :ensino3Prev, :ensino4Prev, :extensao1Prev, :extensao2Prev, :extensao3Prev, :pesquisa1Prev, :pesquisa2Prev, :pesquisa3Prev, :idHistorico)");
		
		$id = $planejamento->getId();
		$codigo = $planejamento->getCodigo();
		$dataAbertura = $planejamento->getDataAbertura();
		$aguardandoValidar = $planejamento->getAguardandoValidar();
		$fechado = $planejamento->getFechado();
		$status = $planejamento->getStatus();
		$dataFechamento = $planejamento->getDataFechamento();
		$horasTotAprov = $planejamento->getHorasTotAprov();
		$horasTotPrev = $planejamento->getHorasTotPrev();
		$ensinoTotAprov = $planejamento->getEnsinoTotAprov();
		$extensaoTotAprov = $planejamento->getExtensaoTotAprov();
		$pesquisaTotAprov = $planejamento->getPesquisaTotAprov();
		$ensino1Aprov = $planejamento->getEnsino1Aprov();
		$ensino2Aprov = $planejamento->getEnsino2Aprov();
		$ensino3Aprov = $planejamento->getEnsino3Aprov();
		$ensino4Aprov = $planejamento->getEnsino4Aprov();
		$extensao1Aprov = $planejamento->getExtensao1Aprov();
		$extensao2Aprov = $planejamento->getExtensao2Aprov();
		$extensao3Aprov = $planejamento->getExtensao3Aprov();
		$pesquisa1Aprov = $planejamento->getPesquisa1Aprov();
		$pesquisa2Aprov =$planejamento->getPesquisa2Aprov();
		$pesquisa3Aprov = $planejamento->getPesquisa3Aprov();
		$ensino1Prev = $planejamento->getEnsino1Prev();
		$ensino2Prev = $planejamento->getEnsino2Prev();
		$ensino3Prev = $planejamento->getEnsino3Prev();
		$ensino4Prev = $planejamento->getEnsino4Prev();
		$extensao1Prev = $planejamento->getExtensao1Prev();
		$extensao2Prev = $planejamento->getExtensao2Prev();
		$extensao3Prev = $planejamento->getExtensao3Prev();
		$pesquisa1Prev = $planejamento->getPesquisa1Prev();
		$pesquisa2Prev = $planejamento->getPesquisa2Prev();
		$pesquisa3Prev = $planejamento->getPesquisa3Prev();
		$historico = $planejamento->getHistorico();
		$idHistorico = $historico->getId();
		
		$stmt->bindParam(":id",$id);
		$stmt->bindParam(":codigo",$codigo);
		$stmt->bindParam(":dataAbertura",$dataAbertura);
		$stmt->bindParam(":aguardandoValidar",$aguardandoValidar);
		$stmt->bindParam(":fechado",$fechado);
		$stmt->bindParam(":status",$status);
		$stmt->bindParam(":dataFechamento",$dataFechamento);
		$stmt->bindParam(":horasTotaisAprovadas",$horasTotAprov);
		$stmt->bindParam(":horasTotaisPrevistas",$horasTotPrev);
		$stmt->bindParam(":ensinoTotAprov",$ensinoTotAprov);
		$stmt->bindParam(":extensaoTotAprov",$extensaoTotAprov);
		$stmt->bindParam(":pesquisaTotAprov",$pesquisaTotAprov);
		$stmt->bindParam(":ensino1Aprov",$ensino1Aprov);
		$stmt->bindParam(":ensino2Aprov",$ensino2Aprov);
		$stmt->bindParam(":ensino3Aprov",$ensino3Aprov);
		$stmt->bindParam(":ensino4Aprov",$ensino4Aprov);
		$stmt->bindParam(":extensao1Aprov",$extensao1Aprov);
		$stmt->bindParam(":extensao2Aprov",$extensao2Aprov);
		$stmt->bindParam(":extensao3Aprov",$extensao3Aprov);
		$stmt->bindParam(":pesquisa1Aprov",$pesquisa1Aprov);
		$stmt->bindParam(":pesquisa2Aprov",$pesquisa2Aprov);
		$stmt->bindParam(":pesquisa3Aprov",$pesquisa3Aprov);
		$stmt->bindParam(":ensino1Prev",$ensino1Prev);
		$stmt->bindParam(":ensino2Prev",$ensino2Prev);
		$stmt->bindParam(":ensino3Prev",$ensino3Prev);
		$stmt->bindParam(":ensino4Prev",$ensino4Prev);
		$stmt->bindParam(":extensao1Prev",$extensao1Prev);
		$stmt->bindParam(":extensao2Prev",$extensao2Prev);
		$stmt->bindParam(":extensao3Prev",$extensao3Prev);
		$stmt->bindParam(":pesquisa1Prev",$pesquisa1Prev);
		$stmt->bindParam(":pesquisa2Prev",$pesquisa2Prev);
		$stmt->bindParam(":pesquisa3Prev",$pesquisa3Prev);
		$stmt->bindParam(":idHistorico",$idHistorico);
		$stmt->execute();
	}
		
	public function updateAguardandoValidar(Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		aguardandoValidar = :aguardandoValidar,
		fechado = :fechado,
		status = :status,
		dataFechamento = :dataFechamento
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$aguardandoValidar = $planejamento->getAguardandoValidar();
		$fechado = $planejamento->getFechado();
		$status = $planejamento->getStatus();
		$dataFechamento = $planejamento->getDataFechamento();
		
		$stmt->bindParam(":aguardandoValidar", $aguardandoValidar);
		$stmt->bindParam(":fechado", $fechado);
		$stmt->bindParam(":status", $status);
		$stmt->bindParam(":dataFechamento", $dataFechamento);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	
	public function updateHorasTotaisAprovadas (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		horasTotaisAprovadas = :horasTotaisAprovadas
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$horasTotaisAprovadas = $planejamento->getHorasTotAprov();
		
		$stmt->bindParam(":horasTotaisAprovadas", $horasTotaisAprovadas);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	public function updateHorasTotaisPrevistas (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		horasTotaisPrevistas = :horasTotaisPrevistas
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$horasTotaisPrevistas = $planejamento->getHorasTotPrev();
		
		$stmt->bindParam(":horasTotaisPrevistas", $horasTotaisPrevistas);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updateEnsinoTotAprov (Planejamento $planejamento){
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		ensinoTotAprov = :ensinoTotAprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$ensinoTotAprov = $planejamento->getEnsinoTotAprov();
		
		$stmt->bindParam(":ensinoTotAprov", $ensinoTotAprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updateExtensaoTotAprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		extensaoTotAprov = :extensaoTotAprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$extensaoTotAprov = $planejamento->getExtensaoTotAprov();
		
		$stmt->bindParam(":extensaoTotAprov", $extensaoTotAprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updatePesquisaTotAprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		pesquisaTotAprov = :pesquisaTotAprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$pesquisaTotAprov = $planejamento->getPesquisaTotAprov();
		
		$stmt->bindParam(":pesquisaTotAprov", $pesquisaTotAprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateEnsino1Aprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		ensino1Aprov = :ensino1Aprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$ensino1Aprov = $planejamento->getEnsino1Aprov();
		
		$stmt->bindParam(":ensino1Aprov", $ensino1Aprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	
	public function updateEnsino2Aprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		ensino2Aprov = :ensino2Aprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$ensino2Aprov = $planejamento->getEnsino2Aprov();
		
		$stmt->bindParam(":ensino2Aprov", $ensino2Aprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateEnsino3Aprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		ensino3Aprov = :ensino3Aprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$ensino3Aprov = $planejamento->getEnsino3Aprov();
		
		$stmt->bindParam(":ensino3Aprov", $ensino3Aprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateEnsino4Aprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		ensino4Aprov = :ensino4Aprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$ensino4Aprov = $planejamento->getEnsino4Aprov();
		
		$stmt->bindParam(":ensino4Aprov", $ensino4Aprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateExtensao1Aprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		extensao1Aprov = :extensao1Aprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$extensao1Aprov = $planejamento->getExtensao1Aprov();
		
		$stmt->bindParam(":extensao1Aprov", $extensao1Aprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateExtensao2Aprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		extensao2Aprov = :extensao2Aprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$extensao2Aprov = $planejamento->getExtensao2Aprov();
		
		$stmt->bindParam(":extensao2Aprov", $extensao2Aprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateExtensao3Aprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		extensao3Aprov = :extensao3Aprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$extensao3Aprov = $planejamento->getExtensao3Aprov();
		
		$stmt->bindParam(":extensao3Aprov", $extensao3Aprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	public function updatePesquisa1Aprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		pesquisa1Aprov = :pesquisa1Aprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$pesquisa1Aprov = $planejamento->getPesquisa1Aprov();
		
		$stmt->bindParam(":pesquisa1Aprov", $pesquisa1Aprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updatePesquisa2Aprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		pesquisa2Aprov = :pesquisa2Aprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$pesquisa2Aprov = $planejamento->getPesquisa2Aprov();
		
		$stmt->bindParam(":pesquisa2Aprov", $pesquisa2Aprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updatePesquisa3Aprov (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		pesquisa3Aprov = :pesquisa3Aprov
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$pesquisa3Aprov = $planejamento->getPesquisa3Aprov();
		
		$stmt->bindParam(":pesquisa3Aprov", $pesquisa3Aprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateEnsino1Prev (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		ensino1Prev = :ensino1Prev
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$ensino1Prev = $planejamento->getEnsino1Prev();
		
		$stmt->bindParam(":ensino1Prev", $ensino1Prev);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	
	public function updateEnsino2Prev (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		ensino2Prev = :ensino2Prev
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$ensino2Prev = $planejamento->getEnsino2Prev();
		
		$stmt->bindParam(":ensino2Prev", $ensino2Prev);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateEnsino3Prev (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		ensino3Prev = :ensino3Prev
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$ensino3Prev = $planejamento->getEnsino3Prev();
		
		$stmt->bindParam(":ensino3Prev", $ensino3Prev);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateEnsino4Prev (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		ensino4Prev = :ensino4Prev
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$ensino4Prev = $planejamento->getEnsino4Prev();
		
		$stmt->bindParam(":ensino4Prev", $ensino4Prev);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateExtensao1Prev (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		extensao1Prev = :extensao1Prev
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$extensao1Prev = $planejamento->getExtensao1Prev();
		
		$stmt->bindParam(":extensao1Prev", $extensao1Prev);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateExtensao2Prev (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		extensao2Prev = :extensao2Prev
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$extensao2Prev = $planejamento->getExtensao2Prev();
		
		$stmt->bindParam(":extensao2Prev", $extensao2Prev);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updateExtensao3Prev (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		extensao3Prev = :extensao3Prev
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$extensao3Prev = $planejamento->getExtensao3Prev();
		
		$stmt->bindParam(":extensao3Prev", $extensao3Prev);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	public function updatePesquisa1Prev (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		pesquisa1Prev = :pesquisa1Prev
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$pesquisa1Prev = $planejamento->getPesquisa1Prev();
		
		$stmt->bindParam(":pesquisa1Prev", $pesquisa1Prev);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updatePesquisa2Prev (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		pesquisa2Prev = :pesquisa2Prev
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$pesquisa2Prev = $planejamento->getPesquisa2Prev();
		
		$stmt->bindParam(":pesquisa2Prev", $pesquisa2Prev);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function updatePesquisa3Prev (Planejamento $planejamento){
		
		$stmt = $this->conn->prepare("UPDATE planejamento SET
		pesquisa3Prev = :pesquisa3Prev
		WHERE idPlanej = :id
		");
		$id = $planejamento->getId();
		$pesquisa3Prev = $planejamento->getPesquisa3Prev();
		
		$stmt->bindParam(":pesquisa3Prev", $pesquisa3Prev);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
	}
	
	
	public function findById($id){
		if($id != ""){
			$stmt = $this->conn->prepare("SELECT * FROM planejamento WHERE idPlanej = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$planejamento = $this->buildPlanejamento($data);
				return $planejamento;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
    public function findByCodigo($codigo){
		if($codigo != ""){
			$stmt = $this->conn->prepare("SELECT * FROM planejamento WHERE codigo = :codigo");
			$stmt->bindParam(":codigo", $codigo);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$planejamento = $this->buildPlanejamento($data);
				return $planejamento;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

   public function findAllByAluno($id){
		$planejamentos = [];
		$stmt = $this->conn->prepare("SELECT * FROM planejamento WHERE idHistorico  = :idHistorico ");
		$stmt->bindParam(":idHistorico", $id);
		$stmt->execute();

      if($stmt->rowCount() > 0) {

        $planejamentoArray = $stmt->fetchAll();
		foreach($planejamentoArray as $plan) {
          $planejamentos[] = $this->buildPlanejamento($plan);
        }
		return $planejamentos;
	}else{
		return false;
	}		
 }

  public function findAll(){
		$planejamentos = [];
		$stmt = $this->conn->query("SELECT * FROM planejamento");
		 $stmt->execute();

      if($stmt->rowCount() > 0) {

        $planejArray = $stmt->fetchAll();
		foreach($planejArray as $planej) {
          $planejamentos[] = $this->buildPlanejamento($planej);
        }
		return $planejamentos;
	}else{
		return false;
	}		
 }
 
}
?>