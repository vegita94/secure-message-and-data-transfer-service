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
	       if($row['10']==2)
		   {
		      $sql1="delete from mail where msg_id='$a'";
			  $rs1=mysql_query($sql1);
			  
		   }
		   else
		   {
		     $sql1="update mail set SC=2 where msg_id='$a'";
					$rs1=mysql_query($sql1);
					
		   }
	     }
       else
	   {
	     if($row['9']==2)
		   {
		       $sql1="delete from mail where msg_id='$a'";
			  $rs1=mysql_query($sql1);
			  
		   }
		   else
		   {
		     $sql1="update mail set RC=2 where msg_id='$a'";
					$rs1=mysql_query($sql1);
					
		   }
	   }

       }
     }
	 
   }
   echo "1";
}
   
 
 

 ?>
