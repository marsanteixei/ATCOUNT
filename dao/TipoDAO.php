<?php
require_once("models/Tipo.php");
require_once("models/Msg.php");
class TipoDAO implements tipoDAOInterface {
	private $conn;
	private $url;
	private $msg;
	
	public function __construct (PDO $conn, $url){
		$this->conn = $conn;
		$this->url = $url;
		$this->msg = new Msg($url);
	}
	
	public function buildTipo($data){
		$tipo = new Tipo();
		$tipo->setId($data["idTipo"]);
		$tipo->setCodigo($data["codigo"]);
		$tipo->setNome($data["nome"]);
		$tipo->setHoraMax($data["horaMax"]);
		$tipo->setDescricao($data["descricao"]);
		return $tipo;
	}
	
	public function findById($id){
		if($id != ""){
			$stmt = $this->conn->prepare("SELECT * FROM tipo WHERE idTipo = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$tipo = $this->buildTipo($data);
				return $tipo;
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
			$stmt = $this->conn->prepare("SELECT * FROM tipo WHERE codigo = :codigo");
			$stmt->bindParam(":codigo", $codigo);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$tipo = $this->buildTipo($data);
				return $tipo;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		
	}
	
	public function findAll(){
		$tipos = [];
		$stmt = $this->conn->query("SELECT * FROM tipo");
		 $stmt->execute();

      if($stmt->rowCount() > 0) {

        $tipoArray = $stmt->fetchAll();
		foreach($tipoArray as $tip) {
          $tipos[] = $this->buildTipo($tip);
        }
		return $tipos;
	}else{
		return false;
	}		
 }
	
}

?>