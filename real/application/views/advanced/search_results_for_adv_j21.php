<link rel="stylesheet" href="<?=$base?>bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="<?=$base?>bootstrap/css/bootstrap-responsive.css"> 
<link rel="stylesheet" href="<?=$base?>bootstrap/css/style.css">

<style>
#tabContaier_main {
	background:#f0f0f0;
	border:1px solid #fff;
	padding:20px;
	position:relative;/*width:500px;*/
}
#tabContaier ul {
	overflow:hidden;
	border-right:1px solid #fff;
	height:35px;
	position:absolute;
	z-index:100;
}
#tabContaier li {
	float:left;
	list-style:none;
}
#tabContaier li a {
	background:#ddd;
	border:1px solid #fcfcfc;
	border-right:0;
	color:#666;
	cursor:pointer;
	display:block;
	height:35px;
	line-height:35px;
	padding:0 30px;
	text-decoration:none;
	text-transform:uppercase;
}
#tabContaier li a:hover {
	background:#eee;
}
#tabContaier li a.active {
	background:#fbfbfb;
	border:1px solid #fff;
	border-right:0;
	color:#333;
}
.tabDetails {
	background:#fbfbfb;
	border:1px solid #fff;
	margin:34px 0 0;
}
.tabContents {
	padding:0px
}
.tabContents h1 {
	font:normal 24px/1.1em Georgia, "Times New Roman", Times, serif;
	padding:0 0 10px;
}
.tabContents th, .tabContents td {
	border-top: 1px solid #F0ECED;
	padding: 10px;
}
/* other than tabs classes starts here */
	
	
#mainData {
	float: left;
	font-size: 14px;
	line-height: 30px;
	margin-left: 20px;
	margin-top: -8px;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
#tab1 table td {
	color: #000000;
	font-weight: bold;
}
#tab1 td {
	line-height: 18px;
	padding: 7px 0;
	width: 145px;
}
#tab1 table td.label {
	color: #666666;
	font-weight: normal;
}
#tab1 .label {
	width: 125px;
}
#tab1 p#remarks {
	line-height: 160%;
}
#mainAddress {
	line-height: 30px;
	padding-left: 20px;
}
#price {
	padding-right: 15px;
}
.floatRight {
	float: right;
}
.floatLeft {
	float: left;
}
/*results classes*/
#tab4 {
	width:750px;
}

#tab4 .searchResult img {
	box-shadow: 0 0 7px #323232;
	width:195px;
	height: 155px;
}
#tab4 .searchResult {
	float: left;
	margin-right: 15px;
	margin-top: 29px;
	min-height: 320px;
	width: 195px;
}
#tab4 .searchResult.last-in-row {
	margin-right: 0;
}
#tab4 .searchResult .propDetails h3 {
	padding-top: 3px;
	color: #F88428;
	font-size: 12px;
	font-weight: bold;
	line-height: 20px;
}

#tab4 .searchResult .propDetails a {
	color: #0A57A3;
}

#tab4 .searchResult .propDetails p {
	color: #6F6F6F;
	line-height: 20px;
	font-size: 12px;
	margin-bottom: 0;
}
#tab4 .distance {
	font-style: italic;
}
#tab4 .searchResult .propDetails p.listingInfo {
	color: #959595;
	font-size: 10px;
	line-height: 15px;
}
.paging{
	margin: 4% 28px 3% 0;
	font-size: 21px;
	font-weight: bold;
	text-align:center;
}
.paging a{
	font-size: 21px;
	font-weight: bold;
	text-decoration:none;
	color: #0A57A3;
}
</style>
<div>
    <div style="float:left; margin-top:10px">
        <h4 class="shadowHeader">Search Results</h4>
    </div>
    <div style="float:left;width: 60%;text-align:center; margin-top:10px">
    	<h4>Listings: 
		  <?php  
			if(!empty($total_rows) && ($total_rows >= 9999) ){
				echo '9000+'; 
			}else{
				echo number_format($total_rows, 0, ".", ","); 
			}
		?></h4>
    </div>
    <div style="float:right; margin:10px 20px 0 0;">
        <h4><a href="javascript:;" onClick="show_advanced_form();" style="background-color:#0A57A3;padding:10px;color:#fff;font-weight:bold;  ">Search again</a></h4>
    </div>
