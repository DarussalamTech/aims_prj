<?php // global $unisphere_options; ?>

<!DOCTYPE html>

<html class="js" lang="en-US" prefix="og: http://ogp.me/ns#">

<head>

<head>
<meta charset="UTF-8">
<base target="_parent">
	
	<title><?php echo !empty($candace_title)?$candace_title.' | ':''; ?><?=WEBSITE_NAME2?></title>

	<meta content="width=device-width,initial-scale=1" name="viewport">

	<!-- Stylesheets -->
	<link href="http://www.candacecourter.com/wp-content/themes/vanguard-child/style.css" media="all" type="text/css" rel="stylesheet">

	<link href="http://gmpg.org/xfn/11" rel="profile">
    
    <style>
    	html { height: 100% }
		body { height: 100%; margin: 0; padding: 0 }
		#map-canvas { height: 100% }
    	td { border-top: 0px solid &lt;?php echo $color_7; ?&gt;; }
		.post-meta .author { display: none!important; }
		.post-meta .post-tags { display: none!important; }.post-meta .post-comment-link { display: none!important; }
		.portfolio-detail .post-meta .published { display: none!important; }
		.portfolio-detail .post-meta .post-comment-link { display: none!important; }	
	</style>
	
		<div class="fit-vids-style">­
		<style>               
			.fluid-width-video-wrapper {                 
				width: 100%!important;                              
				position: relative;                       
				padding: 0;                            
			}
			.fluid-width-video-wrapper iframe,        
			.fluid-width-video-wrapper object,        
			.fluid-width-video-wrapper embed {           
				position: absolute;                       
				top: 0;                                   
				left: 0;                                  
				width: 100%!important;                              
				height: 100%!important;                          
			}                                       
		</style>
		</div>
		<script type="text/javascript" style="">
		/* &lt;![CDATA[ */  
		var unisphere_globals = {
	 		searchLocalized: 'To search type and hit enter', 
		 	jsFolderUrl: 'http://www.candacecourter.com/wp-content/themes/vanguard/js',
		 	themeVersion: '1.5.1',
		 	cufonFonts: ''
	 	}; 
		/* ]]&gt; */ 
	</script>
	
	
<!-- This site is optimized with the Yoast WordPress SEO plugin v1.4.18 - http://yoast.com/wordpress/seo/ -->
<meta content="en_US" property="og:locale">
<meta content="article" property="og:type">
<meta content="<?php echo !empty($page_title)?$page_title:''; ?> - <?=WEBSITE_NAME2?>" property="og:title">
<?php 
	$ob_description = '';
	if(!empty($page_description)){
		$ob_description = substr($page_description,0,300).'...'; 
	}
?>
<meta content="<?php echo !empty($ob_description)?$ob_description:'Bonnie Strickland - South Tampa Real Estate | Real Estate News Blog | New Construction - Dolphin Homes. MLS Search - New Construction Search | Integrity'; ?>" property="og:description">
<meta content="Bonnie Strickland" property="og:site_name">
<!-- / Yoast WordPress SEO plugin. -->

<link href="http://www.bonniestrickland.com/feed/" title="Bonnie Strickland » Feed" type="application/rss+xml" rel="alternate">
<!--<link rel="stylesheet" type="text/css" href="http://www.bonniestrickland.com/wp-content/themes/strickland-wp/style.css" />-->
<link href="http://www.bonniestrickland.com/comments/feed/" title="Bonnie Strickland » Comments Feed" type="application/rss+xml" rel="alternate">
<link media="screen" type="text/css" href="http://www.candacecourter.com/wp-content/plugins/q-and-a/css/q-a-plus.css?ver=1.0.6.2" id="q-a-plus-css" rel="stylesheet">
<link media="all" type="text/css" href="http://www.candacecourter.com/wp-content/plugins/LayerSlider/css/layerslider.css?ver=4.5.5" id="layerslider_css-css" rel="stylesheet">
<link media="all" type="text/css" href="http://www.candacecourter.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=3.5.3" id="contact-form-7-css" rel="stylesheet">
<link media="all" type="text/css" href="http://www.candacecourter.com/wp-content/plugins/latest-custom-post-type-updates/css/tm_lcptu_basic_styles.css?ver=1.3.0" id="tm-lcptu-styles-css" rel="stylesheet">
<link media="all" type="text/css" href="http://www.candacecourter.com/wp-content/plugins/wp-glossary-custom/css/wp-glossary.css?ver=3.6.1" id="wp-glossary-css-css" rel="stylesheet">
<link media="all" type="text/css" href="http://www.candacecourter.com/wp-content/plugins/wp-glossary-custom/ext/jquery.qtip.css?ver=3.6.1" id="wp-glossary-qtip-css-css" rel="stylesheet">
<link media="all" type="text/css" href="http://www.candacecourter.com/wp-content/themes/vanguard/css/skin.php?ver=3.6.1" id="skin-css" rel="stylesheet">
<link media="screen" type="text/css" href="http://www.candacecourter.com/wp-content/themes/vanguard/css/mobile.css?ver=3.6.1" id="mobile-css" rel="stylesheet">
<link media="all" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C300italic%2C400%2C400italic%2C600%2C600italic%2C700%2C700italic%7COpen+Sans%3A600%7COpen+Sans%3A700%7COpen+Sans%3A400%7COpen+Sans%3A700%7COpen+Sans%3A300%2C400%2C600%2C700%7COpen+Sans%3A700%7COpen+Sans%3A600%7COpen+Sans%3A400%7COpen+Sans%3A700%7COpen+Sans%3A600%7COpen+Sans%3A700&amp;ver=3.6.1" id="google_fonts-css" rel="stylesheet">
<script src="http://www.candacecourter.com/wp-content/plugins/jquery-updater/js/jquery-2.0.3.min.js?ver=2.0.3" type="text/javascript"></script>
<script src="http://www.candacecourter.com/wp-includes/js/comment-reply.min.js?ver=3.6.1" type="text/javascript"></script>
<script src="http://www.candacecourter.com/wp-content/plugins/LayerSlider/js/layerslider.kreaturamedia.jquery.js?ver=4.5.5" type="text/javascript"></script>
<script src="http://www.candacecourter.com/wp-content/plugins/LayerSlider/js/jquery-easing-1.3.js?ver=1.3.0" type="text/javascript"></script>
<script src="http://www.candacecourter.com/wp-content/plugins/LayerSlider/js/jquerytransit.js?ver=0.9.9" type="text/javascript"></script>
<script src="http://www.candacecourter.com/wp-content/plugins/LayerSlider/js/layerslider.transitions.js?ver=4.5.5" type="text/javascript"></script>
<script src="http://www.candacecourter.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1" type="text/javascript"></script>
<!--<script src="http://maps.google.com/maps/api/js?sensor=false&amp;ver=3.6.1" type="text/javascript"></script><script type="text/javascript" src="http://maps.gstatic.com/intl/en_us/mapfiles/api-3/15/5/main.js"></script>-->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBBLxjLSgvOYT2Okq8UA2xWtqyHftGnA3Q&sensor=false"></script>
<script src="http://www.candacecourter.com/wp-includes/js/swfobject.js?ver=2.2-20120417" type="text/javascript"></script>
<script src="http://www.candacecourter.com/wp-content/themes/vanguard/js/scripts.js?ver=3.6.1" type="text/javascript"></script>
<!-- Q & A
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/cat_js/intl/en_us/mapfiles/api-3/15/5/%7Bcommon,util,stats%7D.js"></script> -->
<!--END head-->
</head>
<!--BEGIN body-->
<body class="page page-id-1617 page-child parent-pageid-1607 page-template-default wide mozilla mozilla-25">
	<!--BEGIN #container-->
	<div id="container">
		<!--BEGIN #superior-header-container-->
		<div id="superior-header-container">
			<!--BEGIN #superior-header-->
			<div id="superior-header">
				<div id="superior-header-left">
	            </div>
	            <div id="superior-header-right">
	            </div>
    		<!--END #superior-header-->
    		</div>
		<!--END #superior-header-container-->
		</div>		
		<!--BEGIN #header-container-->
