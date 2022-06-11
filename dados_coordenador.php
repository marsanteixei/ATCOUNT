<?php
require_once("templates/header3.php");
?>
<div id="main-container2" class="container-fluide"> 
<div class="col-md-12">
	<div class="row" id="auth-row">
	   <div class="col-md-4" id="login-container">
           <h3>Dados : <h3>
                   <dl>
                       <dt>Nome: </dt>
                             <dd><?=$coordenadorData->getNome();?></dd>
                       <dt> Email cadastrado: </dt>
                             <dd><?=$coordenadorData->getEmail();?></dd>
                  </dl>
				  <a href="<?= $BASE_URL?>/mudar_senha_coordenador.php" >Mudar Senha</a>

         </div>
	 </div>
   </div>
</div>
<?php
require_once("templates/footer_2.php");
?>