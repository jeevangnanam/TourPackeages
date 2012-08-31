<div class="payments form">
<?php echo $this->Form->create('Payment');?>
	<fieldset>
		<legend><?php __('Edit Payment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('purchase_id');
		echo $this->Form->input('total_amount');
		echo $this->Form->input('merchant_reference');
		echo $this->Form->input('gateway_id');
		echo $this->Form->input('status');
		echo $this->Form->input('is_authorized');
		echo $this->Form->input('authorized_admin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Payment.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Payment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Payments', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases', true), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>