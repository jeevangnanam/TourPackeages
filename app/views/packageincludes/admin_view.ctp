<div class="packageincludes view">
<h2><?php  __('Packageinclude');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $packageinclude['Packageinclude']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Package'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($packageinclude['Package']['name'], array('controller' => 'packages', 'action' => 'view', $packageinclude['Package']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Packageincludeitem'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($packageinclude['Packageincludeitem']['title'], array('controller' => 'packageincludeitems', 'action' => 'view', $packageinclude['Packageincludeitem']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Packageinclude', true), array('action' => 'edit', $packageinclude['Packageinclude']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Packageinclude', true), array('action' => 'delete', $packageinclude['Packageinclude']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $packageinclude['Packageinclude']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Packageincludes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Packageinclude', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packageincludeitems', true), array('controller' => 'packageincludeitems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Packageincludeitem', true), array('controller' => 'packageincludeitems', 'action' => 'add')); ?> </li>
	</ul>
</div>
