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
}
$username=$_SESSION['username'];
$name=$_FILES['pic']['name'];
$temp=$_FILES['pic']['tmp_name'];
$picname=$username.$name;
if(move_uploaded_file($temp, "images/user/".$username.$name))
{
  $sql="UPDATE user SET picture='$picname' WHERE username='$username' ";
  if($rs=mysql_query($sql))
  {
    ?>
      <script>
          alert("Profile picture uploaded successfully");
                         window.location="http://localhost/encrypted_chat/profile.php";
      </script>
    <?php
    header("Location:profile.php");
  }
}



?>
