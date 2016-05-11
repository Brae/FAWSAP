<?php
    include('config.php');
	$used_help = 0;
	if ($_POST['help'] == true) {
		$used_help=1;
	}
	$sql = "INSERT INTO scores (challengeid, username, time, clickcount, charcount, usedhelp) VALUES ({$_POST['id']}, '{$_POST['username']}', {$_POST['time']}, {$_POST['clicks']}, {$_POST['chars']}, {$used_help});";
	$res = mysqli_query($db,$sql);
	if($res) {
		echo "Success: ".$sql;
	} else {
		echo "Fail: ".$sql;
	}
?>