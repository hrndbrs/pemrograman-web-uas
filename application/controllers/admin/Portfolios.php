<?php
class Portfolios extends CI_Controller
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
		$portfolios_data = $this->PortfoliosModel->get_list($current_page - 1);

		$data["page_subtitle"] = "Manage your portfolios";

		$data["portfolios"] = $portfolios_data["data"];
		$data["page_count"] = $portfolios_data["total_pages"];
		$data["current_page"] = $current_page;

		$this->render("pages/admin/portfolios/list", $data);
	}


	public function show_add_form()
	{
		$data = $this->init_data();
		$data["page_subtitle"] = "Add new portfolio";

		$this->render("pages/admin/portfolios/form", $data);
	}

	public function show_edit_form(int $id)
	{
		$id = validate_resource_id($id);

		if (empty($id)) {
			show_404();
			return;
		}

		$portfolio = $this->PortfoliosModel->get_by_id($id)["data"];
		if (empty($portfolio)) {
			show_404();
			return;
		}

		$data = $this->init_data();
		$data["page_subtitle"] = "Update a portfolio";
		$data["portfolio"] = $portfolio;

		$this->render("pages/admin/portfolios/form", $data);
	}

	public function create()
	{
		$data = $this->validate_form(base_url("admin/portfolios/add"));

		if ($this->PortfoliosModel->create($data)) {
			$this->session->set_flashdata('success', 'Portfolio created successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to create portfolio.');
		}

		redirect(base_url('admin/portfolios'));
	}

	public function update(int $id)
	{
		$data = $this->validate_form(base_url("admin/portfolios/" . $id));

		if ($this->PortfoliosModel->update($id, $data)) {
			$this->session->set_flashdata('success', 'Portfolio updated successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to update portfolio.');
		}

		redirect(base_url('admin/portfolios'));
	}

	public function delete(int $id)
	{
		$id = validate_resource_id($id);
		$result = $this->PortfoliosModel->delete($id);

		if ($result["deleted"] && $result["affected_rows"] == 1) {
			$this->session->set_flashdata('success', 'portfolio deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete portfolio.');
		}

		redirect(base_url('admin/portfolios'));
	}

	private function init_data()
	{
		$title = "Portfolios";
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
		$this->form_validation->set_rules('title', 'Project Name', 'required');
		$this->form_validation->set_rules('client_name', 'Client Name', 'trim|required');
		$this->form_validation->set_rules('image_url', 'Project Image URL', 'trim|valid_url|required');
		$this->form_validation->set_rules('description', 'Description', 'required');
	}

	private function validate_form(string $redirect)
	{
		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect($redirect);
		}

		return [
			'title'        => $this->input->post('title', TRUE),
			'client_name'  => $this->input->post('client_name', TRUE),
			'image_url'    => $this->input->post('image_url', TRUE),
			'description'  => $this->input->post('description', TRUE),
		];
	}

	private function render(string $path, $data = [])
	{
		$content = $this->load->view($path, $data, true);
		$data["content"] = $content;
		$this->load->view("templates/admin", $data);
	}
}
