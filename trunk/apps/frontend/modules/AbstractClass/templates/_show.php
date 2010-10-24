<?php 
    use_helper("DateTime");
     ?>
     <h1>
     <div style="float:left">
     <?
     
    echo "<a href='".url_for("AbstractClass/classes/classes?place=".$abstract_class->getPlace()->getPlaceName())."'>".$abstract_class->getPlace()->getPlaceName()."</a>";

	?>
		<div style="font-size:12pt"> <!-- coaches -->
		<?php 	
		echo $abstract_class->getClassType()." >> ";
		foreach ($abstract_class->getCoaches() as $coach) {
			echo "<a href='".url_for("Coach/show?id=".$coach->getId())."'>".$coach."</a>; ";
		} 
		
		?> 
		</div> <!-- end coaches -->
	</div>
	<div style='float:right'>
	<?php
	
	echo day_num_to_text($abstract_class->getDayOfTheWeek())." ".$abstract_class->getStartTime()."-".$abstract_class->getEndTime();
	?>
	</div>
	</h1>
	<?php 
	require('_clients_list.php');
?>

