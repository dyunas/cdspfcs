<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Elementary_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function register_student()
	{
		$data = array(
			"stud_lrn"    => 	$this->input->post('LRN'),
			"stud_lname"  => 	$this->input->post('lname'),
			"stud_fname"  => 	$this->input->post('fname'),
			"stud_mname"  => 	$this->input->post('mname'),
			"stud_status" =>  'registered',
			"stud_rgstrtn_dte" =>  date('Y-m-d'),
			"stud_grade_lvl" => $this->input->post('stud_grade_lvl'),
			"stud_acad_yr" => $this->input->post('stud_acad_yr'),
			"stud_email"  => 	$this->input->post('eadd'),
			"stud_bdate"  => 	$this->input->post('bdate'),
			"stud_cnum"   => 	$this->input->post('cnum'),
			"stud_gender" =>	$this->input->post('gender'),
			"stud_adrs"   => 	$this->input->post('addrs')
		);

		if ($this->db->insert('tbl_stud_info_elem', $data))
		{
			$adtnl_data = array(
				"stud_lrn" 				=> $this->input->post('LRN'),
				"stud_fthrs_name" => $this->input->post('fthrsName'),
				"stud_fthrs_cnum" => $this->input->post('cnum1'),
				"stud_fthrs_adrs" => $this->input->post('addrs2'),
				"stud_mthrs_name" => $this->input->post('mthrsName'),
				"stud_mthrs_cnum" => $this->input->post('cnum2'),
				"stud_mthrs_adrs" => $this->input->post('addrs3'),
			);

			if ($this->db->insert('tbl_stud_adtnl_info', $adtnl_data))
			{
				$sub_docs = array(
					"stud_id" 		=> $this->input->post('LRN'),
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

	public function get_elem_table_data()
	{
		$this->db->select('stud_lrn, stud_lname, stud_fname, stud_grade_lvl, stud_section, stud_status');
		$this->db->from('tbl_stud_info_elem');

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->result();
			// $data = array();
			// foreach ($query->result() as $row)
			// {
			// 	if ($row->stud_status == 'registered')
			// 	{
			// 		$status = '<span class="badge badge-primary">'.$row->stud_status.'</span>';
			// 	}
			// 	elseif ($row->stud_status == 'enrolled')
			// 	{
			// 		$status = '<span class="badge badge-success">'.$row->stud_status.'</span>';
			// 	}
			// 	elseif ($row->stud_status == 'graduate')
			// 	{
			// 		$status = '<span class="badge badge-success">'.$row->stud_status.'</span>';
			// 	}
			// 	elseif ($row->stud_status == 'dropped')
			// 	{
			// 		$status = '<span class="badge badge-danger">'.$row->stud_status.'</span>';
			// 	}
			// 	elseif ($row->stud_status == 'reserved')
			// 	{
			// 		$status = '<span class="badge badge-info">'.$row->stud_status.'</span>';
			// 	}
			// 	elseif ($row->stud_status == 'transfered')
			// 	{
			// 		$status = '<span class="badge badge-warning">'.$row->stud_status.'</span>';
			// 	}
			// 	else
			// 	{
			// 		$status = '<span class="badge badge-secondary">'.$row->stud_status.'</span>';
			// 	}

			// 	$data[] = $row->stud_lrn;
			// 	$data[] = $row->stud_lname;
			// 	$data[] = $row->stud_fname;
			// 	$data[] = $row->stud_grade_lvl;
			// 	$data[] = $row->stud_section;
			// 	$data[] = $status;
			// 	$data[] = '<a href="elementary/view/'.$row->stud_lrn.'" style="color: #007bff!important;"><i class="ti ti-eye"></i> VIEW</a>';
			// }

			// return json_encode($data);
		}
	}
}