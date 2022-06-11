<?php

class Planejamento{
	private $id;
	private $codigo;
	private $dataAbertura;
	private $aguardandoValidar;
	private $fechado;
	private $status;
	private $dataFechamento;
	private $horasTotAprov;
	private $horasTotPrev;
	private $ensinoTotAprov;
	private $extensaoTotAprov;
	private $pesquisaTotAprov;
	private $ensino1Aprov; 
	private $ensino2Aprov; 
	private $ensino3Aprov;
	private $ensino4Aprov;
	private $extensao1Aprov; 
	private $extensao2Aprov; 
	private $extensao3Aprov;
	private $pesquisa1Aprov; 
	private $pesquisa2Aprov;
	private $pesquisa3Aprov;
	private $ensino1Prev; 
	private $ensino2Prev;
	private $ensino3Prev;
	private $ensino4Prev;
	private $extensao1Prev;
	private $extensao2Prev;
	private $extensao3Prev;
	private $pesquisa1Prev; 
	private $pesquisa2Prev;
	private $pesquisa3Prev;
	private $idHistorico;
	private $historico;
	private $atividades;
	private $comprovantes;
	private $mensagens;
	
	public function __construct(){
		$this->atividades = array();
		$this->comprovantes = array();
		$this->mensagens =  array();
	}
	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getCodigo(){
		return $this->codigo;
	}
	public function setCodigo($codigo){
		$this->codigo=$codigo;
	}
	
