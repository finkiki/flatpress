<?php
$lang['admin']['plugin']['submenu']['announcementbar'] = 'Barra di annunci';
$lang['admin']['plugin']['announcementbar'] = array(
	'head' => 'Configurazione barra di annunci',
	'desc' => 'Configura una barra di notifica/annuncio fissa in alto che può essere visualizzata sul tuo sito con pianificazione, regole di visibilità e opzioni chiudibili.',
	
	'general' => 'Impostazioni generali',
	'enabled' => 'Abilita barra di annunci',
	'enabled_long' => 'Seleziona per visualizzare la barra di annunci sul tuo sito.',
	'content' => 'Contenuto dell\'annuncio',
	'content_long' => 'Inserisci il tuo messaggio di annuncio. Supporta markup BBCode e HTML. Mantienilo conciso per una migliore visualizzazione mobile.',
	
	'visibility' => 'Impostazioni di visibilità',
	'visibility_mode' => 'Modalità di visualizzazione',
	'visibility_all' => 'Mostra su tutte le pagine',
	'visibility_include' => 'Mostra solo sui percorsi specificati',
	'visibility_exclude' => 'Nascondi sui percorsi specificati',
	'visibility_mode_long' => 'Scegli dove deve essere visualizzata la barra di annunci.',
	'visibility_patterns' => 'Pattern URL',
	'visibility_patterns_long' => 'Inserisci un pattern per riga. Usa * come jolly. Esempi: /blog/*, /index.php, /static.php*',
	
	'dismissible_section' => 'Impostazioni chiudibili',
	'dismissible' => 'Consenti ai visitatori di chiudere',
	'dismissible_long' => 'Se abilitato, i visitatori possono chiudere la barra di annunci. La loro scelta viene ricordata tramite cookie/localStorage.',
	'dismiss_version' => 'Versione del messaggio',
	'dismiss_version_long' => 'Cambia questo valore per mostrare nuovamente la barra ai visitatori che l\'hanno precedentemente chiusa (ad esempio, quando aggiorni il messaggio).',
	
	'scheduling' => 'Pianificazione',
	'schedule_enabled' => 'Abilita pianificazione',
	'schedule_enabled_long' => 'Visualizza la barra di annunci solo durante una finestra temporale specifica.',
	'schedule_start' => 'Data/ora di inizio',
	'schedule_start_long' => 'La barra di annunci non apparirà prima di questa data/ora (facoltativo).',
	'schedule_end' => 'Data/ora di fine',
	'schedule_end_long' => 'La barra di annunci non apparirà dopo questa data/ora (facoltativo).',
	
	'styling' => 'Stile',
	'bg_color' => 'Colore di sfondo',
	'text_color' => 'Colore del testo',
	'font_size' => 'Dimensione font (px)',
	'font_size_long' => 'Dimensione del font in pixel (10-24).',
	'padding' => 'Padding (px)',
	'padding_long' => 'Padding verticale in pixel (5-30).',
	'height' => 'Altezza',
	'height_long' => 'Altezza minima in pixel, o "auto" per altezza automatica.',
	
	'submit' => 'Salva configurazione',
	'msgs' => array(
		1 => 'Configurazione della barra di annunci salvata con successo.',
		-1 => 'Configurazione della barra di annunci non salvata.'
	)
);

$lang['plugin']['announcementbar'] = array(
	'close' => 'Chiudi annuncio'
);
?>
