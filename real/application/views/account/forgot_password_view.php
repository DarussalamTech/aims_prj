<head>
<link rel="stylesheet" type="text/css" href="http://dev.727.me/wp-content/themes/jj-wp/style.css" />


</head>
<style>
.login_form input {
padding: 2px;
font-size: 13px;
line-height: 21px;
border-radius: 2px;
box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.05) inset !important;
border: 1px solid #ccc;
margin-bottom: 5px;
 }

.login_form input[type="submit"] {
cursor: pointer;
display: inline-block;
padding: 10px 20px;
font-size: 14px;
line-height: 12px;
font-weight: bold;
border: 0px none !important;
border-radius: 2px;
background-color:#0A57A3;
color: #FFF;
margin-top: 7px;
}

.login_form .hidden_label{display: none;}
.login_form input[type="checkbox"]{margin:0}

.login_form input[type="submit"]:hover {
background-color: #403438;
}

.p { 
    font-family: Arial,Helvetica,sans-serif; 		
}
</style>



	<h1 style=""class="page_title">Forgot Password</h1>

<div  style="margin: 0 auto;width: 950px; margin-top:30px; margin-bottom:30px;">
 
        <div class="p">
		 
            	<p> Please type the email address associated with your <?=WEBSITE_NAME?> account. Instructions for resetting your password will be emailed to this address.</p>
	 

            <form method="post" action="<?php echo $base; ?>account/forgot">

                <span class="form_row" >

                    <label for="email">Email Address</label>

                    <input style="border:1px solid;height: 25px; width: 175px;"; type="text" autocapitalize="off" autocorrect="off" id="email" name="email" value="<?php echo set_value('email'); ?>" />

                    

                </span>

                <span class="login_form" style="line-height:7px;">
						 <label class="hidden_label">&nbsp;</label>
                    <input  style="line-height:7px;" type="submit" value="Submit" id="submit" name="submit" /><br />

                    <?php echo form_error('email'); ?>

                    <?php echo !empty($email_error)?$email_error:''; ?>

                </span>

            </form>



        </div>
 
 
</div>