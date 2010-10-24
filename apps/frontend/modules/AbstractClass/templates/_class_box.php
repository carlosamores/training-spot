<?php
/* $class has the class being displayed
 * 
 * 
 */

?>
<a class="more" href="<?php echo url_for("AbstractClass/show?id=".$class->getId()); ?>">
<div class="class_box">
<?php echo $class->getClassType();?> 
(<?php echo count($class->getClients());?>)

<div class="class_info">
Profesores:
	<ul class="coaches">
	<?php 
		foreach ($class->getCoaches() as $coach ) {
			echo "<li>".$coach."</li>";		
		}
		?>
	</ul>
</div>

</div>
</a>