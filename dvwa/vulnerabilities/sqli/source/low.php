<?php
$DB_USER_SERVER = 'localhost';
$DB_USER_USERNAME = 'user';
$DB_USER_PASSWORD = '5H4C9wKxoTdh';
$DB_USER_DATABASE = "dvwa";
$db_user = mysqli_connect($DB_USER_SERVER, $DB_USER_USERNAME, $DB_USER_PASSWORD, $DB_USER_DATABASE);
//define as a challenge
$html = "";
if( isset( $_REQUEST[ 'id' ] ) ) {
	
	// Get input
	$id = $_REQUEST[ 'id' ];

	// Check database
	$query  = "SELECT first_name, last_name FROM users WHERE user_id = '$id';";
	$result = mysqli_query($db_user, $query ) or die( '<pre>' . mysqli_error() . '</pre>' );

	// Get results
	while ($row = mysqli_fetch_assoc($result)) {
		$first = $row['first_name'];
		$last = $row['last_name'];
		$html .= "<pre>ID: {$id}<br />First name: {$first}<br />Surname: {$last}</pre>";
	}

	mysqli_close($db_user);
}

?>
