<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Simple markers</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 30vh;
        margin-top: 20vh;
      }
      #row{
        height: 20vh;
      }
      /* Optional: Makes the sample page fill the window. */
    </style>
  </head>
  <body>
      <div class="container">
        <div class="row">
        <div class="col-lg-12">
          <div id="map"></div></div>
          <div class="col-lg-4">
          <div class="form-group">
          <label>Latitude</label><input class="form-control" id="inputLatitude" type="number">
          </div>
          <div class="form-group">
          <label>Longitude</label><input class="form-control" id="inputLongitude" type="number">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
          <label>Title</label><input class="form-control" id="inputTitle" type="text">
          <div class="form-group">
          <label>ImageLinkMarker</label><input class="form-control" id="markerLink" type="text">
        </div>
        <div class="col-lg-4">
          <div class="form-group">
          <label>Text</label>
          <textarea id="textInput" rows="4" cols="50">
          </textarea>
          </div>
          <button class="btn-primary" onclick="createMarker();">Add Marker</button>
          <!--
          <select id="optionSelector"></div></div>
          </select>
        -->
        </div>
      </div>
    <script>
      markerArray = Array();
      map = "";
      function createMarker(){
        if($('#inputLatitude').val() != '' && $('#inputLongitude').val() != ''){
          curLatitude = Number($('#inputLatitude').val());
          curLongitude= Number($('#inputLongitude').val());
          console.log(curLatitude);
          console.log(curLongitude);
          var latlng = {lat: curLatitude, lng: curLongitude};
          var imageLink = $('#markerLink').val();
          console.log(imageLink);
          var curMarker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: $('#inputTitle').val(),
            icon: imageLink
          });
          var infowindow = new google.maps.InfoWindow({
            content: $('#textInput').val()
          });
          curMarker.addListener('click', function() {
              infowindow.open(map, curMarker);
          });
          markerArray.push(curMarker);
          //createSelector();
        }


      }
      function createSelector(){
        tag="";
        for(let i = 0;i<markerArray.length;i++){
          tag += "<option value=\""+ markerArray[i].title + "\">" + markerArray[i].title + "</option>";
        }
        $("#optionSelector").html(tag);
      }

      function initMap() {
        var myLatLng = {lat: 48.210033, lng: 16.363449};

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5MfnQ_kwvJdtb0jtwoRUDfwh29PnuKSU&callback=initMap">
    </script>
  </body>
</html>
