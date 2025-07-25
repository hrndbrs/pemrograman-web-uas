<div class="card p-4">
	<?php
	$is_update_form = isset($staff);

	echo form_open($is_update_form ? "admin/staff/update/{$staff->id}" : "admin/staff/create");
	?>

	<div class="row">
		<div class="col-md-6 mb-3">
			<label for="full_name" class="form-label">Full Name</label>
			<input
				id="full_name"
				name="full_name"
				type="text"
				class="form-control"
				placeholder="Staff full name"
				value="<?= $is_update_form ? $staff->full_name : "" ?>">
		</div>
		<div class="col-md-6 mb-3">
			<label for="position" class="form-label">Position</label>
			<input
				id="position"
				name="position"
				type="text"
				class="form-control"
				placeholder="Position"
				value="<?= $is_update_form ? $staff->position : "" ?>">
		</div>
	</div>

	<div class="mb-3">
		<label for="bio" class="form-label">Biography</label>
		<textarea
			id="bio"
			name="bio"
			class="form-control"
			rows="5"><?= $is_update_form ? $staff->bio : "" ?></textarea>
	</div>

	<div class="d-flex flex-row-reverse gap-2">
		<button type="submit" class="btn btn-primary">
			<i class="fas fa-plus-circle me-2"></i>
			<?= $is_update_form ? "Update Staff Member" : "Add Staff Member" ?>
		</button>

		<a class="btn btn-outline-danger" href="<?= base_url('admin/staff') ?>">
			<button type="button">
				<i class="fas fa-times me-2"></i>
				Cancel
			</button>
		</a>
	</div>

	<?= form_close(); ?>
</div>
