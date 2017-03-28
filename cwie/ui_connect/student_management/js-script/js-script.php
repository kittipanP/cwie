<script>
    // Accordion 
    function onProcessFn(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-theme-d1";
        } else { 
            x.className = x.className.replace("w3-show", "");
            x.previousElementSibling.className = 
            x.previousElementSibling.className.replace(" w3-theme-d1", "");
        }
    }
	
	
	

    
    // Used to toggle the menu on smaller screens when clicking on the menu button
    function openNav() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    }
    
    
    </script>
    

    
    
    <!-- Navigation II-->
    <script>
    	function w3_open(){
			document.getElementById("mySidenav").style.display = "block";
			document.getElementById("myOverlay").style.display = "block";
			}
		function w3_close(){
			document.getElementById("mySidenav").style.display = "none";
			document.getElementById("myOverlay").style.display = "none";
			}
			
    </script>
    
    <!-- Create New [Model Tab] -->
	<script>
		document.getElementsByClassName("tablink")[0].click();
		
		function openCity(evt, cityName) {
		  var i, x, tablinks;
		  x = document.getElementsByClassName("city");
		  for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		  }
		  tablinks = document.getElementsByClassName("tablink");
		  for (i = 0; i < x.length; i++) {
			tablinks[i].classList.remove("w3-light-grey");
		  }
		  document.getElementById(cityName).style.display = "block";
		  evt.currentTarget.classList.add("w3-light-grey");
		}
    </script>

   
    <!-- for muti step form -->
    <script src='../../libs/js/jquery.min.js'></script>
    <script src='../../libs/js/jquery.easing.min.js'></script>
    
    <script src="../../libs/js/index.js"></script>
	
	<!--for According-->
	<script src="../../libs/js/According.js"></script>

	<!-- for jQuery Get input Text value -->
	<!--<script src="../../libs/js/jquery.js" type="text/javascript"></script>-->
	<!--<script src="../../libs/js/jquery-ui.min.js" type="text/javascript"></script>-->
    
    <!-- for get data from input -->
	<script type="text/javascript">
				$(document).ready(function() {
					$('#inputFirstname').keyup(function() {
						$('#firstnameDIVTag').html($(this).val());
						$('#firstnameDIVTagiii').html($(this).val());
						$('#firstnameDIVTagiv').html($(this).val());
					 	$('#outputFirstname').val($(this).val());
					 
					});
					
					$('#inputLastname').keyup(function() {
						$('#lastnameDIVTag').html($(this).val());
						$('#lastnameDIVTagiii').html($(this).val());
						$('#lastnameDIVTagiv').html($(this).val());
						$('#outputFullname').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnameii').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnameiii').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnameiv').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnamev').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnamevi').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnamevii').val($(inputFirstname).val()+'_'+$(this).val());
					});
					
				});     
	</script> 

    
    <!-- for Institute University and Collage -->
	<script>	
	function getUniversity(val) {
			
			$.ajax({
			type: "POST",
			url: "get_university.php",
			data:'ins_id='+val,
			success: function(data){
				$("#uniSelect").html(data);
			}
			});	
    }
	function getUniversityii(val) {
			
			$.ajax({
			type: "POST",
			url: "get_collage.php",
			data:'ins_id='+val,
			success: function(data){
				$("#collageSelect").html(data);
			}
			});
	}
			
    function selectCountry(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
    }
    </script>

	<!-- # calendar #-->
<!--<script src="jquery-1.12.4.min.js"></script>-->
    <script src="src/calendar.js"></script>
    <script>
        var now = new Date();
        var year = now.getFullYear();
        var month = now.getMonth() + 1;
        var date = now.getDate();


        var data = [{
            date: year + '-' + month + '-' + (date - 1),
            value: 'Yesterday'
        }, {
            date: year + '-' + month + '-' + date,
            value: 'Today'
        }, {
            date: new Date(year, month - 1, date + 1),
            value: 'Tomorrow'
        }, {
            date: new Date(year, 5, 2),
            value: 'BBBBB'
        }];

        // inline
        var $ca = $('#one').calendar({
            // view: 'month',
            width: 320,
            height: 320,
            // startWeek: 0,
            // selectedRang: [new Date(), null],
            data: data,
            date: new Date(2016, 9, 31),
            onSelected: function (view, date, data) {
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            },
            viewChange: function (view, y, m) {
                console.log(view, y, m)

            }
        });

        // picker
        $('#wdS').calendar({
            trigger: '#dtwdS', 
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        });
		    $('#wdE').calendar({
            trigger: '#dtwdE',
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        }); 

        $('#wexS').calendar({
            trigger: '#dtwexS',
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        });
        $('#wexE').calendar({
            trigger: '#dtwexE',
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        });


        // Dynamic elements
        var $demo = $('#demo');
        var UID = 1;
        $('#add').click(function () {
            $demo.append('<input id="input-' + UID + '"><div id="ca-' + UID + '"></div>');
            $('#ca-' + UID).calendar({
                trigger: '#input-' + UID++
            })
        })
    </script>
    
    <!-- add_more_file_using_jquery -->   
    <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 5; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><div class="w3-row"><div class="w3-col s3 w3-container"><input type="text" name="wex_id" value="" size="32" /><input type="text" name="student_info_s_id" value="<?php echo $row_studentSet['s_id']+1 ?>    " size="32" /><div align="left"><label for=""> Duration : </label></div><table><tr><td><input type="text" name="wex_dateS" value="" size="32" id="dtwexS" placeholder="trigger calendar"/></td><td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td><td><input type="text" name="wex_dateE" value="" size="32" id="dtwexE" placeholder="trigger calendar"/></td></tr></table></div><div class="w3-col s9 w3-container">                  <div align="left"><label for=""> Organization/Company : </label></div><input type="text" name="wex_organ" value="" size="32" /><div align="left"><label for=""> Detail of Duty/Position : </label></div><textarea type="text" name="wex_detail" value="" size="32"></textarea><div align="right"><a href="javascript:void(0);" class="remove_button" title="Remove field"> Remove field&nbsp;&nbsp;<i class="fa fa-minus-square"></i></a></div></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        $(addButton).click(function(){ //Once add button is clicked
            if(x < maxField){ //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent().remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>
