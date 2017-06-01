<?php
session_start();
include "database/des_db_con.php";


if(isset($_POST['username']))
{
  $userid=$_SESSION['userid'];
  $sql="SELECT * FROM mail WHERE receiver='$userid' && refresh='1' ";
  if($rs=mysql_query($sql)){
    if(mysql_num_rows($rs)>0)
    {
      echo "1";
      while($row=mysql_fetch_array($rs))
      {
        $id=$row['0'];
        $sql1="UPDATE mail SET refresh='0' WHERE msg_id='$id'";
        $rs1=mysql_query($sql1);

      }
    }
    else {
      echo "0";
    }

  }
}

 ?>
