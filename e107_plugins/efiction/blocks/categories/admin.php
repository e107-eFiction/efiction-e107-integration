<?php

// ----------------------------------------------------------------------
// eFiction 3.2
// Copyright (c) 2007 by Tammy Keefer
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
 
require e_PLUGIN."efiction/blocks/".$blocks['categories']['file'] ;
 

$template = (!empty($blocks['categories']['template']) ? $blocks['categories']['template'] : "{image} {link} [{count}] {description}");

if(empty($blocks['categories']['tpl'])) $output .= "<div style='text-align: center;'><b>".LAN_EFICTION_CURRENT.":</b><br /><div class=\"tblborder\" style=\"width: 80%; margin: 0 auto; text-align: left;\">$content</div><br /></div>";

$output .= "<div> 
<textarea name=\"template\" id=\"template\" rows=\"5\" cols=\"40\">$template</textarea><br />";
if($tinyMCE) 
$output .= "<div class='tinytoggle'><input type='checkbox' name='toggle' onclick=\"toogleEditorMode('template');\"><label for='toggle'>"._TINYMCETOGGLE."</label></div>";	
$output .= "<select name=\"columns\" class=\"textbox\" style='margin: 3px;'><option value=\"0\"".(empty($blocks['categories']['columns']) ? " selected" : "").">"._ONECOLUMN."</option>
<option value=\"1\"".(!empty($blocks['categories']['columns']) ? " selected" : "").">"._MULTICOLUMN."</option></select> 
<select name=\"tpl\" class=\"textbox\" style='margin: 3px;'><option value=\"0\"".(empty($blocks['categories']['tpl']) ? " selected" : "").">".LAN_EFICTION_DEFAULT."</option>
<option value=\"1\"".(!empty($blocks['categories']['tpl']) ? " selected" : "").">".LAN_EFICTION_USETPL."</option></select><br />";

$output .= "<div class='well'>"._CATBLOCKNOTE."</div>";
 
	