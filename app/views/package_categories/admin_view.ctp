<div class="packageCategories view">
<h2><?php  __('Package Category');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $packageCategory['PackageCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $packageCategory['PackageCategory']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Package Category', true), array('action' => 'edit', $packageCategory['PackageCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Package Category', true), array('action' => 'delete', $packageCategory['PackageCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $packageCategory['PackageCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Package Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package Category', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
