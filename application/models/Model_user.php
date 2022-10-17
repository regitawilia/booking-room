<?php  
class Model_user extends CI_Model  
{  

   private $_table="user";
   const SESSION_KEY = 'user_id';
   function __construct()  
   {  
         // Call the Model constructor  
      parent::__construct();  
      $this->load->database();
   }  
      //we will use the select function  
   public function select($username,$password)  
   {  
      $this->db->where('username',$username);
      $this->db->where('password',$password);
      return $this->db->get('user')->result();
   }

   public function select_all()
   {
      $query = $this->db->get('user');  
      return $query->result_array(); 
   }

   public function insert($data){
      $this->db->insert('user',$data);
      return true;
   }

   public function edit_user($id,$data){
      $this->db->where('id',$id);
      $this->db->update('user',$data);
      return true;
   }

   public function detail_user($id){
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('id',$id);
      return $this->db->get()->result_array();
   }

   public function login($username,$password){
      $query = $this->db->get_where('user',array('username'=>$username));
      if($query->num_rows() > 0)
      {
         $data_user = $query->row();
         if ($data_user->password == $password) {
            return $data_user;
         } else {
            return FALSE;
         }
      }
      else
      {
         return FALSE;
      }
   }

   public function cek_login()
   {
      if(empty($this->session->userdata('is_login')))
      {
         redirect('login');
      }
   }

   public function get_role($id){
      $this->db->select('role');
      $this->db->where('id',$id);
      return $this->db->get('user')->result();
      console.log();
   }

   public function insert_log($data){
      $this->db->insert('log_activity',$data);
      return true;
   }

   public function get_log(){
      $this->db->order_by('created_date','desc');
      $query = $this->db->get('log_activity');  
      return $query->result_array(); 
   }

   public function export_log(){
      $this->db->select('name,username,log,id_peminjaman,created_date,role');
      $query = $this->db->get('log_activity');  
      return $query->result_array(); 
   }

}  
?>  