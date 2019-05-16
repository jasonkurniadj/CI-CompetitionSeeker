<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?= $title; ?> | Competition Seeker</title>

	<link rel="icon" type="image/ico" href="<?= base_url('assets/'); ?>logo.png">

	<link href="<?= base_url('styles/'); ?>bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('styles/'); ?>bootstrap-custom.css" rel="stylesheet">
	<link href="<?= base_url('styles/'); ?>jquery-ui.css" rel="stylesheet">
	<link href="<?= base_url('styles/'); ?>style.css" rel="stylesheet">
	<link href="<?= base_url('styles/'); ?>contestantStyle.css" rel="stylesheet">

	<script src="<?= base_url('scripts/'); ?>jquery-3.3.1.min.js"></script>
	<!-- <script src="<?= base_url('scripts/'); ?>bootstrap.bundle.min.js"></script> -->
	<script type="text/javascript" src="<?= base_url('scripts/'); ?>script.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-cust-color-lin">
		<div class="container">
			<!-- <a class="navbar-brand" href="<?= base_url(); ?>">Competition Seeker</a> -->
			<a class="navbar-brand" href="<?= base_url(); ?>" style="padding: 0;"><img src="<?= base_url('assets/'); ?>logo.png" width="32px"> Competition Seeker</a>

			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link active" href="<?= base_url(); ?>">Home</a></li>

					<?php
						if (!$this->session->userdata('activeContestantSession')) {
					?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Sign In</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="<?= base_url(); ?>auth/contestantAuth">As Contestant</a>
									<a class="dropdown-item" href="<?= base_url(); ?>home/comingSoon">As Company</a>

									<hr class="my-0">
									<a class="dropdown-item" href="<?= base_url(); ?>register">Register</a>
								</div>
							</li>
					<?php
						}
						else {
					?>
							<li class="nav-item dropdown">
								<a class="nav-link" href="" data-toggle="dropdown"><span class="glyphicon glyphicon-bell"></span></a>

								<div class="dropdown-menu dropdown-menu-right">
									<!-- <a class="dropdown-item">No notification</a> -->
									
									<a href="" class="dropdown-item" data-toggle="modal" data-target="#notificationModal">
										Notification 1
									</a>
								</div>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><?= $this->session->userdata['activeContestantSession']['contestantName']; ?></a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="<?= base_url(); ?>contestant/activity">
										<span class="glyphicon glyphicon-time"></span> My Activity
									</a>
									<a class="dropdown-item" href="<?= base_url(); ?>contestant/wishlist">
										<span class="glyphicon glyphicon-list-alt"></span> My Wishlist
									</a>
									<a class="dropdown-item" href="<?= base_url(); ?>contestant/account">
										<span class="glyphicon glyphicon-user"></span> My Account
									</a>
									<hr class="my-0">
									<a class="dropdown-item" href="<?= base_url(); ?>home/logout">
										<span class="glyphicon glyphicon-log-out"></span> Logout
									</a>
								</div>
							</li>
					<?php
						}
					?>
				</ul>
			</div>
		</div>
	</nav>

	<div id="notificationModal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">[Title]</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
			</div>
		</div>
	</div>
