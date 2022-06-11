<?php
//date_default_timezone_set();
require_once("globals.php");
require_once("db.php");
require_once("dao/AlunoDAO.php");
require_once("dao/PlanejamentoDAO.php");
require_once("dao/AtividadeDAO.php");
require_once("dao/TipoDAO.php");
require_once("dao/HistoricoDAO.php");
require_once("dao/ComprovanteDAO.php");

$msg = new Msg($BASE_URL);


//validando valores nulos
function verificar($Tipo, $Descricao, $Horas,  $Data, $t1){
	$aux =0;
	for ($i=0; $i<$t1; $i++){
		if($Tipo[$i] != null && $Descricao[$i] != null && $Horas[$i] != null && $Data[$i] != null && $Horas[$i]>0){
			$aux++;
		}
	}
	if($aux == $t1){
		return true;
	}else{
		return false;
	}
}

//validando horas requisitadas por tipo
function verificarHorasTipo($hor,$tip,$hist,$t){
	$totEnsino1=0;
	$totEnsino2=0;
	$totEnsino3=0;
	$totEnsino4=0;
	$totExt1=0;
	$totExt2=0;
	$totExt3=0;
	$totPes1=0;
	$totPes2=0;
	$totPes3=0;
	
	for($i=0;$i<$t; $i++){
		if($tip[$i] == "ENSINO1") {
			$ensino1 = $hist->getEnsino1Total();
			$totEnsino1 = $totEnsino1 + $hor[$i];
			$somaEns1 = $ensino1 + $totEnsino1;
			if($somaEns1>20){
				return false;
			}
		}
		if($tip[$i] == "ENSINO2"){
			$ensino2 = $hist->getEnsino2Total();
			$totEnsino2 = $totEnsino2 + $hor[$i];
			$somaEns2 = $ensino2 + $totEnsino2;
			if($somaEns2>20){
				return false;
			}
		}
		if($tip[$i] == "ENSINO3"){
			$ensino3 = $hist->getEnsino3Total();
			$totEnsino3 = $totEnsino3 + $hor[$i];
			$somaEns3 = $ensino3 + $totEnsino3;
			if($somaEns3 > 20){
				return false;
			}
		}
		if($tip[$i] == "ENSINO4"){
			$ensino4 = $hist->getEnsino4Total();
			$totEnsino4 = $totEnsino4 + $hor[$i];
			$somaEns4 = $ensino4 + $totEnsino4;
			if($somaEns4>20){
				return false;
			}
		}
		if($tip[$i] == "EXTENSAO1"){
			$extensao1 = $hist->getExtensao1Total();
			$totExt1 = $totExt1 + $hor[$i];
			$somaExt1 = $extensao1 + $totExt1;
			if($somaExt1>30){
				return false;
			}
		}
		if($tip[$i] == "EXTENSAO2"){
			$extensao2 = $hist->getExtensao2Total();
			$totExt2 = $totExt2 + $hor[$i];
			$somaExt2 = $extensao2 + $totExt2;
			if($somaExt2>30){
				return false;
			}
		}
		if($tip[$i] == "EXTENSAO3"){
			$extensao3 = $hist->getExtensao3Total();
			$totExt3 = $totExt3 + $hor[$i];
			$somaExt3 = $extensao3 + $totExt3;
			if($somaExt3>10){
				return false;
			}
		}
		if($tip[$i] == "PESQUISA1"){
			$pesquisa1 = $hist->getPesquisa1Total();
			$totPes1 = $totPes1 + $hor[$i];
			$somaPes1 = $pesquisa1 + $totPes1;
			if($somaPes1>20){
				return false;
			}
		}
		if($tip[$i] == "PESQUISA2"){
			$pesquisa2 = $hist->getPesquisa2Total();
			$totPes2 = $totPes2 + $hor[$i];
			$somaPes2 = $pesquisa2 + $totPes2;
			if($somaPes2>20){
			  return false;
			}
		}
		if($tip[$i] == "PESQUISA3"){
			$pesquisa3 = $hist->getPesquisa3Total();
			$totPes3 = $totPes3 + $hor[$i];
			$somaPes3 = $pesquisa3 + $totPes3;
			if($somaPes3>20){
				return false;
			}
		}
	}
	return true;	
}

