<?php
  require_once("globals.php");
  require_once("db.php");
  require_once("models/Aluno.php");
  require_once("models/Msg.php");
  
  
  $msg = new Msg($BASE_URL); 
  $flassMessage = $msg->getMessage();
  if(!empty($flassMessage["msg"])){
	  $msg->clearMessage();
  }
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
		<a href="<?= $BASE_URL?>" class="navbar-brand">
		   <img src="<?= $BASE_URL?>img/logo.jpg" alt="ATCOUNT" id="logo">
		   <span id="atcount-title">ATCOUNT - Gerenciamento de horas das atividades complementares</span>
		</a>
		</header>
		<?php if(!empty($flassMessage["msg"])): ?>
		  <div class="msg-container">
		    <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
		  </div>
        <?php endif; ?>
		
		