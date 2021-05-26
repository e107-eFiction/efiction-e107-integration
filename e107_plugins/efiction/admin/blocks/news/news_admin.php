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

if (!defined('e107_INIT')) { exit; }

$block_key = 'news';
$content = "";
$blocks = efiction::get_block($block_key);

include("blocks/".$blocks['news']['file']);


	if(isset($_POST['submit'])) {
		if(isset($_POST['num']) && isNumber($_POST['num'])) $blocks['news']['num'] = $_POST['num'];
		else $blocks['news']['num'] = 1;
		if(isset($_POST['sumlength']) && isNumber($_POST['sumlength'])) $blocks['news']['sumlength'] = $_POST['sumlength'];
		else unset($blocks['news']['sumlength']);
		$output .= "<div style='text-align: center;'>"._ACTIONSUCCESSFUL."</div>";
		save_blocks( $blocks );
	}
	else  {
		if(!isset($blocks['news']['sumlength'])) $blocks['news']['sumlength'] = "";
		$output .= "<div style='text-align: center;'><b>"._CURRENT.":</b><br /><div class=\"tblborder\" style=\"width: 80%; margin: 0 auto; text-align: left;\">$content</div><br /></div>";
		$output .= "<div><div id='settingsform'><form method=\"POST\" enctype=\"multipart/form-data\" action=\"admin.php?action=blocks&admin=news\">
			<div><label for=\"num\">"._NUMNEWS.":</label><input type=\"text\" class=\"textbox\" name=\"num\" id=\"num\" size=\"4\" value=\"".$blocks['news']['num']."\"></div>
		<div><label for=\"num\">"._SUMLENGTH.":</label><input type=\"text\" class=\"textbox\" name=\"sumlength\" id=\"sumlength\" size=\"6\" value=\"".$blocks['news']['sumlength']."\"></div>
			<INPUT type=\"submit\" name=\"submit\" class=\"button\" id=\"submit\" value=\""._SUBMIT."\"></form></div><div style='clear: both;'></div></div>";
	}