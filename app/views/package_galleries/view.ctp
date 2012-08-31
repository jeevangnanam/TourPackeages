<div class="packageGalleries view">
<h2><?php  __('Package Gallery');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $packageGallery['PackageGallery']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $packageGallery['PackageGallery']['url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Package'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($packageGallery['Package']['name'], array('controller' => 'packages', 'action' => 'view', $packageGallery['Package']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Package Gallery', true), array('action' => 'edit', $packageGallery['PackageGallery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Package Gallery', true), array('action' => 'delete', $packageGallery['PackageGallery']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $packageGallery['PackageGallery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Package Galleries', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package Gallery', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>