	public function getDataAbertura(){
		return $this->dataAbertura;
	}
	public function setDataAbertura($dataAbertura){
		$this->dataAbertura=$dataAbertura;
	}
	public function getAguardandoValidar(){
		return $this->aguardandoValidar;
	}
	public function setAguardandoValidar($aguardandoValidar){
	  $this->aguardandoValidar = $aguardandoValidar;
	}
	public function getFechado(){
		return $this->fechado;
	}
	public function setFechado($fechado){
		$this->fechado=$fechado;
	}
	public function getStatus(){
		return $this->status;
	}
	public function setStatus($status){
		$this->status=$status;
	}
	public function getDataFechamento(){
		return $this->dataFechamento;
	}
	public function setDataFechamento($dataFechamento){
		$this->dataFechamento=$dataFechamento;
	}
	public function getHorasTotAprov(){
		return $this->horasTotAprov;
	}
	public function setHorasTotAprov($horasTotAprov){
		$this->horasTotAprov=$horasTotAprov;
	}
	public function getHorasTotPrev(){
		return $this->horasTotPrev;
	}
	public function setHorasTotPrev($horasTotPrev){
		$this->horasTotPrev=$horasTotPrev;
	}
	public function getEnsinoTotAprov(){
		return $this->ensinoTotAprov;
	}
	public function setEnsinoTotAprov($ensinoTotAprov){
		$this->ensinoTotAprov=$ensinoTotAprov;
	}
	public function getExtensaoTotAprov(){
		return $this->extensaoTotAprov;
	}
	public function setExtensaoTotAprov($extensaoTotAprov){
		$this->extensaoTotAprov=$extensaoTotAprov;
	}
	public function getPesquisaTotAprov(){
		return $this->pesquisaTotAprov;
	}
	public function setPesquisaTotAprov($pesquisaTotAprov){
		$this->pesquisaTotAprov=$pesquisaTotAprov;
	}
	
	
	public function getEnsino1Aprov(){
		return $this->ensino1Aprov;
	}
	public function setEnsino1Aprov($ensino1Aprov){
		$this->ensino1Aprov = $ensino1Aprov;
	}
	public function getEnsino2Aprov(){
		return $this->ensino2Aprov;
	}
	public function setEnsino2Aprov($ensino2Aprov){
		$this->ensino2Aprov = $ensino2Aprov;
	}
	public function getEnsino3Aprov(){
		return $this->ensino3Aprov;
	}
	public function setEnsino3Aprov($ensino3Aprov){
		$this->ensino3Aprov = $ensino3Aprov;
	}
	public function getEnsino4Aprov(){
		return $this->ensino4Aprov;
	}
	public function setEnsino4Aprov($ensino4Aprov){
		$this->ensino4Aprov = $ensino4Aprov;
	}
	public function getExtensao1Aprov(){
		return $this->extensao1Aprov;
	}
	public function setExtensao1Aprov($extensao1Aprov){
		$this->extensao1Aprov = $extensao1Aprov;
	}
	public function getExtensao2Aprov(){
		return $this->extensao2Aprov;
	}
	public function setExtensao2Aprov($extensao2Aprov){
		$this->extensao2Aprov = $extensao2Aprov;
	}
	public function getExtensao3Aprov(){
		return $this->extensao3Aprov;
	}
	public function setExtensao3Aprov($extensao3Aprov){
		$this->extensao3Aprov = $extensao3Aprov;
	}
	public function getPesquisa1Aprov(){
		return $this->pesquisa1Aprov;
	}
	public function setPesquisa1Aprov($pesquisa1Aprov){
		$this->pesquisa1Aprov = $pesquisa1Aprov;
	}
	public function getPesquisa2Aprov(){
		return $this->pesquisa2Aprov;
	}
	public function setPesquisa2Aprov($pesquisa2Aprov){
		$this->pesquisa2Aprov = $pesquisa2Aprov;
	}
	public function getPesquisa3Aprov(){
		return $this->pesquisa3Aprov;
	}
	public function setPesquisa3Aprov($pesquisa3Aprov){
		$this->pesquisa3Aprov = $pesquisa3Aprov;
	}
	public function getEnsino1Prev(){
		return $this->ensino1Prev;
	}
	public function setEnsino1Prev($ensino1Prev){
		$this->ensino1Prev = $ensino1Prev;
	}
	public function getEnsino2Prev(){
		return $this->ensino2Prev;
	}
	public function setEnsino2Prev($ensino2Prev){
		$this->ensino2Prev = $ensino2Prev;
	}
	public function getEnsino3Prev(){
		return $this->ensino3Prev;
	}
	public function setEnsino3Prev($ensino3Prev){
		$this->ensino3Prev = $ensino3Prev;
	}
	public function getEnsino4Prev(){
		return $this->ensino4Prev;
	}
	public function setEnsino4Prev($ensino4Prev){
		$this->ensino4Prev = $ensino4Prev;
	}
	public function getExtensao1Prev(){
		return $this->extensao1Prev;
	}
	public function setExtensao1Prev($extensao1Prev){
		$this->extensao1Prev = $extensao1Prev;
	}
	public function getExtensao2Prev(){
		return $this->extensao2Prev;
	}
	public function setExtensao2Prev($extensao2Prev){
		$this->extensao2Prev = $extensao2Prev;
	}
	public function getExtensao3Prev(){
		return $this->extensao3Prev;
	}
	public function setExtensao3Prev($extensao3Prev){
		$this->extensao3Prev = $extensao3Prev;
	}
	public function getPesquisa1Prev(){
		return $this->pesquisa1Prev;
	}
	public function setPesquisa1Prev($pesquisa1Prev){
		$this->pesquisa1Prev = $pesquisa1Prev;
	}
	public function getPesquisa2Prev(){
		return $this->pesquisa2Prev;
	}
	public function setPesquisa2Prev($pesquisa2Prev){
		$this->pesquisa2Prev = $pesquisa2Prev;
	}
	public function getPesquisa3Prev(){
		return $this->pesquisa3Prev;
	}
	public function setPesquisa3Prev($pesquisa3Prev){
		$this->pesquisa3Prev = $pesquisa3Prev;
	}
	
	public function getIdHistorico(){
		return $this->idHistorico;
	}
	public function setIdHistorico($idHistorico){
		$this->idHistorico = $idHistorico;
	}
	public function addAtividade(Atividade $atividade){
		$this->atividades[] = $atividade;
	}
	public function getAtividades(){
		return $this->atividades;
	}
	public function setHistorico(Historico $historico){
		$this->historico = $historico;
	}
	public function getHistorico( ){
		return $this->historico;
	}
	public function addMensagem ( Mensagem $mensagem){
		$this->mensagens[] = $mensagem;
	}
	public function getMensagens(){
		return $this->mensagens;      
	}
	
