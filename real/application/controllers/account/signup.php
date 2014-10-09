<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Signup extends CI_Controller {



    function __construct() {

        parent::__construct();
        //Added to ensure user is not logged in.
        $this->auth->logout();
        $this->load->model('account_model');
        $this->load->helper('security');
        $this->load->helper('date');
        $this->data['title_tag'] = WEBSITE_NAME2.'&reg; Sign-up';

    }



	function index(){

		$this->load->helper('url');

		$this->data['base'] = base_url();

		

        if ($this->auth->try_session_login())

            redirect(base_url().'account/home');



        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');



        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha_dash_space');

        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha_dash_space');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__check_dupe_email');

        $this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric_dash_space_comma_period|min_length[6]');

        $this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|required|callback__confirm_password');

        

        if ($this->form_validation->run()) {



            /// new user default data

            $data = array(

                'email' => $this->input->post('email'),

                'password' => do_hash($this->input->post('password'), 'md5'),

                'last_name' => $this->input->post('last_name'),

                'first_name' => $this->input->post('first_name'),

                'created' => mdate("%Y-%m-%d %h:%i:%a", time()),

                'last_logged' => mdate("%Y-%m-%d %h:%i:%a", time()),

                'country' => $this->input->post('country'),

                'address' => $this->input->post('address'),

                'city_town' => $this->input->post('city'),

                'state_province' => $this->input->post('state'),				

                'postcode' => $this->input->post('zip_code'),

                'cell_phone' => $this->input->post('cell_phone'),

                'home_phone' => $this->input->post('home_phone')

            );



            // save new user to database

            $inserted_userID = $this->account_model->insert('users', $data);

           

		   

		   if(!empty($inserted_userID)){

				$this->new_user_registered_email($data);

		   }

		   

            // set the view

            $body_view = 'account/register_success_view';

            $this->data['candace_title'] = 'Registered Successfully'; 

            

        }

		

		if(empty($inserted_userID)){

			$body_view = 'account/signup';

			$this->data['candace_title'] = 'Sign Up'; 

		}



		$this->load->view('layouts/vanguard_h',$this->data);

		$this->load->view($body_view, $this->data);

		$this->load->view('layouts/vanguard_f');

    }



	function new_user_registered_email($data){

		

		$body  = 'Hi, <br /><br />';

		$body .= 'A new user is registered with candacecourter.com. <br /><br />';

		$body .= 'Name: '.$data['first_name'].' '.$data['last_name']. '<br />';

		$body .= 'Email: '.$data['email']. '<br /><br />';



		$body .= 'Country: '.$data['country']. '<br />';

		$body .= 'Address: '.$data['address']. '<br />';

		$body .= 'City/Town: '.$data['city_town']. '<br />';

		$body .= 'State/Province: '.$data['state_province']. '<br />';

		$body .= 'Postcode: '.$data['postcode']. '<br /><br />';



		$body .= 'Cell phone: '.$data['cell_phone']. '<br />';				

		$body .= 'Home phone: '.$data['home_phone']. '<br /><br />';

		

		$body .= 'Regards,<br />';

		$body .= 'Web Admin<br /><br />';

		

		$config['charset'] = "utf-8";

		$config['mailtype'] = "html";



		$this->load->library('email');

		$this->email->initialize($config);

		

		$this->email->from(WEBSITE_EMAIL,'Web Admin');

		$this->email->to(WEBSITE_EMAIL); 

		$this->email->subject('New user registered.');

		$this->email->message($body);

		$this->email->send();



	}



    function _check_dupe_email($email) {

        if ($this->account_model->check_dupe_email($email) > 0) {

            $this->form_validation->set_message('_check_dupe_email', 'Email Address Already Registered.');

            return FALSE;

        } else {

            return TRUE;

        }

    }





    function _confirm_password() {

        if ($this->input->post('password') == $this->input->post('repassword')) {

            return TRUE;

        } else {

            $this->form_validation->set_message('_confirm_password', 'Passwords do not match.');

            return FALSE;

        }

    }





    function _available_username($username) {

        if ($this->account_model->check_dupe_username($username) && $this->account_model->check_reserved_usernames($username)) {

            return TRUE;

        } else {

            $this->form_validation->set_message('_available_username', 'This username is not available. Try again.');

            return FALSE;

        }

    }

    

    function _is_numeric($username) {

        if (preg_match('[\d]', substr($username, 0, 1)) > 0) {

            $this->form_validation->set_message('_is_numeric', 'The username cannot start with a number. Please try again.');

            return false;

        } else {

            

            return true;

        }

    }



}



/* End of file */

?>