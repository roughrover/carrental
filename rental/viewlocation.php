<?php

include 'rentalheader.php';

include '../connection.php';

$id=$_GET['id'];

$qry="SELECT * FROM ploc where bid='$id'";

$res=mysqli_query($con,$qry);

$rs=mysqli_fetch_array($res);



?>
<style>

.banner-text{


visibility:hidden;

}
    td,th{
        padding: 10px;
		font-size: larger;
		font-weight: bold;
    }
     th{
        background-color: black;
        color:white;
    }
    /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
         #map {
          height: 450px;
          width:1150px;
          border-style:groove;
          border-width:thick;
          /*margin-left:300px;
          margin-top:30px;
          margin-bottom:30px;*/
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
        #description {
          font-family: Roboto;
          font-size: 15px;
          font-weight: 300;
        }
  
        #infowindow-content .title {
          font-weight: bold;
        }
  
        #infowindow-content {
          display: none;
        }
  
        #map #infowindow-content {
          display: inline;
        }
  
        .pac-card {
          margin: 10px 10px 0 0;
          border-radius: 2px 0 0 2px;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
          outline: none;
          box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
          background-color: #fff;
          font-family: Roboto;
        }
  
        #pac-container {
          padding-bottom: 12px;
          margin-right: 12px;
        }
  
        .pac-controls {
          display: inline-block;
          padding: 5px 11px;
        }
  
        .pac-controls label {
          font-family: Roboto;
          font-size: 13px;
          font-weight: 300;
        }
  
        #pac-input {
          background-color: #fff;
          font-family: Roboto;
          font-size: 15px;
          font-weight: 300;
          margin-left: 12px;
          padding: 0 11px 0 13px;
          text-overflow: ellipsis;
          width: 800px;
        }
  
        #pac-input:focus {
          border-color: #4d90fe;
        }
  
        #title {
          color: #fff;
          background-color: #4d90fe;
          font-size: 25px;
          font-weight: 500;
          padding: 6px 12px;
        }
        #target {
          width: 345px;
        }

</style>
<form   method="POST" enctype="multipart/form-data">`
    <div style="margin:50px;">
         <!-- <br><h2  align="center" > <b>Search your nearby Services</b></h2><br>
    <input id="pac-input" class="controls" type="text" placeholder="Search your location"> -->
                
                     <div id="map"></div>
                     <!-- <input onclick="deleteMarkers();" type=button value="Refresh location">
                     <input style="width:1000px;" type="submit" name="submit" value="Search" class="btn btn-primary"/> -->
                     <input type="text" id="l1" style="visibility: hidden;" required name="l1">
                <input type="text" id="l2" style="visibility: hidden;" required name="l2">
</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   
    // This example adds a search box to a map, using the Google Place Autocomplete
                     // feature. People can enter geographical searches. The search box will return a
                     // pick list containing a mix of places and predicted search terms.
            
                     // This example requires the Places library. Include the libraries=places
                     // parameter when you first load the API. For example:
                     // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
            
                        function initAutocomplete() {
                            debugger;
                         var map = new google.maps.Map(document.getElementById('map'), {
                             center: { lat: JSON.parse("<?php echo $rs['lat']?>"), lng: JSON.parse("<?php echo $rs['lon']?>") },
                             zoom: 13,
                             mapTypeId: 'roadmap'
                         });
                         
            new google.maps.Marker({
    position: { lat: JSON.parse("<?php echo $rs['lat']?>"), lng: JSON.parse("<?php echo $rs['lon']?>")},
    map,
  title:"Destination" ,
  
  });
            
                         google.maps.event.addListener(map, "click", function (event) {
                             // get lat/lon of click
                             var clickLat = event.latLng.lat();
                             var clickLon = event.latLng.lng();
            
                             // show in input box
                             document.getElementById('l1').value = clickLat.toFixed(5);
                             document.getElementById('l2').value = clickLon.toFixed(5);
                            
                    var somefunction = function () {
                        var hdnfldVariable = document.getElementById('hdnfldVariable');
                        hdnfldVariable.value = clickLat.toFixed(5);
                    }
               
            
            
                             var marker = new google.maps.Marker({
                                 position: new google.maps.LatLng(clickLat, clickLon),
                                 map: map,
                                 draggable:true
                             });
                         });
            
            
                         // Create the search box and link it to the UI element.
                         var input = document.getElementById('pac-input');
                         var searchBox = new google.maps.places.SearchBox(input);
                         map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            
                         // Bias the SearchBox results towards current map's viewport.
                         map.addListener('bounds_changed', function () {
                             searchBox.setBounds(map.getBounds());
                         });
            
                         var markers = [];
                         // Listen for the event fired when the user selects a prediction and retrieve
                         // more details for that place.
                         searchBox.addListener('places_changed', function () {
                             var places = searchBox.getPlaces();
            
                             if (places.length == 0) {
                                 return;
                             }
            
                             // Clear out the old markers.
                            
                             markers.forEach(function (marker) {
                                debugger;
                                 marker.setMap(null);
                                 
                                
                             });
                             markers = [];
             

                             // For each place, get the icon, name and location.
                             var bounds = new google.maps.LatLngBounds();
                             places.forEach(function (place) {
                                 if (!place.geometry) {
                                     console.log("Returned place contains no geometry");
                                     return;
                                 }
                                 var icon = {
                                     url: place.icon,
                                     size: new google.maps.Size(71, 71),
                                     origin: new google.maps.Point(0, 0),
                                     anchor: new google.maps.Point(17, 34),
                                     scaledSize: new google.maps.Size(25, 25)
                                 };
            
                                 // Create a marker for each place.
                                 markers.push(new google.maps.Marker({
                                     map: map,
                                     icon: icon,
                                     title: place.name,
                                     position: place.geometry.location
                                 }));
            
                                 if (place.geometry.viewport) {
                                     // Only geocodes have viewport.
                                     bounds.union(place.geometry.viewport);
                                 } else {
                                     bounds.extend(place.geometry.location);
                                 }
                             });
                             map.fitBounds(bounds);
                         });
                     }
            
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRhhnbNUXPX9_JYKnroSAex2-1KFaSmwQ&libraries=places&callback=initAutocomplete"></script>


<?php

include 'footer.php'

?>