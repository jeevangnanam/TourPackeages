<div class="packages index">
	<h2><?php __('Packages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('duration');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('hotel_id');?></th>
			<th><?php echo $this->Paginator->sort('room_type_id');?></th>
			<th><?php echo $this->Paginator->sort('max_people');?></th>
			<th><?php echo $this->Paginator->sort('additional_person_cost');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th class="actions"><?php __('Actions');?></th>
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
		<td><?php echo $package['Package']['price']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($package['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $package['Hotel']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($package['RoomType']['name'], array('controller' => 'room_types', 'action' => 'view', $package['RoomType']['id'])); ?>
		</td>
		<td><?php echo $package['Package']['max_people']; ?>&nbsp;</td>
		<td><?php echo $package['Package']['additional_person_cost']; ?>&nbsp;</td>

		<td><?php echo $package['Package']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $package['Package']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $package['Package']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $package['Package']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $package['Package']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Package', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types', true), array('controller' => 'room_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type', true), array('controller' => 'room_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Package Meta', true), array('controller' => 'package_meta', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package Metum', true), array('controller' => 'package_meta', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases', true), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>-->