<?php include_once "resources/header.php" ?>
<?php include "database/des_db_con.php"; ?>
<?php session_start() ?>
<html>

<head>

    <title>Inbox</title>
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
    <script type="text/javascript" src="resources/enc_key.js"></script>
    <script type="text/javascript" src="resources/decrypt.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/reg_script.js"></script>

    <!-- bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <style>
        #mailbox {
            margin: 5px;
            background-color: antiquewhite;
            border-radius: 10px;
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

    </style>

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="background-color:blue">
                This area reserved for sitemap only
            </div>

            <div class="col-md-9" id="mailbox">
                <span>Inbox</span>
                <table class="table table-striped " id="tab">
                    <thead>
                        <tr>

                            <th>Sender</th>
                            <th>Subject</th>
                            <th>Date and Time</th>
                        </tr>
                    </thead>
                    <tbody>
					<?PHP
								//check if the starting row variable was passed in the URL or not
								if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
								//we give the value of the starting row to 0 because nothing was found in URL
								$startrow = 0;
								//otherwise we take the value from the URL
							}else {
								$startrow = (int)$_GET['startrow'];
								}
                        ?>
                        <?php 
                             $id=$_SESSION['userid'];
                              $sql=mysql_query("select * from mail where receiver='$id' order by msg_id DESC LIMIT $startrow,10");
					 
					 
					 if(mysql_num_rows($sql))
                         {
						 while($row=mysql_fetch_array($sql))
						 {

                        ?>
                        <tr>

                            <td width="30%">
                                <?php  echo idtoname($row['1']); ?>
                            </td>
                            <td class="seemore">
                                <a href="#">
                                    <?php echo $row['4'];  ?>
                                </a>
                                <input type="text" value="<?php echo $row['0']; ?>" name="msgid" class="msgid" hidden="hidden">
                            </td>
                            <td width="10%">
                                <?php echo $row['1'];  ?>
                            </td>
                        </tr>
                        <?php
                             
                         }
                         }
else
{
    ?>
                            <td> No Message To display</td>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?PHP
//now this is the link..
echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+10).'">Next</a>';
?>

<?PHP
$prev = $startrow - 10;

//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0)
    echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'">Previous</a>';
?>

    <?php
    
        function idtoname($id)
        {
            $sql1="select * from user where user_id='$id'";
            $rs1=mysql_query($sql1);
            if(mysql_num_rows($rs1))
            {
                $row1=mysql_fetch_array($rs1);
                return $row1['2'];
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





        <script>
            $(".seemore").click(function() {
                //
                //alert($("#msgid").val());
                //var msgid = $(".msgid").val();

                var col = $(this).parent().children().index($(this));
                   var row = $(this).parent().parent().children().index($(this).parent());

                //alert(row);
                var msgid=$("#tab tr").eq(row+1).find("td").eq(1).find("input").val();
                
               




                //alert(msgid);

                    var key = getkey(msgid);
                    var enc_msg = getmsg(msgid);

                    var original_msg = hello(enc_msg, key);
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
