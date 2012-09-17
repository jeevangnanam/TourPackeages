<div class="packageincludes form">
<?php echo $this->Form->create('Packageinclude');?>
	<fieldset>
		<legend><?php __('Admin Edit Packageinclude'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('package_id');
		echo $this->Form->input('packageincludeitem_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Packageinclude.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Packageinclude.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Packageincludes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packageincludeitems', true), array('controller' => 'packageincludeitems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Packageincludeitem', true), array('controller' => 'packageincludeitems', 'action' => 'add')); ?> </li>
	</ul>
</div>