<?php
include "database/des_db_con.php";
session_start();
if(isset($_POST['id']))
{
  $v=$_POST['id'];
  $id=explode(',', $v);


}

if(isset($_POST["id"]))
{
 if(!empty($_POST['id']))
 {
   foreach($id as $a)
   {

     $sql="select * from mail where msg_id='$a'";
					$rs=mysql_query($sql);
					if(mysql_num_rows($rs))
     {
       $row=mysql_fetch_array($rs);
	   if($row['1']==$_SESSION['userid'])
	     {
	       $sql="update mail set SC=0 where msg_id='$a'";
					$rs=mysql_query($sql);
	     }
       else
	   {
	     $sql="update mail set RC=0 where msg_id='$a'";
					$rs=mysql_query($sql);
	   }

       }
     }
	 
   }
   echo "1";
}
   
 
 

 ?>
