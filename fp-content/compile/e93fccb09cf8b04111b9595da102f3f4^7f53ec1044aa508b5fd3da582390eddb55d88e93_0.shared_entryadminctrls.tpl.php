<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:47:53
  from 'shared:entryadminctrls.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a29399803d3_97633050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f53ec1044aa508b5fd3da582390eddb55d88e93' => 
    array (
      0 => 'entryadminctrls.tpl',
      1 => 1767515761,
      2 => 'shared',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695a29399803d3_97633050 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '.';
$_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('admincontrols')) {
throw new \Smarty\Exception('block tag \'admincontrols\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('admincontrols')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>
<div class="admincontrols">
<a href="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
admin.php?p=entry&amp;entry=<?php echo $_smarty_tpl->getValue('id');?>
&amp;action=write">[<?php echo $_smarty_tpl->getValue('lang')['main']['btn_edit'];?>
]</a>
<a href="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
admin.php?p=entry&amp;entry=<?php echo $_smarty_tpl->getValue('id');?>
&amp;action=delete">[<?php echo $_smarty_tpl->getValue('lang')['main']['btn_delete'];?>
]</a>
</div>
<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('admincontrols')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
}
}
