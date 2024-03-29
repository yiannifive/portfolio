/*
 * Gridlock Overlay Bookmarklet
 * @author Ben Plum
 * @version 0.2.1
 *
 * Copyright 2013 Ben Plum <mr@benplum.co>
 * Not to be reproduced
 */
 
//javascript:(function(){if(typeof%20GridlockBookmarklet=='undefined'){document.body.appendChild(document.createElement('script')).src='http://www.benplum.com/js/gridlock.bookmarklet.js';}else{GridlockBookmarklet();}})();

function GridlockBookmarklet() {
	var $jq,
		OverlayObj,
		Overlay = function() {
			var _this = this,
				config = $jq.extend({
					onLoad: false,
					position: "top-right", // top-right, top-left, bottom-right, bottom-left
					useCookies: false
				}, window.GridlockBookmarkletConfig);
			
			if ($jq(".gridlock").length < 1) {
				alert("Gridlock Not Found.\nYou'll need to include Gridlock before using this bookmarklet.\n\nLearn more: http://www.benplum.com/projects/gridlock/");
			} else {
				var desktopCount = $jq(".gridlock").hasClass("gridlock-16") ? 16 : 12,
					mobileFirst = $jq(".gridlock").hasClass("gridlock-mf"),
					tabletCount = Math.ceil(desktopCount / 2);
					mobileCount = 3;
				console.log("MOBILE FIRST: " + mobileFirst);
				if($jq("#gridlock_styles").length < 1) {
					$jq("body").append('<style id="gridlock_styles">$gridlock_bookmarklet_css</style>');
				}
				
				if ($jq("#gridlock_overlay").length < 1) {
					var _this = this,
						html = '';
					
					html += '<menu id="gridlock_menu" class="' + config.position + '">';
					html += '<span class="icon logo">Gridlock</span>';
					html += '<span class="show option">SHOW</span>';
					html += '<span class="icon remove">Close</span>';
					html += '</menu>';
					html += '<section id="gridlock_overlay" class="' + ((mobileFirst) ? "mobile-first" : "") + '">';
					html += '<div class="row">';
					for (var i = 0; i < desktopCount; i++) {
						html += '<div class="desktop-1 tablet-1 mobile-1"> <span> </span> </div>';
					}
					html += '</div>';
					html += '</section>';
					
					$jq("body").append(html);
					
					_this.$menu = $jq("#gridlock_menu");
					_this.$menuItems = _this.$menu.find("span");
					_this.$overlay = $jq("#gridlock_overlay");
					
					_this.$menu.on("click", ".option", $jq.proxy(_this.onClick, _this))
							   .on("click", ".remove", $jq.proxy(_this.remove, _this));
					
					if (config.onLoad || (config.useCookies === true && _this.readCookie("gridlock-active") == "true")) {
						_this.$menuItems.filter(".show")
										.trigger("click");
					}
				}
			}
		};
	Overlay.prototype = {
		onClick: function(e) {
			var _this = this;
			var $target = $jq(e.currentTarget);
			
			if ($target.hasClass("active") || $target.hasClass("remove")) {
				$target.removeClass("active")
					   .html("SHOW");
				_this.$overlay.find(".row").hide();
				_this.eraseCookie("gridlock-active");
			} else {
				$target.addClass("active")
					   .html("HIDE");
				_this.$overlay.find(".row").show();
				_this.createCookie("gridlock-active", "true", 7);
			}
		},
		remove: function(e) {
			var _this = this;
			
			_this.$menu.remove();
			_this.$overlay.remove();
		},
		createCookie: function(key, value, expires) {
			var date = new Date();
			date.setTime(date.getTime() + (expires * 24 * 60 * 60 * 1000));
			var expires = "; expires=" + date.toGMTString();
			var path = "; path=/"
			var domain = "; domain=" + document.domain;
			document.cookie = key + "=" + value + expires + domain + path;
		},
		readCookie: function(key) {
			var keyString = key + "=";
			var cookieArray = document.cookie.split(';');
			for(var i = 0; i < cookieArray.length; i++) {
				var cookie = cookieArray[i];
				while (cookie.charAt(0) == ' ') {
					cookie = cookie.substring(1, cookie.length);
				}
				if (cookie.indexOf(keyString) == 0) return cookie.substring(keyString.length, cookie.length);
			}
			return null;
		},
		eraseCookie: function(key) {
			this.createCookie(key, "", -1);
		}
	};
	
	function initOverlay() {
		OverlayObj = new Overlay(); 
	}
	
	function loadJQuery() {
		var jQ = document.createElement("script");
		jQ.id = "gridlock-jquery";
		jQ.src = "http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js";
		jQ.onload = function() {
			$jq = jQuery.noConflict(true);
			initOverlay();
		};
		document.body.appendChild(jQ);
	}
	
	if (typeof jQuery == "undefined") {
		loadJQuery();
	} else {
		var version = jQuery.fn.jquery.split('.');
		if (parseInt(version[1], 10) < 7) {
			loadJQuery();
		} else {
			$jq = jQuery;
			initOverlay();
		}
	}
}
GridlockBookmarklet();