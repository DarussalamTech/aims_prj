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
	color: #00BCD9;
}

#tab4 .searchResult .propDetails p {
	color: #6F6F6F;
	line-height: 20px;
	font-size: 12px;
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
	margin: 4% 0 3% 0;
	font-size: 21px;
	font-weight: bold;
	text-align:center;
}
.paging a{
	font-size: 21px;
	font-weight: bold;
	text-decoration:none;
	color: #4ABAD6;
}
</style>
<div style="float:right; margin:10px 20px 0 0;">
<a href="javascript:;" onClick="show_advanced_form();">Search again</a>
</div>

<h3 class="shadowHeader">Search Results</h3>
<?php
if(!empty($properties) && $properties != 'noresult'){ ?>
	<div class="paging"><?php echo $page_links ?></div>		
    <div id="tab4" class="tabContents" style="min-height:1415px;">
      <table>
        <tr>
      <?php 
        $r=1;
    
        
            function objectToArray($properties) {
        if (is_object($properties)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $properties = get_object_vars($properties);
        }
  
        if (is_array($properties)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__FUNCTION__, $properties);
        }
        else {
            // Return array
            return $properties;
        }
    }
        
        
        
     //  $array = (array)$properties;
     //   $array_property = json_decode(json_encode($properties), true);
       //  $array_property = json_decode($properties, true);
       // $array_property = json_encode(json_decode($properties), true);
     //   print_r(objectToArray($properties));
        $array_property= objectToArray($properties);
        foreach($array_property as $property_details){
            $last_class = '';
            $address = '';
          //  print_r($property_details ["sysid"]);
          // echo $property_details ["sysid"];
          
            
              if(!empty($property_details["address"])){
             $address .= $property_details["address"].', ';
            }	
            $address .= $property_details["city_name"].', '.$property_details["rets_state"].' '.$property_details["zip_code"];
    
        ?>
             <td><div class="searchResult"> <a class="propPhotoWrapper" title="View Full Property Details For <?php echo $address; ?>"  onclick="recently_viewed('<?php echo $property_details["sysid"]; ?>');" href="<?php echo $base.'property-details/'.$property_details["ml_num"]; ?>">
             <img src="<?php echo $property_details["first_image"]; ?>" />

              </a>
              <div class="propDetails">
                  <h3> <a title="View Full Property Details For  <?php echo $address;?>" onclick="recently_viewed('<?php echo $property_details["sysid"]; ?>');" href="<?php echo $base.'property-details/'.$property_details["ml_num"]; ?>">
                <?php 
                    if(!empty($property_details["address"])){
            echo $property_details["address"].', ';
            }	
         echo   $property_details["city_name"].', '.$property_details["rets_state"].' '.$property_details["zip_code"];
    
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
                <?php if((!empty($property_details["num_beds"])) || (!empty($property_details["num_fbaths"])) ){ ?>
                <p>
                   <?php 
                        if(!empty($property_details["num_beds"])){
                            echo $property_details["num_beds"].' Bed | '; 
                        }
                        if(!empty($property_details["num_fbaths"])){
                            echo $property_details["num_fbaths"].' Bath | '; 
                        }
                       // (2622) N/a using  API   
                    ?>
                </p>
                 <?php } ?>
                <p class="distance">
                  <?php 
                        if(!empty($property_details ["distance"])){
                            echo round($property_details ["distance"],2).' Miles Away'; 
                        }
                    ?>
                </p>
            <p class="listingInfo">
             <!--  office_name (2368 ) N/a using  API       -->
                </p>
              </div>
            </div></td>
          <?php
                if($r % 3 == 0){
                   echo '</tr><tr>';
                }
               $r++;
            }
}
            
        ?>
      </table>
    </div>
    <div class="paging"><?php echo $page_links ?></div>		
<!-- //tab4 -->

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
	$.cookie('sysids_cookie', new_value, { expires: 7, path: '/', domain: 'candacecourter.com' });
	
	//var all_cook = $.cookie('sysids_cookie');
	//console.log(all_cook);
}
</script>

