<div class="coupons view">
<h2><?php  __('Coupon');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $coupon['Coupon']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Coupon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $coupon['Coupon']['coupon']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $coupon['Coupon']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coupon', true), array('action' => 'edit', $coupon['Coupon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Coupon', true), array('action' => 'delete', $coupon['Coupon']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $coupon['Coupon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupons', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases', true), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Purchases');?></h3>
	<?php if (!empty($coupon['Purchase'])):?>
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
		<th><?php __('Coupon Id'); ?></th>
		<th><?php __('Admin Remarks'); ?></th>
		<th><?php __('Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($coupon['Purchase'] as $purchase):
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
			<td><?php echo $purchase['coupon_id'];?></td>
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
