<?php
    
include "database/des_db_con.php";
$id=$_POST['msgid'];

$sql="SELECT * FROM mail WHERE msg_id='$id'";
$rs=mysql_query($sql);
if(mysql_num_rows($rs))
{
    $row=mysql_fetch_array($rs);
    echo $row['6'];
}


?>