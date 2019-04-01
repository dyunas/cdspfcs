<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Elementary_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function check_stud_lrn($lrn)
	{
		$this->db->select('stud_lrn');
		$this->db->from('tbl_stud_info_elem');
		$this->db->where('stud_lrn', $lrn);
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
			"stud_acad_yr" 			=> $this->input->post('stud_acad_yr'),
			"stud_email"  			=> $this->input->post('eadd'),
			"stud_bdate"  			=> $this->input->post('bdate'),
			"stud_tnum"   			=> $this->input->post('tnum'),
			"stud_cnum"   			=> $this->input->post('cnum'),
			"stud_gender" 			=> $this->input->post('gender'),
			"stud_cur_adrs"   	=> $this->input->post('cur_addrs'),
			"stud_perm_adrs"   	=> $this->input->post('perm_addrs'),
		);
		
		if ($this->db->insert('tbl_stud_info_elem', $data))
		{
			$adtnl_data = array(
				"stud_lrn" 				=> $this->input->post('LRN'),
				"stud_grdns_name" => $this->input->post('grdns_name'),
				"stud_grdns_tnum" => $this->input->post('tnum1'),
				"stud_grdns_cnum" => $this->input->post('cnum1'),
				"stud_grdns_adrs" => $this->input->post('addrs2'),
			);

			if ($this->db->insert('tbl_stud_adtnl_info_elem', $adtnl_data))
			{
				$sub_docs = array(
					"stud_lrn" 		=> $this->input->post('LRN'),
					"bCertPSA"		=> ($this->input->post('bCertPSA') != NULL) ? $this->input->post('bCertPSA') : 0,
					"certGMC"			=> ($this->input->post('certGMC') != NULL) ? $this->input->post('certGMC') : 0,
					"certHonDis"	=> ($this->input->post('certHonDis') != NULL) ? $this->input->post('certHonDis') : 0,
					"frm137"			=> ($this->input->post('frm137') != NULL) ? $this->input->post('frm137') : 0,
					"frm138"			=> ($this->input->post('frm138') != NULL) ? $this->input->post('frm138') : 0
				);

				if ($this->db->insert('tbl_stud_documents', $sub_docs))
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
		else
		{
			return FALSE;
		}
	}

	public function update_student()
	{
		$data = array(
			"stud_lrn"    			=> $this->input->post('LRN'),
			"stud_lname"  			=> $this->input->post('lname'),
			"stud_fname"  			=> $this->input->post('fname'),
			"stud_mname"  			=> $this->input->post('mname'),
			"stud_email"  			=> $this->input->post('eadd'),
			"stud_bdate"  			=> $this->input->post('bdate'),
			"stud_tnum"   			=> $this->input->post('tnum'),
			"stud_cnum"   			=> $this->input->post('cnum'),
			"stud_gender" 			=> $this->input->post('gender'),
			"stud_cur_adrs"   	=> $this->input->post('cur_addrs'),
			"stud_perm_adrs"   	=> $this->input->post('perm_addrs'),
		);

		$this->db->where('row_id', $this->input->post('row_id'));

		if ($this->db->update('tbl_stud_info_elem', $data))
		{
			$adtnl_data = array(
				"stud_lrn" 				=> $this->input->post('LRN'),
				"stud_grdns_name" => $this->input->post('grdns_name'),
				"stud_grdns_tnum" => $this->input->post('tnum1'),
				"stud_grdns_cnum" => $this->input->post('cnum1'),
				"stud_grdns_adrs" => $this->input->post('addrs2'),
			);

			$this->db->where('row_id', $this->input->post('row_id'));

			if ($this->db->update('tbl_stud_adtnl_info_elem', $adtnl_data))
			{				
				$sub_docs = array(
					"stud_lrn" 		=> $this->input->post('LRN'),
					"bCertPSA"		=> ($this->input->post('bCertPSA') != NULL) ? $this->input->post('bCertPSA') : 0,
					"certGMC"			=> ($this->input->post('certGMC') != NULL) ? $this->input->post('certGMC') : 0,
					"certHonDis"	=> ($this->input->post('certHonDis') != NULL) ? $this->input->post('certHonDis') : 0,
					"frm137"			=> ($this->input->post('frm137') != NULL) ? $this->input->post('frm137') : 0,
					"frm138"			=> ($this->input->post('frm138') != NULL) ? $this->input->post('frm138') : 0
				);
				$this->db->where('row_id', $this->input->post('row_id'));
				if ($this->db->update('tbl_stud_documents', $sub_docs))
				{
					$logs = array(
						"emp_id" => $this->session->userdata('uniq_id'),
						"c_log" => "Updated record of student with LRN/Student ID of ".$this->input->post('LRN'),
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

	public function update_student_admission_status()
	{
		$this->db->set('stud_grade_lvl', $this->input->post('stud_grade_lvl'));
		$this->db->set('stud_acad_yr', $this->input->post('stud_acad_yr'));
		$this->db->where('stud_lrn', $this->input->post('LRN'));

		if ($this->db->update('tbl_stud_info_elem'))
		{
			$logs = array(
				"emp_id" => $this->session->userdata('uniq_id'),
				"c_log" => "Updated record of student with LRN/Student ID of ".$this->input->post('LRN'),
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
				$sbdata[] = '<a href="elementary/view/'.$row->stud_lrn.'" class="btn btn-outline-primary btn-sm"><i class="ti ti-eye"></i></a>';

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
			a.row_id, a.stud_lrn, a.stud_avatar, a.stud_lname, a.stud_fname, a.stud_mname, a.stud_status, a.stud_rgstrtn_dte, a.stud_grade_lvl, a.stud_section, a.stud_acad_yr, a.stud_email, a.stud_bdate, a.stud_tnum, a.stud_cnum, a.stud_gender, a.stud_cur_adrs, a.stud_perm_adrs,
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

	public function upload_avatar($file_name)
	{
		$this->db->set('stud_avatar', $file_name);
		$this->db->where('stud_lrn', $this->input->post('studLrn'));

		if($this->db->update('tbl_stud_info_elem'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}