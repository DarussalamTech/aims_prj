<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Login extends CI_Controller {



    function __construct() {

        parent::__construct();



        $this->data['title_tag'] = WEBSITE_NAME2.'&reg; Login';

    }



    function index() {

       $this->load->helper('url');

		$this->data['base'] = base_url();





		 $this->load->model('account_model');



        // if already logged in, redirect to account/home

        if ($this->auth->try_session_login())

            redirect(base_url().'account/home'); 

        

        $this->load->helper('cookie');

        $this->data['remember_email'] = '';

        if (get_cookie('candacecourter_remember') != '') {

            $this->data['remember_email'] = get_cookie('candacecourter_remember');

        }

         

        // load a cookie and see if cookies are enabled in the callback. 

        // this is an issue with iphone that we're correcting

        set_cookie(array('name' => 'candacecourter_cookie', 'value' => 'hi', 'expire' => 60 * 60 * 24 * 365));



        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<p style="color:red;">', '</p>');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__check_login|callback__cookies_enabled');

        $this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric_dash_space_comma_period');



        if ($this->form_validation->run() == TRUE) {

            

            if ($this->input->post('rememberme') == 'true') {

                set_cookie(array('name' => 'candacecourter_remember', 'value' => $this->input->post('email'), 'expire' => 60 * 60 * 24 * 365));

            } else {

                delete_cookie("candacecourter_remember");

            }



            redirect(base_url().'account/home');  // go to my account page

        }



		

		$this->data['candace_title'] = 'Please Login'; 

		

		//$this->load->view('layouts/vanguard_h', $this->data);

		$this->load->view('account/login_view', $this->data);

		$this->load->view('layouts/vanguard_f');

    }

    

    function _cookies_enabled() {

        if (get_cookie('candacecourter_cookie') != 'hi') {

            $this->form_validation->set_message('_cookies_enabled', 'You do not have cookies enabled. Please enable cookies to log in.');

            return FALSE;

        } else {

            return TRUE;

        }

    }



    function _check_login($email) {

        $this->load->helper('security');

        $password = do_hash($this->input->post('password'), 'md5');

        if ($this->auth->try_login(array('email' => $email, 'password' => $password))) {

            return TRUE;

        } else {

            $this->form_validation->set_message('_check_login', 'Email and Password do not match.');

            return FALSE;

        }

    }



}



/* End of file */

?>