<?php
/**
 * Turkish language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'İçerik Koruma';

$lang['admin']['config']['bbcode_protect'] = array(
	'head' => 'BBCode İçerik Koruma Ayarları',
	'desc' => '[protect]...[/protect] BBCode etiketini kullanarak içerik blokları için parola korumasını yapılandırın.',
	
	// General settings
	'general_settings' => 'Genel Ayarlar',
	'allow_inline_password' => 'BBCode\'da satır içi parolalara izin ver',
	'allow_inline_password_desc' => 'Etkinleştirildiğinde, [protect pwd="parola"]...[/protect] sözdizimini kullanmaya izin verir. Devre dışı bırakıldığında, yalnızca giriş başına parolalar kullanılır.',
	'prompt_text_label' => 'Parola İstemi Metni',
	'prompt_text_desc' => 'Parola giriş formunun üzerinde gösterilen metin.',
	'remember_duration_label' => 'Hatırlama Süresi (saniye)',
	'remember_duration_desc' => 'Başarılı girişten sonra parolanın ne kadar süre (saniye cinsinden) hatırlanacağı. Varsayılan: 3600 (1 saat).',
	
	// Security settings
	'security_settings' => 'Güvenlik Ayarları',
	'max_attempts_label' => 'Maksimum Başarısız Deneme',
	'max_attempts_desc' => 'Hız sınırlaması öncesi maksimum başarısız parola denemesi sayısı. Varsayılan: 5.',
	'attempt_window_label' => 'Deneme Penceresi (saniye)',
	'attempt_window_desc' => 'Başarısız denemeleri saymak için zaman penceresi (saniye cinsinden). Varsayılan: 300 (5 dakika).',
	
	// Cache settings
	'cache_settings' => 'Önbellek Ayarları',
	'bypass_cache' => 'Korumalı içerik için önbelleği atla',
	'bypass_cache_desc' => 'Etkinleştirildiğinde, korumalı içeriğe sahip sayfalar, kilidi açılmış içeriğin sızmasını önlemek için önbelleğe alınmayacaktır.',
	
	// Usage instructions
	'usage_title' => 'Kullanım Talimatları',
	'usage_intro' => 'Bu eklenti, BBCode etiketlerini kullanarak içeriğinizin bölümlerini parola ile korumanıza olanak tanır.',
	
	'usage_basic_title' => 'Giriş Parolası ile Temel Kullanım',
	'usage_basic_example' => '[protect]Bu içerik korunmaktadır[/protect]',
	'usage_basic_desc' => 'Giriş meta verilerinde ayarlanan parolayı kullanarak içeriği korur. Giriş parolasını giriş düzenleyicide ayarlayın.',
	
	'usage_inline_title' => 'Satır İçi Parola (etkinleştirilmişse)',
	'usage_inline_example' => '[protect pwd="benimparolam"]Bu içerik korunmaktadır[/protect]',
	'usage_inline_desc' => 'İçeriği belirli bir satır içi parola ile korur. Yalnızca yukarıdaki "Satır içi parolalara izin ver" etkinleştirilmişse çalışır.',
	
	'usage_entry_title' => 'Giriş Parolası Ayarlama',
	'usage_entry_desc' => 'Bir giriş için parola ayarlamak için, gönderi oluştururken veya düzenlerken giriş düzenleyicisinin meta veri panelinde ekleyin.',
	
	'submit' => 'Ayarları Kaydet',
	'msgs' => array(
		1 => 'Ayarlar başarıyla kaydedildi.',
		-1 => 'Ayarlar kaydedilirken hata oluştu.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode_protect'] = array(
	'legend' => 'İçerik Koruma',
	'description' => 'Bu girişte [protect]...[/protect] bloklarını korumak için bir parola ayarlayın.',
	'password_label' => 'Giriş Parolası',
	'note' => 'Parola korumasını kaldırmak için boş bırakın. Parola güvenli bir şekilde hash\'lenecektir.',
);

// Front-end messages
$lang['plugin']['bbcode_protect'] = array(
	'password_label' => 'Parola:',
	'submit_button' => 'Gönder',
	'error_wrong_password' => 'Yanlış parola. Lütfen tekrar deneyin.',
	'error_rate_limited' => 'Çok fazla başarısız deneme. Lütfen daha sonra tekrar deneyin.',
	'feed_replacement' => '[Bu içerik parola ile korunmaktadır]',
);
?>
