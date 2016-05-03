<?php
$page = array(
		'title'           => 'Command Injection',
		'title_separator' => ' :: ',
		'app_src'         => 'DVWA',
		'subtitle'        => 'Ping',
		'body'            => '',
		'help'			  => '',
		'page_id'         => '',
		'required_db'     => 'dvwa'
	);
$page['page_id'] = 'sqli';

$page['help'] .= "<div class='row'><div class='col-md-12'><div class='box box-primary'>";
$page['help'] .= "<div class='box-header'><h3 class='box-title'>Help Section</h3>";
$page['help'] .= "<div class='box-tools pull-right'><button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>";
$page['help'] .= "<button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button></div></div>";
$page['help'] .= "<div class='box-body'>";
$page['help'] .= "<h4>Intro</h4>";
$page['help'] .= "<p>Command line instructions can be run through certain functions in web languages. This can often be dangerous, especially if the command has user input concatenated to it.</p>";
$page['help'] .= "<p>This challenge enables the user to input an IP address and then view the results of a ping command. The answer for the challenge is contained in a file in the current working directory.</p>";
$page['help'] .= "<h4>Hints</h4>";
$page['help'] .= "<ul><li>The ping command must run without errors to allow execution of any ensuing instructions.</li>";
$page['help'] .= "<li>Remember that the server running this web app is Ubuntu</li>";
$page['help'] .= "<li>The answer is contained within a file called flag.txt</li>";
$page['help'] .= "<li>Only the contents of stdout will be shown on the web page</li></ul>";
$page['help'] .= "</div></div></div></div>";

$html = '';
if (isset($_POST['ip'])) {
	$target = $_POST['ip'];
	if(stristr(php_uname('s'), ' Windows NT')) {
		$cmd = shell_exec('ping ' . $target);	
	} else {
		$cmd = shell_exec('ping -c 4 ' . $target);
	}
	$html = "<pre>{$cmd}</pre>";
}
$page['body'] .= "<div class='row'><div class='col-md-6 col-md-offset-3'><div class='box'>";
$page['body'] .= "<div class='box-header'>";
$page['body'] .= "<h3 class='box-title'>Ping a Device</h3></div>";
$page['body'] .= "<form role='form' name='ping' action='#' method='post'>";
$page['body'] .= "<div class='box-body'>";
$page['body'] .= "<div class='form-group'>";
$page['body'] .= "<label for='txt_ip'>Enter an IP address:</label>";
$page['body'] .= "<input type='text' class='form-control' placeholder='127.0.0.1' name='ip' id='txt_ip' size='30'>";
$page['body'] .= "</div></div>";
$page['body'] .= "<div class='box-footer'>";
$page['body'] .= "<button type='submit' class='btn btn-primary'>Submit</button>";
$page['body'] .= "</div></form><br />{$html}</div></div></div>";

?>