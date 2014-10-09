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
	float:left;width:250px; height:25px;border:2px solid #ccc !important;
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

.accountLogOut {

    background: none repeat scroll 0 0 #7FAAD4;

    border-top: 1px solid #FFFFFF;

    color: #FFFFFF;

    font-size: 12px;

    padding: 10px;

    text-align: right;

}



#account_menu {

    background: none repeat scroll 0 0 #0A57A3;

    border-top: 1px solid #FFFFFF;

    color: #FFFFFF;

    padding: 7px 10px;

	margin-bottom:3%;

}



#account_menu ul {

    list-style: none outside none;

    margin: 0;

    padding: 0;

}



#account_menu li {

    background: url("/images/account_nav_bar.gif") no-repeat scroll right center rgba(0, 0, 0, 0);

    float: left;

    margin-right: 9px;

}



#account_menu a {

    color: #FFFFFF !important;

    display: block;

    padding-right: 9px;

    text-decoration: none;

    outline: medium none;

}

#account_menu a:hover {

    text-decoration: underline;

}





#dashboardHomeLeft {

    color: #666666;

    float: left;

    font-size: 12px;

    margin: 0 15px 0 0;

    padding: 0;

    width: 590px;

}





#dashboardHomeRight {

    color: #666666;

    float: right;

    font-size: 12px;

    margin: 0;

    padding: 0;

    width: 490px;

}
#admin_links a{
	color:#2d2d2d;
}
#admin_links a:hover{
	color:#a88628;
}

</style>

<div class="blog-detail-page clearfix" id="admin_links" style="margin-top:2%;width:85%;margin:auto;">
    <div class="accountLogOut">
    
        <strong>Welcome,</strong> <span class="CurrentUserName"><?= substr(get_field('first_name'), 0, 15) ?> <?= substr(get_field('last_name'), 0, 15) ?></span>
    
     <br>
    
    </div>
    
    <div id="account_menu">
    
        <ul>
    
            <li><a class="activeLink" href="<?php echo $base; ?>account/home">Dashboard</a></li>
           
                <li><a href="<?php echo $base; ?>account/manage_favorites/">Favorites</a> </li>
            <?php /*?> 
                <li><a href="<?php echo $base; ?>account/searches/">Saved Searches</a> </li>
           <?php */?>
                <li><a href="<?php echo $base; ?>account/edit/">Account Details</a></li>
                <?php /*?><li><a class="last" href="/account/contact_agent/">Contact Your Preferred Agent</a>
            </li><?php */?>
                <li class="last"><a href="<?php echo $base; ?>account/logout">Logout</a></li>
        </ul>
    
        <div class="clearAll">&nbsp;</div>
    
    </div>
</div>



