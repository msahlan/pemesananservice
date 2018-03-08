<?php
	class model_closed extends CI_Model 
	{
		protected $_table = 'tserviceh';
		function __construct()
		{
			parent::__construct();
		}
		 
		function select()
	    {
			$this->db->select('*');
			$this->db->from('tserviceh');
			$this->db->join('mcustomer', 'tserviceh.inIDCustomer = mcustomer.inIDCustomer');
			$this->db->join('mjenisservice', 'tserviceh.inIDJenisService = mjenisservice.inIDJenisService');
			$this->db->where('loStatus', 'OnProgress');
			$query = $this->db->get();
			return $query->result_array();
		}

		function detail($id)
	    {
			$this->db->select('*');
			$this->db->from('tserviced');
			$this->db->join('msparepart', 'tserviced.inIDSparepart = msparepart.inIDSparepart');
			$this->db->join('tserviceh', 'tserviceh.chNoService = tserviced.chNoService');

			$this->db->where('tserviced.chNoService', $id);
			$query = $this->db->get();
			return $query->result_array();
		}

		function update($id, $data)
	    {
			$this->db->where('chNoService', $id);
			$this->db->update($this->_table, $data); 
		}
	}
?>
