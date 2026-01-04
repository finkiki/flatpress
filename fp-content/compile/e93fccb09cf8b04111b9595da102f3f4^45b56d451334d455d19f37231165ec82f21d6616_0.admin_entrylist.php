<?php
/* Smarty version 5.7.0, created on 2026-01-04 08:47:19
  from 'admin:entry/list' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695a2917412ef0_65113607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45b56d451334d455d19f37231165ec82f21d6616' => 
    array (
      0 => 'entry/list',
      1 => 1767515760,
      2 => 'admin',
    ),
  ),
  'includes' => 
  array (
    'shared:errorlist.tpl' => 1,
  ),
))) {
function content_695a2917412ef0_65113607 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '.';
?>
<h2><?php echo $_smarty_tpl->getValue('panelstrings')['head'];?>
</h2>

<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('draft_block')) {
throw new \Smarty\Exception('block tag \'draft_block\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('draft_block')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
if ((true && ($_smarty_tpl->hasVariable('draft_list') && null !== ($_smarty_tpl->getValue('draft_list') ?? null)))) {?>
	<div id="admin-drafts">
		<p><?php echo $_smarty_tpl->getValue('lang')['admin']['entry']['list']['drafts'];?>
</p>
		<ul>
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('draft_list'), 'draft', false, 'draftid');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('draftid')->value => $_smarty_tpl->getVariable('draft')->value) {
$foreach0DoElse = false;
?>
			<li>
				<a href="admin.php?p=entry&amp;entry=<?php echo $_smarty_tpl->getValue('draftid');?>
&amp;action=write"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('draft'),50);?>
</a>
			</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ul>
	</div>
<?php }
$_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('draft_block')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>

<?php $_smarty_tpl->renderSubTemplate("shared:errorlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<p><?php echo $_smarty_tpl->getValue('panelstrings')['descr'];?>
</p>

<form method="get" action="<?php echo $_smarty_tpl->getValue('formtarget');?>
?p=entry">
<p><input type="hidden" name="p" value="entry"></p>
<fieldset><legend><?php echo $_smarty_tpl->getValue('panelstrings')['filter'];?>
</legend>
	<select name="category" class="alignleft">
	<option label="<?php echo $_smarty_tpl->getValue('lang')['admin']['entry']['list']['nofilter'];?>
" value="all"><?php echo $_smarty_tpl->getValue('panelstrings')['nofilter'];?>
</option>
		<?php if ((true && (true && null !== ($_REQUEST['category'] ?? null)))) {?> <?php $_smarty_tpl->assign('category', $_REQUEST['category'], false, NULL);?> <?php } else { ?> <?php $_smarty_tpl->assign('category', '', false, NULL);
}?>
	<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('html_options')->handle(array('options'=>$_smarty_tpl->getValue('categories_all'),'selected'=>$_smarty_tpl->getValue('category')), $_smarty_tpl);?>

	</select>
	<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('html_submit')->handle(array('name'=>'filter','id'=>'filter','class'=>"alignright",'value'=>$_smarty_tpl->getValue('panelstrings')['filterbtn']), $_smarty_tpl);?>

</fieldset>

</form>

<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('entry_block')) {
throw new \Smarty\Exception('block tag \'entry_block\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('entry_block')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>

<div>
	<?php echo $_smarty_tpl->getValue('panelstrings')['perpage_show'];?>

	<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('perpage_options'), 'opt', false, NULL, 'perpage_loop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('opt')->value) {
$foreach1DoElse = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_perpage_loop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_perpage_loop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_perpage_loop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_perpage_loop']->value['total'];
?>
	<?php if ($_smarty_tpl->getValue('opt') == $_smarty_tpl->getValue('perpage_current')) {?>
	<strong><?php echo $_smarty_tpl->getValue('opt');?>
</strong>
	<?php } else { ?>
	<a href="admin.php?<?php echo $_smarty_tpl->getValue('perpage_base_query');?>
&amp;count=<?php echo $_smarty_tpl->getValue('opt');?>
&amp;paged=1"><?php echo $_smarty_tpl->getValue('opt');?>
</a>
	<?php }
if (!($_smarty_tpl->getValue('__smarty_foreach_perpage_loop')['last'] ?? null)) {
}?>
	<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
	<?php echo $_smarty_tpl->getValue('panelstrings')['perpage_entries'];?>

</div><br>

<table class="entrylist">
	<thead>
		<tr>		<th><?php echo $_smarty_tpl->getValue('panelstrings')['date'];?>
</th>
		<th class="main-cell"><?php echo $_smarty_tpl->getValue('panelstrings')['title'];?>
</th>
		<th>ID</th>
		<!-- <th><?php echo $_smarty_tpl->getValue('panelstrings')['author'];?>
</th> -->
		<th><?php echo $_smarty_tpl->getValue('panelstrings')['comms'];?>
</th>
		<th><?php echo $_smarty_tpl->getValue('panelstrings')['action'];?>
</th></tr>
	</thead>
	<tbody>

	<?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('entry')) {
throw new \Smarty\Exception('block tag \'entry\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('entry')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>

		<tr>
			<td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getSmarty()->getModifierCallback('entry_idtotime')($_smarty_tpl->getValue('id')),((string)$_smarty_tpl->getValue('fp_config')['locale']['dateformatshort']).", ".((string)$_smarty_tpl->getValue('fp_config')['locale']['timeformat']));?>
</td>
			<td class="main-cell">
				<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('draft',$_smarty_tpl->getValue('categories'))) {?>(<em class="entry-flag"><?php echo $_smarty_tpl->getValue('lang')['entry']['flags']['short']['draft'];?>
</em>)<?php }?>
				<a class="link-general" href="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('action_link')($_smarty_tpl->getValue('panel_url'),'write');?>
&amp;entry=<?php echo $_smarty_tpl->getValue('id');?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('subject'),70);?>
</a>
			</td>
			<td>
				<?php echo $_smarty_tpl->getValue('id');?>

			</td>
			<!-- <td><?php echo $_smarty_tpl->getValue('author');?>
</td> -->
			<td>
				<a class="link-general" href="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('action_link')($_smarty_tpl->getValue('panel_url'),'commentlist');?>
&amp;entry=<?php echo $_smarty_tpl->getValue('id');?>
"><?php echo (($tmp = $_smarty_tpl->getValue('commentcount') ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('comments') ?? null : $tmp);?>
</a>
			</td>
			<td>
				<a class="link-general" href="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('link')($_smarty_tpl->getValue('id'),'post_link');?>
"><?php echo $_smarty_tpl->getValue('panelstrings')['act_view'];?>
</a>
				<a class="link-general" href="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('action_link')($_smarty_tpl->getValue('panel_url'),'write');?>
&amp;entry=<?php echo $_smarty_tpl->getValue('id');?>
"><?php echo $_smarty_tpl->getValue('panelstrings')['act_edit'];?>
</a>
				<a class="link-delete" href="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('action_link')($_smarty_tpl->getValue('panel_url'),'delete');?>
&amp;entry=<?php echo $_smarty_tpl->getValue('id');?>
"><?php echo $_smarty_tpl->getValue('panelstrings')['act_del'];?>
</a>
			</td>
		</tr>

	<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('entry')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>

	</tbody>
</table>

<div class="navigation">
	<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('prevpage')->handle(array('admin'=>'yes'), $_smarty_tpl);?>

	<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('nextpage')->handle(array('admin'=>'yes'), $_smarty_tpl);?>

</div>
<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('entry_block')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
}
}
