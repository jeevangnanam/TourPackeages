<form id="search" method="post" action="javascript: document.location.href='<?php echo $this->webroot;?>packages/search/q:'+encodeURI($('#package_catagory').val())+'/city:'+encodeURI($('#LocationName').val())+'/duration:'+encodeURI($('#package_duration').val())+'/amount:'+encodeURI($('#amount').val())+'/date_range:'+encodeURI($('#date_range').val());">
                                      
                                          <fieldset>
                                          <h5>Search For a Packages</h5>  
                                          
                                              <div class="select1">
                                                <?php echo $this->Form->input('package_catagory',array('options' => $packageCategories,'empty'=>'Select Package','label'=>'Category'));?>
                                              </div>
                                              <div class="clear"></div>
                                            <div class="search_block">
                                              <div class="field wrapper">
                                           
                                              
                                              </div>
                                              <div class="field1 wrapper">
                                              <div class="text-field mr16">
                                              	<label>Arrival :</label>
                                                <input id="checkin" type="text" value="dd/mm/yy" onFocus="if(this.value=='dd/mm/yy'){this.value=''}" onBlur="if(this.value==''){this.value='dd/mm/yy'}" />
                                              </div>
                                              <div class="text-field">
                                                <label>Departure :</label>
                                                <input id="checkout" type="text" value="dd/mm/yy" onFocus="if(this.value=='dd/mm/yy'){this.value=''}" onBlur="if(this.value==''){this.value='dd/mm/yy'}" />
                                              </div>
                                              </div> 
                                              
                                             <div class="field1 wrapper">
                                              <div class="text-field mr16">
                                              	<label>Adult :</label>
                                                <input id="adult" type="text" value=""  />
                                              </div>
                                              <div class="text-field">
                                                <label>Child ( Age 2 - 11.99) :</label>
                                                <input id="child" type="text" value=''/>
                                              </div>
                                              </div> 
                                            
                                             <div class="select1">
                                                <select id="hotelCategory" name="hotelCategory">
                                                
                                                <option id="3">Three Star</option>
                                                <option id="4">Four Star</option>
                                                <option id="5">Five Star</option>
                                                </select>
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