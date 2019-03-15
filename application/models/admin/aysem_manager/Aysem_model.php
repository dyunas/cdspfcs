<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Aysem_model extends CI_Model{
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

	public function update_acadyear()
	{
		$this->db->set('status', 0);
		$this->db->where('status', 1);
		if($this->db->update('tbl_acad_year'))
		{
			$this->db->set('status', 1);
			$this->db->where('acad_yr', $this->input->post('acadYear'));
			if($this->db->update('tbl_acad_year'))
			{
				$logs = array(
					"emp_id" => $this->session->userdata('uniq_id'),
					"c_log" => "Updated academic year to ".$this->input->post('acadYear'),
					"mod_date" => date('Y-m-d h:i:s a')
				);

				if ($this->db->insert('tbl_logs', $logs))
				{
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}

	public function update_semester()
	{
		$this->db->set('status', 0);
		$this->db->where('status', 1);
		if($this->db->update('tbl_semester'))
		{
			$this->db->set('status', 1);
			$this->db->where('semester', $this->input->post('semester'));
			if($this->db->update('tbl_semester'))
			{
				$logs = array(
					"emp_id" => $this->session->userdata('uniq_id'),
					"c_log" => "Updated semester to ".$this->input->post('semester')." Semester.",
					"mod_date" => date('Y-m-d h:i:s a')
				);

				if ($this->db->insert('tbl_logs', $logs))
				{
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}
}