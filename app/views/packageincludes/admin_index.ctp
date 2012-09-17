<div class="packageincludes index">
	<h2><?php __('Packageincludes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('package_id');?></th>
			<th><?php echo $this->Paginator->sort('packageincludeitem_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($packageincludes as $packageinclude):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $packageinclude['Packageinclude']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($packageinclude['Package']['name'], array('controller' => 'packages', 'action' => 'view', $packageinclude['Package']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($packageinclude['Packageincludeitem']['title'], array('controller' => 'packageincludeitems', 'action' => 'view', $packageinclude['Packageincludeitem']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $packageinclude['Packageinclude']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $packageinclude['Packageinclude']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $packageinclude['Packageinclude']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $packageinclude['Packageinclude']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Packageinclude', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packageincludeitems', true), array('controller' => 'packageincludeitems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Packageincludeitem', true), array('controller' => 'packageincludeitems', 'action' => 'add')); ?> </li>
	</ul>
</div>