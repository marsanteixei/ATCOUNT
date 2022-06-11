<?php

require_once("models/Historico.php");
require_once("models/Msg.php");


class HistoricoDAO implements historicoDAOInterface {
	private $conn;
	private $url;
	private $msg;
	
	public function __construct (PDO $conn, $url){
		$this->conn = $conn;
		$this->url = $url;
		$this->msg = new Msg($url);
	}
	public function buildHistorico($data){
		$historico = new Historico();
		$historico->setId($data["idHistorico"]);
		$historico->setHorasTotAprov($data["horasTotaisAprovadas"]);
		$historico->setHorasTotPend($data["horasTotaisPendentes"]);
		$historico->setEnsinoTotAprov($data["ensinoTotalAprov"]);
		$historico->setExtensaoTotAprov($data["extensaoTotalAprov"]);
		$historico->setPesquisaTotAprov($data["pesquisaTotalAprov"]);
		$historico->setEnsino1Total($data["ensino1Total"]);
		$historico->setEnsino2Total($data["ensino2Total"]);
		$historico->setEnsino3Total($data["ensino3Total"]);
		$historico->setEnsino4Total($data["ensino4Total"]);
		$historico->setExtensao1Total($data["extensao1Total"]);
		$historico->setExtensao2Total($data["extensao2Total"]);
		$historico->setExtensao3Total($data["extensao3Total"]);
		$historico->setPesquisa1Total ($data["pesquisa1Total"]);
		$historico->setPesquisa2Total($data["pesquisa2Total"]);
		$historico->setPesquisa3Total ($data["pesquisa3Total"]);
		return $historico;
	}
	public function create(Historico $historico){
		$stmt = $this->conn->prepare("INSERT INTO historico (idHistorico, horasTotaisAprovadas, horasTotaisPendentes, ensinoTotalAprov, extensaoTotalAprov, pesquisaTotalAprov, ensino1Total, ensino2Total, ensino3Total, ensino4Total, extensao1Total, extensao2Total, extensao3Total, pesquisa1Total, pesquisa2Total, pesquisa3Total) 
		VALUES(:id, :horasTotAprov, :horasTotPend, :ensinoTotAprov, :extensaoTotAprov, :pesquisaTotAprov, :ensino1Total, :ensino2Total, :ensino3Total, :ensino4Total, :extensao1Total, :extensao2Total, :extensao3Total, :pesquisa1Total, :pesquisa2Total, :pesquisa3Total)");
		
		$id = $historico->getId();
		$horasTotAprov = $historico->getHorasTotAprov();
		$horasTotPend = $historico->getHorasTotPend();
		$ensinoTotAprov = $historico->getEnsinoTotAprov();
		$extensaoTotAprov = $historico->getExtensaoTotAprov();
		$pesquisaTotAprov = $historico->getPesquisaTotAprov();
		$ensino1Total = $historico->getEnsino1Total();
		$ensino2Total = $historico->getEnsino2Total();
		$ensino3Total = $historico->getEnsino3Total();
		$ensino4Total = $historico->getEnsino4Total();
		$extensao1Total = $historico->getExtensao1Total();
		$extensao2Total = $historico->getExtensao2Total();
		$extensao3Total = $historico->getExtensao3Total();
		$pesquisa1Total = $historico->getPesquisa1Total();
		$pesquisa2Total = $historico->getPesquisa2Total();
		$pesquisa3Total = $historico->getPesquisa3Total();
		
		$stmt->bindParam(":id",$id);
		$stmt->bindParam(":horasTotAprov",$horasTotAprov);
		$stmt->bindParam(":horasTotPend",$horasTotPend);
		$stmt->bindParam(":ensinoTotAprov",$ensinoTotAprov );
		$stmt->bindParam(":extensaoTotAprov",$extensaoTotAprov );
		$stmt->bindParam(":pesquisaTotAprov",$pesquisaTotAprov);
		$stmt->bindParam(":ensino1Total",$ensino1Total);
		$stmt->bindParam(":ensino2Total",$ensino2Total);
		$stmt->bindParam(":ensino3Total",$ensino3Total);
		$stmt->bindParam(":ensino4Total",$ensino4Total);
		$stmt->bindParam(":extensao1Total",$extensao1Total);
		$stmt->bindParam(":extensao2Total",$extensao2Total);
		$stmt->bindParam(":extensao3Total",$extensao3Total);
		$stmt->bindParam(":pesquisa1Total",$pesquisa1Total);
		$stmt->bindParam(":pesquisa2Total",$pesquisa2Total);
		$stmt->bindParam(":pesquisa3Total",$pesquisa3Total);
		$stmt->execute();
	}
	public function updateHorasTotaisAprovadas(Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		horasTotaisAprovadas = :horasTotaisAprovadas
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$horasTotaisAprovadas = $historico->getHorasTotAprov();
		
		$stmt->bindParam(":horasTotaisAprovadas", $horasTotaisAprovadas);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updateHorasTotaisPendentes(Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		horasTotaisPendentes = :horasTotaisPendentes
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$horasTotaisPendentes = $historico->getHorasTotPend();
		
		$stmt->bindParam(":horasTotaisPendentes", $horasTotaisPendentes);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updateEnsinoTotAprov (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		ensinoTotalAprov = :ensinoTotAprov
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$ensinoTotAprov = $historico->getEnsinoTotAprov();
		
		$stmt->bindParam(":ensinoTotAprov", $ensinoTotAprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updateExtensaoTotAprov (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		extensaoTotalAprov = :extensaoTotAprov
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$extensaoTotAprov= $historico->getExtensaoTotAprov();
		
		$stmt->bindParam(":extensaoTotAprov", $extensaoTotAprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updatePesquisaTotAprov (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		pesquisaTotalAprov = :pesquisaTotAprov
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$pesquisaTotAprov= $historico->getPesquisaTotAprov();
		
		$stmt->bindParam(":pesquisaTotAprov", $pesquisaTotAprov);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updateEnsino1Total (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		ensino1Total = :ensino1Total
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$ensino1Total= $historico->getEnsino1Total();
		
		$stmt->bindParam(":ensino1Total", $ensino1Total);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	
	
	public function updateEnsino2Total (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		ensino2Total = :ensino2Total
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$ensino2Total = $historico->getEnsino2Total();
		
		$stmt->bindParam(":ensino2Total", $ensino2Total);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updateEnsino3Total (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		ensino3Total = :ensino3Total
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$ensino3Total = $historico->getEnsino3Total();
		
		$stmt->bindParam(":ensino3Total", $ensino3Total);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updateEnsino4Total (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		ensino4Total = :ensino4Total
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$ensino4Total = $historico->getEnsino4Total();
		
		$stmt->bindParam(":ensino4Total", $ensino4Total);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updateExtensao1Total (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		extensao1Total = :extensao1Total
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$extensao1Total = $historico->getExtensao1Total();
		
		$stmt->bindParam(":extensao1Total", $extensao1Total);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updateExtensao2Total (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		extensao2Total = :extensao2Total
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$extensao2Total = $historico->getExtensao2Total();
		
		$stmt->bindParam(":extensao2Total", $extensao2Total);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updateExtensao3Total (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		extensao3Total = :extensao3Total
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$extensao3Total = $historico->getExtensao3Total();
		
		$stmt->bindParam(":extensao3Total", $extensao3Total);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updatePesquisa1Total (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		pesquisa1Total = :pesquisa1Total
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$pesquisa1Total = $historico->getPesquisa1Total();
		
		$stmt->bindParam(":pesquisa1Total", $pesquisa1Total);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updatePesquisa2Total (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		pesquisa2Total = :pesquisa2Total
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$pesquisa2Total = $historico->getPesquisa2Total();
		
		$stmt->bindParam(":pesquisa2Total", $pesquisa2Total);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	public function updatePesquisa3Total (Historico $historico){
		$stmt = $this->conn->prepare("UPDATE historico SET
		pesquisa3Total = :pesquisa3Total
		WHERE idHistorico = :id
		");
		$id = $historico->getId();
		$pesquisa3Total = $historico->getPesquisa3Total();
		
		$stmt->bindParam(":pesquisa3Total", $pesquisa3Total);
		$stmt->bindParam(":id", $id);
	    $stmt->execute();
		
	}
	
	
	public function findById($id){
		if($id != ""){
			$stmt = $this->conn->prepare("SELECT * FROM historico WHERE idHistorico = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$historico = $this->buildHistorico($data);
				return $historico;
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