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
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
      $.backstretch('../wp-content/themes/michele/assets/img/top-piano-bg.png');
      $(window).load(function() {
        $('.flexslider').flexslider();
      });
    }
  },
  // About us page, note the change from about-us to about_us.
  about: {
    init: function() {
      // JavaScript to be fired on the about us page
      soundManager.setup({
        // disable or enable debug output
        debugMode: true,
        // use HTML5 audio for MP3/MP4, if available
        preferFlash: false,
        useFlashBlock: true,
        // path to directory containing SM2 SWF
        url: ' ',
        // optional: enable MPEG-4/AAC support (requires flash 9)
        flashVersion: 9
      });
      soundManager.onready(function() {
        // soundManager.createSound() etc. may now be called
        inlinePlayer = new InlinePlayer();
      });
      $('.img-container').imgLiquid();
      $('.play').on('click', function(e){
        if (inlinePlayer) {
          inlinePlayer.events.finish = function() {
            // Remove Playing Class
            $('a.sm2_playing').removeClass('sm2_playing');
            // Blow away the last played track
            inlinePlayer.stopSound(inlinePlayer.lastSound);
          };
        }
      });
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
