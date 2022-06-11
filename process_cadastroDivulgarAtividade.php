<?php
require_once("globals.php");
require_once("db.php");
require_once("dao/AtiviDivulgacaoDAO.php");
require_once("dao/CoordenadorDAO.php");

$msg = new Msg($BASE_URL); 
$ativiDivulgacaoDao = new AtiviDivulgacaoDAO ($conn, $BASE_URL);
$coordenadorDao = new CoordenadorDAO($conn, $BASE_URL);
//resgata o tipo de input
 $type= filter_input(INPUT_POST, "type");
 
 //mapeando os dados
 $nome= filter_input(INPUT_POST, "nome");
 $descricao= filter_input(INPUT_POST, "descricao");
 $data= filter_input(INPUT_POST, "data");
 $horas= filter_input(INPUT_POST, "horas");
 $horario= filter_input(INPUT_POST, "horario");
 $logradouro= filter_input(INPUT_POST, "logradouro");
 $numero= filter_input(INPUT_POST, "numero");
 $bairro= filter_input(INPUT_POST, "bairro");
 $cidade= filter_input(INPUT_POST, "cidade");
 $uf= filter_input(INPUT_POST, "uf");
 $cep= filter_input(INPUT_POST, "cep");
 $instituicao= filter_input(INPUT_POST, "instituicao");
 $token = $_SESSION["token"];
 
 //identificando Coordenador
 $coordenador = new Coordenador();
 $coordenador = $coordenadorDao->findbyToken($token);
 
 if($nome && $descricao && $data && $horas && $instituicao ){
	 //criando atividade para divulgação
	 $ativiDivulgação = new AtiviDivulgacao();
	 //setando valores
	 $ativiDivulgação->setNome($nome);
	 $ativiDivulgação->setDescricao($descricao);
	 $ativiDivulgação->setData($data);
	 $ativiDivulgação->setHoras($horas);
	 $ativiDivulgação->setHorario($horario);
	 $ativiDivulgação->setLogradouro($logradouro);
	 $ativiDivulgação->setNumero($numero);
	 $ativiDivulgação->setBairro($bairro);
	 $ativiDivulgação->setCidade($cidade);
	 $ativiDivulgação->setUf($uf);
	 $ativiDivulgação->setCep($cep);
	 $ativiDivulgação->setInstituicao($instituicao);
	 $ativiDivulgação->setCoordenador($coordenador);
	 $ativiDivulgacaoDao->create( $ativiDivulgação);
	 $msg->setMessage("Atividade cadastrada com sucesso.","success", "back");
 }
 else{
	 $msg->setMessage("Por favor, preencha os campos obrigatórios (nome, descrição, data, horas e instituição).","error", "back");
 }



?>