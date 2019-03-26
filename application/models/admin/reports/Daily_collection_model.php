<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Daily_collection_model extends CI_Model {
	public function get_daily_collection()
	{
		$startDate = $this->input->post('selDate').' 00:00:00';
		$endDate = $this->input->post('selDate').' 23:59:59';
		$resData = array();
		switch ($this->input->post('department')) {
			case 'ELEMENTARY':
				$sql = "SELECT a.stud_lname, a.stud_fname, a.stud_mname, b.transDate, b.invoiceNum, b.orNum, b.amountPaid, b.balanceAmt, b.studid, c.payables, c.amountDue FROM tbl_stud_info_elem a JOIN tbl_transaction_tbl b ON a.stud_lrn = b.studid JOIN tbl_payables_info c ON b.assessmentRowId = c.rowID WHERE b.transDate BETWEEN '$startDate' AND '$endDate'";
				$query = $this->db->query($sql);

				if ($query->num_rows() > 0)
				{
					return $query->result();
				}

				return false;
			break;

			case 'JUNIORHS':
				$sql = "SELECT a.stud_lname, a.stud_fname, a.stud_mname, b.transDate, b.invoiceNum, b.orNum, b.amountPaid, b.balanceAmt, b.studid, c.payables, c.amountDue FROM tbl_stud_info_jhs a JOIN tbl_transaction_tbl b ON a.stud_lrn = b.studid JOIN tbl_payables_info c ON b.assessmentRowId = c.rowID WHERE b.transDate BETWEEN '$startDate' AND '$endDate'";
				$query = $this->db->query($sql);

				if ($query->num_rows() > 0)
				{
					return $query->result();
				}

				return false;
			break;

			case 'SENIORHS':
				$sql = "SELECT a.stud_lname, a.stud_fname, a.stud_mname, b.transDate, b.invoiceNum, b.orNum, b.amountPaid, b.balanceAmt, b.studid, c.payables, c.amountDue FROM tbl_stud_info_shs a JOIN tbl_transaction_tbl b ON a.stud_lrn = b.studid JOIN tbl_payables_info c ON b.assessmentRowId = c.rowID WHERE b.transDate BETWEEN '$startDate' AND '$endDate'";
				$query = $this->db->query($sql);

				if ($query->num_rows() > 0)
				{
					return $query->result();
				}

				return false;
			break;

			case 'COLLEGE':
				$sql = "SELECT a.stud_lname, a.stud_fname, a.stud_mname, b.transDate, b.invoiceNum, b.orNum, b.amountPaid, b.balanceAmt, b.studid, c.payables, c.amountDue FROM tbl_stud_info_col a JOIN tbl_transaction_tbl b ON a.stud_id = b.studid JOIN tbl_payables_info c ON b.assessmentRowId = c.rowID WHERE b.transDate BETWEEN '$startDate' AND '$endDate'";
				$query = $this->db->query($sql);

				if ($query->num_rows() > 0)
				{
					return $query->result();
				}

				return false;
			break;
			
			default:
			# code...
			break;
		}
	}
}