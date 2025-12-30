/**
 * Announcement Bar JavaScript
 * Handles dismissible functionality and visibility persistence
 */

var AnnouncementBar = (function() {
	'use strict';
	
	var config = {
		dismissible: false,
		version: '1',
		cookieName: 'announcementbar_dismissed',
		storageKey: 'announcementbar_dismissed'
	};
	
	/**
	 * Initialize the announcement bar
	 */
	function init(options) {
		// Merge options
		if (options) {
			for (var key in options) {
				if (options.hasOwnProperty(key)) {
					config[key] = options[key];
				}
			}
		}
		
		var bar = document.getElementById('announcement_bar');
		if (!bar) {
			return;
		}
		
		// Move bar to the very beginning of body to prevent overlapping content
		if (bar.parentNode !== document.body || document.body.firstChild !== bar) {
			document.body.insertBefore(bar, document.body.firstChild);
		}
		
		// Get version from data attribute if present
		var dataVersion = bar.getAttribute('data-dismiss-version');
		if (dataVersion) {
			config.version = dataVersion;
		}
		
		// Check if dismissed
		if (config.dismissible && isDismissed()) {
			bar.style.display = 'none';
			return;
		}
		
		// Show the bar
		bar.style.display = 'flex';
		
		// Add body class to account for bar height
		document.body.classList.add('has-announcement-bar');
		
		// Adjust body padding to prevent content from being hidden
		// Use setTimeout to ensure bar is fully rendered before calculating height
		setTimeout(function() {
			adjustBodyPadding(bar);
		}, 0);
		
		// Set up close button if dismissible
		if (config.dismissible) {
			setupCloseButton(bar);
		}
		
		// Re-adjust padding on window resize
		window.addEventListener('resize', function() {
			if (!bar.classList.contains('hidden') && bar.style.display !== 'none') {
				adjustBodyPadding(bar);
			}
		});
	}
	
	/**
	 * Adjust body padding to account for announcement bar height
	 */
	function adjustBodyPadding(bar) {
		if (!bar || bar.classList.contains('hidden')) {
			document.body.style.paddingTop = '';
			return;
		}
		
		var barHeight = bar.offsetHeight;
		document.body.style.paddingTop = barHeight + 'px';
	}
	
	/**
	 * Set up the close button click handler
	 */
	function setupCloseButton(bar) {
		var closeBtn = bar.querySelector('.announcement-bar-close');
		if (!closeBtn) {
			console.warn('AnnouncementBar: Close button not found');
			return;
		}
		
		// Use both click and touchend for better mobile support
		closeBtn.addEventListener('click', function(e) {
			e.preventDefault();
			e.stopPropagation();
			dismissBar(bar);
		}, false);
		
		closeBtn.addEventListener('touchend', function(e) {
			e.preventDefault();
			e.stopPropagation();
			dismissBar(bar);
		}, false);
		
		// Keyboard support
		closeBtn.addEventListener('keydown', function(e) {
			if (e.key === 'Enter' || e.key === ' ' || e.keyCode === 13 || e.keyCode === 32) {
				e.preventDefault();
				dismissBar(bar);
			}
		}, false);
	}
	
	/**
	 * Dismiss the announcement bar
	 */
	function dismissBar(bar) {
		// Animate the bar out
		bar.style.transform = 'translateY(-100%)';
		bar.classList.add('hidden');
		
		// Remove body padding with animation
		document.body.classList.remove('has-announcement-bar');
		document.body.style.transition = 'padding-top 0.3s ease-in-out';
		document.body.style.paddingTop = '0';
		
		// Clean up transition after animation
		setTimeout(function() {
			document.body.style.transition = '';
			bar.style.display = 'none';
		}, 300);
		
		// Save dismissal state
		saveDismissed();
		
		// Focus management - move focus to main content
		var mainContent = document.querySelector('main, #content, body');
		if (mainContent) {
			mainContent.focus();
		}
	}
	
	/**
	 * Check if the bar has been dismissed
	 */
	function isDismissed() {
		var dismissedVersion = getDismissedVersion();
		return dismissedVersion === config.version;
	}
	
	/**
	 * Get the dismissed version from storage
	 */
	function getDismissedVersion() {
		// Try localStorage first (preferred)
		if (supportsLocalStorage()) {
			try {
				return localStorage.getItem(config.storageKey) || '';
			} catch (e) {
				// Fall through to cookie
			}
		}
		
		// Fall back to cookie
		return getCookie(config.cookieName) || '';
	}
	
	/**
	 * Save the dismissed state
	 */
	function saveDismissed() {
		// Try localStorage first (preferred)
		if (supportsLocalStorage()) {
			try {
				localStorage.setItem(config.storageKey, config.version);
			} catch (e) {
				// Fall through to cookie
			}
		}
		
		// Also set cookie as fallback
		setCookie(config.cookieName, config.version, 365);
	}
	
	/**
	 * Check if localStorage is supported and available
	 */
	function supportsLocalStorage() {
		try {
			var test = '__storage_test__';
			localStorage.setItem(test, test);
			localStorage.removeItem(test);
			return true;
		} catch (e) {
			return false;
		}
	}
	
	/**
	 * Get a cookie value
	 */
	function getCookie(name) {
		var nameEQ = name + '=';
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) === ' ') {
				c = c.substring(1, c.length);
			}
			if (c.indexOf(nameEQ) === 0) {
				return c.substring(nameEQ.length, c.length);
			}
		}
		return null;
	}
	
	/**
	 * Set a cookie
	 */
	function setCookie(name, value, days) {
		var expires = '';
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = '; expires=' + date.toUTCString();
		}
		document.cookie = name + '=' + (value || '') + expires + '; path=/; SameSite=Lax';
	}
	
	// Public API
	return {
		init: init
	};
})();
