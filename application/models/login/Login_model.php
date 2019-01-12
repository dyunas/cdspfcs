<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function check_user_credentials($uname = FALSE)
	{
		if ($uname === FALSE)
		{
			$this->db->where('uname', $this->input->post('uname'));
			// $this->db->where('password', md5($this->input->post('pword')));
			$this->db->from('tbl_accounts');

			$query = $this->db->get();

			if ($query->num_rows() > 0)
			{
				$row = $query->row();
				
				if ($row->status)
				{
					if ($row->password == md5($this->input->post('pword')))
					{
							$user_data = array('row_id' => $row->row_id, 'uname' => $row->uname, 'fname' => $row->fname, 'lname' => $row->lname, 'uniq_id' => $row->emp_uniq_id, 'role' => $row->role, 'is_in' => 1);
						  $this->session->set_userdata($user_data);
						  $this->session->set_flashdata('success', 'Welcome! '.$row->fname.' '.$row->lname);

							return TRUE;
					}
					else
					{
						$this->session->set_flashdata('error', 'Incorrect password! Plese try again.');
						return FALSE;
					}
				}
				else
				{
					$this->session->set_flashdata('error', 'The account you are trying to log-in has been either removed or disabled. Please contact the administrator.');
					return FALSE;
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Invalid Account!');
				return FALSE;
			}
		}

		$this->db->where('uname', $uname);
		$this->db->from('tbl_accounts');

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			$this->session->set_flashdata('error', 'Please log-in to access the system');
			return FALSE;
		}
	}

	public function Log_out()
	{
		// unset userdata session
		$arr_items = array('__ci_last_regenerate', 'row_id', 'uname', 'fname', 'lname', 'uniq_id', 'role', 'is_in');

		$this->session->unset_userdata($arr_items);

		// redirect back to login page
		// $this->session->sess_destroy();
		$this->session->set_flashdata('success', 'You have been logged out');
		return TRUE;
	}
}
