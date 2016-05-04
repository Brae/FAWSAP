<?php
$page = array(
	'title' => 'Cross Site Scripting (XSS)',
	'title_separator' => ' :: ',
	'app_src' => '',
	'subtitle' => 'Reflected XSS',
	'body' => '',
	'help' => '',
	'output' => '',
	'scripts' => '',
	'page_id' => '',
	'required_db' => 'dvwa'
);
$page['page_id'] = 'sqli';

// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
	// Feedback for end user
	$page['output'] .= '<pre>Hello ' . $_GET[ 'name' ] . '</pre>';
}
$page['scripts'] .= "<script>
(function() {
	var old_alert = alert;
	alert = function(val) {
		console.log('Entering new alert function');
		$('#answerbox').html('jKYp9Yv3MCR7660');
		console.log('Applied string');
		console.log($('#answerbox').html());
		old_alert.apply(this, {val});
		console.log('Called super');
		console.log($('#answerbox').html());
	}
})();
</script>";
$page['body'] .= "<div class='row'>
					<div class='col-md-4 col-md-offset-4'>
						<div class='box box-primary'>
							<form name='XSS' action='#' method='GET'>							
								<div class='box-body'>
									<div class='form-group'>
										<label for='nameinput'>What's your name? </label>
										<input type='text' class='form-control' id='nameinput' placeholder='l33t' size='15' name='name'>
									</div>
								</div>
								<div class='box-footer'>
									<button type='submit' class='btn btn-primary'>Submit</button>
								</div>
							</form>
							{$page['output']}
						</div>
					</div>
				</div>";

					
?>
