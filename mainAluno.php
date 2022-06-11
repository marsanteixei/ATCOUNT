<?php
require_once("templates/header2.php");
?>

<?php
require_once("globals.php");
require_once("db.php");
require_once("dao/AtiviDivulgacaoDAO.php");
$ativiDivulgacaoDao = new ativiDivulgacaoDAO($conn, $BASE_URL);
$atividadesDiv = $ativiDivulgacaoDao->findAll();

if($atividadesDiv != false){
require_once("process_listarAtividadesDivulg.php");
}
else{
require_once("templates/middle.php");}

?>

<?php
require_once("templates/footer_2.php");
?>