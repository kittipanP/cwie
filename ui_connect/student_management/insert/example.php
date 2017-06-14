
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



<title>Untitled Document</title>

<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>

<body>

	<div>
<!--  <input type="text" id="s_fname" required placeholder="eieieiei"  />
  <br>
  <br>
  <input type="password" id="s_lname" required placeholder="eieieiei"  />-->
  <br>
  <br>
  <button  onclick="sweet();">EiEiEi</button>
	</div>



<a onclick="sweet();" href="http://google.com">Visit Google!</a>
<br>
  <a href="http://ludu.co">Visit Ludu!</a>
  
  
	  <script>
      $('a').click(function(e) {
        e.preventDefault(); // Prevent the href from redirecting directly
        var linkURL = $(this).attr("href");
        warnBeforeRedirect(linkURL);
      });
    
      function warnBeforeRedirect(linkURL) {
        swal({
          title: "Leave this site?", 
          text: "If you click 'OK', you will be redirected to " + linkURL, 
          type: "warning",
          showCancelButton: true
        }, function() {
          // Redirect the user
          window.location.href = linkURL;
        });
      }
      </script>





<!--<script type="text/javascript" src="../../../libs/sweetalert2/sweetalert.min.js"></script>-->
<script type="text/javascript">
	function sweet(){
swal("Good job!", "You clicked the button!", "success")
	
		}
</script>

<script type="text/javascript">
	function webb(){
        swal({
          title: "Leave this site?", 
          text: "If you click 'OK', you will be redirected to ", 
          type: "warning",
          showCancelButton: true
        })
	
		}
</script>

	<!--
	/*	var s_fname =  'aaa';
		var s_lname = '123';
		
		var s_fname =  document.getElementById('s_fname').value;
		var s_lname = document.getElementById('s_lname').value;*/
		
	/*	
		if((s_fname == s_fname) && (s_lname == s_lname)){
			swal(
			  'Good job!',
			  'You clicked the button!',
			  'success'
				)
			}
		else{
			swal(
			  'Oops...',
			  'Something went wrong!',
			  'error'
			)
				}*/-->
                
                
                
                
                

</body>
</html>