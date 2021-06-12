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

if (!class_exists('efiction_panels')) {
    class efiction_panels
    {

		private static $admin_panel_icons = array(
			'maintenance' => '<i class="S32 e-configure-32"></i>',
			'modules' => '<i class="S32 e-plugins-32"></i>',
			'newstory' => '<i class="S32 e-add-32"></i>',
			'addseries' => '<i class="S32 e-articles-32"></i>',
			'news' => '<i class="S32 e-news-32"></i>',
			'mailusers' => '<i class="S32 e-mail-32"></i>',
			'blocks' => '<i class="S32 e-welcome-32"></i>',
			'admins' => '<i class="S32 e-cat_users-32"></i>',
			'submitted' => '<i class="S32 e-notify-32"></i>',
			'skins' => '<i class="S32 e-themes-32"></i>',
			//find better icons later
			'featured' => '<i class="S32 e-frontpage-32"></i>',
			'manual' => '<i class="S32 e-forums-32"></i>',
			'versioncheck' => '<i class="S32 e-cat_users-32"></i>',
			'characters' => '<i class="S32 e-content-32"></i>',
			'ratings' => '<i class="S32 e-reviews-32"></i>',
			'members' => '<i class="S32 e-users-32"></i>',
			'classifications' => '<i class="S32 e-rename-32"></i>',
			'categories' => '<i class="S32 e-prefs-32"></i>',
			'settings' => '<i class="S32 e-configure-32"></i>',
			'panels' => '<i class="S32 e-rename-32"></i>',
			'custpages' => '<i class="S32 e-prefs-32"></i>',
			'viewlog' => '<i class="S32 e-warning-32"></i>',
			'authorfields' => '<i class="S32 e-userclass-32"></i>',
			'phpinfo' => '<i class="S32 e-userclass-32"></i>',
			'links' => '<i class="S32 e-userclass-32"></i>',
		);

        public function __construct()
        {
        }

		/* returns panels array, sorted by level, each level contains full path to files */
		public static function get_admin_panels()
        {
			$panelquery = "SELECT * FROM ".MPREFIX."fanfiction_panels WHERE panel_hidden != '1' AND panel_type = 'A' AND panel_level >= ".uLEVEL.' ORDER BY panel_level DESC, panel_order ASC, panel_title ASC';

			$records = e107::getDb()->retrieve($panelquery, true);

			foreach ($records as $panel) {
				if (!$panel['panel_url']) {
					$panellist[$panel['panel_level']][] = '<a href="'.e_SELF.'?action='.$panel['panel_name'].'">'.$panel['panel_title'].'</a>';
				} else {
					$panellist[$panel['panel_level']][] = '<a href="'.$panel['panel_url'].'">'.$panel['panel_title'].'</a>';
				}
			}

			return $panellist;
        }

		/* returns panels array for e107 admin menu, sorted by level, each level contains full path to files */
		public static function get_adminmenu_panels()
        {
			$panelquery = "SELECT * FROM ".MPREFIX."fanfiction_panels WHERE panel_hidden != '1' AND panel_type = 'A' AND panel_level >= ".uLEVEL.' ORDER BY panel_level DESC, panel_order ASC, panel_title ASC';

			$records = e107::getDb()->retrieve($panelquery, true);

			$supported = array("settings", "ratings");

			foreach ($records as $panel) {
				$key = $panel['panel_name'];   
				if(in_array($key, $supported))  {  
					if (!$panel['panel_url']) {
						$link = e_SELF.'?action='.$panel['panel_name'];
						if($key == "settings") {
							$link = e_PLUGIN.'efiction/adminarea/admin_settings.php?action='.$panel['panel_name'].'&sect=main';
						}
					} else {
						$link = e_HTTP.$panel['panel_url'];
					}

					$vals[$key]['link'] = $link;
					$vals[$key]['text'] = $panel['panel_title'];
			   }
			}
 
			return $vals;
        }	
		
		/* in adminarea.php */
		public static function get_adminarea_panels($parm = null)
		{
			$panelquery = "SELECT * FROM #fanfiction_panels WHERE panel_hidden != '1' AND panel_type = 'A' AND panel_level >= ".uLEVEL.' ORDER BY panel_level DESC, panel_order ASC, panel_title ASC';
	
			$records = e107::getDb()->retrieve($panelquery, true);
	
			foreach ($records as $panel) {
				$key = $panel['panel_name'];
				if (!$panel['panel_url']) {
					$link = e_HTTP.'admin.php?action='.$panel['panel_name'];
				} else {
					$link = e_HTTP.$panel['panel_url'];
				}
	
				$vals[$key]['link'] = $link;
				$vals[$key]['title'] = $panel['panel_title'];
				$vals[$key]['caption'] = $panel['panel_title'];
				$vals[$key]['perms'] = 0;
				$vals[$key]['icon_32'] = self::$admin_panel_icons[$key];
		
			}
	
			return $vals;
		}


		public static function get_single_panel($name = NULL, $type = NULL)
        {
			if (empty($name)) {
                return false;
            }

			if (empty($type)) {
                return false;
            }

			$panelquery =  "SELECT *FROM ".MPREFIX."fanfiction_panels WHERE panel_name = '$name' AND panel_type = '$type' LIMIT 1";

			if(!$panel = e107::getDb()->retrieve($panelquery)) return false;
			//check access here
			if((isset($panel['panel_level']) ? $panel['panel_level'] : 0) >= uLEVEL) { 
				return $panel;
			}
			else return false;
			
			return false;
			
		}

        public static function get_panels()
        {
        }
 
    }

    new efiction_panels();
}
