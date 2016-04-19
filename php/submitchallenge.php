<?php
    include('config.php');
	$sql = "INSERT INTO scores (challengeid, username, time, clickcount, charcount) VALUES (".$_POST['id'].", '".$_POST['username']."', ".$_POST['time'].", ".$_POST['clicks'].", ".$_POST['chars'].");";
	$res = mysqli_query($db,$sql);
	if($res) {
		echo "Success: ".$sql;
	} else {
		echo "Fail: ".$sql;
	}
?>