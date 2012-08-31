<div class="roomTypes view">
<h2><?php  __('Room Type');?></h2>
	
    
    <table width="100%" border="1">
  <tr>
    <td><?php __('Hotel'); ?></td>
    <td><?php echo $this->Html->link($roomType['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $roomType['Hotel']['id'])); ?></td>
  </tr>
  <tr>
    <td><?php __('Name'); ?></td>
    <td><?php echo $roomType['RoomType']['name']; ?></td>
  </tr>
</table>

</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room Type', true), array('action' => 'edit', $roomType['RoomType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Room Type', true), array('action' => 'delete', $roomType['RoomType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $roomType['RoomType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type', true), array('action' => 'add')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meal Plans', true), array('controller' => 'meal_plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal Plan', true), array('controller' => 'meal_plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
