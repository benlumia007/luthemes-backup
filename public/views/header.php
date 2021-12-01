<?php
/**
 * Default header template.
 *
 * @package   Luthemes
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */
?>
<!doctype html>
<html>
<head>
    <title><?php e( head_title() ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= e( asset( 'css/screen.css' ) ) ?>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script rel="javascript" src="<?= e( asset( 'js/app.js' ) ) ?>"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Merriweather:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="alternate" type="application/rss+xml" title="Benjamin Lu's Feed" href="http://feeds.feedburner.com/benlumia007" />
</head>
<body class="home">
<section id="container" class="site-container">
<nav id="primary" class="menu-primary">
	<button class="menu-toggle" onclick="myFunction()"><?= e( 'Menu' ); ?></button>
	<ul class="menu-items">
		<?php e( primary_menu() ); ?>
	</ul>
	<script>
        function myFunction() {
            var x = document.getElementById("primary");
            if (x.className === "menu-primary") {
            x.className += " responsive";
            } else {
            x.className = "menu-primary";
            }
        }
	</script>
</nav>
	<header id="header" class="site-header header-image">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?= e( uri() ) ?>"><?= e( site_title() ); ?></a></h1>
			<h3 class="site-description"><?= e( site_tagline() ); ?></h3>
		</div>
	</header>