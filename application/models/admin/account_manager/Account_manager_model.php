<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account_manager_model extends CI_Model {
	public function get_account_table_data()
	{
		$this->db->select('a.row_id, a.emp_uniq_id, a.uname, a.fname, a.lname, a.role, a.status, b.role_type');
		$this->db->from('tbl_accounts a');
		$this->db->join('tbl_act_type b', 'b.role_id = a.role');
		$this->db->order_by('a.row_id', 'DESC');
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			$data = array();
			foreach ($query->result() as $row)
			{
				if ($row->status == 1)
				{
					$status = '<span class="badge badge-success">Active</span>';
				}
				else
				{
					$status = '<span class="badge badge-danger">Inactive</span>';
				}

				$sbdata = array();
				$sbdata[] = $row->row_id;
				$sbdata[] = $row->uname;
				$sbdata[] = $row->fname;
				$sbdata[] = $row->lname;
				$sbdata[] = $row->role_type;
				$sbdata[] = $status;
				$sbdata[] = '<a href="college/view/'.$row->emp_uniq_id.'" class="btn btn-outline-primary btn-sm"><i class="ti ti-eye"></i></a>';

				$data[] = $sbdata;
			}

			$json_data = array(
				// "draw"					=> '';
				"recordsTotal"	=> intval($query->num_rows()),
				"data" => $data,
			);
		}
		else
		{
			$sbdata = array();
			$sbdata[] = '';
			$sbdata[] = '';
			$sbdata[] = '';
			$sbdata[] = '';
			$sbdata[] = '';
			$sbdata[] = '';
			$sbdata[] = '';

			$data[] = $sbdata;

			$json_data = array(
				// "draw"					=> '';
				"recordsTotal"	=> intval($query->num_rows()),
				"data" => $data,
			);
		}
		return json_encode($json_data);
	}

	public function get_account_roles()
	{
		$this->db->select();
		$this->db->from('tbl_act_type');
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return json_encode($query->result());
		}
		else
		{
			return json_encode(false);
		}
	}

	public function register_account()
	{
		$data = array(
			'emp_uniq_id' => uniqid(),
			'uname' 			=> $this->input->post('uname'),
			'password'		=> md5('password'),
			'lname'				=> $this->input->post('lname'),
			'fname'				=> $this->input->post('fname'),
			'role'				=> $this->input->post('role'),
			'status'			=> 1
		);

		if ($this->db->insert('tbl_accounts', $data))
		{
			$logData = array(
				'emp_id' 	 => $this->session->userdata('uniq_id'),
				'c_log' 	 => 'Created new account for '.$this->input->post('fname').' '.$this->input->post('lname').' with username '.$this->input->post('uname').' and account type '.$this->input->post('role').'.',
				'mod_date' => date('Y-m-d h:i:s a')
			);

			if ($this->db->insert('tbl_accounts', $logData))
			{
				return json_encode(true);
			}
			else
			{
				return json_encode(false);
			}
		}
		else
		{
			return json_encode(false);
		}
	}

	public function check_username($uname)
	{
		$this->db->select();
		$this->db->from('tbl_accounts');
		$this->db->where('uname', $uname);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}