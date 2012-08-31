<div class="coupons form">
<?php echo $this->Form->create('Coupon');?>
	<fieldset>
		<legend><?php __('Add Coupon'); ?></legend>
	<?php
		echo $this->Form->input('coupon');
		echo $this->Form->input('reduce_percentage');
		echo $this->Form->input('status' , array('type' => 'select', 'options' => array('ACTIVATE' => 'ACTIVATE', 'NOT_ACTIVATE' => 'NOT NOT_ACTIVATE'), 'empty' => 'Select'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Coupons', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Purchases', true), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>