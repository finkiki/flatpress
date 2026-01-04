<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:48:02
  from 'file:comments.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a294236ad60_14712349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34aa57150f2501897aca592980b226707f5bd496' => 
    array (
      0 => 'comments.tpl',
      1 => 1767515761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:entry-default.tpl' => 1,
    'shared:commentadminctrls.tpl' => 1,
    'shared:comment-form.tpl' => 1,
    'file:widgets.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_695a294236ad60_14712349 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/fp-interface/themes/leggero';
$_smarty_tpl->renderSubTemplate("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

		<div id="main">
		<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('entry_block')) {
throw new \Smarty\Exception('block tag \'entry_block\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('entry_block')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>
		<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('entry')) {
throw new \Smarty\Exception('block tag \'entry\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('entry')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>
			<?php $_smarty_tpl->renderSubTemplate("file:entry-default.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
		<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('comment_block')) {
throw new \Smarty\Exception('block tag \'comment_block\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('comment_block')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>
		<ol id="comments">
		<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('comment')) {
throw new \Smarty\Exception('block tag \'comment\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('comment')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>
			<li id="<?php echo $_smarty_tpl->getValue('id');?>
" <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('notempty')($_smarty_tpl->getValue('loggedin'),"class=\"comment-admin\"");?>
>

				<strong class='comment-name'>
								<?php echo (($tmp = $_smarty_tpl->getSmarty()->getModifierCallback('notempty')($_smarty_tpl->getValue('url'),"<a href=\"".((string)$_smarty_tpl->getValue('url'))."\" rel=\"nofollow\" title=\"Visit ".((string)$_smarty_tpl->getValue('url'))."\">".((string)$_smarty_tpl->getValue('name'))."</a>") ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('name') ?? null : $tmp);?>

				</strong>

				<?php $_smarty_tpl->renderSubTemplate("shared:commentadminctrls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?> 
				<p class="date">
				<a href="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('link')($_smarty_tpl->getValue('entryid'),'comments_link');?>
#<?php echo $_smarty_tpl->getValue('id');?>
" title="Permalink to <?php echo $_smarty_tpl->getValue('name');?>
's comment"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format_daily')($_smarty_tpl->getValue('date'));?>
 <?php echo $_smarty_tpl->getValue('lang')['entryauthor']['at'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('date'),((string)$_smarty_tpl->getValue('fp_config')['locale']['timeformat']));?>
</a>
				</p>

				<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('tag')($_smarty_tpl->getValue('content'),'comment_text');?>


			</li>
		<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('comment')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>
		</ol>
		<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('comment_block')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>

		<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('entry')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>

			<div class="navigation">
				<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('nextpage')->handle(array(), $_smarty_tpl);
echo $_smarty_tpl->getSmarty()->getFunctionHandler('prevpage')->handle(array(), $_smarty_tpl);?>

			</div>

		<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('entry_block')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>

		<?php $_smarty_tpl->renderSubTemplate("shared:comment-form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

		</div>

		<?php $_smarty_tpl->renderSubTemplate("file:widgets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
