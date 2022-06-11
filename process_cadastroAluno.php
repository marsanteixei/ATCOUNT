<?php
require_once("globals.php");
require_once("db.php");
require_once("dao/HistoricoDAO.php");
require_once("dao/AlunoDAO.php");

$msg = new Msg($BASE_URL); 
$alunoDao = new AlunoDAO($conn, $BASE_URL);
$historicoDao = new HistoricoDAO($conn, $BASE_URL);

 //resgata o tipo de input
 $type= filter_input(INPUT_POST, "type");
 
 //mapeando os dados
 $nome= filter_input(INPUT_POST, "nome");
 $sobrenome= filter_input(INPUT_POST, "sobrenome");
 $cpf= filter_input(INPUT_POST, "cpf");
 $email= filter_input(INPUT_POST, "email");
 $matricula= filter_input(INPUT_POST, "matricula");
 $telefone= filter_input(INPUT_POST, "telefone");

 //verificação dos dados minimos
if($nome && $sobrenome && $cpf && $email && $matricula && $telefone){
	    //verificar se o email ou matricula ja estão cadastrdo
		if(($alunoDao->findByEmail($email) === false) && ($alunoDao->findByMatricula($matricula) === false) && ($alunoDao->findByCpf($cpf) === false)){
			
			//criando histórico
			$historico = new Historico();
			$aux1 = 0;
			$aux2 =  md5(uniqid(""));
			$historico->setId($aux2);
			$historico->setHorasTotAprov($aux1);
			$historico->setHorasTotPend($aux1);
			$historico->setEnsinoTotAprov($aux1);
			$historico->setExtensaoTotAprov($aux1);
			$historico->setPesquisaTotAprov($aux1);
			$historico->setEnsino1Total($aux1);
			$historico->setEnsino2Total($aux1);
			$historico->setEnsino3Total($aux1);
			$historico->setEnsino4Total($aux1);
			$historico->setExtensao1Total($aux1);
			$historico->setExtensao2Total($aux1);
			$historico->setExtensao3Total($aux1);
			$historico->setPesquisa1Total($aux1);
			$historico->setPesquisa2Total($aux1);
			$historico->setPesquisa3Total($aux1);
			$historicoDao->create($historico);
			
			//criando um Aluno
			$aluno = new Aluno();
			$aluno->setHistorico($historico);
			
			//criação de token, senha e id 
			$userToken = $aluno->generateToken();
			$finalPassword = $aluno->generatePassword($matricula);
			$aux3 = md5(uniqid(""));
			
			//setando valores
			$aluno->setId($aux3);
			$aluno->setNome($nome);
			$aluno->setSobrenome($sobrenome);
			$aluno->setCpf($cpf);
			$aluno->setEmail($email);
			$aluno->setMatricula($matricula);
			$aluno->setTelefone($telefone);
			$aluno->setSenha($finalPassword);
			$aluno->setToken($userToken);
			$alunoDao->create($aluno);
			
			//eviar msg de sucesso de dados
	        $msg->setMessage("Dados cadastrados com sucesso.","success", "back");
			
		}
		else{
			 $msg->setMessage("Já exeiste um aluno cadastrado com esse email, matricula ou cpf.","error", "back");
		}
  }
  else{
	 //eviar msg de erro de dados faltantes
	 $msg->setMessage("Por favor, preencha todos os campos.","error", "back");
  }
  ?>