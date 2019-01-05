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
			"stud_tnum"   => 	$this->input->post('tnum'),
			"stud_cnum"   => 	$this->input->post('cnum'),
			"stud_gender" =>	$this->input->post('gender'),
			"stud_cur_adrs"   => 	$this->input->post('cur_addrs'),
			"stud_perm_adrs"   => 	$this->input->post('perm_addrs'),
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
				$sbdata[] = '<a href="elementary/view/'.$row->stud_lrn.'" style="color: #007bff!important;"><i class="ti ti-eye"></i> VIEW</a>';

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
			b.stud_fthrs_name, b.stud_fthrs_cnum, b.stud_fthrs_adrs, b.stud_mthrs_name, b.stud_mthrs_cnum, b.stud_mthrs_adrs,
			c.bCertPSA, c.certGMC, c.certHonDis, c.frm137, c.frm138, c.TOR
		');
		$this->db->from('tbl_stud_info_elem a');
		$this->db->join('tbl_stud_adtnl_info b', 'b.stud_lrn = a.stud_lrn');
		$this->db->join('tbl_stud_documents c', 'c.stud_id = a.stud_lrn');
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
}