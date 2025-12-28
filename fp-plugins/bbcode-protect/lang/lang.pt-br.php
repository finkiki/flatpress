<?php
/**
 * Portuguese (Brazilian) Language File for Content Protection Plugin
 */

$lang['admin']['plugin']['submenu']['bbcode_protect'] = 'Proteção de Conteúdo';

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Senha:',
	'submit_button' => 'Enviar',
	'wrong_password' => 'Senha incorreta. Por favor, tente novamente.',
	'rate_limited' => 'Muitas tentativas falhas. Por favor, tente novamente mais tarde.',
	'no_password_set' => 'Nenhuma senha foi definida para este conteúdo.',
];

$lang['admin']['plugin']['bbcode_protect'] = [
	'title' => 'Configurações de proteção de conteúdo',
	'password_section' => 'Senha global',
	'default_password' => 'Senha padrão',
	'default_password_desc' => 'Senha global para todo o conteúdo protegido. Pode ser substituída por entrada.',
	'display_section' => 'Configurações de exibição',
	'prompt_text' => 'Texto do prompt',
	'prompt_text_desc' => 'Mensagem exibida acima do formulário de senha.',
	'remember_duration' => 'Duração de memorização (segundos)',
	'remember_duration_desc' => 'Quanto tempo o conteúdo permanece desbloqueado (padrão: 3600 = 1 hora).',
	'security_section' => 'Configurações de segurança',
	'max_attempts' => 'Máx. tentativas falhas',
	'max_attempts_desc' => 'Número de tentativas falhas antes da limitação (padrão: 5).',
	'attempt_window' => 'Janela de tentativas (segundos)',
	'attempt_window_desc' => 'Janela de tempo para contar tentativas falhas (padrão: 300 = 5 minutos).',
	'usage_section' => 'Instruções de uso',
	'usage_text' => 'Para proteger conteúdo em suas postagens, use comentários HTML:',
	'usage_note' => 'Você também pode definir senhas por entrada no editor de entradas.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'Proteção de conteúdo',
	'entry_password' => 'Senha da entrada',
	'entry_password_desc' => 'Senha para conteúdo protegido nesta entrada. Deixe em branco para usar a senha global padrão.',
	'usage' => 'Uso:',
	'usage_text' => 'Envolva o conteúdo com &lt;!--protect--&gt; e &lt;!--/protect--&gt; para protegê-lo.',
];
