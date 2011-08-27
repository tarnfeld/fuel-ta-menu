<?php

namespace TA;

abstract class Menu_Source {
	
	public static function get_items($instance = null)
	{
		return array();
	}
	
	public static function render(array $items)
	{
		$html = "";
		
		foreach($items as $item)
		{
			$html .= \View::factory(\Config::get('ta_menu.render_view'), array(
				'item' => $item,
				'source' => get_class(new static())
			))->render();
		}
		
		return $html;
	}
}