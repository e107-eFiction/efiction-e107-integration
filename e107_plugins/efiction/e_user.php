<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2014 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */

if (!defined('e107_INIT')) { exit; }

;

// v2.x Standard 
class efiction_user // plugin-folder + '_user'
{	
	/**
	 * The same field format as admin-ui, with the addition of 'fieldType', 'read', 'write', 'appliable' and 'required' as used in extended fields table.
	 *
	 * @return array
	 */
	function settings()
	{
 
		$fields = array();
		$fields['author'] = array('title' => "Author name",  'fieldType' => 'int(11)',   'type' => 'method', 'data'=>'str', 
		'read'=> e_UC_MEMBER, 
		'write'=>e_UC_MEMBER );
 
        return $fields;

	}
}	

// (plugin-folder)_user_form - only required when using custom methods.
class efiction_user_form extends e_form
{
	// user_plugin_(plugin-folder)_(fieldname)
	public function user_plugin_efiction_author($curVal, $mode, $att=array())
	{
        $where = " user_id = ".USERID; 
 
		$authors = e107::getDb()->retrieve("fanfiction_authors", "uid, penname", $where, true );
        foreach($authors AS $row)  {
			$opts[$row['uid']] = $row['penname'] ;
		}
		//$opts[0] = 'Not set';
		return e107::getForm()->select('user_plugin_efiction_author', $opts, $curVal, true);
	}
   
}