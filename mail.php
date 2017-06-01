<?php

    session_start();
    if (isset($_SESSION['username'])) {
        include_once("header.php")   ;
        include_once("resources/profile_box.php")   ;
    //include_once("resources/loader.php")   ;
    } else {
    die("Please login to view this page");
}

?>




    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Compose mail-SDMS</title>

        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <!-- include the core styles -->
        <link rel="stylesheet" href="alertify/themes/alertify.core.css" />
        <!-- include a theme, can be included into the core instead of 2 separate files -->
        <link rel="stylesheet" href="alertify/themes/alertify.default.css" />
        <script src="alertify/lib/alertify.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
        <script type="text/javascript" src="resources/enc_key.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <!-- bootstrap  -->

        <link rel="stylesheet" href="alertify/themes/alertify.default.css" />

        <link rel="stylesheet" href="css/bootstrap.min.css">


        <style>
            #myform {
              box-shadow: 5px 5px 5px 5px grey;
              border-radius: 10px;

            }

            .search-box {
                position: relative;

            }

            .search-box input[type="text"] {

            }

            .result {
                position: absolute;
                z-index: 999;
                top: 100%;
                left: 0;
            }

            .search-box input[type="text"],
            .result {
                width: 100%;
                box-sizing: border-box;
            }
            /* Formatting result items */

            .result p {
                margin: 0;
                padding: 7px 10px;
                border: 1px solid #CCCCCC;
                border-top: none;
                cursor: pointer;
                background-color:antiquewhite;

            }

            .result p:hover {
                background-color: azure;
            }

        </style>
        <script type="text/javascript">
        /*   $(document).ready(function() {
                $('#username').on("keyup input", function() {

                    var inputVal = $(this).val();
                    var resultDropdown = $(this).siblings(".result");
                    if (inputVal.length) {
                        $.get("test1.php", {
                            term: inputVal
                        }).done(function(data) {
                            resultDropdown.html(data);
                        });
                    } else {
                        resultDropdown.empty();
                    }
                });

                $(document).on("click", ".result p", function() {
                    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                    $(this).parent(".result").empty();
                });
            }); */

        </script>

    </head>

    <body>



        <div class="container-fluid" style="margin-top:5px">
            <div class="row">

                <div class="col-md-3">
                    <?php include "resources/sitemap.php" ?>


                </div>

                <div class="col-md-8" id="myform">
                  <h4>Compose Mail</h4>
                    <form name="myform" action="" method="post">
                        <div class="search-box form-group">
                            <input type="text" autocomplete="off" placeholder="Enter username" class="form-control" name="To" id="username" required />
                            <div class="result"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" spellcheck="true" name="Subject" class="form-control" placeholder="Enter Subject" id="subject" required>

                        </div>
                        <div class="form-group">
                            <input type="text" name="key" class="form-control" id="key" hidden="hidden">

                        </div>
                        <div class="form-group">
                            <textarea class="form-control" spellcheck="true" name="message" placeholder="Enter your message" id="textarea_style" style="height:25em"></textarea>

                        </div>
                        <div class="form-group">
                            <input type="text" name="enc_msg" class="form-control" id="enc" hidden="hidden" />


                        </div>
                        <input type="text" name="tz" id="tz" hidden="hidden" >

                    </form>
                    <button  class="btn btn-primary" onclick="sub();">Send Message</button>


                </div>






            </div>


        </div>



        <script>
        var notification=0;
        </script>





        <!-- end .container -->
        <script src="alertify/lib/alertify.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
          <script>
                         var z=(Intl.DateTimeFormat().resolvedOptions().timeZone);
                         console.log(z);
                         document.getElementById("tz").value=z;
         </script>



        <script>

            //paste this code under the head tag or in a separate js file.
            // Wait for window load
            $(window).load(function() {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");;
            });


            //generating random value for key

            var random = function(length) {
                var text = "";
                var possible = "ABCDEF0123456789";
                for (var i = 0; i < length; i++) {
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                }
                return text;
            }
            var rs = random(16);

            document.getElementById("key").value = rs;

            function sub() {
              // extend log method


                var message = document.getElementById("textarea_style").value;
                var key = rs;
                message = message.replace(/(\r\n|\n|\r)/gm, " ");

                var enc_msg = hello(message, key);
                document.getElementById("enc").value = enc_msg;

                if(document.getElementById("username").value!=null || document.getElementById("username").value!=0)
                    {
                        mailsend();

                    }
                else{
                    alert("Please select receipient");
                    return false;
                }

            }
            function mailsend(){
              var To=document.getElementById("username").value;
              var Subject=document.getElementById("subject").value;
              var key=document.getElementById("key").value;
              var message=document.getElementById("textarea_style").value;
              var enc_msg=document.getElementById("enc").value;
              var tz=document.getElementById("tz").value;

              //alert(a1);
             $.ajax({
                url:"mail_process.php",
                type:"POST",
                data:{To:To,Subject:Subject,key:key,message:message,enc_msg:enc_msg,tz:tz},
                success: function(data) {
                  if(data==1)
                  {
                    alertify.success("Nice, Your mail sent successfully");
                    setInterval(function(){ location.reload(); }, 2000);
                  }
                  else {
                    //alert(data);
					alertify.error("Sorry, We could not send your email, Try Again");

                  }



                 },
                error: function( ){
                  alertify.error("Error notification");
                }
            })
          }







        </script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <!-- *************************************************************************** -->
        <script src="js/tether.min.js"></script>


        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
