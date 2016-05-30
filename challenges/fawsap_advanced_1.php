<?php

$page = array(
	'title' => 'File Upload/XSS',
	'app_src' => 'FAWSAP',
	'subtitle' => 'Running scripts locally',
	'intro' => '',
	'body' => '',
	'help' => '',
	'output' => '',
	'scripts' => '',
	'required_db' => 'challenges'
);

$page['intro'] .= "";
$html = '';
if( isset( $_POST[ 'Upload' ] ) ) {
	// Where are we going to be writing to?
	$target_path  = '/home/peter/Documents/Web/FAWSAP/uploads/';
	$target_path .= basename( $_FILES[ 'uploaded' ][ 'name' ] );

	// Can we move the file to the upload folder?
	if( !move_uploaded_file( $_FILES[ 'uploaded' ][ 'tmp_name' ], $target_path ) ) {
		// No
		$html .= '<p>Your image was not uploaded.</p>';
	} else {
		// Yes!
		$html .= '<p>'.$target_path.' // '.$_POST['title'].' succesfully uploaded!</p>';
	}
}; 

$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box box-primary'>";

$page['body'] .= "	<div class='box-header'>
						<h3>Upload File</h3>
					</div>
					<form action='#' role='form' method='POST' enctype='multipart/form-data'>";
if ($html != '') {
	$page['body'] .= "	<div class='box-body'>
							".$html."
						</div>";
} else {
	$page['body'] .= "<div class='box-body'>
							<input type='hidden' name='MAX_FILE_SIZE' value='100000' />
							<div class='form-group'>
								<input name='title' class='form-control' placeholder='Enter name' type='text' size='15' />
							</div>
							<div class='form-group'>
								<label for='upload'>Choose a file to upload</label>
								<input name='uploaded' class='form-control' id='upload' type='file' size='15' />
							</div>
						</div>
						<div class='box-footer'>
							<button type='submit' name='Upload' value='Upload' class='btn btn-primary'>Upload</button>
						</div>";
}

$page['body'] .= "</form></div></div></div>";

?>