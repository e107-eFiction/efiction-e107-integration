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

$block_key = 'menu';
$content = "";
$blocks = efiction::get_block($block_key);

global $language, $pagelinks;
$linkquery = dbquery("SELECT * from ".TABLEPREFIX."fanfiction_pagelinks ORDER BY link_access ASC");
if(!isset($current)) $current = "";

		$blockquery = dbquery("SELECT * FROM ".TABLEPREFIX."fanfiction_blocks WHERE block_name = '$admin'");
		while($block = dbassoc($blockquery)) {
			$blocks[$block['block_name']] = unserialize($block['block_variables']);
			$blocks[$block['block_name']]['title'] = $block['block_title'];
			$blocks[$block['block_name']]['file'] = $block['block_file'];
			$blocks[$block['block_name']]['status'] = $block['block_status'];
		}
		$content = isset($blocks[$admin]['content']) ? $blocks[$admin]['content'] : array();

while($link = dbassoc($linkquery)) {
	$tpl->assignGlobal($link['link_name'], "<a href=\""._BASEDIR.$link['link_url']."\" title=\"".$link['link_text']."\"".($link['link_target'] ? " target=\"_blank\"" : "").($current == $link['link_name'] ? " id=\"current\"" : "").">".$link['link_text']."</a>");
	$pagelinks[$link['link_name']] = array("id" => $link['link_id'], "text" => $link['link_text'], "url" => _BASEDIR.$link['link_url'], "link" => "<a href=\""._BASEDIR.$link['link_url']."\" title=\"".$link['link_text']."\"".($link['link_target'] ? " target=\"_blank\"" : "").($current == $link['link_name'] ? " id=\"current\"" : "").">".$link['link_text']."</a>");
}

/* display currect preview */
include _BASEDIR.'blocks/'.$blocks[$block_key]['file'];

  
	if(isset($_GET['up'])) {
		$pos = array_search($_GET['up'], $blocks[$admin]['content']);
		if($pos >= 1) {
			$blocks[$admin]['content'][$pos] = $blocks[$admin]['content'][$pos - 1];
			$blocks[$admin]['content'][$pos - 1] = $_GET['up'];
			$blocks[$admin]['content'] = $blocks[$admin]['content'];
			save_blocks( $blocks );
		}
	}
	if(isset($_GET['down'])) {
		$pos = array_search($_GET['down'], $blocks[$admin]['content']);
		if($pos <= count($blocks[$admin]['content'])) {
			$blocks[$admin]['content'][$pos] = $blocks[$admin]['content'][$pos + 1];
			$blocks[$admin]['content'][$pos + 1] = $_GET['down'];
			$blocks[$admin]['content'] = $blocks[$admin]['content'];
			save_blocks( $blocks );
		}
	}		
	if(isset($_POST['submit'])) {
		$newcontent = array( );
		for($x = 0; $x <= count($pagelinks); $x++) {
			if(isset($_POST["content_$x"])) $newcontent[] = $_POST["content_$x"];
		}
		$blocks[$admin]['content'] = $newcontent;
		$blocks[$admin]['style'] = isset($_POST['style']) && !empty($_POST['style']) ? 1 : 0;
		save_blocks( $blocks );
	}
	if($admin){
		$blockquery = dbquery("SELECT * FROM ".TABLEPREFIX."fanfiction_blocks WHERE block_name = '$admin'");
		while($block = dbassoc($blockquery)) {
			$blocks[$block['block_name']] = unserialize($block['block_variables']);
			$blocks[$block['block_name']]['title'] = $block['block_title'];
			$blocks[$block['block_name']]['file'] = $block['block_file'];
			$blocks[$block['block_name']]['status'] = $block['block_status'];
		}
		$content = isset($blocks[$admin]['content']) ? $blocks[$admin]['content'] : array();
		$output .= "<div style=\"width: 300px; margin: 0 auto;\"><form method=\"POST\" enctype=\"multipart/form-data\"action=\"admin.php?action=blocks&admin=$admin\">
			<table class=\"tblborder\" width=\"100%\"><tr><th>"._TITLE."</th><th colspan=\"2\">"._MOVE."</th></tr>";
		$count = 1;
		if(is_array($content)) {
			foreach($content as $link) {
				$output .= "<tr><td class='tblborder'><input type=\"checkbox\" class=\"checkbox\" checked name=\"content_$count\" value=\"$link\">".$pagelinks["$link"]['link']."</td>
					<td class='tblborder' width=\"15\">".($count > 1 ? "<a href=\"admin.php?action=blocks&admin=$admin&up=$link\"><img src=\""._BASEDIR."images/arrowup.gif\" width=\"13\" height=\"18\" alt=\""._UP."\" title=\""._UP."\" border=\"0\"></a>" : "")."</td>
					<td class='tblborder' width=\"15\">".($count < sizeof($blocks[$admin]['content']) ? "<a href=\"admin.php?action=blocks&admin=$admin&down=$link\"><img src=\""._BASEDIR."images/arrowdown.gif\" width=\"13\" height=\"18\" alt=\""._DOWN."\" title=\""._DOWN."\" border=\"0\"></a>" : "")."</td></tr>";
				$count++;
			}
		}
		foreach($pagelinks as $page => $link) {
			if(!is_array($content) || !in_array($page, $content)) {
				$output .= "<tr><td class='tblborder'><input type=\"checkbox\" class=\"checkbox\" name=\"content_$count\" value=\"$page\">".$link['link']."</td>
					<td class='tblborder' colspan=\"2\">&nbsp;</td></tr>";
				$count++;
			}
		}
		$output .= "</table><br /><div style=\"text-align: center;\">
			<label for=\"style\">"._STYLE.":</label> <SELECT name=\"style\" id=\"style\">
			<option value=\"1\"".(!empty($blocks["menu"]['style']) ? " selected" : "").">"._NOLIST."</option>
			<option value=\"0\"".(empty($blocks['menu']['style']) ? " selected" : "").">"._LISTFORMAT."</option>
			</select><br /><br /><INPUT type=\"submit\" class=\"button\" name=\"submit\" value=\""._SUBMIT."\"></div></form></div>";
	}
