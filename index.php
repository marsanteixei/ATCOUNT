<?php
require_once("templates/header.php");
?>
<div id="main-container" class="container-fluide">
 <div class="col-md-12">
	<div class="row" id="auth-row">
	   <div class="col-md-4" id="login-container">
	     <h1>Acesso:</h1>
		 <form action="<?= $BASE_URL?>/auth_process.php" method="POST">
		   <input type="hidden" name="type" value="login">
		    <div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Digite seu Email">
		    </div>
			<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" maxlength="13" class="form-control" id="senha" name="senha" placeholder="Digite sua Senha">
		    </div>
			<div class="form-group">
			<label for="perfil">Perfil:</label>
			<select type="option" class="form-control" id="perfil" name="perfil">
			<option></option>
			<option>Aluno</option>
            <option>Coordenador</option>
			</select>
		    </div>
			<input type="submit" class="btn card-btn" value="Entrar">
		 </form>
		 <a class="reset" href="#" >Esqueci minha senha</a>
	   </div>
	</div>
 </div>
</div>
<?php
require_once("templates/footer.php");
?>
		