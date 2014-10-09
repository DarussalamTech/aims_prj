<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<title><?=WEBSITE_NAME2?></title>
	<link rel="stylesheet" href="<?=$base?>bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?=$base?>bootstrap/css/bootstrap-responsive.css">
	<script src="<?=$base?>bootstrap/js/jquery-1.10.2.min.js"></script>
	<script src="<?=$base?>bootstrap/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="<?=$base?>bootstrap/js/bootstrap.min.js"></script>
   	<script src="<?=$base?>js/jquery.cookie.js"></script>

	<link href="https://developers.google.com/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css">
    <script src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places,visualization,drawing,geometry&v=3.exp"></script>
	<script type="text/javascript" src="<?=$base?>js/autocomplete.js"></script>
	<script type="text/javascript" src="<?=$base?>js/geolocation.js"></script>
	<script type="text/javascript" src="<?=$base?>js/polygon.js"></script>
	<script type="text/javascript" src="<?=$base?>js/scripts.js"></script>
	<link rel="stylesheet" href="<?=$base?>bootstrap/css/style.css">
    <script>
var geocoder;
var map;
var infowindow;
var mtype = [];
var markersArray = [];
var poiMarkersArray = [];
var overlays = [];
var overlays_points = [];
var acceptableCategories = ["bar", "restaurant", "cafe", 
							"school", "grocery_or_supermarket", 
							"department_store", "book_store", 
							"pharmacy", "liquor_store", "movie_theater", 
							"health", "stadium", "hospital", "post_office", 
							"library", "fire_station", "police", 
							"courthouse", "airport", "bank", 
							"laundry", "church|hindu_temple"]


function initialize() {
	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(27.930721, -82.447586);
	var mapOptions = {
		zoom: 12,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);	

	google.maps.event.addListener(map, 'dragend', function() {
		request_place(map.getCenter(), mtype);
	});

	/* POLYGON */

    var polyOptions = {
      strokeWeight: 2,
      strokeColor: "#CC00FF",
      fillOpacity: 0.45,
      fillColor: "#1E00FF",      
      editable: true,
      draggable: true
    };

    // Creates a drawing manager attached to the map that allows the user to draw
    // markers, lines, and shapes.
    drawingManager = new google.maps.drawing.DrawingManager({
      drawingControl: false,
      polygonOptions: polyOptions,
      map: map
    });
    
    google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
        if (e.type != google.maps.drawing.OverlayType.MARKER) {
        // Switch back to non-drawing mode after drawing a shape.
        drawingManager.setDrawingMode(null);



        // Add an event listener that selects the newly-drawn shape when the user
        // mouses down on it.
        var newShape = e.overlay;
		
		overlays_points.splice(0, overlays_points.length);
		overlays_points.push(e.overlay.getPath().getArray());
		
        overlays.push(e.overlay);
        newShape.type = e.type;

        google.maps.event.addListener(newShape, 'click', function() {
          	setSelection(newShape);
        });
        part = 0;
        google.maps.event.addListener(newShape, 'dragend', function() {
        	clearOverlays();
          	search_type(1);
        });
		
		$("#clear-polygon").removeClass("disabled");

		//send();

		google.maps.event.addListener(newShape.getPath(), 'set_at', function() {
			//send();
		});
		google.maps.event.addListener(newShape.getPath(), 'insert_at', function() {
			//send();
		});

        //console.log(newShape);
        setSelection(newShape);
      }
    });

    // Clear the current selection when the drawing mode is changed, or when the
    // map is clicked.
    google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);

    google.maps.event.addListener(map, 'click', clearSelection);
    google.maps.event.addListener(map, 'rightclick', function(event){
		var mapoffset = $("#map-canvas").offset();
		$("#helper").show().offset({ top: mapoffset.top + event.pixel.y, left: mapoffset.left + event.pixel.x });
    });
    google.maps.event.addDomListener(document.getElementById('draw-polygon'), 'click', startDrawing);
    google.maps.event.addDomListener(document.getElementById('clear-polygon'), 'click', deleteSelectedShape);
    google.maps.event.addDomListener(document.getElementById('helper-clear-polygon'), 'click', deleteSelectedShape);

    
	google.maps.event.addListener(map, "dragend", function() {
		//console.log("DRAG map bounds{"+map.getBounds());
	});
	
	google.maps.event.addListener(map, "zoom_changed", function() {
		//console.log("DRAG map bounds{"+map.getBounds());

	});
}

