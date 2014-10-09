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
</style>

<h1 style=""class="page_title">Logins</h1>


<div class="row" style="margin: 0 auto;width: 305px; margin-top:20px;">

    <div class="two-thirds column">

        <div>



            <?php if (validation_errors() != ''): ?>

                <?= validation_errors(); ?>

            <?php endif; ?>

            <form method="post" action="<?=$base?>account/login" class="login_form">

                <span class="form_row">

                	<div class="row">

                		<div class="six columns">

		                    <label>Email</label>

		                </div>

		                <div class="ten columns">

		                    <input type="email" id="email" name="email"  spellcheck="false" value="<?php echo set_value('email', $remember_email); ?>" />

		                </div>

		            </div>

                </span>  



                <span class="form_row">

                	<div class="row">

                		<div class="six columns">

		                    <label>Password</label>

		                </div>

		                <div class="ten columns">

		                    <input type="password" id="password" name="password" spellcheck="false" value="" />

		                </div>

		            </div>
                </span>  
                <span class="form_row">
                	<div class="row">
                		<div class="sixteen columns">
		                    <input type="checkbox" name="rememberme" value="true" <?php if ($remember_email != ''): ?>checked="checked"<?php endif; ?>/> Remember my email
		                </div>
		            </div>

                </span>
                <span class="form_row">
                    <label class="hidden_label">&nbsp;</label>
                    <input type="submit" value="Login" id="submit" spellcheck="false" name="submit" />
                </span>
            </form>

            <div style="margin: 25px 0 25px 125px; line-height:17px;">

                <?php ?><a href="<?=$base?>account/forgot">Forgot password?</a><br /><?php ?>

                <a href="<?=$base?>account/signup">Register as new user.</a>

            </div>

        </div>

    </div>



  

  

</div>