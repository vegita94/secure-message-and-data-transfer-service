<?php
 if(isset($_SESSION['username']))
    {
        //include_once("resources/loader.php")   ;
        include_once "header.php" ;
        include_once("resources/profile_box.php")   ;
        include "database/des_db_con.php";


    }
else {
    die("Please login to view this page");
} ?>
<html>

<head>

    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

    <style>
        #header {
            text-align: center;
        }

        .logo {
            height: 40px;
            width: 40px;
        }

        .logo:hover{

            border: 1px solid black;
        }
        #name{
          font-family: 'Slabo 27px', serif;

            font-size: 20px;

        }

    </style>
    <script src="js/jquery.min.js"></script>


</head>

<body>

  <?php
  $id=$_SESSION['userid'];
  $sql="SELECT * FROM user WHERE user_id='$id'";
  if($rs=mysql_query($sql))
  {
    $rr=mysql_fetch_array($rs);
  }
  $file="images/user/".$rr['8'];

   ?>



    <nav id="header" class="navbar navbar-light bg-faded">

        <div style="">
            <span style="float:left;" id="name">Welcome, <?php echo $_SESSION['name']; ?></span>
    <?php
        if($rr['8']=="null")
        {?>
          <img src="images/user.png" height="50" width="50" style="float:right" />
          <?php
        }
        else {
          echo "<img src='$file' height='50' width='50' style='float:right'>";

        }


     ?>
        </div>

    </nav>






    <script src="resources/jquery.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="resources/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script>
        $("#refresh").click(function() {
            location.reload();

        })

        $("#logout").click(function(){


            document.location = 'logout.php';

        })

    </script>

</body>


</html>




<?php
?>
