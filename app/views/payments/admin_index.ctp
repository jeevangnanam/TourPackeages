<script language="javascript">
function transfer1(obj) {
$('#frm').submit();
}

function transfer(obj) {
	  $.getJSON(
			"/Payments/getreport/"+$(obj).val(),
			function(data){// data == response
			}
		);

}

function transferuser(obj) {
	  $.getJSON(
			"/Payments/getuserreport/"+$(obj).val(),
			function(data){
			}
		);

}
</script>
<div class="payments index">
	<h2><?php __('Payments');?></h2>
    
     <?php 
  
	$dates=array();
	 
	  foreach( $search_date as $key => $date ){
			  $date1 = split(" ", $date);
			  $dates[$date1[0]]=$date1[0];
	   }
	   
	  foreach( $users as $key => $user ){
		   $set_user[]=$users[$key]['Payment']['user_id']."=".$users[$key]['User']['name'];
	  }

	  $unique_user=array_unique($set_user);
	  foreach( $unique_user as $key => $user_new1 ){
			   $new_user[$user_new1]= $user_new1;
			}
	  
	  echo $form->create("Payment",array('controller'=>'payments','action' => '/index','id'=>'frm'));
	  echo $form->input('search',array('type'=>'select','style' => 'width:' . 95 . 'px','label'=>'Search','options'=>$dates,'onchange'=>'transfer1(this)','empty' => true));
	  echo $form->end('search');
	 
	  echo $form->create("",array('controller'=>'payments','action' => '/admin_viewpdf','id'=>'frm1'));
	  echo $form->input('genarate',array('type'=>'select','style' => 'width:' . 95 . 'px','label'=>'Reports create per date','onchange'=>'transfer(this)','options'=>$dates,'empty' => true));
	  echo $form->button('Report', array('type'=>'submit'));
	  echo $form->end();
	  
	  echo $form->create("",array('controller'=>'payments','action' => '/admin_viewuserpdf','id'=>'frm2'));
	  echo $form->input('user',array('type'=>'select','style' => 'width:' . 95 . 'px','label'=>'Reports create per user','onchange'=>'transferuser(this)','options'=>$new_user,'empty' => true));
	  echo $form->button('Report', array('type'=>'submit'));
	  echo $form->end();
	  
     
  ?>
  <br/>
  


	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('purchase_id');?></th>
			<th><?php echo $this->Paginator->sort('total_amount');?></th>
			<th><?php echo $this->Paginator->sort('merchant_reference');?></th>
			<th><?php echo $this->Paginator->sort('gateway_id');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('is_authorized');?></th>
			<th><?php echo $this->Paginator->sort('authorized_admin');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
    
  
	<?php 
	 
	$i = 0;
	foreach ($payments as $payment):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $payment['Payment']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($payment['User']['name'], array('controller' => 'users', 'action' => 'view', $payment['User']['id']));?>
		</td>
		<td>
			<?php echo $this->Html->link($payment['Purchase']['id'], array('controller' => 'purchases', 'action' => 'view', $payment['Purchase']['id'])); ?>
		</td>
		<td><?php echo $payment['Payment']['total_amount']; ?>&nbsp;</td>
		<td><?php echo $payment['Payment']['merchant_reference']; ?>&nbsp;</td>
		<td><?php echo $payment['Payment']['gateway_id']; ?>&nbsp;</td>
		<td><?php echo $payment['Payment']['status']; ?>&nbsp;</td>
		<td><?php echo $payment['Payment']['is_authorized']; ?>&nbsp;</td>
		<td><?php echo $payment['Payment']['authorized_admin']; ?>&nbsp;</td>
		<td class="actions" style="width:170px" >
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $payment['Payment']['id']));  echo $this->Html->image('icons/money.png'); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $payment['Payment']['id']));  echo $this->Html->image('icons/money_add.png'); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $payment['Payment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $payment['Payment']['id'])); echo $this->Html->image('icons/money_delete.png');?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
  
  <br />
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
		<li><?php echo $this->Html->link(__('New Payment', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'));?> </li>
		<li><?php echo $this->Html->link(__('List Purchases', true), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>