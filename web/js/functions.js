
function load_classes_effects() {
   $(".class_box").mouseover(function(event) {
	   $(event.target).children().fadeIn();
   }).mouseleave(
   function(event) {
	   $(event.target).children().fadeOut();
   }
   );

}

function create_calendar(element) {
	
	$(element).datepicker();
	$(element).datepicker($.datepicker.regional['es']);
}
