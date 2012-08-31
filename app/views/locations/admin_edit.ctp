<script type="text/javascript" src="/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
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
<div class="locations form">
<?php echo $this->Form->create('Location');?>
<h2><?php __('Edit Location'); ?></h2>
	<fieldset>
		<div class="tabs">
			<ul>
                 <li><a href="#add-location"><span><?php __('Package Fields'); ?></span></a></li>
                 <li><a href="#location-meta"><span><?php __('Meta'); ?></span></a></li>
                 <?php echo $this->Layout->adminTabs(); ?>
            </ul>
            <div id="add-location">
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('name');
					echo $this->Form->input('info');
				?>
			</div>
			<div id="location-meta">
				<?php echo $this->Form->input('meta.meta_name', array('value' => $this->data['LocationMeta'][0]['meta_name'] ));
					echo $this->Form->input('meta.value', array('value' => $this->data['LocationMeta'][0]['value'] ));
				?>
			</div>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<!--<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Location.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Location.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Location Meta', true), array('controller' => 'location_meta', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location Metum', true), array('controller' => 'location_meta', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vas', true), array('controller' => 'vas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Va', true), array('controller' => 'vas', 'action' => 'add')); ?> </li>
	</ul>
</div>-->