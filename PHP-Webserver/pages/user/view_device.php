<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh_VMw9cGaUNJW0Z-r-ncLrNYp9ibXghE&sensor=false&libraries=places"></script>
<script type="text/javascript">
function initialize() {

    var latitude = getUrlVars()["latitude"];
    var longitude = getUrlVars()["longitude"];
    var latlng = new google.maps.LatLng(latitude,longitude);
    //var latlng = new google.maps.LatLng(23.0333,72.6167);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 10
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: false,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var infowindow = new google.maps.InfoWindow();   
    google.maps.event.addListener(marker, 'click', function() {
      var iwContent = '<div id="iw_container">' +
      '<div class="iw_title"><b>Location</b> : Your Device Is Here..!</div></div>';
      // including content to the infowindow
      infowindow.setContent(iwContent);
      // opening the infowindow in the current map and at the current marker location
      infowindow.open(map, marker);
    });
}

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,    
    function(m,key,value) {
      vars[key] = value;
    });
    return vars;
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<center><div id="map" style="width: 100%; height: 525px;"></div></center> 
