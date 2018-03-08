<?php
	class Administrator extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start(); 
			$this->load->model('cmsadm/model_leveluser');
			if(!$this->session->userdata('adminname'))
				redirect('cmsadm/auth');
		}
		
		function index()
		{
			$datacontent['url'] 			= "cmsadm/administrator/index";
			$datacontent['administrator'] 	= $this->model_administrator->select();
			$this->load->view('cmsadm/menu/administrator/index',$datacontent);
		}

		function add()
		{
			$datacontent['url'] 		= "cmsadm/administrator/index";
			$datacontent['action'] 		= 'add';
			$level = get_combobox("SELECT inLevel, chLevel from mlevel order by chLevel asc", "inLevel", "chLevel","Pilih Level");
			/*$datacontent['level'] 	= $this->model_leveluser->select();		*/
			$datacontent = array('level' => $level);
			$this->load->view('cmsadm/menu/administrator/add',$datacontent);
		}

		function actionadd()
		{
			$password = md5($this->input->post('txtPassword'));
			$data = array(
				'chUsername'    		=> $this->input->post('txtUsername'),
				'chPassword'    		=> $password,
				'inLevel'    			=> $this->input->post('cmbLevel'),
				'dtCreateDate'			=> date('Y-m-d H:i:s'),
				'dtCreateUser'			=> $this->session->userdata('adminname'),	

			);
			
			$this->model_administrator->add($data);
			redirect('cmsadm/administrator/');  
		}
		
		function edit($id)
		{
			$datacontent['url'] 		= "cmsadm/administrator/index";
			$datacontent['action'] 		= 'edit';
			/*$datacontent['level'] 		= $this->model_leveluser->select();*/
			$level = get_combobox("SELECT inLevel, chLevel from mlevel order by chLevel asc", "inLevel", "chLevel","Pilih Level");
			$datacontent = array('level' => $level);
			$datacontent['data'] 		= $this->model_administrator->get_administrator($id);

			$this->load->view('cmsadm/menu/administrator/edit',$datacontent);
		}	
		
		function actionedit()
		{
			$password = md5($this->input->post('txtPassword'));
			$data = array(
				'chPassword'    	=> $password,
				'inLevel'    		=> $this->input->post('cmbLevel'),
				'dtUpdateDate'		=> date('Y-m-d H:i:s'),
				'dtUpdateUser'		=> $this->session->userdata('adminname'),	
			);
			$this->model_administrator->update($this->input->post('inIDUser'),$data);
			redirect('cmsadm/administrator/'); 
		}

		function delete($id)
		{
			$datacontent['url'] = "administrator/index";
			$datacontent['action'] 		= 'delete';
			$datacontent['data'] 		= $this->model_administrator->get_administrator($id);
			$this->load->view('cmsadm/menu/administrator/delete',$datacontent);
		}
	
		function actiondelete($id)
		{
			$this->model_administrator->delete($id);
			redirect('cmsadm/administrator/');  
		} 
	}
?>