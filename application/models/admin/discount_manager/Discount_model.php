<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Discount_model extends CI_Model {
	public function get_discount_table($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('a.row_id, a.discount, a.disc_amnt, a.status, b.dept_code');
			$this->db->from('tbl_discount a');
			$this->db->join('tbl_departments b', 'b.dept_id = a.disc_for');
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
					$sbdata[] = $row->discount;
					$sbdata[] = '<span class="text-right" style="display:block">'.number_format($row->disc_amnt, 2, '.', ',').'</span>';
					$sbdata[] = '<span class="text-center" style="display:block">'.$row->dept_code.'</span>';
					$sbdata[] = '<span class="text-center" style="display:block">'.$status.'</span>';
					$sbdata[] = '<button type="button" data-id="'.$row->row_id.'" data-toggle="modal" data-target="#editDiscModal" data-backdrop="static" data-keyboard="false" class="editRow btn btn-outline-primary btn-sm"><i class="ti ti-pencil"></i></button>';

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

				$data[] = $sbdata;

				$json_data = array(
					// "draw"					=> '';
					"recordsTotal"	=> intval($query->num_rows()),
					"data" => $data,
				);
			}
			return json_encode($json_data);
		}
	}

	public function get_departments()
	{
		$this->db->select();
		$this->db->from('tbl_departments');
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return json_encode($query->result());
		}
		
		return json_encode(false);
	}

	public function create_discount()
	{
		$data = array(
			'discount' 	=> $this->input->post('dname'),
			'disc_amnt' => $this->input->post('pcnt'),
			'disc_for' 	=> $this->input->post('dFor'),
			'status' 		=> 1
		);

		if ($this->db->insert('tbl_discount', $data))
		{
			$log = array(
				'emp_id' 	 => $this->session->userdata('uniq_id'),
				'c_log' 	 => 'Created a new fee: '.$this->input->post('dname').' - '.number_format($this->input->post('pcnt'), 2, '.', ',').' for '.$this->input->post('dFor'),
				'mod_date' => date('Y-m-d h:i:s a')
			);

			if ($this->db->insert('tbl_logs', $log))
			{
				$this->db->select('a.row_id, a.discount, a.disc_amnt, a.disc_for, a.status, b.dept_code');
				$this->db->from('tbl_discount a');
				$this->db->join('tbl_departments b', 'b.dept_id = a.disc_for');
				$this->db->order_by('a.row_id', 'DESC');
				$this->db->limit(1);
				$query = $this->db->get();

				if ($query->num_rows() > 0)
				{
					return json_encode($query->row());
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