<?php
/**
 * Spanish Language File for Content Protection Plugin
 */

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Contraseña:',
	'submit_button' => 'Enviar',
	'wrong_password' => 'Contraseña incorrecta. Por favor, inténtelo de nuevo.',
	'rate_limited' => 'Demasiados intentos fallidos. Por favor, inténtelo más tarde.',
	'no_password_set' => 'No se ha establecido ninguna contraseña para este contenido.',
];

$lang['admin']['plugin']['bbcode_protect'] = [
	'title' => 'Configuración de protección de contenido',
	'password_section' => 'Contraseña global',
	'default_password' => 'Contraseña predeterminada',
	'default_password_desc' => 'Contraseña global para todo el contenido protegido. Puede ser sobrescrita por entrada.',
	'display_section' => 'Configuración de visualización',
	'prompt_text' => 'Texto de solicitud',
	'prompt_text_desc' => 'Mensaje mostrado sobre el formulario de contraseña.',
	'remember_duration' => 'Duración de recordatorio (segundos)',
	'remember_duration_desc' => 'Cuánto tiempo permanece desbloqueado el contenido (predeterminado: 3600 = 1 hora).',
	'security_section' => 'Configuración de seguridad',
	'max_attempts' => 'Máx. intentos fallidos',
	'max_attempts_desc' => 'Número de intentos fallidos antes de limitar (predeterminado: 5).',
	'attempt_window' => 'Ventana de intentos (segundos)',
	'attempt_window_desc' => 'Ventana de tiempo para contar intentos fallidos (predeterminado: 300 = 5 minutos).',
	'usage_section' => 'Instrucciones de uso',
	'usage_text' => 'Para proteger contenido en sus publicaciones, use comentarios HTML:',
	'usage_note' => 'También puede establecer contraseñas por entrada en el editor de entradas.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'Protección de contenido',
	'entry_password' => 'Contraseña de entrada',
	'entry_password_desc' => 'Contraseña para contenido protegido en esta entrada. Deje en blanco para usar la contraseña global predeterminada.',
	'usage' => 'Uso:',
	'usage_text' => 'Envuelva el contenido con &lt;!--protect--&gt; y &lt;!--/protect--&gt; para protegerlo.',
];
