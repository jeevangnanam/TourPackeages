<div class="packageGalleries form">
<?php echo $this->Form->create('PackageGallery');?>
	<fieldset>
		<legend><?php __('Edit Package Gallery'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('url');
		echo $this->Form->input('package_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PackageGallery.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PackageGallery.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Package Galleries', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>