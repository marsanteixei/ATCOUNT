<div id="main-container2" class="container-fluide">       	
		<h1>Listagem de Planejamentos:</h1>     
			<table border="5"  cellpadding="15">
		        <tr>
				<th>Código</th>
				<th>Data da Abertura</th>
				<th>Data do fechamento</th>
				<th>Horas Totais Aprovadas</th>
				<th>Horas Totais Previstas</th>
				<th>Horas Totais de Ensino Previstas</th>
				<th>Horas Totais de Extensao Previstas</th>
				<th>Horas Totais de Pesquisa Previstas</th>
				<th>Status</th>
				<th>Aluno</th>
				<th>Matricula</th>
				</tr>
				<?php foreach ($planejamentos as $plan):?>
				 <?php
				  $x = $plan->getAguardandoValidar();
				  $y = $plan->getFechado();
				  $z = $plan->getStatus();
				 if($x==0 && $y==1 && $z=="Aprovado"){
					 $status ="Planejamento fechado e aprovado";
				 }
				 else{
					 if($x==1 && $y==0 && $z== null){
					 $status ="Planejamento em aberto";
					 }
					 else{
						 if($x==0 && $y==1 && $z=="Reprovado"){
							 $status ="Planejamento fechado e reprovado";
						 }
						 
					 }
				 }
				 $idHistorico = $plan->getIdHistorico();
				 $aluno = $alunoDao->findByIdHistorico($idHistorico);
				 ?>
				<tr>
				<td><?=$plan->getCodigo();?></td>
				<td><?=$plan->getDataAbertura();?></td>
				<td><?=$plan->getDataFechamento();?></td>
				<td><?=$plan->getHorasTotAprov();?></td>
				<td><?=$plan->getHorasTotPrev();?></td>
				<td><?=$plan->somarEnsinoPrevisto();?></td>
				<td><?=$plan->somarExtensaoPrevisto();?></td>
				<td><?=$plan->somarPesquisaPrevisto();?></td>
				<td><?=$status?></td>
				<td><?=$aluno->getNome();?> <?=$aluno->getSobrenome();?></td>
				<td><?=$aluno->getMatricula();?></td>
				</tr>
				<?php endforeach;?>
             </table>
</div>    