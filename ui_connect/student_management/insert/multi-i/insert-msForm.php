<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="msform" enctype="multipart/form-data">
                    
              <!-- progressbar -->
              <ul id="progressbar">
                  <li class="active">Personal Detail</li>
                  <li>Education Data</li>
                  <li>Duration & File Upload</li>
              </ul>
                    
              <!-- fieldsets -->
              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Personal Detail</h2>
                <h3 class="fs-subtitle">Form Update Step One</h3>
                        
                <div class="w3-row-padding w3-center w3-margin-top">
 
                  <div class="w3-third">
                    <div>


                        <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />        
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
                      <input id="inputFirstname" class="" type="text" name="s_fname" value="" size="32" placeholder="KITTIPAN" required/>
                      <div align="left">
                        <label for="s_lname"> Last Name : </label>
                      </div>
                      <input id="inputLastname" type="text" name="s_lname" value="" size="32" placeholder="PRASERTSANG" required/>
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



                        <dev class="">
                            <del class=" w3-half">
                                <div align="left">
                                <label for="thai_lname">  Nick Name : </label>
                                </div>
                                <input type="text" name="s_nickname" value="" size="32" placeholder="Bon" />
                              
                            </dev>
                        </dev>


                        <dev class="w3-row-padding w3-center ">
                        <dev class="w3-half">
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
                        </dev>
                        </dev>


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
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">Other Information</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                            <p></p>
                            <div class="w3-row-padding w3-center w3-margin-top">
                            </div>
   


                        <div class="w3-row-padding w3-center w3-margin-top">
                                <div class="w3-panel w3-light-gray w3-center-align">
                                    <p>Emergency Cantact Data</p>
                                </div>
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
                                    <div>                    
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
                            <div class="w3-panel w3-gray w3-card-8 w3-center-align">
                                <p>Student Address</p>
                            </div>
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
                              <div class="w3-panel w3-gray w3-card-8 w3-center-align">
                                  <p>Relation Data</p>
                              </div>
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

                     






                      </dd>
                      <!--end accordion tab 1 -->

                      
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
				

                <!-- button for going next step-->
              	<input type="button" name="next" class="next action-button" value="Next" />
                                        
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

                            <p>&nbsp;</p>
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
                                        <label for=""> Duration : </label>                        
                                    </div> 
                                    <table>
                                        <tr>
                                            <td><input type="text" name="bg_durationS" value="" size="32" placeholder="trigger calendar" id="dtedbS"/></td>
                                            <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                            <td><input type="text" name="bg_durationE" value="" size="32" placeholder="trigger calendar" id="dtedbE" /></td>
                                        </tr>
                                    </table>
                                    
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
                                    <p>&nbsp;</p> 
                                </div>
                            </div>
                        </div>
                      </dd>


                      <dt>
                         
                            <a href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="accordion-title accordionTitle js-accordionTrigger">Experience and Other Skills</a>
                        </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion3" aria-hidden="true">
                        <div class="container-fluid" style="padding-top: 20px;">

                            <!-- third start -->
                            <div class="w3-col l12">
                                <div class="">

                                    <!-- I/III -->
                                    <div class="w3-third">
                                        <div class="">
                                            <div class="w3-row-padding w3-center w3-margin-top">
                                                  <div class="w3-panel w3-gray w3-card-8 w3-center-align">
                                                      <p> Work Experience</p>
                                                  </div>

                                                        <div align="left">
                                                            <label for=""> Duration : </label>
                                                        </div>
                                                        <input type="hidden" name="wex_id" value="" size="32" />
                                                        <input type="hidden" name="student_info_s_id" value="<?php echo $row_studentSet['s_id']+1 ?>" size="32" />
                                                        <table>
                                                            <tr>
                                                                <td><input type="text" name="wex_dateS" value="" size="32" id="dtwexS" placeholder="trigger calendar"/></td>
                                                                <td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                                                <td><input type="text" name="wex_dateE" value="" size="32" id="dtwexE" placeholder="trigger calendar"/></td>
                                                            </tr>
                                                        </table>




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
                                                   
                                                  <div class="w3-panel w3-gray w3-card-8 w3-center-align">
                                                      <p> Extracurricular Activity</p>
                                                  </div>

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

                                                  <div class="w3-panel w3-gray w3-card-8 w3-center-align">
                                                      <p>Personality</p>
                                                  </div>

                                                          <div align="left">
                                                          <label for="">Hobby: </label>
                                                          </div>
                                                          <textarea type="text" name="hobby_desc" value="" size="32"></textarea>
                                                          <input type="hidden" name="hobby_id" value="" size="32" />
                                                          <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />


                                                <div class="w3-panel w3-gray w3-card-8 w3-center-align">
                                                    <p>Language Skills</p>
                                                </div>
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
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Duration & Files Upload</h2>
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


