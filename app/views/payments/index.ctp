<?php 
		echo $this->Html->script(array(
	            'jquery/ui/jquery.ui.core',
	            'jquery/ui/jquery.ui.widget',
	            'jquery/ui/jquery.ui.mouse',
	            'jquery/ui/jquery.ui.slider',
                'jquery/ui/jquery.ui.datepicker.js',
	      	),array('inline' => false));
	        
?>
<style>
.button-1{
	margin-top:15px;
	margin-bottom:10px;
	}
#tras_success{
	padding: 10px 10px 10px 60px;
    width: 510px;
	margin-top:20px;
	font-size:16px;
	font:"Times New Roman", Times, serif;
	
}
#pg_data{
	
	background: #D4D4D4;
	padding: 10px 10px 10px 60px;
    width: 510px;
	margin-top:20px;
	font-size:16px;
	font:"Times New Roman", Times, serif;
	border-radius:12px;

}
.errormsg {
    background: none repeat scroll 0 0 #EDAFC3;
    margin-bottom: 10px;
    padding: 10px;
	text-align:center;
	color:#A00C3B;
	border:solid #A00C3B 1px;
	border-radius:6px;
}
.success {
    background: #C4EED7;
	color:#006633;
    margin-bottom: 10px;
    padding: 10px;
	text-align:center;
	border-radius:6px;
}

a {
	vertical-align: middle;
	text-decoration:none
}

</style>
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
<aside>
    <div class="paddingb14">
                <div class="background">
                    <div class="container_24  ">
                        <div class="col-padding">
                            <div class="wrapper">
                            
                            <div class="grid_8 maxheight4" style="border-radius:8px; margin: 5px; padding-right:25px;">   
                                	 <form id="search" method="post" action="javascript: document.location.href='<?php echo $this->webroot;?>packages/search/q:'+encodeURI($('#package_catagory').val())+'/city:'+encodeURI($('#LocationName').val())+'/duration:'+encodeURI($('#package_duration').val())+'/amount:'+encodeURI($('#amount').val())+'/date_range:'+encodeURI($('#date_range').val());">
                                      
                                          <fieldset>
                                          <h5>Search For a Packages</h5>  
                                          
                                              <div class="select1">
                                                <?php echo $this->Form->input('package_catagory',array('options' => $packageCategories,'empty'=>'Select Package','label'=>'Category'));?>
                                              </div>
                                              <div class="clear"></div>
                                            <div class="search_block">
                                              <div class="field wrapper">
                                           
                                                <?php $cityValue = null;   
                                               // debug($this->params);
                                                if (isset($this->params['named']['city'])) {
                                        
                                                    $cityValue = $this->params['named']['city'];
                                                }
                                              
                                              //  $duration  = $this->params['named']['duration'];
                                                
                                             echo $ajax->autoComplete('Location.name', '/locations/autoComplete',array('label' => 'Location','value' => $cityValue));
                                             
                                             //echo $ajax->autoComplete('Package.duration', '/packages/packageDurations',array('label' => 'Duration','value' => $this->params['named']['duration']));
                                             //echo $this->Form->input('package_duration',array('value'=>$duration));
                                            ?>
                                              </div>
                                              <div class="field1 wrapper">
                                              <div class="text-field mr16">
                                              	<label>Check-in:</label>
                                                <input id="checkin" type="text" value="dd/mm/yy" onFocus="if(this.value=='dd/mm/yy'){this.value=''}" onBlur="if(this.value==''){this.value='dd/mm/yy'}" />
                                              </div>
                                              <div class="text-field">
                                                <label>Check-out:</label>
                                                <input id="checkout" type="text" value="dd/mm/yy" onFocus="if(this.value=='dd/mm/yy'){this.value=''}" onBlur="if(this.value==''){this.value='dd/mm/yy'}" />
                                              </div>
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
                                            </div>
                                            
                                            
                                            <div class="wrapper">
                                            <div class="fleft buttons-indent1 fleft">
                                            <!--<a class="link-3" href="#">Show additional options</a>-->
                                            </div>
                                            <div class="buttons-indent2 fright">
                                             <a class="link-2 button-1" style="border-radius:4px; "onClick="document.getElementById('search').submit()">Search</a>
                                             </div>
                                            </div>
                                          </fieldset>
                                    </form>
                                </div>
                                
                                <div class=" grid_8 maxheight border" style="width:600px; padding-left:40px;">
                                    
                                     <div class="text-1 text-container-1 ">
                                     	<ul class="list-services">
                                          
		<?php
         if( $message==1){
              echo '<div class="success">Your transction is completed!</div>';
        }
         else{
             echo '<div class="errormsg">'.$pg_post['pg_error_msg'].'</div>';
        }
           ?>


                    <div id ='tras_success'>
                    <table width="100%"  border="1px">
                    <tr><td width="50%"><h1 style="padding-left:0">Transaction Details</h1></td><td></td></tr>
                    <tr><td>Transaction Id</td><td><?php echo $pg_post['transaction_id']; ?></td></tr>
                    <tr><td>Amount </td><td><?php echo $pg_post['amount']; ?></td></tr>
                    <tr><td>Merchant Reference No</td><td><?php echo  $pg_post['merchant_reference_no']; ?></td></tr>
                    <!--<tr><td>Original Amount</td><td><?php echo $pg_post['originalAmount']; ?></td></tr>-->
                    <tr><td> Error message </td><td><?php echo $pg_post['pg_error_msg']; ?></td></tr>
                    </table>
                    </div>
                    
                    
                    
                    <div id="pg_data">
                    <table width="100%"><tr><td colspan="2"><h1 style="padding-left:0">Details of the Packege</h1></td></tr>
                    <tr><td width="50%">Package name</td><td><?php echo  $this->Html->link($p_data['Package']['name'], array('controller'=>'packages','action' => 'view' ,$p_data['Package']['id'])); ?></td></tr>
                    <tr><td>Hotels</td><td><?php echo $p_data['Hotels']['name'];  ?></td></tr>
                    <tr><td>Location(s)</td><td><?php echo $p_data['Location']['name'];?></td></tr>
                    <tr><td>Package Price</td><td><?php echo $p_data['Package']['price'];?></td></tr>
                    <tr><td>Additional Person Cost</td><td><?php echo $p_data['Package']['additional_person_cost'];?></td></tr>
                    <tr><td>Meal Plan</td><td><?php echo $p_data['MealPlan']['name'];?></td></tr>
                    <tr><td>Room Type</td><td><?php echo $p_data['RoomType']['name'];?></td></tr>
                    <tr><td>Purcharse _id</td><td><?php echo $data['Payment']['purchase_id']; ?></td></tr>
                    <tr><td>Total</td><td><?php echo $data['Payment']['total_amount'];?></td></tr>
                    <tr><td><div class="button-1"><?php echo  $this->Html->link('Buy again', array('controller'=>'packages','action' => 'book',$p_data['Package']['id'].'/step:3')); ?> </div></td><td><h2 class="button-1"><?php  echo $this->Html->link('Contact details', array('controller'=>'contacts','action' => 'view')); ?></h2></td></tr>
                    </table>
                    </div>

                                            
                                        </ul>
                                     </div>
                                </div>
                                
                                
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
                                    <div class="grid_10 maxheight1 omega" style="background: #FFC; margin:10px; padding:15px; border-radius:5px;">
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