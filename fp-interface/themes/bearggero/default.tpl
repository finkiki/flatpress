{include file="header.tpl"}

<div id="main-content">
	<main id="primary" class="site-main">
		
		<article class="page-content">
			<h2 class="page-title">{$subject}</h2>
			<div class="page-body">
				{if isset($rawcontent) && $rawcontent}
					{$content}
				{else}
					{include file=$content}
				{/if}
			</div>
		</article>
		
	</main>
	
	{include file="widgets.tpl"}
	
</div>

{include file="footer.tpl"}
