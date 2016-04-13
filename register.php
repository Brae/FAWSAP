<!DOCTYPE html>

<?php
  include("php/config.php");
  $options = [
    'cost' => 11,
  ];
  $passwordfrompost = $_POST['password'];
  $hash = password_hash($passwordfrompost, PASSWORD_BCRYPT, $options);
  $name = $_POST['name'];
  $email = $_POST['email'];

  $sql = "INSERT INTO users (email, password, name) VALUES ('".$email."','".$hash."','".$name."')";
  if(!mysqli_query($db,$sql)) {
      echo "Error creating record";
  }

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <div class="row" id="divalert"></div>
        <form action="register.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="txtname" placeholder="Display name" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" id="txtemail" placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="txtpassword" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="txtpasswordconfirm" placeholder="Retype password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <a href="login.php" class="text-center">I already have a membership</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="button" onclick="mysubmit()" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>


      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <script>
    function mysubmit() {
      if (document.getElementById("txtname").value != "") {
        if (document.getElementById("txtemail").value != "") {
          if (document.getElementById("txtpassword").value != "") {
            if (document.getElementById("txtpassword").value == document.getElementById("txtpasswordconfirm").value) {
              var txtpassword = document.getElementById("txtpassword").value;
              var txtname = document.getElementById("txtname").value;
              var txtemail = document.getElementById("txtemail").value;
              $.post("register.php", {name:txtname,email:txtemail,password:txtpassword}, null);
              document.getElementById("divalert").innerHTML = "<div class='info-box bg-green'><span class='info-box-icon bg-green'><i class='fa fa-thumbs-o-up'></i></span><div class='info-box-content'><span class='info-box-text'>Done!</span><span class='info-box-number'>You will now be redirected to the login page</span></div></div>";
              setTimeout(function() {window.location="login.php";}, 2500);

            } else {
              document.getElementById("divalert").innerHTML = "<div class='info-box bg-red'><span class='info-box-icon bg-red'><i class='fa fa-exclamation-circle'></i></span><div class='info-box-content'><span class='info-box-text'>Error creating account</span><span class='info-box-number'>Passwords are different</span></div></div>";
            }
          } else {
            document.getElementById("divalert").innerHTML = "<div class='info-box bg-red'><span class='info-box-icon bg-red'><i class='fa fa-exclamation-circle'></i></span><div class='info-box-content'><span class='info-box-text'>Error creating account</span><span class='info-box-number'>Must enter password</span></div></div>";
          }
        } else {
          document.getElementById("divalert").innerHTML = "<div class='info-box bg-red'><span class='info-box-icon bg-red'><i class='fa fa-exclamation-circle'></i></span><div class='info-box-content'><span class='info-box-text'>Error creating account</span><span class='info-box-number'>Must enter an email address</span></div></div>";
        }
      } else {
        document.getElementById("divalert").innerHTML = "<div class='info-box bg-red'><span class='info-box-icon bg-red'><i class='fa fa-exclamation-circle'></i></span><div class='info-box-content'><span class='info-box-text'>Error creating account</span><span class='info-box-number'>Must enter a display name</span></div></div>";
      }


    }
    </script>

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
