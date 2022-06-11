<?php
require_once("models/Coordenador.php");
require_once("models/Msg.php");
 class CoordenadorDAO implements coordenadorDAOInterface {
	 private $conn;
	 private $url;
	 private $msg;
	 
	 public function __construct (PDO $conn, $url){
		$this->conn = $conn;
		$this->url = $url;
		$this->msg = new Msg($url);
	}
	
	public function buildCoordenador($data){
		$coordenador = new Coordenador();
		$coordenador->setId($data["id"]);
		$coordenador->setNome($data["nome"]);
		$coordenador->setEmail($data["email"]);
		$coordenador->setSenha($data["senha"]);
		$coordenador->setToken($data["token"]);
		
		return $coordenador;
	}
	
	public function create(Coordenador $coordenador){
		$stmt = $this->conn->prepare("INSERT INTO coordenador ( nome, email, senha, token) 
		VALUES(:nome, :email, :senha, :token)");
		
		$nome = $coordenador->getNome();
		$email = $coordenador->getEmail();
		$senha = $coordenador->getSenha();
		$token = $coordenador->getToken();
		
		$stmt->bindParam(":nome",$nome);
		$stmt->bindParam(":email",$email);
		$stmt->bindParam(":senha",$senha);
		$stmt->bindParam(":token",$token );
		$stmt->execute();
	}
	
	public function update(Coordenador $coordenador, $redirect = true ){
		$stmt = $this->conn->prepare("UPDATE coordenador SET
		nome = :nome,
		email = :email,
		token = :token
		WHERE id = :id
		");
		
		$id = $coordenador->getId();
		$nome = $coordenador->getNome();
		$email = $coordenador->getEmail();
		$token = $coordenador->getToken();
		
	  $stmt->bindParam(":nome", $nome);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":token", $token);
      $stmt->bindParam(":id", $id);
	  
	   $stmt->execute();
	   
	    if($redirect) {

        // Redireciona para o perfil do usuario
        $this->message->setMessage("Dados atualizados com sucesso!", "success", "mainCoordenador.php");

      }
	 
 }
 public function verifyToken($protected = false){
		if(!empty($_SESSION["token"])){
			$token = $_SESSION["token"];
			$coordenador = $this->findbyToken($token);
			if($coordenador){
				return $coordenador;
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
			//redireciona para o perfil de coordenador
			$this->msg->setMessage("Seja bem vindo!","succes", "mainCoordenador.php");
		}
	}
	
	public function authenticateCoordenador($email, $senha){
		
		$coordenador = $this->findByEmail($email);

      if($coordenador) {
          $senhaVerificar = $coordenador->getSenha();
        // Checar se as senhas batem
        if(password_verify($senha,$senhaVerificar )) {

          // Gerar um token e inserir na session
          $token = $coordenador->generateToken();

          $this->setTokenToSession($token, false);

          // Atualizar token no usuário
          $coordenador->setToken($token);

          $this->update($coordenador, false);

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
			$stmt = $this->conn->prepare("SELECT * FROM coordenador WHERE token = :token");
			$stmt->bindParam(":token", $token);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$coordenador = $this->buildCoordenador($data);
				return $coordenador;
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
			$stmt = $this->conn->prepare("SELECT * FROM coordenador WHERE email = :email");
			$stmt->bindParam(":email", $email);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$coordenador = $this->buildCoordenador($data);
				return $coordenador;
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
			$stmt = $this->conn->prepare("SELECT * FROM coordenador WHERE id = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$data = $stmt->fetch();
				$coordenador = $this->buildCoordenador($data);
				return $coordenador;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	public function changPassword(Coordenador $coordenador){
		
		$stmt = $this->conn->prepare("UPDATE coordenador SET
        senha = :senha
        WHERE id = :id
      ");
	  $id = $coordenador->getId();
	  $senha = $coordenador->getSenha();

      $stmt->bindParam(":senha", $senha);
      $stmt->bindParam(":id", $id);

      $stmt->execute();

      // Redirecionar e apresentar a mensagem de sucesso
      $this->msg->setMessage("Senha alterada com sucesso!", "success", "mainCoordenador.php");
	}
	
	public function destroyToken() {

      // Remove o token da session
      $_SESSION["token"] = "";

      // Redirecionar e apresentar a mensagem de sucesso
      $this->msg->setMessage("Você fez o logout com sucesso!", "success", "index.php");

    }
 
 }

?>