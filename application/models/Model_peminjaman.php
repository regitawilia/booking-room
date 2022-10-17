 <?php  
 class Model_peminjaman extends CI_Model  
 {  
   function __construct()  
   {  
         // Call the Model constructor  
      parent::__construct();  
      $this->load->database();
   }  

   public function insert($data)
   {
      $this->db->insert('peminjaman_ruangan',$data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
   }

   public function select(){
      $this->db->select('pr.*, r.nama_ruangan');
      $this->db->from('peminjaman_ruangan pr');
      $this->db->join('ruangan r','r.id=pr.id_ruangan');
      $this->db->where('pr.status',2);
      return $this->db->get()->result();
   }

   public function select_all(){
      $this->db->select('pr.*, r.nama_ruangan');
      $this->db->from('peminjaman_ruangan pr');
      $this->db->join('ruangan r','r.id=pr.id_ruangan');
      $this->db->order_by('pr.created_date', "DESC");
      return $this->db->get('')->result_array();
   } 

   public function jam_tgl_sama($tanggal_mulai, $jam_mulai){ //jam dan tanggal sama
      $this->db->where('tanggal_mulai',$tanggal_mulai);
      $this->db->where('jam_mulai',$jam_mulai);
      return $this->db->get('peminjaman_ruangan')->result_array();
   }

      public function jam_tgl_beda_selsai($tanggal_mulai, $jam_selesai){ //jam dan tanggal sama
         $this->db->where('tanggal_mulai',$tanggal_mulai);
         $this->db->where('jam_selesai',$jam_selesai);
         return $this->db->get('peminjaman_ruangan')->result_array();
      }

       public function tgl_sama_range_jam($tanggal_mulai, $mulai){ //jam dan tanggal sama
         $this->db->where('tanggal_mulai',$tanggal_mulai);
         $this->db->where('jam_mulai <=',$mulai);
         $this->db->where('jam_selesai >=',$mulai);
         return $this->db->get('peminjaman_ruangan')->result_array();
      }

      public function request_approval_sent(){
         $this->db->select('pr.*, r.nama_ruangan');
         $this->db->from('peminjaman_ruangan pr');
         $this->db->join('ruangan r','r.id=pr.id_ruangan');
         $this->db->where('pr.status',1);
         return $this->db->get()->result_array();
      }

      public function request_approval_approved(){
         $this->db->select('pr.*, r.nama_ruangan');
         $this->db->from('peminjaman_ruangan pr');
         $this->db->join('ruangan r','r.id=pr.id_ruangan');
         $this->db->where('pr.status',2);
         return $this->db->get()->result_array();
      }

      public function request_approval_rejected(){
         $this->db->select('pr.*, r.nama_ruangan');
         $this->db->from('peminjaman_ruangan pr');
         $this->db->join('ruangan r','r.id=pr.id_ruangan');
         $this->db->where('pr.status',3);
         return $this->db->get()->result_array();
      }

      public function get_detail_approval($id){
         $this->db->select('pr.*, r.nama_ruangan');
         $this->db->from('peminjaman_ruangan pr');
         $this->db->join('ruangan r','r.id=pr.id_ruangan');
         $this->db->where('pr.id',$id);
         return $this->db->get()->result_array();
      }

      public function get_same_room($id){
         $this->db->where('id_ruangan',$id);
         return $this->db->get('peminjaman_ruangan')->result_array();
      }

     //  public function get_id_booking(){
     //    $query = $this->db->query("SELECT MAX(id) as id_peminjaman from peminjaman_ruangan");
     //    $hasil = $query->row();
     //    return $hasil->id_peminjaman;
     // }

      public function set_id_booking(){
         $this->db->select('RIGHT(peminjaman_ruangan.kode_booking,5) as kode_booking', FALSE);
         $this->db->order_by('kode_booking','DESC');
         $this->db->limit(1);
         $query = $this->db->get('peminjaman_ruangan');
         if($query->num_rows() <> 0){      
           $data = $query->row();
           $kode = intval($data->kode_booking) + 1; 
        }
        else{      
           $kode = 1;  
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "PSDK".$batas;
        return $kodetampil;  
     }

     public function insert_status($data){
        $this->db->insert('approval_log',$data);
        return true;
     }



     public function download_surat($id){
      $this->db->select();
      $this->db->from('peminjaman_ruangan');
      $this->db->where('id',$id);
      return $this->db->get()->result_array();
   }

   public function update_status($id_peminjaman,$data){
      $this->db->where('id',$id_peminjaman);
      $this->db->update('peminjaman_ruangan',$data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
   }

   public function approve($data){
      $this->db->insert('approval_log',$data);
      return true;
   }

   public function get_status_approve(){
      $this->db->select('pr.id, r.nama_ruangan as title, CONCAT(pr.tanggal_mulai,"T",pr.jam_mulai) as start, CONCAT(pr.tanggal_selesai,"T",pr.jam_selesai) as end ');
      // $this->db->select('pr.id, r.nama_ruangan as title, pr.tanggal_mulai as start, pr.tanggal_selesai as end');
      $this->db->from('peminjaman_ruangan pr');
      $this->db->join('ruangan r','r.id=pr.id_ruangan');
      $this->db->where('status',2);
      return $this->db->get()->result_array();

   }

   public function search($kode_booking){
     $this->db->select('pr.*, r.nama_ruangan');
     $this->db->from('peminjaman_ruangan pr');
     $this->db->join('ruangan r','r.id=pr.id_ruangan');
     $this->db->where('kode_booking',$kode_booking);
     return $this->db->get()->result_array();
  }

  public function approval_log($kode_booking){
   $this->db->select('pr.*, r.nama_ruangan, al.created_date as tanggal_pengajuan, al.status as status_pengajuan');
   $this->db->from('peminjaman_ruangan pr');
   $this->db->join('ruangan r','r.id=pr.id_ruangan');
   $this->db->join('approval_log al','al.id_peminjaman=pr.id');
   $this->db->where('kode_booking',$kode_booking);
   return $this->db->get()->result_array();
}

public function export(){
   $this->db->select('pr.nama_pic, pr.no_pic, r.nama_ruangan, pr.nama_kegiatan, pr.tanggal_mulai,pr.tanggal_selesai,pr.jam_mulai,pr.jam_selesai');
   $this->db->from('peminjaman_ruangan pr');
   $this->db->join('ruangan r','r.id=pr.id_ruangan');
   return $this->db->get()->result_array();
} 

}
?>  