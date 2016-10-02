/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

  // Contact Form Click Handlers
  jQuery(document).ready( function() {
    jQuery('.wpcf7-text').on( 'focusin', function() {
      var el = jQuery(this);
      var label = el.parents('p').find('label');
      jQuery(label).css("top", 40);
    });

    jQuery('.wpcf7-text').on( 'focusout', function() {
      var el = jQuery(this);
      if ( '' === el.val() ) {
        var label= el.parents('p').find('label');
        jQuery(label).css("top", 0);
      }
    });

    $('.practice-areas__nav--item').click(function() {
      var self = $(this);
      $('.practice-areas__nav--item').removeClass('practice-areas__nav--item-active');
      $('.practice-areas__section--active').fadeOut(400, function() {
        var title = self.data('title');
        $(this).removeClass('practice-areas__section--active');
        $('.practice-areas__section[data-title="' + title + '"]').fadeIn(400, function() {
          self.addClass('practice-areas__nav--item-active');
          $(this).addClass('practice-areas__section--active');
        });
      });
    });
  });
})(jQuery); // Fully reference jQuery after this point.
