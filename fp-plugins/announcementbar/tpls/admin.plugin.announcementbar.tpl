{config_load file="lang.conf" section=$lang}

{if $success}
	<div class="alert {if $success > 0}alert-success{else}alert-error{/if}">
		{if $success > 0}
			{$lang.admin.plugin.announcementbar.msg_success}
		{else}
			{$lang.admin.plugin.announcementbar.msg_error}
		{/if}
	</div>
{/if}

<h2>{#announcementbar.head#}</h2>
<p>{#announcementbar.desc#}</p>

<form method="post" id="announcement-form">
	
	<fieldset class="fieldset-group">
		<legend>{#announcementbar.general#}</legend>
		
		<div class="form-group">
			<label>
				<input type="checkbox" name="enabled" value="1" {if $options.enabled}checked{/if}>
				{#announcementbar.enabled#}
			</label>
			<div class="help-text">{#announcementbar.enabled_long#}</div>
		</div>
		
		<div class="form-group">
			<label for="content">{#announcementbar.content#}</label>
			<textarea name="content" id="content" rows="5">{$options.content|default:''|escape:'html'}</textarea>
			<div class="help-text">{#announcementbar.content_long#}</div>
		</div>
	</fieldset>
	
	<fieldset class="fieldset-group">
		<legend>{#announcementbar.visibility#}</legend>
		
		<div class="form-group">
			<label for="visibility_mode">{#announcementbar.visibility_mode#}</label>
			<select name="visibility_mode" id="visibility_mode">
				<option value="all" {if $options.visibility_mode == 'all'}selected{/if}>{#announcementbar.visibility_all#}</option>
				<option value="include" {if $options.visibility_mode == 'include'}selected{/if}>{#announcementbar.visibility_include#}</option>
				<option value="exclude" {if $options.visibility_mode == 'exclude'}selected{/if}>{#announcementbar.visibility_exclude#}</option>
			</select>
			<div class="help-text">{#announcementbar.visibility_mode_long#}</div>
		</div>
		
		<div class="form-group">
			<label for="visibility_patterns">{#announcementbar.visibility_patterns#}</label>
			<textarea name="visibility_patterns" id="visibility_patterns" rows="4">{$options.visibility_patterns|default:''|escape:'html'}</textarea>
			<div class="help-text">{#announcementbar.visibility_patterns_long#}</div>
		</div>
	</fieldset>
	
	<fieldset class="fieldset-group">
		<legend>{#announcementbar.dismissible_section#}</legend>
		
		<div class="form-group">
			<label>
				<input type="checkbox" name="dismissible" value="1" {if $options.dismissible}checked{/if}>
				{#announcementbar.dismissible#}
			</label>
			<div class="help-text">{#announcementbar.dismissible_long#}</div>
		</div>
		
		<div class="form-group">
			<label for="dismiss_version">{#announcementbar.dismiss_version#}</label>
			<input type="text" name="dismiss_version" id="dismiss_version" value="{$options.dismiss_version|default:'1'|escape:'html'}">
			<div class="help-text">{#announcementbar.dismiss_version_long#}</div>
		</div>
	</fieldset>
	
	<fieldset class="fieldset-group">
		<legend>{#announcementbar.scheduling#}</legend>
		
		<div class="form-group">
			<label>
				<input type="checkbox" name="schedule_enabled" value="1" {if $options.schedule_enabled}checked{/if}>
				{#announcementbar.schedule_enabled#}
			</label>
			<div class="help-text">{#announcementbar.schedule_enabled_long#}</div>
		</div>
		
		<div class="form-group">
			<label for="schedule_start">{#announcementbar.schedule_start#}</label>
			<input type="datetime-local" name="schedule_start" id="schedule_start" value="{$options.schedule_start|default:''|escape:'html'}">
			<div class="help-text">{#announcementbar.schedule_start_long#}</div>
		</div>
		
		<div class="form-group">
			<label for="schedule_end">{#announcementbar.schedule_end#}</label>
			<input type="datetime-local" name="schedule_end" id="schedule_end" value="{$options.schedule_end|default:''|escape:'html'}">
			<div class="help-text">{#announcementbar.schedule_end_long#}</div>
		</div>
	</fieldset>
	
	<fieldset class="fieldset-group">
		<legend>{#announcementbar.styling#}</legend>
		
		<div class="inline-fields">
			<div class="form-group">
				<label for="bg_color">{#announcementbar.bg_color#}</label>
				<input type="color" name="bg_color" id="bg_color" value="{$options.bg_color|default:'#0066cc'|escape:'html'}">
			</div>
			
			<div class="form-group">
				<label for="text_color">{#announcementbar.text_color#}</label>
				<input type="color" name="text_color" id="text_color" value="{$options.text_color|default:'#ffffff'|escape:'html'}">
			</div>
		</div>
		
		<div class="inline-fields">
			<div class="form-group">
				<label for="font_size">{#announcementbar.font_size#}</label>
				<input type="number" name="font_size" id="font_size" value="{$options.font_size|default:'14'}" min="10" max="24">
				<div class="help-text">{#announcementbar.font_size_long#}</div>
			</div>
			
			<div class="form-group">
				<label for="padding">{#announcementbar.padding#}</label>
				<input type="number" name="padding" id="padding" value="{$options.padding|default:'12'}" min="5" max="30">
				<div class="help-text">{#announcementbar.padding_long#}</div>
			</div>
		</div>
		
		<div class="form-group">
			<label for="height">{#announcementbar.height#}</label>
			<input type="text" name="height" id="height" value="{$options.height|default:'auto'|escape:'html'}" placeholder="auto">
			<div class="help-text">{#announcementbar.height_long#}</div>
		</div>
	</fieldset>
	
	<div class="form-group">
		<input type="submit" name="announcement-conf" value="{#announcementbar.submit#}" class="btn btn-primary">
	</div>
</form>
