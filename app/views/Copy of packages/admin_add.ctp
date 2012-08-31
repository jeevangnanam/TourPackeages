<div class="packages form">
<?php echo $this->Form->create('Package', array('action' => 'add', 'type' => 'file'));?>
	<h2><?php __('Add Package'); ?></h2>
	<fieldset>
		<div class="tabs">
			<ul>
                 <li><a href="#add-packages"><span><?php __('Package Fields'); ?></span></a></li>
                 <li><a href="#packages-meta"><span><?php __('Meta'); ?></span></a></li>
                 <?php echo $this->Layout->adminTabs(); ?>
            </ul>
            <div id="add-packages">
			<?php
				echo $this->Form->input('name');
				echo $this->Form->input('duration');
				echo $this->Form->input('location_id');
				echo $this->Form->input('price');
				echo $this->Form->input('hotel_id');
				echo $this->Form->input('room_type_id');
				echo $this->Form->input('meal_plan_id');
				echo $this->Form->input('max_people');
				echo $this->Form->input('additional_person_cost');
				echo $this->Form->input('description');
				echo $this->Form->input('default_map', array('label'=> 'Map', 'type'=> 'file'));
				echo $this->Form->input('default_video');
				echo $this->Form->input('status' , array('type' => 'select', 'options' => array('APPROVED' => 'APPROVED', 'NOT_APPROVED' => 'NOT APPROVED'), 'empty' => 'Select'));
			?>
			</div>
			
			<div id="packages-meta">
				<?php echo $this->Form->input('meta.meta_name');
					echo $this->Form->input('meta.value');
				?>
			</div>
			
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<!--<div class="actions">
	<h3><?php __('Actions'); ?></h3>
<ul>

	<li><?php echo $this->Html->link(__('List Packages', true), array('action' => 'index'));?></li>
	<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('List Room Types', true), array('controller' => 'room_types', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Room Type', true), array('controller' => 'room_types', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('List Package Meta', true), array('controller' => 'package_meta', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Package Metum', true), array('controller' => 'package_meta', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('List Purchases', true), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>-->