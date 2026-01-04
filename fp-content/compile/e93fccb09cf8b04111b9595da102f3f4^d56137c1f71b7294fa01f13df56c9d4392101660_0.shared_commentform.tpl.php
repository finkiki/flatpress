<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:48:02
  from 'shared:comment-form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a29423e7a96_12874026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd56137c1f71b7294fa01f13df56c9d4392101660' => 
    array (
      0 => 'comment-form.tpl',
      1 => 1767515761,
      2 => 'shared',
    ),
  ),
  'includes' => 
  array (
    'shared:errorlist.tpl' => 1,
    'plugin:bbcode/comment_toolbar' => 1,
  ),
))) {
function content_695a29423e7a96_12874026 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '.';
if (!$_smarty_tpl->getValue('entry_commslock')) {?>

	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('function_exists')('plugin_feed_head')) {?>
	<p class="alignright">
		<a href="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('link')($_smarty_tpl->getValue('flatpress')['params']['entry'],'comments_link');?>
feed/rss2/" title="<?php echo $_smarty_tpl->getValue('lang')['plugin']['feed']['rss'];?>
" target="_blank"><span class="icon-rss"></span>RSS</a> | 
		<a href="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('link')($_smarty_tpl->getValue('flatpress')['params']['entry'],'comments_link');?>
feed/atom/" title="<?php echo $_smarty_tpl->getValue('lang')['plugin']['feed']['atom'];?>
" target="_blank"><span class="icon-rss"></span>ATOM</a>
	</p><br>
	<?php }?>

	<h4 id="addcomment"><?php echo $_smarty_tpl->getValue('lang')['comments']['head'];?>
</h4>

	<?php if (!$_smarty_tpl->getValue('flatpress')['loggedin']) {?>
	<p><?php echo $_smarty_tpl->getValue('lang')['comments']['descr'];?>
</p>
	<?php }?>

	<form id="commentform" method="post" action="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('link')($_smarty_tpl->getValue('flatpress')['params']['entry'],'comments_link');?>
#commentform" enctype="multipart/form-data">
	<input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->getValue('csrf_token');?>
">

		<?php $_smarty_tpl->renderSubTemplate("shared:errorlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>


		<?php if (!$_smarty_tpl->getValue('flatpress')['loggedin']) {?>

				<div id="comment-userdata">

			<p>
			<?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null))) && (true && (true && null !== ($_smarty_tpl->getValue('error')['name'] ?? null))) && !( !true || empty($_smarty_tpl->getValue('error')['name']))) {?>
				<?php $_smarty_tpl->assign('class', "field-error", false, NULL);?>
			<?php } else { ?>
				<?php $_smarty_tpl->assign('class', '', false, NULL);?>
			<?php }?>
			<?php if ((true && ($_smarty_tpl->hasVariable('values') && null !== ($_smarty_tpl->getValue('values') ?? null))) && (true && (true && null !== ($_smarty_tpl->getValue('values')['name'] ?? null))) && !( !true || empty($_smarty_tpl->getValue('values')['name']))) {?>
				<?php $_smarty_tpl->assign('namevalue', $_smarty_tpl->getValue('values')['name'], false, NULL);?>
			<?php } else { ?>
				<?php $_smarty_tpl->assign('namevalue', '', false, NULL);?>
			<?php }?>
			<input type="text" class="<?php echo $_smarty_tpl->getValue('class');?>
" name="name" id="name" value="<?php echo (($tmp = $_smarty_tpl->getSmarty()->getModifierCallback('wp_specialchars')($_smarty_tpl->getValue('namevalue'),1) ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('cookie')['name'] ?? null : $tmp);?>
">
			<label class="textlabel" for="name"><?php echo $_smarty_tpl->getValue('lang')['comments']['name'];?>
</label>
			</p>

			<p>
			<?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null))) && (true && (true && null !== ($_smarty_tpl->getValue('error')['email'] ?? null))) && !( !true || empty($_smarty_tpl->getValue('error')['email']))) {?>
				<?php $_smarty_tpl->assign('class', "field-error", false, NULL);?>
			<?php } else { ?>
				<?php $_smarty_tpl->assign('class', '', false, NULL);?>
			<?php }?>
			<?php if ((true && ($_smarty_tpl->hasVariable('values') && null !== ($_smarty_tpl->getValue('values') ?? null))) && (true && (true && null !== ($_smarty_tpl->getValue('values')['email'] ?? null))) && !( !true || empty($_smarty_tpl->getValue('values')['email']))) {?>
				<?php $_smarty_tpl->assign('emailvalue', $_smarty_tpl->getValue('values')['email'], false, NULL);?>
			<?php } else { ?>
				<?php $_smarty_tpl->assign('emailvalue', '', false, NULL);?>
			<?php }?>
			<input type="text" class="<?php echo $_smarty_tpl->getValue('class');?>
