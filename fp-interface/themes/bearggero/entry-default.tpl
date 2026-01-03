<article itemscope itemtype="http://schema.org/BlogPosting" id="{$id}" class="entry {$date|date_format:'y-%Y m-%m d-%d'}">
	
	{* Print date header only once per day *}
	{$date|date_format_daily:"<h2 class='entry-date'>`$fp_config.locale.dateformat`</h2>"}
	
	<header class="entry-header">
		<h2 itemprop="name" class="entry-title">
			<a href="{if !(in_array('commslock', $categories) && !(isset($comments) && $comments))}{$id|link:comments_link}{else}{$id|link:post_link}{/if}">
				{$subject|tag:the_title}
			</a>
		</h2>
		{include file="shared:entryadminctrls.tpl"}
	</header>
	
	<div itemprop="articleBody" class="entry-content">
		{if isset($seo_desc) && $seo_desc}
			<fieldset class="seo-description">
				<legend>{$lang.plugin.seometataginfo.introduction}</legend>
				<p><strong>&rArr;</strong> {$seo_desc|escape}</p>
			</fieldset>
		{/if}
		
		{$content|tag:the_content}
	</div>
	
	<footer class="entry-footer">
		<ul class="entry-meta">
			<li class="entry-author">
				{$lang.entryauthor.posted_by} 
				<span itemprop="author">{$author}</span> 
				{$lang.entryauthor.at} 
				{$date|date_format:"`$fp_config.locale.timeformat`"}
				
				<span itemprop="articleSection">
					{assign var="__filed_cats" value=$categories|@filed}
					{if $__filed_cats}
						{$lang.plugin.categories.in} {$__filed_cats}
					{/if}
				</span>
			</li>
			
			<li class="entry-comments">
				{if function_exists('plugin_postviews_calc')}
					<strong>{views}</strong> {$lang.postviews.views}
				{/if}
				
				{if isset($comments) && !(in_array('commslock', $categories) && !$comments)}
					<a href="{$id|link:comments_link}{if isset($comments) && $comments > 0}#comments{else}#addcomment{/if}">
						{$comments|tag:comments_number}
					</a>
				{/if}
			</li>
		</ul>
	</footer>
	
</article>