function codeAddress() {
  var address = document.getElementById('autocomplete-address-val').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      map.setZoom(12);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

function display_helper(event){
	//alert(event.latlng);
}

function request_place(latlng, mtype) {
	if(mtype.length  !== 0) {
		var request = {
			location: latlng,
			radius: 50000,
			types: mtype
		};
		console.log(mtype);
		infowindow = new google.maps.InfoWindow();
		var service = new google.maps.places.PlacesService(map);
		service.nearbySearch(request, callback);
	}
}

var foundPlaces = [];
var found;

function callback(results, status) { 
  if (status == google.maps.places.PlacesServiceStatus.OK) {

    for (var i = 0; i < results.length; i++) {
      found = 0;
      foundPlaces.push(results[i].id);
		
        for (var j = 0; j < foundPlaces.length; j++) {
          if (foundPlaces[j] === results[i].id) {
            found++;
          }
        }

        if (found < 2) {
          createMarker(results[i]);
        }
      }
    }
  } 


function createMarker(place) {
  /*if($.inArray(place.types[0], acceptableCategories) == -1 || $.inArray(place.types[0], mtype) == -1) {
	return false;
  }	*/	

  var placeLoc = place.geometry.location;
  var iconUrl;
    switch (place.types[0]) {
    case 'store':
        iconUrl = "<?=$base?>img/icons/store.png";
        break;
    case 'cafe':
        iconUrl = "<?=$base?>img/icons/restaurant.png";
        break;
    case 'bank':
        iconUrl = "<?=$base?>img/icons/bank.png";
        break;
    case 'school':
        iconUrl = "<?=$base?>img/icons/university.png";
        break;
    case 'bar':
        iconUrl = "<?=$base?>img/icons/bar.png";
        break;
    case 'movie_theater':
        iconUrl = "<?=$base?>img/icons/cinema.png";
        break;
    case 'hospital':
        iconUrl = "<?=$base?>img/icons/hospital-building.png";
        break;
    case 'library':
        iconUrl = "<?=$base?>img/icons/library.png";
        break;
    case 'restaurant':
        iconUrl = "<?=$base?>img/icons/restaurant.png";
        break;
    case 'grocery_or_supermarket':
        iconUrl = "<?=$base?>img/icons/store.png";
        break;
    case 'department_store':
        iconUrl = "<?=$base?>img/icons/departmentstore.png";
        break;
    case 'book_store':
        iconUrl = "<?=$base?>img/icons/book.png";
        break;
    case 'pharmacy':
        iconUrl = "<?=$base?>img/icons/drugstore.png";
        break;
    case 'liquor_store':
        iconUrl = "<?=$base?>img/icons/winetasting.png";
        break;
    case 'health':
        iconUrl = "<?=$base?>img/icons/spa.png";
        break;
    case 'stadium':
        iconUrl = "<?=$base?>img/icons/stadium.png";
        break;
    case 'post_office':
        iconUrl = "<?=$base?>img/icons/postal.png";
        break;
    case 'fire_station':
        iconUrl = "<?=$base?>img/icons/firemen.png";
        break;
    case 'police':
        iconUrl = "<?=$base?>img/icons/police.png";
        break;
    case 'courthouse':
        iconUrl = "<?=$base?>img/icons/court.png";
        break;
    case 'airport':
        iconUrl = "<?=$base?>img/icons/airport.png";
        break;
    case 'laundry':
        iconUrl = "<?=$base?>img/icons/laundromat.png";
        break;
    case 'church|hindu_temple':
        iconUrl = "<?=$base?>img/icons/cathedral.png";
        break;
    default:
        iconUrl = "<?=$base?>img/icons/custom_marker.png";
    }

  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location,
    icon: iconUrl,
    category: place.types[0]
  });
  
  poiMarkersArray.push(marker);

  $("#clear-markers.disabled").removeClass("disabled");

  google.maps.event.addListener(marker, 'click', function() {	  
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>


<body>
<div id="printable">
	<div id="printmap"></div>
</div>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" id="helper">
  <li><a tabindex="-1" href="#" id="helper-show-legend">Legend</a></li>
  <li><a tabindex="-1" href="#" id="helper-print">Print</a></li>
  <li class="divider"></li>
  <li><a tabindex="-1" href="#" id="helper-search">Search</a></li>
  <li class="divider"></li>
  <li><a tabindex="-1" href="#" id="helper-clear-polygon">Clear Polygons</a></li>
  <li><a tabindex="-1" href="#" id="helper-clear-markers">Clear Results</a></li>
</ul>

<div id="legend" class="mini-layout">
	<h5><i class="icon-file"></i>Legend</h5><button type="button" class="legend-close close" data-dismiss="alert">&times;</button>
	<div class="legend-holder">
		<table class="table table-striped">
		<tr>
			<td><img src="<?=$base?>img/icons/store.png"></td>
			<td>Stores</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/restaurant.png"></td>
			<td>Restaurants</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/bank.png"></td>
			<td>Banks</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/university.png"></td>
			<td>Universities</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/bar.png"></td>
			<td>Bars</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/cinema.png"></td>
			<td>Cinemas</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/hospital-building.png"></td>
			<td>Hospitals</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/library.png"></td>
			<td>Libraries</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/departmentstore.png"></td>
			<td>Department Store</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/book.png"></td>
			<td>Book Stores</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/drugstore.png"></td>
			<td>Pharmacies</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/winetasting.png"></td>
			<td>Liquor Stores</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/spa.png"></td>
			<td>Health</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/stadium.png"></td>
			<td>Stadiums</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/postal.png"></td>
			<td>Post Offices</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/firemen.png"></td>
			<td>Fire Stations</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/police.png"></td>
			<td>Police Departments</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/court.png"></td>
			<td>Courthouses</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/airport.png"></td>
			<td>Airports</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/laundromat.png"></td>
			<td>Laundry</td>
		</tr>
		<tr>
			<td><img src="<?=$base?>img/icons/cathedral.png"></td>
			<td>Places of Worship</td>
		</tr>
		</table>
	</div>
</div>
<div class="container">
	<!-- <ul class="breadcrumb">
	  <li><a href="#">Home</a> <span class="divider">/</span></li>
	  <li><a href="#">Search</a> <span class="divider">/</span></li>
	  <li class="active">Map Search</li>
	</ul> -->
	<div class="row-fluid">
		<span class="span3">
			<!--  <img id="logo" src="<? //=$base?>img/candace-courter-logo.jpg" width="100%"> -->
			<div class="tabbable"> <!-- Only required for left/right tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab">Search</a></li>
					<li><a href="#tab2" data-toggle="tab">Points Of Interest</a></li>
					<li><a href="#tab3" data-toggle="tab">Stats</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab1">

						<div class="accordion" id="accordion2">

						  <div class="accordion-group">
						    <div class="accordion-heading">
						      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseNull">
						        Search
						      </a>
						    </div>
						    <div id="collapseNull" class="accordion-body collapse in">
						      <div class="accordion-inner">
								<form id="search-form">
									<div class="rdc-sch-sbx" style="border:1px solid #ccc; padding:5px;">
                                    	<input type="radio" value="polygon" id="rad_poly" name="rad_search" style="margin-right: 5px; margin-bottom: 8px;" ><label for="rad_poly"><strong>Search within polygon</strong></label>
                                        <h4 style="margin-left:40%;">OR</h4>
                                        <input type="radio" checked value="address" id="rad_address" name="rad_search" style="margin-right: 5px; margin-bottom: 8px;" ><label for="rad_address"><strong>Search ZIP / Address</strong></label>
							           <br>
                                        <button id="rdc-sch-btn-geo" data-original-title="Click to Automatically Detect Your Location" type="button" class=""></button>
							            <button id="rdc-sch-btn-clr" type="button" class=""></button>
							            <div id="rdc-sch-txt-geo" class="icon">
							               	<input id="rdc-sch-txt" type="text" name="loc" value="" data-original-title="City, State / ZIP / Address" style="margin-left: 30px;">
							            	<input id="rdc-sch-lat" type="hidden" name="lat" value="">	            	
							            	<input id="rdc-sch-lng" type="hidden" name="lng" value="">
							            </div>
							            <div id="geo-alert" class="alert"></div>
							            <div>Find in radius:                   	
							            	<select id="rdc-radius" name="radius">
											   <option value="5">5 miles</option>
											   <option value="10">10 miles</option>
											   <option value="25">25 miles</option>
											   <option value="50">50 miles</option>
											   <option value="100">100 miles</option>
											</select>
										</div>
									</div>
									<h5>Property Type</h5>									
									<select name="propertyType" id="MapSearchFieldPropertyType">
										<option value="Residential">Residential</option>
										<option value="Vacant-Land">Vacant-Land</option>
										<option value="Commercial">Commercial</option>
										<option value="Rental">Rental</option>
										<option value="Income">Income</option>
									</select>
									<h5>Price Range</h5>
									<select name="priceMin" id="MapSearchFieldPriceMin" style="width:45%;">									
										<option value="">No Min</option>
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
										<option value="1000000">$1,000,000</option>
										<option value="1500000">$1,500,000</option>
										<option value="2000000">$2,000,000</option>
										<option value="2500000">$2,500,000</option>
										<option value="3000000">$3,000,000</option>
										<option value="3500000">$3,500,000</option>
										<option value="4000000">$4,000,000</option>
										<option value="4500000">$4,500,000</option>
										<option value="5000000">$5,000,000</option>
										<option value="6000000">$6,000,000</option>
										<option value="8000000">$8,000,000</option>
										<option value="10000000">$10,000,000</option>
									</select>
									-
									<select name="priceMax" id="MapSearchFieldPriceMax" style="width:45%;">									
										<option value="" selected="">No Max</option>
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
										<option value="1000000">$1,000,000</option>
										<option value="1500000">$1,500,000</option>
										<option value="2000000">$2,000,000</option>
										<option value="2500000">$2,500,000</option>
										<option value="3000000">$3,000,000</option>
										<option value="3500000">$3,500,000</option>
										<option value="4000000">$4,000,000</option>
										<option value="4500000">$4,500,000</option>
										<option value="5000000">$5,000,000</option>
										<option value="6000000">$6,000,000</option>
										<option value="8000000">$8,000,000</option>
										<option value="10000000">$10,000,000</option>
									</select>

									<h5>Bedrooms</h5>
									<select name="beds" id="MapSearchFieldBeds">						
										<option value="">No Min</option>
										<option value="property_type">At least 1</option>
										<option value="2">At least 2</option>
										<option value="3">At least 3</option>
										<option value="4">At least 4</option>
									</select>

									<h5>Bathrooms</h5>
									<select name="baths" id="MapSearchFieldBaths">						
										<option value="">No Min</option>
										<option value="property_type">At least 1</option>
										<option value="2">At least 2</option>
										<option value="3">At least 3</option>
										<option value="4">At least 4</option>
									</select>

								<div>
									<!-- <button class="btn btn-success" id="search" onClick="search_type();">Search</button> -->
                                    <input type="button" class="btn btn-success" value="Search" id="search" onClick="search_type(1);">
                                    <img src="<?=$base?>img/ajax_loader_blue.gif" style="width:20px;height:20px;display:none" id="search_loader" />
								</div>
								</form>
						      </div>
						    </div>
						  </div>


						  <div class="accordion-group">
						    <div class="accordion-heading">
						      <a href="#" class="pull-right accordion-toggle" data-original-title="More results" id="loadMore"><i class="icon-refresh"></i></a>
						      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
						        Search Results 
						      </a>
						    </div>
						    <div id="collapseOne" class="accordion-body collapse">
						      <div class="accordion-inner resuls-inner">
						      </div>
                              <div style="margin:10px;display:none" id="search_again_div">
                                <span id="load_more_span" style="display:none;">
	                                <input type='button' class="btn btn-success" style="margin-bottom:5px;" id="btn_load_more" value='Load More'>&nbsp;&nbsp;
    	                            <img style="width:20px;height:20px;display:none" id="results_loader" src="<?=$base?>img/ajax_loader_blue.gif">
                                </span>
                                <input type='button' class="btn btn-success" id="btn_search_again" value='Search Again'>
                                
                              </div>
						    </div>
						  </div>

						  <!-- <div class="accordion-group">
						    <div class="accordion-heading">
						      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
						        Favorites
						      </a>
						    </div>
						    <div id="collapseTwo" class="accordion-body collapse">
						      <div class="accordion-inner">
						        ...
						      </div>
						    </div>
						  </div> -->
						  
						  <div class="accordion-group">
						    <div class="accordion-heading">
						      <a class="accordion-toggle" onClick="show_recently_viewed();" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
						        Recently Viewed Properties
						      </a>
						    </div>
						    <div id="collapseThree" class="accordion-body collapse">
						      <div class="accordion-inner">
                                <img src="<?=$base?>img/loader.gif" id="recently_loader" style="display:none" />
                                <div id="recently_viewed_properties"></div>
						      </div>
						    </div>
						  </div>
						</div>
					</div>
					<div class="tab-pane" id="tab2">
					  	<h6>Find: </h6>
					  		<input type="text" name="txt_pt_of_interest" id="txt_pt_of_interest" class="input-small">
					  		<button type="button" class="btn btn-success" onClick="custom_pt_of_interests(0);">Search</button>
					  	<h5>Suggestions</h5>
					<div class="suggestions" id="suggestions">
						<ul>
                        	<li>My Searches:
                            	<ul id="custom_checkboxes">
                                </ul>
                            </li>
							<li>Restaurants:
								<ul>
									<li>
										<input type="checkbox" id="Restaurants" value="restaurant">
										<label for="Restaurants">Restaurants</label>
									</li>
									<li>
										<input type="checkbox" id="Bars" value="bar">
										<label for="Bars">Bars</label>
									</li>
									<li>
										<input type="checkbox" id="Coffee" value="cafe">
										<label for="Coffee">Coffee Shops</label>
									</li>
								</ul>
							</li>
							<li>Schools:
								<ul>
									<li>
										<input type="checkbox" id="HighSchools" value="school">
										<label for="HighSchools">Schools</label>
									</li>
								</ul>
							</li>
							<li>Shopping:
								<ul>
									<li>
										<input type="checkbox" id="GroceryStores" value="grocery_or_supermarket">
										<label for="GroceryStores">Grocery Stores</label>
									</li>
									<li>
										<input type="checkbox" id="DepartmentStores" value="department_store">
										<label for="DepartmentStores">Department Stores</label>
									</li>
									<li>
										<input type="checkbox" id="BookStores" value="book_store">
										<label for="BookStores">Book Stores</label>
									</li>
									<li>
										<input type="checkbox" id="DrugStores" value="pharmacy">
										<label for="DrugStores">Drug Stores</label>
									</li>
									<li>
										<input type="checkbox" id="WineLiquor" value="liquor_store">
										<label for="WineLiquor">Wine &amp; Liquor</label>
									</li>
								</ul>
							</li>
							<li>Attractions:
								<ul>
									<li>
										<input type="checkbox" id="MovieTheaters" value="movie_theater">
										<label for="MovieTheaters">Movie Theaters</label>
									</li>
									<li>
										<input type="checkbox" id="HealthClubs" value="health">
										<label for="HealthClubs">Health Clubs</label>
									</li>
									<li>
										<input type="checkbox" id="SportsStadiums" value="stadium">
										<label for="SportsStadiums">Sports Stadiums</label>
									</li>
								</ul>
							</li>
							<li>Healthcare Services:
								<ul>
									<li>
										<input type="checkbox" id="Hospitals" value="hospital">
										<label for="Hospitals">Hospitals</label>
									</li>
								</ul>
							</li>
							<li>Government/Public:
								<ul>
									<li>
										<input type="checkbox" id="PostOffice" value="post_office">
										<label for="PostOffice">Post Office</label>
									</li>
									<li>
										<input type="checkbox" id="PublicLibraries" value="library">
										<label for="PublicLibraries">Public Libraries</label>
									</li>
									<li>
										<input type="checkbox" id="FireDepartments" value="fire_station">
										<label for="FireDepartments">Fire Departments</label>
									</li>
									<li>
										<input type="checkbox" id="PoliceDepartments" value="police">
										<label for="PoliceDepartments">Police Departments</label>
									</li>
									<li>
										<input type="checkbox" id="Courts" value="courthouse">
										<label for="Courts">Courts</label>
									</li>
								</ul>
							</li>
							<li>Other:
								<ul>
									<li>
										<input type="checkbox" id="Airports" value="airport">
										<label for="Airports">Airports</label>
									</li>
									<li>
										<input type="checkbox" id="Banks" value="bank">
										<label for="Banks">Banks</label>
									</li>
									<li>
										<input type="checkbox" id="Laundry" value="laundry">
										<label for="Laundry">Laundry</label>
									</li>
									<li>
										<input type="checkbox" id="PlacesofWorshipandChurch" value="church|hindu_temple">
										<label for="PlacesofWorshipandChurch">Places of Worship</label>
									</li>
								</ul>
							</li>
						</ul>
					</div>
					</div>
					<div class="tab-pane" id="tab3">
					  	<h6>Zip code: </h6>
                        <input type="text" name="demogr_zip" id="demogr_zip" class="input-small">
                        <button type="button" onClick="get_demographics();" class="btn btn-success">Search</button>
                        <img src="<?=$base?>img/loader.gif" id="stat_loader" style="display:none" />
					  	<h5>Demographics</h5>
					  	<ul id="ul_demographics" style="display:none">
							<li>Populations	
								<ul>
									<li>
										<div style="float:right;" id="P012I001"></div>White
									</li>
									<li>
										<div style="float:right;" id="P012B001"></div>Black
									</li>
									<li>
										<div style="float:right;" id="P012H001"></div>Hispanic
									</li>
									<li>
										<div style="float:right;" id="P012D001"></div>Asian
									</li>
									<li>
										<div style="float:right;" id="P012E001"></div>Hawaiian
									</li>
									<li>
										<div style="float:right;" id="P012C001"></div>Indian
									</li>
									<li>
										<div style="float:right;" id="P012F001"></div>Other
									</li>
									<li>
										<div style="float:right;" id="P0120002"></div>Male
									</li>
									<li>
										<div style="float:right;" id="P0120026"></div>Female
									</li>
									<li>
										<div style="float:right;" id="P0010001"></div>Total
									</li>
								</ul>
							</li>
								<li>Households
									<ul>
										<li>
											<div style="float:right;" id="H00010001"></div>Total Households
										</li>
										<li>
											<div style="float:right;" id="H0120001"></div>Persons Per Household
										</li>
										<li>
											<div style="float:right;"></div>Avg House Value
										</li>
										<li>
											<div style="float:right;"></div>Income Per Household
										</li>
									</ul>
								</li>
								<li>Business	
									<ul>
										<li>
											<div style="float:right;"></div>Business Establishments
										</li>
										<li>
											<div style="float:right;"></div>Employed
										</li>
										<li>
											<div style="float:right;"></div>Annual Payroll
										</li>
									</ul>
								</li>
						</ul>
					</div>
				</div>
			</div>
		</span>
		<span class="span9">	
			<div class="gradient">		
				<ul class="nav nav-pills" id="polygon-menu">
					<li id="draw-polygon"><a href="#">Draw new polygon</a></li>
					<li class="disabled" id="clear-polygon"><a href="#">Clear Polygons</a></li>
					<li class="disabled" id="clear-markers"><a href="#">Clear Results</a></li>
					<li id="show-legend"><a href="#">Legend</a></li>
					<li id="print" onClick="printPage()"><a href="#">Print</a></li>
                    <li id="searching_loader" style="display:none;">
                        <a href="javascript:;" style="color: rgb(16, 123, 206); margin-left: 50%;">
                            <img style="width:20px;height:20px;" src="<?=$base?>img/ajax_loader_blue.gif">
                            Searching
                        </a>
                    </li>                    
				</ul>
	            <!-- <form class="form-search text-right" action="" id="autocomplete-address">
				  <div class="input-append">
				    <input type="text" class="search-query" id="autocomplete-address-val" placeholder="Search"> 
				    <button type="button" class="btn" onClick="$('search-form').submit();" style="border-radius:14px 14px 14px 14px">Search</button>			
				  </div>
	            </form> -->
        	</div>
            <div id="map-canvas" style="margin-left:-1px;"></div>
		</span>
	</div>
</div>
<input type="hidden" id="part" value="0" />
<script>
function printPage(){
	$("#logo").clone().prependTo("#printable");
	$("#map-canvas").clone().appendTo("#printmap");
	$(".resuls-inner").children().clone().appendTo("#printable");
	$(".container").hide();

	window.print();
	
	$("#printable").html("");
	$(".container").show();
}
var part = 0;
function send(){
	
	deleteSelectedShape(); //for removing polygon

	$.ajax({
		url: "results/getinfo",
		type: "POST",		
		data: $('#search-form').serialize() + "&part=" + part, 
		dataType: "json",
		beforeSend: function(){
			$("li#searching_loader").show();
			$('#search_loader').show(); 
			$('#results_loader').show(); 
			
		},	
		success: function(data){

			response = data.results;
			pages 	 = data.pages;				

			try{		
				if(part == 0) clearOverlays();		// only for SEARCH, not for load more	
				$("#collapseNull").collapse('hide');
				$("#collapseOne").collapse('show');

				if(response == "noresult") {
					$(".resuls-inner").html('<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button>'+
											'No results found. Please try searching with another options. </div>');
					$("li#searching_loader").hide();
					$('#search_loader').hide(); 	
					$('#results_loader').hide(); 										
					return false;
				}
				for( var i = 0; i < response.length; i++ ) {
					var res = response[i];
					$(".resuls-inner").append("<a href='#' class='result-house'>" +  "<img src='<?=$base?>img/icons/cc-logo.png' style='width:18px;height:18px'>&nbsp;" + ((res[165] == 0) ? "" : (res[165] + " ")) + res[421] + ", " + res[2302] + ", " + res[2304] + ", " + res[46] + "</a>");
					place_marker(response[i].latitude, response[i].longitude, res,'blue');
				}
				
				$("#search_again_div").show();
				if(pages > 1 && part < pages && pages != part+1){
					$("#loadMore").show();
					$("#load_more_span").show();
				}else{
					$("#loadMore").hide();
					$("#load_more_span").hide();
				}

			}
			catch(e){
				return true;
			}	
			
			$("li#searching_loader").hide();
			$('#search_loader').hide(); 
			$('#results_loader').hide(); 
		}
	});
}

function getImages(id){
	$.ajax({
		url: "results/getImages?sysid=" + id,
		type: "POST",		
		dataType: "json",
		success: function(response){
				try{		
					if(response == "noresult") {
						$("#googletab2").html('<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button>'+
												'No photos found. </div>');
						return false;
					}
					$("#googletab2").html("");
					for( var i = 0; i < response.length; i++ ) {
						var photo = response[i];
						$("#googletab2").append("<img src='" + photo['url'] + "'>");
						console.log();
					}
				}
				catch(e){
					return true;
				}	
		}
	});
}

function place_marker(lat,lng,res,marker_color){
	var Latlng = new google.maps.LatLng(lat,lng);

	// if not withing polygon don't show the marker
	if(overlays.length > 0 && !isWithinPoly(Latlng, overlays)){
		return false;
	} 

	if(marker_color == 'yellow'){
		var iconUrl = "<?=$base?>img/icons/yellow-logo.png";
	}else{
		var iconUrl = "<?=$base?>img/icons/cc-logo.png";
	}
	var marker = new google.maps.Marker({
		position: Latlng,
		map: map,		
    	icon: iconUrl
	});
	

var img = '<img src="<?=$base?>img/default_property.png" style="width:65%"><br>'; //default image
if( res['images'] > 0 ) { img = '<img src="http://ccproperties.s3.amazonaws.com/' + res['sysid'] + '/image-' + res['sysid'] + '-1.jpg" style="width:90%"><br>'; }
var tab1 = '<h5>';
	
	tab1 += ((res[49] == 0) ? "" : (res[49] + "")) + ", " + res[2302] + ", " + res[2304]+" " + res[46];

	/*if(res[176] !== null ){
		tab1 += '<span class="pull-right">$'+res[176]+'</span></h5>';
	}*/

tab1 += '<div class="row-fluid">'+
	'<div class="span6">'+
		'<strong>MLS:</strong><span class="pull-right">'+res[175]+'</span><br>';
		
		if(res[176] !== null ){
			
			
			if(res[176] < 10){
				tab1 += '<strong>Price:</strong><span class="pull-right">$'+res[176]+',000,000</span><br>';
			}else if(res[176] > 10 && res[176] < 1000){
				tab1 += '<strong>Price:</strong><span class="pull-right">$'+res[176]+',000</span><br>';
			}else{
				tab1 += '<strong>Price:</strong><span class="pull-right">$'+res[176]+'</span><br>';
			}
			
			
		}else{
			tab1 += '<strong>Price:</strong><span class="pull-right">Contact Realtor</span><br>';
		}	
		
		if(res[32] !== null ){
			tab1 += '<strong>Beds:</strong><span class="pull-right">'+res[32]+'</span><br>';
		}
		if(res[2294] !== null ){
			tab1 += '<strong>Baths:</strong><span class="pull-right">'+res[2294]+'</span><br>';
		}
		if(res[2622] !== null ){
			tab1 += '<strong>Total Sqft:</strong><span class="pull-right">'+res[2622]+'</span><br>';
		}
		
	tab1 += '</div>';
	tab1 += '<div class="span6"><div class="pull-right">'+ img +'</div></div>';
	tab1 += '<div style="clear:both">';
	if(res[2368] !== null ){
		tab1 += '<i>Listing By: '+res[2368]+'</i><br>';
	}		
	tab1 += '<a target="_blank" onclick="recently_viewed('+res["sysid"]+');" href="http://www.candacecourter.com/real-estate/property-details/'+res[175]+'" style="color:blue;">View Property Details</a>';
	tab1 += '</div>' +
'</div>';
var tab3 = res[3187];
	var html = '<div class="tabbable" style="width:336px">' + 
	'<ul class="nav nav-tabs" style="width:336px">' +
	 '<li class="active"><a href="#googletab1" data-toggle="tab">Detail</a></li>' +
	 '<li id="viewphotos" onclick="getImages(' + res['sysid'] + ')"><a href="#googletab2" data-toggle="tab">Photo</a></li>' +
	 '<li><a href="#googletab3" data-toggle="tab">Description</a></li>' + 
	'</ul>' +
	'<div class="tab-content">' +
	'<div class="tab-pane active" id="googletab1">' +
	'<p>' + tab1 + '</p>' +
	'</div>' +
	'<div class="tab-pane" id="googletab2">' +
	'<p>Loading...</p>' +
	'</div>' +
	'<div class="tab-pane" id="googletab3" style="padding-right:20px;">' +
	'<p>' + tab3 + '</p>' +
	'</div>' +
	'</div></div>';

	marker.info = new google.maps.InfoWindow({
	  content: html
	});

	google.maps.event.addListener(marker, 'click', function() {
		for( var i = 0; i < markersArray.length; i++ ) {
	  		markersArray[i].info.close();
	    }
	  	marker.info.open(map, marker);
	  	centermap(Latlng);
	});
	markersArray.push(marker);

	$("#clear-markers.disabled").removeClass("disabled");

}


function clearOverlays() {
  for (var i = 0; i < markersArray.length; i++ ) {
    markersArray[i].setMap(null);
  }
  markersArray = [];
  for (var i = 0; i < poiMarkersArray.length; i++ ) {
    poiMarkersArray[i].setMap(null);
  }
  poiMarkersArray = [];
  $("#clear-markers").addClass("disabled");
}

function custom_pt_of_interests(from_checkbox){
	if(from_checkbox == 0){
		var search_term  = $('#txt_pt_of_interest').val();

		if( $.inArray(search_term, mtype) == -1 ) {
			$("#custom_checkboxes").append('<li><input type="checkbox" id="'+search_term+'" value="'+search_term+'" checked onclick="custom_pt_of_interests(1);"><label for="'+search_term+'">'+search_term+'</label></li>');
		}			

	}		

		$("#suggestions input[type='checkbox']").each(function(){

			  var mvalue = $(this).attr("value");
		
			  if( $(this).is(':checked') ) {
		
				if( $.inArray(mvalue, mtype) == -1 ) {
		
				  mtype.push( mvalue );
		
				}
				
				
		
			  } else {
		
				if( $.inArray(mvalue, mtype) != -1 ) {
		
				  var i = mtype.indexOf(mvalue);
		
				  if(i != -1) {
		
					mtype.splice(i, 1);
		
				  }
		
				  hideMarker(mvalue);
		
				}
		
			  }
		
		})
		
		if (mtype.length !== 0) {
			request_place(map.getCenter(), mtype);
		}

}

function get_demographics(){
	
	var zip_code = $("#demogr_zip").val();
    $("#ul_demographics").hide();
	$.ajax({
		type: 'POST',
		url: "results/get_demographics",
		data: {
			zip_code: zip_code
		},
		dataType: 'json',
		beforeSend: function(){
			$('#stat_loader').show(); 
		},	
		success: function(result) {
			if(result.status == 'error') // Form Validation failed.
			{
			   $('.ajax-search-result').removeClass('success').addClass('failure').fadeIn(500).html(result.message);
			}
			else // Form Validation passed.
			{
			   $.each(result.msg, function(k, v) {
					$("#"+k).html(''); //first make empty 
					$("#"+k).html(v);
				});
			    $("#ul_demographics").show();
				$('#stat_loader').hide(); 
			}
		},
		error: function(data) {
			alert('There was an error while fetching demographics.');
			$('#stat_loader').hide();
		}
	});
}
function recently_viewed(sysid){

	var previous_sysids = $.cookie('sysids_cookie');
	console.log(previous_sysids);
	var new_value = previous_sysids+' '+sysid;
	console.log(new_value);
	$.cookie('sysids_cookie', new_value, { expires: 7, path: '/' });
	
	//var all_cook = $.cookie('sysids_cookie');
	//console.log(all_cook);
}
function show_recently_viewed(){
	var sysids = $.cookie('sysids_cookie');
	$.ajax({
		type: 'POST',
		url: "results/recently_viewed",
		data: {
			sysids: sysids
		},
		dataType: 'json',
		beforeSend: function(){
			$('#recently_loader').show(); 
		},	
		success: function(result) {
			if(result.status == 'no-result') // Form Validation failed.
			{
			   $("#recently_viewed_properties").html('No result found');
			   $('#recently_loader').hide(); 
			}
			else // Form Validation passed.
			{
				$("#recently_viewed_properties").html('');
				$.each(result.msg, function(k, v) {
					
					$("#recently_viewed_properties").append("<a href='#' class='result-house'>" + 
					"<img src='<?=$base?>img/icons/yellow-logo.png' style='width:18px;height=18px;'>&nbsp;" + 
					((v[49] == 0) ? "" : (v[49] + ""))+ ", " + v[2302]+ ", " + v[2304] + " " + v[46] + "</a>");
					place_marker(v['latitude'], v['longitude'], v, 'yellow');

				});
				$('#recently_loader').hide(); 
			}
		},
		error: function(data) {
			alert('There was an error while fetching recently viewed properties.');
			$('#recently_loader').hide();
		}
	});
	
}

function zoomto_poly(arr) {

	var p = {
		"type": "MultiPolygon"
	}
	
	var c = {
		"coordinates": arr
	}
	
	jQuery.extend(p, c);


	var self = this;
    var bounds = new google.maps.LatLngBounds();
    var coords = p.coordinates;
    var paths = [];
    for (var i = 0; i < coords.length; i++) {
      for (var j = 0; j < coords[i].length; j++) {
        var path = [];
        for (var k = 0; k < coords[i][j].length; k++) {
          var ll = new google.maps.LatLng(coords[i][j][k]
            [1],coords[i][j][k][0]);
          path.push(ll);
          bounds.extend(ll);
        }
        paths.push(path);
      }
    }
    var polygon = new google.maps.Polygon({
      paths: paths,
      strokeColor: "#FF7800",
      strokeOpacity: 1,
      strokeWeight: 2,
      fillColor: "#46461F",
      fillOpacity: 0.25
    });

    polygon.setMap(map);
    map.fitBounds(bounds);

}


function search_within_polygon(){
	
	
	$.ajax({
		type: 'POST',
		url: 'results/search_in_polygon',
		data: $('#search-form').serialize() + "&overlays_points=" + overlays_points+ "&part=" + part, 
		dataType: 'json',
		beforeSend: function(){
			$("li#searching_loader").show();
			$('#search_loader').show(); 
			$('#results_loader').show(); 
		},
		success: function(data) {
			
			response = data.results;
			pages 	 = data.pages;				
			//-------------
			/*for_zoom_to_polygon = data.for_zoom_to_polygon;
			var arr = [
						[
						  [
							[-80.661547137566686, 35.042510563404129],
							[-80.661677171806787, 35.042417322902836],
							[-80.662084018102888, 35.042702102858307],
							[-80.662039854197829, 35.042756211162953],
							[-80.662002555672572, 35.042820528162387],
							[-80.661457640151127, 35.042647387136952],
							[-80.661547137566686, 35.042510563404129]
						  ]
						]
					  ];
			
			//console.log(arr);
			//zoomto_poly(arr);
			zoomto_poly(for_zoom_to_polygon); 
			//console.log(for_zoom_to_polygon);
			return false;
			*/
			
			//-----------------

			try{		
				if(part == 0) clearOverlays();		// only for SEARCH, not for load more	
				$("#collapseNull").collapse('hide');
				$("#collapseOne").collapse('show');
				
				if(response == "noresult") {
					$(".resuls-inner").html('<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button>'+
											'No results found. Please try searching with another options. </div>');
					$("li#searching_loader").hide();
					$('#search_loader').hide(); 											
					$('#results_loader').hide(); 
					return false;
				}
				for( var i = 0; i < response.length; i++ ) {
					var res = response[i];
					$(".resuls-inner").append("<a href='#' class='result-house'>" +  "<img src='<?=$base?>img/icons/cc-logo.png'  style='width:18px;height:18px;'>&nbsp;" 
					+ ((res[49] == 0) ? "" : (res[49] + "")) + ", " + res[2302] + ", " + res[2304] + " " + res[46] + "</a>");
					place_marker(response[i].latitude, response[i].longitude, res,'blue');
				}
				
				$("#search_again_div").show();
				if(pages > 1 && part < pages && pages != part+1){
					$("#loadMore").show();
					$("#load_more_span").show();
				}else{
					$("#loadMore").hide();
					$("#load_more_span").hide();
				}
			}
			catch(e){
				return true;
			}	
			$("li#searching_loader").hide();
			$('#search_loader').hide(); 
			$('#results_loader').hide(); 

			
			
		},
		error: function(data) {
			alert('There was an error while searching properties.');
		}
	});

}

function search_type(clear_results){
	
	var type = $('input:radio[name=rad_search]:checked').val();

	if(clear_results == 1){
		clearOverlays();
		$(".resuls-inner").html('');
		$("#loadMore").hide();
		
		$("#search_again_div").hide();
		$("#load_more_span").hide();
	}

	if(type == 'address'){
		
		var srh_text = $("#rdc-sch-txt").val();
		
		if (srh_text == '') {
			$("#rdc-sch-txt-geo").attr('style','border:1px solid #ff0000');
			alert('Please enter the search term.');
			return false;
		}
		$("#rdc-sch-txt-geo").attr('style','border:1px solid #7CA0B8');
		send();
	}else if(type == 'polygon' ){	
		
		if (overlays_points.length === 0) {
			alert('Please draw the polygon to search in.');
			return false;
		}
		search_within_polygon();
	}

}
</script>
<div style="display:none;" id="recently_viewed"></div>
</body>
</html>