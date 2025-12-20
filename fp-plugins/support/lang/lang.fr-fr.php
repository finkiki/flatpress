<?php
$lang ['admin'] ['maintain'] ['submenu'] ['support'] = 'Afficher les données de support';

$lang ['admin'] ['maintain'] ['support'] = array(
		'title' => 'Données de support',
		'intro' => 'Pour les rapports de bug et l\'aide, visitez le <a href="https://forum.flatpress.org" target="_blank">Forum FlatPress</a>, ' . //
		'signalez le bug sur <a href="https://github.com/flatpressblog/flatpress/issues" target="_blank">GitHub</a> ' . //
		'ou <a href="mailto:hello@flatpress.org">envoyez un e-mail</a>.<br>Insérez ces sorties (copier &#38 ; coller) en anglais ' . //
		'avec les informations suivantes : Description de l\'erreur, étapes pour la reproduire.',

	// output "Setup"
	'h2_general' => 'Général',
	'h3_setup' => 'Configuration',

	'version' => '<p class="output"><strong>Version de FlatPress:</strong> ',
	'basedir' => '<p class="output"><strong>Répertoire de base:</strong> ',
	'blogbaseurl' => '<p class="output"><strong>URL de base du blog:</strong> ',

	'pos_theme' => '<p class="output"><strong>Thème:</strong> ',
	'neg_theme' => '<p class="output"><strong>Thème:</strong> non défini (par défaut leggero)</p>',

	'pos_style' => '<p class="output"><strong>Style:</strong> ',
	'neg_style' => '<p class="output"><strong>Style:</strong> style par défaut</p>',

	'pos_plugins' => '<p class="output"><strong>Plugins activés:</strong> ',
	'neg_plugins' => '<p class="output"><strong>Plugins activés:</strong> Impossible à déterminer.</p>',

	// output "International"
	'h3_international' => 'International',

	'pos_LANG_DEFAULT' => '<p class="output"><strong>Langue (automatique):</strong> ',
	'neg_LANG_DEFAULT' => '<p class="output"><strong>Langue (automatique): &#8505;</strong> non reconnue</p>',

	'pos_lang' => '<p class="output"><strong>Langue (définie):</strong> ',
	'neg_lang' => '<p class="output"><strong>Langue (définie):</strong> non définie</p>',

	'pos_charset' => '<p class="output"><strong>Jeu de caractères:</strong> ',
	'neg_charset' => '<p class="output"><strong>Jeu de caractères:</strong> non défini (par défaut utf-8)</p>',

	'global_date_time' => '<p class="output"><strong>Date, heure UTC:</strong> ',
	'neg_global_date_time' => 'Impossible à déterminer.</p>',

	'local_date_time' => '<p class="output"><strong>Date, heure locale:</strong> ',
	'neg_local_date_time' => 'Impossible à déterminer.</p>',

	'time_offset' => '<p class="output"><strong>Décalage horaire:</strong> ',

	// output "Core files"
	'h2_permissions' => 'Permissions des fichiers et répertoires',
	'h3_core_files' => 'Noyau',

	'desc_setupfile' => '<p>Dès que la configuration a été exécutée avec succès, le fichier setup.php doit être supprimé avant l\'exploitation productive.</p>',
	'error_setupfile' => '<p class="error"><strong>&#33;</strong> Le fichier de configuration se trouve dans le répertoire principal !</p>',
	'success_setupfile' => '<p class="success"><strong>&#10003;</strong> Le fichier de configuration n\'a pas été trouvé dans le répertoire principal.</p>',

	'desc_defaultsfile' => '<p>Le fichier defaults.php doit être protégé en écriture pour les autres en exploitation productive.</p>',
	'attention_defaultsfile' => '<p class="attention"><strong>&#8505;</strong> Le fichier defaults.php peut être modifié !</p>',
	'success_defaultsfile' => '<p class="success"><strong>&#10003;</strong> Le fichier defaults.php ne peut pas être modifié.</p>',

	'desc_configdir' => '<p>Le répertoire de configuration doit être protégé en écriture pour les autres en exploitation productive.</p>',
	'error_configdir' => '<p class="error"><strong>&#33;</strong> Le répertoire de configuration peut être écrit par d\'autres !</p>',
	'success_configdir' => '<p class="success"><strong>&#10003;</strong> Le répertoire de configuration ne peut pas être écrit par d\'autres.</p>',

	'desc_admindir' => '<p>Le répertoire admin doit être protégé en écriture pour les autres en exploitation productive.</p>',
	'attention_admindir' => '<p class="attention"><strong>&#8505;</strong> Le répertoire admin peut être écrit par d\'autres !</p>',
	'success_admindir' => '<p class="success"><strong>&#10003;</strong> Le répertoire admin ne peut pas être écrit par d\'autres.</p>',

	'desc_includesdir' => '<p>Le répertoire fp-includes doit être protégé en écriture pour les autres en exploitation productive.</p>',
	'attention_includesdir' => '<p class="attention"><strong>&#8505;</strong> Le répertoire fp-includes peut être écrit par d\'autres !</p>',
	'success_includesdir' => '<p class="success"><strong>&#10003;</strong> Le répertoire fp-includes ne peut pas être écrit par d\'autres.</p>',

	// output "Configuration file for the webserver"
	'h3_configwebserver' => 'Fichier de configuration pour le serveur web',

	'note_configwebserver' => 'Le répertoire principal doit être accessible en écriture pour pouvoir créer ou modifier un fichier .htaccess avec le plugin PrettyURLs.<br>' . //
		'<strong>Note:</strong> Seuls les serveurs web compatibles NCSA, tels qu\'Apache, sont familiers avec le concept de fichiers .htaccess.',
	'serversoftware' => 'Le logiciel serveur est <strong>' . $_SERVER ['SERVER_SOFTWARE'] . '</strong>.',

	'success_maindir' => '<p class="success"><strong>&#10003;</strong> Le répertoire principal de FlatPress est accessible en écriture.</p>',
	'attention_maindir' => '<p class="attention"><strong>&#8505;</strong> Le répertoire principal de FlatPress n\'est pas accessible en écriture !</p>',

	'success_htaccessw' => '<p class="success"><strong>&#10003;</strong> Le fichier .htaccess peut être écrit.</p>',
	'attention_htaccessw' => '<p class="attention"><strong>&#8505;</strong> Le fichier .htaccess ne peut pas être écrit !</p>',

	'attention_htaccessn' => '<p class="attention"><strong>&#8505;</strong> Un fichier .htaccess existe déjà dans le répertoire principal !</p>',
	'success_htaccessn' => '<p class="success"><strong>&#10003;</strong> Aucun fichier .htaccess n\'a été trouvé dans le répertoire principal.</p>',

	// output "Themes and plugins"
	'h3_themesplugins' => 'Thèmes et plugins',

	'desc_interfacedir' => 'Le répertoire fp-interface doit être protégé en écriture pour les autres en exploitation productive.',
	'attention_interfacedir' => '<p class="attention"><strong>&#8505;</strong> Le répertoire fp-interface peut être écrit par d\'autres !</p>',
	'success_interfacedir' => '<p class="success"><strong>&#10003;</strong> Le répertoire fp-interface ne peut pas être écrit par d\'autres.</p>',

	'desc_themesdir' => 'Le répertoire themes doit être protégé en écriture pour les autres en exploitation productive.',
	'attention_themesdir' => '<p class="attention"><strong>&#8505;</strong> Le répertoire themes peut être écrit par d\'autres !</p>',
	'success_themesdir' => '<p class="success"><strong>&#10003;</strong> Le répertoire fp-interface ne peut pas être écrit par d\'autres.</p>',

	'desc_plugindir' => 'Le répertoire fp-plugins doit être protégé en écriture pour les autres en exploitation productive.',
	'attention_plugindir' => '<p class="attention"><strong>&#8505;</strong> Le répertoire fp-plugins peut être écrit par d\'autres !</p>',
	'success_plugindir' => '<p class="success"><strong>&#10003;</strong> Le répertoire fp-plugins ne peut pas être écrit par d\'autres.</p>',

	// output "Content directory"
	'h3_contentdir' => 'Contenu',

	'desc_contentdir' => 'Le répertoire fp-content doit être accessible en écriture pour que FlatPress fonctionne.',
	'success_contentdir' => '<p class="success"><strong>&#10003;</strong> Le répertoire fp-content est accessible en écriture.</p>',
	'error_contentdir' => '<p class="error"><strong>&#33;</strong> Le répertoire fp-content n\'est pas accessible en écriture !</p>',

	'desc_imagesdir' => 'Ce répertoire images doit avoir les permissions d\'écriture pour pouvoir télécharger des images.',
	'success_imagesdir' => '<p class="success"><strong>&#10003;</strong> Le répertoire images est accessible en écriture.</p>',
	'error_imagesdir' => '<p class="error"><strong>&#33;</strong> Le répertoire images n\'est pas accessible en écriture !</p>',
	'attention_imagesdir' => '<p class="attention"><strong>&#8505;</strong> Le répertoire images n\'existe pas.</p>',

	'desc_thumbsdir' => 'Ce répertoire thumbs doit avoir les permissions d\'écriture pour pouvoir créer des images redimensionnables.',
	'success_thumbsdir' => '<p class="success"><strong>&#10003;</strong> Le répertoire images/.thumbs est accessible en écriture.</p>',
	'error_thumbsdir' => '<p class="error"><strong>&#33;</strong> Le répertoire images/.thumbs n\'est pas accessible en écriture !</p>',
	'attention_thumbsdir' => '<p class="attention"><strong>&#8505;</strong> Le répertoire .thumbs n\'existe pas, ' . //
		'mais est créé automatiquement dès qu\'une miniature a été créée avec le plugin Miniatures.</p>',

	'desc_attachsdir' => 'Ce répertoire de téléchargement doit avoir les permissions d\'écriture pour pouvoir télécharger quelque chose.',
	'success_attachsdir' => '<p class="success"><strong>&#10003;</strong> Le répertoire de téléchargement est accessible en écriture.</p>',
	'error_attachsdir' => '<p class="error"><strong>&#33;</strong> Le répertoire de téléchargement n\'est pas accessible en écriture !</p>',
	'attention_attachsdir' => '<p class="attention"><strong>&#8505;</strong> Le répertoire de téléchargement n\'existe pas, ' . //
		'mais est créé automatiquement lors du premier téléchargement.</p>',

	'desc_cachedir' => 'Ce répertoire cache doit avoir la permission d\'écriture pour que le cache fonctionne correctement.',
	'success_cachedir' => '<p class="success"><strong>&#10003;</strong> Le répertoire cache est accessible en écriture.</p>',
	'error1_cachedir' => '<p class="error"><strong>&#33;</strong> Le répertoire cache n\'est pas accessible en écriture !</p>',
	'error2_cachedir' => '<p class="error"><strong>&#33;</strong> Le répertoire cache n\'existe pas !</p>',

	// output "PHP"
	'h2_php' => 'PHP',

	'php_ver' => '<strong>Version: </strong>',

	'php_timezone' => '<strong>Fuseau horaire: </strong>',
	'php_timezone_neg' => 'Non disponible. UTC est utilisé.',

	'h3_extensions' => 'Extensions',

	'desc_php_intl' => 'L\'extension PHP-Intl doit être activée.',
	'error_php_intl' => '<p class="error"><strong>&#33;</strong> L\'extension intl n\'est pas activée !</p>',
	'success_php_intl' => '<p class="success"><strong>&#10003;</strong> L\'extension intl est activée.</p>',

	'desc_php_gdlib' => 'L\'extension GDlib doit être activée pour créer des miniatures d\'images.',
	'error_php_gdlib' => '<p class="error"><strong>&#33;</strong> L\'extension GD n\'est pas activée !</p>',
	'success_php_gdlib' => '<p class="success"><strong>&#10003;</strong> L\'extension GD est activée.</p>',

	'desc_php_mbstring' => 'Pour des performances optimales en exploitation productive, l\'extension PHP multibyte doit être activée pour Smarty.',
	'attention_php_mbstring' => '<p class="attention"><strong>&#8505;</strong> L\'extension Multibyte n\'est pas activée !</p>',
	'success_php_mbstring' => '<p class="success"><strong>&#10003;</strong> L\'extension Multibyte est activée.</p>',

	// output "Other"
	'h2_other' => 'Autre',

	'desc_browser' => 'Le navigateur utilisé est important en cas d\'erreurs d\'affichage.',
	'no_browser' => 'Non reconnu',
	'detect_browser' => '<p class="output"><strong>Navigateur: </strong>',

	'desc_cookie' => 'Si les visiteurs du blog FlatPress doivent être informés des cookies, voici le cookie concerné.<br>' . //
		'<strong>Astuce:</strong> Le nom du cookie change à chaque réinstallation de FlatPress.',
	'session_cookie' => '<p class="output"><strong>Cookie de session: </strong>',
	'no_session_cookie' => 'Impossible à déterminer.',

	'h3_completed' => 'Sortie terminée !',

	'symbols' => '<p class="output"><strong>Symboles:</strong></p>',
	'symbol_success' => '<p class="success"><strong>&#10003;</strong> Aucune action nécessaire</p>',
	'symbol_attention' => '<p class="attention"><strong>&#8505;</strong> Ne restreint pas la fonctionnalité, mais nécessite une attention</p>',
	'symbol_error' => '<p class="error"><strong>&#33;</strong> Action urgente nécessaire</p>',

	'close_btn' => 'Fermer'
);
?>
