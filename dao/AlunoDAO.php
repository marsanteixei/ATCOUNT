<?php

require_once("models/Aluno.php");
require_once("models/Msg.php");

class AlunoDAO implements alunoDAOInterface {
	private $conn;
	private $url;
	private $msg;
	
	public function __construct (PDO $conn, $url){
		$this->conn = $conn;
		$this->url = $url;
		$this->msg = new Msg($url);
	}
	
	public function buildAluno($data){
		
		$aluno = new Aluno();
		$aluno->setId($data["idAluno"]);
		$aluno->setNome($data["nome"]);
		$aluno->setSobrenome($data["sobrenome"]);
		$aluno->setCpf($data["cpf"]);
		$aluno->setEmail($data["email"]);
		$aluno->setSenha($data["senha"]);
		$aluno->setToken($data["token"]);
		$aluno->setMatricula($data["matricula"]);
		$aluno->setTelefone($data["telefone"]);
		return $aluno;
	}
	public function create(Aluno $aluno){
		$stmt = $this->conn->prepare("INSERT INTO aluno (idAluno, nome, sobrenome, cpf, email, senha, token, matricula, telefone,idHistorico) 
		VALUES(:id, :nome, :sobrenome, :cpf, :email, :senha, :token, :matricula, :telefone, :idHistorico)");
		
		$id = $aluno->getId();
		$nome = $aluno->getNome();
		$sobrenome = $aluno->getSobrenome();
		$cpf = $aluno->getCpf();
		$email = $aluno->getEmail();
		$senha = $aluno->getSenha();
		$token = $aluno->getToken();
        $matricula = $aluno->getMatricula();
        $telefone = $aluno->getTelefone();
		$historico = $aluno->getHistorico();
		$idHistorico = $historico->getId();
		
		$stmt->bindParam(":id",$id);
		$stmt->bindParam(":nome",$nome);
		$stmt->bindParam(":sobrenome", $sobrenome);
		$stmt->bindParam(":cpf",$cpf );
		$stmt->bindParam(":email",$email);
		$stmt->bindParam(":senha",$senha);
		$stmt->bindParam(":token",$token );
		$stmt->bindParam(":matricula",$matricula );
		$stmt->bindParam(":telefone",$telefone);
		$stmt->bindParam(":idHistorico",$idHistorico);
		$stmt->execute();
	}
	
	public function update(Aluno $aluno, $redirect = true ){
		$stmt = $this->conn->prepare("UPDATE aluno SET
		nome = :nome,
		sobrenome = :sobrenome,
		cpf = :cpf,
		email = :email,
		token = :token,
        matricula = :matricula, 
        telefone = :telefone
		WHERE idAluno = :id
		");
		
		$id = $aluno->getId();
		$nome = $aluno->getNome();
		$sobrenome = $aluno->getSobrenome();
		$cpf = $aluno->getCpf();
		$email = $aluno->getEmail();
		$token = $aluno->getToken();
        $matricula = $aluno->getMatricula();
        $telefone = $aluno->getTelefone();
		
	  $stmt->bindParam(":nome", $nome);
      $stmt->bindParam(":sobrenome", $sobrenome);
      $stmt->bindParam(":cpf", $cpf);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":token", $token);
      $stmt->bindParam(":matricula", $matricula );
	  $stmt->bindParam(":telefone", $telefone);
      $stmt->bindParam(":id", $id);
	  
	   $stmt->execute();
	   
	    if($redirect) {

        // Redireciona para o perfil do usuario
        $this->msg->setMessage("Dados atualizados com sucesso!", "success", "mainAluno.php");

      }
		
	}
    
	public function verifyToken($protected = false){
		if(!empty($_SESSION["token"])){
			$token = $_SESSION["token"];
			$aluno = $this->findbyToken($token);
			if($aluno){
				return $aluno;
			}else if($protected){
				//redireciona usuario não autenticado
				$this->msg->setMessage("Faça a autenticação para acessar esta página!","error", "index.php");
			}
		}
		else if($protected){
		 //redireciona usuario não autenticado
		 $this->msg->setMessage("Faça a autenticação para acessar esta página!","error", "index.php");
		}
	}
	
	public function setTokenToSession($token, $redirect = true){
		//salvar token na session
		$_SESSION["token"] = $token;
		
		if($redirect){
			//redireciona para o perfil de aluno
			$this->msg->setMessage("Seja bem vindo!","succes", "mainAluno.php");
		}
	}
	public function authenticateAluno($email, $senha){
		
		$aluno = $this->findByEmail($email);

      if($aluno) {
          $senhaVerificar = $aluno->getSenha();
        // Checar se as senhas batem
        if(password_verify($senha,$senhaVerificar )) {

          // Gerar um token e inserir na session
          $token = $aluno->generateToken();

          $this->setTokenToSession($token, false);

          // Atualizar token no usuário
          $aluno->setToken($token);

          $this->update($aluno, false);

          return true;

        } else {
          return false;
        }

      } else {

        return false;

      }
	}
	
	public function findbyToken($token){
		if($token != ""){
			$stmt = $this->conn->prepare("SELECT * FROM aluno WHERE token = :token");
			$stmt->bindParam(":token", $token);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$aluno = $this->buildAluno($data);
				return $aluno;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	public function findByEmail($email){
		if($email != ""){
			$stmt = $this->conn->prepare("SELECT * FROM aluno WHERE email = :email");
			$stmt->bindParam(":email", $email);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$aluno = $this->buildAluno($data);
				return $aluno;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	public function findById($id){
		if($id != ""){
			$stmt = $this->conn->prepare("SELECT * FROM aluno WHERE idAluno = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$aluno = $this->buildAluno($data);
				return $aluno;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	public function findByMatricula($matricula){
		if($matricula != ""){
			$stmt = $this->conn->prepare("SELECT * FROM aluno WHERE matricula = :matricula");
			$stmt->bindParam(":matricula", $matricula);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$aluno = $this->buildAluno($data);
				return $aluno;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	public function findByCpf($cpf){
		if($cpf != ""){
			$stmt = $this->conn->prepare("SELECT * FROM aluno WHERE cpf = :cpf");
			$stmt->bindParam(":cpf", $cpf);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$aluno = $this->buildAluno($data);
				return $aluno;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	public function changPassword(Aluno $aluno){
		
		$stmt = $this->conn->prepare("UPDATE aluno SET
        senha = :senha
        WHERE idAluno = :id
      ");
	  $id = $aluno->getId();
	  $senha = $aluno->getSenha();

      $stmt->bindParam(":senha", $senha);
      $stmt->bindParam(":id", $id);

      $stmt->execute();

      // Redirecionar e apresentar a mensagem de sucesso
      $this->msg->setMessage("Senha alterada com sucesso!", "success", "mainAluno.php");
	}
	
	public function destroyToken() {

      // Remove o token da session
      $_SESSION["token"] = "";

      // Redirecionar e apresentar a mensagem de sucesso
      $this->msg->setMessage("Você fez o logout com sucesso!", "success", "index.php");

    }
	
	public function getIdHistorico($id){
		if($id != ""){
			$stmt = $this->conn->prepare("SELECT * FROM aluno WHERE idAluno = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$idHistorico = $data["idHistorico"];
				return $idHistorico;
			}
			else{
				return false;
			}
		
	    }
		else{
			return false;
		}
	}
	public function findByIdHistorico($idHistorico){
		if($idHistorico != ""){
			$stmt = $this->conn->prepare("SELECT * FROM aluno WHERE idHistorico = :idHistorico");
			$stmt->bindParam(":idHistorico", $idHistorico);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$aluno = $this->buildAluno($data);
				return $aluno;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
}
?>