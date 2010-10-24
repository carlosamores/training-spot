<?php use_helper("DateTime"); ?>

<div style="float:right; padding-right: 10px; padding-left: 10px;" class="sf_admin_list ui-grid-table ui-widget ui-corner-all ui-helper-reset ui-helper-clearfix">
Ultimos pagos registrados
<table>
<thead class="ui-widget-header">
<tr> 
	<th class="sf_admin_text sf_admin_list_th ui-state-default ui-th-column"></th>
	<th class="sf_admin_text sf_admin_list_th ui-state-default ui-th-column">Fecha</th>
	<th class="sf_admin_text sf_admin_list_th ui-state-default ui-th-column">Monto</th>
</tr>
</thead>  
  <?
  $_LIST_SIZE = 10;
  foreach($client->getMembershipFees() as $membership) {
  			?>
		<tr class="sf_admin_row ui-widget-content odd">
			<td class="sf_admin_text sf_admin_list_td"> 
  					<img alt="Checked" title="Checked" src="/sfDoctrinePlugin/images/tick.png">
			</td>
			<td class="sf_admin_text sf_admin_list_td">
				<?php echo print_date($membership->getDate(),'d-m-Y'); ?>
			</td>
			<td class="sf_admin_text sf_admin_list_td">
			<?php 	echo $membership->getAmount(); ?>
			</td>
		</tr>
   <?php 
  	
  		
    $_LIST_SIZE--;
  	if ($_LIST_SIZE <= 0) 
  	   break;
  	}
  	?> </table> <?php 
  if  ($_LIST_SIZE == 10)
    echo "No hay pagos registrados";
?>
</div>

<div id="dialog"></div>
