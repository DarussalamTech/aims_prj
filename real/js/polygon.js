var drawingManager;

var selectedShape;



function clearSelection() {

  closeHelper();

  if (selectedShape) {

    selectedShape.setEditable(false);

    selectedShape = null;

  }

}



function closeHelper(){

  $("#helper").hide();

}



function setSelection(shape) {

  clearSelection();

  selectedShape = shape;

  shape.setEditable(true);

}



function deleteSelectedShape() {

  while(overlays[0]){

    overlays.pop().setMap(null);

  }

  //send();

}



function startDrawing(){     

  drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON)

}



function stopDrawing(){       

  drawingManager.setDrawingMode(null);

}



function isWithinPoly(marker, polygonarea){

  for( var i = 0; i < polygonarea.length; i++){

    if(google.maps.geometry.poly.containsLocation(marker, polygonarea[i])) {

      return true;

    }

  }

  return false;

} 



function hideMarker(marker_category){

  for( var i = 0; i < poiMarkersArray.length; i++){

    if(poiMarkersArray[i].category == marker_category) {

      poiMarkersArray[i].setVisible(false);

    }

  }

}



function markertrigger(index) {

  google.maps.event.trigger(markersArray[index],"click");

}



function centermap(pos) {

  map.setCenter(pos);

}