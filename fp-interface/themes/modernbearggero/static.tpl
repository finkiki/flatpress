{include file="header.tpl"}

<div id="main-content">
	<main id="primary" class="site-main">
		
		<article class="static-page">
			<header class="page-header">
				<h1 class="page-title">{$subject|tag:the_title}</h1>
			</header>
			
			<div class="page-content">
				{$content|tag:the_content}
			</div>
		</article>
		
	</main>
	
	{include file="widgets.tpl"}
	
</div>

{include file="footer.tpl"}
