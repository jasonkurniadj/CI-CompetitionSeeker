<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Coming Soon | Competition Seeker</title>

	<link rel="icon" type="image/ico" href="<?= base_url('assets/'); ?>logo.png">
	
	<link rel="stylesheet" type="text/css" href="<?= base_url('styles/'); ?>bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('styles/'); ?>style.css">
</head>
<body>
	<div class="comingSoon overlay-top">
		<div class="py-5 text-center">
			<div>
				<img src="<?= base_url('assets/'); ?>logo.png" width="100px" alt="Logo">
			</div>

			<h2 class="comingSoon-title mt-5">Coming Soon</h2>

			<div class="container">
					<div class="row">
						<div class="countDown-timer col-sm-3">
							<div class="countDown-timer-time" id="countDownDay"></div>
							<span>Days</span>
						</div>

						<div class="countDown-timer col-sm-3">
							<div class="countDown-timer-time" id="countDownHour"></div>
							<span>Hours</span>
						</div>

						<div class="countDown-timer col-sm-3">
							<div class="countDown-timer-time" id="countDownMinute"></div>
							<span>Minutes</span>
						</div>

						<div class="countDown-timer col-sm-3">
							<div class="countDown-timer-time" id="countDownSecond"></div>
							<span>Seconds</span>
						</div>
					</div>
			</div>			
		</div>

		<div class="text-center mt-2">
			<a href="<?= base_url(); ?>" class="btn bg-cust-secondary" style="">&laquo; Back to Main Menu</a>
		</div>

		<div class="flex-w flex-c-m p-b-35">
			<a href="https://facebook.com" target="_blank" class="">
				<i class="fa fa-facebook"></i>
			</a>

			<a href="https://twitter.com" target="_blank" class="">
				<i class="fa fa-twitter"></i>
			</a>

			<a href="https://youtube.com" target="_blank" class="">
				<i class="fa fa-youtube-play"></i>
			</a>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	var endTime = new Date("July 6, 2019 07:00:00").getTime();

	var timer = setInterval(function() {
		var currTime = new Date().getTime();
		var distance = endTime - currTime;

		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		document.getElementById("countDownDay").innerHTML = days;
		document.getElementById("countDownHour").innerHTML = hours;
		document.getElementById("countDownMinute").innerHTML = minutes;
		document.getElementById("countDownSecond").innerHTML = seconds;

		if (distance < 0) {
			clearInterval(timer);
			document.getElementById("countDownDay").innerHTML = "0";
			document.getElementById("countDownHour").innerHTML = "0";
			document.getElementById("countDownMinute").innerHTML = "0";
			document.getElementById("countDownSecond").innerHTML = "0";
		}
	}, 1000);
</script>