<div class="container my-5">
	<div class="col-md-12">
		<h2>Join Competition</h2>
		<ul class="nav nav-tabs navbar-light bg-cust-primary" id="activityPane" role="tablist">
			<li class="nav-item col-md-3 text-center">
				<a class="nav-link col-md-3 mx-auto active" id="joinStep1" data-toggle="tab" href="#joinPanel1"><span class="glyphicon glyphicon-folder-close"></span></a>
			</li>
			<li class="nav-item col-md-3 text-center">
				<a class="nav-link col-md-3 mx-auto" id="joinStep2" data-toggle="tab" href="#joinPanel2"><span class="glyphicon glyphicon-user"></span></a>
			</li>
			<li class="nav-item col-md-3 text-center">
				<a class="nav-link col-md-3 mx-auto" id="joinStep3" data-toggle="tab" href="#joinPanel3"><span class="glyphicon glyphicon-credit-card"></span></a>
			</li>
			<li class="nav-item col-md-3 text-center">
				<a class="nav-link col-md-3 mx-auto" id="joinStep4" data-toggle="tab" href="#joinPanel4"><span class="glyphicon glyphicon-ok"></span></a>
			</li>
		</ul>

		<div class="tab-content" id="joinContent">
			<div class="tab-pane fade show active" id="joinPanel1">
				<form method="POST">

				<div class="mx-3 py-3">
					<h4 class="my-3 pb-2 text-center">Competition Information</h4>

					<?php
						foreach ($competitionData as $row) {
					?>
						<div class="form-row d-none">
							<div class="form-group col-md-3">
								<label>Competition ID</label>
							</div>
							<div class="form-group col-md-2">
								<input type="text" name="txtCompetitioID" class="form-control" value="<?= $row->competitionID; ?>" disabled>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Competition Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" name="txtCompetitioName" class="form-control" value="<?= $row->competitionName; ?>" disabled>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Competition Description</label>
							</div>
							<div class="form-group col-md-9">
								<!-- <input type="text" name="txtCompetitioName" class="form-control" value="<?= $row->competitionDescription; ?>" disabled> -->
								<textarea class="form-control" style="height: 7em; resize: none;" disabled><?= $row->competitionDescription; ?>
								</textarea>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Competition Date</label>
							</div>
							<div class="form-group col-md-4">
								<input type="date" name="txtCompetitioStartDate" class="form-control" value="<?= $row->competitionStartDate; ?>" disabled>
							</div>
							<div class="form-group col-md-1 text-center">
								<label>-</label>
							</div>
							<div class="form-group col-md-4">
								<input type="date" name="txtCompetitioStartDate" class="form-control" value="<?= $row->competitionEndDate; ?>" disabled>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Competition Location</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" name="txtCompetitioLocation" class="form-control" value="<?= $row->competitionLocation; ?>" disabled>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Competition Fee</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" name="txtCompetitioFee" class="form-control" value="Rp. <?= $row->competitionFee; ?>" disabled>
							</div>
						</div>
					
						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Voucher Code</label>
							</div>
							<div class="form-group col-md-4">
								<input type="text" name="txtVoucher" class="form-control" placeholder="Voucher Code">
							</div>
						</div>
					<?php
						}
					?>

					<p class="mt-3 text-center text-danger">
						<span class="glyphicon glyphicon-alert"></span> You must follow all the rules determined by the Competition Seeker and the competition organizer!
					</p>
				</div>
			</div>

			<div class="tab-pane fade" id="joinPanel2">
				<div class="mx-3 py-3">
					<h4 class="my-3 pb-2 text-center">Personal Information</h4>

					<?php
						foreach ($contestantData as $row) {
					?>
						<div class="form-row d-none">
							<div class="form-group col-md-3">
								<label>Contestant ID</label>
							</div>
							<div class="form-group col-md-2">
								<input type="text" name="txtName" class="form-control" value="<?= $row->contestantID; ?>" disabled>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" name="txtName" class="form-control" value="<?= $row->contestantName; ?>">
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Address</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" name="txtAddress" class="form-control" placeholder="Address">
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Email</label>
							</div>
							<div class="form-group col-md-4">
								<input type="text" name="txtEmail" class="form-control" value="<?= $row->email; ?>" disabled>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Phone Number</label>
							</div>
							<div class="form-group col-md-4">
								<input type="text" name="txtPhone" class="form-control" placeholder="Phone Number" required>
							</div>
						</div>
					<?php
						}
					?>

					<p class="mt-3 text-center text-danger">
						<span class="glyphicon glyphicon-alert"></span> Fill the name according to the name printed on your official identity card and make sure the contact that you filled can be contacted!
					</p>
				</div>
			</div>

			<div class="tab-pane fade" id="joinPanel3">
				<div class="mx-3 py-3">
					<h4 class="my-3 pb-2 text-center">Payment Information</h4>

					<div class="form-group col-md-4 mx-auto">
						<input type="text" name="txtCard" id="txtCard" class="form-control" placeholder="Credit Card Number" style="letter-spacing: .4em;">
					</div>

					<p class="mt-3 text-center text-danger">
						<span class="glyphicon glyphicon-alert"></span> Make sure the credit card number you entered is correct and can be used! <br>The credit card information entered will be kept confidential and will not be disseminated.
					</p>
				</div>
			</div>

			<div class="tab-pane fade" id="joinPanel4">
				<div class="mx-3 py-3">
					<div class="text-center my-3">
						<h4 class="my-3 pb-2 text-center"><!-- &#x2714;  -->Verification</h4>

						<p class="col-md-9 mx-auto">
							Make sure the information that you filled are correct!
							Failure to provide information can have an impact on the status of your competition depending on our party or the competition organizer. If you are sure, please click the button below.
						</p>
					</div>

					<p class="mt-4 text-center text-danger">
						<span class="glyphicon glyphicon-alert"></span> All forms of violations will be process by the authorities according to applicable laws and regulations!
					</p>

					<div class="form-group text-center">
						<input type="submit" name="btnSubmit" class="btn bg-cust-secondary" value="Join Competition">
					</div>
				</div>
			</div>

			</form>
		</div>
	</div>
</div>
