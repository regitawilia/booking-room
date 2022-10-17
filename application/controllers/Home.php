<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() //untuk membangun koding koding awal yang dibutuhkan (pemanggilan awal)
	{
		parent::__construct();
		$this->load->model('Model_ruangan');
		$this->load->model('Model_peminjaman');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{	

		$data['ruangan'] = $this->Model_ruangan->select();
		$data['peminjaman'] = $this->Model_peminjaman->select();
		$this->load->view('v_dashboard',$data);
	}

	public function detail_ruangan($id) 
	{
		$data['ruangan'] = $this->Model_ruangan->getDetail($id);
		$this->load->view('v_detail_ruangan',$data);
	}

	public function peminjaman(){
		$data = $this->Model_peminjaman->get_status_approve();
		echo json_encode($data);
	}

	public function download_panduan(){
		force_download('assets/img/panduan_pengajuan.pdf',NULL);
	}

	public function approve_data($id){
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');
		$jam_mulai = $this->input->post('jam_mulai');
		$jam_selesai = $this->input->post('jam_selesai');
		$id_ruangan = $this->input->post('id_ruangan');
		$kode_booking = $this->Model_peminjaman->set_id_booking();

		if (!empty($_POST['approve'])) {
			$data1 = array(
				'id' => $this->input->post('id'),
				'status' => 2
			);
			$id_peminjaman=	$this->Model_peminjaman->update_status($id,$data1);

			$data2 = array(
				'id_peminjaman' => $id,
				'status' => 2
			);

			$this->Model_peminjaman->approve($data2);

			$data3 = array(

			);
		}

		if (!empty($_POST['reject'])) {
			$data1 = array(
				'id' => $this->input->post('id'),
				'status' => 3
			);
			$id_peminjaman=	$this->Model_peminjaman->update_status($id,$data1);

			$data2 = array(
				'id_peminjaman' => $id,
				'status' => 3
			);

			$this->Model_peminjaman->approve($data2);
		}
		
		redirect (base_url('Approval/list_peminjaman'));
	}




}
