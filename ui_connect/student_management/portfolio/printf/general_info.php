<!-- fieldsets -->
              <fieldset>
                <a href="../../ui_connect/student_management/Student_Management.php" class="w3-closebtn" title="Cancel and back to main page"><span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-mail-reply fa-stack-1x fa-inverse"></i>
                </span></a>
                <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Personal Detail</h6>
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
                        <div class="w3-opacity"> Name : </div>
                        <dd><?php echo $row_title_rec['title_name'];
                        echo "&nbsp;&nbsp;";
                        echo $row_Recordset1_stu['s_fname'];
                        echo "&nbsp;&nbsp;";
                        echo  $row_Recordset1_stu['s_lname'];?>
                        </div>
                        <br>

                        <div class="w3-opacity" align="left">Thai Name : </div>
                        <div align="left"><dd><?php echo $row_title_rec['title_name'];
                        echo "&nbsp;&nbsp;";
                        echo $row_Recordset1_stu['thai_fname'];
                        echo "&nbsp;&nbsp;";
                        echo  $row_Recordset1_stu['thai_lname'];?> 
                        </div>
                        <br>

                        <div class="w3-opacity" align="left">Nick Name : </div>
                        <div align="left"><dd><?php echo $row_Recordset1_stu['s_nickname'];?>
                        </div>
                    </div>
                  </div>
       


                  <div class="w3-third" align="left">
                    <div >
                                      
                        <div align="left">
                        <label for="contact_no" class="w3-opacity"> Tel : </label>
                        </div><dd><?php echo $row_Recordset1_scd['contact_no'] ?></dd><br>
                        
                        <div align="left">
                        <label for="email_adress" class="w3-opacity"> E-mail address : </label>
                        </div><dd><?php echo $row_Recordset1_scd['email_adress']; ?></dd><br>
                        
                        
                        <div align="left">
                        <label for="remark" class="w3-opacity"> Remark : </label>
                        </div><div style="text-indent: 40px;"><?php echo $row_Recordset1_stu['remark']; ?></div>

                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
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
                            </dev>
                    </div>
                  </div>
                 
                </div>  
                <div class="accordion">
                            <p></p>
                  <div class="w3-row-padding w3-center w3-margin-top">
                  <h6 align="left" class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Emergency Cantact Data</h6>
                  
                          <div class="w3-third">
                            <div>   
                               
                            <input type="hidden" name="emc_id" value="" size="32" />
                            <input type="hidden" name="contact_id" value="" size="32" />
                                <div align="left">
                                <label for="emc_fname"> First Name : </label>
                                </div><?php echo htmlentities($row_Recordset1_sec['emc_fname'], ENT_COMPAT, 'utf-8'); ?>
                            </div>
                          </div>
               
                          <div class="w3-third">
                            <div >
                                                   
                                <div align="left"> 
                                <label for="emc_lname"> Last Name : </label>                      
                                </div><?php echo htmlentities($row_Recordset1_sec['emc_lname'], ENT_COMPAT, 'utf-8'); ?>
                            </div>
                          </div>
                                
                          <div class="w3-third">
                            <div >            
                                <div align="left"> 
                                <label for="emc_relation"> Relationship : </label>                     
                                </div>
                                <?php echo htmlentities($row_Recordset1_sec['emc_relation'], ENT_COMPAT, 'utf-8'); ?>
                                <div align="left"> 
                                <label for="emc_contact"> Contact No : </label>                     
                                </div><?php echo htmlentities($row_Recordset1_sec['emc_contact'], ENT_COMPAT, 'utf-8'); ?>
        
                            </div>
                          </div>
                         
                        </div>
                        
                        <div class="w3-row-padding w3-center w3-margin-top">
                        <h6 align="left" class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Student Address</h6>
                          <div class="w3-third">
                            <div>
                                <input type="hidden" name="address_Id" value="" size="32" />
                                <input type="hidden" name="sad_s_id" value="" size="32" /> 
                                <div align="left">
                                <label for="no"> Number : </label> 
                                </div><?php echo htmlentities($row_Recordset1_sad['no'], ENT_COMPAT, 'utf-8'); ?>
                                <div align="left">  
                                <label for="sub_district"> Sub-district : </label>                 
                                </div> <?php echo htmlentities($row_Recordset1_sad['sub_district'], ENT_COMPAT, 'utf-8'); ?>
                                <div align="left">
                                <label for="province_name"> Province : </label> 
                                </div><?php echo htmlentities($row_Recordset1_sad['province_name'], ENT_COMPAT, 'utf-8'); ?>                                 
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >   
                                <div align="left">
                                <label for="place_name"> Place/Village : </label> 
                                </div><?php echo htmlentities($row_Recordset1_sad['place_name'], ENT_COMPAT, 'utf-8'); ?>
                                <div align="left">
                                <label for="district"> District : </label> 
                                 </div><?php echo htmlentities($row_Recordset1_sad['district'], ENT_COMPAT, 'utf-8'); ?>
                                <div align="left">
                                <label for="zip_code"> Zip Code/Post : </label> 
                                </div><?php echo htmlentities($row_Recordset1_sad['zip_code'], ENT_COMPAT, 'utf-8'); ?>
                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">
                                <label for="road_name"> Road/Street : </label>                    
                                </div> <?php echo htmlentities($row_Recordset1_sad['road_name'], ENT_COMPAT, 'utf-8'); ?>
                                <div align="left">
                                <label for="city"> City : </label> 
                                </div><?php echo htmlentities($row_Recordset1_sad['city'], ENT_COMPAT, 'utf-8'); ?>
                                <div align="left">
                                <label for="country_id"> Country : </label> 
                                </div><?php echo $row_country_rec['country_name']?>
                            </div>
                          </div>
                        </div>
                        
                      
                            <p class="headings"></p> 
                            <div class="w3-row-padding w3-center w3-margin-top">

                            <h6 align="left" class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Relation Data</h6>
                              <div class="w3-third">
                                <div>   
                                    <input type="hidden" name="relation_id" value="" size="32" />
                                    <input type="hidden" name="s_id" value="" size="32" />                                      
                                    <div align="left">
                                    <label for="relation_fname"> First Name : </label>
                                    </div><?php echo htmlentities($row_Recordset1_sre['relation_fname'], ENT_COMPAT, 'utf-8'); ?>
                                    <div align="left"> 
                                    <label for="relation_occupation"> Occupation : </label>                     
                                    </div><?php echo htmlentities($row_Recordset1_sre['relation_occupation'], ENT_COMPAT, 'utf-8'); ?>
                                </div>
                              </div>
                              <div class="w3-third">
                                <div >                              
                                    <div align="left"> 
                                    <label for="relation_lname"> Last Name : </label>                       
                                    </div>    <?php echo htmlentities($row_Recordset1_sre['relation_lname'], ENT_COMPAT, 'utf-8'); ?> 
                                    <div align="left"> 
                                    <label for="relation_contact"> Contact : </label>                     
                                    </div><?php echo htmlentities($row_Recordset1_sre['relation_contact'], ENT_COMPAT, 'utf-8'); ?> 
                                </div>
                              </div>          
                              <div class="w3-third">
                                <div >                                                 
                                    <div align="left"> 
                                    <label for="relation_type"> Relation Type : </label>                     
                                    </div> <?php echo htmlentities($row_Recordset1_sre['relation_type'], ENT_COMPAT, 'utf-8'); ?>   
                                </div>
                              </div>
                            </div>
                  </div>     
                        
              </fieldset>

<fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>

                <h6 align="left" class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Education Background</h6>
                

                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>
                         <input type="hidden" name="education_id" value="" size="32" />
                         <input type="hidden" name="education_name" value="" size="32" id="" readonly />
                         <input type="hidden" name="s_id" value="" size="32" />    
                         <div align="left">
                         <label for="degree_id"> Degree : </label>
                       </div><?php echo $row_degree_info_rec['degree_name']?>
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
                        </div><?php echo $row_major_rec['major_name']?>
                       
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
                        </div><?php echo $row_institute_rec['ins_name']?>
                        
                    </div>
                  </div>
                 
                </div>                     
                  <div class="accordion">
                            <p></p>
                        <div class="w3-row-padding w3-center w3-margin-top">

                          <div class="w3-third">
                            <div>      
                              
                                <input type="hidden" name="bg_id" value="" size="32" />
                                <input type="hidden" name="student_info_s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" /> 
                                <div align="left">
                                </div>
                                <div align="left">
                                <label for=""> Duration : </label>                        
                                </div> <table><tr>
                                <td><?php echo htmlentities($row_edb_rec['bg_durationS'], ENT_COMPAT, 'utf-8'); ?></td>
                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo htmlentities($row_edb_rec['bg_durationE'], ENT_COMPAT, 'utf-8'); ?></td></tr></table>
                                
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
                      <h6 align="left" class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Work Experience</h6>
     
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
                      <h6 align="left" class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i> Extracurricular Activity</h6>
                       

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
                       <h6 align="left" class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Student Personality</h6>   


                      <div align="left">
                        <label for=""></label>
                        </div>
                        <textarea type="text" name="hobby_desc" value="" size="32" placeholder="..." ><?php echo htmlentities($row_hob_rec['hobby_desc'], ENT_COMPAT, 'utf-8'); ?></textarea>
                        <input type="hidden" name="hobby_id" value="" size="32" />
                        <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />


                      <h6 align="left" class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Language Skills</h6>
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
              
              