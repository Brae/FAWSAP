<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php
include ('php/session.php');
$chall_sql = mysqli_query($db, "SELECT * FROM challenges WHERE difficulty = 1;");
$challengeUrls = array();
$challengeIDs = array();
if (mysqli_num_rows($chall_sql) > 0) {
	while ($row = mysqli_fetch_assoc($chall_sql)) {
		$challengeUrls[] = $row["url"];
		$challengeIDs[] = $row["id"];
	}
}
$number = 0;
if (isset($_GET['n'])) {
	if ($_GET['n'] < mysqli_num_rows($chall_sql)) {
		$number = $_GET['n'];
	}
}
echo "<div id='challengeID' style='display:none;'>" . $challengeIDs[$number] . "</div>";
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FAWSAP | v.1337</title>
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
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>FAWSAP</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>FAWSAP</b> | v.1337</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <!-- The message -->
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul><!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li><!-- /.messages-menu -->

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li><!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks Menu -->
              <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- Inner menu: contains the tasks -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <!-- Task title and progress text -->
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <!-- The progress bar -->
                          <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress -->
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p id="username">
                      <?php echo $name; ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat"  onclick="parent.location='index.php?logout=TRUE'">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $name; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN</li>
            <li><a href="./index.php"><i class="fa fa-link"></i> <span>Home</span></a></li>
            <li class="header">APPS</li>
            <!-- Optionally, you can add icons to the links -->
			<li><a href="./bricks.php"><i class="fa fa-link"></i> <span>Bricks</span></a></li>
            <li><a href="./dvwa.php"><i class="fa fa-link"></i> <span>DVWA</span></a></li>
            <li><a href="./xvwa.php"><i class="fa fa-link"></i> <span>XVWA</span></a></li>
            <li><a href="./leaderboard.php"><i class="fa fa-bar-chart"></i> <span>LeaderBoard</span></a></li>
            <li class="header">CHALLENGES</li>
            <li class="active"><a href="./easy.php?n=0"><i class="fa fa-link"></i> <span>Easy</span></a></li>
            <li class="header">TIMER</li>
          	<li ><a class="avoid-clicks" href="#"><i class="fa fa-clock-o"></i><span style="color:red;" id="timer">00:00:00</span></a></li>
          	<li><a href="#"><i class="fa fa-keyboard-o"></i><span  style="color:white;" id="charCount">CharCount:</span></a></li>
          	<li><a href="#"><i class="fa fa-mouse-pointer"></i><span style="color:white;" id="clickCount">ClickCount:</span></a></li>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DVWA
            <small>Damn Vulnerable Web App</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">




            <!-- Main row -->
            <div class="row">
              <!-- Left col -->
              <div class="col-md-12">


                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">DVWA - Damn Vulnerable Web App</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <!-- START IFRAME-->

                    <div class="embed-responsive embed-responsive-4by3">
                      <iframe id="mainframe" name="mainframe" class="embed-responsive-item" src="<?php echo $challengeUrls[$number]; ?>" onload="winCheck();"></iframe>
                    </div>
                    <!--END IFRAME-->
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer text-center">
                    <a href="javascript::;" class="uppercase">END FOOTER</a>
                  </div>
                  <!-- /.box-footer -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
            </div>


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
      
      <div class="modal fade" tabindex="-1" id="confirmmodal" role="dialog">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4>Please confirm when you are ready to start</h4>
      			</div>
      			<div class="modal-body">
      				<p>This will start the timer and keystroke monitoring on the challenge</p>
      			</div>
      			<div class="modal-footer">
      				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      				<button type="button" class="btn btn-primary" onclick="start()" data-dismiss="modal" id="btn_modalconfirm">Begin</button>
      			</div>
      		</div>
      	</div>
      </div>
      
      <div class="modal fade" tabindex="-1" id="winmodal" role="dialog">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4>Challenge Complete</h4>
      			</div>
      			<div class="modal-body">
      				<p>Move on to next challenge?</p>
      			</div>
      			<div class="modal-footer">
      				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      				<button type="button" class="btn btn-primary" onclick="save()" data-dismiss="modal" id="btn_modalconfirm">Next</button>
      			</div>
      		</div>
      	</div>
      </div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->

  	<script src="js/easytimer.min.js"></script>
         
    <script type="text/javascript">
		$(window).load(function() {
			$('#confirmmodal').modal('show');
		})
    </script>





