<?php
/**
 * German Language File for Content Protection Plugin
 */

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Passwort:',
	'submit_button' => 'Absenden',
	'wrong_password' => 'Falsches Passwort. Bitte versuchen Sie es erneut.',
	'rate_limited' => 'Zu viele fehlgeschlagene Versuche. Bitte versuchen Sie es später erneut.',
	'no_password_set' => 'Für diesen Inhalt wurde kein Passwort festgelegt.',
];

$lang['admin']['plugin']['bbcode_protect'] = [
	'title' => 'Inhaltsschutz-Einstellungen',
	'password_section' => 'Globales Passwort',
	'default_password' => 'Standardpasswort',
	'default_password_desc' => 'Globales Passwort für alle geschützten Inhalte. Kann pro Beitrag überschrieben werden.',
	'display_section' => 'Anzeigeeinstellungen',
	'prompt_text' => 'Aufforderungstext',
	'prompt_text_desc' => 'Nachricht, die über dem Passwortformular angezeigt wird.',
	'remember_duration' => 'Merkdauer (Sekunden)',
	'remember_duration_desc' => 'Wie lange der Inhalt entsperrt bleibt (Standard: 3600 = 1 Stunde).',
	'security_section' => 'Sicherheitseinstellungen',
	'max_attempts' => 'Max. Fehlversuche',
	'max_attempts_desc' => 'Anzahl der Fehlversuche vor Ratenbegrenzung (Standard: 5).',
	'attempt_window' => 'Versuchszeitfenster (Sekunden)',
	'attempt_window_desc' => 'Zeitfenster zum Zählen fehlgeschlagener Versuche (Standard: 300 = 5 Minuten).',
	'usage_section' => 'Gebrauchsanweisung',
	'usage_text' => 'Um Inhalte in Ihren Beiträgen zu schützen, verwenden Sie HTML-Kommentare:',
	'usage_note' => 'Sie können auch pro Beitrag Passwörter im Beitragseditor festlegen.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'Inhaltsschutz',
	'entry_password' => 'Beitragspasswort',
	'entry_password_desc' => 'Passwort für geschützten Inhalt in diesem Beitrag. Leer lassen, um das globale Standardpasswort zu verwenden.',
	'usage' => 'Verwendung:',
	'usage_text' => 'Umschließen Sie Inhalte mit &lt;!--protect--&gt; und &lt;!--/protect--&gt;, um sie zu schützen.',
];
