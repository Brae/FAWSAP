<?php
$page = array(
	'title' => 'Cross Site Scripting (XSS)',
	'app_src' => 'DVWA',
	'subtitle' => 'Basic Reflected XSS',
	'intro' => '',
	'body' => '',
	'help' => '',
	'output' => '',
	'scripts' => '',
	'required_db' => ''
);

// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
	// Feedback for end user
	$page['output'] .= '<pre>Hello ' . $_GET[ 'name' ] . '</pre>';
}
$page['scripts'] .= "<script>
(function() {
	var old_alert = alert;
	var flag = 'a5BNEk';
	var flag = flag + 'gDNEUn';
	alert = function(val) {
		$('#answerbox').html(flag);
		old_alert.call(this, val);
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
