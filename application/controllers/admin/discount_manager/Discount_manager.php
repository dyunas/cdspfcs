<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Discount_manager extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/discount_manager/Discount_model', 'discdb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/discount_manager/index');
		$this->load->view('templates/footer');
	}

	public function Get_discount_table()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->discdb->get_discount_table();
			echo $result;
		}
		else
		{
			exit ('No direct script access allowed.');
		}
	}
}