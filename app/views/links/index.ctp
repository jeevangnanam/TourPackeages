<?php 
		echo $this->Html->script(array(
	            'jquery/ui/jquery.ui.core',
	            'jquery/ui/jquery.ui.widget',
	            'jquery/ui/jquery.ui.mouse',
	            'jquery/ui/jquery.ui.slider',
                'jquery/ui/jquery.ui.datepicker.js',
	      	),array('inline' => false));
	        
?>
<script type="text/javascript">
        $(document).ready(function(){
        	$(".list-services a.tooltips").easyTooltip();
			$("a[data-gal^='prettyVideo']").prettyPhoto();
			$("a[rel^='prettyPhoto']").prettyPhoto();
        });
		
		jQuery(document).ready(function($) {
			$('#search').jqTransform({imgPath:'jqtransformplugin/img/'});	
		});
	
	$(function(){
		$( "#checkin" ).datepicker({
			numberOfMonths: 3,
			showButtonPanel: true
		});
		$( "#checkout" ).datepicker({
			numberOfMonths: 3,
			showButtonPanel: true
		});
		
		$( "#slider-range" ).slider({
			range: true,
			min: 100,
			max: 3000,
			values: [ 100, 3000 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
				/*$.ajax({
					type: "POST",
					url: "/packages/index",
					data: $("#search-form").serialize(),
					success: function(responce){
						//alert(responce);
						$('#package_main_index').html(responce);
					}
				});
				$("#package_main_index").empty().html('<img src="http://lifelh-dev.com/img/al_loading.gif" />');*/
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
			}
		});
		$( "#date_range" ).val( "Date(s) " + $( "#slider-date_range" ).slider( "values", 0 ) +
			" - Date(s) " + $( "#slider-date_range" ).slider( "values", 1 ) );
	});
</script>


<div class="paddingb14 index main">
  <div class="slider-wrapper">
    <div class="slider">
      <ul class="items">
      <?php foreach ($lastPackages as $lastpackage){ ?>
      	<li> <?php echo $this->Custom->resize('' . $lastpackage['Package']['default_map'], 670,414); ?>
          <div class="banner">
            <div class="padding">
              <h2><?php echo $lastpackage['Package']['name'];?></h2>
              <span>From USD <?php echo $lastpackage['Package']['price'];?></span>
              <p class="p6">
              <?php                      
               if (strlen($lastpackage['Package']['short_description']) > 100)
                  $summary = substr($lastpackage['Package']['short_description'], 0, strrpos(substr($lastpackage['Package']['short_description'], 0, 100), ' ')) . '...';
                  echo @$summary;
            ?>
</p>
              <a class="button" href="<?php echo $this->webroot;?>packages/view/<?php echo $lastpackage['Package']['id'];?>">View More</a> </div>
          </div>
        </li>
      <?php } ?>
        
      </ul>
      <ul class="pagination">
      <?php foreach ($lastPackages as $lastpackage){ ?>
      	<li><a href="#"><span></span></a></li>
      <?php } ?>

      </ul>
    </div>
  </div>
</div>