//somando horas requisitadas por modalidade
function somarEnsino($hor,$tip,$hist,$t){
	$totEnsino1=0;
	$totEnsino2=0;
	$totEnsino3=0;
	$totEnsino4=0;
	for($i=0;$i<$t; $i++){
		if($tip[$i] == "ENSINO1") {
			$totEnsino1 = $totEnsino1 + $hor[$i];
		}
		if($tip[$i] == "ENSINO2"){
			$totEnsino2 = $totEnsino2 + $hor[$i];
		}
		if($tip[$i] == "ENSINO3"){
			$totEnsino3 = $totEnsino3 + $hor[$i];
		}
		if($tip[$i] == "ENSINO4"){
			$totEnsino4 = $totEnsino4 + $hor[$i];
		}
    }
	$soma = $totEnsino1 + $totEnsino2 +$totEnsino3 +$totEnsino4;
	return $soma;
}	
function somarExtensao($hor,$tip,$hist,$t){
	$totExt1=0;
	$totExt2=0;
	$totExt3=0;
	for($i=0;$i<$t; $i++){
		if($tip[$i] == "EXTENSAO1"){
			$totExt1 = $totExt1 + $hor[$i];
		}
		if($tip[$i] == "EXTENSAO2"){
			$totExt2 = $totExt2 + $hor[$i];
		}
		if($tip[$i] == "EXTENSAO3"){
			$totExt3 = $totExt3 + $hor[$i];
		}
	}
	$soma = $totExt1 + $totExt2 + $totExt3;
	return $soma;
}
function somarPesquisa($hor,$tip,$hist,$t){
	$totPes1=0;
	$totPes2=0;
	$totPes3=0;
	for($i=0;$i<$t; $i++){
		if($tip[$i] == "PESQUISA1"){
			$totPes1 = $totPes1 + $hor[$i];
		}
		if($tip[$i] == "PESQUISA2"){
			$totPes2 = $totPes2 + $hor[$i];
		}
		if($tip[$i] == "PESQUISA3"){
			$totPes3 = $totPes3 + $hor[$i];
		}
	}
	$soma = $totPes1 + $totPes2 + $totPes3;
	return $soma;
}


