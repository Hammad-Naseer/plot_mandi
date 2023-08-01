 <script>
    // 2FA Access
    $(".content-page").on('click','.2FA',function(){
        var user_id = $(this).attr('data-userID');
        var status = $(this).attr('data-factor');
        if(user_id != "" && status != ""){
            if(status == '0')
            {
                msg = "2FA Disabled Successfully";
            }else{
                msg = "2FA Enabled Successfully";
            }
            $.ajax({
                url:"2FApermission/"+user_id+"/"+status,
                type : 'GET',
                dataType: 'html',
                success:function(data) {
                    Swal.fire({
                    position: 'top-mid',
                    icon: 'success',
                    title: msg,
                    showConfirmButton: false,
                    timer: 2500
                });
                setTimeout(function() { 
                    location.reload();
                }, 2000);
                }
            });
        }else{
            
        }
    });

    // Disable 2FA User 
    $(".content-page").on('click','.D2FA',function(){
        var user_id = $(this).attr('data-userID');
        var status = $(this).attr('data-factor');
        if(user_id != "" && status != ""){
            if(status == '0')
            {
                msg = "2FA Disabled User Account";
            }else{
                msg = "2FA Enabled User Account";
            }
            $.ajax({
                url:"D2FApermission/"+user_id+"/"+status,
                type : 'GET',
                dataType: 'html',
                success:function(data) {
                    Swal.fire({
                    position: 'top-mid',
                    icon: 'success',
                    title: msg,
                    showConfirmButton: false,
                    timer: 2500
                });
                setTimeout(function() { 
                    location.reload();
                }, 2000);
                }
            });
        }else{
            
        }
    });
 </script>