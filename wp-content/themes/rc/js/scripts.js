const closeOnResize=()=>{$(window).resize((()=>{$(".header--mobile").removeClass("nav-open")}))},headerScroll=()=>{const e=$(".header--desktop"),o=$(window).scrollTop(),a=e.outerHeight();$(window).scroll((()=>{console.log(o,a),o>=$(".header--desktop").outerHeight()?e.addClass("scrolled"):0===o&&e.removeClass("scrolled")}))},mobileNav=()=>{$(".nav-btn").click((()=>{$(this).toggleClass("nav-open"),$(".header--mobile").toggleClass("nav-open")})),closeOnResize()};function initMap(e){var o=e.find(".marker"),a={zoom:e.data("zoom")||16,mapTypeId:google.maps.MapTypeId.ROADMAP},n=new google.maps.Map(e[0],a);return n.markers=[],o.each((function(){initMarker($(this),n)})),centerMap(n),n}function initMarker(e,o){var a=e.data("lat"),n=e.data("lng"),t={lat:parseFloat(a),lng:parseFloat(n)},l=new google.maps.Marker({position:t,map:o});if(o.markers.push(l),e.html()){var r=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(l,"click",(function(){r.open(o,l)}))}}function centerMap(e){var o=new google.maps.LatLngBounds;e.markers.forEach((function(e){o.extend({lat:e.position.lat(),lng:e.position.lng()})})),1==e.markers.length?e.setCenter(o.getCenter()):e.fitBounds(o)}$((function(){mobileNav(),headerScroll(),initMap($(".acf-map"))}));