<?php
$page = array(
		'title'           => 'XVWA',
		'title_separator' => ' :: ',
		'app_src'         => 'Xtreme Vulnerable Web Application',
		'subtitle'        => 'Vulnerability - SQL Injection',
		'body'            => '',
		'page_id'         => '',
		'help_button'     => '',
		'source_button'   => '',
		'required_db'     => 'xvwa'
	);
$page['page_id'] = 'sqli';
$page['help_button'] = 'sqli';
$page['source_button'] = 'sqli';

$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box box-primary'>";

$page['body'] .= "<form role='form' action='#' method='POST'>";
$page['body'] .= "<div class='box-body'>";
$page['body'] .= "<div class='form-group'>";
$page['body'] .= "<select class='form-control' name='item'><option value=''>Select Item Code</option>";

$DB_USER_SERVER = 'localhost';
$DB_USER_USERNAME = 'user';
$DB_USER_PASSWORD = '5H4C9wKxoTdh';
$DB_USER_DATABASE = 'xvwa';

$db_user = mysqli_connect($DB_USER_SERVER, $DB_USER_USERNAME, $DB_USER_PASSWORD, $DB_USER_DATABASE);
error_reporting(E_ALL);

if (!$db_user) {
	echo "Error in connecting to database";
} else {
	$sql = 'SELECT itemid FROM caffaine;';
	$result = mysqli_query($db_user, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$page['body'] .= "<option value=\"" . $row['itemid'] . "\">" . $row['itemid'] . "</option>";
	}
}

$page['body'] .= "</select></div><div class='form-group'>";
$page['body'] .= "<input type='text' class='form-control' id='searchinput' placeholder='Enter here' size='15' name='search'>";
$page['body'] .= "</div></div>";
$page['body'] .= "<div class='box-footer'>";
$page['body'] .= "<button type='submit' class='btn btn-primary'>Submit</button>";
$page['body'] .= "</div></form></div></div></div>";

$start_time = time();
$item = isset($_POST['item']) ? $_POST['item'] : '';
$search = isset($_POST['search']) ? $_POST['search'] : '';
$isSearch = false;
if (($item != "") && $search != "") {
	echo "<br><ul class=\"featureList\">";
	echo "<li class=\"cross\">Error! Can not use both search and itemcode option. Search using either of these optoins.</li>";
	echo "</ul>";
} else if ($item) {
	$sql = "select * from caffaine where itemid = " . $item;
	$result = mysqli_query($db_user, $sql) or die(mysqli_error());
	$isSearch = true;
} else if ($search) {
	$sql = "SELECT * FROM caffaine WHERE itemname LIKE '%" . $search . "%' OR itemdesc LIKE '%" . $search . "%' OR categ LIKE '%" . $search . "%'";
	$result = mysqli_query($db_user, $sql) or die(mysqli_error());
	$isSearch = true;
}
if ($isSearch) {
	//$page['body'] .= "<table>";
	while ($row = mysqli_fetch_assoc($result)) {
		$page['body'] .= "<div class='row'><div class='col-md-8 col-md-offset-2'><div class='box box-primary'><div class='box-body'>";
		$page['body'] .= "<table class='table'><tbody>";
		$page['body'] .= "<tr><td><b>Item Code</b></td><td>" . $row['itemcode'] . "</td></tr>";
		$page['body'] .= "<tr><td><b>Description</b></td><td>" . $row['itemdesc'] . "</td></tr>";
		$page['body'] .= "<tr><td><b>Item Name</b></td><td>" . $row['itemname'] . "</td></tr>";
		$page['body'] .= "<tr><td><b>Category</b></td><td>" . $row['categ'] . "</td></tr>";
		$page['body'] .= "<tr><td><b>Price</b></td><td>" . $row['price'] . "$</td></tr>";
		$page['body'] .= "</tbody></table></div></div></div></div>";
		//$page['body'] .= $start_time;
	}
	$page['body'] .= "</table>";
}
?>