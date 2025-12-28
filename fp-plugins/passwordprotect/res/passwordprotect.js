/**
 * Content Protection Plugin - Optional JavaScript Enhancements
 * Requires jQuery (optional)
 */

(function($) {
	'use strict';
	
	$(document).ready(function() {
		// Auto-focus password field
		$('.passwordprotect-form input[type="password"]').first().focus();
		
		// Add loading state on submit
		$('.passwordprotect-form').on('submit', function() {
			var $form = $(this);
			var $submit = $form.find('.passwordprotect-submit');
			
			$form.addClass('loading');
			$submit.prop('disabled', true).text('Please wait...');
		});
		
		// Clear error on input
		$('.passwordprotect-form input[type="password"]').on('input', function() {
			$(this).closest('.passwordprotect-box').find('.passwordprotect-error').fadeOut();
		});
		
		// Enter key submit
		$('.passwordprotect-form input[type="password"]').on('keypress', function(e) {
			if (e.key === 'Enter') {
				$(this).closest('form').submit();
			}
		});
	});
	
})(jQuery);
