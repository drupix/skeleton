/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal) {
  
  //To understand behaviors, see https://drupal.org/node/756722#behaviors
  Drupal.behaviors.skeleton_custom = {
   attach: function(context, settings) {

     // Place your code here.
     
     // Mobile Main Menu
     $('#nav-mobile ul.dropdown-menu').removeClass('dropdown-menu');
     
     $('.mobile-menu-trigger').click(function() {
       if( $('#nav-mobile').hasClass('active') ) {
         $('#nav-mobile').removeClass('active');
         $('#main-wrapper').removeClass('mobile-menu-active');
       }
       else {
         $('#nav-mobile').addClass('active');
         $('#main-wrapper').addClass('mobile-menu-active');
       }
     });
     // END Mobile Main Menu

     $('.front.not-logged-in .form-submit').addClass('btn');
     
     $('.checkout-login').click(function() {

       $('#myLoginModal .alert-info').removeClass('hidden');
       
     })

     $('.captcha .fieldset-legend').addClass('hidden');
     
   }
  };

})(jQuery, Drupal);


//Top-page (menu) position
(function($) {

	function isEmpty( el ){
	  return !$.trim(el.html())
	}
	
	$.setPagePosition = function() {
	
	  // Remove for fixed header
	  // WARNING: Fixed header cause login block not clickable
	  //          The login block should reside outside the fixed div
	  
	  // in doc ready : $("#myLoginModal").appendTo("body") solved it
	  
	  //return;
	  
	  if (!isEmpty($('#top-page.fixed'))) {
	  
	    var t = $('#page').offset();
	    t = t.top;
	    //console.log('t = ' + t);
	    
	    //var h = $('#top-page').offset();
	    var h = $('#top-page').outerHeight();
	    var m = $('#admin-menu').outerHeight();
	    //console.log('h = ' + h);
	    //console.log('m = ' + m);
	    
	    s = $(window).scrollTop();
	    
	    d = t-s;
	    //console.log('d = ' + d);
	    
	    //$('#top-page').css('margin-top', (m)+'px');
	    if (d <= 10) {
	      $('#page').css('padding-top', (h-10)+'px');
	//      $('#page').css('padding-top', (h)+'px');
	    } else {
	      // +3 is for borders
	      //$('#page').css('padding-top', (h+3)+'px');
	      //$('#page').css('padding-top', (h-t)+'px');
	      $('#page').css('padding-top', (h)+'px');
	    }
	  }
	}
	
	$(window).scroll(function() {
	  $.setPagePosition();
	});
	  
	$(window).resize(function () {
	  $.setPagePosition();
	});

})(jQuery);


//References and work isotope
(function($, Drupal) {

  $(window).load(function() {
    
    var $container = $('#container-isotope')
    
    $container.isotope({
      // options
      itemSelector : '.isotope-item',
      //layoutMode : 'fitRows',
      layoutMode : 'masonry',
      resizable: true
    });
    
    $('#filters a').click(function(){
      var selector = $(this).attr('data-filter');
      $container.isotope({ filter: selector });      
      return false;
    });
    
    $('#filters ul.nav-pills li a').click(function() {
      $('#filters ul.nav-pills li.active').removeClass('active');
      $(this).parent('li').addClass('active')
    });

  });

})(jQuery, Drupal);




//Google maps goodness
jQuery(window).load(function() {

  if (document.getElementById('map_canvas')) {
   
   // loading the theme settings for the google maps
   var gLatitude = Drupal.settings['settings']['google_latitude'];
   var gLongitude = Drupal.settings['settings']['google_longitude'];
   var gZoom = Drupal.settings['settings']['google_zoom'];
   var gTitle = Drupal.settings['settings']['google_title'];
   var gDescription = Drupal.settings['settings']['google_description'];
     
   var latlng = new google.maps.LatLng(gLatitude, gLongitude);
   
   var settings = {
     zoom: parseInt(gZoom),
     center: latlng,
     scrollwheel: false,
     mapTypeControl: true,
     mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
     navigationControl: true,
     navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
     mapTypeId: google.maps.MapTypeId.ROADMAP
   };
   
   var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
   
   var companyLogo = new google.maps.MarkerImage('/sites/all/themes/skeleton/img/google-maps/map-marker.png',
     new google.maps.Size(30,46),
     new google.maps.Point(0,0),
     new google.maps.Point(10,30)
   );
      
   var companyMarker = new google.maps.Marker({
     position: latlng,
          map: map,
         //XXX: Set custom icon here
         //icon: companyLogo,
        title: gTitle
   });
   
   var contentString = '<div id="content-map">'+
       '<h3 style="margin-top: 0px;">' + gTitle + '</h3>'+
       '<p>' + gDescription + '</p>'+
       '</div>';
   
   var infowindow = new google.maps.InfoWindow({
       content: contentString
   });
   
   google.maps.event.addListener(companyMarker, 'click', function() {
     infowindow.open(map,companyMarker);
   });
  
  }

});



//Features
(function ($, Drupal) {

  $(document).ready(function() {
    
    // Set the layout version
    var layout_version = Drupal.settings['settings']['layout_version'];
    
    if (layout_version == "boxed") {     
      $('body').addClass('boxed');
      $('#main-wrapper').addClass('boxed-version');
      $('#footer-wrapper').addClass('boxed-version');
    }
    
    $.setPagePosition();
    
    $("#myLoginModal").appendTo("body");

    // popovers
    $('.popovers').popover({
      container: 'body'
    });
    
    // tooltips
    $('.tooltips').tooltip({
      container: 'body'
    });
  
  });

})(jQuery, Drupal);

