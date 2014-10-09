<?php 

    if (!defined('BASEPATH')) exit('No direct script access allowed.');

    /**
     * Generates property image markup
     *
     * @access  public
     * @param   sysId  description
     * @return  type
     */
    function show_property_image($sysId,$style = ''){
        $CI = & get_instance();
        $CI->load->model('Image_url_model');

        $image = $CI->Image_url_model->get_first_image($sysId);
		$CI->load->helper('url');
		
		$base = base_url();
		
		if(!empty($image)){ 
           $html = "<img src='$image' rel='nofollow' $style>";
		}else{ 
           $html = "<img src='$base/img/default_property.png' $style>";
		}
		

        echo $html;
    }
