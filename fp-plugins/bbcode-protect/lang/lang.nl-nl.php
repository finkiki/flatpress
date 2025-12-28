<?php
/**
 * Dutch Language File for Content Protection Plugin
 */

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Wachtwoord:',
	'submit_button' => 'Verzenden',
	'wrong_password' => 'Onjuist wachtwoord. Probeer het opnieuw.',
	'rate_limited' => 'Te veel mislukte pogingen. Probeer het later opnieuw.',
	'no_password_set' => 'Er is geen wachtwoord ingesteld voor deze inhoud.',
];

$lang['admin']['plugin']['bbcode_protect'] = [
	'title' => 'Instellingen inhoudsbescherming',
	'password_section' => 'Globaal wachtwoord',
	'default_password' => 'Standaardwachtwoord',
	'default_password_desc' => 'Globaal wachtwoord voor alle beschermde inhoud. Kan per bericht worden overschreven.',
	'display_section' => 'Weergave-instellingen',
	'prompt_text' => 'Prompttekst',
	'prompt_text_desc' => 'Bericht weergegeven boven het wachtwoordformulier.',
	'remember_duration' => 'Onthoudingsduur (seconden)',
	'remember_duration_desc' => 'Hoe lang inhoud ontgrendeld blijft (standaard: 3600 = 1 uur).',
	'security_section' => 'Beveiligingsinstellingen',
	'max_attempts' => 'Max. mislukte pogingen',
	'max_attempts_desc' => 'Aantal mislukte pogingen voor snelheidsbeperking (standaard: 5).',
	'attempt_window' => 'Pogingenvenster (seconden)',
	'attempt_window_desc' => 'Tijdsvenster voor het tellen van mislukte pogingen (standaard: 300 = 5 minuten).',
	'usage_section' => 'Gebruiksinstructies',
	'usage_text' => 'Om inhoud in uw berichten te beschermen, gebruik HTML-opmerkingen:',
	'usage_note' => 'U kunt ook per bericht wachtwoorden instellen in de berichteditor.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'Inhoudsbescherming',
	'entry_password' => 'Berichtwachtwoord',
	'entry_password_desc' => 'Wachtwoord voor beschermde inhoud in dit bericht. Laat leeg om het globale standaardwachtwoord te gebruiken.',
	'usage' => 'Gebruik:',
	'usage_text' => 'Wikkel inhoud met &lt;!--protect--&gt; en &lt;!--/protect--&gt; om het te beschermen.',
];