<script>
	function setDVWALow() {
		var origin = document.getElementById("mainframe").contentWindow.location.href;
		$('body').append('<form action="./dvwa/index.php" method="post" target="mainframe" id="postToIframe"></form> ');
		$('#postToIframe').append('<input type="hidden" name="security" value="low" />');
		$('#postToIframe').submit().remove();
		var iframe = document.getElementById("mainframe");
		//iframe.src = 'data:text/html;charset=utf-8,' + encodeURI("<html><head><meta http-equiv='refresh' content='0; " + origin + "' /></head></html>");
		document.getElementById("mainframe").contentWindow.location = origin;
		//document.getElementById("dvwa").contentWindow.location.href = origin;
	}

	//wincheck for success tag
	var winCheck = function() {
		var findWinTag = document.getElementById('mainframe').contentWindow.document.getElementById('success');
		if (findWinTag != null) {
			console.log("Success!");
			timeTaken = timer.getTotalTimeValues().seconds;
			timer.stop();			
			$('#winmodal').modal('show');
			challengeWon = true;
			document.getElementById('mainframe').contentWindow.document.getElementById('success').style.color = "green";
			document.getElementById('timer').style.color = "green";
		} else {
			console.log("No Success!");
		}
	}
	
	function win() {
		timeTaken = timer.getTotalTimeValues().seconds;
			timer.stop();			
			$('#winmodal').modal('show');
			challengeWon = true;
			document.getElementById('mainframe').contentWindow.document.getElementById('success').style.color = "green";
			document.getElementById('timer').style.color = "green";
	}
	//add charcount counter
	var timer = new Timer();
	var timeTaken = 0;
	var charCount = 0;
	var clickCount = 0;
	var challengeWon = false;
	var challengeCheck = function() {

		var isChallenge = document.getElementById('mainframe').contentWindow.document.getElementById('challenge');

		if (isChallenge != null) {
			if (challengeWon == true) {
				timeTaken = timer.getTotalTimeValues().seconds;
				timer.stop();
			}

		}
	}
	var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
		    sURLVariables = sPageURL.split('&'),
		    sParameterName,
		    i;

		for ( i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};

	var save = function() {
		//alert("Time Taken: " + timeTaken + "\nValue from timer: " + timer.getTotalTimeValues().seconds);
		$.post("php/submitchallenge.php", {
			id : $('#challengeID').text(),
			username : $.trim($('#username').text()),
			time : timer.getTotalTimeValues().seconds,
			clicks : clickCount,
			chars : charCount
		}, function(data, status) {
			if (getUrlParameter('n') == undefined) {
				window.location = "./easy.php?n=0";
			} else {
				window.location = "./easy.php?n=" + (parseInt(getUrlParameter('n'), 10) + 1);
			}

		})
	}
	function start() {
		startTimer();

		//add event listen for keypress (keydown cos keypressed not valid on IE)
		document.getElementById('mainframe').contentWindow.document.addEventListener("keydown", function() {
			console.log("KEY PRESSED");
			charCount++;
			console.log(charCount);
			document.getElementById("charCount").innerHTML = "CharCount: " + charCount;
		});

		//event for mouseclick
		document.getElementById('mainframe').contentWindow.document.addEventListener("click", function() {
			console.log("MOUSE CLICK");
			clickCount++;
			console.log(clickCount);
			document.getElementById("clickCount").innerHTML = "ClickCount: " + clickCount;

		});

	}

	//start timer on iframe instance
	var startTimer = function() {

		timer.start();
		timer.addEventListener('secondsUpdated', function(e) {
			$('#timer').html(timer.getTimeValues().toString());
		});
	}
	//get iframe by id "mainframe"
	var iframeDVWA = document.getElementById("mainframe");
	//if test exists then start timer
	if (iframeDVWA) {
		challengeCheck();
	}

</script>


  </body>
</html>
