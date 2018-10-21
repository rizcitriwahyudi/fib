<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	//load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$data = array( 'title'   => 'FIB Administrator',
		               'isi'     => 'admin/dasbor/list' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */