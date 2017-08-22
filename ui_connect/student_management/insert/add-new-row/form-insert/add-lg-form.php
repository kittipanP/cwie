
    <form action="<?php echo $editFormAction; ?>" method="post" name="lgForm" id="addform" enctype="multipart/form-data">


        <input type="hidden" name="lg_id" value="" size="32" />

        <input type="text" name="lg_name" value="" placeholder="English" size="32" required/>


  <p>&nbsp;</p>

        <input type="submit" name="submit" class="action-button" value="Submit" />
        <button onclick="document.getElementById('lg-add').style.display='none'" type="button" class="action-button w3-red" >Cancel</button>
        <input type="hidden" name="MM_insert" class="submit action-button" value="addform" />
        <input type="hidden" name="MM_insert" value="lgForm" />

    </form>