<?php require_once('../../Connections/MyConnect.php'); ?>

<?php include 'editting/stu-update-full/student-editController.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<title>Student Updatting</title>
</head>
<link rel="stylesheet" href="../../libs/css/w3.css">
<link rel="stylesheet" href="../../libs/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='../../libs/css/css?family=Open+Sans'>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="../../libs/css/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
<link href="../../libs/css/font-awesome.min.css" rel="stylesheet">

<link rel="icon" type="image/png" href="../../img/images/wd.png"/>

      <!-- For Multi Form -->
      <link rel="stylesheet" href="insert/style-msform.css?v=0214i" type="text/css">

      <!-- According-Form-->
      <!--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>-->
      <link rel="stylesheet" href="../../libs/css/style-according.css?v=0228i" type="text/css">

<style> 
  html {
  background : #C0C0C0;
    
  }  
</style>

<body>


<form action="<?php echo $editFormAction; ?>" method="post" name="form-update" id="msform" enctype="multipart/form-data">
                    
              <!-- progressbar -->
              <ul id="progressbar">
                  <li class="active">Personal Detail</li>
                  <li>Education Data</li>
                  <li>Other Information</li>
                  <li>File Upload</li>
              </ul>
                    
              <!-- fieldsets -->
              <fieldset>
                <span onclick="document.getElementById('stu-edit').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Personal Detail</h2>
                <h3 class="fs-subtitle">This is step 1</h3>
                        
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
                <!-- Accordion [S] ## Accordion [S] ## Accordion [S] ## Accordion [S]-->             
              <!--<input type="hidden" name="MM_insert" value="form3" />-->         
                  <div class="accordion">
                    <dl>
                      <!-- description list -->

                      <dt>
                            <!-- accordion tab 1 -->
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">Address and Contact Data</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
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
                                <input type="text" name="no" value="<?php echo htmlentities($row_Recordset1_sad['no'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="Relationship"/>
                                <div align="left">  
                                <label for="sub_district"> Sub-district : </label>                 
                                </div> 
                                <input type="text" name="sub_district" value="<?php echo htmlentities($row_Recordset1_sad['sub_district'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="Relationship"/>
                                <div align="left">
                                <label for="province_name"> Province : </label> 
                                </div>
                                <input type="text" name="province_name" value="<?php echo htmlentities($row_Recordset1_sad['province_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" placeholder="Relationship"/>     
                                                                                           
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
                        








                      </dd>
                      <!--end accordion tab 1 -->

                      <dt>
                          <!-- accordion tab 2 -->
                            <a href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="accordion-title accordionTitle js-accordionTrigger">Student's Relation Data</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion2" aria-hidden="true">
                        
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
                      </dd>
                      <!-- end accordion tab 2 -->

                      <!--<dt>
                         
                            <a href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="accordion-title accordionTitle js-accordionTrigger">Accordion tab 3</a>
                        </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion3" aria-hidden="true">
                        <div class="container-fluid" style="padding-top: 20px;">
                            <p class="headings">@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@</p>
                        </div>
                      </dd>-->
                     

                    </dl>
                   
                  </div>
                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->        
        


                <input type="button" name="next" class="next action-button" value="Next" />
                        
                        
              </fieldset>

              <fieldset>
                <span onclick="document.getElementById('stu-edit').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
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
                                <?php if($row_Recordset1_edu['degree_id']==null){?>
                                <select name="degree_id" style="width: 100%;">
                                    <option  name="degree_id" value="">Plese Select Your Country!</option>
                                  <?php do {  ?>
                                    <option  name="degree_id" value="<?php echo htmlentities($row_degree_infoSet['degree_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_degree_infoSet['degree_name']?></option>
                                    <?php
                                        } while ($row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet));
                                          $rows = mysqli_num_rows($degree_infoSet);
                                          if($rows > 0) {
                                          mysqli_data_seek($degree_infoSet, 0);
                                          $row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet);
                                          }
                                    ?>
                                </select> 
                                <?php }else{ ?>
                                <select name="degree_id" style="width: 100%;">
                                    <option  name="degree_id" value="<?php echo htmlentities($row_degree_info_rec['degree_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_degree_info_rec['degree_name']?></option>
                                  <?php do {  ?>
                                    <option  name="degree_id" value="<?php echo htmlentities($row_degree_infoSet['degree_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_degree_infoSet['degree_name']?></option>
                                    <?php
                                        } while ($row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet));
                                          $rows = mysqli_num_rows($degree_infoSet);
                                          if($rows > 0) {
                                          mysqli_data_seek($degree_infoSet, 0);
                                          $row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet);
                                          }
                                    ?>
                                </select> 
                                <?php }; ?>
                         <!--<input type="text" name="degree_id" value="" size="32" />-->
                         
                        <div align="left">
                        <label for="major_id"> Major : </label>
                        </div>
                                <?php if($row_Recordset1_edu['major_id']==null){?>
                                <select name="major_id" style="width: 100%;">
                                    <option  name="major_id" value="">Plese Select Your Country!</option>
                                  <?php do {  ?>
                                    <option  name="major_id" value="<?php echo htmlentities($row_majorSet['major_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_majorSet['major_name']?></option>
                                    <?php
                                        } while ($row_majorSet = mysqli_fetch_assoc($majorSet));
                                          $rows = mysqli_num_rows($majorSet);
                                          if($rows > 0) {
                                          mysqli_data_seek($majorSet, 0);
                                          $row_majorSet = mysqli_fetch_assoc($majorSet);
                                          }
                                    ?>
                                </select> 
                                <?php }else{ ?>
                                <select name="major_id" style="width: 100%;">
                                    <option  name="major_id" value="<?php echo htmlentities($row_major_rec['major_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_major_rec['major_name']?></option>
                                  <?php do {  ?>
                                    <option  name="major_id" value="<?php echo htmlentities($row_majorSet['major_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_majorSet['major_name']?></option>
                                    <?php
                                        } while ($row_majorSet = mysqli_fetch_assoc($majorSet));
                                          $rows = mysqli_num_rows($majorSet);
                                          if($rows > 0) {
                                          mysqli_data_seek($majorSet, 0);
                                          $row_majorSet = mysqli_fetch_assoc($majorSet);
                                          }
                                    ?>
                                </select> 
                                <?php }; ?>

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
                        <label for="intitute_id"> Institute : </label>                      
                        </div>
                        <?php if($row_Recordset1_edu['intitute_id']==null){?>
                          <select name="intitute_id" id="insSelect" onChange="(getUniversity(this.value) , getUniversityii(this.value))" style="width: 100%; " >
                              <option value="">Select Institute Type</option>
                              <?php
                              do {  
                              ?>
                              <option value="<?php echo $row_instituteSet['intitute_id']?>"><?php echo $row_instituteSet['intitute_name']?></option>
                              <?php
                              } while ($row_instituteSet = mysqli_fetch_assoc($instituteSet));
                              $rows = mysqli_num_rows($instituteSet);
                              if($rows > 0) {
                                mysqli_data_seek($instituteSet, 0);
                              $row_instituteSet = mysqli_fetch_assoc($instituteSet);
                              }
                              ?>
                          </select>
                        <?php }else{ ?>
                                <select name="intitute_id" id="insSelect" onChange="(getUniversity(this.value) , getUniversityii(this.value))" style="width: 100%; ">
                                    <option  name="intitute_id" value="<?php echo htmlentities($row_institute_rec['intitute_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_institute_rec['intitute_name']?></option>
                                  <?php do {  ?>
                                    <option  name="intitute_id" value="<?php echo htmlentities($row_instituteSet['intitute_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_instituteSet['intitute_name']?></option>
                                    <?php
                                        } while ($row_instituteSet = mysqli_fetch_assoc($instituteSet));
                                          $rows = mysqli_num_rows($instituteSet);
                                          if($rows > 0) {
                                          mysqli_data_seek($instituteSet, 0);
                                          $row_instituteSet = mysqli_fetch_assoc($instituteSet);
                                          }
                                    ?>
                                </select> 
                        <?php } ?>
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
                        <label for="uni_id, collage_id"> University : </label>                    
                        </div>
                        <?php 
                        if($row_Recordset1_edu['intitute_id']==null){?>
                          <select name="uni_id" id="uniSelect" style="width: 100%;" >     
                            <option value="">Select Institute Type First</option>
                          </select>
                        <?php 
                        }else{?>
                          <select name="uni_id" id="uniSelect" style="width: 100%;" >     
                            <?php 
                            if($row_uni_rec['uni_id']!=null){?>
                              <option value="<?php echo htmlentities($row_uni_rec['uni_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_uni_rec['uni_name']?></option>
                              <?php
                                do {  ?>
                                  <option value="<?php echo htmlentities($row_universitySet['uni_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_universitySet['uni_name']?></option>
                                <?php
                                } while ($row_universitySet = mysqli_fetch_assoc($universitySet));
                                $rows = mysqli_num_rows($universitySet);
                                if($rows > 0) {
                                  mysqli_data_seek($universitySet, 0);
                                  $row_universitySet = mysqli_fetch_assoc($universitySet);
                                }?>
                            <?php 
                            }else{?>
                              <option value="<?php echo htmlentities($row_col_rec['collage_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_col_rec['collage_name']?></option>
                              <?php
                                do {  ?>
                                  <option value="<?php echo htmlentities($row_collageSet['collage_id'], ENT_COMPAT, 'utf-8')?>"><?php echo $row_collageSet['collage_name']?></option>
                                <?php
                                } while ($row_collageSet = mysqli_fetch_assoc($collageSet));
                                $rows = mysqli_num_rows($collageSet);
                                if($rows > 0) {
                                  mysqli_data_seek($collageSet, 0);
                                  $row_collageSet = mysqli_fetch_assoc($collageSet);
                                }?>

                            <?php
                            } ?>

                          </select> 
                        <?php }?>


                        <!--<input type="text" name="uni_id" value="" size="32" />-->
                        
                        <!-- <div align="left">  
                        <label for="collage_id"> Collage : </label>
                        </div>
                        <select name="collage_id" id="collageSelect" style="width: 100%;">
                          <option value="">Select Institute Type First</option>
                        </select> -->

                        <p id='eiei'></p>
                        <!--<input type="text" name="collage_id" value="" size="32" />-->
                        
                    </div>
                  </div>
                 
                </div>              
                                     
                             <!-- Used some part of the code from Chris Wright (http://codepen.io/chriswrightdesign/)'s Pen  -->
                             
                  <!-- Accordion [S] ## Accordion [S] ## Accordion [S] ## Accordion [S]-->
          <!--<input type="hidden" name="MM_insert" value="form3" />-->         
                  <div class="accordion">
                    <dl>
                      <!-- description list -->

                      <dt>
                            <!-- accordion tab 1 -->
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger"> Educational Background</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
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
                                <td><input type="text" name="bg_durationS" value="" size="32" /></td>
                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="text" name="bg_durationE" value="" size="32" /></td></tr></table>
                                
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >                 
                                <div align="left">
                                <label for="bg_degree"> Degree : </label>                       
                                </div> 
                                <input type="text" name="bg_degree" value="" size="32" placeholder="Senior High School"/>
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
                        
                        
                            
                      </dd>
                      <!--end accordion tab 1 -->
                      
                    </dl>
                    <!-- end description list -->
                  </div>
                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->

<!--test
                            <input type="text" name="email" placeholder="First Name" />
                             <input type="text" name="email" placeholder="Last Name" />
                             <input type="text" name="email" placeholder="Email" />
                             
test-->
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
              </fieldset>

              <fieldset>
                <span onclick="document.getElementById('stu-edit').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Other Information</h2>
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
                            
                             <!-- Used some part of the code from Chris Wright (http://codepen.io/chriswrightdesign/)'s Pen  -->
                  <!-- Accordion [S] ## Accordion [S] ## Accordion [S] ## Accordion [S]-->                             
                  <div class="accordion">
                    <dl>
                      <!-- description list -->

                      <dt>
                            <!-- accordion tab 1 -->
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">Work Experience</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                            <p></p>
                            <div class="field_wrapper w3-row-padding w3-center w3-margin-top">
                          <div class="w3-row">
                            <div class="w3-col s3 w3-container">      
                               <input type="text" name="wex_id" value="" size="32" />
                                <input type="text" name="student_info_s_id" value="<?php echo $row_studentSet['s_id']+1 ?>" size="32" />
                                <div align="left">
                                <label for=""> Duration : </label>
                                </div>
                                <table><tr>
                                <td><input type="text" name="wex_dateS" value="" size="32" id="dtwexS" placeholder="trigger calendar"/></td>
                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="text" name="wex_dateE" value="" size="32" id="dtwexE" placeholder="trigger calendar"/></td></tr></table>
                            </div>
                            <div class="w3-col s9 w3-container">                  
                      
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


                          
                          <!--<div class="w3-row">
                            <div class="w3-col s9">                 
                      
                                <div align="left">
                                <label for=""> Organization/Company : </label>                      
                                </div> 
                                <input type="text" name="wex_organ" value="" size="32" /> 
                                
                                
                                
                            </div>
                          </div>  -->        
                          <!--<div class="w3-third">
                            <div >                                                
                                <div align="left">  
                                <label for=""> Detail of Duty/Position : </label>                    
                                </div> 
                                <table><tr> 
                                <td><input type="text" name="wex_detail" value="" size="32" /></td>
                                <td ><a ><i class="fa fa-plus-square fa-4x"></i></a></td> 
                                  <a class="btn btn-danger" href="#" ><i class="fa fa-plus-square fa-3x"></i>Pluss</a></td>
                                <td></td>   
                                </tr></table>    
                            </div>
                          </div>-->
                        </div>
                      </dd>
                      <!--end accordion tab 1 -->

                      <dt>
                          <!-- accordion tab 2 -->
                            <a href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="accordion-title accordionTitle js-accordionTrigger">Accordion tab 2</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion2" aria-hidden="true">
                        <div class="container-fluid" style="padding-top: 20px;">
                            <p class="headings">**************************************************************************</p>    
                        </div>
                      </dd>
                      <!-- end accordion tab 2 -->

                      <dt>
                          <!-- accordion tab 3 - Payment Info -->
                            <a href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="accordion-title accordionTitle js-accordionTrigger">Accordion tab 3</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion3" aria-hidden="true">
                        <div class="container-fluid" style="padding-top: 20px;">
                            <p class="headings">@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@</p>
                        </div>
                      </dd>
                      <!-- end accordion tab 3 -->

                    </dl>
                    <!-- end description list -->
                  </div>
                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->

<!--test
                            <input type="text" name="email" placeholder="First Name" />
                             <input type="text" name="email" placeholder="Last Name" />
                             <input type="text" name="email" placeholder="Email" />
                             
test-->
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
              </fieldset>
              
              
              <fieldset>
                <span onclick="document.getElementById('stu-edit').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Eiei</h2>
                <div align="center">
                    <h3 class="fs-subtitle" >
                        <table>
                            <tr>
                                <td><div id="firstnameDIVTagiv" ></div></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><div id="lastnameDIVTagiv" ></div></td>
                            </tr>
                        </table>
                    
                    </h3>
                </div>
                 <div class="w3-row-padding w3-center w3-margin-top">
                  <div class="w3-col s6" >
                    
                     <div clall="w3-col">
                      <div class="w3-panel w3-light-grey" id="demo">         
                       <table style="width: 100%;">   
                        <p>&nbsp;</p>
                        <tr>
                         <td><input type="hidden" name="application_id" value="" size="32" />
                           <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1 ?>" size="32" /></td>
                         <td><input type="hidden" name="application_name" value="" size="32" id="outputFullnameii" readonly/></td>
                        </tr>
                        <tr>
                         <td nowrap="nowrap" align="left">Starting Date </td>
                         <td><input name="application_dateS" type="text"  placeholder="trigger calendar" id="dtwdS"/></td>
                        </tr>
                       <tr>
                        <td nowrap="nowrap" align="left">Ending Date </td>
                        <td><input type="text" name="application_dateE" value="" size="32" id="dtwdE" placeholder="trigger calendar"/></td>
                       </tr>
                       <tr>
                        <td><p>&nbsp;</p></td>
                       </tr>  
                      </table>                                           
                    </div>
                   </div>
                   
                   <div class="w3-col">
                    <div class="w3-panel w3-light-grey">  
                       <table style="width: 100%;">  
                       <p>&nbsp;</p>     
                        <tr valign="baseline">
                          <td><input type="hidden" name="other_name" value="" size="32" id="outputFullnamevii" readonly /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Other Documents</td>
                          <td><input type="file" name="other_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                      </table>   
                    </div>
                   </div>          
                   
               </div>

               <div class="w3-col s6">
                    <div class="w3-panel w3-light-grey">                              
                       <table style="width: 100%;">
                       <p>&nbsp;</p>
                        <tr valign="baseline">
                          <td><input type="hidden" name="resume_name" value="" size="32" id="outputFullnameiv" readonly /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Resume</td>
                          <td><input type="file" name="resume_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                        

                        <tr valign="baseline">
                          <td><input type="hidden" name="video_name" value="" size="32" id="outputFullnameiii" readonly /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Video</td>
                          <td><input type="file" name="video_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
              
                        <tr valign="baseline">
                          <td><input type="hidden" name="transcript_name" value="" size="32" id="outputFullnamev" readonly /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Transcript : </td>
                          <td><input type="file" name="transcript_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                        
                        <tr valign="baseline">
                          <td><input type="hidden" name="visa_name" value="" size="32" id="outputFullnamevi" readonly /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Visa : </td>
                          <td><input type="file" name="visa_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                       </table>  
                    </div>
               </div> 
                              
              </div>              
                    
                    
                           
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                    <input type="submit" name="submit" class="action-button" value="Update record!!" />
                    <input type="hidden" name="MM_update" class="submit action-button" value="msform" />
              </fieldset>
                    <input type="hidden" name="MM_update" value="form-update" />
                    <input type="hidden" name="scd_s_id" value="<?php echo $row_Recordset1_scd['scd_s_id'];?>" /> <!--do not need-->
                    <input type="hidden" name="s_id" value="<?php echo $row_Recordset1_stu['s_id'];?>" />
                    
                    

            </form> 
<?php include "get_university.php";?>




            <?php 
              $thisMoota = $thisstu;
              echo "<meta http-equiv='refresh' content='url=get_university.php?this-stu=".$thisMoota."' />";
            ?>
  
<p>&nbsp;</p>

    <!-- for muti step form -->
    <script src='../../libs/js/jquery.min.js'></script>
    <script src='../../libs/js/jquery.easing.min.js'></script>
    
    <script src="../../libs/js/index.js"></script>

  <!--for According-->
  <!--<script src="../../libs/js/According.js"></script> -->


  <!-- for Institute University and Collage -->
  <script>  

  function getUniversity(val, $thisstu) {
      
      $.ajax({
      type: "POST",
      url: "",
      data:'ins_id='+val,
      
      success: function(data){
        $("#uniSelect").html(data);
      }
      }); 
    }
  function getUniversityii(val) {
      
      $.ajax({
      type: "POST",
      url: "/editting/get_collage.php",
      data:'ins_id='+val,
      success: function(data){
        $("#collageSelect").html(data);
      }
      });
  }  
  function selectCountry(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide(); 
    }


  </script>
  

</body>
</html>
<?php
mysqli_free_result($Recordset1_stu);

?>
