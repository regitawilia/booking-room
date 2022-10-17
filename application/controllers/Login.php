<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() //untuk membangun koding koding awal yang dibutuhkan (pemanggilan awal)
	{
		parent::__construct();
		$this->load->model('Model_ruangan');
		$this->load->model('Model_peminjaman');
		$this->load->model('Model_user');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library(['form_validation','session']);
		$this->load->database();
	}

	public function login(){
		$this->load->view('v_login');
		// $this->load->view('v_login_2');
	}


	public function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data=$this->Model_user->login($username, $password);
		if ($data){
			$this->session->set_userdata('id', $data->id);
			$this->session->set_userdata('role', $data->role);
			$this->session->set_userdata('username', $data->username);
			$this->session->set_userdata('nama', $data->nama);
			if($_SESSION['role'] == "admin"){
				$username = $this->session->userdata('username');
				$role = $this->session->userdata('role');
				$name = $this->session->userdata('nama');
				$id_user = $this->session->userdata('id');

				$data = array(
					'username' => $username,
					'name' => $name,
					'role' => $role,
					'log' => 'Melakukan login',
					'id_user' => $id_user
				);

				$this->Model_user->insert_log($data);

				redirect('Admin/dashboard');
			}else if ($_SESSION['role'] == "approval"){
				$username = $this->session->userdata('username');
				$role = $this->session->userdata('role');
				$name = $this->session->userdata('nama');
				$id_user = $this->session->userdata('id');

				$data = array(
					'username' => $username,
					'name' => $name,
					'role' => $role,
					'log' => 'Melakukan login',
					'id_user' => $id_user
				);

				$this->Model_user->insert_log($data);

				redirect('Approval/list_peminjaman');				
			} else {
				redirect('Home/dashboard');
			}
		} else {
			$this->session->set_flashdata('message_login_error', '<div class="alert card red lighten-4 red-text text-darken-4">
				<div class="card-content">
				<p><i class="tiny material-icons">report</i>Login gagal, username atau password yang anda masukkan salah.</p>
				</div>
				</div>');
			redirect('Login/login');
		}
	}

	public function logout()
	{

		$username = $this->session->userdata('username');
		$role = $this->session->userdata('role');
		$name = $this->session->userdata('nama');
		$id_user = $this->session->userdata('id');

		$data = array(
			'username' => $username,
			'name' => $name,
			'role' => $role,
			'log' => 'Melakukan logout',
			'id_user' => $id_user
		);

		$this->Model_user->insert_log($data);

		$this->session->sess_destroy();
		$this->load->view('v_login');
	}

}