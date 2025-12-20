<?php
$lang ['admin'] ['static'] ['submenu'] = array(
	'list' => 'G&eacute;rer les pages statiques',
	'write' => '&Eacute;crire une page'
);

/* main panel */
$lang ['admin'] ['static'] ['list'] = array(
	'head' => 'Pages Statiques',
	'descr' => 'S&eacute;lectionnez une page &agrave; &eacute;diter ou <a href="admin.php?p=static&amp;action=write">ajoutez-en une nouvelle</a>.',

	'sel' => 'Sel', // checkbox
	'date' => 'Date',
	'name' => 'Page',
	'title' => 'Titre',
	'author' => 'Auteur',

	'action' => 'Action',
	'act_view' => 'Voir',
	'act_del' => 'Supprimer',
	'act_edit' => '&Eacute;diter',

	'natural' => 'Trier les titres par ordre décroissant plutôt que par date de création.',
	'submit' => 'Réorganiser les noms de page'
);

$lang ['admin'] ['static'] ['list'] ['msgs'] = array(
	1 => 'La page a &eacute;t&eacute; enregistr&eacute;e avec succ&egrave;s',
	-1 => '&Eacute;chec de l\'enregistrement de la page',
	2 => 'La page a &eacute;t&eacute; supprim&eacute;e avec succ&egrave;s',
	-2 => '&Eacute;chec de la suppression de la page'
);

/* write panel */
$lang ['admin'] ['static'] ['write'] = array(
	'head' => 'Publier une page statique',
	'descr' => '&Eacute;ditez le formulaire pour publier la page',
	'fieldset1' => '&Eacute;dition',
	'subject' => 'Sujet (*):',
	'content' => 'Contenu (*):',
	'fieldset2' => 'Publication',
	'pagename' => 'Nom de la page (*):',
	'submit' => 'Publier',
	'preview' => 'Aper&ccedil;u',

	'delfset' => 'Suppression',
	'deletemsg' => 'Supprimer cette page',
	'del' => 'Supprimer',
	'success' => 'Votre page a &eacute;t&eacute; publi&eacute;e avec succ&egrave;s',
	'otheropts' => 'Autres options',
);

$lang ['admin'] ['static'] ['write'] ['error'] = array(
	'subject' => 'Veuillez compl&eacute;ter le sujet',
	'content' => 'Veuillez compl&eacute;ter le contenu',
	'id' => 'Vous devez entrer un identifiant valide'
);

/* delete action */	
$lang ['admin'] ['static'] ['delete'] = array(
	'head' => 'Supprimer la page', 
	'descr' => 'Vous &ecirc;tes sur le point de supprimer la page suivante :',
	'preview' => 'Aper&ccedil;u',
	'confirm' => 'Confirmer la suppression ?',
	'fset' => 'Supprimer',
	'ok' => 'Oui, supprimer cette page',
	'cancel' => 'Non, retour au panneau',
	'err' => 'La page sp&eacute;cifi&eacute;e n\'existe pas'
);
?>
