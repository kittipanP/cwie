
    <form action="<?php echo $editFormAction; ?>" method="post" name="insForm" id="addform" enctype="multipart/form-data">


      	
        <input type="hidden" name="ins_id" value="" size="32" />

        <div align="left">
            <label for="">  Institute Name : </label> 
       	</div>
        <input type="text" name="ins_name" value="" placeholder="" size="32" required/>
      

        <div align="left">
            <label for="">  Institute Type : </label> 
       	</div>
        <!-- <input type="text" name="ins_type" value="" placeholder="" size="32" /> -->

		<select name="ins_type" class="selectpicker" data-live-search="true" title="Please Select Type !" style="width: 100%;" required>
            <?php do {  ?>
                <option  name="ins_type" value="<?php echo $row_itpSet['itp_id']?>"><?php echo $row_itpSet['itp_name']?></option>
                <?php
                } while ($row_itpSet = mysqli_fetch_assoc($itpSet));
                $rows = mysqli_num_rows($itpSet);
                    if($rows > 0) {
                    mysqli_data_seek($itpSet, 0);
                    $row_itpSet = mysqli_fetch_assoc($itpSet);
                    }
                ?>
        </select>
      
        <div align="left">
            <label for="">  Country : </label> 
       	</div>
        <!-- <input type="text" name="ins_country" value="" placeholder="" size="32" /> -->
      
		<select name="ins_country" class="selectpicker" data-live-search="true" title="Please Select Major !" style="width: 100%;" required>
            <?php do {  ?>
                <option  name="ins_country" value="<?php echo $row_countrySet['country_id']?>"><?php echo $row_countrySet['country_name']?></option>
                <?php
                } while ($row_countrySet = mysqli_fetch_assoc($countrySet));
                $rows = mysqli_num_rows($countrySet);
                    if($rows > 0) {
                    mysqli_data_seek($countrySet, 0);
                    $row_countrySet = mysqli_fetch_assoc($countrySet);
                    }
                ?>
        </select>
  
  <p>&nbsp;</p>


        <input type="submit" name="submit" class="action-button" value="Submit" />
        <button onclick="document.getElementById('ins-add').style.display='none'" type="button" class="action-button w3-red" >Cancel</button>
        <input type="hidden" name="MM_insert" class="submit action-button" value="addform" />
        <input type="hidden" name="MM_insert" value="insForm" />

    </form>