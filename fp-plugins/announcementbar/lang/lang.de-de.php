<?php
$lang['admin']['plugin']['submenu']['announcementbar'] = 'Ankündigungsleiste';
$lang['admin']['plugin']['announcementbar'] = array(
	'head' => 'Ankündigungsleiste-Konfiguration',
	'desc' => 'Konfigurieren Sie eine feste obere Benachrichtigungs-/Ankündigungsleiste, die auf Ihrer Website mit Planung, Sichtbarkeitsregeln und schließbaren Optionen angezeigt werden kann.',
	
	'general' => 'Allgemeine Einstellungen',
	'enabled' => 'Ankündigungsleiste aktivieren',
	'enabled_long' => 'Aktivieren Sie dies, um die Ankündigungsleiste auf Ihrer Website anzuzeigen.',
	'content' => 'Ankündigungsinhalt',
	'content_long' => 'Geben Sie Ihre Ankündigungsnachricht ein. Unterstützt BBCode und HTML-Markup. Halten Sie es kurz für eine bessere mobile Anzeige.',
	
	'visibility' => 'Sichtbarkeitseinstellungen',
	'visibility_mode' => 'Anzeigemodus',
	'visibility_all' => 'Auf allen Seiten anzeigen',
	'visibility_include' => 'Nur auf angegebenen Pfaden anzeigen',
	'visibility_exclude' => 'Auf angegebenen Pfaden ausblenden',
	'visibility_mode_long' => 'Wählen Sie, wo die Ankündigungsleiste angezeigt werden soll.',
	'visibility_patterns' => 'URL-Muster',
	'visibility_patterns_long' => 'Geben Sie ein Muster pro Zeile ein. Verwenden Sie * als Platzhalter. Beispiele: /blog/*, /index.php, /static.php*',
	
	'dismissible_section' => 'Schließbare Einstellungen',
	'dismissible' => 'Besuchern erlauben zu schließen',
	'dismissible_long' => 'Wenn aktiviert, können Besucher die Ankündigungsleiste schließen. Ihre Wahl wird über Cookie/localStorage gespeichert.',
	'dismiss_version' => 'Nachrichtenversion',
	'dismiss_version_long' => 'Ändern Sie diesen Wert, um die Leiste erneut Besuchern anzuzeigen, die sie zuvor geschlossen haben (z.B. wenn Sie die Nachricht aktualisieren).',
	
	'scheduling' => 'Zeitplanung',
	'schedule_enabled' => 'Zeitplanung aktivieren',
	'schedule_enabled_long' => 'Die Ankündigungsleiste nur während eines bestimmten Zeitfensters anzeigen.',
	'schedule_start' => 'Startdatum/-zeit',
	'schedule_start_long' => 'Die Ankündigungsleiste wird vor diesem Datum/dieser Zeit nicht angezeigt (optional).',
	'schedule_end' => 'Enddatum/-zeit',
	'schedule_end_long' => 'Die Ankündigungsleiste wird nach diesem Datum/dieser Zeit nicht angezeigt (optional).',
	
	'styling' => 'Styling',
	'bg_color' => 'Hintergrundfarbe',
	'text_color' => 'Textfarbe',
	'font_size' => 'Schriftgröße (px)',
	'font_size_long' => 'Schriftgröße in Pixel (10-24).',
	'padding' => 'Innenabstand (px)',
	'padding_long' => 'Vertikaler Innenabstand in Pixel (5-30).',
	'height' => 'Höhe',
	'height_long' => 'Mindesthöhe in Pixel oder "auto" für automatische Höhe.',
	
	'submit' => 'Konfiguration speichern',
	'msg_success' => 'Ankündigungsleiste-Konfiguration erfolgreich gespeichert.',
	'msg_error' => 'Ankündigungsleiste-Konfiguration nicht gespeichert.'
);

$lang['plugin']['announcementbar'] = array(
	'close' => 'Ankündigung schließen'
);
?>
