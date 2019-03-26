<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Junior_high_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
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

	public function get_student_info($studID)
	{
		$this->db->select('
			a.stud_lrn, a.stud_avatar, a.stud_lname, a.stud_fname, a.stud_mname, a.stud_status, a.stud_rgstrtn_dte, a.stud_grade_lvl, a.stud_section, a.stud_acad_yr, a.stud_email, a.stud_bdate, a.stud_tnum, a.stud_cnum, a.stud_gender, a.stud_cur_adrs, a.stud_perm_adrs,
			b.stud_grdns_name, b.stud_grdns_tnum, b.stud_grdns_cnum, b.stud_grdns_adrs,
			c.bCertPSA, c.certGMC, c.certHonDis, c.frm137, c.frm138,
			g.acad_yr,
			h.gender
		');
		$this->db->from('tbl_stud_info_jhs a');
		$this->db->join('tbl_stud_adtnl_info_jhs b', 'b.stud_lrn = a.stud_lrn');
		$this->db->join('tbl_stud_documents_jhs c', 'c.stud_lrn = a.stud_lrn');
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

	public function get_assessment_info($studID)
	{
		$this->db->select('a.rowID, a.gradeLevel, a.assessmentID, a.paymentScheme, a.discount, a.totalDiscount, a.totalDiscAmount, a.escGrant, a.escGrantAmnt, a.totalAmt, a.grandTotal, b.grd_lvl, c.discount');
		$this->db->from('tbl_assessment_info a');
		$this->db->join('tbl_grd_level b', 'b.grd_id = a.gradeLevel', 'left');
		$this->db->join('tbl_discount c', 'c.row_id = a.discount', 'left');
		$this->db->where('a.studID', $studID);
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
		$sql = 'SELECT a.rowID, a.payables, a.gradeLevel, a.amountDue, SUM(b.amountPaid) as amountPaid, ABS(a.amountDue - SUM(b.amountPaid)) as balance FROM tbl_payables_info a LEFT JOIN tbl_transaction_tbl b ON b.assessmentRowId = a.rowID WHERE a.gradeLevel = "'.$id.'" AND a.assessmentID = '.$assessmentID.' GROUP BY a.rowID';
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
				$this->db->where('stud_lrn', $this->input->post('studid'));
				if ($this->db->update('tbl_stud_info_jhs'))
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