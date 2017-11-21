
<html>
	<script>


			var map;
			var infoWindow;
			var markerImage = 'marker.png';

      <?php

      $marker_set = find_all_markers();
       ?>

       var markersData = [

       <?php
       $marker_count = mysqli_num_rows($marker_set);
       while($marker = mysqli_fetch_assoc($marker_set)) {


                 $lat = $marker['lat'];
                 $lng = $marker['lng'];
       ?>



                {
              lat: <?php echo $lat; ?>,
              lng: <?php echo $lng; ?>, },



       <?php  } //ending while block ?>


// Below code is just to debug and error as there should not be an ',' after '}' in the last object
              {
                lat: 40.7446287,
                 lng: -73.939071,
              }

// Above code is for debug

                ];


			function initialize() {
			    var mapOptions = {

			        zoom: 18,
			        center: new google.maps.LatLng(40.7446287, -73.939071),
			        mapTypeId: google.maps.MapTypeId.ROADMAP
			    };

			    map = new google.maps.Map(document.getElementById('map'), mapOptions);


			    // a new Info Window is created
			    infoWindow = new google.maps.InfoWindow();

			    // Event that closes the Info Window with a click on the map
			    google.maps.event.addListener(map, 'click', function() {
				    infoWindow.close();
				});

			    // Finally displayMarkers() function is called to begin the markers creation
			    displayMarkers();
			}
			google.maps.event.addDomListener(window, 'load', initialize);


			// This function will iterate over markersData array
			// creating markers with createMarker function
			function displayMarkers(){

			    // this variable sets the map bounds according to markers position
			    var bounds = new google.maps.LatLngBounds();

			    //  Due to this above bound code the maps zoom function is over-ridden
			    //  So, the zoom depends on the distance between the markers



			    // for loop traverses markersData array calling createMarker function for each marker
			    for (var i = 0; i < markersData.length; i++){

			        var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
			        var name = markersData[i].name;


			        createMarker(latlng, name);

			        // marker position is added to bounds variable
			        bounds.extend(latlng);
			    }

			    // Finally the bounds variable is used to set the map bounds
			    // with fitBounds() function
			    map.fitBounds(bounds);
			}

			// This function creates each marker and it sets their Info Window content
			function createMarker(latlng, name){
			    var marker = new google.maps.Marker({
				    map: map,
				    position: latlng,
				    icon: markerImage
				});

			    var marker2 = new google.maps.Marker({
			       map: map,
			       position: new google.maps.LatLng(40.744769, -73.936368),
			       icon: 'marker2.png'

			    });
			    /*    var iwContent2 = '<div id="iw_container">' +
			              '<div class="iw_title">' + "You" + '</div>' +
			           '<div class="iw_content">' + "are" + '<br />' +
			           "Here" + '<br />' +
				"" + '</div></div>';*/


			    /*var cityCircle = new google.maps.Circle({
			            strokeColor: '#FF0022',
			            strokeOpacity: 0.8,
			            strokeWeight: 2,
			            fillColor: '#FF0032',
			            fillOpacity: 0.35,
			            map: map,
			            center: new google.maps.LatLng(40.730610, -73.935242),
			            radius: 5
				});*/

			    // This event expects a click on a marker
			    // When this event is fired the Info Window content is created
			    // and the Info Window is opened.
			    google.maps.event.addListener(marker, 'click', function() {

				    // Creating the content to be inserted in the infowindow
			        var iwContent = '<div id="iw_container">' +
			              '<div class="iw_title">' + name;
			        // including content to the Info Window.
			        infoWindow.setContent(iwContent);
			        // opening the Info Window in the current map and at the current marker location.
			        infoWindow.open(map, marker);
				});



			    google.maps.event.addListener(marker2, 'click', function() {
			      var iwContent2 = '<div id="iw_container">' +
			              '<div class="iw_title">' + "You" + '</div>' +
			           '<div class="iw_content">' + "are" + '<br />' +
			           "Here" + '<br />' +
				  "" + '</div></div>';
			       infoWindow.setContent(iwContent2);
			       infowindow.open(map, marker2);
				});



			}




	</script>
</html>
