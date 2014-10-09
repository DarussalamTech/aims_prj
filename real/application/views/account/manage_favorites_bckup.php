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
</style>
<div class="wpcf7" style="margin:2% 0 6% 0;">
  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
  <div style="margin-top:2%;">&nbsp;</div>
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
      	<span class="toggle_div_<?php echo $fav->id; ?>">+</span><span class="toggle_div_<?php echo $fav->id; ?>" style="display:none">-</span>&nbsp;&nbsp; 
      	<a href="javascript:;">Category: <?php echo $fav->name; ?></a> (<?php echo !empty($fav->user_favorites)?count($fav->user_favorites):0; ?> Properties) 
        <img src="<?=$base?>img/loader.gif" id="cat_delete_loader_<?php echo $fav->id; ?>" style="display:none" />
        <br />
      </div>
      <div class="right_contents"><a href="#">Email</a> | <a href="javascript:;" onclick="delete_category(<?php echo $fav->id; ?>);">Delete</a></div>
      <div class="clear"></div>
      <div> <span style="font-size:small;margin-left:3%;" id="cat_description_<?php echo $fav->id; ?>"><?php echo !empty($fav->description)?$fav->description:''; ?></span> <a style="margin-left:1%;font-size:14px;" onclick="show_description(<?php echo $fav->id; ?>);" href="javascript:;">Add Description</a> </div>
      <div style="display:none;margin-left:3%;" id="description_<?php echo $fav->id; ?>">
        <table style="width: auto;margin-top:1%;">
          <tbody>
            <tr>
              <td valign="top">Description:</td>
              <td style="margin-left:1%;"><textarea id="txt_cat_desc_<?php echo $fav->id; ?>" rows="4" cols="25" style="max-width:45%;margin-bottom:0px;" name="txt_cat_desc_<?php echo $fav->id; ?>"><?php echo !empty($fav->description)?$fav->description:''; ?></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td style="padding-top:10px;">
              	<input type="button" onclick="$('#description_'+<?php echo $fav->id; ?>).hide('slow');" style="width:140px;margin-left:1%;" value="Cancel" >
                <input type="button" onclick="save_cat_description(<?php echo $fav->id; ?>);" style="width:140px;" value="Save" >
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
      <p>Search Properties to begin adding favorites</p>
    </div>
    <div class="clear"></div>
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
    <div style="margin-top:2%;padding-top:2%;<?php echo $add; ?>">
      <div style="float:left; width:225px;"> 
      	<a target="_blank" href="<?php echo "http://" . $_SERVER['HTTP_HOST'].'/property-details/'.$fav_prop->mls_id; ?>">
        	<?php show_property_image($fav_prop->sysid,'style="width:225px;height:175px;border:1px solid #ccc;"'); ?>
        </a> </div>
      <div style="float:right; width:70%;">
        <div>
          <?php
				 $address = '';
				 if(!empty($fav_prop->Address)){
					 $address .= $fav_prop->Address.', ';
				}	
				$address .= $fav_prop->City.', '.$fav_prop->State.' '.$fav_prop->Zip;
				?>
          <div style="float:left;width:55%;"><?php echo $address; ?></div>
          <div style="float:left;width:42%">
            <select onchange="openPopUp( this )" id="11136503">
              <option>I want to...</option>
              <?php /*?><option value="RequestInfo">Request Additional Information</option><?php */?>
              <option value="Showing">Request a Showing</option>
              <option value="SendToFriend">Send to a Friend</option>
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
						if(!empty($fav_prop->bed)){ ?>
              <li><?php echo $fav_prop->bed; ?> Bed</li>
              <?php 
						}	
						if(!empty($fav_prop->bath)){ ?>
              <li><?php echo $fav_prop->bath; ?> Bath</li>
              <?php 
						}	
						if(!empty($fav_prop->price)){ ?>
              <li><?php echo  '$'      . number_format($fav_prop->price, 0, ".", ",");  ?></li>
              <?php 
						}	
						if(!empty($fav_prop->sqft)){ ?>
              <li><?php echo $fav_prop->sqft; ?> Square Feet</li>
              <?php 
						}	
						?>
            </ul>
            <a  target="_blank" href="<?php echo "http://" . $_SERVER['HTTP_HOST'].'/property-details/'.$fav_prop->mls_id; ?>" style="margin-bottom:5%;" class="custom-button small">More info</a> </div>
          <div style="float:left;width:42%"> <span class="notesLabel">Notes:</span><br>
          	<?php
				$add_display = $edit_display = $show_w = '';
            	if(!empty($fav_prop->notes)){
					$add_display = 'style="display:none;"';
					$show_w = 'edit_note_link_';					
				}else{
					$edit_display = 'style="display:none;"';
					$show_w = 'add_note_link_';
				}
			?>
            <div id="add_note_link_<?php echo $fav_prop->id; ?>" <?php echo $add_display; ?>>
              <p><a onclick="$('#add_note_link_'+<?php echo $fav_prop->id; ?>).hide();$('#txt_fav_'+<?php echo $fav_prop->id; ?>).show('slow');" href="javascript:;">Add Notes</a></p>
            </div>
            <div id="edit_note_link_<?php echo $fav_prop->id; ?>" <?php echo $edit_display; ?>>
              <p>
			  	<span id="notes_<?php echo $fav_prop->id; ?>"><?php echo !empty($fav_prop->notes)?$fav_prop->notes:''; ?></span>
              	| <a onclick="$('#edit_note_link_'+<?php echo $fav_prop->id; ?>).hide();$('#txt_fav_'+<?php echo $fav_prop->id; ?>).show('slow');" href="javascript:;">Edit Notes</a>
              </p>
            </div>
            <div id="txt_fav_<?php echo $fav_prop->id; ?>" style="display:none;">
            	<textarea style="margin-bottom:1em;width:180px;" id="txtarea_notes_<?php echo $fav_prop->id; ?>"><?php echo !empty($fav_prop->notes)?$fav_prop->notes:''; ?></textarea>
                <input type="button" onclick="show_note_link(<?php echo $fav_prop->id; ?>,'<?php echo $show_w ?>')" style="width:90px;" value="Cancel" >
                <input type="button" onclick="save_fav_notes(<?php echo $fav_prop->id; ?>);" style="width:90px;" value="Update" >
                <img src="<?=$base?>img/loader.gif" id="notes_loader_<?php echo $fav_prop->id; ?>" style="display:none" /><br />
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
			}
			$('img#notes_loader_'+fav_id).hide();
		});
	}
</script>
