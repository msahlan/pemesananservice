<?php
	class Customer extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start(); 
			if(!$this->session->userdata('adminname'))
				redirect('auth');
			$this->load->model('model_customer');
			$this->load->model('model_user');
			$this->load->library('form_validation');
		}
		
		function index()
		{
			$datacontent['url'] 			= "customer/index";
			$datacontent['customer'] 		= $this->model_customer->select();
			$this->load->view('cmsadm/menu/customer/index',$datacontent);
		}

		function motor($id)
		{
			$datacontent['inIDCustomer'] 		= $id;
			$datacontent['url'] 				= "customer/index";
			$datacontent['motor'] 				= $this->model_customer->motor($id);
			$this->load->view('cmsadm/menu/customer/motor',$datacontent);
		}

		function add()
		{
			$datacontent['url'] 			= "customer/index";
			$datacontent['action'] 			= 'add';	
			$datacontent['reset'] 			= true;
			$datacontent['chUsername'] 		= $this->input->post('txtUsername');	
			$datacontent['chCustomerName'] 	= $this->input->post('txtNamaCustomer');
			$datacontent['chAddress'] 		= $this->input->post('txtAddress');
			$datacontent['chPhone'] 		= $this->input->post('txtPhone');
			$datacontent['chEmail'] 		= $this->input->post('txtEmail');
			$datacontent['loJenisKelamin'] 	= $this->input->post('ckbJenisKelamin');
			$this->load->view('cmsadm/menu/customer/add',$datacontent);
		}

		function addmotor($id)
		{
			$datacontent['reset'] 					= true;
			$datacontent['url'] 					= "customer/index";
			$datacontent['inIDCustomer'] 		    = $id;
			$datacontent['data'] 					= $this->model_customer->get_customer($id);
			$datacontent['action'] 					= 'add';	
			$datacontent['chCustomerName'] 			= $this->input->post('txtNamaCustomer');	
			$datacontent['chJenisMotor'] 			= $this->input->post('txtJenisMotor');
			$datacontent['chNoMotor'] 				= $this->input->post('txtPlatNomor');	
			$this->load->view('cmsadm/menu/customer/addmotor',$datacontent);
		}

		public function check_duplicate() {
		    return $this->model_customer->checkDuplicate($this->input->post('txtUsername')) == false;
		}

		public function check_duplicate_phone() {
		    return $this->model_customer->checkDuplicatePhone($this->input->post('txtPhone')) == false;
		}

		public function check_duplicate_motor() {
		    return $this->model_customer->checkDuplicateMotor($this->input->post('inIDCustomer'),
		    	$this->input->post('txtPlatNomor')) == false;
		}

		function actionadd()
		{
		 	$this->form_validation->set_rules('chUsername', 'Username', 'callback_check_duplicate');
    		$this->form_validation->set_message('check_duplicate', 'Username already exists');
    		$this->form_validation->set_rules('chPhone', 'Phone', 'callback_check_duplicate_phone');
    		$this->form_validation->set_message('check_duplicate_phone', 'Phone already exists');

		    if ($this->form_validation->run()) {
				$status = $this->input->post('ckbJenisKelamin');
				if ($status == "on")
					$value = "Laki-Laki";
				else
					$value = "Perempuan";
				
				$data = array(
					'chCustomerName'    	=> $this->input->post('txtNamaCustomer'),
					'chAddress'    			=> $this->input->post('txtAddress'),
					'chPhone'    			=> $this->input->post('txtPhone'),
					'loJenisKelamin'    	=> $value,
					'chUsername'    		=> $this->input->post('txtUsername'),
					'chEmail' 		   		=> $this->input->post('txtEmail'),
					'dtCreateDate'			=> date('Y-m-d H:i:s'),
					'chUserCreate'			=> $this->session->userdata('adminname'),	
				);

				$dataUser = array(
					'chUsername'    		=> $this->input->post('txtUsername'),
					'chPassword'    		=> base64_encode(sha1($this->input->post('txtPassword'),true)),
					'chLevel'    			=> 'Customer',
					'dtCreateDate'			=> date('Y-m-d H:i:s'),
					'chUserCreate'			=> $this->session->userdata('adminname'),	
				);
				
				$this->model_customer->add($data);
				$this->model_user->add($dataUser);

				//Update inIDUser
				$max = $this->model_customer->maxid();
				$datacontent['data'] = $this->model_user->get_user($this->input->post('txtUsername'));
				$data = array(
					'inIDUser'    	=> $datacontent['data']['inIDUser'],
				);
				$this->model_customer->update($max,$data);
				//-----------------------------------------------------------------------
				redirect('customer/');  
			}
			else
			{
				$data['reset'] 				= FALSE;
				$data['chUsername'] 		= $this->input->post('txtUsername');	
				$data['chCustomerName'] 	= $this->input->post('txtNamaCustomer');
				$data['chAddress'] 			= $this->input->post('txtAddress');
				$data['chEmail'] 			= $this->input->post('txtEmail');
				$data['chPhone'] 			= $this->input->post('txtPhone');
				$data['loJenisKelamin'] 	= $this->input->post('ckbJenisKelamin');
				$this->load->view('cmsadm/menu/customer/add',$data);
			}
		}

		function actionaddmotor($id)
		{
			$this->form_validation->set_rules('chNoMotor', 'No Motor', 'callback_check_duplicate_motor');
    		$this->form_validation->set_message('check_duplicate_motor', 'Plat Nomor already exists');

    		if ($this->form_validation->run()) {

				$data = array(
					'inIDCustomer'       	=> $id,
					'chNoMotor'    			=> $this->input->post('txtPlatNomor'),
					'chJenisMotor'    		=> $this->input->post('txtJenisMotor'),
					'dtCreateDate'			=> date('Y-m-d H:i:s'),
					'chUserCreate'			=> $this->session->userdata('adminname'),	
				);
				
				$this->model_customer->adddetail($data);
				redirect('customer/motor/'.$id);  
			}
			else
			{
				$data['inIDCustomer'] 			= $this->input->post('inIDCustomer');
				$data['reset'] 					= FALSE;
				$data['chCustomerName'] 		= $this->input->post('txtNamaCustomer');	
				$data['chJenisMotor'] 			= $this->input->post('txtJenisMotor');
				$data['chNoMotor'] 				= $this->input->post('txtPlatNomor');	
				$this->load->view('cmsadm/menu/customer/addmotor',$data);
			}
		}
		
		function edit($id)
		{
			$datacontent['url'] 		= "customer/index";
			$datacontent['action'] 		= 'edit';
			$datacontent['data'] 		= $this->model_customer->get_customer($id);
			$datacontent['dataUser'] 	= $this->model_customer->get_password($datacontent['data']['chUsername']);
			$this->load->view('cmsadm/menu/customer/edit',$datacontent);
		}	

		function editmotor($id,$noplat)
		{
			$datacontent['url'] 			= "customer/index";
			$datacontent['action'] 			= 'edit';
			$datacontent['inIDCustomer'] 	= $id;
			$datacontent['chNoMotorParam'] 	= $noplat;
			$datacontent['reset'] 			= true;
			$datacontent['chCustomerName'] 	= $this->input->post('txtNamaCustomer');	
			$datacontent['chJenisMotor'] 	= $this->input->post('txtJenisMotor');
			$datacontent['chNoMotor'] 		= $this->input->post('txtPlatNomor');	
			$datacontent['data'] 			= $this->model_customer->get_motor($id,$noplat);
			$datacontent['dataCust'] 		= $this->model_customer->get_customer($id);
			$this->load->view('cmsadm/menu/customer/editmotor',$datacontent);
		}	
		
		function actionedit()
		{
			/*if ($phone != $this->input->post('txtPhone'))
			{
				$this->form_validation->set_rules('chPhone', 'Phone', 'callback_check_duplicate_phone';
	    		$this->form_validation->set_message('check_duplicate_phone', 'Phone already exists');
    		}*/
			$status = $this->input->post('ckbJenisKelamin');
			if ($status == "on")
				$value = "Laki-Laki";
			else
				$value = "Perempuan";

			$data = array(
				'chCustomerName'    	=> $this->input->post('txtNamaCustomer'),
				'chAddress'    			=> $this->input->post('txtAddress'),
				'chPhone'    			=> $this->input->post('txtPhone'),
				'chEmail'    			=> $this->input->post('txtEmail'),
				'loJenisKelamin'    	=> $value,
				'dtUpdateDate'			=> date('Y-m-d H:i:s'),
				'chUserUpdate'			=> $this->session->userdata('adminname'),	
			);
			
			$this->model_customer->update($this->input->post('inIDCustomer'),$data);
			redirect('customer/'); 
		}

		function actioneditmotor($id,$noplat)
		{
			if ($noplat != str_replace(' ', '', $this->input->post('txtPlatNomor')))
			{
				$this->form_validation->set_rules('chNoMotor', 'No Motor', 'callback_check_duplicate_motor');
	    		$this->form_validation->set_message('check_duplicate_motor', 'Plat Nomor already exists');

	    		if ($this->form_validation->run()) {

					$data = array(
						'inIDCustomer'       	=> $id,
						'chNoMotor'    			=> $this->input->post('txtPlatNomor'),
						'chJenisMotor'    		=> $this->input->post('txtJenisMotor'),
						'dtUpdateDate'			=> date('Y-m-d H:i:s'),
						'chUserUpdate'			=> $this->session->userdata('adminname'),		
					);
					$this->model_customer->updatedetail($id,$noplat,$data);
					redirect('customer/motor/'.$id);  
				}
				else
				{
					$data['inIDCustomer'] 			= $this->input->post('inIDCustomer');
					$data['reset'] 					= FALSE;
					$data['chNoMotorParam'] 		= $noplat;
					$data['chCustomerName'] 		= $this->input->post('txtNamaCustomer');	
					$data['chJenisMotor'] 			= $this->input->post('txtJenisMotor');
					$data['chNoMotor'] 				= $this->input->post('txtPlatNomor');	
					$data['dataCust'] 		= $this->model_customer->get_customer($id);
					$this->load->view('cmsadm/menu/customer/editmotor',$data);
				}
			}
			else
			{
				$data = array(
					'inIDCustomer'       	=> $id,
					'chJenisMotor'    		=> $this->input->post('txtJenisMotor'),
					'dtUpdateDate'			=> date('Y-m-d H:i:s'),
					'chUserUpdate'			=> $this->session->userdata('adminname'),		
				);
				$this->model_customer->updatedetail($id,$noplat,$data);
				redirect('customer/motor/'.$id);  
			}
		}

		function delete($id)
		{
			$datacontent['url'] 		= "customer/index";
			$datacontent['action'] 		= 'delete';
			$datacontent['data'] 		= $this->model_customer->get_member($id);
			$this->load->view('cmsadm/menu/customer/delete',$datacontent);
		}
	
		function actiondelete($id)
		{
			$this->model_customer->delete($id);
			redirect('customer/');  
		} 

		function getmotor($idcustomer)
	    {
            $query = get_combobox("select chNoMotor from mcustmotor where inIDCustomer = $idcustomer order by chNoMotor asc", "chNoMotor", "chNoMotor");
            echo "<option value=''>Pilih Motor</option>";
            foreach ($query as $key => $value) {
                echo "<option value='{$key}'>$value</option>";
            }
	    }

	   /* function getmotor($idcustomer)
	    {
	        $datacontent['data'] 		= $this->model_customer->motor($idcustomer);
	        echo $datacontent["data"]["inStock"];
	    }*/
	}
?>