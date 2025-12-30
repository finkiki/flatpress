<!DOCTYPE html>
<html>
<head>
	<title>{$flatpress.title|tag:wp_title:'&laquo;'}</title>
	<meta http-equiv="Content-Type" content="text/html; charset={$flatpress.charset}" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	{action hook=wp_head}
</head>

<body>
    <div id="body-container">
        <div id="head">
            <div id="titles">
                <h1><a href="{$smarty.const.BLOG_BASEURL}">{$flatpress.title}</a></h1>
                <p class="subtitle">{$flatpress.subtitle}</p>
            </div>
        <div id="menus">
            <nav>
                {widgets pos=Menus}
                {$content}
                {/widgets}
            </nav>
        </div>
    </div> <!-- end of #head -->
        
	<div id="outer-container">
