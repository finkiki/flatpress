{entry content=$entry}
			<div class="entry">
				{$date|date_format_daily:"<h6 class=\"date\">`$fp_config.locale.dateformat`</h6>"}
				<h3>{$subject|tag:the_title}</h3>
				<p class="date">{$lang.entryauthor.posted_by} {$author} {$lang.entryauthor.at} {$date|date_format:"`$fp_config.locale.timeformat`"} </p>
				{$content|tag:the_content}
			</div>
			{/entry}
