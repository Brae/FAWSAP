<?php
$page = array(
		'title'           => 'SQL Injection',
		'app_src'         => 'XVWA',
		'subtitle'        => 'Basic data extraction',
		'intro'			  => '',
		'body'            => '',
		'help'			  => '',
		'output'		  => '',
		'scripts'		  => '',
		'required_db'     => 'xvwa'
	);

$page['intro'] .= "	<p>
						When an SQL injection vulnerability exists, it will often be possible to extract information from other 
						tables on the SQL server.
					</p>
					<p>
						For example, in this challenge the query built into the web page to provide the functionality queries the 
						'caffaine' table of the 'xvwa' database. In order to complete the challenge, you must dump the passwords 
						for the 'users' table within the same database.
					</p>
					<p>
						Normally, these exploits would be carried out blind, with little to no advance knowledge of the database 
						structure. This means that pivoting to other tables can often involve a lot of trial and error to get the 
						correct format for the injected query string. Depending on how the web server is configured, PHP error 
						messages may or may not be displayed on the web page and this can have a serious effect on the difficulty 
						of designing a query to inject.
					</p>
					<h4>
						In this example, some extra information is given to remove some of these steps and simplify the process 
						for the purposes of the challenge. More advanced versions are available.
					</h4>
					<ul>
						<li>The objective table is 'users' within the 'xvwa' database.</li>
						<li>The columns within this table are 'username' and 'password'</li>
					</ul>";

$page['help'] .= "<p>The query being built from the text input field is currently</p>";
$page['help'] .= "<code>SELECT * FROM caffaine WHERE idname LIKE '%[input]%';</code>";
$page['help'] .= "<p>The UNION command can be used here to join the content of another table into the result list. 5 outputs are shown on the screen, so intially 5 columns should be passed to the UNION</p>";
$page['help'] .= "<code>SELECT * FROM caffaine WHERE idname LIKE '%<span color='red'>%' UNION SELECT 1,2,3,4,5 FROM xvwa.users;#</span>%';</code>";
$page['help'] .= "<p>This will return an error, suggesting that the numbber of columns returned by the <code>SELECT * FROM caffaine</code> is not 5. Try increasing this one at a time (i.e. add another column to the UNION SELECT arguments) until the page displays. The arguments passed to the UNION should be visible in the final table of output</p>";
$page['help'] .= "<p>Only 5 outputs are shown in the tables. Once the query runs correctly, column names can be switched for the numbers passed to the UNION statement. Make sure to replace the numbers which appear in the table so that the results are visible on the page.</p>";



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