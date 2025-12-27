{* Password form template for BBCode Protect plugin - Smarty 5.5+ compatible *}
<div class="bbcode-protect-container">
	<div class="bbcode-protect-box">
		<p class="bbcode-protect-prompt">{$prompt_text|escape}</p>
		
		{if $error}
			<p class="bbcode-protect-error">
				{if $error == 'wrong_password'}
					{if isset($lang.plugin['bbcode-protect'].error_wrong_password)}
						{$lang.plugin['bbcode-protect'].error_wrong_password|escape}
					{else}
						Incorrect password. Please try again.
					{/if}
				{elseif $error == 'too_many_attempts'}
					{if isset($lang.plugin['bbcode-protect'].error_rate_limited)}
						{$lang.plugin['bbcode-protect'].error_rate_limited|escape}
					{else}
						Too many failed attempts. Please try again later.
					{/if}
				{/if}
			</p>
		{/if}
		
		<form method="post" class="bbcode-protect-form" action="">
			<input type="hidden" name="bbcode_protect_block_id" value="{$block_id|escape}">
			<input type="hidden" name="bbcode_protect_entry_id" value="{$entry_id|escape}">
			{if $inline_pwd}
				<input type="hidden" name="bbcode_protect_inline_pwd" value="{$inline_pwd|escape}">
			{/if}
			
			<div class="bbcode-protect-input-group">
				<label for="password_{$block_id|escape}">
					{if isset($lang.plugin['bbcode-protect'].password_label)}
						{$lang.plugin['bbcode-protect'].password_label|escape}
					{else}
						Password:
					{/if}
				</label>
				<input type="password" 
					   id="password_{$block_id|escape}" 
					   name="bbcode_protect_password" 
					   required 
					   autocomplete="off"
					   class="bbcode-protect-password-input">
			</div>
			
			<button type="submit" class="bbcode-protect-submit">
				{if isset($lang.plugin['bbcode-protect'].submit_button)}
					{$lang.plugin['bbcode-protect'].submit_button|escape}
				{else}
					Submit
				{/if}
			</button>
		</form>
	</div>
</div>
