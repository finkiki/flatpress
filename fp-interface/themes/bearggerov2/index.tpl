{include file="header.tpl"}

		<div id="main">
{if !isset($smarty.get.x) or !$smarty.get.x}
    {widgets pos=sticky}
    <div id="sticky-{counter}" class="sticky entry">
        <h3>{$subject}</h3>
        {$content}
    </div>
    {/widgets}
{/if}

		{entry_block}
		
			{entry}
			{include file="entry-default.tpl"}
			{/entry}
		
			<div class="navigation">
				{nextpage}{prevpage}
			</div>
			
		{/entry_block}

		</div>
			

		{include file="widgets.tpl"}
				
{include file="footer.tpl"}
