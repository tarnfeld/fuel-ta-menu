<?php

namespace TA;

class Menu_Item implements \Iterator {
	
	public $id			= null;
	public $parent		= null;
	public $children	= array();
	public $row			= array();
	
	public function add_child(Menu_Item $child)
	{
		$this->children[] = $child;
	}
	
	/* Iterator */
	protected $position = 0;

	function rewind()
	{
		$this->position = 0;
	}

	function current()
	{
		return $this->{$this->position};
	}

	function key()
	{
		return $this->position;
	}

	function next()
	{
		$this->position++;
	}

	function valid()
	{
		return isset($this->{$this->position});
	}
}