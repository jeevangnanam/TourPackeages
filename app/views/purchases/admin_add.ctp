<div class="purchases form">
<?php echo $this->Form->create('Purchase');?>
	<fieldset>
		<legend><?php __('Add Purchase'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('user_id');
		echo $this->Form->input('package_id');
		echo $this->Form->input('hotel_id');
		echo $this->Form->input('user_remarks');
		echo $this->Form->input('user_id',array('label'=>'Order Processed By','name'=>'data[Purchase][order_processed_by]','id'=>'order_processed_by'));
		
		echo $this->Form->input('user_id',array('label'=>'Order Approved By','name'=>'data[Purchase][order_approved_by]','id'=>'order_approved_by'));
		echo $this->Form->input('coupon_id');
		echo $this->Form->input('admin_remarks');
		echo $this->Form->input('status' , array('type' => 'select', 'options' => array('APPROVED' => 'APPROVED', 'NOT_APPROVED' => 'NOT_APPROVED', 'PENDING' => 'PENDING'), 'empty' => 'SELECT'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<!--<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Purchases', true), array('action' => 'index'));?></li>
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
</div>-->