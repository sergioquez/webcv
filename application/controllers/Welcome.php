<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()	{
		$query = $this->db->get('cv');
		$row = $query->row_array();

		$d1 = new DateTime($row['birth_date']);
		$d2 = new DateTime(date("Y-m-d H:i:s"));
		$diff = $d2->diff($d1);

		$data = array(
				'nombre'	=> ($row['name'] . ' ' . $row['last_name']),
				'edad'		=> ($diff->y),
				'presentacion'	=> $row['presentation']
			);

		$this->load->helper('url');
		$this->load->template('welcome_message', $data);
	}
}
