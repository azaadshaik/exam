 <?php defined('BASEPATH') OR exit('No direct script access allowed');


class PulseAuth extends CI_Controller
{
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model(array('PulseAuthModel','UserModel'));
		
		

	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{

		if (!$this->session->userdata('logged_in'))
		{
			// redirect them to the login page
			
			redirect('PulseAuth/login', 'refresh');
		}
		
		else
		{
			
			$role_name = $this->session->userdata('user_rolecode');

			
			switch($role_name){
				case 'admin':
				$path='Admin';
				break;
				case 'student':
				$path='Student';
				break;
				case 'parent':
				$path='parent';
				break;
				default:
				$path='student';
				break; 

			}

			//echo $path;
			//die;
			redirect($path,'refresh');


			
		}
	}

	/**
	 * Log the user in
	 */
	public function login()
	{

		
		// validate form input
		$this->form_validation->set_rules('username', 'Username is required', 'required');
		$this->form_validation->set_rules('password', 'Password is required', 'required');

		if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			//$remember = (bool)$this->input->post('remember');
      $result = $this->PulseAuthModel->login($this->input->post('username'), $this->input->post('password'));
    
			if ($result)
			{
				
				
				$role_data = $this->UserModel->get_role_by_id($result->user_role);
				$rolecode='';
				if($role_data) $rolecode=$role_data->role_code;
				$session_data =  array(
					'user_name'  => $result->user_name,
					'user_id'     => $result->user_id,
					'user_firstname'     => $result->user_firstname,
					'user_lastname'     => $result->user_lastname,
					'user_rolecode'     => $rolecode,
					'user_class' => $result->class,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($session_data);
 
				//if the login is successful
				//redirect them back to the home page
				//$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/', 'refresh');
			}
			else
			{
								
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', 'Authentication Failed');
				$data['title'] = 'Login';
				//redirect('pulseauth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
				$this->template->load('default', 'auth/login', $data);
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['username'] = array('name' => 'username',
				'id' => 'username',
				'type' => 'text',
				'value' => $this->form_validation->set_value('username'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);
			$data['title'] = 'Login';
			//$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'login', $this->data);
			$this->template->load('default', 'auth/login', $data);
		}
	}

	/**
	 * Log the user out
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('PulseAuth/login', 'refresh');
	}

	public function is_logged_in(){

		return false;
	}

	
}
