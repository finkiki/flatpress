<?php
/**
 * French Language File for Content Protection Plugin
 */

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Mot de passe :',
	'submit_button' => 'Envoyer',
	'wrong_password' => 'Mot de passe incorrect. Veuillez réessayer.',
	'rate_limited' => 'Trop de tentatives échouées. Veuillez réessayer plus tard.',
	'no_password_set' => 'Aucun mot de passe n\'a été défini pour ce contenu.',
];

$lang['admin']['plugin']['bbcode_protect'] = [
	'title' => 'Paramètres de protection du contenu',
	'password_section' => 'Mot de passe global',
	'default_password' => 'Mot de passe par défaut',
	'default_password_desc' => 'Mot de passe global pour tout le contenu protégé. Peut être remplacé par article.',
	'display_section' => 'Paramètres d\'affichage',
	'prompt_text' => 'Texte de l\'invite',
	'prompt_text_desc' => 'Message affiché au-dessus du formulaire de mot de passe.',
	'remember_duration' => 'Durée de mémorisation (secondes)',
	'remember_duration_desc' => 'Combien de temps le contenu reste déverrouillé (par défaut : 3600 = 1 heure).',
	'security_section' => 'Paramètres de sécurité',
	'max_attempts' => 'Tentatives échouées max.',
	'max_attempts_desc' => 'Nombre de tentatives échouées avant limitation (par défaut : 5).',
	'attempt_window' => 'Fenêtre de tentatives (secondes)',
	'attempt_window_desc' => 'Fenêtre de temps pour compter les tentatives échouées (par défaut : 300 = 5 minutes).',
	'usage_section' => 'Instructions d\'utilisation',
	'usage_text' => 'Pour protéger le contenu dans vos articles, utilisez des commentaires HTML :',
	'usage_note' => 'Vous pouvez également définir des mots de passe par article dans l\'éditeur d\'articles.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'Protection du contenu',
	'entry_password' => 'Mot de passe de l\'article',
	'entry_password_desc' => 'Mot de passe pour le contenu protégé dans cet article. Laissez vide pour utiliser le mot de passe global par défaut.',
	'usage' => 'Utilisation :',
	'usage_text' => 'Entourez le contenu avec &lt;!--protect--&gt; et &lt;!--/protect--&gt; pour le protéger.',
];
