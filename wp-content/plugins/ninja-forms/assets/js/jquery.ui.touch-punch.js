/*!
 *
 * This library has been modified! This function has been changed: mouseProto._mouseInit
 *
 * Original Version:
 *
 *     mouseProto._mouseInit = function () {
 *   
 *       var self = this;
 *
 *       // Delegate the touch handlers to the widget's element
 *       self.element.bind({
 *         touchstart: $.proxy(self, '_touchStart'),
 *         touchmove: $.proxy(self, '_touchMove'),
 *         touchend: $.proxy(self, '_touchEnd')
 *         });
 *
 *       // Call the original $.ui.mouse init method
 *       _mouseInit.call(self);
 *     };
 *
 * 
 * New Version:
 * 
 *     mouseProto._mouseInit = function () {
 *
 *        var self = this;
 *
 *        // Delegate the touch handlers to the widget's element
 *        self.element
 *           .bind('taphold', $.proxy(self, '_touchStart'))   // IMPORTANT!MOD FOR TAPHOLD TO START SORTABLE
 *           .bind('touchmove', $.proxy(self, '_touchMove'))
 *           .bind('touchend', $.proxy(self, '_touchEnd'));
 *
 *         // Call the original $.ui.mouse init method
 *         _mouseInit.call(self);
 *     };  
 *
 * Why?
 *
 *  The original version mapped any tap start to a click. This means that you weren't able to scroll through
 *  the sortable on a mobile device, as every attempt to scroll was intercepted as a click.
 * 
 * jQuery UI Touch Punch 0.2.3
 *
 * Copyright 2011–2014, Dave Furfero
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Depends:
 *  jquery.ui.widget.js
 *  jquery.ui.mouse.js
 */
!function(t){if(t.support.touch="ontouchend"in document,t.support.touch){var o,e=t.ui.mouse.prototype,u=e._mouseInit,n=e._mouseDestroy;e._touchStart=function(t){!o&&this._mouseCapture(t.originalEvent.changedTouches[0])&&(o=!0,this._touchMoved=!1,c(t,"mouseover"),c(t,"mousemove"),c(t,"mousedown"))},e._touchMove=function(t){o&&(this._touchMoved=!0,c(t,"mousemove"))},e._touchEnd=function(t){o&&(c(t,"mouseup"),c(t,"mouseout"),this._touchMoved||c(t,"click"),o=!1)},e._mouseInit=function(){this.element.bind("taphold",t.proxy(this,"_touchStart")).bind("touchmove",t.proxy(this,"_touchMove")).bind("touchend",t.proxy(this,"_touchEnd")),u.call(this)},e._mouseDestroy=function(){this.element.unbind({touchstart:t.proxy(this,"_touchStart"),touchmove:t.proxy(this,"_touchMove"),touchend:t.proxy(this,"_touchEnd")}),n.call(this)}}function c(t,o){if(!(t.originalEvent.touches.length>1)){t.preventDefault();var e=t.originalEvent.changedTouches[0],u=document.createEvent("MouseEvents");u.initMouseEvent(o,!0,!0,window,1,e.screenX,e.screenY,e.clientX,e.clientY,!1,!1,!1,!1,0,null),t.target.dispatchEvent(u)}}}(jQuery);