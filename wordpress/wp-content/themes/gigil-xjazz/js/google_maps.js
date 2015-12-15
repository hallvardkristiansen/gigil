$ = jQuery;
var xjazz_gmaps_api_key = 'AIzaSyBaVrLRdLUMvRKLLsXPuaE4slFJS28TEEs';
var xjazz_gmaps_style = [{
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#333333"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#dedede"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f2f2f2"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "transit.station",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "hue": "#ff0000"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e9e9e9"
            },
            {
                "lightness": 17
            }
        ]
    }];


$(document).ready(function() {
  if ($('#google_map').length) {
    var mapcenter = new google.maps.LatLng(52.5167, 13.3833);
    var mapOptions = {
      center: mapcenter,
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: xjazz_gmaps_style
    }
    var map = new google.maps.Map(document.getElementById('google_map'), mapOptions);

    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var labelIndex = 0;

    $.getJSON('/wp-json/wp/v2/xjazz_venues', function(data) {
      if (data.length) {
        $.each(data, function(index, node) {
          console.log(index, node);
          var latlong = {lat: parseFloat(node.acf.location.lat), lng: parseFloat(node.acf.location.lng)};
          var marker = new google.maps.Marker({
            position: latlong,
            map: map,
            label: labels[labelIndex++ % labels.length],
            title: node.title.rendered
          });
          var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">'+node.title.rendered+'</h1>'+
                '<div id="bodyContent">'+
                '<p>'+node.acf.location.address+'</p>'+
                node.excerpt.rendered+
                '<p><a href="'+node.link+'">'+
                'Read more</a> '+
                '</div>'+
                '</div>'; 
          var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 300
          });
          marker.addListener('click', function() {
            infowindow.open(map, marker);
          });
          mapcenter = latlong;
        });
        map.setCenter(mapcenter);
      }      
    });
  }
});