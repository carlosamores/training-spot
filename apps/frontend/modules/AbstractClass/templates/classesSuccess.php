  <link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/reset.css" />
  
 <link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/reset.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/jquery/redmond/jquery-ui.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/jroller.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/fg.menu.css" />

<link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/fg.buttons.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/ui.selectmenu.css" />
    <script type="text/javascript" src="/sfAdminThemejRollerPlugin/js/jquery.min.js"></script>
<script type="text/javascript" src="/sfAdminThemejRollerPlugin/js/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="/js/functions.js"></script>
<script type="text/javascript" src="/sfAdminThemejRollerPlugin/js/fg.menu.js"></script>
<script type="text/javascript" src="/sfAdminThemejRollerPlugin/js/jroller.js"></script>
<script type="text/javascript" src="/sfAdminThemejRollerPlugin/js/ui.selectmenu.js"></script>


<link rel="stylesheet" type="text/css" media="screen" href="/fullcalendar/fullcalendar.css" />
<script type="text/javascript" src="/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="/fullcalendar/gcal.js"></script>


<script>
/* 
 * construye un arreglo con todas las fechas de la semana corriente 
 */
function build_week(date) {

	var week = [0,0,0,0,0,0,0];

	var day_of_the_week = date.getDay();
	week[day_of_the_week] = date;
	
	var count = 1;
	for(i=day_of_the_week-1;i>=0;i--) {
		week[i] = new Date(); 
		week[i].setDate(date.getDate() - count++);  
	}
	count = 1;
	for(i=day_of_the_week+1;i<=6;i++) {
		week[i] = new Date();
		week[i].setDate(date.getDate() + count++);  
	}

	return week;	
}

function build_full_date(aDate,hour,minutes) {
		var date = new Date();
		date.setDate(aDate.getDate());
		date.setMonth(aDate.getMonth());
		date.setFullYear(aDate.getFullYear());
		date.setHours(hour);
		date.setMinutes(minutes);
		return date;
}

function displayClassDlg(class_data) {
		
	$("#dialog").load("<?php echo url_for('AbstractClass/show?id='); ?>"+class_data['id'])
				.dialog('open');

	
	
}

function classInfo(event) {
	
	var url = '<?php echo url_for("AbstractClass/getClassInfo"); ?>';
	$.getJSON(url, { id: event.id} , function(json){
		   displayClassDlg(json);
		 });	 
}

 
$(document).ready(function() {

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
   
	var week = build_week(date);

	$("#dialog").dialog({ 
				autoOpen: false,
				title: 'Información detallada',
				modal: true,
				width: 700,
				position: ['center','top']
				})
		
	$('#calendar').fullCalendar({
		editable: true,
		height: 650,
		defaultView: 'agendaWeek',
		header: { //en el header no muestro ni la fecha actual ni los botones ni nada
			left: false,
			center: false,
			right: false 
		},
		columnFormat: {
  		     week: 'dddd'
		},
		dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
		slotMinutes: 30, //muestro intervalos cada 30 minutos
		minTime: '7:30am', //el dia arranca a las 7.30
		maxTime: '23:30', //el calendario lo muestro hasta las 23.30
		firstDay: 1, //la semana arranca los lunes
		defaultEventMinutes: 60, //por defecto, las clases seran de 60 minutos
		allDaySlot: false,  
        selectable: true,
        editable: false,
        eventClick: function(event){ classInfo(event); },
		events: [
		<?php
				foreach($all_classes as $class) {
					include_partial('class_event',array('class' => $class));
				}
		?>	]       
    });     //.full_calendar
} ); //.ready

  
</script>
<div id="dialog"></div>
<h1 onclick="render_an_event()"><?php echo $place->getPlaceName(); ?></h1>
<ul class="menu">
 <?php foreach($places as $p) { ?>
	<li class="fg-button ui-state-default sf_button-toggleable">
		<a href="classes?place=<?php echo $p;?>">
		<?php echo $p->getPlaceName();?>
		</a>
	</li>
	<?php } ?>	
</ul>
<hr />
<div id="calendar"></div>

