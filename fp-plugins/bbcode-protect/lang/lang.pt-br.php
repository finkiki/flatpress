<?php
/**
 * Portuguese (Brazilian) language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Proteção de conteúdo';

$lang['admin']['config']['bbcode_protect'] = array(
	'head' => 'Configurações de proteção de conteúdo BBCode',
	'desc' => 'Configure a proteção por senha para blocos de conteúdo usando a tag BBCode [protect]...[/protect].',
	
	// General settings
	'general_settings' => 'Configurações gerais',
	'default_password_label' => 'Default Password',
	'default_password_desc' => 'Global password used for all [protect][/protect] blocks when no per-entry or inline password is set. Leave blank to disable password protection by default.',
	'allow_inline_password' => 'Permitir senhas inline no BBCode',
	'allow_inline_password_desc' => 'Quando habilitado, permite usar a sintaxe [protect pwd="senha"]...[/protect]. Quando desabilitado, apenas senhas por entrada são usadas.',
	'prompt_text_label' => 'Texto de solicitação de senha',
	'prompt_text_desc' => 'Texto exibido acima do formulário de entrada de senha.',
	'remember_duration_label' => 'Duração de memorização (segundos)',
	'remember_duration_desc' => 'Por quanto tempo (em segundos) lembrar a senha após entrada bem-sucedida. Padrão: 3600 (1 hora).',
	
	// Security settings
	'security_settings' => 'Configurações de segurança',
	'max_attempts_label' => 'Tentativas falhadas máximas',
	'max_attempts_desc' => 'Número máximo de tentativas de senha falhadas antes da limitação de taxa. Padrão: 5.',
	'attempt_window_label' => 'Janela de tentativas (segundos)',
	'attempt_window_desc' => 'Janela de tempo (em segundos) para contar tentativas falhadas. Padrão: 300 (5 minutos).',
	
	// Cache settings
	'cache_settings' => 'Configurações de cache',
	'bypass_cache' => 'Ignorar cache para conteúdo protegido',
	'bypass_cache_desc' => 'Quando habilitado, páginas com conteúdo protegido não serão armazenadas em cache para evitar vazamento de conteúdo desbloqueado.',
	
	// Usage instructions
	'usage_title' => 'Instruções de uso',
	'usage_intro' => 'Este plugin permite proteger seções do seu conteúdo com senha usando tags BBCode.',
	
	'usage_basic_title' => 'Uso básico com senha por entrada',
	'usage_basic_example' => '[protect]Este conteúdo está protegido[/protect]',
	'usage_basic_desc' => 'Protege o conteúdo usando a senha definida nos metadados da entrada. Defina a senha da entrada no editor de entradas.',
	
	'usage_inline_title' => 'Senha inline (se habilitado)',
	'usage_inline_example' => '[protect pwd="minhasenha"]Este conteúdo está protegido[/protect]',
	'usage_inline_desc' => 'Protege o conteúdo com uma senha inline específica. Funciona apenas se "Permitir senhas inline" estiver habilitado acima.',
	
	'usage_entry_title' => 'Definir senha de entrada',
	'usage_entry_desc' => 'Para definir uma senha para uma entrada inteira, adicione-a no painel de metadados do editor de entradas ao criar ou editar uma postagem.',
	
	'submit' => 'Salvar configurações',
	'msgs' => array(
		1 => 'Configurações salvas com sucesso.',
		-1 => 'Erro ao salvar configurações.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode_protect'] = array(
	'legend' => 'Proteção de conteúdo',
	'description' => 'Defina uma senha para proteger blocos [protect]...[/protect] nesta entrada.',
	'password_label' => 'Senha da entrada',
	'note' => 'Deixe em branco para remover a proteção por senha. A senha será criptografada com segurança.',
);

// Front-end messages
$lang['plugin']['bbcode_protect'] = array(
	'password_label' => 'Senha:',
	'submit_button' => 'Enviar',
	'error_wrong_password' => 'Senha incorreta. Por favor, tente novamente.',
	'error_rate_limited' => 'Muitas tentativas falhadas. Por favor, tente mais tarde.',
	'feed_replacement' => '[Este conteúdo está protegido por senha]',
);
?>
