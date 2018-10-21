<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	//Halaman Utama User
	public function index() {

		$user = $this->user_model->listing();

		$data = array(	'title'		=>	'Data User ('.count($user).')',
						'user'		=>	$user,
						'isi'		=>	'admin/user/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Halaman Tambah User
	public function tambah() {

		//Validasi
		$valid=$this->form_validation;

		$valid->set_rules('nama','Nama','required', 
			array(	'required'		=>	'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email|is_unique[user.email]', 
			array(	'required'		=>	'Email harus diisi',
					'valid_email'	=>	'Format Email tidak benar',
					'is_unique'		=>	'Email <strong>'.$this->input->post('email').'</strong> sudah ada. Isi dengan Email lain'));

		$valid->set_rules('username','Username','required|is_unique[user.username]', 
			array(	'required'		=>	'Username harus diisi',
					'is_unique'		=>	'Username <strong>'.$this->input->post('username').'</strong> sudah ada. Buat Username baru'));

		$valid->set_rules('password','Password','required|min_length[6]', 
			array(	'required'		=>	'Password harus diisi',
					'min_length	'	=>	'Password minimal 6 Karakter'));

		if ($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>	'Tambah User',
						'isi'		=>	'admin/user/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Jika Tidak Error Maka Masuk Database
		}else{
			$i = $this->input;
			$data = array(	'nama'			=> $i->post('nama'),
							'email'			=> $i->post('email'),
							'username'		=> $i->post('username'),
							'password'		=> sha1($i->post('password')),
							'akses_level'	=> $i->post('akses_level'),
							'keterangan'	=> $i->post('keterangan'),
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
		//End Validasi
	} //End Tambah

	//Halaman Edit User-------------------------------------------------------------
	public function edit($id_user) {

		$user = $this->user_model->detail($id_user);

		//Validasi
		$valid=$this->form_validation;

		$valid->set_rules('nama','Nama','required', 
			array(	'required'		=>	'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email', 
			array(	'required'		=>	'Email harus diisi',
					'valid_email'	=>	'Format Email tidak benar',
					));


		if ($valid->run()=== FALSE) {
		//End Validasi

		$data = array(	'title'		=>	'Edit User : '.$user->nama,
						'user'		=> 	$user,
						'isi'		=>	'admin/user/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Jika Tidak Error Maka Masuk Database
		}else{
			$i = $this->input;

			//jika password lebih dari 6 karakter
			if(strlen($i->post('password')) > 6) {
				$data = array(	'id_user'		=> $id_user,
								'nama'			=> $i->post('nama'),
								'email'			=> $i->post('email'),
								'password'		=> sha1($i->post('password')),
								'akses_level'	=> $i->post('akses_level'),
								'keterangan'	=> $i->post('keterangan'),
							);
		}else{
				$data = array(	'id_user'		=> $id_user,
								'nama'			=> $i->post('nama'),
								'email'			=> $i->post('email'),
								'akses_level'	=> $i->post('akses_level'),
								'keterangan'	=> $i->post('keterangan'),
							);
		}

			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah diupdate');
			redirect(base_url('admin/user'),'refresh');
		}
		//End Validasi
	}
	
	//Delete-----------------
	public function delete($id_user){
		//Proteksi sebelum di hapus
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
			$this->session->set_flashdata('sukses', 'Silahkan Login terlebih dahulu');
			redirect(base_url('login'),'refresh');	
		}
		//End Proteksi
		$data = array('id_user'		=>	$id_user);
		$this->user_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data Telah dihapus');
			redirect(base_url('admin/user'),'refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */