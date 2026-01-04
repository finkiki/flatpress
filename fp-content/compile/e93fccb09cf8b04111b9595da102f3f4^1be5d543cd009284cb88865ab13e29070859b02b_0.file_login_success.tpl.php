<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:46:55
  from 'file:/home/runner/work/flatpress/flatpress/fp-interface/sharedtpls/login_success.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a28ff7ee6f3_89195085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1be5d543cd009284cb88865ab13e29070859b02b' => 
    array (
      0 => '/home/runner/work/flatpress/flatpress/fp-interface/sharedtpls/login_success.tpl',
      1 => 1767515761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695a28ff7ee6f3_89195085 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/fp-interface/sharedtpls';
if ((true && (true && null !== ($_REQUEST['do'] ?? null))) && $_REQUEST['do']['logout']) {?>
<p><?php echo $_smarty_tpl->getValue('lang')['login']['success']['logout'];?>
</p>
<?php if ((true && (true && null !== ($_REQUEST['redirect'] ?? null)))) {?>
<p><?php echo $_smarty_tpl->getValue('lang')['login']['success']['redirect'];?>
 <a href="<?php echo $_REQUEST['redirect'];?>
"><?php echo $_REQUEST['redirect'];?>
</a>
<?php }?>

<ul>
	<li><a href="index.php"><?php echo $_smarty_tpl->getValue('lang')['login']['success']['opt1'];?>
</a></li>
</ul>
<?php } else { ?>
<p><?php echo $_smarty_tpl->getValue('lang')['login']['success']['success'];?>
</p>
<?php if ((true && ($_smarty_tpl->hasVariable('redirect') && null !== ($_smarty_tpl->getValue('redirect') ?? null)))) {?>
<p><?php echo $_smarty_tpl->getValue('lang')['login']['success']['redirect'];?>

<?php }?>

<ul>
	<li><a href="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
">
		<?php echo $_smarty_tpl->getValue('lang')['login']['success']['opt1'];?>

	</a></li>
	<li><a href="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
admin.php?p=main">
		<?php echo $_smarty_tpl->getValue('lang')['login']['success']['opt2'];?>

	</a></li>
	<li><a href="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
admin.php?p=entry&amp;action=write">
		<?php echo $_smarty_tpl->getValue('lang')['login']['success']['opt3'];?>

	</a></li>
</ul>
<?php }
}
}
