var timer = new Timer();
var charCount = 0;
var clickCount = 0;
var time;

function launch() {
	console.log("Running? " + sessionStorage.running);
	sessionStorage.usedhelp = 'false';
	if (sessionStorage.running == "true") {
		start();
	} else {
		$('#confirmmodal').modal('show');
		sessionStorage.time = "0";
	}
	
	if ($('#help-section').length > 0) {
		$('#help-section').click(function() {
			console.log('Help section opened');
			sessionStorage.usedhelp = 'true';
		});
	}

}

function start() {
	var startTime = 0;
	
	if (sessionStorage.running == "true") {
		startTime = parseInt(sessionStorage.getItem('time'));
		timer.start({
			precision : 'seconds',
			startValues : {
			seconds : parseInt(sessionStorage.getItem('time'))
			}
		});
	} else {
		timer.start();
		sessionStorage.setItem('running', true);
		sessionStorage.setItem('clickCount',0);
		sessionStorage.setItem('charCount',0);
	}

	

	timer.addEventListener('secondsUpdated', function(e) {
		$('#timer').html(timer.getTimeValues().toString());
		sessionStorage.setItem('time', parseInt(timer.getTotalTimeValues().seconds));
	});

	document.getElementById('mainframe').addEventListener("keydown", function() {
		var current = parseInt(sessionStorage.getItem('charCount'));
		charCount = current + 1;
		sessionStorage.setItem("charCount", charCount);
		document.getElementById("charCount").innerHTML = "CharCount: " + charCount;
	});

	//event for mouseclick
	document.getElementById('mainframe').addEventListener("click", function() {
		var current = parseInt(sessionStorage.getItem('clickCount'));
		clickCount = current+1;
		sessionStorage.setItem('clickCount', clickCount);
		document.getElementById("clickCount").innerHTML = "ClickCount: " + clickCount;

	});

	if ($('#difficulty').text() == "1") {
		var search = setInterval(function() {
			console.log('tick tock');
			if ($('div[id="challengecanvas"]:contains("jKYp9Yv3MCR7660"):not("script")').length > 0) {
				clearTimeout(search);
				time = timer.getTimeValues().toString();
				timer.stop();
				sessionStorage.setItem('running', false);
				$('#winmodal').modal('show');
			}
		}, 1000);

	} else if ($('#difficulty').text() == "2") {
		var search = setInterval(function() {
			if ($('div[id="challengecanvas"]:contains("a5BNEkgDNEUn"):not("script")').length > 0) {
				clearTimeout(search);
				time = timer.getTimeValues().toString();
				timer.stop();
				sessionStorage.setItem('running', false);
				$('#winmodal').modal('show');
			}
		}, 1000);
	} else if ($('#difficulty').text() == "3") {
		var search = setInterval(function() {
			if ($('div[id="challengecanvas"]:contains("PZi8UTDvy49S"):not("script")').length > 0) {
				clearTimeout(search);
				time = timer.getTimeValues().toString();
				timer.stop();
				sessionStorage.setItem('running', false);
				$('#winmodal').modal('show');
			}
		}, 1000);
	}

}
