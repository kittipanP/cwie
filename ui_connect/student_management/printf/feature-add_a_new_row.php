<!DOCTYPE html>
<html>
<title>Add New Row</title>
<body>

<div class="w3-container">
  <div class="w3-center">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    
  <h2>DATABASE ELEMENTS MANAGEMENT</h2>
  <p class="w3-center"><em>" Addding &nbsp; a &nbsp; new &nbsp; row &nbsp; to &nbsp; database , &nbsp; editting &nbsp; and &nbsp; deletting "</em></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

  <div class="w3-row">
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx1');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">xxx1</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx2');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">xxx2</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx3');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">xxx3</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx4');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">xxx4</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx5');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">xxx5</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx6');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">xxx6</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx7');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">xxx7</div>
    </a>
  </div>

  <div id="xxx1" class="w3-container city" style="display:none">
    <h2>xxx1</h2>
    <p>xxx1 is the capital city of England.</p>
    
                  <div align="right">
                      <a onclick="document.getElementById('spv-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add Suppervisor</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" />
                      </a>
                  </div> 
  </div>

  <div id="xxx2" class="w3-container city" style="display:none">
    <h2>xxx2</h2>
    <p>xxx2 is the capital of France.</p> 
  </div>

  <div id="xxx3" class="w3-container city" style="display:none">
    <h2>xxx3</h2>
    <p>xxx3 is the capital of Japan.</p>
  </div>
  <div id="xxx4" class="w3-container city" style="display:none">
    <h2>xxx4</h2>
    <p>xxx4 is the capital of Japan.</p>
  </div>
  <div id="xxx5" class="w3-container city" style="display:none">
    <h2>xxx5</h2>
    <p>xxx5 is the capital of Japan.</p>
  </div>
  <div id="xxx6" class="w3-container city" style="display:none">
    <h2>xxx6</h2>
    <p>xxx6 is the capital of Japan.</p>
  </div>
  <div id="xxx7" class="w3-container city" style="display:none">
    <h2>xxx7</h2>
    <p>xxx7 is the capital of Japan.</p>
  </div>
</div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}
</script>

</body>
</html>
