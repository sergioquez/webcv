<?php

class Cv_model extends CI_Model {
	var $id = '';
	var $name = '';
	var $last_name = '';
	var $birth_date = '';
	var $nationality = '';
	
	function __construct(){
	// Llamar al constructor de CI_Model
		parent::__construct();
	}
	
		
	function update($name = null, $last_name = null, $birth_date = null, $nationality = null)	{
		$this->$name = $name;
		$this->$last_name = $last_name;
		$this->$birth_date = $birth_date;
		$this->$nationality = $nationality;
		$this->db->update('cv', $this, array('id' => $this->$id));
	}
}
