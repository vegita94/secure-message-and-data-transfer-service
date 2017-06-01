<?php
session_start();
 if (isset($_SESSION['username'])) {
     //include_once("resources/loader.php")   ;
     include_once "header.php" ;
     include_once("resources/profile_box.php")   ;
     include "database/des_db_con.php";
     require "function.php";
 } else {
    die("Please login to view this page");
} ?>
<html>

<head>


    <title>Inbox</title>
    <script src="js/pace.js"></script>
    <link href="css/centercircle.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans+Condensed:300|Roboto+Slab" rel="stylesheet">
    <script type="text/javascript" src="resources/enc_key.js"></script>
    <script type="text/javascript" src="resources/decrypt.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/reg_script.js"></script>
    <link rel="stylesheet" href="alertify/themes/alertify.core.css" />
    <!-- include a theme, can be included into the core instead of 2 separate files -->
    <link rel="stylesheet" href="alertify/themes/alertify.default.css" />
    <script src="alertify/lib/alertify.min.js"></script>

    <!-- bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script>



    </script>
    <style>
        #mailbox {
            margin: 5px;
            background-color: #d9f9f2;
            box-shadow: 5px 5px 5px 5px grey;

            border-radius: 2px;
        }

        table td {
            word-wrap: break-word;
            min-width: 200px;
            max-width: 200px;
        }

        #seemore {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(images/loader-64x/Preloader_2.gif) center no-repeat #fff;
        }
         .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
    .tablename{
      font-family: 'Josefin Sans', sans-serif;

    }
    #title{
      font-family: sans-serif;
      margin-left: 45%;
      padding: 5px;
    }

    </style>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
function togglecheckboxes(master,group){
    var cbarray = document.getElementsByName(group);
    for(var i = 0; i < cbarray.length; i++){
        cbarray[i].checked = master.checked;
    }
}

    </script>

</head>

<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include "resources/sitemap.php" ?>
            </div>

            <div class="col-md-8" id="mailbox" style="">
                <span id="title"><b>Inbox</b></span>
				<form name="delete" action="inbox.php" id="delete_form" method="post">
                <table class="table table-striped " id="tab">
                    <thead>
                        <tr style="font-family: 'Roboto Slab', serif;
">
                            <th ><input type="checkbox" id="master" onChange="togglecheckboxes(this,'msg[]')"></th>
                            <th >Sender</th>
                            <th>Subject</th>
                            <th>Date and Time</th>
                        </tr>
                    </thead>
                    <tbody>

					<?php
                                //check if the starting row variable was passed in the URL or not
                                if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
                                    //we give the value of the starting row to 0 because nothing was found in URL
                                $startrow = 0;
                                //otherwise we take the value from the URL
                                } else {
                                    $startrow = (int)$_GET['startrow'];
                                }
                        ?>
                        <?php
        $id=$_SESSION['userid'];
        $sql=mysql_query("select * from mail where receiver='$id' and RC=0 order by msg_id DESC LIMIT $startrow,10");


                     if ($no=mysql_num_rows($sql)) {
                         while ($row=mysql_fetch_array($sql)) {
                             if ($row['8']==1) {
                                 ?>
                        <tr class="tablename">
                            <td bgcolor="#ffffff"><input type="checkbox" class="messages" name="msg[]" value="<?php echo $row[0]; ?>">&nbsp;&nbsp;<span><img src="images/new.gif" style="width:35px;height:25px;"></span></td>
                            <td width="30%" bgcolor="#FFFFFF" >
                                <?php  echo idtoname1($row['1']); ?>
                            </td>
                            <td class="seemore" bgcolor="#FFFFFF">
                                <a href="inbox_view.php?msgid=<?php echo $row['0']; ?>">
                                    <?php echo $row['4']; ?>
                                </a>
                                <input type="text" value="<?php echo $row['0']; ?>" name="msgid" class="msgid" hidden="hidden">
                            </td>
                            <td width="10%" bgcolor="#FFFFFF">
                                <?php echo $row['7']; ?>
                            </td>
                        </tr>
                        <?php

                             } else {
                                 ?>
								<tr class="tablename">
                            <td><input type="checkbox" class="messages" name="msg[]" value="<?php echo $row[0]; ?>"></td>
                            <td width="30%">
                                <?php  echo idtoname1($row['1']); ?>
                            </td>
                            <td class="">
                                <a href="inbox_view.php?msgid=<?php echo $row['0']; ?>">
                                    <?php echo $row['4']; ?>
                                </a>
                                <input type="text" value="<?php echo $row['0']; ?>" name="msgid" class="msgid" hidden="hidden">
                            </td>
                            <td width="10%">
                                <?php echo $row['7']; ?>
                            </td>
                        </tr>
						<?php

                             }
                         }
                     } else {
    ?>
                            <td colspan="4" align="center"> No Message To display</td>
                            <?php
} ?>
                    </tbody>
                </table>
				<!--<input type="submit" name="delete" value="Delete" class="btn btn-Danger">-->
