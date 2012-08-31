<?php
	$i = 0;
	foreach ($hotels as $key=>$hotel){
     
	?>
		<div style="padding-top: 35px;">
	    	<span style="color:#135995; font-size:13px; font-weight: bold;"><?php echo $this->Html->link($hotel['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $hotel['Hotel']['id']));?>
	    	<?php
				$star = $hotel['Hotel']['star_class'];
				for($i=1;$i<=$star;$i++){
				?>
				<img src="<?php echo $this->webroot; ?>img/icons/marker5_03.png" style="padding-bottom: 4px;"> 
				<?php }?><br>
	    	<?php if(@$hotel['MealPlan'][$key]['name']!=''){ echo @$hotel['MealPlan'][$key]['name']; }?>
	    	</span>
	    	
	    	<div>
	    		<?php echo $hotel['Hotel']['info']?>
	    	</div>
		</div>
<?php }?>