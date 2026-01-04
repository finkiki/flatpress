<?php
/* Smarty version 5.7.0, created on 2026-01-04 10:07:45
  from 'file:header.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a3bf17afb03_77370030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f74b7fee37fca214ea33ad99e75f20adc22695ee' => 
    array (
      0 => 'header.tpl',
      1 => 1767521041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695a3bf17afb03_77370030 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/fp-interface/themes/leggero';
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $_smarty_tpl->getValue('fp_config')['locale']['lang'];?>
">
<head>
	<title><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('tag')($_smarty_tpl->getValue('flatpress')['title'],'wp_title','&laquo;');?>
</title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->getValue('fp_config')['locale']['charset'];?>
">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('action')->handle(array('hook'=>'wp_head'), $_smarty_tpl);?>

</head>

<body>
	<div id="body-container">

		<div id="head">
			<h1><a href="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
"><?php echo $_smarty_tpl->getValue('flatpress')['title'];?>
</a></h1>
			<p class="subtitle"><?php echo $_smarty_tpl->getValue('flatpress')['subtitle'];?>
</p>
		</div> <!-- end of #head -->
	
	<div id="outer-container">
<?php }
}
