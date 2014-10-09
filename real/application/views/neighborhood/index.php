<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<base target="_parent" />
<title>Candace Courter - Neighborhood Search</title>
<link rel="stylesheet" href="<?=$base?>bootstrap/css/advanced_search.css">
<script src="<?=$base?>bootstrap/js/jquery-1.10.2.min.js"></script>
<script src="<?=$base?>bootstrap/js/jquery-ui-1.10.3.custom.min.js"></script>

<script src="<?=$base?>js/jquery.cookie.js"></script>
<link href="https://developers.google.com/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css">

<script src="<?=$base?>bootstrap/js/jquery.multiselect.js"></script>
<script src="<?=$base?>bootstrap/js/jquery.blockUI.js"></script>
<script src="<?=$base?>bootstrap/js/jquery.easing.1.3.js"></script>

<link rel="stylesheet" href="<?=$base?>bootstrap/css/jquery-ui.css">
<link rel="stylesheet" href="<?=$base?>bootstrap/css/jquery.multiselect.css">


</head>
<body>
<div class="ad_container"> 
	<div id="contentRightWrapper" style="float:left;">
        <div id="contentRight">
        <div class="advancedSearch">
          <h1 class="shadowHeader">Neighborhood Search</h1>
           <form class="standardForm" method="post" action="#" id="neigborhoodSearchForm">
                <div class="clearfix" id="advanced-search-form-wrapper">
					<div id="dynamic-wrapper">
						<!-- dynamic form content will be loaded here starts -->
						<div id="dynamic-content">
                            <div class="formContainer" id="residentialSearchFormWrapper">
                              <div class="section" style="border:0px;margin-bottom:0px;">
                                  <fieldset>
									<div class="field fieldLeft">
										<label for="as_type" class="block bold">Property Type</label>
										<select name="property_type" title="Select Property Type" onChange="show_style();" class="selectField selectField-half" id="as_type">
											<option value="Residential">Residential</option>
											<option value="Rental">Rental</option>
											<option value="Vacant-Land">Vacant-Land</option>
										</select>
									</div>
                                  <div class="field fieldRight">
                                    <label for="as_heatedSqft" class="bold lbl_style block">Property Style</label>
                                    <select name="SubTypeDesc[]" title="Select Property Style" style="display:none;width:295px" multiple class="selectField p_style selectField-multiple" id="st_residential">
                                      <option value="Condo">Condominium</option>
									  <option value="Single Family Home">Single Family Home</option>
									  <option value="Townhouse/Villa">Townhome/Villa</option>
									  <option value="Multi-Family">Multi-Family</option>
                                      <option value="Manufactured/Mobile Home">Manufactured/Mobile</option>
                                    </select>
                                    <select name="SubTypeDesc_land[]" style="display:none;width:295px" multiple title="Select Property Style" class="selectField p_style selectField-multiple" id="st_land">
                                      <option value="commercial">Commercial</option>
                                      <option value="farm/land/ranch">Farm/land/ranch</option>
                                      <option value="home & income housing">Home &amp; Income Housing</option>
                                      <option value="industrial/other">Industrial/other</option>
                                    </select>
                                    <select name="SubTypeDesc_commercial[]" style="display:none;width:295px" multiple title="Select Property Style" class="selectField p_style selectField-multiple" id="st_commercial">
                                      <option value="">Any</option>
                                      <option value="alf/senior living">Alf/senior Living</option>
                                      <option value="apartments/mobile home parks">Apartments/mobile Home Parks</option>
                                      <option value="business opportunities">Business Opportunities</option>
                                      <option value="hotel/motel">Hotel/motel</option>
                                      <option value="industrial/manufacturing/automotive">Industrial/manufacturing/automotive</option>
                                      <option value="land">Land</option>
                                      <option value="misc.">Misc.</option>
                                      <option value="office/retail">Office/retail</option>
                                      <option value="recreation/institution">Recreation/institution</option>
                                      <option value="vehicle related/marine">Vehicle Related/marine</option>
                                    </select>
                                  </div>
                                  <div class="clearAll">&nbsp;</div>
                                  <div class="field fieldLeft">
                                    <label for="as_minBeds" class="block bold">Bedrooms<img title="The value you select will yield search results containing that value or higher." class="padding-right-10 justTheTip" src="<?=$base?>bootstrap/img/icon_question.gif" alt=""></label>
                                    <select name="MinBeds" title="Select Minimum Bedrooms" class="selectField selectField-fourth" id="as_minBeds">
                                      <option selected="selected" value="">Min</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                      <option value="11">11</option>
                                      <option value="12">12</option>
                                      <option value="13">13</option>
                                      <option value="14">14</option>
                                      <option value="15">15</option>
                                    </select>
                                  </div>
                                  <div class="field fieldRight">
                                    <label for="as_fullBaths" class="block bold">Bathrooms</label>
                                    <select name="BathroomsFull" title="Select Minimum Full Baths" class="selectField selectField-fourth" id="as_fullBaths">
                                      <option selected="selected" value="">Any</option>
                                      <option value="1">At Least 1</option>
                                      <option value="2">At Least 2</option>
                                      <option value="3">At Least 3</option>
                                      <option value="4">At Least 4</option>
                                      <option value="5">At Least 5</option>
                                      <option value="6">At Least 6</option>
                                      <option value="7">At Least 7</option>
                                      <option value="8">At Least 8</option>
                                      <option value="9">At Least 9</option>
                                      <option value="10">At Least 10</option>
                                      <option value="11">At Least 11</option>
                                      <option value="12">At Least 12</option>
                                      <option value="13">At Least 13</option>
                                      <option value="14">At Least 14</option>
                                      <option value="15">At Least 15</option>
                                      <option value="16">At Least 16</option>
                                      <option value="17">At Least 17</option>
                                      <option value="18">At Least 18</option>
                                      <option value="19">At Least 19</option>
                                      <option value="20">At Least 20</option>
                                      <option value="21">At Least 21</option>
                                      <option value="22">At Least 22</option>
                                    </select>
                                  </div>
                                  <div class="field fieldRight">
                                    <label for="as_minYear" class="bold block">Year Built</label>
                                    <input type="text" value="" title="Enter Earliest Year Built" name="Year_Built" id="as_minYear" class="textField textField-fourth">
                                    <span class="toSpacer">to</span>
                                    <input type="text" value="" title="Enter Latest Year Built" name="Year_Built_Max" id="as_maxYear" class="textField  textField-fourth">
                                  </div>
                                  <div class="clearAll">&nbsp;</div>
                                  <div class="field fieldLeft">
                                    <label for="as_minPrice" class="block bold">Price Range</label>
                                    <select name="Min_Price" title="Select Minimum Price" data-target="asMinPriceAlt" class="selectField selectField-fourth selectCombo" id="as_minPrice">
                                      <option selected="selected" value="">Min</option>
                                      <option value="100000">$100,000</option>
                                      <option value="150000">$150,000</option>
                                      <option value="200000">$200,000</option>
                                      <option value="250000">$250,000</option>
                                      <option value="300000">$300,000</option>
                                      <option value="350000">$350,000</option>
                                      <option value="400000">$400,000</option>
                                      <option value="450000">$450,000</option>
                                      <option value="500000">$500,000</option>
                                      <option value="550000">$550,000</option>
                                      <option value="600000">$600,000</option>
                                      <option value="650000">$650,000</option>
                                      <option value="700000">$700,000</option>
                                      <option value="750000">$750,000</option>
                                      <option value="800000">$800,000</option>
                                      <option value="850000">$850,000</option>
                                      <option value="900000">$900,000</option>
                                      <option value="950000">$950,000</option>
                                      <option value="1000000">$1,000,000</option>
                                      <option value="1050000">$1,050,000</option>
                                      <option value="1100000">$1,100,000</option>
                                      <option value="1150000">$1,150,000</option>
                                      <option value="1200000">$1,200,000</option>
                                      <option value="1250000">$1,250,000</option>
                                      <option value="1300000">$1,300,000</option>
                                      <option value="1350000">$1,350,000</option>
                                      <option value="1400000">$1,400,000</option>
                                      <option value="1450000">$1,450,000</option>
                                      <option value="1500000">$1,500,000</option>
                                      <option value="1550000">$1,550,000</option>
                                      <option value="1600000">$1,600,000</option>
                                      <option value="1650000">$1,650,000</option>
                                      <option value="1700000">$1,700,000</option>
                                      <option value="1750000">$1,750,000</option>
                                      <option value="1800000">$1,800,000</option>
                                      <option value="1850000">$1,850,000</option>
                                      <option value="1900000">$1,900,000</option>
                                      <option value="1950000">$1,950,000</option>
                                      <option value="2000000">$2,000,000</option>
                                      <option value="2050000">$2,050,000</option>
                                      <option value="2100000">$2,100,000</option>
                                      <option value="2150000">$2,150,000</option>
                                      <option value="2200000">$2,200,000</option>
                                      <option value="2250000">$2,250,000</option>
                                      <option value="2300000">$2,300,000</option>
                                      <option value="2350000">$2,350,000</option>
                                      <option value="2400000">$2,400,000</option>
                                      <option value="2450000">$2,450,000</option>
                                      <option value="2500000">$2,500,000</option>
                                      <option value="2550000">$2,550,000</option>
                                      <option value="2600000">$2,600,000</option>
                                      <option value="2650000">$2,650,000</option>
                                      <option value="2700000">$2,700,000</option>
                                      <option value="2750000">$2,750,000</option>
                                      <option value="2800000">$2,800,000</option>
                                      <option value="2850000">$2,850,000</option>
                                      <option value="2900000">$2,900,000</option>
                                      <option value="2950000">$2,950,000</option>
                                      <option value="3000000">$3,000,000</option>
                                      <option value="3050000">$3,050,000</option>
                                      <option value="3100000">$3,100,000</option>
                                      <option value="3150000">$3,150,000</option>
                                      <option value="3200000">$3,200,000</option>
                                      <option value="3250000">$3,250,000</option>
                                      <option value="3300000">$3,300,000</option>
                                      <option value="3350000">$3,350,000</option>
                                      <option value="3400000">$3,400,000</option>
                                      <option value="3450000">$3,450,000</option>
                                      <option value="3500000">$3,500,000</option>
                                      <option value="3550000">$3,550,000</option>
                                      <option value="3600000">$3,600,000</option>
                                      <option value="3650000">$3,650,000</option>
                                      <option value="3700000">$3,700,000</option>
                                      <option value="3750000">$3,750,000</option>
                                      <option value="3800000">$3,800,000</option>
                                      <option value="3850000">$3,850,000</option>
                                      <option value="3900000">$3,900,000</option>
                                      <option value="3950000">$3,950,000</option>
                                      <option value="4000000">$4,000,000</option>
                                      <option value="4050000">$4,050,000</option>
                                      <option value="4100000">$4,100,000</option>
                                      <option value="4150000">$4,150,000</option>
                                      <option value="4200000">$4,200,000</option>
                                      <option value="4250000">$4,250,000</option>
                                      <option value="4300000">$4,300,000</option>
                                      <option value="4350000">$4,350,000</option>
                                      <option value="4400000">$4,400,000</option>
                                      <option value="4450000">$4,450,000</option>
                                      <option value="4500000">$4,500,000</option>
                                      <option value="4550000">$4,550,000</option>
                                      <option value="4600000">$4,600,000</option>
                                      <option value="4650000">$4,650,000</option>
                                      <option value="4700000">$4,700,000</option>
                                      <option value="4750000">$4,750,000</option>
                                      <option value="4800000">$4,800,000</option>
                                      <option value="4850000">$4,850,000</option>
                                      <option value="4900000">$4,900,000</option>
                                      <option value="4950000">$4,950,000</option>
                                      <option value="5000000">$5,000,000</option>
                                      <option value="5050000">$5,050,000</option>
                                      <option value="5100000">$5,100,000</option>
                                      <option value="5150000">$5,150,000</option>
                                      <option value="5200000">$5,200,000</option>
                                      <option value="5250000">$5,250,000</option>
                                      <option value="5300000">$5,300,000</option>
                                      <option value="5350000">$5,350,000</option>
                                      <option value="5400000">$5,400,000</option>
                                      <option value="5450000">$5,450,000</option>
                                      <option value="5500000">$5,500,000</option>
                                      <option value="5550000">$5,550,000</option>
                                      <option value="5600000">$5,600,000</option>
                                      <option value="5650000">$5,650,000</option>
                                      <option value="5700000">$5,700,000</option>
                                      <option value="5750000">$5,750,000</option>
                                      <option value="5800000">$5,800,000</option>
                                      <option value="5850000">$5,850,000</option>
                                      <option value="5900000">$5,900,000</option>
                                      <option value="5950000">$5,950,000</option>
                                      <option value="6000000">$6,000,000</option>
                                      <option value="6050000">$6,050,000</option>
                                      <option value="6100000">$6,100,000</option>
                                      <option value="6150000">$6,150,000</option>
                                      <option value="6200000">$6,200,000</option>
                                      <option value="6250000">$6,250,000</option>
                                      <option value="6300000">$6,300,000</option>
                                      <option value="6350000">$6,350,000</option>
                                      <option value="6400000">$6,400,000</option>
                                      <option value="6450000">$6,450,000</option>
                                      <option value="6500000">$6,500,000</option>
                                      <option value="6550000">$6,550,000</option>
                                      <option value="6600000">$6,600,000</option>
                                      <option value="6650000">$6,650,000</option>
                                      <option value="6700000">$6,700,000</option>
                                      <option value="6750000">$6,750,000</option>
                                      <option value="6800000">$6,800,000</option>
                                      <option value="6850000">$6,850,000</option>
                                      <option value="6900000">$6,900,000</option>
                                      <option value="6950000">$6,950,000</option>
                                      <option value="7000000">$7,000,000</option>
                                      <option value="7050000">$7,050,000</option>
                                      <option value="7100000">$7,100,000</option>
                                      <option value="7150000">$7,150,000</option>
                                      <option value="7200000">$7,200,000</option>
                                      <option value="7250000">$7,250,000</option>
                                      <option value="7300000">$7,300,000</option>
                                      <option value="7350000">$7,350,000</option>
                                      <option value="7400000">$7,400,000</option>
                                      <option value="7450000">$7,450,000</option>
                                      <option value="7500000">$7,500,000</option>
                                      <option value="7550000">$7,550,000</option>
                                      <option value="7600000">$7,600,000</option>
                                      <option value="7650000">$7,650,000</option>
                                      <option value="7700000">$7,700,000</option>
                                      <option value="7750000">$7,750,000</option>
                                      <option value="7800000">$7,800,000</option>
                                      <option value="7850000">$7,850,000</option>
                                      <option value="7900000">$7,900,000</option>
                                      <option value="7950000">$7,950,000</option>
                                      <option value="8000000">$8,000,000</option>
                                      <option value="8050000">$8,050,000</option>
                                      <option value="8100000">$8,100,000</option>
                                      <option value="8150000">$8,150,000</option>
                                      <option value="8200000">$8,200,000</option>
                                      <option value="8250000">$8,250,000</option>
                                      <option value="8300000">$8,300,000</option>
                                      <option value="8350000">$8,350,000</option>
                                      <option value="8400000">$8,400,000</option>
                                      <option value="8450000">$8,450,000</option>
                                      <option value="8500000">$8,500,000</option>
                                      <option value="8550000">$8,550,000</option>
                                      <option value="8600000">$8,600,000</option>
                                      <option value="8650000">$8,650,000</option>
                                      <option value="8700000">$8,700,000</option>
                                      <option value="8750000">$8,750,000</option>
                                      <option value="8800000">$8,800,000</option>
                                      <option value="8850000">$8,850,000</option>
                                      <option value="8900000">$8,900,000</option>
                                      <option value="8950000">$8,950,000</option>
                                      <option value="9000000">$9,000,000</option>
                                      <option value="9050000">$9,050,000</option>
                                      <option value="9100000">$9,100,000</option>
                                      <option value="9150000">$9,150,000</option>
                                      <option value="9200000">$9,200,000</option>
                                      <option value="9250000">$9,250,000</option>
                                      <option value="9300000">$9,300,000</option>
                                      <option value="9350000">$9,350,000</option>
                                      <option value="9400000">$9,400,000</option>
                                      <option value="9450000">$9,450,000</option>
                                      <option value="9500000">$9,500,000</option>
                                      <option value="9550000">$9,550,000</option>
                                      <option value="9600000">$9,600,000</option>
                                      <option value="9650000">$9,650,000</option>
                                      <option value="9700000">$9,700,000</option>
                                      <option value="9750000">$9,750,000</option>
                                      <option value="9800000">$9,800,000</option>
                                      <option value="9850000">$9,850,000</option>
                                      <option value="9900000">$9,900,000</option>
                                      <option value="9950000">$9,950,000</option>
                                      <option value="10000000">$10,000,000</option>
                                    </select>
                                    <span class="toSpacer">to</span>
                                    <select name="Max_Price" title="Select Maximum Price" id="MaxPriceSelect" data-target="asMaxPriceAlt" class="selectField selectField-fourth selectCombo">
                                      <option selected="selected" value="">Max</option>
                                      <option value="100000">$100,000</option>
                                      <option value="150000">$150,000</option>
                                      <option value="200000">$200,000</option>
                                      <option value="250000">$250,000</option>
                                      <option value="300000">$300,000</option>
                                      <option value="350000">$350,000</option>
                                      <option value="400000">$400,000</option>
                                      <option value="450000">$450,000</option>
                                      <option value="500000">$500,000</option>
                                      <option value="550000">$550,000</option>
                                      <option value="600000">$600,000</option>
                                      <option value="650000">$650,000</option>
                                      <option value="700000">$700,000</option>
                                      <option value="750000">$750,000</option>
                                      <option value="800000">$800,000</option>
                                      <option value="850000">$850,000</option>
                                      <option value="900000">$900,000</option>
                                      <option value="950000">$950,000</option>
                                      <option value="1000000">$1,000,000</option>
                                      <option value="1050000">$1,050,000</option>
                                      <option value="1100000">$1,100,000</option>
                                      <option value="1150000">$1,150,000</option>
                                      <option value="1200000">$1,200,000</option>
                                      <option value="1250000">$1,250,000</option>
                                      <option value="1300000">$1,300,000</option>
                                      <option value="1350000">$1,350,000</option>
                                      <option value="1400000">$1,400,000</option>
                                      <option value="1450000">$1,450,000</option>
                                      <option value="1500000">$1,500,000</option>
                                      <option value="1550000">$1,550,000</option>
                                      <option value="1600000">$1,600,000</option>
                                      <option value="1650000">$1,650,000</option>
                                      <option value="1700000">$1,700,000</option>
                                      <option value="1750000">$1,750,000</option>
                                      <option value="1800000">$1,800,000</option>
                                      <option value="1850000">$1,850,000</option>
                                      <option value="1900000">$1,900,000</option>
                                      <option value="1950000">$1,950,000</option>
                                      <option value="2000000">$2,000,000</option>
                                      <option value="2050000">$2,050,000</option>
                                      <option value="2100000">$2,100,000</option>
                                      <option value="2150000">$2,150,000</option>
                                      <option value="2200000">$2,200,000</option>
                                      <option value="2250000">$2,250,000</option>
                                      <option value="2300000">$2,300,000</option>
                                      <option value="2350000">$2,350,000</option>
                                      <option value="2400000">$2,400,000</option>
                                      <option value="2450000">$2,450,000</option>
                                      <option value="2500000">$2,500,000</option>
                                      <option value="2550000">$2,550,000</option>
                                      <option value="2600000">$2,600,000</option>
                                      <option value="2650000">$2,650,000</option>
                                      <option value="2700000">$2,700,000</option>
                                      <option value="2750000">$2,750,000</option>
                                      <option value="2800000">$2,800,000</option>
                                      <option value="2850000">$2,850,000</option>
                                      <option value="2900000">$2,900,000</option>
                                      <option value="2950000">$2,950,000</option>
                                      <option value="3000000">$3,000,000</option>
                                      <option value="3050000">$3,050,000</option>
                                      <option value="3100000">$3,100,000</option>
                                      <option value="3150000">$3,150,000</option>
                                      <option value="3200000">$3,200,000</option>
                                      <option value="3250000">$3,250,000</option>
                                      <option value="3300000">$3,300,000</option>
                                      <option value="3350000">$3,350,000</option>
                                      <option value="3400000">$3,400,000</option>
                                      <option value="3450000">$3,450,000</option>
                                      <option value="3500000">$3,500,000</option>
                                      <option value="3550000">$3,550,000</option>
                                      <option value="3600000">$3,600,000</option>
                                      <option value="3650000">$3,650,000</option>
                                      <option value="3700000">$3,700,000</option>
                                      <option value="3750000">$3,750,000</option>
                                      <option value="3800000">$3,800,000</option>
                                      <option value="3850000">$3,850,000</option>
                                      <option value="3900000">$3,900,000</option>
                                      <option value="3950000">$3,950,000</option>
                                      <option value="4000000">$4,000,000</option>
                                      <option value="4050000">$4,050,000</option>
                                      <option value="4100000">$4,100,000</option>
                                      <option value="4150000">$4,150,000</option>
                                      <option value="4200000">$4,200,000</option>
                                      <option value="4250000">$4,250,000</option>
                                      <option value="4300000">$4,300,000</option>
                                      <option value="4350000">$4,350,000</option>
                                      <option value="4400000">$4,400,000</option>
                                      <option value="4450000">$4,450,000</option>
                                      <option value="4500000">$4,500,000</option>
                                      <option value="4550000">$4,550,000</option>
                                      <option value="4600000">$4,600,000</option>
                                      <option value="4650000">$4,650,000</option>
                                      <option value="4700000">$4,700,000</option>
                                      <option value="4750000">$4,750,000</option>
                                      <option value="4800000">$4,800,000</option>
                                      <option value="4850000">$4,850,000</option>
                                      <option value="4900000">$4,900,000</option>
                                      <option value="4950000">$4,950,000</option>
                                      <option value="5000000">$5,000,000</option>
                                      <option value="5050000">$5,050,000</option>
                                      <option value="5100000">$5,100,000</option>
                                      <option value="5150000">$5,150,000</option>
                                      <option value="5200000">$5,200,000</option>
                                      <option value="5250000">$5,250,000</option>
                                      <option value="5300000">$5,300,000</option>
                                      <option value="5350000">$5,350,000</option>
                                      <option value="5400000">$5,400,000</option>
                                      <option value="5450000">$5,450,000</option>
                                      <option value="5500000">$5,500,000</option>
                                      <option value="5550000">$5,550,000</option>
                                      <option value="5600000">$5,600,000</option>
                                      <option value="5650000">$5,650,000</option>
                                      <option value="5700000">$5,700,000</option>
                                      <option value="5750000">$5,750,000</option>
                                      <option value="5800000">$5,800,000</option>
                                      <option value="5850000">$5,850,000</option>
                                      <option value="5900000">$5,900,000</option>
                                      <option value="5950000">$5,950,000</option>
                                      <option value="6000000">$6,000,000</option>
                                      <option value="6050000">$6,050,000</option>
                                      <option value="6100000">$6,100,000</option>
                                      <option value="6150000">$6,150,000</option>
                                      <option value="6200000">$6,200,000</option>
                                      <option value="6250000">$6,250,000</option>
                                      <option value="6300000">$6,300,000</option>
                                      <option value="6350000">$6,350,000</option>
                                      <option value="6400000">$6,400,000</option>
                                      <option value="6450000">$6,450,000</option>
                                      <option value="6500000">$6,500,000</option>
                                      <option value="6550000">$6,550,000</option>
                                      <option value="6600000">$6,600,000</option>
                                      <option value="6650000">$6,650,000</option>
                                      <option value="6700000">$6,700,000</option>
                                      <option value="6750000">$6,750,000</option>
                                      <option value="6800000">$6,800,000</option>
                                      <option value="6850000">$6,850,000</option>
                                      <option value="6900000">$6,900,000</option>
                                      <option value="6950000">$6,950,000</option>
                                      <option value="7000000">$7,000,000</option>
                                      <option value="7050000">$7,050,000</option>
                                      <option value="7100000">$7,100,000</option>
                                      <option value="7150000">$7,150,000</option>
                                      <option value="7200000">$7,200,000</option>
                                      <option value="7250000">$7,250,000</option>
                                      <option value="7300000">$7,300,000</option>
                                      <option value="7350000">$7,350,000</option>
                                      <option value="7400000">$7,400,000</option>
                                      <option value="7450000">$7,450,000</option>
                                      <option value="7500000">$7,500,000</option>
                                      <option value="7550000">$7,550,000</option>
                                      <option value="7600000">$7,600,000</option>
                                      <option value="7650000">$7,650,000</option>
                                      <option value="7700000">$7,700,000</option>
                                      <option value="7750000">$7,750,000</option>
                                      <option value="7800000">$7,800,000</option>
                                      <option value="7850000">$7,850,000</option>
                                      <option value="7900000">$7,900,000</option>
                                      <option value="7950000">$7,950,000</option>
                                      <option value="8000000">$8,000,000</option>
                                      <option value="8050000">$8,050,000</option>
                                      <option value="8100000">$8,100,000</option>
                                      <option value="8150000">$8,150,000</option>
                                      <option value="8200000">$8,200,000</option>
                                      <option value="8250000">$8,250,000</option>
                                      <option value="8300000">$8,300,000</option>
                                      <option value="8350000">$8,350,000</option>
                                      <option value="8400000">$8,400,000</option>
                                      <option value="8450000">$8,450,000</option>
                                      <option value="8500000">$8,500,000</option>
                                      <option value="8550000">$8,550,000</option>
                                      <option value="8600000">$8,600,000</option>
                                      <option value="8650000">$8,650,000</option>
                                      <option value="8700000">$8,700,000</option>
                                      <option value="8750000">$8,750,000</option>
                                      <option value="8800000">$8,800,000</option>
                                      <option value="8850000">$8,850,000</option>
                                      <option value="8900000">$8,900,000</option>
                                      <option value="8950000">$8,950,000</option>
                                      <option value="9000000">$9,000,000</option>
                                      <option value="9050000">$9,050,000</option>
                                      <option value="9100000">$9,100,000</option>
                                      <option value="9150000">$9,150,000</option>
                                      <option value="9200000">$9,200,000</option>
                                      <option value="9250000">$9,250,000</option>
                                      <option value="9300000">$9,300,000</option>
                                      <option value="9350000">$9,350,000</option>
                                      <option value="9400000">$9,400,000</option>
                                      <option value="9450000">$9,450,000</option>
                                      <option value="9500000">$9,500,000</option>
                                      <option value="9550000">$9,550,000</option>
                                      <option value="9600000">$9,600,000</option>
                                      <option value="9650000">$9,650,000</option>
                                      <option value="9700000">$9,700,000</option>
                                      <option value="9750000">$9,750,000</option>
                                      <option value="9800000">$9,800,000</option>
                                      <option value="9850000">$9,850,000</option>
                                      <option value="9900000">$9,900,000</option>
                                      <option value="9950000">$9,950,000</option>
                                      <option value="10000000">$10,000,000</option>
                                    </select>
                                  </div>
                                  <div class="floatRight comboFix">
                                    <div class="comboOrHoriz"> &nbsp; </div>
                                    <div class="field fieldRight">
                                      <label class="block bold">&nbsp;</label>
                                      <input type="text" name="Min_Price2" data-target="MinPriceSelect" id="asMinPriceAlt" class="textField textField-fourth comboTarget">
                                      <span class="toSpacer">to</span> </div>
                                    <div style="margin-left: 0;" class="field fieldRight">
                                      <label class="block bold">&nbsp;</label>
                                      <input type="text" name="Max_Price2" id="asMaxPriceAlt" data-target="MaxPriceSelect" class="textField textField-fourth comboTarget">
                                    </div>
                                  </div>
                                  <div class="clearAll">&nbsp;</div>
                                  <div class="field fieldLeft">
                                    <label for="as_Keyword" class="bold block">Keyword<img title="Type in any keyword you would like, such as pool or wood. If your keywords match a listing, that property will be returned in your search." class="padding-right-10 justTheTip" src="<?=$base?>bootstrap/img/icon_question.gif" alt=""></label>
                                    <input type="text" value="" title="Enter Keyword" name="Remarks" id="as_Keyword" class="textField textField-half">
                                  </div>
                                    <div class="field fieldRight">
                                    <label for="as_heatedSqft" class="bold block">Square Feet</label>
                                    <!--<input type="text" value="" title="Enter Heated Square Feet" name="Min_SqftTotal" id="as_heatedSqft" data-src="2013_residential_heated_sqft" class="textField textField-half ">-->
									<select title="Enter Heated Square Feet" name="Min_SqftTotal" id="as_heatedSqft" data-src="2013_residential_heated_sqft" class="selectField selectField-fourth selectCombo">
										<option selected="selected" value="">Min</option>
										<option value="1">1</option>
										<option value="500">500</option>
										<option value="1000">1000</option>
										<option value="1500">1500</option>
										<option value="2000">2000</option>
										<option value="2500">2500</option>
										<option value="3000">3000</option>
										<option value="3500">3500</option>
										<option value="4000">4000</option>
										<option value="4500">4500</option>
										<option value="5000">5000</option>
									</select>
									<span class="toSpacer">to</span>
									<select title="Enter Heated Square Feet" name="Max_SqftTotal" id="as_heatedSqft_max" data-src="2013_residential_heated_sqft" class="selectField selectField-fourth selectCombo">
										<option selected="selected" value="">Max</option>
										<option value="1">1</option>
										<option value="500">500</option>
										<option value="1000">1000</option>
										<option value="1500">1500</option>
										<option value="2000">2000</option>
										<option value="2500">2500</option>
										<option value="3000">3000</option>
										<option value="3500">3500</option>
										<option value="4000">4000</option>
										<option value="4500">4500</option>
										<option value="5000">5000</option>
									</select>
                                  </div>
                                  <div class="clearAll">&nbsp;</div>
                                  </fieldset>
                                </div>
                            </div>
                        </div>
						<!-- dynamic form content will be loaded here ends -->
						</div>
                  <input type="button" onClick="search_neigborhood();" style="width:83px;" class="btn-search customBlueButton" value="">
                   <div id="fl_menu" class="formCounter" style="top:237px;height:50px;">
                    <span class="formCounterCountValue"><?php  echo number_format($total_rows, 0, ".", ",");  ?></span>
                    <span class="formCounterText">listings</span>
                </div>
                  
                </div>
           </form>
        </div>
       	 <div class="clearAll">&nbsp;</div>
        </div>
    </div>
      
	<div id="properties_results" style="display:none;float:left"></div>

    <div class="clearAll">&nbsp;</div>

