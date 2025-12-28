<?php
/**
 * Slovenian language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Zaščita vsebine';

$lang['admin']['config']['bbcode_protect'] = array(
	'head' => 'Nastavitve zaščite vsebine BBCode',
	'desc' => 'Konfigurirajte zaščito z geslom za bloke vsebine z uporabo oznake BBCode [protect]...[/protect].',
	
	// General settings
	'general_settings' => 'Splošne nastavitve',
	'default_password_label' => 'Default Password',
	'default_password_desc' => 'Global password used for all [protect][/protect] blocks when no per-entry or inline password is set. Leave blank to disable password protection by default.',
	'allow_inline_password' => 'Dovoli vdelana gesla v BBCode',
	'allow_inline_password_desc' => 'Ko je omogočeno, dovoli uporabo sintakse [protect pwd="geslo"]...[/protect]. Ko je onemogočeno, se uporabljajo samo gesla po vnosu.',
	'prompt_text_label' => 'Besedilo poziva za geslo',
	'prompt_text_desc' => 'Besedilo, prikazano nad obrazcem za vnos gesla.',
	'remember_duration_label' => 'Trajanje pomnjenja (sekunde)',
	'remember_duration_desc' => 'Kako dolgo (v sekundah) si zapomniti geslo po uspešnem vnosu. Privzeto: 3600 (1 ura).',
	
	// Security settings
	'security_settings' => 'Varnostne nastavitve',
	'max_attempts_label' => 'Največje število neuspelih poskusov',
	'max_attempts_desc' => 'Največje število neuspelih poskusov vnosa gesla pred omejitvijo hitrosti. Privzeto: 5.',
	'attempt_window_label' => 'Okno poskusov (sekunde)',
	'attempt_window_desc' => 'Časovno okno (v sekundah) za štetje neuspelih poskusov. Privzeto: 300 (5 minut).',
	
	// Cache settings
	'cache_settings' => 'Nastavitve predpomnilnika',
	'bypass_cache' => 'Obidi predpomnilnik za zaščiteno vsebino',
	'bypass_cache_desc' => 'Ko je omogočeno, strani z zaščiteno vsebino ne bodo shranjene v predpomnilnik, da se prepreči uhajanje odklenene vsebine.',
	
	// Usage instructions
	'usage_title' => 'Navodila za uporabo',
	'usage_intro' => 'Ta vtičnik vam omogoča, da zaščitite dele svoje vsebine z geslom z uporabo oznak BBCode.',
	
	'usage_basic_title' => 'Osnovna uporaba z geslom vnosa',
	'usage_basic_example' => '[protect]Ta vsebina je zaščitena[/protect]',
	'usage_basic_desc' => 'Zaščiti vsebino z uporabo gesla, nastavljenega v metapodatkih vnosa. Nastavite geslo vnosa v urejevalniku vnosa.',
	
	'usage_inline_title' => 'Vdelano geslo (če je omogočeno)',
	'usage_inline_example' => '[protect pwd="mojegeslo"]Ta vsebina je zaščitena[/protect]',
	'usage_inline_desc' => 'Zaščiti vsebino s specifičnim vdelanim geslom. Deluje samo, če je zgoraj omogočeno "Dovoli vdelana gesla".',
	
	'usage_entry_title' => 'Nastavitev gesla vnosa',
	'usage_entry_desc' => 'Če želite nastaviti geslo za celoten vnos, ga dodajte v plošči metapodatkov urejevalnika vnosa pri ustvarjanju ali urejanju objave.',
	
	'submit' => 'Shrani nastavitve',
	'msgs' => array(
		1 => 'Nastavitve uspešno shranjene.',
		-1 => 'Napaka pri shranjevanju nastavitev.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode_protect'] = array(
	'legend' => 'Zaščita vsebine',
	'description' => 'Nastavite geslo za zaščito blokov [protect]...[/protect] v tem vnosu.',
	'password_label' => 'Geslo vnosa',
	'note' => 'Pustite prazno za odstranitev zaščite z geslom. Geslo bo varno zgoščeno.',
);

// Front-end messages
$lang['plugin']['bbcode_protect'] = array(
	'password_label' => 'Geslo:',
	'submit_button' => 'Pošlji',
	'error_wrong_password' => 'Napačno geslo. Prosimo, poskusite znova.',
	'error_rate_limited' => 'Preveč neuspelih poskusov. Prosimo, poskusite kasneje.',
	'feed_replacement' => '[Ta vsebina je zaščitena z geslom]',
);
?>
