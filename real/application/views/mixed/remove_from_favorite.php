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

  <h1>Remove From Favorite</h1>

</div>


<div class="clearfix">

  <div style="margin:2% 0 6% 3%;" class="wpcf7">
  	<?php if(!empty($logged_in)){ ?>
   		<?php echo $message; ?>
    <div class="clear"></div>
    <?php }else{ ?>
		Please <a href="<?php echo $base; ?>account/login">login</a> to remove from favorite.
	<?php }?>
   </div>

  <!--END #content-->

</div>

