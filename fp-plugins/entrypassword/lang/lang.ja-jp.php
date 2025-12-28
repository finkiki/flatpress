<?php
$baseurl = BLOG_BASEURL;
$lang['plugin']['entrypassword'] = array(
	'heading' => '保護されたコンテンツ',
	'description' => 'このコンテンツはパスワードで保護されています。表示するにはパスワードを入力してください。',
	'password_label' => 'パスワード：',
	'submit_button' => '送信',
	'error_message' => 'パスワードが正しくありません。もう一度お試しください。',
	'rss_protected' => 'このコンテンツはパスワードで保護されています。'
);

$lang['admin']['plugin']['entrypassword'] = array(
	'legend' => 'パスワード保護',
	'admin_description' => 'このコンテンツを保護するパスワードを設定します。保護を削除するには空欄にしてください。',
	'password_label' => 'パスワード（オプション）：',
	'password_placeholder' => 'このコンテンツを保護するパスワードを入力',
	'status_protected' => '現在保護されています',
	'status_public' => '現在公開されています'
);
?>
