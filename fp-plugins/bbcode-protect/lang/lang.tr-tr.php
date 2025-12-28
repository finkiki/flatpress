<?php
/**
 * Turkish Language File for Content Protection Plugin
 */

$lang['admin']['plugin']['submenu']['bbcode_protect'] = 'İçerik Koruması';

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Şifre:',
	'submit_button' => 'Gönder',
	'wrong_password' => 'Yanlış şifre. Lütfen tekrar deneyin.',
	'rate_limited' => 'Çok fazla başarısız deneme. Lütfen daha sonra tekrar deneyin.',
	'no_password_set' => 'Bu içerik için şifre ayarlanmamış.',
];

$lang['admin']['plugin']['bbcode_protect'] = [
	'title' => 'İçerik koruma ayarları',
	'password_section' => 'Genel şifre',
	'default_password' => 'Varsayılan şifre',
	'default_password_desc' => 'Tüm korumalı içerik için genel şifre. Giriş başına geçersiz kılınabilir.',
	'display_section' => 'Görüntüleme ayarları',
	'prompt_text' => 'İstem metni',
	'prompt_text_desc' => 'Şifre formunun üzerinde gösterilen mesaj.',
	'remember_duration' => 'Hatırlama süresi (saniye)',
	'remember_duration_desc' => 'İçeriğin kilitli olmadan ne kadar süre kalacağı (varsayılan: 3600 = 1 saat).',
	'security_section' => 'Güvenlik ayarları',
	'max_attempts' => 'Maks. başarısız deneme',
	'max_attempts_desc' => 'Hız sınırlaması öncesi başarısız deneme sayısı (varsayılan: 5).',
	'attempt_window' => 'Deneme penceresi (saniye)',
	'attempt_window_desc' => 'Başarısız denemeleri saymak için zaman penceresi (varsayılan: 300 = 5 dakika).',
	'usage_section' => 'Kullanım talimatları',
	'usage_text' => 'Gönderilerinizde içeriği korumak için HTML yorumlarını kullanın:',
	'usage_note' => 'Giriş düzenleyicide giriş başına şifreler de ayarlayabilirsiniz.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'İçerik koruma',
	'entry_password' => 'Giriş şifresi',
	'entry_password_desc' => 'Bu girişte korumalı içerik için şifre. Varsayılan genel şifreyi kullanmak için boş bırakın.',
	'usage' => 'Kullanım:',
	'usage_text' => 'İçeriği korumak için &lt;!--protect--&gt; ve &lt;!--/protect--&gt; ile sarın.',
];
