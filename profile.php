<?php
session_start();
 if (isset($_SESSION['username'])) {
     //include_once("resources/loader.php")   ;
     include_once "header.php" ;
     include_once("resources/profile_box.php")   ;
     include "database/des_db_con.php";
     require "function.php";
 } else {
    die("Please login to view this page");
} ?>
<html>

<head>


    <title>Profile-SDMS</title>
    <script src="js/pace.js"></script>
    <link href="css/centercircle.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans+Condensed:300|Roboto+Slab" rel="stylesheet">
    <script type="text/javascript" src="resources/enc_key.js"></script>
    <script type="text/javascript" src="resources/decrypt.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/reg_script.js"></script>
    <link rel="stylesheet" href="alertify/themes/alertify.core.css" />
    <!-- include a theme, can be included into the core instead of 2 separate files -->
    <link rel="stylesheet" href="alertify/themes/alertify.default.css" />
    <script src="alertify/lib/alertify.min.js"></script>

    <!-- bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include "resources/sitemap.php" ?>
            </div>
            <div>
              <?php
                $id=$_SESSION['userid'];
                $sql="Select * from user where user_id='$id'";
                $rs=mysql_query($sql);
                if (mysql_num_rows($rs)) {
                    $row=mysql_fetch_array($rs);
                    $dir="images/user/";
                    $file=$dir."".$row['8'];
                    ?>



                    <?php
                    if($row['8']=="null")
                    {
                      ?>
                      <img src="images/user.png" alt="vegeta" height="200" width="200" style="margin-left:300px;">
                      <?php
                    }
                    else {
                      echo "<img src='$file' height='200' width='200' style='margin-left:300px;'>";
                    }
                    ?>

    			         <form name="uimg" action="uimage.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="pic" accept="image/*" style="margin-left:300px;">
                    <input type="submit" name="upload" value="upload" style="margin-left=300px;">
                   </form>

                   <table border="1px" class="table" style="margin-left:27%;">
                     <tr>
                        <td>
                          First Name
                        </td>
                        <td>
                          <?php echo $row[1]; ?>
                        </td>
                     </tr>
                     <tr>
                        <td>
                          Last Name
                        </td>
                        <td>
                          <?php echo $row[2]; ?></
                        </td>
                     </tr>
                     <tr>
                       <td>
                         Email
                       </td>
                       <td>
                         <?php echo $row[3]; ?>
                       </td>
                     </tr>
                     <tr>
                       <td>
                         Username
                       </td>
                       <td>
                         <?php echo $row[4]; ?>
                       </td>
                     </tr>
                   </table>

              <?php

              }
            ?>




        </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>

        <script>
        function openmodal()
        {
          $("#myModal").modal('show');

        }
        </script>


        <!-- *************************************************************************** -->
        <script src="js/jquery.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


</body>


</html>
