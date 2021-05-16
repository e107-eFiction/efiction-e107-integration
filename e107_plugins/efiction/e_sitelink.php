<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * Sitelinks configuration module - gsitemap
 *
 * $Source: /cvs_backup/e107_0.8/e107_plugins/faqs/e_sitelink.php,v $
 * $Revision$
 * $Date$
 * $Author$
 *
*/

if (!defined('e107_INIT')) { exit; }
/*if(!e107::isInstalled('gsitemap'))
{ 
	return;
}*/


class efiction_sitelink // include plugin-folder in the name.
{
	function config()
	{
		global $pref;
		
		$links = array();
			
        $links[1]  = array('function' => "home",          'name'	=> 'Home - no sublinks');	    
		$links[2]  = array('function' => "recent",        'name'	=> 'Most Recent - no sublinks' );	
        $links[3]  = array('function' => "login",         'name'	=> 'Login - no sublinks');	    
		$links[4]  = array('function' => "adminarea",     'name'	=> 'Admin - no sublinks' );		
        $links[5]  = array('function' => "logout",        'name'	=> 'Logout - no sublinks' );	    
		$links[6]  = array('function' => "featured",      'name'	=> 'Featured Stories - no sublinks'  );	
        $links[7]  = array('function' => "catslink",      'name'	=> 'Categories - no sublinks');	    	 
        $links[9]  = array('function' => "authors",       'name'	=> 'Authors' );	    
		$links[10] = array('function' => "help",          'name'	=> 'Help - no sublinks' );	
        $links[11] = array('function' => "search",        'name'	=> 'Search - no sublinks');	    
		$links[12] = array('function' => "series",        'name'	=> 'Series - no sublinks' );		
        $links[13] = array('function' => "tens",          'name'	=> 'Top Tens - no sublinks' );	    
		$links[14] = array('function' => "challenges",    'name'	=> 'Challenges - no sublinks' );	
        $links[15] = array('function' => "contactus",     'name'	=> 'Contact Us - no sublinks');	    
		$links[16] = array('function' => "rules",         'name'	=> 'Rules - no sublinks' );    
		$links[17] = array('function' => "tos",           'name'	=> 'Terms of Service - no sublinks'  );	
        $links[18] = array('function' => "rss",           'name'	=> 'RSS - no sublinks');	    
		$links[19] = array('function' => "member",        'name'	=> 'Account Info - no sublinks' );		
        $links[20] = array('function' => "titles",        'name'	=> 'Titles - no sublinks');	    
		$links[21] = array('function' => "register",      'name'	=> 'Register - no sublinks'  );	
        $links[22] = array('function' => "lostpassword",  'name'	=> 'Lost Password - no sublinks');	    
		$links[23] = array('function' => "newsarchive",   'name'	=> 'News Archive - no sublinks' );          
		$links[24] = array('function' => "browse",        'name'	=> 'Browse' );	
        $links[25] = array('function' => "charslink",     'name'	=> 'Characters - no sublinks');	    
		$links[26] = array('function' => "ratings",       'name'	=> 'Ratings');             
        return $links;
	}
	
	function home()  {  return null;  }	
    function recent()  {  return null;  }	
    function login()  {  return null;  }	
    function adminarea()  {  return null;  }	
    function logout()  {  return null;  }	
	function featured()  {  return null;  }	
    function catslink()  {  return null;  }	
    function members()  {  return null;  }	
 	
    function help()  {  return null;  }	
	function search()  {  return null;  }	
 
    function challenges()  {  return null;  }	
    function contactus()  {  return null;  }	
    function rules()  {  return null;  }	
    function tos()  {  return null;  }
    function rss()  {  return null;  }
    function member()  {  return null;  }
    function titles()  {  return null;  }   
    function register()  {  return null;  }
    function lostpassword()  {  return null;  }
    function newsarchive()  {  return null;  }
    function charslink()  {  return null;  }
    function ratings()  {  return null;  }    
        
	function browse() 
	{
		$sql = e107::getDb();
		$tp = e107::getParser();
		$sublinks = array();
        
        $classtypelist = efiction::classtypelist();
 
		$panelquery = "SELECT * FROM #fanfiction_panels WHERE panel_hidden != '1' AND panel_level ".(isMEMBER ? " < 2" : "= '0'")." AND panel_type = 'B' ORDER BY panel_type DESC, panel_order ASC, panel_title ASC";
        $panels = e107::getDb()->retrieve($panelquery, true);
        foreach($panels AS $panel) {
            $sublinks[$panel['panel_title']] = array(
    				'link_name'			=> $tp->toHTML($panel['panel_title'],'','TITLE'),
    				'link_url'			=> "browse.php?type=".$panel['panel_name'],
    				'link_description'	=> '',
    				'link_button'		=> '',
    				'link_category'		=> '',
    				'link_order'		=> '',
    				'link_parent'		=> '',
    				'link_open'			=> '',
                    'link_open'			=> 'efiction',
    				'link_class'		=> '' 
    			);
        }
        
    	foreach($classtypelist as $classtype => $info) {
    		 
            $sublinks[$info['title']] = array(
        				'link_name'			=> $info['title'],
        				'link_url'			=> "browse.php?type=class&amp;type_id=".$classtype,
        				'link_description'	=> '',
        				'link_button'		=> '',
        				'link_category'		=> '',
        				'link_order'		=> '',
        				'link_parent'		=> '',
        				'link_open'			=> '',
                        'link_open'			=> 'efiction',
        				'link_class'		=> '' 
        			);
    	}
                
       ksort($sublinks);
 
       return $sublinks;
	    
	}
	
    function tens() 
	{
 	    $sql = e107::getDb();
		$tp = e107::getParser();
		$sublinks = array();
        
        $panelquery = "SELECT * FROM #fanfiction_panels WHERE panel_type = 'L' AND panel_hidden != '1' AND panel_level = '0' ORDER BY panel_order";
        $panels = e107::getDb()->retrieve($panelquery, true);

		 foreach($panels AS $panel) {   
            $sublinks[$panel['panel_name']] = array(
    				'link_name'			=> $tp->toHTML($panel['panel_title'],'','TITLE'),
    				'link_url'			=> "toplists.php?list=".$panel['panel_name'],
    				'link_description'	=> '',
    				'link_button'		=> '',
    				'link_category'		=> '',
    				'link_order'		=> '',
    				'link_parent'		=> '',
    				'link_open'			=> '',
                    'link_open'			=> 'efiction',
    				'link_class'		=> '' 
    			);
        } 
        return $sublinks;
     }  
     
     
      function authors()  {  
        $sql = e107::getDb();
		$tp = e107::getParser();
		$sublinks = array();
        
        $panelquery = "SELECT * FROM #fanfiction_panels WHERE panel_type = 'M' AND panel_hidden != '1' AND panel_level = '0' ORDER BY panel_order";
        $panels = e107::getDb()->retrieve($panelquery, true);
 
		foreach($panels AS $panel) {   
            $sublinks[] = array(
    				'link_name'			=> $tp->toHTML($panel['panel_title'],'','TITLE'),
    				'link_url'			=> $panel['panel_url'],
    				'link_description'	=> '',
    				'link_button'		=> '',
    				'link_category'		=> '',
    				'link_order'		=> '',
    				'link_parent'		=> '',
    				'link_open'			=> '',
                    'link_open'			=> 'efiction',
    				'link_class'		=> '' 
    			);
        } 
        return $sublinks;
      }   
}
