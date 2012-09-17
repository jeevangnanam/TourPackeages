<div class="packageincludeitems view">
<h2><?php  __('Packageincludeitem');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $packageincludeitem['Packageincludeitem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $packageincludeitem['Packageincludeitem']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $packageincludeitem['Packageincludeitem']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Packageincludeitem', true), array('action' => 'edit', $packageincludeitem['Packageincludeitem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Packageincludeitem', true), array('action' => 'delete', $packageincludeitem['Packageincludeitem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $packageincludeitem['Packageincludeitem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Packageincludeitems', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Packageincludeitem', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packageincludes', true), array('controller' => 'packageincludes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Packageinclude', true), array('controller' => 'packageincludes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Packageincludes');?></h3>
	<?php if (!empty($packageincludeitem['Packageinclude'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Package Id'); ?></th>
		<th><?php __('Packageincludeitem Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($packageincludeitem['Packageinclude'] as $packageinclude):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $packageinclude['id'];?></td>
			<td><?php echo $packageinclude['package_id'];?></td>
			<td><?php echo $packageinclude['packageincludeitem_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'packageincludes', 'action' => 'view', $packageinclude['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'packageincludes', 'action' => 'edit', $packageinclude['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'packageincludes', 'action' => 'delete', $packageinclude['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $packageinclude['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Packageinclude', true), array('controller' => 'packageincludes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
