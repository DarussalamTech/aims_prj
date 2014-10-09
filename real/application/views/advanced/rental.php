<div id="dynamic-content">

  <div class="formContainer" id="residentialSearchFormWrapper">

    <div class="section">

      <fieldset>

      <h2>Property Details</h2>

      <div class="field fieldLeft">

        <label for="as_minPrice" class="block bold">Lease Rate</label>

        <select name="price_min" title="Select Minimum Price" data-target="asMinPriceAlt" class="selectField selectField-fourth selectCombo" id="as_minPrice">

          <option selected="selected" value="">Min</option>

          <option value="500">$500</option>

          <option value="1000">$1,000</option>

          <option value="1500">$1,500</option>

          <option value="2000">$2,000</option>

          <option value="2500">$2,500</option>

          <option value="3000">$3,000</option>

          <option value="3500">$3,500</option>

          <option value="4000">$4,000</option>

          <option value="4500">$4,500</option>

          <option value="5000">$5,000</option>

          <option value="5500">$5,500</option>

          <option value="6000">$6,000</option>

          <option value="6500">$6,500</option>

          <option value="7000">$7,000</option>

          <option value="7500">$7,500</option>

          <option value="8000">$8,000</option>

        </select>

        <span class="toSpacer">to</span>

        <select name="price_max" title="Select Maximum Price" data-target="asMaxPriceAlt" class="selectField selectField-fourth selectCombo">

          <option selected="selected" value="">Max</option>

          <option value="500">$500</option>

          <option value="1000">$1,000</option>

          <option value="1500">$1,500</option>

          <option value="2000">$2,000</option>

          <option value="2500">$2,500</option>

          <option value="3000">$3,000</option>

          <option value="3500">$3,500</option>

          <option value="4000">$4,000</option>

          <option value="4500">$4,500</option>

          <option value="5000">$5,000</option>

          <option value="5500">$5,500</option>

          <option value="6000">$6,000</option>

          <option value="6500">$6,500</option>

          <option value="7000">$7,000</option>

          <option value="7500">$7,500</option>

          <option value="8000">$8,000</option>

        </select>

      </div>

      <div class="floatRight comboFix">

        <div class="comboOrHoriz"> &nbsp; </div>

        <div class="field fieldRight">

          <label class="block bold">&nbsp;</label>

          <input type="text" name="price_min_text" data-target="MinPriceSelect" id="asMinPriceAlt" class="textField textField-fourth comboTarget">

          <span class="toSpacer">to</span> </div>

        <div style="margin-left: 0;" class="field fieldRight">

          <label class="block bold">&nbsp;</label>

          <input type="text" name="price_max_text" id="asMaxPriceAlt" data-target="MaxPriceSelect" class="textField textField-fourth comboTarget">

        </div>

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

        <label for="as_minBaths" class="block bold">Bathrooms</label>

        <select name="num_fbaths" title="Select Minimum Bathrooms" class="selectField selectField-fourth" id="as_minBaths">

          <option selected="selected" value="">Min</option>

          <option value="1">1</option>

          <option value="2">2</option>

          <option value="3">3</option>

          <option value="4">4</option>

          <option value="5">5</option>

          <option value="6">6</option>

        </select>

      </div>

      <div class="field fieldRight">

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

            <input type="radio" checked="checked"  value="rad-city" name="location-select" data-target="cityField" onclick="locationType('cityField');">

            City </label>

            </span> </li>

          <li> <span class="controls">

            <label class="radio white">

            <input type="radio" name="location-select" value="rad-zip"  data-target="zipField" onclick="locationType('zipField');">

            Zip Code </label>

            </span> </li>

          <li> <span class="controls">

            <label class="radio white">

            <input type="radio" name="location-select" value="rad-county" data-target="countyField" onclick="locationType('countyField');">

            County </label>

            </span> </li>

        </ul>

      </div>

      <div id="locationFields">

        <div id="cityField" class="field clearfix active">

          <label for="as_city" class="bold block">City</label>

          <input type="text" value="" title="Enter " name="location_city" id="as_city" data-src="residential_city" class="textField textField-full autoCompleteField validate-entry ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">

        </div>

        <div style="display:none;" id="zipField" class="field clearfix">
          <label for="as_Zip" class="bold block">Zip Code</label>
          <input type="text" value="" title="Enter Comma-Separated List of Zip Codes" name="zip_code" id="as_Zip" data-src="residential_zip_code" class="textField textField-full">
        </div>

        <div id="countyField" class="field msw_container">

          <label class="bold block">County</label>

          <select id="countyOptions" class="selectField" multiple="multiple" name="county_id[]" title="Select Multiple Counties">
                <option value="hillsborough">Hillsborough County</option>
                <option value="pasco">Pasco County</option>
                <option value="pinellas">Pinellas County</option>
          </select>

        </div>

      </div>

    </div>

    <div class="section noborder">

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
	
    <div id="additionalDetails" class="expand-section">

      <div class="expand-trigger" onclick="expandBlock('additionalDetails');"> <span class="expand-icon">&nbsp;</span>

        <h2>Additional Property Details</h2>

        <p class="expand-description">Specific criteria including general features such as pets allowed, lease terms, year built and more...</p>

      </div>

      <div class="expand-block">

        <div class="section noborder">

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

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft">

            <label for="as_sqftHeated" class="bold block">Heated Square Feet</label>

            <input type="text" value="" title="Enter Minimum Heated Square Feet" name="Min_SqftTotal" id="as_sqftHeated" data-src="rental_sqft" class="textField textField-half ">

          </div>

          <div class="field fieldRight">

            <label for="as_year_built" class="bold block">Year Built</label>

            <input type="text" value="" title="Enter Year Built" name="YearBuiltEQ" id="as_year_built" data-src="rental_year_built" class="textField textField-half ">

          </div>

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft radioGroup">

            <label class="block bold">Long Term</label>

            <label class="checkBoxLabel">

            <input type="radio" title="Select Long Term Preference" name="LongTermBit" value="Yes">

            <span>Yes</span> </label>

            <label class="checkBoxLabel">

            <input type="radio" title="Select Long Term Preference" name="LongTermBit" value="No">

            <span>No</span> </label>

            <label class="checkBoxLabel last">

            <input type="radio" title="Select Long Term Preference" name="LongTermBit" value="">

            <span>No Preference</span> </label>

          </div>

          <div class="field fieldRight msw_container">

            <label class="bold block">Services Include</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="Services[]" title="Select Multiple Included Services">

              

              <option value="cable tv">Cable Tv</option>

              <option value="electric">Electric</option>

              <option value="garbage">Garbage</option>

              <option value="gas">Gas</option>

              <option value="grounds maintenance">Grounds Maintenance</option>

              <option value="internet">Internet</option>

              <option value="laundry">Laundry</option>

              <option value="none">None</option>

              <option value="other">Other</option>

              <option value="pest control">Pest Control</option>

              <option value="phone">Phone</option>

              <option value="pool">Pool</option>

              <option value="recreational">Recreational</option>

              <option value="security system">Security System</option>

              <option value="sewer">Sewer</option>

              <option value="water">Water</option>

            </select>

          </div>

          <div class="clearAll">&nbsp;</div>

          <div class="field fieldLeft msw_container">

            <label class="bold block">Lease Terms</label>

            <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="LeaseTermsDesc[]" title="Select Multiple Lease Terms Options">

              

              <option value="annual">Annual</option>

              <option value="lease option">Lease Option</option>

              <option value="no smoking">No Smoking</option>

              <option value="seasonal">Seasonal</option>

              <option value="short term">Short Term</option>

              <option value="smoking yes">Smoking Yes</option>

            </select>

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

      </div>

    </div>

  </div>

  <div id="interior" class="expand-section">

    <div class="expand-trigger" onclick="expandBlock('interior');"> <span class="expand-icon">&nbsp;</span>

      <h2>Interior</h2>

      <p class="expand-description">Specific criteria including interior layout, fireplace, air conditioning and more...</p>

    </div>

    <div class="expand-block">

      <div class="section noborder">

        <div class="field fieldLeft msw_container">

          <label class="bold block">Interior Layout</label>

          <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="InteriorLayout[]" title="Select Multiple Interior Layout Options">

            

            <option value="eating space in kitchen">Eating Space In Kitchen</option>

            <option value="formal dining room sep">Formal Dining Room Sep</option>

            <option value="formal living room separate">Formal Living Room Separate</option>

            <option value="kitchen/family room comb">Kitchen/family Room Comb</option>

            <option value="volume ceilings">Volume Ceilings</option>

          </select>

        </div>

        <div class="field fieldRight msw_container">

          <label class="bold block">Air Conditioning</label>

          <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="cooling_description[]" title="Select Multiple Air Conditioning Options">

            

            <option value="central">Central</option>

            <option value="wall units">Wall Units</option>

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

        <div class="clearAll">&nbsp;</div>

      </div>

    </div>

  </div>