<div  style="margin: 0 auto;width: 815px; margin-top:30px;">

	<?php if(!empty($result_msg)){ ?>

	    <div class="wpcf7-display-none" style="display: block;border:2px solid #398f14;padding:10px;"><?php echo $result_msg; ?></div>

    <?php } ?>

    <form novalidate="novalidate" method="post" action="<?=$base?>account/edit">

        <div class="form-section div_account"><label for="email">Email *</label>

	        <p>
            	<span class="wpcf7-form-control-wrap your-email">
            		<input type="email" disabled="disabled" value="<?php echo $user_data->email; ?>" id="email" aria-required="true" class="input_account" name="email">
            	</span>
            </p>	

	        <?php echo form_error('email'); ?>

        </div>

		<div style="clear:both;"></div>

        <div class="form-section div_account" ><label for="password">Password *</label>

			<p><span class="wpcf7-form-control-wrap your-email"><input type="password" autocomplete="off"  name="password" id="password" class="input_account" aria-required="true"></span></p>

			<?php echo form_error('password'); ?>

        </div>

        <div class="form-section div_account"><label for="repassword">Confirm Password *</label>

        	<p><span class="wpcf7-form-control-wrap your-email"><input  style="" type="password" name="repassword" autocomplete="off" id="repassword" class="input_account" aria-required="true"></span></p>

	        <?php echo form_error('repassword'); ?>

        </div>

        <div class="clear" ></div>

          

        <div class="form-section div_account"><label for="first_name">First Name *</label>

	        <p><span class="wpcf7-form-control-wrap your-name"><input type="text" autocomplete="off" value="<?php echo $user_data->first_name; ?>" class="input_account" size="40" id="first_name" name="first_name"></span></p>

	        <?php echo form_error('first_name'); ?>

        </div>

        <div class="form-section div_account"><label for="last_name">Last Name *</label>

	        <p><span class="wpcf7-form-control-wrap your-name"><input type="text" autocomplete="off" value="<?php echo $user_data->last_name; ?>" class="input_account" size="40" id="last_name" name="last_name"></span></p>

		    <?php echo form_error('last_name'); ?>

        </div>

		<div class="clear" ></div>



        <div class="form-section div_account" ><label for="address">Address</label>

        	<p><span class="wpcf7-form-control-wrap your-name"><input type="text" autocomplete="off" value="<?php echo !empty($user_data->address)?$user_data->address:''; ?>" class="input_account" id="address" name="address"></span></p>

        </div>

        <div class="form-section div_account" ><label for="city">City</label>

	        <p><span class="wpcf7-form-control-wrap your-name"><input type="text" autocomplete="off" value="<?php echo !empty($user_data->city_town)?$user_data->city_town:''; ?>" class="input_account" size="40" id="city" name="city"></span></p>

        </div>

        <div class="clear" ></div>

                

        <div class="form-section div_account"><label for="state">State</label>

	        <p><span class="wpcf7-form-control-wrap "><input type="text" autocomplete="off" value="<?php echo !empty($user_data->state_province)?$user_data->state_province:''; ?>" class="wpcf7-form-control wpcf7-text input_account" id="state" name="state"></span></p>

        </div>

        <div class="form-section div_account" ><label for="zip_code">Zip Code </label>

	        <p><span class="wpcf7-form-control-wrap "><input type="text" autocomplete="off" value="<?php echo !empty($user_data->postcode)?$user_data->postcode:''; ?>" class="wpcf7-form-control wpcf7-text input_account" size="10" id="zip_code" name="zip_code"></span></p>

        </div>

        <div class="clear" ></div>

        

        <div class="form-section div_account"><label for="country">Country</label>

	        <p><span class="wpcf7-form-control-wrap "><input type="text" autocomplete="off" value="<?php echo !empty($user_data->country)?$user_data->country:''; ?>" class="wpcf7-form-control wpcf7-text input_account" size="40" id="country" name="country"></span></p>

        </div>

        <div class="clear" ></div>

        

        <div class="form-section div_account"><label for="cell_phone">Cell Phone </label>

	        <p><span class="wpcf7-form-control-wrap your-phone"><input type="tel" autocomplete="off" value="<?php echo !empty($user_data->cell_phone)?$user_data->cell_phone:''; ?>" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel input_account" size="40" id="cell_phone" name="cell_phone"></span></p>

        </div>

        <div class="form-section div_account"><label for="home_phone">Home Phone </label>

			<p><span class="wpcf7-form-control-wrap your-phone"><input type="tel" autocomplete="off" value="<?php echo !empty($user_data->home_phone)?$user_data->home_phone:''; ?>" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel input_account" size="40" id="home_phone" name="home_phone"></span></p>        	

        </div>

        <div class="clear" ></div>





        <div class="form-section div_account"><input type="submit" class="account_submit" value="Save"></div>

        <div class="wpcf7-response-output wpcf7-display-none"></div>

    </form>

</div>

<script>

	$(document).ready(function(data){

		$("#password").val('');

		$("#repassword").val('');

	});

</script>