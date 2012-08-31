<script type="text/javascript" src="/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "specific_textareas",
        editor_selector : "content",
		theme : "advanced",
		width: "900",
		skin : "o2k7",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<style>
.o2k7Skin table, .o2k7Skin tbody, .o2k7Skin a, .o2k7Skin img, .o2k7Skin tr, .o2k7Skin div, .o2k7Skin td, .o2k7Skin iframe, .o2k7Skin span, .o2k7Skin *, .o2k7Skin .mceText{
	background:#D7E1EF;}
</style>
<?php $this->Html->script(array('hotels'), false); ?>
<div class="hotels form">
<h2><?php __('Add Hotel'); ?></h2>
<?php echo $this->Form->create('Hotel',array('action' => 'add', 'type' => 'file'));?>
	<fieldset>
		<div class="tabs">
			<ul>
                 <li><a href="#add-hotel"><span><?php __('Hotel Fields'); ?></span></a></li>
                 <li><a href="#hotel-meta"><span><?php __('Meta'); ?></span></a></li>
                 <?php echo $this->Layout->adminTabs(); ?>
            </ul>
            
            <div id="add-hotel" style="margin:10px; background:#CCC; border-radius:4px;">
				<?php
					echo $this->Form->input('location_id');
					echo $this->Form->input('name');
					echo $this->Form->input('info', array('type' => 'textarea', 'class' => 'content'));
					echo $this->Form->input('image', array('label'=> 'Images', 'type'=> 'file'));
					echo $this->Form->input('map', array('label'=> 'Google Map Code', 'type'=> 'textarea'));
					echo $this->Form->input('star_class' , array('type' => 'select', 'options' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), 'empty' => 'Select'));
					echo $this->Form->input('status' , array('type' => 'select', 'options' => array('APPROVED' => 'APPROVED', 'NOT_APPROVED' => 'NOT APPROVED'), 'empty' => 'Select'));
				?>
			</div>
			
			<div id="hotel-meta" style="margin:10px; background: #CCC; border-radius:4px;">
				<?php echo $this->Form->input('meta.meta_name');
					echo $this->Form->input('meta.value');
				?>
				<?php //echo $this->Layout->customMetaField();
				?>
			</div>
			
			
			<?php echo $this->Layout->adminTabs(); ?>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<!--<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Hotels', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
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
	</ul>
</div>-->