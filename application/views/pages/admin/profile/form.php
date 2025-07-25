<div class="card">
	<div class="card-header">
		<i class="fas fa-building me-2"></i>
		Company Detail
	</div>
	<div class="card-body">
		<?php echo form_open("admin/profile/update");
		$email = $profile->contact_email;
		$description = $profile->description;
		?>

		<div class="mb-3">
			<label for="email" class="form-label">Contact Email</label>
			<input
				id="contact_email"
				name="contact_email"
				type="email"
				class="form-control"
				placeholder="Company email"
				value="<?= isset($email) ? $email : '' ?>">
		</div>

		<div class="mb-3">
			<label for="description" class="form-label">Company Description</label>
			<textarea
				id="description"
				name="description"
				class="form-control"
				rows="5"><?= isset($description) ? $description : '' ?></textarea>
		</div>

		<div class="d-flex justify-content-end">
			<button type="submit" class="btn btn-primary">
				<i class="fas fa-save me-2"></i>
				Update Company Profile
			</button>
		</div>

		<?= form_close(); ?>
	</div>
</div>
