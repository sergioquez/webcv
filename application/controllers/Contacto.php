<?php
class Contacto extends CI_Controller {

	public function enviar(){
		$nombre = $this->input->post('name');
		$email = $this->input->post('email');
		$mensaje = $this->input->post('message');
		$respuesta = $this->input->post('human');
		$this->load->helper('email');
		$this->load->helper('url');

		if (!empty($nombre) && valid_email($email) && !empty($mensaje) && intval($respuesta) === 5) {
			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'contacto.serquez@gmail.com',
			    'smtp_pass' => 'serquezzherho-1911',
			    'smtp_timeout' => '4',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);

			$this->email->set_newline("\r\n");

	        $this->email->from('contacto.serquez@gmail.com', 'contacto.serquez@gmail.com');
	        $this->email->to('squezada2b08@gmail.com'); 

	        $this->email->subject('[contacto]'.'['.$nombre.']');
	        $this->email->message($nombre.'<br>'.$email.'<br><br>'.$mensaje);  

	        $this->email->send();

	    }
	    redirect('/');
	}

}

