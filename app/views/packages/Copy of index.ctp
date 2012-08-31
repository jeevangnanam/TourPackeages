<div class="packages index">
	<h2><?php __('Holiday Packages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('duration');?></th>
			<th><?php echo $this->Paginator->sort('location_id');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('hotel_id');?></th>
			<th><?php echo $this->Paginator->sort('room_type_id');?></th>
			<th><?php echo $this->Paginator->sort('meal_plan_id');?></th>
			<th><?php echo $this->Paginator->sort('max_people');?></th>
			<th><?php echo $this->Paginator->sort('additional_person_cost');?></th>
			<th><?php echo $this->Paginator->sort('default_map');?></th>
			<th><?php echo $this->Paginator->sort('default_video');?></th>


	</tr>
	<?php
	$i = 0;
	foreach ($packages as $package):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
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
<?php endforeach; ?>
	</table>
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
