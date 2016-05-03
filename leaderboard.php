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
					<h1> DVWA <small>Damn Vulnerable Web App</small></h1>
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

					<!-- Main row -->
					<div class="row">
						<!-- Left col -->
						<div class="col-md-12">

							<?php $res = mysqli_query($db, "SELECT DISTINCT challengeid FROM scores");
							$numChall = mysqli_num_rows($res);
							$idList = array();
							while ($row = mysqli_fetch_assoc($res)) {
								$idList[] = $row["challengeid"];
							}

							for ($i = 0; $i < $numChall; $i++) {
								$res = mysqli_query($db, "SELECT * FROM scores WHERE challengeid=" . $idList[$i] . " ORDER BY time;");
								echo "<div class='box box-primary'>";
								echo "<div class='box-header with-border'>";
								echo "<h3 class='box-title'>Challenge ID: " . $idList[$i] . "</h3>";
								echo "<div class='box-tools pull-right'>";
								echo "<button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>";
								echo "<button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>";
								echo "</div></div>";

								echo "<div class='box-body table-responsive no-padding'>";
								echo "<table class='table table-hover'>";
								echo "<tbody>";
								echo "<tr>";
								echo "<th>Username</th>";
								echo "<th>Time Taken</th>";
								echo "<th>Clicks</th>";
								echo "<th>Characters Typed</th>";
								echo "</tr>";

								$ii = 0;
								while ($row = mysqli_fetch_assoc($res)) {
									if ($ii >= 10) {
										break;
									} else {
										echo "<tr>";
										echo "<td>" . $row["username"] . "</td>";
										echo "<td>" . $row["time"] . "</td>";
										echo "<td>" . $row["clickcount"] . "</td>";
										echo "<td>" . $row["charcount"] . "</td>";
										echo "</tr>";
									}
									$ii++;
								}
								echo "</tbody>";
								echo "</table>";
								echo "</div>";
								echo "</div>";
							}
							?>

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
	</body>
</html>
