<div style="background-color:#F0ECED;padding:15px 10px 5px 10px;">
  <h1>Send to a Friend</h1>
</div>
	<style>
	.wpcf7 small{
	color: #111;
	background-image: url('http://candacecourter.com/wp-content/uploads/2013/10/gform_description_bg.png');
	float: none;
	margin: 3px 0 5px 130px;
	padding: 12px 0 5px 5px !important;
	width: 436px;
	height: 20px;
	font-weight: 600;
	font-size: 11px;
	}
	div.nyroModalLink{
		padding:0px;
	}
	#contents{
		width:780px;
		margin: 0 auto;
	}
	#loader img{
		margin: 200px 0 0 380px;
	}
	.wpcf7 label{
		margin:0px;
	}
	.wpcf7 input, .wpcf7 textarea{
		margin-bottom:0px;
	}
	</style>

<div class="clearfix" id="contents">
<div style="margin:2% 0 6% 0;" class="wpcf7">
<h4 id="msg" style="display:none;">Email has been sent to your friend.<h4/>
<div id="loader" style="display:none;"><img src="<?php echo $base;?>bootstrap/img/ajaxLoader.gif"/></div>
    <form action="" method="post" name="sendAFriend" id="sendAFriend" class="wpcf7-form">
		<input name="address" id="address" type="hidden" value="<?php if(isset($address) && !empty($address)){echo $address;}else{ echo "";} ?>" />
		<input name="mls" id="mls" type="hidden" value="<?php if(isset($mls) && !empty($mls)){echo $mls;}else{ echo "";} ?>" />
		<input name="cat" id="cat" type="hidden" value="<?php if(isset($catid) && !empty($catid)){echo $catid;}else{ echo "";} ?>" />
        <div style="float:left;" class="form-section"><label for="first_name">To First Name *</label>
	        <p><span class="wpcf7-form-control-wrap your-name">
				<input type="text" name="toFName" id="toFName" size="40" class="wpcf7-form-control wpcf7-text" value="" />
				<!--<label for="first_name" class="error" style="display:none;">Please enter your firstname</label>-->
			</span></p>
	    </div>
        <div style="float:left;margin-left:3%;" class="form-section"><label for="last_name">To Last Name *</label>
	        <p><span class="wpcf7-form-control-wrap your-name"><input type="text" name="toLName" id="toLName" size="40" class="wpcf7-form-control wpcf7-text" value=""></span></p>
		</div>
		<div class="clear"></div>
		
        <div style="float:left;margin-top:3%;" class="form-section"><label for="cell_phone">From First Name *</label>
	        <p><span class="wpcf7-form-control-wrap your-email"><input type="text" name="fromFName" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" id="fromFName" value="<?php echo $firstname;?>"></span></p>
        </div>
        <div style="float:left;margin-left:3%;margin-top:3%;" class="form-section"><label for="home_phone">From Last Name *</label>
			<p><span class="wpcf7-form-control-wrap your-phone"><input type="text" name="fromLName" id="fromLName" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel" value="<?php echo $lastname;?>"></span></p>
        </div>
        <div class="clear"></div>
		
		<div style="float:left;margin-top:3%;" class="form-section"><label for="cell_phone">To Email *</label>
	        <p><span class="wpcf7-form-control-wrap your-email"><input type="email" name="toEmail" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" id="toEmail" value=""></span></p>
        </div>
        <div style="float:left;margin-left:3%;margin-top:3%;" class="form-section"><label for="home_phone">From Email *</label>
			<p><span class="wpcf7-form-control-wrap"><input type="email" name="fromEmail" id="fromEmail" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel" value="<?php echo $email;?>"></span></p>
        </div>
        <div class="clear"></div>

		<div style="float:left;margin-top:3%;" class="form-section"><label for="cell_phone">Subject *</label>
	        <p><span class="wpcf7-form-control-wrap your-date"><input type="text" name="subject" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-date" aria-required="true" id="subject" value="Send to Friend" style="width:728px;"></span></p>
        </div>
        <div class="clear"></div>
		
		<div class="form-section">
			<label for="property">Message *</label>
	        <p><span class="wpcf7-form-control-wrap message"><textarea class="wpcf7-form-control wpcf7-textarea" rows="5" cols="30" name="message"></textarea></span></p>
		</div>

        <div class="form-section" style="margin-top:15px;"><input id="button" type="button" value="Send Request" onclick="validateForm();" class="wpcf7-form-control wpcf7-submit submit_button"><img style="visibility: hidden;" alt="Sending ..." src="http://www.candacecourter.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" class="ajax-loader"></div>
        <div class="wpcf7-response-output wpcf7-display-none"></div>
    </form>
</div><!--END #content-->
</div>
<script>
	function validateForm(){
		if($("#sendAFriend").valid()){
			$('form#sendAFriend').hide();
			$('div#loader').show();
			$('#button').attr('disabled','disabled');
			$.post('<?php echo $base;?>contact/sendemail',$("#sendAFriend").serialize(),function(data){
				if(data){
					$('div#loader').hide();
					$("#msg").show();
				}
			});
		}else{
			return false;
		}
	}
	$(document).ready(function(){
		$("#sendAFriend").validate({
			rules: {
				toLName: "required",
				toFName: "required",
				fromFName: "required",
				fromLName: "required",
				toEmail: {
					required: true,
					email: true
				},
				fromEmail: {
					required: true,
					email: true
				},
				subject: "required",
				message: "required"
			},
			messages: {
				toFName: "This field is required",
				toLName: "This field is required",
				fromFName: "Please enter your firstname",
				fromLName: "Please enter your lastname",
				toEmail: "Please enter a valid email address",
				fromEmail: "Please enter a valid email address",
				subject: "This field is required",
				message: "Please write a message"
			}
		});
	});
</script>