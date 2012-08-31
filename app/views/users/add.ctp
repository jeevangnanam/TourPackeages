<div class="paddingb68">
<div class="background">
<div class="container_24  ">
<div class="col-padding">
                            	<div class="wrapper">
                                <div class="users-form">
    
    <?php echo $this->Form->create('User');?>
        <fieldset>
        <legend><?php echo $title_for_layout; ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password', array('value' => ''));
            echo $this->Form->input('name');
            echo $this->Form->input('email');
            echo $this->Form->input('website');
        ?>
        <?php echo $this->Form->end('Submit');?>
        </fieldset>
    
</div>

</div>
	</div>
</div>
</div>
</div>