if($_POST){
$vetTipo = $_POST['tipo'];
$vetDescricao = $_POST['descricao'];
$vetHoras = $_POST['horas'];
$vetData = $_POST['data'];
$vetComprovante = $_POST['comprovante'];
$tam = count($vetTipo);
$valid1 = verificar($vetTipo, $vetDescricao, $vetHoras,  $vetData, $tam);

//trabalhando com os arquivos

$qtd_arquivos = count($_FILES['comprovante']['name']);
if($tam == $qtd_arquivos){
for ($i = 0; $i < $qtd_arquivos; $i++) {
 $vetComprovante = $_FILES['comprovante'];
  $resp = move_uploaded_file($vetComprovante['tmp_name'][$i], 'upload_files/' . $vetComprovante['name'][$i]);     
}
}else{
	$msg->setMessage("A quantidade de atividades cadastradas deve ser igual ao de comprovantes.","error", "back");
}

//verificando aluno e pegando dados do historico
$historicoDao = new HistoricoDAO($conn,$BASE_URL );
$alunoDao = new AlunoDAO($conn,$BASE_URL );

$alunoData = $alunoDao->verifyToken(true);
$idAluno = $alunoData->getId();
$idHistorico = $alunoDao->getIdHistorico($idAluno);
$historico = $historicoDao->findById($idHistorico);

if($valid1 && $resp){
	$valid2 = verificarHorasTipo($vetHoras,$vetTipo,$historico,$tam);   
	if($valid2){
		$totalEnsino = somarEnsino($vetHoras,$vetTipo,$historico,$tam);
		$totalExtensao = somarExtensao($vetHoras,$vetTipo,$historico,$tam);
		$totalPesquisa = somarPesquisa($vetHoras,$vetTipo,$historico,$tam);
		$ens = $historico->getEnsinoTotAprov();
		$ext = $historico->getExtensaoTotAprov();
		$pes = $historico->getPesquisaTotAprov();
		if((($totalEnsino+$ens)<= 60) && (($totalExtensao+$ext)<=40) && (($totalPesquisa+$pes)<=30)){
	          //abrindo planejamento
	          $planejamentoDao = new PlanejamentoDAO($conn, $BASE_URL);
			  $planejamento = new Planejamento();
	          $idPlanej = md5(uniqid(""));
	          $codigo = uniqid("PLAN");
			  $Object = new DateTime(); 
			  $Object->setTimezone(new DateTimeZone("America/Sao_Paulo"));
	          $dataAbertura = $Object->format('d/m/Y');
	          $aguardandoValidar = 1;
	          $fechado = 0;
			  $status = null;
              $dataFechamento = null;
              $horasTotaisAprovadas = 0;
              $horasTotaisPrevistas = $totalEnsino + $totalExtensao + $totalPesquisa;
              $ensinoTotAprov = 0;
              $extensaoTotAprov = 0;
              $pesquisaTotAprov = 0;
			  $ensino1Aprov = 0;
	          $ensino2Aprov = 0;
	          $ensino3Aprov = 0;
	          $ensino4Aprov = 0;
	          $extensao1Aprov = 0; 
	          $extensao2Aprov = 0; 
	          $extensao3Aprov = 0;
	          $pesquisa1Aprov = 0;
	          $pesquisa2Aprov = 0;
	          $pesquisa3Aprov = 0;
	          $ensino1Prev = $planejamento->somarEnsino1($vetHoras,$vetTipo,$tam);
	          $ensino2Prev = $planejamento->somarEnsino2($vetHoras,$vetTipo,$tam);
	          $ensino3Prev = $planejamento->somarEnsino3($vetHoras,$vetTipo,$tam);
	          $ensino4Prev = $planejamento->somarEnsino4($vetHoras,$vetTipo,$tam);
	          $extensao1Prev = $planejamento->somarExtensao1($vetHoras,$vetTipo,$tam);
	          $extensao2Prev = $planejamento->somarExtensao2($vetHoras,$vetTipo,$tam);
	          $extensao3Prev = $planejamento->somarExtensao3($vetHoras,$vetTipo,$tam);
	          $pesquisa1Prev = $planejamento->somarPesquisa1($vetHoras,$vetTipo,$tam);
	          $pesquisa2Prev = $planejamento->somarPesquisa2($vetHoras,$vetTipo,$tam);
	          $pesquisa3Prev = $planejamento->somarPesquisa3($vetHoras,$vetTipo,$tam);
	
	          //setando valores para planejamento
	          $planejamento->setId($idPlanej);
	          $planejamento->setCodigo($codigo);
	          $planejamento->setDataAbertura($dataAbertura);
	          $planejamento->setAguardandoValidar($aguardandoValidar);
	          $planejamento->setFechado($fechado);
			  $planejamento->setStatus($status);
	          $planejamento->setDataFechamento($dataFechamento);
	          $planejamento->setHorasTotAprov($horasTotaisAprovadas);
	          $planejamento->setHorasTotPrev($horasTotaisPrevistas);
	          $planejamento->setEnsinoTotAprov($ensinoTotAprov);
	          $planejamento->setExtensaoTotAprov($extensaoTotAprov);
	          $planejamento->setPesquisaTotAprov($pesquisaTotAprov);
			  $planejamento->setEnsino1Aprov($ensino1Aprov); 
	          $planejamento->setEnsino2Aprov($ensino2Aprov); 
	          $planejamento->setEnsino3Aprov($ensino3Aprov);
	          $planejamento->setEnsino4Aprov($ensino4Aprov);
	          $planejamento->setExtensao1Aprov($extensao1Aprov); 
	          $planejamento->setExtensao2Aprov($extensao2Aprov); 
	          $planejamento->setExtensao3Aprov($extensao3Aprov);
	          $planejamento->setPesquisa1Aprov($pesquisa1Aprov); 
	          $planejamento->setPesquisa2Aprov($pesquisa2Aprov);
	          $planejamento->setPesquisa3Aprov($pesquisa3Aprov);
	          $planejamento->setEnsino1Prev($ensino1Prev); 
	          $planejamento->setEnsino2Prev($ensino2Prev);
	          $planejamento->setEnsino3Prev($ensino3Prev);
	          $planejamento->setEnsino4Prev($ensino4Prev);
	          $planejamento->setExtensao1Prev($extensao1Prev);
	          $planejamento->setExtensao2Prev($extensao2Prev);
	          $planejamento->setExtensao3Prev($extensao3Prev);
              $planejamento->setPesquisa1Prev($pesquisa1Prev); 
	          $planejamento->setPesquisa2Prev($pesquisa2Prev);
	          $planejamento->setPesquisa3Prev($pesquisa3Prev);
	          $planejamento->setHistorico($historico);
	          $planejamentoDao->create($planejamento);
	
	          //criando atividades e comprovantes
			  $atividadeDao = new AtividadeDAO($conn, $BASE_URL);
			  $comprovanteDao = new ComprovanteDAO($conn, $BASE_URL);
			  $tipoDao = new TipoDAO($conn,$BASE_URL );
	          for($j=0; $j<$tam; $j++){
		         $atividade = new Atividade();
				 $comprovante = new Comprovante();
		         $tipo = $tipoDao->findByCodigo($vetTipo[$j]); 
		         $idAtiv = md5(uniqid(""));
				 $idComprov = md5(uniqid(""));
				 $comprovante->setId($idComprov);
				 $comprovante->setDoc($vetComprovante['name'][$j]);
				 $comprovante->setPlanejamento($planejamento);
		         $atividade->setId($idAtiv);
		         $atividade->setDescricao($vetDescricao[$j]);
		         $atividade->setHoras($vetHoras[$j]);
		         $atividade->setData($vetData[$j]);
		         $atividade->setPlanejamento($planejamento);
		         $atividade->setTipo($tipo);
				 $comprovanteDao->create($comprovante);
		         $atividadeDao->create($atividade);
	        }
			$msg->setMessage("Cadastro de atividades realizado.","success", "back");
		}
		else{
			$msg->setMessage("O total de horas permitidas por modalidade foi excedida.","error", "back");
		}
	
   }
   else{
	   $msg->setMessage("O total de horas permitidas por tipo foi excedida.","error", "back");
   }
	
}
else{
	$msg->setMessage("Por favor, preencha todos os campos e anexos. A quantidade de horas deve ser maior que zero.","error", "back");}
}


?>