<aside>
    <div class="paddingb14">
                <div class="background">
                    <div class="container_24  ">
                        <div class="col-padding">
                            <div class="wrapper">
                            
                            <div class="grid_8 maxheight4" style="border-radius:8px; margin: 5px; padding-right:25px;">   
                                	 <?php echo $this->element('package_search'); ?>
                                </div>
                                
                                <div class=" grid_8 maxheight border" style="width:600px; padding-left:40px;">
                                    <h3 class="color-2">recent packages!</h3>
                                     <div class="text-1 text-container-1 ">
                                     	<ul class="list-services">
                                            <!--<li><a class="tooltips" title="flickr" href="#"><img src="img/flickr.gif" alt="" /></a></li>
                                            <li><a class="tooltips" title="skype" href="#"><img src="img/skype.jpg" alt="" /></a></li>
                                            <li><a class="tooltips" title="twitter" href="#"><img src="img/twitter.jpg" alt="" /></a></li>
                                            <li><a class="tooltips" title="ember" href="#"><img src="img/ember.jpg" alt="" /></a></li>
                                            <li><a class="tooltips" title="delicious" href="#"><img src="img/delicious.jpg" alt="" /></a></li>-->
                                            <?php foreach($packageImages as $image){ ?>
                                            	<li><a class="tooltips" title="flickr" href="<?php echo $this->webroot;?>packages/view/<?php echo  $image['Package']['id'];?>">
                                                                                                       
                                                <?php $thumbnail = $this->Html->link($this->Custom->resize('' . $image['Package']['default_map'], 100,100,'', 
                                                		'class = "tooltips"'), 
                                                		array('controller' => 'packages', 'action' => 'view', $image['Package']['id']), array('escape' => false,'class'=>'tooltips','title'=>$image['Package']['name']));
	
													echo $thumbnail; ?>
                								</a>
                                                
                                                <!--<a class="tooltips" title="<?php echo $image['Package']['name']; ?>" href="/packages/view/<?php echo  $image['Package']['id'];?>"><img alt="" src="<?php echo $image['Package']['default_map']; ?>" style="width:50px;" /></a>-->
                                                </li>
                                            <?php }?>
                                        </ul>
                                     </div>
                                </div>
                                <!--<div class="border grid_8 maxheight" style="width:250px;">
                                    <div class="pad-col"> 
                                        <h3 class="indent-bot">hot packages</h3>
                                         <div class="text-container-2">
                                             <b class="upper color-2"><?php echo $userRemarks[0]['Package']['name']; ?></b>
                                             <p class="p6"><?php echo $userRemarks[0]['Purchase']['user_remarks']; ?></p>
                                             <a href="/packages/view/<?php echo $userRemarks[0]['Package']['id']; ?>" class="button-1">More Review</a>
                                         </div>
                                    </div>
                                </div>
                                <div class="border grid_8 omega maxheight">
                                   <div class="pad-col"> 
                                        <h3 class="p2">find us <br /><span class="lowcolor">in social networks</span></h3>
                                        <div class="text-container-2">
                                            <p class="indent-bot ">Nulla duiuscat maluada odior nucora vidase nase magnonec accumsauada:</p>
                                                <ul class="list-services">
                                                    <li><a class="tooltips" title="flickr" href="#"><img src="img/flickr.gif" alt="" /></a></li>
                                                    <li><a class="tooltips" title="skype" href="#"><img src="img/skype.jpg" alt="" /></a></li>
                                                    <li><a class="tooltips" title="twitter" href="#"><img src="img/twitter.jpg" alt="" /></a></li>
                                                    <li><a class="tooltips" title="ember" href="#"><img src="img/ember.jpg" alt="" /></a></li>
                                                    <li><a class="tooltips" title="delicious" href="#"><img src="img/delicious.jpg" alt="" /></a></li>
                                                </ul>
                                        </div>
                                   </div>
                                </div>-->
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </aside>
    
