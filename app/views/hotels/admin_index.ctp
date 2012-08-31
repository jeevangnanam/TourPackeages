<div class="hotels index">
	<h2><?php __('Hotels');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('location_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			
			<th><?php echo $this->Paginator->sort('star_class');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($hotels as $hotel):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $hotel['Hotel']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($hotel['Location']['name'], array('controller' => 'locations', 'action' => 'view', $hotel['Location']['id'])); ?>
		</td>
		<td><?php echo $hotel['Hotel']['name']; ?>&nbsp;</td>
		
		<td><?php echo $hotel['Hotel']['star_class']; ?>&nbsp;</td>
		<td><?php echo $hotel['Hotel']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $hotel['Hotel']['id']));echo $this->Html->image('icons/house.png'); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $hotel['Hotel']['id'])); echo $this->Html->image('icons/house_go.png');?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $hotel['Hotel']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $hotel['Hotel']['id'])); echo $this->Html->image('icons/house_link.png');?>
		</td>
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
<!--<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Meta', true), array('controller' => 'hotel_meta', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Metum', true), array('controller' => 'hotel_meta', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meal Plans', true), array('controller' => 'meal_plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal Plan', true), array('controller' => 'meal_plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases', true), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types', true), array('controller' => 'room_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type', true), array('controller' => 'room_types', 'action' => 'add')); ?> </li>
	</ul>
</div>-->