<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Senior_high_school_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function register_student()
	{
		$data = array(
			"stud_lrn"    			=> $this->input->post('LRN'),
			"stud_lname"  			=> $this->input->post('lname'),
			"stud_fname"  			=> $this->input->post('fname'),
			"stud_mname"  			=> $this->input->post('mname'),
			"stud_status" 			=> 'registered',
			"stud_rgstrtn_dte" 	=> date('Y-m-d'),
			"stud_grade_lvl" 		=> $this->input->post('stud_grade_lvl'),
			"stud_track" 				=> $this->input->post('stud_track'),
			"stud_strand" 			=> $this->input->post('stud_strand'),
			"stud_acad_yr" 			=> $this->input->post('stud_acad_yr'),
			"stud_email"  			=> $this->input->post('eadd'),
			"stud_bdate"  			=> $this->input->post('bdate'),
			"stud_tnum"   			=> $this->input->post('tnum'),
			"stud_cnum"   			=> $this->input->post('cnum'),
			"stud_gender" 			=> $this->input->post('gender'),
			"stud_cur_adrs"   	=> $this->input->post('cur_addrs'),
			"stud_perm_adrs"   	=> $this->input->post('perm_addrs'),
		);

		if ($this->db->insert('tbl_stud_info_shs', $data))
		{
			$adtnl_data = array(
				"stud_lrn" 				=> $this->input->post('LRN'),
				"stud_grdns_name" => $this->input->post('grdns_name'),
				"stud_grdns_tnum" => $this->input->post('tnum1'),
				"stud_grdns_cnum" => $this->input->post('cnum1'),
				"stud_grdns_adrs" => $this->input->post('addrs2'),
			);

			if ($this->db->insert('tbl_stud_adtnl_info_shs', $adtnl_data))
			{
				$sub_docs = array(
					"stud_lrn" 		=> $this->input->post('LRN'),
					"bCertPSA"		=> ($this->input->post('bCertPSA') != NULL) ? $this->input->post('bCertPSA') : 0,
					"certGMC"			=> ($this->input->post('certGMC') != NULL) ? $this->input->post('certGMC') : 0,
					"certHonDis"	=> ($this->input->post('certHonDis') != NULL) ? $this->input->post('certHonDis') : 0,
					"frm137"			=> ($this->input->post('frm137') != NULL) ? $this->input->post('frm137') : 0,
					"frm138"			=> ($this->input->post('frm138') != NULL) ? $this->input->post('frm138') : 0
				);

				if ($this->db->insert('tbl_stud_documents_shs', $sub_docs))
				{
					$logs = array(
						"emp_id" => $this->session->userdata('uniq_id'),
						"c_log" => "Registered student with LRN/Student ID of ".$this->input->post('LRN'),
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

	public function get_shs_table_data()
	{
		$this->db->select('a.stud_lrn, a.stud_lname, a.stud_fname, a.stud_grade_lvl, a.stud_status, c.track, d.strand');
		$this->db->from('tbl_stud_info_shs a');
		$this->db->join('tbl_shs_track c', 'c.trk_id = a.stud_trk_id');
		$this->db->join('tbl_shs_strand d', 'd.strnd_id = a.stud_strnd_id');
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
				$sbdata[] = $row->track;
				$sbdata[] = $row->strand;
				$sbdata[] = $status;
				$sbdata[] = '<a href="shs/view/'.$row->stud_lrn.'" class="btn btn-outline-primary btn-sm"><i class="ti ti-eye"></i></a>';

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

	public function get_track_list()
	{
		$this->db->select('trk_id, track');
		$this->db->from('tbl_shs_track');
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

	public function get_strand_list($id)
	{
		$this->db->select('strnd_id, strand');
		$this->db->from('tbl_shs_strand');
		$this->db->where('trk_id', $id);
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

	public function get_student_info($uniq_id)
	{
		$this->db->select('
			a.stud_lrn, a.stud_avatar, a.stud_lname, a.stud_fname, a.stud_mname, a.stud_status, a.stud_rgstrtn_dte, a.stud_grade_lvl, a.stud_section, a.stud_acad_yr, a.stud_email, a.stud_bdate, a.stud_tnum, a.stud_cnum, a.stud_gender, a.stud_cur_adrs, a.stud_perm_adrs,
			b.stud_grdns_name, b.stud_grdns_tnum, b.stud_grdns_cnum, b.stud_grdns_adrs,
			c.bCertPSA, c.certGMC, c.certHonDis, c.frm137, c.frm138,
			e.trk_id, e.track,
			f.strand,
			g.acad_yr,
			h.gender
		');
		$this->db->from('tbl_stud_info_shs a');
		$this->db->join('tbl_stud_adtnl_info_shs b', 'b.stud_lrn = a.stud_lrn');
		$this->db->join('tbl_stud_documents_shs c', 'c.stud_lrn = a.stud_lrn');
		$this->db->join('tbl_shs_track e', 'e.trk_id = a.stud_trk_id');
		$this->db->join('tbl_shs_strand f', 'f.trk_id = e.trk_id');
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

	public function get_school_fees($grade_level)
	{
		$this->db->select('row_id, fee_name, amount');
		$this->db->from('tbl_fees');
		$this->db->where('fee_for', $grade_level);
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

	public function get_tuition_fee($gradeLevel)
	{
		$this->db->select('row_id, amount');
		$this->db->from('tbl_fees');
		$this->db->where('fee_for', $gradeLevel);
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
				'assessmentID' 		=> $assessmentID,
				'paymentScheme' 	=> $this->input->post('paymentScheme'),
				'voucher'				=> $this->input->post('voucher'),
				'voucherDisc'		=> $this->input->post('voucherDisc'),
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