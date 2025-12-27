<h2>{$plang.head}</h2>

{include file="shared:errorlist.tpl"}

{if !$smarty_ok}
	<div class="error">
		<p><strong>Warning:</strong> This plugin requires Smarty 5.5.0 or later. Current version: {$smarty_version|escape}</p>
		<p>The plugin will use a fallback rendering mode, but some features may not work as expected.</p>
	</div>
{/if}

<p>{$plang.desc}</p>

{html_form class="option-set"}

	<fieldset>
		<legend>{$plang.general_settings}</legend>
		
		<div class="form-group">
			<label for="allow_inline_password">
				<input type="checkbox" 
					   name="allow_inline_password" 
					   id="allow_inline_password" 
					   value="1" 
					   {if $allow_inline_password}checked{/if}>
				{$plang.allow_inline_password}
			</label>
			<p class="description">{$plang.allow_inline_password_desc}</p>
		</div>
		
		<div class="form-group">
			<label for="prompt_text">
				{$plang.prompt_text_label}
			</label>
			<input type="text" 
				   name="prompt_text" 
				   id="prompt_text" 
				   value="{$prompt_text|escape}" 
				   class="text-input">
			<p class="description">{$plang.prompt_text_desc}</p>
		</div>
		
		<div class="form-group">
			<label for="remember_duration">
				{$plang.remember_duration_label}
			</label>
			<input type="number" 
				   name="remember_duration" 
				   id="remember_duration" 
				   value="{$remember_duration|escape}" 
				   min="60" 
				   step="60">
			<p class="description">{$plang.remember_duration_desc}</p>
		</div>
	</fieldset>
	
	<fieldset>
		<legend>{$plang.security_settings}</legend>
		
		<div class="form-group">
			<label for="max_attempts">
				{$plang.max_attempts_label}
			</label>
			<input type="number" 
				   name="max_attempts" 
				   id="max_attempts" 
				   value="{$max_attempts|escape}" 
				   min="1" 
				   step="1">
			<p class="description">{$plang.max_attempts_desc}</p>
		</div>
		
		<div class="form-group">
			<label for="attempt_window">
				{$plang.attempt_window_label}
			</label>
			<input type="number" 
				   name="attempt_window" 
				   id="attempt_window" 
				   value="{$attempt_window|escape}" 
				   min="60" 
				   step="60">
			<p class="description">{$plang.attempt_window_desc}</p>
		</div>
	</fieldset>
	
	<fieldset>
		<legend>{$plang.cache_settings}</legend>
		
		<div class="form-group">
			<label for="bypass_cache">
				<input type="checkbox" 
					   name="bypass_cache" 
					   id="bypass_cache" 
					   value="1" 
					   {if $bypass_cache}checked{/if}>
				{$plang.bypass_cache}
			</label>
			<p class="description">{$plang.bypass_cache_desc}</p>
		</div>
	</fieldset>
	
	<div class="buttonbar">
		<input type="submit" value="{$plang.submit}">
	</div>

{/html_form}

<div class="usage-info">
	<h3>{$plang.usage_title}</h3>
	<p>{$plang.usage_intro}</p>
	
	<h4>{$plang.usage_basic_title}</h4>
	<pre>{$plang.usage_basic_example}</pre>
	<p>{$plang.usage_basic_desc}</p>
	
	<h4>{$plang.usage_inline_title}</h4>
	<pre>{$plang.usage_inline_example}</pre>
	<p>{$plang.usage_inline_desc}</p>
	
	<h4>{$plang.usage_entry_title}</h4>
	<p>{$plang.usage_entry_desc}</p>
</div>
