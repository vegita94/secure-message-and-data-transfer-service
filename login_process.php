<?php
	session_start();
    include "database/des_db_con.php";
	$email=$_POST['email'];
	$password=$_POST['password'];

	
	

			$sql="select * from user where email='$email' and password='$password'";
			$rs=mysql_query($sql);
			if(mysql_num_rows($rs))
			{
				
				$row=mysql_fetch_array($rs);
			 	
			 	$_SESSION['username']=$row['username'];
                $_SESSION['userid']=$row['user_id'];
                $_SESSION['name']=$row['fname']." ".$row['sname'];
			 	header("location:inbox.php");

			
			}
			else
			{
				header("location:login.php?msg=1");
			}


 ?>