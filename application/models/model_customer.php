<?php
	class model_customer extends CI_Model 
	{
		protected $_table = 'mcustomer';
		protected $_table2 = 'mcustmotor';
		protected $_table1 = 'muser';
		function __construct()
		{
			parent::__construct();
		}

		public function checkDuplicate($id) {
		    $this->db->select('chUsername');
		    $this->db->where('chUsername', $id);
		    $result = $this->db->get('muser');
		    return (bool) $result->num_rows();
		}

		public function checkDuplicatePhone($id) {
		    $this->db->select('chPhone');
		    $this->db->where('chPhone', $id);
		    $result = $this->db->get('mcustomer');
		    return (bool) $result->num_rows();
		}

		public function checkDuplicateMotor($id,$noplat) {
		    $this->db->select('chNoMotor');
		    $this->db->where('inIDCustomer', $id);
		    $this->db->where('chNoMotor', $noplat);
		    $result = $this->db->get('mcustmotor');
		    return (bool) $result->num_rows();
		}
		 
		function select($limit=100,$offset=0)
	    {
			$query = $this->db->get($this->_table, $limit, $offset);
			return $query->result_array();
		}

		function selectall($id="",$limit=100,$offset=0,$sort = array())
	    {
			if(! empty($sort))
            $this->db->order_by($sort['field']);
            $query = $this->db->get($this->_table, $limit, $offset);
			return $query->result_array();
		}
		
		function add($data)
	    {
	        $this->db->insert($this->_table, $data);
	    }

	    function motor($id)
	    {
			$this->db->select('*');
			$this->db->from('mcustomer');
			$this->db->join('mcustmotor', 'mcustomer.inIDCustomer = mcustmotor.inIDCustomer');

			$this->db->where('mcustmotor.inIDCustomer', $id);
			$query = $this->db->get();
			return $query->result_array();
		}

		function get_motor($id, $noplat)
	    {
			$this->db->select('*');
			$this->db->from('mcustomer');
			$this->db->join('mcustmotor', 'mcustomer.inIDCustomer = mcustmotor.inIDCustomer');

			$this->db->where('mcustmotor.inIDCustomer', $id);
			$this->db->where("replace(mcustmotor.chNoMotor, ' ','') = ", $noplat);
			$query = $this->db->get();
			return $query->row_array();
		}

	    function adddetail($data)
	    {
	        $this->db->insert($this->_table2, $data);
	    }

		function get_customer($categoryid)
		{
			$query   = $this->db->get_where($this->_table, array('inIDCustomer' => $categoryid));
			return $query->row_array();
		}

		function get_password($username)
		{
			$query   = $this->db->get_where($this->_table1, array('chUsername' => $username));
			return $query->row_array();
		}

		function update($id, $data)
	    {
			$this->db->where('inIDCustomer', $id);
			$this->db->update($this->_table, $data); 
		}

		function updatebyiduser($id, $data)
	    {
			$this->db->where('inIDUser', $id);
			$this->db->update($this->_table, $data); 
		}

		function updatedetail($id, $idmotor, $data)
	    {
			$this->db->where('inIDCustomer',$id);
			$this->db->where("replace(chNoMotor, ' ','') = ", $idmotor);
			$this->db->update($this->_table2, $data); 
		}
		
		function delete($data)
		{
			$this->db->delete($this->_table, array('inIDCustomer' => $data)); 
		}

		function maxid()
		{
			$query = $this->db->query("SELECT MAX(inIDCustomer) as max_id FROM mcustomer"); 
		  	$row = $query->row_array();
		  	$max_id = $row['max_id'];
		  	return $max_id; 	
		}
	}
?>
