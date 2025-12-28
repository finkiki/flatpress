<?php
/**
 * Danish language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Indholdsbeskyttelse';

$lang['admin']['config']['bbcode-protect'] = array(
	'head' => 'BBCode Indholdsbeskyttelsesindstillinger',
	'desc' => 'Konfigurer adgangskodebeskyttelse for indholdsblokke ved hjælp af BBCode tagget [protect]...[/protect].',
	
	// General settings
	'general_settings' => 'Generelle indstillinger',
	'allow_inline_password' => 'Tillad inline adgangskoder i BBCode',
	'allow_inline_password_desc' => 'Når aktiveret, tillader brug af [protect pwd="adgangskode"]...[/protect] syntaks. Når deaktiveret, bruges kun adgangskoder pr. indlæg.',
	'prompt_text_label' => 'Adgangskode prompt tekst',
	'prompt_text_desc' => 'Tekst vist over adgangskode indtastningsformularen.',
	'remember_duration_label' => 'Husk varighed (sekunder)',
	'remember_duration_desc' => 'Hvor længe (i sekunder) adgangskoden skal huskes efter vellykket indtastning. Standard: 3600 (1 time).',
	
	// Security settings
	'security_settings' => 'Sikkerhedsindstillinger',
	'max_attempts_label' => 'Maksimale mislykkede forsøg',
	'max_attempts_desc' => 'Maksimalt antal mislykkede adgangskodeforsøg før hastighedsbegrænsning. Standard: 5.',
	'attempt_window_label' => 'Forsøgsvindue (sekunder)',
	'attempt_window_desc' => 'Tidsvindue (i sekunder) til at tælle mislykkede forsøg. Standard: 300 (5 minutter).',
	
	// Cache settings
	'cache_settings' => 'Cache-indstillinger',
	'bypass_cache' => 'Omgå cache for beskyttet indhold',
	'bypass_cache_desc' => 'Når aktiveret, vil sider med beskyttet indhold ikke blive cachelagret for at forhindre lækage af låst indhold op.',
	
	// Usage instructions
	'usage_title' => 'Brugsanvisning',
	'usage_intro' => 'Dette plugin giver dig mulighed for at beskytte dele af dit indhold med adgangskode ved hjælp af BBCode tags.',
	
	'usage_basic_title' => 'Grundlæggende brug med indlæg adgangskode',
	'usage_basic_example' => '[protect]Dette indhold er beskyttet[/protect]',
	'usage_basic_desc' => 'Beskytter indhold ved hjælp af adgangskoden indstillet i indlæggets metadata. Indstil indlæggets adgangskode i indlægsredigeringen.',
	
	'usage_inline_title' => 'Inline adgangskode (hvis aktiveret)',
	'usage_inline_example' => '[protect pwd="minadgangskode"]Dette indhold er beskyttet[/protect]',
	'usage_inline_desc' => 'Beskytter indhold med en specifik inline adgangskode. Virker kun hvis "Tillad inline adgangskoder" er aktiveret ovenfor.',
	
	'usage_entry_title' => 'Indstil indlæg adgangskode',
	'usage_entry_desc' => 'For at indstille en adgangskode for et helt indlæg, tilføj den i metadatapanelet i indlægsredigeringen når du opretter eller redigerer et opslag.',
	
	'submit' => 'Gem indstillinger',
	'msgs' => array(
		1 => 'Indstillinger gemt med succes.',
		-1 => 'Fejl ved gemning af indstillinger.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode-protect'] = array(
	'legend' => 'Indholdsbeskyttelse',
	'description' => 'Indstil en adgangskode for at beskytte [protect]...[/protect] blokke i dette indlæg.',
	'password_label' => 'Indlæg adgangskode',
	'note' => 'Lad stå tomt for at fjerne adgangskodebeskyttelse. Adgangskoden vil blive sikkert hashet.',
);

// Front-end messages
$lang['plugin']['bbcode-protect'] = array(
	'password_label' => 'Adgangskode:',
	'submit_button' => 'Indsend',
	'error_wrong_password' => 'Forkert adgangskode. Prøv venligst igen.',
	'error_rate_limited' => 'For mange mislykkede forsøg. Prøv venligst senere.',
	'feed_replacement' => '[Dette indhold er adgangskodebeskyttet]',
);
?>
