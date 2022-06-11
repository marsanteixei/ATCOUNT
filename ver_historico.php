<?php
require_once("templates/header2.php");
?>

<?php

require_once("globals.php");
require_once("db.php");
require_once("dao/HistoricoDAO.php");
$historicoDao = new HistoricoDAO($conn,$BASE_URL );
$id = $alunoData->getId();
$idHistorico = $alunoDao->getIdHistorico($id);
$historico = $historicoDao->findById($idHistorico);
?>
<div id="main-container2" class="container-fluide"> 
  <div class="col-md-12">
	<div class="row" id="auth-row">
	   <div class="col-md-4" id="login-container">
	   
	       <h3>Histórico :</h3>     
			<table border="5"  cellpadding="15">
		        <tr>
				<th>Horas Totais Aprovadas </th>
				<th>Horas Totais Pendentes </th>
				<th>Ensino Aporovadas</th>
				<th>Extensão Aporovadas</th>
				<th>Pesquisa Aporovadas</th>
				</tr> 
				<tr>
				<td><?=$historico->getHorasTotAprov();?></td>
				<td><?=$historico->getHorasTotPend();?></td>
				<td><?=$historico->getEnsinoTotAprov();?></td>
				<td><?=$historico->getExtensaoTotAprov();?></td>
				<td><?=$historico->getPesquisaTotAprov();?></td>
				</tr>
             </table>
			 
			 <br><br>
		     <h3>Horas por tipo:</h3>     
			<table border="5"  cellpadding="15">
		        <tr>
                 <td>Tipo de Atividade</td>
                 <td>Horas</td>
              </tr>
	          <tr>
                 <td>Ensino : </td>
                 <td><?=$historico->getEnsinoTotAprov();?></td>
             </tr>
	         <tr>
               <td>--Disciplinas não previstas--</td>
               <td><?=$historico->getEnsino1Total();?></td>
            </tr>
	        <tr>
               <td>--Cursos de atualização--</td>
               <td><?=$historico->getEnsino2Total();?></td>
           </tr>
	       <tr>
              <td>--Monitoria--</td>
              <td><?=$historico->getEnsino3Total();?></td>
           </tr>
	        <tr>
             <td>--Estágio não-obrigatório--</td>
             <td><?=$historico->getEnsino4Total();?></td>
           </tr>
	     <tr>
             <td>Extensão : </td>
		     <td><?=$historico->getExtensaoTotAprov();?></td>
         </tr>
	     <tr>
           <td>--Eventos internos--</td>
		 <td><?=$historico->getExtensao1Total();?></td>
        </tr>
	     <tr>
           <td>--Eventos Externos--</td>
		    <td><?=$historico->getExtensao2Total();?></td>
        </tr>
	     <tr>
            <td>--Ministrar cursos de extensão--</td>
		    <td><?=$historico->getExtensao3Total();?></td>
        </tr>
	   <tr>
          <td>Pesquisa : </td>
		  <td><?=$historico->getPesquisaTotAprov();?></td>
       </tr>
	   <tr>
          <td>--Iniciação científica--</td>
		  <td><?=$historico->getPesquisa1Total();?></td>
       </tr>
	   <tr>
          <td>--Publicações--</td>
		  <td><?=$historico->getPesquisa2Total();?></td>
       </tr>
	   <tr>
          <td>--Apresentação de trabalho científico--</td>
		  <td><?=$historico->getPesquisa3Total();?></td>
        </tr>
     </table>
	   </div>
	 </div>
   </div>
</div>
<?php
require_once("templates/footer_2.php");
?>