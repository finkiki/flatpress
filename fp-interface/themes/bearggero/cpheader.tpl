<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{$fp_config.locale.lang}">
<head>
	<title>{$flatpress.title}{if isset($pagetitle)}{$pagetitle}{/if}</title>
	<meta http-equiv="Content-Type" content="text/html; charset={$fp_config.locale.charset}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{action hook=wp_head}
	{action hook=admin_head}
</head>

{if !isset($panel)} {assign var=panel value=""} {/if}
{if !isset($action)} {assign var=action value=""} {/if}
<body class="{"admin-$panel-$action"|tag:admin_body_class}">
	<div id="page-container">
		<div id="content-wrapper">

