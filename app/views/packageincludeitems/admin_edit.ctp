<div class="packageincludeitems form">
<?php echo $this->Form->create('Packageincludeitem');?>
	<fieldset>
		<legend><?php __('Admin Edit Packageincludeitem'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Packageincludeitem.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Packageincludeitem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Packageincludeitems', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Packageincludes', true), array('controller' => 'packageincludes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Packageinclude', true), array('controller' => 'packageincludes', 'action' => 'add')); ?> </li>
	</ul>
</div>