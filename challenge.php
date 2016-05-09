<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

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
    
    <?php
include ('php/session.php');

$number = 0;
if (isset($_GET['n'])) {
	$_SESSION['n'] = $_GET['n'];
	$number = $_GET['n'];
} else {
	if (isset($_SESSION['n'])) {
		$number = $_SESSION['n'];
	} else {
		$number = 0;
	}
}

if (isset($_GET['playlist'])) {
	if ($_GET['playlist'] == "0") {
		$_SESSION['n'] = 0;
		$_SESSION['playlist'] = "";
		header('Location: ./index.php');
	} else {
		$_SESSION['current_playlist'] = $_GET['playlist'];
	}
}
if (isset($_SESSION['current_playlist'])) {
	$chall_sql = mysqli_query($db, "SELECT * FROM playlists WHERE name = '" . $_SESSION['current_playlist'] . "';");
	$challengeIDs = array();
	if (mysqli_num_rows($chall_sql) > 0) {
		$row = mysqli_fetch_assoc($chall_sql);
		$challengeIDs = explode(";", $row['challenges']);
		$temp = count($challengeIDs);
		$lookupsql = "SELECT * FROM challenges WHERE id=" . $challengeIDs[$number] . ";";
		$lookupresult = mysqli_query($db, $lookupsql);
		if (mysqli_num_rows($lookupresult) > 0) {
			$lookuprow = mysqli_fetch_assoc($lookupresult);
		}
	}
	echo "<div id='challengeID' style='display:none;'>" . $challengeIDs[$number] . "</div>";
} else if (isset($_GET['category'])) {
	$challengeIDs = array();
	$catResults = mysqli_query($db, "SELECT * FROM challenges WHERE category = '{$_GET['category']}';");
	while ($row = mysqli_fetch_assoc($db)) {
		$challengeIDs[] = $row['id'];
	}
	mysqli_data_seek($catResults,0);
	$lookuprow = mysqli_fetch_assoc($catResults);
}

include ('challenges/' . $lookuprow['src']);
 ?>
    
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    


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
    <div class="wrapper" id="mainframe">

      <!-- Main Header -->
      <?php
		include 'php/part_header.php';
 ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php
		include 'php/part_sidebar_timer.php';
 ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $page['title']; ?>
            <small><?php echo $page['app_src']; ?></small>
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
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title"><?php echo "{$page['subtitle']}" ?></h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                 
                  <div class="box-body" id="challengecanvas">
                  	<div id="answerbox" class="hidden">
        	
        			</div>
                  	<?php echo $page['scripts']; ?>
                    <!-- START IFRAME-->
                    <?php echo $page['body']; ?>
                    <!--END IFRAME-->
                    
                    <!-- Hidden box for loaded challenges to use if needed -->
        			
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
            
            <?php echo $page['help'];
			include 'php/modal_confirm.php';
			include 'php/modal_win.php';
            ?>
            


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
      <?php
		include 'php/part_control_sidebar.php';
 ?>
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
  	<script src="js/custom.js"></script>
  	<?php
	echo "<script>";
	echo "function save() {";
	echo "$.post('php/submitchallenge.php', {";
	echo "id : {$challengeIDs[$number]},";
	echo "username : $.trim($('#username').text()),";
	echo "time : sessionStorage.time,";
	echo "clicks : sessionStorage.clickCount,";
	echo "chars : sessionStorage.charCount";
	echo "}, function(data, status) {";
	if ($number + 1 < count($challengeIDs) - 1) {
		$n = $number + 1;
		echo "window.location = './challenge.php?n={$n}';";
	} else {
		echo "window.location = './challenge.php?playlist=0';";
	}
	echo "});}</script>";
  	?>
  	
  	<script>launch();</script>
  </body>
</html>
