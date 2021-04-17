<?php
// ----------------------------------------------------------------------
// Copyright (c) 2010 by Kirstyn Amanda Fox
// Based on DisplayWorld for eFiction 3.0
// Copyright (c) 2005 by Tammy Keefer
// Valid HTML 4.01 Transitional
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


if (!defined('e107_INIT')) { exit; }
 
 if(isset($_POST['submit'])) {
			$stories['writer'] = stripslashes($_POST['writer']);
			$stories['original_title'] = stripslashes($_POST['original_title']);
			$stories['original_url'] = stripslashes($_POST['original_url']);
			$stories['preklad_url'] = stripslashes($_POST['preklad_url']);
			$stories['multichapter'] = stripslashes($_POST['multichapter']);
			$stories['source'] = $source;		
 }
 
 
    $output .= '<div class="alert alert-info" role="alert">
     Toto je nové!!!
        </div>';
    $writer = $stories['writer'];     
    $output .= "<div style=\"clear: both; height: 1px;\">&nbsp;</div>";
	$result5 = dbquery("SELECT cw_author_id, cw_author_name FROM ".TABLEPREFIX."fanfiction_writers ORDER BY cw_author_name ");
	$output .= "<label for=\"cw_author_id\">"._ORIGINAL_WRITER.":</label>".(!$rid ? " <span style=\"font-weight: bold; color: red\">*</span>" : "")." <select size=\"1\" id=\"writer\" name=\"writer\">";
	while ($w = dbassoc($result5)) {
		$output .= "<option value=\"".$w['cw_author_id']."\"".($writer == $w['cw_author_id'] ? " selected" : "").">".$w['cw_author_name']."</option>";
	} 
	$output .= "</select> <br>"; 
    
 
    $original_title = $stories['original_title']; 
	$output .= "<br /><label for=\"original_title\">"._ORIGINAL_TITLE.":</label> ".(!$original_title ? "<span style=\"font-weight: bold; color: red\">*</span>" : "")."<input type=\"text\" class=\"textbox\" name=\"original_title\" size=\"50\"".($original_title? " value=\"".htmlentities($original_title)."\"" : "")." maxlength=\"200\" id=\"original_title\"><br />";
 
    $original_url = $stories['original_url']; 
	$output .= "<br /><label for=\"original_url\">"._ORIGINAL_URL.":</label> ".(!$original_url ? "<span style=\"font-weight: bold; color: red\">*</span>" : "")."<input type=\"text\" class=\"textbox\" name=\"original_url\" size=\"100\"".($original_url? " value=\"".htmlentities($original_url)."\"" : "")." maxlength=\"200\" id=\"original_title\"><br />";
  
    $preklad_url = $stories['preklad_url']; 
	$output .= "<br /><label for=\"preklad_url\">"._PREKLAD_URL.":</label> ".(!$preklad_url ? "<span style=\"font-weight: bold; color: red\">*</span>" : "")."<input type=\"text\" class=\"textbox\" name=\"preklad_url\" size=\"100\"".($preklad_url? " value=\"".htmlentities($preklad_url)."\"" : "")." maxlength=\"200\" id=\"original_title\"><br />";
  
    
    $multichapter = $stories['multichapter'];
	$output .= " <br> <label for=\"complete\">Kapitolovka:</label> 
    <input type=\"checkbox\" class=\"checkbox-inline\" id=\"multichapter\" name=\"multichapter\" value=\"1\"".($multichapter == 1 ? " checked" : "") .">";


    $source = $stories['source'];  
    
$output .= "<br /><label for=\"feature\">Zdroj:</label> 
 
<select name='source' id='source'  class=\"textbox\" data-original-title='' title=''>
<option value='none' ".($source == 'none' ? " selected" : "")." >Neurceny</option>
<option value='mimo' ".($source == 'mimo' ? " selected" : "").">Mimo HPKizi Universe</option>
<option value='efiction' ".($source == 'efiction' ? " selected" : "")." >Priamy cez efiction</option>
<option value='hpkizi' ".($source == 'hpkizi' ? " selected" : "")." >HPKIZI</option>
<option value='chyba' ".($source == 'chyba' ? " selected" : "").">Chyba</option>
</select>";


    
  $output .= '<div class="alert alert-info" role="alert">
     Tu končia naše úpravy
        </div>';