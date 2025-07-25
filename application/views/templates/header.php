<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" type="image/x-icon" href="<?= base_url('assets/icons/favicon.ico'); ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/reset.css'); ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/fontawesome.css'); ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/brands.css'); ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/solid.css'); ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" />

	<title>
		<?= $title; ?>
	</title>

	<?php if (!empty($extra_head)) {
		echo $extra_head;
	} ?>

	<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" defer></script>
</head>
