<?php

namespace TA;

class Menu_Item {
	
	public $id			= null;
	public $parent		= null;
	public $children	= array();
	public $data		= array();
	
	public function add_child(Menu_Item $child)
	{
		$this->children[] = $child;
	}
}