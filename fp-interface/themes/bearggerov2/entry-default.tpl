	<div id="{$id}" class="entry {$date|date_format:"y-%Y m-%m d-%d"}">
				{* 	using the following way to print the date, if more 	*} 
				{*	than one entry have been written the same day,		*} 
				{*	 the date will be printed only once 				*}
              
	           <div class="entry-header" >	
				<h3>
				<a href="{$id|link:post_link}">
				{$subject|tag:the_title}
				</a>
				</h3>
				
				<ul class="entry-footer">
			    <!--- this is not actually a footer just didnt want to change the css formatting -->
				<li class="entry-info"> 
				{$date|date_format:"%b %d, %Y"}
				{if ($categories)} in {$categories|@filed}{/if}
				</li> 
				</ul>
			   </div>
                {include file=shared:entryadminctrls.tpl}
				
				
				{$content|tag:the_content}
		        	
			{if !$entry_commslock}	
                 <a href="{$id|link:comments_link}#comments">{$comments|tag:comments_number}</a>
            {/if}
                 {if isset($views)}(<strong>{$views}</strong> views){/if}
				
	</div>
	
