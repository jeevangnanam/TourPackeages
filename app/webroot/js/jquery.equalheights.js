(function($){$.fn.equalHeights=function(minHeight,maxHeight){tallest=(minHeight)?minHeight:0;this.each(function(){if($(this).height()>tallest){tallest=$(this).height()}});if((maxHeight)&&tallest>maxHeight)tallest=maxHeight;return this.each(function(){$(this).height(tallest)})}})(jQuery)
$(window).load(function(){
	if($(".maxheight").length){
	$(".maxheight").equalHeights()}
	if($(".maxheight1").length){
	$(".maxheight1").equalHeights()}
	if($(".maxheight2").length){
	$(".maxheight2").equalHeights()}
	if($(".maxheight3").length){
	$(".maxheight3").equalHeights()}
	if($(".maxheight4").length){
	$(".maxheight4").equalHeights()}
	if($(".maxheight5").length){
	$(".maxheight5").equalHeights()}
})