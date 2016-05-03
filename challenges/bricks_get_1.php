<?php
$page = array(
'title' => 'GET Parameters', 
'title_separator' => ' :: ', 
'app_src' => '', 
'subtitle' => 'GET Vulnerability #1', 
'body' => '', 
'page_id' => '', 
'help_button' => '', 
'source_button' => '', 
'required_db' => 'inject'
);
$page['page_id'] = 'sqli';
$page['help_button'] = 'sqli';
$page['source_button'] = 'sqli';

$DB_USER_SERVER = 'localhost';
$DB_USER_USERNAME = 'user';
$DB_USER_PASSWORD = '5H4C9wKxoTdh';
$DB_USER_DATABASE = $page['required_db'];
$db_user = mysqli_connect($DB_USER_SERVER, $DB_USER_USERNAME, $DB_USER_PASSWORD, $DB_USER_DATABASE);

$id = "";
if (isset($_GET['id'])) {
	$id = $_GET['id'];

} else {
	$id = 0;
}

$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box box-primary'>";
$page['body'] .= "<div class='box-body'>";
$page['body'] .= "<table class='table'><tbody>";
$sql = "SELECT * FROM users WHERE idusers=$id LIMIT 1";
$result = mysqli_query($db_user, $sql);
if ($content = mysqli_fetch_assoc($result)) {
	$page['body'] .= "<tr><td><b>User ID</b></td><td>" . $content['idusers'] . "</td></tr>";
	$page['body'] .= "<tr><td><b>Username</b></td><td>" . $content['name'] . "</td></tr>";
	$page['body'] .= "<tr><td>E-mail</b></td><td>" . $content['email'] . "</td></tr>";
} else if (!$result) {
	echo "Database query failed!";
} else {
	echo "Error! User does not exist.";
}
$page['body'] .= "</tbody></table></div></div></div></div>";
?>