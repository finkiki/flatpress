bearggero
=========

Bearggero Theme for Flatpress 1.5+
==========
Compatibility
==========
This theme works with all major browsers that support HTML 5. IE9+, Firefox, Opera, Chrome, and also works well with mobile browsers. IFrames(YouTube, vimeo, etc) are not supported by the iPhone browser so they will not show up on an iphone.

Updated to work with FlatPress 1.5 RC (master) and refreshed with a responsive layout for modern mobile devices.


First we removed the admin link on the page because it didn’t look very nice. To access the page simply append admin.php to the URL in the navigation bar so example.com/flatpress/ would become example.com/flatpress/admin.php
Note: The theme actually modifies the admin panel as well, enlarging the panel and fonts. 

==========
Entries
==========
When adding a High definition Image use the [html] &lt; img class=’hdImg’ src=’fp-content/images/img.png’ &gt;  [/html] "  to utilize the CSS styling for images of class ‘hdImg’ which scales the width to fill the container and the height in the same ratio.

Iframes are styled by the element so it will always fill the entry unless strictly stylized.

==========
Statics
==========
Menu
  We use a custom widget named Menus that dynamically pull the links from this menu page. In order to use this you must   place all urls to be pulled in a blockparser:static page and create a custom widget "Menus" that contains this static   page. More info in the widgets section.
  
  This page is used to generate the menu at the top of the page. All that should be here is anchors so [url=?]Home[/url]   in BBcode. 

  Spacing matters so do not include a space in between any of these tags or it will be represented in the actual          generated menu. Since we are simply sptting our the content of the block parser into the nav block.

==========
Widgets
==========
We utilize sticky, and Menus custom widgets.
Menus
  This widget is only filled with one element and that is Blockparser:menu.
  Blockparser: represents a static that can be added to the widgetset.
  The Blockparser:menu represents the menu page which must be updated for each nav anchor element meaning that each page   you want to be displayed in our home menu must be added here, it is a simple hardcoded BBcode [url] [/url] just append   a new one. These modifications must occur in the edit statics section.
sticky
  This represents our sticky for our homepage. It is possible to have a sticky on all pages, but the code in index.tpl    currently has it only displaying on the frontpage because that is the behavior we wanted. A sticky is a post that will   stay at the top of the page even when new entries are added. This sticky must be represented as a static as entries     cannot be added to the widgetset by flatpress’s design.
  
  To define these custom widgets add this code to the Manage Widgets(raw)
  
  'sticky' => 
  array (
    0 => 'blockparser:about',
  ),
  'Menus' => 
  array (
    0 => 'blockparser:menu',
  ),
  
  the blockparser:page can be replaced with any static that you have defined.

===========
Plugins
===========
We have enabled blockParser, BBcode, adminArea, categories, Jquery, locker, QuickSpamFilter, BearggerroReadmore.
  BearggeroReadmore
    This is a plugin that we have created for styling the ReadMore links. Please also download this plugin                  (https://github.com/dronious/bearggero-readmore) and put it in the plugins directory and enable it in the plugins        admin panel.

  
  
  
  



