<p>A password change request was initiated by someone at IP Address: <?php echo $this->input->ip_address();?></p>

<p>If this was you, <a href="<?=base_url().'account/forgot/'.$this->account_model->get_forgot_password_hash($this->input->post('email'))->hash;?>">please click here to change your password on CandaceCourter.com</a></p>