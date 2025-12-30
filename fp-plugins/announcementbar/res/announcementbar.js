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
	
	var barElement = null;
	
	/**
	 * Initialize the announcement bar
	 */
	function init(options) {
		console.log('AnnouncementBar: Initializing with options', options);
		
		// Merge options
		if (options) {
			for (var key in options) {
				if (options.hasOwnProperty(key)) {
					config[key] = options[key];
				}
			}
		}
		
		console.log('AnnouncementBar: Config after merge', config);
		
		barElement = document.getElementById('announcement_bar');
		if (!barElement) {
			console.error('AnnouncementBar: Bar element not found');
			return;
		}
		
		// Get version from data attribute if present
		var dataVersion = barElement.getAttribute('data-dismiss-version');
		if (dataVersion) {
			config.version = dataVersion;
		}
		
		console.log('AnnouncementBar: Version:', config.version);
		console.log('AnnouncementBar: Dismissible:', config.dismissible);
		
		// Check if dismissed
		if (config.dismissible && isDismissed()) {
			console.log('AnnouncementBar: Already dismissed, hiding');
			barElement.style.display = 'none';
			return;
		}
		
		// Move bar to the very beginning of body to prevent overlapping content
		if (barElement.parentNode !== document.body || document.body.firstChild !== barElement) {
			document.body.insertBefore(barElement, document.body.firstChild);
		}
		
		// Show the bar
		barElement.style.display = 'flex';
		
		// Add body class to account for bar height
		document.body.classList.add('has-announcement-bar');
		
		// ALWAYS set up close button if it exists, regardless of dismissible setting
		setupCloseButton(barElement);
		
		// Adjust body padding to prevent content from being hidden
		// Use setTimeout to ensure bar is fully rendered before calculating height
		setTimeout(function() {
			adjustBodyPadding(barElement);
		}, 0);
		
		// Re-adjust padding on window resize
		window.addEventListener('resize', function() {
			if (barElement && barElement.style.display !== 'none') {
				adjustBodyPadding(barElement);
			}
		});
	}
	
	/**
	 * Adjust body padding to account for announcement bar height
	 */
	function adjustBodyPadding(bar) {
		if (!bar || bar.style.display === 'none') {
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
		// Find the close button
		var closeBtn = bar.querySelector('.announcement-bar-close');
		if (!closeBtn) {
			console.warn('AnnouncementBar: Close button element not found in bar');
			return;
		}
		
		console.log('AnnouncementBar: Close button found, attaching handlers');
		
		// Create a simple, direct handler
		var handleClose = function(e) {
			if (e) {
				e.preventDefault();
				e.stopPropagation();
			}
			console.log('AnnouncementBar: Close button activated');
			dismissBar();
			return false;
		};
		
		// Attach handler in EVERY possible way
		closeBtn.onclick = handleClose;
		closeBtn.onmousedown = handleClose;
		closeBtn.ontouchstart = handleClose;
		
		// Also use addEventListener
		try {
			closeBtn.addEventListener('click', handleClose, true);
			closeBtn.addEventListener('mousedown', handleClose, true);
			closeBtn.addEventListener('touchstart', handleClose, true);
			closeBtn.addEventListener('touchend', handleClose, true);
		} catch (e) {
			console.error('AnnouncementBar: Error attaching event listeners', e);
		}
		
		// Keyboard support
		closeBtn.addEventListener('keydown', function(e) {
			if (e.key === 'Enter' || e.key === ' ' || e.keyCode === 13 || e.keyCode === 32) {
				e.preventDefault();
				e.stopPropagation();
				console.log('AnnouncementBar: Close button keyboard activation');
				dismissBar();
				return false;
			}
		}, true);
		
		console.log('AnnouncementBar: All close button handlers attached');
	}
	
	/**
	 * Dismiss the announcement bar
	 */
	function dismissBar() {
		console.log('AnnouncementBar: dismissBar() called');
		
		if (!barElement) {
			console.error('AnnouncementBar: barElement is null');
			return;
		}
		
		console.log('AnnouncementBar: Hiding bar immediately');
		
		// Immediately hide the bar (no animation to avoid any issues)
		barElement.style.display = 'none';
		
		// Remove body padding immediately
		document.body.classList.remove('has-announcement-bar');
		document.body.style.paddingTop = '0';
		
		// Save dismissal state
		saveDismissed();
		console.log('AnnouncementBar: Bar hidden and dismissal saved');
		
		// Focus management - move focus to main content
		try {
			var mainContent = document.querySelector('main, #content, body');
			if (mainContent && mainContent.focus) {
				mainContent.focus();
			}
		} catch (e) {
			// Ignore focus errors
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
		console.log('AnnouncementBar: Saving dismissed state, version:', config.version);
		
		// Try localStorage first (preferred)
		if (supportsLocalStorage()) {
			try {
				localStorage.setItem(config.storageKey, config.version);
				console.log('AnnouncementBar: Saved to localStorage');
			} catch (e) {
				console.error('AnnouncementBar: localStorage save failed', e);
			}
		}
		
		// Also set cookie as fallback
		try {
			setCookie(config.cookieName, config.version, 365);
			console.log('AnnouncementBar: Saved to cookie');
		} catch (e) {
			console.error('AnnouncementBar: Cookie save failed', e);
		}
	}
	
	/**
	 * Clear the dismissed state (for testing)
	 */
	function clearDismissed() {
		console.log('AnnouncementBar: Clearing dismissed state');
		
		// Clear localStorage
		if (supportsLocalStorage()) {
			try {
				localStorage.removeItem(config.storageKey);
			} catch (e) {
				// Ignore
			}
		}
		
		// Clear cookie by setting expired date
		document.cookie = config.cookieName + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; SameSite=Lax';
		
		console.log('AnnouncementBar: Dismissed state cleared');
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
		init: init,
		clearDismissed: clearDismissed,
		dismissBar: dismissBar
	};
})();
