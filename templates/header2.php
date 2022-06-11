<?php
  require_once("globals.php");
  require_once("db.php");
  require_once("models/Aluno.php");
  require_once("models/Msg.php");
  require_once("dao/AlunoDAO.php");
  
  
  $msg = new Msg($BASE_URL); 
  $flassMessage = $msg->getMessage();
  if(!empty($flassMessage["msg"])){
	  $msg->clearMessage();
  }
  $alunoDao = new AlunoDAO($conn,$BASE_URL );
  
  $alunoData = $alunoDao->verifyToken(true);
?>   
   <!DOCTYPE html>
    <html lang="en">
      <head>
       <meta charset="utf-8">
	   <meta name="viewport" content="width-device-width, initial-scale-1.0">
	    <title>ATCOUNT</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.css" integrity="sha512-Ty5JVU2Gi9x9IdqyHN0ykhPakXQuXgGY5ZzmhgZJapf3CpmQgbuhGxmI4tsc8YaXM+kibfrZ+CNX4fur14XNRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="css/styles.css">
      </head>
      <body>
        <header id="main-navbar" class="navbar navbar-expand-lg">
		<a href="<?= $BASE_URL?>/mainAluno.php" class="navbar-brand">
		   <img src="<?= $BASE_URL?>img/logo.jpg" alt="ATCOUNT" id="logo">
		   <span id="atcount-title">ATCOUNT - Gerenciamento de horas das atividades complementares</span>
		</a>
		<div class="collapse navbar-collapse" id="navbar">
		  <ul class="navbar-nav">
		  <?php if($alunoData): ?>
		  <li class ="nav-item">
		  <a href="<?= $BASE_URL?>/meus_dados.php" class="nav-link bold">
		  <?= $alunoData->getNome(); ?>
		  </a>
		  </li>
		  <li class ="nav-item">
		  <a href="<?= $BASE_URL?>logout1.php" class="nav-link">Sair</a>
		  </li>
		  <?php endif; ?>
		  </ul>
		</div>
		</header>
		<ul class="tbt">
					<li class="t"><a href="<?= $BASE_URL?>/mainAluno.php" class="m">Home</a></li>
					<li class="b"><a href="<?= $BASE_URL?>/cadastroAtividade.php" class="m">Abrir planejamento</a></li>
					<li class="b"><a href="<?= $BASE_URL?>/meus_planejamentos.php" class="m">Meus Planejamentos</a></li>
					<li class="b"><a href="<?= $BASE_URL?>/verificar_planejamento.php" class="m">Verificar planejamento</a></li>
					<li class="b"><a href="<?= $BASE_URL?>/ver_historico.php" class="m">Ver Historico</a></li>
					<li class="b"><a href="<?= $BASE_URL?>/meus_dados.php" class="m">Meus Dados</a></li>
					<li class="b"><a href="<?= $BASE_URL?>/mudar_senha.php" class="m">Mudar senha</a></li>		
		</ul>
		<?php if(!empty($flassMessage["msg"])): ?>
		  <div class="msg-container">
		    <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
		  </div>
        <?php endif; ?>
		
		