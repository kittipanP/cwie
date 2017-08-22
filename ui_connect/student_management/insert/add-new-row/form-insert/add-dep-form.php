
    <form action="<?php echo $editFormAction; ?>" method="post" name="depForm" id="addform" enctype="multipart/form-data">


      	
        <input type="hidden" name="dep_id" value="" size="32" />

        <div align="left">
            <label for="">  Department Name : </label> 
       	</div>
        <input type="text" name="dep_name" value="" placeholder="Talent Acquisition" size="32" required/>
      
        <div align="left">
            <label for="">  Cost Centre : </label> 
       	</div>
        <input type="text" name="cost_centre" value="" placeholder="xxxx" size="32" required/>

        <div align="left">
            <label for="">  Extension (Ext.) : </label> 
        </div>
        <input type="text" name="dep_ext" value="" placeholder="77602" size="32" required/>	

        <div align="left">
            <label for="">  Building : </label> 
       	</div>
        <!--<input type="text" name="bldg_id" value="" placeholder="" size="32" />-->
      
    <select name="bldg_id" class="selectpicker" data-live-search="true" title="Please Select Building !" style="width: 100%;" required>
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
        <button onclick="document.getElementById('dep-add').style.display='none'" type="button" class="action-button w3-red" >Cancel</button>
        <input type="hidden" name="MM_insert" class="submit action-button" value="addform" />
        <input type="hidden" name="MM_insert" value="depForm" />

    </form>