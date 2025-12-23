{include file="header.tpl"}

		<div id="content-grid">
			<main id="main">
				{widgets pos=top}
					<div id="{$id}" class="widget hero">
						<h4>{$subject}</h4>
						{$content}
					</div>
				{/widgets}

				{entry_block}
					{entry}
						{include file='entry-default.tpl'}
					{/entry}

					<div class="navigation">
						{nextpage}{prevpage}
					</div>
				{/entry_block}
			</main>

			{include file="widgets.tpl"}
		</div>

{include file="footer.tpl"}
