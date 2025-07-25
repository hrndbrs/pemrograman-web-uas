<a href="<?= base_url('admin/services/add') ?>" class="card">
	<button class="card-header d-flex justify-content-between align-items-center">
		<div>
			<i class="fas fa-circle-plus me-2"></i>
			Add New Service
		</div>
	</button>
</a>

<?php foreach ($services as $service):
	$id = $service->id;
	$title = $service->title;
	$icon = $service->icon_class;
	$description = $service->description;
?>

	<div class="content-item">
		<div class="item-header">
			<div>
				<h5 class="item-title">
					<?= $title ?>
				</h5>
				<div class="item-meta"><i class="<?= $icon ?> me-2"></i>
					<?= $icon ?>
				</div>
			</div>
			<div class="btn-group">

				<a href="<?= base_url('admin/services/' . $id) ?>" class="btn btn-sm btn-outline-info">
					<i class="fas fa-edit"></i>
				</a>
				<a href="<?= base_url('admin/services/delete/' . $id) ?>" class="btn btn-sm btn-outline-danger">
					<i class="fas fa-trash"></i>
				</a>
			</div>
		</div>
		<p class="item-description">
			<?= $description ?>
		</p>
	</div>
<?php endforeach; ?>
