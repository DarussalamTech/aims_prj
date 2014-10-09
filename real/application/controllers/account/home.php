<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Home extends CI_Controller {



    function __construct() {

        parent::__construct();

        

		$this->load->helper('url');

        $this->load->helper('security');

		

        if (!$this->auth->try_session_login())

            redirect(base_url().'account/login');

    }



    public function index() {

		$this->data['base'] = base_url();

		

        $this->data['candace_title'] = 'Dashboard'; 

		

		$this->load->view('layouts/vanguard_h', $this->data);

		$this->load->view('account/home_view', $this->data);

		$this->load->view('layouts/vanguard_f');

    }



	public function edit_account(){

		$this->load->helper('url');

		$this->data['base'] = base_url();

		$this->load->model('account_model');

		

		$this->data['user_data'] = $this->account_model->get_user_data(get_field('id'));

		

		$this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');



        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha_dash_space');

        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha_dash_space');

		$pass = $this->input->post('password');

		if(!empty($pass)){

		    $this->form_validation->set_rules('password', 'Password', 'trim|alpha_numeric_dash_space_comma_period|min_length[6]');

		    $this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|required|callback__confirm_password');

		}

        

        if ($this->form_validation->run()) {



            $data = array(

                'last_name' => $this->input->post('last_name'),

                'first_name' => $this->input->post('first_name'),

                'country' => $this->input->post('country'),

                'address' => $this->input->post('address'),

                'city_town' => $this->input->post('city'),

                'state_province' => $this->input->post('state'),				

                'postcode' => $this->input->post('zip_code'),

                'cell_phone' => $this->input->post('cell_phone'),

                'home_phone' => $this->input->post('home_phone')

            );

			if(!empty($pass)){

				$data += array(

					 'password' => do_hash($this->input->post('password'), 'md5')

				);

			}

            

			// save user to database

            $this->data['result_msg'] = 'Your settings have been saved';

            $this->account_model->update(get_field('id'), 'users', $data);

           

        }

		

		

		

        $this->data['candace_title'] = 'Account Details'; 

		

		$this->load->view('layouts/vanguard_h', $this->data);

		$this->load->view('account/edit_account', $this->data);

		$this->load->view('layouts/vanguard_f');

	

	}



    function _confirm_password() {

        if ($this->input->post('password') == $this->input->post('repassword')) {

            return TRUE;

        } else {

            $this->form_validation->set_message('_confirm_password', 'Passwords do not match.');

            return FALSE;

        }

    }





}

?>