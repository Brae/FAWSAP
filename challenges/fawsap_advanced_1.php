<?php

$page = array('title' => 'File Upload/XSS', 'app_src' => 'FAWSAP', 'subtitle' => 'Running scripts locally', 'intro' => '', 'body' => '', 'help' => '', 'output' => '', 'scripts' => '', 'required_db' => 'challenges');

$page['intro'] .= "";
$html = '';
if (isset($_POST['submit'])) {
	// Where are we going to be writing to?
	$target_path = './uploads/';
	$target_path .= basename($_FILES['uploaded']['name']);
	$uploadOk = 1;

	if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_path)) {
		$html .= '<h4>'.$_POST['title'].'</h4>';
		$html .= '<p>File successfully uloaded</p>';
	} else {
		$html .= '<p>File upload failed</p>';
	}
}

$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box box-primary'>";

$page['body'] .= "	<div class='box-header'>
						<h3>Upload File</h3>
					</div>
					";

$page['body'] .= "<form action='#' role='form' method='post' enctype='multipart/form-data'>
						<div class='box-body'>
							<div class='form-group'>
								<input name='title' class='form-control' placeholder='Enter name' type='text' size='15' />
							</div>
							<div class='form-group'>
								<label for='upload'>Choose a file to upload</label>
								<input type='file' name='uploaded' class='form-control' id='uploaded' size='15' />
							</div>
						</div>
						<div class='box-footer'>							
							<input type='submit' name='submit' value='Upload' class='btn btn-primary'>
							" . $html . "
						</div>";

$page['body'] .= "</form></div></div></div>";

$page['body'] .= "	<script>
								if ($('#challengecanvas h4:first').length > 0) {
									var content = $('#challengecanvas h4:first').html();
									console.log('Test');
									console.log(content);
									if (content.indexOf('script src=') >= 0 && content.indexOf('FAWSAP/uploads') >= 0 && content.indexOf('.js') >= 0) {
										var key = 'PZi8UT';
										key = key + 'Dvy49S';
										$('#answerbox').html(key);
									} 							
								
								}
							
						</script>";
?>