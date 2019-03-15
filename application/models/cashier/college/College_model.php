<?php defined('BASEPATH') OR exit('No direct script access allowed');
class College_model extends CI_Model {
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

	public function get_assessment_info($uniq_id)
	{
		$this->db->select('a.rowID, a.gradeLevel, a.course_id, a.assessmentID, a.paymentScheme, a.discount, a.totalDiscount, a.totalDiscAmount, a.numUnits, a.numThesis, a.totalAmt, a.grandTotal, b.course_code, c.discount');
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

	public function get_payables_details($id, $assessmentID)
	{
		$sql = 'SELECT a.rowID, a.payables, a.amountDue, SUM(b.amountPaid) as prevPymnt, ABS(a.amountDue - SUM(b.amountPaid)) as balance FROM tbl_payables_info a LEFT JOIN tbl_transaction_tbl b on b.assessmentRowId = a.rowID WHERE a.rowID = '.$id.' AND a.assessmentID = '.$assessmentID;
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			return $query->row();
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

	public function process_payment()
	{
		$this->db->select('rowID');
		$this->db->from('tbl_transaction_tbl');
		$this->db->where('assessmentRowId', $this->input->post('assessmentRowId'));
		$this->db->where('assessmentID', $this->input->post('assessmentID'));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$data = array(
				"assessmentRowId"	=> $this->input->post('assessmentRowId'),
				"assessmentID"		=> $this->input->post('assessmentID'),
				"studid"					=> $this->input->post('studid'),
				"emp_uniq_id"			=> $this->session->userdata('uniq_id'),
				"transDate"				=> date('Y-m-d h:i:s a'),
				"invoiceNum"			=> $this->input->post('invoiceNum'),
				"orNum"						=> $this->input->post('orNum'),
				"amountPaid"			=> $this->input->post('amountPaid'),
				"balanceAmt"			=> $this->input->post('balanceAmt'),
			);

			if ($this->db->insert('tbl_transaction_tbl', $data))
			{
				$logs = array(
					"emp_id" => $this->session->userdata('uniq_id'),
					"c_log" => "Processed payment of student with LRN/Student ID of ".$this->input->post('studid')." with Invoice No.# of ".$this->input->post('invoiceNum')." and with O.R. No# of ".$this->input->post('orNum'),
					"mod_date" => date('Y-m-d h:i:s a')
				);

				if ($this->db->insert('tbl_logs', $logs))
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
				return false;
			}
		}
		else
		{
			$data = array(
				"assessmentRowId"	=> $this->input->post('assessmentRowId'),
				"assessmentID"		=> $this->input->post('assessmentID'),
				"studid"					=> $this->input->post('studid'),
				"emp_uniq_id"			=> $this->session->userdata('uniq_id'),
				"transDate"				=> date('Y-m-d h:i:s a'),
				"invoiceNum"			=> $this->input->post('invoiceNum'),
				"orNum"						=> $this->input->post('orNum'),
				"amountPaid"			=> $this->input->post('amountPaid'),
				"balanceAmt"			=> $this->input->post('balanceAmt'),
			);

			if ($this->db->insert('tbl_transaction_tbl', $data))
			{
				if (intval($this->input->post('amountPaid')) <= 1000)
				{
					$status = 'reserved';
				}
				else
				{
					$status = 'enrolled';
				}

				$this->db->set('stud_status', $status);
				$this->db->where('stud_id', $this->input->post('studid'));
				if ($this->db->update('tbl_stud_info_col'))
				{
					$logs = array(
						"emp_id" => $this->session->userdata('uniq_id'),
						"c_log" => "Processed payment of student with LRN/Student ID of ".$this->input->post('studid')." with Invoice No.# of ".$this->input->post('invoiceNum')." and with O.R. No# of ".$this->input->post('orNum'),
						"mod_date" => date('Y-m-d h:i:s a')
					);

					if ($this->db->insert('tbl_logs', $logs))
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
					return false;
				}
			} 
			else
			{
				return false;
			}
		}
	}
}