" name="email" id="email" value="<?php echo (($tmp = $_smarty_tpl->getSmarty()->getModifierCallback('wp_specialchars')($_smarty_tpl->getValue('emailvalue'),1) ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('cookie')['email'] ?? null : $tmp);?>
">
			<label class="textlabel" for="email"><?php echo $_smarty_tpl->getValue('lang')['comments']['email'];?>
</label>
			</p>

			<p>
			<?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null))) && (true && (true && null !== ($_smarty_tpl->getValue('error')['url'] ?? null))) && !( !true || empty($_smarty_tpl->getValue('error')['url']))) {?>
				<?php $_smarty_tpl->assign('class', "field-error", false, NULL);?>
			<?php } else { ?>
				<?php $_smarty_tpl->assign('class', '', false, NULL);?>
			<?php }?>
			<?php if ((true && ($_smarty_tpl->hasVariable('values') && null !== ($_smarty_tpl->getValue('values') ?? null))) && (true && (true && null !== ($_smarty_tpl->getValue('values')['url'] ?? null))) && !( !true || empty($_smarty_tpl->getValue('values')['url']))) {?>
				<?php $_smarty_tpl->assign('urlvalue', $_smarty_tpl->getValue('values')['url'], false, NULL);?>
			<?php } else { ?>
				<?php $_smarty_tpl->assign('urlvalue', '', false, NULL);?>
			<?php }?>
			<input type="text" class="<?php echo $_smarty_tpl->getValue('class');?>
" name="url" id="url" value="<?php echo (($tmp = $_smarty_tpl->getSmarty()->getModifierCallback('wp_specialchars')($_smarty_tpl->getValue('urlvalue'),1) ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('cookie')['url'] ?? null : $tmp);?>
">
			<label class="textlabel" for="url"><?php echo $_smarty_tpl->getValue('lang')['comments']['www'];?>
</label>
			</p>

						<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('comment_form')->handle(array(), $_smarty_tpl);?>


		</div>

		<?php }?>

		<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('function_exists')('plugin_bbcode_init') && $_smarty_tpl->getValue('fp_config')['plugins']['bbcode']['comments'] == true) {?>
			<?php $_smarty_tpl->renderSubTemplate("plugin:bbcode/comment_toolbar", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
		<?php }?>

		<!-- BOF Custom toolbar --><?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('action')->handle(array('hook'=>'simple_toolbar_form'), $_smarty_tpl);?>
<!-- EOF Custom toolbar -->

		<div class="comment-content">
				<?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null))) && (true && (true && null !== ($_smarty_tpl->getValue('error')['content'] ?? null))) && !( !true || empty($_smarty_tpl->getValue('error')['content']))) {?>
					<?php $_smarty_tpl->assign('class', "field-error", false, NULL);?>
				<?php } else { ?>
					<?php $_smarty_tpl->assign('class', '', false, NULL);?>
				<?php }?>
				<?php if ((true && ($_smarty_tpl->hasVariable('values') && null !== ($_smarty_tpl->getValue('values') ?? null))) && (true && (true && null !== ($_smarty_tpl->getValue('values')['content'] ?? null))) && !( !true || empty($_smarty_tpl->getValue('values')['content']))) {?>
					<?php $_smarty_tpl->assign('contentvalue', $_smarty_tpl->getValue('values')['content'], false, NULL);?>
				<?php } else { ?>
					<?php $_smarty_tpl->assign('contentvalue', '', false, NULL);?>
				<?php }?>
				<p><textarea name="content" class="<?php echo $_smarty_tpl->getValue('class');?>
" 
				id="content" rows="10" cols="74"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('wp_specialchars')($_smarty_tpl->getValue('contentvalue'),1);?>
</textarea></p>
						</div>

		<div class="buttonbar">
		<input type="submit" name="submit" id="submit" value="<?php echo $_smarty_tpl->getValue('lang')['comments']['submit'];?>
">
		</div>

	</form>
<?php }
}
}
