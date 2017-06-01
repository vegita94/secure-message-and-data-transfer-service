<?php
        include "database/des_db_con.php";

?>
<html>

    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

        <style>
            #inbox_count {
                color: black;
                border: 1px solid black;
            }
            #sitemap{
              border-radius: 10px;
              box-shadow: 5px 5px 5px  grey;

            }

        </style>


    </head>

    <body>

<div id="sitemap">
  <span>Menu</span><hr>
        <div>
            <img src="images/create.png">
            <span id="inbox_text"><a href="mail.php">Create Mail</a></span>
        </div>
        <div>
            <img src="images/inbox.png">
            <span id="inbox_text"><a href="inbox.php">Inbox <span class="badge" id="inbox_count"><?php echo faizbhai(); ?></span> </a></span>
        </div>
        <div>
            <img src="images/send.png">
            <span id="inbox_text"><a href="sentmail.php">Sent Mails</a></span>
        </div>
        <div>
            <img src="images/trash.png">
            <span id="inbox_text"><a href="trash.php">Trash</a></span>
        </div>

</div>
<div id="sitemap" style="margin-top:15px">
    <span >Recent Contacts</span><hr>
<?php
  $u_id1=$_SESSION['userid'];
  $sql1="SELECT * FROM mail WHERE sender='$u_id1' GROUP BY receiver ORDER BY sender DESC";
  if($rs1=mysql_query($sql1))
  { $count=4;
    while($row=mysql_fetch_array($rs1))
    {
      $count--;
      ?>
      <div >
          <?php
            $picname=imagefinder($row['3']);
            if($picname=="null")
            {
              ?>
              <img src="images/user.png" style="height:50px;height:50px">

              <?php
            }
            else {

              $file="images/user/".$picname;
              echo "<img src='$file' height='50' width='50'>";

            }
           ?>
          <span id="inbox_text"><?php echo idtoname2($row['3']); ?><span><hr>
      </div>
<?php
    if($count==0)
    {
      break;
    }
  }
  }
?>


<?php
function imagefinder($id)
{
  $ss="select * from user where user_id='$id'";
  if($rs=mysql_query($ss))
  {
    $rr=mysql_fetch_array($rs);
    return $rr['8'];
  }
}

?>



</div>


        <script src="resources/jquery.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="resources/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


        <?php
        function faizbhai(){
            $u_id=$_SESSION['userid'];
                        $sql="select * from mail where r_uread=1 && receiver='$u_id'";
            $rs=mysql_query($sql);
        if($rs)
        {
            $num=mysql_num_rows($rs);

            return $num;
        }
        }

        function idtoname2($id)
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


        ?>
    </body>

    </html>
