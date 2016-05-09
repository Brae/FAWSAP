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
      <?php include 'php/part_header.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include 'php/part_sidebar_timer.php'; ?>

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
                    	<?php include 'php/modal_confirm.php'; ?>
                    	<?php include 'php/modal_win.php'; ?>
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
      <?php include 'php/part_control_sidebar.php'; ?>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
      
      
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
			console.log("[object Object]No Success!");
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
