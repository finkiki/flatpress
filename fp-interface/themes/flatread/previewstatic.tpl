{static content=$entry}
			<div class="entry">
				<h3>{$subject}</h3>
				<p class="date">{$lang.staticauthor.published_by} {$author} {$lang.staticauthor.on} {$date|date_format:"`$fp_config.locale.dateformat`"} </p>
				{$content}
			</div>
			{/static}
