<div class="locations index">
	<h2><?php __('Locations');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('info');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($locations as $location):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $location['Location']['id']; ?>&nbsp;</td>
		<td><?php echo $location['Location']['name']; ?>&nbsp;</td>
		<td><?php echo $location['Location']['info']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $location['Location']['id'])); echo $this->Html->image('icons/map.png'); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $location['Location']['id']));echo $this->Html->image('icons/map_edit.png');  ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $location['Location']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $location['Location']['id'])); echo $this->Html->image('icons/map_delete.png'); ?>
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
		<li><?php echo $this->Html->link(__('New Location', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Location Meta', true), array('controller' => 'location_meta', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location Metum', true), array('controller' => 'location_meta', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vas', true), array('controller' => 'vas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vas', true), array('controller' => 'vas', 'action' => 'add')); ?> </li>
	</ul>
</div>