<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:46:55
  from 'file:admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a28ff9bc050_34620560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b5ca6af324c08d64211561aa2516859b0e3fd8b' => 
    array (
      0 => 'admin.tpl',
      1 => 1767515761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cpheader.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_695a28ff9bc050_34620560 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/fp-interface/themes/leggero';
$_smarty_tpl->renderSubTemplate("file:cpheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

		<div id="cpmain">
			

		<div class="entry">
		
		<ul id="admin-small-nav">
			<li><a href="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
"><?php echo $_smarty_tpl->getValue('lang')['admin']['general']['startpage'];?>
</a></li>
			<li><a href="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
login.php?do=logout"><?php echo $_smarty_tpl->getValue('lang')['admin']['general']['logout'];?>
</a></li>
		</ul>
		
		<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('page')) {
throw new \Smarty\Exception('block tag \'page\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('page')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>
				<h1 class="title"><?php echo $_smarty_tpl->getValue('subject');?>
</h1>
				<div class="body"><?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('controlpanel')->handle(array(), $_smarty_tpl);?>
</div>
		<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('page')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>
		</div>
		
		</div>
	
<?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>



<?php }
}
