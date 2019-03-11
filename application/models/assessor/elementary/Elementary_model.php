<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Elementary_model extends CI_Model {
	public function get_school_fees($feeFor)
	{
		$this->db->select('row_id, fee_name, amount');
		$this->db->from('tbl_fees');
		$this->db->where('status', 1);
		$this->db->where('fee_for', $feeFor);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

	public function get_discounts($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('a.department, b.row_id, b.disc_code, b.disc_amnt');
			$this->db->from('tbl_departments a');
			$this->db->join('tbl_discount b', 'b.disc_for = a.dept_id');
			$this->db->like('a.department', 'elementary', 'both');
			$this->db->where('b.status', 1);
			$query = $this->db->get();

			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return FALSE;
			}
		}

		$this->db->select('disc_amnt');
		$this->db->from('tbl_discount');
		$this->db->where('row_id', $id);
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

	public function get_tuition_fee($feeFor)
	{
		$this->db->select('row_id, amount');
		$this->db->from('tbl_fees');
		$this->db->like('fee_for', $feeFor);
		$this->db->like('fee_name', 'tuition', 'both');
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

	public function get_elem_table_data()
	{
		$this->db->select('a.stud_lrn, a.stud_lname, a.stud_fname, a.stud_grade_lvl, a.stud_section, a.stud_status');
		$this->db->from('tbl_stud_info_elem a');

		$query = $this->db->get();
		$data = array();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				if ($row->stud_status == 'registered')
				{
					$status = '<span class="badge badge-primary">'.$row->stud_status.'</span>';
				}
				elseif ($row->stud_status == 'enrolled')
				{
					$status = '<span class="badge badge-success">'.$row->stud_status.'</span>';
				}
				elseif ($row->stud_status == 'graduate')
				{
					$status = '<span class="badge badge-success">'.$row->stud_status.'</span>';
				}
				elseif ($row->stud_status == 'dropped')
				{
					$status = '<span class="badge badge-danger">'.$row->stud_status.'</span>';
				}
				elseif ($row->stud_status == 'reserved')
				{
					$status = '<span class="badge badge-info">'.$row->stud_status.'</span>';
				}
				elseif ($row->stud_status == 'transfered')
				{
					$status = '<span class="badge badge-warning">'.$row->stud_status.'</span>';
				}
				else
				{
					$status = '<span class="badge badge-secondary">'.$row->stud_status.'</span>';
				}

				$sbdata = array();
				$sbdata[] = $row->stud_lrn;
				$sbdata[] = $row->stud_lname;
				$sbdata[] = $row->stud_fname;
				$sbdata[] = $row->stud_grade_lvl;
				$sbdata[] = $row->stud_section;
				$sbdata[] = $status;
				$sbdata[] = '<a href="dashboard/view/'.$row->stud_lrn.'" class="btn btn-outline-primary btn-sm"><i class="ti ti-eye"></i></a>';

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

	public function get_student_info($uniq_id)
	{
		$this->db->select('
			a.stud_lrn, a.stud_avatar, a.stud_lname, a.stud_fname, a.stud_mname, a.stud_status, a.stud_rgstrtn_dte, a.stud_grade_lvl, a.stud_section, a.stud_acad_yr, a.stud_email, a.stud_bdate, a.stud_tnum, a.stud_cnum, a.stud_gender, a.stud_cur_adrs, a.stud_perm_adrs,
			b.stud_grdns_name, b.stud_grdns_tnum, b.stud_grdns_cnum, b.stud_grdns_adrs,
			c.bCertPSA, c.certGMC, c.certHonDis, c.frm137, c.frm138,
			g.acad_yr,
			h.gender
		');
		$this->db->from('tbl_stud_info_elem a');
		$this->db->join('tbl_stud_adtnl_info_elem b', 'b.stud_lrn = a.stud_lrn');
		$this->db->join('tbl_stud_documents c', 'c.stud_lrn = a.stud_lrn');
		$this->db->join('tbl_acad_year g', 'g.acad_id = a.stud_acad_yr');
		$this->db->join('tbl_gender h', 'h.gdr_id = a.stud_gender');
		$this->db->where('a.stud_lrn', $uniq_id);

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

	public function insert_student_assessment_info()
	{
		$this->db->select('rowID');
		$this->db->from('tbl_assessment_info');
		$this->db->where('studID', $this->input->post('stud_id'));
		$this->db->where('gradeLevel', $this->input->post('gradeLevel'));
		$query = $this->db->get();
		if($query->num_rows() == 0)
		{
			$assessmentID = str_pad(rand(0, pow(10, 6)-1), 6, '0', STR_PAD_LEFT);
			$assessmentData = array(
				'studID' 					=> $this->input->post('stud_id'),
				'gradeLevel' 			=> $this->input->post('gradeLevel'),
				'assessmentID' 			=> $assessmentID,
				'paymentScheme' 	=> $this->input->post('paymentScheme'),
				'discount'				=> $this->input->post('discount'),
				'totalDiscount'		=> $this->input->post('totalDiscount'),
				'totalDiscAmount'	=> $this->input->post('totalDiscAmount'),
				'totalAmt'				=> $this->input->post('totalAmount'),
				'grandTotal'			=> $this->input->post('grandTotal')
			);

			if ($this->db->insert('tbl_assessment_info', $assessmentData))
			{
				$feesPayablesData = array();
				foreach($this->input->post('paymentCode') as $key => $value)
				{
					array_push(
					 	$feesPayablesData,
					 	array(
							'studID' 		=> $this->input->post('stud_id'),
							'assessmentID' => $assessmentID,
							'feeId' 	=> $value
						)
					);
				}

				if ($this->db->insert_batch('tbl_feespayables_info', $feesPayablesData))
				{
					$payablesData = array();

					if ($this->input->post('paymentScheme') == 'CASH')
					{
						array_push(
							$payablesData,
							array(
								'studID' 		 => $this->input->post('stud_id'),
								'gradeLevel' => $this->input->post('gradeLevel'),
								'assessmentID'  => $assessmentID,
								'payables' 	 => 'uponEnroll',
								'amountDue'  => $this->input->post('uponEnroll'),
							)
						);
					}
					else
					{
						array_push(
							$payablesData,
							array(
								'studID' 		 => $this->input->post('stud_id'),
								'gradeLevel' => $this->input->post('gradeLevel'),
								'assessmentID'  => $assessmentID,
								'payables' 	 => 'uponEnroll',
								'amountDue'  => $this->input->post('uponEnroll')
							)
						);

						foreach($this->input->post('monthly') as $key => $value)
						{
							array_push(
							 	$payablesData,
							 	array(
									'studID' 		 => $this->input->post('stud_id'),
									'gradeLevel' => $this->input->post('gradeLevel'),
									'assessmentID'  => $assessmentID,
									'payables' 	 => $key,
									'amountDue'  => $value
								)
							);
						}
					}

					if ($this->db->insert_batch('tbl_payables_info', $payablesData))
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
		else
		{
			$this->output->set_status_header(501);
		}
	}

	public function get_assessment_info($uniq_id)
	{
		$this->db->select('a.rowID, a.gradeLevel, a.assessmentID, a.paymentScheme, a.discount, a.totalDiscount, a.totalDiscAmount, a.totalAmt, a.grandTotal, b.grd_lvl, c.disc_code');
		$this->db->from('tbl_assessment_info a');
		$this->db->join('tbl_grd_level b', 'b.grd_id = a.gradeLevel', 'left');
		$this->db->join('tbl_discount c', 'c.row_id = a.discount', 'left');
		$this->db->where('a.studID', $uniq_id);
		$this->db->order_by('a.rowID', 'DESC');
		$queryAssessment = $this->db->get();

		if ($queryAssessment->num_rows() > 0)
		{
			return $queryAssessment->result();
		}
		else
		{
			return FALSE;
		}
	}

	public function get_assessment_details($id, $assessmentID)
	{
		$this->db->select('rowID, payables, amountDue, amountPaid');
		$this->db->from('tbl_payables_info');
		$this->db->where('gradeLevel', $id);
		$this->db->where('assessmentID', $assessmentID);

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

	public function check_fee_row($id, $assessmentID)
	{
		$this->db->select('rowID');
		$this->db->from('tbl_feespayables_info');
		$this->db->where('feeId', $id);
		$this->db->where('assessmentID', $assessmentID);

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}