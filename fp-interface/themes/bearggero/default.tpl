{include file="header.tpl"}

		<div id="content-grid">
			<main id="main">
				<div class="entry page">
					<h2 class="title">{$subject}</h2>
					<div class="body">
						{if isset($rawcontent) and $rawcontent} {$content}
						{else}	{include file=$content}{/if}
					</div>
				</div>
			</main>

			{include file="widgets.tpl"}
		</div>

{include file="footer.tpl"}