</div>
<input type="hidden" id="search_offset" value="0" />
<!-- for floating search box -->
<script>
//config
$float_speed=1000; //milliseconds
$float_easing="easeOutQuint";
$menu_fade_speed=500; //milliseconds
$closed_menu_opacity=0.75;
var menuPosition= 245;//$('#fl_menu').position().top;

//cache vars
$fl_menu=$("#fl_menu");

$(window).load(function() {
	FloatMenu();
});

$(window).scroll(function () { 
	FloatMenu();
});

$(parent.window).scroll(function() {
	Parent_FloatMenu();
});


function FloatMenu(){
	var scrollAmount=$(document).scrollTop();
	var newPosition=menuPosition+scrollAmount;
	if($(window).height()<$fl_menu.height()){
		$fl_menu.css("top",menuPosition);
	} else {
		$fl_menu.stop().animate({top: newPosition}, $float_speed, $float_easing);
		
	}
}

function Parent_FloatMenu(){
	var scrollAmount=$(parent.document).scrollTop();
	var newPosition=scrollAmount - 1055;
	if(newPosition < 220 || newPosition > 2670){
		return false;
	}
	if($(parent.window).height()<$fl_menu.height()){
		$fl_menu.css("top",menuPosition);
	} else {
		$fl_menu.stop().animate({top: newPosition}, $float_speed, $float_easing);
		
	}
}
</script>
</body>
</html>
<script>
$(document).ready(function(data){

	search_neigborhood()
	
	$("#neigborhoodSearchForm").submit(function(e) {
		e.preventDefault();
		search_neigborhood();
	});	
	
	$('#as_heatedSqft,#as_minYear,#as_maxYear,#asMinPriceAlt,#asMaxPriceAlt,#as_Keyword').keypress(function (e) {
	   if(e.which ==13){
		 //console.log($(this).attr('id'));
		 search_neigborhood();
	   }
	});
	

	$("#neigborhoodSearchForm :input").change(function() {
		get_count();
	});

	 init();
});
	
