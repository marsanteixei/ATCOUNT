
<?php
require_once("templates/header2.php");
?>

<?php
require_once("globals.php");
require_once("db.php");
require_once("dao/PlanejamentoDAO.php");
$idAluno = $alunoData->getId();
$idHistorico = $alunoDao->getIdHistorico($idAluno);
$planejamentoDao = new PlanejamentoDAO($conn, $BASE_URL);
$planejamentos = $planejamentoDao->findAllByAluno($idHistorico);

if($planejamentos != false){
require_once("process_listarPlanejamentos.php");
}
else{
$msg->setMessage("Você não possue planejamentos abertos.","success","back");}

?>
<?php
require_once("templates/footer_2.php");
?>
