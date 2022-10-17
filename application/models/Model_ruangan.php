<?php  
class Model_ruangan extends CI_Model  
{  
   function __construct()  
   {  
         // Call the Model constructor  
      parent::__construct();  
      $this->load->database();
   }  
      //we will use the select function  
   public function select()  
   {  
         //data is retrive from this query  
      $query = $this->db->get('ruangan');  
      return $query->result();  
   }

   public function getDetail($id)
   {
      $this->db->where('id',$id);
      return $this->db->get('ruangan')->result();
   }
}  
?>  