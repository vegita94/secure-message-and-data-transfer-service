<?php
 include("database/des_db_con.php");

?>

<?php
 $fname=$_POST['fname'];
 $lname=$_POST['sname'];
 $username=$_POST['username'];
 $userpwd=$_POST['u_pwd'];
 $uemail=$_POST['email'];
 $userq=$_POST['s_ques'];
 $usera=$_POST['answ'];
echo $username." ".$userpwd." ".$uemail." ".$usera." ".$userq;
 $sql="select * from user where username='$username'";
   $rs=mysql_query($sql);
   if (mysql_num_rows($rs)) {
       //echo "user name exist";
          header("location:user_register.html?msg=The Username already exist");
   } else {
          $sql1="insert into user (fname,sname,username,password,email,ques,ans,picture) values('$fname','$lname','$username','$userpwd','$uemail','$userq','$usera','null')";

          $s1=mysql_query($sql1);
          if ($s1==1) {
              //echo "success";
        header("location:login.php?msg=registered succesfully");
          } else {
              echo mysql_error();
        //header("location:user_register.html?msg=registeration unsuccesful");
          }
    //session_destroy();
      }
?>
