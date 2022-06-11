<?php
require_once("globals.php");
require_once("db.php");
require_once("dao/CoordenadorDAO.php");

$msg = new Msg($BASE_URL); 
$coordenadorDao = new CoordenadorDAO($conn, $BASE_URL);

//resgata o tipo de input
 $type= filter_input(INPUT_POST, "type");
 
 //mapeando os dados
 $nome= filter_input(INPUT_POST, "nome");
 $email= filter_input(INPUT_POST, "email");
 $senha= filter_input(INPUT_POST, "senha");
 $confirmacao= filter_input(INPUT_POST, "confirmacao");
 
 if($senha === $confirmacao){
	 if($nome && $email && $senha && $confirmacao){
		 
		 if($coordenadorDao->findByEmail($email) === false){
			 
			 //criando coordenador
			 $coordenador = new Coordenador();
			 
			 //criação de token e senha final
			 $coordenadorToken = $coordenador->generateToken();
			 $finalPassword = $coordenador->generatePassword($senha);
			 
			 //setando valores
			 $coordenador->setNome($nome);
			 $coordenador->setEmail($email);
			 $coordenador->setSenha($finalPassword);
			 $coordenador->setToken($coordenadorToken);
			 $coordenadorDao->create($coordenador);
			
			//eviar msg de sucesso de dados
	        $msg->setMessage("Dados cadastrados com sucesso.","success", "back");
		 }
		 else{
			 
			  $msg->setMessage("Já exeiste um coordenador cadastrado com esse email.","error", "back");
		 }
	 }
	 else{
		 
		 $msg->setMessage("Por favor, preencha todos os campos.","error", "back");
	 }
	 
 }
 else{
	 $msg->setMessage("A senha e a confirmação de senha não batem.","error", "back");
 }
