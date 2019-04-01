<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Elementary_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function get_student_info($studID)
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
		$this->db->where('a.stud_lrn', $studID);

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
			$this->db->select('a.department, b.row_id, b.discount, b.disc_amnt');
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
		$this->db->where('fee_for', $feeFor);
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
						$logs = array(
							"emp_id" => $this->session->userdata('uniq_id'),
							"c_log" => "Generated assessment for student with LRN/Student ID of ".$this->input->post('LRN')." with Assessment ID of ".$assessmentID,
							"mod_date" => date('Y-m-d h:i:s a')
						);

						if($this->db->insert('tbl_logs', $logs))
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
		$this->db->select('a.rowID, a.gradeLevel, a.assessmentID, a.paymentScheme, a.discount, a.totalDiscount, a.totalDiscAmount, a.totalAmt, a.grandTotal, b.grd_lvl, c.discount');
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
		$sql = 'SELECT a.rowID, a.payables, a.amountDue, SUM(b.amountPaid) as amountPaid, ABS(a.amountDue - SUM(b.amountPaid)) as balance FROM tbl_payables_info a LEFT JOIN tbl_transaction_tbl b ON b.assessmentRowId = a.rowID WHERE a.gradeLevel = "'.$id.'" AND a.assessmentID = '.$assessmentID.' GROUP BY a.rowID';
		$query = $this->db->query($sql);

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