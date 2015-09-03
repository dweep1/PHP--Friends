<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	protected $view_data = array();
	protected $user_session = NULL;


	public function __construct()
	{
		parent::__construct();
		$this->view_data['user_session'] = $this->user_session = $this->session->userdata("user_session");
	}

	public function index()
	{
	$this->load->view('user_login');
	}
	public function login_page()
	{
		$this->load->view('user_login');
	}

	public function login_process()
	{
		
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email","Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password","Password", "trim|min_length[8]|required|md5");

		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("login_errors", validation_errors());
			redirect('/');
		}
		else
		{
			$this->load->model("user_model");
			$get_user = $this->user_model->get_user($this->input->post());
			if($get_user)
				{
				$this->session->set_userdata("user_session", $get_user);
				redirect("/login/profile");
				}
			else
			{
				
				$this->session->set_flashdata("login_errors", "Invalid email and/or password");
				redirect(base_url());
			}
		}
	}
		public function process_registration()
		{
			$this->load->library("form_validation");
			$this->form_validation->set_rules("name","Name", "trim|required");
			$this->form_validation->set_rules("alias","Alias", "trim|required");
			$this->form_validation->set_rules("email","Email", "required|valid_email|is_unique[users.email]");
			$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|matches[confirm_password]|md5");
			$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|md5");
			if($this->form_validation->run()=== FALSE)
			{
				$this->session->set_flashdata("registration_errors", validation_errors());
				redirect(base_url());
			}
			else
			{
				$this->load->model("User_model");
				$user_input = $this->input->post();
				$insert_user = $this->User_model->insert_user($user_input);
				if($insert_user)
				{
					$this->session->set_flashdata('Success', 'You are now registered and may login.');
					redirect("/");
				}
				else
				{
					$this->session->set_flashdata("registration_errors", 
					"Sorry but your info was not going through our system. Try again, please.");
					redirect(base_url());
				}
			}
		}
		public function profile()
		{
			$this->load->model("User_model");

			$friends = $this->User_model->get_all_friends($this->session->userdata("user_session")['id']);
			$show_user = $this->User_model->show_users_profile($this->session->userdata("user_session")['id'], "user_session['name'], user_session['alias']");
			$nonfriends = $this->User_model->get_all_nonfriends($this->session->userdata("user_session")['id'], "user_session['alias']");
			


			$this->load->view("user_profile", array(
			 	'friends' => $friends,
				'nonfriends' => $nonfriends,
				'username'=> $show_user
			 ));
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect("/");
		}
		public function view_friend($id)
		{
			$this->load->model("User_model");
			$friend = $this->User_model->show_users_profile($id);
			$this->load->view("profile", array("user_name"=>$friend['alias'], "email"=>$friend['email']));
		}
		public function remove_friend($id)
		{
			
			
			$this->load->model("User_model");
			$our_id = $this->session->userdata("user_session")['id'];
			$remove_friends = $this->User_model->remove_friend($id,$our_id);
			redirect('/login/profile');
			
		}

		public function add_friend($id)
		{
		 	
		 	
			$this->load->model("User_model");
			$our_id = $this->session->userdata("user_session")['id'];
		 	$this->User_model->add_friend($our_id, $id);
		 	redirect('/login/profile/');
		
		 }

	
		
}

//end of main controller