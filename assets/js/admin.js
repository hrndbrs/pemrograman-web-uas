document.addEventListener('DOMContentLoaded', function() {
	const sidebarToggle = document.getElementById('sidebarToggle');
	const sidebar = document.querySelector('.sidebar');

	sidebarToggle.addEventListener('click', function() {
		sidebar.classList.toggle('show');
		this.classList.toggle('active');
	});

	document.addEventListener('click', function(e) {
		if (window.innerWidth <= 768) {
			if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
				sidebar.classList.remove('show');
				sidebarToggle.classList.remove('active');
			}
		}
	});
});

