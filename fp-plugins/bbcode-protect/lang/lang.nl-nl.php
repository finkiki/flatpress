<?php
/**
 * Dutch language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Inhoudsbeveiliging';

$lang['admin']['config']['bbcode_protect'] = array(
	'head' => 'BBCode Inhoudsbeveiliging Instellingen',
	'desc' => 'Configureer wachtwoordbeveiliging voor inhoudsblokken met behulp van de BBCode tag [protect]...[/protect].',
	
	// General settings
	'general_settings' => 'Algemene instellingen',
	'default_password_label' => 'Default Password',
	'default_password_desc' => 'Global password used for all [protect][/protect] blocks when no per-entry or inline password is set. Leave blank to disable password protection by default.',
	'allow_inline_password' => 'Inline wachtwoorden toestaan in BBCode',
	'allow_inline_password_desc' => 'Indien ingeschakeld, staat dit het gebruik van [protect pwd="wachtwoord"]...[/protect] syntaxis toe. Indien uitgeschakeld, worden alleen per-invoer wachtwoorden gebruikt.',
	'prompt_text_label' => 'Wachtwoord prompt tekst',
	'prompt_text_desc' => 'Tekst die boven het wachtwoordinvoerformulier wordt weergegeven.',
	'remember_duration_label' => 'Onthoudduur (seconden)',
	'remember_duration_desc' => 'Hoe lang (in seconden) het wachtwoord na succesvolle invoer moet worden onthouden. Standaard: 3600 (1 uur).',
	
	// Security settings
	'security_settings' => 'Beveiligingsinstellingen',
	'max_attempts_label' => 'Maximaal aantal mislukte pogingen',
	'max_attempts_desc' => 'Maximaal aantal mislukte wachtwoordpogingen voordat snelheidsbeperking wordt toegepast. Standaard: 5.',
	'attempt_window_label' => 'Poging venster (seconden)',
	'attempt_window_desc' => 'Tijdvenster (in seconden) voor het tellen van mislukte pogingen. Standaard: 300 (5 minuten).',
	
	// Cache settings
	'cache_settings' => 'Cache-instellingen',
	'bypass_cache' => 'Cache omzeilen voor beveiligde inhoud',
	'bypass_cache_desc' => 'Indien ingeschakeld, worden pagina\'s met beveiligde inhoud niet in cache opgeslagen om lekkage van ontgrendelde inhoud te voorkomen.',
	
	// Usage instructions
	'usage_title' => 'Gebruiksinstructies',
	'usage_intro' => 'Met deze plugin kunt u secties van uw inhoud met een wachtwoord beveiligen met behulp van BBCode tags.',
	
	'usage_basic_title' => 'Basisgebruik met per-invoer wachtwoord',
	'usage_basic_example' => '[protect]Deze inhoud is beveiligd[/protect]',
	'usage_basic_desc' => 'Beveiligt inhoud met het wachtwoord dat is ingesteld in de invoermetadata. Stel het invoerwachtwoord in de invoerediteur in.',
	
	'usage_inline_title' => 'Inline wachtwoord (indien ingeschakeld)',
	'usage_inline_example' => '[protect pwd="mijnwachtwoord"]Deze inhoud is beveiligd[/protect]',
	'usage_inline_desc' => 'Beveiligt inhoud met een specifiek inline wachtwoord. Werkt alleen als "Inline wachtwoorden toestaan" hierboven is ingeschakeld.',
	
	'usage_entry_title' => 'Invoerwachtwoord instellen',
	'usage_entry_desc' => 'Om een wachtwoord voor een hele invoer in te stellen, voegt u het toe in het metadatapaneel van de invoerediteur bij het maken of bewerken van een bericht.',
	
	'submit' => 'Instellingen opslaan',
	'msgs' => array(
		1 => 'Instellingen succesvol opgeslagen.',
		-1 => 'Fout bij het opslaan van instellingen.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode_protect'] = array(
	'legend' => 'Inhoudsbeveiliging',
	'description' => 'Stel een wachtwoord in om [protect]...[/protect] blokken in deze invoer te beveiligen.',
	'password_label' => 'Invoerwachtwoord',
	'note' => 'Laat leeg om wachtwoordbeveiliging te verwijderen. Het wachtwoord wordt veilig gehasht.',
);

// Front-end messages
$lang['plugin']['bbcode_protect'] = array(
	'password_label' => 'Wachtwoord:',
	'submit_button' => 'Verzenden',
	'error_wrong_password' => 'Onjuist wachtwoord. Probeer het opnieuw.',
	'error_rate_limited' => 'Te veel mislukte pogingen. Probeer het later opnieuw.',
	'feed_replacement' => '[Deze inhoud is met een wachtwoord beveiligd]',
);
?>
