<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	function __construct() //untuk membangun koding koding awal yang dibutuhkan (pemanggilan awal)
	{
		parent::__construct();
		$this->load->model('Model_ruangan');
		$this->load->model('Model_peminjaman');
		$this->load->model('Model_user');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database();
	}

	public function addPinjam()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 20048;

		$this->load->library('form_validation');
		$this->load->library('upload', $config);
		$this->upload->initialize($config);


		if ( ! $this->upload->do_upload('userfile'))
		{
			echo $this->upload->display_errors();
		}
		else
		{
			$surat_undangan = $this->upload->data();
			$surat_undangan = $surat_undangan['file_name'];
			$tanggal_mulai = $this->input->post('tanggal_mulai');
			$tanggal_selesai=$this->input->post('tanggal_selesai');
			$jam_mulai = $this->input->post('jam_mulai');
			$jam_selesai = $this->input->post('jam_selesai');
			$id_ruangan = $this->input->post('id_ruangan');
			$kode_booking = $this->Model_peminjaman->set_id_booking();
			// if ( $this->Model_peminjaman->jam_tgl_sama($tanggal_mulai,$jam_mulai)!=Null && $this->Model_peminjaman->get_same_room($id_ruangan))
			// {

			// // 	$pesan = '<div class="alert alert-success alert-dismissible fade in" role="alert">
			// // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Jam mulai dan tanggal mulai sama</div>';
			// // 	$this->session->set_flashdata('notification', $pesan);
			// 	// echo json_encode(['failed'=>'jam mulai dan tanggal mulai sama']);
			// 	echo "jam mulai dan tanggal mulai sama";
			// }	
			// else if ($this->Model_peminjaman->jam_tgl_beda_selsai($tanggal_mulai,$jam_mulai)!=Null && $this->Model_peminjaman->get_same_room($id_ruangan)){
			// 	echo "tanggal mulai sudah ada tapi jam nya jam selesai dari yang udah ada";
			// } else if ($this->Model_peminjaman->tgl_sama_range_jam($tanggal_mulai,$jam_mulai)!=Null && $this->Model_peminjaman->get_same_room($id_ruangan)){
			// 	echo "tanggal mulai sudah ada, tapi jam nya ada di range jam mulai dan selesai dari yang udah ada";
			// } else {
			$data1 = array(
				'id_ruangan' => $this->input->post('id_ruangan'),
				'nama_pic'=> $this->input->post('nama_pic'),
				'no_pic'=> $this->input->post('no_pic'),
				'unit_kerja'=> $this->input->post('unit_kerja'),
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
				'jumlah_undangan' => $this->input->post('jumlah_undangan'),
				'pimpinan_hadir' => $this->input->post('pimpinan_hadir'),
				'tanggal_mulai' => $tanggal_mulai,
				'tanggal_selesai' => $tanggal_selesai,
				'jam_mulai' => $this->input->post('jam_mulai'),
				'jam_selesai' => $this->input->post('jam_selesai'),
				'surat_undangan' => $surat_undangan,
				'kode_booking' => $kode_booking,
				'status'=> 1
			);
			$id_peminjaman=	$this->Model_peminjaman->insert($data1);

			$data2 = array(
				'id_peminjaman' => $id_peminjaman,
				'status' => 1
			);
			$this->Model_peminjaman->insert_status($data2);

			$data3 = array(
				'name'=> $this->input->post('nama_pic'),
				'log' => 'Mengajukan peminjaman',
				'id_peminjaman' => $id_peminjaman
			);

			$this->Model_user->insert_log($data3);

			$this->session->set_flashdata('msg','<div class="alert card green lighten-4 black-text text-darken-4">
				<div class="card-content">
				<h5 class="center">'.$kode_booking.' </h5>
				<p class="center">Simpan kode diatas untuk mengecek status proses peminjaman.</p>
				</div>
				</div>');
			redirect (base_url('Home'));

			// }
		}
	}

	public function search(){
		$keyword = $this->input->post('keyword');
		$data['peminjaman_ruangan'] = $this->Model_peminjaman->search($keyword);
		$data['approval_log'] = $this->Model_peminjaman->approval_log($keyword);
		$this->load->view('v_detail_peminjaman',$data);
	}


	public function download_surat($id){
		$data = $this->db->get_where('peminjaman_ruangan',['id'=>$id])->row();
		force_download('uploads/'.$data->surat_undangan,NULL);
	}


}
?>