<div class="card p-4">
	<?php
	$is_update_form = isset($portfolio);

	echo form_open($is_update_form ? "admin/portfolios/update/{$portfolio->id}" : "admin/portfolios/create");
	?>

	<div class="row">
		<div class="col-md-6 mb-3">
			<label for="title" class="form-label">Name</label>
			<input
				id="title"
				name="title"
				type="text"
				class="form-control"
				placeholder="Project name"
				value="<?= $is_update_form ? $portfolio->title : "" ?>">
		</div>
		<div class="col-md-6 mb-3">
			<label for="client_name" class="form-label">Client Name</label>
			<input
				id="client_name"
				name="client_name"
				type="text"
				class="form-control"
				placeholder="Client name"
				value="<?= $is_update_form ? $portfolio->client_name : "" ?>">
		</div>
	</div>

	<div class="mb-3">
		<label for="image_url" class="form-label">Project Image URL</label>
		<input
			id="image_url"
			name="image_url"
			type="url"
			class="form-control"
			placeholder="https://example.com/image.jpg"
			value="<?= $is_update_form ? $portfolio->image_url : "" ?>">
	</div>

	<div class="mb-3">
		<label for="description" class="form-label">Description</label>
		<textarea
			id="description"
			name="description"
			class="form-control"
			rows="4"><?= $is_update_form ? $portfolio->description : "" ?></textarea>
	</div>

	<div class="d-flex flex-row-reverse gap-2">
		<button type="submit" class="btn btn-primary">
			<i class="fas fa-plus-circle me-2"></i>
			<?= $is_update_form ? "Update Project" : "Add Project" ?>
		</button>

		<a class="btn btn-outline-danger" href="<?= base_url('admin/portfolios') ?>">
			<button type="button">
				<i class="fas fa-times me-2"></i>
				Cancel
			</button>
		</a>
	</div>

	<?= form_close(); ?>
</div>
