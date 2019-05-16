<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Register | Competition Seeker</title>

	<link rel="icon" type="image/ico" href="<?= base_url('assets/'); ?>logo.png">
	
	<link href="<?= base_url('styles/'); ?>bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('styles/'); ?>style.css" rel="stylesheet">
</head>
<body>
	<div class="w-100 bg-cust-color bg-full-attachment-fixed">
		<div class="container py-5">
			<div class="row">
				<div class="col-md-6 mb-3">
					<div class="card h-100">
						<img class="card-img-top" src="<?=base_url('assets/'); ?>bgContestantRegister.jpg" alt="">
						<div class="card-body">
							<h4 class="card-title">Contestant</h4>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
							<p class="text-center"><a href="<?= base_url(); ?>auth/contestantAuth/register" class="btn btn-primary">Register as Contestant</a></p>
						</div>
					</div>
				</div>

				<div class="col-md-6 mb-3">
					<div class="card h-100">
						<img class="card-img-top" src="<?=base_url('assets/'); ?>bgCompanyRegister-X.jpg" alt="">
						<div class="card-body">
							<h4 class="card-title">Company</h4>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
							<p class="text-center"><a href="<?= base_url(); ?>home/comingSoon" class="btn btn-primary">Register as Company</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>