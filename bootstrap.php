<?php

/**
 * Package bootstrap
 *
 * @package TA_Menu
 * @see http://github.com/tarnfeld/fuel-ta-menu
 * @author Tom Arnfeld <tarnfeld@me.com>
 */

Autoloader::add_classes(array(
	
	'TA\\Menu'					=> __DIR__.'/classes/menu.php',
	'TA\\Menu_Source'			=> __DIR__.'/classes/menu/source.php',
	'TA\\Menu_Source_Database'	=> __DIR__.'/classes/menu/source/database.php',
	'TA\\Menu_Item'				=> __DIR__.'/classes/menu/item.php',
));

\Config::load('ta_menu', true);