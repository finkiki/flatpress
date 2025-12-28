<?php
/**
 * Danish Language File for Content Protection Plugin
 */

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Adgangskode:',
	'submit_button' => 'Indsend',
	'wrong_password' => 'Forkert adgangskode. Prøv venligst igen.',
	'rate_limited' => 'For mange mislykkede forsøg. Prøv venligst igen senere.',
	'no_password_set' => 'Der er ikke angivet nogen adgangskode for dette indhold.',
];

$lang['admin']['plugin']['bbcode_protect'] = [
	'title' => 'Indstillinger for indholdsbeskyttelse',
	'password_section' => 'Global adgangskode',
	'default_password' => 'Standardadgangskode',
	'default_password_desc' => 'Global adgangskode for alt beskyttet indhold. Kan tilsidesættes pr. indlæg.',
	'display_section' => 'Visningsindstillinger',
	'prompt_text' => 'Prompttekst',
	'prompt_text_desc' => 'Besked vist over adgangskodeformularen.',
	'remember_duration' => 'Husk varighed (sekunder)',
	'remember_duration_desc' => 'Hvor længe indholdet forbliver låst op (standard: 3600 = 1 time).',
	'security_section' => 'Sikkerhedsindstillinger',
	'max_attempts' => 'Maks. mislykkede forsøg',
	'max_attempts_desc' => 'Antal mislykkede forsøg før begrænsning (standard: 5).',
	'attempt_window' => 'Forsøgsvindue (sekunder)',
	'attempt_window_desc' => 'Tidsvindue for optælling af mislykkede forsøg (standard: 300 = 5 minutter).',
	'usage_section' => 'Brugsanvisning',
	'usage_text' => 'For at beskytte indhold i dine indlæg skal du bruge HTML-kommentarer:',
	'usage_note' => 'Du kan også indstille adgangskoder pr. indlæg i indlægsredigereren.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'Indholdsbeskyttelse',
	'entry_password' => 'Indlægsadgangskode',
	'entry_password_desc' => 'Adgangskode til beskyttet indhold i dette indlæg. Lad feltet være tomt for at bruge global standardadgangskode.',
	'usage' => 'Brug:',
	'usage_text' => 'Ombryd indhold med &lt;!--protect--&gt; og &lt;!--/protect--&gt; for at beskytte det.',
];
