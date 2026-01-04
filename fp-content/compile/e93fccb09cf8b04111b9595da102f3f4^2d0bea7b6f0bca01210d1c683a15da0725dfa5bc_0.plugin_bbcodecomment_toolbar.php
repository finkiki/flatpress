<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:48:02
  from 'plugin:bbcode/comment_toolbar' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a29423fa840_40186911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d0bea7b6f0bca01210d1c683a15da0725dfa5bc' => 
    array (
      0 => 'bbcode/comment_toolbar',
      1 => 1767515761,
      2 => 'plugin',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695a29423fa840_40186911 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '.';
?><p class="alignright">
	<a class="hint externlink" href="https://wiki.flatpress.org/doc:plugins:bbcode" target="_blank"><?php echo $_smarty_tpl->getValue('lang')['admin']['plugin']['bbcode']['editor']['help'];?>
</a>
</p>

<div class="bb-btn-tlb" style="clear:both">
	<p>
		<button class="bb-button" type="button" id="bb_url" accesskey="" title="<?php echo $_smarty_tpl->getValue('lang')['admin']['plugin']['bbcode']['editor']['urltitle'];?>
"><img src="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
fp-plugins/bbcode/res/toolbaricons/link.svg" alt="url"></button>
		<button class="bb-button" type="button" id="bb_ul" accesskey="" title="<?php echo $_smarty_tpl->getValue('lang')['admin']['plugin']['bbcode']['editor']['unorderedlisttitle'];?>
"><img src="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
fp-plugins/bbcode/res/toolbaricons/ul.svg" alt="ul"></button>
		<button class="bb-button" type="button" id="bb_ol" accesskey="" title="<?php echo $_smarty_tpl->getValue('lang')['admin']['plugin']['bbcode']['editor']['orderedlisttitle'];?>
"><img src="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
fp-plugins/bbcode/res/toolbaricons/ol.svg" alt="ol"></button>
		<button class="bb-button" type="button" id="bb_quote" accesskey="" title="<?php echo $_smarty_tpl->getValue('lang')['admin']['plugin']['bbcode']['editor']['quotetitle'];?>
"><img src="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
fp-plugins/bbcode/res/toolbaricons/quote.svg" alt="quote"></button>
		<button class="bb-button" type="button" id="bb_code" accesskey="" title="<?php echo $_smarty_tpl->getValue('lang')['admin']['plugin']['bbcode']['editor']['codetitle'];?>
"><img src="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
fp-plugins/bbcode/res/toolbaricons/code.svg" alt="code"></button>
		&nbsp;
	</p>
	<p>
		<button class="bb-button" type="button" id="bb_b" accesskey="" title="<?php echo $_smarty_tpl->getValue('lang')['admin']['plugin']['bbcode']['editor']['boldtitle'];?>
"><img src="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
fp-plugins/bbcode/res/toolbaricons/bold.svg" alt="b"></button>
		<button class="bb-button" type="button" id="bb_i" accesskey="" title="<?php echo $_smarty_tpl->getValue('lang')['admin']['plugin']['bbcode']['editor']['italictitle'];?>
"><img src="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
fp-plugins/bbcode/res/toolbaricons/italic.svg" alt="i"></button>
		<button class="bb-button" type="button" id="bb_u" accesskey="" title="<?php echo $_smarty_tpl->getValue('lang')['admin']['plugin']['bbcode']['editor']['underlinetitle'];?>
"><img src="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
fp-plugins/bbcode/res/toolbaricons/underlined.svg" alt="u"></button>
		<button class="bb-button" type="button" id="bb_del" accesskey="" title="<?php echo $_smarty_tpl->getValue('lang')['admin']['plugin']['bbcode']['editor']['crossouttitle'];?>
"><img src="<?php echo (defined('BLOG_BASEURL') ? constant('BLOG_BASEURL') : null);?>
fp-plugins/bbcode/res/toolbaricons/del.svg" alt="del"></button>
	</p>
</div><?php }
}
