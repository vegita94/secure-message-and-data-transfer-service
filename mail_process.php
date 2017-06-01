<?php
include "database/des_db_con.php";
session_start();

$val=$_POST['enc_msg'];
$key=$_POST['key'];
$subject=$_POST['Subject'];
$emailto=$_POST['To'];
       /*if($to=="#")
        {
        ?>
        <script>
            alert("Invalid receipient");
            var url = "http://chat.adeve.net/mail.php";
            $(location).attr('href', url);

        </script>


        die();

        }*/
$status=1;
$address=explode(',', $emailto);

$me=$_SESSION['userid'];
$time=$_POST['tz'];
//echo $time;
date_default_timezone_set($time);
$my_date = date("Y-m-d H:i:s");

    foreach($address as $to)
	{
		$t=nametoid($to);
    if($t=="#")
    {
      $status=2;
      break;
    }
		//echo $to;
    $sql="INSERT into mail(msg_id,sender,receiver,subject,msg,msg_key,datetime,r_uread,SC,RC,refresh) VALUES ('','$me','$t','$subject','$val','$key','$my_date',1,0,0,1)";
    $rs=mysql_query($sql);
    if($rs)
    {

            $status=1;
          //  <input type="text" value="1" id="a" hidden="hidden">



    }
    else
    {
        $status=2;
        echo mysql_error();
    }

	}
  echo $status;







        function nametoid($id)
        {
            $sql1="SELECT * FROM user WHERE username='$id'";
            $rs1=mysql_query($sql1);
            if(mysql_num_rows($rs1))
            {
                $row=mysql_fetch_array($rs1);
                return $row['0'];
            }
            else{
                return "#";
            }

        }

    ?>
