<?php

return array (

	'render_view'		=> 'menu',

	'default_source'	=> 'database',
	
	'source' => array (
		
			'database'	=> array (
					
					'id_field'			=> 'id',
					'parent_id_field'	=> 'parent_id',
					'position_field'	=> 'position'
				),
		),	
);