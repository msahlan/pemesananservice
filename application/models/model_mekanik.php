<?php
	class model_mekanik extends CI_Model 
	{
		protected $_table = 'mmekanik';
		function __construct()
		{
			parent::__construct();
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
		//$this->table untuk mengotomatiskan pemanggilan database
		function get_mekanik($categoryid)
		{
			$query   = $this->db->get_where($this->_table, array('inIDMekanik' => $categoryid));
			return $query->row_array();
		}

		function update($id, $data)
	    {
			$this->db->where('inIDMekanik', $id);
			$this->db->update($this->_table, $data); 
		}
		
		function delete($data)
		{
			$this->db->delete($this->_table, array('inIDMekanik' => $data)); 
		}

	}
?>
