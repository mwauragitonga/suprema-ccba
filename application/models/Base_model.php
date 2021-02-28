<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Base_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function login_validation($username, $password){
		$this->db->select('user_id, username, password, last_seen');
		$this->db->from('users');
		$this->db->where('username',$username);
		$result =$this->db->get()->row();
		if(empty($result)){
			//this is to prevent errors  when the username is not found
			'Wamlambez';
			return false;

		}else{
			$hashed=$result->password;
		}
		if(!empty($result)){
			if ($this->bcrypt->compare($password, $hashed)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function getUserDetails($username){
		$this->db->select('user_id,username, password, user_type, gender, last_seen');
		$this->db->from('users');
		$this->db->where('username',$username);
		$result =$this->db->get()->row();
		return$result;
	}
	public function getMealTimes(){
		$this->db->select('*');
		$this->db->from('meal_times');
		$query = $this->db->get();
		$data =$query->result();
		return $data;
	}
	public function updateBFast($data, $id){
		$this->db->where("ID", $id);
		if($this->db->update("meal_times", $data)){
			return true;
		}else{
			return false;
		}


	}
	public function updateLNT($data, $id){
		$this->db->where("ID", $id);
		if($this->db->update("meal_times", $data)){
			return true;
		}else{
			return false;
		}


	}
	public function updateLunch($data, $id){
		$this->db->where("ID", $id);
		if($this->db->update("meal_times", $data)){
			return true;
		}else{
			return false;
		}


	}
	public function updateDinner($data, $id){
		$this->db->where("ID", $id);
		if($this->db->update("meal_times", $data)){
			return true;
		}else{
			return false;
		}


	}


}
