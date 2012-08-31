<div class="packageCategories form">
<?php echo $this->Form->create('PackageCategory');?>
	<fieldset>
		<legend><?php __('Edit Package Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PackageCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PackageCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Package Categories', true), array('action' => 'index'));?></li>
	</ul>
</div>