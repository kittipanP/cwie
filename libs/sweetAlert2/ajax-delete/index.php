<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SweetAlert2 – Ajax Delete Rows Example with PHP MySQL</title>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="assets/swal2/sweetalert2.min.css" type="text/css" />
</head>
<body>

    <div class="container">
    	
        <div class="page-header">
        <h1><a target="_blank" href="http://www.codingcage.com/2016/12/sweetalert2-ajax-delete-rows-example.html">SweetAlert2 – Ajax Delete Rows Example with PHP MySQL</a></h1>
        </div>
        
        <div id="load-products"></div> <!-- products will be load here -->
    
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/swal2/sweetalert2.min.js"></script>


<script>
	$(document).ready(function(){
		
		readProducts(); /* it will load products when document loads */
		
		$(document).on('click', '#delete_product', function(e){
			
			var productId = $(this).data('id');
			SwalDelete(productId);
			e.preventDefault();
		});
		
	});
	
	function SwalDelete(productId){
		
		swal({
			title: 'Are you sure?',
			text: "It will be deleted permanently!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,
			  
			preConfirm: function() {
			  return new Promise(function(resolve) {
			       
			     $.ajax({
			   		url: 'delete.php',
			    	type: 'POST',
			       	data: 'delete='+productId,
			       	dataType: 'json'
			     })
			     .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					readProducts();
			     })
			     .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}
	
	function readProducts(){
		$('#load-products').load('read.php');	
	}
	
</script>
</body>
</html>