<?php
	class Mekanik extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start(); 
			$this->load->model('model_mekanik');
			if(!$this->session->userdata('adminname'))
				redirect('auth');
		}
		
		function index()
		{
			$datacontent['url'] 			= "mekanik/index";
			$datacontent['mekanik'] 		= $this->model_mekanik->select();
			$this->load->view('cmsadm/menu/mekanik/index',$datacontent);
		}

		function add()
		{
			$datacontent['url'] 		= "mekanik/index";
			$datacontent['action'] 		= 'add';		
			$this->load->view('cmsadm/menu/mekanik/add',$datacontent);
		}

		function actionadd()
		{
			$status = $this->input->post('ckbJenisKelamin');
			if ($status == "on")
				$value = "Laki-Laki";
			else
				$value = "Perempuan";

			$data = array(
				'chNamaMekanik'    	=> $this->input->post('txtNamaMekanik'),
				'chPhone'    		=> $this->input->post('txtPhone'),
				'chAddress'    		=> $this->input->post('txtAddress'),
				'loJenisKelamin'    => $value,
				'dtCreateDate'		=> date('Y-m-d H:i:s'),
				'chUserCreate'		=> $this->session->userdata('adminname'),	
			);
			
			$this->model_mekanik->add($data);
			redirect('mekanik/');  
		}
		
		function edit($id)
		{
			$datacontent['url'] 		= "mekanik/index";
			$datacontent['action'] 		= 'edit';
			$datacontent['data'] 		= $this->model_mekanik->get_mekanik($id);

			$this->load->view('cmsadm/menu/mekanik/edit',$datacontent);
		}	
		
		function actionedit()
		{
			$status = $this->input->post('ckbJenisKelamin');
			if ($status == "on")
				$value = "Laki-Laki";
			else
				$value = "Perempuan";

			$data = array(
				'chNamaMekanik'    	=> $this->input->post('txtNamaMekanik'),
				'chPhone'    		=> $this->input->post('txtPhone'),
				'chAddress'    		=> $this->input->post('txtAddress'),
				'loJenisKelamin'    => $value,
				'dtUpdateDate'		=> date('Y-m-d H:i:s'),
				'chUserUpdate'		=> $this->session->userdata('adminname'),	
			);
			
			$this->model_mekanik->update($this->input->post('inIDMekanik'),$data);
			redirect('mekanik/'); 
		}
		function delete($id)
		{
			$datacontent['url'] 		= "mekanik/index";
			$datacontent['action'] 		= 'delete';
			$datacontent['data'] 		= $this->model_mekanik->get_member($id);
			$this->load->view('cmsadm/menu/mekanik/delete',$datacontent);
		}
	
		function actiondelete($id)
		{
			$this->model_mekanik->delete($id);
			redirect('mekanik/');  
		} 
	}
?>