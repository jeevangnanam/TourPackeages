<div class="packages view">
<h2><?php  __('Package');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Duration'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['duration']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Location'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($package['Location']['name'], array('controller' => 'locations', 'action' => 'view', $package['Location']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hotel'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($package['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $package['Hotel']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Room Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($package['RoomType']['name'], array('controller' => 'room_types', 'action' => 'view', $package['RoomType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Meal Plan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($package['MealPlan']['name'], array('controller' => 'meal_plans', 'action' => 'view', $package['MealPlan']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Max People'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['max_people']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Additional Person Cost'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['additional_person_cost']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Default Map'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['default_map']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Default Video'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['default_video']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $package['Package']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Package', true), array('action' => 'edit', $package['Package']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Package', true), array('action' => 'delete', $package['Package']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $package['Package']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types', true), array('controller' => 'room_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type', true), array('controller' => 'room_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meal Plans', true), array('controller' => 'meal_plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal Plan', true), array('controller' => 'meal_plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Package Metas', true), array('controller' => 'package_metas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package Meta', true), array('controller' => 'package_metas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases', true), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Package Metas');?></h3>
	<?php if (!empty($package['PackageMeta'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Package Id'); ?></th>
		<th><?php __('Meta Name'); ?></th>
		<th><?php __('Value'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($package['PackageMeta'] as $packageMeta):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $packageMeta['id'];?></td>
			<td><?php echo $packageMeta['package_id'];?></td>
			<td><?php echo $packageMeta['meta_name'];?></td>
			<td><?php echo $packageMeta['value'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'package_metas', 'action' => 'view', $packageMeta['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'package_metas', 'action' => 'edit', $packageMeta['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'package_metas', 'action' => 'delete', $packageMeta['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $packageMeta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Package Meta', true), array('controller' => 'package_metas', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Purchases');?></h3>
	<?php if (!empty($package['Purchase'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Package Id'); ?></th>
		<th><?php __('Hotel Id'); ?></th>
		<th><?php __('User Remarks'); ?></th>
		<th><?php __('Order Processed By'); ?></th>
		<th><?php __('Order Approved By'); ?></th>
		<th><?php __('Coupon'); ?></th>
		<th><?php __('Admin Remarks'); ?></th>
		<th><?php __('Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($package['Purchase'] as $purchase):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $purchase['id'];?></td>
			<td><?php echo $purchase['date'];?></td>
			<td><?php echo $purchase['user_id'];?></td>
			<td><?php echo $purchase['package_id'];?></td>
			<td><?php echo $purchase['hotel_id'];?></td>
			<td><?php echo $purchase['user_remarks'];?></td>
			<td><?php echo $purchase['order_processed_by'];?></td>
			<td><?php echo $purchase['order_approved_by'];?></td>
			<td><?php echo $purchase['coupon'];?></td>
			<td><?php echo $purchase['admin_remarks'];?></td>
			<td><?php echo $purchase['status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'purchases', 'action' => 'view', $purchase['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'purchases', 'action' => 'edit', $purchase['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'purchases', 'action' => 'delete', $purchase['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $purchase['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
