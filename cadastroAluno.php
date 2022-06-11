<?php
require_once("templates/header3.php");
?>
<div id="main-container" class="container-fluide">
 <div class="col-md-12">
	<div class="row" id="auth-row">
	   <div class="col-md-4" id="login-container">
	     <h1>Aluno:</h1>
		 <form action="<?= $BASE_URL?>process_cadastroAluno.php" method="POST">
		   <input type="hidden" name="type" value="cadastro">
		    <div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do aluno">
		    </div>
			<div class="form-group">
			<label for="sobrenome">Sobrenome:</label>
			<input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite o sobrenome do aluno">
		    </div>
			<div class="form-group">
			<label for="cpf">CPF:</label>
			<input type="text" maxlength="11" class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF do aluno">
		    </div>
			<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Digite o email do aluno">
		    </div>
			<div class="form-group">
			<label for="matricula">Matricula:</label>
			<input type="text" maxlength="13" class="form-control" id="matricula" name="matricula" placeholder="Digite a matricula do aluno">
		    </div>
			<div class="form-group">
			<label for="telefone">Telefone:</label>
			<input type="text" maxlength="11" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone do aluno">
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
	