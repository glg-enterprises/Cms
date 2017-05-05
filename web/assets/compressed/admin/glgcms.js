/*
 * metismenu - v2.7.0
 * A jQuery menu plugin
 * https://github.com/onokumus/metismenu#readme
 *
 * Made by Osman Nuri Okumus <onokumus@gmail.com> (https://github.com/onokumus)
 * Under MIT License
 */

(function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define(['jquery'], factory);
  } else if (typeof exports !== "undefined") {
    factory(require('jquery'));
  } else {
    var mod = {
      exports: {}
    };
    factory(global.jquery);
    global.metisMenu = mod.exports;
  }
})(this, function (_jquery) {
  'use strict';

  var _jquery2 = _interopRequireDefault(_jquery);

  function _interopRequireDefault(obj) {
    return obj && obj.__esModule ? obj : {
      default: obj
    };
  }

  var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) {
    return typeof obj;
  } : function (obj) {
    return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
  };

  function _classCallCheck(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  }

  var Util = function ($) {
    var transition = false;

    var TransitionEndEvent = {
      WebkitTransition: 'webkitTransitionEnd',
      MozTransition: 'transitionend',
      OTransition: 'oTransitionEnd otransitionend',
      transition: 'transitionend'
    };

    function getSpecialTransitionEndEvent() {
      return {
        bindType: transition.end,
        delegateType: transition.end,
        handle: function handle(event) {
          if ($(event.target).is(this)) {
            return event.handleObj.handler.apply(this, arguments);
          }
          return undefined;
        }
      };
    }

    function transitionEndTest() {
      if (window.QUnit) {
        return false;
      }

      var el = document.createElement('mm');

      for (var name in TransitionEndEvent) {
        if (el.style[name] !== undefined) {
          return {
            end: TransitionEndEvent[name]
          };
        }
      }

      return false;
    }

    function transitionEndEmulator(duration) {
      var _this2 = this;

      var called = false;

      $(this).one(Util.TRANSITION_END, function () {
        called = true;
      });

      setTimeout(function () {
        if (!called) {
          Util.triggerTransitionEnd(_this2);
        }
      }, duration);

      return this;
    }

    function setTransitionEndSupport() {
      transition = transitionEndTest();
      $.fn.emulateTransitionEnd = transitionEndEmulator;

      if (Util.supportsTransitionEnd()) {
        $.event.special[Util.TRANSITION_END] = getSpecialTransitionEndEvent();
      }
    }

    var Util = {
      TRANSITION_END: 'mmTransitionEnd',

      triggerTransitionEnd: function triggerTransitionEnd(element) {
        $(element).trigger(transition.end);
      },
      supportsTransitionEnd: function supportsTransitionEnd() {
        return Boolean(transition);
      }
    };

    setTransitionEndSupport();

    return Util;
  }(jQuery);

  var MetisMenu = function ($) {

    var NAME = 'metisMenu';
    var DATA_KEY = 'metisMenu';
    var EVENT_KEY = '.' + DATA_KEY;
    var DATA_API_KEY = '.data-api';
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var TRANSITION_DURATION = 350;

    var Default = {
      toggle: true,
      preventDefault: true,
      activeClass: 'active',
      collapseClass: 'collapse',
      collapseInClass: 'in',
      collapsingClass: 'collapsing',
      triggerElement: 'a',
      parentTrigger: 'li',
      subMenu: 'ul'
    };

    var Event = {
      SHOW: 'show' + EVENT_KEY,
      SHOWN: 'shown' + EVENT_KEY,
      HIDE: 'hide' + EVENT_KEY,
      HIDDEN: 'hidden' + EVENT_KEY,
      CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY
    };

    var MetisMenu = function () {
      function MetisMenu(element, config) {
        _classCallCheck(this, MetisMenu);

        this._element = element;
        this._config = this._getConfig(config);
        this._transitioning = null;

        this.init();
      }

      MetisMenu.prototype.init = function init() {
        var self = this;
        $(this._element).find(this._config.parentTrigger + '.' + this._config.activeClass).has(this._config.subMenu).children(this._config.subMenu).attr('aria-expanded', true).addClass(this._config.collapseClass + ' ' + this._config.collapseInClass);

        $(this._element).find(this._config.parentTrigger).not('.' + this._config.activeClass).has(this._config.subMenu).children(this._config.subMenu).attr('aria-expanded', false).addClass(this._config.collapseClass);

        $(this._element).find(this._config.parentTrigger).has(this._config.subMenu).children(this._config.triggerElement).on(Event.CLICK_DATA_API, function (e) {
          var _this = $(this);
          var _parent = _this.parent(self._config.parentTrigger);
          var _siblings = _parent.siblings(self._config.parentTrigger).children(self._config.triggerElement);
          var _list = _parent.children(self._config.subMenu);
          if (self._config.preventDefault) {
            e.preventDefault();
          }
          if (_this.attr('aria-disabled') === 'true') {
            return;
          }
          if (_parent.hasClass(self._config.activeClass)) {
            _this.attr('aria-expanded', false);
            self._hide(_list);
          } else {
            self._show(_list);
            _this.attr('aria-expanded', true);
            if (self._config.toggle) {
              _siblings.attr('aria-expanded', false);
            }
          }

          if (self._config.onTransitionStart) {
            self._config.onTransitionStart(e);
          }
        });
      };

      MetisMenu.prototype._show = function _show(element) {
        if (this._transitioning || $(element).hasClass(this._config.collapsingClass)) {
          return;
        }
        var _this = this;
        var _el = $(element);

        var startEvent = $.Event(Event.SHOW);
        _el.trigger(startEvent);

        if (startEvent.isDefaultPrevented()) {
          return;
        }

        _el.parent(this._config.parentTrigger).addClass(this._config.activeClass);

        if (this._config.toggle) {
          this._hide(_el.parent(this._config.parentTrigger).siblings().children(this._config.subMenu + '.' + this._config.collapseInClass).attr('aria-expanded', false));
        }

        _el.removeClass(this._config.collapseClass).addClass(this._config.collapsingClass).height(0);

        this.setTransitioning(true);

        var complete = function complete() {

          _el.removeClass(_this._config.collapsingClass).addClass(_this._config.collapseClass + ' ' + _this._config.collapseInClass).height('').attr('aria-expanded', true);

          _this.setTransitioning(false);

          _el.trigger(Event.SHOWN);
        };

        if (!Util.supportsTransitionEnd()) {
          complete();
          return;
        }

        _el.height(_el[0].scrollHeight).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
      };

      MetisMenu.prototype._hide = function _hide(element) {

        if (this._transitioning || !$(element).hasClass(this._config.collapseInClass)) {
          return;
        }
        var _this = this;
        var _el = $(element);

        var startEvent = $.Event(Event.HIDE);
        _el.trigger(startEvent);

        if (startEvent.isDefaultPrevented()) {
          return;
        }

        _el.parent(this._config.parentTrigger).removeClass(this._config.activeClass);
        _el.height(_el.height())[0].offsetHeight;

        _el.addClass(this._config.collapsingClass).removeClass(this._config.collapseClass).removeClass(this._config.collapseInClass);

        this.setTransitioning(true);

        var complete = function complete() {
          if (_this._transitioning && _this._config.onTransitionEnd) {
            _this._config.onTransitionEnd();
          }

          _this.setTransitioning(false);
          _el.trigger(Event.HIDDEN);

          _el.removeClass(_this._config.collapsingClass).addClass(_this._config.collapseClass).attr('aria-expanded', false);
        };

        if (!Util.supportsTransitionEnd()) {
          complete();
          return;
        }

        _el.height() == 0 || _el.css('display') == 'none' ? complete() : _el.height(0).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
      };

      MetisMenu.prototype.setTransitioning = function setTransitioning(isTransitioning) {
        this._transitioning = isTransitioning;
      };

      MetisMenu.prototype.dispose = function dispose() {
        $.removeData(this._element, DATA_KEY);

        $(this._element).find(this._config.parentTrigger).has(this._config.subMenu).children(this._config.triggerElement).off('click');

        this._transitioning = null;
        this._config = null;
        this._element = null;
      };

      MetisMenu.prototype._getConfig = function _getConfig(config) {
        config = $.extend({}, Default, config);
        return config;
      };

      MetisMenu._jQueryInterface = function _jQueryInterface(config) {
        return this.each(function () {
          var $this = $(this);
          var data = $this.data(DATA_KEY);
          var _config = $.extend({}, Default, $this.data(), (typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object' && config);

          if (!data && /dispose/.test(config)) {
            this.dispose();
          }

          if (!data) {
            data = new MetisMenu(this, _config);
            $this.data(DATA_KEY, data);
          }

          if (typeof config === 'string') {
            if (data[config] === undefined) {
              throw new Error('No method named "' + config + '"');
            }
            data[config]();
          }
        });
      };

      return MetisMenu;
    }();

    /**
     * ------------------------------------------------------------------------
     * jQuery
     * ------------------------------------------------------------------------
     */

    $.fn[NAME] = MetisMenu._jQueryInterface;
    $.fn[NAME].Constructor = MetisMenu;
    $.fn[NAME].noConflict = function () {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return MetisMenu._jQueryInterface;
    };
    return MetisMenu;
  }(jQuery);
});

/**
 * onoffcanvas - A jQuery offcanvas plugin
 * @version v1.1.2
 * @link https://github.com/onokumus/onoffcanvas#readme
 * @license MIT
 */
(function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define(['jquery'], factory);
  } else if (typeof exports !== "undefined") {
    factory(require('jquery'));
  } else {
    var mod = {
      exports: {}
    };
    factory(global.jquery);
    global.onoffcanvas = mod.exports;
  }
})(this, function (_jquery) {
  'use strict';

  var _jquery2 = _interopRequireDefault(_jquery);

  function _interopRequireDefault(obj) {
    return obj && obj.__esModule ? obj : {
      default: obj
    };
  }

  var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) {
    return typeof obj;
  } : function (obj) {
    return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
  };

  (function ($) {
    var OnoffCanvas = function OnoffCanvas(element, options) {
      this.$element = $(element);
      this.options = $.extend({}, OnoffCanvas.DEFAULTS, options);
      this.$trigger = $('[data-toggle="onoffcanvas"][href="#' + element.id + '"],[data-toggle="onoffcanvas"][data-target="#' + element.id + '"]');

      this.addAriaCollapsedClass(this.$element, this.$trigger);
    };

    OnoffCanvas.DEFAULTS = {
      toggle: true
    };

    OnoffCanvas.prototype.show = function () {
      var openClass = 'is-open';

      if (this.$element.hasClass(openClass)) {
        return;
      }

      this.$element.addClass(openClass).attr('aria-expanded', true);

      this.$trigger.attr('aria-expanded', true);
    };

    OnoffCanvas.prototype.hide = function () {
      var openClass = 'is-open';

      if (!this.$element.hasClass(openClass)) {
        return;
      }

      this.$element.removeClass(openClass).attr('aria-expanded', false);

      this.$trigger.attr('aria-expanded', false);
    };

    OnoffCanvas.prototype.toggle = function () {
      var openClass = 'is-open';
      this[this.$element.hasClass(openClass) ? 'hide' : 'show']();
    };

    function getTargetFromTrigger($trigger) {
      var href = void 0;
      var target = $trigger.attr('data-target') || (href = $trigger.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '');

      return $(target);
    }

    OnoffCanvas.prototype.getParent = function () {
      return $(this.options.parent).find('[data-toggle="onoffcanvas"][data-parent="' + this.options.parent + '"]').each($.proxy(function (i, element) {
        var $element = $(element);
        this.addAriaAndCollapsedClass(getTargetFromTrigger($element), $element);
      }, this)).end();
    };

    OnoffCanvas.prototype.addAriaCollapsedClass = function ($element, $trigger) {
      var openClass = 'is-open';
      var isOpen = $element.hasClass(openClass);

      $trigger.attr('aria-expanded', !isOpen);
      $element.toggleClass(openClass, !isOpen).attr('aria-expanded', !isOpen);
    };

    function Plugin(option) {
      return this.each(function () {
        var $this = $(this);
        var data = $this.data('onoffcanvas');
        var options = $.extend({}, OnoffCanvas.DEFAULTS, $this.data(), (typeof option === 'undefined' ? 'undefined' : _typeof(option)) === 'object' && option);

        if (!data && options.toggle && /show|hide/.test(option)) {
          options.toggle = false;
        }
        if (!data) {
          $this.data('onoffcanvas', data = new OnoffCanvas(this, options));
        }
        if (typeof option === 'string') {
          data[option]();
        }
      });
    }

    var old = $.fn.onoffcanvas;

    $.fn.onoffcanvas = Plugin;
    $.fn.onoffcanvas.Constructor = OnoffCanvas;

    // CANVAS NO CONFLICT
    // ====================

    $.fn.onoffcanvas.noConflict = function () {
      $.fn.onoffcanvas = old;
      return this;
    };

    $(document).on('click.onoffcanvas.data-api', '[data-toggle="onoffcanvas"]', function (e) {
      var $this = $(this);

      if (!$this.attr('data-target')) {
        e.preventDefault();
      }

      var $target = getTargetFromTrigger($this);
      var data = $target.data('onoffcanvas');
      var option = data ? 'toggle' : $this.data();

      Plugin.call($target, option);
    });
  })(jQuery);
});
/*!
* screenfull
* v3.2.0 - 2017-04-16
* (c) Sindre Sorhus; MIT License
*/
(function () {
	'use strict';

	var document = typeof window === 'undefined' ? {} : window.document;
	var isCommonjs = typeof module !== 'undefined' && module.exports;
	var keyboardAllowed = typeof Element !== 'undefined' && 'ALLOW_KEYBOARD_INPUT' in Element;

	var fn = (function () {
		var val;

		var fnMap = [
			[
				'requestFullscreen',
				'exitFullscreen',
				'fullscreenElement',
				'fullscreenEnabled',
				'fullscreenchange',
				'fullscreenerror'
			],
			// New WebKit
			[
				'webkitRequestFullscreen',
				'webkitExitFullscreen',
				'webkitFullscreenElement',
				'webkitFullscreenEnabled',
				'webkitfullscreenchange',
				'webkitfullscreenerror'

			],
			// Old WebKit (Safari 5.1)
			[
				'webkitRequestFullScreen',
				'webkitCancelFullScreen',
				'webkitCurrentFullScreenElement',
				'webkitCancelFullScreen',
				'webkitfullscreenchange',
				'webkitfullscreenerror'

			],
			[
				'mozRequestFullScreen',
				'mozCancelFullScreen',
				'mozFullScreenElement',
				'mozFullScreenEnabled',
				'mozfullscreenchange',
				'mozfullscreenerror'
			],
			[
				'msRequestFullscreen',
				'msExitFullscreen',
				'msFullscreenElement',
				'msFullscreenEnabled',
				'MSFullscreenChange',
				'MSFullscreenError'
			]
		];

		var i = 0;
		var l = fnMap.length;
		var ret = {};

		for (; i < l; i++) {
			val = fnMap[i];
			if (val && val[1] in document) {
				for (i = 0; i < val.length; i++) {
					ret[fnMap[0][i]] = val[i];
				}
				return ret;
			}
		}

		return false;
	})();

	var screenfull = {
		request: function (elem) {
			var request = fn.requestFullscreen;

			elem = elem || document.documentElement;

			// Work around Safari 5.1 bug: reports support for
			// keyboard in fullscreen even though it doesn't.
			// Browser sniffing, since the alternative with
			// setTimeout is even worse.
			if (/5\.1[.\d]* Safari/.test(navigator.userAgent)) {
				elem[request]();
			} else {
				elem[request](keyboardAllowed && Element.ALLOW_KEYBOARD_INPUT);
			}
		},
		exit: function () {
			document[fn.exitFullscreen]();
		},
		toggle: function (elem) {
			if (this.isFullscreen) {
				this.exit();
			} else {
				this.request(elem);
			}
		},
		onchange: function (callback) {
			document.addEventListener(fn.fullscreenchange, callback, false);
		},
		onerror: function (callback) {
			document.addEventListener(fn.fullscreenerror, callback, false);
		},
		raw: fn
	};

	if (!fn) {
		if (isCommonjs) {
			module.exports = false;
		} else {
			window.screenfull = false;
		}

		return;
	}

	Object.defineProperties(screenfull, {
		isFullscreen: {
			get: function () {
				return Boolean(document[fn.fullscreenElement]);
			}
		},
		element: {
			enumerable: true,
			get: function () {
				return document[fn.fullscreenElement];
			}
		},
		enabled: {
			enumerable: true,
			get: function () {
				// Coerce to boolean in case of old WebKit
				return Boolean(document[fn.fullscreenEnabled]);
			}
		}
	});

	if (isCommonjs) {
		module.exports = screenfull;
	} else {
		window.screenfull = screenfull;
	}
})();

