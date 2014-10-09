<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     */
    public function index() {
        $this->load->helper('url');
        $data['base'] = base_url();
        $data['site'] = site_url();

        $this->load->database();
        $this->load->model('Adv_search_model');
        $data['total_count'] = $this->Adv_search_model->get_total_count();

        $this->load->view('advanced/search', $data);
    }

    function get_results_count() {
        $this->load->database();
        $this->load->model('Adv_search_model');

        $return['total_count'] = $this->Adv_search_model->get_total_count();
        if ($return['total_count'] != 'error') {
            $return['total_count'] = number_format($return['total_count'], 0, ".", ",");
        }
        echo json_encode($return);
    }

    public function changeType($type) {
        $this->load->helper('url');
        $data['base'] = base_url();
        $data['site'] = site_url();
        $type = strtolower($type);
        $this->load->view('advanced/' . $type, $data);
    }

    public function advance_search($limit = 15, $offset = 0) {
        $this->load->helper('url');
        $this->data['base'] = base_url();
        $this->data['search_form'] = 'AdvancedSearchForm';
        $this->load->database();

        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper('property_image_helper');
        $this->load->model('Adv_search_model');
        $latLong = '';

        $last = $this->uri->total_segments();

        $config['base_url'] = '';
        $config['per_page'] = 15;
        $config['anchor_class'] = 'class="pgn_search_results"';
        $config['uri_segment'] = $last;
        //$config['num_links'] = 5;
        //if ($this->form_validation->run()) {

        $this->data['total_rows'] = $config['total_rows'] = $this->Adv_search_model->get_data(1, $limit, $offset);
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $this->data['properties'] = $this->Adv_search_model->get_data(0, $limit, $offset);
        //var_dump($this->data['properties']); exit;
        $return['result'] = $this->load->view('advanced/search_results', $this->data, true);
        echo json_encode($return);
        /* } else {
          // Form Validation Failed...
          $return['status'] = 'error';
          $return['message'] = validation_errors();
          echo json_encode($return);
          } */
    }
    
    

    /**
     * live site 

     */
    public function simple_search($limit = 15, $offset = 0) {

        $this->load->helper('url');
        $this->data['base'] = base_url();
        $this->data['search_form'] = 'SimpleSearchForm';

        $this->load->database();

        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper('property_image_helper');
        $this->load->model('Adv_search_model');
        $latLong = '';

        $last = $this->uri->total_segments();

        $config['base_url'] = '';
        $config['per_page'] = 15;
        $config['anchor_class'] = 'class="pgn_search_results"';
        $config['uri_segment'] = $last;
        //$config['num_links'] = 5;

        $this->form_validation->set_rules('AddressAndLoc', 'location', 'trim|xss_clean');

        if ($this->form_validation->run()) {

            $this->data['total_rows'] = $config['total_rows'] = $test = $this->Adv_search_model->simple_get_data(1, $limit, $offset);
            //print_r($test);
            // exit();
            $this->pagination->initialize($config);
            $this->data['page_links'] = $this->pagination->create_links();

            $this->data['properties'] = $properties = $this->Adv_search_model->simple_get_data(0, $limit, $offset);
//			print_r($properties);
//			 exit();				
            $return['result'] = $this->load->view('advanced/search_results', $this->data, true);
            echo json_encode($return);
        } else {
            // Form Validation Failed...
            $return['status'] = 'error';
            $return['message'] = validation_errors();
            echo json_encode($return);
        }
    }

    /**
     * cron jobs
     * http://localhost/real/real-estate/search/insert_data_from_link
     *  www.bonniestrickland.com/dev/search/insert_data_from_link
     */
    public function insert_data_from_link($limit = 15, $offset = 0) {

        $this->load->helper('url');
        $this->data['base'] = base_url();
        $this->data['search_form'] = 'SimpleSearchForm';

        $this->load->database();

        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper('property_image_helper');
        $this->load->model('Adv_search_model');
        // $this->load->model('Image_url_model');


        $data = array();
        //    $sdata=array();
        $data['properties'] = $properties = $this->Adv_search_model->get_data_from_link(0, $limit, $offset);
//    echo '<pre>';
//      print_r($properties);
//      echo '</pre>';
//      exit();


        $saveAll = array();
        $save_img = array();
        foreach ($properties as $property_info) {

            $saveAll['sysid'] = $property_info->sysid;
            $saveAll['membership_id'] = $property_info->membership_id;
            $saveAll['49'] = $property_info->address;
            $saveAll['2302'] = $property_info->city_name;
            $saveAll['2304'] = $property_info->rets_state;
            $saveAll['46'] = $property_info->zip_code;
            $saveAll['32'] = $property_info->num_beds;
            $saveAll['2294'] = $property_info->num_fbaths;
            $saveAll['num_garage_spaces'] = $property_info->num_garage_spaces;
            $saveAll['176'] = $property_info->list_price;
            $saveAll['1'] = $property_info->property_type;
            $saveAll['sqft_liv_area'] = $property_info->sqft_liv_area;
            $saveAll['55'] = $property_info->year_built;
            $saveAll['175'] = $property_info->ml_num;
            $saveAll['178'] = $property_info->status;
            $saveAll['latitude'] = $property_info->latitude;
            $saveAll['longitude'] = $property_info->longitude;
            $saveAll['2497'] = $property_info->virtual_tour;
            $saveAll['2854'] = $property_info->unit_number;
            $saveAll['days_on_market '] = $property_info->days_on_market;
            $saveAll['distance'] = $property_info->distance;
            $saveAll['images'] = 1;

            $save_img['sysid'] = $property_info->sysid;
            $save_img['sequence'] = 1;
            $save_img['url'] = $property_info->first_image;



            $this->Adv_search_model->save_data_info($saveAll);
            $this->Adv_search_model->save_img_url($save_img);
            //$this->db->insert('rets_properties', $saveAll['sysid']);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */