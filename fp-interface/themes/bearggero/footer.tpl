		</div> <!-- end of #outer-container -->

		<footer id="footer">
			<div class="footer-widgets">
				{widgets pos=footer}
					<div class="widget {$id}">
						<h4>{$subject}</h4>
						{$content}
					</div>
				{/widgets}
			</div>

			{action hook=wp_footer}
			<p class="credits">
				This blog is proudly powered by <a href="https://www.flatpress.org/">FlatPress</a>.
			</p>
		</footer>
	</div>
</body>
</html>
