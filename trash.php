<?php
session_start();
 if (isset($_SESSION['username'])) {
     include_once "header.php" ;
     include_once("resources/profile_box.php")   ;
     include "database/des_db_con.php";
         //include_once("resources/loader.php")   ;
 } else {
     die("Please login to view this page");
 } ?>
<html>

<head>

    <title>Trash</title>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans+Condensed:300|Roboto+Slab" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
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

    .button {
        margin: 5px;
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
    <script>
    $(window).on('load', function(){
        $(".se-pre-con").fadeOut("slow");
        });


    </script>
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

            <div class="col-md-8" id="mailbox">
                <span id="title"><b>Trash</b></span>
				<form name="delete" action="#" method="post">
                <table class="table table-striped " id="tab">
                    <thead>
                        <tr>
							              <th><input type="checkbox" id="master" onChange="togglecheckboxes(this,'msg[]')"></th>
                            <th>From</th>
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
                              $sql=mysql_query("select * from mail where (receiver='$id' and RC=1) or (sender='$id' and SC=1) order by msg_id DESC LIMIT $startrow,10");


                     if ($no=mysql_num_rows($sql)) {
                         while ($row=mysql_fetch_array($sql)) {
                             ?>
                        <tr class="tablename">
								<td><input type="checkbox" class="messages" name="msg[]" value="<?php echo $row[0]; ?>"></td>

                                <td>
                                        <input type="text" name="input" value="<?php echo $row['0'] ?>" hidden="hidden">
                                        <?php  echo idtoname($row['1']); ?>

                                </td>

                                <td class="seemore">
                                    <a href="#">
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
                     } else {
                         ?>
                                <td colspan="4"> <span style="margin-left:30%">No Message To display</span></td>
                                <?php

                     } ?>
                    </tbody>
                </table>

</form>
                <?php
//now this is the link..
if ($startrow<$no) {
    echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+10).'" class="btn btn-primary button">Next</a>';
}
?>
                <input type="button" id="he" value="Delete" class="btn btn-Danger" onclick="dele();">
				<input type="button" id="he" value="Restore" class="btn btn-Primary" onclick="restore();">
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

        function idtoname($id)
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
        if (isset($_POST["delete"])) {
            if (!empty($_POST['msg'])) {
                foreach ($_POST['msg'] as $a) {
                    $sql4="delete from trash where msg_id='$a'";
                    $rs4=mysql_query($sql4);
                }
            }
        }
     ?>
            <!-- modal area  **********************************************************     -->



            <div class="modal fade" id="m" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
            function dele()
            {
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
                            url:"tmultidelete.php",
                            data:'id='+id,
                            type:"POST",
                            success:function(data){
                              if(data==1)
                              {
                                alertify.success("Mail deleted successfully");

                                setInterval(function(){ location.reload(); }, 2000);


                              }
							  else
							  alert(data);
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
			<script>
            function restore()
            {
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
                            url:"restore.php",
                            data:'id='+id,
                            type:"POST",
                            success:function(data){
                              if(data==1)
                              {
                                alertify.success("Mail restored successfully");

                                setInterval(function(){ location.reload(); }, 2000);


                              }
							  else
							  alert(data);
                            },
                            error: function(){

                            }
                          })
          } else {
        // user clicked "cancel"
        alertify.log("Restore task cancelled by the user");
        }
});


            }


            </script>




            <script>
                $(".seemore").click(function() {
                    //
                    //alert($("#msgid").val());
                    //var msgid = $(".msgid").val();

                    var col = $(this).parent().children().index($(this));
                    var row = $(this).parent().parent().children().index($(this).parent());

                   // alert(row);
                    var msgid = $("#tab tr").eq(row + 1).find("td").eq(1).find("input").val();






                    //alert(msgid);

                    var key = getkey(msgid);
                    var enc_msg = getmsg(msgid);
                    var original_msg = hello1(enc_msg, key);
                    $("#display_msg").html(original_msg);
                    $("#m").modal('show');



                });

            </script>




            <!-- *************************************************************************** -->

            <script src="js/jquery.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
            <script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
            <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>


</html>
