<div class="paddingb68">
   		 <div class="background">
            <section id="content">
               <div class="container_24  ">
                        <div class="col-padding">
                            <div class="wrapper">
                                <div class="grid_17 maxheight3">
                                    <h3>Hotels by Destinations</h3>
                                     <div class=" text-container-2 ">
                                     
                                     <?php
									 //debug($hotels);
                                        $i = 0;
                                        foreach ($hotels as $hotel):
                                            $class = null;
                                            if ($i++ % 2 == 0) {
                                                $class = ' class="altrow"';
                                            }
                                        ?>
                                     
                                     <div class="smallbox wrapper p6 smallbox-indent">
                                            <figure class="img-indent1" style="margin:0 23px 10px 0; height:210px; padding:5px;" ><?php echo $this->Custom->resize('' . $hotel['Hotel']['image'], 226,208);
										//	exit();
                                            ?></figure>
                                     	<div class="extra-wrap">
                                        	<strong class="heading mt-2"><?php echo $hotel['Location']['name'];?></strong>
                                        	<ul class="list-5">
                                            	<li><?php echo $this->Html->link($hotel['Hotel']['name'], array('action' => 'view', $hotel['Hotel']['id'])); ?>
                                                <?php 
                                                    $star = $hotel['Hotel']['star_class'];
                                                    for($i=1;$i<=$star;$i++){
                                                    ?>
                                                    <img src="<?php echo $this->webroot; ?>img/icons/marker5_02.jpg"> 
                                                <?php }?>
                                                </li>
                                                <div>
                                                <?php                      
                                               if (strlen($hotel['Hotel']['info']) > 400)
                                                  $summary = substr($hotel['Hotel']['info'], 0, strrpos(substr($hotel['Hotel']['info'], 0, 400), ' ')) . '...';
                                                  echo $summary;
                                            ?>
                                                
                                                </div>
                                            </ul>
                                            <div class="but">
                                                	
                                                    <?php echo $this->Html->link('More Details', array('action' => 'view', $hotel['Hotel']['id']),array('class'=>'button-1')); ?>
                                            </div>
                                   		 </div>
                               		</div>
                                    
                                    <?php endforeach; ?>
                                    
                                    <p class="paging_p">
                                    <?php
                                    echo $this->Paginator->counter(array(
                                    'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
                                    ));
                                    ?>	</p>
                                
                                    <div class="paging">
                                        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
                                     | 	<?php echo $this->Paginator->numbers();?>
                                 |
                                        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
                                    </div>
                                    
                                    
                                     </div>
                                </div>
                                <div class="border paddingb14 grid_6 prefix_1 maxheight3">
                                       <b>This is dummy data</b>
                                        <h3 class="indent-bot">our advice</h3>
                                        <strong class="heading mt-2 indent-bot">Fusce euismod consequat ante. Lorem ipsu dol.</strong>
                                        <p class="p6">Adipiscing eliasraent veuole daserres tyase mmy hendrerit mauris lacusres enean jaseras elportasce susc variuse naya natoqibe ser uertyas ker.</p>
                                         <div class="smallbox p9 paddingb21">
                                             <div class="wrapper ">
                                                <span class="marker-1 fleft22">A</span>
												<div class="info extra-wrap">
                                                    <strong class="heading mt-2">uismod consequat.</strong>
                                                    <span class="block">Dipiscing eliasraent veuole daserres tyase mmy henr drerit mauris lacus.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="smallbox p9  paddingb21">
                                             <div class="wrapper ">
                                                <span class="marker-1 fleft22">B</span>
												<div class="info extra-wrap">
                                                    <strong class="heading mt-2">remod consequater.</strong>
                                                    <span class="block">Piscing eliasraent veuoler daserres tyase mmy henr drerit mauris lacus.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="smallbox indent-bot2  smallbox-indent4">
                                             <div class="wrapper ">
                                                <span class="marker-1 fleft22">C</span>
												<div class="info extra-wrap">
                                                    <strong class="heading mt-2">uismod consequat.</strong>
                                                    <span class="block">Dipiscing eliasraent veuole daserres tyase mmy henr drerit mauris lacus.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h3>useful info</h3>

                                             <b class="upper color-2 mt-4 block indent-bot">smod consequat ante. Lore.</b>
                                             <p class="p2">Eliasraent veuole daserres tyase mmy hendrerit mauris lacusres enean sere jaseras elportasce susc variuse naya natoqibe ser uertyas ker.</p>
                                             <ul class="list">
                                                <li><a href="#"><span>Fusce euismod consequat</span></a></li>
                                                <li><a href="#"><span>Ante lorem ipsum dolor</span></a></li>
                                                <li><a href="#"><span>Sit amet, consectetuer adipi</span></a></li>
                                                <li><a href="#"><span>Cing elit ellentesque se</span></a></li>
                                                <li class="last"><a href="#"><span>Dolor aliquam congue ferme</span></a></li>
                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
</section>
</div>
</div>