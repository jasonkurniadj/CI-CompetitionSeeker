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
	
	<link href="<?= base_url('styles/'); ?>bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('styles/'); ?>authStyle.css">

	<script src="<?= base_url('scripts/'); ?>jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('scripts/'); ?>bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
				<div class="text-center">
					<img src="<?= base_url('assets/'); ?>logo.png" width="75px">
				</div>
				<h5 class="card-title text-center">Contestant Sign In</h5>

				<div class="card card-signin">
					<div class="card-body">
						<?= $this->session->flashdata('registerSuccessSession'); ?>
						<?= $this->session->flashdata('loginStatusSession'); ?>

						<form method="POST" class="form-signin" action="<?= base_url(); ?>auth/contestantAuth">
							<div class="form-label-group">
								<input type="email" id="txtEmail" name="txtEmail" class="form-control" value="<?= set_value('txtEmail'); ?>" placeholder="Email address" required autofocus>
								<label for="txtEmail">Email address</label>
							</div>

							<div class="form-label-group">
								<input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Password" required>
								<label for="txtPassword">Password</label>
							</div>

							<a id="btnForgetPassword" data-toggle="modal" data-target="#forgetPasswordContainer" style="cursor: pointer;">Forget password?</a>

							<input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase mt-5" value="Sign In">

							<p class="text-center mt-3">Don't have an account? <a href="<?= base_url(); ?>auth/contestantAuth/register">Click here to register!</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="forgetPasswordContainer" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Forget Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" class="form-signin" action="<?= base_url(); ?>auth/contestantAuth/resetPassword">
						<p>Please input your email address.. We will send your new password.</p>

						<div class="form-label-group">
							<input type="email" id="txtForgetPassword" name="txtForgetPassword" class="form-control" placeholder="Email address" required autofocus>
							<label for="txtForgetPassword">Email address</label>
						</div>

						<input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase mt-5" value="Sign In">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
