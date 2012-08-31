<div class="packages index">
	<h2><?php __('Holiday Packages');?></h2>

	
	<?php
	$i = 0;
	foreach ($packages as $package):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<!--<tr<?php echo $class;?>>
		<td><?php echo $package['Package']['id']; ?>&nbsp;</td>
		<td><?php echo $package['Package']['name']; ?>&nbsp;</td>
		<td><?php echo $package['Package']['duration']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($package['Location']['name'], array('controller' => 'locations', 'action' => 'view', $package['Location']['id'])); ?>
		</td>
		<td><?php echo $package['Package']['price']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($package['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $package['Hotel']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($package['RoomType']['name'], array('controller' => 'room_types', 'action' => 'view', $package['RoomType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($package['MealPlan']['name'], array('controller' => 'meal_plans', 'action' => 'view', $package['MealPlan']['id'])); ?>
		</td>
		<td><?php echo $package['Package']['max_people']; ?>&nbsp;</td>
		<td><?php echo $package['Package']['additional_person_cost']; ?>&nbsp;</td>
		<td><?php echo $package['Package']['default_map']; ?>&nbsp;</td>
		<td><?php echo $package['Package']['default_video']; ?>&nbsp;</td>

		
	</tr>
-->
		<div class="holiday_package">
			<div class="package_img">
				<img src="http://www.travel.com.au/holidays/australia/australia/whitsundays/3-nights-and-all-meals-on-long-island/packageImage/longisland.jpg">
			</div>
			<div class="package_yello_title"><?php echo $package['Package']['name']; ?></div>
			<span>Hotel: <?php echo $this->Html->link($package['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $package['Hotel']['id'])); ?></span>
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
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
		 | 	<?php echo $this->Paginator->numbers();?>
	 |
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
		</div>
	</div>
</div>
