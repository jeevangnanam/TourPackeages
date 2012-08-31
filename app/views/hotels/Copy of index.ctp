<div class="paddingb68">
   		 <div class="background">
            <section id="content">
                        <div class="container_24  ">
                        <div class="hotels index">
	<h2><?php __('Hotels');?></h2>
	<div class="hotels_main" style="">
	<?php
	$i = 0;
	foreach ($hotels as $hotel):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<!--<tr<?php echo $class;?>>
		<td><?php echo $hotel['Hotel']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($hotel['Location']['name'], array('controller' => 'locations', 'action' => 'view', $hotel['Location']['id'])); ?>
		</td>
		<td><?php echo $hotel['Hotel']['name']; ?>&nbsp;</td>
		
		<td><?php echo $hotel['Hotel']['star_class']; ?>&nbsp;</td>
		<td><?php echo $hotel['Hotel']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $hotel['Hotel']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $hotel['Hotel']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $hotel['Hotel']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $hotel['Hotel']['id'])); ?>
		</td>
	</tr>
-->
	
	<div class="hotels_details">
		<ul>
			<li>Hotel: <?php 
			$star = $hotel['Hotel']['star_class'];
			echo $this->Html->link($hotel['Hotel']['name'], array('action' => 'view', $hotel['Hotel']['id'])); 
			for($i=1;$i<=$star;$i++){
				//echo '<img src="'.$this->webroot.'"img/hotel_star.gif"/> ';
			?>
			<img src="<?php echo $this->webroot; ?>img/icons/marker5_02.jpg"> 
			<?php }?>
			<br>
			Location: <?php echo $hotel['Location']['name'];?>
			</li>
			
			
			
		</ul>
	</div>
	
	
			
	<?php endforeach; ?>
	
	</div>
	
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

</div>
</div>
</div>