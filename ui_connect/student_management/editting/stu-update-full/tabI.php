<!-- fieldsets -->
              <fieldset>
                <a href="../../ui_connect/student_management/Student_Management.php" class="w3-closebtn" title="Cancel and back to main page"><span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-mail-reply fa-stack-1x fa-inverse"></i>
                </span></a>
                <h2 class="fs-title">Personal Detail</h2>
                <div class="w3-row-padding w3-center w3-margin-top">
 
                  <div class="w3-third">
                    <div>
                                  <!--<h4>Student Management</h4><br>-->
                                    <!--<i class="fa fa-group w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                                    <!--<hr>-->
                                    
                        <input type="hidden" name="s_dob" value="<?php echo htmlentities($row_Recordset1_stu['s_dob'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                        <input type="hidden" name="origin_id" value="<?php echo htmlentities($row_Recordset1_stu['origin_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                        <input type="hidden" name="type_id" value="<?php echo htmlentities($row_Recordset1_stu['type_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                        <input type="hidden" name="ref_id" value="<?php echo htmlentities($row_Recordset1_stu['ref_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                        <input type="hidden" name="national_id" value="<?php echo htmlentities($row_Recordset1_stu['national_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                        <input type="hidden" name="title_title_id" value="" size="32" />
                        <input type="hidden" name="status_id" value="" size="32" />
                         <div align="left">
                        <label for="titleSelect"> Title : </label>
                        </div>
                        <!--<label for="titleSelect">TITLE :  </label>-->
                        <div align="left">
                        <select name="title_title_id" >
                                  <option name="title_title_id" size="32" value="<?php echo htmlentities($row_title_rec['title_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_title_rec['title_name']?> </option>
                          <?php

                              do {  
                          ?>

                                  <option name="title_title_id" size="32" value="<?php echo htmlentities($row_titleSet['title_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_titleSet['title_name']?> </option>
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
                      <input type="text" name="s_fname" value="<?php echo htmlentities($row_Recordset1_stu['s_fname'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                      <div align="left">
                        <label for="s_lname"> Last Name : </label>
                      </div>
                      <input type="text" name="s_lname" value="<?php echo htmlentities($row_Recordset1_stu['s_lname'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                                            <!--<h4>Report</h4><br>-->
                                            <!--<i class="fa fa-bar-chart-o w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                        <div align="left">
                        <label for="thai_fname"> Thai First Name : </label>
                        </div>
                        <input type="text" name="thai_fname" value="<?php echo htmlentities($row_Recordset1_stu['thai_fname'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                        <div align="left">
                        <label for="thai_lname"> Thai Last Name : </label>
                        </div>
                        <input type="text" name="thai_lname" value="<?php echo htmlentities($row_Recordset1_stu['thai_lname'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                        <div align="left">
                        <label for="statusSelect"> Student status : </label>
                        </div>
                        <select name="status_id" style="width: 100%;">
                            <option  name="title_title_id" value="<?php echo htmlentities($row_status_rec['status_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_status_rec['status_desc']?></option>
                          <?php do {  ?>
                            <option  name="title_title_id" value="<?php echo htmlentities($row_statusSet['status_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_statusSet['status_desc']?></option>
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
                        <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />                                       
                        <div align="left">
                        <label for="contact_no"> Tel : </label>
                        </div>
                        <input type="text" name="contact_no" value="<?php echo htmlentities($row_Recordset1_scd['contact_no'], ENT_COMPAT, 'utf-8'); ?>" size="32" />

                        
                        <div align="left">
                        <label for="email_adress"> E-mail address : </label>
                        </div>
                        <input type="text" name="email_adress" value="<?php echo htmlentities($row_Recordset1_scd['email_adress'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                        
                        
                        <div align="left">
                        <label for="remark"> Remark : </label>
                        </div>
                        <textarea name="remark" value="" size="32" placeholder=""><?php echo htmlentities($row_Recordset1_stu['remark'], ENT_COMPAT, 'utf-8'); ?></textarea>
                        <!--<input type="text" name="remark" value="<?php echo htmlentities($row_Recordset1_stu['remark'], ENT_COMPAT, 'utf-8'); ?>" size="32" /> -->

                        
                        
                                     
                         
                        

                                            <!--<i class="fa fa-envelope w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                                            <!--<hr>-->
                    </div>
                  </div>
                 
                </div>  
                <div class="accordion">
                            <p></p>
                  <div class="w3-row-padding w3-center w3-margin-top">
                  <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Emergency Cantact Data</p></div>
                          <div class="w3-third">
                            <div>   
                               
                            <input type="hidden" name="emc_id" value="" size="32" />
                            <input type="hidden" name="contact_id" value="" size="32" />
                                <div align="left">
                                <label for="emc_fname"> First Name : </label>
                                </div>
                                <!-- <input type="text" name="emc_fname" value="" size="32" placeholder="First Name"/> -->
                                <input type="text" name="emc_fname" value="<?php echo htmlentities($row_Recordset1_sec['emc_fname'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
        
                            </div>
                          </div>
               
                          <div class="w3-third">
                            <div >
                                                   
                                <div align="left"> 
                                <label for="emc_lname"> Last Name : </label>                      
                                </div>
                                <input type="text" name="emc_lname" value="<?php echo htmlentities($row_Recordset1_sec['emc_lname'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="Last Name"/>
                                
                            </div>
                          </div>
                                
                          <div class="w3-third">
                            <div >
                                                   
                                <div align="left"> 
                                <label for="emc_relation"> Relationship : </label>                     
                                </div>
                                <input type="text" name="emc_relation" value="<?php echo htmlentities($row_Recordset1_sec['emc_relation'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="Relationship"/> 
                                <div align="left"> 
                                <label for="emc_contact"> Contact No : </label>                     
                                </div>
                                <input type="text" name="emc_contact" value="<?php echo htmlentities($row_Recordset1_sec['emc_contact'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="Contact No."/>      
        
                            </div>
                          </div>
                         
                        </div>
                        
                        <div class="w3-row-padding w3-center w3-margin-top">
                        <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Student Address</p></div>
                          <div class="w3-third">
                            <div>
                                <input type="hidden" name="address_Id" value="" size="32" />
                                <input type="hidden" name="sad_s_id" value="" size="32" /> 
                                <div align="left">
                                <label for="no"> Number : </label> 
                                </div>
                                <input type="text" name="no" value="<?php echo htmlentities($row_Recordset1_sad['no'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder=""/>
                                <div align="left">  
                                <label for="sub_district"> Sub-district : </label>                 
                                </div> 
                                <input type="text" name="sub_district" value="<?php echo htmlentities($row_Recordset1_sad['sub_district'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder=""/>
                                <div align="left">
                                <label for="province_name"> Province : </label> 
                                </div>
                                <input type="text" name="province_name" value="<?php echo htmlentities($row_Recordset1_sad['province_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder=""/>     
                                                                                           
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >   
                                <div align="left">
                                <label for="place_name"> Place/Village : </label> 
                                </div>
                                <input type="text" name="place_name" value="<?php echo htmlentities($row_Recordset1_sad['place_name'], ENT_COMPAT, 'utf-8'); ?>" size="32"/>
                                <div align="left">
                                <label for="district"> District : </label> 
                                 </div>
                                <input type="text" name="district" value="<?php echo htmlentities($row_Recordset1_sad['district'], ENT_COMPAT, 'utf-8'); ?>" size="32"/>
                                <div align="left">
                                <label for="zip_code"> Zip Code/Post : </label> 
                                </div>
                                <input type="text" name="zip_code" value="<?php echo htmlentities($row_Recordset1_sad['zip_code'], ENT_COMPAT, 'utf-8'); ?>" size="32"/>
  
                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">
                                <label for="road_name"> Road/Street : </label>                    
                                </div> 
                                <input type="text" name="road_name" value="<?php echo htmlentities($row_Recordset1_sad['road_name'], ENT_COMPAT, 'utf-8'); ?>" size="32"/>
                                <div align="left">
                                <label for="city"> City : </label> 
                                </div>
                                <input type="text" name="city" value="<?php echo htmlentities($row_Recordset1_sad['city'], ENT_COMPAT, 'utf-8'); ?>" size="32"/>
                                <div align="left">
                                <label for="country_id"> Country : </label> 
                                </div>
                                <?php if($row_Recordset1_sad['country_id']==null){?>
                                <select name="country_id" style="width: 100%;">
                                    <option  name="country_id" value="">Plese Select Your Country!</option>
                                  <?php do {  ?>
                                    <option  name="country_id" value="<?php echo htmlentities($row_countrySet['country_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_countrySet['country_name']?></option>
                                    <?php
                                        } while ($row_countrySet = mysqli_fetch_assoc($countrySet));
                                          $rows = mysqli_num_rows($countrySet);
                                          if($rows > 0) {
                                          mysqli_data_seek($countrySet, 0);
                                          $row_countrySet = mysqli_fetch_assoc($countrySet);
                                          }
                                    ?>
                                </select> 
                                <?php }else{ ?>
                                <select name="country_id" style="width: 100%;">
                                    <option  name="country_id" value="<?php echo htmlentities($row_country_rec['country_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_country_rec['country_name']?></option>
                                  <?php do {  ?>
                                    <option  name="country_id" value="<?php echo htmlentities($row_countrySet['country_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_countrySet['country_name']?></option>
                                    <?php
                                        } while ($row_countrySet = mysqli_fetch_assoc($countrySet));
                                          $rows = mysqli_num_rows($countrySet);
                                          if($rows > 0) {
                                          mysqli_data_seek($countrySet, 0);
                                          $row_countrySet = mysqli_fetch_assoc($countrySet);
                                          }
                                    ?>
                                </select> 
                                <?php }; ?>
                                <!-- <input type="text" name="country_id" value="<?php echo htmlentities($row_Recordset1_sad['country_id'], ENT_COMPAT, 'utf-8'); ?>" size="32"/> -->
                            </div>
                          </div>
                        </div>
                        
                      
                            <p class="headings"></p> 
                            <div class="w3-row-padding w3-center w3-margin-top">
                            <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Relation Data</p></div>
                              <div class="w3-third">
                                <div>   
                                    <input type="hidden" name="relation_id" value="" size="32" />
                                    <input type="hidden" name="s_id" value="" size="32" />                                      
                                    <div align="left">
                                    <label for="relation_fname"> First Name : </label>
                                    </div>
                                    <input type="text" name="relation_fname" value="<?php echo htmlentities($row_Recordset1_sre['relation_fname'], ENT_COMPAT, 'utf-8'); ?>" size="32"/>
                                    <div align="left"> 
                                    <label for="relation_occupation"> Occupation : </label>                     
                                    </div>
                                    <input type="text" name="relation_occupation" value="<?php echo htmlentities($row_Recordset1_sre['relation_occupation'], ENT_COMPAT, 'utf-8'); ?>" size="32"/>

                                </div>
                              </div>
                              <div class="w3-third">
                                <div >                              
                                    <div align="left"> 
                                    <label for="relation_lname"> Last Name : </label>                       
                                    </div>    
                                    <input type="text" name="relation_lname" value="<?php echo htmlentities($row_Recordset1_sre['relation_lname'], ENT_COMPAT, 'utf-8'); ?>" size="32"/> 
                                    <div align="left"> 
                                    <label for="relation_contact"> Contact : </label>                     
                                    </div>
                                    <input type="text" name="relation_contact" value="<?php echo htmlentities($row_Recordset1_sre['relation_contact'], ENT_COMPAT, 'utf-8'); ?>" size="32"/> 
                                </div>
                              </div>          
                              <div class="w3-third">
                                <div >                                                 
                                    <div align="left"> 
                                    <label for="relation_type"> Relation Type : </label>                     
                                    </div> 
                                    <input type="text" name="relation_type" value="<?php echo htmlentities($row_Recordset1_sre['relation_type'], ENT_COMPAT, 'utf-8'); ?>" size="32"/>    
                                </div>
                              </div>
                            </div>
                  </div>     
                        
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
                         <input type="hidden" name="education_name" value="" size="32" id="" readonly />
                         <input type="hidden" name="s_id" value="" size="32" />    
                         <div align="left">
                         <label for="degree_id"> Degree : </label>
                       </div>
                         <select name="degree_id" id="degreeSelect" style="width: 100%;">
                         <?php 
                         if($row_degree_info_rec['degree_id']==null){
                         ?>
                            <option value="">Select Degree !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_degree_infoSet['degree_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_degree_infoSet['degree_name']?></option>

                          <?php
                          } while ($row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet));
                            $rows = mysqli_num_rows($degree_infoSet);
                            if($rows > 0) {
                                mysqli_data_seek($degree_infoSet, 0);
                                $row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_degree_info_rec['degree_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_degree_info_rec['degree_name']?></option>
                         <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_degree_infoSet['degree_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_degree_infoSet['degree_name']?></option>
                                    <?php
                          } while ($row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet));
                            $rows = mysqli_num_rows($degree_infoSet);
                            if($rows > 0) {
                                mysqli_data_seek($degree_infoSet, 0);
                                $row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet);
                            }
                        }?>
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
                         <select name="major_id" id="" class="selectpicker" data-live-search="true"  style="width: 100%;" >
                         <?php 
                         if($row_major_rec['major_id']==null){
                         ?>
                            <option value="">Select Major !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_majorSet['major_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_majorSet['major_name']?></option>
                          <?php
                          } while ($row_majorSet = mysqli_fetch_assoc($majorSet));
                            $rows = mysqli_num_rows($majorSet);
                            if($rows > 0) {
                                mysqli_data_seek($majorSet, 0);
                                $row_majorSet = mysqli_fetch_assoc($majorSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_major_rec['major_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_major_rec['major_name']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_majorSet['major_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_majorSet['major_name']?></option>
                                    <?php
                          } while ($row_majorSet = mysqli_fetch_assoc($majorSet));
                            $rows = mysqli_num_rows($majorSet);
                            if($rows > 0) {
                                mysqli_data_seek($majorSet, 0);
                                $row_majorSet = mysqli_fetch_assoc($majorSet);
                            }
                        }?>
                        </select>

                      <div align="right">
                      <a onclick="document.getElementById('major-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Major</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" /></a></div>









<!--
                        <select name="intitute_id" id="insSelect" onChange="(getUniversity(this.value) , getUniversityii(this.value))" style="width: 100%; " >
                            <option value="">Select Institute Type</option>
                          <?php
                    do {  
                    ?>
                          <option value="<?php echo htmlentities($row_instituteSet['intitute_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_instituteSet['intitute_name']?></option>
                          <?php
                    } while ($row_instituteSet = mysqli_fetch_assoc($instituteSet));
                      $rows = mysqli_num_rows($instituteSet);
                      if($rows > 0) {
                          mysqli_data_seek($instituteSet, 0);
                          $row_instituteSet = mysqli_fetch_assoc($instituteSet);
                      }
                    ?>
                        </select>  -->
                        <!--<input type="text" name="intitute_id" value="" size="32" />-->
                       
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
                         <select name="edu_institute" id="" class="selectpicker" data-live-search="true" onChange="(getUniversity(this.value) , getUniversityii(this.value))" style="width: 100%; " >
                         <?php 
                         if($row_institute_rec['edu_institute']==null){
                         ?>
                            <option value="">Select Institute Type !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_instituteSet['ins_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_instituteSet['ins_name']?></option>
                          <?php
                          } while ($row_instituteSet = mysqli_fetch_assoc($instituteSet));
                            $rows = mysqli_num_rows($instituteSet);
                            if($rows > 0) {
                                mysqli_data_seek($instituteSet, 0);
                                $row_instituteSet = mysqli_fetch_assoc($instituteSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_institute_rec['ins_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_institute_rec['ins_name']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_instituteSet['ins_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_instituteSet['ins_name']?></option>
                                    <?php
                          } while ($row_instituteSet = mysqli_fetch_assoc($instituteSet));
                            $rows = mysqli_num_rows($instituteSet);
                            if($rows > 0) {
                                mysqli_data_seek($instituteSet, 0);
                                $row_instituteSet = mysqli_fetch_assoc($instituteSet);
                            }
                        }?>
                        </select> 


                      <div align="right">
                      <a onclick="document.getElementById('ins-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Institute</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" /></a></div>

                        
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
                                <td><input type="text" name="bg_durationS" value="<?php echo htmlentities($row_edb_rec['bg_durationS'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="text" name="bg_durationE" value="<?php echo htmlentities($row_edb_rec['bg_durationE'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td></tr></table>
                                
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >                 
                                <div align="left">
                                <label for="bg_degree"> Degree : </label>                       
                                </div> 
                                <!--<input type="text" name="bg_degree" value="" size="32" placeholder="Senior High School"/>-->
                         <select name="bg_degree" id="" style="width: 100%;">
                         <?php 
                         if($row_edb_rec['bg_degree']==null){
                         ?>
                            <option value="">Select Degree !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_degree_infoSet['degree_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_degree_infoSet['degree_name']?></option>

                          <?php
                          } while ($row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet));
                            $rows = mysqli_num_rows($degree_infoSet);
                            if($rows > 0) {
                                mysqli_data_seek($degree_infoSet, 0);
                                $row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_degree_edb_rec['degree_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_degree_edb_rec['degree_name']?></option>
                         <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_degree_infoSet['degree_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_degree_infoSet['degree_name']?></option>
                                    <?php
                          } while ($row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet));
                            $rows = mysqli_num_rows($degree_infoSet);
                            if($rows > 0) {
                                mysqli_data_seek($degree_infoSet, 0);
                                $row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet);
                            }
                        }?>
                        </select> 
                                <div align="left">
                                <label for="bg_major"> Major : </label>                       
                                </div> 
                                <input type="text" name="bg_major" value="<?php echo htmlentities($row_edb_rec['bg_major'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="Science-mathematics"/>
                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">                      
                                </div>   
                                <div align="left">
                                <label for="bg_institute_name"> Institute Name : </label>                  
                                </div> 
                                <input type="text" name="bg_institute_name" value="<?php echo htmlentities($row_edb_rec['bg_institute_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="Chumpholphonphisai School"/>
                                <div align="left">
                                <label for="bg_gpax"> GPAX : </label>                       
                                </div> 
                                <input type="text" name="bg_gpax" value="<?php echo htmlentities($row_edb_rec['bg_gpax'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="4.01"/>   
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
     
                               <input type="hidden" name="wex_id" value="" size="32" />
                                <input type="hidden" name="student_info_s_id" value="" size="32" />
                                <div align="left">
                                <label for=""> Duration : </label>
                                </div>
                                <table><tr>
                                <td><input type="text" name="wex_dateS" value="<?php echo htmlentities($row_wex_rec['wex_dateS'], ENT_COMPAT, 'utf-8'); ?>" size="32" id="dtwexS" placeholder="trigger calendar"/></td>
                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="text" name="wex_dateE" value="<?php echo htmlentities($row_wex_rec['wex_dateE'], ENT_COMPAT, 'utf-8'); ?>" size="32" id="dtwexE" placeholder="trigger calendar"/></td></tr></table>
                            
                                <div align="left">
                                <label for=""> Organization/Company : </label>                      
                                </div> 
                                <input type="text" name="wex_organ" value="<?php echo htmlentities($row_wex_rec['wex_organ'], ENT_COMPAT, 'utf-8'); ?>" size="32" /> 
                                
                                <div align="left">  
                                <label for=""> Detail of Duty/Position : </label>                    
                                </div> 

                                <textarea name="wex_detail" value="" size="32" placeholder=""><?php echo htmlentities($row_wex_rec['wex_detail'], ENT_COMPAT, 'utf-8'); ?></textarea>
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
                                <td><input type="text" name="ext_dateS" value="<?php echo htmlentities($row_ext_rec['ext_dateS'], ENT_COMPAT, 'utf-8'); ?>" size="32" id="dtextS" placeholder="trigger calendar"/></td>
                                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="text" name="ext_dateE" value="<?php echo htmlentities($row_ext_rec['ext_dateE'], ENT_COMPAT, 'utf-8'); ?>" size="32" id="dtextE" placeholder="trigger calendar"/></td></tr>
                          </table>

                        <div align="left">
                        <label for="">Name: </label>
                        </div>
                        <input type="text" name="exact_name" value="<?php echo htmlentities($row_ext_rec['exact_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" />

                        <div align="left">
                        <label for="">Details: </label>
                        </div>
                        <textarea name="exact_detail" value="" size="32" placeholder=""><?php echo htmlentities($row_ext_rec['exact_detail'], ENT_COMPAT, 'utf-8'); ?></textarea>

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

                      <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Student Personality</p></div>

                      <div align="left">
                        <label for=""></label>
                        </div>
                        <textarea type="text" name="hobby_desc" value="" size="32" placeholder="..." ><?php echo htmlentities($row_hob_rec['hobby_desc'], ENT_COMPAT, 'utf-8'); ?></textarea>
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
                         <select name="lg_id" id="" class="selectpicker" data-live-search="true" style="width: 100%; " >
                         <?php 
                         if($row_lgIn_rec['lg_id']==null){
                         ?>
                            <option value="">Select Institute Type !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_lgSet['lg_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_lgSet['lg_name']?></option>
                          <?php
                          } while ($row_lgSet = mysqli_fetch_assoc($lgSet));
                            $rows = mysqli_num_rows($lgSet);
                            if($rows > 0) {
                                mysqli_data_seek($lgSet, 0);
                                $row_lgSet = mysqli_fetch_assoc($lgSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_lg_rec['lg_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_lg_rec['lg_name']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_lgSet['lg_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_lgSet['lg_name']?></option>
                                    <?php
                          } while ($row_lgSet = mysqli_fetch_assoc($lgSet));
                            $rows = mysqli_num_rows($lgSet);
                            if($rows > 0) {
                                mysqli_data_seek($lgSet, 0);
                                $row_lgSet = mysqli_fetch_assoc($lgSet);
                            }
                        }?>
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
                         <select name="lv_id" id="" class="selectpicker" data-live-search="true" style="width: 100%; " >
                         <?php 
                         if($row_lgIn_rec['lv_id']==null){
                         ?>
                            <option value="">Select Institute Type !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_lvSet['lv_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_lvSet['lv_name']?></option>
                          <?php
                          } while ($row_lvSet = mysqli_fetch_assoc($lvSet));
                            $rows = mysqli_num_rows($lvSet);
                            if($rows > 0) {
                                mysqli_data_seek($lvSet, 0);
                                $row_lvSet = mysqli_fetch_assoc($lvSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_lv_rec['lv_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_lv_rec['lv_name']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_lvSet['lv_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_lvSet['lv_name']?></option>
                                    <?php
                          } while ($row_lvSet = mysqli_fetch_assoc($lvSet));
                            $rows = mysqli_num_rows($lvSet);
                            if($rows > 0) {
                                mysqli_data_seek($lvSet, 0);
                                $row_lvSet = mysqli_fetch_assoc($lvSet);
                            }
                        }?>
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






                  <p>&nbsp;</p>          
                             <!-- Used some part of the code from Chris Wright (http://codepen.io/chriswrightdesign/)'s Pen  -->
                  <!-- Accordion [S] ## Accordion [S] ## Accordion [S] ## Accordion [S]-->                             
                  <div class="accordion">
                            
                            




                  </div>
                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->


              </fieldset>
              
              