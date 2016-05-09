<?php
	include './config.php';
	
	$result = mysqli_query($db, "INSERT INTO playlists (name, challenges, creator) VALUES ('{$_POST['name']}','{$_POST['challenges']}','{$_POST['creator']}')");


	if ($result) {
		echo "SUCCESS";
	} else {
		echo "FAIL";
	}
	
	header('Location: ../admin_playlists.php');
?>