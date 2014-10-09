<style>
	div.nyroModalCont{
		position: fixed !important;
		top: 0 !important;
	
	}
	div.nyroModalLink{

		padding:0px;

	}

</style>
<div style="background-color:#F0ECED;padding:15px 10px 5px 10px;">

  <h1>Add A Favorite Property</h1>

</div>



<div class="clearfix">

  <div style="margin:2% 0 6% 3%;" class="wpcf7">

  	<?php if(!empty($logged_in)){ ?>

    <div  id="fav_msg" style="display:none;"></div>

    <div class="clear"></div>

    <form action="" method="post" name="make_fav_form" id="make_fav_form" class="wpcf7-form">

      <div style="float:left;" class="form-section">

        <label for="notes" style="margin-left:0px;">Category</label>

        <p>

        	<span class="wpcf7-form-control-wrap your-name">

	          <select id="fav_category" name="category">

              	<?php 

					if(!empty($categories)){

						foreach($categories as $cat){ ?>

                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>

                <?php 

						}

					}

				 ?>

              </select>

          </span>

        </p>

      </div>

      <div class="clear"></div><br />

      <div style="float:left;" class="form-section">

        <label for="notes" style="margin-left:0px;">Notes</label>

        <p>

        	<span class="wpcf7-form-control-wrap your-name">

	          <input type="text" name="notes" id="fav_notes" size="40" class="wpcf7-form-control wpcf7-text" value="">

          </span>

        </p>

      </div>

      <div class="clear"></div>

      <div style="margin-top:3%;" class="form-section">

      	<input type="hidden" id="fav_mls_id" value="<?php echo $mls_id; ?>" />

        <input id="button" type="button" value="Add property" onclick="do_add_to_fav();" class="wpcf7-form-control wpcf7-submit submit_button" style="background-color:#0A57A3">

	    <img src="<?=$base?>img/loader.gif" id="add_fav_loader" style="display:none" />

      </div>

      <div class="wpcf7-response-output wpcf7-display-none"></div>

    </form>

    <?php }else{ ?>

	

		Please <a href="<?php echo $base; ?>account/login" style="color:#00BCD9">login</a> to make this property a favorite.

	

	<?php }?>

  </div>

  <!--END #content-->

</div>

<script>



</script>

