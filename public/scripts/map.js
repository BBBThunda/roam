
var map;
var name;
var marker;
var Schools;
var myZipcode = "";
var myLat = 0;
var myLng = 0;
var markers = [];
var myLatLng = new google.maps.LatLng(myLat, myLng);
var infowindow = new google.maps.InfoWindow();
$( document ).ready(function init()
{
		console.log("In init");
		var mapOptions = {
			center: myLatLng,
			zoom: 13,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
		getMyLocation();
});
function getMyLocation() 
{
	console.log("In getMyLocation");
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			myLat = position.coords.latitude;
			myLng = position.coords.longitude;
			myLatLng = new google.maps.LatLng(myLat, myLng);
			renderMap();
		});
	}
	else {
		alert("Geolocation is not supported by your web browser.");
	}
}
function renderMap() 
{
	console.log("renderMap");
	me = new google.maps.LatLng(myLat, myLng);
	map.panTo(me);
	var image = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
	marker = new google.maps.Marker({
		position: me,
		icon: image,
		title: "You are here!"
	});
	marker.setMap(map);
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.setContent(marker.title);
		infowindow.open(map, marker);
	});
	createMarker("Greentown Lab", 42.381128, -71.103550);
	createMarker("Boston Commons", 42.355477, -71.063918);
	createMarker("Quincy Market", 42.359799, -71.054460);
}


function createMarker(name, lat, lng) 
{
	var image = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
	var LatLng = new google.maps.LatLng(lat, lng);
	var marker = new google.maps.Marker({
		map: map,
		position: LatLng,
		title: name,
		icon: image
	});
	marker.setMap(map);
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.setContent(marker.title);
		infowindow.open(map, this);
	});
	markers.push(marker);
	
}


