<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {


    function __construct() {
        parent::__construct();
        


        $this->load->model('account_model');
        $this->load->helper('security');
        $this->load->helper('date');

    }

	function index(){
	
		$this->load->helper('url');
		$this->data['base'] = base_url();
	
		$this->load->view('layouts/vanguard_h');	
		$this->load->view('account/home_view', $this->data);
		$this->load->view('layouts/vanguard_f');
	}
	

}
?>