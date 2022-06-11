<?php
  require_once("globals.php");
  require_once("db.php");
  require_once("models/Coordenador.php");
  require_once("models/Msg.php");
  require_once("dao/CoordenadorDAO.php");
  
  
  $msg = new Msg($BASE_URL); 
  $flassMessage = $msg->getMessage();
  if(!empty($flassMessage["msg"])){
	  $msg->clearMessage();
  }
  $coordenadorDao = new CoordenadorDAO($conn,$BASE_URL );
  
  $coordenadorData = $coordenadorDao->verifyToken(true);
?>   
   <!DOCTYPE html>
    <html lang="en">
      <head>
       <meta charset="utf-8">
	   <meta name="viewport" content="width-device-width, initial-scale-1.0">
	    <title>ATCOUNT</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.css" integrity="sha512-Ty5JVU2Gi9x9IdqyHN0ykhPakXQuXgGY5ZzmhgZJapf3CpmQgbuhGxmI4tsc8YaXM+kibfrZ+CNX4fur14XNRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="css/styles.css">
      </head>
      <body>
        <header id="main-navbar" class="navbar navbar-expand-lg">
		<a href="<?= $BASE_URL?>/mainCoordenador.php" class="navbar-brand">
		   <img src="<?= $BASE_URL?>img/logo.jpg" alt="ATCOUNT" id="logo">
		   <span id="atcount-title">ATCOUNT - Gerenciamento de horas das atividades complementares</span>
		</a>
		<div class="collapse navbar-collapse" id="navbar">
		  <ul class="navbar-nav">
		  <?php if($coordenadorData): ?>
		  <li class ="nav-item">
		  <a href="<?= $BASE_URL?>/dados_coordenador.php" class="nav-link bold">
		  <?= $coordenadorData->getNome(); ?>
		  </a>
		  </li>
		  <li class ="nav-item">
		  <a href="<?= $BASE_URL?>logout2.php" class="nav-link">Sair</a>
		  </li>
		  <?php endif; ?>
		  </ul>
		</div>
		</header>
		<ul class="tbt">
					<li class="b"><a href="<?= $BASE_URL?>/cadastroAluno.php">Novo Aluno</a></li>
					<li class="b"><a href="<?= $BASE_URL?>/verificar_historico.php" >Historicos</a></li>
					<li class="b"><a href="<?= $BASE_URL?>/cadastroDivulgarAtividade.php" >Divulgar atividades </a></li>
					<li class="b"><a href="<?= $BASE_URL?>/manter_divulgacao.php" >Manter divulgação</a></li>
					<li class="b"><a href="<?= $BASE_URL?>/manter_aluno.php" >Manter aluno</a></li>
                    <li class="b"><a href="<?= $BASE_URL?>/listar_planej_pend.php" >Planejamentos</a></li>
					<li class="b"><a href="<?= $BASE_URL?>/aprovar.php" >Aprovar</a></li>
                    <li class="b"><a href="<?= $BASE_URL?>/cadastroNovoCoordenador.php" >Novo Coordenador </a></li>										
		</ul>
		<?php if(!empty($flassMessage["msg"])): ?>
		  <div class="msg-container">
		    <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
		  </div>
        <?php endif; ?>
		
		