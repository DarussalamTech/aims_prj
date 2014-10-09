<link rel="stylesheet" href="<?=$base?>bootstrap/css/advanced_search.css">
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
	min-height: 333px;
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
	line-height: 30px;
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
.exc_resul{
	width:100%;
}
.exc_resul_col{
	width:33%;
}
@media (max-width:480px){

	}
</style>
<div class="ad_container">
<div style="" id="exclusive_listing">
	<?php
	if(!empty($properties) && $properties != 'noresult'){ ?>
		<div class="paging"><?php //echo $page_links ?></div>
		<div id="tab4" class="tabContents">
           <div class="exc_resul">
		  <?php
			$r=1;
			foreach($properties as $property_details){
				$last_class = '';
				$address = '';
				
				if(!empty($property_details["49"])){
				 $address .= $property_details["49"].', ';
				}
				$address .= $property_details["2302"].', '.$property_details["2304"].' '.$property_details["46"];
		
			?>
			  <div class="exc_resul_col"><div class="searchResult"> <a class="propPhotoWrapper" title="View Full Property Details For <?php echo $address; ?>" href="<?php echo "http://" . $_SERVER['HTTP_HOST'].'/property-details/?mls='.$property_details["175"]; ?>">
				  <?php show_property_image($property_details["sysid"]); ?>
				  </a>
				  <div class="propDetails">
					<h3> <a title="View Full Property Details For  <?php echo $address; ?>" href="<?php echo "http://" . $_SERVER['HTTP_HOST'].'/property-details/?mls='.$property_details["175"]; ?>">
					  <?php 
						if(!empty($property_details["49"])){
							echo $property_details["49"].',<br />';
						}
						echo $property_details["2302"].', '.$property_details["2304"].' '.$property_details["46"];
					 ?>
					  </a>
					</h3>
					<p class="priceBlock"> <span class="price">
					<?php
						if(!empty($property_details["176"])){
							if($property_details["176"] < 10){
								echo '$' . number_format($property_details["176"], 0, ".", ",").',000,000';
							}elseif($property_details["176"] > 10 && $property_details["176"] < 1000){
								echo '$' . number_format($property_details["176"], 0, ".", ",").',000';
							}else{
								echo '$' . number_format($property_details["176"], 0, ".", ","); 
							}
							
		
						}else{
							echo 'Price: Contact realtor';
						}
					?>
					  </span> </p>
					<?php if((!empty($property_details["32"])) || (!empty($property_details["2294"])) || (!empty($property_details["2622"])) ){ ?>
					<p>
					  <?php 
							if(!empty($property_details["32"])){
								echo $property_details["32"].' Bed | '; 
							}
							if(!empty($property_details["2294"])){
								echo $property_details["2294"].' Bath | '; 
							}
							if(!empty($property_details["2622"])){
								echo number_format($property_details["2622"], 0, ".", ",").' Sq Ft'; 
							}
						?>
					</p>
					<?php } ?>
					<p class="distance">
					  <?php 
							if(!empty($property_details["distance"])){
								echo round($property_details["distance"],2).' Miles Away'; 
							}
						?>
					</p>
					<p class="listingInfo">
					  <?php 
							if(!empty($property_details["2368"])){
								echo 'Listing by '.$property_details["2368"]; 
							}
						?>
					</p>
				  </div>
				</div></div>
			  <?php
					if($r % 3 == 0){
					   echo '</div><div class="exc_resul">';
					}
				   $r++;
				}
			?>
		  
		</div>
		<div class="paging"><?php //echo $page_links ?></div>
	<!-- //tab4 -->
	<?php
		}else{
			echo "No records found";
		}
	?>
	<!--<input type="hidden" id="search_form" value="<?php //echo $search_form; ?>" />-->
	</div>
</div>