//This function returns nothing. It echos count in right box.	
function get_count(){
	$.ajax({
		type: 'POST',
		url: '<?=$base?>neighborhood/get_results_count/<?php echo $neighborhood; ?>',
		data: $( "#neigborhoodSearchForm" ).serialize(),
		dataType: 'json',
		beforeSend: function(){
			//loader here
			$(".formCounterCountValue").html('<img src="<?=$base?>img/loader.gif" />');
		},			
		success: function(result) {
			$(".formCounterCountValue").html(' ');
			if(result.total_count == 'error') // Form Validation failed.
			{
			   $(".formCounterCountValue").html('error');
			}
			else // Form Validation passed.
			{
				 $(".formCounterCountValue").html(result.total_count);
			}
		},

		error: function(data) {
			//alert('There was an error while searching properties.');
		}
	});
}
	
function search_neigborhood(){	
	var offset = $('#search_offset').val();	
	$.ajax({
		type: 'POST',
		url: '<?=$base?>neighborhood/search_results/<?php echo $neighborhood; ?>/15/'+offset,
		data: $( "#neigborhoodSearchForm" ).serialize(),
		dataType: 'json',
		beforeSend: function(){
			$.blockUI({
				css: { margin: '10px' }
			});//loader display
		},			
		success: function(result) {
			if(result.status == 'error') // Form Validation failed.
			{
			   //$('.mls-search-result').removeClass('success').addClass('failure').fadeIn(500).html(result.message);
			}
			else // Form Validation passed.
			{
			   //$('#contentRightWrapper').hide();
			   $('#properties_results').show().html(result.result);				   
			}
			$.unblockUI(); //loader hide
		},

		error: function(data) {
			alert('There was an error while searching properties.');
		}
	});

}

function init(){
	$(".selectField-multiple").multiselect({});
	$('.ui-multiselect').hide();
	$("#st_residential").next('button').show();
}

function show_style(){
	var p_type = $('#as_type').val();	

	$(".lbl_style").show();	
	$(".p_style").val('');
	$('.ui-multiselect').hide();
	if(p_type == 'Residential' || p_type == 'Income'){
		$("#st_residential").next('button').show();
	}
	if(p_type == 'Rental'){
		$(".lbl_style").hide();
	}
	if(p_type == 'Commercial'){
		$("#st_commercial").next('button').show();	
	}
	if(p_type == 'Vacant-Land'){
		$("#st_land").next('button').show();
	}

}
</script>