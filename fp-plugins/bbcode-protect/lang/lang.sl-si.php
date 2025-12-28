<?php
/**
 * Slovenian Language File for Content Protection Plugin
 */

$lang['admin']['plugin']['submenu']['bbcode_protect'] = 'Zaščita Vsebine';

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Geslo:',
	'submit_button' => 'Pošlji',
	'wrong_password' => 'Nepravilno geslo. Prosimo, poskusite znova.',
	'rate_limited' => 'Preveč neuspešnih poskusov. Prosimo, poskusite kasneje.',
	'no_password_set' => 'Za to vsebino ni bilo nastavljeno nobeno geslo.',
];

$lang['admin']['plugin']['bbcode_protect'] = [
	'title' => 'Nastavitve zaščite vsebine',
	'password_section' => 'Globalno geslo',
	'default_password' => 'Privzeto geslo',
	'default_password_desc' => 'Globalno geslo za vso zaščiteno vsebino. Lahko se prepiše za posamezen vnos.',
	'display_section' => 'Nastavitve prikaza',
	'prompt_text' => 'Besedilo poziva',
	'prompt_text_desc' => 'Sporočilo prikazano nad obrazcem za geslo.',
	'remember_duration' => 'Trajanje pomnjenja (sekunde)',
	'remember_duration_desc' => 'Kako dolgo ostane vsebina odklenjena (privzeto: 3600 = 1 ura).',
	'security_section' => 'Varnostne nastavitve',
	'max_attempts' => 'Maks. neuspešnih poskusov',
	'max_attempts_desc' => 'Število neuspešnih poskusov pred omejitvijo (privzeto: 5).',
	'attempt_window' => 'Okno poskusov (sekunde)',
	'attempt_window_desc' => 'Časovno okno za štetje neuspešnih poskusov (privzeto: 300 = 5 minut).',
	'usage_section' => 'Navodila za uporabo',
	'usage_text' => 'Za zaščito vsebine v vaših objavah uporabite HTML komentarje:',
	'usage_note' => 'V urejevalniku vnosov lahko nastavite tudi gesla za posamezen vnos.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'Zaščita vsebine',
	'entry_password' => 'Geslo vnosa',
	'entry_password_desc' => 'Geslo za zaščiteno vsebino v tem vnosu. Pustite prazno za uporabo privzetega globalnega gesla.',
	'usage' => 'Uporaba:',
	'usage_text' => 'Vsebino ovijte z &lt;!--protect--&gt; in &lt;!--/protect--&gt; za zaščito.',
];
