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
(function ($, Drupal, window, document, undefined) {
  
  //To understand behaviors, see https://drupal.org/node/756722#behaviors
  Drupal.behaviors.STARTERKIT = {
   attach: function(context, settings) {
  
     // Place your code here.

     $('.checkout-login').click(function() {

       $('#myLoginModal .alert-info').removeClass('hidden');
       
     })

   }
  };

})(jQuery, Drupal, this, this.document);



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
