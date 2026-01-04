<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:47:53
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a2939946f00_12504468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f0914f0a7b18d1d73d05383ec92e155c798921b' => 
    array (
      0 => 'index.tpl',
      1 => 1767515761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:entry-default.tpl' => 1,
    'file:widgets.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_695a2939946f00_12504468 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/fp-interface/themes/leggero';
$_smarty_tpl->renderSubTemplate("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

		<div id="main">
		
		
		<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('entry_block')) {
throw new \Smarty\Exception('block tag \'entry_block\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('entry_block')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>
		
			<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('entry')) {
throw new \Smarty\Exception('block tag \'entry\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('entry')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>
			<?php $_smarty_tpl->renderSubTemplate('file:entry-default.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
			<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('entry')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>
		
			<div class="navigation">
				<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('nextpage')->handle(array(), $_smarty_tpl);
echo $_smarty_tpl->getSmarty()->getFunctionHandler('prevpage')->handle(array(), $_smarty_tpl);?>

			</div>
			
		<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('entry_block')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>

		</div>
			

		<?php $_smarty_tpl->renderSubTemplate("file:widgets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
				
<?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
