<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($useremail)
    {  
        // echo $useremail;
        // die;
       $query = $this->db->get_where('tbl_user_reg', array('user_email' => $useremail))->result(); 
      
       if(count($query) > 0)  
       {
           return $query;
       }
       else{
           return false;
       }

    }


    public function get_user($id)
    {      
        return $this->db->get_where('tbl_user_reg', array('id' => $id))->result()[0];  
    }


    public function update_password($id,$cpass)
     {    
        //  print_r($id);
        //  echo "<br>";
        //  print_r($cpass);
        //  die;            
        $this->db->where('id', $id);
        $this->db->update('tbl_user_reg', array('user_password'=>$cpass)); 
    }
}

?>