<?php
	class Oye_user extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
		}

		public function index()
		{
			$this->load->view('user/user_registeration');
		}

		
		public function user_register()
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('user_name', 'Username', 'required');
			$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('user_contact', 'Mobile', 'required');
			$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('cpwd', 'Password Confirmation', 'required|matches[user_password]');
			
			$post = $this->input->post();

			unset($post['login']);

			$this->load->model('register_model');
			
			if ($this->form_validation->run() == TRUE)
            {
                $this->register_model->register($post);
            }
            else
            {
                $this->load->view('user/user_registeration');
            }
			// if($this->register_model->register($post))
			// {
			// 	echo "Registered Successfully.....";
			// }
			// else
			// {
			// 	echo "Error Occured while Registering!!!!!";
			// }
			return redirect('oye_user/user_register');
		}
	}	
?>