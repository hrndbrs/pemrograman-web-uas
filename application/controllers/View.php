<?php

class View extends CI_Controller
{
	public function home()
	{
		$data = $this->init_data();
		$this->load->view('pages/home', $data);
	}

	private function init_data()
	{
		$style_url = base_url("assets/css/home.css");
		$script_url = base_url("assets/js/home.js");

		$data["title"] = "UAS";
		$data["extra_head"] = "
	<link rel=\"stylesheet\" href=\"$style_url\" />
	<script src=\"$script_url\"></script>
		";

		return $data;
	}
}
