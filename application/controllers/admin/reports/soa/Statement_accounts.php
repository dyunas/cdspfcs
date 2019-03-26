<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Statement_accounts extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/reports/Soa_model', 'soadb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/reports/soa/index');
		$this->load->view('templates/footer');
	}

	public function Create_statement()
	{
		if ($this->input->is_ajax_request())
		{
			if($result = $this->soadb->create_statement())
			{
				$this->output->set_status_header(200);
				echo json_encode($result);
			}
			else
			{
				$this->output->set_status_header(500);
			}
		}
		else
		{
			exit ('No direct script access allowed');
		}
	}
}