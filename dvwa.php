<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php 
	include('php/session.php');
	$result = mysqli_query($db, "SELECT * FROM challenges WHERE src LIKE '/dvwa/%';");
	$challenges = array();
	while($row = mysqli_fetch_assoc($result)) {
		$challenges[] = $row;
	}
	$encoded = json_encode($challenges);
	$encoded = htmlspecialchars($encoded);

	echo "<div id='challengeID' style='display:none;' data='".$encoded."'></div>";
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
  <body class="hold-transition skin-blue sidebar-mini" onload="main()">
    <div class="wrapper">

      <!-- Main Header -->
      <?php include 'php/part_header.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include 'php/part_sidebar.php'; ?>

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
                      <iframe id="dvwa" class="embed-responsive-item" src="./dvwa/"></iframe>
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
      				<p>Save results?</p>
      			</div>
      			<div class="modal-footer">
      				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      				<button type="button" class="btn btn-primary" onclick="save()" data-dismiss="modal" id="btn_modalconfirm">Save</button>
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


<script>
	var timer = new Timer();
var timeTaken = 0;
var charCount = 0;
var clickCount = 0;
var challengeWon = false;
var isChallenge = null;
var challengeInProgress = false;
var path = "";

function challengeCheck() {
    isChallenge = document.getElementById('dvwa').contentWindow.document.getElementById('challenge');
    if (isChallenge != null) {
    	if (!challengeInProgress) {
    		challengeInProgress = true;
    		$('#confirmmodal').modal('show');
    	}        
        winCheck();
    }
}

//wincheck for success tag
function winCheck() {
    var findWinTag = document.getElementById('dvwa').contentWindow.document.getElementById('success');
    if (findWinTag != null) {
        timeTaken = timer.getTotalTimeValues().seconds;
        timer.stop();
        $('#winmodal').modal('show');
        challengeWon = true;
        document.getElementById('dvwa').contentWindow.document.getElementById('success').style.color = "green";
        document.getElementById('timer').style.color = "green";
    }
}

//Temporary debugging function
function win() {
    timeTaken = timer.getTotalTimeValues().seconds;
    timer.stop();
    $('#winmodal').modal('show');
    challengeWon = true;
    document.getElementById('dvwa').contentWindow.document.getElementById('success').style.color = "green";
    document.getElementById('timer').style.color = "green";
}

function save() {
    //alert("Time Taken: " + timeTaken + "\nValue from timer: " + timer.getTotalTimeValues().seconds);#
    console.log("pathname from IFrame: " + document.getElementById("dvwa").contentWindow.location.pathname);
    var challID = getID(document.getElementById("dvwa").contentWindow.location.pathname);

    $.post("php/submitchallenge.php", {
        id: challID,
        username: $.trim($('#username').text()),
        time: timer.getTotalTimeValues().seconds,
        clicks: clickCount,
        chars: charCount
    }, function(data, status) {
    	challengeInProgress = false;
    	window.location = "./dvwa.php";
        

    })
}

function getID(path) {
    var div = document.getElementById("challengeID").getAttribute("data");
    var data = JSON.parse(div);

    var id = 0;
    for (i = 0; i < data.length; i++) {
        if (data[i].url == path) {
            id = data[i].id;
        }
    }
    return id;
}


function start() {
    startTimer();

    //add event listen for keypress (keydown cos keypressed not valid on IE)
    document.getElementById('dvwa').contentWindow.document.addEventListener("keydown", function() {
        console.log("KEY PRESSED");
        charCount++;
        console.log(charCount);
        document.getElementById("charCount").innerHTML = "CharCount: " + charCount;
    });

    //event for mouseclick
    document.getElementById('dvwa').contentWindow.document.addEventListener("click", function() {
        console.log("MOUSE CLICK");
        clickCount++;
        console.log(clickCount);
        document.getElementById("clickCount").innerHTML = "ClickCount: " + clickCount;

    });

}

//start timer on iframe instance
function startTimer() {
        timer.start();
        timer.addEventListener('secondsUpdated', function(e) {
            $('#timer').html(timer.getTimeValues().toString());
        });
}

//get iframe by id "mainframe"
function main() {
  setInterval(function() {
  	var iframeDVWA = document.getElementById("dvwa");
   	//if test exists then start timer
  	if (iframeDVWA) {
  		if (path != document.getElementById("dvwa").contentWindow.location.pathname) {
  			path = document.getElementById("dvwa").contentWindow.location.pathname;
        	challengeCheck();
       	}
    }  
  }, 1000);
}

	

</script>


  </body>
</html>
