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
		
		// Show the bar (no need to move it, wp_head places it correctly)
		barElement.style.display = 'flex';
		
		// Set up close button
		setupCloseButton();
		
		// No need to adjust body padding with sticky positioning
		// The bar naturally pushes content down
		
		// Re-adjust on window resize (for future features)
		window.addEventListener('resize', function() {
			if (barElement && barElement.style.display !== 'none') {
				// Future: could recalculate something here if needed
			}
		});
	}
	
	/**
	 * Set up the close button click handler
	 * Ultra-simplified approach for maximum compatibility
	 */
	function setupCloseButton() {
		if (!barElement) {
			console.error('AnnouncementBar: barElement is null in setupCloseButton');
			return;
		}
		
		// Find the close button
		var closeBtn = barElement.querySelector('.announcement-bar-close');
		if (!closeBtn) {
			console.log('AnnouncementBar: No close button found (bar may not be dismissible)');
			return;
		}
		
		console.log('AnnouncementBar: Close button found, setting up handler');
		
		// Use the simplest possible approach - direct onclick assignment
		// This is the most reliable cross-browser method
		closeBtn.onclick = function(e) {
			console.log('AnnouncementBar: Close button CLICKED!');
			if (e) {
				try {
					e.preventDefault();
					e.stopPropagation();
				} catch (err) {
					// Ignore errors
				}
			}
			dismissBar();
			return false;
		};
		
		console.log('AnnouncementBar: Close button handler set up successfully');
	}
	
	/**
	 * Dismiss the announcement bar
	 */
	function dismissBar() {
		console.log('AnnouncementBar: ===== dismissBar() CALLED =====');
		
		if (!barElement) {
			console.error('AnnouncementBar: barElement is null');
			return;
		}
		
		console.log('AnnouncementBar: Hiding bar NOW');
		
		// IMMEDIATELY hide the bar (no animation, no delay)
		barElement.style.display = 'none';
		console.log('AnnouncementBar: Bar display set to none');
		
		// Save dismissal state
		saveDismissed();
		
		console.log('AnnouncementBar: ===== BAR DISMISSED SUCCESSFULLY =====');
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
