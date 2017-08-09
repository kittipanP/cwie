
<fieldset>
                <a href="../Student_Management.php" class="w3-closebtn" title="Cancel and back to main page"><span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-mail-reply fa-stack-1x fa-inverse"></i>
                </span></a>
                <h2 class="fs-title">Evaluation Score</h2>
                <div align="center">
                    
                </div>

                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>
                        
                        <div align="left">
                        <label for=""> Online English Test : </label>
                        </div>
                        <input type="text" name="eva_onlineTest" value="<?php echo htmlentities($row_evaRec['eva_onlineTest'], ENT_COMPAT, 'utf-8');?>" size="32" placeholder="" />
                        
                      <div align="left">  
                      <label for=""> Leonard : </label>
                      </div>
                        <!--<input type="text" name="eva_leonard" value="" size="32" placeholder="" /> -->
                        
                        <select name="eva_leonard" id="" style="width: 100%;">
                         <?php 
                         if($row_evaRec['eva_leonard']==null){
                         ?>
                            <option value="">Select Characterestic !</option>
                          <?php
                          do {  
                          ?>
                            <option value="<?php echo htmlentities($row_chaSet['ch_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_chaSet['ch_name']?></option>
                          <?php
                          } while ($row_chaSet = mysqli_fetch_assoc($chaSet));
                            $rows = mysqli_num_rows($chaSet);
                            if($rows > 0) {
                                mysqli_data_seek($chaSet, 0);
                                $row_chaSet = mysqli_fetch_assoc($chaSet);
                            }
                         }else{?>
                            <option value="<?php echo htmlentities($row_evaRec['ch_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_evaRec['ch_name']?></option>
                          <?php
                          do {  
                          ?>
                                    <option value="<?php echo htmlentities($row_chaSet['ch_id'], ENT_COMPAT, 'utf-8');?>"><?php echo $row_chaSet['ch_name']?></option>
                                    <?php
                          } while ($row_chaSet = mysqli_fetch_assoc($chaSet));
                            $rows = mysqli_num_rows($chaSet);
                            if($rows > 0) {
                                mysqli_data_seek($chaSet, 0);
                                $row_chaSet = mysqli_fetch_assoc($chaSet);
                            }
                        }?>
                        </select>  
                            
                        <div align="right">
                                  <a href="javascript:void(0);" class="add_button" title="Add field">Add more&nbsp;&nbsp;<i class="fa fa-plus-square "></i></a>
                        </div>
                      <div align="left">
                      <label for="">  </label>
                      </div>
                     
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                                            
                        <div align="left">  
                        <label for=""> Pre-English Test : </label>                   
                        </div>
                        <input type="text" name="eva_preTest" value="<?php echo htmlentities($row_evaRec['eva_preTest'], ENT_COMPAT, 'utf-8');?>" size="32" placeholder="" />
                        
                        <div align="left">      
                        <label for=""> Post-English Test : </label>                 
                        </div>
                        <input type="text" name="eva_postTest" value="<?php echo htmlentities($row_evaRec['eva_postTest'], ENT_COMPAT, 'utf-8');?>" size="32" placeholder="" />
                        
                        
                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                                         
                        <div align="left">  
                        <label for=""> Final Presentation Score : </label>                   
                        </div>
                        <input type="text" name="eva_finalPre_score" value="<?php echo htmlentities($row_evaRec['eva_finalPre_score'], ENT_COMPAT, 'utf-8');?>" size="32" placeholder="" />
                        
                        <div align="left">      
                        <label for=""> Final Presentation Comment : </label>                  
                        </div>
                        <textarea type="text" name="eva_finalPre_comment" value="" size="32"><?php echo htmlentities($row_evaRec['eva_finalPre_comment'], ENT_COMPAT, 'utf-8');?></textarea>



                        <input type="hidden" name="eva_id" value="" size="32" placeholder="" />
                        <input type="hidden" name="stu_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" placeholder="" />
                        
                        <div align="left">  
                        <label for="">  </label>                      
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
