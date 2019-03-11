<?php defined('BASEPATH') OR exit ('No direct script access allowed');
class College_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function get_semester()
	{
		$this->db->select();
		$this->db->from('tbl_semester');
		$this->db->where('status', 1);

		$query = $this->db->get();

		return $query->row();
	}

	public function register_student()
	{
		$sem = $this->get_semester();

		$this->db->select('stud_id');
		$this->db->from('tbl_stud_info_col');
		$this->db->order_by('row_id', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			$arr_id = explode('-', $row->stud_id);
			if ($arr_id[0] == date('y'))
			{
				$yr = $arr_id[0];
			}
			else
			{
				$yr = date('y');
			}

			$ctr = intval($arr_id[1]) + intval(1);

			$num_length = strlen((string)$ctr);
			if($num_length == 1)
			{
				$cnt = '000'.$ctr;
			}
			else if ($num_length == 2)
			{
				$cnt = '00'.$ctr;
			}
			else if ($num_length == 3)
			{
				$cnt = '0'.$ctr;
			}
			else
			{
				$cnt = $ctr;
			}

			$stud_id = $yr.'-'.$cnt.'-5'.$sem->sem_id;
		}
		else
		{
			$stud_id = date('y').'-'.'0001'.'-'.'5'.$sem->sem_id;
		}

		$data = array(
			"stud_id"  					=> $stud_id,
			"stud_lname"  			=> $this->input->post('lname'),
			"stud_fname"  			=> $this->input->post('fname'),
			"stud_mname"  			=> $this->input->post('mname'),
			"stud_status" 			=> 'registered',
			"stud_rgstrtn_dte" 	=> date('Y-m-d'),
			"stud_course" 			=> $this->input->post('stud_course'),
			"stud_year_lvl" 		=> $this->input->post('stud_year_lvl'),
			"stud_sem" 					=> $sem->sem_id,
			"stud_acad_yr" 			=> $this->input->post('stud_acad_yr'),
			"stud_email"  			=> $this->input->post('eadd'),
			"stud_bdate"  			=> $this->input->post('bdate'),
			"stud_tnum"   			=> $this->input->post('tnum'),
			"stud_cnum"   			=> $this->input->post('cnum'),
			"stud_gender" 			=> $this->input->post('gender'),
			"stud_cur_adrs"   	=> $this->input->post('cur_addrs'),
			"stud_perm_adrs"   	=> $this->input->post('perm_addrs'),
		);

		if ($this->db->insert('tbl_stud_info_col', $data))
		{
			$adtnl_data = array(
				"stud_id" 				=> $stud_id,
				"stud_grdns_name" => $this->input->post('grdns_name'),
				"stud_grdns_tnum" => $this->input->post('tnum1'),
				"stud_grdns_cnum" => $this->input->post('cnum1'),
				"stud_grdns_adrs" => $this->input->post('addrs2'),
			);

			if ($this->db->insert('tbl_stud_adtnl_info_col', $adtnl_data))
			{
				$sub_docs = array(
					"stud_id" 		=> $stud_id,
					"bCertPSA"		=> ($this->input->post('bCertPSA') != NULL) ? $this->input->post('bCertPSA') : 0,
					"certGMC"			=> ($this->input->post('certGMC') != NULL) ? $this->input->post('certGMC') : 0,
					"certHonDis"	=> ($this->input->post('certHonDis') != NULL) ? $this->input->post('certHonDis') : 0,
					"frm137"			=> ($this->input->post('frm137') != NULL) ? $this->input->post('frm137') : 0,
					"frm138"			=> ($this->input->post('frm138') != NULL) ? $this->input->post('frm138') : 0,
					"TOR"					=> ($this->input->post('TOR') != NULL) ? $this->input->post('TOR') : 0
				);

				if ($this->db->insert('tbl_stud_documents_col', $sub_docs))
				{
					$logs = array(
						"emp_id" => $this->session->userdata('uniq_id'),
						"c_log" => "Registered student with LRN/Student ID of ".$stud_id,
						"mod_date" => date('Y-m-d h:i:s a')
					);

					if($this->db->insert('tbl_logs', $logs))
					{
						return TRUE;
					}
				}
				else
				{
					return FALSE;
				}
			}
		}
		else
		{
			return FALSE;
		}
	}

	public function get_col_table_data()
	{
		$this->db->select('a.stud_id, a.stud_lname, a.stud_fname, a.stud_course, a.stud_year_lvl, a.stud_status, b.course_code');
		$this->db->from('tbl_stud_info_col a');
		$this->db->join('tbl_col_course b', 'b.course_id = a.stud_course');

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
				$sbdata[] = $row->stud_id;
				$sbdata[] = $row->stud_lname;
				$sbdata[] = $row->stud_fname;
				$sbdata[] = $row->course_code;
				$sbdata[] = $row->stud_year_lvl;
				$sbdata[] = $status;
				$sbdata[] = '<a href="college/view/'.$row->stud_id.'" class="btn btn-outline-primary btn-sm"><i class="ti ti-eye"></i></a>';

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

	public function get_student_course()
	{
		$this->db->select('course_id, course_code');
		$this->db->from('tbl_col_course');
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

	public function get_course_years($id)
	{
		$this->db->select('no_of_yrs');
		$this->db->from('tbl_col_course');
		$this->db->where('course_id', $id);
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

	public function get_student_info($uniq_id)
	{
		$this->db->select('
			a.stud_id, a.stud_avatar, a.stud_lname, a.stud_fname, a.stud_mname, a.stud_status, a.stud_rgstrtn_dte, a.stud_year_lvl, a.stud_sem, a.stud_course, a.stud_acad_yr, a.stud_email, a.stud_bdate, a.stud_tnum, a.stud_cnum, a.stud_gender, a.stud_cur_adrs, a.stud_perm_adrs,
			b.stud_grdns_name, b.stud_grdns_cnum, b.stud_grdns_adrs,
			c.bCertPSA, c.certGMC, c.certHonDis, c.frm137, c.frm138, c.TOR,
			e.semester,
			f.course_code,
			g.gender,
			h.acad_yr
		');
		$this->db->from('tbl_stud_info_col a');
		$this->db->join('tbl_stud_adtnl_info_col b', 'b.stud_id = a.stud_id');
		$this->db->join('tbl_stud_documents_col c', 'c.stud_id = a.stud_id');
		$this->db->join('tbl_semester e', 'e.sem_id = a.stud_sem');
		$this->db->join('tbl_col_course f', 'f.course_id = a.stud_course');
		$this->db->join('tbl_gender g', 'g.gdr_id = a.stud_gender');
		$this->db->join('tbl_acad_year h', 'h.acad_id = a.stud_acad_yr');
		$this->db->where('a.stud_id', $uniq_id);

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

	public function get_school_fees()
	{
		$this->db->select('row_id, fee_name, amount');
		$this->db->from('tbl_fees');
		$this->db->where('fee_for', 'College');
		$this->db->where('status', 1);
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

	public function get_tuition_fee()
	{
		$this->db->select('row_id, amount');
		$this->db->from('tbl_fees');
		$this->db->where('fee_for', 'College');
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

	public function get_thesis_fee()
	{
		$this->db->select('row_id, amount');
		$this->db->from('tbl_fees');
		$this->db->where('fee_for', 'College');
		$this->db->like('fee_name', 'thesis', 'both');
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
				'course_id' 			=> $this->input->post('course_id'),
				'assessmentID' 		=> $assessmentID,
				'paymentScheme' 	=> $this->input->post('paymentScheme'),
				'discount'				=> $this->input->post('discount'),
				'totalDiscount'		=> $this->input->post('totalDiscount'),
				'totalDiscAmount'	=> $this->input->post('totalDiscAmount'),
				'numUnits'				=> $this->input->post('numUnits'),
				'numThesis'				=> $this->input->post('numThesis'),
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
		$this->db->select('a.rowID, a.gradeLevel, a.course_id, a.assessmentID, a.paymentScheme, a.discount, a.totalDiscount, a.totalDiscAmount, a.numUnits, a.numThesis, a.totalAmt, a.grandTotal, b.course_code, c.disc_code');
		$this->db->from('tbl_assessment_info a');
		$this->db->join('tbl_col_course b', 'b.course_id = a.course_id', 'left');
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