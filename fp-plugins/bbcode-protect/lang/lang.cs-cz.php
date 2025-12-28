<?php
/**
 * Czech language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Ochrana obsahu';

$lang['admin']['config']['bbcode_protect'] = array(
	'head' => 'Nastavení ochrany obsahu BBCode',
	'desc' => 'Nakonfigurujte ochranu heslem pro bloky obsahu pomocí BBCode tagu [protect]...[/protect].',
	
	// General settings
	'general_settings' => 'Obecná nastavení',
	'allow_inline_password' => 'Povolit inline hesla v BBCode',
	'allow_inline_password_desc' => 'Pokud je povoleno, umožňuje použití syntaxe [protect pwd="heslo"]...[/protect]. Pokud je zakázáno, používají se pouze hesla na položku.',
	'prompt_text_label' => 'Text výzvy k heslu',
	'prompt_text_desc' => 'Text zobrazený nad formulářem pro zadání hesla.',
	'remember_duration_label' => 'Doba zapamatování (sekundy)',
	'remember_duration_desc' => 'Jak dlouho (v sekundách) si pamatovat heslo po úspěšném zadání. Výchozí: 3600 (1 hodina).',
	
	// Security settings
	'security_settings' => 'Nastavení zabezpečení',
	'max_attempts_label' => 'Maximální počet neúspěšných pokusů',
	'max_attempts_desc' => 'Maximální počet neúspěšných pokusů o zadání hesla před omezením rychlosti. Výchozí: 5.',
	'attempt_window_label' => 'Okno pokusů (sekundy)',
	'attempt_window_desc' => 'Časové okno (v sekundách) pro počítání neúspěšných pokusů. Výchozí: 300 (5 minut).',
	
	// Cache settings
	'cache_settings' => 'Nastavení mezipaměti',
	'bypass_cache' => 'Obejít mezipaměť pro chráněný obsah',
	'bypass_cache_desc' => 'Pokud je povoleno, stránky s chráněným obsahem nebudou uloženy do mezipaměti, aby se zabránilo úniku odemčeného obsahu.',
	
	// Usage instructions
	'usage_title' => 'Pokyny k použití',
	'usage_intro' => 'Tento plugin vám umožňuje chránit heslem části vašeho obsahu pomocí BBCode tagů.',
	
	'usage_basic_title' => 'Základní použití s heslem na položku',
	'usage_basic_example' => '[protect]Tento obsah je chráněn[/protect]',
	'usage_basic_desc' => 'Chrání obsah pomocí hesla nastaveného v metadatech položky. Nastavte heslo položky v editoru položek.',
	
	'usage_inline_title' => 'Inline heslo (pokud je povoleno)',
	'usage_inline_example' => '[protect pwd="mojeheslo"]Tento obsah je chráněn[/protect]',
	'usage_inline_desc' => 'Chrání obsah konkrétním inline heslem. Funguje pouze pokud je výše povoleno "Povolit inline hesla".',
	
	'usage_entry_title' => 'Nastavení hesla položky',
	'usage_entry_desc' => 'Chcete-li nastavit heslo pro celou položku, přidejte jej v panelu metadat editoru položek při vytváření nebo úpravě příspěvku.',
	
	'submit' => 'Uložit nastavení',
	'msgs' => array(
		1 => 'Nastavení úspěšně uložena.',
		-1 => 'Chyba při ukládání nastavení.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode_protect'] = array(
	'legend' => 'Ochrana obsahu',
	'description' => 'Nastavte heslo pro ochranu bloků [protect]...[/protect] v této položce.',
	'password_label' => 'Heslo položky',
	'note' => 'Nechte prázdné pro odstranění ochrany heslem. Heslo bude bezpečně hashováno.',
);

// Front-end messages
$lang['plugin']['bbcode_protect'] = array(
	'password_label' => 'Heslo:',
	'submit_button' => 'Odeslat',
	'error_wrong_password' => 'Nesprávné heslo. Zkuste to prosím znovu.',
	'error_rate_limited' => 'Příliš mnoho neúspěšných pokusů. Zkuste to prosím později.',
	'feed_replacement' => '[Tento obsah je chráněn heslem]',
);
?>