<div class="title_area">
<h1 class="the_title" style="color:#0A57A3;">Property Details</h1>
<img style="float:center" src="<?php echo base_url(); ?>bootstrap/img/page_title.png"></a>
</div>	
		<div id="content-container">
			<!--BEGIN #content-->
			<div id="content" class="clearfix">
<script>
var myCenter=new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);

function initialize()
{
    var mapProp = {
      center:myCenter,
      zoom:13,
      mapTypeId:google.maps.MapTypeId.ROADMAP
      };
    
    var map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);
    
    var marker=new google.maps.Marker({
      position:myCenter,
      });

    marker.setMap(map);
}

// google.maps.event.addDomListener(window, 'load', initialize);
</script>

<style>
    .title_area{
       
        overflow: hidden;
        padding: 10px 0;
		text-align: center; 
		text-transform: uppercase;
    }
		//background: url(images/content/page_title.png) no-repeat center bottom;

    .the_title {
    font-size: 22px;
    line-height: 26px;
    padding-bottom: 7px;
    text-align: center;
    text-transform: uppercase;
     font-family: "effra",sans-serif;
     font-weight: 400;
	 
	 
}
#tabContaier_main {
	background:#f0f0f0;
	border:1px solid #fff;
	padding:20px;
	position:relative;/*width:500px;*/
	z-index: 0;
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
	padding:20px
}
.tabContents h1 {
	font:normal 24px/1.1em Georgia, "Times New Roman", Times, serif;
	padding:0 0 10px;
}
.tabContents th, .tabContents td {
	padding: 0;
}
/* other than tabs classes starts here */
	
	

#galleryData {
	margin-bottom: 25px;
}
#mainImageWrapper {
	position: relative;
	float: left;
}
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
	color: #333;
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
/*nearby classes*/
#tab4 .searchResult img {
	box-shadow: 0 0 7px #323232;
	width:215px;
	height: 165px;
}
#tab4 .searchResult {
	float: left;
	margin-right: 29px;
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
	font-size: 14px;
	font-weight: bold;
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
.blue-bar{
	background-color: #00BCD9;
	content: "";
	display: block;
	height: 7px;
	width: 70px;
}
.title-div{
	background:#ccc;padding:1%;cursor:pointer;margin-bottom:15px;
}
.title-text{
	float:left;font-size:19px;color:#222
}
.plus{
	float:right;
	font-size:23px;
	font-weight:bolder;
	cursor:pointer;
}
.sub-details{
	float:left;width:45%;color:#333;
}
.sub-big-details{
	float:left;width:100%;color:#333;
}

