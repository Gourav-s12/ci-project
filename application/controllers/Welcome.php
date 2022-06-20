<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->helper("form");
		$this->load->view('home');
	}
	public function sendemail()
	{
		$this->load->helper("form");

		$this->load->library('form_validation');
			
         /* Set validation rule for fields in the form */ 
        $this->form_validation->set_rules('name', 'Name', 'required'); 
		$this->form_validation->set_rules('subject', 'Subject', 'required'); 
		$this->form_validation->set_rules('msg', 'Message', 'required'); 
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) { 
			//echo "validation error";
			$this->load->view('home'); 
		}else{ 

			$from_email = "raynona00@gmail.com"; 
			$to_email = $this->input->post('email');
			$name = $this->input->post('name');
			$subject = $this->input->post('subject');
			$msg = $this->input->post('msg');
			//Load email library 
			$this->load->library('email'); 
			echo $to_email;

			$this->email->from($from_email, $name); 
			$this->email->to($to_email);
			$this->email->subject($subject); 
			$this->email->message($msg); 
			$this->email->set_newline("\r\n");
			//$this->email->send();

			//Send mail 
			if($this->email->send()) 
				echo '<script>alert("Email has been sent Successfully!");</script>';
			else 
				//show_error($this->email->print_debugger());
				echo '<script>alert("Email couldn\'t be sent , Your server might not be configured to send mail!");</script>';
			redirect('/', 'refresh');
		}
	}
}
