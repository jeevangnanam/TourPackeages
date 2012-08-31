<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title_for_layout; ?> | <?php echo Configure::read('Site.title'); ?></title>
    <?php
        echo $layout->meta();
        echo $layout->feed();
        
		echo $html->script(array('jquery/jquery.min'));
		//echo $html->script(array('jquery/thickbox-compressed'));
		echo $html->script(array('rounded'));
        echo $layout->js();
        echo $html->css(array('reset', 'default','thickbox',));
        echo $javascript->link('jquery-ui-1.8.4.custom.min');
        echo $javascript->link('jquery.autocomplete.min');
        echo $javascript->link('jquery.jeditable.mini');
        
        echo $this->Html->script(array(
            'jquery/jquery.slug',
            'jquery/jquery.uuid',
            'jquery/jquery.cookie',
            'jquery/jquery.hoverIntent.minified',
            'jquery/superfish',
            'jquery/supersubs',
            'jquery/jquery.tipsy',
            'jquery/jquery.elastic-1.6.1.js',
            'jquery/thickbox-compressed',
            'admin',
        ));
        echo $this->Html->css(array(
            'thickbox',
        	'themes/base/jquery.ui.all',
        	'themes/demos',
        	'packages',
        ));
        /*echo $javascript->link('prototype');
		echo $javascript->link('scriptaculous.js?load=effects');

		echo $javascript->link('modalbox');
		echo $html->css('modalbox');

		echo $javascript->link('cakemodalbox');*/

        echo $scripts_for_layout;
    ?>
<script type="text/javascript">
	/*$(document).ready(function(){
		$("#panel").slideToggle("slow");
		$(".btn-slide").click(function(){
			$("#panel").slideToggle("slow");
			$(this).toggleClass("active"); return false;
		});
		
		 
	});*/
	$(function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 100,
			max: 3000,
			values: [ 100, 3000 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
				$.ajax({
					type: "POST",
					url: "/packages/index",
					data: $("#search-form").serialize(),
					success: function(responce){
						//alert(responce);
						$('#package_main_index').html(responce);
						encodeURI($('#package_catagory').val())+'/city:'+encodeURI($('#LocationName').val())+'/duration:'+encodeURI($('#package_duration').val());
					}
				});
				$("#package_main_index").empty().html('<img src="http://lifelh-dev.com/img/al_loading.gif" />');
			}
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			" - $" + $( "#slider-range" ).slider( "values", 1 ) );
	});
	
	$(function() {
		$( "#slider-date_range" ).slider({
			range: true,
			min: 1,
			max: 14,
			step: 1,
			values: [ 1, 14 ],
			slide: function( event, ui ) {
				$( "#date_range" ).val( "Date(s) " + ui.values[ 0 ] + " to Date(s)" + ui.values[ 1 ] );
				$.ajax({
					type: "POST",
					url: "/packages/index",
					data: $("#search-form").serialize(),
					success: function(responce){
						//alert(responce);
						$('#package_main_index').html(responce);
					}
				});
				$("#package_main_index").empty().html('<img src="http://lifelh-dev.com/img/al_loading.gif" />');
			}
		});
		$( "#date_range" ).val( "Date(s) " + $( "#slider-date_range" ).slider( "values", 0 ) +
			" - Date(s) " + $( "#slider-date_range" ).slider( "values", 1 ) );
	});
	</script>
