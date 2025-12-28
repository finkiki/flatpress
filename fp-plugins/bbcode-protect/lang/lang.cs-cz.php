<?php
/**
 * Czech Language File for Content Protection Plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Ochrana obsahu';

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Heslo:',
	'submit_button' => 'Odeslat',
	'wrong_password' => 'Nesprávné heslo. Zkuste to prosím znovu.',
	'rate_limited' => 'Příliš mnoho neúspěšných pokusů. Zkuste to prosím později.',
	'no_password_set' => 'Pro tento obsah nebylo nastaveno žádné heslo.',
];

$lang['admin']['config']['bbcode_protect'] = [
	'title' => 'Nastavení ochrany obsahu',
	'password_section' => 'Globální heslo',
	'default_password' => 'Výchozí heslo',
	'default_password_desc' => 'Globální heslo pro veškerý chráněný obsah. Může být přepsáno pro jednotlivé příspěvky.',
	'display_section' => 'Nastavení zobrazení',
	'prompt_text' => 'Text výzvy',
	'prompt_text_desc' => 'Zpráva zobrazená nad formulářem pro zadání hesla.',
	'remember_duration' => 'Doba pamatování (sekundy)',
	'remember_duration_desc' => 'Jak dlouho zůstane obsah odemčený (výchozí: 3600 = 1 hodina).',
	'security_section' => 'Nastavení zabezpečení',
	'max_attempts' => 'Max. neúspěšných pokusů',
	'max_attempts_desc' => 'Počet neúspěšných pokusů před omezením (výchozí: 5).',
	'attempt_window' => 'Časové okno pokusů (sekundy)',
	'attempt_window_desc' => 'Časové okno pro počítání neúspěšných pokusů (výchozí: 300 = 5 minut).',
	'usage_section' => 'Pokyny k použití',
	'usage_text' => 'K ochraně obsahu ve vašich příspěvcích použijte HTML komentáře:',
	'usage_note' => 'Můžete také nastavit hesla pro jednotlivé příspěvky v editoru příspěvků.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'Ochrana obsahu',
	'entry_password' => 'Heslo příspěvku',
	'entry_password_desc' => 'Heslo pro chráněný obsah v tomto příspěvku. Nechte prázdné pro použití výchozího globálního hesla.',
	'usage' => 'Použití:',
	'usage_text' => 'Obalte obsah značkami &lt;!--protect--&gt; a &lt;!--/protect--&gt; pro jeho ochranu.',
];
