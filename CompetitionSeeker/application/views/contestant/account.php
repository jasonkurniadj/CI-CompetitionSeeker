<!-- <script src="<?= base_url('scripts/'); ?>bootstrap.bundle.min.js"></script> -->
<?= $this->session->flashdata('updateProfileSession'); ?>

<div class="modal fade" id="changePictureModal" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="POST" action="<?= base_url(); ?>contestant/updateProfilePicture">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Change Profile Picture</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<input type="file" name="fileProfilePicture" class="form-control-file" id="exampleFormControlFile1">
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" name="btnSubmit" class="btn btn-primary" value="Save change">
				</div>
			</form>
		</div>
	</div>
</div>

<div class="col-md-7 mx-auto my-5">
	<div id="profileCover" class="bg-cust-color-lin-top-rev">
		<div class="profile-picture-container">
			<img src="<?= base_url('assets/'); ?>imgProfile.jpg" alt="Profile Picture" class="profile-picture-content">
		</div>

		<div class="text-center mt-4 text-white" id="changePicture">
			<a data-toggle="modal" data-target="#changePictureModal">Change Picture</a>
		</div>
	</div>

	<ul class="nav nav-tabs bg-cust-primary" id="profilePane" role="tablist">
		<li class="nav-item col-md-4">
			<a class="nav-link text-center active" id="personalTab" data-toggle="tab" href="#personalPanel">
				<span class="glyphicon glyphicon-user"></span> Personal Information
			</a>
		</li>
		<li class="nav-item col-md-4">
			<a class="nav-link text-center" id="creditCardTab" data-toggle="tab" href="#creditCardPanel">
				<span class="glyphicon glyphicon-credit-card"></span> Credit Card
			</a>
		</li>
		<li class="nav-item col-md-4">
			<a class="nav-link text-center" id="changePasswordTab" data-toggle="tab" href="#changePasswordPanel">
				<span class="glyphicon glyphicon-lock"></span> Change Password
			</a>
		</li>
	</ul>

	<div class="tab-content" id="activityContent">
		<div class="tab-pane tab-pane-content fade show active" id="personalPanel">
			<div class="mx-3 py-3">
				<div class="form-row">
					<h4 class="my-3 pb-2">Personal Information</h4>
					<small class="mt-3 ml-3">
						<button class="btn" title="You can edit your profile" onclick="enableInput('personal');"><span class="glyphicon glyphicon-edit"></span> Edit</button>
					</small>
				</div>

				<form method="POST" action="<?= base_url(); ?>contestant/updatePersonalInfo">
					<?php
						foreach ($contestantData as $row) {
					?>
							<div class="form-row">
								<div class="form-group col-md-3">
									<label>Name</label>
								</div>
								<div class="form-group col-md-9">
									<label><?= $row->contestantName; ?></label>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-3">
									<label>Gender</label>
								</div>
								<div class="form-group col-md-9">
									<label>
										<?php
											if ($row->contestantGender == "M") {
										?>
												Male
										<?php 
											}
											else {
										?>
												Female
										<?php
											}
										?>
									</label>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-3">
									<label>Date of Birth</label>
								</div>
								<div class="form-group col-md-9">
									<label>
										<?php
											$originDate = $row->contestantDOB;
											$convertDate = date("M d, Y", strtotime($originDate));
											echo $convertDate;
										?>
									</label>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-3">
									<label>Phone Number</label>
								</div>
								<div class="form-group col-md-9">
									<input type="text" name="txtPhone" id="txtPhone" class="form-control" value="<?= $row->contestantPhone; ?>" style="letter-spacing: .2em;">
									<?= form_error('txtPhone', '<small class="ml-4 text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-3">
									<label>Email</label>
								</div>
								<div class="form-group col-md-9">
									<input type="email" name="txtEmail" id="txtEmail" class="form-control" value="<?= $row->email; ?>" style="letter-spacing: .2em;">
									<?= form_error('txtEmail', '<small class="ml-4 text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-3">
									<label>Register Date</label>
								</div>
								<div class="form-group col-md-9">
									<label>
										<?php
											$originDate = $row->registerDate;
											$convertDate = date("M d, Y", strtotime($originDate));
											echo $convertDate;
										?>	
									</label>
								</div>
							</div>
					<?php
						}
					?>
					<div class="form-row mt-3">
						<div class="col-md-9"></div>
						<div class="col-md-3 d-none" id="btnContainer-personal">
							<input type="button" name="btnCancel" class="btn btn-secondary" onclick="javascript:window.location='';" value="Cancel">
							<input type="submit" name="btnSave" class="btn btn-primary" value="Save">
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="tab-pane tab-pane-content fade" id="creditCardPanel">
			<div class="mx-3 py-3">
				<div class="form-row">
					<h4 class="my-3 pb-2">Credit Card Information</h4>
					<small class="mt-3 ml-3">
						<button class="btn" title="You can edit your credit card number" onclick="enableInput('card');"><span class="glyphicon glyphicon-edit"></span> Edit</button>
					</small>
				</div>

				<form method="POST" action="<?= base_url(); ?>contestant/updateCreditCard">
					<?php
						foreach ($contestantData as $row) {
					?>
							<div class="form-row">
								<div class="form-group col-md-3">
									<label>Credit Card Number</label>
								</div>
								<div class="form-group col-md-9">
									<?php
										if ($row->creditCard) {
											$creditCardNumber = substr($row->creditCard, 0, -4) . 'XXXX';
									?>
											<input type="text" name="txtCreditCard" id="txtCreditCard" class="form-control" value="<?= $creditCardNumber; ?>" style="letter-spacing: .2em;">
											<?= form_error('txtCreditCard', '<small class="ml-4 text-danger">', '</small>'); ?>
									<?php
										}
										else {
									?>
											<input type="text" name="txtCreditCard" id="txtCreditCard" class="form-control" value="No Data" style="letter-spacing: .2em;">
									<?php
										}
									?>
								</div>
							</div>
					<?php
						}
					?>

					<div class="form-row mt-3">
						<div class="col-md-6"></div>
						<div class="col-md-6 d-none" id="btnContainer-card">
							<input type="button" name="btnCancel" class="btn btn-secondary" onclick="javascript:window.location='';" value="Cancel">
							<input type="submit" name="btnSave" class="btn btn-danger" value="Change Credit Card Number">
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="tab-pane tab-pane-content fade" id="changePasswordPanel">
			<div class="mx-3 py-3">
				<div class="form-row">
					<h4 class="my-3 pb-2">Change Password</h4>
				</div>

				<form method="POST" action="<?= base_url(); ?>contestant/updatePassword">
					<div class="form-row">
						<div class="form-group col-md-3">
							<label>Current Password</label>
						</div>
						<div class="form-group col-md-9">
							<input type="password" name="txtCurrentPassword" class="form-control" value="C0mpetition $eeker 20!9" style="letter-spacing: .2em;" required>
							<?= form_error('txtCurrentPassword', '<small class="ml-4 text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-3">
							<label>New Password</label>
						</div>
						<div class="form-group col-md-9">
							<input type="password" name="txtNewPassword" class="form-control" style="letter-spacing: .2em;" required>
							<?= form_error('txtNewPassword', '<small class="ml-4 text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-3">
							<label>Retype New Password</label>
						</div>
						<div class="form-group col-md-9">
							<input type="password" name="txtReNewPassword" class="form-control" style="letter-spacing: .2em;" required>
							<?= form_error('txtReNewPassword', '<small class="ml-4 text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-row mt-3">
						<div class="col-md-9"></div>
						<div class="col-md-3">
							<input type="submit" name="btnChangePassword" class="btn btn-danger" value="Change Password">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	disableInput();
</script>
