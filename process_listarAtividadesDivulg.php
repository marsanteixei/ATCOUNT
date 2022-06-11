<div id="main-container2" class="container-fluide">       	
		<h1>Sugestão de eventos e atividades complementares:</h1>     
			<table border="5"  cellpadding="15">
		        <tr>
				<th>Código</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Data</th>
				<th>Horas</th>
				<th>Horário</th>
				<th>Endereço</th>
				<th>Instituição</th>
				</tr>
				<?php foreach ($atividadesDiv as $ativdiv):?>
				<tr>
				<td><?=$ativdiv->getId();?></td>
				<td><?=$ativdiv->getNome();?></td>
				<td><?=$ativdiv->getDescricao();?></td>
				<td><?=$ativdiv->getData();?></td>
				<td><?=$ativdiv->getHoras();?> Horas</td>
				<td><?=$ativdiv->getHorario();?></td>
				<td><?=$ativdiv->getLogradouro();?> <?=$ativdiv->getNumero();?> <?=$ativdiv->getBairro();?> <?=$ativdiv->getCidade();?> <?=$ativdiv->getUf();?> <?=$ativdiv->getCep();?></td>
				<td><?=$ativdiv->getInstituicao();?></td>
				</tr>
				<?php endforeach;?>
             </table>
</div>    