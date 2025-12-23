			<aside id="column" aria-label="Sidebar">
				{widgets pos=right}
					<div id="{$id}" class="widget-card">
						<h4>{$subject}</h4>
						{$content}
					</div>
				{/widgets}

				{widgets pos=left}
					<div id="{$id}" class="widget-card">
						<h4>{$subject}</h4>
						{$content}
					</div>
				{/widgets}

				{widgets pos=bottom}
					<div id="{$id}" class="widget-card">
						<h4>{$subject}</h4>
						{$content}
					</div>
				{/widgets}
			</aside>
