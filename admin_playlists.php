<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php
include ('php/session.php');
if ($row['isadmin'] != true) {
	header("Location: index.php");
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>FAWSAP | v.1337</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
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
					<h1> Administration <small>Playlist Configuration</small></h1>
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
					
					<div class="row">
						<div class="col-md-2 col-md-offset-5">
							<a class="btn btn-default" href="admin_playlists.php?edit=">Create new playlist</a>
						</div>
					</div>
					<br />
					<!-- Main row -->
					<div class="row">
						<!-- Left col -->
						<div class="col-md-12">

							<?php 
							
							if (isset($_GET['edit'])) { // If a specific playlist has been opened for editing
								$GETParam = $_GET['edit'];
								if ($GETParam == '') { // No file parameter, create new playlist
									echo 	"<div class='box box-primary'>
												<div class='box-header'>
													<h3 class='box-title'>Create new playlist</h3>										
												</div>
												<form role='form' action='php/admin_playlist_create.php' method='POST'> 
													<div class='box-body'>
														<div class='form-group'>
															<label for='playlistname'>Enter playlist name. Max. 128 characters.</label>
															<input type='text' class='form-control' id='playlistname' name='name' placeholder='Example' size='15'>
														</div>
														<div class='form-group'>
															<label for='challengelist'>Enter the IDs for the challenges to make up the playlist.<br />N.B. Each ID value MUST be separated using a semi-colon, <b>and a semi-colon must be added at the end of the list</b></label>
															<input type='text' class='form-control' id='challengelist' name='challenges' placeholder='1;2;3;' size='15'>
														</div>
														<input type='hidden' value='{$name}' name='creator'>
													</div>
													<div class='box-footer'>
														<button type='submit' class='btn btn-primary'>Save</button>
													</div>
												</form>
											</div>";
								} else {
									
								}								
							} else { // If no playlist has been chosen, display all of the playlists
								$result = mysqli_query($db, "SELECT * FROM playlists;");
								while ($row = mysqli_fetch_assoc($result)) {
									echo "	<div class='box collapsed-box'>
												<div class='box-header'>
													<h3 class='box-title'>Playlist: {$row['name']}</h3>
													<div class='box-tools pull-right'>
														<button class='btn btn-box-tool' data-widget='collapse'>
															<i class='fa fa-plus'><span>&nbsp;View</span></i>
														</button>
														<button class='btn btn-box-tool btn-danger' onclick=\"$.post('php/admin_playlist_delete.php', {id : {$row['id']}}, function(data, status) {if (data=='SUCCESS') {window.location = './admin_playlists.php';} else {alert('Deletion failed. Please try again.')}});\">
															<i class='fa fa-times'><span class='label'>&nbsp;Delete</span></i>
														</button>
													</div>
												</div>
												<div class='box-body table-responsive no-padding'>
													<table class='table table-hover'>
														<tbody>
															<tr>
																<th>Playlist ID</th>
																<th>Name</th>
																<th>Challenge IDs</th>
																<th>Created By</th>
															</tr>
															<tr>
																<td>{$row['id']}</td>
																<td>{$row['name']}</td>
																<td>{$row['challenges']}</td>
																<td>{$row['creator']}
															</tr>
														</tbody>
													</table>
												</div>
											</div>";
									}
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
	</body>
</html>
