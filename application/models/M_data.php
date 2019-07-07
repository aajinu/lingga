<?php 

class M_data extends CI_Model{

	function tampil_data($table){
		return $this->db->get($table);
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function select_where($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
}