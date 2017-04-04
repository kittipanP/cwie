<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>

                <script src="../../libs/js/jquery.min.js"></script>
                <script>
                    //type shows status
                $(document).ready(function(){ 
                    $('#type').on('change',function(){
                        var typeID = $(this).val();
                        if(typeID){
                            $.ajax({
                                type:'POST',
                                url:'script_ajax_dropdown.php',
                                data:'status_id='+typeID,
                                success:function(html){
                                    $('#status').html(html);
                                    
                                }
                            }); 
                        }else{
                            //$('#status').html('<option value="">Select Type first</option>');
                            //$('#id').html('<option value="">Select Status first</option>'); 
                        }
                    });
                });
                </script>

