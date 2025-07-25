<a href="<?= base_url('admin/staff/add') ?>" class="card">
	<button class="card-header d-flex justify-content-between align-items-center">
		<div>
			<i class="fas fa-users me-2"></i>
			Add New Staff Member
		</div>
	</button>
</a>

<?php foreach ($staff as $member):
	$id = $member->id;
	$full_name = $member->full_name;
	$position = $member->position;
	$bio = $member->bio;
?>

	<div class="content-item">
		<div class="item-header">
			<div>
				<h5 class="item-title">
					<?= $full_name ?>
				</h5>
				<div class="item-meta">
					<?= $position ?>
				</div>
			</div>
			<div class="btn-group">

				<a href="<?= base_url('admin/staff/' . $id) ?>" class="btn btn-sm btn-outline-info">
					<i class="fas fa-edit"></i>
				</a>
				<a href="<?= base_url('admin/staff/delete/' . $id) ?>" class="btn btn-sm btn-outline-danger">
					<i class="fas fa-trash"></i>
				</a>
			</div>
		</div>
		<p class="item-description">
			<?= $bio ?>
		</p>
	</div>
<?php endforeach; ?>
