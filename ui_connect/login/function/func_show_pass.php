 <script type="text/javascript">

    function ShowHidePassword(ID) {

        if (document.getElementById($("#" + ID).prev().attr('id')).type == "password") {
            
            $("#" + ID).attr("data-hint", "Hide");
            $("#" + ID).find("i").removeClass("fa fa-eye").addClass("fa fa-eye-slash");
            document.getElementById($("#" + ID).prev().attr('id')).type = "text";
        }
        else {

            $("#" + ID).attr("data-hint", "Show");
            $("#" + ID).find("i").removeClass("fa fa-eye-slash").addClass("fa fa-eye");
            document.getElementById($("#" + ID).prev().attr('id')).type = "password";
            }
        }
</script>

         