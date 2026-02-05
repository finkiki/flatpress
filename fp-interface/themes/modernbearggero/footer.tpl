		</div> <!-- end #content-wrapper -->
		
		<footer id="site-footer">
			{* Footer widgets *}
			{capture name="footer_widgets"}
				{widgets pos=footer}
					<div class="footer-widget" id="{$id}">
						{if isset($subject) && $subject}<h4 class="footer-widget-title">{$subject}</h4>{/if}
						{$content}
					</div>
				{/widgets}
			{/capture}
			
			{if $smarty.capture.footer_widgets|strip}
				<div class="footer-widgets-area">
					{$smarty.capture.footer_widgets}
				</div>
			{/if}
			
			<div class="site-info">
				{action hook=wp_footer}
				
				<p class="powered-by">
					This blog is proudly powered by <a href="https://www.flatpress.org/" target="_blank" rel="noopener">FlatPress</a>.
				</p>
			</div>
		</footer>
		
	</div> <!-- end #page-container -->
	
	<script>
	// Mobile menu toggle
	(function() {
		var menuToggle = document.querySelector('.menu-toggle');
		var menuWrapper = document.querySelector('.menu-wrapper');
		
		if (menuToggle && menuWrapper) {
			menuToggle.addEventListener('click', function() {
				var expanded = this.getAttribute('aria-expanded') === 'true';
				this.setAttribute('aria-expanded', !expanded);
				menuWrapper.classList.toggle('is-open');
			});
		}
	})();
	</script>
</body>
</html>
