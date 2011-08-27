<?php

namespace TA;

abstract class Menu_Source {
	
	public static function get_items($instance = null)
	{
		return array();
	}
	
	public static function render(array $items)
	{
		var_dump($items);die(); // Yeah our items
	}
}