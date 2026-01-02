{include file="header.tpl"}

<div id="main-content">
	<main id="primary" class="site-main">
		
		{entry_block}
			{entry}
				{include file='entry-default.tpl'}
			{/entry}
		{/entry_block}
		
		{* Include shared comments template *}
		<div id="comments-section">
			{include file="shared:comments.tpl"}
		</div>
		
		{* Include shared comment form *}
		<div id="comment-form-section">
			{include file="shared:comment-form.tpl"}
		</div>
		
	</main>
	
	{include file="widgets.tpl"}
	
</div>

{include file="footer.tpl"}
