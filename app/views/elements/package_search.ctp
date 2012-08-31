<form id="search" method="post" action="javascript: document.location.href='<?php echo $this->webroot;?>packages/search/?package='
+ encodeURI($('#package_catagory').val())
+'&arrival='+encodeURI($('#arrival').val())
+'&departure='+encodeURI($('#departure').val())
+'&adults='+encodeURI($('#adults').val())
+'&children='+encodeURI($('#children').val())
+'&hotel_type='+encodeURI($('#hotelCategory').val());">
                                      
                                          <fieldset>
                                          <h5>Search For a Packages</h5>  
                                          
                                              
                                              
                                            <div class="search_block">
                                             
                                           <div class="select1">
                                                <?php echo $this->Form->input('package_catagory',array('options' => $packageCategories,'empty'=>'Select Package','label'=>'Category'));?>
                                              
                                              
                                              </div>
                                              <div class="clear"></div>
                                              <div class="field1 wrapper">
                                              <div class="text-field mr16">
                                              	<label>Arrival :</label>
                                                <input id="arrival" type="text"  />
                                              </div>
                                              <div class="text-field">
                                                <label>Departure :</label>
                                                <input id="departure" type="text" />
                                              </div>
                                              </div> 
                                              
                                             <div class="field3 wrapper">
                                              <div class="text-field mr16">
                                              	<label>Adults :</label>
                                                <input id="adults" type="text" value=""  />
                                              </div>
                                              <div class="text-field">
                                                <label>Children ( Age 2 - 11.99) :</label>
                                                <input id="children" type="text" value=''/>
                                              </div>
                                              </div> 
                                            
                                            <br />
                                            
                                            <div class="">
                                            <div style="float:left;padding-top:5px;" class="mr16">
                                            <label>Hotel Star category :</label>
                                            </div>
                                             <div class="select1">
                                            
                                                <select id="hotelCategory" name="hotelCategory">
                                                
                                                <option value="3">Three Star</option>
                                                <option value="4">Four Star</option>
                                                <option value="5">Five Star</option>
                                                </select>
                                              </div>
                                            </div>
                                           
                                            <div class="buttons-indent2 fright">
                                             <a class="link-2 button-1" style="border-radius:4px; "onClick="document.getElementById('search').submit()">Search</a>
                                             </div>
                                            </div>
                                          </fieldset>
                                    </form>