<style>

.wpcf7 small{

color: #111;

float: none;

margin: 3px 0 5px 130px;

padding: 12px 0 5px 5px !important;

width: 436px;

height: 20px;

font-weight: 600;

font-size: 11px;

}
.input_account{
	float:left;width:300px; height:25px ; border: 1px #ccc solid;
}
.div_account{
	float: left;width:300px;margin-top:15px; margin-left:20px;
}
.account_submit{
	margin: 20px 0;
	padding: 5px 10px;
	text-transform: uppercase;
	border: none;
	color: #ffffff;
	background: #0A57A3;
	cursor: pointer;
}
</style>
<!--
<div class="title_area">
<h1 class="the_title" style="color:#0A57A3; float:center; padding-left:20px">Register</h1>
<img style="float:center" src="<?php echo base_url(); ?>bootstrap/img/page_title.png"></a>
</div>	-->

<h1 style=""class="page_title">Register</h1>

<div  style="margin: 0 auto;width: 815px; margin-top:30px;">

    <form novalidate="novalidate" class="wpcf7-form" method="post" action="<?=$base?>account/signup">

        <div class="form-section div_account"><label for="email">Email *</label>

	        <p><span class="wpcf7-form-control-wrap your-email"><input type="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" id="email" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email input_account" name="email"></span></p>	

	        <?php echo form_error('email'); ?>

        </div>

		<div style="clear:both;"></div>
        <div class="form-section div_account"><label for="password">Password *</label>

			<p><span class="wpcf7-form-control-wrap your-email"><input type="password" name="password" id="password" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email input_account" aria-required="true"></span></p>

			<?php echo form_error('password'); ?>

        </div>

        <div class="form-section div_account"><label for="repassword">Confirm Password *</label>

        	<p><span class="wpcf7-form-control-wrap your-email"><input type="password" name="repassword" id="repassword" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email input_account" aria-required="true"></span></p>

	        <?php echo form_error('repassword'); ?>

        </div>

        <div class="clear" ></div>

          

        <div class="form-section div_account"><label for="first_name">First Name *</label>

	        <p><span class="wpcf7-form-control-wrap your-name"><input type="text" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>" class="wpcf7-form-control wpcf7-text input_account" size="40" id="first_name" name="first_name"></span></p>

	        <?php echo form_error('first_name'); ?>

        </div>

        <div class="form-section div_account"><label for="last_name">Last Name *</label>

	        <p><span class="wpcf7-form-control-wrap your-name"><input type="text" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''; ?>" class="wpcf7-form-control wpcf7-text input_account" size="40" id="last_name" name="last_name"></span></p>

		    <?php echo form_error('last_name'); ?>

        </div>

		<div class="clear" ></div>



        <div class="form-section div_account"><label for="address">Address</label>

        	<p><span class="wpcf7-form-control-wrap your-name"><input type="text" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>" class="wpcf7-form-control wpcf7-text input_account" id="address" name="address"></span></p>

        </div>

        <div class="form-section div_account"><label for="city">City</label>

	        <p><span class="wpcf7-form-control-wrap your-name"><input type="text" value="<?php echo isset($_POST['city']) ? $_POST['city'] : ''; ?>" class="wpcf7-form-control wpcf7-text input_account" size="40" id="city" name="city"></span></p>

        </div>

        <div class="clear" ></div>

                

        <div class="form-section div_account"><label for="state">State</label>

	        <p><span class="wpcf7-form-control-wrap "><input type="text" value="<?php echo isset($_POST['state']) ? $_POST['state'] : ''; ?>" class="wpcf7-form-control wpcf7-text input_account" id="state" name="state"></span></p>

        </div>

        <div class="form-section div_account"><label for="zip_code">Zip Code </label>

	        <p><span class="wpcf7-form-control-wrap "><input type="text" value="<?php echo isset($_POST['zip_code']) ? $_POST['zip_code'] : ''; ?>" class="wpcf7-form-control wpcf7-text input_account" size="10" id="zip_code" name="zip_code"></span></p>

        </div>

        <div class="clear" ></div>

        

        <div class="form-section div_account"><label for="country">Country</label>

	        <p><span class="wpcf7-form-control-wrap "><input type="text" value="<?php echo isset($_POST['country']) ? $_POST['country'] : ''; ?>" class="wpcf7-form-control wpcf7-text input_account" size="40" id="country" name="country"></span></p>

        </div>

        <div class="clear" ></div>

        

        <div class="form-section div_account"><label for="cell_phone">Cell Phone </label>

	        <p><span class="wpcf7-form-control-wrap your-phone"><input type="tel" value="<?php echo isset($_POST['cell_phone']) ? $_POST['cell_phone'] : ''; ?>" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel input_account" size="40" id="cell_phone" name="cell_phone"></span></p>

        </div>

        <div class="form-section div_account"><label for="home_phone">Home Phone </label>

			<p>
                <span class="wpcf7-form-control-wrap your-phone">
                    <input type="tel" value="<?php echo isset($_POST['home_phone']) ? $_POST['home_phone'] : ''; ?>" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel input_account" size="40" id="home_phone" name="home_phone">
                </span>
            </p>        	

        </div>

        <div class="clear" ></div>

         <div class="form-section div_account"><input type="submit" class="account_submit" value="Create Account"></div>

        <div class="wpcf7-response-output wpcf7-display-none"></div>

    </form>

</div>