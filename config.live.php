<?php

/** !Core */
$config["site_title"] = "Ben Plum";
$config["theme"] = "bp";
$config["date_format"] = "F j, Y";
$config["base_url"] = "http://benplum.com";


/** !Redirect Plugin */
include "config.redirects.php";


/** !Cache Plugin */
$config["nano_cache"] = array(
	"enabled" => true
	//"time" => 604800
);


//$config["meta_vars"] = array();

/** !Header Plugin */
// $settings["nano_headers"] = array();
// $CSP = "connect-src 'none'; font-src 'self'; frame-src 'self' https://www.googletagmanager.com; img-src 'self'; media-src 'self'; object-src 'self'; script-src 'self' http://www.googletagmanager.com https://www.google-analytics.com; style-src 'self';";
/*
X-Permitted-Cross-Domain-Policies: master-only
Content-Security-Policy: script-src 'self' https://translate.googleapis.com http://www.google.com https://www.google.com https://syndication.twimg.com https://syndication.twitter.com https://p.twitter.com https://cdn.api.twitter.com https://platform.twitter.com https://cdn.syndication.twimg.com https://www.twitter.com https://twitter.com https://ssl.google-analytics.com https://www.google-analytics.com; frame-src https://www.youtube.com https://platform.twitter.com https://twitter.com https://accounts.google.com https://docs.google.com https://www.google.com http://www.google.com; object-src 'self' http://www.google.com https://ssl.google-analytics.com; font-src https://themes.googleusercontent.com https://fonts.googleapis.com 'self'; img-src 'self' https://si0.twimg.com https://platform.twitter.com https://www.twitter.com https://si0.twimg.com/ https://o.twimg.com https://pbs.twimg.com https://www.google-analytics.com data:
*/


/** !Placeholder Plugin */
$config["nano_placeholder"] = array(
	"default" => array(
		"background_color" => "CCCCCC",
		"text_color" => "666666",
		//"image" => false,
		//"text" => "Placeholder"
	),
	"custom" => array(
		"background_color" => "222222",
		"text_color" => "666666",
		//"image" => false,
		"text" => "Placeholder"
	)
);


/** !Resources Plugin */
$config["nano_resources"] = array(
	//"debug" => true,
	"css" => array(
		"files" => array(
			"site" => array(
				"../../components/normalize-css/normalize.css",
				"../../components/Gridlock/fs.gridlock-base.css",
				"../../components/Gridlock/fs.gridlock-12.css",
				"../../components/Shifter/jquery.fs.shifter.css",

				"css/fonts.css",
				"css/prism.css",
				"css/master.css"
			),
			"site-ie8" => array(
				"../../components/Gridlock/fs.gridlock-ie.css",
				"css/ie/ie8.css"
			),
			"site-ie9" => array(
				"css/ie/ie9.css"
			)
		),
		"vars" => array(
			"blue"      => "#1472B6",
			"textGray"  => "#666",
			"lineGray"  => "#ddd",
			"lightGray" => "#999",
			"black"     => "#222",
			"white"     => "#fff",
			"gray"		=> "#666",

			"ptSerif"   => "font-family: 'PTSerif', serif;",
			"ptSans"    => "font-family: 'PTSans', sans-serif;",
			"ptMono"    => "font-family: 'PTMono', monospace;",

			"iconSprite" => "url(../images/icons.svg) no-repeat"
		),
		"minify" => true
	),
	"js" => array(
		"files" => array(
			"modernizr" => array(
				"js/lib/modernizr.custom.js",
			),
			"site" => array(
				"../../components/jquery/dist/jquery.min.js",
				"../../components/Pronto/jquery.fs.pronto.min.js",
				"../../components/Rubberband/jquery.fs.rubberband.min.js",
				"../../components/Shifter/jquery.fs.shifter.min.js",
				"../../components/Zoetrope/jquery.fs.zoetrope.min.js",

				"js/prism.js",
				"js/main.js"
			),
			"site-ie8" => array(
				"js/ie/matchMedia.ie8.js"
			),
			"site-ie9" => array(
				"js/ie/matchMedia.ie9.js"
			)
		),
		"vars" => array(
			// "gridlock_bookmarklet_css" => file_get_contents("../cache/gridlock.bookmarklet.css")
		),
		"minify" => false
	)
);