<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:45:54
  from 'file:footer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a28c2197812_50601248',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53b16da378d0a2a010227a800190c33d797e0242' => 
    array (
      0 => 'footer.tpl',
      1 => 1767515761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695a28c2197812_50601248 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/fp-interface/themes/leggero';
?>		</div>
		
		
		<div id="footer">
			<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('action')->handle(array('hook'=>'wp_footer'), $_smarty_tpl);?>

			
			<!--
			
				Even though your not required to do this, we'd appreciate
				a lot if you didn't remove the notice above.
				
				This way we'll get a better ranking on search engines
				and you'll spread the FlatPress word all around the world :)
				
				If you really want to remove it, you may want to
				consider doing at least a small donation.  
			
			-->
			
			<p>
			This blog is proudly powered by <a href="https://www.flatpress.org/">FlatPress</a>.
			</p>
		</div> <!-- end of #footer -->

	</div>
</body>
</html>
<?php }
}
