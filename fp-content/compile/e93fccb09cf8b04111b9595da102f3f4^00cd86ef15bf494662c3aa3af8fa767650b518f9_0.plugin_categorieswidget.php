<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:46:42
  from 'plugin:categories/widget' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a28f2d5f515_89465525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00cd86ef15bf494662c3aa3af8fa767650b518f9' => 
    array (
      0 => 'categories/widget',
      1 => 1767515761,
      2 => 'plugin',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695a28f2d5f515_89465525 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '.';
echo $_smarty_tpl->getSmarty()->getFunctionHandler('list_categories')->handle(array('type'=>'linked','count'=>$_smarty_tpl->getValue('categories_showcount')), $_smarty_tpl);?>
 
<?php }
}
