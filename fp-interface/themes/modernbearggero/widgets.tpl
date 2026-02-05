<aside id="sidebar" class="widget-area">
	
	{* Sidebar widgets *}
	{capture name="sidebar_widgets"}
		{widgets pos=sidebar}
			<div class="widget" id="{$id}">
				{if isset($subject) && $subject}
					<h3 class="widget-title">{$subject}</h3>
				{/if}
				<div class="widget-content">
					{$content}
				</div>
			</div>
		{/widgets}
	{/capture}
	
	{if $smarty.capture.sidebar_widgets|strip}
		{$smarty.capture.sidebar_widgets}
	{else}
		{* Default widget when no widgets configured *}
		<div class="widget widget-default">
			<h3 class="widget-title">Welcome</h3>
			<div class="widget-content">
				<p>Configure widgets in the admin panel to customize your sidebar.</p>
			</div>
		</div>
	{/if}
	
</aside>
