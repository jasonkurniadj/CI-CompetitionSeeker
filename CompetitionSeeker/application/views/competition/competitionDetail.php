<div class="container form-search-wrap">
	<form method="POST" action="<?= base_url(); ?>competition/searchHelper">
		<div class="row align-items-center">
			<div class="col-lg-10 mb-4">
				<input type="text" class="form-control rounded" id="txtSearch" name="txtSearch" placeholder="What are you looking for?">
			</div>

			<div class="col-lg-2 mb-4">
				<input type="submit" class="btn btn-primary btn-block rounded" value="Search">
			</div>
		</div>
	</form>
</div>
<div class="container mb-5">
	<div class="row">
		<div class="col-lg-3">
			<h3 class="">Filter</h3>

			<div class="list-group mb-3">
				<h5 class="list-group-item active">Category</h5>
				<div class="list-group-item">
					<div class="custom-control custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="cbxTechnology" required>
						<label class="custom-control-label d-block" for="cbxTechnology">Technology</label>
					</div>
					<div class="custom-control custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="cbxSport" required>
						<label class="custom-control-label d-block" for="cbxSport">Sport</label>
					</div>
					<div class="custom-control custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="cbxArt" required>
						<label class="custom-control-label d-block" for="cbxArt">Art</label>
					</div>
					<div class="custom-control custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="cbxPhotography" required>
						<label class="custom-control-label d-block" for="cbxPhotography">Photography</label>
					</div>
					<div class="custom-control custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="cbxVideography" required>
						<label class="custom-control-label d-block" for="cbxVideography">Videography</label>
					</div>
				</div>
			</div>

			<div class="list-group">
				<h5 class="list-group-item active">Location</h5>
				<li class="list-group-item pb-3">
					<div class="custom-control custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="cbxJabodetabek" required>
						<label class="custom-control-label d-block" for="cbxJabodetabek">Jabodetabek</label>
					</div>
					<div class="custom-control custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="cbxBandung" required>
						<label class="custom-control-label d-block" for="cbxBandung">Bandung</label>
					</div>
					<div class="custom-control custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="cbxSurabaya" required>
						<label class="custom-control-label d-block" for="cbxSurabaya">Surabaya</label>
					</div>
					<div class="custom-control custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="cbxBali" required>
						<label class="custom-control-label d-block" for="cbxBali">Bali</label>
					</div>
					<div class="custom-control custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="cbxMedan" required>
						<label class="custom-control-label d-block" for="cbxMedan">Medan</label>
					</div>
				</li>
			</div>
		</div>

		<div class="col-lg-9">
			<?php
				foreach ($competitionData as $row) {
			?>
						<div class="card mt-4">
							<img class="card-img-top img-fluid" src="<?= base_url('assets/'); ?>img640x360.png" alt="">

							<div class="card-body">
								<h3 class="card-title"><?= $row->competitionName; ?></h3>
								<h4>
									<?php
										if ($row->competitionFee != 0) {
									?>
											Rp. <?= $row->competitionFee;
										}
										else {
									?>
											FREE
									<?php
										}
									?>
								</h4>
								<h5 class="mt-3">[Category]</h5>

								<?php
									if ($row->competitionDeadline < date("Y-m-d")){
								?>
										<div class="alert alert-danger">
											Registration already close!
										</div>
								<?php
									}
								?>
								
								<p class="card-text mt-4" style="text-align: justify;">
									<?= $row->competitionDescription; ?>
								</p>

								<!-- <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
								4.0 stars -->

								<?php
									if ($row->competitionDeadline > date("Y-m-d")){
								?>
										<a href="<?= base_url()."competition/joinHelper/".$row->competitionID; ?>" class="btn bg-cust-secondary">Join Competition</a>
								<?php
									}
								?>
								
							</div>
						</div>
				<?php
					}
				?>

			<!-- <div class="card card-outline-secondary my-4">
				<div class="card-header">
					Product Reviews
				</div>

				<div class="card-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
					<small class="text-muted">Posted by Anonymous on 3/1/17</small>
					<hr>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
					<small class="text-muted">Posted by Anonymous on 3/1/17</small>
					<hr>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
					<small class="text-muted">Posted by Anonymous on 3/1/17</small>
					<hr>
					<a href="#" class="btn btn-success">Leave a Review</a>
				</div>
			</div> -->
		</div>
	</div>
</div>
