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

  function playMusic(){
    if (inlinePlayer) {
      inlinePlayer.events.finish = function() {
        // Remove Playing Class
        $('a.sm2_playing').removeClass('sm2_playing');
        // Blow away the last played track
        inlinePlayer.stopSound(inlinePlayer.lastSound);
      };
    }
  }
  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Roots = {
    // All pages
    common: {
      init: function() {
        $(".imgLiquidFill").imgLiquid();
        soundManager.setup({
          debugMode     : true,
          preferFlash   : false,
          useFlashBlock : true,
          url           : ' ',
          onready       : function(){
            inlinePlayer = new InlinePlayer();
            $(".progBar").css('width', ((this.position/this.duration) * 100) + '%');}
        });
      }
    },
    concerts: {
      init: function() {
        $('.see-book').removeClass('dont-see');
        // JavaScript to be fired on all pages
      }
    },
    home: {
      init: function() {
        $.backstretch('../wp-content/themes/michele/assets/img/top-piano-bg.png');
        $(window).load(function() {
          $('.flexslider').flexslider();
        });
        $('.play').on('click', playMusic);
      }
    },
    post_type_archive_product: {
      init: function() {

        //wrap woocommerce images in relevant <a/> tags
        $(".sheet-img").each(function() {
          var $this = $(this);
          var child = $(this).children('img');
          var src = child.attr('src');
          child.addClass('image');
          var a = $('<a class="colorbox"></a>').attr('href', src);
          $this.wrap(a);
        });

        //Adds Cart icon to buttons
        $('.add_to_cart_button').each(function(){
          text = $(this).html();
          $(this).html(function(){
            return '<i class="fa fa-shopping-cart"></i> ' + text;
          });
        });
        function prodLiquid(){
          $('.sheet-img').imgLiquid({
            verticalAlign: 'top'
          });
          $('.sheet-album').imgLiquid();
        }
        prodLiquid();
      }
    },
    sheet_music: {
      init: function(){
        console.log('sheet-music');
        var fuzzyOptions = {
          searchClass: "fuzzy-search",
          location: 0,
          distance: 100,
          threshold: 0.4,
            multiSearch: true
        };

        var options = {
          valueNames: [ 'title', 'type', 'key', 'level' ],
           plugins: [
            [  ListFuzzySearch() ]
          ]
        };
        debugger;
        var hackerList = new List('sort-list', options);
      }
    },
    post_type_archive_albums: {
      init: function() {
        $('.play').on('click', playMusic);
        $('.see-live').removeClass('dont-see');
        $('.music-carousel').owlCarousel({
          itemsCustom    : [
            [0, 2],
            [480, 3],
            [768, 4],
            [1200, 4],
            [1600, 4]
          ],
          navigation     : true,
          navigationText : ['<i class="fa fa-arrow-circle-left fa-3x"></i>','<i class="fa fa-arrow-circle-right fa-3x"></i>'],
          pagination     : false,
          scrollPerPage  : true
        });
      }
    },
    single_albums: {
      init: function(){
        console.log('single albums');
        $('.play').on('click', playMusic);
        $('.music-carousel').owlCarousel({
          itemsCustom : [
          [0, 2],
          [480, 3],
          [768, 4],
          [1200, 4],
          [1600, 4]
          ],
          navigation : true,
          navigationText: ['<i class="fa fa-arrow-circle-left fa-3x"></i>','<i class="fa fa-arrow-circle-right fa-3x"></i>'],
          pagination: false,
          scrollPerPage : true
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
