/* ========================================================================
 * Tutorial specific Javascript
 * 
 * ========================================================================
 * Copyright 2015 Bootbites.com (unless otherwise stated)
 * For license information see: http://bootbites.com/license
 * ======================================================================== */

// Sticky navbar
// =========================

$(document).ready(function() {
  // Custom function which toggles between sticky class (is-sticky)
  var stickyToggle = function(sticky, stickyWrapper, scrollElement, navdrawer) {
    var stickyHeight = sticky.outerHeight();
    var stickyTop = stickyWrapper.offset().top;
    if (scrollElement.scrollTop() >= stickyTop-35){
      stickyWrapper.height(stickyHeight);
      sticky.addClass("is-sticky");
      navdrawer.addClass("nav-drawer-sticky");
    }
    else{
      sticky.removeClass("is-sticky");
      navdrawer.removeClass("nav-drawer-sticky");
      stickyWrapper.height('auto');
    }
  };
  
  // Find all data-toggle="sticky-onscroll" elements
  $('[data-toggle="sticky-onscroll"]').each(function() {
    var sticky = $(this);
    var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
    var navdrawer = $('#nav-drawer');
    sticky.before(stickyWrapper);
    sticky.addClass('sticky');
    
    // Scroll & resize events
    $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function() {
      stickyToggle(sticky, stickyWrapper, $(this), navdrawer);
    });
    
    // On page load
    stickyToggle(sticky, stickyWrapper, $(window), navdrawer);
  });
});