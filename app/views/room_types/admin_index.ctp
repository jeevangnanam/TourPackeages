<div class="roomTypes index">
	<h2><?php __('Room Types');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('hotel_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($roomTypes as $roomType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $roomType['RoomType']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($roomType['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $roomType['Hotel']['id'])); ?>
		</td>
		<td><?php echo $roomType['RoomType']['name']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $roomType['RoomType']['id']));echo $this->Html->image('icons/page.png'); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $roomType['RoomType']['id']));echo $this->Html->image('icons/page_edit.png');  ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $roomType['RoomType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $roomType['RoomType']['id'])); echo $this->Html->image('icons/page_delete.png');?>
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Room Type', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meal Plans', true), array('controller' => 'meal_plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal Plan', true), array('controller' => 'meal_plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>