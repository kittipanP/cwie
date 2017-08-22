<fieldset>

                <a href="../../ui_connect/student_management/Student_Management.php" class="w3-closebtn" title="Cancel and back to main page"><span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-mail-reply fa-stack-1x fa-inverse"></i>
                </span></a>
                <h2 class="fs-title">TRAINEE INFORMATION</h2>
                <div align="center">
                    
                </div>

                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>
                        <div align="left">
                        <label for=""> Trainee ID : </label>
                        </div>
                        <input type="hidden" name="trainee_id" value="<?php echo $row_tniSet['trainee_id']+1?>" size="32" placeholder="" /> 
                        <input type="text" name="trainee_code" value="<?php echo htmlentities($row_tniRec['trainee_code'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="RSMCB16_265" />
                        <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />

                        <input type="hidden" name="job_id" value="" size="32" placeholder="job_id" />

                        <div align="left">
                        <label for=""> WD ID : </label>
                        </div>
                        <input type="text" name="keycard_id" value="<?php echo htmlentities($row_tniRec['keycard_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="" />

                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                              
                        <div align="left">
                        <label for=""> WD e-mail account : </label>
                        </div>
                        <input type="hidden" name="trainee_acc_id" value="" size="32" placeholder="" />
                        <input type="hidden" name="account_name" value="" size="32" placeholder="" />
                        <input type="text" name="trainee_email" value="<?php echo htmlentities($row_tniRec['trainee_email'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="kittipan.prasertsang@wdc.com" />

                        <input type="hidden" name="trainee_account_id" value="<?php echo $row_tacSet['trainee_acc_id']+1?>" size="32" placeholder="" />

                        <div align="left">
                        <label for=""> Location : </label>
                        </div>

                         <select name="location_id" id="" style="width: 100%;">
                         <?php 
                         if($row_tniRec['location_id']==null){
                         ?>
                            <option value="">Select Location !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_locSet['location_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_locSet['location_name']?></option>
                          <?php
                          } while ($row_locSet = mysqli_fetch_assoc($locSet));
                            $rows = mysqli_num_rows($locSet);
                            if($rows > 0) {
                                mysqli_data_seek($locSet, 0);
                                $row_locSet = mysqli_fetch_assoc($locSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_tni_locRec['location_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_tni_locRec['location_name']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_locSet['location_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_locSet['location_name']?></option>
                                    <?php
                          } while ($row_locSet = mysqli_fetch_assoc($locSet));
                            $rows = mysqli_num_rows($locSet);
                            if($rows > 0) {
                                mysqli_data_seek($locSet, 0);
                                $row_locSet = mysqli_fetch_assoc($locSet);
                            }
                        }?>
                        </select>
                        
                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                              
                        <div align="left">
                        <label for=""> Plant : </label>
                        </div>

                         <select name="plant_id" id="" style="width: 100%;">
                         <?php 
                         if($row_tniRec['plant_id']==null){
                         ?>
                            <option value="">Select Plant !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_plaSet['plant_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_plaSet['plant_name']?></option>
                          <?php
                          } while ($row_plaSet = mysqli_fetch_assoc($plaSet));
                            $rows = mysqli_num_rows($plaSet);
                            if($rows > 0) {
                                mysqli_data_seek($plaSet, 0);
                                $row_plaSet = mysqli_fetch_assoc($plaSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_tni_plaRec['plant_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_tni_plaRec['plant_name']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_plaSet['plant_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_plaSet['plant_name']?></option>
                                    <?php
                          } while ($row_plaSet = mysqli_fetch_assoc($plaSet));
                            $rows = mysqli_num_rows($plaSet);
                            if($rows > 0) {
                                mysqli_data_seek($plaSet, 0);
                                $row_plaSet = mysqli_fetch_assoc($plaSet);
                            }
                        }?>
                        </select>

                        <div align="left">
                        <label for=""> Department : </label>
                        </div>
                         <select name="dep_id" id="" class="selectpicker" data-live-search="true" style="width: 100%;">
                         <?php 
                         if($row_tniRec['dep_id']==null){
                         ?>
                            <option value="">Select Department !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_depSet['dep_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_depSet['dep_name']?></option>
                          <?php
                          } while ($row_depSet = mysqli_fetch_assoc($depSet));
                            $rows = mysqli_num_rows($depSet);
                            if($rows > 0) {
                                mysqli_data_seek($depSet, 0);
                                $row_depSet = mysqli_fetch_assoc($depSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_tni_depRec['dep_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_tni_depRec['dep_name']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_depSet['dep_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_depSet['dep_name']?></option>
                                    <?php
                          } while ($row_depSet = mysqli_fetch_assoc($depSet));
                            $rows = mysqli_num_rows($depSet);
                            if($rows > 0) {
                                mysqli_data_seek($depSet, 0);
                                $row_depSet = mysqli_fetch_assoc($depSet);
                            }
                        }?>
                        </select>


                      <div align="right">
                      <a onclick="document.getElementById('dep-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Department</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" /></a></div>

                    </div>
                  </div>
                 
                </div>


<p>&nbsp;</p>


        <!-- third start -->
        <div class="w3-col l12">
            <div class="">




                <!-- Transportation Line -->
                <div class="w3-third">
                  <div class="">


                    <div class="w3-row-padding w3-center w3-margin-top">
                      <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Supervisor Information</p></div>

                        <select name="supervisor_info_spv_id" id="" class="selectpicker" data-live-search="true" style="width: 100%;">
                         <?php 
                         if($row_shsRec['supervisor_info_spv_id']==null){
                         ?>
                            <option value="">Select Supervisor !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_spvSet['spv_id'], ENT_COMPAT, 'utf-8'); ?>"><?php echo $row_spvSet['spv_fname'] ?>&nbsp;<?php echo $row_spvSet['spv_lname'] ?></option>
                          <?php
                          } while ($row_spvSet = mysqli_fetch_assoc($spvSet));
                            $rows = mysqli_num_rows($spvSet);
                            if($rows > 0) {
                                mysqli_data_seek($spvSet, 0);
                                $row_spvSet = mysqli_fetch_assoc($spvSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_shsRec['spv_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_shsRec['spv_fname']?>&nbsp;<?php echo $row_shsRec['spv_lname']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_spvSet['spv_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_spvSet['spv_fname']?>&nbsp;<?php echo $row_spvSet['spv_lname']?></option>
                                    <?php
                          } while ($row_spvSet = mysqli_fetch_assoc($spvSet));
                            $rows = mysqli_num_rows($spvSet);
                            if($rows > 0) {
                                mysqli_data_seek($spvSet, 0);
                                $row_spvSet = mysqli_fetch_assoc($spvSet);
                            }
                        }?>
                        </select> 


                      <div align="right">
                      <a onclick="document.getElementById('spv-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Supervisor</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" /></a></div>
                      
                    </div> 
                        


                    <div class="w3-row-padding w3-center w3-margin-top">
                      <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Transportation Line</p></div>
                      
                            <select name="transportation_id" id="" class="selectpicker" data-live-search="true" style="width: 100%;">
                             <?php 
                             if($row_tniRec['transportation_id']==null){
                             ?>
                                <option value="">Select Transportation Line !</option>
                              <?php
                              do {  
                              ?>
                                <option value="<?php echo htmlentities($row_tspSet['transportation_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_tspSet['transportation_line']?></option>
                              <?php
                              } while ($row_tspSet = mysqli_fetch_assoc($tspSet));
                                $rows = mysqli_num_rows($tspSet);
                                if($rows > 0) {
                                    mysqli_data_seek($tspSet, 0);
                                    $row_tspSet = mysqli_fetch_assoc($tspSet);
                                }
                             }else{?>
                                <option value="<?php echo htmlentities($row_tni_tspRec['transportation_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_tni_tspRec['transportation_line']?></option>
                              <?php
                              do {  
                              ?>
                                        <option value="<?php echo htmlentities($row_tspSet['transportation_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_tspSet['transportation_line']?></option>
                                        <?php
                              } while ($row_tspSet = mysqli_fetch_assoc($tspSet));
                                $rows = mysqli_num_rows($tspSet);
                                if($rows > 0) {
                                    mysqli_data_seek($tspSet, 0);
                                    $row_tspSet = mysqli_fetch_assoc($tspSet);
                                }
                            }?>
                            </select>


                      <div align="right">
                      <a onclick="document.getElementById('tsp-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Transportation Line</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" /></a></div>
                    </div> 
                        
                  </div>
                </div>

                <!-- Report Management-->
                <div class="w3-third">
                    <div class="" style="">
                    <div class="w3-row-padding w3-center w3-margin-top">
                       
                      <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Duration Information</p></div>

                        <div align="left">
                        <label for="">Starting Date : </label>
                        </div>
                        <input type="text" name="application_dateS" value="<?php echo htmlentities($row_appRec['application_dateS'], ENT_COMPAT, 'utf-8');?>" size="32" placeholder="" />

                        <div align="left">
                        <label for="">Ending Date : </label>
                        </div>
                        <input type="text" name="application_dateE" value="<?php echo htmlentities($row_appRec['application_dateE'], ENT_COMPAT, 'utf-8');?>" size="32" placeholder="" />

                    </div> 
                    </div>
                </div>

                <!-- Email Management-->
                <div class="w3-third">
                    <div class=""  style="">
                    <div class="w3-row-padding w3-center w3-margin-top">    

                      <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Co-op Project</p></div>
                        <div align="left">
                        <label for="">Project Name : </label>
                        </div>
                        <input type="hidden" name="project_id" value="" size="32" placeholder="" /> 
                        <input type="text" name="project_name" value="<?php echo htmlentities($row_thpRec['project_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="Smart CWIE Database Management System" />  
                    
                        <div align="left">
                        <label for="">Project Detail : </label>
                        </div>
                        <textarea name="project_detail" value="" size="32" placeholder=""><?php echo htmlentities($row_thpRec['project_detail'], ENT_COMPAT, 'utf-8'); ?></textarea>
                        <!--<input type="text" name="project_detail" value="<?php echo htmlentities($row_thpRec['project_detail'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="" /> -->
                  

                        <input type="hidden" name="thp_id" value="" size="32" placeholder="" />
                        <input type="hidden" name="project_id" value="<?php echo $row_prjSet['project_id']+1?>" size="32" placeholder="" />
                        <input type="hidden" name="trainee_id" value="<?php echo $row_tniSet['trainee_id']+1?>" size="32" placeholder="" />

                    </div>
                    </div>
                </div>

            </div>

        <!-- third end -->
        </div>

<p>&nbsp;</p>


<!--
                <div class="w3-row-padding w3-center w3-margin-top">
                  <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Duration Information</p></div>
                  <div class="w3-third">

                        <div align="left">
                        <label for=""></label>
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />

                        <div align="left">
                        <label for=""></label>
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />                           

                  </div>
                  <div class="w3-third">
                            
                  </div>          
                  <div class="w3-third">
                            
                  </div>
                </div>     
-->                
                <div class="w3-row-padding w3-center w3-margin-top">
                  <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Bank Account Information</p></div>
                  <div class="w3-third">

                        <div align="left">
                        <label for="">Account No : </label>
                        </div>
                        <input type="hidden" name="bac_id" value="" size="32" placeholder="" /> 
                        <input type="text" name="bac_no" value="<?php echo htmlentities($row_bacRec['bac_no'], ENT_COMPAT, 'utf-8');?>" size="32" placeholder="xxx-x84270-5" /> 
                        <div align="left">
                        <label for="">Account Name : </label>
                        </div>
                        <input type="text" name="bac_name" value="<?php echo htmlentities($row_bacRec['bac_name'], ENT_COMPAT, 'utf-8');?>" size="32" placeholder="กิตติพันธ์ ประเสริฐสังข์" />
                        <input type="hidden" name="trainee_id" value="<?php echo $row_tniSet['trainee_id']+1?>" size="32" placeholder="" /> 
                        <input type="hidden" name="bnk_has_id" value="<?php echo $row_bhbSet['bnk_has_bch_id']+1?>" size="32" placeholder="" />                       

                  </div>
                  <div class="w3-third">    
                        <div align="left">
                        <label for="">Bank Name : </label>
                        </div>
                        <input type="hidden" name="bnk_has_bch_id" value="<?php echo htmlentities($row_bacRec['bnk_has_bch_id'], ENT_COMPAT, 'utf-8');?>" size="32" placeholder="" />   
                        
                        <select name="bnk_id" id="" style="width: 100%;">
                         <?php 
                         if($row_bacRec['bnk_id']==null){
                         ?>
                            <option value="">Select Bank !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_bnkSet['bnk_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_bnkSet['bnk_name']?></option>
                          <?php
                          } while ($row_bnkSet = mysqli_fetch_assoc($bnkSet));
                            $rows = mysqli_num_rows($bnkSet);
                            if($rows > 0) {
                                mysqli_data_seek($bnkSet, 0);
                                $row_bnkSet = mysqli_fetch_assoc($bnkSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_bacRec['bnk_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_bacRec['bnk_name']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_bnkSet['bnk_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_bnkSet['bnk_name']?></option>
                                    <?php
                          } while ($row_bnkSet = mysqli_fetch_assoc($bnkSet));
                            $rows = mysqli_num_rows($bnkSet);
                            if($rows > 0) {
                                mysqli_data_seek($bnkSet, 0);
                                $row_bnkSet = mysqli_fetch_assoc($bnkSet);
                            }
                        }?>
                        </select>
                        <div align="left">
                        <label for=""> Branch : </label>
                        </div>
                        <select name="bch_id" id="" class="selectpicker" data-live-search="true" style="width: 100%;">
                         <?php 
                         if($row_bacRec['bch_id']==null){
                         ?>
                            <option value="">Select Banch !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_bchSet['bch_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_bchSet['bch_name']?></option>
                          <?php
                          } while ($row_bchSet = mysqli_fetch_assoc($bchSet));
                            $rows = mysqli_num_rows($bchSet);
                            if($rows > 0) {
                                mysqli_data_seek($bchSet, 0);
                                $row_bchSet = mysqli_fetch_assoc($bchSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_bacRec['bch_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_bacRec['bch_name']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_bchSet['bch_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_bchSet['bch_name']?></option>
                                    <?php
                          } while ($row_bchSet = mysqli_fetch_assoc($bchSet));
                            $rows = mysqli_num_rows($bchSet);
                            if($rows > 0) {
                                mysqli_data_seek($bchSet, 0);
                                $row_bchSet = mysqli_fetch_assoc($bchSet);
                            }
                        }?>
                        </select> 


                      <div align="right">
                      <a onclick="document.getElementById('bch-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Branch</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" /></a></div>
                  </div>          
                  <div class="w3-third"> 
                        <div align="left">
                        <label for=""> Provice : </label>
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" /> 
                            
                  </div>
                </div> 

                <div class="w3-row-padding w3-center w3-margin-top">
<!-- final presentation [S]                
                  <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Final Presentation Information</p></div>
                  <div class="w3-third">
                        <div align="left">
                        <label for="">Date : </label>
                        </div>
                        <input type="hidden" name="presentation_id" value="" size="32" />
                        <input type="text" name="presentation_date" value="" size="32" placeholder="xx-xx-xx" />
                        <div align="left">
                        <label for="">Time : </label>
                        </div>
                        <input type="text" name="presentation_stime" value="" size="32" placeholder="xx.xx.xx" /> 
                        <input type="text" name="presentation_ftime" value="" size="32" placeholder="xx.xx.xx" />  
                  </div>
                  <div class="w3-third">
                        <div align="left">
                        <label for="">Room : </label>
                        </div>
                        <select name="room_id" id="" style="width: 100%; " >
                            <option value="">Select presentation room</option>
                          <?php
                    do {  
                    ?>
                          <option value="<?php echo $row_rmSet['room_id']?>"><?php echo $row_rmSet['room_name']?></option>
                          <?php
                    } while ($row_rmSet = mysqli_fetch_assoc($rmSet));
                      $rows = mysqli_num_rows($rmSet);
                      if($rows > 0) {
                          mysqli_data_seek($rmSet, 0);
                          $row_rmSet = mysqli_fetch_assoc($rmSet);
                      }
                    ?>
                        </select>
                        <div align="left">
                        <label for="">Building : </label>
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="onChange" />     
                        <div align="left">
                        <label for="">Created Details : </label>
                        </div>
                        <input type="text" name="text" value="" size="32" placeholder="xx-xx-xx xx.xx.xx" />      
                  </div>          
                  <div class="w3-third">
                        <div align="left">
                        <label for="">Remark : </label>
                        </div>
                        <input type="text" name="remark" value="" size="32" placeholder="..." />     
                        <div align="left">
                        <label for="">Presentation Duration : </label>
                        </div>
                        <input type="text" name="presentation_duration" value="" size="32" placeholder="xx-xx-xx" />  
                    </div>
final presentation [E]-->                    
<!--                  
                    <div class="w3-col w3-container" style="width:45%">
                        <div align="left">
                        <label for="">Project Name : </label>
                        </div>
                        <input type="hidden" name="project_id" value="" size="32" placeholder="" /> 
                        <input type="text" name="project_name" value="<?php echo htmlentities($row_thpRec['project_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="Smart CWIE Database Management System" />  
                    </div>
                    <div class="w3-col w3-container" style="width:55%">
                        <div align="left">
                        <label for="">Project Detail : </label>
                        </div>
                        <textarea name="project_detail" value="" size="32" placeholder=""><?php echo htmlentities($row_thpRec['project_detail'], ENT_COMPAT, 'utf-8'); ?></textarea>
                       
                    </div>

                        <input type="hidden" name="thp_id" value="" size="32" placeholder="" />
                        <input type="hidden" name="project_id" value="<?php echo $row_prjSet['project_id']+1?>" size="32" placeholder="" />
                        <input type="hidden" name="trainee_id" value="<?php echo $row_tniSet['trainee_id']+1?>" size="32" placeholder="" />
 -->                 

                </div>
      
              </fieldset>

<!-- spv [S]
<fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Supervisor Information</h2>
                <div align="center">
                    
                </div>

                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>
                        
                        <div align="left">
                        <label for="">Name : </label>
                        </div>

                        <select name="supervisor_info_spv_id" id="" class="selectpicker" data-live-search="true" title="Please Select Supervisor !" style="width: 100%;">
                         <?php 
                         if($row_shsRec['supervisor_info_spv_id']==null){
                         ?>
                            <option value="">Select Supervisor !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_spvSet['spv_id'], ENT_COMPAT, 'utf-8'); ?>"><?php echo $row_spvSet['spv_fname'] ?>&nbsp;<?php echo $row_spvSet['spv_lname'] ?></option>
                          <?php
                          } while ($row_spvSet = mysqli_fetch_assoc($spvSet));
                            $rows = mysqli_num_rows($spvSet);
                            if($rows > 0) {
                                mysqli_data_seek($spvSet, 0);
                                $row_spvSet = mysqli_fetch_assoc($spvSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_shsRec['spv_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_shsRec['spv_fname']?>&nbsp;<?php echo $row_shsRec['spv_lname']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_spvSet['spv_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_spvSet['spv_fname']?>&nbsp;<?php echo $row_spvSet['spv_lname']?></option>
                                    <?php
                          } while ($row_spvSet = mysqli_fetch_assoc($spvSet));
                            $rows = mysqli_num_rows($spvSet);
                            if($rows > 0) {
                                mysqli_data_seek($spvSet, 0);
                                $row_spvSet = mysqli_fetch_assoc($spvSet);
                            }
                        }?>
                        </select> 

                     
                    </div>
                  </div>    
                  <div class="w3-third">
                    <div >
                                            
                        <div align="left">  
                       </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">      
                        <label for=""> Mobile : </label>                  
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">  
                        <label for=""> E-mail : </label>                      
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                                         
                        <div align="left">  
                        <label for=""> Section : </label>                   
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">      
                        <label for=""> Department : </label>                  
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                    </div>
                  </div>
                
                </div>
          
</fieldset>
spv [E]-->
<!--
<fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Supervisor Information</h2>
                <div align="center">
                    
                </div>

                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>
                        
                        <div align="left">
                        <label for=""> First Name : </label>
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                      <div align="left">  
                      <label for=""> Last Name : </label>
                      </div>
                      <input type="text" name="" value="" size="32" placeholder="" />
                      
                      <div align="left">
                      <label for=""> Position </label>
                      </div>
                      <input type="text" name="" value="" size="32" placeholder="" />
                     
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                                            
                        <div align="left">  
                        <label for=""> Office : </label>                   
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">      
                        <label for=""> Mobile : </label>                  
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">  
                        <label for=""> E-mail : </label>                      
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                                         
                        <div align="left">  
                        <label for=""> Section : </label>                   
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">      
                        <label for=""> Department : </label>                  
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                    </div>
                  </div>
                 
                </div>
          
</fieldset>
-->



<fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">WD Activity Information</h2>
                <div align="center">
                    
                </div>

                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>
                        
                        <div align="left">
                        <label for="">  Name : </label>
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                      <div align="left">  
                      <label for=""> Detail : </label>
                      </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                      
                      <div align="left">
                      <label for=""> </label>
                      </div>
                     
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                                            
                        <div align="left">  
                        <label for=""> Date : </label>                  
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">      
                        <label for=""> Time : </label>                  
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">  
                        <label for="">  </label>                      
                        </div>
                        
                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                                         
                        <div align="left">  
                        <label for=""> Room : </label>                   
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">      
                        <label for=""> Building : </label>                  
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">  
                        <label for=""> Plant : </label>                      
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />

                        <div align="left">  
                        <label for=""> Other Area : </label>                      
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />


                    </div>
                  </div>
                 
                </div>

                                      
</fieldset>

<fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">WD Cours Trainning Information</h2>
                <div align="center">
                    
                </div>

                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>
                        
                        <div align="left">
                        <label for="">  Name : </label>
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                      <div align="left">  
                      <label for=""> Detail : </label>
                      </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                      
                      <div align="left">
                      <label for=""> </label>
                      </div>
                     
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                                            
                        <div align="left">  
                        <label for=""> Date : </label>                  
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">      
                        <label for=""> Time : </label>                  
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">  
                        <label for="">  </label>                      
                        </div>
                        
                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                                         
                        <div align="left">  
                        <label for=""> Room : </label>                   
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">      
                        <label for=""> Building : </label>                  
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />
                        
                        <div align="left">  
                        <label for=""> Plant : </label>                      
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />

                        <div align="left">  
                        <label for=""> Other Area : </label>                      
                        </div>
                        <input type="text" name="" value="" size="32" placeholder="" />


                    </div>
                  </div>
                 
                </div>
                                   
</fieldset>

