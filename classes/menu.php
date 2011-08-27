<?php

namespace TA;

class Menu {
	
	public static function render($instance, $source = null)
	{
		if ($source === null)
		{
			$source = \Config::get('ta_menu.default_source');
		}
		$source = '\\TA\\Menu_Source_' . ucfirst($source);
		
		$items = $source::get_items($instance);
		
		return $source::render($items);
	}
}