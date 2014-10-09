<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class contact extends CI_Controller {



	/**

	* Index Page for this controller.

	*

	*/



	function index($mls = null){

		$this->load->database();

		$this->load->model('property_model');



		if ($this->auth->try_session_login()){

			$firstname = get_field('first_name');

			$lastname = get_field('last_name');

			$email = get_field('email');

			$data['firstname'] = $firstname;

			$data['lastname'] = $lastname;

			$data['email'] = $email;

		}



		$property = $this->property_model->get_property_address($mls);

		$this->load->helper('url');

		$data['base'] = base_url();

		$data['address'] = $property[49];

		$data['mls'] = $mls;

		$this->load->view('mixed/send_to_friend',$data);

	}

	

	function emailProperties($catid){

		if ($this->auth->try_session_login()){

			$firstname = get_field('first_name');

			$lastname = get_field('last_name');

			$email = get_field('email');

			$data['firstname'] = $firstname;

			$data['lastname'] = $lastname;

			$data['email'] = $email;

		}

		$this->load->helper('url');

		$data['base'] = base_url();

		$data['catid'] = $catid;

		$this->load->view('mixed/send_to_friend',$data);

	}

	

	function removeProperty($favID){

		$this->load->database();

		$this->load->model('User_favorite_model');

		$propertiesPerCategory = $this->User_favorite_model->remove_user_fav_id($favID);
		$t = time();
		redirect(WEBSITE_URL.'real-estate/account/manage_favorites/?d='.$t);

	}

	

	function changeCat($catID,$favID,$mlsID){

		$this->load->helper('url');
		$this->load->database();
		$this->load->model('User_favorite_model');
		$this->load->model('property_model');
		$categoryList = $this->User_favorite_model->get_user_categories(get_field('id'));
		//print_r($categoryList); exit;
		$data['address'] = 'an test address';
		$data['base'] = base_url();
		$data['catlist'] = $categoryList;
		$data['catid'] = $catID;
		$data['favid'] = $favID;

		$this->load->view('mixed/change_category',$data);

	}

	

	function changeCategory(){

		$this->load->database();

		$this->load->model('User_favorite_model');

		$favid = $_POST['favid'];

		$catid = $_POST['catid'];
		$result = $this->User_favorite_model->change_category($favid,$catid);
		if($result){
			echo 'success';
			exit;
		}
		echo 'fail';
		exit;
	}

	function sendemail(){



		/*$toFirstName = $_POST['toFName'];

		$toLastName = $_POST['toLName'];

		$toName = $toFirstName.' '.$toLastName;

		

		$fromFirstName = $_POST['fromFName'];

		$fromLastName = $_POST['fromLName'];

		$fromName = $fromFirstName.' '.$fromLastName;

		

		$toEmail = $_POST['toEmail'];

		$fromEmail = $_POST['fromEmail'];

		

		$subject = $_POST['subject'];

		$message = $_POST['message'];

		

		$host = getenv('HTTP_HOST');

		$body = "";

		$body .= $toName.',<br /><br />';

		$body .= $fromName.' has sent you a message from '.$host.'<br /><br />';

		$body .= 'I thought you would be interested in the following property: <br /><br />';

		if(isset($_POST['cat']) && !empty($_POST['cat'])){

			$this->load->database();

			$this->load->model('User_favorite_model');

			$propertiesPerCategory = $this->User_favorite_model->get_user_fav_data($_POST['cat']);

			foreach($propertiesPerCategory as $key=>$val){

				$propertylink = $host.'/buy/property-details/'.$val->mls_id;

				if(isset($val->Address) && !empty($val->Address)){

					$address = $val->Address; 

				}else{

					$address = 'No Address';

				}

				$body .= '<a href="'.$propertylink.'">'.$address.'</a> <br /><br />';

			}

		}else{

			$propertylink = $host.'/buy/property-details/'.$_POST['mls'];

			$body .= '<a href="'.$propertylink.'">'.$_POST['address'].'</a> <br /><br />';

		}

		$body .= 'The message was: <br />';

		$body .= $message. '<br /><br />';

		$body .= 'You can contact '. $fromName.' directly using '.$fromEmail.'<br /><br />';

		$body .= 'Thank you, <br /><br />';

		$body .= WEBSITE_NAME2;

		

		$config['protocol'] = "smtp";

		$config['smtp_host'] = "ssl://smtp.gmail.com";

		$config['smtp_port'] = "465";

		$config['smtp_user'] = "yourusername";

		$config['smtp_pass'] = "yourpassword";

		$config['charset'] = "utf-8";

		$config['mailtype'] = "html";

		$config['newline'] = "\r\n";

		

		$this->load->library('email');

		$this->email->initialize($config);

		

		$this->email->from($fromEmail, $fromName);

		$this->email->to($toEmail); 

		$this->email->subject($fromName. 'has sent you a message on properties that may interest you.');

		$this->email->message($body);

		if($this->email->send()){

			echo true;

		}*/

	}

}

?>