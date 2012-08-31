<div class="packageGalleries index">
	<h2><?php __('Package Galleries');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('package_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($packageGalleries as $packageGallery):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $packageGallery['PackageGallery']['id']; ?>&nbsp;</td>
		<td><?php echo $packageGallery['PackageGallery']['url']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($packageGallery['Package']['name'], array('controller' => 'packages', 'action' => 'view', $packageGallery['Package']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $packageGallery['PackageGallery']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $packageGallery['PackageGallery']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $packageGallery['PackageGallery']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $packageGallery['PackageGallery']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Package Gallery', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>