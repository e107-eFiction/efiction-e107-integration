<?php

e107::lan('efiction',true );

class efiction_adminArea extends e_admin_dispatcher
{

	protected $modes = array(


		'main'	=> array(
			'controller' 	=> 'admin_settings_ui',
			'path' 			=> null,
			'ui' 			=> 'admin_settings_form_ui',
			'uipath' 		=> null
		),
 
		'custpages'	=> array(
			'controller' 	=> 'fanfiction_custpages_ui',
			'path' 			=> null,
			'ui' 			=> 'fanfiction_custpages_form_ui',
			'uipath' 		=> null
		),
		
		'blocks'	=> array(
			'controller' 	=> 'fanfiction_blocks_ui',
			'path' 			=> null,
			'ui' 			=> 'fanfiction_blocks_form_ui',
			'uipath' 		=> null
		),
 	
	);
	
	protected $adminMenu = array(
        'main/dasboard'		=> array('caption'=> LAN_EFICTION_ADMIN_PANELS,   'perm' => '0', 'url'=>'admin_config.php'),    
        'divider2'          => array('divider'=>	true),
        'custpages/list'	=> array('caption'=> LAN_EFICTION_CUSTPAGES,  'perm' => 'P', 'url'=>'admin_custpages.php'),  
		'custpages/create'	=> array('caption'=> LAN_EFICTION_ADDCUSTPAGE,  'perm' => 'P', 'url'=>'admin_custpages.php'),   
        'blocks/list'		=> array('caption'=> LAN_EFICTION_BLOCKS,   'perm' => 'P', 'url'=>'admin_blocks.php'),  
		'blockscreate'		=> array('caption'=> LAN_EFICTION_ADDBLOCK,   'perm' => 'P', 'url'=>'admin_blocks.php'),         
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list',
		'custpages/edit'	=> 'custpages/list'				
	);	
	
	protected $menuTitle = 'efiction';  

	function init() {

		switch(e_PAGE) {
			case 'admin_custpages.php':
				$this->defaultAction = 'list';
				$this->defaultMode = 'custpages';
			break;
			
		}


	}
 
}


 