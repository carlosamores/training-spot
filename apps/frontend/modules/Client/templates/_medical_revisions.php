<?php use_helper("DateTime"); ?>
<script>
$(document).ready(function (){


}); //document.ready

function load_dialog() {
	
	$("#dialog").load("<?php echo url_for('MedicalRevision/new?client_id='.$client->getId()); ?>");
	create_calendar("#datepicker");
	$("#dialog").dialog({ 
		autoOpen: true,
		title: 'Cargar revisacion',
		modal: true
		}).dialog('open'); //
}

function guardar() {
	$("#dialog").dialog("close"); 
}
</script>
<div style="float:right; padding-right: 10px; padding-left: 10px;" class="sf_admin_list ui-grid-table ui-widget ui-corner-all ui-helper-reset ui-helper-clearfix">
Revisaciones medicas:
<a href="#" onclick="load_dialog();"><img alt="Checked" title="Checked" src="/sfDoctrinePlugin/images/new.png"></a>
<table>
<thead class="ui-widget-header">
<tr> 
	<th class="sf_admin_text sf_admin_list_th ui-state-default ui-th-column"></th>
	<th class="sf_admin_text sf_admin_list_th ui-state-default ui-th-column">Fecha</th>
	<th class="sf_admin_text sf_admin_list_th ui-state-default ui-th-column">Comentarios</th>
</tr>
</thead>  
  <?
  $_LIST_SIZE = 10;  
  foreach($client->getMedicalRevisions() as $revision) {
  			?>
		<tr class="sf_admin_row ui-widget-content odd">
			<td class="sf_admin_text sf_admin_list_td"> 
				<?php if ($revision->getPassed()) { ?>
  					<img alt="Checked" title="Checked" src="/sfDoctrinePlugin/images/tick.png">
  				<?php } ?>
			</td>
			<td class="sf_admin_text sf_admin_list_td">
			<?php echo print_date($revision->getDate(),'d-m-Y'); ?>
			</td>
			<td class="sf_admin_text sf_admin_list_td">
			<?php 	echo $revision->getComments(); ?>
			</td>
		</tr>
   <?php 
  	
  		
    $_LIST_SIZE--;
  	if ($_LIST_SIZE <= 0) 
  	   break;
  	}
  	?> </table> <?php 
  if  ($_LIST_SIZE == 10)
    echo "No hay revisaciones registradas";
?>
</div>

<div id="dialog" title="Registrar revisacion"></div>
