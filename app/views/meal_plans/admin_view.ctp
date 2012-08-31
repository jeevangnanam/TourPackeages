<div class="mealPlans view">
<h2><?php  __('Meal Plan');?></h2>
	
    
    <table width="100%" border="1">
  <tr>
    <td><?php __('Hotel'); ?></td>
    <td><?php echo $this->Html->link($mealPlan['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $mealPlan['Hotel']['id'])); ?></td>
  </tr>
  <tr>
    <td><?php __('Room Type'); ?></td>
    <td><?php echo $this->Html->link($mealPlan['RoomType']['name'], array('controller' => 'room_types', 'action' => 'view', $mealPlan['RoomType']['id'])); ?></td>
  </tr>
  <tr>
    <td><?php __('Price'); ?></td>
    <td><?php echo $mealPlan['MealPlan']['price']; ?></td>
  </tr>
  <tr>
    <td><?php __('Image'); ?></td>
    <td><?php //echo $mealPlan['MealPlan']['image']; 
    echo $this->Html->link($this->Image->resize('' . $mealPlan['MealPlan']['image'], 100, 200), array('controller' => 'meal_plans', 'action' => 'edit', $mealPlan['MealPlan']['id']), array('escape' => false));?></td>
  </tr>
  <tr>
    <td><?php __('Info'); ?></td>
    <td><?php echo $mealPlan['MealPlan']['info']; ?></td>
  </tr>
  <tr>
    <td><?php __('Status'); ?></td>
    <td><?php echo $mealPlan['MealPlan']['status']; ?></td>
  </tr>
  </table>

    
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Meal Plan', true), array('action' => 'edit', $mealPlan['MealPlan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Meal Plan', true), array('action' => 'delete', $mealPlan['MealPlan']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mealPlan['MealPlan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Meal Plans', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal Plan', true), array('action' => 'add')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types', true), array('controller' => 'room_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type', true), array('controller' => 'room_types', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
