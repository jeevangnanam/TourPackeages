
<div class="paddingb68">
   		 <div class="background">
            <section id="content">
                        <div class="container_24  ">
                        	<div class="col-padding">

<div class="hotels view">
<h3><?php  __($hotel['Hotel']['name']);?><?php $star = $hotel['Hotel']['star_class']; 
			for($i=1;$i<=$star;$i++){
				?><img src="<?php echo $this->webroot; ?>img/icons/marker5_02.jpg" style="padding-top: 4px;"> 
				<?php }?></h3>
		
			
			<div style="float:left; width:250px;">
            	<?php echo $this->Custom->resize('' . $hotel['Hotel']['image'], 226,208); ?>
            </div>

			<div style="float:left; width:700px;">
				<?php echo $hotel['Hotel']['info']; ?>
			</div>
			<div style="float:left; width:100%; margin-top:20px;">
           	 <?php echo $hotel['Hotel']['map']; ?>
            </div>
		<div class="clear"></div>
		
		

</div>
<!--<br><br>
<?php if (!empty($hotel['MealPlan'])):?>
<div class="related">
	<h3><?php __('Related Meal Plans');?></h3>
	
	<table cellpadding = "0" cellspacing = "0">
	<?php
		$i = 0;
		
		foreach ($hotel['MealPlan'] as $mealPlan):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Image->resize($mealPlan['image'], 100, 200);?> $<?php echo $mealPlan['price'];?>
			
			</td>
			<td></td>

			
		</tr>
		<tr<?php echo $class;?>>
		  <td><?php echo $mealPlan['info'];?></td>
		  <td>&nbsp;</td>
		  </tr>
	<?php endforeach; ?>
	</table>
	
</div>
<?php endif; ?>-->


</div>
</div>
</div>
</div>
</div>