</form>
				<?php

//now this is the link..
if ($startrow<$no) {
    echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+10).'" class="btn btn-primary button">Next</a>';
}
?>
                <input type="button" id="he" value="Delete" class="btn btn-Danger" onclick="dele();">
                <?php


$prev = $startrow - 10;

//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0) {
    echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'" class="btn btn-primary button" style="float:right">Previous</a>';
}
?>
            </div>
        </div>
    </div>


    <?php

        function idtoname1($id)
        {
            $sql1="select * from user where user_id='$id'";
            $rs1=mysql_query($sql1);
            if (mysql_num_rows($rs1)) {
                $row1=mysql_fetch_array($rs1);
                return $row1['1']." ".$row1['2'];
            }
        }



    ?>
     <?php
        if (isset($_POST["msg"])) {
            if (!empty($_POST['msg'])) {
                foreach ($_POST['msg'] as $a) {
                    $sql="update mail set RC=1,r_uread=1 where msg_id='$a'";
                    $rs=mysql_query($sql);
                }
            }
        }



     ?>
        <!-- modal area  **********************************************************     -->



        <div class="modal fade" id="m" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="modalarea">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        Message
                    </div>
                    <div class="modal-body" id="display_msg">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>




        <script type="text/javascript" src="js/jquery.min.js"></script>

        <script>
        $(document).ready(function(){
          setInterval("reload()",3000);        })

        function reload(){
          $.ajax({
            url:"autorefresh.php",
            data:'username='+ 'hh',
            type:"POST",
            success: function(data){
              if(data==1)
              {
                //refresh the page
                location.reload();
              }
              else {

              }
            },
            error: function(){

            }
          })
        }


           /* $(".seemore").click(function() {
                //
                //alert($("#msgid").val());
                //var msgid = $(".msgid").val();

                var col = $(this).parent().children().index($(this));
                var row = $(this).parent().parent().children().index($(this).parent());

                //alert(row);
                var msgid = $("#tab tr").eq(row + 1).find("td").eq(1).find("input").val();






                //alert(msgid);

                var key = getkey(msgid);
                var enc_msg = getmsg(msgid);

                var original_msg = hello(enc_msg, key);
                $("#display_msg").html(original_msg);
                $("#m").modal('show');



            });*/
          /*  $("#he").click(function(){
                $("#delete_form").submit();
            }) */

            function dele(){
            var a=document.getElementsByName('msg[]');
            var b=$(":checkbox:checked").length;
            if(b==0)
            {
              alertify.log("Sorry please select at least 1 message to process");
              return false;
            }
              alertify.confirm("Are you sure ?", function (e) {
                if (e) {
        // user clicked "ok"
                          var id=[];
                          var a=7;
                          $('input[name="msg[]"]:checked').each(function() {
                            id.push(this.value);

                          });
                          $.ajax({
                            url:"multidelete.php",
                            data:'id='+id,
                            type:"POST",
                            success:function(data){
                              if(data==1)
                              {
                                alertify.success("Mail moved to Trash");

                                setInterval(function(){ location.reload(); }, 2000);


                              }
                            },
                            error: function(){

                            }
                          })
          } else {
        // user clicked "cancel"
        alertify.log("Delete task cancelled by the user");
        }
});


            }


        </script>




        <!-- *************************************************************************** -->
        <script src="js/jquery.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


</body>


</html>
