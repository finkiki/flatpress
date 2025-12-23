<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{$fp_config.locale.lang}">
<head>
	<title>{$flatpress.title|tag:wp_title:'&laquo;'}</title>
	<meta http-equiv="Content-Type" content="text/html; charset={$fp_config.locale.charset}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#1f2a38">
	{action hook=wp_head}
</head>

<body class="theme-bearggero">
	<a class="skip-link" href="#main">{$lang.main.skip_to_content|default:"Skip to content"}</a>
	<div id="body-container">
		<header class="site-header">
			<div class="branding">
				<a class="site-title" href="{$smarty.const.BLOG_BASEURL}">{$flatpress.title}</a>
				<p class="subtitle">{$flatpress.subtitle}</p>
			</div>
		</header>

		<div id="outer-container">
