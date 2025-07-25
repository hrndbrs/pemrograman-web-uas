<div class="card p-4">
	<?php
	$is_update_form = isset($service);

	echo form_open($is_update_form ? "admin/services/update/{$service->id}" : "admin/services/create");
	?>

	<div class="row">
		<div class="col-md-6 mb-3">
			<label for="title" class="form-label">Service Title</label>
			<input
				id="title"
				name="title"
				type="text"
				class="form-control"
				placeholder="Service name"
				value="<?= $is_update_form ? $service->title : "" ?>">
		</div>
		<div class="col-md-6 mb-3">
			<label for="icon_class" class="form-label">Icon Class</label>
			<input
				id="icon_class"
				name="icon_class"
				type="text"
				class="form-control"
				placeholder="e.g., fas fa-code"
				value="<?= $is_update_form ? $service->icon_class : "" ?>">
		</div>
	</div>

	<div class="mb-3">
		<label for="description" class="form-label">
			Description
		</label>
		<textarea
			id="description"
			name="description"
			class="form-control"
			rows="4"><?= $is_update_form ? $service->description : "" ?></textarea>
	</div>

	<div class="d-flex flex-row-reverse gap-2">
		<button type="submit" class="btn btn-primary">
			<i class="fas fa-plus-circle me-2"></i>
			<?= $is_update_form ? "Update Service" : "Add Service" ?>
		</button>

		<a class="btn btn-outline-danger" href="<?= base_url('admin/services') ?>">
			<button type="button">
				<i class="fas fa-times me-2"></i>
				Cancel
			</button>
		</a>
	</div>
	<?= form_close(); ?>
</div>
