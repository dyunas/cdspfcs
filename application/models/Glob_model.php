<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Glob_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function get_acad_year()
	{
		$this->db->select('acad_year');
		$this->db->where('status', 1);
		$this->db->from('tbl_acad_year');

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->row('acad_year');
		}
		else
		{
			return FALSE;
		}
	}
}