<div class="mealPlans index">
	<h2><?php __('Meal Plans');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('hotel_id');?></th>
			<th><?php echo $this->Paginator->sort('room_type_id');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('image');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mealPlans as $mealPlan):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mealPlan['MealPlan']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mealPlan['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $mealPlan['Hotel']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($mealPlan['RoomType']['name'], array('controller' => 'room_types', 'action' => 'view', $mealPlan['RoomType']['id'])); ?>
		</td>
		<td><?php echo $mealPlan['MealPlan']['price']; ?>&nbsp;</td>
		<td><?php //echo $mealPlan['MealPlan']['image']; 
$thumbnail = $this->Html->link($this->Image->resize('' . $mealPlan['MealPlan']['image'], 100, 200), array('controller' => 'meal_plans', 'action' => 'edit', $mealPlan['MealPlan']['id']), array('escape' => false));
			
			echo $thumbnail;
			?>&nbsp;</td>

		<td><?php echo $mealPlan['MealPlan']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mealPlan['MealPlan']['id']));  echo $this->Html->image('icons/page.png');?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mealPlan['MealPlan']['id']));echo $this->Html->image('icons/page_edit.png'); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mealPlan['MealPlan']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mealPlan['MealPlan']['id'])); echo $this->Html->image('icons/page_delete.png');  ?>
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
<!--<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Meal Plan', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types', true), array('controller' => 'room_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type', true), array('controller' => 'room_types', 'action' => 'add')); ?> </li>
	</ul>
</div>-->