<!DOCTYPE html>
<html lang="en">
<? $this->load->view("templates/header")?>

<body>
	<!-- Navigation Menu -->
	<nav id="navbarContainer" class="navbar navbar-expand-lg navbar-dark px-1 position-fixed top-0 left-0 w-100">
		<div class="container d-flex justify-content-between position-relative">
			<a class="navbar-brand" href="#top">HyperBolt</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
				aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbar" style="flex-grow: 0">
				<div class="navbar-nav align-items-center text-nowrap">
					<a class="nav-item nav-link" href="#services">Services</a>
					<a class="nav-item nav-link" href="#portfolio">Portfolio</a>
					<a class="nav-item nav-link" href="#about">About</a>
					<a class="nav-item nav-link" href="#contact">Contact Us</a>
					<a class="nav-item nav-link w-100 w-lg-auto" href="<?= base_url('admin/profile') ?>">
						<button class="btn btn-primary btn-sm w-100">
							<i class="fas fa-tachometer-alt me-1"></i>Dashboard
						</button>
					</a>
				</div>
			</div>
		</div>
	</nav>

	<!-- Jumbotron -->
	<div class="jumbotron px-5 mb-4 vh-100">
		<div class="mx-auto text-white h-100" style="max-width: 55rem;">
			<div class="h-100 text-center d-flex flex-column gap-2 align-items-center justify-content-center">
				<h1 class="display-3 fw-bold">
					Innovate Fast. <span class="text-primary">Build Bold.</span>
					Grow Digital.
				</h1>
				<a href="#services" class="btn btn-primary mt-3">
					Layanan HyperBolt<i class="fa-solid fa-arrow-down"></i>
				</a>
			</div>
		</div>
	</div>

	<!-- Services Section -->
	<section id="services">
		<div class="container">
			<div class="text-center mb-5">
				<h2 class="text-primary fw-bold h6">SERVICES</h2>
				<h3 class="h4">Solusi digital inovatif untuk bisnis modern</h3>
			</div>
			<div class="content-container">

				<?php foreach ($services as $service): ?>

					<div class="card h-100 text-center border-0 shadow-sm">
						<div class="card-body p-4">
							<i class="<?= $service->icon_class ?> service-icon"></i>
							<h5 class="card-title text-primary">
								<?= $service->title ?>
							</h5>
							<p class="card-text">
								<?= $service->description ?>
							</p>
						</div>
					</div>

				<?php endforeach ?>

			</div>
		</div>
	</section>

	<!-- Portfolio Section -->
	<section id="portfolio">
		<div class="container">
			<div class="text-center mb-5">
				<h2 class="text-primary fw-bold h6">PORTFOLIO</h2>
				<h3 class="h4">Proyek digital yang telah kami bangun untuk klien kami</h3>
			</div>
			<div class="content-container">

				<?php foreach ($portfolios as $portfolio): ?>

					<div class="card h-100 shadow-sm">
						<img src="<?= $portfolio->image_url ?>" alt="E-Commerce Platform" class="portfolio-img">
						<div class="card-body">
							<h5 class="card-title text-primary">
								<?= $portfolio->title ?>
							</h5>
							<h6 class="card-subtitle mb-2 text-info">
								<?= $portfolio->client_name ?>
							</h6>
							<p class="card-text">
								<?= $portfolio->description ?>
							</p>
						</div>
					</div>

				<?php endforeach ?>

			</div>
		</div>
	</section>


	<!-- About Section -->
	<section id="about">
		<div class="container">
			<div class="text-center">
				<h2 class="text-primary fw-bold h6">ABOUT US</h2>
				<h3 class="h4">
					Solusi transformasi digital terbaik untuk Anda
				</h3>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="text-secondary d-grid gap-2 text-center mb-5">
						<p>
							<?= $profile->description ?>
						</p>
					</div>
				</div>
			</div>

			<!-- Staff Team -->
			<div class="text-center mb-4">
				<h3 class="h4">Tim di balik HyperBolt</h3>
			</div>
			<div class="content-container">

				<?php foreach ($staff as $member): ?>

					<div class="card h-100 text-center border-0 shadow-sm">
						<div class="card-body p-4">
							<h5 class="card-title text-primary">
								<?= $member->full_name ?>
							</h5>
							<h6 class="card-subtitle mb-3 text-info">
								<?= $member->position ?>
							</h6>
							<p class="card-text">
								<?= $member->bio ?>
							</p>
						</div>
					</div>

				<?php endforeach ?>
			</div>
		</div>
	</section>


	<!-- Contact Form -->
	<section id="contact">
		<div class="container">
			<div class="text-center mb-5">
				<h2 class="text-primary fw-bold h6">GET IN TOUCH</h2>
				<h3 class="h4">Bekerja sama dengan HyperBolt</h3>
				<p class="text-secondary mx-auto" style="max-width: 35rem">
					Kami siap membantu proyek Anda — baik dalam bentuk kolaborasi, kemitraan, atau solusi penuh. Mari mulai percakapan.
				</p>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="px-md-5 px-3 py-2">
						<p id="formMessage" class="text-center mb-3" style="display: none; color: red"></p>
						<form id="contactForm">
							<div class="mb-3">
								<label for="name" class="form-label">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" />
							</div>
							<div class="row mb-3">
								<div class="col-md-6 mb-3 mb-md-0">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Your Email" />
								</div>
								<div class="col-md-6">
									<label for="phone" class="form-label">Phone</label>
									<input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone Number" />
								</div>
							</div>
							<div class="mb-3">
								<label for="subject" class="form-label">Subject</label>
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" />
							</div>
							<div class="mb-3">
								<label for="message" class="form-label">Message</label>
								<textarea class="form-control" id="message" name="message" rows="5"
									placeholder="Your Message"></textarea>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary px-5">
									Send Message
									<i class="fa fa-paper-plane"></i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="text-white text-center py-4 mt-5">
		<div class="container">
			<p>© 2025 HyperBolt. All rights reserved.</p>
		</div>
	</footer>
</body>

</html>
