<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:45:54
  from 'shared:errorlist.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a28c218f092_77105300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed321f02c9e61ff5622cba6c8d692817008b7911' => 
    array (
      0 => 'errorlist.tpl',
      1 => 1767515761,
      2 => 'shared',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695a28c218f092_77105300 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '.';
?><div id="errorlist">
		<?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
		<ul class="msgs errors">
			<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('error'), 'msg', false, 'field');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('field')->value => $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
			<li>
			<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('is_numeric')($_smarty_tpl->getValue('field'))) {?>
				<?php echo $_smarty_tpl->getValue('msg');?>
 
			<?php } else { ?>
				<a href="#<?php echo $_smarty_tpl->getValue('field');?>
"><?php echo $_smarty_tpl->getValue('msg');?>
</a>
			<?php }?>
			</li>
			<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ul>
		<?php }?>
		
		<?php if ((true && ($_smarty_tpl->hasVariable('warnings') && null !== ($_smarty_tpl->getValue('warnings') ?? null))) && !( !$_smarty_tpl->hasVariable('warnings') || empty($_smarty_tpl->getValue('warnings')))) {?>
		<ul class="msgs warnings">
			<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('warnings'), 'msg', false, 'field');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('field')->value => $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
			<li>
			<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('is_numeric')($_smarty_tpl->getValue('field'))) {?>
				<?php echo $_smarty_tpl->getValue('msg');?>
 
			<?php } else { ?>
				<a href="#<?php echo $_smarty_tpl->getValue('field');?>
"><?php echo $_smarty_tpl->getValue('msg');?>
</a>
			<?php }?>
			</li>
			<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ul>
		<?php }?>
		
		<?php if ((true && ($_smarty_tpl->hasVariable('notifications') && null !== ($_smarty_tpl->getValue('notifications') ?? null)))) {?>
		<ul class="msgs notifications">
			<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('notifications'), 'msg');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach2DoElse = false;
?>
			<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
			<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ul>
		<?php }?>

		
		<?php if ((true && ($_smarty_tpl->hasVariable('success') && null !== ($_smarty_tpl->getValue('success') ?? null)))) {?>
		<?php if ($_smarty_tpl->getValue('success') < 0) {?>
			<?php $_smarty_tpl->assign('class', 'errors', false, NULL);?>
		<?php } else { ?>
			<?php $_smarty_tpl->assign('class', 'notifications', false, NULL);?>
		<?php }?>
		<ul class="msgs <?php echo $_smarty_tpl->getValue('class');?>
">
			<li><?php echo $_smarty_tpl->getValue('panelstrings')['msgs'][$_smarty_tpl->getValue('success')];?>
</li>
		</ul>
		<?php }?>
</div>
<?php }
}
