<?php
/**
					{
						title: 'Birthday Party',
						start: new Date(y, m, d+1, 19, 0),
						end: new Date(y, m, d+1, 22, 30),
						allDay: false
					},

 */ 
?>
				{
				id : <?php echo $class->getId() ?>,
	            title  : '<?php echo $class->getClassType()." (".count($class->getClients()).")"; ?>',
				start: build_full_date(week[<?php echo $class->getDayOfTheWeek()?>],<?php echo $class->getStartHour()?>,<?php echo $class->getStartMin()?>),
				end: build_full_date(week[<?php echo $class->getDayOfTheWeek()?>],<?php echo $class->getEndHour()?>,<?php echo $class->getEndMin()?>), 
				allDay: false
				},
