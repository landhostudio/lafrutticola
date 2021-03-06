(function($) {

  'use strict';

  var init = function() {
    initHeader();
    initDropdown();
    if ($('.map').length) {
      initGoogleMaps();
    }
    initSort();
    if ($('.cookies').length) {
      initCookies();
    }
    initLog();
  };

  function initHeader() {
    $('.header__toggle .btn--toggle').click(function() {
      $('.header').toggleClass('header--active');
    });
  };

  function initDropdown() {
    $('.btn--dropdown').click(function() {
      $(this).toggleClass('btn--active');
      $('.btn__dropdown').toggleClass('btn__dropdown--active');
    });

    $(document).click(function(event) {
      if (event.target.nodeName.toLowerCase() != 'button') {
        $('.btn__dropdown').removeClass('btn__dropdown--active');
        $('.btn--dropdown').removeClass('btn--active');
      }
    });
  };

  function initGoogleMaps() {

    function new_map($el) {

      var $markers = $el.find('.map__marker');

      var color1 = '#222222',
          color2 = '#7f7d32',
          color3 = '#fbfbfb',
          color4 = '#fbfbfb',
          color5 = '#bcbb94';

    	var args = {
        scrollwheel       : false,
        navigationControl : true,
        mapTypeControl    : true,
        scaleControl      : true,
        draggable         : true,
        zoom              : 16,
        zoomControl       : true,
        mapTypeControl    : false,
        scaleControl      : true,
        streetViewControl : false,
        rotateControl     : false,
        fullscreenControl : false,
    		center		        : new google.maps.LatLng(0, 0),
    		mapTypeId	        : google.maps.MapTypeId.ROADMAP,
        styles: [
          {
            elementType: 'geometry',
            stylers: [
              {
                color: color3
              }
            ]
          },
          {
            elementType: 'labels.text.stroke',
            stylers: [
              {
                color: color3
              }
            ]
          },
          {
            elementType: 'labels.text.fill',
            stylers: [
              {
                color: color1
              }
            ]
          },
          {
            featureType: 'administrative.locality',
            elementType: 'labels.text.fill',
            stylers: [
              {
                color: color1
              }
            ]
          },
          {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [
              {
                color: color1
              }
            ]
          },
          {
            featureType: 'poi.park',
            elementType: 'geometry',
            stylers: [
              {
                color: color5
              }
            ]
          },
          {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [
              {
                color: color1
              }
            ]
          },
          {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [
              {
                color: color5
              }
            ]
          },
          {
            featureType: 'road',
            elementType: 'geometry.stroke',
            stylers: [
              {
                color: color2
              }
            ]
          },
          {
            featureType: 'road',
            elementType: 'labels.text.fill',
            stylers: [
              {
                color: color1
              }
            ]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [
              {
                color: color5
              }
            ]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [
              {
                color: color2
              }
            ]
          },
          {
            featureType: 'road.highway',
            elementType: 'labels.text.fill',
            stylers: [
              {
                color: color1
              }
            ]
          },
          {
            featureType: 'transit',
            elementType: 'geometry',
            stylers: [
              {
                color: color5
              }
            ]
          },
          {
            featureType: 'transit.station',
            elementType: 'labels.text.fill',
            stylers: [
              {
                color: color1
              }
            ]
          },
          {
            featureType: 'water',
            elementType: 'geometry',
            stylers: [
              {
                color: color5
              }
            ]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [
              {
                color: color3
              }
            ]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [
              {
                color: color1
              }
            ]
          }
        ]
    	};
	
      // create map
      var map = new google.maps.Map($el[0], args);

      // add a markers reference
      map.markers = [];

      // add markers
      $markers.each(function() {
        add_marker($(this), map);
	    });

      // center map
      center_map(map);

      return map;
    }

    function add_marker($marker, map) {

      var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

    	// create marker
    	var marker = new google.maps.Marker({
    		position : latlng,
    		map      : map
    	});

    	// add to array
    	map.markers.push(marker);

    	// if marker contains HTML, add it to an infoWindow
    	if ($marker.html()) {

    		// create info window
    		var infowindow = new google.maps.InfoWindow({
          content: $marker.html()
    		});

    		// show info window when marker is clicked
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map, marker);
    		});
    	}
    }

    function center_map(map) {

    	var bounds = new google.maps.LatLngBounds();

    	// loop through all markers and create bounds
    	$.each(map.markers, function(i, marker) {
    		
        var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
    		bounds.extend(latlng);

    	});

    	// only 1 marker?
    	if (map.markers.length == 1) {
    	
      	// set center of map
  	    map.setCenter(bounds.getCenter());
  	    map.setZoom(9);

      } else {

    		// fit to bounds
    		// map.fitBounds(bounds);

        map.fitBounds(bounds);

    	}

    }

    var map = null;

    $(document).ready(function() {
      $('.map__canvas').each(function() {
        
        // create map
        map = new_map($(this));

      });

      // resize the map when the viewport is changed
      google.maps.event.addDomListener(window, 'resize', function() {
        
        var center = map.getCenter();
        
        google.maps.event.trigger(map, 'resize');
        map.setCenter(center);

      });
      
    });

  };

  function initSort() {
    var $filters    = $('[data-filter]'),
        $categories = $('[data-category]');

    $filters.on('click', function() {
      var $this = $(this),
          $filter = $this.data('filter');

      $filters.removeClass('btn--active');
      $this.addClass('btn--active');

      if ($filter === 'all') {
        $categories.removeClass('products__item--hidden');
      } else {
        $categories.addClass('products__item--hidden');
        $categories.filter('[data-category *= "' + $filter + '"]').removeClass('products__item--hidden');
      };
    });
  };

  function initCookies() {
    
    var cookies = Cookies.get('lafrutticola--cookies-accepted');

    if (cookies == 1) {

      $('.cookies').removeClass('cookies--not-accepted');

    } else {

      Cookies.set('lafrutticola--cookies-accepted', '0', {expires: 365});

      $('.cookies').addClass('cookies--not-accepted');

      $('.cookies .btn--active').click(function(event) {
        $('.cookies').removeClass('cookies--not-accepted');
        Cookies.set('lafrutticola--cookies-accepted', '1', {expires: 365});
      });

    };

  };

  function initLog() {
    console.log('lafrutticola');
  };

  init();

})(jQuery);
