<header>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>

		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active" style="background-image: url('<?=base_url('assets/'); ?>bg2.jpg')">
				<div class="carousel-caption d-none d-md-block">
					<h3>First Slide</h3>
					<p>This is a description for the first slide.</p>
				</div>
			</div>
			<div class="carousel-item" style="background-image: url('<?=base_url('assets/'); ?>bg1.jpg')">
				<div class="carousel-caption d-none d-md-block">
					<h3>Second Slide</h3>
					<p>This is a description for the second slide.</p>
				</div>
			</div>
			<div class="carousel-item" style="background-image: url('<?=base_url('assets/'); ?>bg3.jpg')">
				<div class="carousel-caption d-none d-md-block">
					<h3>Third Slide</h3>
					<p>This is a description for the third slide.</p>
				</div>
			</div>
		</div>

		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
		</a>
	</div>
</header>

<div class="container form-search-wrap">
	<form method="POST" action="<?= base_url(); ?>competition/searchHelper">
		<div class="row align-items-center">
			<div class="col-lg-10 mb-2">
				<input type="text" class="form-control rounded" id="txtSearch" name="txtSearch" placeholder="What are you looking for?">
			</div>

			<div class="col-lg-2 mb-2">
				<!-- <input type="submit" class="btn btn-primary btn-block rounded" value="Search"> -->
				<button class="btn btn-primary btn-block"><!-- <span class="glyphicon glyphicon-search"></span> --> Search</button>
			</div>
		</div>
	</form>
</div>

<div class="container">
	<div class="col-lg-12 mt-4">
		<h2>Current</h2>
		<div class="row">
			<?php
				$i = 0;
				foreach($competitionData as $row) {
					if ($i < 8) {
			?>
					<div class="col-lg-3 col-md-6 mb-4" id="<?= $row->competitionID; ?>">
						<div class="card h-100 hvr-float">
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
									<span class="glyphicon glyphicon-calendar"></span>
									<?php
										$originDate = $row->competitionStartDate;
										$formatedDate = date("d M, Y", strtotime($originDate));
										echo $formatedDate;
									?><br>
									<span class="glyphicon glyphicon-map-marker"></span> <?= $row->competitionLocation; ?>
								</p>
								<p class="card-text">
									Registration Deadline:<br>
									<?php
										$originDate = $row->competitionDeadline;
										$formatedDate = date("d M, Y", strtotime($originDate));
										echo $formatedDate;
									?><br>
									<!-- <small class="text-muted">Uploaded n mins ago</small> -->
								</p>
							</div>
						</div>
					</div>
			<?php
					}
					$i++;
				}
			?>
		</div>
	</div>
</div>

<?php
	if (!$this->session->userdata('activeContestantSession')) {
?>
		<div id="registerPromotion" class="mt-5 text-center">
			<a href="<?= base_url(); ?>register" class="">Join us for Free! &raquo;</a>
		</div>
<?php
	}
?>
