<div class="hotels view">
<h2><?php  __('Hotel');?></h2>
	
    
    <table width="100%" border="1">
  <tr>
    <td><?php __('Location'); ?></td>
    <td><?php echo $this->Html->link($hotel['Location']['name'], array('controller' => 'locations', 'action' => 'view', $hotel['Location']['id'])); ?></td>
  </tr>
  <tr>
    <td><?php __('Name'); ?></td>
    <td><?php echo $hotel['Hotel']['name']; ?></td>
  </tr>
  <tr>
    <td><?php __('Info'); ?></td>
    <td><?php echo $hotel['Hotel']['info']; ?></td>
  </tr>
  <tr>
    <td><?php __('Star Class'); ?></td>
    <td><?php echo $hotel['Hotel']['star_class']; ?></td>
  </tr>
  <tr>
    <td><?php __('Status'); ?></td>
    <td><?php echo $hotel['Hotel']['status']; ?></td>
  </tr>
  </table>

</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel', true), array('action' => 'edit', $hotel['Hotel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Hotel', true), array('action' => 'delete', $hotel['Hotel']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $hotel['Hotel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('action' => 'add')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Meta', true), array('controller' => 'hotel_meta', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Metum', true), array('controller' => 'hotel_meta', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meal Plans', true), array('controller' => 'meal_plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal Plan', true), array('controller' => 'meal_plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases', true), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types', true), array('controller' => 'room_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type', true), array('controller' => 'room_types', 'action' => 'add')); ?> </li>
	--></ul>
</div>
<div class="related">
	<h3><?php __('Related Hotel Meta');?></h3>
	<?php if (!empty($hotel['HotelMetum'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Hotel Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Value'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($hotel['HotelMetum'] as $hotelMetum):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $hotelMetum['id'];?></td>
			<td><?php echo $hotelMetum['hotel_id'];?></td>
			<td><?php echo $hotelMetum['name'];?></td>
			<td><?php echo $hotelMetum['value'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'hotel_meta', 'action' => 'view', $hotelMetum['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'hotel_meta', 'action' => 'edit', $hotelMetum['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'hotel_meta', 'action' => 'delete', $hotelMetum['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $hotelMetum['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hotel Metum', true), array('controller' => 'hotel_meta', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Meal Plans');?></h3>
	<?php if (!empty($hotel['MealPlan'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Hotel Id'); ?></th>
		<th><?php __('Room Type Id'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Image'); ?></th>
		<th><?php __('Info'); ?></th>
		<th><?php __('Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($hotel['MealPlan'] as $mealPlan):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $mealPlan['id'];?></td>
			<td><?php echo $mealPlan['hotel_id'];?></td>
			<td><?php echo $mealPlan['room_type_id'];?></td>
			<td><?php echo $mealPlan['price'];?></td>
			<td><?php 
            echo $this->Image->resize('' . $mealPlan['image'], 50, 200); ?></td>
			<td><?php echo $mealPlan['info'];?></td>
			<td><?php echo $mealPlan['status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'meal_plans', 'action' => 'view', $mealPlan['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'meal_plans', 'action' => 'edit', $mealPlan['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'meal_plans', 'action' => 'delete', $mealPlan['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mealPlan['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Meal Plan', true), array('controller' => 'meal_plans', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Packages');?></h3>
	<?php if (!empty($hotel['Package'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Duration'); ?></th>
		<th><?php __('Main Location Id'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Hotel Id'); ?></th>
		<th><?php __('Room Type Id'); ?></th>
		<th><?php __('Max People'); ?></th>
		<th><?php __('Additional Person Cost'); ?></th>

		<th><?php __('Default Video'); ?></th>
		<th><?php __('Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($hotel['Package'] as $package):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $package['id'];?></td>
			<td><?php echo $package['name'];?></td>
			<td><?php echo $package['duration'];?></td>
			<td><?php echo $package['location_id'];?></td>
			<td><?php echo $package['price'];?></td>
			<td><?php echo $package['hotel_id'];?></td>
			<td><?php echo $package['room_type_id'];?></td>
			<td><?php echo $package['max_people'];?></td>
			<td><?php echo $package['additional_person_cost'];?></td>
			<td><?php echo $package['default_video'];?></td>
			<td><?php echo $package['status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'packages', 'action' => 'view', $package['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'packages', 'action' => 'edit', $package['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'packages', 'action' => 'delete', $package['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $package['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Package', true), array('controller' => 'packages', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Purchases');?></h3>
	<?php if (!empty($hotel['Purchase'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Package Id'); ?></th>
		<th><?php __('Hotel Id'); ?></th>
		<th><?php __('User Remarks'); ?></th>
		<th><?php __('Order Processed By'); ?></th>
		<th><?php __('Order Approved By'); ?></th>
		<th><?php __('Coupon'); ?></th>
		<th><?php __('Admin Remarks'); ?></th>
		<th><?php __('Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($hotel['Purchase'] as $purchase):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $purchase['id'];?></td>
			<td><?php echo $purchase['date'];?></td>
			<td><?php echo $purchase['user_id'];?></td>
			<td><?php echo $purchase['package_id'];?></td>
			<td><?php echo $purchase['hotel_id'];?></td>
			<td><?php echo $purchase['user_remarks'];?></td>
			<td><?php echo $purchase['order_processed_by'];?></td>
			<td><?php echo $purchase['order_approved_by'];?></td>
			<td><?php echo $purchase['coupon'];?></td>
			<td><?php echo $purchase['admin_remarks'];?></td>
			<td><?php echo $purchase['status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'purchases', 'action' => 'view', $purchase['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'purchases', 'action' => 'edit', $purchase['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'purchases', 'action' => 'delete', $purchase['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $purchase['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Room Types');?></h3>
	<?php if (!empty($hotel['RoomType'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Hotel Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($hotel['RoomType'] as $roomType):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $roomType['id'];?></td>
			<td><?php echo $roomType['hotel_id'];?></td>
			<td><?php echo $roomType['name'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'room_types', 'action' => 'view', $roomType['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'room_types', 'action' => 'edit', $roomType['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'room_types', 'action' => 'delete', $roomType['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $roomType['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Room Type', true), array('controller' => 'room_types', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
