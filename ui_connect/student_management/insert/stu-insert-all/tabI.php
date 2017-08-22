<!-- fieldsets -->
              <fieldset>
                <a href="../../ui_connect/student_management/Student_Management.php" class="w3-closebtn" title="Cancel and back to main page"><span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-mail-reply fa-stack-1x fa-inverse"></i>
                </span></a>
                <h2 class="fs-title">Personal Detail</h2>
                <h3 class="fs-subtitle"></h3>
                        
                <div class="w3-row-padding w3-center w3-margin-top">
 
                  <div class="w3-third">
                    <div>
                        <input type="text" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />        
                      	<input type="hidden" name="s_dob" value="" size="32" />
                        <input type="hidden" name="origin_id" value="" size="32" />
                        <input type="hidden" name="type_id" value="" size="32" />
                        <input type="hidden" name="ref_id" value="" size="32" />
                        <input type="hidden" name="national_id" value="" size="32" />
                        <input type="hidden" name="title_title_id" value="" size="32" />
                         <div align="left">
                      	<label for="titleSelect"> Title : </label>
                     	 </div>
                        <div align="left">
                        <select name="title_title_id" >
                          <?php
                              do {  
                          ?>
                                  <option name="title_title_id" size="32" value="<?php echo $row_titleSet['title_id']?>"><?php echo $row_titleSet['title_name']?> </option>
                          <?php
                              } while ($row_titleSet = mysqli_fetch_assoc($titleSet));
                              $rows = mysqli_num_rows($titleSet);
                              if($rows > 0) {
                              mysqli_data_seek($titleSet, 0);
                              $row_titleSet = mysqli_fetch_assoc($titleSet);
                               }
                                                        ?>
                        </select></div>
                      <div align="left">
                      	<label for="s_fname"> First Name : </label>
                      </div>
                      <input id="inputFirstname" class="" type="text" name="s_fname" value="" size="32" placeholder="KITTIPAN" />
                      <div align="left">
                      	<label for="s_lname"> Last Name : </label>
                      </div>
                      <input id="inputLastname" type="text" name="s_lname" value="" size="32" placeholder="PRASERTSANG"/>
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                        <div align="left">
                      	<label for="thai_fname"> Thai First Name : </label>
                      	</div>
                        <input type="text" name="thai_fname" value="" size="32" placeholder="กิตติพันธ์" />
                        <div align="left">
                      	<label for="thai_lname"> Thai Last Name : </label>
                      	</div>
                        <input type="text" name="thai_lname" value="" size="32" placeholder="ประเสริฐสังข์"/>
                        <div align="left">
                      	<label for="statusSelect"> Student status : </label>
                      	</div>
                        <select name="status_id" style="width: 100%;">
                          <?php do {  ?>
                            <option  name="title_title_id" value="<?php echo $row_statusSet['status_id']?>"><?php echo $row_statusSet['status_desc']?></option>
                            <?php
                                } while ($row_statusSet = mysqli_fetch_assoc($statusSet));
                                  $rows = mysqli_num_rows($statusSet);
                                  if($rows > 0) {
                                  mysqli_data_seek($statusSet, 0);
                                  $row_statusSet = mysqli_fetch_assoc($statusSet);
                                  }
                            ?>
                        </select>
                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                                            <!--<h4>E-mail Management</h4><br>-->
                        <input type="hidden" name="contact_id" value="" size="32" /> 
                        <input type="hidden" name="scd_s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />                                       
                        <div align="left">
                      	<label for="contact_no"> Tel : </label>
                      	</div>
                        <input type="text" name="contact_no" value="" size="32" placeholder="08 4722 2174"/>
                        
                        <div align="left">
                      	<label for="email_adress"> E-mail address : </label>
                      	</div>
                        <input type="text" name="email_adress" value="" size="32" placeholder="kittipan.prasertsang@gmail.com"/>
                        
                        
                        <div align="left">
                      	<label for="remark"> Remark : </label>
                      	</div>
                        <textarea name="remark" value="" size="32" placeholder="Remark..."></textarea>
                       
                    </div>
                  </div>
                 
                </div>          
                  <div class="accordion">
                        <div class="w3-row-padding w3-center w3-margin-top">
        				  <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Emergency Cantact Data</p></div>
                          <div class="w3-third">
                            <div>   
                               
								            <input type="hidden" name="emc_id" value="" size="32" />
                        		<input type="hidden" name="contact_id" value="<?php echo $row_stu_contactSet['contact_id']+1?>" size="32" />
                                <div align="left">
                                <label for="emc_fname"> First Name : </label>
                                </div>
                                <input type="text" name="emc_fname" value="" size="32" placeholder="First Name"/>
        
                            </div>
                          </div>
               
                          <div class="w3-third">
                            <div >
                                                   
                                <div align="left"> 
                                <label for="emc_lname"> Last Name : </label>                     	
                                </div>
                                <input type="text" name="emc_lname" value="" size="32" placeholder="Last Name"/>
                                
                            </div>
                          </div>
                                
                          <div class="w3-third">
                            <div >
                                                   
                                <div align="left"> 
                                <label for="emc_relation"> Relationship : </label>                     
                                </div>
                                <input type="text" name="emc_relation" value="" size="32" placeholder="Relationship"/> 
                                <div align="left"> 
                                <label for="emc_contact"> Contact No : </label>                     
                                </div>
                                <input type="text" name="emc_contact" value="" size="32" placeholder="Contact No."/>      
        
                            </div>
                          </div>
                         
                        </div>
                        
                        <div class="w3-row-padding w3-center w3-margin-top">
                        <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Student Address</p></div>
                          <div class="w3-third">
                            <div>
                                <input type="hidden" name="address_Id" value="" size="32" />
                                <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" /> 
                                <div align="left">
                                <label for="place_name"> Number : </label> 
                                </div>
                                <input type="text" name="no" value="" size="32"  placeholder="108/24 Moo 19"/>  
                                <div align="left">  
                                <label for="sub_district"> Sub-district : </label>                 
                                </div> 
                                <input type="text" name="sub_district" value="" size="32" placeholder="Jhumphol"/> 
                                <div align="left">
                                <label for="province_name"> Province : </label> 
                                </div>
                                <input type="text" name="province_name" value="" size="32" placeholder="Nong Khai"/>     
                                                                                           
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >   
                                <div align="left">
                                <label for="place_name"> Place/Village : </label> 
                                </div>
                                <input type="text" name="place_name" value="" size="32"  placeholder="Sermsook"/>
                                <div align="left">
                                <label for="district"> District : </label> 
                                 </div>
                                <input type="text" name="district" value="" size="32" placeholder="Phonphisai"/>
                                <div align="left">
                                <label for="zip_code"> Zip Code/Post : </label> 
                                </div>
                                <input type="text" name="zip_code" value="" size="32" placeholder="43120"/> 
  
                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">
                                <label for="road_name"> Road/Street : </label>                    
                                </div> 
                                <input type="text" name="road_name" value="" size="32" placeholder="N/A"/>
                                <div align="left">
                                <label for="city"> City : </label> 
                                </div>
                                <input type="text" name="city" value="" size="32" placeholder="N/A"/> 
                                <div align="left">
                                <label for="country_id"> Country : </label> 
                                </div>
                                <select name="country_id" style="width: 100%;">
                                  <?php do {  ?>
                                    <option  name="country_id" value="<?php echo $row_countrySet['country_id']?>"><?php echo $row_countrySet['country_name']?></option>
                                    <?php
                                        } while ($row_countrySet = mysqli_fetch_assoc($countrySet));
                                          $rows = mysqli_num_rows($countrySet);
                                          if($rows > 0) {
                                          mysqli_data_seek($countrySet, 0);
                                          $row_countrySet = mysqli_fetch_assoc($countrySet);
                                          }
                                    ?>
                                </select>                                    
                            </div>
                          </div>
                        </div>
                        
                        
                            <p class="headings"></p> 
                            <div class="w3-row-padding w3-center w3-margin-top">
                            <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Relation Data</p></div>
                              <div class="w3-third">
                                <div>   
                                    <input type="hidden" name="relation_id" value="" size="32" />
                                    <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />                                      
                                    <div align="left">
                                    <label for="relation_fname"> First Name : </label>
                                    </div>
                                    <input type="text" name="relation_fname" value="" size="32" placeholder="Bongkoch"/>
                                    <div align="left"> 
                                    <label for="relation_occupation"> Occupation : </label>                     
                                    </div>
                                    <input type="text" name="relation_occupation" value="" size="32" placeholder="Officer"/>

                                </div>
                              </div>
                              <div class="w3-third">
                                <div >                              
                                    <div align="left"> 
                                    <label for="relation_lname"> Last Name : </label>                     	
                                    </div>    
                                    <input type="text" name="relation_lname" value="" size="32" placeholder="Prasertsang"/> 
                                    <div align="left"> 
                                    <label for="relation_contact"> Contact : </label>                     
                                    </div>
                                    <input type="text" name="relation_contact" value="" size="32" placeholder="08 6223 86XX "/> 
                                </div>
                              </div>          
                              <div class="w3-third">
                                <div >                                                 
                                    <div align="left"> 
                                    <label for="relation_type"> Relation Type : </label>                     
                                    </div> 
                                    <input type="text" name="relation_type" value="" size="32" placeholder="Mother"/>     
                                </div>
                              </div>
                            </div>	    
                      
                  </div>
                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->        
				      
              </fieldset>

              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Education Data</h2>
                <div align="center">
                    <h3 class="fs-subtitle" >
                        <table>
                            <tr>
                                <td><div id="firstnameDIVTag" ></div></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><div id="lastnameDIVTag" ></div></td>
                            </tr>
                        </table>
                    
                    </h3>
                </div>

                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>
                         <input type="hidden" name="education_id" value="" size="32" />
                         <input type="hidden" name="education_name" value="" size="32" id="outputFullname" readonly />
                         <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />    
                         <div align="left">
                         <label for="degree_id"> Degree : </label>
                     	 </div>
                         <select name="degree_id" id="degreeSelect" style="width: 100%;">

                                    <option value="">Select Degree</option>
                                    <?php
                        do {  
                        ?>
                                    <option value="<?php echo $row_degreeSet['degree_id']?>"><?php echo $row_degreeSet['degree_name']?></option>
                                    <?php
                        } while ($row_degreeSet = mysqli_fetch_assoc($degreeSet));
                          $rows = mysqli_num_rows($degreeSet);
                          if($rows > 0) {
                              mysqli_data_seek($degreeSet, 0);
                              $row_degreeSet = mysqli_fetch_assoc($degreeSet);
                          }
                        ?>
                        </select>
                         <!--<input type="text" name="degree_id" value="" size="32" />-->
                         

                        <!--<input type="text" name="major_id" value="" size="32" />-->
                        
                      <div align="left"> 	
                      </div>
                      
                      <div align="left">
                      </div>
                     
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                        <div align="left">
                        <label for="major_id"> Major : </label>
                        </div>
                        <select name="major_id" id="majorSelect" class="selectpicker" data-live-search="true" title="Please Select Major !" >
                                    <!--<option value="">Select Major !</option> -->
                                    <?php
                        do {  
                        ?>
                                    <option value="<?php echo $row_majorSet['major_id']?>"><?php echo $row_majorSet['major_name']?></option>
                                    <?php
                        } while ($row_majorSet = mysqli_fetch_assoc($majorSet));
                          $rows = mysqli_num_rows($majorSet);
                          if($rows > 0) {
                              mysqli_data_seek($majorSet, 0);
                              $row_majorSet = mysqli_fetch_assoc($majorSet);
                          }
                        ?>
                        </select>
                      <div align="right">
                      <a onclick="document.getElementById('major-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Major</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" />
                      </a>

                      
                      <!--
                      <a onclick="document.getElementById('major-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add New Major</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" /></a>
                      -->
                      </div>
                       
                        <div align="left">                      	
                      	</div>
                        
                        <div align="left">                      	
                      	</div>
                        
                  	</div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                                            
                        <div align="left">  
                        <label for="intitute_id"> Institute : </label>                      
                        </div>
                        <select name="edu_institute" id="insSelect" class="selectpicker" data-live-search="true" title="Please Select Institute !" style="width: 100%; " >
                            <!--<option value="">Select Institute Type</option> -->
                          <?php
                    do {  
                    ?>
                          <option value="<?php echo $row_instituteSet['ins_id']?>"><?php echo $row_instituteSet['ins_name']?></option>
                          <?php
                    } while ($row_instituteSet = mysqli_fetch_assoc($instituteSet));
                      $rows = mysqli_num_rows($instituteSet);
                      if($rows > 0) {
                          mysqli_data_seek($instituteSet, 0);
                          $row_instituteSet = mysqli_fetch_assoc($instituteSet);
                      }
                    ?>
                        </select>
                        <!--<input type="text" name="intitute_id" value="" size="32" />-->
                     
                  <div align="right">
                      <a onclick="document.getElementById('ins-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Institute</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" />
                      </a>
                  </div>  


                        
                        <p id='eiei'></p>
                        <!--<input type="text" name="collage_id" value="" size="32" />-->
                        
                    </div>
                  </div>
                 
                </div>                     
                  <div class="accordion">
                            <p></p>
                      	<div class="w3-row-padding w3-center w3-margin-top">

                            <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Education Background</p></div>
                          <div class="w3-third">
                            <div>      
                            	
                                <input type="hidden" name="bg_id" value="" size="32" />
                                <input type="hidden" name="student_info_s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" /> 
                                <div align="left">
                                </div>
                                <div align="left">
                                <label for=""> Duration : </label>                      	
                                </div> <table><tr>
                                <td><input type="text" name="bg_durationS" value="" size="32" placeholder="trigger calendar" id="dtedbS"/></td>
 								<td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="text" name="bg_durationE" value="" size="32" placeholder="trigger calendar" id="dtedbE" /></td></tr></table>
                                
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >                 
                                <div align="left">
                                <label for="bg_degree"> Degree : </label>                      	
                                </div> 
                                <select name="bg_degree" id="" style="width: 100%;">

                                            <option value="">Select Degree</option>
                                            <?php
                                do {  
                                ?>
                                            <option value="<?php echo $row_degreeSet['degree_id']?>"><?php echo $row_degreeSet['degree_name']?></option>
                                            <?php
                                } while ($row_degreeSet = mysqli_fetch_assoc($degreeSet));
                                  $rows = mysqli_num_rows($degreeSet);
                                  if($rows > 0) {
                                      mysqli_data_seek($degreeSet, 0);
                                      $row_degreeSet = mysqli_fetch_assoc($degreeSet);
                                  }
                                ?>
                                </select>
                                <div align="left">
                                <label for="bg_major"> Major : </label>                      	
                                </div> 
                                <input type="text" name="bg_major" value="" size="32" placeholder="Science-mathematics"/>

                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">                      
                                </div>   
                                <div align="left">
                                <label for="bg_institute_name"> Institute Name : </label>                      	
                                </div> 
                                <input type="text" name="bg_institute_name" value="" size="32" placeholder="Chumpholphonphisai School"/>
                                <div align="left">
                                <label for="bg_gpax"> GPAX : </label>                      	
                                </div> 
                                <input type="text" name="bg_gpax" value="" size="32" placeholder="4.01"/>   
                            </div>
                          </div>
                        </div>
                  </div>
                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->

              </fieldset>

              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <div align="center">
                    <h3 class="fs-subtitle" >
                        <table>
                            <tr>
                                <td><div id="firstnameDIVTagiii" ></div></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><div id="lastnameDIVTagiii" ></div></td>
                            </tr>
                        </table>
                    
                    </h3>
                </div>
                            
                        


        <!-- third start -->
        <div class="w3-col l12">
            <div class="">

                <!-- I/III -->
                <div class="w3-third">
                  <div class="">

                    <div class="w3-row-padding w3-center w3-margin-top">
                      <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p> Work Experience</p></div>

                                <div align="left">
                                <label for=""> Duration : </label>
                                </div>
                                <input type="hidden" name="wex_id" value="" size="32" />
                                <input type="hidden" name="student_info_s_id" value="<?php echo $row_studentSet['s_id']+1 ?>" size="32" />
                                <table><tr>
                                <td><input type="text" name="wex_dateS" value="" size="32" id="dtwexS" placeholder="trigger calendar"/></td>
                                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="text" name="wex_dateE" value="" size="32" id="dtwexE" placeholder="trigger calendar"/></td></tr></table>




                                <div align="left">
                                <label for=""> Organization/Company : </label>                      
                                </div> 
                                <input type="text" name="wex_organ" value="" size="32" /> 
                                
                                <div align="left">  
                                <label for=""> Detail of Duty/Position : </label>                    
                                </div> 
                                <textarea type="text" name="wex_detail" value="" size="32"></textarea>
                                <div align="right">
                  <a href="javascript:void(0);" class="add_button" title="Add field">Add more&nbsp;&nbsp;<i class="fa fa-plus-square "></i></a>
                                </div>


                    </div> 


                        
                  </div>
                </div>

                <!-- II/III-->
                <div class="w3-third">
                    <div class="" style="">
                    <div class="w3-row-padding w3-center w3-margin-top">
                       
                      <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p> Extracurricular Activity</p></div>

                        <div align="left">
                          <label for=""> Duration : </label>
                        </div>
                          <table><tr>
                                <td><input type="text" name="ext_dateS" value="" size="32" id="dtextS" placeholder="trigger calendar"/></td>
                                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="text" name="ext_dateE" value="" size="32" id="dtextE" placeholder="trigger calendar"/></td></tr>
                          </table>

                        <div align="left">
                        <label for="">Name: </label>
                        </div>
                        <input type="text" name="exact_name" value="" size="32" />

                        <div align="left">
                        <label for="">Details: </label>
                        </div>
                        <textarea type="text" name="exact_detail" value="" size="32"></textarea>

                        <input type="hidden" name="exact_id" value="" size="32" />
                        <input type="hidden" name="student_info_s_id" value="<?php echo $row_studentSet['s_id']+1 ?>" size="32" />
                        <div align="right">
                            <a href="javascript:void(0);" class="add_button" title="Add field">Add more&nbsp;&nbsp;<i class="fa fa-plus-square "></i></a>
                        </div>



                    </div> 
                    </div>
                </div>

                <!--  III/III-->
                <div class="w3-third">
                    <div class=""  style="">
                    <div class="w3-row-padding w3-center w3-margin-top">    

                      <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Co-op Project</p></div>

                      <div align="left">
                        <label for="">Hobby: </label>
                        </div>
                        <textarea type="text" name="hobby_desc" value="" size="32"></textarea>
                        <input type="hidden" name="hobby_id" value="" size="32" />
                        <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />


                      <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Language Skills</p></div>
                  <div class="w3-half">
                        <input type="hidden" name="lg_info_id" value="" size="32" />
                        <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />
                        <div align="left">
                        <label for="">Language : </label>
                        </div>
                        <!-- <input type="text" name="" value="" size="32" /> -->
                        <input type="hidden" name="lgINfo_has_lg_id" value="" size="32" />
                        <input type="hidden" name="lgInfo_id" value="<?php echo $row_lgInSet['lg_info_id']+1?>" size="32" />
                        <select name="lg_id" id="" title="Please select language" style="width: 100%; " class="selectpicker" data-live-search="true" title="Please Select Language !">
                                    <!--<option value=""?>Select Language </option> -->
                                    <?php
                        do {  
                        ?>
                                    <option value="<?php echo $row_lgSet['lg_id']?>"><?php echo $row_lgSet['lg_name']?></option>
                                    <?php
                        } while ($row_lgSet = mysqli_fetch_assoc($lgSet));
                          $rows = mysqli_num_rows($lgSet);
                          if($rows > 0) {
                              mysqli_data_seek($lgSet, 0);
                              $lgSet = mysqli_fetch_assoc($lgSet);
                          }
                        ?>
                        </select>   
                  <div align="right">
                      <a onclick="document.getElementById('lg-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Language</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" />
                      </a>
                  </div>                  

                  </div>
                  <div class="w3-half">
                        <div align="left">
                        <label for="">Level : </label>
                        </div>
                        <input type="hidden" name="lgINfo_has_lv_id" value="" size="32" />
                        <input type="hidden" name="lgInfo_id" value="<?php echo $row_lgInSet['lg_info_id']+1?>" size="32" />
                        <select name="lv_id" id="" title="Please select Level of language" style="width: 100%; ">
                                    <option value=""?>Select Level of Language </option>
                                    <?php
                        do {  
                        ?>
                                    <option value="<?php echo $row_lgLvSet['lv_id']?>"><?php echo $row_lgLvSet['lv_name']?></option>
                                    <?php
                        } while ($row_lgLvSet = mysqli_fetch_assoc($lgLvSet));
                          $rows = mysqli_num_rows($lgLvSet);
                          if($rows > 0) {
                              mysqli_data_seek($lgLvSet, 0);
                              $lgLvSet = mysqli_fetch_assoc($lgLvSet);
                          }
                        ?>
                        </select>       
                  </div> 


                    </div>
                    </div>

<p>&nbsp;</p>
<p>&nbsp;</p>
                    
                  <div align="right">
                            <a href="javascript:void(0);" class="add_button" title="Add field">Add more&nbsp;&nbsp;<i class="fa fa-plus-square "></i></a>
                  </div>
                </div>

            </div>

        <!-- third end -->

        </div>

                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

              </fieldset>
              
              