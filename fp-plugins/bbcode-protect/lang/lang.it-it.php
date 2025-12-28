<?php
/**
 * Italian language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Protezione contenuti';

$lang['admin']['config']['bbcode_protect'] = array(
	'head' => 'Impostazioni di protezione dei contenuti BBCode',
	'desc' => 'Configura la protezione con password per i blocchi di contenuto usando il tag BBCode [protect]...[/protect].',
	
	// General settings
	'general_settings' => 'Impostazioni generali',
	'allow_inline_password' => 'Consenti password in linea in BBCode',
	'allow_inline_password_desc' => 'Quando abilitato, consente l\'uso della sintassi [protect pwd="password"]...[/protect]. Quando disabilitato, vengono utilizzate solo le password per voce.',
	'prompt_text_label' => 'Testo richiesta password',
	'prompt_text_desc' => 'Testo mostrato sopra il modulo di inserimento password.',
	'remember_duration_label' => 'Durata memorizzazione (secondi)',
	'remember_duration_desc' => 'Per quanto tempo (in secondi) ricordare la password dopo un inserimento riuscito. Predefinito: 3600 (1 ora).',
	
	// Security settings
	'security_settings' => 'Impostazioni di sicurezza',
	'max_attempts_label' => 'Tentativi falliti massimi',
	'max_attempts_desc' => 'Numero massimo di tentativi di password falliti prima della limitazione della frequenza. Predefinito: 5.',
	'attempt_window_label' => 'Finestra tentativi (secondi)',
	'attempt_window_desc' => 'Finestra temporale (in secondi) per contare i tentativi falliti. Predefinito: 300 (5 minuti).',
	
	// Cache settings
	'cache_settings' => 'Impostazioni cache',
	'bypass_cache' => 'Ignora cache per contenuti protetti',
	'bypass_cache_desc' => 'Quando abilitato, le pagine con contenuti protetti non verranno memorizzate nella cache per evitare perdite di contenuti sbloccati.',
	
	// Usage instructions
	'usage_title' => 'Istruzioni per l\'uso',
	'usage_intro' => 'Questo plugin ti consente di proteggere con password sezioni del tuo contenuto usando i tag BBCode.',
	
	'usage_basic_title' => 'Uso base con password per voce',
	'usage_basic_example' => '[protect]Questo contenuto è protetto[/protect]',
	'usage_basic_desc' => 'Protegge il contenuto usando la password impostata nei metadati della voce. Imposta la password della voce nell\'editor di voci.',
	
	'usage_inline_title' => 'Password in linea (se abilitato)',
	'usage_inline_example' => '[protect pwd="miapassword"]Questo contenuto è protetto[/protect]',
	'usage_inline_desc' => 'Protegge il contenuto con una password in linea specifica. Funziona solo se "Consenti password in linea" è abilitato sopra.',
	
	'usage_entry_title' => 'Imposta password voce',
	'usage_entry_desc' => 'Per impostare una password per un\'intera voce, aggiungila nel pannello dei metadati dell\'editor di voci durante la creazione o modifica di un post.',
	
	'submit' => 'Salva impostazioni',
	'msgs' => array(
		1 => 'Impostazioni salvate con successo.',
		-1 => 'Errore durante il salvataggio delle impostazioni.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode_protect'] = array(
	'legend' => 'Protezione contenuti',
	'description' => 'Imposta una password per proteggere i blocchi [protect]...[/protect] in questa voce.',
	'password_label' => 'Password voce',
	'note' => 'Lascia vuoto per rimuovere la protezione password. La password sarà crittografata in modo sicuro.',
);

// Front-end messages
$lang['plugin']['bbcode_protect'] = array(
	'password_label' => 'Password:',
	'submit_button' => 'Invia',
	'error_wrong_password' => 'Password errata. Riprova.',
	'error_rate_limited' => 'Troppi tentativi falliti. Riprova più tardi.',
	'feed_replacement' => '[Questo contenuto è protetto da password]',
);
?>
