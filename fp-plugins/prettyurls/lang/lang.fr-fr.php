<?php
$lang ['plugin'] ['prettyurls'] ['errors'] = array (
	-2 => 'Impossible de trouver ou de créer le fichier <code>.htaccess</code> dans le répertoire ' . //
		'principal. PrettyURLs peut ne pas fonctionner correctement, vois le panneau de configuration.'
);

$lang ['admin'] ['plugin'] ['submenu'] ['prettyurls'] = 'PrettyURLs Config';
$lang ['admin'] ['plugin'] ['prettyurls'] = array(
	'head' => 'Configuration de PrettyURLs',
	'description1' => 'Ici, tu peux transformer les URL standard de FlatPress en de jolies URL adaptées au SEO.',
	'fpprotect_is_on' => 'Le plugin PrettyURLs nécessite un fichier .htaccess. ' . //
		'Pour créer ou modifier ce fichier, active l’option dans le <a href="admin.php?p=config&action=fpprotect" title="aller au plugin FlatPress Protect">plugin FlatPress Protect</a>. ',
	'fpprotect_is_off' => 'Le plugin FlatPress Protect protège le fichier .htaccess contre les modifications involontaires. ' . //
	'Tu peux activer le plugin <a href="admin.php?p=plugin&action=default" title="Va dans la gestion des plugins">ici</a>!',
	'nginx' => 'PrettyURLs avec NGINX',
	'wiki_nginx' => 'https://wiki.flatpress.org/res:plugins:prettyurls#nginx',
	'htaccess' => '.htaccess',
	'description2' => 'Cet éditeur permet d’éditer directement le <code>.htaccess</code> nécessaire au plugin PrettyUrls.<br>' . //
		'<strong>Remarque :</strong> Seuls les serveurs web compatibles avec NCSA, comme Apache, connaissent le concept des fichiers .htaccess. ' . //
		'Ton logiciel serveur est : <strong>' . $_SERVER ['SERVER_SOFTWARE'] . '</strong>',
	'cantsave' => 'Tu ne peux pas éditer ce fichier, car il n’est pas autorisé en <strong>écriture</strong>. Autorise l’écriture du fichier ou copie-colle son contenu vers un fichier à téléverser.',
	'mode' => 'Mode',
	'auto' => 'Automatique',
	'autodescr' => 'PrettyURLs va tenter de trouver la meilleure configuration',
	'pathinfo' => 'Path Info',
	'pathinfodescr' => 'Exemple: /index.php/2024/01/01/hello-world/',
	'httpget' => 'HTTP Get',
	'httpgetdescr' => 'Exemple: /?u=/2024/01/01/hello-world/',
	'pretty' => 'Pretty',
	'prettydescr' => 'Exemple: /2024/01/01/hello-world/',

	'saveopt' => 'Sauvegarder',

	'location' => '<strong>Lieu de stockage :</strong> ' . ABS_PATH . '',
	'submit' => 'Sauvegarder .htaccess'
);

$lang ['admin'] ['plugin'] ['prettyurls'] ['msgs'] = array(
	1 => '.htaccess enregistré',
	-1 => '.htaccess n’a pas été enregistré (vérifie les permissions de <code>' . BLOG_ROOT . '</code>) ?',

	2 => 'Options sauvegardées',
	-2 => 'Une erreur est survenue pendant de la sauvegarde'
);
?>
