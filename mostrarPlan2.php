<div id="main-container" class="container-fluide">
 <div class="col-md-12">
	<div class="row" id="auth-row">
	   <div class="col-md-4" id="login-container">
	     
		 <h4>Planejamento - Códido: <?=$planejamento->getCodigo();?></h4>
		 <?php
		    $codigo=$planejamento->getCodigo();
		 ?>
		 <table border="5"  cellpadding="15">
		 <tr>
				<th>Desceição </th>
				<th>Quantidade de Horas </th>
				<th>Data da Realização </th>
				<th>Tipo de atividade </th>
		</tr>
		<?php
		$atividades = $planejamento->getAtividades();
		$comprovantes = $planejamento->getComprovantes();
		?>
		<?php foreach($atividades as $ativ) :?>
		 <tr>
		        <td><?=$ativ->getDescricao();?></td>
				<td><?=$ativ->getHoras();?></td>
				<td><?=$ativ->getData();?></td>
				<td><?=$ativ->getTipo()->getNome();?></td>
		 </tr>
		<?php endforeach;?>
		  </table>
		 
		 <br><br>
		 
		 
		 <h4>Comprovantes: </h4>
		 <table border="5"  cellpadding="15">
		 <tr>
				<th>Nome do Comprovante</th>
				<th>Download </th>
		</tr>
		<?php foreach($comprovantes as $comp) :?>
		 <tr>
		        <td><?=$comp->getDoc();?></td>
				<td><a href="<?= $BASE_URL?>/upload_files/<?=$comp->getDoc();?>" download>download</a></td>
		 </tr>
		<?php endforeach;?>
		  </table>
		  <br><br>
		  <form action="<?= $BASE_URL?>process_aprovar.php" method="POST">
		  <input type="hidden" maxlength="17" name="codigo" value="<?php echo $codigo?>">
		  <div class="form-group">
			<label for="mensagem">Mensagem para o aluno:</label>
			<input type="text" class="form-control" id="mensagem" name="mensagem" placeholder="Digite uma mensagem para o aluno">
		    </div>
			<br>
			<input type="submit" name="aprovar" class="btn card-btn" value="Aprovar">
			<br><br>
			<input type="submit" name ="reprovar" class="btn card-btn" value="Reprovar">
		  </form>
        </div>
	  </div>
  </div>
</div>