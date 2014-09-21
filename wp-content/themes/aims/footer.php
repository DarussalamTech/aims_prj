		<?php global $theme_options; ?>
		<div class="footer_container">
			<div class="footer">
				<ul class="footer_banner_box_container clearfix">
					<?php
					if(is_active_sidebar('footer-top'))
						get_sidebar('footer-top');
					?>
				</ul>
				<div class="footer_box_container clearfix">
					<?php
					if(is_active_sidebar('footer-bottom'))
						get_sidebar('footer-bottom');
					?>
				</div>
                <div class="main_footer_part">
                	<div class=" footer_box_title">
                    	<div class="footer_title"><span>CONTACT US</span></div>
                        <div class="footer_title"><span>LATEST TWEETS</span></div>
                        <div class="footer_title"><span>FOLLOW US ON</span></div>
                    </div>
                    <div class="footer_content_detail" style="background:url(<?php echo WP_SITEURL;?>/wp-content/uploads/2014/09/footer_img.jpg) no-repeat;">
                    	<div class="footer_description">
                        		<div class="footer_small_icon">
                                	<img class="address_icon" src="<?php echo WP_SITEURL;?>/wp-content/uploads/2014/09/address_icon.png" alt="adress" />
                                    <img class="phone_icon" src="<?php echo WP_SITEURL;?>/wp-content/uploads/2014/09/phone_icon.png" alt="phone" />
                                    <img class="email_icon" src="<?php echo WP_SITEURL;?>/wp-content/uploads/2014/09/email_icon.png" alt="email" />
                                </div>
                                <div class="footer_contact_detail">
                                	 <span>Office # 1, First Floor, Mercure<br />Value Hotel, Exit 9,Near Granada<br /> Mall, Riyadh, Kingdom of Saudi Arabia</span>
                                     <span>+966 1 2773313</span>
                            		 <span>info@aims.com</span>
                                </div>
                        </div>
                        <div class="footer_description"><span>@AIMS There was a bug in the latest update which caused this, we're releasing a fix today 
3 months ago</span></div>
                        <div class="footer_description">
                        	<div class="social_icon_box">
                            	<div class="social_icon_circle"><img src="<?php echo WP_SITEURL;?>/wp-content/uploads/2014/09/fb_icon.png" alt="facebook" /></div>
                                <div class="social_icon_circle"><img src="<?php echo WP_SITEURL;?>/wp-content/uploads/2014/09/twitter_icon.png" alt="twitter" /></div>
                                <div class="social_icon_circle"><img src="<?php echo WP_SITEURL;?>/wp-content/uploads/2014/09/google_plus_icon.png" alt="google plus" /></div>
                            </div>
                            <div class="qr_code">
                            	<img src="<?php echo WP_SITEURL;?>/wp-content/uploads/2014/09/qrcode.jpg" alt="qr code" />
                            </div>
                        </div>
                    </div> 
                </div>
				<?php if($theme_options["footer_text_left"]!="" || $theme_options["footer_text_right"]!=""): ?>
				<div class="copyright_area">
					<?php if($theme_options["footer_text_left"]!=""): ?>
					<div class="copyright_left">
						<?php echo do_shortcode($theme_options["footer_text_left"]); ?>
					</div>
					<?php 
					endif;
					if($theme_options["footer_text_right"]!=""): ?>
					<div class="copyright_right">
						<?php echo do_shortcode($theme_options["footer_text_right"]); ?>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>