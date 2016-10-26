function getThemeColorFromCss(n){var t=$("<span><\/span>").hide().appendTo("body"),i;return t.addClass(n),i=t.css("color"),t.remove(),i}function InitiateSideMenu(){$(".sidebar-toggler").on("click",function(){return $("#sidebar").toggleClass("hide"),$(".sidebar-toggler").toggleClass("active"),!1});var n=$("#sidebar").hasClass("menu-compact");$("#sidebar-collapse").on("click",function(){$("#sidebar").is(":visible")||$("#sidebar").toggleClass("hide");$("#sidebar").toggleClass("menu-compact");$(".sidebar-collapse").toggleClass("active");n=$("#sidebar").hasClass("menu-compact");n&&$(".open > .submenu").removeClass("open")});$(".sidebar-menu").on("click",function(t){var i=$(t.target).closest("a"),u,r,f;if(i&&i.length!=0){if(!i.hasClass("menu-dropdown"))return n&&i.get(0).parentNode.parentNode==this&&(u=i.find(".menu-text").get(0),t.target!=u&&!$.contains(u,t.target))?!1:void 0;if(r=i.next().get(0),!$(r).is(":visible")){if(f=$(r.parentNode).closest("ul"),n&&f.hasClass("sidebar-menu"))return;f.find("> .open > .submenu").each(function(){this==r||$(this.parentNode).hasClass("active")||$(this).slideUp(200).parent().removeClass("open")})}return n&&$(r.parentNode.parentNode).hasClass("sidebar-menu")?!1:($(r).slideToggle(200).parent().toggleClass("open"),!1)}})}function InitiateWidgets(){$('.widget-buttons *[data-toggle="maximize"]').on("click",function(n){n.preventDefault();var t=$(this).parents(".widget").eq(0),i=$(this).find("i").eq(0),r="fa-compress",u="fa-expand";t.hasClass("maximized")?(i&&i.addClass(u).removeClass(r),t.removeClass("maximized"),t.find(".widget-body").css("height","auto")):(i&&i.addClass(r).removeClass(u),t.addClass("maximized"),maximize(t))});$('.widget-buttons *[data-toggle="collapse"]').on("click",function(n){n.preventDefault();var t=$(this).parents(".widget").eq(0),r=t.find(".widget-body"),i=$(this).find("i"),u="fa-plus",f="fa-minus",e=300;t.hasClass("collapsed")?(i&&i.addClass(f).removeClass(u),t.removeClass("collapsed"),r.slideUp(0,function(){r.slideDown(e)})):(i&&i.addClass(u).removeClass(f),r.slideUp(200,function(){t.addClass("collapsed")}))});$('.widget-buttons *[data-toggle="dispose"]').on("click",function(n){n.preventDefault();var i=$(this),t=i.parents(".widget").eq(0);t.hide(300,function(){t.remove()})})}function maximize(n){if(n){var t=$(window).height(),i=n.find(".widget-header").height();n.find(".widget-body").height(t-i)}}function scrollTo(n,t){var i=n&&n.size()>0?n.offset().top:0;jQuery("html,body").animate({scrollTop:i+(t?t:0)},"slow")}function Notify(n,t,i,r,u,f){toastr.options.positionClass="toast-"+t;toastr.options.extendedTimeOut=0;toastr.options.timeOut=i;toastr.options.closeButton=f;toastr.options.iconClass=u+" toast-"+r;toastr.custom(n)}function InitiateSettings(){readCookie("navbar-fixed-top")!=null&&readCookie("navbar-fixed-top")=="true"&&($("#checkbox_fixednavbar").prop("checked",!0),$(".navbar").addClass("navbar-fixed-top"));readCookie("sidebar-fixed")!=null&&readCookie("sidebar-fixed")=="true"&&($("#checkbox_fixedsidebar").prop("checked",!0),$(".page-sidebar").addClass("sidebar-fixed"));readCookie("breadcrumbs-fixed")!=null&&readCookie("breadcrumbs-fixed")=="true"&&($("#checkbox_fixedbreadcrumbs").prop("checked",!0),$(".page-breadcrumbs").addClass("breadcrumbs-fixed"));readCookie("page-header-fixed")!=null&&readCookie("page-header-fixed")=="true"&&($("#checkbox_fixedheader").prop("checked",!0),$(".page-header").addClass("page-header-fixed"));$("#checkbox_fixednavbar").change(function(){$(".navbar").toggleClass("navbar-fixed-top");$("#checkbox_fixedsidebar").is(":checked")&&($("#checkbox_fixedsidebar").prop("checked",!1),$(".page-sidebar").toggleClass("sidebar-fixed"));$("#checkbox_fixedbreadcrumbs").is(":checked")&&!$(this).is(":checked")&&($("#checkbox_fixedbreadcrumbs").prop("checked",!1),$(".page-breadcrumbs").toggleClass("breadcrumbs-fixed"));$("#checkbox_fixedheader").is(":checked")&&!$(this).is(":checked")&&($("#checkbox_fixedheader").prop("checked",!1),$(".page-header").toggleClass("page-header-fixed"));setCookiesForFixedSettings()});$("#checkbox_fixedsidebar").change(function(){$(".page-sidebar").toggleClass("sidebar-fixed");$("#checkbox_fixednavbar").is(":checked")||($("#checkbox_fixednavbar").prop("checked",!0),$(".navbar").toggleClass("navbar-fixed-top"));$("#checkbox_fixedbreadcrumbs").is(":checked")&&!$(this).is(":checked")&&($("#checkbox_fixedbreadcrumbs").prop("checked",!1),$(".page-breadcrumbs").toggleClass("breadcrumbs-fixed"));$("#checkbox_fixedheader").is(":checked")&&!$(this).is(":checked")&&($("#checkbox_fixedheader").prop("checked",!1),$(".page-header").toggleClass("page-header-fixed"));setCookiesForFixedSettings()});$("#checkbox_fixedbreadcrumbs").change(function(){$(".page-breadcrumbs").toggleClass("breadcrumbs-fixed");$("#checkbox_fixedsidebar").is(":checked")||($("#checkbox_fixedsidebar").prop("checked",!0),$(".page-sidebar").toggleClass("sidebar-fixed"));$("#checkbox_fixednavbar").is(":checked")||($("#checkbox_fixednavbar").prop("checked",!0),$(".navbar").toggleClass("navbar-fixed-top"));$("#checkbox_fixedheader").is(":checked")&&!$(this).is(":checked")&&($("#checkbox_fixedheader").prop("checked",!1),$(".page-header").toggleClass("page-header-fixed"));setCookiesForFixedSettings()});$("#checkbox_fixedheader").change(function(){$(".page-header").toggleClass("page-header-fixed");$("#checkbox_fixedbreadcrumbs").is(":checked")||($("#checkbox_fixedbreadcrumbs").prop("checked",!0),$(".page-breadcrumbs").toggleClass("breadcrumbs-fixed"));$("#checkbox_fixedsidebar").is(":checked")||($("#checkbox_fixedsidebar").prop("checked",!0),$(".page-sidebar").toggleClass("sidebar-fixed"));$("#checkbox_fixednavbar").is(":checked")||($("#checkbox_fixednavbar").prop("checked",!0),$(".navbar").toggleClass("navbar-fixed-top"));setCookiesForFixedSettings()})}function setCookiesForFixedSettings(){createCookie("navbar-fixed-top",$("#checkbox_fixednavbar").is(":checked"),100);createCookie("sidebar-fixed",$("#checkbox_fixedsidebar").is(":checked"),100);createCookie("breadcrumbs-fixed",$("#checkbox_fixedbreadcrumbs").is(":checked"),100);createCookie("page-header-fixed",$("#checkbox_fixedheader").is(":checked"),100)}function getcolor(n){switch(n){case"themeprimary":return themeprimary;case"themesecondary":return themesecondary;case"themethirdcolor":return themethirdcolor;case"themefourthcolor":return themefourthcolor;case"themefifthcolor":return themefifthcolor;default:return n}}function switchClasses(n,t){var u=document.getElementsByClassName(n),r;for(i=u.length-1;i>=0;i--)hasClass(u[i],"dropdown-menu")||(addClass(u[i],n+"-temp"),removeClass(u[i],n));for(r=document.getElementsByClassName(t),i=r.length-1;i>=0;i--)hasClass(r[i],"dropdown-menu")||(addClass(r[i],n),removeClass(r[i],t));for(tempClasses=document.getElementsByClassName(n+"-temp"),i=tempClasses.length-1;i>=0;i--)hasClass(tempClasses[i],"dropdown-menu")||(addClass(tempClasses[i],t),removeClass(tempClasses[i],n+"-temp"))}function addClass(n,t){var i=n.className;i&&(i+=" ");n.className=i+t}function removeClass(n,t){var i=" "+n.className+" ";n.className=i.replace(" "+t,"").replace(/^\s+/g,"").replace(/\s+$/g,"")}function hasClass(n,t){var i=" "+n.className+" ",r=" "+t+" ";return i.indexOf(r)!=-1}var themeprimary=getThemeColorFromCss("themeprimary"),themesecondary=getThemeColorFromCss("themesecondary"),themethirdcolor=getThemeColorFromCss("themethirdcolor"),themefourthcolor=getThemeColorFromCss("themefourthcolor"),themefifthcolor=getThemeColorFromCss("themefifthcolor"),rtlchanger,popovers,hoverpopovers;$("#skin-changer li a").click(function(){createCookie("current-skin",$(this).attr("rel"),10);window.location.reload()});rtlchanger=document.getElementById("rtl-changer");location.pathname!="/index-rtl-fa.html"&&location.pathname!="/index-rtl-ar.html"&&(readCookie("rtl-support")?(switchClasses("pull-right","pull-left"),switchClasses("databox-right","databox-left"),switchClasses("item-right","item-left"),$(".navbar-brand small img").attr("src","assets/img/logo-rtl.png"),rtlchanger!=null&&(document.getElementById("rtl-changer").checked=!0)):rtlchanger!=null&&(rtlchanger.checked=!1),rtlchanger!=null&&(rtlchanger.onchange=function(){this.checked?createCookie("rtl-support","true",10):eraseCookie("rtl-support");setTimeout(function(){window.location.reload()},600)}));$(window).load(function(){$(".loading-container").addClass("loading-inactive");setTimeout(function(){$(".loading-container").hide(300)},1500)});$("#btn-setting").on("click",function(){$(".navbar-account").toggleClass("setting-open")});$("#fullscreen-toggler").on("click",function(){var n=document.documentElement;$("body").hasClass("full-screen")?($("body").removeClass("full-screen"),$("#fullscreen-toggler").removeClass("active"),document.exitFullscreen?document.exitFullscreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitExitFullscreen&&document.webkitExitFullscreen()):($("body").addClass("full-screen"),$("#fullscreen-toggler").addClass("active"),n.requestFullscreen?n.requestFullscreen():n.mozRequestFullScreen?n.mozRequestFullScreen():n.webkitRequestFullscreen?n.webkitRequestFullscreen():n.msRequestFullscreen&&n.msRequestFullscreen())});popovers=$("[data-toggle=popover]");$.each(popovers,function(){$(this).popover({html:!0,template:'<div class="popover '+$(this).data("class")+'"><div class="arrow"><\/div><h3 class="popover-title '+$(this).data("titleclass")+'">Popover right<\/h3><div class="popover-content"><\/div><\/div>'})});hoverpopovers=$("[data-toggle=popover-hover]");$.each(hoverpopovers,function(){$(this).popover({html:!0,template:'<div class="popover '+$(this).data("class")+'"><div class="arrow"><\/div><h3 class="popover-title '+$(this).data("titleclass")+'">Popover right<\/h3><div class="popover-content"><\/div><\/div>',trigger:"hover"})});$("[data-toggle=tooltip]").tooltip({html:!0});InitiateSideMenu();InitiateSettings();InitiateWidgets();
/*
//# sourceMappingURL=beyond.min.js.map
*/



