<div id="main-container" class="container-fluide">
 <div class="col-md-12">
	<div class="row" id="auth-row">
	   <div class="col-md-4" id="login-container">
	     
		 <h4>Planejamento - Códido: <?=$planejamento->getCodigo();?></h4>
		 <table border="5"  cellpadding="15">
		 <tr>
				<th>Desceição </th>
				<th>Quantidade de Horas </th>
				<th>Data da Realização </th>
				<th>Tipo de atividade </th>
		</tr>
		<?php
		$atividades = $planejamento->getAtividades();
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
		  <?php
		   if($mensagem!=false){
			   require_once("mostrar_Msg_cord.php");
		   }
		 ?>
        </div>
	  </div>
  </div>
</div>