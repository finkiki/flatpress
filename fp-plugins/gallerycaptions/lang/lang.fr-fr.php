<?php
/**
 * Admin area phrases
 */
// "Plugins" menu entry
$lang ['admin'] ['uploader'] ['submenu'] ['gallerycaptions'] = 'Légendes de la galerie';

// Plugin configuration panel
$lang ['admin'] ['uploader'] ['gallerycaptions'] = array(
	'head' => 'Légendes de la galerie',
	'label_selectgallery' => 'S&eacute;lectionne la galerie à modifier:',
	'button_selectgallery' => 'S&eacute;lectionner une galerie',
	'label_editcaptionsforgallery' => 'Modifier les légendes pour la galerie:',
	'label_noimagesingallery' => 'Cette galerie ne contient pas encore d\'images ¯\_(ツ)_/¯<br>' . //
		'<br>Télécharge des images via le <a href="' . BLOG_BASEURL . 'admin.php?p=uploader&action=default' . '">Chargeur</a>, puis ajoute-les à la galerie en utilisant le <a href="' . BLOG_BASEURL . 'admin.php?p=uploader&action=mediamanager' . '">Gestionnaire de médias</a>!',
	'button_savecaptions' => 'Enregistrer les légendes'
);
?>
