var timer = new Timer();
var charCount = 0;
var clickCount = 0;
var time;

function launch() {
	console.log("Running? " + sessionStorage.running);
	if (sessionStorage.running == "true") {
		start();
	} else {
		$('#confirmmodal').modal('show');
		console.log("Setting time to 0 (line 9)");
		sessionStorage.time = "0";
	}

}

function start() {
	var startTime = 0;
	
	if (sessionStorage.running == "true") {
		console.log("Starting from existing challenge");
		startTime = parseInt(sessionStorage.getItem('time'));
		timer.start({
			precision : 'seconds',
			startValues : {
			seconds : parseInt(sessionStorage.getItem('time'))
			}
		});
	} else {
		console.log("Starting new challenge");
		timer.start();
		sessionStorage.setItem('running', true);
		sessionStorage.setItem('clickCount',0);
		sessionStorage.setItem('charCount',0);
	}

	

	timer.addEventListener('secondsUpdated', function(e) {
		$('#timer').html(timer.getTimeValues().toString());
		console.log("Setting time to the time total value");
		sessionStorage.setItem('time', parseInt(timer.getTotalTimeValues().seconds));
	});

	document.getElementById('mainframe').addEventListener("keydown", function() {
		console.log("KEY PRESSED");
		var current = parseInt(sessionStorage.getItem('charCount'));
		charCount = current + 1;
		sessionStorage.setItem("charCount", charCount);
		console.log(charCount);
		document.getElementById("charCount").innerHTML = "CharCount: " + charCount;
	});

	//event for mouseclick
	document.getElementById('mainframe').addEventListener("click", function() {
		console.log("MOUSE CLICK");
		var current = parseInt(sessionStorage.getItem('clickCount'));
		clickCount = current+1;
		sessionStorage.setItem('clickCount', clickCount);
		console.log(clickCount);
		document.getElementById("clickCount").innerHTML = "ClickCount: " + clickCount;

	});

	var search = setInterval(function() {
		if (window.find("jKYp9Yv3MCR7660")) {
			clearTimeout(search);
			time = timer.getTimeValues().toString();
			timer.stop();
			sessionStorage.setItem('running', false);
			$('#winmodal').modal('show');
		}
	}, 1000);

}
