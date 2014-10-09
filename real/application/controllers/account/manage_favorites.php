<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_favorites extends CI_Controller {

    function __construct() {
        parent::__construct();
        
		$this->load->helper('url');
        $this->load->helper('security');
		
        if (!$this->auth->try_session_login())
            redirect(base_url().'account/login');
    }

    public function index() {

		$this->load->helper('url');
		$this->data['base'] = base_url();
		$this->load->helper('property_image_helper');
		$this->load->model('account_model');		
		$this->load->model('User_favorite_model');

		$this->data['user_data'] = $this->account_model->get_user_data(get_field('id'));
		
		$this->data['user_favs'] = $this->User_favorite_model->get_favs(get_field('id'));
		
        $this->data['candace_title'] = 'Manage Favorites'; 
		
		$this->load->view('layouts/vanguard_h', $this->data);
		$this->load->view('account/manage_favorites', $this->data);
		$this->load->view('layouts/vanguard_f');
	
	}
	
	function save_cat_description($cat_id){
		 //echo $_GET['cat_description'];exit;
         $this->load->library('form_validation');
		 $this->load->model('User_favorite_model');
		 
		 $this->form_validation->set_rules('cat_description', 'Category Description', 'required|trim|xss_clean');				

		if ($this->form_validation->run()) {

			 $effected_row = $this->User_favorite_model->save_cat_description($cat_id);

			echo $effected_row;
		   
		} else {
			// Form Validation Failed...			
		  	echo 'Category description required.';
		}
		 
		exit;
			
	}
	

	function delete_category($cat_id){
		 $this->load->helper('url');
		 $this->load->model('User_favorite_model');
	
		 $result = $this->User_favorite_model->delete_category($cat_id);
		 echo $result;
		 exit;
		 //redirect(base_url().'/account/manage_favorites');
	}

	function save_fav_notes($fav_id){
         $this->load->library('form_validation');
		 $this->load->model('User_favorite_model');
		 
		 $this->form_validation->set_rules('fav_notes', 'Notes', 'required|trim|xss_clean');				

		if ($this->form_validation->run()) {

			 $effected_row = $this->User_favorite_model->save_fav_notes($fav_id);

			echo $effected_row;
		   
		} else {
			// Form Validation Failed...			
		  	echo 'Note is required.';
		}
		 
		exit;
	
	}
	
	function add_cat_name(){
         $this->load->library('form_validation');
		 $this->load->model('User_favorite_model');
		 
		 $this->form_validation->set_rules('cat_name', 'Category name', 'required|trim|xss_clean');				

		if ($this->form_validation->run()) {
			$result = $this->User_favorite_model->add_cat_name();
			echo $result;
		} else {
			// Form Validation Failed...			
		  	echo 0;
		}
		 
		exit;
	}
	
	function add_user_notes($mls_id){
		 $this->load->library('form_validation');
		 $this->load->model('User_favorite_model');
		 
		 $this->form_validation->set_rules('user_notes', 'Notes', 'required|trim|xss_clean');				

		if ($this->form_validation->run()) {

			$result = $this->User_favorite_model->add_user_notes($mls_id);

			echo $result;
		   
		} else {
			// Form Validation Failed...			
		  	echo 0;
		}
		 
		exit;
	}
	
	function save_user_favorite($mls_id){
		 $this->load->model('User_favorite_model');

		$result = $this->User_favorite_model->save_user_favorite($mls_id);
		if($result == 'Successfully added to favorites.'){
			// send email notification here to candace@candacecourter.com
			
			/*$property_url = base_url().'property-details/'.$mls_id;
			
			$body  = 'Hi, <br /><br />';
			$body .= 'A registered user has made a property favorite.<br /><br />';

			$body .= 'Name: '.get_field('first_name').' '.get_field('last_name'). '<br />';
			$body .= 'Email: '.get_field('email'). '<br />';
			$body .= 'Cell Phone: '.get_field('cell_phone'). '<br />';
			$body .= 'Home Phone: '.get_field('home_phone'). '<br /><br />';
			
			$body .= 'Favorite Property URL: '.$property_url. '<br /><br />';
			
			$body .= 'Regards,<br />';
			$body .= 'Web Admin<br /><br />';		
			
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
	
			$this->load->library('email');
			$this->email->initialize($config);
			
			$this->email->from('info@candacecourter.com','Web Admin');
			$this->email->to('candace@candacecourter.com'); 
			$this->email->subject('User favorite property');
			$this->email->message($body);
			$this->email->send();*/
		}
		echo $result;
		exit;
	}


}
?>