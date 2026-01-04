<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:47:53
  from 'file:entry-default.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a2939974797_12649027',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee3777fcb44979488ba32a7682489db0b6047aae' => 
    array (
      0 => 'entry-default.tpl',
      1 => 1767515761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'shared:entryadminctrls.tpl' => 1,
  ),
))) {
function content_695a2939974797_12649027 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/runner/work/flatpress/flatpress/fp-interface/themes/leggero';
?>	<div itemscope itemtype="http://schema.org/BlogPosting" id="<?php echo $_smarty_tpl->getValue('id');?>
" class="entry <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('date'),"y-%Y m-%m d-%d");?>
">
												
		<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format_daily')($_smarty_tpl->getValue('date'),"<h2 class=\"date\">".((string)$_smarty_tpl->getValue('fp_config')['locale']['dateformat'])."</h2>");?>


				<h2 itemprop="name" class="entry-title">
					<a href="<?php if (!($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('commslock',$_smarty_tpl->getValue('categories')) && !$_smarty_tpl->getValue('comments'))) {
echo $_smarty_tpl->getSmarty()->getModifierCallback('link')($_smarty_tpl->getValue('id'),'comments_link');
} else {
echo $_smarty_tpl->getSmarty()->getModifierCallback('link')($_smarty_tpl->getValue('id'),'post_link');
}?>">
					<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('tag')($_smarty_tpl->getValue('subject'),'the_title');?>

					</a>
				</h2>
				<?php $_smarty_tpl->renderSubTemplate("shared:entryadminctrls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

				<div itemprop="articleBody">
					<?php if ($_smarty_tpl->getValue('seo_desc')) {?>

					<br>
					<!-- BOF SEO Metagtag info description -->
					<fieldset><legend><?php echo $_smarty_tpl->getValue('lang')['plugin']['seometataginfo']['introduction'];?>
</legend><b>&rArr;</b> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('seo_desc'), ENT_QUOTES, 'UTF-8', true);?>
</fieldset>
					<!-- EOF SEO Metagtag info description -->

					<?php }?>

				<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('tag')($_smarty_tpl->getValue('content'),'the_content');?>

				</div>

				<ul class="entry-footer">

					<li class="entry-info"><?php echo $_smarty_tpl->getValue('lang')['entryauthor']['posted_by'];?>
 <span itemprop="author"><?php echo $_smarty_tpl->getValue('author');?>
</span> <?php echo $_smarty_tpl->getValue('lang')['entryauthor']['at'];?>

					<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('date'),((string)$_smarty_tpl->getValue('fp_config')['locale']['timeformat']));?>


						<span itemprop="articleSection">
							<?php $_smarty_tpl->assign('__filed_cats', $_smarty_tpl->getSmarty()->getModifierCallback('filed')($_smarty_tpl->getValue('categories')), false, NULL);?>
							<?php if ($_smarty_tpl->getValue('__filed_cats')) {?> <?php echo $_smarty_tpl->getValue('lang')['plugin']['categories']['in'];?>
 <?php echo $_smarty_tpl->getValue('__filed_cats');
}?>
						</span>
					</li>

					<li class="link-comments">

					<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('function_exists')('plugin_postviews_calc')) {?>
						<strong><?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('views')->handle(array(), $_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->getValue('lang')['postviews']['views'];?>

					<?php }?>

					<?php if (!($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('commslock',$_smarty_tpl->getValue('categories')) && !$_smarty_tpl->getValue('comments'))) {?>
						<a href="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('link')($_smarty_tpl->getValue('id'),'comments_link');
if ($_smarty_tpl->getValue('comments') > 0) {?>#comments<?php } else { ?>#addcomment<?php }?>"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('tag')($_smarty_tpl->getValue('comments'),'comments_number');?>
</a>
					<?php }?>
					</li>

				</ul>

	</div>
<?php }
}
