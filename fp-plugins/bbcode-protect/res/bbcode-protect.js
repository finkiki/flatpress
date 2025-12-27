/**
 * BBCode Content Protection Plugin - Optional JavaScript Enhancements
 * Progressive enhancement - all functionality works without JS
 */

(function() {
	'use strict';
	
	// Wait for DOM to be ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
	
	function init() {
		// Find all protection forms
		const forms = document.querySelectorAll('.bbcode-protect-form');
		
		forms.forEach(function(form) {
			enhanceForm(form);
		});
	}
	
	/**
	 * Enhance a password form
	 */
	function enhanceForm(form) {
		// Auto-focus password field
		const passwordInput = form.querySelector('.bbcode-protect-password-input');
		if (passwordInput && isInViewport(passwordInput)) {
			// Only auto-focus if the form is visible in viewport
			passwordInput.focus();
		}
		
		// Add loading state on submit
		form.addEventListener('submit', function() {
			const submitBtn = form.querySelector('.bbcode-protect-submit');
			if (submitBtn && !submitBtn.disabled) {
				submitBtn.disabled = true;
				const originalText = submitBtn.textContent;
				submitBtn.textContent = 'Submitting...';
				
				// Re-enable after a timeout as fallback
				setTimeout(function() {
					submitBtn.disabled = false;
					submitBtn.textContent = originalText;
				}, 5000);
			}
		});
		
		// Add Enter key support (though browser should handle this)
		if (passwordInput) {
			passwordInput.addEventListener('keypress', function(e) {
				if (e.key === 'Enter' || e.keyCode === 13) {
					e.preventDefault();
					form.submit();
				}
			});
		}
	}
	
	/**
	 * Check if element is in viewport
	 */
	function isInViewport(element) {
		const rect = element.getBoundingClientRect();
		return (
			rect.top >= 0 &&
			rect.left >= 0 &&
			rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
			rect.right <= (window.innerWidth || document.documentElement.clientWidth)
		);
	}
	
	// jQuery UI integration (if available)
	if (typeof jQuery !== 'undefined' && jQuery.ui) {
		jQuery(document).ready(function($) {
			$('.bbcode-protect-password-input').each(function() {
				// Add subtle animation on focus
				$(this).on('focus', function() {
					$(this).parent().addClass('focused');
				}).on('blur', function() {
					$(this).parent().removeClass('focused');
				});
			});
		});
	}
})();
