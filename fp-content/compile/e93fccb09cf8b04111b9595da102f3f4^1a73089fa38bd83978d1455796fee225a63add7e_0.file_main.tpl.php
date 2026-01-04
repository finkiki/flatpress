<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:46:55
  from 'file:/home/runner/work/flatpress/flatpress/admin/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a28ff9e0378_06072732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a73089fa38bd83978d1455796fee225a63add7e' => 
    array (
      0 => '/home/runner/work/flatpress/flatpress/admin/main.tpl',
      1 => 1767515760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695a28ff9e0378_06072732 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/admin';
?>
	<ul id="admin-tabmenu">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('menubar'), 'tab');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tab')->value) {
$foreach0DoElse = false;
?>
		<?php if ($_smarty_tpl->getValue('tab') == $_smarty_tpl->getValue('panel')) {?>

		<li id="admin-<?php echo $_smarty_tpl->getValue('tab');?>
-parentmenu">
			<a class="admin-tab-current" href="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
admin.php?p=<?php echo $_smarty_tpl->getValue('tab');?>
">
				<?php echo (($tmp = $_smarty_tpl->getValue('lang')['admin']['panels'][$_smarty_tpl->getValue('tab')] ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('tab') ?? null : $tmp);?>

			</a>
		</li>
		<?php } else { ?>
		<li id="admin-<?php echo $_smarty_tpl->getValue('tab');?>
-parentmenu">
			<a href="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
admin.php?p=<?php echo $_smarty_tpl->getValue('tab');?>
">
				<?php echo (($tmp = $_smarty_tpl->getValue('lang')['admin']['panels'][$_smarty_tpl->getValue('tab')] ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('tab') ?? null : $tmp);?>

			</a>
		</li>
		<?php }?>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
	</ul>

	<?php if ((true && ($_smarty_tpl->hasVariable('submenu') && null !== ($_smarty_tpl->getValue('submenu') ?? null)))) {?>
	<ul id="admin-submenu">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('submenu'), 'item', false, 'subtab');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('subtab')->value => $_smarty_tpl->getVariable('item')->value) {
$foreach1DoElse = false;
?>
		<?php if ($_smarty_tpl->getValue('item')) {?>
		<li id="admin-<?php echo $_smarty_tpl->getValue('panel');?>
-<?php echo $_smarty_tpl->getValue('subtab');?>
-submenu">
			<a <?php if ($_smarty_tpl->getValue('action') == $_smarty_tpl->getValue('subtab')) {?>class="active" <?php }?>
				href="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
admin.php?p=<?php echo $_smarty_tpl->getValue('panel');?>
&amp;action=<?php echo $_smarty_tpl->getValue('subtab');?>
">
			<?php echo (($tmp = $_smarty_tpl->getValue('lang')['admin'][$_smarty_tpl->getValue('panel')]['submenu'][$_smarty_tpl->getValue('subtab')] ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('subtab') ?? null : $tmp);?>

			</a>
		</li>
		<?php }?>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
	</ul>
	<?php }?>

	<div id="admin-content">
	<?php if ((true && ($_smarty_tpl->hasVariable('action') && null !== ($_smarty_tpl->getValue('action') ?? null)))) {?>
		<?php $_smarty_tpl->renderSubTemplate((($tmp = $_smarty_tpl->getValue('admin_resource') ?? null)===null||$tmp==='' ? "admin:".((string)$_smarty_tpl->getValue('panel'))."/".((string)$_smarty_tpl->getValue('action')) ?? null : $tmp), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
	<?php } else { ?>
		<?php $_smarty_tpl->renderSubTemplate((($tmp = $_smarty_tpl->getValue('admin_resource') ?? null)===null||$tmp==='' ? "admin:".((string)$_smarty_tpl->getValue('panel')) ?? null : $tmp), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
	<?php }?>
	</div>
<?php }
}
