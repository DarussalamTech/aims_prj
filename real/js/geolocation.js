var geocoder;
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;

    var lng = position.coords.longitude;

    codeLatLng(lat, lng)
}


function errorFunction(){
    $("#geo-alert").show().html("Geocoder failed");
	$("#getlocation_loader").hide();
}


function geo_initialize() {
	$("#getlocation_loader").show();
	if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
		$("#getlocation_loader").hide();
	}
    geocoder = new google.maps.Geocoder();
	//$("#getlocation_loader").hide();

}

function codeLatLng(lat, lng) {

	var latlng = new google.maps.LatLng(lat, lng);
	geocoder.geocode({'latLng': latlng}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
	    if (results[1]) {
	     //formatted address
	     //console.log(results[0].formatted_address)
	     //find country name
	        for (var i=0; i<results[0].address_components.length; i++) {
	        for (var b=0;b<results[0].address_components[i].types.length;b++) {
	        //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
	            if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
	                //this is the object you are looking for
	                city = results[0].address_components[i];
	    			country = results[0].address_components[6];
	                break;
	            }
	        }
	    }
	    //city data
	    $("#rdc-sch-txt").val(results[0].formatted_address);
	    $("#rdc-sch-lat").val(results[0].geometry.location.mb);	    
	    $("#rdc-sch-lng").val(results[0].geometry.location.lb);

	    } else {
	      $("#geo-alert").show().html("No results found");
	    }
	  } else {
	    $("#geo-alert").show().html("Geocoder failed due to: " + status);
	  }
	});
}