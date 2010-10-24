<?php use_helper("DateTime"); ?>
<div class="sf_admin_list ui-grid-table ui-widget ui-corner-all ui-helper-reset ui-helper-clearfix">
<table>
<thead class="ui-widget-header">
<tr> 
	<th class="sf_admin_text sf_admin_list_th ui-state-default ui-th-column">Alumnos</th>
	<th class="sf_admin_text sf_admin_list_th ui-state-default ui-th-column">Ult. Revisacion</th>
	<th class="sf_admin_text sf_admin_list_th ui-state-default ui-th-column">Ult. Pago</th>
</tr>
</thead>
<?php
//for($i=0;$i<20;$i++)
	foreach ($abstract_class->getClients() as $client) {
		
		?>
		<tr class="sf_admin_row ui-widget-content odd">
			<td class="sf_admin_text sf_admin_list_td"> 
				<a href="<?php echo url_for("Client/show?id=".$client->getId())?>">
				<?php echo $client; ?>
				</a>
			</td>
			<td class="sf_admin_text sf_admin_list_td">
			<?php echo print_date($client->getLastMedicalRevisionDate(),"d-m-Y" ); ?>
			</td>
			<td class="sf_admin_text sf_admin_list_td">
			<?php echo print_date($client->getLastMembershipFeeDate(),"d-m-Y" ); ?>
			</td>
		</tr> 
		<?php
		} ?>
</table>
</div>