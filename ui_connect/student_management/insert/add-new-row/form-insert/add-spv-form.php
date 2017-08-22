
    <form action="<?php echo $editFormAction; ?>" method="post" name="spvForm" id="addform" enctype="multipart/form-data">


        <div align="left">
            <label for="">  First Name : </label> 
       	</div>
        <input type="text" name="spv_fname" value="" placeholder="Enter First Name" size="32" required/>

        <div align="left">
            <label for="">  Last Name : </label> 
       	</div>
        <input type="text" name="spv_lname" value="" placeholder="Enter Last Name" size="32" required/>

        <div align="left">
            <label for="">  Position : </label> 
       	</div>
        <input type="text" name="spv_job" value="" placeholder="Enter Position" size="32" required/>

        <div align="left">
            <label for="">  Extension (Ext.) : </label> 
       	</div>
        <input type="text" name="spv_ext" value="" placeholder="Enter Ext." size="32" required/>

        <div align="left">
            <label for="">  Mobile No. : </label> 
       	</div>
        <input type="text" name="spv_mobile" value="" placeholder="Enter Mobile No." size="32" required/>

        <div align="left">
            <label for="">  E-mail : </label> 
       	</div>
        <input type="text" name="spv_email" value="" placeholder="Enter E-mail" size="32" required/>

        <div align="left">
            <label for="">  Department : </label> 
       	</div>
        <!-- <input type="text" name="spv_dept" value="" placeholder="" size="32" required/> -->
    	<select name="spv_dept" class="selectpicker" data-live-search="true" title="Please Select Building !" style="width: 100%;" required>
            <?php do {  ?>
                <option  name="spv_dept" value="<?php echo $row_depSet['dep_id']?>"><?php echo $row_depSet['dep_name']?></option>
                <?php
                } while ($row_depSet = mysqli_fetch_assoc($depSet));
                $rows = mysqli_num_rows($depSet);
                    if($rows > 0) {
                    mysqli_data_seek($depSet, 0);
                    $row_depSet = mysqli_fetch_assoc($depSet);
                    }
                ?>
        </select>

        <div align="left">
            <label for="">  Building : </label> 
       	</div>
        <!-- <input type="text" name="spv_bdg" value="" placeholder="" size="32" required/> -->
    	<select name="spv_bdg" class="selectpicker" data-live-search="true" title="Please Select Building !" style="width: 100%;" required>
            <?php do {  ?>
                <option  name="bldg_id" value="<?php echo $row_bldSet['bldg_id']?>"><?php echo $row_bldSet['bldg_name']?></option>
                <?php
                } while ($row_bldSet = mysqli_fetch_assoc($bldSet));
                $rows = mysqli_num_rows($bldSet);
                    if($rows > 0) {
                    mysqli_data_seek($bldSet, 0);
                    $row_bldSet = mysqli_fetch_assoc($bldSet);
                    }
                ?>
        </select>

  <p>&nbsp;</p>

        <input type="submit" name="submit" class="action-button" value="Submit" />
        <button onclick="document.getElementById('spv-add').style.display='none'" type="button" class="action-button w3-red" >Cancel</button>
        <input type="hidden" name="MM_insert" class="submit action-button" value="addform" />
        <input type="hidden" name="MM_insert" value="spvForm" />

    </form>