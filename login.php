<?php include_once "resources/header.php" ?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login-SMDS</title>

    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
    <script type="text/javascript" src="resources/enc_key.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>


    <!-- bootstrap check -->

    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <style type="text/css">

        #header1{

            background-color: aliceblue;
            border: 1px solid black;
            border-radius: 10px;
        }
        #msg1{
            display: none;
        }
        #msg2{
          display: none;
        }
        #msg3{
          display: none;
        }


    </style>


</head>


<body>



<div class="container col-md-4" style="margin-top:50px;" id="header1">
    <form name="loginform" method="POST" action="login_process.php" onSubmit="sub();">
        <div class="form-group">
            <label for="emailid">Email Address</label>

            <input type="email" class="form-control" id="emailid" aria-describedby="emailHelp" placeholder="Enter email" name="email">

            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="passwordid">Password</label>

            <input type="password" class="form-control" id="passwordid" placeholder="Enter Password" name="password">
        </div>


            <button type="submit" class="btn btn-primary" style="display:inline-block;">Login</button>

    </form>
    <a href="fpwd.php">Forgot Password ?</a>


</div>

<div class="alert alert-danger container" role="alert" id="msg1" style="margin-top:5px;">
  <strong>Oh Sorry !</strong> &nbsp;&nbsp;Email id and password not macthing with our database :-(
</div>
<div class="alert alert-info container" role="alert" id="msg2" style="margin-top:5px;">
  <strong>Nice !<strong> &nbsp;&nbsp;Logout Success
</div>
<div class="alert alert-info container" role="alert" id="msg3" style="margin-top:5px;">
  <strong>Ok..<strong> &nbsp;&nbsp;<?php echo $_GET['msg']; ?>
</div>


    </form>

    <?php
        if(isset($_GET['msg']))
        {
          if($_GET['msg']=="1")
          {
            ?>
            <script type="text/javascript">

                 document.getElementById("msg1").style.display="block";
                 document.getElementById("msg2").style.display="none";
                 document.getElementById("msg3").style.display="none";


                 $("#emailid").css('border-color','red');
                 $("#emailid").focus();
                $("#passwordid").css('border-color','red');


            </script>
            <?php
          }
          else if($_GET['msg']==2)
          {
            ?>
            <script type="text/javascript">

                 document.getElementById("msg2").style.display="block";
                 document.getElementById("msg1").style.display="none";
                 document.getElementById("msg3").style.display="none";





            </script>
            <?php
          }
          else { ?>
            <script type="text/javascript">

            document.getElementById("msg1").style.display="none";
            document.getElementById("msg2").style.display="none";
            document.getElementById("msg3").style.display="block";

            </script>

<?php
          }


            ?>


            <?php
        }

    ?>


    <script type="text/javascript">





        function login() {
            document.loginform.submit();
        }

    </script>
        <script src="resources/jquery.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="resources/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


</body>

</html>
