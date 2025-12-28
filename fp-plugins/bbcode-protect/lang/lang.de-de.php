<?php
/**
 * German language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Inhaltsschutz';

$lang['admin']['config']['bbcode-protect'] = array(
	'head' => 'BBCode-Inhaltsschutz-Einstellungen',
	'desc' => 'Konfigurieren Sie den Passwortschutz für Inhaltsblöcke mit dem BBCode-Tag [protect]...[/protect].',
	
	// General settings
	'general_settings' => 'Allgemeine Einstellungen',
	'allow_inline_password' => 'Inline-Passwörter in BBCode erlauben',
	'allow_inline_password_desc' => 'Wenn aktiviert, kann die Syntax [protect pwd="passwort"]...[/protect] verwendet werden. Wenn deaktiviert, werden nur Eintragspasswörter verwendet.',
	'prompt_text_label' => 'Passwort-Aufforderungstext',
	'prompt_text_desc' => 'Text, der über dem Passworteingabeformular angezeigt wird.',
	'remember_duration_label' => 'Speicherdauer (Sekunden)',
	'remember_duration_desc' => 'Wie lange (in Sekunden) das Passwort nach erfolgreicher Eingabe gespeichert werden soll. Standard: 3600 (1 Stunde).',
	
	// Security settings
	'security_settings' => 'Sicherheitseinstellungen',
	'max_attempts_label' => 'Maximale Fehlversuche',
	'max_attempts_desc' => 'Maximale Anzahl fehlgeschlagener Passwortversuche vor Ratenbegrenzung. Standard: 5.',
	'attempt_window_label' => 'Versuchszeitfenster (Sekunden)',
	'attempt_window_desc' => 'Zeitfenster (in Sekunden) zum Zählen fehlgeschlagener Versuche. Standard: 300 (5 Minuten).',
	
	// Cache settings
	'cache_settings' => 'Cache-Einstellungen',
	'bypass_cache' => 'Cache für geschützte Inhalte umgehen',
	'bypass_cache_desc' => 'Wenn aktiviert, werden Seiten mit geschützten Inhalten nicht zwischengespeichert, um das Durchsickern entsperrter Inhalte zu verhindern.',
	
	// Usage instructions
	'usage_title' => 'Nutzungsanweisungen',
	'usage_intro' => 'Dieses Plugin ermöglicht es Ihnen, Abschnitte Ihres Inhalts mit BBCode-Tags zu schützen.',
	
	'usage_basic_title' => 'Grundlegende Verwendung mit Eintragspasswort',
	'usage_basic_example' => '[protect]Dieser Inhalt ist geschützt[/protect]',
	'usage_basic_desc' => 'Schützt Inhalte mit dem in den Eintragsmetadaten festgelegten Passwort. Legen Sie das Eintragspasswort im Eintragseditor fest.',
	
	'usage_inline_title' => 'Inline-Passwort (falls aktiviert)',
	'usage_inline_example' => '[protect pwd="meinpasswort"]Dieser Inhalt ist geschützt[/protect]',
	'usage_inline_desc' => 'Schützt Inhalte mit einem bestimmten Inline-Passwort. Funktioniert nur, wenn "Inline-Passwörter erlauben" oben aktiviert ist.',
	
	'usage_entry_title' => 'Eintragspasswort festlegen',
	'usage_entry_desc' => 'Um ein Passwort für einen gesamten Eintrag festzulegen, fügen Sie es beim Erstellen oder Bearbeiten eines Beitrags im Metadatenbereich des Eintragseditors hinzu.',
	
	'submit' => 'Einstellungen speichern',
	'msgs' => array(
		1 => 'Einstellungen erfolgreich gespeichert.',
		-1 => 'Fehler beim Speichern der Einstellungen.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode-protect'] = array(
	'legend' => 'Inhaltsschutz',
	'description' => 'Legen Sie ein Passwort fest, um [protect]...[/protect]-Blöcke in diesem Eintrag zu schützen.',
	'password_label' => 'Eintragspasswort',
	'note' => 'Leer lassen, um den Passwortschutz zu entfernen. Das Passwort wird sicher gehasht.',
);

// Front-end messages
$lang['plugin']['bbcode-protect'] = array(
	'password_label' => 'Passwort:',
	'submit_button' => 'Absenden',
	'error_wrong_password' => 'Falsches Passwort. Bitte versuchen Sie es erneut.',
	'error_rate_limited' => 'Zu viele Fehlversuche. Bitte versuchen Sie es später erneut.',
	'feed_replacement' => '[Dieser Inhalt ist passwortgeschützt]',
);
?>