/*
 * Toastr
 * Version 2.0.1
 * Copyright 2012 John Papa and Hans Fjällemark.  
 * All Rights Reserved.  
 * Use, reproduction, distribution, and modification of this code is subject to the terms and 
 * conditions of the MIT license, available at http://www.opensource.org/licenses/mit-license.php
 *
 * Author: John Papa and Hans Fjällemark
 * Project: https://github.com/CodeSeven/toastr
 */
; (function (define) {
    define(['jquery'], function ($) {
        return (function () {
            var version = '2.0.1';
            var $container;
            var listener;
            var toastId = 0;
            var toastType = {
                error: 'error',
                info: 'info',
                success: 'success',
                warning: 'warning',
                custom: 'custom'
            };

            var toastr = {
                clear: clear,
                error: error,
                getContainer: getContainer,
                info: info,
                options: {},
                subscribe: subscribe,
                success: success,
                version: version,
                warning: warning,
                custom: custom
            };

            return toastr;

            //#region Accessible Methods
            function custom(message, title, optionsOverride) {
                return notify({
                    type: toastType.custom,
                    iconClass: getOptions().iconClass,
                    message: message,
                    optionsOverride: optionsOverride,
                    title: title
                });
            }

            function error(message, title, optionsOverride) {
                return notify({
                    type: toastType.error,
                    iconClass: getOptions().iconClasses.error,
                    message: message,
                    optionsOverride: optionsOverride,
                    title: title
                });
            }

            function info(message, title, optionsOverride) {
                return notify({
                    type: toastType.info,
                    iconClass: getOptions().iconClasses.info,
                    message: message,
                    optionsOverride: optionsOverride,
                    title: title
                });
            }

            function subscribe(callback) {
                listener = callback;
            }

            function success(message, title, optionsOverride) {
                return notify({
                    type: toastType.success,
                    iconClass: getOptions().iconClasses.success,
                    message: message,
                    optionsOverride: optionsOverride,
                    title: title
                });
            }

            function warning(message, title, optionsOverride) {
                return notify({
                    type: toastType.warning,
                    iconClass: getOptions().iconClasses.warning,
                    message: message,
                    optionsOverride: optionsOverride,
                    title: title
                });
            }

            function clear($toastElement) {
                var options = getOptions();
                if (!$container) { getContainer(options); }
                if ($toastElement && $(':focus', $toastElement).length === 0) {
                    $toastElement[options.hideMethod]({
                        duration: options.hideDuration,
                        easing: options.hideEasing,
                        complete: function () { removeToast($toastElement); }
                    });
                    return;
                }
                if ($container.children().length) {
                    $container[options.hideMethod]({
                        duration: options.hideDuration,
                        easing: options.hideEasing,
                        complete: function () { $container.remove(); }
                    });
                }
            }
            //#endregion

            //#region Internal Methods

            function getDefaults() {
                return {
                    tapToDismiss: true,
                    toastClass: 'toast',
                    containerId: 'toast-container',
                    debug: false,

                    showMethod: 'fadeIn', //fadeIn, slideDown, and show are built into jQuery
                    showDuration: 300,
                    showEasing: 'swing', //swing and linear are built into jQuery
                    onShown: undefined,
                    hideMethod: 'fadeOut',
                    hideDuration: 1000,
                    hideEasing: 'swing',
                    onHidden: undefined,

                    extendedTimeOut: 1000,
                    iconClasses: {
                        error: 'toast-error',
                        info: 'toast-info',
                        success: 'toast-success',
                        warning: 'toast-warning',
                        custom: 'toast-custom'
                    },
                    iconClass: 'toast-info',
                    positionClass: 'toast-top-right',
                    timeOut: 5000, // Set timeOut and extendedTimeout to 0 to make it sticky
                    titleClass: 'toast-title',
                    messageClass: 'toast-message',
                    target: 'body',
                    closeHtml: '<button>&times;</button>',
                    newestOnTop: true
                };
            }

            function publish(args) {
                if (!listener) {
                    return;
                }
                listener(args);
            }

            function notify(map) {
                var
					options = getOptions(),
					iconClass = map.iconClass || options.iconClass;

                if (typeof (map.optionsOverride) !== 'undefined') {
                    options = $.extend(options, map.optionsOverride);
                    iconClass = map.optionsOverride.iconClass || iconClass;
                }

                toastId++;

                $container = getContainer(options);
                var
					intervalId = null,
					$toastElement = $('<div/>'),
					$titleElement = $('<div/>'),
					$messageElement = $('<div/>'),
					$closeElement = $(options.closeHtml),
					response = {
					    toastId: toastId,
					    state: 'visible',
					    startTime: new Date(),
					    options: options,
					    map: map
					};

                if (map.iconClass) {
                    $toastElement.addClass(options.toastClass).addClass(iconClass);
                }

                if (map.title) {
                    $titleElement.append(map.title).addClass(options.titleClass);
                    $toastElement.append($titleElement);
                }

                if (map.message) {
                    $messageElement.append(map.message).addClass(options.messageClass);
                    $toastElement.append($messageElement);
                }

                if (options.closeButton) {
                    $closeElement.addClass('toast-close-button');
                    $toastElement.prepend($closeElement);
                }

                if (options.positionClass) {
                    if ($container.attr("class") != options.positionClass) {
                        $container.html("");
                        $container.removeAttr('class');
                        $container.addClass(options.positionClass);
                    }
                }

                $toastElement.hide();
                if (options.newestOnTop) {
                    $container.prepend($toastElement);
                } else {
                    $container.append($toastElement);
                }


                $toastElement[options.showMethod](
					{ duration: options.showDuration, easing: options.showEasing, complete: options.onShown }
				);
                if (options.timeOut > 0) {
                    intervalId = setTimeout(hideToast, options.timeOut);
                }

                $toastElement.hover(stickAround, delayedhideToast);
                if (!options.onclick && options.tapToDismiss) {
                    $toastElement.click(hideToast);
                }
                if (options.closeButton && $closeElement) {
                    $closeElement.click(function (event) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (event.cancelBubble !== undefined && event.cancelBubble !== true) {
                            event.cancelBubble = true;
                        }
                        hideToast(true);
                    });
                }

                if (options.onclick) {
                    $toastElement.click(function () {
                        options.onclick();
                        hideToast();
                    });
                }

                publish(response);
                var PlaySound = 0;
                PlaySound = 1;
			 /*
                if (isIE8orlower() == 0) {
                    var audioElement = document.createElement("audio");
                    audioElement.setAttribute("src", "assets/sound/alert.mp3");
                    $.get();
                    audioElement.addEventListener("load", function () {
                        audioElement.play()
                    }, true);
                    audioElement.pause();
                    audioElement.play()
                }
			 */

                if (options.debug && console) {
                    console.log(response);
                }

                return $toastElement;

                function hideToast(override) {
                    if ($(':focus', $toastElement).length && !override) {
                        return;
                    }
                    return $toastElement[options.hideMethod]({
                        duration: options.hideDuration,
                        easing: options.hideEasing,
                        complete: function () {
                            removeToast($toastElement);
                            if (options.onHidden) {
                                options.onHidden();
                            }
                            response.state = 'hidden';
                            response.endTime = new Date(),
							publish(response);
                        }
                    });
                }

                function delayedhideToast() {
                    if (options.timeOut > 0 || options.extendedTimeOut > 0) {
                        intervalId = setTimeout(hideToast, options.extendedTimeOut);
                    }
                }

                function stickAround() {
                    clearTimeout(intervalId);
                    $toastElement.stop(true, true)[options.showMethod](
						{ duration: options.showDuration, easing: options.showEasing }
					);
                }
            }
            function getContainer(options) {
                if (!options) { options = getOptions(); }
                $container = $('#' + options.containerId);
                if ($container.length) {
                    return $container;
                }
                $container = $('<div/>')
					.attr('id', options.containerId)
					.addClass(options.positionClass);
                $container.appendTo($(options.target));
                return $container;
            }

            function getOptions() {
                return $.extend({}, getDefaults(), toastr.options);
            }

            function removeToast($toastElement) {
                if (!$container) { $container = getContainer(); }
                if ($toastElement.is(':visible')) {
                    return;
                }
                $toastElement.remove();
                $toastElement = null;
                if ($container.children().length === 0) {
                    $container.remove();
                }
            }
            //#endregion

        })();
    });
}(typeof define === 'function' && define.amd ? define : function (deps, factory) {
    if (typeof module !== 'undefined' && module.exports) { //Node
        module.exports = factory(require('jquery'));
    } else {
        window['toastr'] = factory(window['jQuery']);
    }
}));

