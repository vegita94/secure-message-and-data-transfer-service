<?php
session_start();
 if(isset($_SESSION['username']))
    {
        include_once "header.php" ;
        include_once("resources/profile_box.php")   ;
        include "database/des_db_con.php";
        include "function.php";

    }
else {
    die("Please login to view this page");
} ?>

<html>

<head>
    <title>Inbox View</title>
    <script type="text/javascript" src="resources/decrypt.js"></script>
    <script type="text/javascript" src="resources/enc_key.js"></script>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/reg_script.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="alertify/themes/alertify.core.css" />
    <!-- include a theme, can be included into the core instead of 2 separate files -->
    <link rel="stylesheet" href="alertify/themes/alertify.default.css" />
    <script src="alertify/lib/alertify.min.js"></script>



    <!-- bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script type="text/javascript">
        $(document).ready(function() {
            $('#username').on("keyup input", function() {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("test1.php", {
                        term: inputVal
                    }).done(function(data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function() {
                $(this).parents(".search-box").find('#username').val($(this).text());
                $(this).parent(".result").empty();
            });
        });

    </script>
    <style>
            .search-box input[type="text"] {
            height: 35px;
            padding: 5px 10px;
            border: 1px solid #CCCCCC;
            font-size: 14px;
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
            background-color: antiquewhite;
        }

        .result p:hover {
            background-color: azure;
          }
          #myform{
            border-radius: 5px;
          }
    </style>

</head>

<body>

    <?php


    //checking any message id is sent through get
            if(isset($_GET['msgid']))
            {
                // checking whether the message id exist or not actually
                if(msg_exist($_GET['msgid']))
                {
                    //we can process with the message id provided through the get method
                    $msgid=$_GET['msgid'];
                    $sql="SELECT * FROM mail WHERE msg_id='$msgid'";
                    if($rs=mysql_query($sql))
                    {
                        $val=mysql_fetch_array($rs);
                        $fw="Fw:".$val['4'];
                        $ch=read($_GET['msgid']);


                    }
                }
                else
                {
                    die("Unexpected Activity Found ");
                }
            }
            ?>

        <div class="container-fluid" style="margin-top:5px">

            <div class="row">

                <div class="col-md-3">
                    <?php include "resources/sitemap.php" ?>

                </div>

                <div class="col-md-8" id="myform" style="border:1px solid black;">
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <span>From</span>:&nbsp;&nbsp;
                                <?php echo idtoname($val['1']); ?><br>
                                <?php
                                if(idtopic($val['1'])=="null")
                                { ?>
                                  <img src="images/user.png" height="50" width="50"  />
                                  <?php
                                }
                                else {
                                  # code...
                                  $file="images/user/".idtopic($val['1']);
                                  echo "<img src='$file' height='50' width='50'>";
                                }


                                 ?><br>

                            </div>

                            <div class="col-md-6">
                                <span>To</span>:&nbsp;&nbsp;
                                <?php echo idtoname($val['3']); ?><br>
                                <?php
                                if(idtopic($val['3'])=="null")
                                { ?>
                                  <img src="images/user.png" height="50" width="50" />
                                  <?php
                                }
                                else {
                                  # code...
                                  $file="images/user/".idtopic($val['3']);
                                  echo "<img src='$file' height='50' width='50'>";
                                }


                                 ?><br>


                            </div>

                        </div>
                        <span>Time</span>:&nbsp;&nbsp;
                        <?php echo $val['7']; ?><br>


                    </div>
                    <input type="text" style="margin-top:5px;margin-bottom:5px" class="form-control" name="subject" value="<?php echo " Subject ".": ".$val['4']; ?>" readonly>
                    <div class="form-group" style="margin:2px">

                        <textarea readonly class="form-control" spellcheck="true" name="message" placeholder="This is your message" id="textarea_style" style="height:25em;resize:none"></textarea>
                        <input type="text" id="msgid" hidden="hidden" value="<?php echo $val['0']; ?>">


                    </div>
                    <div style="margin:5px">
                        <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal" whatever="@mdo">Forward</button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" whatever="@mdo">Reply</button>


                    </div>

                </div>

            </div>



        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Forward</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="forward" id="forward" method="post" action="mail_process.php">
                            <div class="search-box form-group">
                                <label for="recipient-name" class="form-control-label">Recipient:</label>
                                <input type="text" autocomplete="off" placeholder="Search users..." class="form-control" name="To" id="username" required />
                                <input type="text" hidden="hidden" class="form-control" name="key" value="<?php echo $val['6']; ?>" id="key" readonly>
                                <input type="text" hidden="hidden" class="form-control" name="Subject" value="<?php echo $fw; ?>" id="Subject" readonly>
                                <input type="text" hidden="hidden" class="form-control" name="enc_msg" value="<?php echo $val['5']; ?>" id="enc" readonly>
                                <input type="text" hidden="hidden" class="form-control" name="tz" id="tz" readonly>

                                <div class="result"></div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="forward-submit">Send message</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Forward</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="forward" id="forward" method="post" action="mail_process.php">
                            <div class="search-box form-group">
                                <label for="recipient-name" class="form-control-label">Recipient:</label>
                                <input type="text" class="form-control" name="To" value="<?php echo idtousername($val['1']); ?>" id="username1" readonly>
                                <input type="text" class="form-control" name="key" value="<?php echo $val['6']; ?>" id="key1" readonly>
                                <input type="text" class="form-control" name="Subject" value="<?php echo "Re:"."".$val['4']; ?>" id="Subject1" readonly>
                                <input type="text" class="form-control" name="tz" id="tz1">
                                <input type="text" class="form-control" name="msg" id="msg">

                                <div class="result"></div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="reply-submit">Send message</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                var msgid = document.getElementById("msgid").value;
                var msg_enc = getmsg(msgid);
                var key = getkey(msgid);
                var msg_dec = hello1(msg_enc, key);
                //document.getElementById("textarea_style").value=msg_dec;
                $("#textarea_style").val(msg_dec);


                var z = (Intl.DateTimeFormat().resolvedOptions().timeZone);
                console.log(z);
                document.getElementById("tz").value = z;
                document.getElementById("tz1").value = z;



            })

            $("#forward-submit").click(function() {
                mailsend();
            })
            $("#reply-submit").click(function() {

                replysend();
            })

            function mailsend(){
              var To=document.getElementById("username").value;
              var Subject=document.getElementById("Subject").value;
              var key=document.getElementById("key").value;
              var message=" ";
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


          function replysend(){

            var To=document.getElementById("username1").value;
            var Subject=document.getElementById("Subject1").value;
            var key=document.getElementById("key1").value;
            var message=$('#msg').val();
            //var message=message.concat("******************** REPLIED FOR THIS MESSAGE *********************");
          //  var message=message.concat($("#textarea_style").val());
            //alert($("#textarea_style").val());
          //  var enc_msg=document.getElementById("enc").value;
            var tz=document.getElementById("tz1").value;
            var enc_msg=hello(message,key);
            console.log(enc_msg);
            //alert(a1);
            $.ajax({
              url:"mail_process.php",
              type:"POST",
              data:{To:To,Subject:Subject,key:key,message:message,enc_msg:enc_msg,tz:tz},
              success: function(data) {
              //  alert(data);
                if(data==1)
                {
                  alertify.success("Nice, Your mail sent successfully");
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



        <!-- *************************************************************************** -->
        <script src="js/jquery.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


</body>

</html>
