<div class="row" style="margin:2% 0 6% 0;">

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

                <a href="<?=$base?>account/forgot">Forgot password?</a><br />

                <a href="<?=$base?>account/signup">Register as new user.</a>

            </div>

        </div>

    </div>



  

  

</div>