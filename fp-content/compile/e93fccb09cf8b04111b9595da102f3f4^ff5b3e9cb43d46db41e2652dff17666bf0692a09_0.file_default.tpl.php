<?php
/* Smarty version 5.7.0, created on 2026-01-04 10:07:45
  from 'file:default.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a3bf17a1e94_73585858',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff5b3e9cb43d46db41e2652dff17666bf0692a09' => 
    array (
      0 => 'default.tpl',
      1 => 1767521041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:widgets.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_695a3bf17a1e94_73585858 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/fp-interface/themes/leggero';
$_smarty_tpl->renderSubTemplate("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
	
			<div id="main">
				

			<div class="entry">
				<h2 class="title"><?php echo $_smarty_tpl->getValue('subject');?>
</h2>
				<div class="body">
				
				<?php if ((true && ($_smarty_tpl->hasVariable('rawcontent') && null !== ($_smarty_tpl->getValue('rawcontent') ?? null))) && $_smarty_tpl->getValue('rawcontent')) {?> <?php echo $_smarty_tpl->getValue('content');?>

				<?php } else { ?>	<?php $_smarty_tpl->renderSubTemplate($_smarty_tpl->getValue('content'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}?>
				
				</div>
			</div>
			
			</div>
			
			<?php $_smarty_tpl->renderSubTemplate("file:widgets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
			
<?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>



<?php }
}
