<?php
class Staff extends CI_Controller
{
	private $prefix = "HyperBolt CMS - ";

	public function __construct()
	{
		parent::__construct();
		$this->init_form();
	}

	public function index()
	{
		$data = $this->init_data();

		$current_page = isset($_GET["page"]) ? validate_page_input($_GET["page"]) : 1;
		$staff_data = $this->StaffModel->get_list($current_page - 1);

		$data["page_subtitle"] = "Manage your team members";

		$data["staff"] = $staff_data["data"];
		$data["page_count"] = $staff_data["total_pages"];
		$data["current_page"] = $current_page;

		$this->render("pages/admin/staff/list", $data);
	}


	public function show_add_form()
	{
		$data = $this->init_data();
		$data["page_subtitle"] = "Add new staff member";

		$this->render("pages/admin/staff/form", $data);
	}

	public function show_edit_form(int $id)
	{
		$id = validate_resource_id($id);

		if (empty($id)) {
			show_404();
			return;
		}

		$staff = $this->StaffModel->get_by_id($id)["data"];
		if (empty($staff)) {
			show_404();
			return;
		}

		$data = $this->init_data();
		$data["page_subtitle"] = "Update staff detail";
		$data["staff"] = $staff;

		$this->render("pages/admin/staff/form", $data);
	}

	public function create()
	{
		$data = $this->validate_form(base_url('admin/staff'));

		if ($this->StaffModel->create($data)) {
			$this->session->set_flashdata('success', 'Staff created successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to create staff.');
		}

		redirect(base_url('admin/staff'));
	}

	public function update(int $id)
	{
		$data = $this->validate_form(base_url('admin/staff/' . $id));

		if ($this->StaffModel->update($id, $data)) {
			$this->session->set_flashdata('success', 'Staff updated successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to update staff.');
		}

		redirect(base_url('admin/staff'));
	}

	public function delete(int $id)
	{
		$id = validate_resource_id($id);
		$result = $this->StaffModel->delete($id);

		if ($result["deleted"] && $result["affected_rows"] == 1) {
			$this->session->set_flashdata('success', 'Staff deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete staff.');
		}

		redirect(base_url('admin/staff'));
	}

	private function init_data()
	{
		$title = "Staff";
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

	private function init_form()
	{
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('position', 'Position', 'required');
		$this->form_validation->set_rules('bio', 'Biography', 'required');
	}

	private function validate_form(string $redirect)
	{
		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect($redirect);
		}

		return [
			'full_name' => $this->input->post('full_name', TRUE),
			'position'  => $this->input->post('position', TRUE),
			'bio'       => $this->input->post('bio', TRUE),
		];
	}

	private function render(string $path, $data = [])
	{
		$content = $this->load->view($path, $data, true);
		$data["content"] = $content;
		$this->load->view("templates/admin", $data);
	}
}
