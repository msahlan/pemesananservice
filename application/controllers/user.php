<?php
	class User extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start(); 
			if(!$this->session->userdata('adminname'))
				redirect('auth');
			$this->load->model('model_user');
			$this->load->model('model_customer');
			$this->load->library('form_validation');
		}
				
		public function check_duplicate() {
		    return $this->model_user->checkDuplicate($this->input->post('txtUsername')) == false;
		}

		function index()
		{
			$datacontent['url'] 		= "user/index";
			$datacontent['user'] 		= $this->model_user->get_role();
			$this->load->view('cmsadm/menu/user/index',$datacontent);
		}

		function add()
		{
			$datacontent['reset'] 		= TRUE;
			$datacontent['url'] 		= "user/index";
			$datacontent['action'] 		= 'add';		
			$this->load->view('cmsadm/menu/user/add',$datacontent);
		}

		function actionadd()
		{
			$this->form_validation->set_rules('chUsername', 'Username', 'callback_check_duplicate');
    		$this->form_validation->set_message('check_duplicate', 'Username already exists');

		    if ($this->form_validation->run()) {
		    	$data['reset'] 				= TRUE;
				$data = array(
					'chNama'				=> $this->input->post('txtName'),
					'chNik'				=> $this->input->post('txtNik'),
					'chJabatan'				=> $this->input->post('txtJabatan'),
					'chUsername'    		=> $this->input->post('txtUsername'),
					'chPassword'    		=> base64_encode(sha1($this->input->post('txtPassword'),true)),
					'chLevel'				=> $this->input->post('cmbLevel'),
					'dtCreateDate'			=> date('Y-m-d H:i:s'),
					'chUserCreate'			=> $this->session->userdata('adminname'),	
				);
				
				$this->model_user->add($data);
				redirect('user/');  
			}
			else
			{
				$data['reset'] 				= FALSE;
				$data['chUsername'] 		= $this->input->post('txtUsername');	
				$data['chLevel'] 			= $this->input->post('cmbLevel');
				$this->load->view('cmsadm/menu/user/add',$data);
			}
		}
		
		function edit($id)
		{
			$datacontent['reset'] 		= TRUE;
			$datacontent['url'] 		= "user/index";
			$datacontent['chUsernameParam'] 	= $id;
			$datacontent['action'] 		= 'edit';
			$datacontent['data'] 		= $this->model_user->get_user($id);
			$this->load->view('cmsadm/menu/user/edit',$datacontent);
		}	
		
		function actionedit($username)
		{

			if ($username != $this->input->post('txtUsername'))
			{
				$this->form_validation->set_rules('chUsername', 'Username', 'callback_check_duplicate');
	    		$this->form_validation->set_message('check_duplicate', 'Username already exists');

			    if ($this->form_validation->run()) {
			    	$data['reset'] = TRUE;
					if ($this->input->post('cmbLevel') != "")
						$level = $this->input->post('cmbLevel');
					else
						$level = 'Customer';

					if($this->input->post('txtPassword') == "")
					{
						$data = array(
						'chNama'				=> $this->input->post('txtName'),
						'chNik'				=> $this->input->post('txtNik'),
						'chJabatan'				=> $this->input->post('txtJabatan'),
						'chUsername'    		=> $this->input->post('txtUsername'),
						'chLevel'				=> $level,
						'dtUpdateDate'			=> date('Y-m-d H:i:s'),
						'chUserUpdate'			=> $this->session->userdata('adminname'),	
						);
					}
					else
					{
						$data = array(
						'chUsername'    		=> $this->input->post('txtUsername'),
						'chPassword'    		=> base64_encode(sha1($this->input->post('txtPassword'),true)),
						'chLevel'				=> $level,
						'dtUpdateDate'			=> date('Y-m-d H:i:s'),
						'chUserUpdate'			=> $this->session->userdata('adminname'),	
						);
					}

					$dataCust = array(
						'chUsername'    		=> $this->input->post('txtUsername'),
						'dtUpdateDate'			=> date('Y-m-d H:i:s'),
						'chUserUpdate'			=> $this->session->userdata('adminname'),	
					);
					
					$this->model_user->update($this->input->post('inIDUser'),$data);
					$this->model_customer->updatebyiduser($this->input->post('inIDUser'),$dataCust);
					redirect('user/'); 
				}
				else
				{
					$data['reset'] 				= FALSE;
					$data['inIDUser'] 			= $this->input->post('inIDUser');	
					$data['chUsername'] 		= $this->input->post('txtUsername');	
					$data['chUsernameParam'] 	= $username;
					$data['chLevel'] 			= $this->input->post('cmbLevel');
					$this->load->view('cmsadm/menu/user/edit',$data);
				}
			}
			else
			{
				if ($this->input->post('cmbLevel') != "")
						$level = $this->input->post('cmbLevel');
					else
						$level = 'Customer';

				if($this->input->post('txtPassword') == "")
				{
					$data = array(
					'chLevel'				=> $level,
					'dtUpdateDate'			=> date('Y-m-d H:i:s'),
					'chUserUpdate'			=> $this->session->userdata('adminname'),	
					);
				}
				else
				{
					$data = array(
					'chPassword'    		=> base64_encode(sha1($this->input->post('txtPassword'),true)),
					'chLevel'				=> $level,
					'dtUpdateDate'			=> date('Y-m-d H:i:s'),
					'chUserUpdate'			=> $this->session->userdata('adminname'),	
					);
				}
				$this->model_user->update($this->input->post('inIDUser'),$data);
				redirect('user/'); 
			}
		}
		function delete($id)
		{
			$datacontent['url'] 		= "user/index";
			$datacontent['action'] 		= 'delete';
			$datacontent['data'] 		= $this->model_customer->get_member($id);
			$this->load->view('cmsadm/menu/user/delete',$datacontent);
		}
	
		function actiondelete($id)
		{
			$this->model_user->delete($id);
			redirect('user/');  
		} 
	}
?>