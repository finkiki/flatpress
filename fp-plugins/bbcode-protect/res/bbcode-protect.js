/**
 * Content Protection Plugin - Optional JavaScript Enhancements
 * Requires jQuery (optional)
 */

(function($) {
	'use strict';
	
	$(document).ready(function() {
		// Auto-focus password field
		$('.bbcode-protect-form input[type="password"]').first().focus();
		
		// Add loading state on submit
		$('.bbcode-protect-form').on('submit', function() {
			var $form = $(this);
			var $submit = $form.find('.bbcode-protect-submit');
			
			$form.addClass('loading');
			$submit.prop('disabled', true).text('Please wait...');
		});
		
		// Clear error on input
		$('.bbcode-protect-form input[type="password"]').on('input', function() {
			$(this).closest('.bbcode-protect-box').find('.bbcode-protect-error').fadeOut();
		});
		
		// Enter key submit
		$('.bbcode-protect-form input[type="password"]').on('keypress', function(e) {
			if (e.key === 'Enter') {
				$(this).closest('form').submit();
			}
		});
	});
	
})(jQuery);
