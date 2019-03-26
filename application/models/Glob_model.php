<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Glob_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function get_acad_year()
	{
		$this->db->select();
		$this->db->where('status', 1);
		$this->db->from('tbl_acad_year');

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

	public function get_semester()
	{
		$this->db->select();
		$this->db->where('status', 1);
		$this->db->from('tbl_semester');

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

	public function get_payment_history($id)
	{
		$this->db->select('a.rowID, a.orNum, a.invoiceNum, a.transDate, a.assessmentID, a.assessmentRowId, a.emp_uniq_id, b.payables, c.fname, c.lname');
		$this->db->from('tbl_transaction_tbl a');
		$this->db->join('tbl_payables_info b', 'a.assessmentRowId = b.rowID', 'LEFT');
		$this->db->join('tbl_accounts c', 'a.emp_uniq_id = c.emp_uniq_id', 'LEFT');
		$this->db->where('a.studid', $id);
		$query = $this->db->get();

		$data = array();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return FALSE;
	}

	public function get_payment_history_dtls($orNum)
	{
		$sql = 'SELECT a.rowID, a.orNum, a.invoiceNum, a.transDate, a.assessmentID, a.assessmentRowId, a.emp_uniq_id, a.amountPaid, a.balanceAmt, b.payables, b.amountDue, c.fname, c.lname, (SELECT d.amountPaid FROM tbl_transaction_tbl d WHERE d.rowID < a.rowID and d.assessmentID = a.assessmentID and d.assessmentRowId = a.assessmentRowId ORDER BY d.rowID DESC LIMIT 1) as prevPayment, (SELECT e.balanceAmt FROM tbl_transaction_tbl e WHERE e.rowID < a.rowID and e.assessmentID = a.assessmentID and e.assessmentRowId = a.assessmentRowId ORDER BY e.rowID DESC LIMIT 1) as prevBalance FROM tbl_transaction_tbl a LEFT JOIN tbl_payables_info b ON a.assessmentRowId = b.rowID LEFT JOIN tbl_accounts c ON a.emp_uniq_id = c.emp_uniq_id WHERE a.orNum = '.$orNum;
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			return json_encode($query->row());
		}
		else
		{
			return FALSE;
		}
	}
}