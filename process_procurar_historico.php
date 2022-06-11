<?php
require_once("globals.php");
require_once("db.php");
require_once("dao/HistoricoDAO.php");
require_once("dao/AlunoDAO.php");
require_once("dao/planejamentoDAO.php");
$msg = new Msg($BASE_URL); 
$alunoDao = new AlunoDAO($conn, $BASE_URL);
$historicoDao = new HistoricoDAO($conn, $BASE_URL);
$planejamentoDao = new PlanejamentoDAO($conn, $BASE_URL);
$matricula = filter_input(INPUT_POST, "matricula");

if($matricula){
	$aluno = $alunoDao->findByMatricula($matricula);
	if($aluno!= false){
		$id = $aluno->getId();
		$idHistorico = $alunoDao->getIdHistorico($id);
		$historico = $historicoDao->findById($idHistorico);
		$planejamentos = $planejamentoDao->findAllByAluno($idHistorico);
		require_once("ver_hist_aluno.php");
	}
	else{
		$msg->setMessage("Aluno não encontrado.","error", "back");
	}
}
else{
	$msg->setMessage("Por favor, informe uma matricula.","error", "back");
}
?>