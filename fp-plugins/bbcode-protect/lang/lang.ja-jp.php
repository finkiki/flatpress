<?php
/**
 * Japanese language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'コンテンツ保護';

$lang['admin']['config']['bbcode-protect'] = array(
	'head' => 'BBCodeコンテンツ保護設定',
	'desc' => 'BBCodeタグ[protect]...[/protect]を使用して、コンテンツブロックのパスワード保護を設定します。',
	
	// General settings
	'general_settings' => '一般設定',
	'allow_inline_password' => 'BBCodeでインラインパスワードを許可',
	'allow_inline_password_desc' => '有効にすると、[protect pwd="パスワード"]...[/protect]構文の使用が可能になります。無効にすると、エントリごとのパスワードのみが使用されます。',
	'prompt_text_label' => 'パスワードプロンプトテキスト',
	'prompt_text_desc' => 'パスワード入力フォームの上に表示されるテキスト。',
	'remember_duration_label' => '記憶期間（秒）',
	'remember_duration_desc' => '入力成功後、パスワードを記憶する期間（秒単位）。デフォルト：3600（1時間）。',
	
	// Security settings
	'security_settings' => 'セキュリティ設定',
	'max_attempts_label' => '最大失敗試行回数',
	'max_attempts_desc' => 'レート制限前の最大パスワード失敗試行回数。デフォルト：5。',
	'attempt_window_label' => '試行ウィンドウ（秒）',
	'attempt_window_desc' => '失敗試行をカウントする時間ウィンドウ（秒単位）。デフォルト：300（5分）。',
	
	// Cache settings
	'cache_settings' => 'キャッシュ設定',
	'bypass_cache' => '保護されたコンテンツのキャッシュをバイパス',
	'bypass_cache_desc' => '有効にすると、保護されたコンテンツを含むページはキャッシュされず、ロック解除されたコンテンツの漏洩を防ぎます。',
	
	// Usage instructions
	'usage_title' => '使用方法',
	'usage_intro' => 'このプラグインを使用すると、BBCodeタグを使用してコンテンツのセクションをパスワードで保護できます。',
	
	'usage_basic_title' => 'エントリパスワードを使用した基本的な使用方法',
	'usage_basic_example' => '[protect]このコンテンツは保護されています[/protect]',
	'usage_basic_desc' => 'エントリメタデータに設定されたパスワードを使用してコンテンツを保護します。エントリエディターでエントリパスワードを設定してください。',
	
	'usage_inline_title' => 'インラインパスワード（有効な場合）',
	'usage_inline_example' => '[protect pwd="私のパスワード"]このコンテンツは保護されています[/protect]',
	'usage_inline_desc' => '特定のインラインパスワードでコンテンツを保護します。上記の「インラインパスワードを許可」が有効な場合のみ機能します。',
	
	'usage_entry_title' => 'エントリパスワードの設定',
	'usage_entry_desc' => 'エントリ全体にパスワードを設定するには、投稿の作成または編集時にエントリエディターのメタデータパネルで追加してください。',
	
	'submit' => '設定を保存',
	'msgs' => array(
		1 => '設定が正常に保存されました。',
		-1 => '設定の保存中にエラーが発生しました。'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode-protect'] = array(
	'legend' => 'コンテンツ保護',
	'description' => 'このエントリの[protect]...[/protect]ブロックを保護するパスワードを設定します。',
	'password_label' => 'エントリパスワード',
	'note' => 'パスワード保護を削除するには空白のままにしてください。パスワードは安全にハッシュ化されます。',
);

// Front-end messages
$lang['plugin']['bbcode-protect'] = array(
	'password_label' => 'パスワード：',
	'submit_button' => '送信',
	'error_wrong_password' => 'パスワードが正しくありません。もう一度お試しください。',
	'error_rate_limited' => '失敗試行が多すぎます。後でもう一度お試しください。',
	'feed_replacement' => '[このコンテンツはパスワードで保護されています]',
);
?>
