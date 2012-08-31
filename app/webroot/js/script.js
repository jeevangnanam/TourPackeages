$(document).ready(function() { 
	$('ul.menu').superfish({ 
		delay:       800,                            // one second delay on mouseout 
		animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
		speed:       'normal',                          // faster animation speed 
		autoArrows:  true,                           // disable generation of arrow mark-up 
		dropShadows: true                            // disable drop shadows 
	}); 
		$('.list li a, .list-5 li a').hover(function(){th=$(this).find('span'); th.stop().animate({textIndent:'5px'},250) },
								function(){th.stop().animate({textIndent:'0px'},250)});
								
								
//DatePicker Starts
		
		$( "#arrival" ).datepicker({
	
			numberOfMonths: 1,
			showButtonPanel: true,
			dateFormat:'yy-mm-dd',
			minDate:+5
			
		}).datepicker('setDate', '+5');
		$( "#departure" ).datepicker({
			numberOfMonths: 1,
			showButtonPanel: true,
			dateFormat:'yy-mm-dd'
		});					
		
//DatePicker Ends	

					
}); 