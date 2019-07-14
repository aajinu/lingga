<?php

class M_data extends CI_Model{

	function tampil_data($table){
		return $this->db->get($table);
	}

	function order_by($table,$y1,$y2){
		$this->db->from($table);
		$this->db->order_by($y1, $y2);
		return $this->db->get();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function select_where($where,$table){
		return $this->db->get_where($table,$where);
	}

	function edit_data($where,$table){
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

	function get_admin($username)
	{
    return $this->db->query("select * from admin where username = '$username' or email = '$username'");
	}
	
	function get_user2($username)
	{
    return $this->db->query("select * from user where (username = '$username' or email = '$username') and level ='user' ");
  }

    function produk1()
	{
		return $this->db->query("select * from produk_sementara order by id_produk_sementara limit 1");
	}
}
