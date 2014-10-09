<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class schedule extends CI_Controller {



	/**

	* Index Page for this controller.

	*

	*/



	function index(){

		$this->load->helper('url');

		$data['base'] = base_url();

		$this->load->view('mixed/schedule_a_showing',$data);

	}

	

	function sendemail(){



		$first_name = $this->input->post('first_name');

		$last_name = $this->input->post('last_name');

		$email = $this->input->post('email');

		$phone = $this->input->post('home_phone');

		$date = $this->input->post('date');

		$time = $this->input->post('hour').':'.$this->input->post('minutes').' '.$this->input->post('meridian');



		$property_url = $this->input->post('property_url');

		$mls_id = $this->input->post('mls_id');

		$address = $this->input->post('full_address');				



		$message = $this->input->post('message');



		

		$body  = 'Hi, <br /><br />';

		$body .= 'Customer sent a request to view property. <br /><br />';

		$body .= 'Name: '.$first_name.' '.$last_name. '<br />';

		$body .= 'Email: '.$email. '<br />';

		$body .= 'Phone: '.$phone. '<br />';

		$body .= 'Date: '.$date. '<br />';

		$body .= 'Time: '.$time. '<br /><br />';

		

		$body .= 'Property URL: '.$property_url. '<br />';

		$body .= 'MLS ID: '.$mls_id. '<br />';

		$body .= 'Property Address: '.$address. '<br /><br />';				

		

		$body .= 'Message: '.$message. '<br /><br />';

		

		$body .= 'Regards,<br />';

		$body .= 'Web Admin<br /><br />';		


		//echo $body; exit;
		

		$config['charset'] = "utf-8";

		$config['mailtype'] = "html";



		$this->load->library('email');

		$this->email->initialize($config);

		

		$this->email->from($email, $first_name.' '.$last_name);

		$this->email->to(WEBSITE_EMAIL); 

		$this->email->subject('Schedule a showing');

		$this->email->message($body);

		

		$result['message'] = 'error';

		if($this->email->send()){

			$result['message'] = 'success';

		}

		echo json_encode($result);

		exit;

	}

	

	function sendemail_tester(){

		$body = 'Customer sent a request to view property. <br />';

		$body .= 'Customer sent a request to view property. <br />';

		$body .= 'Customer sent a request to view <a href="#">property</a>. <br />';				

		

		$config['charset'] = "utf-8";

		$config['mailtype'] = "html";



		$this->load->library('email');

		$this->email->initialize($config);

		

		$this->email->from('nasir.lahore@gmail.com', 'nasir hussain');

		$this->email->to('coderhut@gmail.com');

		

		$this->email->subject('Email Test');

		$this->email->message($body);

		

		$this->email->send();

		

		echo $this->email->print_debugger();



		exit;		

	}

	

	

}

?>