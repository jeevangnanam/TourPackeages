<div class="purchases index">
	<h2><?php __('Purchases');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('package_id');?></th>
			<th><?php echo $this->Paginator->sort('hotel_id');?></th>
			<th><?php echo $this->Paginator->sort('user_remarks');?></th>
			<th><?php echo $this->Paginator->sort('order_processed_by');?></th>
			<th><?php echo $this->Paginator->sort('order_approved_by');?></th>
			<th><?php echo $this->Paginator->sort('coupon_id');?></th>
			<th><?php echo $this->Paginator->sort('admin_remarks');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($purchases as $purchase):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $purchase['Purchase']['id']; ?>&nbsp;</td>
		<td><?php echo $purchase['Purchase']['date']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($purchase['User']['name'], array('controller' => 'users', 'action' => 'view', $purchase['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchase['Package']['name'], array('controller' => 'packages', 'action' => 'view', $purchase['Package']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchase['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $purchase['Hotel']['id'])); ?>
		</td>
		<td><?php echo $purchase['Purchase']['user_remarks']; ?>&nbsp;</td>
		<td><?php echo $purchase['Purchase']['order_processed_by']; ?>&nbsp;</td>
		<td><?php echo $purchase['Purchase']['order_approved_by']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($purchase['Coupon']['id'], array('controller' => 'coupons', 'action' => 'view', $purchase['Coupon']['id'])); ?>
		</td>
		<td><?php echo $purchase['Purchase']['admin_remarks']; ?>&nbsp;</td>
		<td><?php echo $purchase['Purchase']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $purchase['Purchase']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $purchase['Purchase']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $purchase['Purchase']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $purchase['Purchase']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Purchase', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupons', true), array('controller' => 'coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon', true), array('controller' => 'coupons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments', true), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment', true), array('controller' => 'payments', 'action' => 'add')); ?> </li>
	</ul>
</div>