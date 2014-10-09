<style>
	div.nyroModalCont{
		position: fixed !important;
		top: 0 !important;
	
	}
	div.nyroModalLink{
		padding:0px;
	}
</style>
<div id="sub-header-container" style="" class="solid-bg no-description" data-aspect-ratio="1">

	<!--BEGIN #sub-header-->

	<div id="sub-header">

		<div class="bar"></div>

		<div style="float:left; margin-left:25px;"><h1 class="sub-header-title">Schedule a showing</h1></div>

		<div class="clear"></div>

		<!--END #sub-header-->

	</div>

<!--END #sub-header-container-->

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

	#contentss{

		width:780px;

		

	}

	</style>

<div class="clearfix" id="contentss">



<div style="margin:2% 0% 6% 3%;" class="wpcf7">

<div  id="msg" style="display:none;"><h4>You have requested a showing for <span class="property_address"></span>. You should receive a response soon.</h4></div>

    <form action="" method="post" name="scheduleForm" id="scheduleForm" class="wpcf7-form">

    	<input type="hidden" name="full_address" class="property_address" value="" />

		<input type="hidden" name="mls_id" id="mls_id" value="" />        

		<input type="hidden" name="property_url" id="property_url" value="" />                

        <div class="form-section" style="margin-bottom:10px;">

			<label for="property" style="display:inline;">Property:</label>

	        <span class="wpcf7-form-control-wrap your-email property_address"></span>	

	    </div>

		<div class="clear"></div>

        <div style="float:left;" class="form-section"><label for="first_name">First Name *</label>

	        <p><span class="wpcf7-form-control-wrap your-name">

				<input type="text" name="first_name" id="first_name" size="40" class="wpcf7-form-control wpcf7-text" value="">

				<label for="first_name" class="error" style="display:none;">Please enter your firstname</label>

			</span></p>

	    </div>

        <div style="float:left;margin-left:3%;" class="form-section"><label for="last_name">Last Name *</label>

	        <p><span class="wpcf7-form-control-wrap your-name"><input type="text" name="last_name" id="last_name" size="40" class="wpcf7-form-control wpcf7-text" value=""></span></p>

		</div>

		<div class="clear"></div>

		

        <div style="float:left;margin-top:3%;" class="form-section"><label for="cell_phone">Email *</label>

	        <p><span class="wpcf7-form-control-wrap your-email"><input type="email" name="email" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" id="email" value=""></span></p>

        </div>

        <div style="float:left;margin-left:3%;margin-top:3%;" class="form-section"><label for="home_phone">Phone </label>

			<p><span class="wpcf7-form-control-wrap your-phone"><input type="tel" name="home_phone" id="home_phone" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel" value=""></span></p>        	

        </div>

        <div class="clear"></div>



		<div style="float:left;margin-top:3%;" class="form-section"><label for="cell_phone">Date *</label>

	        <p><span class="wpcf7-form-control-wrap your-date"><input type="text" name="date" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-date" aria-required="true" id="date" value=""></span></p>

        </div>

        <div style="float:left;margin-left:3%;margin-top:3%;" class="form-section"><label for="home_phone">Time *</label>

			<p>

				<span class="wpcf7-form-control-wrap your-phone">

					<select class="dateBox" id="time" name="hour">

						<option value="1">1</option>

						<option value="2">2</option>

						<option value="3">3</option>

						<option value="4">4</option>

						<option value="5">5</option>

						<option value="6">6</option>

						<option value="7">7</option>

						<option value="8">8</option>

						<option value="9">9</option>

						<option value="10">10</option>

						<option value="11">11</option>

						<option value="12">12</option>

					</select>

					<select class="dateBox" name="minutes">

						<option value="00">00</option>

						<option value="15">15</option>

						<option value="30">30</option>

						<option value="45">45</option>

					</select>

					<select class="dateBox" name="meridian">

						<option value="AM">AM</option>

						<option value="PM">PM</option>

					</select>

				</span>

			</p>

        </div>

        <div class="clear"></div>

		

		<div class="form-section">

			<label for="property">Message *</label>

	        <p><span class="wpcf7-form-control-wrap message"><textarea class="wpcf7-form-control wpcf7-textarea" rows="5" cols="30" name="message"></textarea></span></p>	

	    </div>



        <div style="margin-top:3%;" class="form-section">

        	<input id="button" type="button" value="Send Request" onclick="validateForm();" class="wpcf7-form-control wpcf7-submit submit_button" style="background-color:#0A57A3">

            <img style="display:none;" id="schedule_loader" alt="Sending ..." src="http://www.candacecourter.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" class="ajax-loader">

        </div>

        <div class="wpcf7-response-output wpcf7-display-none"></div>

        <div id="error_msg_nyro" style="display:none;">Error sending email. Please try again.</div>

    </form>

</div><!--END #content-->

</div>



<script>

	function validateForm(){

		if($("#scheduleForm").valid()){

			$('#button').attr('disabled','disabled');

			

			$.ajax({

				type: 'POST',

				url: '<?=$base?>schedule/sendemail',

				data: $( "#scheduleForm" ).serialize(),

				dataType: 'json',

				beforeSend: function(){

					$("#schedule_loader").show();

				},			

				success: function(result) {

				

					if(result.message=='success'){

						$("#scheduleForm").hide();

						$("#msg").show();

					}else{

						$("#error_msg_nyro").show().hide(10000);

					}

					$("#schedule_loader").hide();

				},

	

				error: function(data) {

					alert('There was an error while sending email.');

				}

			});

			

		}else{

			return false;

		}

	}

	$(document).ready(function(){

		$('#date').datePicker({clickInput:true});

		$("#scheduleForm").validate({

			rules: {

				first_name: "required",

				last_name: "required",

				email: {

					required: true,

					email: true

				},

				phone: "required",

				date: "required",

				message: "required"

			},

			messages: {

				first_name: "Please enter your firstname",

				last_name: "Please enter your lastname",

				email: "Please enter a valid email address",

				phone: "Please enter a phopne number",

				date: "Please specify a date",

				message: "Please write a message"

			}

		});

	});

</script>