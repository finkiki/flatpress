<?php
/**
 * French language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Protection du contenu';

$lang['admin']['config']['bbcode_protect'] = array(
	'head' => 'Paramètres de protection du contenu BBCode',
	'desc' => 'Configurez la protection par mot de passe pour les blocs de contenu en utilisant la balise BBCode [protect]...[/protect].',
	
	// General settings
	'general_settings' => 'Paramètres généraux',
	'default_password_label' => 'Default Password',
	'default_password_desc' => 'Global password used for all [protect][/protect] blocks when no per-entry or inline password is set. Leave blank to disable password protection by default.',
	'allow_inline_password' => 'Autoriser les mots de passe en ligne dans BBCode',
	'allow_inline_password_desc' => 'Lorsque activé, permet d\'utiliser la syntaxe [protect pwd="motdepasse"]...[/protect]. Lorsque désactivé, seuls les mots de passe par entrée sont utilisés.',
	'prompt_text_label' => 'Texte de demande de mot de passe',
	'prompt_text_desc' => 'Texte affiché au-dessus du formulaire de saisie du mot de passe.',
	'remember_duration_label' => 'Durée de mémorisation (secondes)',
	'remember_duration_desc' => 'Durée (en secondes) de mémorisation du mot de passe après une saisie réussie. Par défaut : 3600 (1 heure).',
	
	// Security settings
	'security_settings' => 'Paramètres de sécurité',
	'max_attempts_label' => 'Tentatives échouées maximales',
	'max_attempts_desc' => 'Nombre maximal de tentatives de mot de passe échouées avant limitation du débit. Par défaut : 5.',
	'attempt_window_label' => 'Fenêtre de tentative (secondes)',
	'attempt_window_desc' => 'Fenêtre de temps (en secondes) pour compter les tentatives échouées. Par défaut : 300 (5 minutes).',
	
	// Cache settings
	'cache_settings' => 'Paramètres de cache',
	'bypass_cache' => 'Contourner le cache pour le contenu protégé',
	'bypass_cache_desc' => 'Lorsque activé, les pages avec du contenu protégé ne seront pas mises en cache pour éviter la fuite de contenu déverrouillé.',
	
	// Usage instructions
	'usage_title' => 'Instructions d\'utilisation',
	'usage_intro' => 'Ce plugin vous permet de protéger par mot de passe des sections de votre contenu en utilisant des balises BBCode.',
	
	'usage_basic_title' => 'Utilisation de base avec mot de passe par entrée',
	'usage_basic_example' => '[protect]Ce contenu est protégé[/protect]',
	'usage_basic_desc' => 'Protège le contenu en utilisant le mot de passe défini dans les métadonnées de l\'entrée. Définissez le mot de passe de l\'entrée dans l\'éditeur d\'entrée.',
	
	'usage_inline_title' => 'Mot de passe en ligne (si activé)',
	'usage_inline_example' => '[protect pwd="monmotdepasse"]Ce contenu est protégé[/protect]',
	'usage_inline_desc' => 'Protège le contenu avec un mot de passe en ligne spécifique. Ne fonctionne que si "Autoriser les mots de passe en ligne" est activé ci-dessus.',
	
	'usage_entry_title' => 'Définir le mot de passe de l\'entrée',
	'usage_entry_desc' => 'Pour définir un mot de passe pour une entrée entière, ajoutez-le dans le panneau de métadonnées de l\'éditeur d\'entrée lors de la création ou de la modification d\'un article.',
	
	'submit' => 'Enregistrer les paramètres',
	'msgs' => array(
		1 => 'Paramètres enregistrés avec succès.',
		-1 => 'Erreur lors de l\'enregistrement des paramètres.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode_protect'] = array(
	'legend' => 'Protection du contenu',
	'description' => 'Définissez un mot de passe pour protéger les blocs [protect]...[/protect] dans cette entrée.',
	'password_label' => 'Mot de passe de l\'entrée',
	'note' => 'Laissez vide pour supprimer la protection par mot de passe. Le mot de passe sera haché de manière sécurisée.',
);

// Front-end messages
$lang['plugin']['bbcode_protect'] = array(
	'password_label' => 'Mot de passe :',
	'submit_button' => 'Soumettre',
	'error_wrong_password' => 'Mot de passe incorrect. Veuillez réessayer.',
	'error_rate_limited' => 'Trop de tentatives échouées. Veuillez réessayer plus tard.',
	'feed_replacement' => '[Ce contenu est protégé par mot de passe]',
);
?>
