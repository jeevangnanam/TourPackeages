<script type="text/javascript">
$(document).ready(function(){
	$("#panel").slideToggle("slow");
	$(".btn-slide").click(function(){
		$("#panel").slideToggle("slow");
		$(this).toggleClass("active"); return false;
	});
	
	 
});
</script>

<div class="packages index">
	<h2><?php __($cat_name['PackageCategory']['name']);?></h2>

	<div id="panel">
		<div class="users-form">
			<?php //echo $this->Form->create('Packages',array('controller' => 'packages', 'action' => 'search','q:'=>'hi'));?>
			<form id="search-form" method="post" action="javascript: document.location.href='/packages/search/q:'+encodeURI($('#package_catagory').val())+'/city:'+encodeURI($('#LocationName').val());">
						
			<?php echo $this->Form->input('package_catagory',array('options' => $packageCategories,'empty'=>'Select Package'));?>
			
			<?php $cityValue = null;
				if (isset($this->params['named']['city'])) {
					$cityValue = $this->params['named']['city'];
				}
			 echo $ajax->autoComplete('Location.name', '/locations/autoComplete',array('label' => 'Location','value' => $cityValue));
			?>
			
			<?php echo $this->Form->end('Submit');?>
		</div>
	</div>
	
	<p class="slide"><a href="#" class="btn-slide">Search Packages</a></p>

	<div id="packages">
	<?php
	$i = 0;
	foreach ($packages as $package):
	?>
		
		<div class="holiday_package">
			<div class="package_img">
				<?php //echo $package['Package']['default_map'];
				$thumbnail = $this->Html->link($this->Image->resize('' . $package['Package']['default_map'], 233,326,'', 'class = "rounded"'), array('controller' => 'packages', 'action' => 'view', $package['Package']['id']), array('escape' => false));

				echo $thumbnail; ?>
			</div>
			<div class="package_yello_title"><?php echo $this->Html->link($package['Package']['name'], array('controller' => 'packages', 'action' => 'view', $package['Package']['id'],$package['Package']['name']), array('escape' => false));	?></div>
			<div class="package_details">
				Hotel: <?php
				$star = $package['Hotel']['star_class'];
				echo $this->Html->link($package['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $package['Hotel']['id'])); 
				for($i=1;$i<=$star;$i++){
				//echo '<img src="'.$this->webroot.'"img/hotel_star.gif"/> ';
				?>
				<img src="<?php echo $this->webroot; ?>img/icons/hotel_star.gif" style="width: 6px; height: 8px; padding-bottom: 4px;"> 
				<?php }?>
				<br>Location: <?php echo $package['Location']['name'];?>
				<br>Meal Plan: <?php echo$package['MealPlan']['name']?>
				<br>Room Type: <?php echo$package['RoomType']['name']?>
				<br>Price: $<?php echo$package['Package']['price']?>
			</div>
		</div>
			
	<?php endforeach; ?>
	<div style="clear: both; padding-top: 20px;">
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
		?>	</p>
	
		<div class="paging">
			<?php //$paginator->options(array('url' => $this->params['url']['city']."&q=".$this->params['named']['q'])); 
			echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
		 | 	<?php echo $this->Paginator->numbers();?>
	 |
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
		</div>
	</div>
	</div>
</div>
