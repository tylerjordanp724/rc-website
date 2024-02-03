const headerScroll = () => {
    $('.header--desktop').removeClass('scrolled');

    if($(window).scrollTop() > $('.header--desktop').outerHeight()) $('.header--desktop').removeClass('scrolled');    
    $(window).scroll(() => {
        const currentScroll = $(this).scrollTop();
        const desktopHeader = $('.header--desktop');
        const headerHight = desktopHeader.outerHeight();

        if(currentScroll >= headerHight ) {
            desktopHeader.addClass('scrolled');
        } else {
            desktopHeader.removeClass('scrolled');
        }
    });
}

const mobileNav = () => {
    const $menuBtn = $('.nav-btn');

    const closeOnResize = () => {
        $(window).resize(() => {
            $('.header--mobile, body').removeClass('nav-open');
        });
    }

    $menuBtn.click(() => {
        $(this).toggleClass('nav-open');
        $('.header--mobile, body').toggleClass('nav-open');
    });

    closeOnResize();
}

const carousel = () => {
    const $carousel = $('.gallery__inner');
    const $carouselNav = $('.gallery__nav');

    $carousel.flickity({
        cellAlign: 'center',
        arrowShape: { 
            x0: 10,
            x1: 60, y1: 50,
            x2: 70, y2: 40,
            x3: 30
        },
        lazyLoad: true,
        pageDots: false,
        wrapAround: true
    });

    $carouselNav.flickity({
        asNavFor: `.gallery__inner`,
        contain: true,
        pageDots: false,
        prevNextButtons: false,
        wrapAround: false,
        cellAlign: 'center'
    });

    $carouselNav.flickity('resize');
}

/**
 * initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */
function initMap( $el ) {

    // Find marker elements within map.
    var $markers = $el.find('.marker');

    // Create gerenic map.
    var mapArgs = {
        zoom        : $el.data('zoom') || 16,
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map( $el[0], mapArgs );

    // Add markers.
    map.markers = [];
    $markers.each(function(){
        initMarker( $(this), map );
    });

    // Center map based on markers.
    centerMap( map );

    // Return map instance.
    return map;
}

/**
 * initMarker
 *
 * Creates a marker for the given jQuery element and map.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @param   object The map instance.
 * @return  object The marker instance.
 */
function initMarker( $marker, map ) {

    // Get position from marker.
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = {
        lat: parseFloat( lat ),
        lng: parseFloat( lng )
    };

    // Create marker instance.
    var marker = new google.maps.Marker({
        position : latLng,
        map: map
    });

    // Append to reference for later use.
    map.markers.push( marker );

    // If marker contains HTML, add it to an infoWindow.
    if( $marker.html() ){

        // Create info window.
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });

        // Show info window when marker is clicked.
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open( map, marker );
        });
    }
}

/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap( map ) {

    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function( marker ){
        bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
        });
    });

    // Case: Single marker.
    if( map.markers.length == 1 ){
        map.setCenter( bounds.getCenter() );

    // Case: Multiple markers.
    } else{
        map.fitBounds( bounds );
    }
}

$(function() {
    const bLazy = new Blazy();
    $('.gallery__inner').on('scroll.flickity', function(){
       bLazy.revalidate();
    });
    $('.gallery__nav').on('scroll.flickity', function(){
        bLazy.revalidate();
    });
    carousel();
    mobileNav();
    headerScroll();
    initMap($('.acf-map'));
});