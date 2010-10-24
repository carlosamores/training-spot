<?php use_helper("DateTime"); ?>
<div class="sf_admin_form_row"> 
		      <label>Clases:</label> 
			     
<ul style="list-style:none;padding-left:10px;">
<?php
foreach($client->getClasses() as $c) { ?>

		<li>
			<a href="<?php echo url_for("AbstractClass/show?id=".$c->getId()); ?>">
				<?php echo day_num_to_text($c->getDayOfTheWeek())." ".$c->getStartTime()."-".$c->getEndTime();; ?>
			</a>
		</li>	
	
<?php 
}
	
?>
</ul>
</div>