	public function addComprovante(Comprovante $comprovante){
		$this->comprovantes[] = $comprovante;
	}
	public function getComprovantes(){
		return $this->comprovantes;
	}
	
	
//somar ensino 1
public function somarEnsino1($hor,$tip,$t){
	$totEnsino1=0;
	
	for($i=0;$i<$t; $i++){
		if($tip[$i] == "ENSINO1") {
			$totEnsino1 = $totEnsino1 + $hor[$i];
		}
    }
	
	return $totEnsino1;
}	

//somar ensino 2
public function somarEnsino2($hor,$tip,$t){
	$totEnsino2=0;
	
	for($i=0;$i<$t; $i++){
		if($tip[$i] == "ENSINO2") {
			$totEnsino2 = $totEnsino2 + $hor[$i];
		}
    }
	
	return $totEnsino2;
}

//somar ensino 3
public function somarEnsino3($hor,$tip,$t){
	$totEnsino3=0;
	
	for($i=0;$i<$t; $i++){
		if($tip[$i] == "ENSINO3") {
			$totEnsino3 = $totEnsino3 + $hor[$i];
		}
    }
	
	return $totEnsino3;
}	

//somar ensino 4
public function somarEnsino4($hor,$tip,$t){
	$totEnsino4=0;
	
	for($i=0;$i<$t; $i++){
		if($tip[$i] == "ENSINO4") {
			$totEnsino4 = $totEnsino4 + $hor[$i];
		}
    }
	
	return $totEnsino4;
}	

//somar extensao 1
public function somarExtensao1($hor,$tip,$t){
	 $totExt1=0;
	for($i=0;$i<$t; $i++){
	    if($tip[$i] == "EXTENSAO1"){
			$totExt1 = $totExt1 + $hor[$i];
		}
	}	
		return $totExt1;
}	

//somar extensao 2
public function somarExtensao2($hor,$tip,$t){
	 $totExt2=0;
	for($i=0;$i<$t; $i++){
	    if($tip[$i] == "EXTENSAO2"){
			$totExt2 = $totExt2 + $hor[$i];
		}
	}	
	return $totExt2;
}	

//somar extensao 3
public function somarExtensao3($hor,$tip,$t){
	$totExt3=0;
	for($i=0;$i<$t; $i++){
	    if($tip[$i] == "EXTENSAO3"){
			$totExt3 = $totExt3 + $hor[$i];
		}
	}	
	return $totExt3;
}	

//somar pesquisa 1
public function somarPesquisa1($hor,$tip,$t){
	$totPes1=0;
	for($i=0;$i<$t; $i++){
	if($tip[$i] == "PESQUISA1"){
			$totPes1 = $totPes1 + $hor[$i];
		}
	}
	return $totPes1;
}	

//somar pesquisa 2
public function somarPesquisa2($hor,$tip,$t){
	$totPes2=0;
	for($i=0;$i<$t; $i++){
	if($tip[$i] == "PESQUISA2"){
			$totPes2 = $totPes2 + $hor[$i];
		}
	}
	return $totPes2;
}

//somar pesquisa 3
public function somarPesquisa3($hor,$tip,$t){
	$totPes3=0;
	for($i=0;$i<$t; $i++){
	if($tip[$i] == "PESQUISA3"){
			$totPes3 = $totPes3 + $hor[$i];
		}
	}
	return $totPes3;	
}
public function somarEnsinoPrevisto(){
	$soma = $this->ensino1Prev + $this->ensino2Prev + $this->ensino3Prev + $this->ensino4Prev;
	return $soma;
}

public function somarExtensaoPrevisto(){
	$soma = $this->extensao1Prev + $this->extensao2Prev + $this->extensao3Prev;
	return $soma;
}

public function	somarPesquisaPrevisto(){
	$soma = $this->pesquisa1Prev + $this->pesquisa2Prev + $this->pesquisa3Prev;
	return $soma;
}

public function somarHorasTotPrevistas(){
	$soma1 = $this->somarEnsinoPrevisto(); 
	$soma2 = $this->somarExtensaoPrevisto();
	$soma3 = $this->somarPesquisaPrevisto();
	$this->horasTotPrev = $soma1 + $soma2 + $soma3;
}	

public function somarEnsinoAprovada(){
	$this->ensinoTotAprov = $this->ensino1Aprov + $this->ensino2Aprov + $this->ensino3Aprov + $this->ensino4Aprov;
}

public function somarExtensaoAprovada(){
	$this->extensaoTotAprov = $this->extensao1Aprov + $this->extensao2Aprov + $this->extensao3Aprov;
}

public function	somarPesquisaAprovada(){
	$this->pesquisaTotAprov = $this->pesquisa1Aprov + $this->pesquisa2Aprov + $this->pesquisa3Aprov;
}

public function somarHorasTotAprovadas(){
	$this->somarEnsinoAprovada();
	$this->somarExtensaoAprovada();
	$this->somarPesquisaAprovada();
	$this->horasTotAprov = $this->ensinoTotAprov + $this->extensaoTotAprov + $this->pesquisaTotAprov;
}

public function AprovarPlanejamento($dataFechamento){
	
	$this->aguardandoValidar = 0;
	$this->fechado = 1;
	$this->ensino1Aprov = $this->ensino1Prev;
	$this->ensino2Aprov = $this->ensino2Prev;
	$this->ensino3Aprov = $this->ensino3Prev;
	$this->ensino4Aprov = $this->ensino4Prev;
	$this->extensao1Aprov = $this->extensao1Prev;
	$this->extensao2Aprov = $this->extensao2Prev;
	$this->extensao3Aprov = $this->extensao3Prev;
	$this->pesquisa1Aprov = $this->pesquisa1Prev; 
	$this->pesquisa2Aprov = $this->pesquisa2Prev;
	$this->pesquisa3Aprov = $this->pesquisa3Prev;
	$this->somarHorasTotAprovadas();
	$this->dataFechamento = $dataFechamento;
	$this->status="Aprovado";
	
}
public function ReprovarPlanejamento($dataFechamento){
	$this->aguardandoValidar = 0;
	$this->fechado = 1;
	$this->dataFechamento = $dataFechamento;
	$this->status="Reprovado";
}
}
interface planejamentoDAOInterface{
	
