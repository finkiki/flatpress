<?php
$lang ['admin'] ['widgets'] ['submenu'] ['default'] = 'G&eacute;rer les Widgets';
$lang ['admin'] ['widgets'] ['submenu'] ['raw'] = 'G&eacute;rer les Widgets (raw)';

/* default action */
$lang ['admin'] ['widgets'] ['default'] = array(
	'head' => 'G&eacute;rer les Widgets',

	'descr' => 'Un <a class="hint" ' . //
		'href="https://wiki.flatpress.org/doc:techfaq#widgets" target="_blank" title="Qu\'est-ce qu\'un Widget ?">' . //
		'Widget</a> est un composant dynamique qui peut afficher des donn&eacute;es et interagir avec l\'utilisateur. ' . //
		'Alors que les <strong>th&egrave;mes</strong> servent &agrave; modifier l\'apparence de votre blog, les widgets ' . //
		'en <strong>&eacute;tendent</strong> les fonctionnalit&eacute;s.</p>' . //

		'<p>Les widgets peuvent &ecirc;tre d&eacute;plac&eacute;s dans des zones sp&eacute;ciales de votre th&egrave;me appel&eacute;es ' . //
		'<strong>WidgetSets</strong>. Le nombre et le nom des WidgetSets peuvent varier selon le th&egrave;me que vous choisissez.</p>' . //

		'<p>FlatPress est fourni avec plusieurs widgets : il y a des widgets pour faciliter la connexion, pour afficher une bo&icirc;te de recherche, etc.</p>' . //

		'<p>Chaque widget est d&eacute;fini par un <a class="hint" ' . //
		'href="https://wiki.flatpress.org/doc:techfaq#plugins" target="_blank" title="Qu\'est-ce qu\'un Widget ?">plugin</a>.',

	'availwdgs' => 'Widgets disponibles',
	'trashcan' => 'D&eacute;poser ici pour supprimer',

	'themewdgs' => 'Widgetsets pour ce th&egrave;me',
	'themewdgsdescr' => 'Le th&egrave;me actuellement s&eacute;lectionn&eacute; dispose des widgetsets suivants',
	'oldwdgs' => 'Autres widgetsets',
	'oldwdgsdescr' => 'Les widgetsets suivants ne semblent appartenir &agrave; aucun des ' . //
		'widgetsets list&eacute;s ci-dessus. Ils proviennent peut-&ecirc;tre d\'un ancien th&egrave;me.',

	'submit' => 'Enregistrer les modifications',
	'drop_here' => 'D&eacute;poser ici'
);

$lang ['admin'] ['widgets'] ['default'] ['stdsets'] = array(
	'top' => 'Zone du haut',
	'bottom' => 'Zone du bas',
	'left' => 'Zone de gauche',
	'right' => 'Zone de droite'
);

$lang ['admin'] ['widgets'] ['default'] ['msgs'] = array(
	1 => 'Modifications enregistr&eacute;es avec succ&egrave;s',
	-1 => '&Eacute;chec de l\'enregistrement, veuillez r&eacute;essayer'
);

/* "raw" panel */
$lang ['admin'] ['widgets'] ['raw'] = array(
	'head' => 'G&eacute;rer Widgets (<em>&eacute;diteur RAW</em>)',
	'descr' => 'Un <a class="hint" ' . //
		'href="https://wiki.flatpress.org/doc:techfaq#widgets" target="_blank" title="Qu\'est-ce qu\'un Widget ?">' . //
		'Widget</a> est un &eacute;l&eacute;ment visuel d\'un <a class="hint" ' . //
		'href="https://wiki.flatpress.org/doc:techfaq#plugins" target="_blank" title="Qu\'est-ce qu\'un plugin ?">' . //
		'Plugin</a> que vous pouvez placer dans certaines zones sp&eacute;ciales (les <em>widgetsets</em>) des pages de votre blog.</p>' . //
		'<p>Voici l\'<strong>&eacute;diteur avanc&eacute;</strong> r&eacute;serv&eacute; aux utilisateurs exp&eacute;riment&eacute;s ' . //
		'qui pr&eacute;f&egrave;rent ne pas utiliser JavaScript.',

	'fset1' => '&Eacute;diteur',
	'fset2' => 'Appliquer les modifications',
	'submit' => 'Appliquer'
);

$lang ['admin'] ['widgets'] ['raw'] ['msgs'] = array(
	1 => 'Configuration enregistr&eacute;e avec succ&egrave;s',
	-1 => 'Une erreur est survenue pendant l\'enregistrement. V&eacute;rifiez que le fichier ne contient pas d\'erreurs de syntaxe.'
);

/* system errors */
$lang ['admin'] ['widgets'] ['errors'] = array(
	'generic' => 'Le widget appel&eacute; <strong>%s</strong> n\'est pas enregistr&eacute; et sera ignor&eacute;. ' . //
		'Le plugin est-il activ&eacute; dans le <a href="admin.php?p=plugin">panneau des plugins</a> ?'
);
?>
