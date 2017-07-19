
              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Files Uplode</h2>
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
                 	<div class="w3-col s6" >
                    
                     <!--<div clall="w3-col">
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
                   </div> -->
                   
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
                              
              </div>          	  
                    
                    
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>                   
              </fieldset>
                    