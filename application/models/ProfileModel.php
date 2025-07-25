<?php defined('BASEPATH') or exit('No direct script access allowed');


class ProfileModel extends CI_Model
{
	private $table_name = "company_profile";

	public function get()
	{
		$result["data"] = $this->db
			->get_where($this->table_name, ["id" => 1])
			->row();

		return $result;
	}

	public function update($data)
	{
		$this->db->where('id', 1);
		$result["updated"] = $this->db->update($this->table_name, $data);
		$result["affected_rows"] = $this->db->affected_rows();

		return $result;
	}
}
