<?php
class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('model_administrator');
	}
	
	public function check_valid() {
	    return $this->model_administrator->checkValid($this->input->post('txtUsername'),$this->input->post('txtPassword') ) == false;
	}

	public function check_level() {
	    return $this->model_administrator->checkLevel($this->input->post('txtUsername'),$this->input->post('txtPassword'));
	}

	function index($msg='')
	{
		$datacontent['error'] = $msg;
		$this->form_validation->set_rules('txtUsername', 'Username', 'required');
		$this->form_validation->set_rules('txtPassword', 'Password', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$datacontent['reset'] 			= FALSE;
			$datacontent['chUsername'] 		= $this->input->post('txtUsername');	
			$datacontent['chPassword'] 		= $this->input->post('txtPassword');	
			$this->load->view('index',$datacontent);
		}
		else
		{
			$this->form_validation->set_rules('chUsernames', 'Username', 'callback_check_valid');
    		$this->form_validation->set_message('check_valid', 'Invalid Username or Password');

    		if ($this->form_validation->run() == false) {
    			$userlogin = $this->model_administrator->authenticate($this->input->post('txtUsername'));
    			$user_id = (count($userlogin) > 0) ? $userlogin['chUsername'] : 0;
    			if( $user_id )
				{
					$return = $this->check_level();
					if ($return == '0')
					{
						$datacontent['reset'] 			= FALSE;
						$datacontent['error']		 	= 'Not Authorized Login !';
						$datacontent['chUsername'] 		= $this->input->post('txtUsername');	
						$datacontent['chPassword'] 		= $this->input->post('txtPassword');	
						$this->load->view('index',$datacontent);
					}
					else
					{
						$data_session['reset'] 			= TRUE;
		    			$data_session = array(
											'adminname' => $userlogin['chUsername'],
											'level'   	=> $userlogin['chLevel']
										);
						$this->session->set_userdata($data_session);
						redirect('dashboard');
					}
				}
				else
				{
					$datacontent['reset'] 			= FALSE;
					$datacontent['error']		 	= 'Invalid Username or Password !';
					$datacontent['chUsername'] 		= $this->input->post('txtUsername');	
					$datacontent['chPassword'] 		= $this->input->post('txtPassword');	
					$this->load->view('index',$datacontent);
				}
			}
			else
			{
				$datacontent['reset'] 			= FALSE;
				$datacontent['error']		 	= 'Invalid Username or Password !';
				$datacontent['chUsername'] 		= $this->input->post('txtUsername');	
				$datacontent['chPassword'] 		= $this->input->post('txtPassword');	
				$this->load->view('index',$datacontent);
			}
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
        redirect('auth');
	}
		
}
