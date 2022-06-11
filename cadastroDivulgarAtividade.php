<?php
require_once("templates/header3.php");
?>
<div id="main-container" class="container-fluide">
 <div class="col-md-12">
	<div class="row" id="auth-row">
	   <div class="col-md-4" id="login-container">
	     <h1>Atividade:</h1>
		 <form action="<?= $BASE_URL?>process_cadastroDivulgarAtividade.php" method="POST">
		   <input type="hidden" name="type" value="cadastro">
		    <div class="form-group">
			<label for="nome">* Nome:</label>
			<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da atividade">
		    </div>
			<div class="form-group">
			<label for="descricao">* Descrição:</label>
			<input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite uma descrição">
		    </div>
			<div class="form-group">
			<label for="data">* Data:</label>
			<input type="date" class="form-control" id="data" name="data" placeholder="Entre com uma data">
		    </div>
			<div class="form-group">
			<label for="horas">* Quantidade de horas:</label>
			<input type="number" class="form-control" id="horas" name="horas" placeholder="Entre com a quantidade de horas">
		    </div>
			<div class="form-group">
			<label for="horario">Horário:</label>
			<input type="time" class="form-control" id="horario" name="horario" placeholder="Entre com um horário">
		    </div>
			<div class="form-group">
			<label for="logradouro">Logradouro:</label>
			<input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Informe um logradouro">
		    </div>
			<div class="form-group">
			<label for="numero">Número:</label>
			<input type="number"  class="form-control" id="numero" name="numero" placeholder="Informe um número">
		    </div>
			<div class="form-group">
			<label for="bairro">Bairro:</label>
			<input type="text"  class="form-control" id="bairro" name="bairro" placeholder="Informe um bairro">
		    </div>
			<div class="form-group">
			<label for="cidade">Cidade:</label>
			<input type="text"  class="form-control" id="cidade" name="cidade" placeholder="Informe a cidade">
		    </div>
			<div class="form-group">
			<label for="uf">UF:</label>
			<input type="text"  class="form-control" id="uf" name="uf" placeholder="Informe o estado">
		    </div>
			<div class="form-group">
			<label for="cep">CEP:</label>
			<input type="text"  maxlength="8" class="form-control" id="cep" name="cep" placeholder="Informe o cep">
		    </div>
			<br>
			<div class="form-group">
			<label for="instituicao">*Instituição:</label>
			<input type="text" class="form-control" id="instituicao" name="instituicao" placeholder="Informe a instituição ">
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
	