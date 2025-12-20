<?php
$lang = array();

$lang ['main'] = array(
	'nextpage' => 'Page suivante &raquo;',
	'prevpage' => '&laquo; Page pr&eacute;c&eacute;dente',
	'entry' => 'Article',
	'entries' => 'Articles',
	'static' => 'Page statique',
	'preview' => '&Eacute;diter/aper&ccedil;u',

	'filed_under' => 'Class&eacute; dans ',	

	'add_entry' => 'Ajouter un article',
	'add_comment' => 'Ajouter un commentaire',
	'add_static' => 'Ajouter une page statique',

	'btn_edit' => '&Eacute;diter',
	'btn_delete' => 'Supprimer',

	'nocomments' => 'Ajouter un commentaire',
	'comment' => '1 commentaire',
	'comments' => 'commentaires',

	'rss' => 'S\'abonner au flux RSS',
	'atom' => 'S\'abonner au flux Atom'
);

$lang ['search'] = array(
	'head' => 'Rechercher',
	'fset1' => 'Crit&egrave;res de recherche',
	'keywords' => 'Mots-cl&eacute;s',
	'onlytitles' => 'Titres uniquement',
	'fulltext' => 'Texte int&eacute;gral',

	'fset2' => 'Date',
	'datedescr' => 'Vous pouvez affiner votre recherche &agrave; une date sp&eacute;cifique. Vous pouvez s&eacute;lectionner une ann&eacute;e, une ann&eacute;e et un mois, ou une date compl&egrave;te. ' . //
		'Laissez vide pour rechercher dans l\'ensemble de la base de donn&eacute;es.',

	'fset3' => 'Rechercher dans les cat&eacute;gories',
	'catdescr' => 'Laissez vide pour rechercher dans toutes les cat&eacute;gories',

	'fset4' => 'Lancer la recherche',
	'submit' => 'Rechercher',

	'headres' => 'R&eacute;sultats de la recherche',
	'descrres' => 'La recherche de <strong>%s</strong> a donn&eacute; les r&eacute;sultats suivants :',
	'descrnores' => 'La recherche de <strong>%s</strong> n\'a donn&eacute; aucun r&eacute;sultat.',

	'moreopts' => 'Plus d\'options',

	'searchag' => 'Nouvelle recherche'
);

$lang ['search'] ['error'] = array(
	'keywords' => 'Vous devez sp&eacute;cifier au moins un mot-cl&eacute;'
);

$lang ['staticauthor'] = array(
	// "Published by" in static pages
	'published_by' => 'Publi&eacute; par',
	'on' => 'le'
);

$lang ['entryauthor'] = array(
	// "Posted by" in entry pages
	'posted_by' => 'Post&eacute; par',
	'at' => '&agrave;'
);

$lang ['entry'] = array();
$lang ['entry'] ['flags'] = array();

$lang ['entry'] ['flags'] ['long'] = array(
	'draft' => '<strong>Brouillon</strong> : cach&eacute;, en attente de publication',
	//'static' => '<strong>Static entry</strong>: normally hidden, to reach the entry put ?page=title-of-the-entry in url (experimental)',
	'commslock' => '<strong>Commentaires verrouill&eacute;s</strong> : commentaires d&eacute;sactiv&eacute;s pour cet article'
);

$lang ['entry'] ['flags'] ['short'] = array(
	'draft' => 'Brouillon',
	//'static' => 'Static',
	'commslock' => 'Commentaires verrouill&eacute;s'
);

$lang ['entry'] ['categories'] = array(
	'unfiled' => 'Non class&eacute;'
);

$lang ['404error'] = array(
	'subject' => 'Page introuvable',
	'content' => '<p>D&eacute;sol&eacute;, la page demand&eacute;e n\'a pas &eacute;t&eacute; trouv&eacute;e.</p>'
);

// Login
$lang ['login'] = array(
	'head' => 'Connexion',
	'fieldset1' => 'Saisissez vos identifiants',
	'user' => 'Nom d\'utilisateur :',
	'pass' => 'Mot de passe :',
	'fieldset2' => 'Se connecter',
	'submit' => 'Se connecter',
	'forgot' => 'Mot de passe oubli&eacute; ?'
);

$lang ['login'] ['success'] = array(
	'success' => 'Vous &ecirc;tes connect&eacute;.',
	'logout' => 'Vous &ecirc;tes d&eacute;connect&eacute;.',
	'redirect' => 'Vous serez redirig&eacute; dans 5 secondes.',
	'opt1' => 'Retour &agrave; l\'accueil',
	'opt2' => 'Acc&eacute;der au panneau d\'administration',
	'opt3' => 'Ajouter un nouvel article'
);

$lang ['login'] ['error'] = array(
	'user' => 'Vous devez entrer un nom d\'utilisateur.',
	'pass' => 'Vous devez entrer un mot de passe.',
	'match' => 'Identifiants incorrects.',
	'timeout' => 'Veuillez attendre 30 secondes avant de r&eacute;essayer.'
);

$lang ['comments'] = array(
	'head' => 'Ajouter un commentaire',
	'descr' => 'Remplissez le formulaire ci-dessous pour ajouter votre commentaire',
	'fieldset1' => 'Informations utilisateur',
	'name' => 'Nom (*)',
	'email' => 'E-mail :',
	'www' => 'Site web :',
	'cookie' => 'Se souvenir de moi',
	'fieldset2' => 'Votre commentaire',
	'comment' => 'Commentaire (*):',
	'fieldset3' => 'Envoyer',
	'submit' => 'Ajouter',
	'reset' => 'R&eacute;initialiser',
	'success' => 'Votre commentaire a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s',
	'nocomments' => 'Aucun commentaire pour cet article',
	'commslock' => 'Les commentaires sont d&eacute;sactiv&eacute;s pour cet article'
);

$lang ['comments'] ['error'] = array(
	'name' => 'Vous devez entrer un nom',
	'email' => 'Vous devez entrer une adresse e-mail valide',
	'www' => 'Vous devez entrer une URL valide',
	'comment' => 'Vous devez &eacute;crire un commentaire'
);

$lang ['postviews'] = array(
	// PostView-Plugin
	'views' => 'Vues'
);

$lang ['date'] ['month'] = array(
	'Janvier',
	'F&eacute;vrier',
	'Mars',
	'Avril',
	'Mai',
	'Juin',
	'Juillet',
	'Ao&ucirc;t',
	'Septembre',
	'Octobre',
	'Novembre',
	'D&eacute;cembre'
);

$lang ['date'] ['month_abbr'] = array(
	'Jan',
	'Fev',
	'Mar',
	'Avr',
	'Mai',
	'Jun',
	'Jul',
	'Aou',
	'Sep',
	'Oct',
	'Nov',
	'Dec'
);

$lang ['date'] ['weekday'] = array(
	'Dimanche',
	'Lundi',
	'Mardi',
	'Mercredi',
	'Jeudi',
	'Vendredi',
	'Samedi'
);

$lang ['date'] ['weekday_abbr'] = array(
	'Dim',
	'Lun',
	'Mar',
	'Mer',
	'Jeu',
	'Ven',
	'Sam'
);
?>
