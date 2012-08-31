<script type="text/javascript">
$(document).ready(function(){
  	$("#link_register").click(function(){
    	$("#div_register").show('slow');
    	$("#div_login").hide('slow');
    	$("#link_register").hide();
    	$("#link_have_acc").show();
  	});
  	$("#link_have_acc").click(function(){
    	$("#div_login").slideToggle('slow');
    	$("#div_register").hide('slow');
    	$("#link_have_acc").hide();
    	$("#link_register").show();
  	});
});
</script>
<style>
.submit{
	float:left;
	border-radius:12px;
	}
legend{
	margin:auto;
	font-size:18px;
	margin-bottom:10px;
	}
.success {
    background: none repeat scroll 0 0 #B6DFF5;
    border: 1px solid #999999;
    margin-bottom: 10px;
    padding: 10px;
}
</style>
<div class="paddingb68">
<div class="background">
<div class="container_24  ">
<div class="col-padding">
<div class="wrapper">
                                
<ul>
	<li id="link_have_acc" style="display: none;">
		<a class="button-1">Already have Account?</a>
	</li>
	<li id="link_register">
		<a class="button-1">You Need an Account?</a>
	</li>
</ul>
<div class="users-form" id="div_register" style="display: none; width:900px;">
    <fieldset style="width:400px;">
    <?php echo $this->Form->create('User',array('controller' => 'users', 'action' => 'add'));?>
        
        <legend><?php __('Register'); ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password', array('value' => ''));
            echo $this->Form->input('name');
            echo $this->Form->input('email');
            echo $this->Form->input('website');
        ?>
        <?php echo $this->Form->end('Submit');?>
        </fieldset>
        
        <fieldset style="margin-left:20px; margin-top:-380px; margin-bottom:10px; margin-left: 500px;">
    	<?php echo $this->Facebook->registration(); ?>
        </fieldset>
</div>



<div class="users-form" id="div_login">
  <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
        <fieldset>
        <legend><?php __('Login'); ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
        ?>
        <?php echo $this->Form->end(__('Log In', array('class'=>'buttons-indent2 fright','name'=>'hello'), false));?>
       <div style="float:right;margin-top: 12px; margin-right: 70px;">  <?php
       echo $this->Html->link(__('Forgot password?', true), array(
            'admin' => false,
            'controller' => 'users',
            'action' => 'forgot',
        ), array(
            'class' => 'button-1',
        ));
    	?> </div>
        </fieldset>
    
    <?php //echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'add','id'=>'link_register')); ?>
   
</div>
 
</div>
	</div>
</div>
</div>
</div>