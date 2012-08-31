<div class="vas view">
<h2><?php  __('Va');?></h2>
	
    
    <table width="100%" border="1" cellpadding="4" cellspacing="4">
  <tr>
    <td><?php __('Name'); ?></td>
    <td><?php echo $va['Va']['name']; ?></td>
  </tr>
  <tr>
    <td><?php __('Location'); ?></td>
    <td><?php echo $va['Location']['name']; ?></td>
  </tr>
  <tr>
    <td><?php __('Minimum'); ?></td>
    <td><?php echo $va['Va']['minimum']; ?></td>
  </tr>
  <tr>
    <td><?php __('Maximum'); ?></td>
    <td><?php echo $va['Va']['maximum']; ?></td>
  </tr>
  <tr>
    <td><?php __('Price'); ?></td>
    <td><?php echo $va['Va']['price']; ?></td>
  </tr>
  </table>

</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Va', true), array('action' => 'edit', $va['Va']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Va', true), array('action' => 'delete', $va['Va']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $va['Va']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Va', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