/**
 * bootstrap-admin-template - Free Admin Template Based On Twitter Bootstrap 3.x
 * @version 2.4.2
 * @license MIT
 * @link https://github.com/puikinsh/Bootstrap-Admin-Template
 */
'use strict';

;(function (window) {
    var
    // Are we expecting a touch or a click?
    buttonPressedEvent = 'touchstart click',
        Metis = function Metis() {
        this.init();
    };

    // Initialization method
    Metis.prototype.init = function () {
        this.buttonPressedEvent = buttonPressedEvent;
    };

    Metis.prototype.getViewportHeight = function () {

        var docElement = document.documentElement,
            client = docElement.clientHeight,
            inner = window.innerHeight;

        if (client < inner) return inner;else return client;
    };

    Metis.prototype.getViewportWidth = function () {

        var docElement = document.documentElement,
            client = docElement.clientWidth,
            inner = window.innerWidth;

        if (client < inner) return inner;else return client;
    };

    // Creates a Metis object.
    window.Metis = new Metis();
})(window);
'use strict';

;(function ($) {
    "use strict";

    var $navBar = $('nav.navbar'),
        $body = $('body'),
        $menu = $('#menu'),
        $left = $('#left');

    function addPaddingTop(el, val) {
        el.css('padding-top', val);
    }
    function removePaddingTop(el) {
        el.css('padding-top', 'inherit');
    }
    function getHeight(el) {
        return el.outerHeight();
    }

    function init() {
        var isFixedNav = $navBar.hasClass('navbar-fixed-top');
        var bodyPadTop = isFixedNav ? $navBar.outerHeight(true) : 0;

        $body.css('padding-top', bodyPadTop);

        if ($body.hasClass('menu-affix')) {
            $left.css({
                top: bodyPadTop
            });
            console.log($navBar.outerHeight(true));
        }
    }

    Metis.navBar = function () {
        var resizeTimer;
        init();
        $(window).resize(function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(init(), 250);
        });
    };
    return Metis;
})(jQuery);
'use strict';

