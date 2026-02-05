{include file="header.tpl"}

<div id="main-content">
	<main id="primary" class="site-main">
		
		{entry_block}
			{entry}
				{include file='entry-default.tpl'}
			{/entry}
			
			{* Display comments *}
			{comment_block}
			<section id="comments" class="comments-area">
				<h3 class="comments-title">{$lang.comments.comments}</h3>
				<ol class="comment-list">
				{comment}
					<li id="{$id}" class="comment {$loggedin|notempty:'comment-admin'}">
						
						<div class="comment-author">
							<strong class="comment-name">
								{$url|notempty:"<a href='$url' rel='nofollow' title='Visit $url'>$name</a>"|default:$name}
							</strong>
						</div>
						
						{include file="shared:commentadminctrls.tpl"}
						
						<div class="comment-meta">
							<a href="{$entryid|link:comments_link}#{$id}" title="Permalink to {$name|escape:'html'}'s comment">
								{$date|date_format_daily} {$lang.entryauthor.at} {$date|date_format:"`$fp_config.locale.timeformat`"}
							</a>
						</div>
						
						<div class="comment-content">
							{$content|tag:comment_text}
						</div>
						
					</li>
				{/comment}
				</ol>
			</section>
			{/comment_block}
			
			<div class="navigation pagination">
				{nextpage}{prevpage}
			</div>
			
		{/entry_block}
		
		{* Include shared comment form *}
		<div id="comment-form-section">
			{include file="shared:comment-form.tpl"}
		</div>
		
	</main>
	
	{include file="widgets.tpl"}
	
</div>

{include file="footer.tpl"}
