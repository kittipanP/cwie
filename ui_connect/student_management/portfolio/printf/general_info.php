<!-- fieldsets -->
              <fieldset>
              <!--
                <a href="../../ui_connect/student_management/Student_Management.php" class="w3-closebtn" title="Cancel and back to main page"><span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-mail-reply fa-stack-1x fa-inverse"></i>
                </span></a> -->
                <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Personal Detail</h6>
                <div class="w3-row-padding w3-center w3-margin-top ">
                  
                  <div class="w3-third ">
                    <div >
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
                        <dd><?php if($row_Recordset1_stu['s_fname']==NULL){ echo "N/A";}else{?><?php echo $row_title_rec['title_name'];
                        echo "&nbsp;&nbsp;";
                        echo $row_Recordset1_stu['s_fname'];
                        echo "&nbsp;&nbsp;";
                        echo  $row_Recordset1_stu['s_lname']; }?>
                        </div>
                        <br>

                        <div class="w3-opacity" align="left">Thai Name : </div>
                        <div align="left"><dd><?php if($row_Recordset1_stu['thai_fname']==NULL){ echo "N/A";}else{?><?php echo $row_title_rec['title_name'];
                        echo "&nbsp;&nbsp;";
                        echo $row_Recordset1_stu['thai_fname'];
                        echo "&nbsp;&nbsp;";
                        echo  $row_Recordset1_stu['thai_lname']; }?> 
                        </div>
                        <br>

                        <div class="w3-opacity" align="left">Nick Name : </div>
                        <div align="left"><dd><?php if($row_Recordset1_stu['s_nickname']==NULL){ echo "N/A";}else{?><?php echo $row_Recordset1_stu['s_nickname']; }?>
                        </div>
                    </div>
                  </div>
       


                  <div class="w3-third" align="left">
                    <div >
                                      
                        <div align="left">
                        <label for="contact_no" class="w3-opacity"> Tel : </label>
                        </div><dd><?php if($row_Recordset1_scd['contact_no']==NULL){ echo "N/A";}else{?><?php echo $row_Recordset1_scd['contact_no'] ?></dd><br>
                        
                        <div align="left">
                        <label for="email_adress" class="w3-opacity"> E-mail address : </label>
                        </div><dd><?php if($row_Recordset1_scd['email_adress']==NULL){ echo "N/A";}else{?><?php echo $row_Recordset1_scd['email_adress']; }?></dd><br>
                        
                        
                        <div align="left">
                        <label for="remark" class="w3-opacity"> Remark : </label>
                        </div><div style="text-indent: 40px;"><?php if($row_Recordset1_stu['remark']==NULL){ echo "N/A";}else{?><?php echo $row_Recordset1_stu['remark']; }?></div>

                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                    <div align="left">
                                <div class="w3-opacity" align="left"><label for="statusSelect"> Student status : </label></div>

                                </div><?php echo $row_status_rec['status_desc']?>
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
                                <label for="emc_fname" class="w3-opacity"> First Name : </label>
                                </div><div align="left"><dd><?php if($row_Recordset1_sec['emc_fname']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sec['emc_fname'], ENT_COMPAT, 'utf-8'); }?></dd></div>
                            </div>
                          </div>
               
                          <div class="w3-third">
                            <div >
                                                   
                                <div align="left"> 
                                <label for="emc_lname" class="w3-opacity"> Last Name : </label>                      
                                </div><div align="left"><dd><?php if($row_Recordset1_sec['emc_lname']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sec['emc_lname'], ENT_COMPAT, 'utf-8'); }?></div>
                            </div>
                          </div>
                                
                          <div class="w3-third">
                            <div >            
                                <div align="left"> 
                                <label for="emc_relation" class="w3-opacity"> Relationship : </label>                     
                                </div>
                                <div align="left"><dd><?php if($row_Recordset1_sec['emc_relation']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sec['emc_relation'], ENT_COMPAT, 'utf-8'); }?></div><br>
                                <div align="left"> 
                                <label for="emc_contact" class="w3-opacity"> Contact No : </label>                     
                                </div><div align="left"><dd><?php if($row_Recordset1_sec['emc_contact']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sec['emc_contact'], ENT_COMPAT, 'utf-8'); }?></div>
        
                            </div>
                          </div>
                         
                        </div>
                        
                        <div class="w3-row-padding w3-center w3-margin-top">
                        <h6 align="left" class="w3-text-teal" class="w3-opacity" ><i class="fa fa-calendar fa-fw w3-margin-right"></i>Student Address</h6>
                          <div class="w3-third">
                            <div>
                                <input type="hidden" name="address_Id" value="" size="32" />
                                <input type="hidden" name="sad_s_id" value="" size="32" /> 
                                <div align="left">
                                <label for="no" class="w3-opacity"> Number : </label> 
                                </div><div align="left"><dd><?php if($row_Recordset1_sad['no']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sad['no'], ENT_COMPAT, 'utf-8'); }?></div><br>
                                <div align="left">  
                                <label for="sub_district" class="w3-opacity"> Sub-district : </label>                 
                                </div> <div align="left"><dd><?php if($row_Recordset1_sad['sub_district']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sad['sub_district'], ENT_COMPAT, 'utf-8'); }?></div><br>
                                <div align="left">
                                <label for="province_name" class="w3-opacity"> Province : </label> 
                                </div><div align="left"><dd><?php if($row_Recordset1_sad['province_name']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sad['province_name'], ENT_COMPAT, 'utf-8'); }?></div><br>                                 
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >   
                                <div align="left">
                                <label for="place_name" class="w3-opacity"> Place/Village : </label> 
                                </div><div align="left"><dd><?php if($row_Recordset1_sad['place_name']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sad['place_name'], ENT_COMPAT, 'utf-8'); }?></div><br>
                                <div align="left">
                                <label for="district" class="w3-opacity"> District : </label> 
                                 </div><div align="left"><dd><?php if($row_Recordset1_sad['district']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sad['district'], ENT_COMPAT, 'utf-8'); }?></div><br>
                                <div align="left">
                                <label for="zip_code" class="w3-opacity"> Zip Code/Post : </label> 
                                </div><div align="left"><dd><?php if($row_Recordset1_sad['zip_code']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sad['zip_code'], ENT_COMPAT, 'utf-8'); }?></div><br>
                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">
                                <label for="road_name" class="w3-opacity"> Road/Street : </label>                    
                                </div> <div align="left"><dd><?php if($row_Recordset1_sad['road_name']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sad['road_name'], ENT_COMPAT, 'utf-8'); }?></div><br>
                                <div align="left">
                                <label for="city" class="w3-opacity"> City : </label> 
                                </div><div align="left"><dd><?php if($row_Recordset1_sad['city']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sad['city'], ENT_COMPAT, 'utf-8'); }?></div><br>
                                <div align="left">
                                <label for="country_id" class="w3-opacity"> Country : </label> 
                                </div><div align="left"><dd><?php if($row_country_rec['country_name']==NULL){ echo "N/A";}else{ ?><?php echo $row_country_rec['country_name']; } ?></div><br>
                            </div>
                          </div>
                        </div>
                        
                      
                            <p class="headings"></p> 
                            <div class="w3-row-padding w3-center w3-margin-top">

                            <h6 align="left" class="w3-text-teal" class="w3-opacity"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Relation Data</h6>
                              <div class="w3-third">
                                <div>   
                                    <input type="hidden" name="relation_id" value="" size="32" />
                                    <input type="hidden" name="s_id" value="" size="32" />                                      
                                    <div align="left">
                                    <label for="relation_fname" class="w3-opacity"> First Name : </label>
                                    </div><div align="left"><dd><?php if($row_Recordset1_sre['relation_fname']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sre['relation_fname'], ENT_COMPAT, 'utf-8'); }?></div>
                                    <div align="left"> 
                                    <label for="relation_occupation" class="w3-opacity"> Occupation : </label>                     
                                    </div><div align="left"><dd><?php if($row_Recordset1_sre['relation_occupation']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sre['relation_occupation'], ENT_COMPAT, 'utf-8'); }?></div>
                                </div>
                              </div>
                              <div class="w3-third">
                                <div >                              
                                    <div align="left"> 
                                    <label for="relation_lname" class="w3-opacity"> Last Name : </label>                       
                                    </div>    <div align="left"><dd><?php if($row_Recordset1_sre['relation_lname']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sre['relation_lname'], ENT_COMPAT, 'utf-8'); }?></div> 
                                    <div align="left"> 
                                    <label for="relation_contact" class="w3-opacity"> Contact : </label>                     
                                    </div><div align="left"><dd><?php if($row_Recordset1_sre['relation_contact']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sre['relation_contact'], ENT_COMPAT, 'utf-8'); ?> </div><br>
                                </div>
                              </div>          
                              <div class="w3-third">
                                <div >                                                 
                                    <div align="left"> 
                                    <label for="relation_type" class="w3-opacity"> Relation Type : </label>                     
                                    </div> <div align="left"><dd><?php if($row_Recordset1_sre['relation_type']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_Recordset1_sre['relation_type'], ENT_COMPAT, 'utf-8'); }?></div>
                                </div>
                              </div>
                            </div>
                  </div>     
                        
              </fieldset>

<fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>

                <h6 align="left" class="w3-text-teal" class="w3-opacity"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Education Background</h6>
                

                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>

                       <div class="w3-half">
                         <input type="hidden" name="education_id" value="" size="32" />
                         <input type="hidden" name="education_name" value="" size="32" id="" readonly />
                         <input type="hidden" name="s_id" value="" size="32" />    
                         <div align="left">
                         <label for="degree_id" class="w3-opacity"> Degree : </label>
                       </div><div align="left"><dd><?php if($row_degree_info_rec['degree_name']==NULL){ echo "N/A";}else{?><?php echo $row_degree_info_rec['degree_name']; }?></div>
                       </div>


                      <div align="left">  
                      </div>
                      
                      <div align="left">
                      </div>
                     
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                               
                       <div class="">
                        <div align="left">
                        <label for="" class="w3-opacity">Year : </label>
                        </div><div align="left"><dd></div><br>
                        </div>

                        <div align="left" class="w3-opacity">
                        <label for="major_id"> Major : </label>
                        </div><div align="left"><dd><?php if($row_major_rec['major_name']==NULL){ echo "N/A";}else{?><?php echo $row_major_rec['major_name']; }?></div>
                       
                        <div align="left">                        
                        </div>
                        
                        <div align="left">                        
                        </div>
                        
                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >             
                        <div align="left">  
                        <label for="intitute_id" class="w3-opacity"> Institute : </label>                      
                        </div><div align="left"><dd><?php if($row_institute_rec['ins_name']==NULL){ echo "N/A";}else{?><?php echo $row_institute_rec['ins_name']; }?></div>
                        
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
                                <label for="" class="w3-opacity"> Duration : </label>                        
                                </div> <div align="left"><dd><?php if($row_edb_rec['bg_durationS']==NULL){ echo "N/A";}else{?><table><tr>
                                <td><?php echo htmlentities($row_edb_rec['bg_durationS'], ENT_COMPAT, 'utf-8'); ?></td>
                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo htmlentities($row_edb_rec['bg_durationE'], ENT_COMPAT, 'utf-8'); ?></td></tr></table><?php }?></div>
                                
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >                 
                                <div align="left">
                                <label for="bg_degree" class="w3-opacity"> Degree : </label>                       
                                </div> <div align="left"><dd><?php if($row_degree_infoSet['degree_name']==NULL){ echo "N/A";}else{?><?php echo $row_degree_infoSet['degree_name']; }?></div><br>                                <div align="left">
                                <label for="bg_major" class="w3-opacity"> Major : </label>                       
                                </div> <div align="left"><dd><?php if($row_edb_rec['bg_major']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_edb_rec['bg_major'], ENT_COMPAT, 'utf-8'); }?></div>
                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">                      
                                </div>   
                                <div align="left">
                                <label for="bg_institute_name" class="w3-opacity"> Institute Name : </label>                  
                                </div> <div align="left"><dd><?php if($row_edb_rec['bg_institute_name']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_edb_rec['bg_institute_name'], ENT_COMPAT, 'utf-8'); }?></div><br>
                                <div align="left">
                                <label for="bg_gpax" class="w3-opacity"> GPAX : </label>                       
                                </div> <div align="left"><dd><?php if($row_edb_rec['bg_gpax']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_edb_rec['bg_gpax'], ENT_COMPAT, 'utf-8'); }?></div>
                                </div><br>
                          </div>
                        </div>
                  </div>

                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->

              </fieldset>

              <fieldset>


        <!-- third start -->
        <div class="w3-col l12">
            <div class="">

                <!-- I/III -->
                <div class="w3-third">
                  <div class="">

                    <div class="w3-row-padding w3-center w3-margin-top">
                      <h6 align="left" class="w3-text-teal" class="w3-opacity"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Work Experience</h6>
     
                               <input type="hidden" name="wex_id" value="" size="32" />
                                <input type="hidden" name="student_info_s_id" value="" size="32" />
                                <div align="left">
                                <label for="" class="w3-opacity"> Duration : </label>
                                </div>
                                <div align="left"><dd><?php if($row_wex_rec['wex_dateS']==NULL && $row_wex_rec['wex_dateE']==NULL){ echo "N/A";}else{?><table><tr>
                                <td><?php echo htmlentities($row_wex_rec['wex_dateS'], ENT_COMPAT, 'utf-8'); ?></td>
                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo htmlentities($row_wex_rec['wex_dateE'], ENT_COMPAT, 'utf-8'); ?></td></tr></table><?php }?></div><br>

                            
                                <div align="left">
                                <label for="" class="w3-opacity"> Organization/Company : </label>                      
                                </div> <div align="left"><dd><?php if($row_wex_rec['wex_organ']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_wex_rec['wex_organ'], ENT_COMPAT, 'utf-8'); }?></div><br>
                                <div align="left">  
                                <label for="" class="w3-opacity"> Detail of Duty/Position : </label>                    
                                </div><div align="left" style="text-indent: 40px;"><?php echo htmlentities($row_wex_rec['wex_detail'], ENT_COMPAT, 'utf-8'); }?></div>

                    </div> 


                        
                  </div>
                </div>

                <!-- II/III-->
                <div class="w3-third">
                    <div class="" style="">
                    <div class="w3-row-padding w3-center w3-margin-top">
                      <h6 align="left" class="w3-text-teal" ><i class="fa fa-calendar fa-fw w3-margin-right"></i> Extracurricular Activity</h6>
                       

                        <div align="left">
                          <label for="" class="w3-opacity"> Duration : </label>
                        </div>
                          <div align="left"><dd><?php if($row_ext_rec['ext_dateS']==NULL && $row_ext_rec['ext_dateE']==NULL){ echo "N/A";}else{?><table><tr>
                                <td><?php echo htmlentities($row_ext_rec['ext_dateS'], ENT_COMPAT, 'utf-8'); ?></td>
                                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td>"<?php echo htmlentities($row_ext_rec['ext_dateE'], ENT_COMPAT, 'utf-8'); ?></td></tr>

                          </table><br></div>

                        <div align="left">
                        <label for="" class="w3-opacity">Name: </label>
                        </div><div align="left"><dd><?php if($row_ext_rec['exact_name']==NULL){ echo "N/A";}else{?><?php echo htmlentities($row_ext_rec['exact_name'], ENT_COMPAT, 'utf-8'); }?></div><br>
                        <div align="left">
                        <label for="" class="w3-opacity">Details: </label>
                        </div><div align="left" style="text-indent: 40px;"><?php echo htmlentities($row_ext_rec['exact_detail'], ENT_COMPAT, 'utf-8'); }?></div>
                        <input type="hidden" name="exact_id" value="" size="32" />
                        <input type="hidden" name="student_info_s_id" value="<?php echo $row_studentSet['s_id']+1 ?>" size="32" />



                    </div> 
                    </div>
                </div>

                <!--  III/III-->
                <div class="w3-third">
                    <div class=""  style="">
                    <div class="w3-row-padding w3-center w3-margin-top"> 
                       <h6 align="left" class="w3-text-teal" ><i class="fa fa-calendar fa-fw w3-margin-right"></i>Student Personality</h6>   


                      <div align="left">
                        <label for=""></label>
                        </div><div align="left" style="text-indent: 40px;"><?php echo htmlentities($row_hob_rec['hobby_desc'], ENT_COMPAT, 'utf-8'); }?></div>
                        <input type="hidden" name="hobby_id" value="" size="32" />
                        <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" /><br>


                      <h6 align="left" class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i >Language Skills</h6>
                  <div class="w3-half">
                        <input type="hidden" name="lg_info_id" value="" size="32" />
                        <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />
                        <div align="left">
                        <label for="" class="w3-opacity">Language : </label>
                        </div>
                        <input type="hidden" name="lgINfo_has_lg_id" value="" size="32" />
                        <input type="hidden" name="lgInfo_id" value="<?php echo $row_lgInSet['lg_info_id']+1?>" size="32" /><div align="left"><dd><?php if($row_lg_rec['lg_name']==NULL){ echo "N/A";}else{?><?php echo $row_lg_rec['lg_name']; }?></div>
                

                  </div>
                  <div class="w3-half">
                        <div align="left">
                        <label for="" class="w3-opacity">Level : </label>
                        </div>
                        <input type="hidden" name="lgINfo_has_lv_id" value="" size="32" />
                        <input type="hidden" name="lgInfo_id" value="<?php echo $row_lgInSet['lg_info_id']+1?>" size="32" /><div align="left"><dd><?php if($row_lv_rec['lv_name']==NULL){ echo "N/A";}else{?><?php echo $row_lv_rec['lv_name']; }?></div>
                  </div> 


                    </div>
                    </div>

<p>&nbsp;</p>
<p>&nbsp;</p>
                    
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
              
              