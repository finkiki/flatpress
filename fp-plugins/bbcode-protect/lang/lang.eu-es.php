<?php
/**
 * Basque language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Eduki Babesa';

$lang['admin']['config']['bbcode_protect'] = array(
	'head' => 'BBCode Eduki Babes Ezarpenak',
	'desc' => 'Konfiguratu pasahitz babesa eduki blokeetarako [protect]...[/protect] BBCode etiketa erabiliz.',
	
	// General settings
	'general_settings' => 'Ezarpen Orokorrak',
	'default_password_label' => 'Default Password',
	'default_password_desc' => 'Global password used for all [protect][/protect] blocks when no per-entry or inline password is set. Leave blank to disable password protection by default.',
	'allow_inline_password' => 'Baimendu barneko pasahitzak BBCode-n',
	'allow_inline_password_desc' => 'Gaituta dagoenean, [protect pwd="pasahitza"]...[/protect] sintaxia erabiltzea ahalbidetzen du. Desgaituta dagoenean, sarrera bakoitzeko pasahitzak bakarrik erabiltzen dira.',
	'prompt_text_label' => 'Pasahitz Eskaera Testua',
	'prompt_text_desc' => 'Pasahitz sarrera formularioaren gainean erakutsitako testua.',
	'remember_duration_label' => 'Gogoratu Iraupena (segundoak)',
	'remember_duration_desc' => 'Zenbat denbora (segundotan) gogoratu pasahitza sarrera arrakastatsua egin ondoren. Lehenetsia: 3600 (ordu 1).',
	
	// Security settings
	'security_settings' => 'Segurtasun Ezarpenak',
	'max_attempts_label' => 'Gehienezko Saiakera Huts',
	'max_attempts_desc' => 'Pasahitz saiakera huts gehieneko kopurua abiadura mugatua aplikatu aurretik. Lehenetsia: 5.',
	'attempt_window_label' => 'Saiakera Leihoa (segundoak)',
	'attempt_window_desc' => 'Denbora leihoa (segundotan) saiakera hutsak zenbatzeko. Lehenetsia: 300 (5 minutu).',
	
	// Cache settings
	'cache_settings' => 'Cache Ezarpenak',
	'bypass_cache' => 'Cache saihestu babestutako edukientzat',
	'bypass_cache_desc' => 'Gaituta dagoenean, babestutako edukia duten orriak ez dira cache-an gordeko desblokeatu den edukia ihes egitea saihesteko.',
	
	// Usage instructions
	'usage_title' => 'Erabilera Argibideak',
	'usage_intro' => 'Plugin honek zure edukiaren atalak pasahitzez babestea ahalbidetzen dizu BBCode etiketak erabiliz.',
	
	'usage_basic_title' => 'Oinarrizko Erabilera Sarrera Pasahitzarekin',
	'usage_basic_example' => '[protect]Eduki hau babestua dago[/protect]',
	'usage_basic_desc' => 'Edukia babesten du sarreraren metadatuetan ezarritako pasahitza erabiliz. Ezarri sarreraren pasahitza sarrera editorean.',
	
	'usage_inline_title' => 'Barneko Pasahitza (gaituta badago)',
	'usage_inline_example' => '[protect pwd="nire_pasahitza"]Eduki hau babestua dago[/protect]',
	'usage_inline_desc' => 'Edukia barneko pasahitz zehatz batekin babesten du. Soilik funtzionatzen du goian "Baimendu barneko pasahitzak" gaituta badago.',
	
	'usage_entry_title' => 'Sarrera Pasahitza Ezarri',
	'usage_entry_desc' => 'Sarrera osorako pasahitza ezartzeko, gehitu sarrera editorearen metadatu panelean argitalpen bat sortzen edo editatzen duzunean.',
	
	'submit' => 'Gorde Ezarpenak',
	'msgs' => array(
		1 => 'Ezarpenak arrakastaz gorde dira.',
		-1 => 'Errorea ezarpenak gordetzean.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode_protect'] = array(
	'legend' => 'Eduki Babesa',
	'description' => 'Ezarri pasahitza sarrera honetako [protect]...[/protect] blokeak babesteko.',
	'password_label' => 'Sarrera Pasahitza',
	'note' => 'Utzi hutsik pasahitz babesa kentzeko. Pasahitza modu seguruan hash egingo da.',
);

// Front-end messages
$lang['plugin']['bbcode_protect'] = array(
	'password_label' => 'Pasahitza:',
	'submit_button' => 'Bidali',
	'error_wrong_password' => 'Pasahitz okerra. Mesedez, saiatu berriro.',
	'error_rate_limited' => 'Saiakera huts gehiegi. Mesedez, saiatu geroago.',
	'feed_replacement' => '[Eduki hau pasahitzez babestua dago]',
);
?>
