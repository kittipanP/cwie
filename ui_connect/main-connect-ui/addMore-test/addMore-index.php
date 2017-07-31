<!DOCTYPE html>
<html>
<head>
 <title>swal</title>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.css">
</head>
<body>

</body>

<script>
 $(document).ready(function(){
 swal({
 title: 'Submit email to run ajax request',
 input: 'email',
 showCancelButton: true,
 confirmButtonText: 'Submit',
 showLoaderOnConfirm: true,
 preConfirm: function (email) {
 return new Promise(function (resolve, reject) {
 setTimeout(function() {
 $.ajax({
 type: 'post',
 url: 'check-major.php',
 data: {email:email},
 success: function(result){
 if(result<=0){
 reject('This email is already taken.')
 }
 else{
 $.ajax({
 type: 'post',
 url: 'addMore.php',
 data: {email:email},
 success: function(data){
 resolve()
 }
 });

 }
 }
 });

 }, 1000)
 })
 },
 allowOutsideClick: true
 }).then(function (email) {
 swal({
 type: 'success',
 title: 'Ajax request finished!',
 html: 'Submitted email: ' + email
 })
 })
 });
</script>
</html>