    // for Institute University and Collage 
	
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
