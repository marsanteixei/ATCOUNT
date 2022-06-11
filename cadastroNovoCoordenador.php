<?php
require_once("templates/header3.php");
?>
<div id="main-container" class="container-fluide">
 <div class="col-md-12">
	<div class="row" id="auth-row">
	   <div class="col-md-4" id="login-container">
	     <h1>Coordenador:</h1>
		 <form action="<?= $BASE_URL?>process_cadastroCoordenador.php" method="POST">
		   <input type="hidden" name="type" value="cadastro">
		    <div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do coordenador">
		    </div>
			<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Digite o email do coordenador">
		    </div>
			<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="text" maxlength="13" class="form-control" id="senha" name="senha" placeholder="informe uma senha">
		    </div>
			<div class="form-group">
			<label for="confirmacao">confirmar senha:</label>
			<input type="text" maxlength="13" class="form-control" id="confirmacao" name="confirmacao" placeholder="informe novamente sua senha">
		    </div>
			<br>
			<input type="submit" class="btn card-btn" value="Cadastrar">
		 </form>
	   </div>
	</div>
 </div>
</div>
<?php
require_once("templates/footer_2.php");
?>
	