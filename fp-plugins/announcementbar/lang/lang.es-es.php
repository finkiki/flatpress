<?php
$lang['admin']['plugin']['submenu']['announcementbar'] = 'Barra de anuncios';
$lang['admin']['plugin']['announcementbar'] = array(
	'head' => 'Configuración de la barra de anuncios',
	'desc' => 'Configure una barra de notificación/anuncio fija en la parte superior que se puede mostrar en su sitio con programación, reglas de visibilidad y opciones de cierre.',
	
	'general' => 'Configuración general',
	'enabled' => 'Habilitar barra de anuncios',
	'enabled_long' => 'Marque esto para mostrar la barra de anuncios en su sitio.',
	'content' => 'Contenido del anuncio',
	'content_long' => 'Ingrese su mensaje de anuncio. Admite marcado BBCode y HTML. Manténgalo conciso para una mejor visualización móvil.',
	
	'visibility' => 'Configuración de visibilidad',
	'visibility_mode' => 'Modo de visualización',
	'visibility_all' => 'Mostrar en todas las páginas',
	'visibility_include' => 'Mostrar solo en rutas especificadas',
	'visibility_exclude' => 'Ocultar en rutas especificadas',
	'visibility_mode_long' => 'Elija dónde se debe mostrar la barra de anuncios.',
	'visibility_patterns' => 'Patrones de URL',
	'visibility_patterns_long' => 'Ingrese un patrón por línea. Use * como comodín. Ejemplos: /blog/*, /index.php, /static.php*',
	
	'dismissible_section' => 'Configuración de cierre',
	'dismissible' => 'Permitir a los visitantes cerrar',
	'dismissible_long' => 'Si está habilitado, los visitantes pueden cerrar la barra de anuncios. Su elección se recuerda a través de cookie/localStorage.',
	'dismiss_version' => 'Versión del mensaje',
	'dismiss_version_long' => 'Cambie este valor para mostrar la barra nuevamente a los visitantes que la cerraron previamente (por ejemplo, cuando actualiza el mensaje).',
	
	'scheduling' => 'Programación',
	'schedule_enabled' => 'Habilitar programación',
	'schedule_enabled_long' => 'Mostrar la barra de anuncios solo durante una ventana de tiempo específica.',
	'schedule_start' => 'Fecha/hora de inicio',
	'schedule_start_long' => 'La barra de anuncios no aparecerá antes de esta fecha/hora (opcional).',
	'schedule_end' => 'Fecha/hora de finalización',
	'schedule_end_long' => 'La barra de anuncios no aparecerá después de esta fecha/hora (opcional).',
	
	'styling' => 'Estilo',
	'bg_color' => 'Color de fondo',
	'text_color' => 'Color del texto',
	'font_size' => 'Tamaño de fuente (px)',
	'font_size_long' => 'Tamaño de fuente en píxeles (10-24).',
	'padding' => 'Relleno (px)',
	'padding_long' => 'Relleno vertical en píxeles (5-30).',
	'height' => 'Altura',
	'height_long' => 'Altura mínima en píxeles, o "auto" para altura automática.',
	
	'submit' => 'Guardar configuración',
	'msgs' => array(
		1 => 'Configuración de la barra de anuncios guardada correctamente.',
		-1 => 'Configuración de la barra de anuncios no guardada.'
	)
);

$lang['plugin']['announcementbar'] = array(
	'close' => 'Cerrar anuncio'
);
?>