</head>
<body>
	<div id="bg_star">
		
	</div>
	<div id="container">
		<h1 id="logo" class="left"><?php echo $html->link(Configure::read('Site.title'), '/'); ?></h1>
		<div id="tagline" class="left"><?=Configure::read('Site.tagline')?></div>
		<div id="my_account"><?php 
			if($session->check('Auth.User.id')== ''){
				echo $this->Html->link('My Account', array('controller' => 'my_account', 'action' => ''), array('escape' => true));	
			}else{
				echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));	
			}
			?>
			
		</div>
		<div class="breaker"></div>
		<!--<div id="search">
			<form id="search_form" method="post" action="javascript: document.location.href=''+Croogo.basePath+'search/q:'+encodeURI($('#search_form #search_field').val());">
				<?php
				$qValue = null;
				if (isset($this->params['named']['q'])) {
					$qValue = $this->params['named']['q'];
				}
				echo $form->input('q', array(
					'label' => false,
					'name' => 'q',
					'value' => $qValue,
					'id' => 'search_field'
					));
				?>
	        </form>
		</div>
		--><div id="main">
			<div id="nav">
				<?php echo $layout->menu('main', array('dropdown' => true)); ?>
			</div>
			
			<div id="panel">
			<div class="users-form">
				<?php //echo $this->Form->create('Packages',array('controller' => 'packages', 'action' => 'search','q:'=>'hi'));?>
				<form id="search-form" method="post" action="javascript: document.location.href='/packages/search/q:'+encodeURI($('#package_catagory').val())+'/city:'+encodeURI($('#LocationName').val())+'/duration:'+encodeURI($('#package_duration').val());">
							
				<?php echo $this->Form->input('package_catagory',array('options' => $packageCategories,'empty'=>'Select Package'));?>
				
				<?php $cityValue = null;
					if (isset($this->params['named']['city'])) {
						$cityValue = $this->params['named']['city'];
					}
					$duration  = $this->params['named']['duration'];
					
				 echo $ajax->autoComplete('Location.name', '/locations/autoComplete',array('label' => 'Location','value' => $cityValue));
				 
				 //echo $ajax->autoComplete('Package.duration', '/packages/packageDurations',array('label' => 'Duration','value' => $this->params['named']['duration']));
				 echo $this->Form->input('package_duration',array('value'=>$duration));
				?>
				
				<?php echo $this->Form->end('Submit');?>
			</div>
	        <div style="clear:both;"></div>
	          <div class="left_details_boxs">
	              <div class="contactlogo"><img title="" alt="" src="http://img1.yatra.com/images/holiday/phoneicon.jpg"></div>
	              <div class="contactno"><strong>Call our experts</strong><div style="font-size:13px; font-weight:bold; color:#656a70;"><table><tbody><tr><td>North &amp; East:</td><td>1860 5000 900</td></tr><tr><td>West:</td><td>1860 5000 018</td></tr><tr><td>South:</td><td>1860 5000 810</td></tr></tbody></table> </div></div>
	          </div>
	          
	          <div style="float:left; width:224px; margin-top:20px;">	<div class="optiontopimgs">	<div class="optionimgleft"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxleft.gif"></div><div style="width:204px;" class="optionimgbg"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/spacer.gif"></div><div class="optionimgright"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxlright.gif"></div></div><div style="border-left:solid 1px #bababa; float:left; border-right:1px solid #bababa; width:202px; background-color:#ffffff;" class="optionmidbgs">	<div>	<div class="opt_formcon">	<div class="lfr-column">	<div id="layout-column_column-3" class="lfr-portlet-column">	<div class="portlet-boundary portlet-boundary_56_  portlet-journal-content" id="p_p_id_56_INSTANCE_bSXR_">	<a id="p_56_INSTANCE_bSXR"></a>	<div style="" class="portlet-borderless-container">	<div>	<div id="article_14_37373_1.0" class="journal-content-article">
	                    
	                    	<div class="yt_abouthanding">Life Leisure Holiday</div><div style="padding:10px 0px 4px 0px;"><table width="100%" cellspacing="1" cellpadding="1" border="0">     <tbody>         <tr><td><img width="92" height="31" src="http://img.yatra.com/image/image_gallery?uuid=8f980b48-913d-4a77-9ca6-9271256daaa9&amp;groupId=14&amp;t=1243928316991" alt=""></td></tr><tr><td>Walk into a Reliance World&nbsp; and book India's finest hotels. <a href="http://www.yatra.com/reliance-worlds.html">More...</a></td></tr><tr><td>&nbsp;</td></tr><tr><td><img width="93" height="40" src="http://img.yatra.com/image/image_gallery?uuid=aca04786-cfa1-46b0-a4d6-9f285546f6e1&amp;groupId=14&amp;t=1243928331223" alt=""></td></tr><tr><td>Book flights &amp; hotels at the nearest Hughes Net Fusion center. <a href="http://www.yatra.com/hughes-net.html">More...</a></td></tr><tr><td>&nbsp;</td></tr><tr><td><img width="101" height="33" src="http://img.yatra.com/image/image_gallery?uuid=05ee6fee-5bfe-4e4c-85d6-382eb63e23ee&amp;groupId=14&amp;t=1243928311168" alt=""></td></tr><tr><td>Walk in to any&nbsp; Sify iWay and book your flight tickets.</td></tr><tr><td>&nbsp;</td></tr><tr><td><img width="68" height="54" src="http://img.yatra.com/image/image_gallery?uuid=a9000c5a-c90e-4361-b937-2843c692d470&amp;groupId=14&amp;t=1243928339654" alt=""></td></tr><tr><td>Call our travel specialists at 0987 1800 800 (From All Networks)</td></tr></tbody> </table></div></div></div></div></div></div></div></div></div><div style="margin-top:16px; float:left;">	<div class="opt_formcon">	<div class="lfr-column">	<div id="layout-column_column-4" class="lfr-portlet-column empty"></div></div></div></div></div><div class="optiontopimgs">	<div class="optionimgleft"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxbotleft.gif"></div><div style="width:204px;" class="optionimgbotbg"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/spacer.gif"></div><div class="optionimgright"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxbotright.gif"></div></div></div>
		</div>
		
		
		<div class="demo">
	
	<p>
		<label for="amount">Price range:</label>
		<input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;" />
	</p>
	
	<div id="slider-range"></div>
	
	<p>
		<label for="date_range">Date range:</label>
		<input type="text" id="date_range" style="border:0; color:#f6931f; font-weight:bold;" />
	</p>
	
	<div id="slider-date_range"></div>
	
	</div>
	
			<div id="content">
				<?php
				$layout->sessionFlash();
				echo $content_for_layout;
				?>
			</div>
			
			
			<div id="sidebar">
				<?php echo $layout->blocks('right'); ?>
			</div>
			<div class="breaker"></div>
		</div>
        <div style="clear:both;"></div>
		<div id="footer">
			<div class="left">Copyright &copy; <?=date('Y')?> <?=Configure::read('Site.title')?>, All Rights Reserved.</div>
			<div class="right">Powered by <a href="http://www.loooops.com/">Loops Solutions</a></div>
			<div class="breaker"></div>
		</div>
	</div>
	<script type="text/javascript" charset="utf-8">
		// Hide default search form
		$('#searchform').parent().parent().hide();
		$('.block-about div.block-body').css({'padding': '10px', 'border': '1px solid #ABE3E4', 'border-top': 'none'});
	</script>
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
