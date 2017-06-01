<?php include_once "resources/header.php" ;
        include "database/des_db_con.php";
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Security Question</title>

    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
    <script type="text/javascript" src="resources/enc_key.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    
    
    <!-- bootstrap check -->
    
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <style type="text/css">

        #header1{
            
            background-color: aliceblue;
            border: 1px solid black;
            border-radius: 10px;
        }
        #msg{
            display: none;
        }
   

    </style>
    

</head>


<body>
    

    
<div class="container col-md-4" style="margin-top:50px;" id="header1">
    <form name="loginform" method="POST" action="cpwd.php" onSubmit="return sub();">
        <?php
			$email=$_POST['email'];
			
			  $sql="Select * from user where email='$email'";
			  $rs=mysql_query($sql);
			  if(mysql_num_rows($rs))
			    {
					$row=mysql_fetch_array($rs);
				 ?>
                  <p><?php echo $row[6]; ?></p>
				  <input type="hidden" name="email" value="<?php echo $email; ?>">
				  <input type="hidden" id="ans" name="dans" value="<?php echo $row[7] ?>">
		          <input type="text" id="dans" name="ans" placeholder="Enter Answer"><br/>
              <?php				 
			    }
			?>
            <button type="submit" class="btn btn-primary" style="display:inline-block;">Submit</button>            
</form>
        
</div>
    
    <?php 
        if(isset($_GET['msg']))
        {
            ?>
        <script type="text/javascript">
            
             document.getElementById("msg").style.display="block";
             $("#emailid").css('border-color','red');
             $("#emailid").focus();
            $("#passwordid").css('border-color','red');

            
        </script>
    
            <?php
        }
    
    ?>
    

    <script type="text/javascript">
        
        function sub()
		{
			var a= document.getElementById('ans').value;
			var d= document.getElementById('dans').value;
			if(a==d)
			{
				return true;
			}
			else
			{
				alert("answers do not match");
				return false;
			}
		}
        
        
        
        function login() {
            document.loginform.submit();
        }

    </script>
        <script src="resources/jquery.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="resources/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


</body>

</html>
