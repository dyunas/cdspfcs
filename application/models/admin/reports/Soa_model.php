<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Soa_model extends CI_Model {
	public function create_statement()
	{
		switch ($this->input->post('department')) {
			case 'ELEMENTARY':
				$this->db->select('a.stud_lrn as stud_id, a.stud_avatar, a.stud_lname, a.stud_fname, a.stud_mname, a.stud_status, a.stud_rgstrtn_dte, a.stud_grade_lvl as course_code');
				$this->db->from('tbl_stud_info_elem a');
				$this->db->where('a.stud_lname', $this->input->post('stud_lname'));
				$this->db->where('a.stud_fname', $this->input->post('stud_fname'));
				$this->db->where('a.stud_mname', $this->input->post('stud_mname'));
				$query = $this->db->get();
				if ($query->num_rows() > 0)
				{
					$resData['studInfo'] = $query->row();
					$row = $query->row();
					$dateFrom = $this->input->post('fromDte');
					$dateTo = ($this->input->post('toDte')) ? $this->input->post('toDte').' 23:59:59' : date('Y-m-d h:i:s a');

					$this->db->select('a.rowID, a.orNum, a.invoiceNum, a.transDate, a.assessmentID, a.assessmentRowId, a.amountPaid, a.balanceAmt, b.amountDue, b.payables');
					$this->db->from('tbl_transaction_tbl a');
					$this->db->join('tbl_payables_info b', 'a.assessmentRowId = b.rowID', 'LEFT');
					$this->db->where('a.studid', $row->stud_id);
					$this->db->where('a.transDate >=', $dateFrom);
					$this->db->where('a.transDate <=', $dateTo);
					$query = $this->db->get();

					if ($query->num_rows() > 0)
					{
						$resData['transactions'] = $query->result();
					}

					return $resData;
				}
				
				return FALSE;
			break;

			case 'JUNIORHS':
				$this->db->select('a.stud_lrn as stud_id, a.stud_avatar, a.stud_lname, a.stud_fname, a.stud_mname, a.stud_status, a.stud_rgstrtn_dte, a.stud_grade_lvl as course_code');
				$this->db->from('tbl_stud_info_jhs a');
				$this->db->where('a.stud_lname', $this->input->post('stud_lname'));
				$this->db->where('a.stud_fname', $this->input->post('stud_fname'));
				if ($this->input->post('stud_mname')){
					$this->db->where('a.stud_mname', $this->input->post('stud_mname'));
				}
				$query = $this->db->get();
				if ($query->num_rows() > 0)
				{
					$resData['studInfo'] = $query->row();
					$row = $query->row();
					$dateFrom = $this->input->post('fromDte');
					$dateTo = ($this->input->post('toDte')) ? $this->input->post('toDte').' 23:59:59' : date('Y-m-d h:i:s a');

					$this->db->select('a.rowID, a.orNum, a.invoiceNum, a.transDate, a.assessmentID, a.assessmentRowId, a.amountPaid, a.balanceAmt, b.amountDue, b.payables');
					$this->db->from('tbl_transaction_tbl a');
					$this->db->join('tbl_payables_info b', 'a.assessmentRowId = b.rowID', 'LEFT');
					$this->db->where('a.studid', $row->stud_id);
					$this->db->where('a.transDate >=', $dateFrom);
					$this->db->where('a.transDate <=', $dateTo);
					$query = $this->db->get();

					if ($query->num_rows() > 0)
					{
						$resData['transactions'] = $query->result();
					}

					return $resData;
				}
				
				return FALSE;
			break;

			case 'SENIORHS':
				$this->db->select('a.stud_lrn as stud_id, a.stud_avatar, a.stud_lname, a.stud_fname, a.stud_mname, a.stud_status, a.stud_rgstrtn_dte, a.stud_grade_lvl as course_code');
				$this->db->from('tbl_stud_info_shs a');
				$this->db->where('a.stud_lname', $this->input->post('stud_lname'));
				$this->db->where('a.stud_fname', $this->input->post('stud_fname'));
				if ($this->input->post('stud_mname')){
					$this->db->where('a.stud_mname', $this->input->post('stud_mname'));
				}
				$query = $this->db->get();
				if ($query->num_rows() > 0)
				{
					$resData['studInfo'] = $query->row();
					$row = $query->row();
					$dateFrom = $this->input->post('fromDte');
					$dateTo = ($this->input->post('toDte')) ? $this->input->post('toDte').' 23:59:59' : date('Y-m-d h:i:s a');

					$this->db->select('a.rowID, a.orNum, a.invoiceNum, a.transDate, a.assessmentID, a.assessmentRowId, a.amountPaid, a.balanceAmt, b.amountDue, b.payables');
					$this->db->from('tbl_transaction_tbl a');
					$this->db->join('tbl_payables_info b', 'a.assessmentRowId = b.rowID', 'LEFT');
					$this->db->where('a.studid', $row->stud_id);
					$this->db->where('a.transDate >=', $dateFrom);
					$this->db->where('a.transDate <=', $dateTo);
					$query = $this->db->get();

					if ($query->num_rows() > 0)
					{
						$resData['transactions'] = $query->result();
					}

					return $resData;
				}
				
				return FALSE;
			break;

			case 'COLLEGE':
				$name = explode(" ", $this->input->post('studName'));

				$this->db->select('a.stud_id, a.stud_avatar, a.stud_lname, a.stud_fname, a.stud_mname, a.stud_status, a.stud_rgstrtn_dte, a.stud_course, b.course_code');
				$this->db->from('tbl_stud_info_col a');
				$this->db->join('tbl_col_course b', 'b.course_id = a.stud_course');
				$this->db->where('a.stud_lname', $this->input->post('stud_lname'));
				$this->db->where('a.stud_fname', $this->input->post('stud_fname'));
				if ($this->input->post('stud_mname')){
					$this->db->where('a.stud_mname', $this->input->post('stud_mname'));
				}
				$query = $this->db->get();
				if ($query->num_rows() > 0)
				{
					$resData['studInfo'] = $query->row();
					$row = $query->row();
					$dateFrom = $this->input->post('fromDte');
					$dateTo = ($this->input->post('toDte')) ? $this->input->post('toDte').' 23:59:59' : date('Y-m-d h:i:s a');

					$this->db->select('a.rowID, a.orNum, a.invoiceNum, a.transDate, a.assessmentID, a.assessmentRowId, a.amountPaid, a.balanceAmt, b.amountDue, b.payables');
					$this->db->from('tbl_transaction_tbl a');
					$this->db->join('tbl_payables_info b', 'a.assessmentRowId = b.rowID', 'LEFT');
					$this->db->where('a.studid', $row->stud_id);
					$this->db->where('a.transDate >=', $dateFrom);
					$this->db->where('a.transDate <=', $dateTo);
					$query = $this->db->get();

					if ($query->num_rows() > 0)
					{
						$resData['transactions'] = $query->result();
					}

					return $resData;
				}
				
				return FALSE;
			break;

			default:
			# code...
			break;
		}
	}
}