<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Elementary_model extends CI_Model {
	public function get_school_fees()
	{
		$this->db->select('a.department, b.row_id, b.fee_code, b.fee_name, b.amount');
		$this->db->from('tbl_departments a');
		$this->db->join('tbl_fees b', 'b.fee_for = a.dept_id');
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

	public function get_discounts($code = FALSE)
	{
		if ($code === FALSE)
		{
			$this->db->select('a.department, b.disc_code, b.disc_amnt');
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
		$this->db->where('disc_code', $code);
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

	public function get_tuition_fee()
	{
		$this->db->select('b.fee_code, b.amount');
		$this->db->from('tbl_departments a');
		$this->db->join('tbl_fees b', 'b.fee_for = a.dept_id');
		$this->db->like('a.department', 'elementary', 'both');
		$this->db->like('b.fee_name', 'tuition', 'both');
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
		$this->db->select('a.stud_lrn, a.stud_lname, a.stud_fname, a.stud_grade_lvl, a.stud_section, a.stud_status, b.grd_lvl');
		$this->db->from('tbl_stud_info_elem a');
		$this->db->join('tbl_grd_level b', 'b.grd_id = a.stud_grade_lvl');

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
				$sbdata[] = $row->grd_lvl;
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
			d.grd_lvl,
			g.acad_yr,
			h.gender
		');
		$this->db->from('tbl_stud_info_elem a');
		$this->db->join('tbl_stud_adtnl_info_elem b', 'b.stud_lrn = a.stud_lrn');
		$this->db->join('tbl_stud_documents c', 'c.stud_lrn = a.stud_lrn');
		$this->db->join('tbl_grd_level d', 'd.grd_id = a.stud_grade_lvl');
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
}