	public function buildPlanejamento($data);
	public function create(Planejamento $planejamento);
	public function updateAguardandoValidar(Planejamento $planejamento);
	public function updateHorasTotaisAprovadas(Planejamento $planejamento);
	public function updateHorasTotaisPrevistas (Planejamento $planejamento);
	public function updateEnsinoTotAprov(Planejamento $planejamento);
	public function updateExtensaoTotAprov(Planejamento $planejamento);
	public function updatePesquisaTotAprov(Planejamento $planejamento);
	public function updateEnsino1Aprov(Planejamento $planejamento);
	public function updateEnsino2Aprov(Planejamento $planejamento);
	public function updateEnsino3Aprov(Planejamento $planejamento);
	public function updateEnsino4Aprov(Planejamento $planejamento);
	public function updateExtensao1Aprov(Planejamento $planejamento);
	public function updateExtensao2Aprov(Planejamento $planejamento);
	public function updateExtensao3Aprov(Planejamento $planejamento);
	public function updatePesquisa1Aprov(Planejamento $planejamento);
	public function updatePesquisa2Aprov(Planejamento $planejamento);
	public function updatePesquisa3Aprov(Planejamento $planejamento);
	public function updateEnsino1Prev (Planejamento $planejamento);
	public function updateEnsino2Prev (Planejamento $planejamento);
	public function updateEnsino3Prev (Planejamento $planejamento);
	public function updateEnsino4Prev (Planejamento $planejamento);
	public function updateExtensao1Prev (Planejamento $planejamento);
	public function updateExtensao2Prev (Planejamento $planejamento);
	public function updateExtensao3Prev (Planejamento $planejamento);
	public function updatePesquisa1Prev (Planejamento $planejamento);
	public function updatePesquisa2Prev (Planejamento $planejamento);
	public function updatePesquisa3Prev (Planejamento $planejamento);
	public function findById($id);
	public function findByCodigo($codigo);
	public function findAllByAluno($id);
	public function findAll();
	}
?>