<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends CI_Controller {

	function __construct() //untuk membangun koding koding awal yang dibutuhkan (pemanggilan awal)
	{
		parent::__construct();
		$this->load->model('Model_ruangan');
		$this->load->model('Model_peminjaman');
		$this->load->model('Model_user');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('download');
		$this->load->library(['form_validation','session']);
		$this->load->database();
		if ($this->session->userdata('role') != 'approval') {
			redirect('Login/login');
		}
	}


	public function list_peminjaman(){
		$data['peminjaman_ruangan'] = $this->Model_peminjaman->request_approval_sent();
		$data['peminjaman_ruangan_approved'] = $this->Model_peminjaman->request_approval_approved();
		$data['peminjaman_ruangan_rejected'] = $this->Model_peminjaman->request_approval_rejected();
		$this->load->view('approval/v_request_list_2',$data);
	}

	public function detail_approval($id){
		$data['peminjaman_ruangan'] = $this->Model_peminjaman->get_detail_approval($id);
		$this->load->view('approval/v_detail_request',$data);
	}


	public function detail_approval_2($id){
		$data['peminjaman_ruangan'] = $this->Model_peminjaman->get_detail_approval($id);
		$this->load->view('approval/v_detail_request_2',$data);
	}


	public function approve_data($id){
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');
		$jam_mulai = $this->input->post('jam_mulai');
		$jam_selesai = $this->input->post('jam_selesai');
		$id_ruangan = $this->input->post('id_ruangan');
		$kode_booking = $this->Model_peminjaman->set_id_booking();
		$username = $this->session->userdata('username');
		$role = $this->session->userdata('role');
		$name = $this->session->userdata('nama');
		$id_user = $this->session->userdata('id');

		if (!empty($_POST['approve'])) {
			$data1 = array(
				'id' => $this->input->post('id'),
				'status' => 2
			);
			$id_peminjaman=	$this->Model_peminjaman->update_status($id,$data1);

			$data2 = array(
				'id_peminjaman' => $id,
				'status' => 2,
				'approval_by' => $username,
				'role' => $role,
				'approval_by_id' => $id_user
			);

			$this->Model_peminjaman->approve($data2);

			$data3 = array(
				'username' => $username,
				'name' => $name,
				'role' => $role,
				'log' => 'Menyetujui peminjaman ruangan',
				'id_peminjaman' => $id,
				'id_user' => $id_user
			);

			$this->Model_user->insert_log($data3);
		}

		if (!empty($_POST['reject'])) {
			$data1 = array(
				'id' => $this->input->post('id'),
				'status' => 3
			);
			$id_peminjaman=	$this->Model_peminjaman->update_status($id,$data1);

			$data2 = array(
				'id_peminjaman' => $id,
				'status' => 3,
				'approval_by' => $username,
				'role' => $role,
				'approval_by_id' => $id_user
			);

			$this->Model_peminjaman->approve($data2);

			$data3 = array(
				'username' => $username,
				'name' => $name,
				'role' => $role,
				'log' => 'Menyetujui peminjaman ruangan',
				'id_peminjaman' => $id,
				'id_user' => $id_user
			);

			$this->Model_user->insert_log($data3);
		}
		
		redirect (base_url('Approval/list_peminjaman'));
	}


}
?>