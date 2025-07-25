<?php

class Profile extends CI_Controller
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
		$data["page_subtitle"] = "Manage company information and contact details";
		$data["profile"] = $this->ProfileModel->get()["data"];

		$this->render("pages/admin/profile/form", $data);
	}

	public function update()
	{
		$redirect_url =  base_url("admin/profile");
		$data = $this->validate_form($redirect_url);

		if ($this->ProfileModel->update($data)) {
			$this->session->set_flashdata('success', 'Company profile updated successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to update company profile.');
		}

		redirect($redirect_url);
	}

	private function init_data()
	{
		$title = "Company Profile";
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
		$this->form_validation->set_rules('contact_email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('description', 'Description', 'required');
	}

	private function validate_form(string $redirect)
	{
		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect($redirect);
		}

		return [
			'contact_email' => $this->input->post('contact_email', TRUE),
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
