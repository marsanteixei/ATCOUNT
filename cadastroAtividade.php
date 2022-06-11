<?php
require_once("templates/header2.php");
?>

<?php
require_once("globals.php");
require_once("db.php");
require_once("dao/TipoDAO.php");
$tipoDao = new TipoDAO($conn, $BASE_URL);
$tipos = $tipoDao->findAll();
?>
<div id="main-container2" class="container-fluide">
<h1>Cadastrar atividades para o planejamento: </h1>
<br>
<form action="<?= $BASE_URL?>process_cadastroAtividade.php" method="POST" enctype="multipart/form-data">
   <div id="formulario">
      <div class="form-group">
		  <button type="button" id="add-campo"> Adicionar Atividade ao planejamento (+) </button>
		  <br><br><br>
	      <label>Tipo-></label>
		   <select id="tipo" name="tipo[]">
		     <?php foreach ($tipos as $tip):?>
			 <option value="<?=$tip->getCodigo();?>"><?=$tip->getNome();?></option>
			 <?php endforeach;?>
		    </select>
			<label>Descrição-></label>
			<input type="text" name="descricao[]" placeholder="Digite uma descrição">
			<label>Horas-></label>
			<input type="number" name="horas[]" placeholder="Informe as horas">
			<label>Data-></label>
			<input type="date" name="data[]" placeholder="informe a data">
			<br><br><br>
      </div>
    </div>
	<br><br>
	<div>
	   <label>Anexar Comprovantes-></label>
	  <input type="file" name="comprovante[]" multiple required>
	  <br><br>
	   <input type="submit" value="Cadastrar">
	</div>
</form>
   <script>
         var cont = 1;
        //https://api.jquery.com/click/
            $("#add-campo").click(function () {
				cont++;
				//https://api.jquery.com/append/
                $("#formulario").append('<div class="form-group" id="campo' + cont + '"> <label>Tipo-></label>  <select id="tipo" name="tipo[]"> <?php foreach ($tipos as $tip):?> <option value="<?=$tip->getCodigo();?>"><?=$tip->getNome();?> <?php endforeach;?> </option> </select> <label>Descrição-></label> <input type="text" name="descricao[]" placeholder="Digite uma descrição"> <label>Horas-></label> <input type="number" name="horas[]" placeholder="Informe as horas"> <label>Data-></label> <input type="date" name="data[]" placeholder="informe a data"> <br><br><br> <button type="button" id="' + cont + '" class="btn-apagar"> Retirar (-) </button> </div>');
            });
			
			$('form').on('click', '.btn-apagar', function () {
                var button_id = $(this).attr("id");
                $('#campo' + button_id + '').remove();
            });
   
   </script>
</div>

<?php
require_once("templates/footer_2.php");
?>