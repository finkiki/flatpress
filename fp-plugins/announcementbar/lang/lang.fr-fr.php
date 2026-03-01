<?php
$lang['admin']['plugin']['submenu']['announcementbar'] = 'Barre d\'annonce';
$lang['admin']['plugin']['announcementbar'] = array(
	'head' => 'Configuration de la barre d\'annonce',
	'desc' => 'Configurez une barre de notification/annonce fixe en haut qui peut être affichée sur votre site avec planification, règles de visibilité et options de fermeture.',
	
	'general' => 'Paramètres généraux',
	'enabled' => 'Activer la barre d\'annonce',
	'enabled_long' => 'Cochez cette case pour afficher la barre d\'annonce sur votre site.',
	'content' => 'Contenu de l\'annonce',
	'content_long' => 'Entrez votre message d\'annonce. Prend en charge le balisage BBCode et HTML. Restez concis pour un meilleur affichage mobile.',
	
	'visibility' => 'Paramètres de visibilité',
	'visibility_mode' => 'Mode d\'affichage',
	'visibility_all' => 'Afficher sur toutes les pages',
	'visibility_include' => 'Afficher uniquement sur les chemins spécifiés',
	'visibility_exclude' => 'Masquer sur les chemins spécifiés',
	'visibility_mode_long' => 'Choisissez où la barre d\'annonce doit être affichée.',
	'visibility_patterns' => 'Modèles d\'URL',
	'visibility_patterns_long' => 'Entrez un modèle par ligne. Utilisez * comme joker. Exemples : /blog/*, /index.php, /static.php*',
	
	'dismissible_section' => 'Paramètres de fermeture',
	'dismissible' => 'Permettre aux visiteurs de fermer',
	'dismissible_long' => 'Si activé, les visiteurs peuvent fermer la barre d\'annonce. Leur choix est mémorisé via cookie/localStorage.',
	'dismiss_version' => 'Version du message',
	'dismiss_version_long' => 'Modifiez cette valeur pour afficher à nouveau la barre aux visiteurs qui l\'ont précédemment fermée (par exemple, lorsque vous mettez à jour le message).',
	
	'scheduling' => 'Planification',
	'schedule_enabled' => 'Activer la planification',
	'schedule_enabled_long' => 'Afficher la barre d\'annonce uniquement pendant une fenêtre de temps spécifique.',
	'schedule_start' => 'Date/heure de début',
	'schedule_start_long' => 'La barre d\'annonce n\'apparaîtra pas avant cette date/heure (facultatif).',
	'schedule_end' => 'Date/heure de fin',
	'schedule_end_long' => 'La barre d\'annonce n\'apparaîtra pas après cette date/heure (facultatif).',
	
	'styling' => 'Style',
	'bg_color' => 'Couleur de fond',
	'text_color' => 'Couleur du texte',
	'font_size' => 'Taille de police (px)',
	'font_size_long' => 'Taille de police en pixels (10-24).',
	'padding' => 'Espacement (px)',
	'padding_long' => 'Espacement vertical en pixels (5-30).',
	'height' => 'Hauteur',
	'height_long' => 'Hauteur minimale en pixels, ou "auto" pour une hauteur automatique.',
	
	'submit' => 'Enregistrer la configuration',
	'msg_success' => 'Configuration de la barre d\'annonce enregistrée avec succès.',
	'msg_error' => 'Configuration de la barre d\'annonce non enregistrée.'
);

$lang['plugin']['announcementbar'] = array(
	'close' => 'Fermer l\'annonce'
);
?>
