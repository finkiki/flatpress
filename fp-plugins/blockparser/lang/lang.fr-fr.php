<?php
$lang['admin']['widgets']['submenu']['blockparser'] = 'Widgets BlockParser';

$lang['admin']['widgets']['blockparser'] = array(
	'head' => 'Widgets BlockParser',
	'description' => 'Le plugin BlockParser permet de créer un widget à partir d’une page statique.</p>' . //
		'<p>Sélectionne une ou plusieurs pages statiques dans la liste pour créer un widget.</p>' . //
		'<p>Chaque <a href="?p=static&amp;action=write">nouvelle page statique</a> créée sera listée ici.',

	'id' => 'Page',
	'title' => 'Titre',
	'action' => 'Action',
	'enable' => 'Activer',
	'disable' => 'Désactiver',
	'edit' => 'Éditer'
);

$lang['admin']['widgets']['blockparser']['msgs'] = array(
	1 => 'Ton nouveau widget est disponible. Ajoute-le à ton blog depuis le <a href="?p=widgets">panneau principal</a> !',
	-1 => 'Impossible de créer le widget soumis',
	2 => 'Tu as désactivé un widget : n’oublie pas de supprimer les références depuis le <a href="?p=widgets">panneau principal</a> !',
	-2 => 'Impossible de désactiver le widget'
);
?>
