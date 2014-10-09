<div style="background-color:#F0ECED;padding:15px 10px 5px 10px;">

  <h1>Change Category</h1>

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

		width:300px;

		margin-left:25px;

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

<h4 id="msg" style="display:none;">Category has been changed.<h4/>

<div id="loader" style="display:none;"><img src="<?php echo $base;?>bootstrap/img/ajaxLoader.gif"/></div>

    <form action="" method="post" name="changeCategory" id="changeCategory" class="wpcf7-form">
		<input name="favid" id="favid" type="hidden" value="<?php if(isset($favid) && !empty($favid)){echo $favid;}else{ echo "";} ?>" />
		<input name="catid" id="catid" type="hidden" value="<?php if(isset($catid) && !empty($catid)){echo $catid;}else{ echo "";} ?>" />
		<div class="clear"></div>
        <div style="float:left;" class="form-section">
	        <p><span class="wpcf7-form-control-wrap your-name">
 			<select name="category" id="category" style="padding: 10px;width: 201px;">
					<?php
						foreach($catlist as $key=>$val){
					?>
						<option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
					<?php
						}
					?>
				</select>
			</span></p>
	    </div>


		<div class="clear"></div>

		

        <div class="form-section" style="margin-top:5px;">
        	<input id="button" type="button" style="background-color: #A7842B;color: white;padding: 10px;border: none;" value="Change Category" onclick="submitForm();">
            <img style="visibility: hidden;" alt="Sending ..." src="http://www.candacecourter.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" class="ajax-loader">
        </div>

        <div class="wpcf7-response-output wpcf7-display-none"></div>

    </form>

</div><!--END #content-->

</div>

<script>

	function submitForm(){

		var favid = $('#favid').val();

		var catid = $('#category').val();

		$('form#changeCategory').hide();

		$('img.ajax-loader').show();
		var d = '<?=time();?>';
		$.post('<?php echo $base;?>contact/changeCategory',{favid:favid,catid:catid},function(data){
			if(data == 'success'){
				$('img.ajax-loader').hide();
				//$("#msg").show();
			}
			location.href = "<?php echo $base;?>account/manage_favorites/?d="+d;

		});

	}

</script>