<?php
//require_once 'dvwa/dvwa/includes/dvwaPage.inc.php';


$page = array(
		'title'           => 'DVWA',
		'title_separator' => ' :: ',
		'app_src'         => 'Damn Vulnerable Web App',
		'subtitle'        => 'Vulnerability - SQL Injection',
		'body'            => '',
		'page_id'         => '',
		'help_button'     => '',
		'source_button'   => '',
		'required_db'     => 'dvwa'
	);
$page['page_id'] = 'sqli';
$page['help_button'] = 'sqli';
$page['source_button'] = 'sqli';

#$db_user = mysqli_connect(DB_USER_SERVER, DB_USER_USERNAME, DB_USER_PASSWORD, $page['required_db']);
require_once "dvwa/vulnerabilities/sqli/source/low.php";
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
$page['body'] .= "{$html}</div></div>\n";




?>