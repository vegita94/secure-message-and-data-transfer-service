<?php include_once "resources/header.php" ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>User Register page</title>
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
    <script type="text/javascript" src="resources/enc_key.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <style type="text/css">
        #header1 {
            background-color: aliceblue;
            border: 1px solid black;
            border-radius: 10px;
            margin-top: 10px;
        }
        
        #password_help {
            display: none;
        }
        
        #re_password_help {
            display: none;
        }
        .status-available{color:#2FC332;}
        .status-not-available{color:#D60202;}

    </style>

</head>

<body>

    <div class="container col-md-4" id="header1">
        <form name="uregister" method="POST" action="regis_process.php">

            <div class="form-group">
                <label for="u_fname">Enter First Name</label>
                <input type="text" class="form-control" id="u_fname" aria-describedby="usernamehelp" placeholder="First Name" name="fname"  required>

            </div>
            
            <div class="form-group">
                <label for="u_sname">Enter Last Name</label>
                <input type="text" class="form-control" id="u_sname" aria-describedby="usernamehelp" placeholder="Enter Last name" name="sname" required>

                
            </div>
            
            <div class="form-group">
                <label for="u_username">Username</label>
                <input type="text" class="form-control" id="u_username" aria-describedby="usernamehelp" placeholder="Choose a username" name="username" onBlur="checkusername();" required>

                <small id="usernamehelp" class="form-text text-muted"><span id="status"></span></small>
            </div>


            <div class="form-group">
                <label for="emailid">Email</label>

                <input type="email" class="form-control" id="emailid" aria-describedby="emailHelp" placeholder="Enter your email address" name="email" onBlur="checkemail();" required>

                <small id="emailHelp" class="form-text text-muted"><span id="emailmsg"></span></small>
            </div>


            <div class="form-group">
                <label for="emailid">Password</label>

                <input type="password" class="form-control" id="u_pwd" aria-describedby="password_help" placeholder="Enter your password" name="u_pwd" required>

                <small id="password_help" class="form-text text-muted"><span style="color:red;">Password should have 1 small, 1 capital letter with a number</span></small>
            </div>

            <div class="form-group">
                <label for="emailid">Re-Password</label>

                <input type="password" class="form-control" id="u_repwd" aria-describedby="re_password_help" placeholder="Enter your password" name="u_repwd" required>

                <small id="re_password_help" class="form-text text-muted"><span style="color:red;">Passwords are not macthing , Please check again !!</span></small>
            </div>

            <label for="u_s_ques">Select a secret question </label>
            <select class="form-control" id="u_s_ques" name="s_ques">
                <option disabled selected>--Select a security question!--</option>
                <option>What was the first book i ever read?</option>
                <option>What was the first company i ever worked for?</option>
                <option>What is my partner's middle name?</option>
                <option>What is the first name of my oldest cousin?</option>
                
            </select>

            <div class="form-group">
                <label for="answ"></label>

                <input type="text" class="form-control" id="answ" aria-describedby="password_help" placeholder="Enter your answer" name="answ" required>

                <small id="password_help" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <button type="submit" class="btn btn-primary" style="display:inline-block;" id="btn" onclick="return check();">Register</button>


        </form>
    </div>
   




    <script type="text/javascript" src="js/reg_script.js"></script>




    <script src="js/jquery.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>

</html>
