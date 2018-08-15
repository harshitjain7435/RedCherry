
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 24.614134, lng: 73.685575};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGaTDcPGv3RZOaMwzB6hzEQmdt-7guU74&callback=initMap">
    </script>