<!-- Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] ###### Hidden[S] -->


<!-- From tab II [S] From tab II [S] From tab II [S] From tab II [S] From tab II [S] From tab II [S]-->
                        <!-- <input type="text" name="" value="" size="32" /> -->
                        <input type="hidden" name="trainee_id" value="<?php echo $row_tniSet['trainee_id']+1?>" size="32" placeholder="" />
                        <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />

                        <input type="hidden" name="job_id" value="" size="32" placeholder="job_id" />                      
                     
                              
                        <input type="hidden" name="trainee_acc_id" value="<?php echo $row_tacSet['trainee_acc_id']+1?>" size="32" placeholder="" />
                        <input type="hidden" name="account_name" value="" size="32" placeholder="" />
                        <input type="hidden" name="tac_acc_id" value="<?php echo $row_tacSet['trainee_acc_id']+1?>" size="32" placeholder="" />
                        

                        <input type="hidden" name="student_info_s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" placeholder="" />
   
                        <input type="hidden" name="project_id" value="" size="32" placeholder="" /> 
            
                        <input type="hidden" name="thp_id" value="" size="32" placeholder="" />
                        <input type="hidden" name="project_id" value="<?php echo $row_prjSet['project_id']+1?>" size="32" placeholder="" />
                        <input type="hidden" name="trainee_id" value="<?php echo $row_tniSet['trainee_id']+1?>" size="32" placeholder="" />

                        <input type="hidden" name="bac_id" value="" size="32" placeholder="" /> 
                        <input type="hidden" name="trainee_id" value="<?php echo $row_tniSet['trainee_id']+1?>" size="32" placeholder="" /> 
                        <input type="hidden" name="bnk_has_id" value="<?php echo $row_bhbSet['bnk_has_bch_id']+1?>" size="32" placeholder="" />                       


                        <input type="hidden" name="bnk_has_bch_id" value="" size="32" placeholder="" />


<!--                  <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Final Presentation Information</p></div>
                  <div class="w3-third">
                        <div align="left">
                        <label for="">Date : </label>
                        </div>
                        <input type="hidden" name="presentation_id" value="" size="32" />
                        <input type="text" name="presentation_date" value="<?php echo $row_preSet['presentation_date']?>" size="32" placeholder="xx-xx-xx" />
                        <div align="left">
                        <label for="">Time : </label>
                        </div>
                        <input type="text" name="presentation_stime" value="<?php echo $row_preSet['presentation_stime']?>" size="32" placeholder="xx.xx.xx" /> 
                        <input type="text" name="presentation_ftime" value="<?php echo $row_preSet['presentation_ftime']?>" size="32" placeholder="xx.xx.xx" />  
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
                        <input type="remark" name="remark" value="" size="32" placeholder="..." />     
                        <div align="left">
                        <label for="">Presentation Duration : </label>
                        </div>
                        <input type="text" name="presentation_duration" value="" size="32" placeholder="xx-xx-xx" />  
                    </div>
-->                  
                    
                        <input type="hidden" name="thp_id" value="" size="32" placeholder="" />
                        <input type="hidden" name="project_id" value="<?php echo $row_prjSet['project_id']+1?>" size="32" placeholder="" />
                        <input type="hidden" name="trainee_id" value="<?php echo $row_tniSet['trainee_id']+1?>" size="32" placeholder="" />
<!-- From tab II [E] From tab II [E] From tab II [E] From tab II [E] From tab II [E] From tab II [E]-->
                                            




<!-- From tab III [S] From tab III [S] From tab III [S] From tab III [S] From tab III [S] From tab III [S]-->
                        <input type="hidden" name="eva_id" value="" size="32" placeholder="" />
                        <input type="hidden" name="stu_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" placeholder="" />
<!-- From tab III [E] From tab III [E] From tab III [E] From tab III [E] From tab III [E] From tab III [E]-->
                                            


<!-- From tab IV [S] From tab IV [S] From tab IV [S] From tab IV [S] From tab IV [S] From tab IV [S]-->

<!-- From tab IV [E] From tab IV [E] From tab IV [E] From tab IV [E] From tab IV [E] From tab IV [E]-->
                                      





<!-- Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ######Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E] ###### Hidden[E]-->


                      
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                    <input type="submit" name="submit" class="action-button" value="Submit" />
                    <input type="hidden" name="MM_insert" class="submit action-button" value="msform" />
              </fieldset>
                    <input type="hidden" name="MM_insert" value="form1" />
                    

            </form>    



