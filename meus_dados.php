<?php
require_once("templates/header2.php");
?>
<div id="main-container2" class="container-fluide"> 
<div class="col-md-12">
	<div class="row" id="auth-row">
	   <div class="col-md-4" id="login-container">
           <h3>Dados do Aluno: <h3>
                   <dl>
                       <dt>Nome: </dt>
                             <dd><?=$alunoData->getNome();?> <?=$alunoData->getSobrenome();?></dd>
                       <dt> Matricula: </dt>
                             <dd><?=$alunoData->getMatricula();?></dd>
                       <dt> Email cadastrado: </dt>
                             <dd><?=$alunoData->getEmail();?></dd>
                       <dt> Telefone: </dt>
                             <dd><?=$alunoData->getTelefone();?></dd>
                  </dl>

         </div>
	 </div>
   </div>
</div>
<?php
require_once("templates/footer_2.php");
?>