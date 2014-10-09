$(document).ready(function() {







  $('#loadMore, #rdc-sch-btn-geo').tooltip({'placement':'right'});



  $('#rdc-sch-txt').tooltip({'placement':'bottom'});











  $("#autocomplete-address").submit(function() {



    codeAddress();



  })







  $("#search-form").submit(function(){





    search_type(1);



    return false; 



  })







  $("#helper-search").click(function(){    



    $(".resuls-inner").html("");



    $("#search").trigger("click");



  })







  $("#loadMore,#btn_load_more").click(function(){    



    part++;



    search_type(0);



    return false; 



  })







  // Geolocation



  $("#rdc-sch-btn-geo").click(function(){



    geo_initialize();



  });







  // Clear Search



  $("#rdc-sch-btn-clr").click(function(){



    $("#rdc-sch-txt").val("");



  });











  // reset form



  $("#form-reset").click(function(){



    $("#form-options").find("input, option").val('').removeAttr('checked').removeAttr('selected');



  })







  $("#clear-markers, #helper-clear-markers").click(function(){



    clearOverlays();

	$(".resuls-inner").html('');

	$("#collapseOne").collapse('hide');

	$("#loadMore").hide();

	$("#collapseNull").collapse('show');

	part = 0;



  })

  

  $("#btn_search_again").click(function(){



    clearOverlays();

	$(".resuls-inner").html('');

	$("#collapseOne").collapse('hide');

	$("#loadMore").hide();

	$("#collapseNull").collapse('show');

	$("#search_again_div").hide();

	part = 0;

	

    $("#clear-polygon").addClass("disabled");

	overlays_points.splice(0, overlays_points.length); //empty the overlays_points array

	deleteSelectedShape();

	

  })



  // enable Search button



  /*$("#rdc-sch-txt").keyup( function(){



    if( $(this).val() != '' ) {



      $("#search-now, #search, #rdc-radius").removeAttr("disabled");



    } else {          



      $("#search-now, #search, #rdc-radius").attr("disabled", "true");



    }



  });*/



  // check on load also



  /*if( $("#rdc-sch-txt").val() != '' ) {



    $("#search-now, #search, #rdc-radius").removeAttr("disabled");



  } else {          



    $("#search-now, #search, #rdc-radius").attr("disabled", "true");



  }*/







  $("#rdc-sch-btn-geo").click(function(){



    $("#search-now, #search, #rdc-radius").removeAttr("disabled");



  })



  $("#rdc-sch-btn-clr").click(function(){



   // $("#search-now, #search, #rdc-radius").attr("disabled", "true");



  })







  // suggestions



  $("#suggestions input[type='checkbox']").change(function(){



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



  })







  // show infobox on result click



  $("body").on("mouseover", ".result-house", function(){



    var index = $(this).index();



    markertrigger(index);



  })







  // disable clear button



  $("#draw-polygon").click(function(){

	var form_showing = $("#collapseNull").attr('style');

	if(form_showing === undefined || form_showing == 'height: auto;' ){

		$('input:radio[id=rad_poly]').prop('checked', true);

	}

  })





  $("#clear-polygon").click(function(){



    $(this).addClass("disabled");

	overlays_points.splice(0, overlays_points.length); //empty the overlays_points array

	$("#loadMore").hide();

	

  })







  $("#helper a").click(function(){



    closeHelper();



  })







  $("#show-legend, #helper-show-legend").click(function(){



    $("#legend").show();



  })







  $("button.legend-close").click(function(){    



    $("#legend").hide();



    return false;



  })



});