#map-canvas label { width: auto; display:inline; }
#map-canvas img { max-width: none; }
div#dp-popup{
	z-index:9999 !important;
}
.dp-choose-date{
	display:none;
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
.brown-bar{
   background-color: #0A57A3;
    content: " ";
    display: block;
    height: 7px;
    width: 70px;
    
}
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/nyroModal.css">
<script src="<?php echo base_url(); ?>bootstrap/js/jquery.nyroModal.custom.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/datePicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/jquery-ui.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/demo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/custom.css" />
<script src="<?php echo base_url(); ?>bootstrap/js/date.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/jquery.datePicker.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/modernizr.custom.17475.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/jquerypp.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/jquery.elastislide.js"></script>
<?php 
 $property_details = $property_details; 
// $nearby_count = count($nearby_properties);
?>

<div id="left-panel" style="float: left; width: 210px;border-right:1px solid #F0ECED;">
  <div class="widget widget_text" id="text-12" style="margin-top:15px;border-bottom:1px solid #F0ECED;padding-bottom:15px;margin-bottom:20px;">
    <div class="textwidget">
	  <a class="nyroModal custom-button medium" style="background-color: #0A57A3 !important; margin-bottom:5%;" href="<?php echo $base.'schedule/index/'.$property_details["ml_num"];?>">Schedule a showing</a>
      <br />
      <div class="brown-bar"></div>
      <h2>Tools</h2>
      <?php if(!empty($property_details["virtual_tour"])){ ?>
      <div>
      	<a href="<?php echo $property_details["virtual_tour"]; ?>" target="_blank" >
            <img style="float:left" src="<?php echo base_url(); ?>bootstrap/img/virtual_tour.png"></a>
            <span style="float:left;margin-left:15px;margin-top:10px;">
            	<a target="_blank"  href="<?php echo $property_details["virtual_tour"];?>">Virtual Tour</a>
            </span>
      </div>
      <div class="clear"></div><br />
      <?php } ?>
      <div id="make_prop_fav">
      		<?php if(empty($is_fav)){ 
					$t = time();
			?>
      		<a href="<?php echo $base.'property_details/add_to_favorite/'.$property_details["ml_num"].'/?d='.$t;?>" class="nyroModal_fav">
            <img style="float:left" src="<?php echo base_url(); ?>bootstrap/img/favorite.png"></a>
            <span style="float:left;margin-left:15px;margin-top:10px;">
            	<a class="nyroModal_fav" href="<?php echo $base.'property_details/add_to_favorite/'.$property_details["ml_num"].'/?d='.$t;?>">Favorites</a>
			</span>
            <?php }else{ ?>
            	<img style="float:left" src="<?php echo base_url(); ?>bootstrap/img/favorite_gray.png"></a>
				<span style="float:left;margin-left:15px;margin-top:10px;">
					<a class="nyroModal_remove" href="<?php echo $base?>property_details/remove_from_favorite/<?php echo $property_details["ml_num"]; ?>">Remove from Favorites</a>
				</span>
            <?php } ?>
      </div>
      <div class="clear"></div><br />
	  <div style="min-height:70px;">
      	<?php if(empty($logged_in)){ ?>
            <img src="<?php echo base_url(); ?>bootstrap/img/notes.png" style="float:left;padding-top:3px;">
            <span style="margin-left:15px"> Property Notes</span><br>
            <span style="font-size:small;margin-left:15px;">
            	<a href="<?php echo $base.'account/login'; ?>">Login</a> or <a href="<?php echo $base.'account/signup'; ?>">Register</a> to use</span>
        <?php }else{ ?>
            <img src="<?php echo base_url(); ?>bootstrap/img/notes.png" style="float:left;padding-top:3px;">
            Property Notes<br>
            <span style="font-size:small;<?php echo !empty($prop_notes)?'display:none;':''; ?>" id="add_notes_link"><a href="javascript:;" onClick="$('#add_notes_link').toggle();$('#add_notes').toggle('slow');">Add a private note</a></span>
			<br />
            <span style="font-size:small;<?php echo !empty($prop_notes)?'':'display:none;'; ?>" id="edit_notes_link">
            	<span id="user_notes"><?php echo !empty($prop_notes)?$prop_notes.'&nbsp;&nbsp;':''; ?></span>
                <a href="javascript:;" onClick="$('#edit_notes_link').toggle();$('#add_notes').toggle('slow');">(Edit)</a>
            </span>
            
            <span style="display:none;" id="add_notes">
                <span id="notes_error" style="display:none"></span><br />
                <textarea cols="20" rows="3" id="txt_notes"><?php echo !empty($prop_notes)?$prop_notes:''; ?></textarea>
                <input type="button" style="margin:10px 10px 10px 0;width:60px;" value="Cancel" onClick="hide_txt_notes('<?php echo !empty($prop_notes)?'edit_notes_link':'add_notes_link'; ?>');" class="floatLeft">
                <input type="button" style="margin:10px 10px 10px 0;width:60px;" value="Save" onClick="save_note('<?=$property_details["ml_num"];?>');" class="floatLeft">
	            <img src="<?php echo base_url(); ?>img/loader.gif" id="add_notes_loader" style="display:none;margin-top:20px;" />
            </span>
		<?php }?>
      </div>
      <div class="clear"></div>      
      <div class="brown-bar"></div>
      <h3 style="line-height:20px;">Presented By</h3>
      <h3 style="line-height:20px;"><?=COMPANY_NAME?></h3>
      <?=CONTACT_INFO?>
    </div>
  </div>
  <div class="widget widget_text" id="text-12" style="margin-top:15px;border-bottom:1px solid #F0ECED;">
    <div class="textwidget">
      <div class="brown-bar"></div>
      <h3 style="line-height:20px;">Recently Viewed</h3>
      <table style="margin-bottom:0px;">
		  <?php
            if(!empty($recently_viewed['data']) && is_array($recently_viewed['data'])){
                foreach ($recently_viewed['data'] as $recent_property) {
                    $address = '';
                    if(!empty($recent_property["address"])){
                         $address .= $recent_property["address"].', ';
                    }	
                    $address .= $recent_property["city_name"].', '.$recent_property["rets_state"].' '.$recent_property["zip_code"];
                ?>
                    <tr>
                        <td style="padding:10px 7px 10px 0px">
                            <div class="searchResult"> 
                                <h5> 
                                    <a title="View Full Property Details For  <?php echo $address; ?>" href="<?php echo WEBSITE_URL.'/property-details/?details='.$recent_property["ml_num"]; ?>">
                                        <?php 
                                             if(!empty($recent_property["address"])){
                                                echo $recent_property["address"].', ';
                                            }
                                            echo $recent_property["city_name"].', '.$recent_property["rets_state"].' '.$recent_property["zip_code"];
                                         ?>
                                    </a> 
                                </h5>
                                <div style="float:left;">
	                                <a class="propPhotoWrapper" title="View Full Property Details For <?php echo $address; ?>" href="<?php echo WEBSITE_URL.'property-details/'.$recent_property["ml_num"]; ?>">
									<img src="<?php echo $recent_property['first_image']; ?>" style="width:85px;height:85px;" >
        	                        </a>
                                </div>
                                <div class="propDetails" style="float:right;">
    
                                  <p class="priceBlock"> <span class="price">
									<?php
										if(!empty($recent_property["list_price"])){
											if($recent_property["list_price"] < 10){
												echo '$' . number_format($recent_property["list_price"], 0, ".", ",").',000,000';
											}elseif($recent_property["list_price"] > 10 && $recent_property["list_price"] < 1000){
												echo '$' . number_format($recent_property["list_price"], 0, ".", ",").',000';
											}else{
												echo '$' . number_format($recent_property["list_price"], 0, ".", ","); 
											}
										}else{
											echo 'Price: Contact realtor';
										}
									?>
                                    </span><br />
                                  <?php if((!empty($recent_property["num_beds"])) || (!empty($recent_property["num_fbaths"])) || (!empty($recent_property["sqft_liv_area"])) ){ ?>
    
                                    <?php 
                                        if(!empty($recent_property["num_beds"])){
                                            echo $recent_property["num_beds"].' Bed | '; 
                                        }
                                        if(!empty($recent_property["num_fbaths"])){
                                            echo $recent_property["num_fbaths"].' Bath'; 
                                        }
                                        if(!empty($recent_property["sqft_liv_area"])){
                                            echo '</br>'.number_format($recent_property["sqft_liv_area"], 0, ".", ",").' Sq Ft'; 
                                        }
                                    ?>
                                  </p>
                                  <?php } ?>
                                </div>
                          </div>
                    </td>
                    </tr>
                <?php
                }
            }
          ?>
      </table>
    </div>
  </div>
</div>

<div class="blog-detail-page clearfix" style="float: right; width: 740px; margin:2% 0 15px 0;">

<!-- AddThis Button BEGIN -->
<div style="float:right !important; border-bottom:1px solid #ccc;width:100%;margin-bottom: 10px;padding-bottom:10px;">
    <div class="addthis_toolbox addthis_default_style addthis_16x16_style" style="float:right;">
    <a class="addthis_button_print"></a>
    <a class="addthis_button_email"></a>
    <a class="addthis_button_facebook"></a>
    <a class="addthis_button_twitter"></a>
    <a class="addthis_button_google_plusone_share"></a>
    <a class="addthis_button_pinterest_share"></a>
    <a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
    </div>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=nasirmajor"></script>
</div>
<div class="clear"></div>
<!-- AddThis Button END -->
  <input type="hidden" id="current_url" value="<?=WEBSITE_URL?>property-details/?details=<?php echo $property_details["ml_num"] ?>" />
  <div class="clearfix" id="priceAddressWrapper">
    <h3 style="float:left" id="property_full_address">
		<?php 
            if(!empty($property_details["address"])){
                echo $property_details["address"].', ';
            }	
            echo $property_details["city_name"].', '.$property_details["rets_state"].' '.$property_details["zip_code"];
        ?>
    </h3>
    <h3 style="float:right">
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

                
    </h3>
  </div>
      <div id="tabContaier_main">
        <div id="tabContaier">
          <ul>
            <li><a href="javascript:;" class='details' id="#tab1">Details</a></li>
            <li><a href="javascript:;" class='gellery' id="#tab2">Gallery</a></li>
            <li><a href="javascript:;" class='location' id="#tab3">Location</a></li>
<!--            <li><a href="#" class='nearby' id="#tab4">Nearby Properties</a></li>-->
          </ul>
          <!-- //Tab buttons -->
        </div>
        <div class="tabDetails">
          <div id="tab1" class="tabContents" style="display:none;">
            <div class="clearfix" id="galleryData">
              <div id="mainImageWrapper"> 
              	<img src="<?php echo $property_details['first_image']; ?>" style="width:330px;height:250px;">
              </div>
              <div style="float:left">
                <table id="mainData">
                  <tbody>
                    <tr class="first">
                      <td class="label">Current Price</td>
                      <td class="flag"> 
							<?php
                                if(!empty($property_details["list_price"])){
                                    if($property_details["list_price"] < 10){
                                        echo '$' . number_format($property_details["list_price"], 0, ".", ",").',000,000';
                                    }elseif($property_details["list_price"] < 1000){
                                        echo '$' . number_format($property_details["list_price"], 0, ".", ",").',000';
                                    }else{
                                        echo '$' . number_format($property_details["list_price"], 0, ".", ","); 
                                    }
                                    
                
                                }else{
                                    echo 'Price: Contact realtor';
                                }
                            ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="label" style="width:145px;">Listing Type</td>
                      <td><?php 
                                        if(!empty($property_details["listing_type"])){
                                            echo $property_details["listing_type"]; 
                                        }
                                    ?>
                      </td>
                    </tr>
                    <?php if(!empty($property_details["ml_num"])){  ?>
                    <tr>
                      <td class="label">MLS Number</td>
                      <td id="prop_mls_id"><?php echo $property_details["ml_num"]; ?></td>
                    </tr>
                    <?php } ?>
                    
					<?php if(!empty($property_details["sqft_liv_area"])){  ?>
                        <tr>
                          <td class="label">Square Feet</td>
                          <td><?php echo number_format($property_details["sqft_liv_area"], 0, ".", ",");  ?></td>
                        </tr>
                    <?php } ?>                    
                    
                    <?php if(!empty($property_details["num_beds"])){  ?>
                    <tr>
                      <td class="label">Bedrooms</td>
                      <td><?php echo $property_details["num_beds"]; ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(!empty($property_details["num_fbaths"])){  ?>
                    <tr>
                      <td class="label">Bathrooms</td>
                      <td><?php echo $property_details["num_fbaths"]; ?><?php echo !empty($property_details["num_hbaths"])?'.'.$property_details["num_hbaths"]:''; ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(!empty($property_details["county"])){  ?>
                    <tr>
                      <td class="label">County</td>
                      <td><?php echo $property_details["county"]; ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(!empty($property_details["status"])){  ?>
                    <tr>
                      <td class="label">Status</td>
                      <td><?php echo $property_details["status"]; ?></td>
                    </tr>
                    <?php } ?>                    
                  </tbody>
                </table>
              </div>
            </div>
            <h2>Description</h2>
            <p id="remarks"><?php echo !empty($property_details["remarks"])?$property_details["remarks"]:'No description available.'; ?></p>
            
            <!-- ADDITIONAL DETAILS STARTS -->
            <div class="title-div"  onclick="toggleDetails('additional_toggle');">
                <div class="title-text">Additional Details</div>
                <div class="plus"><span class="additional_toggle">+</span><span class="additional_toggle" style="display:none">-</span></div>
                <div class="clear"></div>
            </div>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="additional_toggle">
                
                <?php if(!empty($property_details[""])){  ?>
                <div class="sub-details">Flood Zone Code: <strong><?php echo $property_details[""]; ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["year_built"])){  ?>
                <div class="sub-details">Year Built: <strong><?php echo $property_details["year_built"]; ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["zoning"])){  ?>
                <div class="sub-details">Zoning: <strong><?php echo $property_details["zoning"]; ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["status"])){  ?>
                <div class="sub-details">Status: <strong><?php echo $property_details["status"]; ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["property_type"])){  ?>
                <div class="sub-details">Property Style: <strong><?php echo $property_details["property_type"]; ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["104"])){  ?>
                <div class="sub-details">Taxes: <strong><?php echo '$' . number_format($property_details["104"], 0, ".", ",");  ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["subdivision_information"])){  ?>
                <div class="sub-details">Subdivision: <strong><?php echo $property_details["subdivision_information"]; ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["subdivision_number"])){  ?>
                <div class="sub-details">Subdivision: <strong><?php echo $property_details["subdivision_number"]; ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["construction_type"])){  ?>
                <div class="sub-details">New Construction : <strong><?php echo $property_details["construction_type"]; ?></strong></div>
                <?php } ?>
                
                <br /><br />
                <?php if(!empty($property_details["pets_allowed"])){  ?>
                <div class="sub-details">Pets Allowed: <strong><?php echo $property_details["pets_allowed"]; ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["hoa_common_assn"])){  ?>
                <div class="sub-details">HOA/Community Assn: <strong><?php echo $property_details["hoa_common_assn"]; ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["hoa_fee"])){  ?>
                <div class="sub-details">HOA fee: <strong><?php echo $property_details["hoa_fee"];  ?></strong></div>
                <?php } ?>
    
                <?php if(!empty($property_details["hoa_payment_schedule"])){  ?>
                <div class="sub-details">HOA Payment Schedule: <strong><?php echo $property_details["hoa_payment_schedule"]; ?></strong></div>
                <?php } ?>
                
                <?php // if(!empty($property_details["2795"])){  ?>
                <!--<div class="sub-details">CDD: <strong><?php// echo $property_details["2795"]; ?></strong></div>-->
                <?php // } ?>
                
                <div class="clear"></div>
            </div>
           
           <!-- location starts -->
            <?php if(!empty($property_details["driving_directions"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="additional_toggle">
                <div class="sub-big-details">
                    Location: 
                    <strong>
                            <?php 
                                $Location = explode(',',$property_details["driving_directions"]); 
                                $Location = implode(', ',$Location);
                                echo $Location;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
           <!-- community features starts 
            <?php // if(!empty($property_details["913"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="additional_toggle">
                <div class="sub-big-details">
                    Community Features: 
                    <strong>
                            <?php 
                                // $Community = explode(',',$property_details["913"]); 
                               // $Community = implode(', ',$Community);
                               // echo $Community;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php // } ?> -->
            
                <div style="padding-left:1%;display:none;margin-bottom:15px;" class="additional_toggle">
                    
                    <font style="font-size:16px;font-weight:bold;">Water</font><br />
                    
                    <?php if(!empty($property_details["water_frontage"])){  ?>
                    <div class="sub-details">Water Access: <strong><?php echo $property_details["water_frontage"]; ?></strong></div>
                    <?php } ?>
                    
                    <?php if(!empty($property_details["waterview_yn"])){  ?>
                    <div class="sub-details">Water View: <strong><?php echo $property_details["waterview_yn"]; ?></strong></div>
                    <?php } ?>
                    
                    <?php if(!empty($property_details["water_name"])){  ?>
                    <div class="sub-details">Water Name: <strong><?php echo $property_details["water_name"]; ?></strong></div>
                    <?php } ?>
                    
                    <?php if(!empty($property_details["water_frontage_yn"])){  ?>
                    <div class="sub-details">Water Frontage: <strong><?php echo $property_details["water_frontage_yn"]; ?></strong></div>
                    <?php } ?>   
                    
                    <div class="clear"></div>
                </div>
        
            <!-- ADDITIONAL DETAILS ENDS -->
            
            <!-- SCHOOLS INFORMATION STARTS -->
            <?php if(!empty($property_details["zip_code"])){  
            
                    $api_key       = 'whkzvsocvxkvn1x9qiq2zqxx';
                    $url           = 'http://api.greatschools.org/schools/nearby?key=' . $api_key;
            
                    $url          .= '&address=' . urlencode($property_details["address"]);
                    $url          .= '&city=' . urlencode($property_details["city_name"]);
                    $url          .= '&state=' . $property_details["rets_state"];
                    $url          .= '&zip=' . $property_details["zip_code"]; 
                    $url          .= '&schoolType=public';
                    $url          .= '&minimumSchools=3';
                    $url          .= '&radius=3';
                    $url          .= '&limit=50';
    
                    $url_headers = @get_headers($url);
                    if($url_headers[0] == 'HTTP/1.0 200 OK') {
                        $school_data = simplexml_load_file($url);
                    } else {
                        // Error //exit("failed to load XML");
                        $school_data = '';
                    }
					
    
            if(!empty($school_data)){
            ?>
            <div class="title-div"  onclick="toggleDetails('schools_toggle');">
                <div class="title-text">Schools</div>
                <div class="plus"><span class="schools_toggle">+</span><span class="schools_toggle" style="display:none">-</span></div>
                <div class="clear"></div>
            </div>
            <div style="padding-left:1%;display:none;" class="schools_toggle">
              <table>
                <tr>
                  <?php 
                                    $s=1;
                                    foreach($school_data as $school) : 
                                            
                                ?>
                  <td><h4>
                      <?= $school->name; ?>
                    </h4>
                    <p>
                      <?= ucwords($school->type); ?>
                      &middot; Grades
                      <?= $school->gradeRange; ?>
                      &middot; Rating:
                      <?= $school->gsRating; ?>
                    </p>
                    <p>Distance:
                      <?= $school->distance; ?>
                      miles <a class="more-info" target="_blank" href="<?= $school->overviewLink; ?>">more info</a></p></td>
                  <?php
                                        if($s % 2 == 0){
                                           echo '</tr><tr>';
                                        }
                                       $s++;
                                    endforeach; 
                                ?>
              </table>
            </div>
            <?php 
                }
            } ?>
            <!-- SCHOOLS INFORMATION ENDS -->
                      
            <!-- INTERIOR INFORMATION STARTS -->
            <div class="title-div"  onclick="toggleDetails('interior_toggle');">
                <div class="title-text">Interior</div>
                <div class="plus"><span class="interior_toggle">+</span><span class="interior_toggle" style="display:none">-</span></div>
                <div class="clear"></div>
            </div>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="interior_toggle">
                
                <?php if(!empty($property_details["cooling_description"])){  ?>
                <div class="sub-details">Air Conditioning: <strong><?php echo $property_details["cooling_description"]; ?></strong></div>
                <?php } ?>

                <?php if(!empty($property_details["floor_description"])){  ?>
                <div class="sub-details">Floor Covering: <strong><?php echo $property_details["floor_description"]; ?></strong></div>
                <?php } ?>
                
                <!--<?php // if(!empty($property_details["2801"])){  ?>
                <div class="sub-details">Fireplace: <strong><?php // echo $property_details["2801"]; ?></strong></div>
                <?php//  } ?>
                
                <?php // if(!empty($property_details["2893"])){  ?>
                <div class="sub-details">Fireplace: <strong><?php // echo $property_details["2893"]; ?></strong></div>
                <?php//  } ?>-->
                
                <div class="clear"></div>
            </div>   
    
           <!-- Appliance starts -->
           <?php if(!empty($property_details["equipment_appliances"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="interior_toggle">
                <div class="sub-big-details">
                    Appliances: 
                    <strong>
                            <?php 
                                $Appliances = explode(',',$property_details["equipment_appliances"]); 
                                $Appliances = implode(', ',$Appliances);
                                echo $Appliances;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>

          <!-- Utilities starts -->
           <?php if(!empty($property_details["utilities"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="interior_toggle">
                <div class="sub-big-details">
                    Utilities: 
                    <strong>
                            <?php 
                                $Utilities = explode(',',$property_details["utilities"]); 
                                $Utilities = implode(', ',$Utilities);
                                echo $Utilities;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
    
            <!-- EXTERIOR INFORMATION STARTS -->
            <div class="title-div"  onclick="toggleDetails('exterior_toggle');">
                <div class="title-text">Exterior</div>
                <div class="plus"><span class="exterior_toggle">+</span><span class="exterior_toggle" style="display:none">-</span></div>
                <div class="clear"></div>
            </div>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="exterior_toggle">
                
                <?php if(!empty($property_details["lot_size_sqft"])){  ?>
                <div class="sub-details">Lot Size (Sq Ft): <strong><?php echo number_format($property_details["lot_size_sqft"], 0, ".", ",");  ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["lot_size_acres"])){  ?>
                <div class="sub-details">Lot Size (Acres): <strong><?php echo number_format($property_details["lot_size_acres"], 0, ".", ",");  ?></strong></div>
                <?php } ?>
                <!--
                <?php // if(!empty($property_details["488"])){  ?>
                <div class="sub-details">Exterior Construction: <strong><?php // echo $property_details["488"];  ?></strong></div>
                <?php // } ?>
                
                <?php // if(!empty($property_details["903"])){  ?>
                <div class="sub-details">Exterior Construction: <strong><?php // echo $property_details["903"];  ?></strong></div>
                <?php // } ?>
                
                <?php // if(!empty($property_details["1733"])){  ?>
                <div class="sub-details">Exterior Construction: <strong><?php // echo $property_details["1733"];  ?></strong></div>
                <?php//  } ?>                        
                
                <?php // if(!empty($property_details["2328"])){  ?>
                <div class="sub-details">Total Acres: <strong><?php // echo $property_details["2328"];  ?></strong></div>
                <?php // } ?>
                -->
                <?php if(!empty($property_details["roof_description"])){  ?>
                <div class="sub-details">Roof: <strong><?php echo $property_details["490"];  ?></strong></div>
                <?php } ?>
                
                <?php if(!empty($property_details["pool_description"])){  ?>
                <div class="sub-details">Pool: <strong><?php echo $property_details["pool_description"];  ?></strong></div>
                <?php } ?>   
                
                <?php if(!empty($property_details["garage_description"])){  ?>
                <div class="sub-details">Garage/Carport: <strong><?php echo $property_details["garage_description"];  ?></strong></div>
                <?php } ?>
                
                <div class="clear"></div>
            </div> 
            
            <!-- Pool type starts -->   
            <?php if(!empty($property_details["pool"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="exterior_toggle">
                <div class="sub-big-details">
                    Pool Type: 
                    <strong>
                            <?php 
                                $Pool = explode(',',$property_details["pool"]); 
                                $Pool = implode(', ',$Pool);
                                echo $Pool;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
            <?php if(!empty($property_details["2819"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="exterior_toggle">
                <div class="sub-big-details">
                    Property Description: 
                    <strong>
                            <?php 
                                $Description = explode(',',$property_details["2819"]); 
                                $Description = implode(', ',$Description);
                                echo $Description;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
            <!-- Exterior Features starts -->   
            <?php if(!empty($property_details["904"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="exterior_toggle">
                <div class="sub-big-details">
                    Exterior Features: 
                    <strong>
                            <?php 
                                $Features = explode(',',$property_details["904"]); 
                                $Features = implode(', ',$Features);
                                echo $Features;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
            <?php if(!empty($property_details["1734"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="exterior_toggle">
                <div class="sub-big-details">
                    Exterior Features: 
                    <strong>
                            <?php 
                                $Features = explode(',',$property_details["1734"]); 
                                $Features = implode(', ',$Features);
                                echo $Features;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
            <?php if(!empty($property_details["3217"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="exterior_toggle">
                <div class="sub-big-details">
                    Exterior Features: 
                    <strong>
                            <?php 
                                $Features = explode(',',$property_details["3217"]); 
                                $Features = implode(', ',$Features);
                                echo $Features;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
    
            <!-- Exterior Features ends --> 
            
            
            <!-- Garage Features starts -->   
            <?php if(!empty($property_details["906"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="exterior_toggle">
                <div class="sub-big-details">
                    Garage Features: 
                    <strong>
                            <?php 
                                $Garage = explode(',',$property_details["906"]); 
                                $Garage = implode(', ',$Garage);
                                echo $Garage;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
            <?php if(!empty($property_details["1321"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="exterior_toggle">
                <div class="sub-big-details">
                    Garage Features: 
                    <strong>
                            <?php 
                                $Garage = explode(',',$property_details["1321"]); 
                                $Garage = implode(', ',$Garage);
                                echo $Garage;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
            <?php if(!empty($property_details["1736"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="exterior_toggle">
                <div class="sub-big-details">
                    Garage Features: 
                    <strong>
                            <?php 
                                $Garage = explode(',',$property_details["1736"]); 
                                $Garage = implode(', ',$Garage);
                                echo $Garage;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
    
    
            <!-- Garage Features ends -->
            
            <!-- EXTERIOR INFORMATION ENDS -->
            
            
            <!-- GREEN INFORMATION STARTS -->
            <?php if(!empty($property_details["3196"]) || !empty($property_details["3183"])){  ?>
            <div class="title-div"  onclick="toggleDetails('green_toggle');">
                <div class="title-text">Green Information</div>
                <div class="plus"><span class="green_toggle">+</span><span class="green_toggle" style="display:none">-</span></div>
                <div class="clear"></div>
            </div>
            
            <?php if(!empty($property_details["3183"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="green_toggle">
                <div class="sub-big-details">
                    Green Water Features: 
                    <strong>
                            <?php 
                                $Green = explode(',',$property_details["3183"]); 
                                $Green = implode(', ',$Green);
                                echo $Green;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
            <?php if(!empty($property_details["3182"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="green_toggle">
                <div class="sub-big-details">
                    Green Energy Features: 
                    <strong>
                            <?php 
                                $Green = explode(',',$property_details["3182"]); 
                                $Green = implode(', ',$Green);
                                echo $Green;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
            <?php if(!empty($property_details["3196"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="green_toggle">
                <div class="sub-big-details">
                    Green Water Features: 
                    <strong>
                            <?php 
                                $Green = explode(',',$property_details["3196"]); 
                                $Green = implode(', ',$Green);
                                echo $Green;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
    
            <?php if(!empty($property_details["3197"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="green_toggle">
                <div class="sub-big-details">
                    Green Energy Features: 
                    <strong>
                            <?php 
                                $Green = explode(',',$property_details["3197"]); 
                                $Green = implode(', ',$Green);
                                echo $Green;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
            <?php if(!empty($property_details["3192"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="green_toggle">
                <div class="sub-big-details">
                    Green Landscaping: 
                    <strong>
                            <?php 
                                $Green = explode(',',$property_details["3192"]); 
                                $Green = implode(', ',$Green);
                                echo $Green;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
            <?php if(!empty($property_details["3195"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="green_toggle">
                <div class="sub-big-details">
                    Green Site Improvements: 
                    <strong>
                            <?php 
                                $Green = explode(',',$property_details["3195"]); 
                                $Green = implode(', ',$Green);
                                echo $Green;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
    
            <?php if(!empty($property_details["3015"])){  ?>
            <div style="padding-left:1%;display:none;margin-bottom:15px;" class="green_toggle">
                <div class="sub-big-details">
                    Green Certification: 
                    <strong>
                            <?php 
                                $Green = explode(',',$property_details["3015"]); 
                                $Green = implode(', ',$Green);
                                echo $Green;
                            ?>
                     </strong>
               </div>
               <div class="clear"></div>
            </div>
            <?php } ?>
            
            
            <?php } ?>
            <!-- GREEN INFORMATION ENDS -->
            
           </div> 
           <!-- tab 1 ends -->
           
          <!-- //tab1 style="display:none;"-->
			<?php
				$flag = false;
				$visibility = "";
				if(!empty($rets_images) && count($rets_images)>1){
					$flag = true;
					$visibility = "visibility:hidden;";
				}
			?>
          <div id="tab2" class="tabContents" style="display:none;<?php //echo $visibility; ?>">
            <div class="container demo-4">
              <?php
				if($flag){
				?>
				<div class="gallery" style="width: 550%; height: 100%;">
					<!-- Elastislide Carousel -->
					
					<ul id="carousel" class="elastislide-list" style="display: block; max-height: 145px; transition: all 500ms ease-in-out 0s;">
					<?php foreach($rets_images as $image){ ?>
						<li data-preview="<?php echo $image['url']; ?>" style="width: 24.8649%; max-width: 150px; max-height: 160px;"><a href="#"><img src="<?php echo $image['url']; ?>" alt="image04" /></a></li>
					<?php } ?>
					</ul>
					<!-- End Elastislide Carousel -->

					<div class="image-preview">
						<img id="preview" src="<?php echo $rets_images[0]['url']; ?>" />
					</div>
				</div>
                <?php }else{ ?>
                  <div class="clearfix" id="galleryData">
                    <div id="mainImageWrapper"> 
                     <img src="<?php echo $property_details['first_image']; ?>" style="width:442px;height:326px;">
                    </div>
                  </div>
              <?php } ?>
            </div>
          </div>
          <!-- //tab2 -->
          <div id="tab3" class="tabContents" style="display:none;">
            <div style="width:width:100%; height:587px;">
              <div id="map-canvas" style="width:100%; height:100%;margin:0px;padding:0px" class="clearfix" ></div>
            </div>
          </div>
          <!-- //tab3 -->

		  <div id="tab4" class="tabContents" style="display:none;min-height:1415px;"></div>

        </div>
        <!-- //tab Details -->
      </div>


</div>
<input type="hidden" value="notloaded" id="nearyby_loaded" />
<script type="text/javascript">
	
	// example how to integrate with a previewer
	var current = 0;
	$preview = $( '#preview' );
	$carouselEl = $( '#carousel' );
	$carouselItems = $carouselEl.children();
		
	function toggleDetails(class_name){
		jQuery('.'+class_name).toggle('slow');
	}

	<?php if(!empty($logged_in)){ ?>
	function do_add_to_fav(){
		var fav_mls_id = $('#fav_mls_id').val();
		var fav_notes = $('#fav_notes').val();
		var fav_category = $("#fav_category").val();
		$('img#add_fav_loader').show();
		
		$.post("<?php echo $base; ?>account/manage_favorites/save_user_favorite/"+fav_mls_id,{fav_category:fav_category,fav_notes:fav_notes},function(data){
			$('#make_fav_form').hide();
			$('div#fav_msg').html(data).show();
			$('img#add_fav_loader').hide();
			var rem_html =	'<img style="float:left" src="<?php echo base_url(); ?>bootstrap/img/favorite_gray.png"></a>';
				rem_html +=	'<span style="float:left;margin-left:15px;margin-top:10px;">';
				rem_html += '<a class="nyroModal_remove" href="<?php echo base_url(); ?>property_details/remove_from_favorite/<?php echo $property_details["ml_num"]; ?>">Remove from Favorites</a>';
				rem_html +=	'</span>';
			$("#make_prop_fav").html(rem_html);
			
			$('a.nyroModal_remove').nyroModal({
				sizes: {
					initW: 500, initH: 350,
					minW: 500, minH: 350,
					w: 500, h: 350
				},
				resize: function(recalc) {},
				modal:false,
				callbacks: {
					afterClose: function() {
						var rem_html =	'<a href="<?php echo $base.'property_details/add_to_favorite/'.$property_details["ml_num"];?>" class="nyroModal_fav">';
						rem_html +=	'<img style="float:left" src="<?php echo base_url(); ?>bootstrap/img/favorite.png"></a>'
						rem_html +=	'<span style="float:left;margin-left:15px;margin-top:10px;">'
						rem_html +=	'<a class="nyroModal_fav" href="<?php echo base_url(); ?>property_details/add_to_favorite/<?php echo $property_details["ml_num"]; ?>">Favorites</a>'
						rem_html +=	'</span>'
						$("#make_prop_fav").html(rem_html);	
						
						$('a.nyroModal_fav').nyroModal({
							sizes: {
								initW: 600, initH: 500,
								minW: 600, minH: 500,
								w: 600, h: 500
							},
							resize: function(recalc) {},
							modal:false
						});
						
					}
				}
			});
				
		});
	}
	<?php } ?>


	jQuery(document).ready(function(){
	
		var tab = $(location).attr('hash');
		if(tab != ""){
		
			if(tab == "#details"){
				$('.details').addClass("active");
				$('#tab1').show();
			}else if(tab == "#gallery"){
				$('.gellery').addClass('active');
				$('#tab2').show();
				initSlider();
			}else if(tab == "#location"){
				$('.location').addClass('active');
				$('#tab3').show();
				initialize();
			}else if(tab == "#nearby"){
				$('.nearby').addClass('active');
				$('#tab4').show();
				
				//get nearby properties
				$('#tab4').html('<img src="<?php echo base_url(); ?>img/loader.gif" />');
				$.post("<?php echo base_url(); ?>property_details/nearby_properties/",{mls:'<?php echo $property_details["ml_num"]; ?>'},function(data){
					$("#nearyby_loaded").val('loaded');
					$('#tab4').html(data);
				});
				
			}
		}else{
			$('.details').addClass('active');
			$('#tab1').show();
		}
		var width = 960;
		var height = 960;
		$('a.nyroModal').nyroModal({
			sizes: {
				initW: width, initH: height,
				minW: width, minH: height,
				w: width, h: height
			},
			resize: function(recalc) {},
			modal:false,
			callbacks: {
				beforeShowCont: function() {
					var url = $("#current_url").val();
					var mls_id = $("#prop_mls_id").html();
					var address = $("#property_full_address").html();

					$("span.property_address").html(address);
					$("input.property_address").val(address);					
					$("#mls_id").val(mls_id);
					$("#property_url").val(url);									
				}
			}
		});
		
		$('a.nyroModal_fav').nyroModal({
			sizes: {
				initW: 600, initH: 500,
				minW: 600, minH: 500,
				w: 600, h: 500
			},
			resize: function(recalc) {},
			modal:false
		});
		
		$('a.nyroModal_remove').nyroModal({
			sizes: {
				initW: 500, initH: 350,
				minW: 500, minH: 350,
				w: 500, h: 350
			},
			modal:false,
			callbacks: {
				afterClose: function() {
						var rem_html =	'<a href="<?php echo $base.'property_details/add_to_favorite/'.$property_details["ml_num"];?>" class="nyroModal_fav">';
						rem_html +=	'<img style="float:left" src="<?php echo $base; ?>bootstrap/img/favorite.png"></a>'
						rem_html +=	'<span style="float:left;margin-left:15px;margin-top:10px;">'
						rem_html +=		'<a class="nyroModal_fav" href="<?php echo $base?>property_details/add_to_favorite/<?php echo $property_details["ml_num"]; ?>">Favorites</a>'
						rem_html +=	'</span>'
					$("#make_prop_fav").html(rem_html);	
					
					$('a.nyroModal_fav').nyroModal({
						sizes: {
							initW: 600, initH: 500,
							minW: 600, minH: 500,
							w: 600, h: 500
						},
						modal:false
					});
					
				}
			}
		});
		
		
	
		//document.title = 'Property Details';
		
	
		var right_panel_height = jQuery(".blog-detail-page").height() + 35;
		jQuery("#left-panel").css('min-height',right_panel_height);
		//jQuery(".tabContents").hide(); // Hide all tab conten divs by default
		//jQuery(".tabContents:first").show(); // Show the first div of tab content by default
		
		jQuery("#tabContaier ul li a").click(function(){ //Fire the click event
			var activeTab = jQuery(this).attr("id"); // Catch the click link
			jQuery("#tabContaier ul li a").removeClass("active"); // Remove pre-highlighted link
			jQuery(this).addClass("active"); // set clicked link to highlight state
			jQuery(".tabContents").hide(); // hide currently visible tab content div
			jQuery(activeTab).fadeIn(); // show the target tab content div by matching clicked link.
			if(activeTab == '#tab2'){
				jQuery(window).resize();
				if($('div.elastislide-horizontal').length < 1){
					initSlider();
				}
			}
			if(activeTab == '#tab3'){
				initialize();
			}
			
			var loaded = $("#nearyby_loaded").val();
			if(loaded != 'loaded'){
				if(activeTab == '#tab4'){
					//get nearby properties
					$('#tab4').html('<img src="<?php echo base_url(); ?>img/loader.gif" />');
					$.post("<?php echo base_url(); ?>property_details/nearby_properties/",{mls:'<?php echo $property_details["ml_num"]; ?>'},function(data){
						$("#nearyby_loaded").val('loaded');
						$('#tab4').html(data);
					});
					
				}
			}
			
			// var right_panel_height = jQuery(".blog-detail-page").height() + 35;
			//jQuery("#left-panel").css('min-height',right_panel_height);
			
		});
	});
	
		function initSlider(){
			carousel = $carouselEl.elastislide( {
				current : current,
				minItems : 3,
				onClick : function( el, pos, evt ) {
					changeImage( el, pos );
					evt.preventDefault();
				},
				onReady : function() {
					changeImage( $carouselItems.eq( current ), current );
				}
			});
		}

	function changeImage( el, pos ) {

		$preview.attr( 'src', el.data( 'preview' ) );
		$carouselItems.removeClass( 'current-img' );
		el.addClass( 'current-img' );
		carousel.setCurrent( pos );

	}
	

	function save_note(mls_id){
		$("#notes_error").hide();
		var user_notes = $('#txt_notes').val();

		$('img#add_notes_loader').show();
		$.post("<?php echo $base; ?>account/manage_favorites/add_user_notes/"+mls_id,{user_notes:user_notes},function(data){
			if(data == 0){
				$("#notes_error").html("Notes are required.").show();
			}else if(data == 'Saved'){
				$("#user_notes").html(user_notes);
				hide_txt_notes('edit_notes_link');
			}else{
				$("#notes_error").html(data).show().hide(5000);
			}
			$('img#add_notes_loader').hide();
		});
	}
	
	function hide_txt_notes(add_edit){
		$('#add_notes').toggle();
		$('#'+add_edit).toggle('slow');
	}
</script>