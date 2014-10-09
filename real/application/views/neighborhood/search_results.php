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
	min-height: 350px;
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
	margin:10px 0 10px 0;
	padding:0px;
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
.paging {
	margin: 0 0 3%;
	font-size: 21px;
	font-weight: bold;
	text-align:center;
}
.paging a {
	font-size: 21px;
	font-weight: bold;
	text-decoration:none;
	color: #4ABAD6;
}
</style>
<?php if(!empty($properties) && $properties != 'noresult'){ ?>
<div class="paging"><?php echo $page_links ?></div>		
<div id="tab4" class="tabContents">
  <table>
    <tr>
  <?php 
	$r=1;
	foreach($properties as $poly_details){
			 $address = '';

			 if(!empty($poly_details["49"])){
				 $address = $poly_details["49"].', ';
			}	
			$address .= $poly_details["2302"].', '.$poly_details["2304"].' '.$poly_details["46"];
?>
      <td><div class="searchResult"> <a class="propPhotoWrapper" title="View Full Property Details For <?php echo $address; ?>" href="<?php echo "http://" . $_SERVER['HTTP_HOST'].'/real-estate/property-details/'.$poly_details["175"]; ?>">
          <?php show_property_image($poly_details["sysid"]); ?>
          </a>
          <div class="propDetails">
            <h3> <a title="View Full Property Details For  <?php echo $address; ?>" href="<?php echo "http://" . $_SERVER['HTTP_HOST'].'/real-estate/property-details/'.$poly_details["175"]; ?>">
              <?php 
					 if(!empty($poly_details["49"])){
						echo $poly_details["49"].', ';
					}
					echo $poly_details["2302"].', '.$poly_details["2304"].' '.$poly_details["46"];
				 ?>
              </a> </h3>
            <p class="priceBlock"> <span class="price">
              <?php 
					if(!empty($poly_details["176"])){
						if($poly_details["176"] < 10){
							echo '$' . number_format($poly_details["176"], 0, ".", ",").',000,000';
						}elseif($poly_details["176"] > 10 && $poly_details["176"] < 1000){
							echo '$' . number_format($poly_details["176"], 0, ".", ",").',000';
						}else{
							echo '$' . number_format($poly_details["176"], 0, ".", ","); 
						}

					}else{
						echo 'Price: Contact realtor';
					}
					
				?>
              </span> </p>
            <?php if((!empty($poly_details["32"])) || (!empty($poly_details["2294"])) || (!empty($poly_details["2346"])) ){ ?>
            <p>
              <?php 
					if(!empty($poly_details["32"])){
						echo $poly_details["32"].' Bed | '; 
					}
					if(!empty($poly_details["2294"])){
						echo $poly_details["2294"].' Bath | '; 
					}
					if(!empty($poly_details["2346"])){
						echo number_format($poly_details["2346"], 0, ".", ",").' Sq Ft'; 
					}
				?>
            </p>
            <?php } ?>
            <p class="distance">
              <?php 
					if(!empty($poly_details["distance"])){
						echo round($poly_details["distance"],2).' Miles Away'; 
					}
				?>
            </p>
            <p class="listingInfo">
              <?php 
					if(!empty($poly_details["2368"])){
						echo 'Listing by '.$poly_details["2368"]; 
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

<?php				
	
	 }else{
	 
	 echo '<div style="margin:10px; padding:10px;">No records found</div>';
	 }
?>
<script>
$(document).ready(function() {
	
	
	$('.paging').delegate('.pgn_search_results', 'click', function(e) {
		e.preventDefault();

		
		var offset = $(this).attr('href');
		if (offset == '/') {
			offset = 0;
		}
		else {
			offset = offset.substr(1);
		}
		$('#search_offset').val(offset);
		search_neigborhood()


		//$("#"+search_form).submit();

		
		
	});
	
})
</script>