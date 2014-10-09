<div id="dynamic-content">

    <div class="formContainer" id="residentialSearchFormWrapper">

    <div class="section">

      <fieldset>

      <h2>Property Details</h2>

      <div class="field fieldLeft" style="width:46%">

        <label for="as_type" class="block bold">Property Style</label>
            <select name="pro_style[]" title="Select Property Type" multiple class="selectField selectField-half selectField-multiple" id="as_type">
              <option value="Condo">Condominium</option>
              <option value="Manufactured/Mobile Home">Manufactured/Mobile Home</option>
              <option value="Multi-Family">Multi-Family</option>
              <option value="Single Family Home">Single Family Home</option>
              <option value="Townhouse">Townhome</option>
              <option value="Villa">Villa</option>
            </select>
      </div>

      <div class="field fieldRight">

        <label for="as_type" class="block bold">Property Status</label>

        <select name="propStatus[]" title="Select Property Status" multiple class="selectField selectField-half selectField-multiple" id="selectFieldStatus">
              <option value="available"  selected="selected">Active</option>
              <option value="active-with-contract"  selected="selected">Active with Contract</option>
              <option value="leased">Leased</option>
              <option value="lease-option">Lease Option</option>
              <option value="pending">Pending</option>
              <option value="rented">Rented</option>
              <option value="sold">Sold</option>        </select>
      </div>

      <div class="clearAll">&nbsp;</div>

      <div class="field fieldLeft">

        <label for="as_minBeds" class="block bold">Bedrooms<img title="The value you select will yield search results containing that value or higher." class="padding-right-10 justTheTip" src="<?=$base?>bootstrap/img/icon_question.gif" alt=""></label>

        <select name="num_beds" title="Select Minimum Bedrooms" class="selectField selectField-fourth" id="as_minBeds">

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

        <select name="num_fbaths" title="Select Minimum Full Baths" class="selectField selectField-fourth" id="as_fullBaths">

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

     <div class="field fieldLeft" style="margin-left:11px">
        <label for="as_minYear" class="bold block">Heated Square Feet</label>
        <input type="text" value="" title="Enter Minimum Heated Square Feet" name="sqft_liv_area" id="as_minSqftTotal" class="textField textField-fourth">
      </div>
     <div class="field fieldRight">
        <label for="as_minYear" class="bold block">Year Built</label>
        <input type="text" value="" title="Enter Earliest Year Built" name="year_built" id="as_minYear" class="textField textField-fourth">
      </div>

      <div class="clearAll">&nbsp;</div>

      <div class="field fieldLeft">

        <label for="as_minPrice" class="block bold">Price Range</label>

        <select name="price_min" title="Select Minimum Price" data-target="asMinPriceAlt" class="selectField selectField-fourth selectCombo" id="as_minPrice">

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

        <select name="price_max" title="Select Maximum Price" id="MaxPriceSelect" data-target="asMaxPriceAlt" class="selectField selectField-fourth selectCombo">

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

      <div class="field fieldRight" style="margin-left:11px">
        <label for="as_Keyword" class="bold block">Keyword<img title="Type in any keyword you would like, such as pool or wood. If your keywords match a listing, that property will be returned in your search." class="padding-right-10 justTheTip" src="<?=$base?>bootstrap/img/icon_question.gif" alt=""></label>
        <input type="text" value="" title="Enter Keyword" name="Remarks" id="as_Keyword" class="textField textField-half">
      </div>

      <div class="clearAll">&nbsp;</div>

      </fieldset>

    </div>

    <div class="section">

      <h3>Location</h3>

      <div class="location-list clearfix">

        <ul class="clearfix">

          <li> <span class="controls">

            <label class="radio white">

            <input type="radio" checked="checked" name="location-select" value="rad-city" data-target="cityField" onClick="locationType('cityField');" />

            City </label>

            </span> </li>

          <li> <span class="controls">

            <label class="radio white">

            <input type="radio" name="location-select" data-target="zipField" value="rad-zip" onClick="locationType('zipField');" />

            Zip Code </label>

            </span> </li>

          <li> <span class="controls">

            <label class="radio white">

            <input type="radio" name="location-select" data-target="countyField" value="rad-county" onClick="locationType('countyField');" />

            County </label>

            </span> </li>

        </ul>

      </div>

      <div id="locationFields">

        <div id="cityField" class="field clearfix active">

          <label for="as_city" class="bold block">City</label>

          <input type="text" value="" title="Enter " name="location_city" id="as_city" data-src="2013_residential_city" class="textField textField-full autoCompleteField validate-entry ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">

        </div>

        <div style="display:none;" id="zipField" class="field clearfix">

          <label for="as_Zip" class="bold block">Zip Code</label>

          <input type="text" value="" title="Enter Comma-Separated List of Zip Codes" name="Zip_Code" id="as_Zip" data-src="2013_residential_zip_code" class="textField textField-full">

        </div>

        <div id="countyField" class="field msw_container">

          <label class="bold block">County</label>

          <select id="countyOptions" class="selectField selectField-full" name="county[]" multiple="multiple">
                <option value="hillsborough">Hillsborough County</option>
                <option value="pasco">Pasco County</option>
                <option value="pinellas">Pinellas County</option>
          </select>

        </div>

      </div>

    </div>

    <div class="section">

      <h3>Schools</h3>

      <div class="field fieldLeft msw_container">

        <label class="bold block">Elementary School</label>

        <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="Elem_SchoolEQ[]" title="Select Multiple Elementary Schools">

          

          <option value="alafia-hb">Alafia-hb</option>

          <option value="aloma elem">Aloma Elem</option>

          <option value="alta vista elem">Alta Vista Elem</option>

          <option value="alta vista elementary">Alta Vista Elementary</option>

          <option value="altamonte elementary">Altamonte Elementary</option>

          <option value="anna maria elementary">Anna Maria Elementary</option>

          <option value="apollo beach-hb">Apollo Beach-hb</option>

          <option value="apopka elem">Apopka Elem</option>

          <option value="ashton elementary">Ashton Elementary</option>

          <option value="astatula elem">Astatula Elem</option>

          <option value="audubon park elem">Audubon Park Elem</option>

          <option value="ballast point-hb">Ballast Point-hb</option>

          <option value="bardmoor elementary-pn">Bardmoor Elementary-pn</option>

          <option value="bauder elementary-pn">Bauder Elementary-pn</option>

          <option value="bay meadows elem">Bay Meadows Elem</option>

          <option value="bayshore">Bayshore</option>

          <option value="bayshore elementary">Bayshore Elementary</option>

          <option value="bear lake elementary">Bear Lake Elementary</option>

          <option value="belcher elementary-pn">Belcher Elementary-pn</option>

          <option value="blackburn elementary">Blackburn Elementary</option>

          <option value="blankner elem">Blankner Elem</option>

          <option value="blue lake elem">Blue Lake Elem</option>

          <option value="boyette springs-hb">Boyette Springs-hb</option>

          <option value="braden river elementary">Braden River Elementary</option>

          <option value="brentwood elementary">Brentwood Elementary</option>

          <option value="brooker-hb">Brooker-hb</option>

          <option value="brookshire elem">Brookshire Elem</option>

          <option value="bryan plant city-hb">Bryan Plant City-hb</option>

          <option value="bryant-hb">Bryant-hb</option>

          <option value="buckhorn-hb">Buckhorn-hb</option>

          <option value="calusa elementary-po">Calusa Elementary-po</option>

          <option value="cannella-hb">Cannella-hb</option>

          <option value="carrollwood-hb">Carrollwood-hb</option>

          <option value="casselberry elementary">Casselberry Elementary</option>

          <option value="celebration (k12)">Celebration (k12)</option>

          <option value="centennial elementary-po">Centennial Elementary-po</option>

          <option value="chain o lakes elem">Chain O Lakes Elem</option>

          <option value="cheney elem">Cheney Elem</option>

          <option value="chester w taylor elemen-po">Chester W Taylor Elemen-po</option>

          <option value="chiles-hb">Chiles-hb</option>

          <option value="churchwell elem">Churchwell Elem</option>

          <option value="citrus elem">Citrus Elem</option>

          <option value="citrus grove elementary">Citrus Grove Elementary</option>

          <option value="clark-hb">Clark-hb</option>

          <option value="clay springs elem">Clay Springs Elem</option>

          <option value="claywell-hb">Claywell-hb</option>

          <option value="clermont elem">Clermont Elem</option>

          <option value="colson-hb">Colson-hb</option>

          <option value="combee elem">Combee Elem</option>

          <option value="connerton elem">Connerton Elem</option>

          <option value="conway elem">Conway Elem</option>

          <option value="cork-hb">Cork-hb</option>

          <option value="corr-hb">Corr-hb</option>

          <option value="cranberry elementary">Cranberry Elementary</option>

          <option value="crestwood-hb">Crestwood-hb</option>

          <option value="curlew creek elementary-pn">Curlew Creek Elementary-pn</option>

          <option value="cypress creek-hb">Cypress Creek-hb</option>

          <option value="cypress elementary-po">Cypress Elementary-po</option>

          <option value="cypress woods elementary-pn">Cypress Woods Elementary-pn</option>

          <option value="dale mabry">Dale Mabry</option>

          <option value="dale mabry elementary-hb">Dale Mabry Elementary-hb</option>

          <option value="debary elem">Debary Elem</option>

          <option value="deep creek elementary">Deep Creek Elementary</option>

          <option value="deltona lakes elem">Deltona Lakes Elem</option>

          <option value="discovery elem">Discovery Elem</option>

          <option value="dixieland elem">Dixieland Elem</option>

          <option value="dommerich elem">Dommerich Elem</option>

          <option value="double branch elementary">Double Branch Elementary</option>

          <option value="dover shores elem">Dover Shores Elem</option>

          <option value="dr. phillips elem">Dr. Phillips Elem</option>

          <option value="dunedin elementary-pn">Dunedin Elementary-pn</option>

          <option value="east elementary">East Elementary</option>

          <option value="edison-hb">Edison-hb</option>

          <option value="eisenhower elementary-pn">Eisenhower Elementary-pn</option>

          <option value="elbert elem">Elbert Elem</option>

          <option value="emma e. booker elementary">Emma E. Booker Elementary</option>

          <option value="endeavor elem">Endeavor Elem</option>

          <option value="englewood elem">Englewood Elem</option>

          <option value="englewood elementary">Englewood Elementary</option>

          <option value="enterprise elem">Enterprise Elem</option>

          <option value="fishhawk creek-hb">Fishhawk Creek-hb</option>

          <option value="florine j. abel elementary">Florine J. Abel Elementary</option>

          <option value="forest hills-hb">Forest Hills-hb</option>

          <option value="forest lake elem">Forest Lake Elem</option>

          <option value="foster-hb">Foster-hb</option>

          <option value="freedom elementary">Freedom Elementary</option>

          <option value="friendship elem">Friendship Elem</option>

          <option value="frost elementary school">Frost Elementary School</option>

          <option value="fruitville elementary">Fruitville Elementary</option>

          <option value="fuguitt elementary-pn">Fuguitt Elementary-pn</option>

          <option value="garden">Garden</option>

          <option value="garden elementary">Garden Elementary</option>

          <option value="garrison-jones elementary-pn">Garrison-jones Elementary-pn</option>

          <option value="gene witt elementary">Gene Witt Elementary</option>

          <option value="geneva elementary">Geneva Elementary</option>

          <option value="glenallen elementary">Glenallen Elementary</option>

          <option value="gocio elementary">Gocio Elementary</option>

          <option value="gorrie-hb">Gorrie-hb</option>

          <option value="grady-hb">Grady-hb</option>

          <option value="groveland elem">Groveland Elem</option>

          <option value="gulf gate">Gulf Gate</option>

          <option value="gulf gate elementary">Gulf Gate Elementary</option>

          <option value="gulf trace elementary">Gulf Trace Elementary</option>

          <option value="gulfport elementary-pn">Gulfport Elementary-pn</option>

          <option value="gullett elementary">Gullett Elementary</option>

          <option value="hammond elementary school">Hammond Elementary School</option>

          <option value="harmony community school (k-8)">Harmony Community School (k-8)</option>

          <option value="heathrow elementary">Heathrow Elementary</option>

          <option value="hidden oaks elem">Hidden Oaks Elem</option>

          <option value="highland grove elem">Highland Grove Elem</option>

          <option value="hillcrest elem">Hillcrest Elem</option>

          <option value="hudson elementary-po">Hudson Elementary-po</option>

          <option value="hunters green">Hunters Green</option>

          <option value="ippolito-hb">Ippolito-hb</option>

          <option value="james tillman elementary">James Tillman Elementary</option>

          <option value="just-hb">Just-hb</option>

          <option value="kaley elem">Kaley Elem</option>

          <option value="keene crossing elementary">Keene Crossing Elementary</option>

          <option value="keeth elementary">Keeth Elementary</option>

          <option value="kenly-hb">Kenly-hb</option>

          <option value="killarney elem">Killarney Elem</option>

          <option value="kingsway">Kingsway</option>

          <option value="kinnan elementary">Kinnan Elementary</option>

          <option value="lake alfred elem">Lake Alfred Elem</option>

          <option value="lake como elem">Lake Como Elem</option>

          <option value="lake magadlene-hb">Lake Magadlene-hb</option>

          <option value="lake mary elementary">Lake Mary Elementary</option>

          <option value="lake panasoffkee elementary">Lake Panasoffkee Elementary</option>

          <option value="lake shipp elem">Lake Shipp Elem</option>

          <option value="lake silver elem">Lake Silver Elem</option>

          <option value="lake sybelia elem">Lake Sybelia Elem</option>

          <option value="lake weston elem">Lake Weston Elem</option>

          <option value="lake whitney elem">Lake Whitney Elem</option>

          <option value="lakemont elem">Lakemont Elem</option>

          <option value="lakeview elementary">Lakeview Elementary</option>

          <option value="lakeville elem">Lakeville Elem</option>

          <option value="lamarque elementary">Lamarque Elementary</option>

          <option value="lancaster elem">Lancaster Elem</option>

          <option value="laurel">Laurel</option>

          <option value="laurel nokomis elementary">Laurel Nokomis Elementary</option>

          <option value="lawton elementary">Lawton Elementary</option>

          <option value="leesburg elementary">Leesburg Elementary</option>

          <option value="leila g davis elementary-pn">Leila G Davis Elementary-pn</option>

          <option value="lewis-hb">Lewis-hb</option>

          <option value="liberty">Liberty</option>

          <option value="liberty elementary">Liberty Elementary</option>

          <option value="lithia springs-hb">Lithia Springs-hb</option>

          <option value="longleaf elementary-po">Longleaf Elementary-po</option>

          <option value="lost lake elem">Lost Lake Elem</option>

          <option value="loughman oaks elem">Loughman Oaks Elem</option>

          <option value="louise s. mcinnis elem">Louise S. Mcinnis Elem</option>

          <option value="lowry-hb">Lowry-hb</option>

          <option value="lutz-hb">Lutz-hb</option>

          <option value="lynch elementary-pn">Lynch Elementary-pn</option>

          <option value="madeira beach elementary-pn">Madeira Beach Elementary-pn</option>

          <option value="manatee elementary">Manatee Elementary</option>

          <option value="maniscalco-hb">Maniscalco-hb</option>

          <option value="maxey elem">Maxey Elem</option>

          <option value="mckitrick-hb">Mckitrick-hb</option>

          <option value="mcneal elementary">Mcneal Elementary</option>

          <option value="meadow park elementary">Meadow Park Elementary</option>

          <option value="metro west elem">Metro West Elem</option>

          <option value="mildred helms elementary-pn">Mildred Helms Elementary-pn</option>

          <option value="mitchell-hb">Mitchell-hb</option>

          <option value="mittye p. locke-po">Mittye P. Locke-po</option>

          <option value="moody elementary">Moody Elementary</option>

          <option value="moon lake-po">Moon Lake-po</option>

          <option value="moss park elementary">Moss Park Elementary</option>

          <option value="myakka city elementary">Myakka City Elementary</option>

          <option value="myakka river elementary">Myakka River Elementary</option>

          <option value="narcoosee community">Narcoosee Community</option>

          <option value="neil armstrong elementary">Neil Armstrong Elementary</option>

          <option value="nelson-hb">Nelson-hb</option>

          <option value="neptune elementary">Neptune Elementary</option>

          <option value="new river elementary">New River Elementary</option>

          <option value="north shore elementary-pn">North Shore Elementary-pn</option>

          <option value="northshore elementary">Northshore Elementary</option>

          <option value="oak grove elem">Oak Grove Elem</option>

          <option value="oakhurst elementary-pn">Oakhurst Elementary-pn</option>

          <option value="oakstead elementary-po">Oakstead Elementary-po</option>

          <option value="odessa elementary">Odessa Elementary</option>

          <option value="osteen elem">Osteen Elem</option>

          <option value="other">Other</option>

          <option value="ozona elementary-pn">Ozona Elementary-pn</option>

          <option value="palm view elementary">Palm View Elementary</option>

          <option value="palma sola elementary">Palma Sola Elementary</option>

          <option value="partin elementary">Partin Elementary</option>

          <option value="peace river elementary">Peace River Elementary</option>

          <option value="phillippi shores">Phillippi Shores</option>

          <option value="phillippi shores elementary">Phillippi Shores Elementary</option>

          <option value="pine view elementary-po">Pine View Elementary-po</option>

          <option value="pineview elementary">Pineview Elementary</option>

          <option value="polk avenue elem">Polk Avenue Elem</option>

          <option value="polk city elem">Polk City Elem</option>

          <option value="pride elementary">Pride Elementary</option>

          <option value="pride-hb">Pride-hb</option>

          <option value="princeton elem">Princeton Elem</option>

          <option value="quail hollow elementary-po">Quail Hollow Elementary-po</option>

          <option value="r. bruce wagner elem">R. Bruce Wagner Elem</option>

          <option value="reedy creek elem (k 5)">Reedy Creek Elem (k 5)</option>

          <option value="richey elementary-po">Richey Elementary-po</option>

          <option value="ridgecrest elementary-pn">Ridgecrest Elementary-pn</option>

          <option value="ridgewood park elem">Ridgewood Park Elem</option>

          <option value="riverside elem">Riverside Elem</option>

          <option value="robert e willis elementary">Robert E Willis Elementary</option>

          <option value="robert h. prine elementary">Robert H. Prine Elementary</option>

          <option value="roosevelt-hb">Roosevelt-hb</option>

          <option value="round lake elem">Round Lake Elem</option>

          <option value="ruskin-hb">Ruskin-hb</option>

          <option value="safety harbor elementary-pn">Safety Harbor Elementary-pn</option>

          <option value="sallie jones">Sallie Jones</option>

          <option value="sallie jones elementary">Sallie Jones Elementary</option>

          <option value="san antonio-po">San Antonio-po</option>

          <option value="san jose elementary-pn">San Jose Elementary-pn</option>

          <option value="sand hill elem">Sand Hill Elem</option>

          <option value="sand lake elem">Sand Lake Elem</option>

          <option value="sawgrass lake elementary-pn">Sawgrass Lake Elementary-pn</option>

          <option value="scott lake elem">Scott Lake Elem</option>

          <option value="sea breeze elementary">Sea Breeze Elementary</option>

          <option value="seminole elementary-pn">Seminole Elementary-pn</option>

          <option value="sessums-hb">Sessums-hb</option>

          <option value="seven oaks elementary-po">Seven Oaks Elementary-po</option>

          <option value="seven springs elementary-po">Seven Springs Elementary-po</option>

          <option value="shenandoah elem">Shenandoah Elem</option>

          <option value="shore acres elementary-pn">Shore Acres Elementary-pn</option>

          <option value="skycrest elementary-pn">Skycrest Elementary-pn</option>

          <option value="socrum elem">Socrum Elem</option>

          <option value="southside">Southside</option>

          <option value="southside elementary">Southside Elementary</option>

          <option value="southwest elem">Southwest Elem</option>

          <option value="southwood elem">Southwood Elem</option>

          <option value="spessard l. holland elementary">Spessard L. Holland Elementary</option>

          <option value="spirit elem">Spirit Elem</option>

          <option value="spook hill elem">Spook Hill Elem</option>

          <option value="spring creek elem">Spring Creek Elem</option>

          <option value="starkey elementary-pn">Starkey Elementary-pn</option>

          <option value="sterling park elementary">Sterling Park Elementary</option>

          <option value="stone lake elem">Stone Lake Elem</option>

          <option value="stowers elementary">Stowers Elementary</option>

          <option value="sunridge elementary">Sunridge Elementary</option>

          <option value="sunrise elem">Sunrise Elem</option>

          <option value="sunset hills elementary-pn">Sunset Hills Elementary-pn</option>

          <option value="sunset park elem">Sunset Park Elem</option>

          <option value="symmes-hb">Symmes-hb</option>

          <option value="tampa palms-hb">Tampa Palms-hb</option>

          <option value="tangelo park elem">Tangelo Park Elem</option>

          <option value="tara elementary">Tara Elementary</option>

          <option value="tatum ridge elementary">Tatum Ridge Elementary</option>

          <option value="taylor ranch elementary">Taylor Ranch Elementary</option>

          <option value="thacker avenue elem (k 5)">Thacker Avenue Elem (k 5)</option>

          <option value="timber lakes elementary">Timber Lakes Elementary</option>

          <option value="toledo blade elementary">Toledo Blade Elementary</option>

          <option value="town and country-hb">Town And Country-hb</option>

          <option value="trapnell-hb">Trapnell-hb</option>

          <option value="treadway elem">Treadway Elem</option>

          <option value="trinity elementary-po">Trinity Elementary-po</option>

          <option value="trinity oaks elementary">Trinity Oaks Elementary</option>

          <option value="turner elem-hb">Turner Elem-hb</option>

          <option value="tuttle elementary">Tuttle Elementary</option>

          <option value="twin lakes-hb">Twin Lakes-hb</option>

          <option value="valleyview elem">Valleyview Elem</option>

          <option value="valrico-hb">Valrico-hb</option>

          <option value="venice elementary">Venice Elementary</option>

          <option value="ventura elem">Ventura Elem</option>

          <option value="villages elem of lady lake">Villages Elem Of Lady Lake</option>

          <option value="vineland elementary">Vineland Elementary</option>

          <option value="virgil mills elementary">Virgil Mills Elementary</option>

          <option value="vista lakes elem">Vista Lakes Elem</option>

          <option value="walden lake-hb">Walden Lake-hb</option>

          <option value="walker elementary">Walker Elementary</option>

          <option value="walsingham elementary-pn">Walsingham Elementary-pn</option>

          <option value="waterbridge elem">Waterbridge Elem</option>

          <option value="waterford elem">Waterford Elem</option>

          <option value="webster elementary">Webster Elementary</option>

          <option value="wesley chapel elementary-po">Wesley Chapel Elementary-po</option>

          <option value="west zephyrhills elemen-po">West Zephyrhills Elemen-po</option>

          <option value="westbrooke elementary">Westbrooke Elementary</option>

          <option value="westchase-hb">Westchase-hb</option>

          <option value="wilkenson elementary">Wilkenson Elementary</option>

          <option value="wilkinson">Wilkinson</option>

          <option value="wilkinson elementary">Wilkinson Elementary</option>

          <option value="william h. bashaw elementary">William H. Bashaw Elementary</option>

          <option value="williams elementary">Williams Elementary</option>

          <option value="willis">Willis</option>

          <option value="wilson elementary">Wilson Elementary</option>

          <option value="wilson elementary school-hb">Wilson Elementary School-hb</option>

          <option value="wimauma-hb">Wimauma-hb</option>

          <option value="windermere elem">Windermere Elem</option>

          <option value="windy ridge elem">Windy Ridge Elem</option>

          <option value="winter springs elementary">Winter Springs Elementary</option>

          <option value="wolf lake elem">Wolf Lake Elem</option>

          <option value="woodland elementary-po">Woodland Elementary-po</option>

        </select>

      </div>

      <div class="field fieldRight msw_container">

        <label class="bold block">Middle School</label>

        <select style="" class="selectField selectField-half selectField-multiple" multiple="multiple" name="Middle_School[]" title="Select Multiple Middle Schools">

          

          <option value="adams-hb">Adams-hb</option>

          <option value="apopka middle">Apopka Middle</option>

          <option value="avalon middle">Avalon Middle</option>

          <option value="barrington middle">Barrington Middle</option>

          <option value="bartels middle">Bartels Middle</option>

          <option value="bartow middle">Bartow Middle</option>

          <option value="bay point middle-pn">Bay Point Middle-pn</option>

          <option value="bayshore">Bayshore</option>

          <option value="benito">Benito</option>

          <option value="benito-hb">Benito-hb</option>

          <option value="blankner school (k-8)">Blankner School (k-8)</option>

          <option value="booker">Booker</option>

          <option value="booker middle">Booker Middle</option>

          <option value="boone middle">Boone Middle</option>

          <option value="braden river">Braden River</option>

          <option value="braden river middle">Braden River Middle</option>

          <option value="bridgewater middle">Bridgewater Middle</option>

          <option value="brookside">Brookside</option>

          <option value="brookside middle">Brookside Middle</option>

          <option value="buchanan-hb">Buchanan-hb</option>

          <option value="buffalo creek middle">Buffalo Creek Middle</option>

          <option value="burnett-hb">Burnett-hb</option>

          <option value="burns-hb">Burns-hb</option>

          <option value="carlos e. haile middle">Carlos E. Haile Middle</option>

          <option value="carver middle">Carver Middle</option>

          <option value="carwise middle-pn">Carwise Middle-pn</option>

          <option value="cecil gray middle">Cecil Gray Middle</option>

          <option value="celebration (k12)">Celebration (k12)</option>

          <option value="centennial middle-po">Centennial Middle-po</option>

          <option value="chain of lakes middle">Chain Of Lakes Middle</option>

          <option value="charles s. rushe middle-po">Charles S. Rushe Middle-po</option>

          <option value="chasco middle-po">Chasco Middle-po</option>

          <option value="chiles middle">Chiles Middle</option>

          <option value="clermont middle">Clermont Middle</option>

          <option value="coleman ms">Coleman Ms</option>

          <option value="coleman-hb">Coleman-hb</option>

          <option value="conway middle">Conway Middle</option>

          <option value="crews lake middle-po">Crews Lake Middle-po</option>

          <option value="crystal lake middle/jun">Crystal Lake Middle/jun</option>

          <option value="davidsen-hb">Davidsen-hb</option>

          <option value="deland middle">Deland Middle</option>

          <option value="deltona middle">Deltona Middle</option>

          <option value="denison middle">Denison Middle</option>

          <option value="desoto middle school">Desoto Middle School</option>

          <option value="discovery middle">Discovery Middle</option>

          <option value="dundee ridge middle">Dundee Ridge Middle</option>

          <option value="dunedin highland middle-pn">Dunedin Highland Middle-pn</option>

          <option value="east ridge middle">East Ridge Middle</option>

          <option value="eisenhower-hb">Eisenhower-hb</option>

          <option value="eustis middle">Eustis Middle</option>

          <option value="farnell-hb">Farnell-hb</option>

          <option value="fitzgerald middle-pn">Fitzgerald Middle-pn</option>

          <option value="freedom middle">Freedom Middle</option>

          <option value="galaxy middle">Galaxy Middle</option>

          <option value="giunta middle-hb">Giunta Middle-hb</option>

          <option value="glenridge middle">Glenridge Middle</option>

          <option value="gotha middle">Gotha Middle</option>

          <option value="greco-hb">Greco-hb</option>

          <option value="greenwood lakes middle">Greenwood Lakes Middle</option>

          <option value="gulf middle-po">Gulf Middle-po</option>

          <option value="heritage middle">Heritage Middle</option>

          <option value="heron creek middle">Heron Creek Middle</option>

          <option value="hill-hb">Hill-hb</option>

          <option value="horizon middle">Horizon Middle</option>

          <option value="howard middle">Howard Middle</option>

          <option value="hudson middle-po">Hudson Middle-po</option>

          <option value="hunters creek middle">Hunters Creek Middle</option>

          <option value="indian trails middle">Indian Trails Middle</option>

          <option value="jackson heights middle">Jackson Heights Middle</option>

          <option value="jennings-hb">Jennings-hb</option>

          <option value="john hopkins middle school">John Hopkins Middle School</option>

          <option value="john long middle-po">John Long Middle-po</option>

          <option value="kathleen middle">Kathleen Middle</option>

          <option value="l. a. ainger middle">L. A. Ainger Middle</option>

          <option value="l.a. ainger middle">L.a. Ainger Middle</option>

          <option value="lake alfred-addair middle">Lake Alfred-addair Middle</option>

          <option value="lake gibson middle/junio">Lake Gibson Middle/junio</option>

          <option value="lake nona middle school">Lake Nona Middle School</option>

          <option value="lakeland highlands middl">Lakeland Highlands Middl</option>

          <option value="lakeview middle">Lakeview Middle</option>

          <option value="largo middle-pn">Largo Middle-pn</option>

          <option value="laurel">Laurel</option>

          <option value="laurel nokomis middle">Laurel Nokomis Middle</option>

          <option value="lee middle">Lee Middle</option>

          <option value="liberty-hb">Liberty-hb</option>

          <option value="lincoln middle">Lincoln Middle</option>

          <option value="lockhart middle">Lockhart Middle</option>

          <option value="madison-hb">Madison-hb</option>

          <option value="maitland middle">Maitland Middle</option>

          <option value="mann-hb">Mann-hb</option>

          <option value="markham woods middle">Markham Woods Middle</option>

          <option value="marshall-hb">Marshall-hb</option>

          <option value="martha b. king middle">Martha B. King Middle</option>

          <option value="martinez-hb">Martinez-hb</option>

          <option value="mcintosh middle">Mcintosh Middle</option>

          <option value="mclane-hb">Mclane-hb</option>

          <option value="mclaughlin middle">Mclaughlin Middle</option>

          <option value="meadow wood middle">Meadow Wood Middle</option>

          <option value="meadowbrook middle">Meadowbrook Middle</option>

          <option value="meadowlawn middle-pn">Meadowlawn Middle-pn</option>

          <option value="memorial-hb">Memorial-hb</option>

          <option value="milwee middle">Milwee Middle</option>

          <option value="mount dora middle">Mount Dora Middle</option>

          <option value="mulrennan-hb">Mulrennan-hb</option>

          <option value="murdock middle">Murdock Middle</option>

          <option value="narcoossee community (k-8)">Narcoossee Community (k-8)</option>

          <option value="neptune middle  (6-8)">Neptune Middle  (6-8)</option>

          <option value="nolan middle">Nolan Middle</option>

          <option value="oak grove middle-pn">Oak Grove Middle-pn</option>

          <option value="oak park middle">Oak Park Middle</option>

          <option value="ocoee middle">Ocoee Middle</option>

          <option value="odyssey middle">Odyssey Middle</option>

          <option value="osceola middle-pn">Osceola Middle-pn</option>

          <option value="other">Other</option>

          <option value="palm harbor middle-pn">Palm Harbor Middle-pn</option>

          <option value="pasco middle-po">Pasco Middle-po</option>

          <option value="paul r. smith middle-po">Paul R. Smith Middle-po</option>

          <option value="piedmont lakes middle">Piedmont Lakes Middle</option>

          <option value="pierce-hb">Pierce-hb</option>

          <option value="pine view middle-po">Pine View Middle-po</option>

          <option value="port charlotte">Port Charlotte</option>

          <option value="port charlotte middle">Port Charlotte Middle</option>

          <option value="punta gorda">Punta Gorda</option>

          <option value="punta gorda middle">Punta Gorda Middle</option>

          <option value="randall-hb">Randall-hb</option>

          <option value="raymond b stewart middle-po">Raymond B Stewart Middle-po</option>

          <option value="river ridge middle-po">River Ridge Middle-po</option>

          <option value="river springs middle school">River Springs Middle School</option>

          <option value="rodgers-hb">Rodgers-hb</option>

          <option value="safety harbor middle-pn">Safety Harbor Middle-pn</option>

          <option value="sara scott harllee middle">Sara Scott Harllee Middle</option>

          <option value="sarasota">Sarasota</option>

          <option value="sarasota middle">Sarasota Middle</option>

          <option value="seminole middle-pn">Seminole Middle-pn</option>

          <option value="seven springs middle-po">Seven Springs Middle-po</option>

          <option value="shields-hb">Shields-hb</option>

          <option value="sleepy hill middle">Sleepy Hill Middle</option>

          <option value="sligh-hb">Sligh-hb</option>

          <option value="south seminole middle">South Seminole Middle</option>

          <option value="south sumter middle">South Sumter Middle</option>

          <option value="southwest middle">Southwest Middle</option>

          <option value="southwestern middle">Southwestern Middle</option>

          <option value="stambaugh middle">Stambaugh Middle</option>

          <option value="stonewall jackson middle">Stonewall Jackson Middle</option>

          <option value="sunridge middle">Sunridge Middle</option>

          <option value="t. dewitt taylor middle-high">T. Dewitt Taylor Middle-high</option>

          <option value="tarpon springs middle-pn">Tarpon Springs Middle-pn</option>

          <option value="tavares middle=tavares middle">Tavares Middle=tavares Middle</option>

          <option value="teague middle">Teague Middle</option>

          <option value="thomas e weightman middle-po">Thomas E Weightman Middle-po</option>

          <option value="tomlin-hb">Tomlin-hb</option>

          <option value="turkey creek-hb">Turkey Creek-hb</option>

          <option value="umatilla middle">Umatilla Middle</option>

          <option value="union park middle">Union Park Middle</option>

          <option value="venice">Venice</option>

          <option value="venice area middle">Venice Area Middle</option>

          <option value="w.d. sugg middle">W.d. Sugg Middle</option>

          <option value="walker middle">Walker Middle</option>

          <option value="walker-hb">Walker-hb</option>

          <option value="webb-hb">Webb-hb</option>

          <option value="wilson-hb">Wilson-hb</option>

          <option value="windy hill middle">Windy Hill Middle</option>

          <option value="wolf lake middle">Wolf Lake Middle</option>

          <option value="woodland middle school">Woodland Middle School</option>

        </select>

      </div>

      <div class="clearAll">&nbsp;</div>

      <div class="field fieldLeft msw_container">

        <label class="bold block">High School</label>

        <select style="" class="selectField selectField-half selectField-multiple" multiple="multiple" name="High_School[]" title="Select Multiple High Schools">

          

          <option value="alonso-hb">Alonso-hb</option>

          <option value="anclote high-po">Anclote High-po</option>

          <option value="apopka high">Apopka High</option>

          <option value="armwood-hb">Armwood-hb</option>

          <option value="auburndale high">Auburndale High</option>

          <option value="bartow high">Bartow High</option>

          <option value="bayshore">Bayshore</option>

          <option value="bayshore high">Bayshore High</option>

          <option value="blake-hb">Blake-hb</option>

          <option value="bloomingdale-hb">Bloomingdale-hb</option>

          <option value="booker">Booker</option>

          <option value="booker high">Booker High</option>

          <option value="boone high">Boone High</option>

          <option value="braden river">Braden River</option>

          <option value="braden river high">Braden River High</option>

          <option value="brandon-hb">Brandon-hb</option>

          <option value="celebration (k12)">Celebration (k12)</option>

          <option value="chamberlain-hb">Chamberlain-hb</option>

          <option value="charlotte">Charlotte</option>

          <option value="charlotte high">Charlotte High</option>

          <option value="clearwater high-pn">Clearwater High-pn</option>

          <option value="colonial high">Colonial High</option>

          <option value="countryside high-pn">Countryside High-pn</option>

          <option value="cypress creek high">Cypress Creek High</option>

          <option value="deland high">Deland High</option>

          <option value="deltona high">Deltona High</option>

          <option value="desoto county high school">Desoto County High School</option>

          <option value="dixie hollins high-pn">Dixie Hollins High-pn</option>

          <option value="dr. phillips high">Dr. Phillips High</option>

          <option value="dunedin high-pn">Dunedin High-pn</option>

          <option value="durant-hb">Durant-hb</option>

          <option value="east bay-hb">East Bay-hb</option>

          <option value="east lake high-pn">East Lake High-pn</option>

          <option value="east ridge high">East Ridge High</option>

          <option value="edgewater high">Edgewater High</option>

          <option value="eustis high school">Eustis High School</option>

          <option value="evans high">Evans High</option>

          <option value="fivay high-po">Fivay High-po</option>

          <option value="freedom high school">Freedom High School</option>

          <option value="freedom-hb">Freedom-hb</option>

          <option value="gaither-hb">Gaither-hb</option>

          <option value="george jenkins high">George Jenkins High</option>

          <option value="gulf high-po">Gulf High-po</option>

          <option value="hagerty high">Hagerty High</option>

          <option value="haines city senior high">Haines City Senior High</option>

          <option value="harmony high">Harmony High</option>

          <option value="hillsborough-hb">Hillsborough-hb</option>

          <option value="hudson high-po">Hudson High-po</option>

          <option value="j.w. mitchell high-po">J.w. Mitchell High-po</option>

          <option value="kathleen high">Kathleen High</option>

          <option value="king-hb">King-hb</option>

          <option value="lake brantley high">Lake Brantley High</option>

          <option value="lake gibson high">Lake Gibson High</option>

          <option value="lake howell high">Lake Howell High</option>

          <option value="lake mary high">Lake Mary High</option>

          <option value="lake minnelola high">Lake Minnelola High</option>

          <option value="lake nona high">Lake Nona High</option>

          <option value="lake region high">Lake Region High</option>

          <option value="lake wales senior high">Lake Wales Senior High</option>

          <option value="lakeland senior high">Lakeland Senior High</option>

          <option value="lakewood high-pn">Lakewood High-pn</option>

          <option value="lakewood ranch high">Lakewood Ranch High</option>

          <option value="land o lakes high-po">Land O Lakes High-po</option>

          <option value="largo high-pn">Largo High-pn</option>

          <option value="leesburg high">Leesburg High</option>

          <option value="lemon bay high">Lemon Bay High</option>

          <option value="lennard-hb">Lennard-hb</option>

          <option value="leto-hb">Leto-hb</option>

          <option value="lyman high">Lyman High</option>

          <option value="manatee high">Manatee High</option>

          <option value="middleton-hb">Middleton-hb</option>

          <option value="mount dora high">Mount Dora High</option>

          <option value="newsome-hb">Newsome-hb</option>

          <option value="north port high">North Port High</option>

          <option value="northeast high-pn">Northeast High-pn</option>

          <option value="oak ridge high">Oak Ridge High</option>

          <option value="ocoee high">Ocoee High</option>

          <option value="olympia high">Olympia High</option>

          <option value="osceola high school">Osceola High School</option>

          <option value="other">Other</option>

          <option value="oviedo high">Oviedo High</option>

          <option value="palm harbor univ high-pn">Palm Harbor Univ High-pn</option>

          <option value="palmetto high">Palmetto High</option>

          <option value="pasco high-po">Pasco High-po</option>

          <option value="pine ridge high school">Pine Ridge High School</option>

          <option value="pinellas park high-pn">Pinellas Park High-pn</option>

          <option value="plant city-hb">Plant City-hb</option>

          <option value="plant hs">Plant Hs</option>

          <option value="plant-hb">Plant-hb</option>

          <option value="poinciana high school">Poinciana High School</option>

          <option value="port charlotte">Port Charlotte</option>

          <option value="port charlotte high">Port Charlotte High</option>

          <option value="ridgewood high school-po">Ridgewood High School-po</option>

          <option value="river ridge high-po">River Ridge High-po</option>

          <option value="riverview">Riverview</option>

          <option value="riverview high">Riverview High</option>

          <option value="riverview-hb">Riverview-hb</option>

          <option value="robinson-hb">Robinson-hb</option>

          <option value="saint petersburg high school">Saint Petersburg High School</option>

          <option value="sarasota">Sarasota</option>

          <option value="sarasota high">Sarasota High</option>

          <option value="seminole high">Seminole High</option>

          <option value="seminole high-pn">Seminole High-pn</option>

          <option value="sickles-hb">Sickles-hb</option>

          <option value="south lake high">South Lake High</option>

          <option value="south sumter high">South Sumter High</option>

          <option value="southeast high">Southeast High</option>

          <option value="spoto high-hb">Spoto High-hb</option>

          <option value="st. cloud high school">St. Cloud High School</option>

          <option value="steinbrenner high school">Steinbrenner High School</option>

          <option value="strawberry crest high school">Strawberry Crest High School</option>

          <option value="sunlake high school-po">Sunlake High School-po</option>

          <option value="t. dewitt taylor middle-high">T. Dewitt Taylor Middle-high</option>

          <option value="tarpon springs high-pn">Tarpon Springs High-pn</option>

          <option value="tavares high">Tavares High</option>

          <option value="tenoroc senior">Tenoroc Senior</option>

          <option value="timber creek high">Timber Creek High</option>

          <option value="umatilla high">Umatilla High</option>

          <option value="university high">University High</option>

          <option value="venice">Venice</option>

          <option value="venice senior high">Venice Senior High</option>

          <option value="wekiva high">Wekiva High</option>

          <option value="wesley chapel high-po">Wesley Chapel High-po</option>

          <option value="west orange high">West Orange High</option>

          <option value="wharton">Wharton</option>

          <option value="wharton-hb">Wharton-hb</option>

          <option value="winter haven senior">Winter Haven Senior</option>

          <option value="winter park high">Winter Park High</option>

          <option value="winter springs high">Winter Springs High</option>

          <option value="wiregrass ranch high-po">Wiregrass Ranch High-po</option>

          <option value="zephryhills high school-po">Zephryhills High School-po</option>

        </select>

      </div>

      <div class="clearAll">&nbsp;</div>

    </div>
	
    <div class="section noborder clearfix">

      <h3>Water</h3>

      <div class="field fieldLeft">
        <label class="block bold">Water View</label>
        <select name="WaterView" class="selectField selectField-half" title="Select Water View Preference">
          <option value="">No Preference</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
      </div>
      <div class="field fieldRight">
        <label class="block bold">Water Extras</label>
        <select name="WaterExtrasBit" class="selectField selectField-half" title="Select Water Access Preference">
          <option value="">No Preference</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
      </div>

    </div>
	
    <div id="additionalDetails" class="expand-section">

      <div class="expand-trigger" onClick="expandBlock('additionalDetails');"> <span class="expand-icon">&nbsp;</span>

        <h2>Additional Property Details</h2>

        <p class="expand-description">Specific criteria including general features, water views, a collection of green information and more...</p>

      </div>

      <div class="expand-block">

        <div class="section">

          <h3>General</h3>

          <div class="field fieldLeft radioGroup">

            <label class="block bold">Pets Allowed</label>

            <label class="checkBoxLabel">

            <input type="radio" title="Select Pets Allowed Preference" name="Pets" value="Yes">

            <span>Yes</span> </label>

            <label class="checkBoxLabel">

            <input type="radio" title="Select Pets Allowed Preference" name="Pets" value="No">

            <span>No</span> </label>

            <label class="checkBoxLabel last">

            <input type="radio" title="Select Pets Allowed Preference" name="Pets" value="">

            <span>No Preference</span> </label>

          </div>

          <?php /*?><div class="field fieldRight msw_container">

            <label class="bold block">Housing for Older Persons</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="HousingOlderPersons[]" title="Select Multiple">

              

              <option value="55 or older">55 Or Older</option>

            </select>

          </div><?php */?>

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft">

            <label for="as_numFloors" class="bold block">Building Number of Floors</label>

            <input type="text" value="" title="Select Minimum Building Number of Floors" name="MinFloors" id="as_numFloors" class="textField textField-half">

          </div>

          <div class="field fieldRight">

            <label for="as_unitFloors" class="bold block">Floors in Unit</label>

            <input type="text" value="" title="Enter Minimum Floors In Unit" name="unitFloors" id="as_unitFloors" class="textField textField-half">

          </div>

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft msw_container">

            <label class="bold block">Community Features</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="community_features[]" title="Select Multiple Community Features">

              

              <option value="airport/runway">Airport/runway</option>

              <option value="association recreat">Association Recreat</option>

              <option value="boat slip">Boat Slip</option>

              <option value="buyer approval required">Buyer Approval Required</option>

              <option value="cable">Cable</option>

              <option value="community boat ramp">Community Boat Ramp</option>

              <option value="community hot tub/spa">Community Hot Tub/spa</option>

              <option value="deed restrictions">Deed Restrictions</option>

              <option value="dock">Dock</option>

              <option value="elevators">Elevators</option>

              <option value="fees required">Fees Required</option>

              <option value="fishing pier">Fishing Pier</option>

              <option value="fitness">Fitness</option>

              <option value="gated community">Gated Community</option>

              <option value="golf community">Golf Community</option>

              <option value="horses allowed">Horses Allowed</option>

              <option value="laundry facility">Laundry Facility</option>

              <option value="maintenance free">Maintenance Free</option>

              <option value="no deed restriction">No Deed Restriction</option>

              <option value="none">None</option>

              <option value="optional additional fees">Optional Additional Fees</option>

              <option value="park">Park</option>

              <option value="playground">Playground</option>

              <option value="public boat ramp">Public Boat Ramp</option>

              <option value="recreation building">Recreation Building</option>

              <option value="security">Security</option>

              <option value="shuffleboard">Shuffleboard</option>

              <option value="special community restrictions">Special Community Restrictions</option>

              <option value="tennis courts">Tennis Courts</option>

              <option value="water access">Water Access</option>

              <option value="waterfront complex">Waterfront Complex</option>

            </select>

          </div>
        <div class="field fieldRight">

            <label for="as_FeeSchedule" class="block bold">Condo Maintenance Fee Schedule</label>

            <select name="feeCondoMaintenanceFrequency[]" title="Select Condo Maintenance Fee Schedule" multiple="multiple"  class="selectField selectField-half selectField-multiple" id="as_FeeSchedule">
              <option selected="selected" value="">Any</option>
              <option value="annual">Annual</option>
              <option value="monthly">Monthly</option>
              <option value="quarterly">Quarterly</option>
              <option value="semi-annual">Semi-annual</option>
            </select>

          </div>
          <div class="clearAll">&nbsp;</div>

          <!--<div class="field fieldLeft">

            <label for="as_LegalSubName" class="bold block">Legal Subdivision Name</label>

            <input type="text" value="" title="Enter Comma-Separated List of Legal Subdivision Names" name="Subdivision" id="as_LegalSubName" data-src="2013_residential_legal_sub_name" class="textField textField-half autoCompleteField validate-entry ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">

          </div>-->

          

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft">
            <label for="as_hoaSchedule" class="block bold">HOA Payment Schedule</label>
            <select name="HOA_Frequency[]" title="Select HOA Payment Schedule" multiple="multiple"  class="selectField selectField-half selectField-multiple" id="as_hoaSchedule">
              <option value="annual payment">Annual Payment</option>
              <option value="monthly payment">Monthly Payment</option>
              <option value="quarterly payment">Quarterly Payment</option>
              <option value="semi-annual payment">Semi-annual Payment</option>
            </select>
          </div>
          <div class="field fieldRight">
            <label for="as_comAssociation" class="block bold">HOA / Community Association</label>
            <select name="HOA_Mandatory[]" title="Select HOA / Community Association" multiple="multiple"  class="selectField selectField-half selectField-multiple" id="as_comAssociation">
              <option value="None">No</option>
              <option value="Optional">Op</option>
              <option value="Required">Re</option>
            </select>
          </div>

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft radioGroup">

            <label class="block bold">CDD</label>

            <label class="checkBoxLabel">

            <input type="radio" title="Select CDD" name="CDD" value="Yes">

            <span>Yes</span> </label>

            <label class="checkBoxLabel">

            <input type="radio" title="Select CDD" name="CDD" value="No">

            <span>No</span> </label>

            <label class="checkBoxLabel last">

            <input type="radio" title="Select CDD" name="CDD" value="">

            <span>No Preference</span> </label>

          </div>

        <div class="field fieldRight msw_container">
            <label class="bold block">Only Show Listings With</label>
            <label class="checkBoxLabel" style="margin-top:10px;">
                <input type="checkbox" title="Select only Properties with Photos" name="photo_virtual_tour" value="1">
                <span>Images/Virtual Tour</span> 
            </label>
          </div>

          <div class="clearAll">&nbsp;</div>

        </div>

        <div class="section noborder">

          <h3>Green Information</h3>

          <div class="field fieldLeft msw_container">

            <label class="bold block">Green Certification<img title="Select from the environment-friendly certifications available for your next home." class="padding-right-10 justTheTip" src="<?=$base?>bootstrap/img/icon_question.gif" alt=""></label>

            <select class="selectField selectField-half" name="GreenCertDesc" title="Select Green Certification Options">
              <option value="">Any</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </div>

          <div class="field fieldRight msw_container">

            <label class="bold block">Green Landscaping</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="GreenLand[]" title="Select Multiple Green Landscaping">

              

              <option value="fl. friendly/native landscape">Fl. Friendly/native Landscape</option>

              <option value="non toxic fertilizer/pesticides">Non Toxic Fertilizer/pesticides</option>

            </select>

          </div>

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft msw_container">

            <label class="bold block">Green Water Features</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="GreenWater[]" title="Select Multiple Green Water Features">

              

              <option value="drip irrigation">Drip Irrigation</option>

              <option value="dual flush toilets">Dual Flush Toilets</option>

              <option value="high eff. (low flow) toilet">High Eff. (low Flow) Toilet</option>

              <option value="high eff. faucet/fixtures">High Eff. Faucet/fixtures</option>

              <option value="irrigation-low volume">Irrigation-low Volume</option>

              <option value="irrigation-reclaimed water">Irrigation-reclaimed Water</option>

              <option value="whole house water purification">Whole House Water Purification</option>

            </select>

          </div>

          <div class="field fieldRight msw_container">

            <label class="bold block">Disaster Mitigation</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="disaster_mitigation[]" title="Select Multiple Disaster Mitigation Options">

              

              <option value="above flood plain">Above Flood Plain</option>

              <option value="fire resistant exterior">Fire Resistant Exterior</option>

              <option value="fire/smoke detection integration">Fire/smoke Detection Integration</option>

              <option value="hurricane insur. deduction qual.">Hurricane Insur. Deduction Qual.</option>

              <option value="hurricane shutters/windows">Hurricane Shutters/windows</option>

            </select>

          </div>

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft msw_container">

            <label class="bold block">Indoor Air Quality</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="AirQualityIndoor[]" title="Select Multiple Indoor Air Quality Options">
              <option value="bath fans vented to outside">Bath Fans Vented To Outside</option>
              <option value="fireplace - direct vent">Fireplace - Direct Vent</option>
              <option value="fresh air ventilation system">Fresh Air Ventilation System</option>
              <option value="hvac cartridge/media filter">Hvac Cartridge/media Filter</option>
              <option value="hvac filter merv 8%25252B">Hvac Filter Merv 8+</option>
              <option value="hvac uv/elec. filtration">Hvac Uv/elec. Filtration</option>
              <option value="no/low voc paint/finish">No/low Voc Paint/finish</option>
              <option value="range hood vented to outside">Range Hood Vented To Outside</option>
              <option value="whole house vacuum system">Whole House Vacuum System</option>
            </select>

          </div>

          <div class="clearAll">&nbsp;</div>

        </div>

      </div>

    </div>

    </div>

    <div id="interior" class="expand-section">

      <div class="expand-trigger" onClick="expandBlock('interior');"> <span class="expand-icon">&nbsp;</span>

        <h2>Interior</h2>

        <p class="expand-description">Specific criteria including interior layout, fireplace, appliances, utilities and more...</p>

      </div>

      <div class="expand-block">

        <div class="section noborder">

          <div class="field fieldLeft msw_container">

            <label class="bold block">Interior Layout</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="InteriorLayout[]" title="Select Multiple Interior Layout Options">

              

              <option value="bonus room">Bonus Room</option>

              <option value="breakfast room separate">Breakfast Room Separate</option>

              <option value="eating space in kitchen">Eating Space In Kitchen</option>

              <option value="formal dining room separate">Formal Dining Room Separate</option>

              <option value="formal living room separate">Formal Living Room Separate</option>

              <option value="great room">Great Room</option>

              <option value="kitchen/family room combo">Kitchen/family Room Combo</option>

              <option value="l dining">L Dining</option>

              <option value="living room/great room">Living Room/great Room</option>

              <option value="living/dining room combo">Living/dining Room Combo</option>

              <option value="mstr bedroom downstairs">Mstr Bedroom Downstairs</option>

              <option value="open plan">Open Plan</option>

              <option value="split bedroom">Split Bedroom</option>

              <option value="volume ceilings">Volume Ceilings</option>

            </select>

          </div>

          <div class="field fieldRight msw_container">

            <label class="bold block">Kitchen Features</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="KitchenFeatures[]" title="Select Multiple Kitchen Features">

              

              <option value="breakfast bar">Breakfast Bar</option>

              <option value="breakfast/snackbar">Breakfast/snackbar</option>

              <option value="closet pantry">Closet Pantry</option>

              <option value="desk built in">Desk Built In</option>

              <option value="island">Island</option>

              <option value="pantry">Pantry</option>

              <option value="walk in pantry">Walk In Pantry</option>

            </select>

          </div>

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft msw_container">

            <label class="bold block">Appliances Included</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="Appliances[]" title="Select Multiple Included Appliances">

              

              <option value="built in oven">Built In Oven</option>

              <option value="compactor">Compactor</option>

              <option value="convection oven">Convection Oven</option>

              <option value="dishwasher">Dishwasher</option>

              <option value="disposal">Disposal</option>

              <option value="dryer">Dryer</option>

              <option value="exhaust fan">Exhaust Fan</option>

              <option value="freezer">Freezer</option>

              <option value="hot water electric">Hot Water Electric</option>

              <option value="microwave">Microwave</option>

              <option value="none">None</option>

              <option value="other">Other</option>

              <option value="oven">Oven</option>

              <option value="range">Range</option>

              <option value="refrigerator">Refrigerator</option>

              <option value="washer">Washer</option>

              <option value="wine refrigeration">Wine Refrigeration</option>

            </select>

          </div>

          <div class="field fieldRight msw_container">

            <label class="bold block">Air Conditioning</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="cooling_description[]" title="Select Multiple Air Conditioning Options">

              

              <option value="central">Central</option>

              <option value="humidistat">Humidistat</option>

              <option value="no air">No Air</option>

              <option value="wall units/window">Wall Units/window</option>

              <option value="zoned/multiple">Zoned/multiple</option>

            </select>

          </div>

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft radioGroup">

            <label class="block bold">Fireplace</label>

            <label class="checkBoxLabel">

            <input type="radio" title="Select Fireplace Preference" name="FireplaceBit" value="Yes">

            <span>Yes</span> </label>

            <label class="checkBoxLabel">

            <input type="radio" title="Select Fireplace Preference" name="FireplaceBit" value="No">

            <span>No</span> </label>

            <label class="checkBoxLabel last">

            <input type="radio" title="Select Fireplace Preference" name="FireplaceBit" value="">

            <span>No Preference</span> </label>

          </div>

          <div class="field fieldRight msw_container">

            <label class="bold block">Utilities</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="utilitiesIncluded[]" title="Select Multiple Utility Preferences">

              

              <option value="bb/hs internet avail">Bb/hs Internet Avail</option>

              <option value="cable available">Cable Available</option>

              <option value="cable connected">Cable Connected</option>

              <option value="canal/lake for irrigation">Canal/lake For Irrigation</option>

              <option value="city water">City Water</option>

              <option value="county water">County Water</option>

              <option value="electric">Electric</option>

              <option value="fire hydrant">Fire Hydrant</option>

              <option value="other">Other</option>

              <option value="private municipal water">Private Municipal Water</option>

              <option value="private utilities">Private Utilities</option>

              <option value="public municipal water">Public Municipal Water</option>

              <option value="public sewer">Public Sewer</option>

              <option value="public utilities">Public Utilities</option>

              <option value="public water available">Public Water Available</option>

              <option value="septic">Septic</option>

              <option value="sprinkler well">Sprinkler Well</option>

              <option value="street lights">Street Lights</option>

              <option value="underground">Underground</option>

              <option value="well">Well</option>

            </select>

          </div>

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft msw_container">

            <label class="bold block">Heating &amp; Fuel</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="HeatDescML[]" title="Select Multiple Heating Options">

              

              <option value="central">Central</option>

              <option value="fuel - electric">Fuel - Electric</option>

              <option value="fuel - gas bottled">Fuel - Gas Bottled</option>

              <option value="fuel - gas natural">Fuel - Gas Natural</option>

              <option value="fuel - oil">Fuel - Oil</option>

              <option value="heat pump">Heat Pump</option>

              <option value="heat recovery unit">Heat Recovery Unit</option>

              <option value="no heat">No Heat</option>

              <option value="other">Other</option>

              <option value="partial">Partial</option>

              <option value="radiant / baseboards">Radiant / Baseboards</option>

              <option value="radiant / ceiling">Radiant / Ceiling</option>

              <option value="solar">Solar</option>

              <option value="space heater">Space Heater</option>

              <option value="wall furnace">Wall Furnace</option>

              <option value="wall units / window unit">Wall Units / Window Unit</option>

              <option value="zoned/multiple">Zoned/multiple</option>

            </select>

          </div>

          <div class="clearAll">&nbsp;</div>

        </div>

      </div>

    </div>

    <div id="exterior" class="expand-section">

      <div class="expand-trigger" onClick="expandBlock('exterior');"> <span class="expand-icon">&nbsp;</span>

        <h2>Exterior</h2>

        <p class="expand-description">Specific criteria including exterior features, architectural style, pool, garage spaces and more...</p>

      </div>

      <div class="expand-block">

        <div class="section noborder">

          <div class="field fieldLeft">

            <label for="as_Pool" class="block bold">Pool</label>

            <select name="PoolDesc" title="Select Pool Type" class="selectField selectField-half" id="as_Pool">

              <option selected="selected" value="">Any</option>

              <option value="Community">Community</option>

              <option value="private">Private</option>

            </select>

          </div>

          <div class="field fieldRight msw_container">

            <label class="bold block">Exterior Features</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="ExtFeatures[]" title="Select Multiple Exterior Features">

              

              <option value="balcony/sun deck">Balcony/sun Deck</option>

              <option value="barn">Barn</option>

              <option value="detached in-law apt">Detached In-law Apt</option>

              <option value="detached workshop">Detached Workshop</option>

              <option value="fenced">Fenced</option>

              <option value="french doors">French Doors</option>

              <option value="fruit trees">Fruit Trees</option>

              <option value="gutters / downspouts">Gutters / Downspouts</option>

              <option value="handicap modified">Handicap Modified</option>

              <option value="hot tub/spa">Hot Tub/spa</option>

              <option value="hurricane shutters">Hurricane Shutters</option>

              <option value="irrigation system">Irrigation System</option>

              <option value="mature landscaping">Mature Landscaping</option>

              <option value="oak trees">Oak Trees</option>

              <option value="other">Other</option>

              <option value="outdoor grill">Outdoor Grill</option>

              <option value="outdoor kitchen">Outdoor Kitchen</option>

              <option value="outdoor lights">Outdoor Lights</option>

              <option value="outdoor shower">Outdoor Shower</option>

              <option value="parking - rv/boat">Parking - Rv/boat</option>

              <option value="patio/porch covered">Patio/porch Covered</option>

              <option value="patio/porch open">Patio/porch Open</option>

              <option value="patio/porch screened">Patio/porch Screened</option>

              <option value="patio/porch/deck covered">Patio/porch/deck Covered</option>

              <option value="patio/porch/deck open">Patio/porch/deck Open</option>

              <option value="patio/porch/deck screened">Patio/porch/deck Screened</option>

              <option value="porch / patio">Porch / Patio</option>

              <option value="sauna">Sauna</option>

              <option value="screen/covered enclosure">Screen/covered Enclosure</option>

              <option value="sliding doors">Sliding Doors</option>

              <option value="storage">Storage</option>

              <option value="trees/landscaped">Trees/landscaped</option>

              <option value="utility shed">Utility Shed</option>

              <option value="xeriscape">Xeriscape</option>

            </select>

          </div>

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft msw_container">

            <label class="bold block">Garage / Carport</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="GarageDesc[]" title="Select Multiple Garage / Carport Options">

              

              <option value="1 car">1 Car</option>

              <option value="1 car carport">1 Car Carport</option>

              <option value="1 car garage">1 Car Garage</option>

              <option value="2 car">2 Car</option>

              <option value="2 car carport">2 Car Carport</option>

              <option value="2 car garage">2 Car Garage</option>

              <option value="3 car carport">3 Car Carport</option>

              <option value="3 car garage">3 Car Garage</option>

              <option value="3%25252B car">3+ Car</option>

              <option value="3%25252B car carport">3+ Car Carport</option>

              <option value="3%25252B car garage">3+ Car Garage</option>

              <option value="4 car carport">4 Car Carport</option>

              <option value="4 car garage">4 Car Garage</option>

              <option value="5%25252B car carport">5+ Car Carport</option>

              <option value="5%25252B car garage">5+ Car Garage</option>

              <option value="garage">Garage</option>

              <option value="golf cart garage">Golf Cart Garage</option>

              <option value="none">None</option>

              <option value="rv carport">Rv Carport</option>

              <option value="rv garage">Rv Garage</option>

              <option value="under building parking">Under Building Parking</option>

            </select>

          </div>

          <div class="field fieldRight  msw_container">

            <label class="bold block">Architectural Style</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="StyleArch[]" title="Select Multiple Architectural Style Options">

              

              <option value="3rd floor%25252Babove m">3rd Floor+above M</option>

              <option value="bungalow">Bungalow</option>

              <option value="cape cod">Cape Cod</option>

              <option value="colonial">Colonial</option>

              <option value="contemporary">Contemporary</option>

              <option value="courtyard">Courtyard</option>

              <option value="custom">Custom</option>

              <option value="dutch provincial">Dutch Provincial</option>

              <option value="elevated">Elevated</option>

              <option value="florida">Florida</option>

              <option value="french provincial">French Provincial</option>

              <option value="historical">Historical</option>

              <option value="key west">Key West</option>

              <option value="one story">One Story</option>

              <option value="other">Other</option>

              <option value="patio">Patio</option>

              <option value="ranch">Ranch</option>

              <option value="spanish/mediterranean">Spanish/mediterranean</option>

              <option value="townhouse">Townhouse</option>

              <option value="traditional">Traditional</option>

              <option value="tudor">Tudor</option>

              <option value="two story">Two Story</option>

              <option value="victorian">Victorian</option>

              <option value="villa">Villa</option>

            </select>

          </div>

          <div class="clearAll">&nbsp;</div>

          <!--<div class="field fieldLeft msw_container">

            <label class="bold block">Roof</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="RoofDesc[]" title="Select Multiple Roof Types">

              

              <option value="built up">Built Up</option>

              <option value="membrane">Membrane</option>

              <option value="metal">Metal</option>

              <option value="monier concrete tile">Monier Concrete Tile</option>

              <option value="other">Other</option>

              <option value="roof over">Roof Over</option>

              <option value="shake">Shake</option>

              <option value="shingle">Shingle</option>

              <option value="slate">Slate</option>

              <option value="tile">Tile</option>

            </select>

          </div>-->

          <!--<div class="field fieldLeft msw_container">

            <label class="bold block">Exterior Construction</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="Construction[]" title="Select Multiple Exterior Constructions">

              

              <option value="asbestos">Asbestos</option>

              <option value="block">Block</option>

              <option value="brick">Brick</option>

              <option value="concrete">Concrete</option>

              <option value="concrete bl">Concrete Bl</option>

              <option value="frame">Frame</option>

              <option value="icf insulated concrete forms">Icf Insulated Concrete Forms</option>

              <option value="log">Log</option>

              <option value="metal frame">Metal Frame</option>

              <option value="on piling">On Piling</option>

              <option value="other">Other</option>

              <option value="siding">Siding</option>

              <option value="sip (structurally insulated panel)">Sip (structurally Insulated Panel)</option>

              <option value="stem wall">Stem Wall</option>

              <option value="stone">Stone</option>

              <option value="stucco">Stucco</option>

              <option value="tilt up walls">Tilt Up Walls</option>

              <option value="wood frame">Wood Frame</option>

              <option value="wood frame (fsc certified)">Wood Frame (fsc Certified)</option>

            </select>

          </div>-->

          <div class="clearAll">&nbsp;</div>

        </div>

      </div>

    </div>

    

</div>