;(function ($, Metis) {
  "use strict";
  // Define toggleFullScreen

  Metis.toggleFullScreen = function () {
    if (window.screenfull !== undefined && screenfull.enabled) {
      $('#toggleFullScreen').on(Metis.buttonPressedEvent, function (e) {
        screenfull.toggle(window.document[0]);
        $('body').toggleClass('fullScreen');
        e.preventDefault();
      });
    } else {
      $('#toggleFullScreen').addClass('hidden');
    }
  };
  // Define boxFullScreen
  Metis.boxFullScreen = function () {
    if (window.screenfull !== undefined && screenfull.enabled) {
      $('.full-box').on(Metis.buttonPressedEvent, function (e) {
        var $toggledPanel = $(this).parents('.box')[0];
        screenfull.toggle($toggledPanel);
        $(this).parents('.box').toggleClass('full-screen-box');
        $(this).parents('.box').children('.body').toggleClass('full-screen-box');
        $(this).children('i').toggleClass('fa-compress');
        e.preventDefault();
      });
    } else {
      $('.full-box').addClass('hidden');
    }
  };
  Metis.panelBodyCollapse = function () {
    var $collapseButton = $('.collapse-box'),
        $collapsedPanelBody = $collapseButton.closest('.box').children('.body');

    $collapsedPanelBody.collapse('show');

    $collapseButton.on(Metis.buttonPressedEvent, function (e) {
      var $collapsePanelBody = $(this).closest('.box').children('.body'),
          $toggleButtonImage = $(this).children('i');
      $collapsePanelBody.on('show.bs.collapse', function () {
        $toggleButtonImage.removeClass('fa-minus fa-plus').addClass('fa-spinner fa-spin');
      });
      $collapsePanelBody.on('shown.bs.collapse', function () {
        $toggleButtonImage.removeClass('fa-spinner fa-spin').addClass('fa-minus');
      });

      $collapsePanelBody.on('hide.bs.collapse', function () {
        $toggleButtonImage.removeClass('fa-minus fa-plus').addClass('fa-spinner fa-spin');
      });

      $collapsePanelBody.on('hidden.bs.collapse', function () {
        $toggleButtonImage.removeClass('fa-spinner fa-spin').addClass('fa-plus');
      });

      $collapsePanelBody.collapse('toggle');

      e.preventDefault();
    });
  };
  Metis.boxHiding = function () {
    $('.close-box').on(Metis.buttonPressedEvent, function () {
      $(this).closest('.box').hide('slow');
    });
  };
  return Metis;
})(jQuery, Metis || {});
'use strict';

;(function ($, Metis) {
    var $body = $('body'),
        $leftToggle = $('.toggle-left'),
        $count = 0;

    Metis.metisAnimatePanel = function () {

        if ($('#left').length) {
            $leftToggle.on(Metis.buttonPressedEvent, function (e) {

                if ($(window).width() < 768) {
                    $body.toggleClass('sidebar-left-opened');
                } else {
                    switch (true) {
                       
                        case $body.hasClass("sidebar-left-mini"):
                            $body.removeClass("sidebar-left-mini");
                            break;
                        default:
                            $body.addClass("sidebar-left-mini");
                    }

                    e.preventDefault();
                }
            });
        } else {
            $leftToggle.addClass('hidden');
        }
    };
    return Metis;
})(jQuery, Metis || {});
'use strict';

;(function ($) {
   $(document).ready(function () {

      $('[data-toggle="tooltip"]').tooltip();

      $('#menu').metisMenu();
      Metis.navBar();
      Metis.metisAnimatePanel();
      Metis.toggleFullScreen();
      Metis.boxFullScreen();
      Metis.panelBodyCollapse();
      Metis.boxHiding();
   });
})(jQuery);