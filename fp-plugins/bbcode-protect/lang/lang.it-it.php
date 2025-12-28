<?php
/**
 * Italian Language File for Content Protection Plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Protezione Contenuti';

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Password:',
	'submit_button' => 'Invia',
	'wrong_password' => 'Password errata. Riprova.',
	'rate_limited' => 'Troppi tentativi falliti. Riprova più tardi.',
	'no_password_set' => 'Nessuna password è stata impostata per questo contenuto.',
];

$lang['admin']['config']['bbcode_protect'] = [
	'title' => 'Impostazioni protezione contenuti',
	'password_section' => 'Password globale',
	'default_password' => 'Password predefinita',
	'default_password_desc' => 'Password globale per tutti i contenuti protetti. Può essere sovrascritta per articolo.',
	'display_section' => 'Impostazioni visualizzazione',
	'prompt_text' => 'Testo richiesta',
	'prompt_text_desc' => 'Messaggio mostrato sopra il modulo password.',
	'remember_duration' => 'Durata memorizzazione (secondi)',
	'remember_duration_desc' => 'Quanto tempo rimane sbloccato il contenuto (predefinito: 3600 = 1 ora).',
	'security_section' => 'Impostazioni sicurezza',
	'max_attempts' => 'Max tentativi falliti',
	'max_attempts_desc' => 'Numero di tentativi falliti prima della limitazione (predefinito: 5).',
	'attempt_window' => 'Finestra tentativi (secondi)',
	'attempt_window_desc' => 'Finestra temporale per contare i tentativi falliti (predefinito: 300 = 5 minuti).',
	'usage_section' => 'Istruzioni per l\'uso',
	'usage_text' => 'Per proteggere i contenuti nei tuoi articoli, usa i commenti HTML:',
	'usage_note' => 'Puoi anche impostare password per articolo nell\'editor degli articoli.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'Protezione contenuto',
	'entry_password' => 'Password articolo',
	'entry_password_desc' => 'Password per i contenuti protetti in questo articolo. Lascia vuoto per usare la password globale predefinita.',
	'usage' => 'Uso:',
	'usage_text' => 'Racchiudi il contenuto con &lt;!--protect--&gt; e &lt;!--/protect--&gt; per proteggerlo.',
];
