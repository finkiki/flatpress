<?php
/**
 * Spanish language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Protección de contenido';

$lang['admin']['config']['bbcode_protect'] = array(
	'head' => 'Configuración de protección de contenido BBCode',
	'desc' => 'Configure la protección con contraseña para bloques de contenido usando la etiqueta BBCode [protect]...[/protect].',
	
	// General settings
	'general_settings' => 'Configuración general',
	'default_password_label' => 'Default Password',
	'default_password_desc' => 'Global password used for all [protect][/protect] blocks when no per-entry or inline password is set. Leave blank to disable password protection by default.',
	'allow_inline_password' => 'Permitir contraseñas en línea en BBCode',
	'allow_inline_password_desc' => 'Cuando está habilitado, permite usar la sintaxis [protect pwd="contraseña"]...[/protect]. Cuando está deshabilitado, solo se usan contraseñas por entrada.',
	'prompt_text_label' => 'Texto de solicitud de contraseña',
	'prompt_text_desc' => 'Texto mostrado encima del formulario de entrada de contraseña.',
	'remember_duration_label' => 'Duración de recuerdo (segundos)',
	'remember_duration_desc' => 'Cuánto tiempo (en segundos) recordar la contraseña después de una entrada exitosa. Predeterminado: 3600 (1 hora).',
	
	// Security settings
	'security_settings' => 'Configuración de seguridad',
	'max_attempts_label' => 'Intentos fallidos máximos',
	'max_attempts_desc' => 'Número máximo de intentos de contraseña fallidos antes de la limitación de velocidad. Predeterminado: 5.',
	'attempt_window_label' => 'Ventana de intentos (segundos)',
	'attempt_window_desc' => 'Ventana de tiempo (en segundos) para contar intentos fallidos. Predeterminado: 300 (5 minutos).',
	
	// Cache settings
	'cache_settings' => 'Configuración de caché',
	'bypass_cache' => 'Omitir caché para contenido protegido',
	'bypass_cache_desc' => 'Cuando está habilitado, las páginas con contenido protegido no se almacenarán en caché para evitar fugas de contenido desbloqueado.',
	
	// Usage instructions
	'usage_title' => 'Instrucciones de uso',
	'usage_intro' => 'Este complemento le permite proteger con contraseña secciones de su contenido usando etiquetas BBCode.',
	
	'usage_basic_title' => 'Uso básico con contraseña por entrada',
	'usage_basic_example' => '[protect]Este contenido está protegido[/protect]',
	'usage_basic_desc' => 'Protege el contenido usando la contraseña establecida en los metadatos de la entrada. Establezca la contraseña de entrada en el editor de entradas.',
	
	'usage_inline_title' => 'Contraseña en línea (si está habilitado)',
	'usage_inline_example' => '[protect pwd="micontraseña"]Este contenido está protegido[/protect]',
	'usage_inline_desc' => 'Protege el contenido con una contraseña en línea específica. Solo funciona si "Permitir contraseñas en línea" está habilitado arriba.',
	
	'usage_entry_title' => 'Establecer contraseña de entrada',
	'usage_entry_desc' => 'Para establecer una contraseña para una entrada completa, agréguela en el panel de metadatos del editor de entradas al crear o editar una publicación.',
	
	'submit' => 'Guardar configuración',
	'msgs' => array(
		1 => 'Configuración guardada exitosamente.',
		-1 => 'Error al guardar la configuración.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode_protect'] = array(
	'legend' => 'Protección de contenido',
	'description' => 'Establezca una contraseña para proteger bloques [protect]...[/protect] en esta entrada.',
	'password_label' => 'Contraseña de entrada',
	'note' => 'Dejar en blanco para eliminar la protección con contraseña. La contraseña se cifrará de forma segura.',
);

// Front-end messages
$lang['plugin']['bbcode_protect'] = array(
	'password_label' => 'Contraseña:',
	'submit_button' => 'Enviar',
	'error_wrong_password' => 'Contraseña incorrecta. Por favor, inténtelo de nuevo.',
	'error_rate_limited' => 'Demasiados intentos fallidos. Por favor, inténtelo más tarde.',
	'feed_replacement' => '[Este contenido está protegido con contraseña]',
);
?>
