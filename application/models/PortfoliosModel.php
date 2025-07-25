<?php defined('BASEPATH') or exit('No direct script access allowed');

class PortfoliosModel extends CI_Model
{
	private $table_name = "portfolios";

	public function get_list($offset = 0, $limit = 10)
	{
		$result["data"] = $this->db
			->order_by("created_at", "DESC")
			->get($this->table_name, $limit, $offset * $limit)
			->result();

		$total_data = $this->count_all();

		$result["total_pages"] = ceil($total_data / $limit);

		return $result;
	}

	public function get_by_id(int $id)
	{
		$result["data"] = $this->db
			->get_where($this->table_name, ["id" => $id])
			->row();

		return $result;
	}

	public function create($data)
	{
		$result["created"] =  $this->db->insert($this->table_name, $data);

		return $result;
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$result["updated"] = $this->db->update($this->table_name, $data);
		$result["affected_rows"] = $this->db->affected_rows();

		return $result;
	}

	public function delete(int $id)
	{
		$this->db->where('id', $id);
		$result["deleted"] = $this->db->delete($this->table_name);
		$result["affected_rows"] = $this->db->affected_rows();

		return $result;
	}

	private function count_all()
	{
		return $this->db->count_all($this->table_name);
	}
}
