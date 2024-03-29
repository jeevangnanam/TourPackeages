<div class="comment-form">
    <fieldset>
    	<legend>Add New Comment</legend>
		<?php
	        $type = $types_for_layout[$node['Node']['type']];

	        if ($this->params['controller'] == 'comments') {
	            $nodeLink = $html->link(__('Go back to original post', true) . ': ' . $node['Node']['title'], $node['Node']['url']);
	            echo $html->tag('p', $nodeLink, array('class' => 'back'));
	        }

	        $formUrl = array(
	            'controller' => 'comments',
	            'action' => 'add',
	            $node['Node']['id'],
	        );
	        if (isset($parentId) && $parentId != null) {
	            $formUrl[] = $parentId;
	        }

	        echo $form->create('Comment', array('url' => $formUrl));
	            if ($session->check('Auth.User.id')) {
					echo $form->input('Comment.name', array(
	                    'label' => __('Name', true),
	                    'value' => $session->read('Auth.User.name'),
	                    'readonly' => 'readonly',
	                ));
					echo "<div class='breaker'></div>";
	                echo $form->input('Comment.email', array(
	                    'label' => __('Email', true),
	                    'value' => $session->read('Auth.User.email'),
	                    'readonly' => 'readonly',
	                ));
					echo "<div class='breaker'></div>";
	                echo $form->input('Comment.website', array(
	                    'label' => __('Website', true),
	                    'value' => $session->read('Auth.User.website'),
	                    'readonly' => 'readonly',
	                ));
					echo "<div class='breaker'></div>";
	                echo $form->input('Comment.body', array('label' => false));
	            } else {
	                echo $form->input('Comment.name', array('label' => __('Name', true)));
					echo "<div class='breaker'></div>";
	                echo $form->input('Comment.email', array('label' => __('Email', true)));
	                echo "<div class='breaker'></div>";
					echo $form->input('Comment.website', array('label' => __('Website', true)));
					echo "<div class='breaker'></div>";	
	                echo $form->input('Comment.body', array('label' => false));
	            }

	            if ($type['Type']['comment_captcha']) {
	                echo $recaptcha->display_form();
	            }
	        echo $form->end(__('Post Comment', true));
	    ?>
    </fieldset>
</div>