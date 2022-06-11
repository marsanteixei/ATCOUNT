<?php
require_once("templates/header2.php");
?>
<?php
require_once("globals.php");
require_once("db.php");
require_once("dao/PlanejamentoDAO.php");
require_once("dao/AtividadeDAO.php");
require_once("dao/TipoDAO.php");
require_once("dao/MensagemDAO.php");
$mensagemDao = new MensagemDAO($conn,$BASE_URL );
$msg = new Msg($BASE_URL); 
$planejamentoDao = new PlanejamentoDAO($conn, $BASE_URL);
$atividadeDao = new AtividadeDAO($conn, $BASE_URL);
$tipoDao = new TipoDAO($conn, $BASE_URL);
//resgata o tipo de input
 $type= filter_input(INPUT_POST, "type");
 
 //mapeando os dados
 $codigo= filter_input(INPUT_POST, "codigo");
 
 //verificação dos dados 
if($codigo){
$planejamento = $planejamentoDao->findByCodigo($codigo);
if($planejamento!= false){
	
	$idPlan = $planejamento->GetId();
	$atividades = $atividadeDao->findAllByPlanej($idPlan);
	$mensagem = $mensagemDao->findByIdPlanej($idPlan);
   
     for($i=0; $i<count($atividades);$i++){
		 $atividade = new Atividade();
		 $atividade = $atividades[$i];
		 $idTipo = $atividade->getIdTipo(); 
         $tipo = $tipoDao->findById($idTipo);
         $atividade->setTipo($tipo);
         $planejamento->addAtividade($atividade);		 
	 }
	require_once("mostrarPlan.php");
}
else{
	$msg->setMessage("Planejamento não encontrado, informe um código valido.","error", "back");
}
}
else{
	 $msg->setMessage("Por favor, preencha o codigo do planejamento.","error", "back");
}
?>
<?php
require_once("templates/footer_2.php");
?>