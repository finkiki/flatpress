{include file="cpheader.tpl"}

<div id="admin-main">
	
	<div class="admin-entry">
		
		<ul class="admin-nav">
			<li><a href="{$smarty.const.BLOG_BASEURL}">{$lang.admin.general.startpage}</a></li>
			<li><a href="{$smarty.const.BLOG_BASEURL}login.php?do=logout">{$lang.admin.general.logout}</a></li>
		</ul>
		
		{page}
			<h1 class="admin-title">{$subject}</h1>
			<div class="admin-body">{controlpanel}</div>
		{/page}
		
	</div>
	
</div>

{include file="footer.tpl"}
