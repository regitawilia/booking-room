<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() //untuk membangun koding koding awal yang dibutuhkan (pemanggilan awal)
	{
		parent::__construct();
		$this->load->model('Model_ruangan');
		$this->load->model('Model_peminjaman');
		$this->load->model('Model_user');
		$this->load->helper('url');
		$this->load->helper('form');
		if ($this->session->userdata('role') != 'admin') {
			redirect('Login/login');
		}
	}

	public function dashboard()
	{	
		$this->load->view('admin/v_dashboard_admin');
	}

	public function list_peminjaman(){
		$data['peminjaman_ruangan'] = $this->Model_peminjaman->select_all();
		// $data['peminjaman_ruangan_approved'] = $this->Model_peminjaman->request_approval_approved();
		// $data['peminjaman_ruangan_rejected'] = $this->Model_peminjaman->request_approval_rejected();
		$this->load->view('admin/v_pending_request',$data);
	}

	public function detail_request($id){
		$data['peminjaman_ruangan'] = $this->Model_peminjaman->get_detail_approval($id);
		$this->load->view('admin/v_detail_request',$data);
	}

	public function list_user(){
		$data['user'] = $this->Model_user->select_all();
		$this->load->view('admin/v_user_list',$data);
	}

	public function add_user(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role' => $this->input->post('role')
		);

		$this->Model_user->insert($data);
		redirect('admin/list_user');
	}

	public function detail_user($id){
		$data['user']=$this->Model_user->detail_user($id);	
		$this->load->view('admin/v_detail_user',$data);
	}

	public function edit_user($id){
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'role' => $this->input->post('role'),
			'password' => $this->input->post('password')
		);

		$this->Model_user->edit_user($id,$data);

		redirect('admin/list_user');
	}

	public function export_pengajuan(){
   // file name 
		$filename = 'Report_Pengajuan_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");

   // get data 
		$peminjaman_ruangan = $this->Model_peminjaman->export();

   // file creation 
		$file = fopen('php://output', 'w');

		$header = array("Nama PIC","Nomor HP PIC", "Ruangan", "Nama Kegiatan","Tanggal Mulai","Tanggal Selesai", "Jam Mulai", "Jam Selesai"); 
		fputcsv($file, $header);
		foreach ($peminjaman_ruangan as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}

	public function export_pengajuan_xlsx(){
   // file name 
		$filename = 'Report_Pengajuan_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");

   // get data 
		$peminjaman_ruangan = $this->Model_peminjaman->export();

   // file creation 
		$file = fopen('php://output', 'w');

		$header = array("Nama PIC","Nomor HP PIC", "Ruangan", "Nama Kegiatan","Tanggal Mulai","Tanggal Selesai", "Jam Mulai", "Jam Selesai"); 
		fputcsv($file, $header);
		foreach ($peminjaman_ruangan as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
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
				'log' => 'Menolak peminjaman ruangan',
				'id_peminjaman' => $id,
				'id_user' => $id_user
			);

			$this->Model_user->insert_log($data3);
		}
		redirect (base_url('Admin/dashboard'));
	}

	public function log_list(){
		$data['log'] = $this->Model_user->get_log();
		$this->load->view('admin/v_log_activity',$data);
	}

	public function export_log(){
   // file name 
		$filename = 'Report_Log_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");

   // get data 
		$log = $this->Model_user->export_log();

   // file creation 
		$file = fopen('php://output', 'w');

		$header = array("Nama","Username", "Role", "Log","ID Peminjaman","Date Log"); 
		fputcsv($file, $header);
		foreach ($log as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}

}
