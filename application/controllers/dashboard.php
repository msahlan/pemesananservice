<?php
	class Dashboard extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start(); 
			if(!$this->session->userdata('adminname'))
				redirect('auth');
		}
		
		function index()
		{
			$this->load->view('cmsadm/menu/dashboard/index');
		}
	}
?>