function getInternetExplorerVersion() {
    var rv = -1;
    if (navigator.appName == "Microsoft Internet Explorer") {
        var ua = navigator.userAgent;
        var re = new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");
        if (re.exec(ua) != null) {
            rv = parseFloat(RegExp.$1)
        }
    }
    return rv
}

function checkVersion() {
    var msg = "You're not using Windows Internet Explorer.";
    var ver = getInternetExplorerVersion();
    if (ver > -1) {
        if (ver >= 8) {
            msg = "You're using a recent copy of Windows Internet Explorer."
        } else {
            msg = "You should upgrade your copy of Windows Internet Explorer."
        }
    }
    alert(msg)
}

function isIE8orlower() {
    var msg = "0";
    var ver = getInternetExplorerVersion();
    if (ver > -1) {
        if (ver >= 9) {
            msg = 0
        } else {
            msg = 1
        }
    }
    return msg
};




/**
 * bootbox.js [v4.2.0]
 *
 * http://bootboxjs.com/license.txt
 */

// @see https://github.com/makeusabrew/bootbox/issues/180
// @see https://github.com/makeusabrew/bootbox/issues/186
(function (root, factory) {

  "use strict";
  if (typeof define === "function" && define.amd) {
    // AMD. Register as an anonymous module.
    define(["jquery"], factory);
  } else if (typeof exports === "object") {
    // Node. Does not work with strict CommonJS, but
    // only CommonJS-like environments that support module.exports,
    // like Node.
    module.exports = factory(require("jquery"));
  } else {
    // Browser globals (root is window)
    root.bootbox = factory(root.jQuery);
  }

}(this, function init($, undefined) {

  "use strict";

  // the base DOM structure needed to create a modal
  var templates = {
    dialog:
      "<div class='bootbox modal' tabindex='-1' role='dialog'>" +
        "<div class='modal-dialog'>" +
          "<div class='modal-content'>" +
            "<div class='modal-body'><div class='bootbox-body'></div></div>" +
          "</div>" +
        "</div>" +
      "</div>",
    header:
      "<div class='modal-header'>" +
        "<h4 class='modal-title'></h4>" +
      "</div>",
    footer:
      "<div class='modal-footer'></div>",
    closeButton:
      "<button type='button' class='bootbox-close-button close' data-dismiss='modal' aria-hidden='true'>&times;</button>",
    form:
      "<form class='bootbox-form'></form>",
    inputs: {
      text:
        "<input class='bootbox-input bootbox-input-text form-control' autocomplete=off type=text />",
      textarea:
        "<textarea class='bootbox-input bootbox-input-textarea form-control'></textarea>",
      email:
        "<input class='bootbox-input bootbox-input-email form-control' autocomplete='off' type='email' />",
      select:
        "<select class='bootbox-input bootbox-input-select form-control'></select>",
      checkbox:
        "<div class='checkbox'><label><input class='bootbox-input bootbox-input-checkbox' type='checkbox' /></label></div>",
      date:
        "<input class='bootbox-input bootbox-input-date form-control' autocomplete=off type='date' />",
      time:
        "<input class='bootbox-input bootbox-input-time form-control' autocomplete=off type='time' />",
      number:
        "<input class='bootbox-input bootbox-input-number form-control' autocomplete=off type='number' />",
      password:
        "<input class='bootbox-input bootbox-input-password form-control' autocomplete='off' type='password' />"
    }
  };

  var defaults = {
    // default language
    locale: "en",
    // show backdrop or not
    backdrop: true,
    // animate the modal in/out
    animate: true,
    // additional class string applied to the top level dialog
    className: null,
    // whether or not to include a close button
    closeButton: true,
    // show the dialog immediately by default
    show: true,
    // dialog container
    container: "body"
  };

  // our public object; augmented after our private API
  var exports = {};

  /**
   * @private
   */
  function _t(key) {
    var locale = locales[defaults.locale];
    return locale ? locale[key] : locales.en[key];
  }

  function processCallback(e, dialog, callback) {
    e.stopPropagation();
    e.preventDefault();

    // by default we assume a callback will get rid of the dialog,
    // although it is given the opportunity to override this

    // so, if the callback can be invoked and it *explicitly returns false*
    // then we'll set a flag to keep the dialog active...
    var preserveDialog = $.isFunction(callback) && callback(e) === false;

    // ... otherwise we'll bin it
    if (!preserveDialog) {
      dialog.modal("hide");
    }
  }

  function getKeyLength(obj) {
    // @TODO defer to Object.keys(x).length if available?
    var k, t = 0;
    for (k in obj) {
      t ++;
    }
    return t;
  }

  function each(collection, iterator) {
    var index = 0;
    $.each(collection, function(key, value) {
      iterator(key, value, index++);
    });
  }

  function sanitize(options) {
    var buttons;
    var total;

    if (typeof options !== "object") {
      throw new Error("Please supply an object of options");
    }

    if (!options.message) {
      throw new Error("Please specify a message");
    }

    // make sure any supplied options take precedence over defaults
    options = $.extend({}, defaults, options);

    if (!options.buttons) {
      options.buttons = {};
    }

    // we only support Bootstrap's "static" and false backdrop args
    // supporting true would mean you could dismiss the dialog without
    // explicitly interacting with it
    options.backdrop = options.backdrop ? "static" : false;

    buttons = options.buttons;

    total = getKeyLength(buttons);

    each(buttons, function(key, button, index) {

      if ($.isFunction(button)) {
        // short form, assume value is our callback. Since button
        // isn't an object it isn't a reference either so re-assign it
        button = buttons[key] = {
          callback: button
        };
      }

      // before any further checks make sure by now button is the correct type
      if ($.type(button) !== "object") {
        throw new Error("button with key " + key + " must be an object");
      }

      if (!button.label) {
        // the lack of an explicit label means we'll assume the key is good enough
        button.label = key;
      }

      if (!button.className) {
        if (total <= 2 && index === total-1) {
          // always add a primary to the main option in a two-button dialog
          button.className = "btn-primary";
        } else {
          button.className = "btn-default";
        }
      }
    });

    return options;
  }

  /**
   * map a flexible set of arguments into a single returned object
   * if args.length is already one just return it, otherwise
   * use the properties argument to map the unnamed args to
   * object properties
   * so in the latter case:
   * mapArguments(["foo", $.noop], ["message", "callback"])
   * -> { message: "foo", callback: $.noop }
   */
  function mapArguments(args, properties) {
    var argn = args.length;
    var options = {};

    if (argn < 1 || argn > 2) {
      throw new Error("Invalid argument length");
    }

    if (argn === 2 || typeof args[0] === "string") {
      options[properties[0]] = args[0];
      options[properties[1]] = args[1];
    } else {
      options = args[0];
    }

    return options;
  }

  /**
   * merge a set of default dialog options with user supplied arguments
   */
  function mergeArguments(defaults, args, properties) {
    return $.extend(
      // deep merge
      true,
      // ensure the target is an empty, unreferenced object
      {},
      // the base options object for this type of dialog (often just buttons)
      defaults,
      // args could be an object or array; if it's an array properties will
      // map it to a proper options object
      mapArguments(
        args,
        properties
      )
    );
  }

  /**
   * this entry-level method makes heavy use of composition to take a simple
   * range of inputs and return valid options suitable for passing to bootbox.dialog
   */
  function mergeDialogOptions(className, labels, properties, args) {
    //  build up a base set of dialog properties
    var baseOptions = {
      className: "bootbox-" + className,
      buttons: createLabels.apply(null, labels)
    };

    // ensure the buttons properties generated, *after* merging
    // with user args are still valid against the supplied labels
    return validateButtons(
      // merge the generated base properties with user supplied arguments
      mergeArguments(
        baseOptions,
        args,
        // if args.length > 1, properties specify how each arg maps to an object key
        properties
      ),
      labels
    );
  }

  /**
   * from a given list of arguments return a suitable object of button labels
   * all this does is normalise the given labels and translate them where possible
   * e.g. "ok", "confirm" -> { ok: "OK, cancel: "Annuleren" }
   */
  function createLabels() {
    var buttons = {};

    for (var i = 0, j = arguments.length; i < j; i++) {
      var argument = arguments[i];
      var key = argument.toLowerCase();
      var value = argument.toUpperCase();

      buttons[key] = {
        label: _t(value)
      };
    }

    return buttons;
  }

  function validateButtons(options, buttons) {
    var allowedButtons = {};
    each(buttons, function(key, value) {
      allowedButtons[value] = true;
    });

    each(options.buttons, function(key) {
      if (allowedButtons[key] === undefined) {
        throw new Error("button key " + key + " is not allowed (options are " + buttons.join("\n") + ")");
      }
    });

    return options;
  }

  exports.alert = function() {
    var options;

    options = mergeDialogOptions("alert", ["ok"], ["message", "callback"], arguments);

    if (options.callback && !$.isFunction(options.callback)) {
      throw new Error("alert requires callback property to be a function when provided");
    }

    /**
     * overrides
     */
    options.buttons.ok.callback = options.onEscape = function() {
      if ($.isFunction(options.callback)) {
        return options.callback();
      }
      return true;
    };

    return exports.dialog(options);
  };

  exports.confirm = function() {
    var options;

    options = mergeDialogOptions("confirm", ["cancel", "confirm"], ["message", "callback"], arguments);

    /**
     * overrides; undo anything the user tried to set they shouldn't have
     */
    options.buttons.cancel.callback = options.onEscape = function() {
      return options.callback(false);
    };

    options.buttons.confirm.callback = function() {
      return options.callback(true);
    };

    // confirm specific validation
    if (!$.isFunction(options.callback)) {
      throw new Error("confirm requires a callback");
    }

    return exports.dialog(options);
  };

  exports.prompt = function() {
    var options;
    var defaults;
    var dialog;
    var form;
    var input;
    var shouldShow;
    var inputOptions;

    // we have to create our form first otherwise
    // its value is undefined when gearing up our options
    // @TODO this could be solved by allowing message to
    // be a function instead...
    form = $(templates.form);

    // prompt defaults are more complex than others in that
    // users can override more defaults
    // @TODO I don't like that prompt has to do a lot of heavy
    // lifting which mergeDialogOptions can *almost* support already
    // just because of 'value' and 'inputType' - can we refactor?
    defaults = {
      className: "bootbox-prompt",
      buttons: createLabels("cancel", "confirm"),
      value: "",
      inputType: "text"
    };

    options = validateButtons(
      mergeArguments(defaults, arguments, ["title", "callback"]),
      ["cancel", "confirm"]
    );

    // capture the user's show value; we always set this to false before
    // spawning the dialog to give us a chance to attach some handlers to
    // it, but we need to make sure we respect a preference not to show it
    shouldShow = (options.show === undefined) ? true : options.show;

    // check if the browser supports the option.inputType
    var html5inputs = ["date","time","number"];
    var i = document.createElement("input");
    i.setAttribute("type", options.inputType);
    if(html5inputs[options.inputType]){
      options.inputType = i.type;
    }

    /**
     * overrides; undo anything the user tried to set they shouldn't have
     */
    options.message = form;

    options.buttons.cancel.callback = options.onEscape = function() {
      return options.callback(null);
    };

    options.buttons.confirm.callback = function() {
      var value;


      switch (options.inputType) {
        case "text":
        case "textarea":
        case "email":
        case "select":
        case "date":
        case "time":
        case "number":
        case "password":
          value = input.val();
          break;

        case "checkbox":
          var checkedItems = input.find("input:checked");

          // we assume that checkboxes are always multiple,
          // hence we default to an empty array
          value = [];

          each(checkedItems, function(_, item) {
            value.push($(item).val());
          });
          break;
      }

      return options.callback(value);
    };

    options.show = false;

    // prompt specific validation
    if (!options.title) {
      throw new Error("prompt requires a title");
    }

    if (!$.isFunction(options.callback)) {
      throw new Error("prompt requires a callback");
    }

    if (!templates.inputs[options.inputType]) {
      throw new Error("invalid prompt type");
    }

    // create the input based on the supplied type
    input = $(templates.inputs[options.inputType]);

    switch (options.inputType) {
      case "text":
      case "textarea":
      case "email":
      case "date":
      case "time":
      case "number":
      case "password":
        input.val(options.value);
        break;

      case "select":
        var groups = {};
        inputOptions = options.inputOptions || [];

        if (!inputOptions.length) {
          throw new Error("prompt with select requires options");
        }

        each(inputOptions, function(_, option) {

          // assume the element to attach to is the input...
          var elem = input;

          if (option.value === undefined || option.text === undefined) {
            throw new Error("given options in wrong format");
          }


          // ... but override that element if this option sits in a group

          if (option.group) {
            // initialise group if necessary
            if (!groups[option.group]) {
              groups[option.group] = $("<optgroup/>").attr("label", option.group);
            }

            elem = groups[option.group];
          }

          elem.append("<option value='" + option.value + "'>" + option.text + "</option>");
        });

        each(groups, function(_, group) {
          input.append(group);
        });

        // safe to set a select's value as per a normal input
        input.val(options.value);
        break;

      case "checkbox":
        var values   = $.isArray(options.value) ? options.value : [options.value];
        inputOptions = options.inputOptions || [];

        if (!inputOptions.length) {
          throw new Error("prompt with checkbox requires options");
        }

        if (!inputOptions[0].value || !inputOptions[0].text) {
          throw new Error("given options in wrong format");
        }

        // checkboxes have to nest within a containing element, so
        // they break the rules a bit and we end up re-assigning
        // our 'input' element to this container instead
        input = $("<div/>");

        each(inputOptions, function(_, option) {
          var checkbox = $(templates.inputs[options.inputType]);

          checkbox.find("input").attr("value", option.value);
          checkbox.find("label").append(option.text);

          // we've ensured values is an array so we can always iterate over it
          each(values, function(_, value) {
            if (value === option.value) {
              checkbox.find("input").prop("checked", true);
            }
          });

          input.append(checkbox);
        });
        break;
    }

    if (options.placeholder) {
      input.attr("placeholder", options.placeholder);
    }

    if(options.pattern){
      input.attr("pattern", options.pattern);
    }

    // now place it in our form
    form.append(input);

    form.on("submit", function(e) {
      e.preventDefault();
      // @TODO can we actually click *the* button object instead?
      // e.g. buttons.confirm.click() or similar
      dialog.find(".btn-primary").click();
    });

    dialog = exports.dialog(options);

    // clear the existing handler focusing the submit button...
    dialog.off("shown.bs.modal");

    // ...and replace it with one focusing our input, if possible
    dialog.on("shown.bs.modal", function() {
      input.focus();
    });

    if (shouldShow === true) {
      dialog.modal("show");
    }

    return dialog;
  };

  exports.dialog = function(options) {
    options = sanitize(options);

    var dialog = $(templates.dialog);
    var body = dialog.find(".modal-body");
    var buttons = options.buttons;
    var buttonStr = "";
    var callbacks = {
      onEscape: options.onEscape
    };

    each(buttons, function(key, button) {

      // @TODO I don't like this string appending to itself; bit dirty. Needs reworking
      // can we just build up button elements instead? slower but neater. Then button
      // can just become a template too
      buttonStr += "<button data-bb-handler='" + key + "' type='button' class='btn " + button.className + "'>" + button.label + "</button>";
      callbacks[key] = button.callback;
    });

    body.find(".bootbox-body").html(options.message);

    if (options.animate === true) {
      dialog.addClass("fade");
    }

    if (options.className) {
      dialog.addClass(options.className);
    }

    if (options.title) {
      body.before(templates.header);
    }

    if (options.closeButton) {
      var closeButton = $(templates.closeButton);

      if (options.title) {
        dialog.find(".modal-header").prepend(closeButton);
      } else {
        closeButton.css("margin-top", "-10px").prependTo(body);
      }
    }

    if (options.title) {
      dialog.find(".modal-title").html(options.title);
    }

    if (buttonStr.length) {
      body.after(templates.footer);
      dialog.find(".modal-footer").html(buttonStr);
    }


    /**
     * Bootstrap event listeners; used handle extra
     * setup & teardown required after the underlying
     * modal has performed certain actions
     */

    dialog.on("hidden.bs.modal", function(e) {
      // ensure we don't accidentally intercept hidden events triggered
      // by children of the current dialog. We shouldn't anymore now BS
      // namespaces its events; but still worth doing
      if (e.target === this) {
        dialog.remove();
      }
    });

    /*
    dialog.on("show.bs.modal", function() {
      // sadly this doesn't work; show is called *just* before
      // the backdrop is added so we'd need a setTimeout hack or
      // otherwise... leaving in as would be nice
      if (options.backdrop) {
        dialog.next(".modal-backdrop").addClass("bootbox-backdrop");
      }
    });
    */

    dialog.on("shown.bs.modal", function() {
      dialog.find(".btn-primary:first").focus();
    });

    /**
     * Bootbox event listeners; experimental and may not last
     * just an attempt to decouple some behaviours from their
     * respective triggers
     */

    dialog.on("escape.close.bb", function(e) {
      if (callbacks.onEscape) {
        processCallback(e, dialog, callbacks.onEscape);
      }
    });

    /**
     * Standard jQuery event listeners; used to handle user
     * interaction with our dialog
     */

    dialog.on("click", ".modal-footer button", function(e) {
      var callbackKey = $(this).data("bb-handler");

      processCallback(e, dialog, callbacks[callbackKey]);

    });

    dialog.on("click", ".bootbox-close-button", function(e) {
      // onEscape might be falsy but that's fine; the fact is
      // if the user has managed to click the close button we
      // have to close the dialog, callback or not
      processCallback(e, dialog, callbacks.onEscape);
    });

    dialog.on("keyup", function(e) {
      if (e.which === 27) {
        dialog.trigger("escape.close.bb");
      }
    });

    // the remainder of this method simply deals with adding our
    // dialogent to the DOM, augmenting it with Bootstrap's modal
    // functionality and then giving the resulting object back
    // to our caller

    $(options.container).append(dialog);

    dialog.modal({
      backdrop: options.backdrop,
      keyboard: false,
      show: false
    });

    if (options.show) {
      dialog.modal("show");
    }

    // @TODO should we return the raw element here or should
    // we wrap it in an object on which we can expose some neater
    // methods, e.g. var d = bootbox.alert(); d.hide(); instead
    // of d.modal("hide");

   /*
    function BBDialog(elem) {
      this.elem = elem;
    }

    BBDialog.prototype = {
      hide: function() {
        return this.elem.modal("hide");
      },
      show: function() {
        return this.elem.modal("show");
      }
    };
    */

    return dialog;

  };

  exports.setDefaults = function() {
    var values = {};

    if (arguments.length === 2) {
      // allow passing of single key/value...
      values[arguments[0]] = arguments[1];
    } else {
      // ... and as an object too
      values = arguments[0];
    }

    $.extend(defaults, values);
  };

  exports.hideAll = function() {
    $(".bootbox").modal("hide");
  };


  /**
   * standard locales. Please add more according to ISO 639-1 standard. Multiple language variants are
   * unlikely to be required. If this gets too large it can be split out into separate JS files.
   */
  var locales = {
    br : {
      OK      : "OK",
      CANCEL  : "Cancelar",
      CONFIRM : "Sim"
    },
    da : {
      OK      : "OK",
      CANCEL  : "Annuller",
      CONFIRM : "Accepter"
    },
    de : {
      OK      : "OK",
      CANCEL  : "Abbrechen",
      CONFIRM : "Akzeptieren"
    },
    en : {
      OK      : "OK",
      CANCEL  : "Cancel",
      CONFIRM : "OK"
    },
    es : {
      OK      : "OK",
      CANCEL  : "Cancelar",
      CONFIRM : "Aceptar"
    },
    fi : {
      OK      : "OK",
      CANCEL  : "Peruuta",
      CONFIRM : "OK"
    },
    fr : {
      OK      : "OK",
      CANCEL  : "Annuler",
      CONFIRM : "D'accord"
    },
    he : {
      OK      : "אישור",
      CANCEL  : "ביטול",
      CONFIRM : "אישור"
    },
    it : {
      OK      : "OK",
      CANCEL  : "Annulla",
      CONFIRM : "Conferma"
    },
    lt : {
      OK      : "Gerai",
      CANCEL  : "Atšaukti",
      CONFIRM : "Patvirtinti"
    },
    lv : {
      OK      : "Labi",
      CANCEL  : "Atcelt",
      CONFIRM : "Apstiprināt"
    },
    nl : {
      OK      : "OK",
      CANCEL  : "Annuleren",
      CONFIRM : "Accepteren"
    },
    no : {
      OK      : "OK",
      CANCEL  : "Avbryt",
      CONFIRM : "OK"
    },
    pl : {
      OK      : "OK",
      CANCEL  : "Anuluj",
      CONFIRM : "Potwierdź"
    },
    ru : {
      OK      : "OK",
      CANCEL  : "Отмена",
      CONFIRM : "Применить"
    },
    sv : {
      OK      : "OK",
      CANCEL  : "Avbryt",
      CONFIRM : "OK"
    },
    tr : {
      OK      : "Tamam",
      CANCEL  : "İptal",
      CONFIRM : "Onayla"
    },
    zh_CN : {
      OK      : "OK",
      CANCEL  : "取消",
      CONFIRM : "确认"
    },
    zh_TW : {
      OK      : "OK",
      CANCEL  : "取消",
      CONFIRM : "確認"
    }
  };

  exports.init = function(_$) {
    return init(_$ || $);
  };

  return exports;
}));


