<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php
include ('php/session.php');
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

		<!-- iCheck -->
		<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
		<!-- Morris chart -->
		<link rel="stylesheet" href="plugins/morris/morris.css">
		<!-- jvectormap -->
		<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<!-- Date Picker -->
		<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
			<?php
			include 'php/part_header.php';
			?>
			<!-- Left side column. contains the logo and sidebar -->
			<?php
			include 'php/part_sidebar.php';
			?>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1> FAWSAP <small>F*cking Awesome Web Security App Platform</small></h1>
					<ol class="breadcrumb">
						<li>
							<a href="#"><i class="fa fa-dashboard"></i> Level</a>
						</li>
						<li class="active">
							Here
						</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-aqua">
								<div class="inner">
									<?php
$res = mysqli_query($db, "SELECT * FROM challenges;");
$numChall = mysqli_num_rows($res);
echo "<h3>".$numChall."</h3><p>Challenges</p>"
									?>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-green">
								<div class="inner">
									<?php $res = mysqli_query($db, "SELECT COUNT(DISTINCT challengeid) AS total FROM scores WHERE username='" . $name . "';");
									$data = mysqli_fetch_assoc($res);
									if ($data["total"] != 0) {
										$perc = round(($data["total"] / $numChall) * 100, 0);
										echo "<h3>" . $perc . "<sup style='font-size:20px'>%</sup></h3>";
									} else {
										echo "<h3>0<sup style='font-size:20px'>%</sup></h3>";
									}
									?>
									<p>
										Challenges Completed
									</p>
								</div>
								<div class="icon">
									<i class="ion ion-stats-bars"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-yellow">
								<div class="inner">
									<h3>44th</h3>
									<p>
										User Leaderboard
									</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-red">
								<div class="inner">
									<h3>65</h3>
									<p>
										Unique Visitors
									</p>
								</div>
								<div class="icon">
									<i class="ion ion-pie-graph"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div><!-- ./col -->
					</div><!-- /.row -->
					<!-- Main row -->
					<div class="row">
						<!-- Left col -->
						<section class="col-lg-7 connectedSortable">
							<div class="box box-primary">
								<div class="box-header">
									<i class="fa fa-clock-o"></i>
									<h3 class="box-title">Time Spent per Challenge</h3>
									<div class="pull-right box-tools">
										<button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="box-body">
									<div class="chart" id="timeChart" style="position: relative; height: 300px;"></div>

								</div>
							</div><!-- /.nav-tabs-custom -->
						</section><!-- /.Left col -->
						<!-- right col (We are only adding the ID to make the widgets sortable)-->
						<section class="col-lg-5 connectedSortable">

							<!-- Map box -->
							<div class="box box-solid bg-light-blue-gradient">
								<div class="box-header">
									<!-- tools box -->
									<div class="pull-right box-tools">
										<button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
											<i class="fa fa-minus"></i>
										</button>
									</div><!-- /. tools -->

									<i class="fa fa-map-marker"></i>
									<h3 class="box-title"> phD Project Link </h3>
								</div>
								<div class="box-body">
									<div id="world-map" style="height: 250px; width: 100%;"></div>
								</div><!-- /.box-body-->
								<div class="box-footer no-border">
									<div class="row">
										<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
											<div id="sparkline-1"></div>
											<div class="knob-label">
												Visitors
											</div>
										</div><!-- ./col -->
										<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
											<div id="sparkline-2"></div>
											<div class="knob-label">
												Online
											</div>
										</div><!-- ./col -->
										<div class="col-xs-4 text-center">
											<div id="sparkline-3"></div>
											<div class="knob-label">
												Exists
											</div>
										</div><!-- ./col -->
									</div><!-- /.row -->
								</div>
							</div>
							<!-- /.box -->

						

						</section><!-- right col -->
					</div><!-- /.row (main row) -->

				</section><!-- /.content -->
				<!-- /.content -->
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
		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.5 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<!-- Morris.js charts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="plugins/morris/morris.min.js"></script>
		<!-- Sparkline -->
		<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="plugins/knob/jquery.knob.js"></script>
		<!-- daterangepicker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
		<script src="plugins/daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<!-- Slimscroll -->
		<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="plugins/fastclick/fastclick.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="dist/js/pages/dashboard.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>

		<?php
		$res = mysqli_query($db, "SELECT challengeid, SUM(time) as time FROM scores WHERE username='{$name}' GROUP BY challengeid;");
		if (mysqli_num_rows($res) > 0) {

			$labels = Array();
			$values = Array();
			while ($row = mysqli_fetch_assoc($res)) {
				$labels[] = $row['challengeid'];
				$values[] = $row['time'];
			}
			
			echo "<script>";
			echo "new Morris.Bar({element: 'timeChart', data: [";			
			for ($i=0; $i<count($labels); $i++) {
				echo "{challenge: '{$labels[$i]}', value: {$values[$i]}},";
			}
			echo "], xkey: 'challenge', ykeys: ['value'], labels: ['Time']}); </script>";
			
		}
		?>

		<!-- Optionally, you can add Slimscroll and FastClick plugins.
		Both of these plugins are recommended to enhance the
		user experience. Slimscroll is required when using the
		fixed layout. -->
	</body>
</html>
