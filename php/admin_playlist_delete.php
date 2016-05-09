<?php
$targetID = $_POST['id'];

include './config.php';

$result = mysqli_query($db, "DELETE FROM playlists WHERE id={$targetID};");

if ($result) {
	echo "SUCCESS";
} else {
	echo "FAIL";
}


?>