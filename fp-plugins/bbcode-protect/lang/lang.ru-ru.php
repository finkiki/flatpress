<?php
/**
 * Russian language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Защита контента';

$lang['admin']['config']['bbcode_protect'] = array(
	'head' => 'Настройки защиты контента BBCode',
	'desc' => 'Настройте защиту паролем для блоков контента с использованием BBCode тега [protect]...[/protect].',
	
	// General settings
	'general_settings' => 'Общие настройки',
	'default_password_label' => 'Default Password',
	'default_password_desc' => 'Global password used for all [protect][/protect] blocks when no per-entry or inline password is set. Leave blank to disable password protection by default.',
	'allow_inline_password' => 'Разрешить встроенные пароли в BBCode',
	'allow_inline_password_desc' => 'При включении разрешает использование синтаксиса [protect pwd="пароль"]...[/protect]. При отключении используются только пароли для записей.',
	'prompt_text_label' => 'Текст запроса пароля',
	'prompt_text_desc' => 'Текст, отображаемый над формой ввода пароля.',
	'remember_duration_label' => 'Длительность запоминания (секунды)',
	'remember_duration_desc' => 'Как долго (в секундах) запоминать пароль после успешного ввода. По умолчанию: 3600 (1 час).',
	
	// Security settings
	'security_settings' => 'Настройки безопасности',
	'max_attempts_label' => 'Максимальное количество неудачных попыток',
	'max_attempts_desc' => 'Максимальное количество неудачных попыток ввода пароля до ограничения скорости. По умолчанию: 5.',
	'attempt_window_label' => 'Окно попыток (секунды)',
	'attempt_window_desc' => 'Временное окно (в секундах) для подсчета неудачных попыток. По умолчанию: 300 (5 минут).',
	
	// Cache settings
	'cache_settings' => 'Настройки кэша',
	'bypass_cache' => 'Обходить кэш для защищенного контента',
	'bypass_cache_desc' => 'При включении страницы с защищенным контентом не будут кэшироваться, чтобы предотвратить утечку разблокированного контента.',
	
	// Usage instructions
	'usage_title' => 'Инструкции по использованию',
	'usage_intro' => 'Этот плагин позволяет защищать разделы вашего контента паролем, используя BBCode теги.',
	
	'usage_basic_title' => 'Базовое использование с паролем для записи',
	'usage_basic_example' => '[protect]Этот контент защищен[/protect]',
	'usage_basic_desc' => 'Защищает контент с использованием пароля, установленного в метаданных записи. Установите пароль записи в редакторе записей.',
	
	'usage_inline_title' => 'Встроенный пароль (если включено)',
	'usage_inline_example' => '[protect pwd="мойпароль"]Этот контент защищен[/protect]',
	'usage_inline_desc' => 'Защищает контент конкретным встроенным паролем. Работает только если "Разрешить встроенные пароли" включено выше.',
	
	'usage_entry_title' => 'Установить пароль записи',
	'usage_entry_desc' => 'Чтобы установить пароль для всей записи, добавьте его в панели метаданных редактора записей при создании или редактировании поста.',
	
	'submit' => 'Сохранить настройки',
	'msgs' => array(
		1 => 'Настройки успешно сохранены.',
		-1 => 'Ошибка при сохранении настроек.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode_protect'] = array(
	'legend' => 'Защита контента',
	'description' => 'Установите пароль для защиты блоков [protect]...[/protect] в этой записи.',
	'password_label' => 'Пароль записи',
	'note' => 'Оставьте пустым для удаления защиты паролем. Пароль будет надежно хэширован.',
);

// Front-end messages
$lang['plugin']['bbcode_protect'] = array(
	'password_label' => 'Пароль:',
	'submit_button' => 'Отправить',
	'error_wrong_password' => 'Неверный пароль. Пожалуйста, попробуйте снова.',
	'error_rate_limited' => 'Слишком много неудачных попыток. Пожалуйста, попробуйте позже.',
	'feed_replacement' => '[Этот контент защищен паролем]',
);
?>
