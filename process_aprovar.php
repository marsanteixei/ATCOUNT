<?php
require_once("templates/header3.php");
?>

<?php
require_once("globals.php");
require_once("db.php");
require_once("dao/PlanejamentoDAO.php");
$msg = new Msg($BASE_URL);
require_once("dao/MensagemDAO.php");
require_once("dao/HistoricoDAO.php");
$mensagemDao = new MensagemDAO($conn,$BASE_URL );
$planejamentoDao = new PlanejamentoDAO($conn, $BASE_URL);
$historicoDao = new HistoricoDAO($conn, $BASE_URL);
 
if($_POST){
	$codigo = $_POST['codigo'];
	$texto = $_POST['mensagem'];
	$planejamento = $planejamentoDao->findByCodigo($codigo);
	$x = $planejamento->getAguardandoValidar();
	$y = $planejamento->getFechado();
	$z = $planejamento->getStatus();
	$Object = new DateTime(); 
	$Object->setTimezone(new DateTimeZone("America/Sao_Paulo"));
	$dataFechamento = $Object->format('d/m/Y');
	
	
if($x==0 && $y==1 && $z=="Aprovado"){
	$msg->setMessage("Planejamento já fechado e aprovado.","error","aprovar.php");
}
else{
	  if($x==1 && $y==0 && $z== null){
		  
	   if($texto!=null){
		$mensagem = new Mensagem();
		$aux = md5(uniqid(""));
		$mensagem->setIdMensagem($aux);
		$mensagem->setTexto($texto);
		$mensagem->setPlanejamento($planejamento);
		$mensagem->setCoordenador($coordenadorData);
		$mensagemDao->create($mensagem);
	    }
	    if(isset($_POST['aprovar'])){
			//atualizando planejamento
            $planejamento->AprovarPlanejamento($dataFechamento);
			$planejamentoDao->updateAguardandoValidar($planejamento);
			$planejamentoDao->updateHorasTotaisAprovadas($planejamento);
			$planejamentoDao->updateEnsinoTotAprov($planejamento);
			$planejamentoDao->updateExtensaoTotAprov($planejamento);
			$planejamentoDao->updatePesquisaTotAprov($planejamento);
			$planejamentoDao->updateEnsino1Aprov($planejamento);
			$planejamentoDao->updateEnsino2Aprov($planejamento);
			$planejamentoDao->updateEnsino3Aprov($planejamento);
			$planejamentoDao->updateEnsino4Aprov($planejamento);
			$planejamentoDao->updateExtensao1Aprov($planejamento);
			$planejamentoDao->updateExtensao2Aprov($planejamento);
			$planejamentoDao->updateExtensao3Aprov($planejamento);
			$planejamentoDao->updatePesquisa1Aprov($planejamento);
			$planejamentoDao->updatePesquisa2Aprov($planejamento);
			$planejamentoDao->updatePesquisa3Aprov($planejamento);
			
			//atualizando historico
			$idHistorico = $planejamento->getIdHistorico();
	        $historico = $historicoDao->findById($idHistorico);
			
			$ensino1Total = $historico->getEnsino1Total();
			$somaEnsino1 = $ensino1Total + $planejamento->getEnsino1Aprov();
			$historico->setEnsino1Total($somaEnsino1);
			$ensino2Total = $historico->getEnsino2Total();
			$somaEnsino2 = $ensino2Total + $planejamento->getEnsino2Aprov();
			$historico->setEnsino2Total($somaEnsino2);
			$ensino3Total = $historico->getEnsino3Total();
			$somaEnsino3 = $ensino3Total + $planejamento->getEnsino3Aprov();
			$historico->setEnsino3Total($somaEnsino3);
			$ensino4Total = $historico->getEnsino4Total();
			$somaEnsino4 = $ensino4Total + $planejamento->getEnsino4Aprov();
			$historico->setEnsino4Total($somaEnsino4);
			
			$extensao1Total = $historico->getExtensao1Total();
			$somaExtensao1 = $extensao1Total + $planejamento->getExtensao1Aprov();
			$historico->setExtensao1Total($somaExtensao1);
			$extensao2Total = $historico->getExtensao2Total();
			$somaExtensao2 = $extensao2Total + $planejamento->getExtensao2Aprov();
			$historico->setExtensao2Total($somaExtensao2);
			$extensao3Total = $historico->getExtensao3Total();
			$somaExtensao3 = $extensao3Total + $planejamento->getExtensao3Aprov();
			$historico->setExtensao3Total($somaExtensao3);
			
			$pesquisa1Total = $historico->getPesquisa1Total();
			$somaPesquisa1 = $pesquisa1Total + $planejamento->getPesquisa1Aprov();
			$historico->setPesquisa1Total($somaPesquisa1);
			$pesquisa2Total = $historico->getPesquisa2Total();
			$somaPesquisa2 = $pesquisa2Total + $planejamento->getPesquisa2Aprov();
			$historico->setPesquisa2Total($somaPesquisa2);
			$pesquisa3Total = $historico->getPesquisa3Total();
			$somaPesquisa3 = $pesquisa3Total + $planejamento->getPesquisa3Aprov();
			$historico->setPesquisa3Total($somaPesquisa3);
			
			$historico->somarhorasTotAprov();
			$historico->verificarhorasTotPend();
			
			//upando dados no banco
			$historicoDao->updateHorasTotaisAprovadas($historico);
			$historicoDao->updateHorasTotaisPendentes($historico);
			$historicoDao->updateEnsinoTotAprov($historico);
			$historicoDao->updateExtensaoTotAprov($historico);
			$historicoDao->updatePesquisaTotAprov($historico);
			$historicoDao->updateEnsino1Total($historico);
			$historicoDao->updateEnsino2Total($historico);
			$historicoDao->updateEnsino3Total($historico);
			$historicoDao->updateEnsino4Total($historico);
			$historicoDao->updateExtensao1Total($historico);
			$historicoDao->updateExtensao2Total($historico);
			$historicoDao->updateExtensao3Total($historico);
			$historicoDao->updatePesquisa1Total($historico);
			$historicoDao->updatePesquisa2Total($historico);
			$historicoDao->updatePesquisa3Total($historico);
			
			$msg->setMessage("Planejamento aprovado.","success","aprovar.php");
            }
            else{
	             if(isset($_POST['reprovar'])){
		            $planejamento->ReprovarPlanejamento($dataFechamento);
					$planejamentoDao->updateAguardandoValidar($planejamento);
					$msg->setMessage("Planejamento reprovado.","success","aprovar.php");
		
	                }
                }
	   
	   
		}
		else{
			 if($x==0 && $y==1 && $z=="Reprovado"){
				$msg->setMessage("Planejamento já fechado e reprovado.","error","aprovar.php");
				}
						 
			}
	}

}
?>
<?php
require_once("templates/footer_2.php");
?>