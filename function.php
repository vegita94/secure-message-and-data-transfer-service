<?php
        include "database/des_db_con.php";


//check whether a particular message id available
//on database or not

function msg_exist($msgid)
{
    $sql="SELECT * FROM mail WHERE msg_id='$msgid'";
    $rs=mysql_query($sql);
    if($rs)
    {
        if(mysql_num_rows($rs)>0)
        {
            // 1 indicates true
            return 1;
        }
        else{
            return 0;
            // 0 indicates no data;
        }
    }
}

function idtoname($id)
        {
            $sql1="SELECT * FROM user WHERE user_id='$id'";
            $rs1=mysql_query($sql1);
            if(mysql_num_rows($rs1))
            {
                $row=mysql_fetch_array($rs1);
                return $row['1']." ".$row['2'];
            }
            else{
                return "#";
            }

        }

function read($id)
{
    $sql="UPDATE mail SET r_uread=0 WHERE msg_id='$id'";
    if(mysql_query($sql))
    {
        return 1;
    }
    else{
        return 0;
    }
}

function unread()
{
    $sql="SELECT * FROM mail WHERE u_read=1";
    if($rs=mysql_query($sql))
    {
        $no=mysql_num_rows($rs);
        return $no;
    }
}

function idtousername($id)
{
  $sql1="SELECT * FROM user WHERE user_id='$id'";
  $rs1=mysql_query($sql1);
  if(mysql_num_rows($rs1))
  {
      $row=mysql_fetch_array($rs1);
      return $row['4'];
  }
  else{
      return "#";
  }

}

function idtopic($id)
{
  $sql1="SELECT * FROM user WHERE user_id='$id'";
  $rs1=mysql_query($sql1);
  if(mysql_num_rows($rs1))
  {
      $row=mysql_fetch_array($rs1);
      return $row['8'];
  }
  else{
      return "#";
  }

}



?>
