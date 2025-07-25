<!DOCTYPE html>
<html lang="en">
<?php
$this->load->helper("view");
$segment = $this->uri->segment(2);
$this->load->view("templates/header");
?>

<body>
	<!-- Sidebar -->
	<div class="sidebar">
		<div class="sidebar-header">
			<h1>HyperBolt CMS</h4>
		</div>

		<nav class="sidebar-nav">
			<div class="accordion" id="companyAccordion">
				<div class="accordion-item">
					<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
							data-bs-target="#companyCollapse" aria-expanded="false" aria-controls="companyCollapse">
							<i class="fas fa-building me-3"></i>
							Company
						</button>
					</h2>
					<div id="companyCollapse" class="accordion-collapse collapse" data-bs-parent="#companyAccordion">
						<div class="accordion-body">
							<a href="<?= base_url('admin/profile') ?>" class="accordion-nav-item <?= nav_active($segment, 'profile') ?>">
								<i class="fas fa-info-circle"></i>
								Profile
							</a>
							<a href="<?= base_url('admin/staff') ?>" class="accordion-nav-item <?= nav_active($segment, 'staff') ?>">
								<i class="fas fa-users"></i>
								Staff
							</a>
						</div>
					</div>
				</div>
			</div>

			<a href="<?= base_url('admin/services') ?>" class="nav-link <?= nav_active($segment, 'services') ?>">
				<i class="fas fa-cogs"></i>
				Services
			</a>

			<a href="<?= base_url('admin/portfolios') ?>" class="nav-link <?= nav_active($segment, 'portfolios') ?>">
				<i class="fas fa-folder-open"></i>
				Portfolios
			</a>
		</nav>

		<div class="sidebar-footer p-3">
			<a href="<?= base_url('/') ?>" class="btn btn-outline-secondary w-100">
				<i class="fas fa-arrow-left me-2"></i>
				Back to Site
			</a>
		</div>
	</div>

	<!-- Floating Topbar -->
	<div class="floating-topbar">
		<button class="sidebar-toggle" id="sidebarToggle">
			<span class="hamburger-line"></span>
			<span class="hamburger-line"></span>
			<span class="hamburger-line"></span>
		</button>
	</div>

	<!-- Main Content -->
	<div class="main-content position-relative">

		<div class="position-absolute w-100 top-0 left-0 p-1">
			<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<div>
						<?= $this->session->flashdata('success') ?>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<div>
						<?= $this->session->flashdata('error') ?>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
		</div>

		<section class="content-section">
			<div class="page-header">
				<h2 class="page-title">
					<?= $page_title ?>
				</h2>
				<p class="page-subtitle">
					<?= $page_subtitle ?>
				</p>
			</div>
			<?= $content ?>
		</section>
	</div>
</body>

</html>
