<?php
class Services extends CI_Controller
{
	private $prefix = "HyperBolt CMS - ";

	public function index()
	{
		$data = $this->init_data();

		$current_page = isset($_GET["page"]) ? validate_page_input($_GET["page"]) : 1;
		$services_data = $this->ServicesModel->get_list($current_page - 1);

		$data["page_subtitle"] = "Manage your service offerings";

		$data["services"] = $services_data["data"];
		$data["page_count"] = $services_data["total_pages"];
		$data["current_page"] = $current_page;

		$this->render("pages/admin/services/list", $data);
	}


	public function show_add_form()
	{
		$data = $this->init_data();
		$data["page_subtitle"] = "Add new service";

		$this->render("pages/admin/services/form", $data);
	}

	public function show_edit_form(int $id)
	{
		$id = validate_resource_id($id);

		if (empty($id)) {
			show_404();
			return;
		}

		$service = $this->ServicesModel->get_by_id($id)["data"];
		if (empty($service)) {
			show_404();
			return;
		}

		$data = $this->init_data();
		$data["page_subtitle"] = "Update a service";
		$data["service"] = $service;

		$this->render("pages/admin/services/form", $data);
	}

	public function create()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('icon_class', 'Icon Class', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/services/add');
			return;
		}

		$data = [
			'title' => $this->input->post('title', TRUE),
			'icon_class' => $this->input->post('icon_class', TRUE),
			'description' => $this->input->post('description', TRUE),
		];

		if ($this->ServicesModel->create($data)) {
			$this->session->set_flashdata('success', 'Service created successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to create service.');
		}

		redirect('admin/services');
	}

	public function update(int $id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('icon_class', 'Icon Class', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect("admin/services/$id");
		}

		$data = [
			'title' => $this->input->post('title', TRUE),
			'icon_class' => $this->input->post('icon_class', TRUE),
			'description' => $this->input->post('description', TRUE),
		];

		if ($this->ServicesModel->update($id, $data)) {
			$this->session->set_flashdata('success', 'Service updated successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to update service.');
		}

		redirect('admin/services');
	}

	public function delete(int $id)
	{
		$id = validate_resource_id($id);
		$result = $this->ServicesModel->delete($id);

		if ($result["deleted"] && $result["affected_rows"] == 1) {
			$this->session->set_flashdata('success', 'Service deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete service.');
		}

		redirect(base_url('admin/services'));
	}

	private function init_data()
	{
		$title = "Services";
		$style_url = base_url("assets/css/admin.css");
		$script_url = base_url("assets/js/admin.js");

		$data["title"] = $this->prefix . $title;
		$data["page_title"] =  $title;
		$data["extra_head"] = "
	<link rel=\"stylesheet\" href=\"$style_url\" />
	<script src=\"$script_url\"></script>
		";

		return $data;
	}

	private function render(string $path, $data = [])
	{
		$content = $this->load->view($path, $data, true);
		$data["content"] = $content;
		$this->load->view("templates/admin", $data);
	}
}
