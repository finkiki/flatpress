<?php
$baseurl = BLOG_BASEURL;

$lang ['contact'] = array(
	'head' => 'Nous contacter',
	'descr' => 'Remplissez le formulaire ci-dessous pour nous envoyer vos commentaires. Merci d\'ajouter votre adresse e-mail si vous souhaitez recevoir une r&eacute;ponse.',
	'fieldset1' => 'Informations utilisateur',
	'name' => 'Nom (*)',
	'email' => 'E-mail :',
	'www' => 'Site web :',
	'cookie' => 'Se souvenir de moi',
	'fieldset2' => 'Votre message',
	'comment' => 'Message (*):',
	'fieldset3' => 'Envoyer',
	'submit' => 'Envoyer',
	'reset' => 'R&eacute;initialiser',
	'loggedin' => 'Vous &ecirc;tes connect&eacute; 😉. <a href="' . $baseurl . 'login.php?do=logout">Se d&eacute;connecter</a> ou acc&eacute;der &agrave; l\'<a href="' . $baseurl . 'admin.php">espace d\'administration</a>.'
);

$lang ['contact'] ['notification'] = array(
	'name' => 'Nom :',
	'email' => 'E-mail :',
	'www' => 'Site web :',
	'content' => 'Message :',
	'subject' => 'Contact envoy&eacute; depuis '
);

$lang ['contact'] ['error'] = array(
	'name' => 'Vous devez entrer un nom',
	'email' => 'Vous devez entrer une adresse e-mail valide',
	'www' => 'Vous devez entrer une URL valide',
	'content' => 'Vous devez &eacute;crire un message'
);

$lang ['contact'] ['msgs'] = array(
	1 => 'Message envoy&eacute; avec succ&egrave;s',
	-1 => '&Eacute;chec de l\'envoi du message'
);
?>