</div>
<div style="clear:both; margin-bottom:25px;"></div>
<?php
if(!empty($properties) && $properties != 'noresult'){ ?>
	<div class="paging"><?php echo $page_links ?></div>		
    <div id="tab4" class="tabContents" style="min-height:1415px;">
      <table>
        <tr>
      <?php 
        $r=1;
        
       /* echo '<pre>';
        print_r($properties); exit;*/
        foreach($properties as $property_details){
            $last_class = '';
            $address = '';
            
            if(!empty($property_details["address"])){
             $address .= $property_details["address"].', ';
            }	
            $address .= $property_details["city_name"].', '.$property_details["rets_state"].' '.$property_details["zip_code"];
    
        ?>
          <td><div class="searchResult"> <a class="propPhotoWrapper" target="_blank" title="View Full Property Details For <?php echo $address; ?>"  onclick="recently_viewed('<?php echo $property_details["sysid"]; ?>');" href="<?php echo WEBSITE_URL.'property-details/?details='.$property_details["ml_num"]; ?>">
              <img src="<?php echo $property_details['first_image']; ?>" />
              </a>
              <div class="propDetails">
                <h3> 
                <a title="View Full Property Details For  <?php echo $address; ?>" target="_blank" onclick="recently_viewed('<?php echo $property_details["sysid"]; ?>');" href="<?php echo WEBSITE_URL.'property-details/?details='.$property_details["ml_num"]; ?>">
                  <?php 
                    if(!empty($property_details["address"])){
                        echo $property_details["address"].',<br />';
                    }
                    echo $property_details["city_name"].', '.$property_details["rets_state"].' '.$property_details["zip_code"];
					/*echo $property_details["property_type"];
					echo $property_details["status"];*/
                 ?>
                  </a>
                </h3>
                <p class="priceBlock"> <span class="price">
                <?php 
                    if(!empty($property_details["list_price"])){
							if($property_details["list_price"] < 10){
								echo '$' . number_format($property_details["list_price"], 0, ".", ",").',000,000';
							}elseif($property_details["list_price"] > 10 && $property_details["list_price"] < 1000){
								echo '$' . number_format($property_details["list_price"], 0, ".", ",").',000';
							}else{
								echo '$' . number_format($property_details["list_price"], 0, ".", ","); 
							}
    
                    }else{
                        echo 'Price: Contact realtor';
                    }
                ?>
                  </span> </p>
                <?php if((!empty($property_details["num_beds"])) || (!empty($property_details["num_fbaths"])) || (!empty($property_details["sqft_liv_area"])) ){ ?>
                <p>
                  <?php 
                        if(!empty($property_details["num_beds"])){
                            echo $property_details["num_beds"].' Bed | '; 
                        }
                        if(!empty($property_details["num_fbaths"])){
                            echo $property_details["num_fbaths"].' Bath | '; 
                        }
                        if(!empty($property_details["sqft_liv_area"])){
                            echo number_format($property_details["sqft_liv_area"], 0, ".", ",").' Sq Ft'; 
                        }
                    ?>
                </p>
                <?php } ?>
                <?php /*?><p class="distance">
                  <?php 
                        if(!empty($property_details["distance"])){
                            echo round($property_details["distance"],2).' Miles Away'; 
                        }
                    ?>
                </p><?php */?>
                <p class="listingInfo">
                  <?php 
                        if(!empty($property_details["office_name"])){
                            echo 'Listing by '.$property_details["office_name"]; 
                        }
                    ?>
                </p>
              </div>
            </div></td>
          <?php
                if($r % 3 == 0){
                   echo '</tr><tr>';
                }
               $r++;
            }
            
        ?>
      </table>
    </div>
    <div class="paging"><?php echo $page_links ?></div>		
<!-- //tab4 -->
<?php 
	}else{
		echo "No records found";
	}
?>
<input type="hidden" id="search_form" value="<?php echo $search_form; ?>" />
<script>
$(document).ready(function() {
	
	
	$('.paging').delegate('.pgn_search_results', 'click', function(e) {
		e.preventDefault();
		var search_form = $('#search_form').val();
		
		var offset = $(this).attr('href');
		if (offset == '/') {
			offset = 0;
		}
		else {
			offset = offset.substr(1);
		}
		$('#search_offset').val(offset);

		//if(search_form == 'simple_search'){
			//$("#simple_search").submit();
		//}else if(search_form == 'AdvancedSearchForm'){
			$("#"+search_form).submit();
		//}
		
		
	});
	
})

function recently_viewed(sysid){

	var previous_sysids = $.cookie('sysids_cookie');
	//console.log(previous_sysids);
	var new_value = previous_sysids+' '+sysid;
	//console.log(new_value);
	$.cookie('sysids_cookie', new_value, { expires: 7, path: '/', domain: 'bonniestrickland.com' });
	
	//var all_cook = $.cookie('sysids_cookie');
	//console.log(all_cook);
}
</script>
