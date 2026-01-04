<?php
/* Smarty version 5.7.0, created on 2026-01-04 10:07:45
  from 'file:widgets.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a3bf17e3434_91826367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c8bf0f6361adf4a423349a83f7afc11eaf5df17' => 
    array (
      0 => 'widgets.tpl',
      1 => 1767521041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695a3bf17e3434_91826367 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/fp-interface/themes/leggero';
?>		
		<div id="column">
		
		<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('widgets')) {
throw new \Smarty\Exception('block tag \'widgets\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('widgets')->handle(array('pos'=>'right'), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>	
			<div id="<?php echo $_smarty_tpl->getValue('id');?>
">
			<h4><?php echo $_smarty_tpl->getValue('subject');?>
</h4>
			<?php echo $_smarty_tpl->getValue('content');?>

			</div>
		<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('widgets')->handle(array('pos'=>'right'), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>
		
		<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('widgets')) {
throw new \Smarty\Exception('block tag \'widgets\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('widgets')->handle(array('pos'=>'left'), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>
			<div id="<?php echo $_smarty_tpl->getValue('id');?>
">		
			<h4><?php echo $_smarty_tpl->getValue('subject');?>
</h4>
			<?php echo $_smarty_tpl->getValue('content');?>

			</div>
		<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('widgets')->handle(array('pos'=>'left'), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>

		
		</div>

<?php }
}
