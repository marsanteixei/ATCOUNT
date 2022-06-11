<?php
require_once("templates/header2.php");
?>

<div id="main-container" class="container-fluide">
 <div class="col-md-12">
	<div class="row" id="auth-row">
	   <div class="col-md-4" id="login-container">
	     <h1>Mudar senha:</h1>
		 <form action="<?= $BASE_URL?>process_mudar_senha.php" method="POST">
		   <input type="hidden" name="type" value="mudar">
			<div class="form-group">
			<label for="antiga">Senha antiga:</label>
			<input type="text" maxlength="13" class="form-control" id="antiga" name="antiga" placeholder="Informe sua senha antiga">
		    </div>
			<div class="form-group">
			<label for="nova1">Nova Senha:</label>
			<input type="text" maxlength="13" class="form-control" id="nova1" name="nova1" placeholder="Entre com uma nova senha">
		    </div>
			<div class="form-group">
			<label for="nova2">Repetir nova Senha:</label>
			<input type="text" maxlength="13" class="form-control" id="nova2" name="nova2" placeholder="Repetir nova senha">
		    </div>
			<br>
			<input type="submit" class="btn card-btn" value="Mudar senha">
		 </form>
	   </div>
	</div>
 </div>
</div>


<?php
require_once("templates/footer_2.php");
?>
	