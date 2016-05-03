<?php
$page = array(
		'title'           => 'XVWA',
		'title_separator' => ' :: ',
		'app_src'         => 'Xtreme Vulnerable Web Application',
		'subtitle'        => 'Vulnerability - SQL Injection',
		'body'            => '',
		'help'			  => '',
		'page_id'         => '',
		'required_db'     => 'xvwa'
	);
$page['page_id'] = 'sqli';

$page['help'] .= "<div class='row'><div class='col-md-12'><div class='box box-primary'>";
$page['help'] .= "<div class='box-header'><h3 class='box-title'>Help Section</h3>";
$page['help'] .= "<div class='box-tools pull-right'><button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>";
$page['help'] .= "<button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button></div></div>";
$page['help'] .= "<div class='box-body'>";
$page['help'] .= "<h4>Intro</h4><p>";
$page['help'] .= "This answer for this challenge is within a different table to the query currently being used.</p>";
$page['help'] .= "<p>In order to get the answer for this challenge, the passwords must be dumped from the users table within the xvwa database</p>";
$page['help'] .= "<h4>Hints</h4>";
$page['help'] .= "<ul><li>The current database is 'xvwa'</li>";
$page['help'] .= "<li>The table queried by the original SELECT is 'caffaine'</li>";
$page['help'] .= "<li>The table holding the answer is 'users' in the same database</li>";
$page['help'] .= "<li>Try using the UNION command</li>";
$page['help'] .= "<li>The column names within 'users' are 'username' and 'password'</li></ul>";
$page['help'] .= "</div></div>";
$page['help'] .= "<div class='box collapsed-box box-danger'><div class='box-header'><h3 class='box-title'>Solution</h3><div class='box-tools pull-right'><button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button><button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button></div></div>";
$page['help'] .= "<div class='box-body'>";
$page['help'] .= "<p>The query being built from the text input field is currently</p>";
$page['help'] .= "<code>SELECT * FROM caffaine WHERE idname LIKE '%[input]%';</code>";
$page['help'] .= "<p>The UNION command can be used here to join the content of another table into the result list. 5 outputs are shown on the screen, so intially 5 columns can be passed to the ORDER BY</p>";
$page['help'] .= "<code>SELECT * FROM caffaine WHERE idname LIKE '%<span color='red'>%' UNION SELECT 1,2,3,4,5 FROM xvwa.users;#</span>%';</code>";
$page['help'] .= "<p>This will return an error due to the number of columns being returned by the <code>SELECT * FROM caffaine</code> is not 5. Try increasing this one at a time (i.e. add another column to the UNION SELECT arguments) until the page displays. The values arguments to the UNION should be at the bottom of the generated web page</p>";
$page['help'] .= "<p>The initial command is evidently returning 7 columns, and only some of these are being displayed. Column names can be switched for the numbers used to return the values needed from the other table.</p>";
$page['help'] .= "</div></div></div></div>";


$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box'>";

$page['body'] .= "<form role='form' action='#' method='POST'>";
$page['body'] .= "<div class='box-body'>";
$page['body'] .= "<div class='form-group'>";
$page['body'] .= "<select class='form-control' name='item'><option value=''>Select Item Code</option>";

require_once './php/config_user.php';
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