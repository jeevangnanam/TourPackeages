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




//Package Meta Starts

	//# Popultate meta key value
	
	 $(".editMetaList").click(function(){
		 
		 loadLoader($("#loader"));
		 $.get('/package_metas/viewJson/'+$(this).attr('id'), function(data){
			 removeLoader($("#loader"));
			 data =  $.parseJSON(data);
			 
			 $('#metaMetaName').val(data.meta_name);
			 $('#metaValue').val(data.value);
			 
			 });
		 });


    //# Delete meta key value
	
	$(".deleteMetaList").click(function(){
		 
		 loadLoader($("#loader"));
		 id = $(this).attr('id');
		 $.get('/package_metas/deleteJson/'+$(this).attr('id'), function(data){
			 removeLoader($("#loader"));
			 if(data == 'true'){
			 rowId = "#metaRow_"+id;
			 $(rowId).hide(2000);
			 }
			 });
		 
		 });


//Package Meta Ends
					
					
//Loader functions Start

function loadLoader(onThisPlace){
	
	
	$(onThisPlace).html("<img src='/img/icons/loading-small.gif' />");
	}
	
function removeLoader(fronThisPlace){
	$(fronThisPlace).html("");
	}

//Loader functions ends					
}); 