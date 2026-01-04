<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:46:55
  from 'admin:main' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a28ffa12454_03537839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbb857ba7e95d131b246eb01d145a95d2288ef6a' => 
    array (
      0 => 'main',
      1 => 1767515760,
      2 => 'admin',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695a28ffa12454_03537839 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '.';
?><h2><?php echo $_smarty_tpl->getValue('panelstrings')['head'];?>
</h2>
<p><?php echo $_smarty_tpl->getValue('panelstrings')['descr'];?>
</p>
<dl>
	<dt class="admin-mainmenu-item">
		<img src="<?php echo (defined('ADMIN_DIR') ? constant('ADMIN_DIR') : null);?>
imgs/newentry.png" class="alignleft" alt="<?php echo $_smarty_tpl->getValue('panelstrings')['op1'];?>
"
		title="<?php echo $_smarty_tpl->getValue('panelstrings')['op1'];?>
">
		<a href="admin.php?p=entry&amp;action=write"><?php echo $_smarty_tpl->getValue('panelstrings')['op1'];?>
</a>
	</dt>
	<dd class="admin-icon-descr"><?php echo $_smarty_tpl->getValue('panelstrings')['op1d'];?>
</dd>

	<dt class="admin-mainmenu-item">
		<img src="<?php echo (defined('ADMIN_DIR') ? constant('ADMIN_DIR') : null);?>
imgs/entries.png" class="alignleft" alt="<?php echo $_smarty_tpl->getValue('panelstrings')['op2'];?>
"
		title="<?php echo $_smarty_tpl->getValue('panelstrings')['op2'];?>
">
		<a href="admin.php?p=entry"><?php echo $_smarty_tpl->getValue('panelstrings')['op2'];?>
</a>
	</dt>
	<dd class="admin-icon-descr"><?php echo $_smarty_tpl->getValue('panelstrings')['op2d'];?>
</dd>

	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('function_exists')('plugin_commentcenter_editor')) {?>
	<dt class="admin-mainmenu-item">
		<img src="<?php echo (defined('ADMIN_DIR') ? constant('ADMIN_DIR') : null);?>
imgs/commentcenter.png" class="alignleft" alt="<?php echo $_smarty_tpl->getValue('panelstrings')['op9'];?>
"
		title="<?php echo $_smarty_tpl->getValue('panelstrings')['op9'];?>
">
		<a href="admin.php?p=entry&action=commentcenter"><?php echo $_smarty_tpl->getValue('panelstrings')['op9'];?>
</a>
	</dt>
	<dd class="admin-icon-descr"><?php echo $_smarty_tpl->getValue('panelstrings')['op9d'];?>
</dd>
	<?php }?>

	<dt class="admin-mainmenu-item">
		<img src="<?php echo (defined('ADMIN_DIR') ? constant('ADMIN_DIR') : null);?>
imgs/uploader.png" class="alignleft" alt="<?php echo $_smarty_tpl->getValue('panelstrings')['op7'];?>
"
		title="<?php echo $_smarty_tpl->getValue('panelstrings')['op7'];?>
">
		<a href="admin.php?p=uploader"><?php echo $_smarty_tpl->getValue('panelstrings')['op7'];?>
</a>
	</dt>
	<dd class="admin-icon-descr"><?php echo $_smarty_tpl->getValue('panelstrings')['op7d'];?>
</dd>

	<dt class="admin-mainmenu-item">
		<img src="<?php echo (defined('ADMIN_DIR') ? constant('ADMIN_DIR') : null);?>
imgs/widgets.png" class="alignleft" alt="<?php echo $_smarty_tpl->getValue('panelstrings')['op3'];?>
"
		title="<?php echo $_smarty_tpl->getValue('panelstrings')['op3'];?>
">
		<a href="admin.php?p=widgets"><?php echo $_smarty_tpl->getValue('panelstrings')['op3'];?>
</a>
	</dt>
	<dd class="admin-icon-descr"><?php echo $_smarty_tpl->getValue('panelstrings')['op3d'];?>
</dd>

	<dt class="admin-mainmenu-item">
		<img src="<?php echo (defined('ADMIN_DIR') ? constant('ADMIN_DIR') : null);?>
imgs/plugins.png" class="alignleft" alt="<?php echo $_smarty_tpl->getValue('panelstrings')['op4'];?>
"
		title="<?php echo $_smarty_tpl->getValue('panelstrings')['op4'];?>
">
		<a href="admin.php?p=plugin"><?php echo $_smarty_tpl->getValue('panelstrings')['op4'];?>
</a>
	</dt>
	<dd class="admin-icon-descr"><?php echo $_smarty_tpl->getValue('panelstrings')['op4d'];?>
</dd>

	<dt class="admin-mainmenu-item">
		<img src="<?php echo (defined('ADMIN_DIR') ? constant('ADMIN_DIR') : null);?>
imgs/themes.png" class="alignleft" alt="<?php echo $_smarty_tpl->getValue('panelstrings')['op8'];?>
"
		title="<?php echo $_smarty_tpl->getValue('panelstrings')['op8'];?>
">
		<a href="admin.php?p=themes"><?php echo $_smarty_tpl->getValue('panelstrings')['op8'];?>
</a>
	</dt>
	<dd class="admin-icon-descr"><?php echo $_smarty_tpl->getValue('panelstrings')['op8d'];?>
</dd>

	<dt class="admin-mainmenu-item">
		<img src="<?php echo (defined('ADMIN_DIR') ? constant('ADMIN_DIR') : null);?>
imgs/config.png" class="alignleft" alt="<?php echo $_smarty_tpl->getValue('panelstrings')['op5'];?>
"
		title="<?php echo $_smarty_tpl->getValue('panelstrings')['op5'];?>
">
		<a href="admin.php?p=config"><?php echo $_smarty_tpl->getValue('panelstrings')['op5'];?>
</a>
	</dt>
	<dd class="admin-icon-descr"><?php echo $_smarty_tpl->getValue('panelstrings')['op5d'];?>
</dd>

	<dt class="admin-mainmenu-item">
		<img src="<?php echo (defined('ADMIN_DIR') ? constant('ADMIN_DIR') : null);?>
imgs/maintain.png" class="alignleft" alt="<?php echo $_smarty_tpl->getValue('panelstrings')['op6'];?>
"
		title="<?php echo $_smarty_tpl->getValue('panelstrings')['op6'];?>
">
		<a href="admin.php?p=maintain"><?php echo $_smarty_tpl->getValue('panelstrings')['op6'];?>
</a>
	</dt>
	<dd class="admin-icon-descr"><?php echo $_smarty_tpl->getValue('panelstrings')['op6d'];?>
</dd>

</dl>
<?php }
}
