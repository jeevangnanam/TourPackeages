<div class="locations view">
<h2><?php  __('Location');?></h2>
 
    <table width="100%" border="0">
  <tr>
    <td><?php __('Name'); ?></td>
    <td><?php echo $location['Location']['name']; ?></td>
  </tr>
  <tr>
    <td><?php __('Info'); ?></td>
    <td><?php echo $location['Location']['info']; ?></td>
  </tr>
  </table>

</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Location', true), array('action' => 'edit', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Location', true), array('action' => 'delete', $location['Location']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('action' => 'add')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Location Meta', true), array('controller' => 'location_meta', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location Metum', true), array('controller' => 'location_meta', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vas', true), array('controller' => 'vas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Va', true), array('controller' => 'vas', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Hotels');?></h3>
	<?php if (!empty($location['Hotel'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Location Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Star Class'); ?></th>
		<th><?php __('Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($location['Hotel'] as $hotel):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $hotel['id'];?></td>
			<td><?php echo $hotel['location_id'];?></td>
			<td><?php echo $hotel['name'];?></td>
			<td><?php echo $hotel['star_class'];?></td>
			<td><?php echo $hotel['status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'hotels', 'action' => 'view', $hotel['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'hotels', 'action' => 'edit', $hotel['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'hotels', 'action' => 'delete', $hotel['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $hotel['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>

<div class="related">
	<h3><?php __('Related Vas');?></h3>
	<?php if (!empty($location['Va'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Location Id'); ?></th>
		<th><?php __('Minimum'); ?></th>
		<th><?php __('Maximum'); ?></th>
		<th><?php __('Price'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($location['Va'] as $va):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $va['id'];?></td>
			<td><?php echo $va['name'];?></td>
			<td><?php echo $va['location_id'];?></td>
			<td><?php echo $va['minimum'];?></td>
			<td><?php echo $va['maximum'];?></td>
			<td><?php echo $va['price'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'vas', 'action' => 'view', $va['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'vas', 'action' => 'edit', $va['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'vas', 'action' => 'delete', $va['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $va['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Va', true), array('controller' => 'vas', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
