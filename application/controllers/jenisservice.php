<?php
	class Jenisservice extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start(); 
			$this->load->model('model_jenisservice');
			$this->load->model('model_service');
			if(!$this->session->userdata('adminname'))
				redirect('auth');
		}
		
		function index()
		{
			$datacontent['url'] 			= "jenisservice/index";
			$datacontent['jenisservice'] 	= $this->model_jenisservice->select();
			$this->load->view('cmsadm/menu/jenisservice/index',$datacontent);
		}

		function add()
		{
			$datacontent['url'] 		= "jenisservice/index";
			$datacontent['action'] 		= 'add';		
			$this->load->view('cmsadm/menu/jenisservice/add',$datacontent);
		}

		function actionadd()
		{
			$data = array(
				'chJenisService'    => $this->input->post('txtJenisService'),
				'inHargaBooking'    => $this->input->post('txtHargaBooking'),
				'inHarga'           => $this->input->post('txtHarga'),
				'dtCreateDate'		=> date('Y-m-d H:i:s'),
				'chUserCreate'		=> $this->session->userdata('adminname'),	
			);
			
			$this->model_jenisservice->add($data);
			redirect('jenisservice/');  
		}
		
		function edit($id)
		{
			$datacontent['url'] 		= "jenisservice/index";
			$datacontent['action'] 		= 'edit';
			$datacontent['data'] 		= $this->model_jenisservice->get_jenisservice($id);

			$this->load->view('cmsadm/menu/jenisservice/edit',$datacontent);
		}	
		
		function actionedit()
		{
			$data = array(
				'chJenisService'    => $this->input->post('txtJenisService'),
				'inHargaBooking'    => $this->input->post('txtHargaBooking'),
				'inHarga'           => $this->input->post('txtHarga'),
				'dtUpdateDate'		=> date('Y-m-d H:i:s'),
				'chUserUpdate'		=> $this->session->userdata('adminname'),	
			);
			
			$this->model_jenisservice->update($this->input->post('inIDJenisService'),$data);
			redirect('jenisservice/'); 
		}
		function delete($id)
		{
			$datacontent['url'] 		= "jenisservice/index";
			$datacontent['action'] 		= 'delete';
			$datacontent['data'] 		= $this->model_jenisservice->get_member($id);
			$this->load->view('cmsadm/menu/jenisservice/delete',$datacontent);
		}
	
		function actiondelete($id)
		{
			$this->model_jenisservice->delete($id);
			redirect('jenisservice/');  
		} 

		function getHarga($noservice, $id)
	    {
	        $dataService 		= $this->model_service->get_service($noservice);
	        $dataJenis	 		= $this->model_jenisservice->get_jenisservice($id);
	        if ($dataService["0"]["loType"] == 'Offline')
	        	echo $dataJenis["inHarga"];
	        else
				echo $dataJenis["inHargaBooking"];
	    }

	    function getHargaOffline($id)
	    {
	        $datacontent['data'] 		= $this->model_jenisservice->get_jenisservice($id);
        	echo $datacontent["data"]["inHarga"];
	    }
	}
?>