<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_model extends CI_Model{
	public function get_acad_year($status = FALSE)
	{
		if ($status === FALSE)
		{
			$this->db->select();
			$this->db->from('tbl_acad_year');
			$query = $this->db->get();

			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
		}
		else
		{
			$this->db->select();
			$this->db->from('tbl_acad_year');
			$this->db->where('status', $status);
			$query = $this->db->get();
			if ($query->num_rows() > 0)
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}
	}

	public function get_semester($status = FALSE)
	{
		if ($status === FALSE)
		{
			$this->db->select();
			$this->db->from('tbl_semester');
			$query = $this->db->get();

			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
		}
		else
		{
			$this->db->select();
			$this->db->from('tbl_semester');
			$this->db->where('status', $status);
			$query = $this->db->get();
			if ($query->num_rows() > 0)
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}
	}
}