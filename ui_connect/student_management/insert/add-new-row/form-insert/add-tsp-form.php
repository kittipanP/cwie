
    <form action="<?php echo $editFormAction; ?>" method="post" name="tspForm" id="addform" enctype="multipart/form-data">



        <input type="text" name="transportation_line" value="" placeholder="Enter New Transportation Line" size="32" />

  <p>&nbsp;</p>


        <input type="submit" name="submit" class="action-button" value="Submit" />
        <button onclick="document.getElementById('tsp-add').style.display='none'" type="button" class="action-button w3-red" >Cancel</button>
        <input type="hidden" name="MM_insert" class="submit action-button" value="addform" />
        <input type="hidden" name="MM_insert" value="tspForm" />

    </form>