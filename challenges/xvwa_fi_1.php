<?php
$page = array(
		'title'           => 'File Inclusion',
		'app_src'         => 'XVWA',
		'subtitle'        => 'Accessing server files',
		'intro'			  => '',
		'body'            => '',
		'help'			  => '',
		'output'		  => '',
		'scripts'		  => '',
		'required_db'     => ''
);

// Win is to read /etc/passwd
// Catch the attempt and output dummy values - don't really want the user reading my server password file!

$page['intro'] .= "	<p>
						Often webpages will be made up of other files read from the server and displayed into a single 
						page using PHP. The vast majority of these will be static, such as the header or footer of a page, 
						and only done to make site maintenance easier. However at times these inclusions will be dynamically 
						allocated using parameters passed through user interactions. For example in this web application, each 
						individual challenge is inserted into a single page depending on a number of factors which are altered 
						by your actions as you work on challenges.
					</p>
					<h4>
						The aim of this challenge is to use hijack a file inclusion within the challenge to display the '/etc/passwd' 
						file of the host web server.
					</h4>
					<p>
						This file contains details of each user registered on the host server, their access rights and some other information.
					</p>
";

$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box box-primary'>";

$filecontent = '';
if (isset($_GET['file'])) {
	$param = base64_decode($_GET['file']);
	if ($param == '/etc/passwd') {
		$filecontent = 'root:x:0:0:root:/root:/bin/bash<br />wesley:x:1000:1000:a5BNEkgDNEUn:/home/wesley:/bin/bash';
		
	} else {
		ob_start();
		include $param;
		$filecontent = ob_get_contents();
		ob_end_clean();
	}
}

$fname = base64_encode("readme.txt");

$page['body'] .= "	<div class='box-header'>
						<h3 class='box-title'>Click the link below to load the help file</h3>
					</div>
					<form action='#' role='form' method='GET'>
						<div class='box-body'>
							<div class='form-group'>
								<p>
									{$filecontent}
								</p>
							</div>
						</div>
						<div class='box-footer'>
							<a class='btn btn-primary' href='challenge.php?file={$fname}'>Readme</a>
						</div>
					</form>";

$page['body'] .= "</div></div></div>";
	
	
?>