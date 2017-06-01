<?php
 include("database/des_db_con.php");

?>
<?php
$email=$_POST['email'];
$pwd=$_POST['pwd'];


 $sql="update user set password='$pwd' where email='$email'";
 $rs=mysql_query($sql);
 
 if($rs==1)
 {
	 header("location:login.php?msg=changed password succesfully");
 }
 else
 {
	 header("location:login.php?msg=password not changed");
 }
 ?>