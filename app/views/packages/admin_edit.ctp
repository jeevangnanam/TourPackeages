<script type="text/javascript" src="/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "specific_textareas",
        editor_selector : "textarea1",
		width: "900",
		height:"200",
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
<script type="text/javascript">
function load_related_hotels(location_id,div_id){
	//console.log(location_id);
	//$('#location_'+location_id).click(function() {
		//$('#related_hotels_'+div_id).load('/packages/gallery/'+location_id);
		
	//});
	$('#related_hotels_'+div_id).load('<?php echo $this->webroot;?>packages/locationRelatedHotels/'+location_id);
	$('#related_hotels_'+div_id).slideToggle('slow', function() {
	    // Animation complete.
	 });
}
function remove_img(id,item_id){
	$.ajax({
	   type: "POST",
	   url: "/packages/removeImg/"+id,
	   //data: "name=John&location=Boston",
	   success: function(){
	     alert( "Image Removed: " );
	     $("#"+item_id).hide("slow");
	   }
	});
}
</script>
<style>
.o2k7Skin table, .o2k7Skin tbody, .o2k7Skin a, .o2k7Skin img, .o2k7Skin tr, .o2k7Skin div, .o2k7Skin td, .o2k7Skin iframe, .o2k7Skin span, .o2k7Skin *, .o2k7Skin .mceText{
	background:#D7E1EF;}
</style>
<div class="packages form">
<?php echo $this->Form->create('Package', array('action' => 'edit', 'type' => 'file'));?>
<h2><?php __('Edit Package'); ?></h2>
	<fieldset>
		<div class="tabs">
			<ul>
                 <li><a href="#add-packages"><span><?php __('Package Fields'); ?></span></a></li>
                 <li><a href="#packages-locations"><span><?php __('Locations & Hotels'); ?></span></a></li>
                 <li><a href="#packages-meta"><span><?php __('Meta'); ?></span></a></li>
				 <li><a href="#packages-images"><span><?php __('Images'); ?></span></a></li>
				 <li><a href="#packages-dates"><span><?php __('Availability'); ?></span></a></li>
				 
                 <?php echo $this->Layout->adminTabs(); ?>
            </ul>
            <div id="add-packages">
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('package_cat_id',array('options'=>$packageCategories,'default'=>$this->data['PackageCategory']['name']));
					echo $this->Form->input('name');
					echo $this->Form->input('duration');
					echo $this->Form->label('locations');
					echo $this->Form->input('price');
					echo $this->Form->input('additional_person_cost');
					echo $this->Form->input('max_people');
					
					echo $this->Form->input('description',array('class'=>'textarea1'));
					echo $this->Form->input('terms',array('class'=>'textarea1'));
					echo $this->Form->input('short_description', array('type'=>'textarea','class'=>'textarea1'));
					echo $this->Form->input('default_map', array('label'=> 'Main Image', 'type'=> 'file'));
					echo $this->Form->input('default_video');
					echo $this->Form->input('status' , array('type' => 'select', 'options' => array('APPROVED' => 'APPROVED', 'NOT_APPROVED' => 'NOT APPROVED'), 'empty' => 'Select'));
				?>
			</div>
			
			<div id="packages-locations">
				<?php 
				foreach ($locations as $key=>$location){
					
					echo $this->Form->input('Location.location_id_'.$key ,array(
					'label' => $location,'type'=>'checkbox' ,'value' => $key,
					 'id'=>'location_'.$key,'hiddenField' => false ,'onclick'=>'load_related_hotels('.$key.','.$key.')'
					));?>
					<div id="related_hotels_<?php echo $key?>" style="display: none;">
						Loading Hotels..
					</div>
					<?php 
				}
				
				/*echo $this->Form->label('Hotels');
				foreach ($hotels as $key2=>$hotel){ 
					echo $this->Form->input('Hotel.hotel_id_'.$key2 ,array('label' => $hotel,'type'=>'checkbox' ,'value' => $key2, 'id'=>'hotel_'.$key2,'hiddenField' => false ));
				}*/
				echo $this->Form->input('room_type_id');
				echo $this->Form->input('meal_plan_id');
				?>
			</div>
			
			<div id="packages-meta">
				<?php echo $this->Form->input('meta.meta_name', array('value' => $this->data['PackageMeta'][0]['meta_name'] ));
					echo $this->Form->input('meta.value', array('value' => $this->data['PackageMeta'][0]['value'] ));
				?>
			</div>
			
			<div id="packages-images">
				<script src="<?php echo $this->webroot;?>js/multifile.js"></script>

					<p>
					   <?php 
							//echo $html->file('Image/name1', array('size' => '40'));
							echo $this->Form->input('Imagename1', array('label'=> 'Images', 'type'=> 'file','size' => '40'));
						?>
					</p>
					
				</form>
				
				<br>
				<br>
				
				Files:
				<!-- This is where the output will appear -->
				<div id="files_list">
						<?php
							echo $this->Form->input('PackageImagename1', array( 'type'=> 'hidden'));
						?>
				</div>
				Images:
				<div id="added_img">
					<?php foreach ($package_gallery_img as $key_img=>$variable) {?>
					<div style="float: left; width: 120px;" id="item_<?php echo $key_img; ?>">
						<?php echo $this->Html->image($this->webroot."uploads/packages/small/".$variable['PackageGallery']['url'],array('alt' => 'More Info','style'=>'width:100px;'));
						?>
						<a onclick="remove_img(<?php echo $variable['PackageGallery']['id'];?>,'item_<?php echo $key_img; ?>')" style="cursor: pointer;">Remove</a>
					</div>
					<?php 
					 }
					?>
				</div>
				<script type="text/javascript">
					var multi_selector = new MultiSelector( document.getElementById( 'files_list' ), 10 );
					multi_selector.addElement( document.getElementById( 'PackageImagename1' ) );
				</script>
				</div>
			
			<div id="packages-dates">
				<?php echo $datePicker->picker('PackageAvailability.0.start_date');?>
				<?php echo $datePicker->picker('PackageAvailability.0.end_date');?>
			</div>
		</div>
		<?php echo $this->Form->end(__('Submit', true));?>
		</div>
		
	</fieldset>

</div>
<!--<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Package.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Package.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Packages', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels', true), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel', true), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types', true), array('controller' => 'room_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type', true), array('controller' => 'room_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Package Meta', true), array('controller' => 'package_meta', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package Metum', true), array('controller' => 'package_meta', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Package Metas', true), array('controller' => 'package_metas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package Meta', true), array('controller' => 'package_metas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases', true), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase', true), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
