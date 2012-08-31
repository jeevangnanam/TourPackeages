<?php //echo $html->meta('description', 'Tour packages available from Mihin Lanka', array('type' => 'description', 'inline' => false)); 
?>
<script type="text/javascript">
$(document).ready(function() {
	/*$("a[rel=example_group]").fancybox({
				transitionIn'		: 'none',
				transitionOut'		: 'none',
				titlePosition' 	: 'over',
				titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
	});*/
	
	$("a[data-gal^='prettyPhoto']").prettyPhoto();
	//$("area[rel^='prettyPhoto']").prettyPhoto();
});

</script>
<div class="packages index">
	<?php
	$i = 0;
	foreach ($package_gallery as $gallery){
	?>
		<div class="ImageBox">
		<div class="Thumbnail" style="padding-top: 35px; width: 170px; float: left; min-height: 170px; "> 
			           
            <a class="lightbox-image" href="<?php echo $this->webroot."uploads/packages/".$gallery['PackageGallery']['url']; ?>" data-gal="prettyPhoto[prettyPhoto]"><img alt="" src="<?php echo $this->webroot."uploads/packages/small/".$gallery['PackageGallery']['url']; ?>" style="width:160px;cursor:url('/img/icons/magnify.cur'), -moz-zoom-in;" /></a>
            
		</div>
		
	</div>
	<?php }?>
</div>