<?php
require_once("templates/header3.php");
?>

<?php
require_once("globals.php");
require_once("db.php");
require_once("dao/AlunoDAO.php");
require_once("dao/PlanejamentoDAO.php");
$planejamentoDao = new PlanejamentoDAO($conn, $BASE_URL);
$alunoDao = new AlunoDAO($conn, $BASE_URL);
$planejamentos = $planejamentoDao->findAll();

if($planejamentos != false){
require_once("process_listarPlanejamentos_pend.php");
}
else{
$msg->setMessage("Nenhum planejamento aberto.","success","back");}

?>
<?php
require_once("templates/footer_2.php");
?>
