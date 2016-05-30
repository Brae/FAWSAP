<?php
//require_once 'dvwa/dvwa/includes/dvwaPage.inc.php';


$page = array(
		'title'           => 'SQL injection',
		'app_src'         => 'DVWA',
		'subtitle'        => 'Basic SQLi vulnerability',
		'intro'			  => '',
		'body'            => '',
		'help'			  => '',
		'output'		  => '',
		'scripts'		  => '',
		'required_db'     => 'challenges'
	);


require_once "./php/config_user.php";
$method='GET';

// Is PHP function magic_quotee enabled?
$WarningHtml = '';
if (ini_get('magic_quotes_gpc') == true) {
	$WarningHtml .= "<div class=\"warning\">The PHP function \"<em>Magic Quotes</em>\" is enabled.</div>";
}
// Is PHP function safe_mode enabled?
if (ini_get('safe_mode') == true) {
	$WarningHtml .= "<div class=\"warning\">The PHP function \"<em>Safe mode</em>\" is enabled.</div>";
}

$html = '';
if(isset($_REQUEST[ 'id' ])) {	
	// Get input
	$id = $_REQUEST[ 'id' ];

	// Check database
	$query  = "SELECT first_name, last_name, email FROM users WHERE uid = '$id';";
	$result = mysqli_query($db_user, $query ) or die( '<pre>' . mysqli_error() . '</pre>' );

	// Get results
	while ($row = mysqli_fetch_assoc($result)) {
		$first = $row['first_name'];
		$last = $row['last_name'];
		$email = $row['email'];
		$html .= "<pre>ID: {$id}<br />First name: {$first}<br />Surname: {$last}<br />Email: {$email}</pre>";
	}

	mysqli_close($db_user);
}

$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box box-primary'>";
$page['body'] .= "{$WarningHtml}";

$page['body'] .= "<form role='form' action='#' method=\"{$method}\">";
$page['body'] .= "<div class='box-body'>";
$page['body'] .= "<div class='form-group'>";
$page['body'] .= "<label for='nameinput'>Username:</label>";
$page['body'] .= "<input type='text' class='form-control' id='nameinput' placeholder='l33thax0r' size='15' name='id'>";
$page['body'] .= "</div></div>";
$page['body'] .= "<div class='box-footer'>";
$page['body'] .= "<button type='submit' class='btn btn-primary'>Submit</button>";
$page['body'] .= "</div>";
$page['body'] .= "</form>";
$page['body'] .= "{$html}</div></div></div>";




?>
