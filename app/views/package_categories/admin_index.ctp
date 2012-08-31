<div class="packageCategories index">
	<h2><?php __('Package Categories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($packageCategories as $packageCategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $packageCategory['PackageCategory']['id']; ?>&nbsp;</td>
		<td><?php echo $packageCategory['PackageCategory']['name']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $packageCategory['PackageCategory']['id'])); echo $this->Html->image('icons/page.png'); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $packageCategory['PackageCategory']['id']));  echo $this->Html->image('icons/page_edit.png'); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $packageCategory['PackageCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $packageCategory['PackageCategory']['id'])); echo $this->Html->image('icons/page_delete.png');?>
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
		<li><?php echo $this->Html->link(__('New Package Category', true), array('action' => 'add')); ?></li>
	</ul>
</div>