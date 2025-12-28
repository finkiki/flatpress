<?php
/**
 * Japanese Language File for Content Protection Plugin
 */

$lang['admin']['plugin']['submenu']['bbcode_protect'] = 'コンテンツ保護';

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'パスワード：',
	'submit_button' => '送信',
	'wrong_password' => 'パスワードが正しくありません。もう一度お試しください。',
	'rate_limited' => '失敗回数が多すぎます。後でもう一度お試しください。',
	'no_password_set' => 'このコンテンツにはパスワードが設定されていません。',
];

$lang['admin']['plugin']['bbcode_protect'] = [
	'title' => 'コンテンツ保護設定',
	'password_section' => 'グローバルパスワード',
	'default_password' => 'デフォルトパスワード',
	'default_password_desc' => 'すべての保護されたコンテンツのグローバルパスワード。記事ごとに上書きできます。',
	'display_section' => '表示設定',
	'prompt_text' => 'プロンプトテキスト',
	'prompt_text_desc' => 'パスワードフォームの上に表示されるメッセージ。',
	'remember_duration' => '記憶期間（秒）',
	'remember_duration_desc' => 'コンテンツがロック解除されたままになる時間（デフォルト：3600 = 1時間）。',
	'security_section' => 'セキュリティ設定',
	'max_attempts' => '最大失敗回数',
	'max_attempts_desc' => 'レート制限前の失敗回数（デフォルト：5）。',
	'attempt_window' => '試行ウィンドウ（秒）',
	'attempt_window_desc' => '失敗回数をカウントする時間ウィンドウ（デフォルト：300 = 5分）。',
	'usage_section' => '使用方法',
	'usage_text' => '投稿でコンテンツを保護するには、HTMLコメントを使用します：',
	'usage_note' => '記事エディタで記事ごとにパスワードを設定することもできます。',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'コンテンツ保護',
	'entry_password' => '記事パスワード',
	'entry_password_desc' => 'この記事の保護されたコンテンツのパスワード。デフォルトのグローバルパスワードを使用する場合は空白のままにします。',
	'usage' => '使用方法：',
	'usage_text' => 'コンテンツを保護するには、&lt;!--protect--&gt;と&lt;!--/protect--&gt;で囲みます。',
];
