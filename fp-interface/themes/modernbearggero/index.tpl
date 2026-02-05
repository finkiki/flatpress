{include file="header.tpl"}

<div id="main-content">
	<main id="primary" class="site-main">
		
		{entry_block}
		
			{entry}
				{include file='entry-default.tpl'}
			{/entry}
		
			<div class="navigation pagination">
				{nextpage}{prevpage}
			</div>
			
		{/entry_block}

	</main>
	
	{include file="widgets.tpl"}
	
</div>

{include file="footer.tpl"}
