<?php
require_once("templates/header3.php");
?>
<div id="main-container" class="container-fluide">
 <div class="col-md-12">
	<div class="row" id="auth-row">
	   <div class="col-md-4" id="login-container">
	     <h1>Procurar Historico:</h1>
		 <form action="<?= $BASE_URL?>process_procurar_historico.php" method="POST">
		   <input type="hidden" name="type" value="procurarPlanej">
			<div class="form-group">
			<label for="matricula">Matricula do aluno:</label>
			<input type="text" maxlength="13" class="form-control" id="matricula" name="matricula" placeholder="Informe a matricula do aluno">
		    </div>
			<br>
			<input type="submit" class="btn card-btn" value="procurar">
		 </form>
	   </div>
	</div>
 </div>
</div>
<?php
require_once("templates/footer_2.php");
?>