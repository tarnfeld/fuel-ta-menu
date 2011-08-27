<?php

namespace TA;

class Menu_Source_Database extends Menu_Source {
	
	/**
	 * Get the items
	 *
	 * @param string $instance - the table name
	 * @return array( Menu_Item )
	 */
	public static function get_items($instance = null)
	{
		$sql = \DB::select('*')
				->from($instance)
				->order_by(\Config::get('ta_menu.source.database.parent_id_field'), 'IS NULL DESC')
				->order_by(\Config::get('ta_menu.source.database.parent_id_field'), 'ASC');
				
		if ($field = \Config::get('ta_menu.source.database.position_field'))
		{
			$sql->order_by($field, 'ASC');
		}
		
		$rows = $sql->execute()->as_array();
		
		$items = array();
		foreach($rows as $key => $row)
		{
			// Top Level
			if ($row[\Config::get('ta_menu.source.database.parent_id_field')] === NULL)
			{
				$item = new Menu_Item();
				$item->id = $row[\Config::get('ta_menu.source.database.id_field')];
				
				$items[$key] = $item;
			}
			else if (isset($items[$row[\Config::get('ta_menu.source.database.parent_id_field')]]))
			{
				$item = new Menu_Item();
				$item->id = $row[\Config::get('ta_menu.source.database.id_field')];
				$item->parent = $row[\Config::get('ta_menu.source.database.parent_id_field')];
				
				$items[$row[\Config::get('ta_menu.source.database.parent_id_field')]]->add_child($item);
			}
			else
			{
				throw new Menu_Exception("Something went wrong... this shouldn't happen");
			}
		}
		
		return $items;
	}
}