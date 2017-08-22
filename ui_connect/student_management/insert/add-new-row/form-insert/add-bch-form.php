
    <form action="<?php echo $editFormAction; ?>" method="post" name="bchForm" id="addform" enctype="multipart/form-data">



        <input type="text" name="bch_name" value="" placeholder="Enter New Branch" size="32" required />


    	<select name="province_id" class="selectpicker" data-live-search="true" title="Please Select Province !" style="width: 100%;" required>
            <?php do {  ?>
                <option  name="province_id" value="<?php echo $row_pvnSet['province_id']?>"><?php echo $row_pvnSet['province_name']?></option>
                <?php
                } while ($row_pvnSet = mysqli_fetch_assoc($pvnSet));
                $rows = mysqli_num_rows($pvnSet);
                    if($rows > 0) {
                    mysqli_data_seek($pvnSet, 0);
                    $row_pvnSet = mysqli_fetch_assoc($pvnSet);
                    }
                ?>
        </select>

        <input type="submit" name="submit" class="action-button" value="Submit" />
        <button onclick="document.getElementById('bch-add').style.display='none'" type="button" class="action-button w3-red" >Cancel</button>
        <input type="hidden" name="MM_insert" class="submit action-button" value="addform" />
        <input type="hidden" name="MM_insert" value="bchForm" />

    </form>