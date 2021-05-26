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

$current = "adminarea";

if(isset($_GET['action']) && ($_GET['action'] == "categories" || $_GET['action'] == "admins")) $displayform = 1;

$disableTiny = true;

// Include some files for page setup and core functions
include ("header.php");
require_once(HEADERF);

//make a new TemplatePower object
if(file_exists("$skindir/default.tpl")) $tpl = new TemplatePower( "$skindir/default.tpl" );
else $tpl = new TemplatePower(_BASEDIR."default_tpls/default.tpl");
include(_BASEDIR."includes/pagesetup.php");

e107::lan('efiction',true );
// end basic page setup
 
// check that user has permissions to perform this action before going further.  Otherwise kick 'em
	if(!isADMIN) accessDenied( );
    
    $admincats = e107::getDb()->retrieve("SELECT categories AS admincats FROM #fanfiction_authorprefs WHERE uid = '".USERUID."' LIMIT 1");
	if(empty($admincats)) $admincats = "0";
    
	$output = "<div style='text-align: center; margin: 1em;'>";
    
    $panellist = efiction::admin_panels();
    
	 
	foreach($panellist as $accesslevel => $row) {
		$output .= implode(" | ", $row)."<br />";
	}
    
	$output .= "</div>\n";
	if($action) {
 
        $panelquery = "SELECT * FROM ".TABLEPREFIX."fanfiction_panels WHERE panel_name = '$action' AND panel_type = 'A' LIMIT 1";
 
		if($panel  = e107::getDb()->retrieve($panelquery)) {
 
			if((isset($panel['panel_level']) ? $panel['panel_level'] : 0) >= uLEVEL) { 
         
				if($panel['panel_url'] && file_exists(_BASEDIR.$panel['panel_url'])) require_once(_BASEDIR.$panel['panel_url']);
				else if (file_exists(_BASEDIR."admin/{$action}.php")) require_once(_BASEDIR."admin/{$action}.php");
			}
			else accessDenied( );
		}
	}
	else {
        // admin notices 
		if (file_exists("install"))
			$output .= write_error(_SECURITYDELETE);
    		$adminnotices = "";
    		$count = e107::getDb()->retrieve("SELECT COUNT(DISTINCT chapid) AS count FROM #fanfiction_chapters WHERE validated < 1");
 
    		if($count) $adminnotices .= write_message(sprintf(_QUEUECOUNT, $count));
            
    	    $codequery = "SELECT * FROM #fanfiction_codeblocks WHERE code_type = 'adminnotices'";
            $codes = e107::getDb()->retrieve($codequery, true);
            foreach ($codes as $code) {
                //example:   
                eval($code['code_text']);
            }
            
		$output .= write_message($adminnotices);
 
    }	
 
 
    $output = e107::getParser()->parseTemplate($output, true);
    e107::getRender()->tablerender($caption, $output, $current);
 
    require_once(FOOTERF);  
    exit( );