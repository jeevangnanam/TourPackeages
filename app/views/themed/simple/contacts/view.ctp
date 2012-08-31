<div id="contact-<?php echo $contact['Contact']['id']; ?>" class="">
    <h2><?php echo $contact['Contact']['title']; ?></h2>
	<p>If you would like to get in contact with me fill out the form below and I will try to get back to you as soon as possible.</p>
    <div class="contact-body">
    <?php echo $contact['Contact']['body']; ?>
    </div>

    <?php if ($contact['Contact']['message_status']) { ?>
    <div class="contact-form">
    <fieldset>
    	<legend>Contact Form</legend>
    <?php
        echo $form->create('Message', array(
            'url' => array(
                'controller' => 'contacts',
                'action' => 'view',
                $contact['Contact']['alias'],
            ),
        ));
        echo $form->input('Message.name', array('label' => __('Name', true)));
		echo "<div class='breaker'></div>";
        echo $form->input('Message.email', array('label' => __('Email', true)));
        echo "<div class='breaker'></div>";
		echo $form->input('Message.title', array('label' => __('Subject', true)));
        echo "<div class='breaker'></div>";
		echo $form->input('Message.body', array('label' => __('Message', true)));
        if ($contact['Contact']['message_captcha']) {
            echo $recaptcha->display_form();
        }
        echo $form->end(__('Send Message', true));
    ?>
	</fieldset>
    </div>
    <?php } ?>
</div>