$(function() {
	var today_str='号';
	var socket = io(SocketClient);

    socket.on('connect', function(){
		uid=IsLogin();
		uids = SocketIoKey.split('.');
		if(parseInt(uids[1])==0 && uid){
			SocketIoKey=parseInt(uids[0])+'.'+uid;
		}	
    	socket.emit('login',SocketIoKey);
    });

    socket.on('msg', function(msg){
		//console.log(json.event);
		var json=$.parseJSON(msg); 
		var content=$.parseJSON(json.content); 
		if(json.event=='update'){
			if(json.status=='ok'){
				if($('.FOXPHP_UPDATE').length){
					if(json.update=='checkdir'){
						$('.FOXPHP_UPDATE').find('.progress-bar').css("width",'25%');
						$('.FOXPHP_UPDATE').find('.progress-bar span').html('25%');
					}
					
					if(json.update=='downfile'){
						$('.FOXPHP_UPDATE').find('.progress-bar').css("width",'60%');
						$('.FOXPHP_UPDATE').find('.progress-bar span').html('60%');
					}
					
					if(json.update=='backup'){
						$('.FOXPHP_UPDATE').find('.progress-bar').css("width",'70%');
						$('.FOXPHP_UPDATE').find('.progress-bar span').html('70%');
					}
					
					if(json.update=='copy'){
						$('.FOXPHP_UPDATE').find('.progress-bar').css("width",'80%');
						$('.FOXPHP_UPDATE').find('.progress-bar span').html('80%');
					}
					
					if(json.update=='sql'){
						$('.FOXPHP_UPDATE').find('.progress-bar').css("width",'90%');
						$('.FOXPHP_UPDATE').find('.progress-bar span').html('90%');
					}
					
					if(json.update=='complete'){
						$('.FOXPHP_UPDATE').find('.progress-bar').css("width",'100%');
						$('.FOXPHP_UPDATE').find('.progress-bar span').html('100%');
						if(ModuleName=='Install'){
							window.location.href='/install/complete';
						}else{
							bootbox.hideAll();
							window.location.reload();
						}
					}
			
				}
				
				if(json.update=='checkdir'){
					if($('#UpdateProgress').length){
						$('#UpdateProgress').show(500).html('9');
					}
				}
				
				if(json.update=='downfile'){
					if($('#UpdateProgress').length){
						$('#UpdateProgress').show(500).html('60');
					}
				}
				
				if(json.update=='backup'){
					if($('#UpdateProgress').length){
						$('#UpdateProgress').show(500).html('70');
					}
				}
				
				if(json.update=='copy'){
					if($('#UpdateProgress').length){
						$('#UpdateProgress').show(500).html('80');
					}
				}
				
				if(json.update=='sql'){
					if($('#UpdateProgress').length){
						$('#UpdateProgress').show(500).html('90');
					}
				}
				
				if(json.update=='complete'){
					if($('#UpdateProgress').length){
						$('#UpdateProgress').show(500).html('100');
					}
				}
					
			}else{
				bootbox.hideAll();
				 bootbox.alert({ 
					size: 'small',
					title: json.title,
					message: json.message
				 })
				 return false; 
			}
				
			//alert('更新成功');
		}else if(json.event=='dialog'){	
			if(IsLogin()){
				GetUserIM();
				var imheight=$('#FoxPHP_ImBox').css('height');
				if(imheight!='382px'){
					FoxPHPNoticeIM();
				}
				var imid='FoxPHP_DialogID_'+content.id;
				if($("#"+imid).length>0){
					if($("#"+imid).is(":hidden")){
						Notify('<div class="row"><div class="col-xs-2 socket_avatar">'+content.avatar+'</div><div class="col-xs-8"><p><a href="'+content.url+'">'+content.message+' <i class="fa fa-arrow-circle-right"></i></a></p></div></div>', 'bottom-right', '1000000', 'info', 'fa-envelope', true); 
					}else{
						GetDialogIM(content.id);
					}
				}else{
					Notify('<div class="row"><div class="col-xs-2 socket_avatar">'+content.avatar+'</div><div class="col-xs-8"><p><a href="'+content.url+'">'+content.message+' <i class="fa fa-arrow-circle-right"></i></a></p></div></div>', 'bottom-right', '1000000', 'info', 'fa-envelope', true); 
				}
			}
			return false;
		}else if(json.event=='task'){
			Notify('<div class="row"><div class="col-xs-2 socket_avatar">'+content.avatar+'</div><div class="col-xs-8"><p><a href="'+content.url+'">'+content.message+' <i class="fa fa-arrow-circle-right"></i></a></p></div></div>', 'bottom-right', '1000000', 'blue', 'fa-tasks', true); 
			
			$('#TimeEvent').prepend('<li>'+
                            '<div class="timeline-datetime">'+
                                '<span class="timeline-time">'+content.time+'</span><span class="timeline-date">'+content.date+today_str+'</span>'+
                            '</div>'+
                            '<div class="timeline-badge blue">'+content.avatar+'</div>'+
                            '<div class="timeline-panel">'+
                                '<div class="timeline-header bordered-bottom bordered-blue">'+
                                    '<span class="timeline-title">'+content.username+'</span>'+
                                    '<p class="timeline-datetime">'+
                                        '<small class="text-muted">'+
                                            '<i class="glyphicon glyphicon-time">'+
                                            '</i>'+
                                            '<span class="timeline-date">'+content.date+today_str+'</span>'+
                                            '-'+
                                            '<span class="timeline-time">'+content.time+'</span>'+
                                        '</small>'+
                                    '</p>'+
                                '</div>'+
                                '<div class="timeline-body">'+
                                    '<p><a href="'+content.url+'" target="_blank">'+content.message+'</a></p>'+
                                '</div>'+
                            '</div>'+
                        '</li>');
						
			$('.timeline-node').show();			
			return false;
		}else if(json.event=='fuwu'){
			Notify('<div class="row"><div class="col-xs-2 socket_avatar">'+content.avatar+'</div><div class="col-xs-8"><p><a href="'+content.url+'">'+content.message+' <i class="fa fa-arrow-circle-right"></i></a></p></div></div>', 'bottom-right', '1000000', 'info', 'fa-pencil-square', true); 
			
			$('#TimeEvent').prepend('<li class="timeline-inverted">'+
                            '<div class="timeline-datetime">'+
                                '<span class="timeline-time">'+content.time+'</span><span class="timeline-date">'+content.date+today_str+'</span>'+
                            '</div>'+
                            '<div class="timeline-badge blue">'+content.avatar+'</div>'+
                            '<div class="timeline-panel">'+
                                '<div class="timeline-header bordered-bottom bordered-blue">'+
                                    '<span class="timeline-title">'+content.username+'</span>'+
                                    '<p class="timeline-datetime">'+
                                        '<small class="text-muted">'+
                                            '<i class="glyphicon glyphicon-time">'+
                                            '</i>'+
                                            '<span class="timeline-date">'+content.date+today_str+'</span>'+
                                            '-'+
                                            '<span class="timeline-time">'+content.time+'</span>'+
                                        '</small>'+
                                    '</p>'+
                                '</div>'+
                                '<div class="timeline-body">'+
                                    '<p><a href="'+content.url+'" target="_blank">'+content.message+'</a></p>'+
                                '</div>'+
                            '</div>'+
                        '</li>');
						
			$('.timeline-node').show();			
			return false;
		}
	
    });
	
	//浮动菜单
	$('#ToTop').click(function() {
           $('body,html').animate({ scrollTop: 0 }, 800);
    })
});

