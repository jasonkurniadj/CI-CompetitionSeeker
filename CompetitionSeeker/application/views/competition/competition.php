<div class="container form-search-wrap">
	<form method="POST" action="<?= base_url(); ?>competition/searchHelper">
		<div class="row align-items-center">
			<!-- <div class="col-lg-3 mb-4">
				<div class="select-wrap">
					<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>

					<select class="form-control rounded" name="" id="">
						<option value="">All Categories</option>
						<option value="">Technology</option>
						<option value="">Sport</option>
						<option value="">Art</option>
						<option value="">Photography</option>
						<option value="">Videography</option>
					</select>
				</div>
			</div> -->

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

		<div class="col-lg-9 mt-2">
			<?php
				$count = 0;
				foreach ($competitionData as $row) {
			?>
					<div class="card mb-3">
						<div class="row no-gutters">
							<div class="col-md-6">
								<a href="<?= base_url()."competition/detail/".$row->competitionID; ?>">
									<?php
										if ($row->competitionImage) {
									?>
											<img class="card-img-top" src="<?= $row->competitionImage; ?>" alt="Competition Image">
									<?php
										}
										else {
									?>
											<img class="card-img-top" src="<?= base_url('assets/'); ?>img640x360.png" alt="Competition Image">
									<?php
										}
									?>
								</a>
							</div>

							<div class="col-md-6">
								<div class="card-body">
									<h4 class="card-title"><a href="<?= base_url()."competition/detail/".$row->competitionID; ?>"><?= $row->competitionName; ?></a></h4>
									<h5>
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
									</h5>
									<p class="card-text">
										<span class="far">&#xf017;</span>
										<?php
											$originDate = $row->competitionStartDate;
											$formatedDate = date("d M, Y", strtotime($originDate));
											echo $formatedDate;
										?><br>
										<span class="fa">&#xf041;</span> <?= $row->competitionLocation; ?>
									</p>
									<p class="card-text">
										Registration Deadline:
										<?php
											$originDate = $row->competitionDeadline;
											$formatedDate = date("d M, Y", strtotime($originDate));
											echo $formatedDate;
										?><br>
										<small class="text-muted">Uploaded 3 mins ago</small>
									</p>
								</div>
							</div>
						</div>
					</div>
			<?php
					$count++;
				}
			?>

			<!-- <nav>
				<ul class="pagination pagination-circle pg-blue justify-content-center">
					<li class="page-item disabled"><a class="page-link" tabindex="0">First</a></li>
					<li class="page-item disabled">
						<a class="page-link" aria-label="Previous" tabindex="-1">
							<span aria-hidden="true">&lang;</span>
							<span class="sr-only">Previous</span>
						</a>
					</li>
					<?php
						$paging = $count%10 + 1;

						for ($i=1; $i<=$paging; $i++) {
							if ($i == 0) {
					?>
								<li class="page-item active"><a class="page-link"><?= $i; ?></a></li>
					<?php
							}
							else {
					?>
								<li class="page-item"><a class="page-link"><?= $i; ?></a></li>
					<?php
							}
						}
					?>
					<li class="page-item">
						<a class="page-link" aria-label="Next" tabindex="+1">
							<span aria-hidden="true">&rang;</span>
							<span class="sr-only">Next</span>
						</a>
					</li>
					<li class="page-item"><a class="page-link" tabindex="">Last</a></li>
				</ul>
			</nav> -->
		</div>
	</div>
</div>