<div class="paddingb68">
   		 <div class="background">
            <section id="content">
                        <div class="container_24  ">
                            <div class="col-padding1">
                                <div class="wrapper">
                                    <div class="grid_6 suffix_1 maxheight1">
                                        <h4 class="p6">categories</h4>
                                         <div class="text-container-1 ">
                                            <ul class="list">
                                            	<?php foreach ($packageCategories as $key=>$package){ ?>
                                                <li><a href="<?php echo $this->webroot;?>packages/search/q:<?php echo $key; ?>"><span><?php echo $package; ?> </span></a></li>
                                                               
                                                <?php } ?>
                                            </ul>
                                         </div>
                                    </div>
                                    <div class="grid_6 suffix_1 maxheight1">
                                            <h4 class="h4-indent">fresh video</h4>
                                             <div class="text-container-2">
                                             <div class="prev-indent-bot relative">
                                            
												<a class="lightbox-image" href="video/video_AS3.swf?width=495&amp;height=275&amp;fileVideo=intro06.flv" data-gal="prettyVideo[prettyVideo]"><img src="img/page1-img1.jpg" alt="" /></a>
                                             </div>
                                                
                                                
                                                <a href="#" class="link-3">View More Videos</a>
                                             </div>
                                    </div>
                                    <div class="grid_10 maxheight1 omega" style="background: #FFC; margin:10px; padding:15px; border-radius:5px;border:solid 1px yellow">
                                            <h4 class="indent-bot"><strong class="color-4">hot</strong> destinations</h4>
                                            <div class="text-container-3">
                                                <p class="h4-indent">Bertase deleoa dipisg elitve stibulum cude enoserta kertyade bertis dendrit maurportade usceita varere meroserta kertasera lertyadres eras miatoque penatib emagnis keras miasertase:</p>
                                                <div class="wrapper">
                                                <?php foreach($destinations as $key=>$destination){ 
                                                	//echo $key;
                                                	if(($key % 4) == 1 ){ ?>
                                                    	<dl class="list-4 grid_3 alpha suffix_1">
                                                    	<dt><a href="<?php echo $this->webroot;?>locations/view/<?php echo $destination['Location']['id']?>?iframe=true&width=500&height=250" rel="prettyPhoto[iframes]">
                                                        <?php echo $destination['Location']['name']?></a>
                                                        </dt>
                                                    	<dd>
                                                        
                                                        <!--<a href="video/video_AS3.swf?width=495&amp;height=275&amp;fileVideo=intro06.flv" data-gal="prettyLink[prettyLink]">Hotels,</a><a href="#">Things to do</a>-->
                                                        
                                                        </dd>
                                                    	</dl>
                                                	<?php }else{?>
                                                		<dl class="list-4 grid_3">
                                                		<dt><a href="<?php echo $this->webroot;?>locations/view/<?php echo $destination['Location']['id']?>?iframe=true&width=500&height=250" rel="prettyPhoto[iframes]">
                                                        <?php echo $destination['Location']['name']?>
                                                        </a>
                                                        </dt>
                                                		<dd><!--<a href="#">Hotels,</a><a href="#">Things to do</a>--></dd>
                                                		</dl>
                                                	<?php }?>
                                                <?php }?>
                                                <!--<dl class="list-4 grid_3 alpha suffix_1">
                                                    <dt>Los Angeles</dt>
                                                    <dd><a href="#">Hotels,</a><a href="#">Things to do</a></dd>
                                                    <dt>New York City</dt>
                                                    <dd><a href="#">Hotels,</a><a href="#">Things to do</a></dd>
                                                    <dt>Orlando</dt>
                                                    <dd><a href="#">Hotels,</a><a href="#">Things to do</a></dd>
                                                    <dt>Paris</dt>
                                                    <dd><a href="#">Hotels,</a><a href="#">Things to do</a></dd>
                                                </dl>
                                                <dl class="list-4 grid_3">
                                                    <dt>Boston</dt>
                                                    <dd><a href="#">Hotels,</a><a href="#">Things to do</a></dd>
                                                    <dt>Cancun</dt>
                                                    <dd><a href="#">Hotels,</a><a href="#">Things to do</a></dd>
                                                    <dt>Chicago</dt>
                                                    <dd><a href="#">Hotels,</a><a href="#">Things to do</a></dd>
                                                    <dt>Honolulu</dt>
                                                    <dd><a href="#">Hotels,</a><a href="#">Things to do</a></dd>
                                                </dl>
                                                --></div>
        
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </section>
    
	
        </div>
	</div>
<script type="text/javascript">
		$(window).load(function(){
			$('.slider')._TMS({
				duration:800,
				easing:'easeOutQuad',
				preset:'simpleFade',
				pagination:'.pagination',
				slideshow:7000,
				banners:'fade',
				waitBannerAnimation:false,
				pauseOnHover:true,
				pagNums:false
			})
		})
</script>