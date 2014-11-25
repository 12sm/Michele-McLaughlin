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

  function setVars(){
    var mydiv = document.getElementById('alboom');
    var twurl = this.getAttribute("data-thefile");
    var squrl = "http://michelemclaughlin.com/media/" + twurl;
    playMusic();
  }
  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Roots = {
    // All pages
    common: {
      init: function() {
        var nav = location.href.toLowerCase();
        var item  = $('.store-nav li a[href="' + nav  + '"]');
        if(item.length){
          item.parent().addClass("current");
        }

        $('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
        $(".imgLiquidFill").imgLiquid();
        debugger;
        $('a.play').click(setVars);
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
        $('main').addClass('newbg');
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
    single_product: {
      init: function(){
        $('.add_to_cart_button').each(function(){
          text = $(this).html();
          $(this).html(function(){
            return '<i class="fa fa-shopping-cart"></i> ' + text;
          });
        });
      }
    },

    sheet_music: {
      init: function(){

        $('.search').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('#table-list tr').hide();
            $('#table-list tr').filter(function () {
              return rex.test($(this).text());
            }).show();

        });
      }
    },
     digital_songbooks: {
      init: function(){
        $('.search').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('#table-list tr').hide();
            $('#table-list tr').filter(function () {
              return rex.test($(this).text());
            }).show();

        });
      }
    },
    post_type_archive_albums: {
      init: function() {
        $('.play').on('click', playMusic);
        $('.see-live').removeClass('dont-see');
        $('.music-carousel').owlCarousel({
          itemsCustom : [
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
        $('.see-live').removeClass('dont-see');
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

  function InlinePlayer() {
    var self = this;
    var pl = this;
    var sm = soundManager; // soundManager instance
    var isIE = (navigator.userAgent.match(/msie/i));
    this.playableClass = 'inline-playable'; // CSS class for forcing a link to be playable (eg. doesn't have .MP3 in it)
    this.excludeClass = 'inline-exclude'; // CSS class for ignoring MP3 links
    this.links = [];
    this.sounds = [];
    this.soundsByURL = [];
    this.indexByURL = [];
    this.lastSound = null;
    this.soundCount = 0;

    this.config = {
      playNext: false, // stop after one sound, or play through list until end
      autoPlay: false  // start playing the first sound right away
    }

    this.css = {
      // CSS class names appended to link during various states
      sDefault: 'sm2_link', // default state
      sLoading: 'sm2_loading',
      sPlaying: 'sm2_playing',
      sPaused: 'sm2_paused'
    }

    this.addEventHandler = (typeof window.addEventListener !== 'undefined' ? function(o, evtName, evtHandler) {
      return o.addEventListener(evtName,evtHandler,false);
    } : function(o, evtName, evtHandler) {
      o.attachEvent('on'+evtName,evtHandler);
    });

    this.removeEventHandler = (typeof window.removeEventListener !== 'undefined' ? function(o, evtName, evtHandler) {
      return o.removeEventListener(evtName,evtHandler,false);
    } : function(o, evtName, evtHandler) {
      return o.detachEvent('on'+evtName,evtHandler);
    });

    this.classContains = function(o,cStr) {
  	return (typeof(o.className)!='undefined'?o.className.match(new RegExp('(\\s|^)'+cStr+'(\\s|$)')):false);
    }

    this.addClass = function(o,cStr) {
      if (!o || !cStr || self.classContains(o,cStr)) return false;
      o.className = (o.className?o.className+' ':'')+cStr;
    }

    this.removeClass = function(o,cStr) {
      if (!o || !cStr || !self.classContains(o,cStr)) return false;
      o.className = o.className.replace(new RegExp('( '+cStr+')|('+cStr+')','g'),'');
    }

    this.getSoundByURL = function(sURL) {
      return (typeof self.soundsByURL[sURL] != 'undefined'?self.soundsByURL[sURL]:null);
    }

    this.isChildOfNode = function(o,sNodeName) {
      if (!o || !o.parentNode) {
        return false;
      }
      sNodeName = sNodeName.toLowerCase();
      do {
        o = o.parentNode;
      } while (o && o.parentNode && o.nodeName.toLowerCase() != sNodeName);
      return (o.nodeName.toLowerCase() == sNodeName?o:null);
    }

    this.events = {

      // handlers for sound events as they're started/stopped/played

      play: function() {
        pl.removeClass(this._data.oLink,this._data.className);
        this._data.className = pl.css.sPlaying;
        pl.addClass(this._data.oLink,this._data.className);
      },

      stop: function() {
        pl.removeClass(this._data.oLink,this._data.className);
        this._data.className = '';
      },

      pause: function() {
        pl.removeClass(this._data.oLink,this._data.className);
        this._data.className = pl.css.sPaused;
        pl.addClass(this._data.oLink,this._data.className);
      },

      resume: function() {
        pl.removeClass(this._data.oLink,this._data.className);
        this._data.className = pl.css.sPlaying;
        pl.addClass(this._data.oLink,this._data.className);
      },

      finish: function() {
        pl.removeClass(this._data.oLink,this._data.className);
        this._data.className = '';
        if (pl.config.playNext) {
          var nextLink = (pl.indexByURL[this._data.oLink.href]+1);
          if (nextLink<pl.links.length) {
            pl.handleClick({'target':pl.links[nextLink]});
          }
        }
      }

    }

    this.stopEvent = function(e) {
     if (typeof e != 'undefined' && typeof e.preventDefault != 'undefined') {
        e.preventDefault();
      } else if (typeof event != 'undefined' && typeof event.returnValue != 'undefined') {
        event.returnValue = false;
      }
      return false;
    }

    this.getTheDamnLink = (isIE)?function(e) {
      // I really didn't want to have to do this.
      return (e && e.target?e.target:window.event.srcElement);
    }:function(e) {
      return e.target;
    }

    this.handleClick = function(e) {
      // a sound link was clicked
      if (typeof e.button != 'undefined' && e.button>1) {
        // ignore right-click
        return true;
      }
      var o = self.getTheDamnLink(e);
      if (o.nodeName.toLowerCase() != 'a') {
        o = self.isChildOfNode(o,'a');
        if (!o) return true;
      }
      var sURL = squrl;
      if (!squrl || (!sm.canPlayLink(o) && !self.classContains(o,self.playableClass)) || self.classContains(o,self.excludeClass)) {
        return true; // pass-thru for non-MP3/non-links
      }
      var soundURL = squrl;
      var thisSound = self.getSoundByURL(soundURL);
      if (thisSound) {
        // already exists
        if (thisSound == self.lastSound) {
          // and was playing (or paused)
          thisSound.togglePause();
        } else {
          // different sound
          sm._writeDebug('sound different than last sound: '+self.lastSound.id);
          if (self.lastSound) {
            self.stopSound(self.lastSound);
          }
          thisSound.togglePause(); // start playing current
        }
      } else {
        // stop last sound
        if (self.lastSound) {
          self.stopSound(self.lastSound);
        }
        // create sound
        thisSound = sm.createSound({
         id:'inlineMP3Sound'+(self.soundCount++),
         url:soundURL,
         onplay:self.events.play,
         onstop:self.events.stop,
         onpause:self.events.pause,
         onresume:self.events.resume,
         onfinish:self.events.finish,
         type:(o.type||null)
        });
        // tack on some custom data
        thisSound._data = {
          oLink: o, // DOM node for reference within SM2 object event handlers
          className: self.css.sPlaying
        };
        self.soundsByURL[soundURL] = thisSound;
        self.sounds.push(thisSound);
        thisSound.play();
      }

      self.lastSound = thisSound; // reference for next call

      if (typeof e != 'undefined' && typeof e.preventDefault != 'undefined') {
        e.preventDefault();
      } else {
        event.returnValue = false;
      }
      return false;
    }

    this.stopSound = function(oSound) {
      soundManager.stop(oSound.id);
      soundManager.unload(oSound.id);
    }

    this.init = function() {
      sm._writeDebug('inlinePlayer.init()');
      var oLinks = document.getElementsByTagName('a');
      // grab all links, look for .mp3
      var foundItems = 0;
      for (var i=0, j=oLinks.length; i<j; i++) {
        if ((sm.canPlayLink(oLinks[i]) || self.classContains(oLinks[i],self.playableClass)) && !self.classContains(oLinks[i],self.excludeClass)) {
          self.addClass(oLinks[i],self.css.sDefault); // add default CSS decoration
          self.links[foundItems] = (oLinks[i]);
          self.indexByURL[oLinks[i].thefile] = foundItems; // hack for indexing
          foundItems++;
        }
      }
      if (foundItems>0) {
        self.addEventHandler(document,'click',self.handleClick);
        if (self.config.autoPlay) {
          self.handleClick({target:self.links[0],preventDefault:function(){}});
        }
      }
      sm._writeDebug('inlinePlayer.init(): Found '+foundItems+' relevant items.');
    }

    this.init();

  }

  var inlinePlayer = null;

  soundManager.setup({
    // disable or enable debug output
    debugMode: true,
    // use HTML5 audio for MP3/MP4, if available
    preferFlash: false,
    useFlashBlock: true,
    // path to directory containing SM2 SWF
    url: '../../swf/',
    // optional: enable MPEG-4/AAC support (requires flash 9)
    flashVersion: 9
  });

  // ----

  soundManager.onready(function() {
    // soundManager.createSound() etc. may now be called
    inlinePlayer = new InlinePlayer();
  });

  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
