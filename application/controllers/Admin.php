<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->library('encryption');
	    $this->encryption->initialize(array('driver' => 'openssl'));
        $this->load->model('Login_model');
        $this->load->helper('my');
    }

    public function dashboard()
   {
    if($this->session->userdata('id') == null)
    {
        return redirect('Admin');
    }
       $this->load->view('includes/header');
       if($this->session->userdata('id') ){
        $result = $this->Login_model->get_user($this->session->userdata('id'));                  
        $this->load->view('index', array('result' => $result)); 
       }
       $this->load->view('index');
       $this->load->view('includes/footer');
   }

    
    public function index()
    {
        if($this->session->userdata('id'))
        {
           // return redirect('Admin/dashboard');
        }
        
     $this->load->view('includes/header');
     $this->load->library('form_validation');
     $this->form_validation->set_rules('login[email]','Email','trim|required|valid_email');   
     $this->form_validation->set_rules('login[password]','Password','trim|required|alpha_numeric');  
     $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
 
     if($this->form_validation->run() == FALSE)
     {       
         $this->load->view('admin/login');       
     }

     else{
        $uemail = $this->security->xss_clean($this->input->post('login[email]'));
        $upass = $this->security->xss_clean($this->input->post('login[password]'));
        // $ed = encode($this->encryption->encrypt($this->input->post('login[password]')));
    
        // print_r($ed);
        // die;
        $res = $this->Login_model->login($uemail);
        if($res){  
                                
        if (password_verify($upass,$res[0]->user_password)) {
            echo "success";
            die;
            $this->session->set_userdata('id', $res[0]->id);
           // return redirect('Admin/dashboard');
        } else {
            echo "notttttt";
            $this->session->set_flashdata('msg', '<div class="text-danger">Wrong Credentials,Please Enter Valid One</div>');
           // return redirect('Admin');                     
        }
    }
    else{
        $this->load->view('admin/login');  
    }

     } 
     
     $this->load->view('includes/footer');
  }


  public function get_profile()
  {
    $this->load->view('includes/header');  

    if($this->session->userdata('id') ){
     $result = $this->Login_model->get_user($this->session->userdata('id'));                  
     $this->load->view('admin/profile', array('result' => $result)); 

    $this->load->view('includes/footer');
  }
 
}

public function logout()
{
    $this->session->unset_userdata('id');
    redirect('Admin');
    
} 


public function forget_password()
{
    $this->load->view('includes/header');
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('login[email]','Email','trim|required|valid_email'); 
    $res = $this->Login_model->login($this->input->post('login[email]'));
    if($this->form_validation->run() == FALSE)
    {
        $this->load->view('admin/forget-password');     
    }
    
    if($res)
    {
          //$url = "http://localhost/oyegifts/Admin/forget_password-recover/$id";

        $msg = "";
	$message = "";
	$base = base_url();
    $to_email = $res[0]->user_email;
	$subject = "(Confidential) Reset Password For angocart.com (Do not share)";
	$message .= "<br><p>Hi". " ".$res[0]->user_name.", please find the details";
	$message .= "<br> Username :".$res[0]->user_email;
	$ed = encode($this->encryption->encrypt($res[0]->id));
    $message .= "<br><p>You need to enter new password on following page :<a href='{$base}Admin/forget_password_recover/{$ed}'>({$base}Admin/forget_password-recover/{$ed})</a></p>";
    
        $config = array(
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('zeya7270@gmail.com', 'oyegift');
        $this->email->to($to_email);
       // $this->email->bcc(array("shantanu@nibblesoftware.com"));
        $this->email->subject($subject);
        $this->email->message($message);
        print_r( $message);
        die;
        $result = $this->email->send();       
    }
    else{
          $this->session->set_flashdata('msg', '<div class="text-danger">Wrong Credentials,Please Enter Valid One</div>');
          //return redirect('admin');    
      }
         $this->load->view('includes/footer');
    
}


public function forget_password_recover()
{
    
    $id = (int) $this->encryption->decrypt(decode($this->uri->segment(3)));
  
        if($id != NULL)
        {
           $res =  $this->Login_model->get_user($id);

            if($res != NULL)
            {
                $key = $this->encryption->encrypt(encode($id));
                return redirect('Admin/change_password/'.$key);
        
             }
        }else{
            //return redirect('Admin/forget_password');
        }
 }

 public function change_password()
 {
     //print_r($this->input->post());

     $this->load->view('includes/header');
     $this->load->view('admin/change_password');
  $pass = password_hash($this->security->xss_clean($this->input->post('password')), PASSWORD_BCRYPT);

  $cpass = password_hash($this->security->xss_clean($this->input->post('confirm_password')), PASSWORD_BCRYPT);

   echo $this->input->post('password');
   echo $this->input->post('confirm_password');
 //$this->input->post('password') === $this->input->post('confirm_password')

  
      
        if($this->input->post('password') == $this->input->post('confirm_password'))
        {
            $id = (int) $this->encryption->decrypt(decode($this->uri->segment(3)));
              $this->Login_model->update_password($id,$cpass); 
      echo "success";
        
        } 
        else{
            echo"wrong";
            // die;
        }
    
     $this->load->view('includes/footer');
 
     }
 }

?>