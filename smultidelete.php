<?php
include "database/des_db_con.php";

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

     $sql="update mail set SC=1 where msg_id='$a'";
					$rs=mysql_query($sql);


       }
     }
	 echo "1";
   }
   
 
 

 ?>
