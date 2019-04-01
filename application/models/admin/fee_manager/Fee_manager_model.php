<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Fee_manager_model extends CI_model {
	public function get_grade_levels()
	{
		$this->db->select('grd_lvl');
		$this->db->from('tbl_grd_level');
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

	public function get_fee_table($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('a.row_id, a.fee_name, a.amount, a.fee_for, a.status');
			$this->db->from('tbl_fees a');
			$this->db->order_by('a.row_id', 'ASC');
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
					$sbdata[] = $row->fee_name;
					$sbdata[] = '<span class="text-right" style="display:block">'.number_format($row->amount, 2, '.', ',').'</span>';
					$sbdata[] = '<span class="text-center" style="display:block">'.$row->fee_for.'</span>';
					$sbdata[] = '<span class="text-center" style="display:block">'.$status.'</span>';
					$sbdata[] = '<button type="button" data-id="'.$row->row_id.'" data-toggle="modal" data-target="#editPaymentModal" data-backdrop="static" data-keyboard="false" class="editRow btn btn-outline-primary btn-sm"><i class="ti ti-pencil"></i></button>';

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
		else
		{
			$this->db->select('a.row_id, a.fee_name, a.amount, a.fee_for, a.status');
			$this->db->from('tbl_fees a');
			$this->db->where('a.row_id', $id);
			$query = $this->db->get();

			if ($query->num_rows() > 0)
			{
				return json_encode($query->row());
			}
			else
			{
				return json_encode(false);
			}
		}
	}

	public function check_feecode($fcode)
	{
		$this->db->select('fee_code');
		$this->db->from('tbl_fees');
		$this->db->where('fee_code', $fcode);
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

	public function create_new_fee()
	{
		$data = array(
			'fee_name' => $this->input->post('fname'),
			'amount'   => $this->input->post('amnt'),
			'fee_for'  => $this->input->post('fFor'),
			'status'   => 1
		);

		if ($this->db->insert('tbl_fees', $data))
		{
			$log = array(
				'emp_id' => $this->session->userdata('uniq_id'),
				'c_log' => 'Created a new fee: '.$this->input->post('fname').' - '.number_format($this->input->post('amnt'), 2, '.', ',').' for '.$this->input->post('fFor'),
				'mod_date' => date('Y-m-d h:i:s a')
			);

			if ($this->db->insert('tbl_logs', $log))
			{
				$this->db->select('a.row_id, a.fee_name, a.amount, a.fee_for, a.status');
				$this->db->from('tbl_fees a');
				$this->db->order_by('a.row_id', 'DESC');
				$this->db->limit(1);
				$query = $this->db->get();

				if ($query->num_rows() > 0)
				{
					return json_encode($query->row());
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
		else
		{
			return json_encode(false);
		}
	}

	public function update_fee()
	{
		$data = array(
			'fee_name' => $this->input->post('editFname'),
			'amount'   => $this->input->post('editAmnt'),
			'fee_for'  => $this->input->post('fFor')
		);
		$this->db->where('row_id', $this->input->post('row_id'));
		if ($this->db->update('tbl_fees', $data))
		{
			$log = array(
				'emp_id' => $this->session->userdata('uniq_id'),
				'c_log' => 'Update a fee: '.$this->input->post('editFname').' - '.number_format($this->input->post('editAmnt'), 2, '.', ',').' for '.$this->input->post('fFor'),
				'mod_date' => date('Y-m-d h:i:s a')
			);

			if ($this->db->insert('tbl_logs', $log))
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
}