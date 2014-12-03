<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Qbon Xmas - 登入</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $WEB_CSS;?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $WEB_CSS;?>login.css" rel="stylesheet">
    
  </head>

  <body>
    <div class="container">
      <form class="form-signin" role="form" method="POST">
        <h2 class="form-signin-heading">Xmas後台</h2>
        <label for="inputEmail" class="sr-only">帳號</label>
        <input type="account" id="inputAccount" class="form-control" name="account" placeholder="Account" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
