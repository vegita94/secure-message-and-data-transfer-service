function check() {


            var username = /^[a-zA-Z0-9]{1,}$/;
            if (!document.uregister.u_username.value.match(username)) {
                alert('Enter valid UserName');
                return false;
            }

            var name = /^[a-zA-Z!@#$%^&*0-9]{8,15}$/;
            if (!document.uregister.u_pwd.value.match(name)) {
                $("#password_help").show();

                return false;
            }

            var name = /^[a-zA-Z!@#$%^&*0-9]{8,15}$/;

            if (document.uregister.u_repwd.value != document.uregister.u_pwd.value) {
                $("#re_password_help").show();
                return false;
            }
            if (document.uregister.u_s_ques.value == "--Select a security question!--") {
                alert('Please Choose your Question');
                return false;
            }
            document.uregister.submit();

        }




        function checkusername() {
            
            
           jQuery.ajax({
              

                url: "username.php",
                data: 'username=' + $("#u_username").val(),
                type: "POST",
                success: function(data) {
                    //$("#status").html(data);
                    if(data==2)
                        {
                           $("#status").html("<span class='status-available'> Username Available.</span>");
                            $("#btn").prop('disabled', false);
                            
                        }
                    else if(data==1)
                        {
                            $("#status").html("<span class='status-not-available'> Username Not Available.</span>");
                            $("#btn").prop('disabled', true);
                            
                        }
              // $("#loaderIcon").hide();

                    
                },
                error: function() {}
            }); 
        } 


    function checkemail(){
        jQuery.ajax({
              

                url: "email.php",
                data: 'email=' + $("#emailid").val(),
                type: "POST",
                success: function(data) {
                    //$("#status").html(data);
                    if(data==2)
                        {
                           $("#emailmsg").html("<span class='status-available'> Email Available.</span>");
                            $("#btn").prop('disabled', false);
                            
                        }
                    else if(data==1)
                        {
                            $("#emailmsg").html("<span class='status-not-available'> Email Not Available.</span>");
                            $("#btn").prop('disabled', true);
                            
                        }
              // $("#loaderIcon").hide();

                    
                },
                error: function() {}
            }); 
    }

function getkey(msgid) {
            
        var key=false;
            
         jQuery.ajax({
              

                url: "getkey.php",
                data: 'msgid=' + msgid,
                type: "POST",
                async: false,
                success: function(data) {
                    
                    key=data;
                    
                    
                    //$("#status").html(data);
                  /*  if(data==2)
                        {
                           $("#status").html("<span class='status-available'> Username Available.</span>");
                            $("#btn").prop('disabled', false);
                            
                        }
                    else if(data==1)
                        {
                            $("#status").html("<span class='status-not-available'> Username Not Available.</span>");
                            $("#btn").prop('disabled', true);
                            
                        } */
              // $("#loaderIcon").hide();

                    
                },
                error: function() {}
            });
        return key;
        } 

function getmsg(msgid) {
            
        
            var msg=false;
         jQuery.ajax({
              

                url: "getmsg.php",
                data: 'msgid=' + msgid,
                type: "POST",
                async: false,
                success: function(data) {
                    
                     msg=data;
                    
                    //$("#status").html(data);
                  /*  if(data==2)
                        {
                           $("#status").html("<span class='status-available'> Username Available.</span>");
                            $("#btn").prop('disabled', false);
                            
                        }
                    else if(data==1)
                        {
                            $("#status").html("<span class='status-not-available'> Username Not Available.</span>");
                            $("#btn").prop('disabled', true);
                            
                        } */
              // $("#loaderIcon").hide();

                    
                },
                error: function() {}
            });
        return msg;
        } 