<? /* ?>
  <div id="exterior" class="expand-section">

    <div class="expand-trigger" onclick="expandBlock('exterior');"> <span class="expand-icon">&nbsp;</span>

      <h2>Exterior</h2>

      <p class="expand-description">Specific criteria including exterior features, garage spaces and more...</p>

    </div>

    <div class="expand-block">

      <div class="section noborder">

        <div class="field fieldLeft msw_container">

          <label class="bold block">Garage / Carport</label>

          <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="GarageDesc[]" title="Select Multiple Garage / Carport Options">

            

            <option value="1 car carport">1 Car Carport</option>

            <option value="1 car garage">1 Car Garage</option>

            <option value="2 car carport">2 Car Carport</option>

            <option value="2 car garage">2 Car Garage</option>

            <option value="3 car garage">3 Car Garage</option>

            <option value="5%25252B car garage">5+ Car Garage</option>

            <option value="none">None</option>

            <option value="under building parking">Under Building Parking</option>

          </select>

        </div>

        <div class="field fieldRight msw_container">

          <label class="bold block">Garage Features</label>

          <select class="selectField selectField-half selectField-multiple" multiple="multiple" name="GarageFeatures[]" title="Select Multiple Garage Features">

            

            <option value="assigned parking">Assigned Parking</option>

            <option value="attached">Attached</option>

            <option value="circular drive">Circular Drive</option>

            <option value="detached">Detached</option>

            <option value="door opener">Door Opener</option>

            <option value="drive space">Drive Space</option>

            <option value="guest parking">Guest Parking</option>

            <option value="none">None</option>

            <option value="open parking">Open Parking</option>

            <option value="other">Other</option>

            <option value="oversized">Oversized</option>

            <option value="parking pad">Parking Pad</option>

            <option value="secured parking">Secured Parking</option>

            <option value="side rear entry">Side Rear Entry</option>

            <option value="street parking">Street Parking</option>

            <option value="tandem parking">Tandem Parking</option>

            <option value="under building parking">Under Building Parking</option>

            <option value="washer/dryer hookup">Washer/dryer Hookup</option>

          </select>

        </div>

      </div>

      <div class="clearAll">&nbsp;</div>

    </div>

  </div>

  <?php */ ?>

</div>

