<?php

require_once("models/AtiviDivulgacao.php");
require_once("models/Msg.php");


class AtiviDivulgacaoDAO implements atividadeDivulgDAOInterface {
	private $conn;
	private $url;
	private $msg;
	
	public function __construct (PDO $conn, $url){
		$this->conn = $conn;
		$this->url = $url;
		$this->msg = new Msg($url);
	}
	public function buildAtivDiv($data){
		$ativiDivulgacao = new AtiviDivulgacao();
		$ativiDivulgacao->setId($data["idDiv"]);
		$ativiDivulgacao->setNome($data["nome"]);
		$ativiDivulgacao->setDescricao($data["descricao"]);
		$ativiDivulgacao->setData($data["data"]);
		$ativiDivulgacao->setHoras($data["horas"]);
		$ativiDivulgacao->setHorario($data["horario"]);
		$ativiDivulgacao->setLogradouro($data["logradouro"]);
		$ativiDivulgacao->setNumero($data["numero"]);
		$ativiDivulgacao->setBairro($data["bairro"]);
		$ativiDivulgacao->setCidade($data["cidade"]);
		$ativiDivulgacao->setUf($data["uf"]);
		$ativiDivulgacao->setCep($data["cep"]);
		$ativiDivulgacao->setInstituicao($data["instituicao"]);
		return $ativiDivulgacao;
	}
	public function create(AtiviDivulgacao $ativiDivulgacao){
		$stmt = $this->conn->prepare("INSERT INTO ativdivulgacao ( nome, descricao, data, horas, horario, logradouro, numero, bairro, cidade, uf, cep, instituicao, id) 
		VALUES( :nome, :descricao, :data, :horas, :horario, :logradouro, :numero, :bairro, :cidade, :uf, :cep, :instituicao, :id)");
		
		$nome = $ativiDivulgacao->getNome();
		$descricao = $ativiDivulgacao->getDescricao();
		$data = $ativiDivulgacao->getData();
		$horas = $ativiDivulgacao->getHoras();
		$horario = $ativiDivulgacao->getHorario();
		$logradouro = $ativiDivulgacao->getLogradouro();
		$numero = $ativiDivulgacao->getNumero();
		$bairro = $ativiDivulgacao->getBairro();
		$cidade = $ativiDivulgacao->getCidade();
		$uf = $ativiDivulgacao->getUf();
		$cep = $ativiDivulgacao->getCep();
		$instituicao = $ativiDivulgacao->getInstituicao();
		$coordenador = $ativiDivulgacao->getCoordenador();
		$idCoordenador = $coordenador->getId();
		
		$stmt->bindParam(":nome",$nome);
		$stmt->bindParam(":descricao",$descricao);
		$stmt->bindParam(":data",$data);
		$stmt->bindParam(":horas",$horas);
		$stmt->bindParam(":horario",$horario);
		$stmt->bindParam(":logradouro",$logradouro );
		$stmt->bindParam(":numero",$numero);
		$stmt->bindParam(":bairro",$bairro);
		$stmt->bindParam(":cidade",$cidade);
		$stmt->bindParam(":uf",$uf);
		$stmt->bindParam(":cep",$cep);
		$stmt->bindParam(":instituicao",$instituicao);
		$stmt->bindParam(":id",$idCoordenador);
		$stmt->execute();
	}
	public function update(AtiviDivulgacao $ativiDivulgacao, $redirect = true){
		$stmt = $this->conn->prepare("UPDATE ativdivulgacao SET
		nome = :nome,
		descricao = :descricao,
		data = :data,
		horas = :horas,
		horario = :horario,
        logradouro = :logradouro, 
        numero = :numero,
		bairro = :bairro,
		cidade = :cidade,
		uf = :uf,
		cep = :cep,
		instituicao = :instituicao
		WHERE idDiv = :idDiv
		");
		
		$id = $ativiDivulgacao->getId();
		$nome = $ativiDivulgacao->getNome();
		$descricao = $ativiDivulgacao->getDescricao();
		$data = $ativiDivulgacao->getData();
		$horas = $ativiDivulgacao->getHoras();
		$horario = $ativiDivulgacao->getHorario();
		$logradouro = $ativiDivulgacao->getLogradouro();
        $numero = $ativiDivulgacao->getNumero();
        $bairro = $ativiDivulgacao->getBairro();
		$cidade = $ativiDivulgacao->getCidade();
		$uf = $ativiDivulgacao->getUf();
	    $cep = $ativiDivulgacao->getCep();
		$instituicao = $ativiDivulgacao->getInstituicao();
		
	  $stmt->bindParam(":nome", $nome);
      $stmt->bindParam(":descricao", $descricao);
      $stmt->bindParam(":data", $data);
	  $stmt->bindParam(":horas", $horas);
      $stmt->bindParam(":horario", $horario);
      $stmt->bindParam(":logradouro", $logradouro);
      $stmt->bindParam(":numero", $numero );
	  $stmt->bindParam(":bairro", $bairro);
      $stmt->bindParam(":cidade", $cidade);
	  $stmt->bindParam(":uf", $uf);
	  $stmt->bindParam(":cep", $cep);
	  $stmt->bindParam(":instituicao", $instituicao);
	  $stmt->bindParam(":idDiv", $id);
	  
	   $stmt->execute();
	   
	    if($redirect) {

        // Redireciona para o perfil do usuario
        $this->msg->setMessage("Dados atualizados com sucesso!", "success", "mainCoordenador.php");

      }
		
		
	}
	public function findById($idDiv){
		if($idDiv != ""){
			$stmt = $this->conn->prepare("SELECT * FROM ativdivulgacao WHERE idDiv = :idDiv");
			$stmt->bindParam(":idDiv", $idDiv);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$ativiDivulgacao = $this->buildAtivDiv($data);
				return $ativiDivulgacao;
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
		$atividadesDiv = [];
		$stmt = $this->conn->query("SELECT * FROM ativdivulgacao");
		 $stmt->execute();

      if($stmt->rowCount() > 0) {

        $ativiDivArray = $stmt->fetchAll();
		foreach($ativiDivArray as $ativi) {
          $atividadesDiv[] = $this->buildAtivDiv($ativi);
        }
		return $atividadesDiv;
	}else{
		return false;
	}		
 }
}
?>