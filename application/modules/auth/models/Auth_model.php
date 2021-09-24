<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	 public function login($username,$password)
	 {
		$result = $this->db->get_where('akun',['username'=> $username]);
		if($result->num_rows() == 1 and password_verify($password,$result->row('password')))
		{
			return true;
		}else
		{
			return false;
		}
		
	 }
	 public function username_check($username)
	 {
		 $result = $this->db->get_where('akun',['username'=>$username])->num_rows();
		 if($result == 1)
		 {
			 return true;
		 }else
		 {
			 return false;
		 }
	 }
	
	function get($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get()->result();
	}
	function delete($idt,$id,$table)
	{
		$this->db->where($idt,$id);
		return $this->db->delete($table);

	}
	function insert($table,$data)
	{
		return $this->db->insert($table,$data);
	}
	function getid($idtbl,$id,$table)
	{
		return $this->db->get_where($table,[$idtbl=>$id])->row();
	}
	function update($data,$idtbl,$id,$table)
	{
		$this->db->set($data);
		$this->db->where($idtbl,$id);
		return $this->db->update($table);
	}

	}
?>