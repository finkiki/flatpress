<?php
/* Smarty version 5.7.0, created on 2026-01-04 10:07:45
  from 'file:/home/runner/work/flatpress/flatpress/fp-interface/sharedtpls/login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a3bf17c3948_61845163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1258d0a01ef8ba97991dec2cd52d169fd1aecc0b' => 
    array (
      0 => '/home/runner/work/flatpress/flatpress/fp-interface/sharedtpls/login.tpl',
      1 => 1767521041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'shared:errorlist.tpl' => 1,
  ),
))) {
function content_695a3bf17c3948_61845163 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/fp-interface/sharedtpls';
$_smarty_tpl->renderSubTemplate("shared:errorlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<form id="login" method="post" action="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
login.php" enctype="multipart/form-data">

	<input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->getValue('csrf_token');?>
">

	<fieldset><legend><?php echo $_smarty_tpl->getValue('lang')['login']['fieldset1'];?>
</legend>
	<p><label for="user"><?php echo $_smarty_tpl->getValue('lang')['login']['user'];?>
</label><br>
	<?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null))) && (true && (true && null !== ($_smarty_tpl->getValue('error')['user'] ?? null)))) {?>
		<input autofocus <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('notempty')($_smarty_tpl->getValue('error')['user'],'class="field-error"');?>
 type="text" name="user" id="user" <?php if ($_POST['user']) {?>value="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('wp_specialchars')($_POST['user'],true);?>
"<?php }?>></p>
	<?php } elseif ((true && (true && null !== ($_POST['user'] ?? null)))) {?>
		<input autofocus type="text" name="user" id="user" <?php if ($_POST['user']) {?>value="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('wp_specialchars')($_POST['user'],true);?>
"<?php }?>></p>
	<?php } else { ?>
		<input autofocus type="text" name="user" id="user"></p>
	<?php }?>
	<p><label for="pass"><?php echo $_smarty_tpl->getValue('lang')['login']['pass'];?>
</label><br>
	<?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null))) && (true && (true && null !== ($_smarty_tpl->getValue('error')['pass'] ?? null)))) {?>
		<input type="password" <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('notempty')($_smarty_tpl->getValue('error')['pass'],'class="field-error"');?>
 name="pass" id="pass"></p>
	<?php } else { ?>
		<input type="password" name="pass" id="pass"></p>
	<?php }?>
	</fieldset>

	<div class="buttonbar">
	<input type="submit" name="submit" id="submit" value="<?php echo $_smarty_tpl->getValue('lang')['login']['submit'];?>
">
		</div>

</form>
<?php }
}
