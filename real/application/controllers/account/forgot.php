<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Forgot extends CI_Controller {



    function __construct() {

        parent::__construct();



        $this->load->model('account_model');

		$this->load->helper('url');
 
		

    }



    function index($hash = null) {

        $this->load->helper('security');
		 
		if (isset($hash)) {


			

            // hash present

            // check if it's a valid hash

            if ($this->account_model->check_forgot_password_hash($hash) > 0) {

                $newpass = $this->_get_random_password();

                // save to database
                $this->account_model->update_password(

					$this->account_model->get_email_from_hash($hash)->email, array('password' => do_hash($newpass, 'md5'))

                );

				

                // send email

                $this->data['to'] = $this->account_model->get_email_from_hash($hash)->email;
 	            $this->data['newpass'] = $newpass;

				$message = $this->load->view('emails/forgot_password_changed_email_view', $this->data, TRUE);
				$email_to = $this->data['to'];				  	
				$email_from = 'nasir.lahore@gmail.com';
				$email_subject = 'New Password for ';
				
				$email_sent = $this->send_email($email_subject,$email_from,$email_to,$message);
				if($email_sent){

					$bodyView = 'account/forgot_email_sent_view';

				}else{
						
					$this->data['email_error'] = $this->email->print_debugger();

					$bodyView = 'account/forgot_password_view';

				}

                $bodyView = 'account/forgot_password_changed_view';

            } else {

                // not a valid hash

											
			//dummy view		
               $bodyView = 'account/forgot_bad_hash_view';

            }

        } else {

  
			$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters('<span style="color:red;font-weight:bold;">', '</span>');

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__check_email');

	

			// test for validation

			if ($this->form_validation->run() == FALSE) {

				// validation fails

	

				$bodyView = 'account/forgot_password_view';

 
			} else {
				
		 		//Send Email Change request
				$email_to = $this->input->post('email');
				$message = $this->load->view('emails/forgot_password_request_email_view', $email_to, TRUE);			
				$email_from = 'nasir.lahore@gmail.com';
				$email_subject = ' Change Password Request';
				
				$email_sent = $this->send_email($email_subject,$email_from,$email_to,$message);
 

				if($email_sent){
	
					$bodyView = 'account/forgot_email_sent_view';
	
				}else{
	
					$this->data['email_error'] = $this->email->print_debugger();
	
					$bodyView = 'account/forgot_password_view';
	
				}

			}

		}

	

		$this->data['base'] = base_url();

		$this->data['candace_title'] = 'Recover Password'; 

		 

        $this->load->view('layouts/vanguard_h', $this->data);

		$this->load->view($bodyView, $this->data);

		$this->load->view('layouts/vanguard_f');

    }


	function send_email($email_subject,$email_from,$email_to,$message){
		   
				$config['charset'] = "utf-8";
				$config['mailtype'] = "html";
				$this->load->library('email');
				
				$this->email->initialize($config);	
				$this->email->set_newline("\r\n");
				$this->email->subject($email_subject.WEBSITE_NAME);
				$this->email->from($email_from, WEBSITE_NAME);
				$this->email->to($email_to); 
				$this->email->message($message);
				return $this->email->send();
				
			}


	function test_send_email(){

	    $config = Array(

		  'protocol' => 'smtp',

		  'smtp_host' => 'ssl://smtp.googlemail.com',

		  'smtp_port' => 465,

		  'smtp_user' => 'nasir.lahore@gmail.com', // change it to yours

		  'smtp_pass' => 'xxx', // change it to yours

		  'mailtype' => 'html',

		  'charset' => 'iso-8859-1',

		  'wordwrap' => TRUE

		);

		

		$message = ' asdfj ;asdf a;sd fja;sd jfk;sad kfj;asdlkf';

		$this->load->library('email', $config);

		$this->email->set_newline("\r\n");

		$this->email->from('nasir.lahore@gmail.com'); // change it to yours

		$this->email->to('coderhut@gmail.com');// change it to yours

		$this->email->subject('Resume from JobsBuddy for your Job posting');

		$this->email->message($message);

		if($this->email->send())

		{

			echo 'Email sent.';

		}

		else

		{

			show_error($this->email->print_debugger());

		}

		exit;

	

	}





    function _get_random_password() {

        $password_length = 8;



        $alfa = "23456789qwertyuopasdfghjkzxcvbnmQWERTYUPASDFGHJKLZXCVBNM";

        $token = "";

        for ($i = 0; $i < $password_length; $i++) {

            $token .= $alfa[rand(0, strlen($alfa) - 1)];

        }

        return $token;

    }



    function _check_email($email) {

        if ($this->account_model->check_dupe_email($email) > 0) {

            return TRUE;

        } else {

            $this->form_validation->set_message('_check_email', 'Not a valid Email Address.');

            return FALSE;

        }

    }



}



/* End of file */