<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{$fp_config.locale.lang}">
<head>
	<title>{$flatpress.title|tag:wp_title:'&laquo;'}</title>
	<meta http-equiv="Content-Type" content="text/html; charset={$fp_config.locale.charset}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{action hook=wp_head}
</head>

<body>
	<div id="page-container">
		
		<header id="site-header">
			<div class="header-inner">
				<div class="site-branding">
					<h1 class="site-title"><a href="{$smarty.const.BLOG_BASEURL}">{$flatpress.title}</a></h1>
					{if isset($flatpress.subtitle) && $flatpress.subtitle}
						<p class="site-subtitle">{$flatpress.subtitle}</p>
					{/if}
				</div>
				
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="menu-toggle-icon"></span>
						<span class="screen-reader-text">Menu</span>
					</button>
					
					<div id="primary-menu" class="menu-wrapper">
						{* Check if navigation widgets exist *}
						{capture name="nav_content"}
							{widgets pos=navigation}
								<div class="nav-widget" id="{$id}">
									{if isset($subject) && $subject}<span class="nav-title">{$subject}</span>{/if}
									{$content}
								</div>
							{/widgets}
						{/capture}
						
						{if $smarty.capture.nav_content|strip}
							{$smarty.capture.nav_content}
						{else}
							{* Default menu when no widgets are configured *}
							<ul class="nav-menu">
								<li><a href="{$smarty.const.BLOG_BASEURL}">Home</a></li>
							</ul>
						{/if}
					</div>
				</nav>
			</div>
		</header>
		
		<div id="content-wrapper">
