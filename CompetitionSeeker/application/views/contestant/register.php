<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title><?= $title; ?> | Competition Seeker</title>

	<link rel="icon" type="image/ico" href="<?= base_url('assets/'); ?>logo.png">
	
	<link href="<?= base_url('styles/'); ?>bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('styles/'); ?>style.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('styles/'); ?>authStyle.css">

	<script src="<?= base_url('scripts/'); ?>bootstrap.min.js"></script>
	<script src="<?= base_url('scripts/'); ?>jquery.min.js"></script>
</head>
<body id="bgContestantRegister">
	<div class="bg-full-fix">
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
					<h5 class="card-title text-center">Register Contestant</h5>

					<div class="card card-signin my-3">
						<div class="card-body">
							<form method="POST" class="form-signin" action="<?= base_url(); ?>auth/ContestantAuth/register">
								<div class="form-label-group">
									<input type="text" id="txtName" name="txtName" class="form-control" value="<?= set_value('txtName'); ?>" placeholder="Email address" required autofocus>
									<label for="txtName">Full Name</label>
								</div>

								<div class="ml-4" style="margin-bottom: .4rem;">
									<label class="mr-5">Gender</label>
									<label class="mr-4"><input type="radio" name="rbGender" value="M"> Male</label>
									<label><input type="radio" name="rbGender" value="F"> Female</label>
									<?= form_error('rbGender', '<br><small class="text-danger">', '</small>'); ?>
								</div>

								<div class="form-label-group">
									<input type="date" id="calDOB" name="calDOB" class="form-control" value="<?= set_value('calDOB'); ?>" required autofocus>
									<label for="calDOB">Date of Birth</label>
									<?= form_error('calDOB', '<small class="ml-4 text-danger">', '</small>'); ?>
								</div>

								<div class="form-label-group">
									<input type="text" id="txtPhone" name="txtPhone" class="form-control" value="<?= set_value('txtPhone'); ?>" placeholder="Phone Number address" required autofocus>
									<label for="txtPhone">Phone Number</label>
									<?= form_error('txtPhone', '<small class="ml-4 text-danger">', '</small>'); ?>
								</div>

								<div class="form-label-group">
									<input type="text" id="txtEmail" name="txtEmail" class="form-control" value="<?= set_value('txtEmail'); ?>" placeholder="Email address" required autofocus>
									<label for="txtEmail">Email address</label>
									<?= form_error('txtEmail', '<small class="ml-4 text-danger">', '</small>'); ?>
								</div>

								<div class="form-label-group">
									<input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Password" required>
									<label for="txtPassword">Password</label>
									<?= form_error('txtPassword', '<small class="ml-4 text-danger">', '</small>'); ?>
								</div>

								<div class="form-label-group">
									<input type="password" id="txtRePassword" name="txtRePassword" class="form-control" placeholder="Password" required>
									<label for="txtRePassword">Retype Password</label>
									<?= form_error('txtRePassword', '<small class="ml-4 text-danger">', '</small>'); ?>
								</div>

								<div class="custom-control custom-checkbox mb-3">
									<input type="checkbox" class="custom-control-input" id="cbxAgreement" required>
									<label class="custom-control-label" for="cbxAgreement">I agree all terms & conditions</label>
								</div>

								<input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase mt-5" value="Register">

								<p class="text-center mt-3">Have an account? <a href="<?= base_url(); ?>auth/contestantAuth">Click here to sign in!</a></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
