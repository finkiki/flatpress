<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:46:55
  from 'file:cpheader.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a28ff9c6682_25959313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26bcc25db1b0aeac3276af79fb610d4055968c2b' => 
    array (
      0 => 'cpheader.tpl',
      1 => 1767515761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695a28ff9c6682_25959313 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/fp-interface/themes/leggero';
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $_smarty_tpl->getValue('fp_config')['locale']['lang'];?>
">
<head>
	<title><?php echo $_smarty_tpl->getValue('flatpress')['title'];
echo $_smarty_tpl->getValue('pagetitle');?>
</title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->getValue('fp_config')['locale']['charset'];?>
">
	<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('action')->handle(array('hook'=>'wp_head'), $_smarty_tpl);?>

	<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('action')->handle(array('hook'=>'admin_head'), $_smarty_tpl);?>

</head>

<?php if (!(true && ($_smarty_tpl->hasVariable('panel') && null !== ($_smarty_tpl->getValue('panel') ?? null)))) {?> <?php $_smarty_tpl->assign('panel', '', false, NULL);?> <?php }
if (!(true && ($_smarty_tpl->hasVariable('action') && null !== ($_smarty_tpl->getValue('action') ?? null)))) {?> <?php $_smarty_tpl->assign('action', '', false, NULL);?> <?php }?>
<body class="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('tag')("admin-".((string)$_smarty_tpl->getValue('panel'))."-".((string)$_smarty_tpl->getValue('action')),'admin_body_class');?>
">
	<div id="body-container">
	<div id="outer-container">
	
<?php }
}
