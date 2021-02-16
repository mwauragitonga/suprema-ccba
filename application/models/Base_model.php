<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Base_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
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
