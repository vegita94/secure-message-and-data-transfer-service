<?php include_once "header_.php" ?>
<html>
  <head>
      <title>Login</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
      <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </head>
  <body style="">

    <!-- Textfield with Floating Label -->

    <div class="container col-md-4" style="margin-top:50px;" id="header1">
  <form name="loginform" method="POST" action="login_process.php" >
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

            <input class="mdl-textfield__input" type="text" id="emailid" name="email">
            <label class="mdl-textfield__label" for="sample3">May I know your email id please ?</label>


            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

              <input class="mdl-textfield__input" type="password" id="passwordid"  name="password">
              <label class="mdl-textfield__label" for="sample3">What is your Password?</label>


              </div>
              <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored" style="float:right" type="submit">
                <i class="material-icons">trending_flat</i>
              </button>




  </form>


    </div>




  </body>
</html>
