<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	'type' => 'MySQLDatabase',
	'server' => 'localhost',
	'username' => 'harraway_admin',
	'password' => 'harraways2009',
	'database' => 'harraway_live',
	'path' => ''
);

// Set the site locale
i18n::set_locale('en_US');


#Director::set_environment_type("dev");
SiteTree::enable_nested_urls();


//for google map
ShortcodeParser::get('default')->register('googlemap', function ($arguments, $address, $parser, $shortcode) {
    $iframeUrl = sprintf(
        'https://maps.google.com/maps?q=%s&amp;hnear=%s&amp;ie=UTF8&hq=&amp;t=m&amp;z=14&amp;output=embed',
        urlencode($address),
        urlencode($address)
    );

    $width = (isset($arguments['width']) && $arguments['width']) ? $arguments['width'] : 400;
    $height = (isset($arguments['height']) && $arguments['height']) ? $arguments['height'] : 300;

    return sprintf(
        '<iframe id="map" width="%d" height="%d" src="%s" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>',
        $width,
        $height,
        $iframeUrl
    );
});


HTTP::set_cache_age(400);

#MySQLDatabase::set_connection_charset('utf8');


DataObject::add_extension('SiteConfig', 'CustomSiteConfig');
FulltextSearchable::enable();
SiteTree::enable_nested_urls();
Director::forceWWW();
