<style>
.wpcf7 small {
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
.title-div {
	background:#F0ECED;
	padding:1%;
	margin: 0 auto;
	width:900px;
	margin-top:15px;
	margin-bottom:15px;
}
.title-text {
	font-size:19px;
	color:#222
}
.right_contents {
	float:right;
	font-size:16px;
	cursor:pointer;
}
.sub-details {
	float:left;
	width:45%;
	color:#333;
}
.sub-big-details {
	float:left;
	width:100%;
	color:#333;
}
.dp-choose-date{
	display:none;
}
div#dp-popup{
	z-index:9999 !important;
}

.dp-popup{
	width:360px !important;
}
.form-section label.error {
	color:red;
}
.form-section label{
	cursor:default;
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
<link rel="stylesheet" href="<?=$base?>bootstrap/css/nyroModal.css">
<link rel="stylesheet" href="<?=$base?>bootstrap/css/datePicker.css">
<link rel="stylesheet" type="text/css" href="<?=$base?>bootstrap/css/demo.css" />
<script src="<?=$base?>bootstrap/js/jquery.nyroModal.custom.js"></script>
<script src="<?=$base?>bootstrap/js/date.js"></script>
<script src="<?=$base?>bootstrap/js/jquery.datePicker.js"></script>
<script src="<?=$base?>bootstrap/js/jquery.validate.js"></script>
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

<div class="wpcf7" style="margin:0 auto; width:900px;">
  <p>The following is a list of your current Favorites. You can add or delete properties in each Favorites category at any time. <!--You can also send each Favorites collection or individual Favorite properties via Email.--></p>
  <p>Click on the Favorites Category name to view its properties. <!--Click on Email to send the category to an email address.--></p>
<?php
if(!empty($user_favs)){
/*echo '<pre>';
print_r($user_favs);
echo '</pre>';*/
foreach($user_favs as $fav){

?>
 <div id="delete_cat_message_<?php echo $fav->id; ?>" style="display:none;font-size:small;color:#66CC00"></div>
 <div id="main_cat_div_<?php echo $fav->id; ?>">
  <div class="title-div">
    <div class="title-text">
      <div style="float:left;" onclick="toggleDetails('toggle_div_<?php echo $fav->id; ?>');"> 
      	<span class="toggle_div_<?php echo $fav->id; ?>" style="line-height:10px;">+</span><span class="toggle_div_<?php echo $fav->id; ?>" style="display:none;line-height:10px;">-</span>&nbsp;&nbsp; 
      	<a href="javascript:;">Category: <?php echo $fav->name; ?></a> (<?php echo !empty($fav->user_favorites)?count($fav->user_favorites):0; ?> Properties) 
        <img src="<?=$base?>img/loader.gif" id="cat_delete_loader_<?php echo $fav->id; ?>" style="display:none" />
        <br />
      </div>
      <div class="right_contents"><?php /*?><a href="<?php echo $base; ?>contact/emailProperties/<?php echo $fav->id;?>" class="nyroModal">Email</a> | <?php */?><a href="javascript:;" onclick="delete_category(<?php echo $fav->id; ?>);">Delete</a></div>
      <div class="clear"></div>
      <div> <span style="font-size:small;margin-left:3%;" id="cat_description_<?php echo $fav->id; ?>"><?php echo !empty($fav->description)?$fav->description:''; ?></span> <a style="margin-left:1%;font-size:14px;" onclick="show_description(<?php echo $fav->id; ?>);" href="javascript:;">Add Description</a> </div>
      <div style="display:none;margin-left:3%;" id="description_<?php echo $fav->id; ?>">
        <table style="width: auto;margin-top:1%;">
          <tbody>
            <tr>
              <td valign="top">Description:</td>
              <td style="padding-left:10px;"><textarea id="txt_cat_desc_<?php echo $fav->id; ?>" rows="4" cols="38" style="margin-bottom:0px;" name="txt_cat_desc_<?php echo $fav->id; ?>"><?php echo !empty($fav->description)?$fav->description:''; ?></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td style="padding-top:10px; padding-left:10px;">
              	<input type="button" onclick="$('#description_'+<?php echo $fav->id; ?>).hide('slow');" style="width:140px;margin-left:1%;background-color: #0A57A3;color: white;padding: 10px;border: none;" value="Cancel" >
                <input type="button" onclick="save_cat_description(<?php echo $fav->id; ?>);" style="width:140px;background-color: #0A57A3;color: white;padding: 10px;border: none;" value="Save" >
                <img src="<?=$base?>img/loader.gif" id="cat_loader_<?php echo $fav->id; ?>" style="display:none" /><br />
                <span id="cat_description_msg_<?php echo $fav->id; ?>" style="font-size:small;color:red;"></span> </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div style="padding-left:1%;display:none;margin-bottom:15px;" class="toggle_div_<?php echo $fav->id; ?>">
    <?php if(empty($fav->user_favorites)){ ?>
    <div class="sub-details">
      <p>You have no properties in this favorites collection</p>
      <p><a href="<?php echo WEBSITE_URL.'search-all-properties/'?>" style="color:#0A57A3;text-decoration:underline;">Search Properties</a> to begin adding favorites</p>
    </div>
    <div  style="clear:both;"></div>
    <?php }else{ ?>
    <?php 
	$loop = 0;
	
	foreach($fav->user_favorites as $fav_prop){
		$add = '';
		if($loop != 0){
			$add = 'border-top:1px solid #ccc';
		}
		$loop++;
	?>
    <div style="<?php echo $add; ?>">
      <div style="float:left; width:225px;"> 
      	<a target="_blank" href="<?php echo WEBSITE_URL.'property-details/?details='.$fav_prop["mls_id"]; ?>">
			<img src="<?php echo $fav_prop['property']['first_image']; ?>" width="225" height="175" style="border:1px solid #ccc"  />
        </a> </div>
      <div style="float:right; width:70%;">
        <div>
          <?php
				 $address = '';
				 if(!empty($fav_prop['property']['address'])){
					 $address .= $fav_prop['property']['address'].', ';
				}	
				$address .= $fav_prop['property']['city_name'].', '.$fav_prop['property']['rets_state'].' '.$fav_prop['property']['zip_code'];
				?>
          <div style="float:left;width:55%;"><?php echo $address; ?></div>
          <div style="float:left;width:42%">
            <select style="padding:5px" onchange="chooseAction( this, '<?php echo $fav_prop['mls_id']; ?>', '<?php echo $fav_prop['id']; ?>', '<?php echo $fav_prop['user_fav_category_id']; ?>')" id="actions">
              <option>I want to...</option>
              <!--<option value="Showing">Request a Showing</option>
              <option value="SendToFriend">Send to a Friend</option>-->
              <option value="ChangeCategory">Change Property Category</option>
              <option value="Delete">Remove from Favorites</option>
            </select>
          </div>
          <div class="clear"></div>
        </div>
        <div>
          <div style="float:left;width:55%;">
            <ul>
              <?php
						if(!empty($fav_prop['property']['num_beds'])){ ?>
              <li><?php echo $fav_prop['property']['num_beds']; ?> Bed</li>
              <?php 
						}	
						if(!empty($fav_prop['property']['num_fbaths'])){ ?>
              <li><?php echo $fav_prop['property']['num_fbaths']; ?> Bath</li>
              <?php 
						}	
						if(!empty($fav_prop['property']['list_price'])){ ?>
              <li><?php echo  '$'.number_format($fav_prop['property']['list_price'], 0, ".", ",");  ?></li>
              <?php 
						}	
						if(!empty($fav_prop['property']['sqft_liv_area'])){ ?>
              <li><?php echo $fav_prop['property']['sqft_liv_area']; ?> Square Feet</li>
              <?php 
						}	
						?>
            </ul>
            <a  target="_blank" href="<?php echo WEBSITE_URL.'property-details/?details='.$fav_prop["mls_id"]; ?>" style="margin-bottom:5%;" class="custom-button small">More info</a> </div>
          <div style="float:left;width:42%"> 
          	<span class="notesLabel">Notes:</span>&nbsp;&nbsp;<span id="note_error_<?php echo $fav_prop['id']; ?>" style="font-size:small;color:red;display:none;"></span>
            <br>
          	<?php
				$add_display = $edit_display = $show_w = '';
            	if(!empty($fav_prop['notes'])){
					$add_display = 'style="display:none;"';
					$show_w = 'edit_note_link_';					
				}else{
					$edit_display = 'style="display:none;"';
					$show_w = 'add_note_link_';
				}
			?>
            <div id="add_note_link_<?php echo $fav_prop['id']; ?>" <?php echo $add_display; ?>>
              <p><a onclick="$('#add_note_link_'+<?php echo $fav_prop['id']; ?>).hide();$('#txt_fav_'+<?php echo $fav_prop['id']; ?>).show('slow');" href="javascript:;">Add Notes</a></p>
            </div>
            <div id="edit_note_link_<?php echo $fav_prop['id']; ?>" <?php echo $edit_display; ?>>
              <p>
			  	<span id="notes_<?php echo $fav_prop['id']; ?>"><?php echo !empty($fav_prop['notes'])?$fav_prop['notes']:''; ?></span>
              	| <a onclick="$('#edit_note_link_'+<?php echo $fav_prop['id']; ?>).hide();$('#txt_fav_'+<?php echo $fav_prop['id']; ?>).show('slow');" href="javascript:;">Edit Notes</a>
              </p>
            </div>
            <div id="txt_fav_<?php echo $fav_prop['id']; ?>" style="display:none;">
            	<textarea style="margin-bottom:1em;width:180px;" rows='5' id="txtarea_notes_<?php echo $fav_prop['id']; ?>"><?php echo !empty($fav_prop['notes'])?$fav_prop['notes']:''; ?></textarea>
                <input type="button" onclick="show_note_link(<?php echo $fav_prop['id']; ?>,'<?php echo $show_w ?>')" style="width:90px;background-color: #0A57A3;color: white;padding: 10px;border: none;" value="Cancel" >
                <input type="button" onclick="save_fav_notes(<?php echo $fav_prop['id']; ?>);" style="width:90px;background-color: #0A57A3;color: white;padding: 10px;border: none;" value="Update" >
                <img src="<?=$base?>img/loader.gif" id="notes_loader_<?php echo $fav_prop['id']; ?>" style="display:none" /><br />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <?php } ?>
    <?php } ?>
  </div>
 </div>
 <div class="clear"></div>
  <?php	
} 
} ?>
</div>
<div class="title-div">
	<h4>Add Category</h4>
    <div>
    	<p>
        	Category Name: 	<input type="text" id="add_cat_name" style="width:185px;padding:10px;" />&nbsp;&nbsp;<span style="font-size:small;color:red;" id="cat_name_error"></span>
    	</p>
    </div>
    <div style="margin-left:12%; ">
    	<input type="button" onclick="add_cat();" style="width:85px;background-color:#0A57A3;color: white;padding: 10px;border: none;" value="Add" >
        <img src="<?=$base?>img/loader.gif" id="cat_name_loader" style="display:none" />
    </div>
</div>

<script>
	function toggleDetails(class_name){
		jQuery('.'+class_name).toggle('slow');
	}
	function show_description(cat_id){
		jQuery('#description_'+cat_id).toggle('slow');
	}
	function show_note_link(note_id, which){
		jQuery("#txt_fav_"+note_id).hide();
		jQuery('#'+which+note_id).show('slow');
	
	}
	function show_notes_txt(note_id, which){
		jQuery('#'+which+note_id).hide();
		jQuery("#txt_fav_"+note_id).show('slow');
	}
	
	function save_cat_description(cat_id){
		var cat_description = $('#txt_cat_desc_'+cat_id).val();
		
		$('img#cat_loader_'+cat_id).show();
		$.post("<?php echo $base; ?>account/manage_favorites/save_cat_description/"+cat_id,{cat_description:cat_description},function(data){
			if(data == 1){
				$('span#cat_description_'+cat_id).html(cat_description);
				$('#description_'+cat_id).hide('slow');
			}else{
				$('#cat_description_msg_'+cat_id).html(data);
			}
			$('img#cat_loader_'+cat_id).hide();
		});
	}
	
	function delete_category(cat_id){
		if(confirm('Are you sure you want to delete this category?')){
			$('img#cat_delete_loader_'+cat_id).show();
			$.post("<?php echo $base; ?>account/manage_favorites/delete_category/"+cat_id,{},function(data){
				if(data == 1){
					$('div#main_cat_div_'+cat_id).remove();
					$('#delete_cat_message_'+cat_id).html("Category deleted successfully.").show().hide(8000);
				}else{
					$('#delete_cat_message_'+cat_id).html(data).show().hide(8000);	
				}
				$('img#cat_delete_loader_'+cat_id).hide();
			});
			
		}
	}
	
	function save_fav_notes(fav_id){
		var fav_notes = $('#txtarea_notes_'+fav_id).val();
		$('#note_error_'+fav_id).hide();
		$('img#notes_loader_'+fav_id).show();
		$.post("<?php echo $base; ?>account/manage_favorites/save_fav_notes/"+fav_id,{fav_notes:fav_notes},function(data){
			if(data == 1){
				$('span#notes_'+fav_id).text(fav_notes);
				$('#txt_fav_'+fav_id).hide();
				
				if(fav_notes == ''){
					$('#add_note_link_'+fav_id).show('slow');
				}else{
					$('#edit_note_link_'+fav_id).show('slow');
				}
			}else{
				$('#note_error_'+fav_id).html(data).show('slow');
			}
			$('img#notes_loader_'+fav_id).hide();
		});
	}
	
	function add_cat(){
		$("#cat_name_error").hide();
		var cat_name = $('#add_cat_name').val();

		$('img#cat_name_loader').show();
		$.post("<?php echo $base; ?>account/manage_favorites/add_cat_name/",{cat_name:cat_name},function(data){
			if(data == 1){
				 window.location.reload();
			}else if(data == 0){
				$("#cat_name_error").html("Category name is required.").show();
			}else{
				$("#cat_name_error").html('Error saving category.').show();
			}
			$('img#cat_name_loader').hide();
		});
		
	
	}
	
	function chooseAction(ref, mlsID, favID, catID){
		var width = 970;
		var height = 960;
		if(ref.value=="Showing"){
			$.nmManual('<?php echo $base; ?>schedule/index/'+mlsID, {
				modal: false,
				resizable: true,
				sizes: {    // Size information
					initW: width, initH: height,
					minW: width, minH: height,
					w: width, h: height
				}
			});
		}
		if(ref.value=="SendToFriend"){
			$.nmManual('<?php echo $base; ?>contact/index/'+mlsID, {
				modal: false,
				resizable: true,
				sizes: {    // Size information
					initW: width, initH: height,
					minW: width, minH: height,
					w: width, h: height
				}
			});
		}
		if(ref.value=="Delete"){
			if(confirm("Are you sure you want to delete favorite property?")){
				location.href = "<?php echo $base; ?>contact/removeProperty/"+favID;
			}
		}
		if(ref.value=="ChangeCategory"){
			var width = 350;
			var height = 300;
			var d = '<?=time();?>';
			$.nmManual('<?php echo $base; ?>contact/changeCat/'+catID+'/'+favID+'/'+mlsID+"/?d="+d, {
				modal: false,
				resizable: true,
				sizes: {    // Size information
					initW: width, initH: height,
					minW: width, minH: height,
					w: width, h: height
				}
			});
		}
	}
	
	$(document).ready(function(data){
		var width = 960;
		var height = 960;
		$('a.nyroModal').nyroModal({
			sizes: {
				initW: width, initH: height,
				minW: width, minH: height,
				w: width, h: height
			},
			modal:false
		});
	});
</script>
