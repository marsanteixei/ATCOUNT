<?php
require_once("models/Mensagem.php");
require_once("models/Msg.php");
class MensagemDAO implements mensagemDAOInterface {
	private $conn;
	private $url;
	private $msg;
	
	public function __construct (PDO $conn, $url){
		$this->conn = $conn;
		$this->url = $url;
		$this->msg = new Msg($url);
	}
	public function buildMensagem($data){
		$mensagem = new Mensagem();
		$mensagem->setIdMensagem($data["idMensagem"]);
		$mensagem->setTexto($data["texto"]);
		$mensagem->setIdPlanej($data["idPlanej"]);
		return $mensagem;
	}
	
	public function create(Mensagem $mensagem){
		$stmt = $this->conn->prepare("INSERT INTO mensagem (idMensagem, texto, idPlanej, id) VALUES (:idMensagem, :texto, :idPlanej, :id)");
		$idMensagem = $mensagem->getIdMensagem();
		$texto = $mensagem->getTexto();
		$planejamento = $mensagem->getPlanejamento();
		$idPlanej = $planejamento->getId();
		$coordenador = $mensagem->getCoordenador();
		$id = $coordenador->getId();
		$stmt->bindParam(":idMensagem",$idMensagem);
		$stmt->bindParam(":texto",$texto);
		$stmt->bindParam(":idPlanej",$idPlanej);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
	}
	
	
	public function findByIdPlanej($id){
		if($id != ""){
			$stmt = $this->conn->prepare("SELECT * FROM mensagem WHERE idPlanej = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$mensagem = $this->buildMensagem($data);
				return $mensagem;
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