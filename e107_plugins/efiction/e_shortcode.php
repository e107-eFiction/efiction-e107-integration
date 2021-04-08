<?php

// ----------------------------------------------------------------------
// Copyright (c) 2007 by Tammy Keefer
// Based on eFiction 1.1
// Copyright (C) 2003 by Rebecca Smallwood.
// http://efiction.sourceforge.net/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * e107 efiction Plugin
 *
 * #######################################
 * #     e107 website system plugin      #
 * #     by Jimako                    	 #
 * #     https://www.e107sk.com          #
 * #######################################
 */

if (!defined('e107_INIT')) {
    exit;
}

class efiction_shortcodes extends e_shortcode
{
    public $override = false; // when set to true, existing core/plugin shortcodes matching methods below will be overridden.
    public $settings = false;

    public function __construct()
    {
    }

    /*
      {FANFICTION_MESSAGES=welcome} replaced with {WMESSAGE}
      {FANFICTION_MESSAGES=rules}  used in pages
      {FANFICTION_MESSAGES=maintenance}
      {FANFICTION_MESSAGES=printercopyright} in viewstory
      {FANFICTION_MESSAGES=copyright}
      {FANFICTION_MESSAGES=thankyou}  in yesletter.php
      {FANFICTION_MESSAGES=nothankyou} in noletter.php

      custom pages - SELECT * FROM ".TABLEPREFIX."fanfiction_messages WHERE message_id = $edit LIMIT 1");
    */

    public function sc_fanfiction_messages($parm = '')
    {
        if ($parm == '') {
            return '';
        }
        $query = "SELECT message_text FROM #fanfiction_messages WHERE message_name = '{$parm}'" ;

        $text = e107::getDB()->retrieve($query);

        return $text;
    }

    

    /*  {EFICTION_LINK} */
    public function sc_efiction_link($parm = '')
    {
		if($parm == "") { return ''; }

	    $efiction = e107::getSingleton('efiction', e_PLUGIN.'efiction/efiction.class.php');
		 
		$link = $efiction->get_userlink($parm);
		
		if($link) {    
			return "<li class=".$parm.">".$link."</li>";
		}
		else return "";
		 
    }


	/* {EFICTION_MENU_CONTENT} */
    public function sc_efiction_menu_content()
    {
 
		//$block = $efiction->get_block('menu'); 
		$blocks = efiction::blocks();
        $pagelinks = efiction::pagelinks();

        foreach ($blocks['menu']['content'] as $page) {
            if (isset($pagelinks[$page]['link'])) {
                if (empty($blocks[$block]['style'])) {
                    $content .= '<li '.($current == $page ? 'id="menu_current"' : '').'>'.$pagelinks[$page]['link'].'</li>';
                } else {
                    $content .= $pagelinks[$page]['link'];
                }
            }
        }

        return $content;
    }

 
}
