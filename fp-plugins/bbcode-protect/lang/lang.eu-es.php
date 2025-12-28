<?php
/**
 * Basque Language File for Content Protection Plugin
 */

$lang['admin']['plugin']['submenu']['bbcode_protect'] = 'Edukien Babesa';

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Pasahitza:',
	'submit_button' => 'Bidali',
	'wrong_password' => 'Pasahitz okerra. Saiatu berriro.',
	'rate_limited' => 'Saiakera huts gehiegi. Saiatu berriro geroago.',
	'no_password_set' => 'Ez da pasahitzik ezarri eduki honetarako.',
];

$lang['admin']['plugin']['bbcode_protect'] = [
	'title' => 'Edukiaren babes-ezarpenak',
	'password_section' => 'Pasahitz orokorra',
	'default_password' => 'Lehenetsitako pasahitza',
	'default_password_desc' => 'Babestutako eduki guztietarako pasahitz orokorra. Sarrera bakoitzeko gainidatzi daiteke.',
	'display_section' => 'Bistaratze-ezarpenak',
	'prompt_text' => 'Gonbit-testua',
	'prompt_text_desc' => 'Pasahitz-inprimakiraren gainean erakusten den mezua.',
	'remember_duration' => 'Gogoratze-iraupena (segundoak)',
	'remember_duration_desc' => 'Zenbat denboran egoten den edukia desblokeatuta (lehenetsia: 3600 = 1 ordu).',
	'security_section' => 'Segurtasun-ezarpenak',
	'max_attempts' => 'Saiakera huts gehienez',
	'max_attempts_desc' => 'Mugatu aurretik onartzen diren saiakera huts kopurua (lehenetsia: 5).',
	'attempt_window' => 'Saiakera-leihoa (segundoak)',
	'attempt_window_desc' => 'Saiakera hutsak zenbatzeko denbora-leihoa (lehenetsia: 300 = 5 minutu).',
	'usage_section' => 'Erabilera-argibideak',
	'usage_text' => 'Zure argitalpenetan edukia babesteko, erabili HTML iruzkinak:',
	'usage_note' => 'Sarrera-editorean sarrera bakoitzeko pasahitzak ere ezar ditzakezu.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'Edukiaren babesa',
	'entry_password' => 'Sarreraren pasahitza',
	'entry_password_desc' => 'Sarrera honetako babestutako edukiarentzako pasahitza. Utzi hutsik lehenetsitako pasahitz orokorra erabiltzeko.',
	'usage' => 'Erabilera:',
	'usage_text' => 'Edukia &lt;!--protect--&gt; eta &lt;!--/protect--&gt; erabiliz inguratu babesteko.',
];
