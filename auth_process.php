<?php
require_once("globals.php");
require_once("db.php");
require_once("dao/AlunoDAO.php");
require_once("dao/CoordenadorDAO.php");

$msg = new Msg($BASE_URL); 
$alunoDao = new AlunoDAO($conn, $BASE_URL);
$coordenadorDao = new CoordenadorDAO($conn, $BASE_URL);
 //resgata o tipo de input
 $type= filter_input(INPUT_POST, "type");
 
 //mapeando os dados
 $email= filter_input(INPUT_POST, "email");
 $senha= filter_input(INPUT_POST, "senha");
 $perfil= filter_input(INPUT_POST, "perfil");

 //verificação dos dados minimos
if($email && $senha && $perfil){
	    
	//verificar perfil
	if($perfil==="Aluno"){
		
		// Tenta autenticar usuário
    if($alunoDao->authenticateAluno($email, $senha)) {

      $msg->setMessage("Seja bem-vindo!", "success", "mainAluno.php");

    // Redireciona o usuário, caso não conseguir autenticar
    } else {

      $msg->setMessage("Usuário, senha ou perfil incorretos.", "error", "back");

    }

   //else {

    //$msg->setMessage("Informações inválidas!", "error", "index.php");

    //}
		
	}else{
		if($perfil==="Coordenador"){
			
	// Tenta autenticar usuário
    if($coordenadorDao->authenticateCoordenador($email, $senha)) {

      $msg->setMessage("Seja bem-vindo!", "success", "mainCoordenador.php");

    // Redireciona o usuário, caso não conseguir autenticar
    } else {

      $msg->setMessage("Usuário, senha ou perfil incorretos.", "error", "back");

    }

			
	 }
	}
  }
  else{
	 //eviar msg de erro de dados faltantes
	 $msg->setMessage("Por favor, preencha todos os campos.","error", "back");
    }
