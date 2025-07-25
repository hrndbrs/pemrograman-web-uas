<a href="<?= base_url('admin/portfolios/add') ?>" class="card">
	<button class="card-header d-flex justify-content-between align-items-center">
		<div>
			<i class="fas fa-folder-open me-2"></i>
			Add New Project
		</div>
	</button>
</a>

<?php foreach ($portfolios as $portfolio):
	$id = $portfolio->id;
	$title = $portfolio->title;
	$client_name = $portfolio->client_name;
	$image_url = $portfolio->image_url;
	$description = $portfolio->description;
?>

	<div class="content-item">
		<div class="item-header">
			<div>
				<img src="<?= $image_url; ?>" alt="<?= $title; ?>" class="portfolio-image">
				<h5 class="item-title">
					<?= $title; ?>
				</h5>
				<div class="item-meta">
					<?= $client_name; ?>
				</div>
			</div>
			<div class="btn-group">
				<a href="<?= base_url('admin/portfolios/' . $id) ?>" class="btn btn-sm btn-outline-secondary">
					<i class="fas fa-edit"></i>
				</a>
				<a href="<?= base_url('admin/portfolios/delete/' . $id) ?>" class="btn btn-sm btn-outline-danger">
					<i class="fas fa-trash"></i>
				</a>
			</div>
		</div>
		<p class="item-description">
			<?= $description; ?>
		</p>
	</div>

<?php endforeach ?>
